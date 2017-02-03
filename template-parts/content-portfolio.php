<?php
/**
 * Template part for displaying portfolio posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AG_Theme
 */
?>

<div class="portfolio-container">
    <figure class="portfolio-feature-image">
        <?php the_post_thumbnail(); ?>
    </figure>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content(); ?>
                    
            <div class="portfolio-entry-meta">
                <p>Info and images are from <?php the_date(); ?></p>
            </div><!-- .portfolio-entry-meta -->

            <div class="portfolio-nav">
                <a href="/portfolio" class="portfolio-link">&larr; Back to Portfolio</a>
                    <?php if (get_field( 'web_link' )) : ?>
                <a href="<?php the_field( 'web_link' ); ?>" class="portfolio-link" target="_blank">Visit <?php the_title(); ?> &rarr;</a> 
                    <?php endif; ?>
            </div>

            <footer class="entry-footer">                
                <?php agtheme_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>