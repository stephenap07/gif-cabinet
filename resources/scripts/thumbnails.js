$('.comment-button').click(function(){
				$(this).parent().next('form').toggle();
			})

			$('.cancel-comment').click(function(e){
				e.preventDefault();
				$(this).parent().parent().toggle();
			})