(function () {
	'use strict';

	function initializeMobileMenu() {
		var openButton = document.querySelector('[data-saz-menu-open]');
		var dialogId = openButton ? openButton.getAttribute('aria-controls') : '';
		var dialog = dialogId ? document.getElementById(dialogId) : null;
		var closeButton;

		if (!openButton || !dialog || typeof dialog.showModal !== 'function') {
			return;
		}

		closeButton = dialog.querySelector('[data-saz-menu-close]');

		openButton.addEventListener('click', function () {
			dialog.showModal();
			openButton.setAttribute('aria-expanded', 'true');
			if (closeButton) {
				closeButton.focus();
			}
		});

		if (closeButton) {
			closeButton.addEventListener('click', function () {
				dialog.close();
			});
		}

		dialog.addEventListener('click', function (event) {
			if (event.target === dialog) {
				dialog.close();
			}
		});

		dialog.addEventListener('close', function () {
			openButton.setAttribute('aria-expanded', 'false');
			openButton.focus();
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initializeMobileMenu);
	} else {
		initializeMobileMenu();
	}
}());
