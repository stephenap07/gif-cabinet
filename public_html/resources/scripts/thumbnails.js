$('.comment-button').click(function(){
	$form = $(this).parent().next('form');
	$img = $form.parent().prev('img');
	$form.toggle();
})

$('.cancel-comment').click(function(e){
	e.preventDefault();
	$(this).parent().parent().toggle();
})

$('.grid-filter').change(function(){
	$.ajax({
		url: 'grid_query.php',
		data: { 'status': $(this).val() },
		success: function(data, success){
			$('.gifs').html(data);
		}
	})
})

$(".new-issue").click(function(){
	$(".form-upload").animate({
		height: '350px'
	});

	$("html, body").animate({ scrollTop: 300 }, 200);
})

$('.cancel-upload').click(function(e){
	e.preventDefault();
	$('.form-upload').animate({
		height: '0px'
	})
})

