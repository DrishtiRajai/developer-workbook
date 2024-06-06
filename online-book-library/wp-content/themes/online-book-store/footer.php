<footer class="footer">

  <section class="footer-top-section" style="background-color: <?php echo get_theme_mod('footer_background_color'); ?>">
    <div class="footer-top-wrapper">
      <div class="footer-main">
        <div class="footer-col">
          <div class="footer-inner-col">
            <img class="footer-shop-img" src="<?php bloginfo('template_url'); ?>/assets/image/footer-shop.png" alt="footer-shop">
            <h1 class="footer-shop-num">268</h2>
          </div>
          <p class="footer-shop">Our stores around the world</p>
        </div>
        <div class="footer-col">
          <div class="footer-inner-col">
            <img class="footer-shop-img" src="<?php bloginfo('template_url'); ?>/assets/image/footer-group.png" alt="footer-group">
            <h1 class="footer-shop-num">25,634</h2>
          </div>
          <p class="footer-shop">Our happy customers</p>
        </div>
        <div class="footer-col">
          <div class="footer-inner-col">
            <img class="footer-shop-img" src="<?php bloginfo('template_url'); ?>/assets/image/footer-book.png" alt="footer-book">
            <h1 class="footer-shop-num">68+k</h2>
          </div>
          <p class="footer-shop">Book Collections</p>
        </div>
      </div>
    </div>
  </section>

  <div class="footer-container">
    <div class="newslater-box">
      <div class="news-col">
        <h1 class="sub-footer-heading">Subscribe our newsletter for newest books updates</h1>
      </div>
      <div class="news-col">
        <input type="text" id="email" class="footer-sub-input" placeholder="Type your email here">
        <button class="footer-sub-btn" type="submit" onclick="emailvalidation();">SUBSCRIBE</button>
        <span class="errormsg" name="submit" id="errormsg" hidden>Please provide a valid email</span>
      </div>      
    </div>
  </div>

  <div class="container">
    <div class="footer-followus-row">

      <div class="footer-followus-col">
        <?php  
              $custom_logo_id = get_theme_mod('footer_logo');
              $logo = wp_get_attachment_image_src($custom_logo_id);

        ?>
        <img class="footer-logo-btn" src="<?php echo get_theme_mod('footer_logo');; ?>" alt="footer-clevr-logo">
        <p class="footer-clevr-desc">Clevr is a online bookstore website that sells all genres of books from around the world. Find your book here now</p>
        <h1 class="footer-followus-heading">Follow Us</h1>
        <div class="follow-inline-logos">
          <?php
            // Get Sidebar data from admin dashboard side
            dynamic_sidebar( 'footer_sidebar' ); 
          ?>
        </div>
      </div>

      <div class="footer-followus-col menu">
        <h1 class="footer-quick-link">Quick Links</h1>
        <?php
        
          // Displays custom Footer Menu which is created admin dashboard side 
          wp_nav_menu(array(
            'theme_location' => 'footer_menu',
            'link_before' => '<ul class="footer-menu-link">',
            'link_after' => '</ul>'
          )); 
        ?>
      </div>

      <div class="footer-followus-col customer">
        <h1 class="footer-customer-area">Customer Area</h1>
        <?php
        
          // Displays custom Footer Menu which is created admin dashboard side 
          wp_nav_menu(array(
            'theme_location' => 'secondary_footer_menu',
            'link_before' => '<ul class="footer-menu-link">',
            'link_after' => '</ul>'
          ));
        ?>
      </div>

      <div class="footer-followus-col subscriber">
        <h1 class="footer-subs-heading">Don’t miss the newest books</h1>
        <p class="footer-subs-para">
          Enter your email below and get access to amazing suggestions of trending and classic books.
        </p>
        <div class="inline-btn-input">
          <input type="text" name="footer_email" id="footer_email" class="subs-input-footer" placeholder="Type your email here">
          <button type="submit" onclick="emailvalidationForFooter()" class="footer-subs-btn">Subscribe</button>
          <span class="errormsgtext" name="submit" id="errormsgtext" hidden>Please provide a valid email</span>
        </div>
      </div>

    </div>
    <div class="footer-copyright">
      <p class="copyright-text"><?php echo get_theme_mod('text_setting'); ?></p>
      <p class="peterdraw-text"><?php echo get_theme_mod('other_text_setting'); ?></p>
    </div>
  </div>
  
</footer>

<?php wp_footer(); ?>

</body>
</html>