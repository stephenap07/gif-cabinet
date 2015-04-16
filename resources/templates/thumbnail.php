<?php
		$tags = array("open", "closed", "rejected", "accepted");
		$tag = $tags[array_rand($tags)];
?>
<div class="img-responsive img-thumbnail col-sm-12 col-md-4 <?php echo($tag);?>">
	<img class='gif-image' src="../resources/images/1407801019670.gif">
	<div class="caption">
		<h3> GIF Label  <small>&bull; <?php 
		// for testing filter... needs to be dynamic
		echo (ucfirst($tag)."</small></h3>");
		?>
		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
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