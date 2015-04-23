<?php
	require('../app/issue.php');	

	$hasValidID = false;
	$issue;
	$tag;

	if (!empty($_GET)) {
		if (!empty($_GET['id'])) {
			$issueManager = new IssueManager();
			$result = $issueManager->queryByID($_GET['id']);
			$issue = new Issue($result);
			$tag = $issue->tag();
			$hasValidID = true;
		}
	}

	if (!$hasValidID) {
		header('Location: index.php');
		die();
	}

	require('../app/private.php');
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<link rel="stylesheet" href="resources/styles/application.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<title>Detailed View</title>
</head>
<body>
	<?php
	include('header.php');?>

	<section class='gif-detail container-fluid'>
		<h2> Some Gif </h2>
		<div class="img-responsive img-thumbnail col-md-12 <?php $tag; ?>">
			<img class='gif-image' src="<?php echo $issue->imagePath(); ?>">
			<div class='col-md-12 show-buttons'>
				<?php
					if (strcmp($tag, 'open') == 0) {
						echo "<button class='btn btn-success'>Accept</button>"
							. "<button class='btn btn-danger'>Reject</button>";
					}
				?>
			</div>
			<div class="caption col-md-12">
				<h3><?php 
		// for testing filter... needs to be dynamic
					echo (ucfirst($tag)."</h3>");
					?>
					<p><?php echo $issue->description(); ?></p>
					<p>
						<button class="btn btn-default comment-button" role="button">Comment</button>
					</p>
					<form action='#' class='comment-form'>
						<div class='comment-box'>
							<textarea placeholder='Comment here!'>
							</textarea>
						</div>
						<div>
							<button type='submit' class='btn btn-primary'>Add Comment</button>
							<button class='btn btn-default cancel-comment'>Cancel</button>
						</div>
					</form>
					<ul class='comments'>
						<?php
							require('../app/comment.php');
							$commentManager = new CommentManager();
							$result = $commentManager->queryByIssue($issue->id());

							$numRows = $result->num_rows;
							for ($i = 0; $i < $numRows; $i++) {
								$comment = new Comment($result);
								echo "<li class='comment'>" . $comment->message(). "</li>";
							}
						?>
					</ul>
				</div>

			</div>
		</section>
	</body>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src='resources/scripts/thumbnails.js'></script>
	
	</html>

