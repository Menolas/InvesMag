'use strict';
(function () {
		
	var searchButtonMobile = document.querySelector('.searching-form__btn--mobile');
	var searchButtonDesk = document.querySelector('.searching-form__btn--desktop');
	var searchform = document.querySelector('#searching-form__popup');
	var searchformClose = document.querySelector('.searching-form__close');
	var body = document.querySelector('body');
	var	mStatus = false;

	if (document.body.clientWidth < 1024) {
	    searchButtonMobile.addEventListener('click', function(e) {
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
			var its_searchButtonMobile = target == searchButtonMobile;

	        if (!its_searchform && !its_searchButtonMobile) {
			    modalClose(searchform);
			}
		});
	}

	if (document.body.clientWidth > 1023) {
	    searchButtonDesk.addEventListener('click', function(e) {
	    	e.stopPropagation();
			modalShow(searchform);

			searchformClose.addEventListener('click', function(e) {
				modalClose(searchform);
			});
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
		modal.querySelector('.search-form__input').focus();
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
