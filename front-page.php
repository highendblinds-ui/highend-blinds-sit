<?php
/**
 * Front page (homepage) template.
 *
 * @package HighEnd_Blinds
 */
get_header();

$contact = home_url( '/contact-us/' );

/* Product cards: title, permalink slug, description, image filename hint. */
$products = array(
	array( 'Zebra Blinds', '/zebra-blinds/', 'Stylish dual sheer shades that control light and privacy perfectly.', 'zebra-blinds.jpg' ),
	array( 'Roller Blinds', '/roller-blinds/', 'Clean, modern, and functional roller blinds for every room.', 'roller-blinds.jpg' ),
	array( 'Dream Curtains', '/curtains/', 'Motorized light-filtering curtains with privacy for patio doors and family rooms.', 'dream-curtain.jpg' ),
	array( 'Motorized Blinds', '/motorized-blinds/', 'Smart motorized blinds for convenience, safety, and modern living.', 'motorized-blinds.jpg' ),
	array( 'Motorized Dream Curtains', '/motorized-curtains/', 'Light-filtering privacy curtains for open-to-above rooms, patio doors, and family rooms.', 'motorized-curtains.jpg' ),
);

$why = array(
	array( 'Made Locally in Edmonton', 'Measured and custom-made locally with care and precision.', '<path d="M3 21V9l6-3v3l6-3v4l6-2v13z"></path><path d="M7 21v-4M13 21v-4M18 21v-4"></path>' ),
	array( 'Custom Made to Fit', 'Every window is measured and custom crafted.', '<rect x="2" y="7" width="20" height="10" rx="1.5"></rect><path d="M6 7v3M10 7v4M14 7v3M18 7v4"></path>' ),
	array( 'Professional Installation', 'Expert installation for a perfect fit every time.', '<circle cx="12" cy="8" r="3.5"></circle><path d="M5 21a7 7 0 0 1 14 0"></path>' ),
	array( 'Modern Motorized Options', 'Smart solutions for comfort, safety and style.', '<rect x="7" y="2" width="10" height="20" rx="3"></rect><path d="M12 6v3"></path><circle cx="12" cy="15" r="1.6" fill="currentColor" stroke="none"></circle>' ),
	array( 'Premium Fabrics', 'High quality fabrics that look stunning and last longer.', '<path d="M4 5h16v4a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3z"></path><path d="M4 12v7h16v-7"></path><path d="M9 5v3M15 5v3"></path>' ),
	array( '12+ Years of Experience', 'Trusted by thousands of satisfied clients.', '<circle cx="12" cy="12" r="9"></circle><path d="M8.5 14a4 4 0 0 0 7 0"></path><circle cx="9" cy="10" r="1" fill="currentColor" stroke="none"></circle><circle cx="15" cy="10" r="1" fill="currentColor" stroke="none"></circle>' ),
);

$reviews = array(
	array( 'GG', 'Gagan Gourav', 'Google Review', 'Excellent Services..Got our Zebra blinds at very reasonable price..Manider is very professional and have thorough knowledge of the industry..Keep up the good work👍' ),
	array( 'AB', 'Aby b', 'Google Review', 'I got my zebra blinds from HighEnd Blinds. Done excellent job. Premium quality and very reasonable price. Install in 5 Days, highly recommended.' ),
	array( 'SD', 'Sumit Dhamija', 'Google Review', 'We got our blinds for our new house and they did an excellent job at great prices. Recommended!' ),
	array( 'MR', 'Maya Restaurant', 'Google Review', 'They done excellent blinds job. Zebra blinds install in 5 Days. Lowest price. Very happy with HighEnd Blinds.' ),
	array( 'JB', 'Janelle Boychuk', '8 weeks ago', 'The quality and installation of these blinds was superb. On time, professional, very particular and they tuned out beautifully.' ),
	array( 'KC', 'Kara Cassell', '10 weeks ago', 'I highly recommend HighEnd Blinds. They came to my new house to measure my windows and gave me a quote and two days later the blinds were installed. They are great quality of curtains, great price compared to other companies, very friendly staff and would definitely recommend them to family and friends and would use them again in the future.' ),
);
?>

