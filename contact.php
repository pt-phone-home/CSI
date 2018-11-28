<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'components/head.php';?>
	<title>Contact CSI </title>
</head>

<body>
	<div class="container">

		<?php include 'components/header.php'; ?>

		<div class="contact-page-banner">
			<i class="fas fa-at"></i>
			<h1>Contact:</h1>
			<p>Get in touch
				<span>for</span> more information</p>
		</div>

		<div class="contact-banner-contact-page">
			<h1>Contact Information</h1>
		</div>

		<div class="map-and-address-background">
		</div>

		<div class="map-and-address">
			<div class="contact-page-map" id="map">



			</div>

			<div class="contact-page-address">
			</div>


		</div>

		<div class="contact-background-contact-page">

		</div>

		<div class="contact-contact-page">
			<div class="address">
				<p>CSI</p>
				<p>Unit 1</p>
				<p>333 Limewood Business Park</p>
				<p>Dublin 15</p>
			</div>
			<div class="contact-form-container">
				<form action="">
					<div class="form-group-inline">
						<input type="text" placeholder="Name*" required>
					</div>
					<div class="form-group-inline">
						<input type="number" placeholder="Phone">
					</div>
					<p>
						<div class="form-group-inline">
							<input type="email" placeholder="Email*" required>
						</div>
						<div class="form-group-inline">
							<input type="text" placeholder="Company">
						</div>
					</p>
					<div class="form-group-inline">
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
					</div>

					<button class="btn-flat">Submit</button>

				</form>
			</div>
		</div>









		<?php include 'components/footer.php';?>


	</div>
	<script src="js/navbar.js"></script>
	<script>
		function initMap() {

			var clonturk = {
				info: '<strong>Clonturk Park</strong><br>\
                157 Richmond Rd, Drumcondra, Dublin<br>\
					<a href="https://goo.gl/maps/n2oFmVgT92E2" target="_blank">Get Directions</a>',
				lat: 53.367940,
				long: -6.251151
			};

			var dominican = {
				info: '<strong>Dominican College</strong><br>\
                    204 Griffith Ave, Drumcondra, Dublin 9<br>\
					<a href="https://goo.gl/maps/qYf1cZCVtks" target="_blank">Get Directions</a>',
				lat: 53.374430,
				long: -6.249513
			};

			var griffith = {
				info: '<strong>Griffith Park</strong><br>\r\
                27 St Michael\'s Rd, Drumcondra, Dublin 9<br>\
					<a href="https://goo.gl/maps/XzYG8ejjJDU2" target="_blank">Get Directions</a>',
				lat: 53.370231,
				long: -6.262120
			};

			var albert = {
				info: '<strong>Albert College Park</strong><br>\r\
                Whitehall Dublin 9<br>\
					<a href="https://goo.gl/maps/6NxhvE2GxVM2" target="_blank">Get Directions</a>',
				lat: 53.382877,
				long: -6.264600
			};



			var locations = [
				[clonturk.info, clonturk.lat, clonturk.long, 0],
				[dominican.info, dominican.lat, dominican.long, 1],
				[griffith.info, griffith.lat, griffith.long, 2],
				[albert.info, albert.lat, albert.long, 2],
			];

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 14,
				center: new google.maps.LatLng(53.377517, -6.258740),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var infowindow = new google.maps.InfoWindow({});

			var marker, i;

			for (i = 0; i < locations.length; i++) {
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
		}
	</script>


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtbJayjrxT9C_mqWSebyR4DxEIi7cRl3g&callback=initMap" async
	 defer></script>
</body>

</html>