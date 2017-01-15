<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AG_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
            
            <?php if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
            <?php agtheme_posted_on(); ?>
	</div><!-- .entry-meta -->
            <?php endif;
        
            if ( has_post_thumbnail() && is_single() ) { ?>
        <figure class="featured-image">
            <?php the_post_thumbnail(); ?>
        </figure>
            <?php } else if ( has_post_thumbnail() ) { ?>
        <figure class="featured-image">
            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                <?php the_post_thumbnail(); ?>
            </a>
        </figure>
            <?php } ?>
        
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php if ( is_single() ) :
            the_content();
        else :
            the_excerpt(); ?>
        
            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                <?php printf(
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'agtheme' ), array(
                        'span' => array(
                            'class' => array()
                        ) 
                    ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) ; ?>
            </a>
        
            <?php endif; ?>
    
        <footer class="entry-footer">
            <?php agtheme_entry_footer(); ?>
        </footer><!-- .entry-footer -->

    </div><!-- .entry-content -->
    
</article><!-- #post-## -->