<!-- HERO -->
<section class="hb-hero">
	<div class="hb-wrap">
		<div>
			<div class="eyebrow">Made in Edmonton</div>
			<h1>Custom Blinds &amp; Curtains Made in Edmonton</h1>
			<p class="lead">Premium zebra blinds, roller blinds, motorized blinds, and curtains — measured, made, and installed locally in Edmonton.</p>
			<div class="hb-hero-cta">
				<a class="btn btn--primary" href="<?php echo esc_url( $contact ); ?>">Book Free Estimate <?php highend_arrow(); ?></a>
				<a class="btn btn--outline" href="#products">View Products</a>
			</div>
			<div class="hb-hero-trust">
				<div class="item"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="10" rx="1.5"></rect><path d="M6 7v3M10 7v4M14 7v3M18 7v4"></path></svg></span>Free Measurement</div>
				<div class="item"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"><path d="M14.5 5.5a3.6 3.6 0 0 1-4.7 4.7l-6.1 6.1 2.3 2.3 6.1-6.1a3.6 3.6 0 0 0 4.7-4.7l-2.2 2.2-2.1-.7-.7-2.1z"></path></svg></span>Free Installation</div>
				<div class="item"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s7-6.6 7-12a7 7 0 1 0-14 0c0 5.4 7 12 7 12z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></span>Made in Edmonton</div>
				<div class="item"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="7" y="2" width="10" height="20" rx="3"></rect><path d="M12 6v3"></path><circle cx="12" cy="15" r="1.4" fill="currentColor" stroke="none"></circle></svg></span>Motorized Options</div>
			</div>
		</div>
		<?php
		/* Hero carousel: uses images from Customizer gallery IDs if provided, else placeholders. */
		$hero_ids = array_filter( array_map( 'trim', explode( ',', get_theme_mod( 'highend_hero_images', '' ) ) ) );
		?>
		<div class="hb-carousel" data-hb-carousel>
			<div class="hb-track">
				<?php if ( $hero_ids ) : ?>
					<?php foreach ( $hero_ids as $hid ) : ?>
						<div class="hb-slide"><?php echo wp_get_attachment_image( intval( $hid ), 'full' ); ?></div>
					<?php endforeach; ?>
				<?php else : ?>
					<?php
					$hero_slides = array(
						array( 'hero-5.png', 'Motorized Dream Curtains', 'Light-filtering privacy for open-to-above rooms, patio doors, and family rooms.' ),
						array( 'hero-6.png', 'Zebra Blinds', 'Enjoy natural light and privacy with one modern blind.' ),
						array( 'hero-1.png', 'Custom Zebra Blinds', 'Made to fit your windows perfectly.' ),
						array( 'hero-2.png', 'Zebra Blinds for Modern Homes', 'Stylish light control with manual or motorized options.' ),
						array( 'hero-3.png', 'Light-Filtering Roller Blinds', 'Softens sunlight while keeping your room bright and comfortable.' ),
						array( 'hero-7.png', 'Custom Roller Blinds', 'Clean, practical window coverings made in Edmonton.' ),
					);
					foreach ( $hero_slides as $slide ) : ?>
						<div class="hb-slide">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $slide[0] ); ?>" alt="<?php echo esc_attr( $slide[1] ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block">
							<div class="hb-slide-caption"><strong><?php echo esc_html( $slide[1] ); ?></strong><span><?php echo esc_html( $slide[2] ); ?></span></div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<button class="hb-car-btn hb-car-prev" type="button" aria-label="Previous slide"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 6l-6 6 6 6"></path></svg></button>
			<button class="hb-car-btn hb-car-next" type="button" aria-label="Next slide"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6l6 6-6 6"></path></svg></button>
			<div class="hb-dots"></div>
		</div>
	</div>
</section>

<!-- PRODUCTS -->
<section id="products" class="hb-sec center">
	<div class="hb-wrap">
		<div class="eyebrow">Our Products</div>
		<h2>Beautiful Window Coverings for Every Style</h2>
		<div class="hb-cards">
			<?php foreach ( $products as $p ) : ?>
				<a class="hb-card" href="<?php echo esc_url( home_url( $p[1] ) ); ?>">
					<div class="thumb"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $p[3] ); ?>" alt="<?php echo esc_attr( $p[0] ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block"></div>
					<div class="body">
						<div class="title"><?php echo esc_html( $p[0] ); ?></div>
						<div class="desc"><?php echo esc_html( $p[2] ); ?></div>
						<span class="hb-learn">Learn More <?php highend_arrow(); ?></span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- WHY CHOOSE -->
<section id="why" class="hb-sec center hb-why">
	<div class="hb-wrap">
		<div class="eyebrow">Why Choose HighEnd Blinds</div>
		<h2>Local Quality. Custom Made for You.</h2>
		<div class="hb-why-grid">
			<?php foreach ( $why as $w ) : ?>
				<div class="col">
					<span class="ico"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"><?php echo $w[2]; ?></svg></span>
					<div class="name"><?php echo esc_html( $w[0] ); ?></div>
					<div class="txt"><?php echo esc_html( $w[1] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- LOCAL TRUST -->
<section class="hb-sec hb-local-story">
	<div class="hb-wrap">
		<div class="hb-local-copy">
			<div class="eyebrow">Your Local Edmonton Blind Maker</div>
			<h2>Custom Window Coverings Made for Edmonton Homes</h2>
			<p>For more than 12 years, HighEnd Blinds has helped Edmonton homeowners and businesses improve privacy, comfort, and light control. We measure every window carefully, make each order locally, and professionally install the finished window coverings.</p>
			<p>Our zebra blinds, roller blinds, dream curtains, and motorized systems are custom-built for your windows—not taken from standard store sizes. Thousands of satisfied clients have trusted our local team for practical advice, quality workmanship, and responsive after-sale service.</p>
		</div>
		<div class="hb-proof-grid" aria-label="HighEnd Blinds experience">
			<div><strong>12+</strong><span>Years in the blinds business</span></div>
			<div><strong>Thousands</strong><span>of satisfied clients</span></div>
			<div><strong>Local</strong><span>Edmonton manufacturing</span></div>
			<div><strong>Custom</strong><span>Measurement and installation</span></div>
		</div>
	</div>
</section>

<!-- PROCESS -->
<section class="hb-sec center hb-process">
	<div class="hb-wrap">
		<div class="eyebrow">Our Simple Process</div>
		<h2>From Free Consultation to Professional Installation</h2>
		<div class="hb-process-grid">
			<div class="hb-process-step"><div class="hb-step-top"><span>01</span><span class="hb-step-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16v12H8l-4 3V5z"></path><path d="M8 9h8M8 13h5"></path></svg></span></div><h3>Book a Free Consultation</h3><p>Tell us what you need and choose a convenient time for an in-home visit.</p></div>
			<div class="hb-process-step"><div class="hb-step-top"><span>02</span><span class="hb-step-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="1.5"></rect><path d="M7 7v4M11 7v2.5M15 7v4M19 7v2.5"></path></svg></span></div><h3>Measure &amp; Choose</h3><p>We measure your windows and help you compare fabrics, colours, privacy, blackout, and motorized options.</p></div>
			<div class="hb-process-step"><div class="hb-step-top"><span>03</span><span class="hb-step-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 21V9l6-3v3l6-3v4l6-2v13z"></path><path d="M7 21v-4M13 21v-4M18 21v-4"></path></svg></span></div><h3>Made Locally</h3><p>Your window coverings are custom-made locally in Edmonton to fit your exact measurements.</p></div>
			<div class="hb-process-step"><div class="hb-step-top"><span>04</span><span class="hb-step-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14.5 5.5a3.6 3.6 0 0 1-4.7 4.7l-6.1 6.1 2.3 2.3 6.1-6.1a3.6 3.6 0 0 0 4.7-4.7l-2.2 2.2-2.1-.7-.7-2.1z"></path></svg></span></div><h3>Professional Installation</h3><p>Our team installs, adjusts, and tests every blind or curtain so it is ready to use.</p></div>
		</div>
	</div>
</section>

<!-- EDMONTON NEEDS -->
<section class="hb-sec hb-edmonton-needs">
	<div class="hb-wrap">
		<div class="eyebrow">Built for Edmonton Living</div>
		<h2>Better Comfort, Privacy, and Light Control</h2>
		<div class="hb-needs-grid">
			<div><h3>Long Summer Daylight</h3><p>Light-filtering and sunscreen fabrics reduce glare and harsh sunlight while helping rooms stay bright and comfortable.</p></div>
			<div><h3>Bedroom Darkness</h3><p>Blackout roller blinds provide stronger room darkening for bedrooms, nurseries, media rooms, and shift workers.</p></div>
			<div><h3>Cold Alberta Winters</h3><p>Properly fitted window coverings add privacy and help create a more comfortable barrier at the window during cold weather.</p></div>
			<div><h3>Tall or Hard-to-Reach Windows</h3><p>Motorized blinds and curtains make high windows easy to operate with a remote, app, or compatible smart-home controls.</p></div>
		</div>
	</div>
</section>

<!-- OFFER -->
<section class="hb-sec hb-offer">
	<div class="hb-wrap">
		<div class="box">
			<div class="copy">
				<div class="eyebrow">Limited Time Offer</div>
				<h2>Up to 50% OFF Custom Blinds</h2>
				<p>Book your free in-home estimate today and upgrade your windows with premium custom blinds.</p>
				<a class="btn btn--white" style="align-self:flex-start" href="<?php echo esc_url( $contact ); ?>" onclick="event.preventDefault();hbOpenEstimate();">Claim Free Estimate <?php highend_arrow(); ?></a>
			</div>
			<div class="pic" onclick="hbOpenEstimate()" style="cursor:pointer"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/offer-1.jpg' ); ?>" alt="Premium custom blinds" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block"></div>
		</div>
	</div>
</section>

<!-- GALLERY -->
<section id="gallery" class="hb-sec center">
	<div class="hb-wrap">
		<div class="eyebrow">Our Gallery</div>
		<h2>See Our Work</h2>
		<div class="hb-gallery-grid">
			<?php for ( $i = 1; $i <= 6; $i++ ) :
				$gsrc = get_template_directory_uri() . '/assets/images/gallery-' . str_pad( $i, 2, '0', STR_PAD_LEFT ) . '.jpg';
				?>
				<div class="cell" onclick="hbOpenGallery(<?php echo (int) ( $i - 1 ); ?>)" style="cursor:pointer"><img src="<?php echo esc_url( $gsrc ); ?>" alt="HighEnd Blinds project photo <?php echo esc_attr( $i ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block"></div>
			<?php endfor; ?>
		</div>
		<div style="display:flex;justify-content:center;margin-top:36px">
			<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">View Full Gallery <?php highend_arrow(); ?></a>
		</div>
	</div>
</section>

<!-- REVIEWS -->
<section id="reviews" class="hb-sec center hb-reviews">
	<div class="hb-wrap">
		<div class="eyebrow">What Our Customers Say</div>
		<h2 style="margin-bottom:10px">Google Reviews</h2>
		<div class="hb-rate"><span class="stars"><?php for ( $s = 0; $s < 5; $s++ ) { echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.5 7 .7-5.2 4.7 1.5 6.9L12 17.8 5.7 21.5l1.5-6.9L2 9.9l7-.7z"></path></svg>'; } ?></span><strong style="color:#151515">4.8</strong> Based on 559 Google reviews</div>
		<div class="hb-reviews-viewport">
    <div class="hb-reviews-track">
      <?php foreach ( $reviews as $r ) : ?>
				<div class="hb-review">
					<div class="top">
						<div class="who"><span class="av"><?php echo esc_html( $r[0] ); ?></span><div><div class="name"><?php echo esc_html( $r[1] ); ?></div><div class="ago"><?php echo esc_html( $r[2] ); ?></div></div></div>
						<svg width="18" height="18" viewBox="0 0 24 24"><path fill="#4285F4" d="M23 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.2a5.3 5.3 0 0 1-2.3 3.5v2.9h3.7c2.2-2 3.4-5 3.4-8.6z"></path><path fill="#34A853" d="M12 24c3.1 0 5.7-1 7.6-2.8l-3.7-2.9c-1 .7-2.3 1.1-3.9 1.1-3 0-5.5-2-6.4-4.7H1.8v3C3.7 21.4 7.5 24 12 24z"></path><path fill="#FBBC05" d="M5.6 14.7a7.2 7.2 0 0 1 0-4.6v-3H1.8a12 12 0 0 0 0 10.6z"></path><path fill="#EA4335" d="M12 4.8c1.7 0 3.2.6 4.4 1.7l3.3-3.3C17.7 1.2 15.1 0 12 0 7.5 0 3.7 2.6 1.8 6.4l3.8 3c.9-2.7 3.4-4.6 6.4-4.6z"></path></svg>
					</div>
					<div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
					<p><?php echo esc_html( $r[3] ); ?></p>
				</div>
			<?php endforeach; ?>
      <?php foreach ( $reviews as $r ) : ?>
				<div class="hb-review">
					<div class="top">
						<div class="who"><span class="av"><?php echo esc_html( $r[0] ); ?></span><div><div class="name"><?php echo esc_html( $r[1] ); ?></div><div class="ago"><?php echo esc_html( $r[2] ); ?></div></div></div>
						<svg width="18" height="18" viewBox="0 0 24 24"><path fill="#4285F4" d="M23 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.2a5.3 5.3 0 0 1-2.3 3.5v2.9h3.7c2.2-2 3.4-5 3.4-8.6z"></path><path fill="#34A853" d="M12 24c3.1 0 5.7-1 7.6-2.8l-3.7-2.9c-1 .7-2.3 1.1-3.9 1.1-3 0-5.5-2-6.4-4.7H1.8v3C3.7 21.4 7.5 24 12 24z"></path><path fill="#FBBC05" d="M5.6 14.7a7.2 7.2 0 0 1 0-4.6v-3H1.8a12 12 0 0 0 0 10.6z"></path><path fill="#EA4335" d="M12 4.8c1.7 0 3.2.6 4.4 1.7l3.3-3.3C17.7 1.2 15.1 0 12 0 7.5 0 3.7 2.6 1.8 6.4l3.8 3c.9-2.7 3.4-4.6 6.4-4.6z"></path></svg>
					</div>
					<div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
					<p><?php echo esc_html( $r[3] ); ?></p>
				</div>
			<?php endforeach; ?>
    </div>
  </div>
		<div style="display:flex;justify-content:center;margin-top:32px">
			<a class="btn btn--outline" href="https://www.google.com/maps/search/?api=1&query=HighEnd+Blinds+Inc%2C+3261+Parsons+Rd+NW%2C+Edmonton%2C+AB" target="_blank" rel="noopener">Read More Reviews <?php highend_arrow(); ?></a>
		</div>
	</div>
</section>

<!-- SERVICE AREA -->
<section class="hb-sec hb-service" style="padding:20px 0 8px">
	<div class="hb-wrap" style="max-width:1160px">
		<div class="bar">
			<span class="ico"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s7-6.6 7-12a7 7 0 1 0-14 0c0 5.4 7 12 7 12z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></span>
			<div><div class="t">Proudly Serving Edmonton &amp; Area</div><div class="s">Serving Edmonton, St. Albert, Sherwood Park, Beaumont, Leduc, Spruce Grove, Fort Saskatchewan, and nearby areas.</div></div>
			<a href="<?php echo esc_url( home_url( '/service-areas/' ) ); ?>" style="margin-left:auto;font-size:13px;font-weight:800;white-space:nowrap">View Service Areas <?php highend_arrow(); ?></a>
		</div>
	</div>
</section>

<!-- CONTACT -->
<section id="contact" class="hb-sec hb-contact" style="padding:48px 0 72px">
	<div class="hb-wrap" style="max-width:1160px">
		<div style="max-width:560px">
			<h3>Contact Information</h3>
			<div class="hb-cinfo">
				<div class="line"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s7-6.6 7-12a7 7 0 1 0-14 0c0 5.4 7 12 7 12z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></span><div><strong>HighEnd Blinds Inc.</strong><br>3261 Parsons Rd NW<br>Edmonton, AB T6N 1B4</div></div>
				<div class="line"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"><path d="M5 3h4l2 5-3 2a12 12 0 0 0 6 6l2-3 5 2v4a2 2 0 0 1-2 2A18 18 0 0 1 3 5a2 2 0 0 1 2-2z"></path></svg></span><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>" style="font-weight:600"><?php echo esc_html( HIGHEND_PHONE ); ?></a></div>
				<div class="line"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></span><a href="mailto:<?php echo esc_attr( HIGHEND_EMAIL ); ?>" style="font-weight:600"><?php echo esc_html( HIGHEND_EMAIL ); ?></a></div>
				<div class="line"><span class="ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg></span><div style="line-height:1.7">Mon &ndash; Fri: 10:00 AM &ndash; 6:30 PM<br>Sat: 12:00 PM &ndash; 4:00 PM<br>Sun: Closed</div></div>
			</div>
			<div class="hb-map">
				<iframe title="HighEnd Blinds location on Google Maps" src="https://maps.google.com/maps?q=3261+Parsons+Rd+NW+Edmonton+AB&z=14&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
