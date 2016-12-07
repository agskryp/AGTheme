<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AG_Theme
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'agtheme' ) ); ?>">
            <?php printf( esc_html__( 'Proudly powered by %s', 'agtheme' ), 'WordPress' ); ?>
        </a>
	
        <span class="sep"> | </span>
	
            <?php printf( esc_html__( 'Theme by %2$s', 'agtheme' ), 'agtheme', '<a href="http://agskryp.com" rel="designer">Andrew Skrypnyk</a>' ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
