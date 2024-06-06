<?php
/**
 * Created shortcode for showing search panel on front side of home page hero banner
 */ 
if ( !function_exists('wpex_bookSearch_shortcode') ) {
  function wpex_bookSearch_shortcode() {
    ob_start();
    ?>
    <div class="search-container">
      <div class="search-option">
        <form class="book-search-form" method="get" action="<?php echo esc_url( home_url('/search-book-page') ); ?>">
          <div class="filter-option">
            <!-- Search By Year -->
            <select class="year-details" name="book_year">
              <option>Year</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
            </select>
            <!-- Search By Publisher -->
            <select class="publisher-details" name="publisher">
              <option>Publisher</option>
        
              <?php
                $book_publisher = get_terms( array(
                    'taxonomy' => 'book_publisher',
                    'hide_empty' => true,
                ) );
              
                if ($book_publisher) {
                    foreach($book_publisher as $books_publisher) {
                      echo '<option  value="'.$books_publisher->slug .'">' . $books_publisher->name. '</option>';

                    } 
                }
                ?>
            </select>
            <!-- Search By Price Range -->
            <div class="bottom-filter-option">
              <div class="price-wrap">
                <p class="price-head">Price Range:</p>
                  <div class="input">
                    <input type="number" name="price1" class="price1" >
                    <input type="number" name="price2" class="price2" >
                  </div>
              </div>
              <!-- Search By Star Rating -->
              <div class="star-rating">
                <span class="rating-head">Star Rating:</span>
                <select class="rating-star-wrap" name="rating">
                  <option value="any">Any</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>
          </div>
          <!-- Search By Book Name -->
          <div class="input-field">
            <input placeholder="Enter book name here.." class="search-hero-banner" type="text" name="search-book-name"  >
            
            <div class="search-btn-after"> 
              <button type="submit" class="hero-banner-search">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
      
    $output = ob_get_contents();

    ob_clean();

    return $output;
  }
  add_shortcode( 'home_bookSearchPanel', 'wpex_bookSearch_shortcode' );
}

/*
* Created shortcode for showing Trending This Week Books on home page
*/

