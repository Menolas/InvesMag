'use strict';

(function() {
	
	const mOpen = document.querySelector('.article-header__share-link');
		
	// всплывающее окно
    const modal = document.querySelector('.share-social');
		  
	// флаг всплывающего окна: false - окно закрыто, true - открыто
	let	mStatus = false;
	
	mOpen.addEventListener('click', function(e) {
		modalShow(modal);

		document.addEventListener('click', function (e) {
			var target = e.target;
			var its_popup = target == modal || modal.contains(target);
			var its_button = target == mOpen;

	        if (!its_popup && !its_button) {
	        	modal.classList.remove('fadeIn');
				modal.classList.add('fadeOut');
			}
	    });

	    document.addEventListener('keydown', modalClose);

	});

	// регистрируются обработчик события нажатия на клавишу

	function modalShow(modal) {
		// убираем и добавляем классы, соответствующие  анимации
		
		modal.classList.remove('fadeOut');
		modal.classList.add('fadeIn');
		
		// выставляем флаг, обозначающий, что всплывающее окно открыто
		mStatus = true;
	}

	function modalClose(event) {
		if (mStatus && ( event.type != 'keydown' || event.keyCode === 27 ) ) {
			
			// удаляем класс анимации открытия окна и добавляем класс анимации закрытия
			
			modal.classList.remove('fadeIn');
			modal.classList.add('fadeOut');
			
			// сбрасываем флаг, устанавливая его значение в 'false'
			
			mStatus = false;
		}
	}

})();
