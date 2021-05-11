'use strict';
(function () {

	var menuItems = document.querySelectorAll('.main-navigation li a');
	var tagsContainer = document.querySelector('.tags-menu');

	for (var i = 0; i < menuItems.length; i++) {
	    if (menuItems[i].textContent === 'Темы') {
	 		menuItems[i].classList.add('menu-tags-item');
			var tagsMenuItem = menuItems[i];
	 	}
	}

	if (document.body.clientWidth > 1024) {

		tagsMenuItem.addEventListener('click', function (e) {
		 	e.preventDefault();

		    tagsContainer.classList.toggle('tags-menu--shown');
		});

		document.addEventListener('click', function (e) {
			var target = e.target;
			var its_menu = target == tagsContainer || tagsContainer.contains(target);
			var its_tagsMenuItem = target == tagsMenuItem;
	        var menu_is_active = tagsContainer.classList.contains('tags-menu--shown');

	        if (!its_menu && !its_tagsMenuItem && menu_is_active) {
			    tagsContainer.classList.toggle('tags-menu--shown');
			}
		});
	}
    
})();
