(function($) {
    var gridIsoport = function ($scope, $) {

   if (jQuery(".loadmore-wrapper-gallery-port").length) {
  // init Isotope
  var jQueryloadmorexen =jQuery('.container-after-gallery-port');
  var jQuerycontainer = jQuery('.loadmore-wrapper-gallery-port').isotope({
    itemSelector: '.isotope-item',
	percentPosition: true,
	singleMode: true,
	transformsEnabled: true,
    transitionDuration: "700ms",
  });
  jQuerycontainer.imagesLoaded(function () {
     jQuerycontainer.isotope("layout");
  });
}

  //****************************
  // Isotope Load more button
  //****************************
  var itemcount = jQuery('.loadmore-wrapper-gallery-port').data('load-item');
  var buttontext = jQuery('.loadmore-wrapper-gallery-port').data('button-text');
  var initShow = itemcount; //number of items loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = jQuerycontainer.data('isotope'); // get Isotope instance

  loadMore(initShow); //execute function onload

  function loadMore(toShow) {
    jQuerycontainer.find(".hidden").removeClass("hidden");

    var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
      return item.element;
    });
    jQuery(hiddenElems).addClass('hidden');
    jQuerycontainer.isotope('layout');

    //when no more to load, hide show more button
    if (hiddenElems.length == 0) {
      jQuery(".iso-load-more-wrap-gallery-port").hide();
      //jQuery(".full-width-section").addClass('xen-bottom-padding-120');
    } 
	else {
      jQuery(".iso-load-more-wrap-gallery-port").show();
    };

  }

if (iso.filteredItems.length < initShow) {

}
else if (iso.filteredItems.length == initShow) {

}

else {

//append load more button
  jQueryloadmorexen.after('<div class="doro-more-wrapper-new text-center  iso-load-more-wrap-gallery-port" ><a class="doro-more-trigger flex" id="load-more-gallery-port"> <span class="plus flex-center">&nbsp;</span> </a></div>');
}

/*
<!-- add more -->
<div class="doro-more-wrapper txt-center">
	<a href="#0" class="doro-more-trigger flex"> <span class="plus flex-center">&nbsp;</span> </a>
</div>	
*/

  //when load more button clicked
  jQuery("#load-more-gallery-port").click(function() {
    if (jQuery('#filters').data('clicked')) {
      //when filter button clicked, set initial value for counter
      counter = initShow;
      jQuery('#filters').data('clicked', false);
    } else {
      counter = counter;
    };

    counter = counter + initShow;

    loadMore(counter);
  });


    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/doro-portfolio-grid.default', gridIsoport);
    });

   
})(jQuery);