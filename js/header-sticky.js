'use strict';

(function () {
	var header = document.querySelector('.site-header');
	var sticky = header.offsetTop;

	var stickyHeader = function () {
		if (window.pageYOffset >= sticky) {
			header.classList.add('site-header--fixed');

		} 

		if (header.classList.contains('admin') && window.pageYOffset <= 46) {
			header.classList.remove('site-header--fixed');
		}

		if (!header.classList.contains('admin') && window.pageYOffset < sticky) {
			header.classList.remove('site-header--fixed');
		}
	}

	if (document.body.clientWidth < 783) {
	    window.addEventListener('scroll', stickyHeader);
	}

	

	
	
})();
