<?php
/*
Plugin Name: Portfolio 
Description: Custom plugin to manage client projects.
Version: 1.0
Author: Drishti Rajai
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function create_portfolio_post_type() {
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'menu_name' => 'Portfolio',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Portfolio',
        'edit_item' => 'Edit Portfolio',
        'new_item' => 'New Portfolio',
        'view_item' => 'View Portfolio',
        'search_items' => 'Search Portfolio',
        'not_found' => 'No Portfolio found',
        'not_found_in_trash' => 'No Portfolio found in trash',
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-portfolio',
        'taxonomies' => array('project_category', 'project_type'), // Add this line

    );

    register_post_type('portfolio', $args);
}
add_action('init', 'create_portfolio_post_type');


function create_portfolio_taxonomies() {
    // Project Type Taxonomy
    $labels = array(
        'name' => 'Project Types',
        'singular_name' => 'Project Type',
        'menu_name' => 'Project Types',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('project_type', 'portfolio', $args);

    // Project Category Taxonomy
    $labels = array(
        'name' => 'Project Categories',
        'singular_name' => 'Project Category',
        'menu_name' => 'Project Categories',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('project_category', 'portfolio', $args);
}
add_action('init', 'create_portfolio_taxonomies');

function custom_project_client_meta_box() {
    // Add meta box only for the 'portfolio' post type
    add_meta_box(
        'project_client_meta_box', // Meta box ID
        'Project Client', // Title of the meta box
        'display_project_client_meta_box', // Callback function to display the meta box contents
        'portfolio', // Post type where the meta box should appear (only 'portfolio')
        'normal', // Context: 'normal', 'advanced', or 'side'
        'default' // Priority: 'high', 'core', 'default', or 'low'
    );
}
add_action('add_meta_boxes', 'custom_project_client_meta_box');




function display_project_client_meta_box($post) {
    // Retrieve the current value of the project client from the database
    $project_client = get_post_meta($post->ID, 'project_client', true);

    // Output the HTML for the meta box
    ?>
    <label for="project_client">Client Name:</label>
    <input type="text" id="project_client" name="project_client" value="<?php echo esc_attr($project_client); ?>" style="width: 100%;">
    <?php
}
function save_project_client_meta_data($post_id) {
    if (array_key_exists('project_client', $_POST)) {
        update_post_meta(
            $post_id,
            'project_client',
            sanitize_text_field($_POST['project_client'])
        );
    }
}
add_action('save_post', 'save_project_client_meta_data');



/*function exclude_portfolio_from_blog_loop($query) {
    // Check if it's the main query and if it's the blog page
    if ($query->is_main_query() && $query->is_home()) {
        // Exclude the portfolio post type from the query
        $query->set('post_type', array('post'));
    }
}
add_action('pre_get_posts', 'exclude_portfolio_from_blog_loop');*/

?>