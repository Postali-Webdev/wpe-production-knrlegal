jQuery(function($) {
    // toggle extra result categories
	$('.all-categories').click(function() {
		$('.expand-categories').slideToggle(400);
        $(this).toggleClass('active');
	});
	 
	// Close categories on anchor tap
	$('.all-categories.active').click(function() {	
		$('.expand-categories').slideUp(400);
	});	

    $('.results-toggle-item').click(function() {	
		$('.expand-categories').slideUp(400);
        $('.all-categories').toggleClass('active');
	});	

});