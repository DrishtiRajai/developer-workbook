<?php get_header(); 
/**
 * This is Front-page or Home Page of our Website
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online Bookstore

 */
?>

<!-- Hero Section starts -->
<section class="hero-banner">
  <div class="hero-text">
    <h1>Welcome to <span>Clevr.</span></h1>
    <p><?php echo get_theme_mod( 'headertext_setting' ); ?></p>
  </div>
</section>
<!-- Hero Section ends -->

<!-- Home Page Retaled Shortcode Section starts -->
  <?php 
  
    if( have_posts(  ) ) {
      while( have_posts(  ) ) {
        the_post();
        the_content();
      }
    }
      
  ?>
<!-- Home Page Retaled Shortcode Section ends -->


<?php get_footer(); 