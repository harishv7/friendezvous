<?php
	include 'includes/session.php';
	include 'includes/dbConnect.php';
?>
<!DOCTYPE html>
<html>
	
    <?php
		include 'includes/header.php';
	?>
	<head>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
		<script>
			function initialize() {
			  var latitude = document.getElementById("latitude").value;
			  var longitude = document.getElementById("longitude").value;
			  var myLatlng = new google.maps.LatLng(latitude, longitude);

			  var mapOptions = {
				center: myLatlng,
				zoom: 17
			  };
			  var map = new google.maps.Map(document.getElementById('map-canvas'),
				mapOptions);
			var marker = new google.maps.Marker({
				  position: myLatlng,
				  map: map,
				  title: 'Meeting Location'
			});

				
			google.maps.event.addListener(map, "center_changed", function(){ 
				document.getElementById("latitude").value = map.getCenter().lat(); 
				document.getElementById("longitude").value = map.getCenter().lng(); 
			});
				
			  var input = /** @type {HTMLInputElement} */(
				  document.getElementById('pac-input'));

			  var types = document.getElementById('type-selector');
			  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
			  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

			  var autocomplete = new google.maps.places.Autocomplete(input);
			  autocomplete.bindTo('bounds', map);

			  var infowindow = new google.maps.InfoWindow();
			  var marker = new google.maps.Marker({
				map: map,
				anchorPoint: new google.maps.Point(0, -29)
			  });

			  google.maps.event.addListener(autocomplete, 'place_changed', function() {
				infowindow.close();
				marker.setVisible(false);
				var place = autocomplete.getPlace();
				if (!place.geometry) {
				  window.alert("Autocomplete's returned place contains no geometry");
				  return;
				}

				// If the place has a geometry, then present it on a map.
				if (place.geometry.viewport) {
				  map.fitBounds(place.geometry.viewport);
				} else {
				  map.setCenter(place.geometry.location);
				  map.setZoom(17);  // Why 17? Because it looks good.
				}
				marker.setIcon(/** @type {google.maps.Icon} */({
				  url: place.icon,
				  size: new google.maps.Size(71, 71),
				  origin: new google.maps.Point(0, 0),
				  anchor: new google.maps.Point(17, 34),
				  scaledSize: new google.maps.Size(35, 35)
				}));
				marker.setPosition(place.geometry.location);
				marker.setVisible(true);

				var address = '';
				if (place.address_components) {
				  address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
				  ].join(' ');
				}

				infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
				infowindow.open(map, marker);
			  });

			  // Sets a listener on a radio button to change the filter type on Places
			  // Autocomplete.
			  function setupClickListener(id, types) {
				var radioButton = document.getElementById(id);
				google.maps.event.addDomListener(radioButton, 'click', function() {
				  autocomplete.setTypes(types);
				});
			  }

			  setupClickListener('changetype-all', []);
			  setupClickListener('changetype-address', ['address']);
			  setupClickListener('changetype-establishment', ['establishment']);
			  setupClickListener('changetype-geocode', ['geocode']);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<?php
			include 'includes/navigationBar.php';
			$location_id = mysqli_real_escape_string($connection, $_GET['location_id']);
		?>
		
		<div class="section">
			<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">
							<?php
								$query = "SELECT * FROM locations WHERE location_id='$location_id'";
								$result = mysqli_query($connection, $query);
								$location = mysqli_fetch_array($result, MYSQLI_ASSOC);
								echo $location['name'];
							?>
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" id="location" name="location" value="<?php echo $location['name']; ?>">
						<input type="hidden" id="latitude" name="latitude" value="<?php echo $location['latitude']; ?>">
						<input type="hidden" id="longitude" name="longitude" value="<?php echo $location['longitude']; ?>">
						<div id="map-canvas"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>