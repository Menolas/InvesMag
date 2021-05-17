'use strict';
(function () {

	if (document.body.clientWidth >= 1024) {

		var menuItems = document.querySelectorAll('.main-navigation li a');
		var tagsContainer = document.querySelector('.tags-menu');
		var	mStatus = false;
		

		for (var i = 0; i < menuItems.length; i++) {
		    if (menuItems[i].textContent === 'Темы') {
		 		menuItems[i].classList.add('menu-tags-item');
				var tagsMenuItem = menuItems[i];
		 	}
		}

		tagsMenuItem.addEventListener('click', function (e) {
		 	e.preventDefault();
		 	e.stopPropagation()
		 	var target = e.target;

		 	if (target == tagsMenuItem) {

			 	if (!mStatus) {
				 	modalShow(tagsContainer);
				 	
				} else {
					modalClose(tagsContainer);
				}
			}
			
		});

		document.addEventListener('click', function (e) {
			var target = e.target;
			var its_menu = target == tagsContainer || tagsContainer.contains(target);
			var its_tagsMenuItem = target == tagsMenuItem;

	        if (!its_menu && !its_tagsMenuItem) {
			    modalClose(tagsContainer);
			}
		});

		document.addEventListener('keydown', function (event) {
			if (mStatus && ( event.type != 'keydown' || event.keyCode === 27 ) ) {
				modalClose(tagsContainer);
			}
		});
	}
	
	function modalShow(modal) {
		modal.classList.remove('fadeOut');
		modal.classList.add('fadeIn');
		mStatus = true;
	}

	function modalClose(modal) {
		modal.classList.remove('fadeIn');
		modal.classList.add('fadeOut');
		mStatus = false;
	}
    
})();
