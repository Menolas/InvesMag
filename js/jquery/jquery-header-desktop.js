jQuery(document).ready(function ($) {

	var lastScrollTop = 0;

	if (document.body.clientWidth >= 1024) {
	 
	    $(window).scroll(function(event) {
	    	var st = $(this).scrollTop();

	        if(st < lastScrollTop) {
	       
	            $('.site-header').addClass('site-header--fixed')
		    }
		    else {
		        $('.site-header').removeClass('site-header--fixed')
		    }

		    lastScrollTop = st;
	    });
	}
	 
});
