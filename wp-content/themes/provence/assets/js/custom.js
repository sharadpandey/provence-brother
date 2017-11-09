jQuery(document).ready(function () {
    
    var PortfolioOwl = jQuery('body').find(".PortfolioCarousel");
    if (PortfolioOwl.length >= 1) {
        jQuery('.PortfolioCarousel').owlCarousel({
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
    var b = jQuery("body");
    var h = jQuery("header");
    var pos = h.position();
    jQuery(window).scroll(function () {
        var windowpos = jQuery(window).scrollTop();
        if (windowpos >= 120) {
            b.addClass("p59");
            h.addClass("stick");
        }
        else {
            b.removeClass("p59");
            h.removeClass("stick");
        }
    });
	
	
	//****************add site url and fade out the msg after some time on contact form****************//
	jQuery(".red-btn").click(function () 
	{
		var url = jQuery('.container').find('.cls_site_url').val();
		
		jQuery("input[name='site-url']").val(url);
		
		 setTimeout(function(){ jQuery('.wpcf7-validation-errors').fadeOut('slow'); }, 9000);
		 setTimeout(function(){ jQuery('.wpcf7-mail-sent-ok').fadeOut('slow'); }, 9000);
	});
	
	
	
	
	
});
jQuery(function () {
    jQuery("[pd-data]").on('mouseenter', function (e) {
        var parentOffset = jQuery(this).offset()
            , relX = e.pageX - parentOffset.left
            , relY = e.pageY - parentOffset.top;
        jQuery(this).find('span').css({
            top: relY
            , left: relX
        })
    }).on('mouseout', function (e) {
        var parentOffset = jQuery(this).offset()
            , relX = e.pageX - parentOffset.left
            , relY = e.pageY - parentOffset.top;
        jQuery(this).find('span').css({
            top: relY
            , left: relX
        })
    });
    jQuery('a[pd-data]').click(function () {
        return true;
    });
});



//**************START SCRIPT FOR GOOGLE MAP*****************//
       
(function ($) {
	/*
	 *  render_map
	 *
	 *  This function will render a Google Map onto the selected jQuery element
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	4.3.0
	 *
	 *  @param	$el (jQuery element)
	 *  @return	n/a
	 */
	function render_map($el) {
		// var
		var $markers = $el.find('.marker');
		// vars
		var args = {
			zoom: 30,
			center: new google.maps.LatLng(0, 0),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		// create map	        	
		var map = new google.maps.Map($el[0], args);
		// add a markers reference
		map.markers = [];
		// add markers
		$markers.each(function () {
			add_marker($(this), map);
		});
		// center map
		center_map(map);
	}
	/*
	 *  add_marker
	 *
	 *  This function will add a marker to the selected Google Map
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	4.3.0
	 *
	 *  @param	$marker (jQuery element)
	 *  @param	map (Google Map object)
	 *  @return	n/a
	 */
	function add_marker($marker, map) {
		// var
		var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
		// create marker
		var marker = new google.maps.Marker({
			position: latlng,
			map: map
		});
		// add to array
		map.markers.push(marker);
		// if marker contains HTML, add it to an infoWindow
		if ($marker.html()) {
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content: $marker.html()
			});
			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function () {
				infowindow.open(map, marker);
			});
		}
	}
	/*
	 *  center_map
	 *
	 *  This function will center the map, showing all markers attached to this map
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	4.3.0
	 *
	 *  @param	map (Google Map object)
	 *  @return	n/a
	 */
	function center_map(map) {
		// vars
		var bounds = new google.maps.LatLngBounds();
		// loop through all markers and create bounds
		$.each(map.markers, function (i, marker) {
			var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
			bounds.extend(latlng);
		});
		// only 1 marker?
		if (map.markers.length == 1) {
			// set center of map
			map.setCenter(bounds.getCenter());
			map.setZoom(15);
		} else {
			// fit to bounds
			map.fitBounds(bounds);
		}
	}
	/*
	 *  document ready
	 *
	 *  This function will render each map when the document is ready (page has loaded)
	 *
	 *  @type	function
	 *  @date	8/11/2013
	 *  @since	5.0.0
	 *
	 *  @param	n/a
	 *  @return	n/a
	 */
	jQuery(document).ready(function () {
		jQuery('.acf-map').each(function () {
			render_map($(this));
		});
	});
})(jQuery);
       
//**************END OF SCRIPT FOR GOOGLE MAP*****************//