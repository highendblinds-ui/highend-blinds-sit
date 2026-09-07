<?php
/**
 * Template Name: Contact Us
 */
get_header();
?>
<section style="background:#fff">
	<div class="hb-wrap" style="padding:56px 20px 72px">
		<div style="text-align:center;max-width:640px;margin:0 auto 40px">
			<div style="font-size:12.5px;font-weight:700;letter-spacing:.16em;color:#C9973E;text-transform:uppercase;margin-bottom:12px">Contact Us</div>
			<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.7rem,3vw,2.2rem);margin:0">Get Your Free Estimate Today</h1>
		</div>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:36px;align-items:start">
			<div style="background:#FAF8F3;border:1px solid #E8DFD0;border-radius:18px;padding:32px">
			<?php if ( isset( $_GET['estimate_sent'] ) ) : ?>
					<div style="background:#EAF7EE;border:1px solid #BFE6C9;color:#1e5c31;border-radius:12px;padding:16px;font-size:14px;font-weight:600">Thanks! Your request has been sent — we'll be in touch shortly.</div>
				<?php else : ?>
				<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<input type="hidden" name="action" value="highend_estimate">
					<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">
					<?php wp_nonce_field( 'highend_estimate', 'highend_nonce' ); ?>
					<div style="display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:14px;margin-bottom:14px">
						<input type="text" name="fullname" aria-label="Full name" placeholder="Full Name" required style="width:100%;min-width:0;height:48px;border:1px solid #E8DFD0;border-radius:12px;padding:0 14px;font-size:14px;background:#fff;outline:none">
						<input type="tel" name="phone" aria-label="Phone number" placeholder="Phone Number" style="width:100%;min-width:0;height:48px;border:1px solid #E8DFD0;border-radius:12px;padding:0 14px;font-size:14px;background:#fff;outline:none">
					</div>
					<div style="display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:14px;margin-bottom:14px">
						<input type="email" name="email" aria-label="Email address" placeholder="Email Address" required style="width:100%;min-width:0;height:48px;border:1px solid #E8DFD0;border-radius:12px;padding:0 14px;font-size:14px;background:#fff;outline:none">
						<select name="interest" aria-label="Product interest" style="width:100%;min-width:0;height:48px;border:1px solid #E8DFD0;border-radius:12px;padding:0 12px;font-size:14px;background:#fff;color:#625E57;outline:none">
							<option>I'm interested in...</option>
							<option>Zebra Blinds</option>
							<option>Roller Blinds</option>
							<option>Motorized Blinds</option>
							<option>Dream Curtains</option>
							<option>Motorized Curtains</option>
						</select>
					</div>
					<textarea name="message" aria-label="Message" placeholder="Message" rows="4" style="width:100%;border:1px solid #E8DFD0;border-radius:12px;padding:12px 14px;font-size:14px;background:#fff;outline:none;resize:vertical;margin-bottom:16px"></textarea>
					<button type="submit" style="width:100%;display:inline-flex;align-items:center;justify-content:center;background:#C9973E;color:#fff;font-weight:700;font-size:15px;padding:14px;border:none;border-radius:12px;cursor:pointer">Submit</button>
				</form>
				<?php endif; ?>
				<p style="font-size:11.5px;color:#9a9384;margin:12px 0 0;text-align:center">We respect your privacy. Your details are only used to prepare your estimate.</p>
			</div>
			<div>
				<h2 style="font-family:'Playfair Display',Georgia,serif;font-weight:600;font-size:1.55rem;margin:0 0 20px">Contact Information</h2>
				<div style="display:flex;flex-direction:column;gap:16px;margin-bottom:22px">
					<div style="font-size:14px;color:#3a352d"><strong>HighEnd Blinds Inc.</strong><br><?php echo esc_html( HIGHEND_ADDR ); ?></div>
					<div><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>" style="font-size:14px;color:#3a352d;font-weight:600"><?php echo esc_html( HIGHEND_PHONE ); ?></a></div>
					<div><a href="mailto:<?php echo esc_attr( HIGHEND_EMAIL ); ?>" style="font-size:14px;color:#3a352d;font-weight:600"><?php echo esc_html( HIGHEND_EMAIL ); ?></a></div>
					<div style="font-size:14px;color:#3a352d;line-height:1.7">Mon – Fri: 10:00 AM – 6:30 PM<br>Sat: 12:00 PM – 4:00 PM<br>Sun: Closed</div>
				</div>
				<div style="position:relative;border-radius:14px;overflow:hidden;border:1px solid #E8DFD0;aspect-ratio:16/9">
					<iframe title="HighEnd Blinds location on Google Maps" src="https://maps.google.com/maps?q=3261+Parsons+Rd+NW+Edmonton+AB&z=14&output=embed" style="position:absolute;inset:0;width:100%;height:100%;border:0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
