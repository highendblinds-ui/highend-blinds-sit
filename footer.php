</main>

<footer class="hb-footer">
	<div class="hb-wrap">
		<div class="cols">
			<div class="brand">
				<?php highend_logo( 48 ); ?>
				<p>Custom blinds, curtains, and motorized window coverings made in Edmonton with quality, care, and precision.</p>
				<div class="social">
					<a href="https://www.instagram.com/highendblinds?igsi=YWpweHR2bTMyMHoy&utm_source=qr" target="_blank" rel="noopener" aria-label="Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"></circle></svg></a>
					<a href="https://share.google/DpDn1awWkUwqHFZyt" target="_blank" rel="noopener" aria-label="Google"><svg width="15" height="15" viewBox="0 0 24 24"><path fill="#4285F4" d="M23 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.2a5.3 5.3 0 0 1-2.3 3.5v2.9h3.7c2.2-2 3.4-5 3.4-8.6z"></path><path fill="#34A853" d="M12 24c3.1 0 5.7-1 7.6-2.8l-3.7-2.9c-1 .7-2.3 1.1-3.9 1.1-3 0-5.5-2-6.4-4.7H1.8v3C3.7 21.4 7.5 24 12 24z"></path><path fill="#FBBC05" d="M5.6 14.7a7.2 7.2 0 0 1 0-4.6v-3H1.8a12 12 0 0 0 0 10.6z"></path><path fill="#EA4335" d="M12 4.8c1.7 0 3.2.6 4.4 1.7l3.3-3.3C17.7 1.2 15.1 0 12 0 7.5 0 3.7 2.6 1.8 6.4l3.8 3c.9-2.7 3.4-4.6 6.4-4.6z"></path></svg></a>
				</div>
			</div>
			<div>
				<h4>Quick Links</h4>
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'links', 'depth' => 1 ) );
				} else {
					echo '<div class="links">';
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">Home</a>';
					echo '<a href="' . esc_url( home_url( '/about-us/' ) ) . '">About Us</a>';
					echo '<a href="' . esc_url( home_url( '/#reviews' ) ) . '">Reviews</a>';
					$blog = get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/#blog' );
					echo '<a href="' . esc_url( $blog ) . '">Blog</a>';
					echo '<a href="' . esc_url( home_url( '/#gallery' ) ) . '">Gallery</a>';
					echo '<a href="' . esc_url( home_url( '/service-areas/' ) ) . '">Service Areas</a>';
					echo '<a href="' . esc_url( home_url( '/contact-us/' ) ) . '">Contact</a>';
					echo '</div>';
				}
				?>
			</div>
			<div>
				<h4>Products</h4>
				<div class="links">
					<a href="<?php echo esc_url( home_url( '/zebra-blinds/' ) ); ?>">Zebra Blinds</a>
					<a href="<?php echo esc_url( home_url( '/roller-blinds/' ) ); ?>">Roller Blinds</a>
					<a href="<?php echo esc_url( home_url( '/motorized-blinds/' ) ); ?>">Motorized Blinds</a>
					<a href="<?php echo esc_url( home_url( '/curtains/' ) ); ?>">Curtains</a>
					<a href="<?php echo esc_url( home_url( '/motorized-curtains/' ) ); ?>">Motorized Curtains</a>
				</div>
			</div>
			<div>
				<h4>Contact</h4>
				<div class="cinfo">
					3261 Parsons Rd NW<br>Edmonton, AB T6N 1B4<br>
					<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>"><?php echo esc_html( HIGHEND_PHONE ); ?></a><br>
					<a href="mailto:<?php echo esc_attr( HIGHEND_EMAIL ); ?>"><?php echo esc_html( HIGHEND_EMAIL ); ?></a>
				</div>
				<a class="btn btn--primary btn--sm" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Free Estimate <?php highend_arrow(); ?></a>
			</div>
		</div>
		<div class="bottom">
			<div>&copy; <?php echo esc_html( date( 'Y' ) ); ?> HighEnd Blinds Inc. All Rights Reserved.</div>
			<div style="display:flex;gap:20px">
				<a href="<?php echo esc_url( home_url( '/warranty/' ) ); ?>">Warranty</a>
				<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>
				<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>">Terms of Service</a>
			</div>
		</div>
	</div>
</footer>

<div class="hb-mobile-cta-bar">
	<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>" class="call"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"><path d="M5 3h4l2 5-3 2a12 12 0 0 0 6 6l2-3 5 2v4a2 2 0 0 1-2 2A18 18 0 0 1 3 5a2 2 0 0 1 2-2z"></path></svg><?php echo esc_html( HIGHEND_PHONE ); ?></a>
	<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="est">Free Estimate</a>
</div>
<button type="button" class="hb-back-to-top" aria-label="Back to top" title="Back to top">
	<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 14 6-6 6 6"></path></svg>
