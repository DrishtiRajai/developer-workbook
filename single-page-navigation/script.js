$(document).ready(function () {
  $(".navbar a").click(function () {
    var sectionId = $(this).attr("href");
    var offset = $(sectionId).offset().top; // Get the top offset of the target section
    var navbarHeight = $(".navbar").outerHeight(); // Get the height of the navbar

    var padding = 0;
    var adjustedOffset = offset - navbarHeight + padding;

    // Smoothly scroll to the adjusted offset
    $("html, body").animate(
      {
        scrollTop: adjustedOffset,
      },
      900
    );
    return false; // Prevent default anchor behavior
  });
});
