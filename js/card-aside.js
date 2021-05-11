'use strict';
(function () {

	var cardLinks = document.querySelectorAll('.card-article-link');
	var linksContainer = document.querySelector('.card-aside');

	 if (linksContainer) {
   
		var linkTemplate = document.querySelector('template').content.querySelector('.aside-link');
	   
		var renderLink = function (link) {
		var linkElement = linkTemplate.cloneNode(true);
			linkElement.querySelector('span').textContent = link.querySelector('span').textContent;
			linkElement.querySelector('a').textContent = link.querySelector('h2').textContent;
			linkElement.querySelector('a').href = '#' + link.querySelector('h2').id;
			return linkElement;
		}

		var renderSidebarLinks = function (cardLinks) {
		    var fragment = document.createDocumentFragment();
		    Array.from(cardLinks).forEach(function (el) {
		    	fragment.appendChild(renderLink(el));
		    	console.log(el);
		    });

		    return fragment;
		};
	    
	   
		linksContainer.appendChild(renderSidebarLinks(cardLinks));
	}

})();
