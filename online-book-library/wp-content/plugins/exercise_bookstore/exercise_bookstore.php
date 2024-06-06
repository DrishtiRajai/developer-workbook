<?php
/**
 * Plugin Name: Book Store
 * Description: A simple plugin of BookStore with custom post type named Book with custom meta data and shortcode.
 * Version: 1.0
 * Author: Drishti 
 * Author URI: https://multidots.com
 * Text Domain: Title, short-Description, Book-price, Book-author, book-year, Star-rating, book-publisher, book-image, featured-book,
 */

if(!function_exists('add_action')) {
  echo "Hi there! I m Just a plugin";
  exit;
}

// If this file is called directly, abort
if(!defined('WPINC')) {
   die;
}

// For Version 
if(!define('WPEX_PLUGIN_VERSION', '')) {
  define('WPEX_PLUGIN_VERSION', '1.0');
}

// For Plugin URI
if(!define('WPEX_PLUGIN_DIR',plugin_dir_url( __FILE__ ))) {
  define('WPEX_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

// Activation Hook 
require plugin_dir_path( __FILE__ ). 'admin/admin.php';
register_activation_hook(__FILE__,'wpex_activation_plugin');


// enqueue css and JS files 
if( !function_exists('wpex_book_files') ) {

  function wpex_book_files() {
    // main style
    wp_enqueue_style('main-style', WPEX_PLUGIN_DIR.'assets/css/main.css' );

     // main style of slicker slider
     wp_enqueue_style('slider-slicker-style', WPEX_PLUGIN_DIR.'assets/css/custom-slider-slicker.css' );

    // slicker style
    wp_enqueue_style('land-slick', WPEX_PLUGIN_DIR.'assets/css/slick.css' );

    // Fontawesome style for font & icon
    wp_enqueue_style('land-fontawesome-font', WPEX_PLUGIN_DIR.'assets/fontawesome/css/fontawesome.css');

    // fontawesome style
    wp_enqueue_style('land-font-awesome', WPEX_PLUGIN_DIR.'assets/fontawesome/css/fontawesome.min.css');

    // Slicker JS
    wp_enqueue_script('land-slick-js', WPEX_PLUGIN_DIR.'assets/js/slick.min.js', array('jquery'), '1.0', true);

    // Main JS
    wp_enqueue_script('main-js', WPEX_PLUGIN_DIR.'assets/js/main.js', array('jquery'), '1.0', true);
    
    // Custom JS For Search Page
    wp_enqueue_script('custom-searchpage-js', WPEX_PLUGIN_DIR.'assets/js/customSearchpage.js', array('jquery'), '1.0', true);
  }
  add_action('wp_enqueue_scripts', 'wpex_book_files');
}

// Add Book Post tye 
require plugin_dir_path( __FILE__ ). 'inc/bookstore.php';

// Add Shortcode For Books for Home Page 
require plugin_dir_path( __FILE__ ). 'inc/bookstore-shortcode.php';

// Add Shortcode For Books for search page 
require plugin_dir_path( __FILE__ ). 'inc/searchbook-shortcode.php';

// Add Testimonial Post type and Shortcode For displaying testimonial as a slider at home page 
require plugin_dir_path( __FILE__ ). 'inc/testimonial.php';

/**
 * Modify WP_Query to support 'meta_or_tax' argument fot Search Query
 * to use OR between meta-query and taxonomy query parts.
 */

if( !function_exists( 'wpex_metaORtax_search' ) ) {
  function wpex_metaORtax_search( $where, \WP_Query $q )  {
    // Get query vars
    $tax_args    = isset( $q->query_vars['tax_query'] ) 
        ? $q->query_vars['tax_query'] 
        : null;
    $meta_args   = isset( $q->query_vars['meta_query'] ) 
        ? $q->query_vars['meta_query'] 
        : null;
    $meta_or_tax = isset( $q->query_vars['_meta_or_tax'] ) 
        ? wp_validate_boolean( $q->query_vars['_meta_or_tax'] )
        : false;

    // Construct the "tax OR meta" query
    if( $meta_or_tax && is_array( $tax_args ) &&  is_array( $meta_args )  ) {
        global $wpdb;

        // Primary id column
        $field = 'ID';

        // Tax query
        $sql_tax  = get_tax_sql(  $tax_args,  $wpdb->posts, $field );

        // Meta query
        $sql_meta = get_meta_sql( $meta_args, 'post', $wpdb->posts, $field );

        // Modify the 'where' part
        if( isset( $sql_meta['where'] ) && isset( $sql_tax['where'] ) ) {
            $where  = str_replace( 
                [ $sql_meta['where'], $sql_tax['where'] ], 
                '', 
                $where 
            );
            $where .= sprintf( 
                ' AND ( %s OR  %s ) ', 
                  substr( trim( $sql_meta['where'] ), 4 ), 
                  substr( trim( $sql_tax['where']  ), 4 )
            );
        }
    }
      return $where;
  }
  add_filter( 'posts_where', 'wpex_metaORtax_search' , PHP_INT_MAX, 2 );
}