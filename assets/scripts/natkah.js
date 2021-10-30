

WebFont.load({
    google: {
        families: ['Crimson+Pro:wght@300;400;500;600;700;800;900&display=swap&subset=latin-ext']
    }
});

(adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7132687191086887",
    enable_page_level_ads: true
});

// Analytics 
window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'G-67DGC1MGCF');
// Analytics
$(document).ready(function () {
    // (function ($) {
    //     $.fn.visible = function (partial) {
    //         var $t = $(this),
    //             $w = $(window),
    //             viewTop = $w.scrollTop(),
    //             viewBottom = viewTop + $w.height(),
    //             _top = $t.offset().top,
    //             _bottom = _top + $t.height(),
    //             compareTop = partial === true ? _bottom : _top,
    //             compareBottom = partial === true ? _top : _bottom;
    //         return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    //     };
    // })(jQuery);

    // var win = $(window);
    // var allMods = $(".content-item");
    // allMods.each(function (i, el) {
    //     var el = $(el);
    //     if (el.visible(true)) {
    //         el.addClass("already-visible");
    //     }
    // });
    // win.scroll(function (event) {
    //     allMods.each(function (i, el) {
    //         var el = $(el);
    //         if (el.visible(true)) {
    //             el.addClass("come-in");
    //         }
    //     });
    // });

    $(".side-panel-close").click(function () {
        $(".mobile-menu-icon").click();
    });

    $(".mobile-menu-icon").click(function () {
        if (!$('.side-panel').hasClass("open")) {
            $('.side-panel').addClass("open");
            $("body").css("overflow", "hidden");
            $(".side-panel").show();
            $(".side-panel").animate({ left: "0" }, 600)
        }
        else {
            $('.side-panel').removeClass("open");
            $(".side-panel").animate({ left: -$(window).width() }, 600, function () {
                $("body").css("overflow-y", "auto");
                $(".side-panel").hide()
            })
        }
    });

    $('.page-content-text .post-word').each(function (a, index) {
        $(this).wrapInner("<span></span>")
        $(this).append('<div class="post-featured"><div class="copy-text"><i class="far fa-copy"></i> Kopyala</div><div class="facebook-share"><i class="fab fa-facebook-f"></i></div><div class="twitter-share"><i class="fab fa-twitter"></i></div></div><div class="pinterest-share"><i class="fab fa-pinterest"></i></div></div>');
        $('.copy-text').click(function (e) {
            var _text = $(this).closest(".post-word").children("span").html()
            e.preventDefault();
            var element = document.createElement("input");
            element.type = 'text';
            element.value = _text;
            element.style.position = "fixed";
            document.body.append(element);
            element.select();
            document.execCommand("copy");
            document.body.removeChild(element);
            $(this).text('Kopyalandı!');
        });

    });
    $('.page-content-text .post-word .facebook-share').on('click', function () {
        var _url = window.location.href;
        var _text = $(this).closest(".post-word").children("span").html()
        window.open(' https://www.facebook.com/sharer.php?u=' + _url + '&t=' + _text + '', '_blank');
    });
    $('.page-content-text .post-word .twitter-share').on('click', function () {
        var _url = window.location.href;
        var _text = $(this).closest(".post-word").children("span").html()
        window.open(' https://twitter.com/intent/tweet?url=' + _url + '&text=' + _text + '', '_blank');
    });
});
