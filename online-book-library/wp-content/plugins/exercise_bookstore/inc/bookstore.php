<?php
/**
 * Register Book - Custom Post Type For BookStore
 */ 
if(!function_exists('wpex_book_post_type')){
  function wpex_book_post_type() {
  
    register_post_type('book', array(
      'show_in_rest' => true,
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'rewrite' => array('slug' => 'book'),
      'has_archive'   => true,
      'public' => true,
      'show_in_menu' => true,
      'capability_type' => 'post',
      'taxonomies'     =>  array( 'post_tag' ),
      'labels' => array(
          'name' => __('Book', 'book_store'),
          'add_new_item' => __("Add New Book",'book_store'),
          'edit_item' => __('Edit Book','book_store'),
          'all_items' => __('All Books','book_store'),
          'singular_name' => __('Book','book_store'),
          'view_item'          => __( 'View Book', 'book_store' ),
		      'view_items'         => __( 'View Books', 'book_store' ),
          'not_found'          => __( 'No Book found', 'book_store' ),
		      'not_found_in_trash' => __( 'No Book found in Trash', 'book_store' ),
      ),
      'menu_icon' => 'dashicons-book'
    ) );

    /**
     * create author taxonomy for Books
     */ 
    $labels = array(
      'name'              => _x( 'Author', 'taxonomy general name', 'book_store' ),
      'singular_name'     => _x( 'Author', 'taxonomy singular name', 'book_store' ),
      'search_items'      => __( 'Search book Author', 'book_store' ),
      'all_items'         => __( 'All Authors', 'book_store' ),
      'parent_item'       => __( 'Parent Author', 'book_store' ),
      'parent_item_colon' => __( 'Parent Author:', 'book_store' ),
      'edit_item'         => __( 'Edit Author', 'book_store' ),
      'update_item'       => __( 'Update Author', 'book_store' ),
      'add_new_item'      => __( 'Add New Author', 'book_store' ),
      'new_item_name'     => __( 'New Author Name', 'book_store' ),
      'menu_name'         => __( 'Author', 'book_store' ),
    );
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'meta_box_cb'       => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'book_author' ),
    );
    register_taxonomy( 'book_author', array( 'book' ), $args );


    /**
     * create publisher taxonomy for Books
     */ 
    $labels = array(
      'name'              => _x( 'Publisher', 'taxonomy general name', 'book_store' ),
      'singular_name'     => _x( 'Publisher', 'taxonomy singular name', 'book_store' ),
      'search_items'      => __( 'Search book Publisher', 'book_store' ),
      'all_items'         => __( 'All Publishers', 'book_store' ),
      'parent_item'       => __( 'Parent Publisher', 'book_store' ),
      'parent_item_colon' => __( 'Parent Publisher:', 'book_store' ),
      'edit_item'         => __( 'Edit Publisher', 'book_store' ),
      'update_item'       => __( 'Update Publisher', 'book_store' ),
      'add_new_item'      => __( 'Add New Publisher', 'book_store' ),
      'new_item_name'     => __( 'New Publisher Name', 'book_store' ),
      'menu_name'         => __( 'Publisher', 'book_store' ),
    );
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'meta_box_cb'       => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'book_publisher' ),
    );
    register_taxonomy( 'book_publisher', array( 'book' ), $args );

    /*
    * create book_category taxonomy for Books
    */
    $labels = array(
      'name'              => _x( 'Category', 'taxonomy general name', 'book_store' ),
      'singular_name'     => _x( 'Category', 'taxonomy singular name', 'book_store' ),
      'search_items'      => __( 'Search book Category', 'book_store' ),
      'all_items'         => __( 'All Categories', 'book_store' ),
      'parent_item'       => __( 'Parent Category', 'book_store' ),
      'parent_item_colon' => __( 'Parent Category:', 'book_store' ),
      'edit_item'         => __( 'Edit Category', 'book_store' ),
      'update_item'       => __( 'Update Category', 'book_store' ),
      'add_new_item'      => __( 'Add New Category', 'book_store' ),
      'new_item_name'     => __( 'New Category Name', 'book_store' ),
      'menu_name'         => __( 'Category', 'book_store' ),
    );
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'meta_box_cb'       => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'book_category' ),
    );
    register_taxonomy( 'book_category', array( 'book' ), $args );

  }
  add_action( 'init', 'wpex_book_post_type' );
}