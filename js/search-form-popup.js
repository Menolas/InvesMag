'use strict';
(function () {
		
	var searchButtonMobile = document.querySelector('.searching-form__btn--mobile');
	var searchButtonDesk = document.querySelector('.searching-form__btn--desktop');
	var searchform = document.querySelector('#searching-form__popup');
	var searchformDesktopContainer = document.querySelector('.site-header__bottom .news-categories');
	var newsMenu = document.querySelector('.site-header__bottom .news-categories .news-categories__list');
	var body = document.querySelector('body');

	function toggleSearch () {
		searchButtonMobile.classList.toggle('searching-form__btn--close');
		searchform.classList.toggle('searching-form--shown');
		body.classList.toggle('lock');
	}

	function toggleSearchDesk () {
		searchButtonDesk.classList.toggle('searching-form__btn--close');
		searchform.classList.toggle('searching-form--shown');
		newsMenu.classList.toggle('news-categories__list--none');
		searchformDesktopContainer.classList.toggle('news-categories--search');
		body.classList.toggle('lock');
	}

	if (searchButtonMobile) {
	    searchButtonMobile.addEventListener('click', function(e) {
	    	e.stopPropagation();
	    	toggleSearch();
	    });

	    document.addEventListener('click', function (e) {
			var target = e.target;
			var its_searchform = target == searchform || searchform.contains(target);
			var its_button = target == searchButtonMobile;
	        var searchform_is_active = searchform.classList.contains('searching-form--shown');

	        if (!its_searchform && !its_button && searchform_is_active) {
			    toggleSearch();
			}
		});
	}

	if (searchButtonDesk) {
	    searchButtonDesk.addEventListener('click', function(e) {
	    	e.stopPropagation();
	    	toggleSearchDesk();
	    });

	    document.addEventListener('click', function (e) {
			var target = e.target;
			var its_searchform = target == searchform || searchform.contains(target);
			var its_button = target == searchButtonDesk;
	        var searchform_is_active = searchform.classList.contains('searching-form--shown');

	        if (!its_searchform && !its_button && searchform_is_active) {
			    toggleSearchDesk();
			}
		});
	}

})();
