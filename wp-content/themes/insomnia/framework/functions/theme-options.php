<?php
/**
* Configure Kirki 
*/
function insomnia_customizer_config() {
     
    $args = array(
        'textdomain'   => 'insomnia',
    );
    return $args;
}
add_filter( 'kirki/config', 'insomnia_customizer_config' );

function insomnia_sections( $wp_customize ) {

    $wp_customize->add_section( 'insomnia_general', array(
        'title'       => __( 'General', 'insomnia' ),
        'priority'    => 10,
    ) );

    $wp_customize->add_section( 'insomnia_logo_section', array(
        'title'       => __( 'Logo & Favicon', 'insomnia' ),
        'priority'    => 10,
        'description' => __( 'You can change logo and space beteew it.', 'insomnia' ),
    ) );

    $wp_customize->add_section( 'insomnia_menu', array(
        'title'       => __( 'Menu', 'insomnia' ),
        'priority'    => 10,
        'description' => __( 'Some flexible options for menu.', 'insomnia' ),
    ) );

    $wp_customize->add_section( 'insomnia_slider', array(
        'title'       => __( 'Sticky Posts', 'insomnia' ),
        'priority'    => 10,
        'description' => __( 'All your important content in one slider', 'insomnia' ),
    ) );

    $wp_customize->add_section( 'insomnia_content', array(
        'title'       => __( 'Blog', 'insomnia' ),
        'priority'    => 10,
        'description' => __( 'Some functions for your needs', 'insomnia' ),
    ) );

    $wp_customize->add_section( 'insomnia_footer', array(
        'title'       => __( 'Footer', 'insomnia' ),
        'priority'    => 10,
        'description' => __( 'Change footer text', 'insomnia' ),
    ) );
    
    if ( class_exists( 'WooCommerce' ) ) {
    $wp_customize->add_section( 'insomnia_woocommerce', array(
        'title'       => __( 'WooCommerce', 'insomnia' ),
        'priority'    => 10,
    ) );        
    };

    $wp_customize->add_section( 'insomnia_other', array(
        'title'       => __( 'Other Options', 'insomnia' ),
        'priority'    => 10,
    ) );

}
add_action( 'customize_register', 'insomnia_sections' );

function insomnia_demo_fields( $fields ) {

        include( get_template_directory() . '/framework/functions/options/general.php');
        include( get_template_directory() . '/framework/functions/options/logo.php');
        include( get_template_directory() . '/framework/functions/options/menu.php');
        include( get_template_directory() . '/framework/functions/options/slider.php');
        include( get_template_directory() . '/framework/functions/options/content.php');
        include( get_template_directory() . '/framework/functions/options/footer.php');
        if ( class_exists( 'WooCommerce' ) ) {
        include( get_template_directory() . '/framework/functions/options/woo.php');
        };

    return $fields;
    
}
add_filter( 'kirki/fields', 'insomnia_demo_fields' );

?>