</button>
<a href="https://wa.me/17802199999" target="_blank" rel="noopener" aria-label="Chat on WhatsApp" class="hb-whatsapp">
	<svg width="30" height="30" viewBox="0 0 24 24" fill="#fff"><path d="M17.5 14.4c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.1-.2.3-.7.9-.9 1-.2.2-.4.2-.7.1-.9-.4-1.9-1-2.7-1.9-.7-.8-1.2-1.6-1.5-2.2-.1-.2 0-.4.1-.6.2-.2.4-.5.6-.7.2-.2.2-.4.1-.6-.1-.2-.6-1.5-.8-2-.2-.5-.4-.4-.6-.4h-.6c-.2 0-.5.1-.8.4-.3.3-1.1 1.1-1.1 2.6 0 1.6 1.1 3.1 1.3 3.3.2.2 2.2 3.4 5.4 4.6 2.7 1 3.2.8 3.8.7.6-.1 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.2-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.9.5 3.7 1.5 5.3L2 22l4.9-1.3c1.5.8 3.3 1.3 5.1 1.3 5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18.3c-1.6 0-3.1-.4-4.4-1.2l-.3-.2-3.2.8.9-3.1-.2-.3C4 15 3.6 13.5 3.6 12 3.6 7.4 7.4 3.6 12 3.6S20.4 7.4 20.4 12 16.6 20.3 12 20.3z"></path></svg>
</a>

<!-- FREE ESTIMATE POPUP (shared) -->
<div id="hb-estimate-modal" class="hb-estimate-modal" onclick="if(event.target===this){hbCloseEstimate();}">
	<div class="hb-estimate-box">
		<button type="button" class="hb-estimate-close" onclick="hbCloseEstimate()" aria-label="Close">&times;</button>
		<h2>Get Your Free Estimate Today</h2>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="highend_estimate">
			<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">
			<?php wp_nonce_field( 'highend_estimate', 'highend_nonce' ); ?>
			<div class="hb-estimate-row">
				<input type="text" name="fullname" aria-label="Full name" placeholder="Full Name" required>
				<input type="tel" name="phone" aria-label="Phone number" placeholder="Phone Number">
			</div>
			<div class="hb-estimate-row">
				<input type="email" name="email" aria-label="Email address" placeholder="Email Address" required>
				<select name="interest" aria-label="Product interest">
					<option>I'm interested in...</option>
					<option>Zebra Blinds</option>
					<option>Roller Blinds</option>
					<option>Motorized Blinds</option>
					<option>Dream Curtains</option>
					<option>Motorized Curtains</option>
				</select>
			</div>
			<textarea name="message" aria-label="Message" placeholder="Message" rows="3"></textarea>
			<button type="submit" class="hb-estimate-submit">Submit</button>
		</form>
		<p class="hb-estimate-privacy">We respect your privacy. Your details are only used to prepare your estimate.</p>
	</div>
</div>

