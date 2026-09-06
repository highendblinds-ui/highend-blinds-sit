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

		function fitHeight() {
			var img = slides[i] && slides[i].querySelector('img');
			if (!img) return;
			function apply() {
				if (img.naturalWidth && img.naturalHeight) {
					root.style.height = (root.offsetWidth * img.naturalHeight / img.naturalWidth) + 'px';
				}
			}
			if (img.complete) { apply(); } else { img.addEventListener('load', apply, { once: true }); }
		}
		function render() {
			track.style.transform = 'translateX(-' + (i * 100) + '%)';
			dots.forEach(function (dot, idx) { dot.classList.toggle('active', idx === i); });
			fitHeight();
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
		window.addEventListener('resize', fitHeight);

		render();
		if (slides.length > 1) start();
	}

	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('[data-hb-carousel]').forEach(initCarousel);
	});
})();
