$('.comment-button').click(function(){
	$form = $(this).parent().next('form');
	$img = $form.parent().prev('img');
	$form.toggle();
})

$('.cancel-comment').click(function(e){
	e.preventDefault();
	$(this).parent().parent().toggle();
})
