<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AG_Theme
 */

get_header(); ?>

<div class="blog-container">
    <div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : 
                the_post();

		get_template_part( 'template-parts/content', get_post_format() );

		the_post_navigation( array( 
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next ', 'agtheme' ) . '<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'agtheme' ) . '</span>' .
                    '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>' . __( ' Previous', 'agtheme' ) . '</span>' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'agtheme' ) . '</span>' .
                    '<span class="post-title">%title</span>'
                ) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) : 
                    comments_template();
		endif;

            endwhile; // End of the loop. ?>

	</main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();