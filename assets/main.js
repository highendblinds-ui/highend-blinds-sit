/* HighEnd Blinds — mobile nav toggle */
(function () {
	document.addEventListener('DOMContentLoaded', function () {
		var burger = document.querySelector('.hb-burger');
		var header = document.querySelector('.hb-header');
		if (burger && header) {
			burger.addEventListener('click', function () {
				var open = header.classList.toggle('hb-nav-open');
				burger.setAttribute('aria-expanded', open ? 'true' : 'false');
				burger.setAttribute('aria-label', open ? 'Close menu' : 'Menu');
				document.body.classList.toggle('hb-menu-open', open);
				var products = header.querySelector('.hb-nav-dd');
				if (products) products.open = open;
			});
			header.querySelectorAll('.hb-nav a').forEach(function (link) {
				link.addEventListener('click', function () {
					header.classList.remove('hb-nav-open');
					burger.setAttribute('aria-expanded', 'false');
					burger.setAttribute('aria-label', 'Menu');
					document.body.classList.remove('hb-menu-open');
				});
			});
		}
	});
})();

/* HighEnd Blinds — accessible back-to-top control for long pages */
(function () {
	document.addEventListener('DOMContentLoaded', function () {
		var button = document.querySelector('.hb-back-to-top');
		if (!button) return;

		function updateVisibility() {
			button.classList.toggle('is-visible', window.scrollY > 500);
		}

		button.addEventListener('click', function () {
			var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
			window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
		});
		window.addEventListener('scroll', updateVisibility, { passive: true });
		updateVisibility();
	});
})();

/* HighEnd Blinds — hero carousel */
(function () {
	function initCarousel(root) {
		var track = root.querySelector('.hb-track');
		var slides = root.querySelectorAll('.hb-slide');
		var dotsWrap = root.querySelector('.hb-dots');
		var prev = root.querySelector('.hb-car-prev');
		var next = root.querySelector('.hb-car-next');
		if (!track || slides.length === 0) return;

		var i = 0, timer = null, DELAY = 4500;

		// build dots
		var dots = [];
		if (dotsWrap) {
			for (var d = 0; d < slides.length; d++) {
				var b = document.createElement('button');
				b.type = 'button';
				b.setAttribute('aria-label', 'Go to slide ' + (d + 1));
				(function (idx) { b.addEventListener('click', function () { go(idx); }); })(d);
				dotsWrap.appendChild(b);
				dots.push(b);
			}
		}

		function render() {
			track.style.transform = 'translateX(-' + (i * 100) + '%)';
			dots.forEach(function (dot, idx) { dot.classList.toggle('active', idx === i); });
		}
		function go(n) {
			i = (n + slides.length) % slides.length;
			render();
			restart();
		}
		function start() {
			stop();
			timer = setTimeout(function () { go(i + 1); }, DELAY);
		}
		function stop() { if (timer) { clearTimeout(timer); timer = null; } }
		function restart() { stop(); start(); }

		if (prev) prev.addEventListener('click', function () { go(i - 1); });
		if (next) next.addEventListener('click', function () { go(i + 1); });
		root.addEventListener('mouseenter', stop);
		root.addEventListener('mouseleave', start);

		render();
		if (slides.length > 1) start();
	}

	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('[data-hb-carousel]').forEach(initCarousel);
	});
})();

/* HighEnd Blinds — reviews strip: auto-scroll + native drag/swipe */
(function () {
	document.addEventListener('DOMContentLoaded', function () {
		var viewport = document.querySelector('.hb-reviews-viewport');
		var track = document.querySelector('.hb-reviews-track');
		if (!viewport || !track) return;

		var isInteracting = false;
		var resumeTimer = null;

		function halfWidth() { return track.scrollWidth / 2; }

		function normalizeScroll() {
			var hw = halfWidth();
			if (hw <= 0) return;
			if (viewport.scrollLeft >= hw) viewport.scrollLeft -= hw;
			else if (viewport.scrollLeft < 0) viewport.scrollLeft += hw;
		}
		viewport.addEventListener('scroll', normalizeScroll, { passive: true });

		function pause() {
			isInteracting = true;
			if (resumeTimer) { clearTimeout(resumeTimer); resumeTimer = null; }
		}
		function resumeSoon(delay) {
			if (resumeTimer) clearTimeout(resumeTimer);
			resumeTimer = setTimeout(function () { isInteracting = false; }, delay);
		}

		viewport.addEventListener('mouseenter', pause);
		viewport.addEventListener('mouseleave', function () { resumeSoon(0); });
		viewport.addEventListener('touchstart', pause, { passive: true });
		viewport.addEventListener('touchend', function () { resumeSoon(2000); }, { passive: true });

		// Mouse drag-to-scroll (touch already scrolls natively via overflow-x:auto)
		var isDragging = false, dragStartX = 0, dragStartScroll = 0;
		viewport.addEventListener('mousedown', function (e) {
			isDragging = true;
			viewport.classList.add('hb-dragging');
			dragStartX = e.clientX;
			dragStartScroll = viewport.scrollLeft;
			pause();
		});
		window.addEventListener('mousemove', function (e) {
			if (!isDragging) return;
			viewport.scrollLeft = dragStartScroll - (e.clientX - dragStartX);
		});
		window.addEventListener('mouseup', function () {
			if (!isDragging) return;
			isDragging = false;
			viewport.classList.remove('hb-dragging');
			resumeSoon(0);
		});

		var lastTime = null;
		var speed = 0;
		function computeSpeed() { speed = halfWidth() / 30; }
		computeSpeed();
		window.addEventListener('resize', computeSpeed);

		function tick(now) {
			if (lastTime === null) lastTime = now;
			var dt = (now - lastTime) / 1000;
			lastTime = now;
			if (!isInteracting && !isDragging) {
				viewport.scrollLeft += speed * dt;
				normalizeScroll();
			}
			requestAnimationFrame(tick);
		}
		requestAnimationFrame(tick);
	});
})();
