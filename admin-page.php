<?php 
require 'components/init.php';
?>
<?php 
	
	$db = new Database();
	$conn = $db->getConn();

	if (isset($_GET['page'])) {
		$paginator = new Paginator($_GET['page'], 20, Article::getTotal($conn));
	} else {
		$paginator = new Paginator(1, 10, Article::getTotal($conn));
	}
	$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

	//$articles = Article::getALL($conn);
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
				<div class="admin-area-articles">
					<h2 class="admin-area-articles-heading">Articles</h2>
					<p class="admin-area-articles-new">
						<a href="new_newsitem.php">
							<h1>Add New Article</h1>
						</a>
					</p>

					<table class="admin-area-articles-table">
						<thead>
							<th>Title</th>
							<th>Published/Updated Date</th>
							<th colspan=2>Admin Options</th>
						</thead>
						<tbody>
							<?php foreach ($articles as $article): ?>
							<tr>

								<td>
									<a href="newsitem.php?id=<?= $article['id'];?>">
										<?= htmlspecialchars($article['title'])?>
									</a>
								</td>
								<td>
									<?= $article['published_at'];?>
								</td>
								<td>
									<a href="edit_newsitem.php?id=<?= $article['id'];?>">Edit</a>
								</td>
								<td>
									<a href="delete_newsitem.php?id=<?= $article['id'];?>">Delete</a>
								</td>

							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<div class="pagination">
						<?php require 'components/pagination.php'; ?>
					</div>
				</div>









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