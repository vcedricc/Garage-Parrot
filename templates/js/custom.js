(function($) {

    "use strict";

    // COUNTER NUMBERS
    jQuery('.counter-thumb').appear(function() {
        jQuery('.counter-number').countTo();
    });

    // BACKSTRETCH SLIDESHOW
    $('.hero-section').backstretch([
        "./image/slideshow/PexelsCar21.jpg",
        "./image/slideshow/PexelsCar22.jpg",
        "./image/slideshow/PexelsCar23.jpg",
        "./image/slideshow/PexelsCar24.jpg",
    ], { duration: 3000, fade: 750 });

    // CUSTOM LINK
    $('.smoothscroll').click(function() {
        var el = $(this).attr('href');
        var elWrapped = $(el);

        scrollToDiv(elWrapped);
        return false;

        function scrollToDiv(element) {
            var offset = element.offset();
            var offsetTop = offset.top;
            var totalScroll = offsetTop - navheight;

            $('body,html').animate({
                scrollTop: totalScroll
            }, 300);
        }
    });

})(window.jQuery);