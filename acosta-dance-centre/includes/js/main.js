(function () {
    'use strict';
    // Preloader
    jQuery("#preloader").fadeOut(700);
	jQuery(".preloader-bg").delay(700).fadeOut(700);
	var wind = jQuery(window);	
	
    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        }
        , BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        }
        , iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        }
        , Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        }
        , Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        }
        , any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };	
    // Full Height
    var fullHeight = function () {
        if (!isMobile.any()) {
            jQuery('.js-fullheight').css('height', jQuery(window).height());
            jQuery(window).resize(function () {
                jQuery('.js-fullheight').css('height', jQuery(window).height());
            });
        }
    };
    // Animations
    var contentWayPoint = function () {
        var i = 0;
        jQuery('.animate-box').waypoint(function (direction) {
            if (direction === 'down' && !jQuery(this.element).hasClass('animated')) {
                i++;
                jQuery(this.element).addClass('item-animate');
                setTimeout(function () {
                    jQuery('body .animate-box.item-animate').each(function (k) {
                        var el = jQuery(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            }
                            else if (effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated');
                            }
                            else if (effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated');
                            }
                            else {
                                el.addClass('fadeInUp animated');
                            }
                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });
                }, 100);
            }
        }, {
            offset: '85%'
        });
    };
    // Burger Menu 
    var burgerMenu = function () {
        jQuery('.js-doro-nav-toggle').on('click', function (event) {
            event.preventDefault();
            var jQuerythis = jQuery(this);
            if (jQuery('body').hasClass('offcanvas')) {
                jQuerythis.removeClass('active');
                jQuery('body').removeClass('offcanvas');
            }
            else {
                jQuerythis.addClass('active');
                jQuery('body').addClass('offcanvas');
            }
        });
    };
    // Click outside of offcanvass
    var mobileMenuOutsideClick = function () {
        jQuery(document).click(function (e) {
            var container = jQuery("#doro-aside, .js-doro-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if (jQuery('body').hasClass('offcanvas')) {
                    jQuery('body').removeClass('offcanvas');
                    jQuery('.js-doro-nav-toggle').removeClass('active');
                }
            }
        });
        jQuery(window).scroll(function () {
            if (jQuery('body').hasClass('offcanvas')) {
                jQuery('body').removeClass('offcanvas');
                jQuery('.js-doro-nav-toggle').removeClass('active');
            }
        });
    };
    // Sub Menu 
    jQuery('#doro-main-menu li.menu-item-has-children>a').on('click', function () {
        jQuery(this).removeAttr('href');
        var element = jQuery(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });
    jQuery('#doro-main-menu>ul>li.menu-item-has-children>a').append('<span class="holder"></span>');

    // Sticky 
    var stickyFunction = function () {
        var h = jQuery('.image-content').outerHeight();
        if (jQuery(window).width() <= 992) {
            jQuery("#sticky_item").trigger("sticky_kit:detach");
        }
        else {
            jQuery('.sticky-parent').removeClass('stick-detach');
            jQuery("#sticky_item").trigger("sticky_kit:detach");
            jQuery("#sticky_item").trigger("sticky_kit:unstick");
        }
        jQuery(window).resize(function () {
            var h = jQuery('.image-content').outerHeight();
            jQuery('.sticky-parent').css('height', h);
            if (jQuery(window).width() <= 992) {
                jQuery("#sticky_item").trigger("sticky_kit:detach");
            }
            else {
                jQuery('.sticky-parent').removeClass('stick-detach');
                jQuery("#sticky_item").trigger("sticky_kit:detach");
                jQuery("#sticky_item").trigger("sticky_kit:unstick");
                jQuery("#sticky_item").stick_in_parent();
            }
        });
        jQuery('.sticky-parent').css('height', h);
        jQuery("#sticky_item").stick_in_parent();
    };
    // Document on load.
    jQuery(function () {
        fullHeight();
        contentWayPoint();
        burgerMenu();
        mobileMenuOutsideClick();
        //sliderMain();
        stickyFunction();
    });
	
     // Show more
    jQuery(function () {
        jQuery(document).on('click', '.doro-more-trigger', function (event) {
            event.preventDefault();
            if (jQuery('.doro-show-more-container').hasClass('visible')) {
                jQuery('.doro-show-more-container').toggleClass('animated');
                jQuery('.doro-show-more-container').removeClass('visible');
            } else {
                jQuery('.doro-show-more-container').addClass('visible');
                jQuery('.doro-show-more-container').removeClass('animated');
                jQuery('.doro-more-wrapper').addClass('hidden');
            }
        })
    });
    jQuery(function () {
        var self = this;
        var jQuerygrid = jQuery('.grid');
        jQuerygrid.each(function () {
            var jQueryel = jQuery(this);
            var initial_items = 9;

            function showNextItems(pagination) {
                var itemsMax = jQuery('.visible_item').length;
                var itemsCount = 0;
                jQuery('.visible_item').each(function () {
                    if (itemsCount < pagination) {
                        jQuery(this).removeClass('visible_item');
                        itemsCount++;
                    }
                });
                if (itemsCount >= itemsMax) {
                    jQuery('.shop-doro-more-trigger').hide();
                }
            }
            jQuery('.shop-doro-more-trigger').on('click', function (e) {
                e.preventDefault();
                var next_items = 9;
                showNextItems(next_items);
            });
        });
    });
    

    // Smooth Scrolling
jQuery('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var jQuerytarget = jQuery(target);
          jQuerytarget.focus();
          if (jQuerytarget.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            jQuerytarget.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            jQuerytarget.focus(); // Set focus again
          };
        });
      }
    }
  });
    
     // Button
    var buttons = document.querySelectorAll(".toolbar .btn");
    for(var i = 0; i < buttons.length; i++) {
      var button = buttons[i];
      button.addEventListener("click", function() {
        if(!button.classList.contains("active"))
          button.classList.add("active");
        else
          button.classList.remove("active");
      });
    }	
	
}());