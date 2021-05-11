// подгрузка новостей категории "Акции"

jQuery(document).ready(function ($) {
	var $container = $('.campaigns__list');
	
	function removeClassActive () {
		$('.campaigns__paginator li').each(function (index, value) {
			if ($('.campaigns__paginator li').hasClass('paginator__page--active')) {
				$('.campaigns__paginator li').removeClass('paginator__page--active');
			}

		});
	}

	$('.campaigns__paginator li').click(function(){
		removeClassActive ();
		$(this).addClass('paginator__page--active'); // изменяем цвет кнопки
		var currentPage = $(this).attr('data');

		ajaxLoadStocks(currentPage);
	});

	function ajaxLoadStocks(currentPage) {
		$container.animate({opacity: 0.5}, 300);

		jQuery.post(
			myPlugin.ajaxurl,
			{
				action: 'loadmore_stocks',
				page: currentPage,
				
			},

			function (response) {
				$('.campaigns__item').remove();
				$container
				    .html(response)
				    .animate({opacity: 1}, 300);
			});
	}
	
});
