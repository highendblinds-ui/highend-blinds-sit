<?php
/**
 * Patio door blinds and curtains landing page.
 *
 * @package HighEnd_Blinds
 */

add_filter( 'pre_get_document_title', function () {
	return 'Patio Door Blinds & Curtains Edmonton | Custom Coverings';
} );
add_filter( 'rank_math/frontend/title', function () {
	return 'Patio Door Blinds & Curtains Edmonton | Custom Coverings';
} );
add_filter( 'rank_math/frontend/description', function () {
	return 'Custom patio door blinds and curtains in Edmonton. Explore Dream Curtains, roller blinds and remote-controlled motorized options with free measurement and professional installation.';
} );

get_header();

$faqs = array(
	array( 'What window covering works best for a patio door?', 'The best choice depends on door width, daily traffic, privacy needs and available stacking space. Dream Curtains are our featured option because their independent fabric vanes allow convenient walk-through access. Split roller blinds and remote-controlled motorized options can also suit selected openings.' ),
	array( 'Are Dream Curtains suitable for sliding patio doors?', 'Yes. The independent soft fabric vanes let you walk through at the point you need while the curtain remains across the rest of the opening. They provide filtered daylight, privacy and a soft floor-to-ceiling appearance.' ),
	array( 'Can patio-door curtains use more than one colour?', 'Yes. We can make one curtain using one, two or three fabric colours. We help plan the colour sequence so the finished design looks balanced across the full opening.' ),
	array( 'Are Dream Curtains blackout curtains?', 'Dream Curtains are designed for light filtering and privacy, not complete blackout. We will show you suitable roller-blind options when stronger room darkening is required.' ),
	array( 'Can roller blinds cover a sliding glass door?', 'Large or split roller shades can work where the opening, mounting space and daily door access are suitable. Dividing the shade into sections can make access easier and reduce the weight of each blind.' ),
	array( 'How do your motorized patio-door coverings operate?', 'Our motorized curtains and motorized roller blinds for this application operate with a handheld remote control. We do not advertise app control, schedules, voice control or smart-home automation for this patio-door curtain system.' ),
	array( 'Can you cover a 9-foot or 10-foot ceiling-height patio door?', 'Yes. We measure the actual finished height, width, track position, floor clearance and stacking space. The covering is custom-made for the opening rather than selected from a standard size.' ),
	array( 'Do you provide free measurement and installation in Edmonton?', 'Yes. HighEnd Blinds provides free in-home measurement, product guidance and professional installation in Edmonton and surrounding communities.' ),
);

$faq_entities = array();
foreach ( $faqs as $faq ) {
	$faq_entities[] = array(
		'@type' => 'Question',
		'name' => $faq[0],
		'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $faq[1] ),
	);
}

$schemas = array(
	array(
		'@context' => 'https://schema.org',
		'@type' => 'Service',
		'name' => 'Patio Door Blinds and Curtains Edmonton',
		'description' => 'Custom Dream Curtains, floor-to-ceiling curtains, roller blinds and remote-controlled motorized coverings for patio and sliding doors in Edmonton.',
		'provider' => array( '@type' => 'LocalBusiness', 'name' => 'HighEnd Blinds', 'url' => home_url( '/' ), 'telephone' => HIGHEND_PHONE ),
		'areaServed' => array( '@type' => 'City', 'name' => 'Edmonton' ),
		'url' => get_permalink(),
	),
	array(
		'@context' => 'https://schema.org',
		'@type' => 'FAQPage',
		'mainEntity' => $faq_entities,
	),
	array(
		'@context' => 'https://schema.org',
		'@type' => 'BreadcrumbList',
		'itemListElement' => array(
			array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ),
			array( '@type' => 'ListItem', 'position' => 2, 'name' => 'Patio Door Blinds and Curtains Edmonton', 'item' => get_permalink() ),
		),
	),
);
foreach ( $schemas as $schema ) {
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
}
?>

