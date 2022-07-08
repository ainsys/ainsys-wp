"use strict";

/*! npm.im/object-fit-images 3.2.4 */
var objectFitImages = function () {
  'use strict';

  var OFI = 'bfred-it:object-fit-images';
  var propRegex = /(object-fit|object-position)\s*:\s*([-.\w\s%]+)/g;
  var testImg = typeof Image === 'undefined' ? {
    style: {
      'object-position': 1
    }
  } : new Image();
  var supportsObjectFit = ('object-fit' in testImg.style);
  var supportsObjectPosition = ('object-position' in testImg.style);
  var supportsOFI = ('background-size' in testImg.style);
  var supportsCurrentSrc = typeof testImg.currentSrc === 'string';
  var nativeGetAttribute = testImg.getAttribute;
  var nativeSetAttribute = testImg.setAttribute;
  var autoModeEnabled = false;

  function createPlaceholder(w, h) {
    return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" + w + "' height='" + h + "'%3E%3C/svg%3E";
  }

  function polyfillCurrentSrc(el) {
    if (el.srcset && !supportsCurrentSrc && window.picturefill) {
      var pf = window.picturefill._; // parse srcset with picturefill where currentSrc isn't available

      if (!el[pf.ns] || !el[pf.ns].evaled) {
        // force synchronous srcset parsing
        pf.fillImg(el, {
          reselect: true
        });
      }

      if (!el[pf.ns].curSrc) {
        // force picturefill to parse srcset
        el[pf.ns].supported = false;
        pf.fillImg(el, {
          reselect: true
        });
      } // retrieve parsed currentSrc, if any


      el.currentSrc = el[pf.ns].curSrc || el.src;
    }
  }

  function getStyle(el) {
    var style = getComputedStyle(el).fontFamily;
    var parsed;
    var props = {};

    while ((parsed = propRegex.exec(style)) !== null) {
      props[parsed[1]] = parsed[2];
    }

    return props;
  }

  function setPlaceholder(img, width, height) {
    // Default: fill width, no height
    var placeholder = createPlaceholder(width || 1, height || 0); // Only set placeholder if it's different

    if (nativeGetAttribute.call(img, 'src') !== placeholder) {
      nativeSetAttribute.call(img, 'src', placeholder);
    }
  }

  function onImageReady(img, callback) {
    // naturalWidth is only available when the image headers are loaded,
    // this loop will poll it every 100ms.
    if (img.naturalWidth) {
      callback(img);
    } else {
      setTimeout(onImageReady, 100, img, callback);
    }
  }

  function fixOne(el) {
    var style = getStyle(el);
    var ofi = el[OFI];
    style['object-fit'] = style['object-fit'] || 'fill'; // default value
    // Avoid running where unnecessary, unless OFI had already done its deed

    if (!ofi.img) {
      // fill is the default behavior so no action is necessary
      if (style['object-fit'] === 'fill') {
        return;
      } // Where object-fit is supported and object-position isn't (Safari < 10)


      if (!ofi.skipTest && // unless user wants to apply regardless of browser support
      supportsObjectFit && // if browser already supports object-fit
      !style['object-position'] // unless object-position is used
      ) {
        return;
      }
    } // keep a clone in memory while resetting the original to a blank


    if (!ofi.img) {
      ofi.img = new Image(el.width, el.height);
      ofi.img.srcset = nativeGetAttribute.call(el, "data-ofi-srcset") || el.srcset;
      ofi.img.src = nativeGetAttribute.call(el, "data-ofi-src") || el.src; // preserve for any future cloneNode calls
      // https://github.com/bfred-it/object-fit-images/issues/53

      nativeSetAttribute.call(el, "data-ofi-src", el.src);

      if (el.srcset) {
        nativeSetAttribute.call(el, "data-ofi-srcset", el.srcset);
      }

      setPlaceholder(el, el.naturalWidth || el.width, el.naturalHeight || el.height); // remove srcset because it overrides src

      if (el.srcset) {
        el.srcset = '';
      }

      try {
        keepSrcUsable(el);
      } catch (err) {
        if (window.console) {
          console.warn('https://bit.ly/ofi-old-browser');
        }
      }
    }

    polyfillCurrentSrc(ofi.img);
    el.style.backgroundImage = "url(\"" + (ofi.img.currentSrc || ofi.img.src).replace(/"/g, '\\"') + "\")";
    el.style.backgroundPosition = style['object-position'] || 'center';
    el.style.backgroundRepeat = 'no-repeat';
    el.style.backgroundOrigin = 'content-box';

    if (/scale-down/.test(style['object-fit'])) {
      onImageReady(ofi.img, function () {
        if (ofi.img.naturalWidth > el.width || ofi.img.naturalHeight > el.height) {
          el.style.backgroundSize = 'contain';
        } else {
          el.style.backgroundSize = 'auto';
        }
      });
    } else {
      el.style.backgroundSize = style['object-fit'].replace('none', 'auto').replace('fill', '100% 100%');
    }

    onImageReady(ofi.img, function (img) {
      setPlaceholder(el, img.naturalWidth, img.naturalHeight);
    });
  }

  function keepSrcUsable(el) {
    var descriptors = {
      get: function get(prop) {
        return el[OFI].img[prop ? prop : 'src'];
      },
      set: function set(value, prop) {
        el[OFI].img[prop ? prop : 'src'] = value;
        nativeSetAttribute.call(el, "data-ofi-" + prop, value); // preserve for any future cloneNode

        fixOne(el);
        return value;
      }
    };
    Object.defineProperty(el, 'src', descriptors);
    Object.defineProperty(el, 'currentSrc', {
      get: function get() {
        return descriptors.get('currentSrc');
      }
    });
    Object.defineProperty(el, 'srcset', {
      get: function get() {
        return descriptors.get('srcset');
      },
      set: function set(ss) {
        return descriptors.set(ss, 'srcset');
      }
    });
  }

  function hijackAttributes() {
    function getOfiImageMaybe(el, name) {
      return el[OFI] && el[OFI].img && (name === 'src' || name === 'srcset') ? el[OFI].img : el;
    }

    if (!supportsObjectPosition) {
      HTMLImageElement.prototype.getAttribute = function (name) {
        return nativeGetAttribute.call(getOfiImageMaybe(this, name), name);
      };

      HTMLImageElement.prototype.setAttribute = function (name, value) {
        return nativeSetAttribute.call(getOfiImageMaybe(this, name), name, String(value));
      };
    }
  }

  function fix(imgs, opts) {
    var startAutoMode = !autoModeEnabled && !imgs;
    opts = opts || {};
    imgs = imgs || 'img';

    if (supportsObjectPosition && !opts.skipTest || !supportsOFI) {
      return false;
    } // use imgs as a selector or just select all images


    if (imgs === 'img') {
      imgs = document.getElementsByTagName('img');
    } else if (typeof imgs === 'string') {
      imgs = document.querySelectorAll(imgs);
    } else if (!('length' in imgs)) {
      imgs = [imgs];
    } // apply fix to all


    for (var i = 0; i < imgs.length; i++) {
      imgs[i][OFI] = imgs[i][OFI] || {
        skipTest: opts.skipTest
      };
      fixOne(imgs[i]);
    }

    if (startAutoMode) {
      document.body.addEventListener('load', function (e) {
        if (e.target.tagName === 'IMG') {
          fix(e.target, {
            skipTest: opts.skipTest
          });
        }
      }, true);
      autoModeEnabled = true;
      imgs = 'img'; // reset to a generic selector for watchMQ
    } // if requested, watch media queries for object-fit change


    if (opts.watchMQ) {
      window.addEventListener('resize', fix.bind(null, imgs, {
        skipTest: opts.skipTest
      }));
    }
  }

  fix.supportsObjectFit = supportsObjectFit;
  fix.supportsObjectPosition = supportsObjectPosition;
  hijackAttributes();
  return fix;
}();
"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

!function (i) {
  "use strict";

  "function" == typeof define && define.amd ? define(["jquery"], i) : "undefined" != typeof exports ? module.exports = i(require("jquery")) : i(jQuery);
}(function (i) {
  "use strict";

  var e = window.Slick || {};
  (e = function () {
    var e = 0;
    return function (t, o) {
      var s,
          n = this;
      n.defaults = {
        accessibility: !0,
        adaptiveHeight: !1,
        appendArrows: i(t),
        appendDots: i(t),
        arrows: !0,
        asNavFor: null,
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: !1,
        autoplaySpeed: 3e3,
        centerMode: !1,
        centerPadding: "50px",
        cssEase: "ease",
        customPaging: function customPaging(e, t) {
          return i('<button type="button" />').text(t + 1);
        },
        dots: !1,
        dotsClass: "slick-dots",
        draggable: !0,
        easing: "linear",
        edgeFriction: .35,
        fade: !1,
        focusOnSelect: !1,
        focusOnChange: !1,
        infinite: !0,
        initialSlide: 0,
        lazyLoad: "ondemand",
        mobileFirst: !1,
        pauseOnHover: !0,
        pauseOnFocus: !0,
        pauseOnDotsHover: !1,
        respondTo: "window",
        responsive: null,
        rows: 1,
        rtl: !1,
        slide: "",
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        swipe: !0,
        swipeToSlide: !1,
        touchMove: !0,
        touchThreshold: 5,
        useCSS: !0,
        useTransform: !0,
        variableWidth: !1,
        vertical: !1,
        verticalSwiping: !1,
        waitForAnimate: !0,
        zIndex: 1e3
      }, n.initials = {
        animating: !1,
        dragging: !1,
        autoPlayTimer: null,
        currentDirection: 0,
        currentLeft: null,
        currentSlide: 0,
        direction: 1,
        $dots: null,
        listWidth: null,
        listHeight: null,
        loadIndex: 0,
        $nextArrow: null,
        $prevArrow: null,
        scrolling: !1,
        slideCount: null,
        slideWidth: null,
        $slideTrack: null,
        $slides: null,
        sliding: !1,
        slideOffset: 0,
        swipeLeft: null,
        swiping: !1,
        $list: null,
        touchObject: {},
        transformsEnabled: !1,
        unslicked: !1
      }, i.extend(n, n.initials), n.activeBreakpoint = null, n.animType = null, n.animProp = null, n.breakpoints = [], n.breakpointSettings = [], n.cssTransitions = !1, n.focussed = !1, n.interrupted = !1, n.hidden = "hidden", n.paused = !0, n.positionProp = null, n.respondTo = null, n.rowCount = 1, n.shouldClick = !0, n.$slider = i(t), n.$slidesCache = null, n.transformType = null, n.transitionType = null, n.visibilityChange = "visibilitychange", n.windowWidth = 0, n.windowTimer = null, s = i(t).data("slick") || {}, n.options = i.extend({}, n.defaults, o, s), n.currentSlide = n.options.initialSlide, n.originalSettings = n.options, void 0 !== document.mozHidden ? (n.hidden = "mozHidden", n.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (n.hidden = "webkitHidden", n.visibilityChange = "webkitvisibilitychange"), n.autoPlay = i.proxy(n.autoPlay, n), n.autoPlayClear = i.proxy(n.autoPlayClear, n), n.autoPlayIterator = i.proxy(n.autoPlayIterator, n), n.changeSlide = i.proxy(n.changeSlide, n), n.clickHandler = i.proxy(n.clickHandler, n), n.selectHandler = i.proxy(n.selectHandler, n), n.setPosition = i.proxy(n.setPosition, n), n.swipeHandler = i.proxy(n.swipeHandler, n), n.dragHandler = i.proxy(n.dragHandler, n), n.keyHandler = i.proxy(n.keyHandler, n), n.instanceUid = e++, n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, n.registerBreakpoints(), n.init(!0);
    };
  }()).prototype.activateADA = function () {
    this.$slideTrack.find(".slick-active").attr({
      "aria-hidden": "false"
    }).find("a, input, button, select").attr({
      tabindex: "0"
    });
  }, e.prototype.addSlide = e.prototype.slickAdd = function (e, t, o) {
    var s = this;
    if ("boolean" == typeof t) o = t, t = null;else if (t < 0 || t >= s.slideCount) return !1;
    s.unload(), "number" == typeof t ? 0 === t && 0 === s.$slides.length ? i(e).appendTo(s.$slideTrack) : o ? i(e).insertBefore(s.$slides.eq(t)) : i(e).insertAfter(s.$slides.eq(t)) : !0 === o ? i(e).prependTo(s.$slideTrack) : i(e).appendTo(s.$slideTrack), s.$slides = s.$slideTrack.children(this.options.slide), s.$slideTrack.children(this.options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slides.each(function (e, t) {
      i(t).attr("data-slick-index", e);
    }), s.$slidesCache = s.$slides, s.reinit();
  }, e.prototype.animateHeight = function () {
    var i = this;

    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.animate({
        height: e
      }, i.options.speed);
    }
  }, e.prototype.animateSlide = function (e, t) {
    var o = {},
        s = this;
    s.animateHeight(), !0 === s.options.rtl && !1 === s.options.vertical && (e = -e), !1 === s.transformsEnabled ? !1 === s.options.vertical ? s.$slideTrack.animate({
      left: e
    }, s.options.speed, s.options.easing, t) : s.$slideTrack.animate({
      top: e
    }, s.options.speed, s.options.easing, t) : !1 === s.cssTransitions ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft), i({
      animStart: s.currentLeft
    }).animate({
      animStart: e
    }, {
      duration: s.options.speed,
      easing: s.options.easing,
      step: function step(i) {
        i = Math.ceil(i), !1 === s.options.vertical ? (o[s.animType] = "translate(" + i + "px, 0px)", s.$slideTrack.css(o)) : (o[s.animType] = "translate(0px," + i + "px)", s.$slideTrack.css(o));
      },
      complete: function complete() {
        t && t.call();
      }
    })) : (s.applyTransition(), e = Math.ceil(e), !1 === s.options.vertical ? o[s.animType] = "translate3d(" + e + "px, 0px, 0px)" : o[s.animType] = "translate3d(0px," + e + "px, 0px)", s.$slideTrack.css(o), t && setTimeout(function () {
      s.disableTransition(), t.call();
    }, s.options.speed));
  }, e.prototype.getNavTarget = function () {
    var e = this,
        t = e.options.asNavFor;
    return t && null !== t && (t = i(t).not(e.$slider)), t;
  }, e.prototype.asNavFor = function (e) {
    var t = this.getNavTarget();
    null !== t && "object" == _typeof(t) && t.each(function () {
      var t = i(this).slick("getSlick");
      t.unslicked || t.slideHandler(e, !0);
    });
  }, e.prototype.applyTransition = function (i) {
    var e = this,
        t = {};
    !1 === e.options.fade ? t[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase : t[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase, !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
  }, e.prototype.autoPlay = function () {
    var i = this;
    i.autoPlayClear(), i.slideCount > i.options.slidesToShow && (i.autoPlayTimer = setInterval(i.autoPlayIterator, i.options.autoplaySpeed));
  }, e.prototype.autoPlayClear = function () {
    var i = this;
    i.autoPlayTimer && clearInterval(i.autoPlayTimer);
  }, e.prototype.autoPlayIterator = function () {
    var i = this,
        e = i.currentSlide + i.options.slidesToScroll;
    i.paused || i.interrupted || i.focussed || (!1 === i.options.infinite && (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1 ? i.direction = 0 : 0 === i.direction && (e = i.currentSlide - i.options.slidesToScroll, i.currentSlide - 1 == 0 && (i.direction = 1))), i.slideHandler(e));
  }, e.prototype.buildArrows = function () {
    var e = this;
    !0 === e.options.arrows && (e.$prevArrow = i(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = i(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
      "aria-disabled": "true",
      tabindex: "-1"
    }));
  }, e.prototype.buildDots = function () {
    var e,
        t,
        o = this;

    if (!0 === o.options.dots) {
      for (o.$slider.addClass("slick-dotted"), t = i("<ul />").addClass(o.options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) {
        t.append(i("<li />").append(o.options.customPaging.call(this, o, e)));
      }

      o.$dots = t.appendTo(o.options.appendDots), o.$dots.find("li").first().addClass("slick-active");
    }
  }, e.prototype.buildOut = function () {
    var e = this;
    e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides.each(function (e, t) {
      i(t).attr("data-slick-index", e).data("originalStyling", i(t).attr("style") || "");
    }), e.$slider.addClass("slick-slider"), e.$slideTrack = 0 === e.slideCount ? i('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent(), e.$slideTrack.css("opacity", 0), !0 !== e.options.centerMode && !0 !== e.options.swipeToSlide || (e.options.slidesToScroll = 1), i("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(), e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), !0 === e.options.draggable && e.$list.addClass("draggable");
  }, e.prototype.buildRows = function () {
    var i,
        e,
        t,
        o,
        s,
        n,
        r,
        l = this;

    if (o = document.createDocumentFragment(), n = l.$slider.children(), l.options.rows > 1) {
      for (r = l.options.slidesPerRow * l.options.rows, s = Math.ceil(n.length / r), i = 0; i < s; i++) {
        var d = document.createElement("div");

        for (e = 0; e < l.options.rows; e++) {
          var a = document.createElement("div");

          for (t = 0; t < l.options.slidesPerRow; t++) {
            var c = i * r + (e * l.options.slidesPerRow + t);
            n.get(c) && a.appendChild(n.get(c));
          }

          d.appendChild(a);
        }

        o.appendChild(d);
      }

      l.$slider.empty().append(o), l.$slider.children().children().children().css({
        width: 100 / l.options.slidesPerRow + "%",
        display: "inline-block"
      });
    }
  }, e.prototype.checkResponsive = function (e, t) {
    var o,
        s,
        n,
        r = this,
        l = !1,
        d = r.$slider.width(),
        a = window.innerWidth || i(window).width();

    if ("window" === r.respondTo ? n = a : "slider" === r.respondTo ? n = d : "min" === r.respondTo && (n = Math.min(a, d)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive) {
      s = null;

      for (o in r.breakpoints) {
        r.breakpoints.hasOwnProperty(o) && (!1 === r.originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r.breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[o]));
      }

      null !== s ? null !== r.activeBreakpoint ? (s !== r.activeBreakpoint || t) && (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), l = s) : (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), l = s) : null !== r.activeBreakpoint && (r.activeBreakpoint = null, r.options = r.originalSettings, !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e), l = s), e || !1 === l || r.$slider.trigger("breakpoint", [r, l]);
    }
  }, e.prototype.changeSlide = function (e, t) {
    var o,
        s,
        n,
        r = this,
        l = i(e.currentTarget);

    switch (l.is("a") && e.preventDefault(), l.is("li") || (l = l.closest("li")), n = r.slideCount % r.options.slidesToScroll != 0, o = n ? 0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll, e.data.message) {
      case "previous":
        s = 0 === o ? r.options.slidesToScroll : r.options.slidesToShow - o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide - s, !1, t);
        break;

      case "next":
        s = 0 === o ? r.options.slidesToScroll : o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide + s, !1, t);
        break;

      case "index":
        var d = 0 === e.data.index ? 0 : e.data.index || l.index() * r.options.slidesToScroll;
        r.slideHandler(r.checkNavigable(d), !1, t), l.children().trigger("focus");
        break;

      default:
        return;
    }
  }, e.prototype.checkNavigable = function (i) {
    var e, t;
    if (e = this.getNavigableIndexes(), t = 0, i > e[e.length - 1]) i = e[e.length - 1];else for (var o in e) {
      if (i < e[o]) {
        i = t;
        break;
      }

      t = e[o];
    }
    return i;
  }, e.prototype.cleanUpEvents = function () {
    var e = this;
    e.options.dots && null !== e.$dots && (i("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", i.proxy(e.interrupt, e, !0)).off("mouseleave.slick", i.proxy(e.interrupt, e, !1)), !0 === e.options.accessibility && e.$dots.off("keydown.slick", e.keyHandler)), e.$slider.off("focus.slick blur.slick"), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))), e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list.off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off("click.slick", e.clickHandler), i(document).off(e.visibilityChange, e.visibility), e.cleanUpSlideEvents(), !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().off("click.slick", e.selectHandler), i(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange), i(window).off("resize.slick.slick-" + e.instanceUid, e.resize), i("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault), i(window).off("load.slick.slick-" + e.instanceUid, e.setPosition);
  }, e.prototype.cleanUpSlideEvents = function () {
    var e = this;
    e.$list.off("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", i.proxy(e.interrupt, e, !1));
  }, e.prototype.cleanUpRows = function () {
    var i,
        e = this;
    e.options.rows > 1 && ((i = e.$slides.children().children()).removeAttr("style"), e.$slider.empty().append(i));
  }, e.prototype.clickHandler = function (i) {
    !1 === this.shouldClick && (i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault());
  }, e.prototype.destroy = function (e) {
    var t = this;
    t.autoPlayClear(), t.touchObject = {}, t.cleanUpEvents(), i(".slick-cloned", t.$slider).detach(), t.$dots && t.$dots.remove(), t.$prevArrow && t.$prevArrow.length && (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()), t.$nextArrow && t.$nextArrow.length && (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()), t.$slides && (t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () {
      i(this).attr("style", i(this).data("originalStyling"));
    }), t.$slideTrack.children(this.options.slide).detach(), t.$slideTrack.detach(), t.$list.detach(), t.$slider.append(t.$slides)), t.cleanUpRows(), t.$slider.removeClass("slick-slider"), t.$slider.removeClass("slick-initialized"), t.$slider.removeClass("slick-dotted"), t.unslicked = !0, e || t.$slider.trigger("destroy", [t]);
  }, e.prototype.disableTransition = function (i) {
    var e = this,
        t = {};
    t[e.transitionType] = "", !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
  }, e.prototype.fadeSlide = function (i, e) {
    var t = this;
    !1 === t.cssTransitions ? (t.$slides.eq(i).css({
      zIndex: t.options.zIndex
    }), t.$slides.eq(i).animate({
      opacity: 1
    }, t.options.speed, t.options.easing, e)) : (t.applyTransition(i), t.$slides.eq(i).css({
      opacity: 1,
      zIndex: t.options.zIndex
    }), e && setTimeout(function () {
      t.disableTransition(i), e.call();
    }, t.options.speed));
  }, e.prototype.fadeSlideOut = function (i) {
    var e = this;
    !1 === e.cssTransitions ? e.$slides.eq(i).animate({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }, e.options.speed, e.options.easing) : (e.applyTransition(i), e.$slides.eq(i).css({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }));
  }, e.prototype.filterSlides = e.prototype.slickFilter = function (i) {
    var e = this;
    null !== i && (e.$slidesCache = e.$slides, e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(i).appendTo(e.$slideTrack), e.reinit());
  }, e.prototype.focusHandler = function () {
    var e = this;
    e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function (t) {
      t.stopImmediatePropagation();
      var o = i(this);
      setTimeout(function () {
        e.options.pauseOnFocus && (e.focussed = o.is(":focus"), e.autoPlay());
      }, 0);
    });
  }, e.prototype.getCurrent = e.prototype.slickCurrentSlide = function () {
    return this.currentSlide;
  }, e.prototype.getDotCount = function () {
    var i = this,
        e = 0,
        t = 0,
        o = 0;
    if (!0 === i.options.infinite) {
      if (i.slideCount <= i.options.slidesToShow) ++o;else for (; e < i.slideCount;) {
        ++o, e = t + i.options.slidesToScroll, t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow;
      }
    } else if (!0 === i.options.centerMode) o = i.slideCount;else if (i.options.asNavFor) for (; e < i.slideCount;) {
      ++o, e = t + i.options.slidesToScroll, t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow;
    } else o = 1 + Math.ceil((i.slideCount - i.options.slidesToShow) / i.options.slidesToScroll);
    return o - 1;
  }, e.prototype.getLeft = function (i) {
    var e,
        t,
        o,
        s,
        n = this,
        r = 0;
    return n.slideOffset = 0, t = n.$slides.first().outerHeight(!0), !0 === n.options.infinite ? (n.slideCount > n.options.slidesToShow && (n.slideOffset = n.slideWidth * n.options.slidesToShow * -1, s = -1, !0 === n.options.vertical && !0 === n.options.centerMode && (2 === n.options.slidesToShow ? s = -1.5 : 1 === n.options.slidesToShow && (s = -2)), r = t * n.options.slidesToShow * s), n.slideCount % n.options.slidesToScroll != 0 && i + n.options.slidesToScroll > n.slideCount && n.slideCount > n.options.slidesToShow && (i > n.slideCount ? (n.slideOffset = (n.options.slidesToShow - (i - n.slideCount)) * n.slideWidth * -1, r = (n.options.slidesToShow - (i - n.slideCount)) * t * -1) : (n.slideOffset = n.slideCount % n.options.slidesToScroll * n.slideWidth * -1, r = n.slideCount % n.options.slidesToScroll * t * -1))) : i + n.options.slidesToShow > n.slideCount && (n.slideOffset = (i + n.options.slidesToShow - n.slideCount) * n.slideWidth, r = (i + n.options.slidesToShow - n.slideCount) * t), n.slideCount <= n.options.slidesToShow && (n.slideOffset = 0, r = 0), !0 === n.options.centerMode && n.slideCount <= n.options.slidesToShow ? n.slideOffset = n.slideWidth * Math.floor(n.options.slidesToShow) / 2 - n.slideWidth * n.slideCount / 2 : !0 === n.options.centerMode && !0 === n.options.infinite ? n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2) - n.slideWidth : !0 === n.options.centerMode && (n.slideOffset = 0, n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2)), e = !1 === n.options.vertical ? i * n.slideWidth * -1 + n.slideOffset : i * t * -1 + r, !0 === n.options.variableWidth && (o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow), e = !0 === n.options.rtl ? o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, !0 === n.options.centerMode && (o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow + 1), e = !0 === n.options.rtl ? o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, e += (n.$list.width() - o.outerWidth()) / 2)), e;
  }, e.prototype.getOption = e.prototype.slickGetOption = function (i) {
    return this.options[i];
  }, e.prototype.getNavigableIndexes = function () {
    var i,
        e = this,
        t = 0,
        o = 0,
        s = [];

    for (!1 === e.options.infinite ? i = e.slideCount : (t = -1 * e.options.slidesToScroll, o = -1 * e.options.slidesToScroll, i = 2 * e.slideCount); t < i;) {
      s.push(t), t = o + e.options.slidesToScroll, o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
    }

    return s;
  }, e.prototype.getSlick = function () {
    return this;
  }, e.prototype.getSlideCount = function () {
    var e,
        t,
        o = this;
    return t = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o.$slideTrack.find(".slick-slide").each(function (s, n) {
      if (n.offsetLeft - t + i(n).outerWidth() / 2 > -1 * o.swipeLeft) return e = n, !1;
    }), Math.abs(i(e).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll;
  }, e.prototype.goTo = e.prototype.slickGoTo = function (i, e) {
    this.changeSlide({
      data: {
        message: "index",
        index: parseInt(i)
      }
    }, e);
  }, e.prototype.init = function (e) {
    var t = this;
    i(t.$slider).hasClass("slick-initialized") || (i(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()), e && t.$slider.trigger("init", [t]), !0 === t.options.accessibility && t.initADA(), t.options.autoplay && (t.paused = !1, t.autoPlay());
  }, e.prototype.initADA = function () {
    var e = this,
        t = Math.ceil(e.slideCount / e.options.slidesToShow),
        o = e.getNavigableIndexes().filter(function (i) {
      return i >= 0 && i < e.slideCount;
    });
    e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
      "aria-hidden": "true",
      tabindex: "-1"
    }).find("a, input, button, select").attr({
      tabindex: "-1"
    }), null !== e.$dots && (e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function (t) {
      var s = o.indexOf(t);
      i(this).attr({
        role: "tabpanel",
        id: "slick-slide" + e.instanceUid + t,
        tabindex: -1
      }), -1 !== s && i(this).attr({
        "aria-describedby": "slick-slide-control" + e.instanceUid + s
      });
    }), e.$dots.attr("role", "tablist").find("li").each(function (s) {
      var n = o[s];
      i(this).attr({
        role: "presentation"
      }), i(this).find("button").first().attr({
        role: "tab",
        id: "slick-slide-control" + e.instanceUid + s,
        "aria-controls": "slick-slide" + e.instanceUid + n,
        "aria-label": s + 1 + " of " + t,
        "aria-selected": null,
        tabindex: "-1"
      });
    }).eq(e.currentSlide).find("button").attr({
      "aria-selected": "true",
      tabindex: "0"
    }).end());

    for (var s = e.currentSlide, n = s + e.options.slidesToShow; s < n; s++) {
      e.$slides.eq(s).attr("tabindex", 0);
    }

    e.activateADA();
  }, e.prototype.initArrowEvents = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.off("click.slick").on("click.slick", {
      message: "previous"
    }, i.changeSlide), i.$nextArrow.off("click.slick").on("click.slick", {
      message: "next"
    }, i.changeSlide), !0 === i.options.accessibility && (i.$prevArrow.on("keydown.slick", i.keyHandler), i.$nextArrow.on("keydown.slick", i.keyHandler)));
  }, e.prototype.initDotEvents = function () {
    var e = this;
    !0 === e.options.dots && (i("li", e.$dots).on("click.slick", {
      message: "index"
    }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on("keydown.slick", e.keyHandler)), !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && i("li", e.$dots).on("mouseenter.slick", i.proxy(e.interrupt, e, !0)).on("mouseleave.slick", i.proxy(e.interrupt, e, !1));
  }, e.prototype.initSlideEvents = function () {
    var e = this;
    e.options.pauseOnHover && (e.$list.on("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", i.proxy(e.interrupt, e, !1)));
  }, e.prototype.initializeEvents = function () {
    var e = this;
    e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on("touchstart.slick mousedown.slick", {
      action: "start"
    }, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
      action: "move"
    }, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
      action: "end"
    }, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
      action: "end"
    }, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), i(document).on(e.visibilityChange, i.proxy(e.visibility, e)), !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler), i(window).on("orientationchange.slick.slick-" + e.instanceUid, i.proxy(e.orientationChange, e)), i(window).on("resize.slick.slick-" + e.instanceUid, i.proxy(e.resize, e)), i("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault), i(window).on("load.slick.slick-" + e.instanceUid, e.setPosition), i(e.setPosition);
  }, e.prototype.initUI = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.show(), i.$nextArrow.show()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.show();
  }, e.prototype.keyHandler = function (i) {
    var e = this;
    i.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === i.keyCode && !0 === e.options.accessibility ? e.changeSlide({
      data: {
        message: !0 === e.options.rtl ? "next" : "previous"
      }
    }) : 39 === i.keyCode && !0 === e.options.accessibility && e.changeSlide({
      data: {
        message: !0 === e.options.rtl ? "previous" : "next"
      }
    }));
  }, e.prototype.lazyLoad = function () {
    function e(e) {
      i("img[data-lazy]", e).each(function () {
        var e = i(this),
            t = i(this).attr("data-lazy"),
            o = i(this).attr("data-srcset"),
            s = i(this).attr("data-sizes") || n.$slider.attr("data-sizes"),
            r = document.createElement("img");
        r.onload = function () {
          e.animate({
            opacity: 0
          }, 100, function () {
            o && (e.attr("srcset", o), s && e.attr("sizes", s)), e.attr("src", t).animate({
              opacity: 1
            }, 200, function () {
              e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading");
            }), n.$slider.trigger("lazyLoaded", [n, e, t]);
          });
        }, r.onerror = function () {
          e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, e, t]);
        }, r.src = t;
      });
    }

    var t,
        o,
        s,
        n = this;
    if (!0 === n.options.centerMode ? !0 === n.options.infinite ? s = (o = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2 : (o = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1)), s = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide) : (o = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide, s = Math.ceil(o + n.options.slidesToShow), !0 === n.options.fade && (o > 0 && o--, s <= n.slideCount && s++)), t = n.$slider.find(".slick-slide").slice(o, s), "anticipated" === n.options.lazyLoad) for (var r = o - 1, l = s, d = n.$slider.find(".slick-slide"), a = 0; a < n.options.slidesToScroll; a++) {
      r < 0 && (r = n.slideCount - 1), t = (t = t.add(d.eq(r))).add(d.eq(l)), r--, l++;
    }
    e(t), n.slideCount <= n.options.slidesToShow ? e(n.$slider.find(".slick-slide")) : n.currentSlide >= n.slideCount - n.options.slidesToShow ? e(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow)) : 0 === n.currentSlide && e(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow));
  }, e.prototype.loadSlider = function () {
    var i = this;
    i.setPosition(), i.$slideTrack.css({
      opacity: 1
    }), i.$slider.removeClass("slick-loading"), i.initUI(), "progressive" === i.options.lazyLoad && i.progressiveLazyLoad();
  }, e.prototype.next = e.prototype.slickNext = function () {
    this.changeSlide({
      data: {
        message: "next"
      }
    });
  }, e.prototype.orientationChange = function () {
    var i = this;
    i.checkResponsive(), i.setPosition();
  }, e.prototype.pause = e.prototype.slickPause = function () {
    var i = this;
    i.autoPlayClear(), i.paused = !0;
  }, e.prototype.play = e.prototype.slickPlay = function () {
    var i = this;
    i.autoPlay(), i.options.autoplay = !0, i.paused = !1, i.focussed = !1, i.interrupted = !1;
  }, e.prototype.postSlide = function (e) {
    var t = this;
    t.unslicked || (t.$slider.trigger("afterChange", [t, e]), t.animating = !1, t.slideCount > t.options.slidesToShow && t.setPosition(), t.swipeLeft = null, t.options.autoplay && t.autoPlay(), !0 === t.options.accessibility && (t.initADA(), t.options.focusOnChange && i(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()));
  }, e.prototype.prev = e.prototype.slickPrev = function () {
    this.changeSlide({
      data: {
        message: "previous"
      }
    });
  }, e.prototype.preventDefault = function (i) {
    i.preventDefault();
  }, e.prototype.progressiveLazyLoad = function (e) {
    e = e || 1;
    var t,
        o,
        s,
        n,
        r,
        l = this,
        d = i("img[data-lazy]", l.$slider);
    d.length ? (t = d.first(), o = t.attr("data-lazy"), s = t.attr("data-srcset"), n = t.attr("data-sizes") || l.$slider.attr("data-sizes"), (r = document.createElement("img")).onload = function () {
      s && (t.attr("srcset", s), n && t.attr("sizes", n)), t.attr("src", o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), !0 === l.options.adaptiveHeight && l.setPosition(), l.$slider.trigger("lazyLoaded", [l, t, o]), l.progressiveLazyLoad();
    }, r.onerror = function () {
      e < 3 ? setTimeout(function () {
        l.progressiveLazyLoad(e + 1);
      }, 500) : (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), l.$slider.trigger("lazyLoadError", [l, t, o]), l.progressiveLazyLoad());
    }, r.src = o) : l.$slider.trigger("allImagesLoaded", [l]);
  }, e.prototype.refresh = function (e) {
    var t,
        o,
        s = this;
    o = s.slideCount - s.options.slidesToShow, !s.options.infinite && s.currentSlide > o && (s.currentSlide = o), s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0), t = s.currentSlide, s.destroy(!0), i.extend(s, s.initials, {
      currentSlide: t
    }), s.init(), e || s.changeSlide({
      data: {
        message: "index",
        index: t
      }
    }, !1);
  }, e.prototype.registerBreakpoints = function () {
    var e,
        t,
        o,
        s = this,
        n = s.options.responsive || null;

    if ("array" === i.type(n) && n.length) {
      s.respondTo = s.options.respondTo || "window";

      for (e in n) {
        if (o = s.breakpoints.length - 1, n.hasOwnProperty(e)) {
          for (t = n[e].breakpoint; o >= 0;) {
            s.breakpoints[o] && s.breakpoints[o] === t && s.breakpoints.splice(o, 1), o--;
          }

          s.breakpoints.push(t), s.breakpointSettings[t] = n[e].settings;
        }
      }

      s.breakpoints.sort(function (i, e) {
        return s.options.mobileFirst ? i - e : e - i;
      });
    }
  }, e.prototype.reinit = function () {
    var e = this;
    e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll), e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e.setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e.initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(), e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !0), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), e.setPosition(), e.focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e.$slider.trigger("reInit", [e]);
  }, e.prototype.resize = function () {
    var e = this;
    i(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function () {
      e.windowWidth = i(window).width(), e.checkResponsive(), e.unslicked || e.setPosition();
    }, 50));
  }, e.prototype.removeSlide = e.prototype.slickRemove = function (i, e, t) {
    var o = this;
    if (i = "boolean" == typeof i ? !0 === (e = i) ? 0 : o.slideCount - 1 : !0 === e ? --i : i, o.slideCount < 1 || i < 0 || i > o.slideCount - 1) return !1;
    o.unload(), !0 === t ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(i).remove(), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slidesCache = o.$slides, o.reinit();
  }, e.prototype.setCSS = function (i) {
    var e,
        t,
        o = this,
        s = {};
    !0 === o.options.rtl && (i = -i), e = "left" == o.positionProp ? Math.ceil(i) + "px" : "0px", t = "top" == o.positionProp ? Math.ceil(i) + "px" : "0px", s[o.positionProp] = i, !1 === o.transformsEnabled ? o.$slideTrack.css(s) : (s = {}, !1 === o.cssTransitions ? (s[o.animType] = "translate(" + e + ", " + t + ")", o.$slideTrack.css(s)) : (s[o.animType] = "translate3d(" + e + ", " + t + ", 0px)", o.$slideTrack.css(s)));
  }, e.prototype.setDimensions = function () {
    var i = this;
    !1 === i.options.vertical ? !0 === i.options.centerMode && i.$list.css({
      padding: "0px " + i.options.centerPadding
    }) : (i.$list.height(i.$slides.first().outerHeight(!0) * i.options.slidesToShow), !0 === i.options.centerMode && i.$list.css({
      padding: i.options.centerPadding + " 0px"
    })), i.listWidth = i.$list.width(), i.listHeight = i.$list.height(), !1 === i.options.vertical && !1 === i.options.variableWidth ? (i.slideWidth = Math.ceil(i.listWidth / i.options.slidesToShow), i.$slideTrack.width(Math.ceil(i.slideWidth * i.$slideTrack.children(".slick-slide").length))) : !0 === i.options.variableWidth ? i.$slideTrack.width(5e3 * i.slideCount) : (i.slideWidth = Math.ceil(i.listWidth), i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0) * i.$slideTrack.children(".slick-slide").length)));
    var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
    !1 === i.options.variableWidth && i.$slideTrack.children(".slick-slide").width(i.slideWidth - e);
  }, e.prototype.setFade = function () {
    var e,
        t = this;
    t.$slides.each(function (o, s) {
      e = t.slideWidth * o * -1, !0 === t.options.rtl ? i(s).css({
        position: "relative",
        right: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      }) : i(s).css({
        position: "relative",
        left: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      });
    }), t.$slides.eq(t.currentSlide).css({
      zIndex: t.options.zIndex - 1,
      opacity: 1
    });
  }, e.prototype.setHeight = function () {
    var i = this;

    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.css("height", e);
    }
  }, e.prototype.setOption = e.prototype.slickSetOption = function () {
    var e,
        t,
        o,
        s,
        n,
        r = this,
        l = !1;
    if ("object" === i.type(arguments[0]) ? (o = arguments[0], l = arguments[1], n = "multiple") : "string" === i.type(arguments[0]) && (o = arguments[0], s = arguments[1], l = arguments[2], "responsive" === arguments[0] && "array" === i.type(arguments[1]) ? n = "responsive" : void 0 !== arguments[1] && (n = "single")), "single" === n) r.options[o] = s;else if ("multiple" === n) i.each(o, function (i, e) {
      r.options[i] = e;
    });else if ("responsive" === n) for (t in s) {
      if ("array" !== i.type(r.options.responsive)) r.options.responsive = [s[t]];else {
        for (e = r.options.responsive.length - 1; e >= 0;) {
          r.options.responsive[e].breakpoint === s[t].breakpoint && r.options.responsive.splice(e, 1), e--;
        }

        r.options.responsive.push(s[t]);
      }
    }
    l && (r.unload(), r.reinit());
  }, e.prototype.setPosition = function () {
    var i = this;
    i.setDimensions(), i.setHeight(), !1 === i.options.fade ? i.setCSS(i.getLeft(i.currentSlide)) : i.setFade(), i.$slider.trigger("setPosition", [i]);
  }, e.prototype.setProps = function () {
    var i = this,
        e = document.body.style;
    i.positionProp = !0 === i.options.vertical ? "top" : "left", "top" === i.positionProp ? i.$slider.addClass("slick-vertical") : i.$slider.removeClass("slick-vertical"), void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition || !0 === i.options.useCSS && (i.cssTransitions = !0), i.options.fade && ("number" == typeof i.options.zIndex ? i.options.zIndex < 3 && (i.options.zIndex = 3) : i.options.zIndex = i.defaults.zIndex), void 0 !== e.OTransform && (i.animType = "OTransform", i.transformType = "-o-transform", i.transitionType = "OTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)), void 0 !== e.MozTransform && (i.animType = "MozTransform", i.transformType = "-moz-transform", i.transitionType = "MozTransition", void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (i.animType = !1)), void 0 !== e.webkitTransform && (i.animType = "webkitTransform", i.transformType = "-webkit-transform", i.transitionType = "webkitTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)), void 0 !== e.msTransform && (i.animType = "msTransform", i.transformType = "-ms-transform", i.transitionType = "msTransition", void 0 === e.msTransform && (i.animType = !1)), void 0 !== e.transform && !1 !== i.animType && (i.animType = "transform", i.transformType = "transform", i.transitionType = "transition"), i.transformsEnabled = i.options.useTransform && null !== i.animType && !1 !== i.animType;
  }, e.prototype.setSlideClasses = function (i) {
    var e,
        t,
        o,
        s,
        n = this;

    if (t = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), n.$slides.eq(i).addClass("slick-current"), !0 === n.options.centerMode) {
      var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
      e = Math.floor(n.options.slidesToShow / 2), !0 === n.options.infinite && (i >= e && i <= n.slideCount - 1 - e ? n.$slides.slice(i - e + r, i + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (o = n.options.slidesToShow + i, t.slice(o - e + 1 + r, o + e + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === i ? t.eq(t.length - 1 - n.options.slidesToShow).addClass("slick-center") : i === n.slideCount - 1 && t.eq(n.options.slidesToShow).addClass("slick-center")), n.$slides.eq(i).addClass("slick-center");
    } else i >= 0 && i <= n.slideCount - n.options.slidesToShow ? n.$slides.slice(i, i + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : t.length <= n.options.slidesToShow ? t.addClass("slick-active").attr("aria-hidden", "false") : (s = n.slideCount % n.options.slidesToShow, o = !0 === n.options.infinite ? n.options.slidesToShow + i : i, n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - i < n.options.slidesToShow ? t.slice(o - (n.options.slidesToShow - s), o + s).addClass("slick-active").attr("aria-hidden", "false") : t.slice(o, o + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false"));

    "ondemand" !== n.options.lazyLoad && "anticipated" !== n.options.lazyLoad || n.lazyLoad();
  }, e.prototype.setupInfinite = function () {
    var e,
        t,
        o,
        s = this;

    if (!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && (t = null, s.slideCount > s.options.slidesToShow)) {
      for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -= 1) {
        t = e - 1, i(s.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t - s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");
      }

      for (e = 0; e < o + s.slideCount; e += 1) {
        t = e, i(s.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t + s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");
      }

      s.$slideTrack.find(".slick-cloned").find("[id]").each(function () {
        i(this).attr("id", "");
      });
    }
  }, e.prototype.interrupt = function (i) {
    var e = this;
    i || e.autoPlay(), e.interrupted = i;
  }, e.prototype.selectHandler = function (e) {
    var t = this,
        o = i(e.target).is(".slick-slide") ? i(e.target) : i(e.target).parents(".slick-slide"),
        s = parseInt(o.attr("data-slick-index"));
    s || (s = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(s, !1, !0) : t.slideHandler(s);
  }, e.prototype.slideHandler = function (i, e, t) {
    var o,
        s,
        n,
        r,
        l,
        d = null,
        a = this;
    if (e = e || !1, !(!0 === a.animating && !0 === a.options.waitForAnimate || !0 === a.options.fade && a.currentSlide === i)) if (!1 === e && a.asNavFor(i), o = i, d = a.getLeft(o), r = a.getLeft(a.currentSlide), a.currentLeft = null === a.swipeLeft ? r : a.swipeLeft, !1 === a.options.infinite && !1 === a.options.centerMode && (i < 0 || i > a.getDotCount() * a.options.slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r, function () {
      a.postSlide(o);
    }) : a.postSlide(o));else if (!1 === a.options.infinite && !0 === a.options.centerMode && (i < 0 || i > a.slideCount - a.options.slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r, function () {
      a.postSlide(o);
    }) : a.postSlide(o));else {
      if (a.options.autoplay && clearInterval(a.autoPlayTimer), s = o < 0 ? a.slideCount % a.options.slidesToScroll != 0 ? a.slideCount - a.slideCount % a.options.slidesToScroll : a.slideCount + o : o >= a.slideCount ? a.slideCount % a.options.slidesToScroll != 0 ? 0 : o - a.slideCount : o, a.animating = !0, a.$slider.trigger("beforeChange", [a, a.currentSlide, s]), n = a.currentSlide, a.currentSlide = s, a.setSlideClasses(a.currentSlide), a.options.asNavFor && (l = (l = a.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(a.currentSlide), a.updateDots(), a.updateArrows(), !0 === a.options.fade) return !0 !== t ? (a.fadeSlideOut(n), a.fadeSlide(s, function () {
        a.postSlide(s);
      })) : a.postSlide(s), void a.animateHeight();
      !0 !== t ? a.animateSlide(d, function () {
        a.postSlide(s);
      }) : a.postSlide(s);
    }
  }, e.prototype.startLoad = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.hide(), i.$nextArrow.hide()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.hide(), i.$slider.addClass("slick-loading");
  }, e.prototype.swipeDirection = function () {
    var i,
        e,
        t,
        o,
        s = this;
    return i = s.touchObject.startX - s.touchObject.curX, e = s.touchObject.startY - s.touchObject.curY, t = Math.atan2(e, i), (o = Math.round(180 * t / Math.PI)) < 0 && (o = 360 - Math.abs(o)), o <= 45 && o >= 0 ? !1 === s.options.rtl ? "left" : "right" : o <= 360 && o >= 315 ? !1 === s.options.rtl ? "left" : "right" : o >= 135 && o <= 225 ? !1 === s.options.rtl ? "right" : "left" : !0 === s.options.verticalSwiping ? o >= 35 && o <= 135 ? "down" : "up" : "vertical";
  }, e.prototype.swipeEnd = function (i) {
    var e,
        t,
        o = this;
    if (o.dragging = !1, o.swiping = !1, o.scrolling) return o.scrolling = !1, !1;
    if (o.interrupted = !1, o.shouldClick = !(o.touchObject.swipeLength > 10), void 0 === o.touchObject.curX) return !1;

    if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
      switch (t = o.swipeDirection()) {
        case "left":
        case "down":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount(), o.currentDirection = 0;
          break;

        case "right":
        case "up":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount(), o.currentDirection = 1;
      }

      "vertical" != t && (o.slideHandler(e), o.touchObject = {}, o.$slider.trigger("swipe", [o, t]));
    } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), o.touchObject = {});
  }, e.prototype.swipeHandler = function (i) {
    var e = this;
    if (!(!1 === e.options.swipe || "ontouchend" in document && !1 === e.options.swipe || !1 === e.options.draggable && -1 !== i.type.indexOf("mouse"))) switch (e.touchObject.fingerCount = i.originalEvent && void 0 !== i.originalEvent.touches ? i.originalEvent.touches.length : 1, e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold, !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold), i.data.action) {
      case "start":
        e.swipeStart(i);
        break;

      case "move":
        e.swipeMove(i);
        break;

      case "end":
        e.swipeEnd(i);
    }
  }, e.prototype.swipeMove = function (i) {
    var e,
        t,
        o,
        s,
        n,
        r,
        l = this;
    return n = void 0 !== i.originalEvent ? i.originalEvent.touches : null, !(!l.dragging || l.scrolling || n && 1 !== n.length) && (e = l.getLeft(l.currentSlide), l.touchObject.curX = void 0 !== n ? n[0].pageX : i.clientX, l.touchObject.curY = void 0 !== n ? n[0].pageY : i.clientY, l.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(l.touchObject.curX - l.touchObject.startX, 2))), r = Math.round(Math.sqrt(Math.pow(l.touchObject.curY - l.touchObject.startY, 2))), !l.options.verticalSwiping && !l.swiping && r > 4 ? (l.scrolling = !0, !1) : (!0 === l.options.verticalSwiping && (l.touchObject.swipeLength = r), t = l.swipeDirection(), void 0 !== i.originalEvent && l.touchObject.swipeLength > 4 && (l.swiping = !0, i.preventDefault()), s = (!1 === l.options.rtl ? 1 : -1) * (l.touchObject.curX > l.touchObject.startX ? 1 : -1), !0 === l.options.verticalSwiping && (s = l.touchObject.curY > l.touchObject.startY ? 1 : -1), o = l.touchObject.swipeLength, l.touchObject.edgeHit = !1, !1 === l.options.infinite && (0 === l.currentSlide && "right" === t || l.currentSlide >= l.getDotCount() && "left" === t) && (o = l.touchObject.swipeLength * l.options.edgeFriction, l.touchObject.edgeHit = !0), !1 === l.options.vertical ? l.swipeLeft = e + o * s : l.swipeLeft = e + o * (l.$list.height() / l.listWidth) * s, !0 === l.options.verticalSwiping && (l.swipeLeft = e + o * s), !0 !== l.options.fade && !1 !== l.options.touchMove && (!0 === l.animating ? (l.swipeLeft = null, !1) : void l.setCSS(l.swipeLeft))));
  }, e.prototype.swipeStart = function (i) {
    var e,
        t = this;
    if (t.interrupted = !0, 1 !== t.touchObject.fingerCount || t.slideCount <= t.options.slidesToShow) return t.touchObject = {}, !1;
    void 0 !== i.originalEvent && void 0 !== i.originalEvent.touches && (e = i.originalEvent.touches[0]), t.touchObject.startX = t.touchObject.curX = void 0 !== e ? e.pageX : i.clientX, t.touchObject.startY = t.touchObject.curY = void 0 !== e ? e.pageY : i.clientY, t.dragging = !0;
  }, e.prototype.unfilterSlides = e.prototype.slickUnfilter = function () {
    var i = this;
    null !== i.$slidesCache && (i.unload(), i.$slideTrack.children(this.options.slide).detach(), i.$slidesCache.appendTo(i.$slideTrack), i.reinit());
  }, e.prototype.unload = function () {
    var e = this;
    i(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(), e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "");
  }, e.prototype.unslick = function (i) {
    var e = this;
    e.$slider.trigger("unslick", [e, i]), e.destroy();
  }, e.prototype.updateArrows = function () {
    var i = this;
    Math.floor(i.options.slidesToShow / 2), !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && !i.options.infinite && (i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === i.currentSlide ? (i.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : i.currentSlide >= i.slideCount - i.options.slidesToShow && !1 === i.options.centerMode ? (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : i.currentSlide >= i.slideCount - 1 && !0 === i.options.centerMode && (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")));
  }, e.prototype.updateDots = function () {
    var i = this;
    null !== i.$dots && (i.$dots.find("li").removeClass("slick-active").end(), i.$dots.find("li").eq(Math.floor(i.currentSlide / i.options.slidesToScroll)).addClass("slick-active"));
  }, e.prototype.visibility = function () {
    var i = this;
    i.options.autoplay && (document[i.hidden] ? i.interrupted = !0 : i.interrupted = !1);
  }, i.fn.slick = function () {
    var i,
        t,
        o = this,
        s = arguments[0],
        n = Array.prototype.slice.call(arguments, 1),
        r = o.length;

    for (i = 0; i < r; i++) {
      if ("object" == _typeof(s) || void 0 === s ? o[i].slick = new e(o[i], s) : t = o[i].slick[s].apply(o[i].slick, n), void 0 !== t) return t;
    }

    return o;
  };
});
"use strict";

(function ($) {
  $('.country_close').click(function () {
    $('#counrty').addClass('country-disabled');
  });
  $('.country_select').click(function () {
    $(this).toggleClass('country-active');
  });
})(jQuery);
"use strict";

(function ($) {
  var $siteHeader = $('.header__main');
  var $anouncementBar = $('.announcement-bar');
  var $menu = $('.header__menu__wrapper', $siteHeader);
  var $menuInner = $('.header__menu__inner', $siteHeader);
  var $submenu = $('.submenu__wrapper', $siteHeader);
  var $submenuColumns = $('.submenu__columns', $siteHeader);

  function adjustCss() {
    // 1. Adjust menu position
    var siteHeaderHeight = $siteHeader.outerHeight();
    var windowHeight = $(window).height();
    var top = siteHeaderHeight;
    var anouncementHeight = 0;

    if ($anouncementBar.hasClass('on')) {
      anouncementHeight = $anouncementBar.outerHeight();
    }

    top = top + anouncementHeight;
    var h = windowHeight - top;
    var submenuInnerHeight = windowHeight - top - 104; // 104 - contact button block height

    if (!$('.header__top').is(':visible')) {
      // mobile
      $menu.css('height', h + 'px');
      $menu.css('top', top + 'px');
      $menuInner.css('max-height', submenuInnerHeight + 'px');
    } else {
      $menu.css('height', '');
      $menu.css('top', '');
      $menuInner.css('max-height', '');
    } // 2. Adjust submenu


    var submenuHeight = windowHeight - top - 104; // 111 - contact button block height + its shadow height

    var submenuColumnsHeight = windowHeight - top - 111 - 65; // 65 - .submenu__header block height

    if (!$('.header__top').is(':visible')) {
      // mobile
      $submenu.css('height', submenuHeight + 'px');
      $submenuColumns.css('max-height', submenuColumnsHeight + 'px');
    } else {
      $submenu.css('height', '');
      $submenuColumns.css('max-height', '');
    } // 3. Adjust page padding


    var paddingTop = 0;

    if ($anouncementBar.hasClass('on')) {
      paddingTop += anouncementHeight;
    }

    $('.site-content').css('padding-top', paddingTop + 'px');

    if (!$('.header__top').is(':visible')) {
      if ($('body').hasClass('announcement-bar-on')) {
        $('.header__main').css('top', anouncementHeight + 'px');
      } else {
        $('.header__main').css('top', '0');
      }
    } else {
      $('.header__main').css('top', '');
    }
  } // Hide/show announcement-bar


  $('#announcement-close').click(function () {
    $('body').removeClass('announcement-bar-on');
    $(this).closest('.announcement-bar').removeClass('on');
    setCookie('announcement', 'no', 1); // 1 - number of days to keep the cookie

    adjustCss();
  });

  function setCookie(name, value, expireDays) {
    name = encodeURIComponent(name);
    value = encodeURIComponent(value);
    var expires = new Date();
    expires.setDate(expires.getDate() + expireDays);
    expires = expires.toUTCString();
    var updatedCookie = name + '=' + value + '; path=/; expires=' + expires;
    document.cookie = updatedCookie;
  }

  function getCookie(name) {
    var matches = document.cookie.match(new RegExp('(?:^|; )' + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + '=([^;]*)'));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

  if ($('.announcement-bar').length > 0) {
    if (getCookie('announcement') && getCookie('announcement') === 'no') {
      $('.announcement-bar').removeClass('on');
      $('body').removeClass('announcement-bar-on');
    } else {
      $('.announcement-bar').addClass('on');
      $('body').addClass('announcement-bar-on');
    }
  }

  adjustCss();
  $(window).on('resize', function () {
    adjustCss();
  });
})(jQuery);
"use strict";

(function ($) {
  var $siteHeader = $('.header');
  var $menu = $('.header__menu > ul', $siteHeader); // Toggle submenu

  $('.header__toggler').on('click', function (event) {
    event.preventDefault();

    if ($(this).attr('aria-expanded') === 'false') {
      $(this).attr('aria-expanded', 'true');
      $('body').addClass('menu-open'); // this should go last
    } else {
      $('body').removeClass('menu-open'); // this should go first

      $(this).attr('aria-expanded', 'false');
    }
  }); // Toggle submenu

  $('.menu__item---has-children > a.menu__submenu-toggler', $menu).on('click', function (event) {
    event.preventDefault().stopPropagation();
    /*
    const $a = $( this );
    const $li = $a.closest( '.menu-item-has-children' );
    if ( ! $li.hasClass( 'open' ) ) {
    	$( '.menu-item-has-children', $menu ).removeClass( 'open' );
    	$li.addClass( 'open' );
    } else {
    	$( '.menu-item-has-children', $menu ).removeClass( 'open' );
    }
    */
  });
})(jQuery);
"use strict";

(function ($) {
  document.body.classList.remove('no-js');
  document.body.classList.add('js');
})(jQuery);
"use strict";

(function ($) {
  "use strict";

  if (window['objectFitImages']) {
    $(document).ready(function () {
      window.objectFitImages(null, {
        watchMQ: true
      });
    });
  }
})(jQuery);
"use strict";

(function ($) {
  if ($('.accordion__list').length > 0) {
    $('.accordion__item__title').on('click', function () {
      $(this).parent().toggleClass('accordion-open');
    });
  }
})(jQuery);
"use strict";

(function ($) {
  if ($('.btn-audio').length > 0) {
    var player = new Audio();
    $('.btn-audio').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        var file = $(this).data('audio');
        player.src = file;

        if (!$(this).hasClass('playing')) {
          player.play();
          $(this).addClass('playing');
        } else {
          player.pause();
          $(this).removeClass('playing');
        }
      });
      player.addEventListener('ended', function () {
        $('.btn-audio').removeClass('playing');
      });
    });
  }
})(jQuery);
"use strict";

(function ($) {
  $('.bet_close').click(function () {
    $('.bet').addClass('disabl');
  });
})(jQuery);
"use strict";

(function ($) {
  function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + (exdays == null ? '' : '; expires=' + exdate.toUTCString());
    document.cookie = c_name + '=' + c_value;
  }

  function getCookie(c_name) {
    var i,
        x,
        y,
        ARRcookies = document.cookie.split(';');

    for (i = 0; i < ARRcookies.length; i++) {
      x = ARRcookies[i].substr(0, ARRcookies[i].indexOf('='));
      y = ARRcookies[i].substr(ARRcookies[i].indexOf('=') + 1);
      x = x.replace(/^\s+|\s+$/g, '');

      if (x == c_name) {
        return unescape(y);
      }
    }
  }

  function deleteAllCookies() {
    var cookies = document.cookie.split(';');

    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      var eqPos = cookie.indexOf('=');
      var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
      document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
    }
  }
  /*function deleteSpecificCookies() {
  
  	var cookies = document.cookie.split(";");
  	var all_cookies = '';
  
  	for (var i = 0; i < cookies.length; i++) {
  
  		var cookie_name  = cookies[i].split("=")[0];
  		var cookie_value = cookies[i].split("=")[1];
  
  		if( cookie_name.trim() != '__utmb' ) { all_cookies = all_cookies + cookies[i] + ";"; }
  
  
  	}
  
  	if(!document.__defineGetter__) {
  
  		Object.defineProperty(document, 'cookie', {
  			get: function(){return all_cookies; },
  			set: function(){return true},
  		});
  
  	} else {
  
  		document.__defineGetter__("cookie", function() { return all_cookies; } );
  		document.__defineSetter__("cookie", function() { return true; } );
  
  	}
  
  }*/


  function closethis() {
    var result = confirm('You must accept cookies to continue using the site');
    document.location.assign('/cookies/');
  }

  var acceptCookie = getCookie('acceptCookie');

  if (acceptCookie === 'cookie accepted') {
    $('#coockie').addClass('coockie-disabled'); //alert( 'Cookie accepted' );
  }
  /*else {
  document.addEventListener( 'DOMContentLoaded', deleteAllCookies() );
  }*/


  $('.coockie_button-disagree').click(function () {
    $('#coockie').addClass('coockie-disabled');
    deleteAllCookies();
    closethis();
  });
  $('.coockie_close.ok').click(function () {
    $('#coockie').addClass('coockie-disabled');
    setCookie('acceptCookie', 'cookie accepted', 14);
  });
})(jQuery);
"use strict";

