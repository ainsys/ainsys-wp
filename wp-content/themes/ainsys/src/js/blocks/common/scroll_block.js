( function( $ ) {
    (function() {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('scrollserv_wrapper').scrollLeft -= (delta*40); // Multiplied by 40
            e.preventDefault();
        }
        if (document.getElementById('scrollserv_wrapper').addEventListener) {
            // IE9, Chrome, Safari, Opera
            document.getElementById('scrollserv_wrapper').addEventListener("mousewheel", scrollHorizontally, false);
            // Firefox
            document.getElementById('scrollserv_wrapper').addEventListener("DOMMouseScroll", scrollHorizontally, false);
        } else {
            // IE 6/7/8
            document.getElementById('scrollserv_wrapper').attachEvent("onmousewheel", scrollHorizontally);
        }
    })();

    (function() {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('bundles_wrapper').scrollLeft -= (delta*40); // Multiplied by 40
            e.preventDefault();
        }
        if (document.getElementById('bundles_wrapper').addEventListener) {
            // IE9, Chrome, Safari, Opera
            document.getElementById('bundles_wrapper').addEventListener("mousewheel", scrollHorizontally, false);
            // Firefox
            document.getElementById('bundles_wrapper').addEventListener("DOMMouseScroll", scrollHorizontally, false);
        } else {
            // IE 6/7/8
            document.getElementById('bundles_wrapper').attachEvent("onmousewheel", scrollHorizontally);
        }
    })();
} )( jQuery );