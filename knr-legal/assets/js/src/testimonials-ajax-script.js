/** Ajax for media testimonials page */
jQuery(document).ready(function($) {
	var mediaType = 'video';
	var currentPage = 1;

	$('.testimonial-toggle-item').on('click', function(e) {
        e.preventDefault();
		mediaType = $(this).attr('data');
        currentPage = 1;

		if( $('.testimonials-btn-load-more.disabled').length ) {
			$('.testimonials-btn-load-more').removeClass('disabled');
			$('.testimonials-btn-load-more').text( 'Load More posts' );
		}

        $('.testimonial-toggle-item').removeClass('active');
        $(this).addClass("active");  
        $('.testimonial-holder').removeClass('fade');

        $(".testimonial-holder").empty();
        $(".testimonial-holder").append('<div class="loading-icon"></div>');

			$.ajax({
				type: "POST",
				dataType: "html",
				url: loadmore_params_testimonials.ajaxurl,
				data: {
					action: 'loadmore_testimonials',
					id: mediaType
				},
				success: function(data){
					var $data = $(data);
					if($data.length){
						$(".testimonial-holder").empty();
						$(".testimonial-holder").append(data);
                        $(".testimonial-holder").removeClass("fade");
                        $(".testimonial-holder").addClass("fade");
					}
				},
				error : function(jqXHR, textStatus, errorThrown) {
                    console.log('error: ' + errorThrown);
				}
			});
			return false;
	});

	//load more functon
	$('.testimonials-btn-load-more').on('click', function(e) {
		e.preventDefault();		
		var button = $(this);
 
		$.ajax({
			type: "POST",
			dataType: "html",
			url: loadmore_params_testimonials.ajaxurl,
			data:  {
				action: 'loadmore_testimonials',
				id: mediaType,
				offsetPage: currentPage * 10
			},
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success: function(data){
				currentPage++;
				var $data = $(data);
				if($data.length){
					button.text( 'Load More posts' );
					$(".testimonial-holder").append(data);
				} else {
					button.addClass('disabled');
					button.text('End of Posts');
				}
			},
			error : function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
				button.text( 'Error!' );
                button.addClass('disabled');
			}
		});

	});
});