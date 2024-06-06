// JS for Toggle Section of Category

jQuery(document).ready(function() {
  jQuery( '.search-category-list' ).hide();
  jQuery( 'h2.search-cat-heading' ).click( function() {
    jQuery( 'h2.search-cat-heading' ).toggleClass('active-toggle');
    jQuery( '.search-category-list' ).slideToggle(1000).show();
  });
});

// JS for Toggle Section of Publisher

jQuery(document).ready(function() {
  jQuery( '.search-publisher-list' ).hide();
  jQuery( 'h2.search-publisher-heading' ).click( function() {
    jQuery( 'h2.search-publisher-heading' ).toggleClass('active-toggle');
    jQuery( '.search-publisher-list' ).slideToggle(1000).show();
  });
});


// JS for Toggle Section of Year

jQuery(document).ready(function() {
  jQuery( '.search-year-list' ).hide();
  jQuery( 'h2.search-year-heading' ).click( function() {
    jQuery( 'h2.search-year-heading' ).toggleClass('active-toggle');
    jQuery( '.search-year-list' ).slideToggle(1000).show();
  });
});