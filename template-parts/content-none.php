<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AG_Theme
 */
?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">   
    
    <header class="page-header">	
        <h1 class="page-title">
            <?php if ( is_404() ) {
                esc_html_e( 'Error 404: Page not available', 'agtheme' );
            } else if ( is_search() ) {
                /* translator: %s = search query */
                printf( esc_html__( 'Nothing found for &ldquo;%s&rdquo;', 'agtheme' ), '<em>' . get_search_query() . '<em>' );
            } else {
                esc_html_e( 'Nothing Found ', 'agtheme' );
            } ?>
        </h1>    
    </header><!-- .page-header -->

    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p>
                <?php printf( 
                    wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'agtheme' ),
                        array( 'a' => array( 'href' => array() ) ) 
                    ),
                    esc_url( admin_url( 'post-new.php' ) ) 
                ); ?>
            </p>

        <?php elseif ( is_search() ) : ?>
            <p class="error-message">
                <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'agtheme' ); ?>
            </p>
            <?php get_search_form(); 
        
        elseif ( is_404() ) : ?>
            <p class="error-message">
                <?php esc_html_e( 'The page you are looking for doesn&rsquo;t exist.  To find what you&rsquo;re looking for check out the most recent articles below or try a search:', 'agtheme' ); ?>
            </p>
            <?php get_search_form(); 
      
        else : ?>
            <p class="error-message">
                <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'agtheme' ); ?>
            </p>
            <?php get_search_form();
        endif; ?>
    
    </div><!-- .page-content -->

</section><!-- .no-results -->