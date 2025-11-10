/** Ajax for media results page */
jQuery(document).ready(function($) {
	var currentPage = 1;
    var category = 'all';

    $('.results-toggle-item').on('click', function(e) {
        e.preventDefault();
		category = $(this).attr('data');
        currentPage = 1;

		if( $('.btn-load-more.disabled').length ) {
			$('.btn-load-more').removeClass('disabled');
			$('.btn-load-more').text( 'Load More posts' );
		}

        $('.results-toggle-item').removeClass('active');
        $(this).addClass("active");  
        $('.result-holder').removeClass('fade');

        $(".result-holder").empty();
        $(".result-holder").append('<div class="loading-icon"></div>');

			$.ajax({
				type: "POST",
				dataType: "html",
				url: loadmore_params_results.ajaxurl,
				data: {
					action: 'loadmore_results',
					id: category,
				},
				success: function(data){
					var $data = $(data);
					if($data.length){
						$(".result-holder").empty();
						$(".result-holder").append(data);
                        $(".result-holder").removeClass("fade");
                        $(".result-holder").addClass("fade");

                        $('h2').html(function (i, t) {
                            var hhNumber = $(this).attr('class').substring(4, 3);
                            var words = t.split(/\s+/);
                      
                                return "<span>" + words.slice(0,hhNumber).join(" ") + "</span> " + words.slice(hhNumber).join(" ");
                        });
					}
				},
				error : function(jqXHR, textStatus, errorThrown) {
                    console.log('error: ' + errorThrown);
				}
			});
			return false;
	});

	//load more functon
    $('.btn-load-more').on('click', function(e) {
		e.preventDefault();		
        var cat = $(this).data('category');
		var button = $(this);
 
		$.ajax({
			type: "POST",
			dataType: "html",
			url: loadmore_params_results.ajaxurl,
			data:  {
				action: 'loadmore_results',
				offsetPage: currentPage * 6,
                id: category,
			},
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success: function(data){
				currentPage++;
				var $data = $(data);
				if($data.length){
					button.text( 'More Results' );
					$(".result-holder").append(data);

                    $('h2').html(function (i, t) {
                        var hhNumber = $(this).attr('class').substring(4, 3);
                        var words = t.split(/\s+/);
                  
                            return "<span>" + words.slice(0,hhNumber).join(" ") + "</span> " + words.slice(hhNumber).join(" ");
                    });
                    
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