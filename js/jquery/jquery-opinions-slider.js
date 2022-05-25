jQuery(document).ready(function ($) {
	let width = screen.width;

	if (width < 768) {
        $('.opinions__list').slick({
            infinite: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true
        });
    }
});
