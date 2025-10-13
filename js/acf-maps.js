(function($) {

    /**
     * initMap
     *
     * Renders a Google Map onto the selected jQuery element
     *
     * @param   jQuery $el The jQuery element.
     * @return  object The map instance.
     */
    function initMap($el) {
        // Find marker elements within map.
        var $markers = $el.find('.marker');

        // Create generic map.
        var mapArgs = {
            zoom: $el.data('zoom') || 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapId: 'digitalia_map', // Required for advanced markers
            disableDefaultUI: false,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: true,
            fullscreenControl: true
        };

        // Force the container to be visible and have dimensions
        $el.css({
            visibility: 'visible',
            height: '400px'
        });

        // Initialize the map
        var map = new google.maps.Map($el[0], mapArgs);

        // Add markers.
        map.markers = [];
        $markers.each(function() {
            initMarker($(this), map);
        });

        // Center map based on markers.
        centerMap(map);

        // Trigger resize event after initialization
        google.maps.event.trigger(map, 'resize');

        // Return map instance.
        return map;
    }

    /**
     * initMarker
     *
     * Creates a marker for the given jQuery element and map.
     *
     * @param   jQuery $marker The jQuery element.
     * @param   object The map instance.
     * @return  object The marker instance.
     */
    function initMarker($marker, map) {
        // Get position from marker.
        var lat = $marker.data('lat');
        var lng = $marker.data('lng');
        var latLng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        // Create marker instance.
        var marker = new google.maps.marker.AdvancedMarkerElement({
            map: map,
            position: latLng,
            title: $marker.find('h3').text()
        });

        // Append to reference for later use.
        map.markers.push(marker);

        // If marker contains HTML, add it to an infoWindow.
        if ($marker.html()) {
            // Create info window.
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            // Show info window when marker is clicked.
            marker.addListener('click', () => {
                infowindow.open({
                    anchor: marker,
                    map,
                });
                
                // Handle the link click inside info window
                google.maps.event.addListenerOnce(infowindow, 'domready', function() {
                    var content = infowindow.getContent();
                    if (content) {
                        $(content).find('a').on('click', function(e) {
                            e.preventDefault();
                            var href = $(this).attr('href');
                            if (href && href.startsWith('#')) {
                                window.location.hash = href.substring(1);
                            }
                        });
                    }
                });
            });
        }
    }

    /**
     * centerMap
     *
     * Centers the map showing all markers in view.
     *
     * @param   object The map instance.
     * @return  void
     */
    function centerMap(map) {
        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function(marker) {
            bounds.extend(marker.position);
        });

        // Case: Single marker.
        if (map.markers.length == 1) {
            map.setCenter(bounds.getCenter());
            map.setZoom(16);
        } else {
            map.fitBounds(bounds);
            map.setZoom(map.getZoom() - 1);
        }
    }

    // Render maps on page load.
    $(document).ready(function() {
        // Wait a bit to ensure the DOM is fully loaded
        setTimeout(function() {
            $('.acf-map').each(function() {
                var map = initMap($(this));
            });
        }, 100);
    });

})(jQuery);