(function ($) {
  $('.numbers__phone-disabled').click(function () {
    $(this).removeClass('numbers__phone-disabled').find('.soc_href').removeClass('disabled');
  });
})(jQuery);
"use strict";

(function ($) {
  if ($('.wp-block-gallery').length > 0) {
    var i = 0;
    $('.wp-block-gallery').each(function () {
      i++;
      $(this).find('figure a').each(function () {
        var caption = $(this).siblings('figcaption').text();
        $(this).attr('data-fancybox', 'gallery' + i);
        $(this).attr('data-caption', caption);
      });
    });
    $('.wp-block-gallery figure').each(function () {
      $(this).append('<div class="figure-zoom"></div>');
    });
    $(document).on('click', '.figure-zoom', function () {
      $(this).siblings('a').trigger('click');
    });
    $('.wp-block-gallery a').fancybox({// Options will go here
    });
  }
})(jQuery);
"use strict";

(function ($) {
  $(".integration_head_correct").click(function () {
    if ($(".integration_head_input").is(":disabled")) {
      $(".integration_head_input").prop("disabled", false);
    } else {
      $(".integration_head_input").prop("disabled", true);
    }
  });
  $(".integration_head_switch").click(function () {
    $(".switch_popup").toggleClass('disabl');
  });
  $(".connector_requirements").click(function () {
    $(this).find('.connector_requirements_preview').addClass('disabl');
    $(this).find('.connector_requirements_main').removeClass('disabl');
  });
  $(".settings_correct").click(function () {
    $(this).closest('.connector').find('.main_content').prop("disabled", false);
    $(this).parent().addClass('preview');
  });
  $(".settings_accept").click(function () {
    $(this).parent().closest('.connector').find('.main_content').prop("disabled", true);
    $(this).parent().removeClass('preview');
  });
  $(".settings_cancel").click(function () {
    $(this).parent().closest('.connector').find('.main_content').prop("disabled", true);
    $(this).parent().removeClass('preview');
  });
  $(".connector_delete_btn").click(function () {
    $(this).parent().closest('.connector').find('.connector_content').addClass('disabl');
  });
  $(".term_item_toggler").click(function () {
    $(this).parent().closest('.term_item').find('.term_item_content').toggleClass('disabl');
    $(this).find('.term_item_toggler_more').toggleClass('disabl');
    $(this).find('.term_item_toggler_less').toggleClass('disabl');
  });
  $(".system_more").click(function () {
    $(this).parent().closest('.term_item').find('.term_item_content_systems').toggleClass('disabl');
  });
  $(".options_settings_correct").click(function () {
    if ($(".integration_form_options_textarea").is(":disabled")) {
      $('.integration_form_options_textarea').prop("disabled", false);
    } else {
      $('.integration_form_options_textarea').prop("disabled", true);
    }
  });
  $(".integration_upload").click(function () {
    $(this).addClass('disabl');
    $('.field__wrapper').removeClass('disabl');
  }); // $(".integration_file").click(function() {
  //     $( this )
  //     .addClass('disabl');   
  //     $( '.field__wrapper' )
  //     .removeClass('disabl');
  // });
  // let fields = document.querySelectorAll('.field__file');
  // Array.prototype.forEach.call(fields, function (input) {
  //   let label = input.nextElementSibling,
  //     labelVal = label.querySelector('.field__file-fake').innerText;
  //   input.addEventListener('change', function (e) {
  //     let countFiles = '';
  //     if (this.files && this.files.length >= 1)
  //       countFiles = this.files.length;
  //     if (countFiles)
  //       label.querySelector('.field__file-fake').innerText = 'Выбрано файлов: ' + countFiles;
  //     else
  //       label.querySelector('.field__file-fake').innerText = labelVal;
  //   });
  // });

  $(".settings_add").click(function () {
    $('.integration_form_options_inputs_start').after($('<div class="integration_form_options_inputs">' + '<div class="integration_form_field">' + '<input class="integration_form_field_input" type="text" placeholder="www.google.ru">' + '</div>' + '<div class="integration_form_field">' + '<select class="select__list">' + '<option value="Website" class="select__item">Website</option>' + '<option value="Whatsapp" class="select__item">Whatsapp</option>' + '<option value="Telegram" class="select__item">Facebook</option>' + '<option value="Whatsapp" class="select__item">Instagram</option>' + '<option value="Telegram" class="select__item">Telegram</option>' + '<option value="Email" class="select__item">Email</option>' + '<option value="Viber" class="select__item">Viber</option>' + '</select>' + '</div>' + '<div class="integration_form_field_remove">' + '<div class="integration_form_remove settings_remove">' + '</div>' + '</div>' + '</div>'));
  });
  var container = document.querySelector('.integration_form_options_rows');
  $(container).on('mouseover', function () {
    $(".integration_form_field_remove").click(function () {
      $(this).parent().addClass('disabl');
    });
  });
  $(".first").click(function () {
    $('.integration_form_field_role').addClass('disabl');
    $('.integration_form_field_fiz').removeClass('disabl');
    $(this).addClass('active');
    $('.last').removeClass('active');
  });
  $(".last").click(function () {
    $('.integration_form_field_role').addClass('disabl');
    $('.integration_form_field_ur').removeClass('disabl');
    $(this).addClass('active');
    $('.first').removeClass('active');
  });
  $(window).load(function () {
    if ($('.integration_form_field_fiz').hasClass('disabl')) {
      $(".first").addClass('active');
      $(".last").removeClass('active');
    } else {
      $(".first").addClass('active');
      $(".last").removeClass('active');
    }
  }); // Reg dev

  $(".experience_settings_btn").click(function () {
    $('.experience_item_start').before($('<div class="experience_item">' + '<div class="experience_block">' + '<div class="experience_wrapper">' + '<div class="experience_head">' + '<div class="experience_head_date">' + '<input class="experience_head_date_text" type="date" value="01.05.2021">' + '<span>-</span>' + '<input class="experience_head_date_text" type="date" value="01.08.2021">' + '</div>' + '<input type="text" class="experience_head_company" value="Company">' + '</div>' + '<div class="experience_info">' + '<input type="text"  class="experience_info_profession" value="Разработчик приложения">' + '<textarea name="description" wrap="" class="experience_info_description">Создавал</textarea>' + '</div>' + '</div>' + '<div class="experience_settings">' + '<div class="experience_settings_correct">' + '</div>' + '<div class="experience_settings_accept disabl">' + '</div>' + '<div class="experience_settings_cancel">' + '</div>' + '</div>' + '</div>' + '</div>'));
  });
  var containerTwo = document.querySelector('.site');
  $(containerTwo).on('mouseover', function () {
    $(".experience_settings_correct").click(function () {
      $(this).addClass('disabl');
      $(this).parent().closest('.experience_item').find('.experience_settings_accept').removeClass('disabl');
      $(this).parent().closest('.experience_item').find('.experience_block').addClass('change');
    });
    $(".experience_settings_accept").click(function () {
      $(this).parent().closest('.experience_item').find('.experience_block').removeClass('change');
      $(this).addClass('disabl');
      $(this).parent().closest('.experience_item').find('.experience_settings_correct').removeClass('disabl');
    });
    $(".experience_settings_cancel").click(function () {
      $(this).parent().closest('.experience_item').find('.experience_block').addClass('disabl');
    });
  }); //Закидывание данных в общий массив формы

  document.addEventListener('wpcf7beforesubmit', function (event) {
    var alternateItems = document.querySelectorAll('.alternate-item');
    var inputs = event.detail.inputs,
        competencies = alt = {
      name: "alternateConnect",
      value: []
    };

    if (alternateItems.length > 0) {
      var hiddenInput = document.querySelector('[name="reg-dev-alternate-connect"]');

      for (var i = 0; i < alternateItems.length; i++) {
        var alernateValue = alternateItems[i].querySelector('.alternate-item label:first-child input').value,
            alternateType = alternateItems[i].querySelector('.alternate-item label:last-child select').value;
        var alternateItem = {
          alernateValue: alernateValue,
          alternateType: alternateType
        };
        alt.value.push(alternateItem);
      }

      hiddenInput.value = JSON.stringify(alt);
      inputs[16].value = JSON.stringify(alt);
      console.log(inputs[16].value);
      console.log(hiddenInput);
      inputs.push(alt);
    }

    var messageSucces = document.querySelector('.reg-dev-succes');
    messageSucces.classList.add('active');
    setTimeout(function (e) {
      messageSucces.classList.remove('active');
    }, 5000);
    console.log(inputs);
  }, false);
})(jQuery);
"use strict";