<section style="background:linear-gradient(180deg,#FAF8F3,#F4EDE1)">
	<div class="hb-wrap" style="padding:56px 20px;display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:40px;align-items:center">
		<div>
			<div style="font-size:13.5px;font-weight:800;letter-spacing:.2em;text-transform:uppercase"><span style="color:#151515">Patio Door</span> <span style="color:#F5332A">Coverings Edmonton</span></div>
			<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(2rem,4vw,3.25rem);line-height:1.08;margin-top:12px;max-width:18ch">Patio Door Blinds and Curtains Edmonton</h1>
			<p style="margin-top:18px;font-size:18px;font-weight:500;line-height:1.7;color:#151515;max-width:62ch">Custom window coverings for sliding and patio doors, including Dream Curtains, floor-to-ceiling curtains, roller blinds and remote-controlled motorized options. Measured, made and professionally installed by HighEnd Blinds in Edmonton.</p>
			<div style="display:flex;flex-wrap:wrap;gap:14px;margin-top:28px"><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Book Free Measurement <?php highend_arrow(); ?></a><a class="btn btn--outline" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>">Call <?php echo esc_html( HIGHEND_PHONE ); ?></a></div>
		</div>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dream-curtain.jpg' ); ?>" alt="Dream Curtains installed across a patio door in Edmonton" style="width:100%;height:420px;object-fit:cover;border-radius:18px;box-shadow:0 20px 50px -20px rgba(21,21,21,.35)">
	</div>
</section>

<section style="background:#fff">
	<div class="hb-wrap" style="padding:64px 20px">
		<div style="text-align:center;max-width:780px;margin:0 auto"><div style="font-size:13px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#F5332A">Five Custom Options</div><h2 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.9rem,3vw,2.7rem);line-height:1.15;margin:10px 0 0">Best window coverings for Edmonton patio doors</h2><p style="margin-top:14px;font-size:17px;line-height:1.7;color:#4D4A45">We consider doorway traffic, glass width, privacy, daylight and stacking clearance before recommending a product.</p></div>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:18px;margin-top:34px">
			<div style="border:1px solid #E8DFD0;border-radius:18px;padding:24px;background:#FAF8F3"><h2 style="font-size:22px;margin:0">1. Dream Curtains</h2><p style="margin-top:11px;line-height:1.7">Our featured patio-door option uses independent soft fabric vanes. Walk through at any point without pulling the entire curtain aside. The vanes soften daylight and adjust for privacy while creating a flowing fabric appearance.</p><a href="<?php echo esc_url( home_url( '/curtains/' ) ); ?>" style="display:inline-block;margin-top:14px;font-weight:800">Explore Dream Curtains →</a></div>
			<div style="border:1px solid #E8DFD0;border-radius:18px;padding:24px"><h2 style="font-size:22px;margin:0">2. Long Curtains for Tall and Wide Openings</h2><p style="margin-top:11px;line-height:1.7">Long and floor-to-ceiling curtains in Edmonton are a tailored choice for wide doors and rooms with typical 9-foot or 10-foot ceilings, as well as taller open-to-above spaces. Select one colour or combine two or three colours in the same curtain.</p></div>
			<div style="border:1px solid #E8DFD0;border-radius:18px;padding:24px"><h2 style="font-size:22px;margin:0">3. Motorized Curtains</h2><p style="margin-top:11px;line-height:1.7">Open and close wide curtains using the supplied handheld remote. Choose a rechargeable or 110V motor according to the installation. This curtain system is remote-controlled without app, scheduling, voice control or automation claims.</p><a href="<?php echo esc_url( home_url( '/motorized-curtains/' ) ); ?>" style="display:inline-block;margin-top:14px;font-weight:800">Explore Motorized Curtains →</a></div>
			<div style="border:1px solid #E8DFD0;border-radius:18px;padding:24px"><h2 style="font-size:22px;margin:0">4. Roller Blinds</h2><p style="margin-top:11px;line-height:1.7">Large or split roller shades can provide clean coverage where mounting space and daily access make them suitable. Separate sections can make the active door easier to uncover without raising every shade.</p><a href="<?php echo esc_url( home_url( '/roller-blinds/' ) ); ?>" style="display:inline-block;margin-top:14px;font-weight:800">Explore Roller Blinds →</a></div>
			<div style="border:1px solid #E8DFD0;border-radius:18px;padding:24px"><h2 style="font-size:22px;margin:0">5. Motorized Roller Blinds</h2><p style="margin-top:11px;line-height:1.7">Remote-controlled roller blinds offer convenient operation for wide glass doors and larger shade sections. We size the motor and blind for the finished opening and demonstrate the handheld remote after installation.</p><a href="<?php echo esc_url( home_url( '/motorized-blinds/' ) ); ?>" style="display:inline-block;margin-top:14px;font-weight:800">Explore Motorized Roller Blinds →</a></div>
		</div>
	</div>
