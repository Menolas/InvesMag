'use strict';
(function () {

	var linkBlocks = document.querySelectorAll('.themes-block-main .themes-block');

	if (document.body.clientWidth < 768) {

		Array.from(linkBlocks).forEach(function (el) {
			var links = el.querySelectorAll('li');
			if (links.length > 5) {
				el.classList.add('themes-block--show-thingie');
				el.addEventListener('click', function(evt) {
					var target = event.target;
					if (target = el.querySelector('.themes-block__thingie')) {
						el.classList.remove('themes-block--show-thingie');
					}
				});
			}
		});
	}

	if (document.body.clientWidth > 768  && document.body.clientWidth < 1024) {

		Array.from(linkBlocks).forEach(function (el) {
			var links = el.querySelectorAll('li');
			if (links.length > 6) {
				el.style = "flex-basis: 100%";
			} 
		});
	}

	Array.from(linkBlocks).forEach(function (el) {
		var links = el.querySelectorAll('li');
		if (links.length > 12) {
			el.style = "flex-basis: 100%";
		} else if (links.length > 6) {
			el.style = "flex-basis: 60%";
		}
	});
})();
