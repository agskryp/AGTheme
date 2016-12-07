<?php
/**
 * AG_Theme Theme Customizer.
 *
 * @package AG_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agtheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

        /**
         * Custom Customizer Customizations
         */
        
        // Create header background color setting
        $wp_customize->add_setting( 'header_color', array(
            'default' => '#1e73be',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ));
        
        // Add control for header background color setting
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'header_color', array(
                    'label' => __( 'Header Background Color', 'agtheme' ),
                    'section' => 'colors',
                )
            )    
        );
        
        // Adds a Theme Options section to the Customizer
        $wp_customize->add_section( 'agtheme-options', array(
            'title' => __( 'Theme Options', 'agtheme' ),
            'capability' => 'edit_theme_options',
            'description' => __( 'Change the default display options for the theme.', 'agtheme' ),
        ));
        
        // Create sidebar layout setting
        $wp_customize->add_setting( 'layout_setting', array(
            'default' => 'sidebar-right',
            'type' => 'theme_mod',
            'sanitize_callback' => 'agtheme_sanitize_layout',
            'transport' => 'postMessage',
        ));
        
        // Add sidebar layout controls
        $wp_customize->add_control( 'layout_control', array(
            'settings' => 'layout_setting',
            'type' => 'radio',
            'label' => __( 'Sidebar Position', 'agtheme' ),
            'choices' => array(
                'sidebar-right' => __( 'Right sidebar (default)', 'agtheme' ),
                'sidebar-left' => __( 'Left sidebar', 'agtheme' ),
                'no-sidebar' => __( 'No sidebar', 'agtheme' ),
            ),
            'section' => 'agtheme-options',
        ));
                
              
}
add_action( 'customize_register', 'agtheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agtheme_customize_preview_js() {
	wp_enqueue_script( 'agtheme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'agtheme_customize_preview_js' );

/**
 * Sanitize layout options
 */

function agtheme_sanitize_layout ( $value ) {
    if ( !in_array( $value, array( 'sidebar-right', 'sidebar-left', 'no-sidebar' ) ) ) {
        $value = 'sidebar-right';
    }
    return $value;
}

/**
 * Inject Customizer CSS when appropriate
 */
function agtheme_customizer_css() {
    $header_color = get_theme_mod( 'header_color' );
    ?>
        <style type="text/css">
            .site-header {
                background-color: <?php echo $header_color; ?>
            } 
        </style>
    <?php
}
add_action( 'wp_head', 'agtheme_customizer_css' );