// Make table of contents stick to top of window when
// user scrolls down. The table of contents will stay
// below the nav of its own accord

var $toc    = jQuery("#dw__toc"),
    $window = jQuery(window),
    offset  = $toc.offset(),
    top     = 86;

$window.scroll(function() {
    if($window.scrollTop() > offset.top) {
        $toc.addClass('fix-toc');
        jQuery('#dw__toc').css('width', jQuery('.col-md-3').width() + 'px');
    } else {
        $toc.removeClass('fix-toc');
        jQuery('#dw__toc').removeAttr('style');
    }
});