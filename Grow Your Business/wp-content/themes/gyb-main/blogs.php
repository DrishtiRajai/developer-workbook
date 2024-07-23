<?php
/*
Template Name: Blogs
*/
get_header();
?>

<div class="blogs-banner">        
    <h1>Blog</h1>
</div>
<div class="category-navigation">
    <?php 
    $categories = get_categories();
    foreach($categories as $category) {
        echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
    }
    ?>
</div>
<div class="blog-posts">
    <?php
    // WP_Query arguments
    $args = array(
        'post_type' => 'post', // Fetch posts
        'post_status' => 'publish', // Only published posts
        'posts_per_page' => -1, // Display all posts (you can change this number if needed)
        'order' => 'DESC', // Show newest posts first
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="post">
                <div class="post-thumbnail">
                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large');
                    } ?>
                </div>
                <div class="post-content">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <div class="post-body">
                        <?php the_content(); ?>
                    </div>
                    <div class="post-meta">
                        <span class="post-category"><?php the_category(', '); ?></span>
                        <span class="post-author"><?php the_author(); ?></span>
                        <span class="post-date"><?php the_date(); ?></span>
                        <span class="post-comments"><?php comments_number(); ?></span>
                    </div>
                </div>
            </div>
        <?php endwhile;
        // Restore original Post Data
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<?php
get_footer();
?>
