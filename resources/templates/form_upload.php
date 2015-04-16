<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	    <label for="fileToUpload">Select image to upload:</label>
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <p class='help-block'>Upload an image that shows the issue happening</p>
	</div>
	<div class="form-group">
    <label for="issue-upload">What is the issue?</label>
    <textarea class='form-control' name='issue-upload' id='issue-upload'></textarea>
  </div> 
	<button class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>
