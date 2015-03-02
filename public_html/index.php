<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Group Project Prototype</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

		<?php
		require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
		?>

		<div class="row">
		   <div class="col-md-6 text-center">
			   <h1 text-align="center">Gif Cabinet <small><em>Prototype</em></small></h1>
		   </div>
		   <div class="col-md-6 text-center">
			   <img src="<?php echo $config['paths']['resources'] . '/images/cabinet.png' ?>" width="15%" height="15%">
		   </div>
		</div>
		<hr>

	</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<?php
					include(TEMPLATES_PATH . '/form_upload.php');
					?>
				</div>
			</div>


			<?php
			for ($x = 0; $x <= 100; $x++) {
				include(TEMPLATES_PATH . '/thumbnail.php');
			}
			?>
		</div>
	</body>
</html>
