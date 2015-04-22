<form action="upload.php" id="gif-form" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="fileToUpload">Select image to upload:</label>
		<img id="upload-preview" style="width: 100px; height: 100px; display: none;" />
		<input id="upload-image" type="file" name="myPhoto" onchange="PreviewImage();" />
		<script type="text/javascript">

			function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("upload-image").files[0]);

				oFReader.onload = function (oFREvent) {
					$preview = $('#upload-preview')[0];
					$preview.src = oFREvent.target.result;
					$($preview).css('display', 'initial');
				};
			};

		</script>
		<a href='#formScroll' id='form-scroll' style='display:none;'></a>
		<p class='help-block'>Upload an image that shows the issue happening</p>
	</div>
	<div class="form-group">
		<label for="issue-upload">What is the issue?</label>
		<textarea class='form-control' name='issue-upload' id='issue-upload'></textarea>
	</div> 
	<div class="form-group">
	<label for="author-name">Author</label>
		<input type='text' class='form-control'></input>
	
	</div>
	<button class="btn btn-primary" type="submit" name="submit">Submit</button>
	<button class="btn btn-default cancel-upload" name="cancel">Cancel</button>
</form>
