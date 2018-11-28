<?php 
require 'components/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'components/head.php';?>
	<title>CSI Administration Page </title>
</head>

<body>
	<div class="container">
		<div class="admin-banner">
			<h1>CSI Admin Panel</h1>

		</div>

		<div class="admin-content-background">
		</div>
		<div class="admin-content">
			<?php if (Auth::isLoggedIn()): ?>
			<div class="admin-login">
				<p>You are logged in.
					<a href="logout.php">Log out</a>
				</p>










				<?php else: ?>
				<p class="not-logged-in">Your are not logged in... Please
					<a href="login.php">Log In</a>

				</p>
				<?php endif; ?>
			</div>
		</div>

		<?php include 'components/footer.php';?>


	</div>
	<script src="js/navbar.js"></script>
	<script src="js/animation.js"></script>
	<script src="js/banner.js"></script>
	<script>
		AOS.init();
	</script>

</body>

</html>