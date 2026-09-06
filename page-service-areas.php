<?php
/**
 * Template Name: Service Areas
 */
get_header();

$areas = array(
	array( 'Edmonton', 'Our home base. We measure, manufacture, and install custom zebra blinds, roller blinds, motorized shades, and Dream Curtains throughout Edmonton.' ),
	array( 'Sherwood Park', 'Free in-home consultations, precise measurement, and professional installation for homes and businesses across Sherwood Park.' ),
	array( 'St. Albert', 'Custom window coverings made locally for St. Albert homes, including privacy, blackout, sunscreen, and motorized options.' ),
	array( 'Beaumont', 'Made-to-measure blinds and motorized window coverings for new builds, family homes, patio doors, and hard-to-reach windows in Beaumont.' ),
	array( 'Leduc', 'Factory-direct zebra blinds, roller shades, and motorized solutions with local measurement and professional installation in Leduc.' ),
	array( 'Spruce Grove', 'Custom blinds and curtains for Spruce Grove, with fabric guidance, accurate measurement, local manufacturing, and installation.' ),
	array( 'Fort Saskatchewan', 'Residential and commercial window-covering consultations, measurement, manufacturing, and installation in Fort Saskatchewan.' ),
);
?>

<section style="background:linear-gradient(180deg,#FAF8F3,#F4EDE1)">
	<div class="hb-wrap" style="padding-top:58px;padding-bottom:58px;text-align:center;max-width:920px">
		<div class="eyebrow">Edmonton &amp; Surrounding Communities</div>
		<h1 style="font-size:clamp(2.1rem,4.5vw,3.4rem);line-height:1.08">Custom Blinds Measurement &amp; Installation Service Areas</h1>
		<p style="max-width:720px;margin:20px auto 0;color:#625E57;font-size:17px;line-height:1.7">HighEnd Blinds provides free in-home consultations, precise measurement, local manufacturing, and professional installation throughout Edmonton and nearby communities.</p>
		<div style="display:flex;justify-content:center;flex-wrap:wrap;gap:12px;margin-top:28px">
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Book Free Consultation <?php highend_arrow(); ?></a>
			<a class="btn btn--outline" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>">Call <?php echo esc_html( HIGHEND_PHONE ); ?></a>
		</div>
	</div>
</section>

<section style="background:#fff">
	<div class="hb-wrap" style="padding-top:56px;padding-bottom:56px;max-width:1120px">
		<h2 style="font-size:clamp(1.7rem,3vw,2.3rem);text-align:center">Areas We Proudly Serve</h2>
		<p style="max-width:720px;margin:14px auto 30px;text-align:center;color:#625E57">Every project receives the same local service—from selecting fabric and controls to final programming and installation.</p>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:18px">
			<?php foreach ( $areas as $area ) : ?>
				<a class="hb-area-card" href="<?php echo esc_url( home_url( '/' . sanitize_title( $area[0] ) . '/' ) ); ?>">
					<h2 style="font-size:20px"><?php echo esc_html( $area[0] ); ?></h2>
					<p style="margin:10px 0 0;color:#625E57;font-size:14.5px;line-height:1.7"><?php echo esc_html( $area[1] ); ?></p>
					<span>Explore <?php echo esc_html( $area[0] ); ?> <?php highend_arrow(); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding-top:56px;padding-bottom:56px;max-width:1000px">
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:32px">
			<div>
				<div class="eyebrow">Local From Start to Finish</div>
				<h2 style="font-size:clamp(1.7rem,3vw,2.25rem)">What Our In-Home Service Includes</h2>
				<p style="color:#625E57;line-height:1.75">We bring samples to your space, help you compare privacy and light-control options, measure every opening, manufacture your order in Edmonton, and install the finished window coverings professionally.</p>
			</div>
			<div style="background:#fff;border:1px solid #E8DFD0;border-radius:18px;padding:26px">
				<ul style="margin:0;padding-left:20px;display:grid;gap:12px;color:#2b2620">
					<li>Free consultation and product guidance</li>
					<li>Accurate on-site window measurement</li>
					<li>Fabric, colour, privacy, and light-control recommendations</li>
					<li>Manual, child-safe, and motorized operating options</li>
					<li>Local manufacturing and professional installation</li>
					<li>Local warranty and adjustment support</li>
				</ul>
			</div>
		</div>
		<nav aria-label="Explore our products" style="margin-top:34px;padding-top:26px;border-top:1px solid #E4D8C2;display:flex;justify-content:center;flex-wrap:wrap;gap:12px 24px;font-weight:700">
			<a href="<?php echo esc_url( home_url( '/zebra-blinds/' ) ); ?>">Zebra Blinds</a>
			<a href="<?php echo esc_url( home_url( '/roller-blinds/' ) ); ?>">Roller Blinds</a>
			<a href="<?php echo esc_url( home_url( '/motorized-blinds/' ) ); ?>">Motorized Blinds</a>
			<a href="<?php echo esc_url( home_url( '/curtains/' ) ); ?>">Dream Curtains</a>
			<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Project Gallery</a>
		</nav>
	</div>
</section>

<?php get_footer(); ?>
