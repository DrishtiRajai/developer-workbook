<?php
/*
Template Name: Portfolio Grid
*/

get_header();

// Display the page title
echo '<h1>' . get_the_title() . '</h1>';

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Get current page number

// Query portfolio posts
$portfolio_query = new WP_Query(array(
    'post_type'      => 'portfolio', // Retrieve only portfolio post type
    'posts_per_page' => 10,          // Display 10 portfolio posts per page
    'paged'          => $paged       // Page number
));

// Check if there are any portfolio posts
if ($portfolio_query->have_posts()) :
    ?>
    <div class="portfolio-grid">
        <?php
        if ($paged == 1) {
            // Display latest 10 posts on the first page
            $count = 0;
            while ($portfolio_query->have_posts() && $count < 10) {
                $portfolio_query->the_post();
                ?>
                <div class="portfolio-item">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    
                    <?php
                    // Display project categories
                    $categories = get_the_terms(get_the_ID(), 'project_category');
                    if ($categories && !is_wp_error($categories)) {
                        echo '<p>Categories: ';
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_term_link($category->term_id)) . '">' . esc_html($category->name) . '</a>, ';
                        }
                        echo '</p>';
                    }

                    // Display project types
                    $types = get_the_terms(get_the_ID(), 'project_type');
                    if ($types && !is_wp_error($types)) {
                        echo '<p>Types: ';
                        foreach ($types as $type) {
                            echo '<a href="' . esc_url(get_term_link($type->term_id)) . '">' . esc_html($type->name) . '</a>, ';
                        }
                        echo '</p>';
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
                <?php
                $count++;
            }
        } else {
            // Display remaining posts on subsequent pages
            while ($portfolio_query->have_posts()) {
                $portfolio_query->the_post();
                ?>
                <div class="portfolio-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    
                    <?php
                    // Display project categories
                    $categories = get_the_terms(get_the_ID(), 'project_category');
                    if ($categories && !is_wp_error($categories)) {
                        echo '<p>Categories: ';
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_term_link($category->term_id)) . '">' . esc_html($category->name) . '</a>, ';
                        }
                        echo '</p>';
                    }

                    // Display project types
                    $types = get_the_terms(get_the_ID(), 'project_type');
                    if ($types && !is_wp_error($types)) {
                        echo '<p>Types: ';
                        foreach ($types as $type) {
                            echo '<a href="' . esc_url(get_term_link($type->term_id)) . '">' . esc_html($type->name) . '</a>, ';
                        }
                        echo '</p>';
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
                <?php
            }
        }
        ?>
    </div>

    <?php
    // Pagination
    echo paginate_links(array(
        'total'   => $portfolio_query->max_num_pages, // Total number of pages
        'current' => $paged, // Current page number
        'prev_text' => __('« Previous'),
        'next_text' => __('Next »'),
    ));
    ?>

    <?php
    // Reset post data
    wp_reset_postdata();
else :
    // If no portfolio posts found
    echo '<p>No portfolio posts found.</p>';
endif;

get_footer();
?>
