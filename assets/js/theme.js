/* Healing Harmony Dental — interactions */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		/* ---- Sticky header shadow ---- */
		var header = document.querySelector('[data-header]');
		if (header) {
			var onScroll = function () {
				header.classList.toggle('is-stuck', window.scrollY > 8);
			};
			onScroll();
			window.addEventListener('scroll', onScroll, { passive: true });
		}

		/* ---- Mobile nav ---- */
		var toggle = document.querySelector('[data-nav-toggle]');
		if (toggle) {
			toggle.addEventListener('click', function () {
				var open = document.body.classList.toggle('nav-open');
				toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			});
			document.querySelectorAll('.site-nav a').forEach(function (a) {
				a.addEventListener('click', function () {
					document.body.classList.remove('nav-open');
					toggle.setAttribute('aria-expanded', 'false');
				});
			});
		}

		/* ---- Hero background slideshow ---- */
		var box = document.querySelector('[data-slideshow]');
		if (box) {
			var slides = Array.prototype.slice.call(box.querySelectorAll('.hero__slide'));
			var dotsWrap = document.querySelector('[data-slideshow-dots]');
			var i = 0, timer = null, DELAY = 5200;

			if (slides.length > 1) {
				var dots = [];
				if (dotsWrap) {
					slides.forEach(function (_, idx) {
						var b = document.createElement('button');
						b.type = 'button';
						b.setAttribute('aria-label', 'Slide ' + (idx + 1));
						if (idx === 0) b.classList.add('is-active');
						b.addEventListener('click', function () { go(idx); reset(); });
						dotsWrap.appendChild(b);
						dots.push(b);
					});
				}

				var go = function (n) {
					slides[i].classList.remove('is-active');
					if (dots[i]) dots[i].classList.remove('is-active');
					i = (n + slides.length) % slides.length;
					slides[i].classList.add('is-active');
					if (dots[i]) dots[i].classList.add('is-active');
				};
				var next = function () { go(i + 1); };
				var start = function () { timer = setInterval(next, DELAY); };
				var reset = function () { clearInterval(timer); start(); };

				var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
				if (!reduce) start();

				document.addEventListener('visibilitychange', function () {
					if (document.hidden) { clearInterval(timer); }
					else if (!reduce) { start(); }
				});
			}
		}

		/* ---- Reveal on scroll ---- */
		var reveals = document.querySelectorAll('[data-reveal]');
		if ('IntersectionObserver' in window && reveals.length) {
			var io = new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					if (e.isIntersecting) {
						e.target.classList.add('is-in');
						io.unobserve(e.target);
					}
				});
			}, { threshold: 0.14, rootMargin: '0px 0px -8% 0px' });
			reveals.forEach(function (el) { io.observe(el); });
		} else {
			reveals.forEach(function (el) { el.classList.add('is-in'); });
		}

		/* ---- Count-up stats ---- */
		var nums = document.querySelectorAll('[data-count]');
		if ('IntersectionObserver' in window && nums.length) {
			var co = new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					if (!e.isIntersecting) return;
					var el = e.target;
					co.unobserve(el);
					var target = parseFloat(el.getAttribute('data-count'));
					var suffix = el.getAttribute('data-suffix') || '';
					var decimals = (String(target).indexOf('.') > -1) ? 1 : 0;
					var dur = 1400, t0 = null;
					var step = function (ts) {
						if (!t0) t0 = ts;
						var p = Math.min((ts - t0) / dur, 1);
						var eased = 1 - Math.pow(1 - p, 3);
						el.textContent = (target * eased).toFixed(decimals) + suffix;
						if (p < 1) requestAnimationFrame(step);
						else el.textContent = target.toFixed(decimals) + suffix;
					};
					requestAnimationFrame(step);
				});
			}, { threshold: 0.5 });
			nums.forEach(function (el) { co.observe(el); });
		}

	});
})();