</section>

<section style="background:#151515;color:#F8F6F1">
	<div class="hb-wrap" style="padding:64px 20px;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:40px;align-items:center">
		<div><div style="font-size:13px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#C9973E">Featured Patio-Door Solution</div><h2 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.9rem,3vw,2.7rem);line-height:1.15;margin:10px 0 0">Dream Curtains for sliding doors</h2><p style="margin-top:16px;font-size:17px;line-height:1.75;color:#D8D1C6">A sliding door is used differently from a regular window. Dream Curtains keep the opening covered while allowing family members to pass through the independent vanes wherever the active door panel is located.</p><ul style="margin:20px 0 0;padding-left:20px;display:grid;gap:10px;line-height:1.6;color:#F8F6F1"><li>Easy walk-through access</li><li>Soft filtered daylight</li><li>Adjustable privacy</li><li>One-, two- or three-colour designs</li><li>Manual or remote-controlled operation</li></ul><p style="margin-top:18px;color:#C9C2B4"><strong style="color:#fff">Important:</strong> Dream Curtains are light-filtering privacy curtains, not blackout curtains.</p></div>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/motorized-curtains.jpg' ); ?>" alt="Floor-to-ceiling Dream Curtains for a sliding patio door" loading="lazy" style="width:100%;height:430px;object-fit:cover;border-radius:18px">
	</div>
</section>

<section style="background:#fff">
	<div class="hb-wrap" style="padding:64px 20px;text-align:center">
		<div style="font-size:13px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#F5332A">Project Gallery</div>
		<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.9rem,3vw,2.7rem);line-height:1.15;margin:10px 0 0">Edmonton patio-door and large-window installations</h2>
		<p style="max-width:720px;margin:14px auto 0;color:#625E57;line-height:1.7">See examples of Dream Curtains, roller shades and full-height window coverings installed for Edmonton-area homes.</p>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:14px;margin-top:30px;text-align:left">
			<?php for ( $hb_patio_gallery_index = 1; $hb_patio_gallery_index <= 4; $hb_patio_gallery_index++ ) : ?>
				<?php $hb_patio_gallery_src = get_template_directory_uri() . '/assets/images/gallery-' . str_pad( $hb_patio_gallery_index, 2, '0', STR_PAD_LEFT ) . '.jpg'; ?>
				<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="display:block;border-radius:14px;overflow:hidden;aspect-ratio:1/1">
					<img src="<?php echo esc_url( $hb_patio_gallery_src ); ?>" alt="<?php echo esc_attr( 'Custom patio door and large-window covering installation in Edmonton — project ' . $hb_patio_gallery_index ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block">
				</a>
			<?php endfor; ?>
		</div>
		<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="margin-top:28px">View Project Gallery <?php highend_arrow(); ?></a>
	</div>
</section>

