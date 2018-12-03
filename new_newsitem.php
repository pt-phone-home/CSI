<?php 
	require 'components/init.php';

	Auth::requireLogin();

$article = new Article();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Capture Text data from Form
	$conn = require 'components/db.php';

	$article->title = $_POST['title'];
	$article->headline = $_POST['headline'];
	$article->content = $_POST['content'];
	$filename = $_FILES['image']['name'];

	$destination = "img/uploads/$filename";

	move_uploaded_file($_FILES['image']['tmp_name'], $destination);

	$article->img = $filename;




	// $article->published_at = $_POST['published_at'];
    
		if ($article->create($conn)) {
			header("Location:/csi/newsitem.php?id={$article->id}");
		}
			

	}

?>


<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Submit News Article - Drumcondra FC</title>
</head>

<body onLoad="iFrameOn();">

	<div class="new_newsitem-container">

		<section class="new-newsitem-banner">
			<h1>Add new article</h1>
		</section>



		<?php include 'components/article-form.php';?>













		<?php include 'components/footer.php'; 
        ?>




	</div>



	<script>
		CKEDITOR.replace('content');
	</script>


</body>

</html>