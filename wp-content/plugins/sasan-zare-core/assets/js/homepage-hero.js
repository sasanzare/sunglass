(function () {
	'use strict';
	var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)');
	var activeCard = null;
	var cardBounds = null;
	var pendingFrame = 0;
	var pointerX = 0;
	var pointerY = 0;

	function resetCard() {
		window.cancelAnimationFrame(pendingFrame);
		pendingFrame = 0;
		if (activeCard) {
			['--saz-card-rotate-x', '--saz-card-rotate-y', '--saz-card-light-x', '--saz-card-light-y'].forEach(function (property) {
				activeCard.style.removeProperty(property);
			});
		}
		activeCard = null;
		cardBounds = null;
	}

	function updateCard() {
		pendingFrame = 0;
		if (!activeCard || !cardBounds) {
			return;
		}
		var x = Math.max(0, Math.min(1, (pointerX - cardBounds.left) / cardBounds.width));
		var y = Math.max(0, Math.min(1, (pointerY - cardBounds.top) / cardBounds.height));
		activeCard.style.setProperty('--saz-card-rotate-x', ((0.5 - y) * 12).toFixed(2) + 'deg');
		activeCard.style.setProperty('--saz-card-rotate-y', ((x - 0.5) * 16).toFixed(2) + 'deg');
		activeCard.style.setProperty('--saz-card-light-x', (x * 100).toFixed(1) + '%');
		activeCard.style.setProperty('--saz-card-light-y', (y * 100).toFixed(1) + '%');
	}

	// Delegation also supports cards rendered later in Elementor previews.
	document.addEventListener('pointerover', function (event) {
		var card = event.target.closest('.saz-product-card');
		if (!card || card === activeCard || event.pointerType !== 'mouse' || reducedMotion.matches || !finePointer.matches) {
			return;
		}
		resetCard();
		activeCard = card;
		// Cache the initial bounds so the moving card cannot feed back into its tilt.
		cardBounds = card.getBoundingClientRect();
	});
	document.addEventListener('pointermove', function (event) {
		if (!activeCard || event.pointerType !== 'mouse') {
			return;
		}
		pointerX = event.clientX;
		pointerY = event.clientY;
		if (!pendingFrame) {
			pendingFrame = window.requestAnimationFrame(updateCard);
		}
	});
	document.addEventListener('pointerout', function (event) {
		if (activeCard && !activeCard.contains(event.relatedTarget)) {
			resetCard();
		}
	});
	document.addEventListener('pointercancel', resetCard);
	window.addEventListener('blur', resetCard);
	window.addEventListener('scroll', resetCard, { passive: true });
	window.addEventListener('resize', resetCard);
	reducedMotion.addEventListener('change', resetCard);
	finePointer.addEventListener('change', resetCard);

	// Delegate to support widgets inserted by the Elementor preview renderer.
	document.addEventListener('click', function (event) {
		var trigger = event.target.closest('[data-saz-guide-open]');
		var close = event.target.closest('[data-saz-guide-close]');
		var dialog;
		if (trigger) {
			dialog = document.getElementById(trigger.dataset.sazGuideOpen);
			if (dialog && typeof dialog.showModal === 'function') {
				event.preventDefault();
				dialog.showModal();
			}
		} else if (close) {
			close.closest('dialog').close();
		} else if (event.target.matches('.saz-frame-guide')) {
			var bounds = event.target.getBoundingClientRect();
			if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) {
				event.target.close();
			}
		}
	});
}());
