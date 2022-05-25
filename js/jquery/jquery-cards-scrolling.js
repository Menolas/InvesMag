jQuery(document).ready(function ($) {

	const linksContainer = $('.card-aside');

	if (linksContainer.length) {
	    const linksContainerHeight = linksContainer.height();
		const offset = linksContainer.offset();
		const coordTop = Math.round(offset.top);
		const coordLeft = Math.round(offset.left);
		const campaignsOffset = $('.campaigns').offset();
		const wayDown = campaignsOffset.top - linksContainerHeight;

		document.addEventListener('wheel', function (evt) {

		    if (evt.deltaY > 0 && pageYOffset > 160 && pageYOffset < wayDown) {
		    	let newOffset = linksContainer.offset();
		    	
		    	if (newOffset.top < wayDown) {

			    	linksContainer.addClass('sticky');
			    	linksContainer.css({
					    'left': coordLeft
					});
			    } else {
			    	if (linksContainer.hasClass('sticky')) {
			    		linksContainer.removeClass('sticky');
			    	}
			    }
			} else {
				if (linksContainer.hasClass('sticky')) {
				linksContainer.removeClass('sticky');
			    }
			}
		});
	}
});
