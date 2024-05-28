<?php
/*
Template Name: Portfolio Grid
*/

get_header();

// Query portfolio posts
$portfolio_query = new WP_Query(array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1, // Display all portfolio posts
));

// Check if there are any portfolio posts
if ($portfolio_query->have_posts()) :
    ?>
    <div class="portfolio-grid">
        <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
            <div class="portfolio-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                
                <?php
                // Display project client
                $project_client = get_post_meta(get_the_ID(), 'project_client', true);
                if ($project_client) {
                    echo '<p>Client: ' . esc_html($project_client) . '</p>';
                }

                // Display project type taxonomy
                $project_types = get_the_terms(get_the_ID(), 'project_type');
                if ($project_types && !is_wp_error($project_types)) {
                    $project_type_names = wp_list_pluck($project_types, 'name');
                    echo '<p>Types: ' . implode(', ', $project_type_names) . '</p>';
                }

                // Display project category taxonomy
                $project_categories = get_the_terms(get_the_ID(), 'project_category');
                if ($project_categories && !is_wp_error($project_categories)) {
                    $project_category_names = wp_list_pluck($project_categories, 'name');
                    echo '<p>Categories: ' . implode(', ', $project_category_names) . '</p>';
                }
                ?>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    // Reset post data
    wp_reset_postdata();
else :
    // If no portfolio posts found
    echo '<p>No portfolio posts found.</p>';
endif;

get_footer();
?>
	