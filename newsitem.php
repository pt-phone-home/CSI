<?php
	require 'components/init.php';

	$db = new Database();
	$conn = $db->getConn();

	if (isset($_GET['id'])) {
	
		$article = Article::getByID($conn, $_GET['id']);

} else {
	$article = null;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'components/head.php';?>
	<title>CSI News - Stay up to date </title>
</head>

<body>
	<div class="container">

		<?php include 'components/header.php'; ?>
		<div class="newsitem-nav-background"></div>
		<div class="newsitem-container-background"></div>
		<div class="newsitem-container">
			<?php if ($article):?>
			<div class="newsitem-topnav">
				<i class="fas fa-arrow-left"></i>
				<a href="news.php">Back to news</a>
			</div>
			<div class="newsitem-img">
				<?php if(isset($article->img)):?>
				<img src="img/uploads/<?=$article->img;?>" alt="">
				<?php else :?>
				<img src="img/banner.jpg" alt="">
				<?php endif; ?>
			</div>
			<div class="newsitem-heading">
				<h1>
					<?=$article->title;?>
				</h1>

			</div>
			<div class="newsitem-content">
				<p>
					<?=$article->content;?>
				</p>
			</div>
			<?php endif ;?>
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