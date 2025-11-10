/** Ajax for media mentions page */
jQuery(document).ready(function($) {
	var location = 'all';
	var currentPage = 1;

	$('.communitysupport-toggle-item').on('click', function(e) {
        e.preventDefault();
		location = $(this).attr('data');
        currentPage = 1;

		if( $('.communitysupport-btn-load-more.disabled').length ) {
			$('.communitysupport-btn-load-more').removeClass('disabled');
			$('.communitysupport-btn-load-more').text( 'Load More posts' );
		}
		
        $('.communitysupport-toggle-item').removeClass('active');
        $(this).addClass("active");  
        $('.communitysupport-holder').removeClass('fade');

        $(".communitysupport-holder").empty();
        $(".communitysupport-holder").append('<div class="loading-icon"></div>');

			$.ajax({
				type: "POST",
				dataType: "html",
				url: loadmore_params_communitysupport.ajaxurl,
				data: {
					action: 'loadmore_communitysupport',
					id: location
				},
				success: function(data){
					var $data = $(data);
					if($data.length){
						$(".communitysupport-holder").empty();
						$(".communitysupport-holder").append(data);
                        $(".communitysupport-holder").removeClass("fade");
                        $(".communitysupport-holder").addClass("fade");
					}
				},
				error : function(jqXHR, textStatus, errorThrown) {
                    console.log('error: ' + errorThrown);
				}
			});
			return false;
	});

	//load more functon
	$('.communitysupport-btn-load-more').on('click', function(e) {
		e.preventDefault();		
		var button = $(this);
 
		$.ajax({
			type: "POST",
			dataType: "html",
			url: loadmore_params_communitysupport.ajaxurl,
			data:  {
				action: 'loadmore_communitysupport',
				id: location,
				offsetPage: currentPage * 10
			},
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success: function(data){
				currentPage++;
				var $data = $(data);
				if($data.length){
					button.text( 'Load More Posts' );
					$(".communitysupport-holder").append(data);
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

    // silly scripts needed to swap font color on sidebar CTA

    function color_swap() {
        var window_top = $(window).scrollTop();
        var div_top = $('.toggle').offset().top - 500;       
    
        if (window_top > div_top) {
            $('.sidebar-name').addClass('black');
        } else {
            $('.sidebar-name').removeClass('black');
        }
    }
    
    $(window).scroll(color_swap);

    var width = $(window).outerWidth();

    if (width <= 1024) {

    $(".communitysupport-toggle-container").click(function () {
        $(".filter-selections").slideToggle(400);
        $(this).toggleClass("clicked");
    });

    $('.communitysupport-toggle-item').click(function() {	
		$('.filter-selections').slideUp(400);
	});	

    var aVar = 'All of Ohio';
    $(".current").html(aVar);

    $("#all").click(function () {
        aVar = "All of Ohio";
        $(".current").html(aVar);
    });
    $("#northwest").click(function () {
        aVar = "Northwest Ohio";
        $(".current").html(aVar);
    });
    $("#northeast").click(function () {
        aVar = "Northeast Ohio";
        $(".current").html(aVar);
    });
    $("#central").click(function () {
        aVar = "Central Ohio";
        $(".current").html(aVar);
    });
    $("#southwest").click(function () {
        $(".current").html(aVar);
        aVar = "Southwest Ohio";
    });
    $("#southeast").click(function () {
        aVar = "Southeast Ohio";
        $(".current").html(aVar);
    });

    }

});