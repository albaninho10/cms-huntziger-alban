<?php
/**
 * Appearance Settings
 *
 * @package Rara_eCommerce
 */

function rara_ecommerce_customize_register_appearance( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'rara-ecommerce' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'rara-ecommerce' ),
        ) 
    );
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel                          = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority                       = 30;
    $wp_customize->get_section( 'background_image' )->panel                = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority             = 35;
    $wp_customize->get_section( 'background_image' )->title                = __( 'Background', 'rara-ecommerce' );
    $wp_customize->get_control( 'background_color' )->description          = __( 'Background color of the theme.', 'rara-ecommerce' );

    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#C4B583',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'rara-ecommerce' ),
                'description' => __( 'Primary color of the theme.', 'rara-ecommerce' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );

    /** Secondary Color*/
    $wp_customize->add_setting( 
        'secondary_color', 
        array(
            'default'           => '#D5001B',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'secondary_color', 
            array(
                'label'       => __( 'Secondary Color', 'rara-ecommerce' ),
                'description' => __( 'Secondary color of the theme.', 'rara-ecommerce' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );

    /** Typography Settings */
    $wp_customize->add_section(
        'body_settings',
        array(
            'title'    => __( 'Typography', 'rara-ecommerce' ),
            'priority' => 50,
            'panel'    => 'appearance_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font',
        array(
            'default'           => 'Jost',
            'sanitize_callback' => 'rara_ecommerce_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Rara_eCommerce_Select_Control(
            $wp_customize,
            'primary_font',
            array(
                'label'       => __( 'Primary Font', 'rara-ecommerce' ),
                'description' => __( 'Primary font of the site.', 'rara-ecommerce' ),
                'section'     => 'body_settings',
                'choices'     => rara_ecommerce_get_all_fonts(),    
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font',
        array(
            'default'           => 'Jost',
            'sanitize_callback' => 'rara_ecommerce_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Rara_eCommerce_Select_Control(
            $wp_customize,
            'secondary_font',
            array(
                'label'       => __( 'Secondary Font', 'rara-ecommerce' ),
                'description' => __( 'Secondary font of the site.', 'rara-ecommerce' ),
                'section'     => 'body_settings',
                'choices'     => rara_ecommerce_get_all_fonts(),    
            )
        )
    );  

    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'rara_ecommerce_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Rara_eCommerce_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'body_settings',
                'label'         => __( 'Load Google Fonts Locally', 'rara-ecommerce' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'rara-ecommerce' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'rara_ecommerce_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Rara_eCommerce_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'body_settings',
                'label'         => __( 'Preload Local Fonts', 'rara-ecommerce' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'rara-ecommerce' ),
                'active_callback' => 'rara_ecommerce_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'rara-ecommerce' ); ?></span>
        
        <input type="button" class="button button-primary rara-ecommerce-flush-local-fonts-button" name="rara-ecommerce-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'rara-ecommerce' ); ?>" />
    <?php
    $rara_ecommerce_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'rara-ecommerce' ),
            'section'       => 'body_settings',
            'description'   => $rara_ecommerce_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'rara_ecommerce_ed_localgoogle_fonts'
        )
    );

}
add_action( 'customize_register', 'rara_ecommerce_customize_register_appearance' );