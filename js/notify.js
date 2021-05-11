'use strict';
(function () {

	var notifyButton = document.querySelector('.site-header__notification');
	var notifyPopup = document.querySelector('#notify');
	var stopNotifyPopup = document.querySelector('#stop-notify');
	
	function notifyMe () {
		var notification = new Notification ("Все еще работаешь?", {
			tag : "ache-mail",
			body : "Пора сделать паузу и отдохнуть",
			icon : "http://dev.investmag.pro/wp-content/uploads/2021/04/lisa_prikolnyj_vysunutyj_yazyk_114519_3840x2160-scaled.jpg"
		});
	}
	
	function notifSet () {
		if (!("Notification" in window))
			alert ("Ваш браузер не поддерживает уведомления.");
		else if (Notification.permission === "granted")
			setTimeout(notifyMe, 2000);
		else if (Notification.permission !== "denied") {
			Notification.requestPermission (function (permission) {
				if (!('permission' in Notification))
					Notification.permission = permission;
				if (permission === "granted")
					setTimeout(notifyMe, 2000);
			});
		}
	}

	function stopShowNotifyPopup () {
		notifyPopup.classList.remove('notify-popup--shown');
	}

	function stopShowStopNotifyPopup () {
		stopNotifyPopup.classList.remove('notify-popup--shown');
	}

	function showNotify () {
		notifyPopup.classList.add('notify-popup--shown');
		setTimeout(stopShowNotifyPopup, 2000);
	}

	function stopNotify () {
		stopNotifyPopup.classList.add('notify-popup--shown');
		setTimeout(stopShowStopNotifyPopup, 2000);
	}

	notifyButton.addEventListener('click', function () {

		if (!notifyButton.classList.contains('site-header__notification--green')) {

			notifyButton.classList.add('site-header__notification--green');
			showNotify();

		} else {

			notifyButton.classList.remove('site-header__notification--green');
			stopNotify();
		}
	});

})();
