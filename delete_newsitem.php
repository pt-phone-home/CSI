<?php
	require 'components/init.php';

	Auth::requireLogin();

	$conn = require 'components/db.php';

	if (isset($_GET['id'])) {
	
		$article = Article::getByID($conn, $_GET['id']);

        if (! $article) {
			die("article not found");	
			}

} else {
	die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($article->delete($conn)) {
        header("Location:/csi/admin-page.php");
    }
}
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>News Article - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">


		<section class="admin-banner">
			<h1>Delete news article</h1>


		</section>
		<form method="POST" class="delete-form">
			<p>Are you sure?</p>
			<button>DELETE</button>
			<a href="admin-page.php"> Cancel </a>
		</form>
		<a href="delete-article.php?id=<?= $article->id;?>">Delete</a>


		<?php include 'components/footer.php'; 
        ?>




	</div>


	<script>
	</script>

</body>

</html>