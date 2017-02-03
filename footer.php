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
        <p>&copy; 2014 - 2017 Andrew Skrypnyk.  All rights reserved.</p>
        <p>agskryp.com is powered by <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'agtheme' ) ); ?>"><?php printf( esc_html__( '%s', 'agtheme' ), 'WordPress' ); ?></a>
	<span class="sep"> | </span>	
        <?php printf( esc_html__( 'Designed by %2$s', 'agtheme' ), 'agtheme', '<a href="http://agskryp.com" rel="designer">agskryp</a>' ); ?></p>
    </div><!-- .site-info -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>