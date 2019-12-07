<?php if(!empty($map)): ?>
    <section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-map">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-6 offset-lg-6">
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-sSwcZyd7Yc6za09svn6c4hVFxpCEFXI"></script>
    <script type="text/javascript">
        (function($) {

        /*
        *  new_map
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

        function new_map( $el ) {
            
            // var
            var $markers = $el.find('.marker');
            
            
            // vars
            var args = {
                zoom		: 11,
                disableDefaultUI: true,
                zoomControl: true,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP,
                styles: [{"featureType":"all","elementType":"geometry","stylers":[{"color":"#f5f5f5"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#bdbdbd"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#757575"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"lightness":-55},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"lightness":"-48"},{"saturation":"-41"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"lightness":-55},{"weight":1},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#757575"},{"visibility":"on"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"lightness":-50},{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"},{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.line","elementType":"geometry.stroke","stylers":[{"saturation":-55},{"lightness":-85}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#c9c9c9"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#9e9e9e"}]}]
            };
            
            
            // create map	        	
            var map = new google.maps.Map( $el[0], args);
            
            
            // add a markers reference
            map.markers = [];
            
            
            // add markers
            $markers.each(function(){
                
                add_marker( $(this), map );
                
            });
            
            
            // center map
            center_map( map );
            
            
            // return
            return map;
            
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

        function add_marker( $marker, map ) {

            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            // create marker
            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map
            });

            // add to array
            map.markers.push( marker );

            // if marker contains HTML, add it to an infoWindow
            if( $marker.html() )
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content		: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open( map, marker );

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

        function center_map( map ) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each( map.markers, function( i, marker ){

                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                bounds.extend( latlng );

            });

            // only 1 marker?
            if( map.markers.length == 1 )
            {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( 11 );
            }
            else
            {
                // fit to bounds
                map.fitBounds( bounds );
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
        // global var
        var map = null;

        $(document).ready(function(){

            $('.acf-map').each(function(){

                // create map
                map = new_map( $(this) );

            });

        });

        })(jQuery);
    </script>
<?php endif;?>