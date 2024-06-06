<?php 

/**
 * This Page is desplaying when user enters incorrect url to our site
 */

get_header();
?>

<section class="notfound-block">
  <div class="not-found">
    <h1 class="not-found-text">Sorry! Page not Found.</h1>
    <p class="error-notfound">Error : 400</p>
    <p class="home-url-link"><a href="<?php echo esc_url( home_url('/') ); ?>">Go to Home Page</a></p>
  </div>
</section>

<?php get_footer();