(function ($) {
  $(".jobs_wrapper_content_btn").click(function () {
    $([document.documentElement, document.body]).animate({
      scrollTop: $(".jobs_vacantes").offset().top
    });
  });
})(jQuery);
"use strict";

(function ($) {
  $('.jobs_vacantes_slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrow: true,
    infinite: true,
    speed: 500,
    autoplay: false,
    autoplaySpeed: 0,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    }, {
      breakpoint: 750,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
})(jQuery);
"use strict";

(function ($) {
  $(".first_content_video_play").click(function () {
    $(".first_modal").addClass('active');
  });
  $(".first_content_video_wrapper").click(function () {
    $(".first_modal").addClass('active');
  });
  $(".first_modal_close").click(function () {
    $(".first_modal").removeClass('active');
  });
})(jQuery);
"use strict";

(function ($) {
  $(document).ready(function () {
    closeMoodal();
  });

  function closeMoodal() {
    $('.modal__button--close').on('click', function () {
      $(this).closest('.modal__wrapper').removeClass('show');
    });
  }
})(jQuery);
"use strict";

(function ($) {
  if ($('.page-nav').length > 0) {
    var pagenavScroll = function pagenavScroll() {
      var top = $('.announcement-bar.on').outerHeight();

      if ($(window).scrollTop() > pagenavPosition) {
        $('body').addClass('pagenav-on');
        $('.page-nav').css('top', top + 'px');
      } else {
        $('body').removeClass('pagenav-on');
        $('.page-nav').css('top', '');
      }
    };

    var fixBottomPadding = function fixBottomPadding() {
      if ($(window).width() < 576) {
        var btnH = $('.page-nav__btn').outerHeight();
        $('.site-content').css('padding-bottom', btnH + 'px');
      } else {
        $('.site-content').css('padding-bottom', '');
      }
    };

    $('.page-nav .has-submenu > a').on('click', function (e) {
      e.preventDefault();
      $(this).parent().toggleClass('open');
    });
    var pagenavPosition = $('.page-nav').offset().top;
    pagenavScroll();
    $(window).on('scroll', function () {
      pagenavScroll();
    });
    fixBottomPadding();
    $(window).resize(function () {
      fixBottomPadding();
      pagenavScroll();
    });
  }
})(jQuery);
"use strict";

(function ($) {
  $(window).on('load', function () {
    setTimeout(function () {
      $('#preloader').addClass('preloader-noactive');
    }, 1000);
  });
})(jQuery);
"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

(function ($) {
  var final_val_initial = parseInt($('#final_val').text());
  var users_val_number = parseInt($('#users_val').text());
  var operations_val_number = parseInt($('#operations_val').text());
  var final_val_initial2 = parseInt($('#final_val_two').text());
  var users_val_number2 = parseInt($('#users_val2').text());
  var operations_val_number2 = parseInt($('#operations_val2').text());
  var var_first = parseInt($('.var_first').text());
  var var_second = parseInt($('.var_second').text());
  $('#range1').on('change', function () {
    var range_users_val = +$(this).val();
    var range_operations_val = +$('#range2').val();

    if (range_users_val >= users_val_number) {
      var users_val_number_new = range_users_val;
      $('#users_val').text(users_val_number_new);
      $('#user_val').text(users_val_number_new);
      var operations_val_range_din = +$('#range2').val();
      var final_val_new = final_val_initial + (range_users_val - users_val_number) * var_first + operations_val_range_din / 1000 * var_first;
      $('#final_val').text(final_val_new);
      $('#rate_val').text(final_val_new);
    }

    if (range_users_val < users_val_number) {
      $('#users_val').text(users_val_number);
      $('#user_val').text(users_val_number);

      var _operations_val_range_din = +$('#range2').val();

      var _final_val_new = final_val_initial + _operations_val_range_din / 1000 * var_first;

      $('#final_val').text(_final_val_new);
      $('#rate_val').text(_final_val_new);
    }

    if (range_users_val >= users_val_number2) {
      var users_val_number_new2 = range_users_val;
      $('#users_val2').text(users_val_number_new2);
      $('#user_val2').text(users_val_number_new2);

      var _operations_val_range_din2 = +$('#range2').val();

      var final_val_new2 = final_val_initial2 + (range_users_val - users_val_number2) * var_second + _operations_val_range_din2 / 1000 * var_second;
      $('#final_val_two').text(final_val_new2);
      $('#rate_val2').text(final_val_new2);
    }

    if (range_users_val < users_val_number2) {
      $('#users_val2').text(users_val_number2);
      $('#user_val2').text(users_val_number2);

      var _operations_val_range_din3 = +$('#range2').val();

      var _final_val_new2 = final_val_initial2 + _operations_val_range_din3 / 1000 * var_second;

      $('#final_val_two').text(_final_val_new2);
      $('#rate_val2').text(_final_val_new2);
    }
  });
  $('#range2').on('change', function () {
    var range_operations_val = +$(this).val();
    var range_users_val = +$('#range1').val();

    if (range_operations_val >= operations_val_number) {
      var operations_val_number_new = range_operations_val;
      $('#operations_val').text(operations_val_number_new);
      $('#operation_val').text(operations_val_number_new);
      var users_val_range_din = +$('#range1').val();
      var final_val_new_two = final_val_initial + (range_operations_val - operations_val_number) / 1000 * var_first + users_val_range_din * var_first;
      $('#final_val').text(final_val_new_two);
      $('#rate_val').text(final_val_new_two);
    }

    if (range_operations_val < operations_val_number) {
      var _operations_val_number_new = operations_val_number;
      $('#operations_val').text(_operations_val_number_new);
      $('#operation_val').text(_operations_val_number_new);

      var _users_val_range_din = +$('#range1').val();

      var users_val_low = _users_val_range_din * var_first;

      var _final_val_new_two = final_val_initial + users_val_low;

      $('#final_val').text(_final_val_new_two);
      $('#rate_val').text(_final_val_new_two);
    }

    if (range_operations_val >= operations_val_number2) {
      var operations_val_number_new2 = range_operations_val;
      $('#operations_val2').text(operations_val_number_new2);
      $('#operation_val2').text(operations_val_number_new2);

      var _users_val_range_din2 = +$('#range1').val();

      var final_val_new_two2 = final_val_initial2 + (range_operations_val - operations_val_number2) / 1000 * var_second + _users_val_range_din2 * var_second;
      $('#final_val_two').text(final_val_new_two2);
      $('#rate_val2').text(final_val_new_two2);
    }

    if (range_operations_val < operations_val_number2) {
      var _operations_val_number_new2 = operations_val_number2;
      $('#operations_val2').text(_operations_val_number_new2);
      $('#operation_val2').text(_operations_val_number_new2);

      var _users_val_range_din3 = +$('#range1').val();

      var users_val_low2 = _users_val_range_din3 * var_second;

      var _final_val_new_two2 = final_val_initial2 + users_val_low2;

      $('#final_val_two').text(_final_val_new_two2);
      $('#rate_val2').text(_final_val_new_two2);
    }
  });
  $('.form-check-input-rate_page').on('click', function () {
    $('.rate_page__list').toggleClass('active');
    var final_val_din = parseInt($('#final_val').text());
    var final_val_din_two = parseInt($('#final_val_two').text()); // console.log(final_val_din);

    if ($('.rate_page__list').hasClass('active')) {
      var final_val_sale = parseInt(final_val_din / 0.85);
      $('#final_val').text(final_val_sale);
      $('#rate_val').text(final_val_sale);
      var final_val_sale_two = parseInt(final_val_din_two / 0.85);
      console.log(final_val_sale_two);
      $('#final_val_two').text(final_val_sale_two);
      $('#rate_val2').text(final_val_sale_two);
    } else {
      var _final_val_sale = parseInt(final_val_din - parseInt(final_val_din * 0.15));

      $('#final_val').text(_final_val_sale);
      $('#rate_val').text(_final_val_sale);

      var _final_val_sale_two = parseInt(final_val_din_two - parseInt(final_val_din_two * 0.15));

      $('#final_val_two').text(_final_val_sale_two);
      $('#rate_val2').text(_final_val_sale_two);
    }
  }); // Range script

  window.addEventListener("DOMContentLoaded", function () {
    var range1 = new rSlider({
      element: "#range1",
      tick: 50
    }),
        range2 = new rSlider({
      element: "#range2",
      tick: 50000
    });
  });

  var rSlider = /*#__PURE__*/function () {
    function rSlider(args) {
      var _this = this;

      _classCallCheck(this, rSlider);

      this.el = document.querySelector(args.element);
      this.min = this.el ? +this.el.min : 0;
      this.max = this.el ? +this.el.max : 100;
      this.step = this.el ? +this.el.step : 1;
      this.tick = args.tick || this.step;

      if (this.el) {
        this.addTicks();
        this.dataRange = document.createElement("div");
        this.dataRange.className = "data-range";
        this.el.parentElement.appendChild(this.dataRange, this.el);
        this.dataValue = document.createElement("div");
        this.dataValue.className = "data-value";
        this.el.parentElement.appendChild(this.dataValue, this.el);
        this.updatePos();
        this.el.addEventListener("input", function () {
          _this.updatePos();
        });
      }
    }

    _createClass(rSlider, [{
      key: "addTicks",
      value: function addTicks() {
        if (this.el) {
          var wrap = document.createElement("div");
          wrap.className = "range";
          this.el.parentElement.insertBefore(wrap, this.el);
          wrap.appendChild(this.el);
          var ticks = document.createElement("div");
          ticks.className = "range-ticks";
          wrap.appendChild(ticks);

          for (var t = this.min; t <= this.max; t += this.tick) {
            var tick = document.createElement("span");
            tick.className = "range-tick";
            ticks.appendChild(tick);
            var tickText = document.createElement("span");
            tickText.className = "range-tick-text";
            tick.appendChild(tickText);
            tickText.textContent = t;
          }
        }
      }
    }, {
      key: "getRangePercent",
      value: function getRangePercent() {
        var max = this.el.max,
            min = this.el.min,
            relativeValue = this.el.value - min,
            ticks = max - min,
            percent = relativeValue / ticks;
        return percent;
      }
    }, {
      key: "updatePos",
      value: function updatePos() {
        var percent = this.getRangePercent(),
            left = percent * 100,
            emAdjust = percent * 3;
        this.dataRange.style.left = "calc(".concat(left, "% - ").concat(emAdjust, "em)");
        this.dataValue.innerHTML = this.el.value;
        this.dataValue.style.left = "calc(".concat(left, "% - ").concat(emAdjust, "em)");
      }
    }]);

    return rSlider;
  }();
})(jQuery);
"use strict";

(function ($) {
  $('.tbody_list').click(function () {
    $('.tbody_list').addClass('tbody_list-disabled');
    $('.tbody_list-1').removeClass('tbody_list-disabled');
    $(this).toggleClass('tbody_list-disabled');
  });
  $('.rate_delete_first').click(function () {
    $('.rate_first').addClass('rate-disabled');
  });
  $('.rate_delete_second').click(function () {
    $('.rate_second').addClass('rate-disabled');
  });
  $('.rate_delete_third').click(function () {
    $('.rate_third').addClass('rate-disabled');
  });
  $('.rate_delete_fourth').click(function () {
    $('.rate_fourth').addClass('rate-disabled');
  });
  $(".row_main").click(function () {
    $([document.documentElement, document.body]).animate({
      scrollTop: $(".table-responsive").offset().top
    }, 1000);
  });
})(jQuery);
"use strict";

jQuery(document).ready(function ($) {
  var wrapperConRegFormDevIp = document.querySelector('.js-reg-dev-form-connectors-ip'),
      itemInSearch = document.getElementsByClassName('js-item-search-reg-form'),
      regFormDev = document.querySelector('.my-acc-reg-form');

  if (regFormDev) {
    //!
    var createInput = function createInput(wrapper, type) {
      var extraClass = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'form__input-text';
      var input = document.createElement("input"),
          label = document.createElement("label"); //label.innerHTML = labelText;

      input.type = type;
      input.classList.add('form__input', extraClass);

      if (type == 'number') {
        input.value = 0;
      } else {
        input.placeholder = 'Введите данные';
      }

      label.appendChild(input);
      wrapper.appendChild(label);
    };

    var createSelect = function createSelect(array, wrapper) {
      var selectList = document.createElement("select"),
          label = document.createElement("label"); //label.innerHTML = labelText;

      selectList.classList.add('form__input', 'form__select');
      wrapper.appendChild(label);
      label.appendChild(selectList);

      for (var i = 0; i < array.length; i++) {
        var option = document.createElement("option");
        option.value = array[i];
        option.text = array[i];
        selectList.appendChild(option);
      }
    };

    //Добавление компетенций по интеграциям
    var checkItemOnConRegForm = function checkItemOnConRegForm() {
      var _loop = function _loop(i) {
        itemInSearch[i].addEventListener('click', function (e) {
          e.preventDefault();
          var wrapper = document.createElement('div'),
              name = document.createElement('div'),
              img = itemInSearch[i].querySelector('img'),
              a = itemInSearch[i].querySelector('a'),
              span = a.querySelector('span');
          var deleteElement = document.createElement('div');
          deleteElement.classList.add('con-item__delete');
          deleteElement.innerHTML = "<svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M2.5 5.00001H4.16667M4.16667 5.00001H17.5M4.16667 5.00001V16.6667C4.16667 17.1087 4.34226 17.5326 4.65482 17.8452C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667V5.00001H4.16667ZM6.66667 5.00001V3.33334C6.66667 2.89131 6.84226 2.46739 7.15482 2.15483C7.46738 1.84227 7.89131 1.66667 8.33333 1.66667H11.6667C12.1087 1.66667 12.5326 1.84227 12.8452 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M8.33333 9.16667V14.1667M11.6667 9.16667V14.1667\" stroke=\"#667085\" stroke-width=\"1.66667\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                                </svg>\n                                                ";
          wrapper.append(deleteElement);
          span.remove();
          name.classList.add('con-item__name');
          wrapper.classList.add('con-item', 'con-item-integration');
          wrapper.append(name);
          name.append(img);
          name.innerHTML = name.innerHTML + '<span class="js-reg-name">' + a.innerHTML + '</span>';

          if (partnerTrigger) {
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
          } else {
            createSelect(['Junior', 'Middle', 'Middle+', 'Senior'], wrapper);
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
            createInput(wrapper, 'number');
            createInput(wrapper, 'date');
          }

          wrapperConRegFormDevIp.append(wrapper);
          deleteElement.addEventListener('click', function (e) {
            e.preventDefault();
            this.parentElement.remove();
          });
          itemInSearch[i].parentElement.parentElement.parentElement.classList.remove('active');
          itemInSearch[i].parentElement.parentElement.parentElement.querySelector('input').value = '';
          $('.codyshop-ajax-search').fadeOut().html(result);
        });
      };

      for (var i = 0; i < itemInSearch.length; i++) {
        _loop(i);
      }

      function createInput(wrapper, type) {
        var extraClass = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'form__input-text';
        var input = document.createElement("input"),
            label = document.createElement("label"); //label.innerHTML = labelText;

        input.type = type;
        input.classList.add('form__input', extraClass);

        if (type == 'number') {
          input.value = 0;
        } else {
          input.placeholder = 'Введите данные';
        }

        wrapper.appendChild(label);
        label.appendChild(input);
      }

      function createSelect(array, wrapper) {
        var selectList = document.createElement("select"),
            label = document.createElement("label"); //label.innerHTML = labelText;

        selectList.classList.add('form__input', 'form__select');
        wrapper.appendChild(label);
        label.appendChild(selectList);

        for (var _i5 = 0; _i5 < array.length; _i5++) {
          var option = document.createElement("option");
          option.value = array[_i5];
          option.text = array[_i5];
          selectList.appendChild(option);
        }
      }
    }; //Добавление Компетенций


    var checkItemOnCompRegForm = function checkItemOnCompRegForm() {
      var itemInSearch = document.getElementsByClassName('js-item-search-reg-form-comp');

      var _loop2 = function _loop2(i) {
        itemInSearch[i].addEventListener('click', function (e) {
          e.preventDefault();
          var wrapper = document.createElement('div'),
              name = document.createElement('div'),
              img = itemInSearch[i].querySelector('.comp'),
              a = itemInSearch[i].querySelector('a'),
              span = a.querySelector('span');
          var deleteElement = document.createElement('div');
          deleteElement.classList.add('con-item__delete');
          deleteElement.innerHTML = "<svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n                                                <path d=\"M2.5 5.00001H4.16667M4.16667 5.00001H17.5M4.16667 5.00001V16.6667C4.16667 17.1087 4.34226 17.5326 4.65482 17.8452C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667V5.00001H4.16667ZM6.66667 5.00001V3.33334C6.66667 2.89131 6.84226 2.46739 7.15482 2.15483C7.46738 1.84227 7.89131 1.66667 8.33333 1.66667H11.6667C12.1087 1.66667 12.5326 1.84227 12.8452 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M8.33333 9.16667V14.1667M11.6667 9.16667V14.1667\" stroke=\"#667085\" stroke-width=\"1.66667\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\n                                                </svg>\n                                                ";
          wrapper.append(deleteElement);
          span.remove();
          name.classList.add('con-item__name');
          wrapper.classList.add('con-item', 'con-item-comp');
          wrapper.append(name);
          name.append(img);
          name.innerHTML = name.innerHTML + '<span class="js-reg-name">' + a.innerHTML + '</span>';
          createSelect(['Junior', 'Middle', 'Middle+', 'Senior'], wrapper);
          createSelect(['Меньше года', '1-3 года', '3-5 лет', 'Больше 5 лет'], wrapper);
          createInput(wrapper, 'date');
          document.querySelector('.reg-dev-form-competetion').append(wrapper);
          deleteElement.addEventListener('click', function (e) {
            e.preventDefault();
            this.parentElement.remove();
          });
          itemInSearch[i].parentElement.parentElement.parentElement.classList.remove('active');
          itemInSearch[i].parentElement.parentElement.parentElement.querySelector('input').value = '';
          $('.codyshop-ajax-search').fadeOut().html(result);
        });
      };

      for (var i = 0; i < itemInSearch.length; i++) {
        _loop2(i);
      }

      function createInput(wrapper, type) {
        var extraClass = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'form__input-text';
        var input = document.createElement("input"),
            label = document.createElement("label"); //label.innerHTML = labelText;

        input.type = type;
        input.classList.add('form__input', extraClass);

        if (type == 'number') {
          input.value = 0;
        } else {
          input.placeholder = 'Введите данные';
        }

        wrapper.appendChild(label);
        label.appendChild(input);
      }

      function createSelect(array, wrapper) {
        var selectList = document.createElement("select"),
            label = document.createElement("label"); //label.innerHTML = labelText;

        selectList.classList.add('form__input', 'form__select');
        wrapper.appendChild(label);
        label.appendChild(selectList);

        for (var _i6 = 0; _i6 < array.length; _i6++) {
          var option = document.createElement("option");
          option.value = array[_i6];
          option.text = array[_i6];
          selectList.appendChild(option);
        }
      }
    }; //Видимость формы поиска у компетенций


    var indDevBtn = regFormDev.querySelector('.wpcf7-list-item.first label');
    var btnOpenModalAddWork = document.querySelector('.js-reg-dev-add-work'),
        modalAddWork = document.querySelector('.modal-add-work'),
        sidebarAddWork = document.querySelector('.modal-sidebar-work'),
        body = document.querySelector('html'),
        btnAddAltConnect = document.querySelector('.js-acc-reg-form-plus-alternate'); //Добавление альтернативных способов связи

    if (btnAddAltConnect) {
      var wrapper = document.querySelector('.reg-dev-form-alternate');
      btnAddAltConnect.addEventListener('click', function (e) {
        var item = document.createElement('div');
        item.classList.add('alternate-item');
        createInput(item, 'text');
        createSelect(['Website', 'Whatsapp', 'Telegram', 'Email', 'Viber', 'Дополнительный номер', 'Почтовый адрес', 'Ссылка на социальную сеть', 'Другое...'], item);
        wrapper.append(item);
      });
    } //Добавление опыта работы


    if (btnOpenModalAddWork && modalAddWork && sidebarAddWork) {
      var closeModal = function closeModal(e) {
        e.preventDefault();
        modalAddWork.classList.remove('active');
        sidebarAddWork.classList.remove('active');
        body.style.overflowY = 'scroll';
      };

      btnOpenModalAddWork.addEventListener('click', function (e) {
        e.preventDefault();
        modalAddWork.classList.add('active');
        sidebarAddWork.classList.add('active');
        body.style.overflowY = 'hidden';
      });

      var btnSaveWork = document.querySelector('.js-add-work-item'),
          _wrapper = document.querySelector('.js-wrapper-works-dev'),
          btnExit = document.querySelector('.modal-add-work__exit');

      btnExit.addEventListener('click', function (e) {
        closeModal(e);
      });
      btnSaveWork.addEventListener('click', function (e) {
        var _this = this;

        var workItem = document.createElement('div'),
            nowDate = document.querySelector('[name="now-date-work"]'),
            lastDate = document.querySelector('[name="last-date-work"]'),
            name = document.querySelector('[name="name-work-item"]'),
            dol = document.querySelector('[name="name-work-dol"]'),
            text = document.querySelector('[name="text-work-item"]'),
            check = document.querySelector('[name="now-date-check"]');

        if (check.checked === true) {
          lastDate = 'по настоящее время';
        } else {
          lastDate = document.querySelector('[name="last-date-work"]').value;
        }

        if (nowDate.value === '' || dol.value === '' || name.value === '' || text.value === '') {
          e.preventDefault();
          this.innerHTML = 'Заполните все поля!';
          setTimeout(function (e) {
            _this.innerHTML = 'Сохранить';
          }, 3000);
        } else {
          var deleteElement = document.createElement('div'),
              editElement = document.createElement('div');
          deleteElement.classList.add('con-item__delete');
          editElement.classList.add('con-item__edit');
          deleteElement.innerHTML = "<svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M2.5 5.00001H4.16667M4.16667 5.00001H17.5M4.16667 5.00001V16.6667C4.16667 17.1087 4.34226 17.5326 4.65482 17.8452C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667V5.00001H4.16667ZM6.66667 5.00001V3.33334C6.66667 2.89131 6.84226 2.46739 7.15482 2.15483C7.46738 1.84227 7.89131 1.66667 8.33333 1.66667H11.6667C12.1087 1.66667 12.5326 1.84227 12.8452 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M8.33333 9.16667V14.1667M11.6667 9.16667V14.1667\" stroke=\"#667085\" stroke-width=\"1.66667\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>";
          editElement.innerHTML = "<svg width=\"14\" height=\"17\" viewBox=\"0 0 14 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M10.0779 1.61229C10.2368 1.41817 10.4255 1.26419 10.6332 1.15913C10.8409 1.05407 11.0635 1 11.2883 1C11.513 1 11.7356 1.05407 11.9433 1.15913C12.151 1.26419 12.3397 1.41817 12.4986 1.61229C12.6576 1.80642 12.7837 2.03687 12.8697 2.2905C12.9557 2.54413 13 2.81597 13 3.0905C13 3.36503 12.9557 3.63687 12.8697 3.8905C12.7837 4.14413 12.6576 4.37459 12.4986 4.56871L4.32855 14.5466L1 15.6553L1.90779 11.5902L10.0779 1.61229Z\" stroke=\"white\" stroke-width=\"1.66667\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/></svg>";
          workItem.classList.add('reg-dev-work-item');
          workItem.innerHTML = "\n                        <div class=\"reg-dev-work-item__header\">\n                            <span class=\"reg-dev-work-item__date\"><span class=\"reg-dev-work-item__date-now\">".concat(nowDate.value, "</span> - <span class=\"reg-dev-work-item__date-last\">").concat(lastDate, "</span></span>\n                            <span class=\"reg-dev-work-item__name\">").concat(name.value, "</span>\n                        </div>\n                        <div class=\"reg-dev-work-item__content\">\n                            <span class=\"reg-dev-work-item__dol\">").concat(dol.value, "</span>\n                            <div class=\"reg-dev-work-item__text\">").concat(text.value, "</div>\n                        </div>\n                        ");
          nowDate.value = '';
          lastDate.value = '';
          name.value = '';
          dol.value = '';
          text.value = '';
          check.checked = false;
          workItem.append(deleteElement);
          workItem.append(editElement);

          _wrapper.appendChild(workItem);

          closeModal(e);
          deleteElement.addEventListener('click', function (e) {
            e.preventDefault();
            this.parentElement.remove();
          });
          editElement.addEventListener('click', function (e) {
            e.preventDefault();
            modalAddWork.classList.add('active');
            sidebarAddWork.classList.add('active');
            body.style.overflowY = 'hidden';
            btnSaveWork.innerHTML = 'Редактировать';
            var parent = this.parentElement,
                nowDateVal = document.querySelector('.reg-dev-work-item__date'),
                lastDate = document.querySelector('[name="last-date-work"]'),
                nameVal = parent.querySelector('.reg-dev-work-item__name').innerHTML,
                dolVal = parent.querySelector('.reg-dev-work-item__dol').innerHTML,
                textVal = parent.querySelector('.reg-dev-work-item__text').innerHTML;
            name.value = nameVal;
            dol.value = dolVal;
            text.value = textVal;
            nowDate.value = nowDateVal;
            lastDate.value = '';
            btnExit.addEventListener('click', function (e) {
              nowDate.value = '';
              lastDate.value = '';
              name.value = '';
              dol.value = '';
              text.value = '';
              check.checked = false;
              btnSaveWork.innerHTML = 'Сохранить';
            });
            btnSaveWork.addEventListener('click', function (e) {
              nameVal = name.value;
              dolVal = dol.value;
              textVal = text.value;
              btnSaveWork.innerHTML = 'Сохранить';
              parent.remove();
              closeModal(e);
            });
          });
        }
      });
    }

    var partnerTrigger = document.querySelector('.my-acc-reg-form-partner'); //Закидывание данных в общий массив формы

    document.addEventListener('wpcf7beforesubmit', function (event) {
      var dopInputs = document.querySelectorAll('.con-item-integration'),
          dopComp = document.querySelectorAll('.con-item-comp'),
          worksItems = document.querySelectorAll('.reg-dev-work-item'),
          alternateItems = document.querySelectorAll('.alternate-item');
      var inputs = event.detail.inputs,
          competencies = {
        name: 'competencies',
        value: []
      },
          connectors = {
        name: "connectors",
        value: []
      },
          works = {
        name: "works",
        value: []
      },
          alt = {
        name: "alternateConnect",
        value: []
      };

      if (dopInputs.length > 0) {
        if (partnerTrigger) {
          for (var i = 0; i < dopInputs.length; i++) {
            var name = dopInputs[i].querySelector('.js-reg-name').innerHTML,
                juniorVal = dopInputs[i].querySelector('label:nth-of-type(1) input').value,
                middleVal = dopInputs[i].querySelector('label:nth-of-type(2) input').value,
                middlePlusVal = dopInputs[i].querySelector('label:nth-of-type(3) input').value,
                seniorVal = dopInputs[i].querySelector('label:nth-of-type(4) input').value,
                successProjectVal = dopInputs[i].querySelector('label:nth-of-type(5) input').value,
                projectYearVal = dopInputs[i].querySelector('label:nth-of-type(6) input').value;
            var connector = {
              name: name,
              junior: juniorVal,
              middle: middleVal,
              middlePlus: middlePlusVal,
              senior: seniorVal,
              successProject: successProjectVal,
              projectYear: projectYearVal
            };
            connectors.value.push(connector);
          }
        } else {
          for (var _i = 0; _i < dopInputs.length; _i++) {
            var _name = dopInputs[_i].querySelector('.js-reg-name').innerHTML,
                competenceVal = dopInputs[_i].querySelector('label:nth-of-type(1) select').value,
                _successProjectVal = dopInputs[_i].querySelector('label:nth-of-type(2) input').value,
                _projectYearVal = dopInputs[_i].querySelector('label:nth-of-type(3) input').value,
                comExpVal = dopInputs[_i].querySelector('label:nth-of-type(4) input').value,
                lastExpVal = dopInputs[_i].querySelector('label:nth-of-type(5) input').value;

            var _connector = {
              name: _name,
              competence: competenceVal,
              successProject: _successProjectVal,
              projectYear: _projectYearVal,
              comExp: comExpVal,
              lastExp: lastExpVal
            };
            connectors.value.push(_connector);
          }
        }

        var hiddenInput = document.querySelector('[name="reg-dev-comp-integr"]');
        hiddenInput.value = JSON.stringify(connectors);
        inputs[18].value = JSON.stringify(connectors);
        console.log(inputs[18].value);
        inputs.push(connectors);
      }

      if (dopComp.length > 0) {
        var _hiddenInput = document.querySelector('[name="reg-dev-comp-dev"]');

        for (var _i2 = 0; _i2 < dopComp.length; _i2++) {
          var _name2 = dopComp[_i2].querySelector('.js-reg-name').innerHTML,
              _competenceVal = dopComp[_i2].querySelector('label:nth-of-type(1) select').value,
              _comExpVal = dopComp[_i2].querySelector('label:nth-of-type(2) select').value,
              _lastExpVal = dopComp[_i2].querySelector('label:nth-of-type(3) input').value;

          var comp = {
            name: _name2,
            competence: _competenceVal,
            comExp: _comExpVal,
            lastExp: _lastExpVal
          };
          competencies.value.push(comp);
        }

        _hiddenInput.value = JSON.stringify(competencies);
        inputs[17].value = JSON.stringify(competencies);
        console.log(_hiddenInput);
        inputs.push(competencies);
      }

      if (worksItems.length > 0) {
        var _hiddenInput2 = document.querySelector('[name="reg-dev-exp-work"]');

        for (var _i3 = 0; _i3 < worksItems.length; _i3++) {
          var dateStart = worksItems[_i3].querySelector('.reg-dev-work-item__date-now').innerHTML,
              dateEnd = worksItems[_i3].querySelector('.reg-dev-work-item__date-last').innerHTML,
              nameOrganization = worksItems[_i3].querySelector('.reg-dev-work-item__name').innerHTML,
              position = worksItems[_i3].querySelector('.reg-dev-work-item__dol').innerHTML,
              description = worksItems[_i3].querySelector('.reg-dev-work-item__text').innerHTML;

          var work = {
            dateStart: dateStart,
            dateEnd: dateEnd,
            nameOrganization: nameOrganization,
            position: position,
            description: description
          };
          works.value.push(work);
        }

        _hiddenInput2.value = JSON.stringify(works);
        inputs[19].value = JSON.stringify(works);
        console.log(inputs[19].value);
        console.log(_hiddenInput2);
        inputs.push(works);
      }

      if (alternateItems.length > 0) {
        var _hiddenInput3 = document.querySelector('[name="reg-dev-alternate-connect"]');

        for (var _i4 = 0; _i4 < alternateItems.length; _i4++) {
          var alernateValue = alternateItems[_i4].querySelector('.alternate-item label:first-child input').value,
              alternateType = alternateItems[_i4].querySelector('.alternate-item label:last-child select').value;

          var alternateItem = {
            alernateValue: alernateValue,
            alternateType: alternateType
          };
          alt.value.push(alternateItem);
        }

        _hiddenInput3.value = JSON.stringify(alt);
        inputs[16].value = JSON.stringify(alt);
        console.log(inputs[16].value);
        console.log(_hiddenInput3);
        inputs.push(alt);
      }

      var messageSucces = document.querySelector('.reg-dev-succes');
      messageSucces.classList.add('active');
      setTimeout(function (e) {
        messageSucces.classList.remove('active');
      }, 5000);
      console.log(inputs);
    }, false);
    var btnPlus = document.querySelectorAll('.acc-reg-form-plus__plus');
    btnPlus.forEach(function (item, i) {
      item.addEventListener('click', function (e) {
        e.preventDefault();
        item.parentElement.querySelector('.acc-reg-form-plus__search').classList.add('active');
      });
    }); //Поиск по интеграциям

    $('.search-field-product').keypress(function (eventObject) {
      var searchTerm = $(this).val(); // проверим, если в поле ввода более 2 символов, запускаем ajax

      if (searchTerm.length > 1) {
        $.ajax({
          url: '/wp-admin/admin-ajax.php',
          type: 'POST',
          data: {
            'action': 'codyshop_ajax_search',
            'term': searchTerm
          },
          success: function success(result) {
            $('.codyshop-ajax-search-prod').fadeIn().html(result);
            checkItemOnConRegForm();
            searchTerm = '';
          }
        });
      } else {
        $('.codyshop-ajax-search-prod').fadeOut();
      }
    }); //Поиск по компетенциям

    $('.search-field-comp').keypress(function (eventObject) {
      var searchTerm = $(this).val(); // проверим, если в поле ввода более 2 символов, запускаем ajax

      if (searchTerm.length > 1) {
        $.ajax({
          url: '/wp-admin/admin-ajax.php',
          type: 'POST',
          data: {
            'action': 'codyshop_ajax_search_comp',
            'term': searchTerm
          },
          success: function success(result) {
            $('.codyshop-ajax-search-comp').fadeIn().html(result);
            checkItemOnCompRegForm();
            searchTerm = '';
          }
        });
      } else {
        $('.codyshop-ajax-search-comp').fadeOut();
      }
    }); //Поиск по компетенциям
  }

  $('.search-field-tarifscomp').keypress(function (eventObject) {
    var searchTerm = $(this).val(); // проверим, если в поле ввода более 2 символов, запускаем ajax

    if (searchTerm.length > 1) {
      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'POST',
        data: {
          'action': 'codyshop_ajax_search_tarifsconc',
          'term': searchTerm
        },
        success: function success(result) {
          $('.codyshop-ajax-search-tarifscomp').fadeIn().html(result);
          addConcurent();
          searchTerm = '';
        }
      });
    } else {
      $('.codyshop-ajax-search-tarifscomp').fadeOut();
    }
  });
  var wrapperDopTariffs = document.querySelector('.js-tariffs-conc');

  function addConcurent() {
    var itemInSearch = document.getElementsByClassName('js-item-search-tarifsconc');
    var arrDataFront = wrapperDopTariffs.querySelectorAll('.landing-table-product-info-item .landing-table-prod__value'),
        name = wrapperDopTariffs.querySelector('.landing-table-product__name'),
        lastName = wrapperDopTariffs.querySelector('.landing-table__slogan'),
        price = wrapperDopTariffs.querySelector('.landing-table__price-bold'),
        header = wrapperDopTariffs.querySelector('.landing-table__header'),
        resetBtn = document.querySelector('.js-tarifs-item-reset'),
        inputSearch = wrapperDopTariffs.querySelector('.acc-reg-form-plus__search');

    var _loop3 = function _loop3(i) {
      itemInSearch[i].addEventListener('click', function (e) {
        e.preventDefault();
        var arrDataBack = itemInSearch[i].querySelectorAll('.js-item-search-tarifsconc__attr'),
            priceSearch = itemInSearch[i].querySelector('.js-item-search_tarifsconc__price'),
            nameSearch = itemInSearch[i].querySelector('.js-item-search_tarifsconc__name');
        inputSearch.classList.remove('active');
        header.classList.remove('disabled');
        name.innerHTML = nameSearch.innerHTML;
        lastName.innerHTML = nameSearch.innerHTML;
        price.innerHTML = priceSearch.innerHTML;
        resetBtn.classList.add('active');
        wrapperDopTariffs.querySelector('.landing-table-product').classList.remove('disabled');

        for (var _i8 = 0; arrDataBack.length; _i8++) {
          if (arrDataBack[_i8].innerHTML) {
            arrDataFront[_i8].innerHTML = arrDataBack[_i8].innerHTML;
          } else {
            arrDataFront[_i8].innerHTML = 'Нет данных';
          }
        }

        $('.codyshop-ajax-search-tarifscomp').fadeOut().html(result);
      });
    };

    for (var i = 0; i < itemInSearch.length; i++) {
      _loop3(i);
    }

    function createInput(wrapper, type) {
      var extraClass = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'form__input-text';
      var input = document.createElement("input"),
          label = document.createElement("label"); //label.innerHTML = labelText;

      input.type = type;
      input.classList.add('form__input', extraClass);

      if (type == 'number') {
        input.value = 0;
      } else {
        input.placeholder = 'Введите данные';
      }

      wrapper.appendChild(label);
      label.appendChild(input);
    }

    function createSelect(array, wrapper) {
      var selectList = document.createElement("select"),
          label = document.createElement("label"); //label.innerHTML = labelText;

      selectList.classList.add('form__input', 'form__select');
      wrapper.appendChild(label);
      label.appendChild(selectList);

      for (var _i7 = 0; _i7 < array.length; _i7++) {
        var option = document.createElement("option");
        option.value = array[_i7];
        option.text = array[_i7];
        selectList.appendChild(option);
      }
    }
  }

  $("input[type=\"tel\"]").mask("9(999)999-99-99");
  $('body').on('click', 'button.plus, button.minus', function () {
    var qty = $(this).parent().find('input'),
        val = parseInt(qty.val()),
        min = parseInt(qty.attr('min')),
        max = parseInt(qty.attr('max')),
        step = parseInt(qty.attr('step')); // дальше меняем значение количества в зависимости от нажатия кнопки

    if ($(this).is('.plus')) {
      if (max && max <= val) {
        qty.val(max).change();
        $('[name="update_cart"]').trigger('click');
      } else {
        qty.val(val + step).change();
        $('[name="update_cart"]').trigger('click');
      }
    } else {
      if (min && min >= val) {
        qty.val(min).change();
      } else if (val > 1) {
        qty.val(val - step).change();
      }

      $('[name="update_cart"]').trigger('click');
    }
  });
  var token = "c19bd1e4befd64fd8ca789c3078dcec314798be9";
  $('#shipping_address_1').suggestions({
    token: token,
    type: "ADDRESS",
    constraints: {
      locations: {
        country: "*"
      }
    }
  });
  $('#billing_address_1').suggestions({
    token: token,
    type: "ADDRESS",
    constraints: {
      locations: {
        country: "*"
      }
    }
  });
  $('#js-address').suggestions({
    token: token,
    type: "ADDRESS",
    constraints: {
      locations: {
        country: "*"
      }
    }
  });
});
"use strict";

