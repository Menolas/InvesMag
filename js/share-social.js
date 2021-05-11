'use strict';
(function () {

	var shareButton = document.querySelector('.article-header__share-link');
    var sharePopup = document.querySelector('.share-social');
    var text = document.querySelector('.share-social__form-input');
    var copyBtn = document.querySelector('.share-social__form-wrap button');

    function unfade(element) {
	    var op = 0.1;  // initial opacity
	    element.style.display = 'block';
	    var timer = setInterval(function () {
	        if (op >= 1){
	            clearInterval(timer);
	        }
	        element.style.opacity = op;
	        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
	        op += op * 0.1;
	    }, 10);
	}

    function fade(element) {
	    var op = 1;  // initial opacity
	    var timer = setInterval(function () {
	        if (op <= 0.1){
	            clearInterval(timer);
	            element.style.display = 'none';
	        }
	        element.style.opacity = op;
	        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
	        op -= op * 0.1;
	    }, 50);
	}

    if (shareButton) {

    	shareButton.addEventListener('click', function (e) {
    		e.stopPropagation();
    		unfade(sharePopup);
    		sharePopup.classList.add('share-social--shown');

    		copyBtn.onclick = function() {
			  text.select();    
			  document.execCommand("copy");
			}
    	});

    	document.addEventListener('click', function (e) {
			var target = e.target;
			var its_popup = target == sharePopup || sharePopup.contains(target);
			var its_button = target == shareButton;
	        var sharePopup_is_active = sharePopup.classList.contains('share-social--shown');

	        if (!its_popup && !its_button && sharePopup_is_active) {
	        	fade(sharePopup);
			    sharePopup.classList.remove('share-social--shown');
			}
	    });



    }


})();
