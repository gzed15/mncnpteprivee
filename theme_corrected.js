/*
Template:       Payyed HTML Template
Written by:     Harnish Design - (http://www.harnishdesign.net)
*/

(function ($) {
  "use strict";

  // Preloader
  $(window).on('load', function () {
    $('[data-loader="circle-side"]').fadeOut();
    $('#preloader').delay(333).fadeOut('slow');
    $('body').delay(333);
  });

  // Dropdown show on hover (desktop only)
  function handleDropdownHover() {
    if ($(window).width() > 991) {
      $('.primary-menu ul.navbar-nav li.dropdown, .login-signup ul.navbar-nav li.dropdown').on("mouseover", function () {
        $(this).find('> .dropdown-menu').stop().slideDown('fast');
        $(this).on('mouseleave', function () {
          $(this).find('> .dropdown-menu').stop().css('display', 'none');
        });

        $('.primary-menu ul.navbar-nav > li.dropdown > .dropdown-menu').each(function () {
          var menu = $('#header .header-row').offset();
          var dropdown = $(this).parent().offset();
          var i;
          if ($("html").attr("dir") === 'rtl') {
            var rd = ($(window).width() - (dropdown.left + $(this).parent().outerWidth()));
            i = (rd + $(this).outerWidth()) - (menu.left + $('#header .header-row').outerWidth());
          } else {
            i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#header .header-row').outerWidth());
          }
          if (i > 0) {
            $(this).css($("html").attr("dir") === 'rtl' ? 'margin-right' : 'margin-left', '-' + i + 'px');
          }
        });
      });
    }
  }

  $(document).ready(function () {
    handleDropdownHover();

    // Dropdown position fix on hover
    $(".dropdown li").on('mouseenter mouseleave', function () {
      if ($(window).width() > 991) {
        var elm = $('.dropdown-menu', this);
        if (elm.length) {
          var off = elm.offset();
          var w = elm.width();
          var docW = $(window).width();
          var l = off.left;
          var lr = (docW - (off.left + w));
          var isVisible = $("html").attr("dir") === 'rtl'
            ? (lr + w + 30 <= docW)
            : (l + w + 30 <= docW);

          elm.toggleClass('dropdown-menu-end', !isVisible);
          $(this).find('> a.dropdown-toggle > .arrow').toggleClass('arrow-end', !isVisible);
        }
      }
    });

    // Login-signup dropdown
    $('.login-signup ul.navbar-nav > li.dropdown > .dropdown-menu').each(function () {
      var menu = $('#header .header-row').offset();
      var dropdown = $(this).parent().offset();
      var i;
      if ($("html").attr("dir") === 'rtl') {
        var rd = ($(window).width() - (dropdown.left + $(this).parent().outerWidth()));
        i = (rd + $(this).outerWidth()) - (menu.left + $('#header .header-row').outerWidth());
      } else {
        i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#header .header-row').outerWidth());
      }
      if (i > 0) {
        $(this).css($("html").attr("dir") === 'rtl' ? 'margin-right' : 'margin-left', '-' + i + 'px');
      }
    });

    // Login-signup click menu fix
    $(".login-signup .dropdown li").on('click', function () {
      var elm = $('.dropdown-menu', this);
      if (elm.length) {
        var off = elm.offset();
        var w = elm.width();
        var docW = $(window).width();
        var l = off.left;
        var lr = (docW - (off.left + w));
        var isVisible = $("html").attr("dir") === 'rtl'
          ? (lr + w + 30 <= docW)
          : (l + w + 30 <= docW);

        elm.toggleClass('dropdown-menu-end', !isVisible);
        $(this).find('> a.dropdown-toggle > .arrow').toggleClass('arrow-end', !isVisible);
      }
    });

    // DropDown Arrow
    $('.primary-menu, .login-signup').find('a.dropdown-toggle').append($('<i />').addClass('arrow'));

    // Mobile Collapse Nav
    $('.primary-menu .dropdown-toggle[href="#"], .primary-menu .dropdown-toggle[href!="#"] .arrow, .login-signup .dropdown-toggle[href="#"], .login-signup .dropdown-toggle[href!="#"] .arrow').on('click', function (e) {
      if ($(window).width() < 991) {
        e.preventDefault();
        var $parentli = $(this).closest('li');
        $parentli.siblings('li').find('.dropdown-menu:visible').slideUp();
        $parentli.find('> .dropdown-menu').stop().slideToggle();
        $parentli.siblings('li').find('a .arrow.open').removeClass('open');
        $parentli.find('> a .arrow').toggleClass('open');
      }
    });

    // Mobile Menu Button Icon
    $('.navbar-toggler').on('click', function () {
      $(this).toggleClass('open');
    });

    // Carousel
    $(".owl-carousel").each(function () {
      var a = $(this);
      $(this).owlCarousel({
        rtl: $("html").attr("dir") === 'rtl',
        autoplay: a.data('autoplay'),
        center: a.data('center'),
        autoplayTimeout: a.data('autoplaytimeout'),
        autoplayHoverPause: a.data('autoplayhoverpause'),
        loop: a.data('loop'),
        speed: a.data('speed'),
        nav: a.data('nav'),
        dots: a.data('dots'),
        autoHeight: a.data('autoheight'),
        autoWidth: a.data('autowidth'),
        margin: a.data('margin'),
        stagePadding: a.data('stagepadding'),
        slideBy: a.data('slideby'),
        lazyLoad: a.data('lazyload'),
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        animateOut: a.data('animateout'),
        animateIn: a.data('animatein'),
        video: a.data('video'),
        items: a.data('items'),
        responsive: {
          0: { items: a.data('items-xs') },
          576: { items: a.data('items-sm') },
          768: { items: a.data('items-md') },
          992: { items: a.data('items-lg') }
        }
      });
    });

    // YouTube Video Modal Autoplay
    let $videoSrc;
    $('.video-btn').on('click', function () {
      $videoSrc = $(this).data("src");
    });
    $('#videoModal').on('shown.bs.modal', function () {
      $("#video").attr('src', $videoSrc + "?autoplay=1&modestbranding=1&showinfo=0&rel=0");
    });
    $('#videoModal').on('hide.bs.modal', function () {
      $("#video").attr('src', $videoSrc);
    });

    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Scroll to top
    $(window).on('scroll', function () {
      if ($(this).scrollTop() > 150) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });
    $('#back-to-top').on("click", function () {
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      return false;
    });

    // Smooth Scroll
    $('.smooth-scroll a').on("click", function () {
      var sectionTo = $(this).attr('href');
      $('html, body').animate({
        scrollTop: $(sectionTo).offset().top - 50
      }, 600);
    });

    // Message Block Slide
    $('#menu-bloque .menu-item').on('click', function () {
      $('#message-bloque').stop(true, true).slideDown().delay(3000).slideUp();
    });
  });

})(jQuery);