<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding:64px 20px">
		<div style="text-align:center;max-width:760px;margin:0 auto"><div style="font-size:13px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#F5332A">Measured For Daily Use</div><h2 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.9rem,3vw,2.7rem);line-height:1.15;margin:10px 0 0">What we check before recommending a patio-door covering</h2></div>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;margin-top:32px">
			<div style="background:#fff;border:1px solid #E8DFD0;border-radius:16px;padding:22px"><h3 style="margin:0;font-size:19px">Door movement</h3><p style="margin-top:9px;line-height:1.65">We identify the active sliding panel and plan access around the way your household uses the door.</p></div>
			<div style="background:#fff;border:1px solid #E8DFD0;border-radius:16px;padding:22px"><h3 style="margin:0;font-size:19px">Finished dimensions</h3><p style="margin-top:9px;line-height:1.65">Width, ceiling height, track position and finished floor clearance are measured for the exact opening.</p></div>
			<div style="background:#fff;border:1px solid #E8DFD0;border-radius:16px;padding:22px"><h3 style="margin:0;font-size:19px">Stacking space</h3><p style="margin-top:9px;line-height:1.65">We check where fabric or blinds will sit when open so the passage remains comfortable and practical.</p></div>
			<div style="background:#fff;border:1px solid #E8DFD0;border-radius:16px;padding:22px"><h3 style="margin:0;font-size:19px">Light and privacy</h3><p style="margin-top:9px;line-height:1.65">We compare light-filtering, privacy and roller-fabric choices in the actual daylight entering your room.</p></div>
		</div>
	</div>
</section>

<section style="background:#fff">
	<div class="hb-wrap" style="padding:64px 20px;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:40px;align-items:center">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/roller-blinds.jpg' ); ?>" alt="Split roller blinds for a wide patio-door opening in Edmonton" loading="lazy" style="width:100%;height:390px;object-fit:cover;border-radius:18px">
		<div><div style="font-size:13px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#F5332A">Local Measurement And Installation</div><h2 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.9rem,3vw,2.6rem);line-height:1.15;margin:10px 0 0">Custom made for Edmonton patio doors</h2><p style="margin-top:16px;font-size:17px;line-height:1.75">HighEnd Blinds provides free in-home measurement, product selection, local preparation and professional installation. We serve Edmonton, Sherwood Park, St. Albert, Beaumont, Leduc, Spruce Grove, Fort Saskatchewan and nearby communities.</p><p style="margin-top:14px;font-size:17px;line-height:1.75">During your consultation, we bring samples and help you compare Dream Curtains, floor-to-ceiling curtain colours, roller fabrics and remote-controlled motor options at your own patio door.</p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="margin-top:24px">Request a Free Consultation <?php highend_arrow(); ?></a></div>
	</div>
</section>

<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding:60px 20px;max-width:900px">
		<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.8rem,3vw,2.5rem);margin:0">Patio Door Blinds and Curtains FAQs</h2>
		<div style="display:flex;flex-direction:column;gap:12px;margin-top:26px">
			<?php foreach ( $faqs as $faq ) : ?><details class="hb-faq-item" style="background:#fff;border:1px solid #E8DFD0;border-radius:14px;padding:18px 20px"><summary style="cursor:pointer;list-style:none;font-weight:700;font-size:16px;display:flex;justify-content:space-between;gap:16px"><span><?php echo esc_html( $faq[0] ); ?></span><span aria-hidden="true">⌄</span></summary><p style="margin-top:11px;font-size:16px;line-height:1.7"><?php echo esc_html( $faq[1] ); ?></p></details><?php endforeach; ?>
		</div>
		<nav aria-label="Related patio-door products" style="margin-top:28px;padding-top:24px;border-top:1px solid #E8DFD0;display:flex;flex-wrap:wrap;gap:10px 22px;font-weight:700"><a href="<?php echo esc_url( home_url( '/curtains/' ) ); ?>">Dream Curtains Edmonton</a><a href="<?php echo esc_url( home_url( '/motorized-curtains/' ) ); ?>">Remote-Controlled Curtains</a><a href="<?php echo esc_url( home_url( '/roller-blinds/' ) ); ?>">Custom Roller Blinds</a><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">View Edmonton Installations</a></nav>
		<div style="margin-top:34px;background:#151515;color:#F8F6F1;border-radius:20px;padding:30px;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:18px"><div><h2 style="font-family:'Playfair Display',Georgia,serif;font-size:24px;margin:0">Find the right patio-door covering</h2><p style="margin-top:8px;color:#C9C2B4">Free measurement and professional installation in Edmonton.</p></div><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="display:inline-flex;background:#C9973E;color:#151515;border-radius:999px;padding:14px 24px;font-weight:800">Get Free Estimate</a></div>
	</div>
</section>

<?php get_footer(); ?>
