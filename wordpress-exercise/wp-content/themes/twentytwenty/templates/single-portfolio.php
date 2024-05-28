<?php
get_header(); // Include header template

// Start the loop
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
            <?php
            // Display project categories
            $categories = get_the_terms(get_the_ID(), 'project_category');
			var_dump($categories) ;
            if ($categories && !is_wp_error($categories)) {
                echo '<p>Categories: ';
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_term_link($category->term_id)) . '">' . esc_html($category->name) . '</a>, ';
                }
                echo '</p>';
            }

            // Display project types
            $types = get_the_terms(get_the_ID(), 'project_type');
			var_dump($types);
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
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>
        </article>
        <?php
    }
}

get_footer(); // Include footer template
?>
