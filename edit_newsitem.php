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

if ($_SERVER['REQUEST_METHOD']== 'POST') {

	$article->title = $_POST['title'];
	$article->headline = $_POST['headline'];
	$article->content = $_POST['content'];
	$article->published_at = $_POST['published_at'];
	$filename = $_FILES['image']['name'];

	$destination = "img/uploads/$filename";

	move_uploaded_file($_FILES['image']['tmp_name'], $destination);

	$article->img = $filename;

    
	if ($article->update($conn)) {
		header("Location:/csi/admin-page.php");
	}

}
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Edit News Article - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">


		<section class="admin-banner">
			<h1>Edit article</h1>
		</section>



		<?php include 'components/article-form.php';?>



		<?php include 'components/footer.php'; ?>
	</div>
	<script>
		CKEDITOR.replace('content');
	</script>

</body>

</html>