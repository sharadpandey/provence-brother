jQuery(document).ready(function () {
    
    var PortfolioOwl = jQuery('body').find(".PortfolioCarousel");
    if (PortfolioOwl.length >= 1) {
        $('.PortfolioCarousel').owlCarousel({
            loop: false
            , margin: 15
            , nav: true
            , responsive: {
                0: {
                    items: 1
                }
                , 600: {
                    items: 2
                }
                , 1000: {
                    items: 3
                }
            }
        });
    }
    jQuery("a[pd-data]").prepend("<span></span>");
    jQuery("button[pd-data]").prepend("<span></span>");
    jQuery(".img-with-border").prepend("<span class='top-border'></span><span class='bottom-border'></span>");
    var b = $("body");
    var h = $("header");
    var pos = h.position();
    $(window).scroll(function () {
        var windowpos = $(window).scrollTop();
        if (windowpos >= 120) {
            b.addClass("p59");
            h.addClass("stick");
        }
        else {
            b.removeClass("p59");
            h.removeClass("stick");
        }
    });
});
jQuery(function () {
    jQuery("[pd-data]").on('mouseenter', function (e) {
        var parentOffset = jQuery(this).offset()
            , relX = e.pageX - parentOffset.left
            , relY = e.pageY - parentOffset.top;
        $(this).find('span').css({
            top: relY
            , left: relX
        })
    }).on('mouseout', function (e) {
        var parentOffset = jQuery(this).offset()
            , relX = e.pageX - parentOffset.left
            , relY = e.pageY - parentOffset.top;
        $(this).find('span').css({
            top: relY
            , left: relX
        })
    });
    jQuery('a[pd-data]').click(function () {
        return false
    });
});