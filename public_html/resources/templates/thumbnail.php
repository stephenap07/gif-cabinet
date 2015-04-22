<?php
		$tags = array("open", "closed", "rejected", "accepted");
		$tag = $tags[array_rand($tags)];
?>
<div class="img-responsive img-thumbnail col-sm-12 col-md-4 <?php echo($tag);?>">
	<a href='<?php echo "detailed_view.php?id=" . $issue->id()  ?>'>
		<img class='gif-image' src=<?php echo $issue->imagePath() ?>>
	</a>
	<div class="caption">
		<h3> GIF Label  <small>&bull; <?php 
		// for testing filter... needs to be dynamic
		echo (ucfirst($issue->tag())."</small></h3>");
		?>
		<p><?php echo $issue->description(); ?></p>
		<p>
			<a href="#" class="btn btn-primary" role="button">Resolve</a> 
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
