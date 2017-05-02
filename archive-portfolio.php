<?php
/**
 * The template for displaying custom-portfolio pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AG_Theme
 */

get_header(); ?>



<div id="primary" class="content-area">
    <main id="main" class="site-main portfolio-archive" role="main">
        
            <?php 
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) :
                
                the_post();

                     /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'archive-portfolio' );
                    
                    
                endwhile;
                
                
            ?>
        
        <div style="clear: both;">
            <?php agtheme_paging_nav(); ?>
        </div>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
