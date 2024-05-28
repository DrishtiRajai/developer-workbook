$(document).ready(function () {
  // Open the first accordion
  var firstAccordion = $(".accordion").eq(0);
  var firstPanel = firstAccordion.next();

  // firstAccordion.addClass("active");
  // firstPanel.css("max-height", firstPanel.prop("scrollHeight") + "px");

  // Add click event listener to every accordion element
  $(".accordion").click(function () {
    var isActive = $(this).hasClass("active");
    var arrow = $(this).find(".arrow");

    // Close all accordions
    $(".accordion").removeClass("active");
    $(".arrow").removeClass("up");
    $(".panel").css("max-height", "");

    // Toggle active class and rotate arrow icon
    if (!isActive) {
      $(this).addClass("active");
      arrow.addClass("up");
    }

    // Toggle panel element
    var panel = $(this).next();
    var maxHeightValue = panel.css("max-height");

    if (maxHeightValue !== "0px") {
      panel.css("max-height", "");
    } else {
      panel.css("max-height", panel.prop("scrollHeight") + "px");
    }
  });
});

// Cross-browser way to get the computed height of a certain element.
// Credit to @CMS on StackOverflow (http://stackoverflow.com/a/2531934/7926565)
function getStyle(el, styleProp) {
  var value,
    defaultView = (el.ownerDocument || document).defaultView;
  // W3C standard way:
  if (defaultView && defaultView.getComputedStyle) {
    // sanitize property name to css notation
    // (hypen separated words eg. font-Size)
    styleProp = styleProp.replace(/([A-Z])/g, "-$1").toLowerCase();
    return defaultView.getComputedStyle(el, null).getPropertyValue(styleProp);
  } else if (el.currentStyle) {
    // IE
    // sanitize property name to camelCase
    styleProp = styleProp.replace(/\-(\w)/g, function (str, letter) {
      return letter.toUpperCase();
    });
    value = el.currentStyle[styleProp];
    // convert other units to pixels on IE
    if (/^\d+(em|pt|%|ex)?$/i.test(value)) {
      return (function (value) {
        var oldLeft = el.style.left,
          oldRsLeft = el.runtimeStyle.left;
        el.runtimeStyle.left = el.currentStyle.left;
        el.style.left = value || 0;
        value = el.style.pixelLeft + "px";
        el.style.left = oldLeft;
        el.runtimeStyle.left = oldRsLeft;
        return value;
      })(value);
    }
    return value;
  }
}
