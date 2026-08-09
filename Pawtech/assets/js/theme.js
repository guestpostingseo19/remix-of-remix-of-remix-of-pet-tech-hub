/**
 * PawTech front-end behaviour: colour mode, reveal-on-scroll, mobile nav.
 * No dependencies, no inline event handlers, no third-party requests.
 */
(function () {
	'use strict';

	var STORAGE_KEY = 'pawtech-theme';
	var root = document.documentElement;

	function currentMode() {
		return root.classList.contains('light') ? 'day' : 'night';
	}

	function paint(mode) {
		var isDay = mode === 'day';
		root.classList.toggle('light', isDay);
		root.classList.toggle('dark', !isDay);

		document.querySelectorAll('[data-pawtech-mode-toggle]').forEach(function (btn) {
			btn.setAttribute('aria-checked', isDay ? 'true' : 'false');
			var sun = btn.querySelector('[data-pawtech-sun]');
			var moon = btn.querySelector('[data-pawtech-moon]');
			var on = 'bg-primary text-primary-foreground';
			var off = 'text-muted-foreground group-hover:text-primary';
			if (sun) { sun.className = 'flex h-7 w-7 items-center justify-center rounded-full transition-all duration-300 ' + (isDay ? on : off); }
			if (moon) { moon.className = 'flex h-7 w-7 items-center justify-center rounded-full transition-all duration-300 ' + (isDay ? off : on); }
			var label = btn.querySelector('[data-pawtech-mode-label]');
			if (label) { label.textContent = isDay ? 'Day mode on' : 'Night mode on'; }
		});
	}

	function initMode() {
		paint(currentMode());
		document.querySelectorAll('[data-pawtech-mode-toggle]').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var next = currentMode() === 'day' ? 'night' : 'day';
				paint(next);
				try { localStorage.setItem(STORAGE_KEY, next); } catch (e) { /* storage blocked */ }
			});
		});
	}

	function initReveal() {
		var items = document.querySelectorAll('.pawtech-reveal');
		if (!items.length) { return; }
		if (!('IntersectionObserver' in window)) {
			items.forEach(function (el) { el.classList.add('is-visible'); });
			return;
		}
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					io.unobserve(entry.target);
				}
			});
		}, { threshold: 0.15 });
		items.forEach(function (el) { io.observe(el); });
	}

	function initMobileNav() {
		var toggle = document.querySelector('[data-pawtech-menu-toggle]');
		var nav = document.querySelector('[data-pawtech-mobile-nav]');
		if (!toggle || !nav) { return; }
		toggle.addEventListener('click', function () {
			var open = nav.classList.toggle('hidden') === false;
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
	}

	function boot() {
		initMode();
		initReveal();
		initMobileNav();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	// Re-run reveal after Elementor renders widgets in the editor/front-end.
	window.addEventListener('elementor/frontend/init', function () {
		if (window.elementorFrontend && window.elementorFrontend.hooks) {
			window.elementorFrontend.hooks.addAction('frontend/element_ready/global', function () {
				document.querySelectorAll('.pawtech-reveal').forEach(function (el) { el.classList.add('is-visible'); });
			});
		}
	});
})();
