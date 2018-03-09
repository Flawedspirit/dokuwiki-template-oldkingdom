// Make table of contents stick to top of window when
// user scrolls down. The table fo contents will stay
// below the nav of its own accord.

var $toc    = $("#dw__toc");
var $window = $(window);
var offset  = $toc.offset();

$window.scroll(function() {
    if($window.scrollTop() > offset.top) {
        $toc.addClass('fix-toc');
    } else {
        $toc.removeClass('fix-toc');
    }
});