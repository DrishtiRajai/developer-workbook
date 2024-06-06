<?php
/**
 * Register Testimonial - Custom Post Type
 */ 
if(!function_exists('wpex_testimonial_post_type')){
  function wpex_testimonial_post_type() {
  
    register_post_type('testimonial', array(
      'show_in_rest' => true,
      'supports' => array('title','editor','thumbnail'),
      'rewrite' => array('slug' => 'testimonial'),
      'has_archive'   => true,
      'public' => true,
      'labels' => array(
          'name' => 'Testimonials',
          'add_new_item' => "Add New Testimonial",
          'edit_item' => 'Edit Testimonial',
          'all_items' => 'All Testimonials',
          'singular_name' => 'Testimonial'
      ),
      'menu_icon' => 'dashicons-feedback'
    ) );
  }
  add_action( 'init', 'wpex_testimonial_post_type' );
}

/*
* Shortcode for displaying Testimonila Slider
*/

if( !function_exists( 'wpex_testinmonial_shortcode' ) ) {
  function wpex_testinmonial_shortcode() {
    ob_start();
    
    //Get data of testimonial

    $args = array(
      'post_type' => 'testimonial',
      'post_status' => 'publish',
    );

    $testimonialData = new WP_Query( $args );
    
    $testimonialname = get_post_type_object( 'testimonial' );

    ?>
    <section class="testimonial-section">
      <h1 class="testimonial-heading"><span><?php echo $testimonialname->labels->name; ?></span></h1>
      <span class="top-desc">See what Book enthusiasts and book lovers around the globe have to say about us</span>
      <div class="testimonial-wrap">
        <div class="testimonial-main">
          <?php

            if($testimonialData->have_posts()) {
              while($testimonialData->have_posts()) {
                $testimonialData->the_post(); ?>
                  <div class="testimonial-col">
                    <p class="testimonial-star">
                      <?php
                      // Get the Star Rating of Testimonial
                        $testimonial_star_rating = get_field( 'wpex_testimonial_star_rating' );
                        if($testimonial_star_rating) {
                          for( $i = 1; $i <= $testimonial_star_rating; $i++) {
                            echo '<i class="fas fa-star"></i>';
                          }  
                        }
                      ?>
                    </p>
                    <p class="testimonial-desc"><?php the_content(); ?></p>
                    <div class="testimonial-client-box">
                      <div class="client-detail">
                        <p class="client-name"><?php the_title(); ?></p>
                        <p class="client-designation"><?php echo get_field('wpex_testimonial_client_designation'); ?></p>
                      </div>
                      <div class="client-img-box">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'client-img')); ?>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }

          ?>
        </div>
      </div>
    </section>

    <?php
    $output = ob_get_contents();

    ob_clean();

    return $output;
  }
  add_shortcode( 'home_testimonialSection', 'wpex_testinmonial_shortcode' );
}