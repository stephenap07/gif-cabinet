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
	$tags = array("open", "closed", "rejected", "accepted");
	$tag = $tags[array_rand($tags)];
	include('header.html');?>

	<section class='gif-detail container-fluid'>
		<h2> Some Gif </h2>
		<div class="img-responsive img-thumbnail col-md-12 <?php echo($tag);?>">
			<img class='gif-image' src="resources/images/1407801019670.gif">
			<div class='col-md-12 show-buttons'>
				<button class='btn btn-success'>Accept</button>
				<button class='btn btn-danger'>Reject</button>
			</div>
			<div class="caption col-md-12">
				<h3><?php 
		// for testing filter... needs to be dynamic
					echo (ucfirst($tag)."</h3>");
					?>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
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
						<li class='comment'>Comment 1...</li>
						<li class='comment'> Comment 2.. </li>
					</ul>
				</div>

			</div>
		</section>
	</body>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src='resources/scripts/thumbnails.js'></script>
	</html>

