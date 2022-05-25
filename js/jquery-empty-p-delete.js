jQuery(document).ready(function ($) {	
	// чистка от пустых тегов p

	$('p').filter(function(){
	   return this.innerHTML == '&nbsp;';
	}).remove();
});