if( !function_exists( 'wpex_booktrending_shortcode' ) ) {
  
  function wpex_booktrending_shortcode() {
    ob_start();

    // Get Data of most viewed Books
    $args = array(
      'post_type' => 'book',
      'post_status' => 'publish',
      'posts_per_page' => 5,
      'orderby' => 'title', 
      'order' => 'ASC', 
      'meta_query' => array(
        array(
            'key'     => 'wpex_book_views',
            'value'   => 20,
            'compare' => '>=',
            'type' => 'NUMERIC'
        ),
      )
    );

    $viewedBookData = new WP_Query( $args );

    ?>
    <section class="trending-page-wrapper">
    	<div class="trending-week">
    		<h1 class="trend-heading">Trending this week</h1>
    		<p class="trend-para">Find out the latest trending and most loved readers choices here. Handpicked just for you. </p>
    	</div>
    	<div class="trending-main-row">
        <?php
        if ( $viewedBookData->have_posts() ) {
          while($viewedBookData->have_posts()) {
            $viewedBookData->the_post();
            ?>
            <div class="trending-col">
            <span class="trending-rating">
              <?php 
                //Get Star Rating
                $trending_star_rating = get_field( 'wpex_book_star_rating' );
                if($trending_star_rating) {
                  for( $i = 1; $i <= $trending_star_rating; $i++) {
                    echo '<i class="fas fa-star"></i>';
                  }  
                }
              ?>
              </span>
              <span class="image-trend">
                <?php the_post_thumbnail( 'full', array('class' => 'featured-img-trend') ) ; ?>
              </span>
              <h2 class="trend-book-title">
                <?php
                // Get name of Book Category
                $book_category = get_the_terms( get_the_ID(), 'book_category' );
                
                if ($book_category) {
                    foreach($book_category as $books_category) {
                      echo '<span>' . $books_category->name. '</span>';
                    } 
                }
                ?>
              </h2>
              <h1 class="trend-book-para"><?php the_title(); ?></h1>
              <p class="trend-book-author">
                <?php
                //Get name of Book Author
                $book_author = get_the_terms( get_the_ID(), 'book_author' );
                
                if ($book_author) {
                    foreach($book_author as $books_author) {
                      echo '<span>' . $books_author->name. '</span>';
                    } 
                }
                ?>
      
              </p>
              <button class="trend-btn">
                <?php
                // Get Price of Book from Custom Field
                $book_price = get_field( "wpex_book_price" );
      
                if( $book_price ) {
                  echo '$'.$book_price;
                }
                ?>
              </button>
              <span class="trend-price-dis">
                <?php
                // Get discount Price of Book from Custom Field
                  $discount_price = get_field( "wpex_book_price_with_discount" );

                  if($discount_price) {
                    $discount_price = '$'.$discount_price;
                  } else {
                    $discount_price = '';
                  }

                  echo $discount_price;
                ?>
              </span>
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
      <?php
      $output = ob_get_contents();

      ob_clean();

      return $output;
  }
  add_shortcode( 'home_bookTrendingThisWeek', 'wpex_booktrending_shortcode' );
}

/*
* Shortcode for Display Categories of Books
*/

if( !function_exists('wpex_book_categories_shortcode') ) {
  function wpex_book_categories_shortcode() {
    ob_start(); ?>
    <div class="category-block">
      <h1 class="category-header-text">Categories</h1>
      <div class="category-row">
        <?php
          // Get the List Of Book Category
          $cat_book_list = get_terms( array(
            'taxonomy' => 'book_category',
            'hide_empty' => false,
          ) );

          if( $cat_book_list ) {
            foreach( $cat_book_list as $cat_book ) {

              ?>
              <div class="category-main">
                <h1 class="cat-header-name"><?php echo $cat_book->name; ?></h1>
                <p class="cat-book-count"><?php echo $cat_book->count.'+ Item'; ?></p>
              </div>
              <?php
            }
          }
        ?>
      </div>
    </div>
  <?php

    $output = ob_get_contents();

    ob_clean();

    return $output;
  }

  add_shortcode( 'home_BookCategoriesSection', 'wpex_book_categories_shortcode' );
}


/*
* Shortcode For Top 10 Rated Books displayed in Front page.
*/

if( !function_exists('wpex_books_top_rated_shortcode') ) {
  function wpex_books_top_rated_shortcode() {
    ob_start();
  
    $args = array (
      'post_type' => 'book',
      'post_status' => 'publish',
      'meta_key' => 'wpex_book_star_rating',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
    );

    $topRatedBooks = new WP_Query( $args );

    ?>
    <div class="top-rated-books-block">
      <div class="top-rated-wrapper">
        <h1 class="top-rated-header-text">10 Top Rated Books</h1>
        <div class="top-rated-viewmore">
          View more <i class="fa fa-arrow-right"></i>
        </div>
        <div class="top-rated-book-main">
          <?php
            if( $topRatedBooks->have_posts() ) {
              while( $topRatedBooks->have_posts() ) {
                $topRatedBooks->the_post();
                ?>
                <div class="top-rated-book-col">

                  <span class="top-rated-img-box">
                    <?php the_post_thumbnail( 'medium', array( 'class' => 'top-rated-img' ) ); ?> 
                  </span>

                  <div class="top-rated-rating-section">
                    <?php 
                    //Get the Star Rating in Descending order
                      $topRated_star_rating = get_field( 'wpex_book_star_rating' );
                      if($topRated_star_rating) {
                        for( $i = 1; $i <= $topRated_star_rating; $i++) {
                          echo '<i class="fas fa-star"></i>';
                        }  
                      }
                    ?>
                  </div>
                  <h2 class="top-rated-book-title"><?php the_title(); ?></h2> 
                  <p class="top-rated-book-author">
                    <?php
                    //Get name of Book Author
                    $topRatedbook_author = get_the_terms( get_the_ID(), 'book_author' );
                    
                    if ($topRatedbook_author) {
                        foreach($topRatedbook_author as $rated_books_author) {
                          echo '<span>' . $rated_books_author->name. '</span>';
                        } 
                    }
                    ?>          
                  </p>
                  <button class="top-rated-btn">
                    <?php
                      // Get the Discount Price
                      $topRated_discountPrice = get_field( 'wpex_book_price_with_discount' );

                      if( $topRated_discountPrice ) {
                        echo '<span class="rated-price">$'.$topRated_discountPrice.'</span>';
                      } else {
                        echo '<span class="rated-price">$0.00</span>';
                      }

                      // Get the price 
                      $topRated_price = get_field( 'wpex_book_price' );

                      if( $topRated_price ) {
                        echo '<span>$'.$topRated_price.'</span>';
                      } 

                    ?>
                    <img class="top-rated-cart-img" src="<?php echo plugins_url( 'exercise_bookstore/assets/image/cart.png' ) ?>" alt="cart-img">
                  </button>
                </div>
                <?php
              }
              wp_reset_postdata();
            } else {
              ?>
              <div class="top-rated-book-col">
                <h2><?php echo "Sorry! There is no Top 10 Rated Boos Available..."; ?></h2>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
    <?php
    $output = ob_get_contents();

    ob_clean();

    return $output;
  }
  add_shortcode( 'home_topRatedBooksSection', 'wpex_books_top_rated_shortcode' );
}

/*
*  Shortcode For Displaying Featured books in front page 
*/

if( !function_exists( 'wpex_book_featured_shortcode' ) ) {
  function wpex_book_featured_shortcode() {
    ob_start();
    // Get Featured Books - displays books whose tags is named featured

    $args = array (
      'post_type' => 'book',
      'post_status' => 'public',
      'orderby' => 'title',
      'order' => 'ASC',
      'tax_query'      => array(
        array(
            'taxonomy'  => 'post_tag',
            'field'     => 'slug',
            'terms'     => sanitize_title( 'featured' )
        )
      )
    );

    $featuredBookData = new WP_Query( $args );

    ?>
    <div class="featured-book-block">
      <div class="featured-book-wrapper">
        <h1 class="featured-book-header-text">Featured Book</h1>
        <div class="featured-viewmore">
          View more <i class="fa fa-arrow-right"></i>
        </div>
        <div class="featured-book-main">
          <?php
            if( $featuredBookData->have_posts() ) {
              while( $featuredBookData->have_posts() ) {
                $featuredBookData->the_post(); ?>
                  <div class="featured-book-col-main">

                    <div class="featured-book-col-top">
                      <span class="featured-book-img-block">
                        <?php the_post_thumbnail( 'medium', array( 'class' => 'featured-book-img' ) ); ?>
                      </span>
                    </div>

                    <div class="featured-book-col-bottom">
                      <span class="featured-book-cat">
                        <?php
                          // Get the Book Category
                          $featuredBookCategory = get_the_terms( get_the_ID(), 'book_category' );

                          if( $featuredBookCategory ) {
                            foreach( $featuredBookCategory as $featured_cat ) {
                              echo '<span>'.$featured_cat->name.'</span>';
                            }
                          }
                        ?>
                      </span>
                      <span class="featured-book-rating">
                        <?php 
                        //Get the Star Rating of Books
                          $featuredBook_star_rating = get_field( 'wpex_book_star_rating' );
                          if($featuredBook_star_rating) {
                            for( $i = 1; $i <= $featuredBook_star_rating; $i++) {
                              echo '<i class="fas fa-star"></i>';
                            }  
                          }
                        ?>
                      </span>
                      <span class="featured-book-reviews">356 Reviews</span>
                      <h2 class="featured-book-title"><?php the_title(); ?></h2>
                      <div class="featured-book-desc">
                        <?php echo substr(get_the_excerpt(), 0, 150); ?>
                      </div>
                      <span class="featured-book-price-block">
                        <?php

                        // Get the price 
                        $featured_price = get_field( 'wpex_book_price' );

                        if( $featured_price ) {
                          echo '<span>$'.$featured_price.'</span>';
                        } 

                        // Get the Discount Price
                        $featured_discountPrice = get_field( 'wpex_book_price_with_discount' );

                        if( $featured_discountPrice ) {
                          echo '<span class="featured-rated-price">$'.$featured_discountPrice.'</span>';
                        } else {
                          echo '<span class="featured-rated-price"></span>';
                        }
                      ?> 
                      </span>
                      <button class="featured-book-cart">
                        <img class="featured-cart-img" src="<?php echo plugins_url( 'exercise_bookstore/assets/image/cart-featured.png' ) ?>" alt="cart-featured">
                        Add to cart
                      </button>
                      <span class="featured-book-heart"><i class="fa fa-heart"></i></span>
                      <span class="featured-book-viewdetails">View Details</span>
                    </div>
                    
                  </div>
                <?php
              }
              wp_reset_postdata();
            } else {
              ?>
              <div class="featured-book-col">
                <h2><?php echo "Sorry! there is no Featured Books Available..."; ?></h2>
              </div>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
    <?php
    $output = ob_get_contents();

    ob_clean();

    return $output;
  }
  add_shortcode( 'home_featuredBooksSection', 'wpex_book_featured_shortcode' );
}