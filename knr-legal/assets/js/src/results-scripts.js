jQuery(function($) {
    // toggle extra result categories
	$('.all-categories-mobile').click(function() {
		$('.expand-categories').slideToggle(400);
        $(this).toggleClass('active');
	});
	 
	// Close categories on anchor tap
	$('.all-categories-mobile.active').click(function() {	
		$('.expand-categories').slideUp(400);
	});	

    $('.all-categories-desktop').click(function() {
		$('.expand-categories').slideToggle(400);
        $(this).toggleClass('active');
	});
	 
	// Close categories on anchor tap
	$('.all-categories-desktop.active').click(function() {	
		$('.expand-categories').slideUp(400);
	});	

    $('.results-toggle-item').click(function() {	
		$('.expand-categories').slideUp(400);
        $('.all-categories').toggleClass('active');
	});	

    

    $('h2').html(function (i, t) {
        var hhNumber = $(this).attr('class').substring(4, 3);
        var words = t.split(/\s+/);
  
            return "<span>" + words.slice(0,hhNumber).join(" ") + "</span> " + words.slice(hhNumber).join(" ");
    });

});