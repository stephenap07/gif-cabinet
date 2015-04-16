<!DOCTYPE html>
<html lang="en">
<head>
	<title>Group Project Prototype</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../resources/styles/application.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<?php
	require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
	?>

</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	  	<strong><i> GC </i></strong>
    	<a href='#' class='btn btn-primary'>Sign In</a>
	  </div>
	</nav>
	<section class='page-header container-fluid'>
		<div class="row">
			<div class="col-md-6 text-center">
				<h1 text-align="center">Gif Cabinet <small><em>Prototype</em></small></h1>
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
				<p class="col-md-12 about-details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</section>

	<section class='home-main'>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php
					include(TEMPLATES_PATH . '/form_upload.php');
					?>
				</div>
			</div>
		</div>

			<div class='gif-filter'>
				<select class='form-control'>
					<option value='view_all'>View All</option>
					<option value='open'>Open</option>
					<option value='rejected'>Rejected</option>
					<option value='closed'>Closed</option>
					<option value='accepted'>Accepted</option>
				</select>
			</div>

			<div class='gifs'>
				<?php
				$numInRow = 0;
				for ($x = 0; $x <= 5; $x++) {
					if ($numInRow == 0){
						echo("<div class='container-fluid'>");
						echo("<div class='row gif-row'>");
					}
					include(TEMPLATES_PATH . '/thumbnail.php');
					$numInRow++;
					if ($numInRow == 3){
						echo("</div>");
						echo("</div>");
						$numInRow = 0;
					}
				}
				?>
			</div>
		<section>
		</body>

		<script src='../resources/scripts/thumbnails.js'></script>

		</html>
