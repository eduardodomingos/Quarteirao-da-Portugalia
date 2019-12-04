<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quarteirão_da_Portugália
 */

get_header();
?>


<?php if( have_rows('homepage_content') ): ?>
    <?php while( have_rows('homepage_content') ): the_row(); ?>
		<?php if( get_row_layout() == 'hero' ): ?>
			<?php 
				$settings = get_sub_field('settings');
				$content = get_sub_field('content');
			?>
			<section id="hero" <?php echo $settings['color'] ? 'class="'. $settings['color'] .'"': ''; ?>>
				<div class="hero-bg">
					<?php if($content['video_mp4'] || $content['video_webm'] ): ?>
						<video autoplay="" loop="" muted="" poster="">
						<?php if($content['video_mp4']): ?>
								<source src="<?php echo $content['video_mp4'];  ?>" type="video/mp4">
							<?php endif; ?>
							<?php if($content['video_webm']): ?>
								<source src="<?php echo $content['video_webm'];  ?>" type="video/webm">
							<?php endif; ?>
						</video>
					<?php endif; ?>
				</div>
				<ul>
					<?php foreach($content['taglines'] as $taglines):?>
						<li class="animated"><?php echo preg_replace('/<p>(.*?)<\/p>/','<h1>$1</h1>', $taglines['tagline']) ?></li>
					<?php endforeach;?>
				</ul>
			</section>

		<?php elseif( get_row_layout() == 'content_block' ): ?>
			<?php 
				$settings = get_sub_field('settings');
				$contents = get_sub_field('contents');
			?>
			
			<section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-content <?php echo $settings['color'] ? $settings['color'] :''; ?> <?php  echo $settings['heading'] ? $settings['heading'] :''; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm col-lg-7 <?php echo $contents['left_column']['animation'] ? 'wow fast '. $contents['left_column']['animation'] : ''; ?>">
							<div class="wyswyg">	
								<?php echo  $contents['left_column']['content']; ?>
							</div>
						</div>
						<div class="col-sm col-lg-4 offset-lg-1 <?php echo $contents['right_column']['animation'] ? 'wow fast '. $contents['right_column']['animation'] : ''; ?>">
							<div class="wyswyg">
								<?php echo  $contents['right_column']['content']; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif( get_row_layout() == 'content_block_1_col' ): ?>
			<?php 
				$settings = get_sub_field('settings');
				$contents = get_sub_field('contents');
			?>
			
			<section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-content <?php echo $settings['color'] ? $settings['color'] :''; ?> <?php  echo $settings['heading'] ? $settings['heading'] :''; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm <?php echo $contents['column_1']['animation'] ? 'wow fast '. $contents['column_1']['animation'] : ''; ?>">
							<div class="wyswyg">	
								<?php echo  $contents['column_1']['content']; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif( get_row_layout() == 'map' ): ?>
			<?php $map = get_sub_field('map'); ?>
			<?php if(!empty($map)): ?>
				<section class="block block-map">
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

		<?php elseif( get_row_layout() == 'timeline' ): ?>
			<?php $events = get_sub_field('events');?>
			<?php if(!empty($events)): ?>
				<section class="block">
					<div class="container">
						<div class="row">
							<div class="col-sm">
								<div class="c-timeline">
									<div class="events">
										<ul>
											<?php foreach($events as $event):?>
												<li style="width: calc(100% / <?php echo count($events); ?>);" <?php echo $event['event']['special'] ? 'class="red"' : ''; ?>>
													<div class="event<?php echo $event['event']['special'] ? ' red' : ''; ?>" id="event-<?php echo  $event['event']['year']; ?>">
														<span class="date"><?php echo  $event['event']['year']; ?></span>
													</div>
												</li>
											<?php endforeach;?>
										</ul>
									</div>
									<div class="modals">
										<?php foreach($events as $event):?>
										<div class="c-modal" id="modal-<?php echo $event['event']['year']; ?>">
											<button class="modal-close">Fechar</button>
											<div class="modal-inner">
											
												<?php if(!empty($event['event']['photos'])): ?>
													<?php if(count($event['event']['photos'])> 1): ?>
														<ul class="modal-slider">
															<?php foreach($event['event']['photos'] as $photos):?>
																<?php foreach($photos as $photo):?>
																	<li><?php echo wp_get_attachment_image($photo, 'modal-gallery'); ?></li>
																<?php endforeach;?>
															<?php endforeach;?>
														</ul>
													<?php else:?>
														<figure class="media">
															<?php echo wp_get_attachment_image($event['event']['photos'][0]['photo'], 'modal-gallery'); ?>
														</figure>
													<?php endif;?>
												<?php endif;?>

												<h1 class="title"><?php echo  $event['event']['year']; ?></h1>
												<p class="lead"><?php echo  $event['event']['lead']; ?></p>
												<div class="content-wrapper">
													<?php echo  $event['event']['content']; ?>
												</div>
											</div>
										</div>
										<?php endforeach;?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif;?>
			
		<?php elseif( get_row_layout() == 'photos_block' ): ?>
			<?php 
				$settings = get_sub_field('settings');
				$contents = get_sub_field('contents');
			?>
			<section <?php echo $settings['id'] ? 'id="'. $settings['id'] .'"' :  ''; ?> class="block block-content <?php echo $settings['color'] ? $settings['color'] :''; ?> <?php echo $settings['heading'] ? $settings['heading'] :''; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm col-lg-7 <?php echo $contents['column_1']['animation'] ? 'wow fast '. $contents['column_1']['animation'] : ''; ?> <?php echo $settings['position'] == 'right' ? 'order-md-2' : '';?>" >
							<?php if(count($contents['column_1']['photos']) > 0): ?>
									<ul class="c-list-images">
									<?php foreach($contents['column_1']['photos'] as $photos): ?>
										<?php foreach($photos as $photo): ?>
											<li><?php echo wp_get_attachment_image($photo, 'large'); ?></li>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="col-sm col-lg-4 offset-lg-1 <?php echo $contents['column_2']['animation'] ? 'wow fast '. $contents['column_2']['animation'] : ''; ?> <?php echo $settings['position'] == 'right' ? 'order-md-1' : '';?>">
							<?php echo  $contents['column_2']['content']; ?>
						</div>
					</div>
				</div>
			</section>
		<?php elseif( get_row_layout() == 'blueprint' ): ?>
			<?php 
				$settings = get_sub_field('settings');
				$contents = get_sub_field('contents');
			?>
			<section class="block">
				<div class="container">
					<div class="row">
						<div class="col-sm">
							<div id="c-blueprint">
								<div class="inner">
									<ul class="filters">
										<li id="filter-1" class="habitacao">
											<svg width="41" height="38" viewBox="0 0 41 38" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.53153 17.6327C1.36478 17.6327 1.2814 17.591 1.15633 17.5077C0.947889 17.3409 0.947889 17.0908 1.15633 16.924L20.1665 0.832098C20.3749 0.665342 20.6668 0.665342 20.8752 0.832098L39.8437 16.8823C40.0521 17.0491 40.0521 17.2992 39.8437 17.466C39.6352 17.6327 39.3434 17.6327 39.135 17.466L20.5 1.70757L1.90673 17.5077C1.78167 17.591 1.61491 17.6327 1.53153 17.6327Z" stroke-width="0.75" stroke-miterlimit="10"/>
											<path d="M14.9137 36.0175H36.3001V17.0907C36.3001 16.8406 36.5086 16.6738 36.8004 16.6738C37.0922 16.6738 37.3006 16.8406 37.3006 17.0907V36.4344C37.3006 36.6845 37.0922 36.8513 36.8004 36.8513H14.9137C14.6219 36.8513 13.1211 36.2676 13.1211 35.9758"/>
											<path d="M14.9137 36.0175H36.3001V17.0907C36.3001 16.8406 36.5086 16.6738 36.8004 16.6738C37.0922 16.6738 37.3006 16.8406 37.3006 17.0907V36.4344C37.3006 36.6845 37.0922 36.8513 36.8004 36.8513H14.9137C14.6219 36.8513 13.1211 36.2676 13.1211 35.9758" stroke-width="0.75" stroke-miterlimit="10"/>
											<path d="M15.9142 36.4344C15.9142 36.6845 15.7058 36.8513 15.414 36.8513H4.24133C3.9495 36.8513 3.74106 36.6845 3.74106 36.4344V17.0907C3.74106 16.8406 3.9495 16.6738 4.24133 16.6738C4.53315 16.6738 4.74159 16.8406 4.74159 17.0907V35.9758H14.9137"/>
											<path d="M15.9142 36.4344C15.9142 36.6845 15.7058 36.8513 15.414 36.8513H4.24133C3.9495 36.8513 3.74106 36.6845 3.74106 36.4344V17.0907C3.74106 16.8406 3.9495 16.6738 4.24133 16.6738C4.53315 16.6738 4.74159 16.8406 4.74159 17.0907V35.9758H14.9137"stroke-width="0.75" stroke-miterlimit="10"/>
											<path d="M32.7149 10.2115C32.423 10.2115 32.2146 10.0447 32.2146 9.79459V3.37449H29.1713V6.37609C29.1713 6.62623 28.9629 6.79298 28.671 6.79298C28.3792 6.79298 28.1708 6.62623 28.1708 6.37609V2.91591C28.1708 2.66578 28.3792 2.49902 28.671 2.49902H32.7566C33.0484 2.49902 33.2568 2.66578 33.2568 2.91591V9.79459C33.2151 10.0447 33.0484 10.2115 32.7149 10.2115Z"   stroke-width="0.75" stroke-miterlimit="10"/>
											</svg>
										</li>
										<li id="filter-2" class="coliving">
											<svg width="41" height="42" viewBox="0 0 41 42" xmlns="http://www.w3.org/2000/svg">
											<path d="M33.3426 1H7.65738C6.99636 1 6.38257 1.28329 5.91041 1.75545L1 7.04359H3.1719V41.1332C3.1719 41.2748 3.26633 41.3693 3.40798 41.4165H20.0278H37.8753C38.0642 41.4165 38.1586 41.2748 38.1586 41.1332V7.04359H40L35.0896 1.75545C34.6174 1.28329 34.0036 1 33.3426 1ZM37.5448 23.6634H20.3111V7.04359H37.5448V23.6634ZM37.5448 24.2772V40.8027H20.3111V24.2772H37.5448ZM19.6973 23.6634H3.73849V7.04359H19.6973V23.6634ZM19.6973 24.2772V40.8027H3.73849V24.2772H19.6973ZM2.36925 6.42978L6.14649 2.36925C6.57143 1.89709 7.23244 1.6138 7.89345 1.6138H33.0593C33.7203 1.6138 34.3341 1.89709 34.8063 2.36925L38.5835 6.42978H2.36925Z" stroke-width="0.75" stroke-miterlimit="10"/>
											<path d="M10.2543 17.1472V20.0274C10.2543 20.6884 10.7736 21.2078 11.4346 21.2078C12.0957 21.2078 12.615 20.6884 12.615 20.0274V17.1472C13.1344 17.0056 13.5121 16.5807 13.5121 16.0141V13.8894C13.5121 13.2284 12.9928 12.709 12.3318 12.709H10.5848C9.92376 12.709 9.40439 13.2284 9.40439 13.8894V16.0141C9.40439 16.5807 9.78211 17.0528 10.2543 17.1472ZM12.1429 20.0746C12.1429 20.4523 11.8124 20.7828 11.4346 20.7828C11.0569 20.7828 10.7264 20.4523 10.7264 20.0746V17.1945H12.1429V20.0746ZM9.87654 13.8894C9.87654 13.5116 10.2071 13.1811 10.5848 13.1811H12.379C12.7567 13.1811 13.0872 13.5116 13.0872 13.8894V16.0141C13.0872 16.3918 12.7567 16.7223 12.379 16.7223H10.5848C10.2071 16.7223 9.87654 16.3918 9.87654 16.0141V13.8894Z" stroke-width="0.5" stroke-miterlimit="10"/>
											<path d="M11.4346 12.3788C12.1901 12.3788 12.8511 11.765 12.8511 10.9624C12.8511 10.2069 12.2373 9.5459 11.4346 9.5459C10.6792 9.5459 10.0182 10.1597 10.0182 10.9624C10.0182 11.765 10.6792 12.3788 11.4346 12.3788ZM11.4346 10.0181C11.954 10.0181 12.3789 10.443 12.3789 10.9624C12.3789 11.4817 11.954 11.9067 11.4346 11.9067C10.9153 11.9067 10.4903 11.4817 10.4903 10.9624C10.4903 10.443 10.9153 10.0181 11.4346 10.0181Z" stroke-width="0.5" stroke-miterlimit="10"/>
											<path d="M28.5266 35.1367V37.2142C28.5266 37.828 29.046 38.3473 29.6598 38.3473C30.2736 38.3473 30.793 37.828 30.793 37.2142V35.1367C31.3123 34.9478 31.8317 34.2868 31.8317 33.7674L31.5484 31.265C31.5484 30.6512 31.0763 30.1318 30.4625 30.1318H28.8571C28.2433 30.1318 27.7712 30.6512 27.7712 31.265L27.4879 33.7674V33.8146C27.4879 34.2868 28.0073 34.9006 28.5266 35.1367ZM30.368 37.2142C30.368 37.5919 30.0847 37.8752 29.707 37.8752C29.3293 37.8752 29.046 37.5919 29.046 37.2142V35.2311H30.4153V37.2142H30.368ZM28.2433 31.265C28.2433 30.8873 28.5266 30.5568 28.8571 30.5568H30.4625C30.793 30.5568 31.0763 30.8401 31.0763 31.2178L31.3596 33.7202C31.3596 34.0979 30.793 34.6645 30.4625 34.6645H28.8571C28.5266 34.6645 27.96 34.0979 27.96 33.7202L28.2433 31.265Z" stroke-width="0.5" stroke-miterlimit="10"/>
											<path d="M28.1489 29.9426L28.8571 29.5177C29.0932 29.7066 29.3765 29.801 29.707 29.801C30.0375 29.801 30.3208 29.7066 30.5569 29.5177L31.2651 29.9426C31.3595 29.9899 31.5012 29.9899 31.5956 29.8482C31.6428 29.7538 31.6428 29.6121 31.5012 29.5177L30.8874 29.14C31.029 28.9511 31.0763 28.6678 31.0763 28.4318C31.0763 27.6763 30.4625 27.0625 29.707 27.0625C28.9516 27.0625 28.3378 27.6763 28.3378 28.4318C28.3378 28.715 28.4322 28.9511 28.5266 29.14L27.9128 29.5177C27.8184 29.5649 27.7712 29.7066 27.8184 29.8482C27.9128 29.9426 28.0545 29.9899 28.1489 29.9426ZM29.6598 27.5347C30.1792 27.5347 30.5569 27.9596 30.5569 28.4318C30.5569 28.9511 30.1319 29.3288 29.6598 29.3288C29.1876 29.3288 28.7627 28.9039 28.7627 28.4318C28.7627 27.9596 29.1876 27.5347 29.6598 27.5347Z" stroke-width="0.5" stroke-miterlimit="10"/>
											</svg>




										</li>
										<li id="filter-3" class="cowork"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/cowork.svg" alt=""></li>
										<li id="filter-4"  class="comercio"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comercio.svg" alt=""></li>
										<li id="filter-5" class="espaco-publico"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/espaco-publico.svg" alt=""></li>
										<li id="filter-6" class="estacionamento"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/estacionamento.svg" alt=""></li>

									</ul>
									<ul class="blueprints">
										<?php foreach($contents['blueprints'] as $key=>$item) :?>
											<li id="blueprint-<?php echo $key; ?>" <?php echo $key == 0 ? 'class="active"':''; ?>   ><?php echo wp_get_attachment_image($item['blueprint']['image'], 'large'); ?></li>
										<?php endforeach;?>
									</ul>
								</div>

								<div class="modals">
									<?php
										$blueprints = $contents['blueprints']; 
										array_shift($blueprints);
									?>
									<?php foreach($blueprints as $key=>$item) :?>
										<div class="c-modal" id="modal-<?php echo $key + 1; ?>">
											<button class="modal-close">Fechar</button>
											<div class="modal-inner">
												<div class="content-wrapper">
													<?php echo $item['blueprint']['text'];?>
												</div>
											</div>
										</div>
									<?php endforeach;?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		
    <?php endwhile; ?>
<?php endif; ?>




<?php
get_footer();
