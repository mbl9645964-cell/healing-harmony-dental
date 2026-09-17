/* Salona's Dental Care — theme interactions (vanilla, dependency-free). */
(function () {
	'use strict';

	/* Sticky header state + scroll progress */
	var header = document.querySelector('[data-header]');
	var progress = document.querySelector('[data-progress]');
	var onScroll = function () {
		var y = window.scrollY || window.pageYOffset;
		if (header) { header.classList.toggle('scrolled', y > 12); }
		if (progress) {
			var doch = document.documentElement.scrollHeight - window.innerHeight;
			progress.style.width = (doch > 0 ? (y / doch) * 100 : 0) + '%';
		}
	};
	onScroll();
	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll);

	/* Mobile navigation */
	var toggle = document.querySelector('[data-toggle]');
	var mnav = document.querySelector('[data-mobile-nav]');
	if (toggle && mnav) {
		var setOpen = function (open) {
			mnav.classList.toggle('open', open);
			toggle.setAttribute('aria-expanded', String(open));
			document.body.style.overflow = open ? 'hidden' : '';
		};
		toggle.addEventListener('click', function () { setOpen(!mnav.classList.contains('open')); });
		mnav.addEventListener('click', function (e) { if (e.target.closest('a')) { setOpen(false); } });
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setOpen(false); } });
	}

	/* Scroll reveal + image clip */
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var animated = document.querySelectorAll('.reveal, .clip');
	if (reduce || !('IntersectionObserver' in window)) {
		animated.forEach(function (el) { el.classList.add('in'); });
	} else {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (en) {
				if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
			});
		}, { threshold: 0.08, rootMargin: '0px 0px -24px 0px' });
		animated.forEach(function (el) { io.observe(el); });

		/* Safety net: anything still hidden once the user reaches the bottom of
		   the page (e.g. short final elements the observer margin can't reach)
		   is revealed, so no content is ever left permanently invisible. */
		var revealTail = function () {
			if (window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 2) {
				animated.forEach(function (el) {
					if (!el.classList.contains('in')) { el.classList.add('in'); io.unobserve(el); }
				});
			}
		};
		window.addEventListener('scroll', revealTail, { passive: true });
		window.addEventListener('load', revealTail);
	}

	/* Hero image slideshow — crossfade through the slides */
	var heroWrap = document.querySelector('[data-hero-slides]');
	if (heroWrap) {
		var hSlides = heroWrap.querySelectorAll('.hero__slide');
		var hDots   = document.querySelectorAll('[data-hero-dots] .hero__dot');
		if (hSlides.length > 1 && !reduce) {
			var hi = 0;
			setInterval(function () {
				hSlides[hi].classList.remove('is-active');
				if (hDots[hi]) { hDots[hi].classList.remove('is-active'); }
				hi = (hi + 1) % hSlides.length;
				hSlides[hi].classList.add('is-active');
				if (hDots[hi]) { hDots[hi].classList.add('is-active'); }
			}, 4800);
		}
	}

	/* Back-to-top button */
	var toTop = document.querySelector('[data-totop]');
	if (toTop) {
		var toggleTop = function () { toTop.classList.toggle('show', window.scrollY > 500); };
		toggleTop();
		window.addEventListener('scroll', toggleTop, { passive: true });
		toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' }); });
	}

	/* Floating WhatsApp dock — expand to reveal Book / Chat options */
	var wadock = document.querySelector('[data-wadock]');
	if (wadock) {
		var wadockBtn = wadock.querySelector('[data-wadock-toggle]');
		var wadockMenu = wadock.querySelector('[data-wadock-menu]');
		var setDock = function (open) {
			wadock.toggleAttribute('data-open', open);
			if (wadockMenu) { wadockMenu.hidden = !open; }
			if (wadockBtn) { wadockBtn.setAttribute('aria-expanded', String(open)); }
		};
		if (wadockBtn) {
			wadockBtn.addEventListener('click', function (e) {
				e.stopPropagation();
				setDock(!wadock.hasAttribute('data-open'));
			});
		}
		document.addEventListener('click', function (e) {
			if (!wadock.contains(e.target)) { setDock(false); }
		});
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { setDock(false); } });
	}

	/* FAQ accordion */
	document.querySelectorAll('.faq__q').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var item = btn.closest('.faq__item');
			var panel = item.querySelector('.faq__a');
			var open = item.classList.toggle('open');
			btn.setAttribute('aria-expanded', String(open));
			panel.style.maxHeight = open ? panel.scrollHeight + 'px' : '0px';
		});
	});
	window.addEventListener('resize', function () {
		document.querySelectorAll('.faq__item.open .faq__a').forEach(function (p) { p.style.maxHeight = p.scrollHeight + 'px'; });
	});

	/* Appointment form — AJAX with WhatsApp fallback */
	document.querySelectorAll('form[data-appointment]').forEach(function (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			if (form.querySelector('.hp') && form.querySelector('.hp').value) { return; }
			if (!form.checkValidity()) { form.reportValidity(); return; }
			var msg = form.querySelector('.form__msg');
			var btn = form.querySelector('button[type="submit"]');
			var data = new FormData(form);
			data.append('action', 'salonas_appointment');
			if (window.SalonasData) { data.append('nonce', SalonasData.nonce); }

			if (btn) { btn.disabled = true; }
			var done = function (text, ok, wa) {
				if (msg) { msg.textContent = text; msg.className = 'form__msg ' + (ok ? 'ok' : 'err'); }
				if (btn) { btn.disabled = false; }
				if (ok) {
					form.reset();
					if (wa) { window.open(wa, '_blank', 'noopener'); }
				}
			};

			if (!window.SalonasData || !window.fetch) {
				done('Thank you. Please call or WhatsApp us to confirm.', true, '');
				return;
			}
			fetch(SalonasData.ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' })
				.then(function (r) { return r.json(); })
				.then(function (res) {
					if (res && res.success) { done(res.data.message, true, res.data.wa || ''); }
					else { done((res && res.data && res.data.message) || 'Please add your name and phone number.', false, ''); }
				})
				.catch(function () { done('Something went wrong. Please call or WhatsApp us instead.', false, ''); });
		});
	});
})();
