<?php
/*
* enqueue CSS and JS Files 
*/
if ( !function_exists( 'wpex_bookstore_files' ) ) {
  function wpex_bookstore_files() {
    // main css
    wp_enqueue_style( 'wpex-main-css', get_stylesheet_uri() );

    // fontawesome fonts
    wp_enqueue_style('wpex-fontawesome-custom', get_theme_file_uri('/assets/fontawesome/css/all.min.css'));

    // Poppins fonts
    wp_enqueue_style('wpex-poppins', get_theme_file_uri('/assets/fonts/Poppins/poppins-style.css'));

    // Main JS
    wp_enqueue_script('wpex-script-js', get_theme_file_uri('/assets/js/script.js'), array('jquery'), '1.0', true);

  }
  add_action('wp_enqueue_scripts', 'wpex_bookstore_files');
}

/**
 * Add Theme support and register custom menu 
 */
if ( !function_exists('wpex_custom_support') ) {
  function wpex_custom_support() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'widgets' );

    // Register Footer Menu

    register_nav_menus( array(
      'footer_menu'  => 'Footer Menu',
      'secondary_footer_menu' => 'Secondary Footer Menu'
    ) );
  
    //Register header menu
    

  }
  add_action( 'after_setup_theme', 'wpex_custom_support' );
}

/**
 * Header - Footer theme customizer code
 */

if( !function_exists( 'wpexBook_header_footer_customizer' ) ) {
  function wpexBook_header_footer_customizer( $wp_customize ) {

    // add settings for hero-banner text
    $wp_customize->add_section('header_section', array(
      'title' => 'Header Section'
    ));
    $wp_customize->add_setting('headertext_setting', array(
      'default' => 'Default Text For Hero-banner Section',
    ));
    $wp_customize->add_control('headertext_setting', array(
      'label' => 'Hero-banner Text Here',
      'section' => 'header_section',
      'type' => 'textarea',
    ));

    //add setting for Header logo
    $wp_customize->add_setting('header_logo');
    $wp_customize->add_control(new WP_Customize_Upload_Control(
      $wp_customize,'header_logo',array(
        'label'      => __('Header Logo', 'exercise_theme'),
        'section'    => 'header_section',
        'settings'   => 'header_logo',
      ))
    );


    // hide / show header logo
    $wp_customize->add_setting('headerwp_hide_logo', array(
      'default'    => '0'
    ));
    $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize,
          'headerwp_hide_logo',
          array(
              'label'     => __('Hide Header Logo', 'exercise_theme'),
              'section'   => 'header_section',
              'settings'  => 'headerwp_hide_logo',
              'type'      => 'checkbox',
          )
      )
    );


    //add setting for Footer copyright text
    $wp_customize->add_section('footer_section', array(
      'title' => 'Footer Section'
    ));
    $wp_customize->add_setting('text_setting', array(
      'default' => 'Default Copyright Text For Footer Section',
    ));
    $wp_customize->add_control('text_setting', array(
      'label' => 'Footer Copyright Text Here',
      'section' => 'footer_section',
      'type' => 'textarea',
    ));

    //add setting for Footer other text
    $wp_customize->add_section('footer_section', array(
      'title' => 'Footer Section'
    ));
    $wp_customize->add_setting('other_text_setting', array(
      'default' => 'Default Text For Footer Section',
    ));
    $wp_customize->add_control('other_text_setting', array(
      'label' => 'Footer other Text Here',
      'section' => 'footer_section',
      'type' => 'textarea',
    ));

    //add setting for footer logo
    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Upload_Control(
      $wp_customize,'footer_logo',array(
        'label'      => __('Footer Logo', 'exercise_theme'),
        'section'    => 'footer_section',
        'settings'   => 'footer_logo',
      ))
    );

    //add setting for background

    $wp_customize->add_setting('footer_background_color', array(
    'default' => '#380B46',
    'transport' => 'refresh'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
    'label'   => 'Footer Color Setting of Top Section',
    'section' => 'footer_section',
    'settings'   => 'footer_background_color',
    'priority' => 1
    )));

  }
  add_action('customize_register', 'wpexBook_header_footer_customizer');
}


/**
 * add sidebar at footer 
 */
if( !function_exists( 'wpex_custom_sidebar' ) ) {
  function wpex_custom_sidebar() {
      register_sidebar(array(
      'name' => "Footer Sidebar",
      "id" => "footer_sidebar",
      'description' => 'Appears on the Footer page template',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ));
  }

  add_action( 'widgets_init', 'wpex_custom_sidebar' );
}