'use strict';
(function () {
		
	var menu = document.querySelector('.main-navigation');
	var button = document.querySelector('.menu-toggle');
	var body = document.querySelector('body');

	function toggleMenu () {
		button.classList.toggle('menu-toggle--close');
		menu.classList.toggle('active');
		body.classList.toggle('lock');
	}

	button.addEventListener('click', function(e) {
		e.stopPropagation();
		toggleMenu();
	});

	document.addEventListener('click', function (e) {
		var target = e.target;
		var its_menu = target == menu || menu.contains(target);
		var its_hamburger = target == button;
        var menu_is_active = menu.classList.contains('active');

        if (!its_menu && !its_hamburger && menu_is_active) {
		    toggleMenu();
		}
	});
	
})();
