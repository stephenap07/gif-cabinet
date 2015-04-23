<?php
	require('../app/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gif Cabinet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/styles/application.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<?php
	require_once(realpath("resources/config.php"));
	?>
</head>
<body>
	<?php include('header.php');?>
	<section class='page-header container-fluid'>
		<div class="row">
			<div class="col-md-6 text-center">
				<h1 text-align="center">Gif Cabinet</h1>
			</div>
			<div class="col-md-6 text-center">
				<img src="<?php echo $config['paths']['resources'] . '/images/cabinet.png' ?>" width="15%" height="15%">
			</div>
		</div>
	</section>

	<section class="container about">
		<div class="row">
			<div class="wrapper">
				<h2 class="col-md-12 about-details"> What is GIF Cabinet? </h2>
				<p class="col-md-12 about-details">This project is aimed mainly at developers who design and implement software that may contain graphical bugs and strange behavior that is best described in video form. Basically, we would have users (Quality Assurance) upload GIFs/webm files to the site and other clients are able to tag the GIFs with labels like "to do" or "won't fix" and then clients can filter the GIFs by specific tags to view certain GIFs. After a while the GIFs can be marked as resolved and archived.  This is useful for mostly games and other programs that contain graphical glitches that are hard to explain in words and would be very useful to see every bug on one page as a bunch of GIFs/webms.</p>
			</div>
		</div>
	</section>
	<div class='row home-main'>
		<button class='col-md-2 col-md-offset-5 btn btn-default new-issue'>New Issue</button>
	</div>
	<section class='home-main'>
		<div class="container-fluid form-upload">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php
					include(TEMPLATES_PATH . '/form_upload.php');
					?>
				</div>
				<div class='preview'></div>
			</div>
		</div>

			<div class='gif-filter'>
				<select class='form-control grid-filter'>
					<option value='view_all'>View All</option>
					<option value='open'>Open</option>
					<option value='rejected'>Rejected</option>
					<option value='closed'>Closed</option>
					<option value='accepted'>Accepted</option>
				</select>
			</div>

			<div class='gifs'>
				<?php
				require('../app/issue.php');
				$issueManager = new IssueManager();
				$result = $issueManager->all();
				$numInRow = 0;
				$max = $result->num_rows;
				for ($x = 0; $x < $max; $x++) {
					$issue = new Issue($result);
					if ($numInRow == 0){
						echo("<div class='container-fluid'>");
						echo("<div class='row gif-row'>");
					}
					include(TEMPLATES_PATH . '/thumbnail.php');
					$numInRow++;
					if ($numInRow == 3 || $x == $max){
						echo("</div>");
						echo("</div>");
						$numInRow = 0;
					}
				}
				?>
			</div>
		<section>
		</body>

		<script src="<?php echo $config['paths']['resources'] . 'scripts/thumbnails.js'; ?>"></script>
		</html>
