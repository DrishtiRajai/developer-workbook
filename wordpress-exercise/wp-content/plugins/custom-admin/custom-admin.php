<?php
/*
Plugin Name: Custom Admin Page
Description: This plugin registers a custom admin page in WP-Admin to manage plugins, users, pages, and posts.
Version: 1.0
Author: Your Name
*/

// Add custom admin page to WordPress admin menu
function custom_admin_page() {
    add_menu_page(
        'Custom Page',        // Page title
        'Custom Page',        // Menu title
        'manage_options',     // Capability required
        'custom-admin-page',  // Menu slug
        'custom_page_content',// Callback function to display page content
        'dashicons-admin-generic', // Icon
        59                    // Position just above "Appearance" menu
    );
}
add_action('admin_menu', 'custom_admin_page');

// Callback function to display page content
function custom_page_content() {
    echo '<div class="wrap">';
    echo '<h1>Custom Admin Page</h1>';
    echo '<p>This is a custom admin page created by our plugin.</p>';

    // Display all plugins
    echo '<h2>Plugins</h2>';
    $plugins = get_plugins();
    if ($plugins) {
        echo '<ul>';
        foreach ($plugins as $plugin_file => $plugin_info) {
            echo '<li>' . esc_html($plugin_info['Name']) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No plugins found.</p>';
    }

    // Display all users
    echo '<h2>Users</h2>';
    $users = get_users();
    if ($users) {
        echo '<ul>';
        foreach ($users as $user) {
            echo '<li>' . esc_html($user->display_name) . ' (' . esc_html($user->user_email) . ')</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No users found.</p>';
    }

    // Display all pages
    echo '<h2>Pages</h2>';
    $pages = get_pages();
    if ($pages) {
        echo '<ul>';
        foreach ($pages as $page) {
            echo '<li>' . esc_html($page->post_title) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No pages found.</p>';
    }

    // Display all posts
    echo '<h2>Posts</h2>';
    $posts = get_posts();
    if ($posts) {
        echo '<ul>';
        foreach ($posts as $post) {
            echo '<li>' . esc_html($post->post_title) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No posts found.</p>';
    }

    echo '</div>';
}
