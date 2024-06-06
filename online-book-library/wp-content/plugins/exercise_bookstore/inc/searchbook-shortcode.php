<?php

/**
 * Shortcode for Search page of searching books with filter options 
*/

if( !function_exists( 'wpex_book_listing_shortcode' ) ) {
  function wpex_book_listing_shortcode() {
    ob_start();
    
    // Getting book category for search books
    $searchBook_catArr = [];
    $searchBook_cat_value = $_GET['category'];

    if( $searchBook_cat_value ) {
      foreach( $searchBook_cat_value as $cat ) {
        array_push( $searchBook_catArr, $cat );
      }
    }

    if( isset( $searchBook_catArr ) && !empty( $searchBook_catArr ) ) {
      $serchBookCat_query = array (
        'taxonomy' => 'book_category',
        'field' => 'name',
        'terms' => $searchBook_catArr,
      );
    } else {
      $serchBookCat_query = "";
    }
   
     // Getting book publisher for search books
     $searchBook_publisherArr = [];
     $searchBook_publisher_value = isset($_GET['publisher']) ? $_GET['publisher'] : array();
     
     if (is_array($searchBook_publisher_value)) {
         foreach ($searchBook_publisher_value as $publisher) {
             array_push($searchBook_publisherArr, $publisher);
         }
     }
     
     if (isset($searchBook_publisherArr) && !empty($searchBook_publisherArr)) {
         $serchBookPublisher_query = array(
             'taxonomy' => 'book_publisher',
             'field' => 'name',
             'terms' => $searchBook_publisherArr
         );
     } else {
         $serchBookPublisher_query = "";
     }

    // Get Book Name From Home Page for Search
    if( isset($_GET['search-book-name']) ) {
      $searchBookName = $_GET['search-book-name'];
    } else {
      $searchBookName = "";
    }


    // Get start rating of books for search 
    if( isset($_GET['rating']) && $_GET['rating'] !== 'any' ) {
      $searchStarRating = $_GET['rating'];
    } else {
      $searchStarRating = "";
    }

    // Get start rating of books for year 
    $searchBook_yearArr = [];
$searchBook_year_value = isset($_GET['book_year']) ? $_GET['book_year'] : array();

if (is_array($searchBook_year_value)) {
    foreach ($searchBook_year_value as $book_years) {
        array_push($searchBook_yearArr, $book_years);
    }
}

// Get combine data of year and publisher 
if (!empty($searchBook_yearArr) && !empty($searchBook_publisherArr)) {
    $meta_or_tax = TRUE;
} else {
    $meta_or_tax = FALSE;
}

    // Get Book listing by getting value from search filter
    $search_args = array (
        'post_type' => 'book',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        's' => $searchBookName,
        '_meta_or_tax' => $meta_or_tax,
        'meta_query' => array(
          'relation' => 'OR',
          array(
              'key'     => 'wpex_book_star_rating',
              'value'   => $searchStarRating,
              'compare' => '==',
          ),
          array(
            'key'     => 'wpex_book_year',
            'value'   => $searchBook_yearArr,
            'compare' => 'IN',
          ),
          array(
            'relation' => 'AND',
            array(
                'key'     => 'wpex_book_price',
                'value'   => $_GET['price1'],
                'compare' => '>=',
                'type' => 'number',
            ),
            array(
                'key'     => 'wpex_book_price',
                'value' => $_GET['price2'],
                'compare' => '<=',
                'type' => 'number',
            ), 
          ),         
        ),
        'tax_query' => array (
        'relation' => 'OR',
        $serchBookCat_query,
        $serchBookPublisher_query
      )
    );

    $seachBookListing = new WP_Query( $search_args );
   
    ?>
  
    <section class="search-book-url-section">
      <div class="search-top-url">
        <a class="search-top-home-url" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home/ </a>
        <a class="search-top-book-url" href="<?php echo esc_url( home_url( '/search-book-page' ) ); ?>">Books</a>
      </div>
    </section>
    <section class="search-book-listing-section">
      <form method="get" action="<?php echo esc_url( home_url( '/search-book-page' ) ); ?>" class="form-filter-col">
        <h1 class="search-main-heading-filter">Filter</h1>
        <h2 class="search-cat-heading">Categories</h2>

        <div class="search-category-list">
          <?php
          // Get the List Of Book Category
          $searchBook_category = get_terms ( array (
              'taxonomy' => 'book_category',
              'hide_empty' => true
          ));

          if( $searchBook_category ) {
            foreach( $searchBook_category as $search_cat ) {
              echo '<label><input name="category[]" type="checkbox" value="'.$search_cat->slug.'">'.$search_cat->name.'<span class="searchcheckbtn"></span></lable>';
            }
          }

          ?>
        </div>

        <h2 class="search-publisher-heading">Publisher</h2>
        <div class="search-publisher-list">
          <?php
            // Get the List of Book Publisher
            $searchBook_publisher = get_terms( array (
              'taxonomy' => 'book_publisher',
              'hide_empty' => true
            ));

            if( $searchBook_publisher ) {
              foreach( $searchBook_publisher as $search_publisher ) {
                echo '<label><input name="publisher[]" type="checkbox" value="'.$search_publisher->slug.'">'.$search_publisher->name.'<span class="searchcheckbtn"></span></lable>';
              }
            }

          ?>
        </div>

        <h2 class="search-year-heading">Year</h2>
        <div class="search-year-list">

          <?php 
            for($i=2001; $i<=2005; $i++) {
              echo '<label><input name="book_year[]" type="checkbox" value="'.$i.'">'.$i.'<span class="searchcheckbtn"></span></lable>';
              
            }
          ?>
        </label>
        </div>
            
        <div class="search-refile-btn">
          <button type="submit" class="search-refile">Refile Search</button>
          <button type="reset" class="search-refile">
            <a href="<?php echo esc_url( home_url( '/search-book-page' ) ); ?>">Reset Filter</a>
          </button>
        </div>
      </form>

      <div class="search-book-filter-wrap">
        <div class="search-filter-head-text">
          <h1 class="search-book-heading">Books</h1>
          <p class="search-book-desc">Over 475+ books available here, find it now!</p>
        </div>
      

        <div class="search-book-list-main">
          <?php

          if( $seachBookListing->have_posts() ) {
            while( $seachBookListing->have_posts() ) {
              $seachBookListing->the_post();
              ?>
              <div class="search-book-list-col">

                <span class="search-book-img-block">
                  <?php the_post_thumbnail( 'medium', array( 'class' => 'search-book-img' ) ); ?>
                  <div class="book-icons">
                    <i class="fa fa-heart search-book-heart-icon"></i>
                    <i class="fa fa-search search-book-search-icon"></i>
                    <img class="cart-filter-image" src="<?php echo plugins_url('exercise_bookstore/assets/image/cart-filter.png') ?>" alt="cart-filter">
                  </div>
                </span>

                <span class="star-filter-book">
                  <?php
                    // Get Star Rating 
                    $book_star_rating = get_field('wpex_book_star_rating');

                    if($book_star_rating) {
                      for( $i = 1; $i <= $book_star_rating; $i++) {
                        echo '<i class="fas fa-star"></i>';
                      }  
                    }
                  ?>
                </span>

                <span class="search-filter-cat">
                  <?php
                    // Get name of book category
                    $search_book_cat = get_the_terms( get_the_ID(), 'book_category' );
                    if ($search_book_cat) {
                      foreach($search_book_cat as $book_cat) {
                        echo '<span>' . $book_cat->name. '</span>';
                      } 
                    }
                  ?>
                </span>

                <h2 class="search-filter-title"><?php the_title(); ?></h2>

                <p class="search-filter-author">
                  <?php
                    //Get name of Book Author
                    $search_book_author = get_the_terms( get_the_ID(), 'book_author' );
                    
                    if ($search_book_author) {
                        foreach($search_book_author as $book_author) {
                          echo '<span>' . $book_author->name. '</span>';
                        } 
                    }
                  ?>
                </p>

                <span class="search-price-filter">
                  <?php

                  // Get the price 
                  $searchBook_price = get_field( 'wpex_book_price' );

                  if( $searchBook_price ) {
                    echo '<span>$'.$searchBook_price.'</span>';
                  } 

                  // Get the Discount Price
                  $searchBook_discountPrice = get_field( 'wpex_book_price_with_discount' );

                  if( $searchBook_discountPrice ) {
                    echo '<span class="searchBook-rated-price">$'.$searchBook_discountPrice.'</span>';
                  } else {
                    echo '<span class="searchBook-rated-price"></span>';
                  }
                  ?> 

                </span>

              </div>
              <?php
            } 
            wp_reset_postdata();
          } else { ?>
             <div class="search-book-list-col">
               <h2><?php echo "Sorry! There is No Books matches with your search Filter..."; ?></h2>
               <h3><?php echo "Please try again."; ?></h3>
             </div>
            <?php
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
  add_shortcode( 'search_bookListingSection', 'wpex_book_listing_shortcode' );
}

/*
* Shortcode for May be You Like it Section for Search Page
*/

if( !function_exists( 'wpex_book_mayBeULike_shortcode' ) ) {
  function wpex_book_mayBeULike_shortcode() {
    ob_start();

    // Getting book category for search books
    $searchBook_catArr = [];
    $searchBook_cat_value = $_GET['category'];

    if( $searchBook_cat_value ) {
      foreach( $searchBook_cat_value as $cat ) {
        array_push( $searchBook_catArr, $cat );
      }
    }

    if( isset( $searchBook_catArr ) && !empty( $searchBook_catArr ) ) {
      $serchBookCat_query = array (
        'taxonomy' => 'book_category',
        'field' => 'name',
        'terms' => $searchBook_catArr,
      );
    } else {
      $serchBookCat_query = "";
    }
   
     // Getting book publisher for search books
     $searchBook_publisherArr = [];
$searchBook_publisher_value = isset($_GET['publisher']) ? $_GET['publisher'] : array();

if (is_array($searchBook_publisher_value)) {
    foreach ($searchBook_publisher_value as $publisher) {
        array_push($searchBook_publisherArr, $publisher);
    }
}

if (isset($searchBook_publisherArr) && !empty($searchBook_publisherArr)) {
    $serchBookPublisher_query = array(
        'taxonomy' => 'book_publisher',
        'field' => 'name',
        'terms' => $searchBook_publisherArr
    );
} else {
    $serchBookPublisher_query = "";
}

     // Get Book Name From Home Page for Search
    if( isset($_GET['search-book-name']) ) {
      $searchBookName = $_GET['search-book-name'];
    } else {
      $searchBookName = "";

    }

    // Get top 10 related book from search filter 
    $args = array (
      'post_type' => 'book',
      'post_status' => 'publish',
      's' => $searchBookName,
      'posts_per_page' => 5,
      'meta_key' => 'wpex_book_star_rating',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'tax_query' => array (
       'relation' => 'OR',
       $serchBookCat_query,
       $serchBookPublisher_query
      )
    );
  

    $mayBeULike = new WP_Query( $args );

    ?>
    <section class="search-maybelike-wrap">
      <div class="search-maybe-col-wrap">
        <h1 class="search-maybe-heading-text">Maybe You Like it</h1>
        <span class="viewmore">View more <i class="fa fa-arrow-right"></i></span>
        <div class="search-maybe-main">
          <?php
          if( $mayBeULike->have_posts() ) {
            while( $mayBeULike->have_posts() ) {
              $mayBeULike->the_post(); ?>
              <div class="search-maybe-col-main">

                <div class="maybe-left-col">
                  <span class="maybe-book-img-block">
                    <?php the_post_thumbnail( 'medium', array( 'class' => 'maybe-book-img' ) ); ?>
                  </span>
                </div>

                <div class="maybe-right-col">

                  <span class="maybe-category-name">
                    <?php
                      // Get the Book Category
                      $maybeBookCategory = get_the_terms( get_the_ID(), 'book_category' );

                      if( $maybeBookCategory ) {
                        foreach( $maybeBookCategory as $maybe_cat ) {
                          echo '<span>'.$maybe_cat->name.'</span>';
                        }
                      }
                    ?>
                  </span>

                  <span class="maybe-book-rating">
                    <i class="fas fa-star"></i>
                    <?php 
                    //Get the Star Rating of Books
                     echo get_field( 'wpex_book_star_rating' );

                    ?>
                  </span>

                  <h2 class="maybe-book-title"><?php the_title(); ?></h2> 

                  <p class="maybe-book-author">
                    <?php
                      //Get name of Book Author
                      $maybebook_author = get_the_terms( get_the_ID(), 'book_author' );
                      
                      if ($maybebook_author) {
                          foreach($maybebook_author as $books_author) {
                            echo '<span>' . $books_author->name. '</span>';
                          } 
                      }
                    ?>      
                  </p>

                  <p class="maybe-price">
                    <?php
                      // Get the Discount Price
                      $maybe_discountPrice = get_field( 'wpex_book_price_with_discount' );

                      if( $maybe_discountPrice ) {
                        echo '<span>$'.$maybe_discountPrice.'</span>';
                      } else {
                        echo '<span>$5.00</span>';
                      }

                      // Get the price 
                      $maybe_price = get_field( 'wpex_book_price' );

                      if( $maybe_price ) {
                        echo '<span class="price">$'.$maybe_price.'</span>';
                      } 

                    ?>
                  </p>

                </div>

              </div>
              <?php
            }
            wp_reset_postdata();
          } else {
            ?>
             <div class="search-maybe-col-main">
               <h2><?php echo "Sorry! No data available..."; ?></h2>
             </div> 
            <?php
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
  add_shortcode( 'search_mayBeULikeSection', 'wpex_book_mayBeULike_shortcode' );
}