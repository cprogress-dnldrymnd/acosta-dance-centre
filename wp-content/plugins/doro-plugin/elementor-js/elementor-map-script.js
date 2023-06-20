(function($) {
    var mapScript = function ($scope, $) {

		//  Map------------------	
		if (jQuery("#map-single").length > 0) {
			var latlog = jQuery('#map-single').data('latlog'),
				popupTextit = jQuery('#map-single').data('popuptext'),
				map = L.map('map-single').setView(latlog, 15);
				map.scrollWheelZoom.disable();
			L.tileLayer(jQuery('#map-single').data('map-back'), {
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
				format: 'png'
			}).addTo(map);
			var greenIcon = L.icon({
				iconUrl: jQuery('#map-single').data('popupicon'),
				iconSize: [40, 40],
				popupAnchor: [0, -26]
			});
			L.marker(latlog, {
				icon: greenIcon
			}).addTo(map).bindPopup(popupTextit).openPopup();
		}	


    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/doro-map.default', mapScript);
    });

   
})(jQuery);