(function() {
	
	const mOpen = document.querySelector('.article-header__share-link');
		
	// всплывающее окно
    const modal = document.querySelector('.share-social');
    const body = document.querySelector('body');
    
	// флаг всплывающего окна: false - окно закрыто, true - открыто
	let	mStatus = false;
	
	if  (mOpen) {
		
		mOpen.addEventListener('click', function(e) {
			modalShow(modal);

			// copy to clipboard

			modal.querySelector('#clip-copy').addEventListener('click', function() {
		        var ta = modal.querySelector('.share-social__form-input');
		        ta.innerHTML = "Test2";
		        ta.focus();
		        ta.select();
		    });

		    const mClose = modal.querySelector('.share-social__close');
            
		    mClose.addEventListener('click', modalClose);

			document.addEventListener('click', function (e) {
				var target = e.target;
				var its_popup = target == modal || modal.contains(target);
				var its_button = target == mOpen;

		        if (!its_popup && !its_button) {
		        	modal.classList.remove('fadeIn');
					modal.classList.add('fadeOut');
				}
		    });

		    document.addEventListener('keydown', function (event) {
		    	if (mStatus && ( event.type != 'keydown' || event.keyCode === 27)) {
		    		modalClose();
		    	}
		    });

		});
	}

	// регистрируются обработчик события нажатия на клавишу

	function modalShow(modal) {
		// убираем и добавляем классы, соответствующие  анимации
		
		modal.classList.remove('fadeOut');
		modal.classList.add('fadeIn');
		body.classList.add('lock-share');
		
		// выставляем флаг, обозначающий, что всплывающее окно открыто
		mStatus = true;
	}

	function modalClose() {
		// удаляем класс анимации открытия окна и добавляем класс анимации закрытия
		
		modal.classList.remove('fadeIn');
		modal.classList.add('fadeOut');
		body.classList.remove('lock-share');
		
		// сбрасываем флаг, устанавливая его значение в 'false'
		
		mStatus = false;
	}

})();
