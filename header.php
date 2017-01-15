<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AG_Theme
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site <?php if ( is_home() || is_single() || is_archive() ) : echo get_theme_mod( 'layout_setting', 'sidebar-right' ); endif; ?>">
	<a class="skip-link screen-reader-text" href="#content">
            <?php esc_html_e( 'Skip to content', 'agtheme' ); ?>
        </a>
            
            <?php if ( get_header_image() ) { ?>
        <header id="masthead" class="site-header" style="background-image: url(<?php header_image(); ?>)" role="banner">
            <?php } else { ?>
        <header id="masthead" class="site-header" role="banner">
            <?php } ?>
            
            <div class="site-branding">
                
                    <?php if ( is_front_page() && is_home() ) : ?>
		<h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <span class="site-title-top">Andrew</span>
                        <span class="site-title-bottom">Skrypnyk</span>
                    </a>
                </h1>                    
                    <?php else : ?>
		<p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <span class="site-title-top">Andrew</span>
                        <span class="site-title-bottom">Skrypnyk</span>
                    </a>
                </p>                    
                    <?php endif; ?>
                    
                <p class="site-description">
                    <span class="site-description-top">Front-End Web</span>
                    <span class="site-description-bottom">Designer // Developer</span>
                </p>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <?php esc_html_e( 'Site Menu', 'agtheme' ); ?>
                </button>
                    <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'nav-menu'
                    ) ); ?>
            </nav><!-- #site-navigation -->
            
	</header><!-- #masthead -->
    <div id="content" class="site-content">
