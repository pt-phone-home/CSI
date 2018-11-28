<?php 
require 'components/init.php';
$conn = require 'components/db.php';

$articles = Article::getAll($conn);
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

		<div class="news-page-banner">
			<i class="fas fa-newspaper"></i>
			<h1>News:</h1>
			<p>Latest news
				<span>from</span> SCI</p>
		</div>

		<div class="news-banner">
			<h1>Latest News &amp; Updates</h1>
		</div>

		<div class="news-and-updates-background">
		</div>

		<div class="news-and-updates">
			<div class="news">
				<?php if ($articles): ?>
				<?php foreach ($articles as $article):?>
				<div class="news-item">
					<img src="img/banner.jpg" alt="">
					<div class="info">
						<h1>
							<?=$article['title'];?>
						</h1>
						<small>
							<?=$article['published_at'];?>
						</small>
					</div>
					<div class="news-item-content">
						<p>
							<?=$article['content'];?>
						</p>
					</div>
				</div>
				<?php endforeach;?>
				<?php endif ;?>



			</div>
		</div>

		<div class="twitter">
			<a class="twitter-timeline" href="https://twitter.com/tweet_to_pete?ref_src=twsrc%5Etfw" data-chrome="noheader nofooter noborders noscrollbar"
			 data-width="40rem" data-tweet-limit="10">Tweets by tweet_to_pete</a>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

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