<style>
.hb-estimate-modal{display:none;position:fixed;inset:0;background:rgba(21,21,21,.6);z-index:9999;align-items:center;justify-content:center;padding:20px}
.hb-estimate-modal.open{display:flex}
.hb-estimate-box{position:relative;background:#FAF8F3;border:1px solid #E8DFD0;border-radius:18px;padding:32px;max-width:520px;width:100%;max-height:90vh;overflow-y:auto}
.hb-estimate-box h2{font-family:'Playfair Display',Georgia,serif;font-size:1.4rem;margin:0 0 20px;color:#151515}
.hb-estimate-close{position:absolute;top:14px;right:16px;background:none;border:none;font-size:28px;line-height:1;cursor:pointer;color:#151515}
.hb-estimate-row{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:14px;margin-bottom:14px}
.hb-estimate-box input,.hb-estimate-box select,.hb-estimate-box textarea{width:100%;min-width:0;border:1px solid #E8DFD0;border-radius:12px;padding:0 14px;font-size:14px;background:#fff;outline:none;font-family:inherit}
.hb-estimate-box input,.hb-estimate-box select{height:48px}
.hb-estimate-box textarea{padding:12px 14px;resize:vertical;margin-bottom:16px}
.hb-estimate-submit{width:100%;display:inline-flex;align-items:center;justify-content:center;background:#C9973E;color:#fff;font-weight:700;font-size:15px;padding:14px;border:none;border-radius:12px;cursor:pointer}
.hb-estimate-privacy{font-size:11.5px;color:#9a9384;margin:12px 0 0;text-align:center}
@media (max-width:480px){.hb-estimate-row{grid-template-columns:1fr}}
</style>

<script>
function hbOpenEstimate(){
	document.getElementById('hb-estimate-modal').classList.add('open');
	document.body.style.overflow = 'hidden';
}
function hbCloseEstimate(){
	document.getElementById('hb-estimate-modal').classList.remove('open');
	document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e){
	if(e.key === 'Escape'){
		var modal = document.getElementById('hb-estimate-modal');
		if(modal && modal.classList.contains('open')) hbCloseEstimate();
	}
});
</script>

<!-- GALLERY LIGHTBOX (shared, powers homepage preview + full gallery page) -->
<?php $hb_gallery_images = function_exists( 'highend_gallery_images' ) ? highend_gallery_images() : array(); ?>
<?php if ( ! empty( $hb_gallery_images ) ) : ?>
<div id="hb-gallery-modal" class="hb-gallery-modal" onclick="if(event.target===this){hbCloseGallery();}">
	<button type="button" class="hb-gm-close" onclick="hbCloseGallery()" aria-label="Close gallery">&times;</button>
	<button type="button" class="hb-gm-arrow hb-gm-prev" onclick="event.stopPropagation();hbGalleryNav(-1)" aria-label="Previous photo">&#10094;</button>
	<img id="hb-gm-img" src="" alt="HighEnd Blinds gallery photo">
	<button type="button" class="hb-gm-arrow hb-gm-next" onclick="event.stopPropagation();hbGalleryNav(1)" aria-label="Next photo">&#10095;</button>
	<div class="hb-gm-count" id="hb-gm-count"></div>
</div>

<style>
.hb-gallery-cell,.hb-gallery-trigger{cursor:pointer;transition:opacity .2s ease}
.hb-gallery-cell:hover,.hb-gallery-trigger:hover{opacity:.85}
.hb-gallery-modal{display:none;position:fixed;inset:0;background:var(--bg,#FAF8F3);z-index:9999;align-items:center;justify-content:center}
.hb-gallery-modal.open{display:flex}
.hb-gallery-modal img{width:100vw;height:88vh;object-fit:contain;border-radius:0}
.hb-gm-close{position:absolute;top:20px;right:24px;background:none;border:none;color:var(--ink,#151515);font-size:38px;line-height:1;cursor:pointer;padding:6px}
.hb-gm-arrow{position:absolute;top:50%;transform:translateY(-50%);background:rgba(255,255,255,.85);border:none;color:var(--ink,#151515);font-size:22px;width:48px;height:48px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 14px rgba(0,0,0,.18)}
.hb-gm-arrow:hover{background:#fff}
.hb-gm-prev{left:16px}
.hb-gm-next{right:16px}
.hb-gm-count{position:absolute;bottom:20px;left:50%;transform:translateX(-50%);color:var(--muted,#625E57);font-size:14px;opacity:.9}
@media (max-width:640px){.hb-gm-arrow{width:40px;height:40px;font-size:16px}.hb-gm-prev{left:6px}.hb-gm-next{right:6px}.hb-gm-close{top:10px;right:14px;font-size:32px}}
</style>

<script>
const hbGalleryImages = [
<?php foreach ( $hb_gallery_images as $hb_idx => $hb_url ) : ?>
	"<?php echo esc_url( $hb_url ); ?>"<?php echo $hb_idx < count( $hb_gallery_images ) - 1 ? ',' : ''; ?>
<?php endforeach; ?>
];
let hbGalleryIndex = 0;
let hbGalleryTimer = null;
function hbShowGalleryImage(){
	document.getElementById('hb-gm-img').src = hbGalleryImages[hbGalleryIndex];
	document.getElementById('hb-gm-count').textContent = (hbGalleryIndex+1) + ' / ' + hbGalleryImages.length;
}
function hbOpenGallery(idx){
	if(!hbGalleryImages.length) return;
	hbGalleryIndex = ((idx % hbGalleryImages.length) + hbGalleryImages.length) % hbGalleryImages.length;
	hbShowGalleryImage();
	document.getElementById('hb-gallery-modal').classList.add('open');
	document.body.style.overflow = 'hidden';
	hbStartGalleryAutoplay();
}
function hbCloseGallery(){
	document.getElementById('hb-gallery-modal').classList.remove('open');
	document.body.style.overflow = '';
	clearInterval(hbGalleryTimer);
}
function hbGalleryNav(dir){
	hbGalleryIndex = (hbGalleryIndex + dir + hbGalleryImages.length) % hbGalleryImages.length;
	hbShowGalleryImage();
	hbStartGalleryAutoplay();
}
function hbStartGalleryAutoplay(){
	clearInterval(hbGalleryTimer);
	hbGalleryTimer = setInterval(function(){
		hbGalleryIndex = (hbGalleryIndex + 1) % hbGalleryImages.length;
		hbShowGalleryImage();
	}, 4000);
}
document.addEventListener('keydown', function(e){
	const modal = document.getElementById('hb-gallery-modal');
	if(!modal || !modal.classList.contains('open')) return;
	if(e.key === 'Escape') hbCloseGallery();
	if(e.key === 'ArrowLeft') hbGalleryNav(-1);
	if(e.key === 'ArrowRight') hbGalleryNav(1);
});
(function(){
	const modal = document.getElementById('hb-gallery-modal');
	if(!modal) return;
	let touchStartX = 0, touchStartY = 0;
	modal.addEventListener('touchstart', function(e){
		touchStartX = e.changedTouches[0].clientX;
		touchStartY = e.changedTouches[0].clientY;
	}, { passive: true });
	modal.addEventListener('touchend', function(e){
		const dx = e.changedTouches[0].clientX - touchStartX;
		const dy = e.changedTouches[0].clientY - touchStartY;
		if(Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)){
			hbGalleryNav(dx < 0 ? 1 : -1);
		}
	}, { passive: true });
})();
</script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
