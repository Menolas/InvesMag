jQuery(function($) {
	$(document).ready(function() {

	    $(document).on('click', '.to-top-button', function(event) {
		 
		    $('body,html').animate({scrollTop:0},800);
		 
		});

		$('p').filter(function(){
		   return this.innerHTML == '&nbsp;';
		}).remove();
	

	// $(window).scroll(function() {
	 
	//     if($(this).scrollTop() != 0) {
	 
	//         $('#toTop').fadeIn();
	 
	//     } else {
	 
	//         $('#toTop').fadeOut();
	 
	//     }
	 
	// });
	});
});
