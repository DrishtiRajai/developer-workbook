<?php
/**
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online-Book-store
 */

get_header(); ?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <section class="trending-page-wrapper">
        <div class="trending-week">
          <h1 class="trend-heading">Book Details</h1>
          <p class="trend-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br> tempor incididunt ut labore et dolore magna aliqua</p>
        </div>
        <div class="trending-main-row">
          <?php
          if ( have_posts() ) {
            while(have_posts()) {
              the_post();
              ?>
              <div class="trending-col">
  
                <span class="image-trend">
                  <?php the_post_thumbnail( 'full', array('class' => 'featured-img-trend') ) ; ?>
                </span>
                <h1 class="trend-book-para"><?php the_title(); ?></h1>


              </div> 
              <?php
            }
            wp_reset_postdata();
          } else {
            ?>
            <div class="trending-col">
              <h2 class="trend-book-title"><?php echo "Sorry! No Trending Book Records Available..."; ?></h2>
            </div>
            <?php
          }
          ?>
        </div>
    </section>
  </main><!-- #main -->
</div><!-- #primary -->
		
<?php get_footer(); 