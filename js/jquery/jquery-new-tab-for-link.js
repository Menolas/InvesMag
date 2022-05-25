jQuery(function($) {
	$(document).ready(function() {

        $('a:not([href*="investmag.pro"])').not('[href^=#]').not('[href^="/"]')
            .addClass("external")
            .attr({ target: "_blank"})
            .attr({rel: "nofollow"});
    });
});
