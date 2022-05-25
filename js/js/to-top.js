'use strict';

(function () {

	//to top scroll
    
	const toTopButton = document.querySelector('.to-top-button');
	const rootElement = document.documentElement;

    function scrollToTop() {
	  rootElement.scrollTo({
	    top: 0,
	    behavior: "smooth"
	  });
	  toTopButton.classList.remove('to-top-button--sh');
	}

	document.addEventListener('wheel', (evt)=> {
		if (evt.deltaY < 0 && pageYOffset > 1000) {
			toTopButton.classList.add('to-top-button--sh');
			toTopButton.addEventListener("click", scrollToTop);
		} else {
			toTopButton.classList.remove('to-top-button--sh');
		}

	});

})();
