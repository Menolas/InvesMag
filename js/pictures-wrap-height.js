// пересчитываем высоту изображений

jQuery(document).ready(function ($) {

	$('.article-mini__image-wrap').each(function() {

		$elementWidth = $(this).width();

		if ($(window).width() < 783) {
		    $height = Math.round($elementWidth / 1.6);
		} else {
			$height = Math.round($elementWidth / 1.5);
		}
		$(this).height($height);
	});
});
