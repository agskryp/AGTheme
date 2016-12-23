<?php
/**
 * The front page file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AG_Theme
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="homepage-bkgd">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#homepageMenu">
                <?php esc_html_e( 'Skip to menu', 'agtheme' ); ?>
            </a>

            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <header class="site-branding">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <span class="site-title-top">Andrew</span>
                                <span class="site-title-bottom">Skrypnyk</span>
                            </a>
                        </h1>
                        
                        <p class="site-description">
                            <span class="site-description-top">Front-End</span>
                            <span class="site-description-bottom">Web Developer & Designer</span>
                        </p>
                    </header>

                    <ul id="homepageMenu" class="homepage-container">
                        <li class="homepage-menu-item homepage-menu-item-blog">
                            <a href="http://agskryp.dev/blog/">
                                <i class="fa fa-newspaper-o fa-5x"></i>
                                <p>Browse through articles and writings about anything front-end related</p>
                                <div class="homepage-menu-button">Read Blog</div> 
                            </a>
                        </li>

                        <li class="homepage-menu-item homepage-menu-item-portfolio">
                            <a href="">
                                <i class="fa fa-list-alt fa-5x"></i>
                                <p>Check out various web projects and what was involved in the building process</p>
                                <div class="homepage-menu-button">View Portfolio</div>
                            </a>
                        </li>

                        <li class="homepage-menu-item homepage-menu-item-about">
                            <a href="http://agskryp.dev/about/">
                                <i class="fa fa-user fa-5x"></i>
                                <p>Learn more about the man behind the page in front of the computer beyond the internet.</p>
                                <div class="homepage-menu-button">About Me</div>
                            </a>
                        </li>


                        <li class="homepage-menu-item homepage-menu-item-contact">
                            <a href="http://agskryp.dev/contact/">
                                <i class="fa fa-envelope fa-5x"></i>
                                <p>Connect with a social network or send a message with an easy to use form</p>
                                <div class="homepage-menu-button">Contact Me</div>
                            </a>
                        </li>
                    </ul>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>
</html>