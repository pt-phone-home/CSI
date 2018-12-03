<?php
require 'components/init.php';

// $_SESSION['is_logged_in'] = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	
	$conn = require 'components/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
        Auth::login();
	   header('Location:/csi/admin-page.php');
		//Url::redirect("/CSI/admin-page.php");
    } else {
        $error = 'login incorrect';
    }
}

?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Admin Panel Log In</title>
</head>

<body>

	<div class="admin-container">



		<div class="admin-banner">
			<h1>CSI Admin Panel </h1>
		</div>

		<div class="form-container">
			<form action="login.php" method="POST" class="contact-form login-form">
				<?php if (! empty($error)) :?>
				<p>
					<?= $error ;?>
				</p>
				<?php endif; ?>
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" name="username" id="username">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password">
				</div>
				<button>Log in</button>
			</form>
			<a href="admin-page.php">Go Back</a>
		</div>



		<?php include 'components/footer.php'; 
        ?>

	</div>


	<script src="js/navbar.js"></script>
	<script src="js/animation.js"></script>
	<script src="js/banner.js"></script>
	<script>
		AOS.init();
	</script>
	<script>
	</script>

</body>

</html>