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
    
    <?php
      
      if( have_posts() ) {
        while( have_posts() ) {
          the_post();
          the_content();
        }
      }
								
    ?>
  </main><!-- #main -->
</div><!-- #primary -->
		
<?php get_footer(); 