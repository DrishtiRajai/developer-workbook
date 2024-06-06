=== BookStore Plugin ===
Contributors: Drishti
Tags:  slider, acf, Search Filter, Books  Author, Publisher, Star Rating, Category, Testimonial, Year, Price Range.
Donate link: http://multidots.com/
Requires at least: 5.0
Tested up to: 5.7
Requires PHP: 7.0
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Short description of this great plugin. No more than 150 characters, no markup.

== Description ==
This Plugin is making for Book which is custom post type and displaying all the functionality of Book. Also search filter functionality is given. You can search your book by Year, Publisher, Category, Book name and Star Rating. You can displaying your Featured Book, Trending this week books, Top Rated Books.

== Installation ==
1. Upload "exercise_bookstore.php" to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Place shortcode in page at admin dashboard side.

== Usage of Shortcode ==
1. You have to make Home page and assign it as a Front-page and Write down below shortcode :
  > [home_bookSearchPanel] : For Search panel at home banner part.
  > [home_bookTrendingThisWeek] : For displaying "Trending This Week" Section of Books 
  > [home_BookCategoriesSection] : for displaying Category section of books
  > [home_topRatedBooksSection] : For displaying Top Rated Books Sections
  > [home_featuredBooksSection] : For displaying Featured Book Section
  > [home_testimonialSection] : For displaying Testimonial Section, which is CPT of Testimonials 
2. You have to make "Search Book Page" and Write down below shortcode For Search Functionality:
  > [search_bookListingSection] : For displaying filter Book which is filtered by Category, Publisher, Rating, Year,    Price Range and Book Name. IT is a book Listing / Book Search result page.
  > [search_mayBeULikeSection] : For displaying Top Rated Book Section from Selected Filter.
    

= 0.1 =
* Initial release.

== Version Update Notice ==
= 5.0 =
You must update 5.0 WordPress version for this Plugin