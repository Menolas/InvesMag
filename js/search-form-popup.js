'use strict';
(function () {
		
	var searchButtonMobile = document.querySelector('.searching-form__btn--mobile');
	var searchButtonDesk = document.querySelector('.searching-form__btn--desktop');
	var searchform = document.querySelector('#searching-form__popup');
	var searchformDesktopContainer = document.querySelector('.site-header__bottom .news-categories');
	var newsMenu = document.querySelector('.site-header__bottom .news-categories .news-categories__list');
	var body = document.querySelector('body');
	var	mStatus = false;

	// function toggleSearch () {
	// 	searchButtonMobile.classList.toggle('searching-form__btn--close');
	// 	searchform.classList.toggle('searching-form--shown');
	// 	body.classList.toggle('lock');
	// }

	// function toggleSearchDesk () {
	// 	searchButtonDesk.classList.toggle('searching-form__btn--close');
	// 	searchform.classList.toggle('searching-form--shown');
	// 	newsMenu.classList.toggle('news-categories__list--none');
	// 	searchformDesktopContainer.classList.toggle('news-categories--search');
	// 	body.classList.toggle('lock');
	// }

	// if (searchButtonMobile) {
	//     searchButtonMobile.addEventListener('click', function(e) {
	//     	e.stopPropagation();
	//     	toggleSearch();
	//     });

	//     document.addEventListener('click', function (e) {
	// 		var target = e.target;
	// 		var its_searchform = target == searchform || searchform.contains(target);
	// 		var its_button = target == searchButtonMobile;
	//         var searchform_is_active = searchform.classList.contains('searching-form--shown');

	//         if (!its_searchform && !its_button && searchform_is_active) {
	// 		    toggleSearch();
	// 		}
	// 	});
	// }

	// if (searchButtonDesk) {
	//     searchButtonDesk.addEventListener('click', function(e) {
	//     	e.stopPropagation();
	//     	toggleSearchDesk();
	//     });

	//     document.addEventListener('click', function (e) {
	// 		var target = e.target;
	// 		var its_searchform = target == searchform || searchform.contains(target);
	// 		var its_button = target == searchButtonDesk;
	//         var searchform_is_active = searchform.classList.contains('searching-form--shown');

	//         if (!its_searchform && !its_button && searchform_is_active) {
	// 		    toggleSearchDesk();
	// 		}
	// 	});
	// }

	if (document.body.clientWidth < 1024) {
	    searchButtonMobile.addEventListener('click', function(e) {
	    	e.stopPropagation();
	    	if (!mStatus) {
			 	modalShow(searchform);
			 	
			} else {
				modalClose(searchform);
			}
	    });
	}

	if (document.body.clientWidth >= 1024) {
	    searchButtonDesk.addEventListener('click', function(e) {
	    	e.stopPropagation();
	    	if (!mStatus) {
			 	modalShow(searchform);
			 	
			} else {
				modalClose(searchform);
			}
	    });

	    document.addEventListener('click', function (e) {
			var target = e.target;
			var its_searchform = target == searchform || searchform.contains(target);
			var its_searchButtonDesk = target == searchButtonDesk;

	        if (!its_searchform && !its_searchButtonDesk) {
			    modalClose(searchform);
			}
		});

		document.addEventListener('keydown', function (event) {
			if (mStatus && ( event.type != 'keydown' || event.keyCode === 27 ) ) {
				modalClose(searchform);
			}
		});
	}

	function modalShow(modal) {
		modal.classList.remove('fadeOut');
		modal.classList.add('fadeIn');
		searchButtonMobile.classList.add('searching-form__btn--close');
		body.classList.add('lock');
		mStatus = true;
	}

	function modalClose(modal) {
		modal.classList.remove('fadeIn');
		modal.classList.add('fadeOut');
		searchButtonMobile.classList.remove('searching-form__btn--close');
		body.classList.remove('lock');
		mStatus = false;
	}

})();
