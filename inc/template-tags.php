<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AG_Theme
 */

if ( ! function_exists( 'agtheme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function agtheme_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Published on %s', 'post date', 'agtheme' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

        // Code to get author information 
        //
	// $byline = sprintf(
	//	esc_html_x( 'by %s', 'post author', 'agtheme' ),
	//	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	// );

	echo '<span class="posted-on">' . $posted_on . '</span>';  

        //  Code to post author information
        //    
        //'<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'agtheme_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function agtheme_entry_footer() {
	
    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
	/* translators: %s: post title */
	comments_popup_link( sprintf( wp_kses( __( 
            'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'agtheme' ),
        array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
	echo '</span>';
    }

    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) { ?>
        <div class="cat-tag-links">
            <?php /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'agtheme' ) );
                if ( $categories_list && agtheme_categorized_blog() ) {
                    printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'agtheme' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html__( ', ', 'agtheme' ) );
                if ( $tags_list ) {
                    printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'agtheme' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                }
    } ?>
        </div>

	<?php edit_post_link(
            sprintf(
                /* translators: %s: Name of current post */
		esc_html__( 'Edit %s', 'agtheme' ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ),
            '<span class="edit-link">', '</span>'
	);
} endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function agtheme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'agtheme_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'agtheme_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so agtheme_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so agtheme_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in agtheme_categorized_blog.
 */
function agtheme_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'agtheme_categories' );
}
add_action( 'edit_category', 'agtheme_category_transient_flusher' );
add_action( 'save_post',     'agtheme_category_transient_flusher' );

/**
 * Customize the excerpt read-more indicator
 */

function agtheme_excerpt_more ( $more ) {
    return " …";
}

add_filter ( 'excerpt_more', 'agtheme_excerpt_more' );


if ( ! function_exists( 'agtheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function agtheme_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'agtheme' ),
		'next_text' => __( 'Next &rarr;', 'agtheme' ),
                'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'agtheme' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;