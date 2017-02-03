<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AG_Theme
 */
?>

<div id="post-<?php the_ID(); ?>" class="portfolio-archive-project">
    
        <?php if ( has_post_thumbnail() ) { ?>
    <figure class="portfolio-archive-image">
        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
            <?php the_post_thumbnail(); ?>
            <span style="text-align: center; display: block;">
                <?php the_title(); ?>
            </span>
        </a>
    </figure>
        <?php } ?>    
    
</div><!-- #post-## -->