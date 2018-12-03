<?php if (!empty($article->errors)): ?>
<ul>
	<?php foreach ($article->errors as $err):?>
	<li>
		<?= $err;?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="POST" class="article-form" enctype="multipart/form-data" name="myform" id="myform">
	<div class="form-group">
		<label for="title">News Title:</label>
		<input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->title);?>">
	</div>
	<div class="form-group">
		<label for="headline">Headline:</label>
		<input type="text" name="headline" id="headline" placeholder="Headline for article" value="<?= htmlspecialchars($article->headline) ;?>">
	</div>
	<div class="form-group">
		<label for="summernote" class="content-label">Article Content:</label>

		<textarea name="content" id="content" cols="30" rows="20" placeholder="Type the content of your article here"><?= htmlspecialchars($article->content) ;?></textarea>
	</div>

	<div class="form-group">
		<label for="image">Upload Image (Optional):</label>
		<input type="file" name="image" id="image" class="image-input">
	</div>



	<button>Save</button>

	<a href="admin-page.php">Go Back</a>
</form>