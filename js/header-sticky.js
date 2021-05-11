'use strict';

(function () {
	var header = document.querySelector('.site-header');
	var sticky = header.offsetTop;

	var stickyHeader = function () {
		if (window.pageYOffset >= sticky) {
			header.classList.add('site-header--fixed');
		} else {
			header.classList.remove('site-header--fixed');
		}
	}

	if (document.body.clientWidth < 900) {
	    window.addEventListener('scroll', stickyHeader);
	}
	
})();
