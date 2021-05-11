jQuery(function($){

	if (screen.width < 768) {
		$('.opinions__list').slick({
			infinite: true,
			autoplaySpeed: 2000,
			arrows: false,
			dots: true
		});
	}

	if ($('.opinions-sidebar__list')) {
		$('.opinions-sidebar__list').slick({
			infinite: true,
			autoplaySpeed: 2000,
			arrows: false,
			dots: true
		});
	}
});