(function ($) {
  //contacf form reg
  var wooForm = document.getElementById('cf7_woo_reg');
  var wooFormBtn = $(wooForm).find('.wpcf7-submit');
  var defaultWooForm = document.getElementById('default_woo_form');

  if (typeof wooForm != 'undefined' && wooForm != null) {
    var billingClientRole = $("#billing_client_role");
    var billingClientSize = $("#billing_client_size");
    var billingClientIndustry = $("#billing_client_industry");
    var billingClientExperience = $("#billing_client_experience");
    $("#cf_billing_client_role").on('change', function (e) {
      $(billingClientRole).val($(this).val());
      console.log($(billingClientRole).val());
    });
    $("#cf_billing_client_size").on('change', function (e) {
      $(billingClientSize).val($(this).val());
    });
    $("#cf_billing_client_industry").on('change', function (e) {
      $(billingClientIndustry).val($(this).val());
    });
    $("#cf_billing_client_experience").on('change', function (e) {
      $(billingClientExperience).val($(this).val());
    });
    $(wooFormBtn).on('click', function (e) {
      //e.preventDefault()
      if (billingClientRole.val() != '' && billingClientSize.val() != '' && billingClientIndustry.val() != '' && billingClientExperience.val() !== '') {
        console.log(billingClientRole.val()); //alert ('test')

        $(defaultWooForm).find('button').click(); //$(wooForm).submit()
      }
    });
  }
})(jQuery);
"use strict";

