    // Slider
    var sliderMain = function () {
        jQuery('#doro-hero .flexslider').flexslider({
            animation: "fade"
            , slideshowSpeed: jQuery("#doro-hero .flexslider").data("slider-speed")
			//, slideshow: false
			, slideshow: jQuery("#doro-hero .flexslider").data("slider-slideshow")
            , directionNav: true
            , start: function () {
                setTimeout(function () {
                    jQuery('.slider-text').removeClass('animated fadeInUp');
                    jQuery('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
                }, 500);
            }
            , before: function () {
                setTimeout(function () {
                    jQuery('.slider-text').removeClass('animated fadeInUp');
                    jQuery('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
                }, 500);
            }
        });
    };	
	
    // Document on load.
    jQuery(function () {
        sliderMain();
    });		