(function ($) {
  function scrollToElement($target) {
    if ($target.length) {
      var scroll = $target.offset().top - $('.page-nav').outerHeight() - 30;

      if ($('.announcement-bar.on').length) {
        scroll += $('.announcement-bar.on').outerHeight();
      }

      if ($('.header').length) {
        scroll += $('.header').outerHeight();
      }

      if (scroll < 0) {
        scroll = 0;
      }

      $('html, body').animate({
        scrollTop: scroll
      }, 1000);
    }
  }

  function initScrollToElement() {
    $('a.scroll-to').on('click', function (event) {
      var href = $(this).attr('href');

      if (href && href.indexOf('#') === 0 && href.length > 1) {
        var $target = $(href);

        if ($target.length) {
          event.preventDefault();
          scrollToElement($target);
        }
      }
    }); // TODO uncomment if you need this functionality.
    // jQuery( window ).on( 'hashchange load', function() {
    // 	if ( window.location.hash ) {
    // 		const $el = $( window.location.hash );
    // 		if ( $el.length ) {
    // 			scrollToElement( $el );
    // 		}
    // 	}
    // } );
  }

  initScrollToElement();
})(jQuery);
"use strict";

(function ($) {
  $(".menu__item_scroll").click(function () {
    $([document.documentElement, document.body]).animate({
      scrollTop: $(".footer").offset().top
    }, 1000);
  });
  $(".first_btn ").click(function () {
    $([document.documentElement, document.body]).animate({
      scrollTop: $(".rate_page").offset().top
    }, 500);
  });
})(jQuery);
"use strict";

(function ($) {
  if ($('.slickjs').length > 0) {
    $('.slickjs').each(function () {
      var prev = $(this).siblings('.slick-controls').find('.slick-prev ');
      var next = $(this).siblings('.slick-controls').find('.slick-next ');
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        arrows: true,
        autoplay: false,
        prevArrow: prev,
        nextArrow: next
      });
    });
  }

  if ($('.slick-slider-js').length > 0) {
    $('.slick-slider-js').each(function () {
      var prev = $(this).closest('.slider').find('.slick-controls').find('.slick-prev ');
      var next = $(this).closest('.slider').find('.slick-controls').find('.slick-next ');
      $(this).on('init', function (event, slick) {
        $(this).closest('.slider').find('.slick-controls').removeClass('d-none');
      });
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        arrows: true,
        autoplay: false,
        prevArrow: prev,
        nextArrow: next
      });
    });
  }

  if ($('.slick-slider-register').length > 0) {
    $('.slick-slider-register').each(function () {
      var prev = $(this).closest('.slider').find('.slick-controls').find('.slick-prev ');
      var next = $(this).closest('.slider').find('.slick-controls').find('.slick-next ');
      $(this).on('init', function (event, slick) {
        $(this).closest('.slider').find('.slick-controls').removeClass('d-none');
      });
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        initialSlide: 1,
        variableWidth: true,
        centerMode: true,
        infinite: true,
        dots: true,
        arrows: true,
        autoplay: false,
        prevArrow: prev,
        nextArrow: next
      });
    });
  }

  if ($('.slick-slider-posts').length > 0) {
    $('.slick-slider-posts').each(function () {
      var prev = $(this).closest('.slider').find('.slick-controls').find('.slick-prev ');
      var next = $(this).closest('.slider').find('.slick-controls').find('.slick-next ');
      $(this).on('init', function (event, slick) {
        $(this).closest('.slider').find('.slick-controls').removeClass('d-none');
      });
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        initialSlide: 1,
        variableWidth: true,
        centerMode: true,
        infinite: true,
        dots: true,
        arrows: true,
        autoplay: false,
        prevArrow: prev,
        nextArrow: next
      });
    });
  }
})(jQuery);
"use strict";

(function ($) {
  $('.steps__slider').slick({
    dots: true,
    arrow: false,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 6000
  });
})(jQuery);
"use strict";

(function ($) {
  if ($('.tabs').length > 0) {
    $('.tabs').each(function () {
      $(this).find('.tab').each(function () {
        var title = $(this).data('title');
        var tabId = $(this).attr('id');
        $(this).closest('.tabs').find('.tabs-nav').find('ul').append('<li><a class="tab-link" href="#' + tabId + '">' + title + '</a></li>');
      });
    });
    $(document).on('click', '.tabs-nav li', function (event) {
      event.preventDefault();
      $(this).closest('.tabs-nav').find('li').each(function () {
        $(this).removeClass('active');
      });
      $(this).addClass('active');
      var href = $(this).find('a').attr('href');
      var hash = href.substr(href.indexOf('#'));
      $(this).closest('.tabs').find('.tab').each(function () {
        $(this).fadeOut();
      });
      $(href).fadeIn();
      /*if ( window.history.pushState ) {
      	window.history.pushState( null, null, hash );
      } else {
      	window.location.hash = hash;
      }*/
    });
    var initialHash = window.location.hash;

    if (initialHash && !initialHash.match(/\//)) {
      $('.tabs .tab').hide();
      $('.tabs-nav a[href="' + initialHash + '"]').eq(0).parent().click();
    } else {
      $('.tabs .tab').hide();
      $('.tabs-nav a').eq(0).parent().click();
    }
  }
})(jQuery);
"use strict";

(function ($) {
  $('.form-check-input-content').on('click', function () {
    $(this).parent().siblings('.toggler__switch__label').toggleClass('active');
    $(this).closest('section').find('.toggler__screen').toggleClass('active');
  });
})(jQuery);
"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

(function ($) {
  $('.play-video').each(function () {
    $(this).click(function (event) {
      event.preventDefault();
      $(this).addClass('playing');
      var videoSrc = $(this).attr('href');
      var video = '';

      if (videoSrc === '#') {
        $('.wp_video').find('.source').each(function () {
          video += '<source src="' + $(this).attr('data-src') + '" type="' + $(this).attr('data-type') + '" >';
        });
        video = '<video controls autoplay loop>' + video + '</video>';
      } else {
        if (videoSrc.indexOf('youtu') > 0) {
          videoSrc = "https://www.youtube.com/embed/" + youTubeGetID(videoSrc) + '?autoplay=1&rel=0&wmode=opaque';
        }

        if (videoSrc.indexOf('vimeo') > 0) {
          videoSrc = "https://player.vimeo.com/video/" + getVimeoId(videoSrc);
        }

        video = '<iframe src="' + videoSrc + '" frameborder="0" allowfullscreen allow="accelerometer; autoplay;"></iframe>';
      }

      $('body').append('<div id="cover"></div>');
      $('body').append('<div id="video-block"></div>');
      $('#video-block').append('<div id="iframe-wrapper"></div>');
      $('#iframe-wrapper').append(video);
      $('#iframe-wrapper').append('<div id="button-close"></div>');
      var htmlH = $(window).scrollTop();
      var y = htmlH + 60;
      $('#video-block').css('top', y);
    });
  });
  $(document).on('click', '#button-close', function (event) {
    $('#video-block').remove();
    $('#cover').remove();
    $('.play-video').removeClass('playing');
    event.stopPropagation();
  });
  $(document).on('click', function (event) {
    if ($('#video-block').length) {
      if ($(event.target).closest('#iframe-wrapper').length) {
        return;
      }

      if ($(event.target).closest('.play-video').length) {
        return;
      }

      $('#video-block').remove();
      $('#cover').remove();
      $('.play-video').removeClass('playing');
      event.stopPropagation();
    }
  });

  function youTubeGetID(url) {
    var ID = '';
    url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);

    if (url[2] !== undefined) {
      ID = url[2].split(/[^0-9a-z_\-]/i);
      ID = ID[0];
    } else {
      ID = url;
    }

    return ID;
  }
  /**
   * Get the vimeo id.
   * @param {string} vimeoStr - the url from which you want to extract the id
   * @returns {string|undefined}
   */


  function getVimeoId(vimeoStr) {
    var str = vimeoStr;

    if (str.indexOf('#') > -1) {
      var _str$split = str.split('#');

      var _str$split2 = _slicedToArray(_str$split, 1);

      str = _str$split2[0];
    }

    if (str.indexOf('?') > -1 && str.indexOf('clip_id=') === -1) {
      var _str$split3 = str.split('?');

      var _str$split4 = _slicedToArray(_str$split3, 1);

      str = _str$split4[0];
    }

    var id;
    var arr;
    var primary = /https?:\/\/vimeo\.com\/([0-9]+)/;
    var matches = primary.exec(str);

    if (matches && matches[1]) {
      return matches[1];
    }

    var vimeoPipe = ['https?://player.vimeo.com/video/[0-9]+$', 'https?://vimeo.com/channels', 'groups', 'album'].join('|');
    var vimeoRegex = new RegExp(vimeoPipe, 'gim');

    if (vimeoRegex.test(str)) {
      arr = str.split('/');

      if (arr && arr.length) {
        id = arr.pop();
      }
    } else if (/clip_id=/gim.test(str)) {
      arr = str.split('clip_id=');

      if (arr && arr.length) {
        var _arr$1$split = arr[1].split('&');

        var _arr$1$split2 = _slicedToArray(_arr$1$split, 1);

        id = _arr$1$split2[0];
      }
    }

    return id;
  }
})(jQuery);
//# sourceMappingURL=main.js.map
