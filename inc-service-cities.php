<?php
/**
 * Local service-area content and shared city-page renderer.
 */
function highend_service_city_data() {
	return array(
		'edmonton' => array(
			'city' => 'Edmonton',
			'intro' => 'HighEnd Blinds is based in Edmonton, where we measure, manufacture, and install custom window coverings for houses, condos, offices, clinics, and retail spaces. Working locally keeps communication direct and lets our team manage each project from the first fabric comparison through the final installation and adjustment.',
			'local' => 'Edmonton homes face bright summer evenings, early sunrises, winter glare, and significant seasonal temperature changes. South- and west-facing rooms often benefit from sunscreen or light-filtering fabrics, while bedrooms may need blackout roller blinds. Tall stairwell windows and open-to-above living rooms are excellent candidates for rechargeable motorized blinds or Dream Curtains.',
			'fit' => 'From established neighbourhood homes to downtown condos and new suburban builds, Edmonton windows vary widely in depth, width, trim, and access. We check mounting space, handles, tile, casing, and furniture placement before recommending an inside mount, outside mount, cassette, side channel, or motorized solution.',
		),
		'sherwood-park' => array(
			'city' => 'Sherwood Park',
			'intro' => 'HighEnd Blinds provides free in-home consultations and professional installation throughout Sherwood Park. We bring fabric and control samples to your home or business, measure every opening, manufacture the order locally in Edmonton, and return with the hardware and programming required for a clean finished installation.',
			'local' => 'Sherwood Park includes mature homes, renovated properties, acreages, townhomes, and newer developments with large expanses of glass. Privacy needs can change from a front-facing room to a backyard window, so we help select the right combination of zebra, sunscreen, light-filtering, blackout, or motorized blinds for each exposure.',
			'fit' => 'Wide living-room windows and patio doors need careful planning for tube strength, fabric roll direction, stack space, and everyday access. Dream Curtains provide soft daylight and walk-through convenience at patio doors, while grouped motorized roller or zebra blinds can make several windows operate together from one remote or app.',
		),
		'st-albert' => array(
			'city' => 'St. Albert',
			'intro' => 'HighEnd Blinds measures and installs custom blinds and motorized window coverings across St. Albert. Our Edmonton manufacturing team builds each order to the measurements taken in your space, helping reduce delays and giving customers local support for installation, programming, warranty questions, and future adjustments.',
			'local' => 'St. Albert properties range from character homes and renovated interiors to contemporary new builds with tall ceilings and oversized windows. We consider privacy from nearby streets and paths, room orientation, decorative style, and the way each room is used before recommending a fabric or operating system.',
			'fit' => 'Zebra blinds work well where adjustable daylight and privacy are both important. Roller blinds offer a minimal profile with sunscreen, light-filtering, privacy, or blackout fabrics. For high windows, nurseries, primary bedrooms, and whole-room groups, rechargeable motorization removes hanging controls and simplifies daily operation.',
		),
		'beaumont' => array(
			'city' => 'Beaumont',
			'intro' => 'HighEnd Blinds serves Beaumont with in-home product guidance, accurate window measurement, local manufacturing, and professional installation. We work with homeowners during new construction, after possession, and during renovations to create window coverings that fit the room instead of relying on standard retail sizes.',
			'local' => 'Many Beaumont homes feature open main floors, patio doors, bonus rooms, and tall open-to-above spaces. These designs look beautiful but often need different window treatments within the same home. We can coordinate fabrics and cassette colours while matching privacy and light control to the practical needs of each room.',
			'fit' => 'Motorized blinds are particularly useful for high foyer and stairwell windows. Blackout roller fabrics suit bedrooms and media rooms, sunscreen fabrics reduce glare in bright gathering spaces, and motorized Dream Curtains offer light filtering with privacy for patio doors and family rooms. Dream Curtains are not a blackout product.',
		),
		'leduc' => array(
			'city' => 'Leduc',
			'intro' => 'HighEnd Blinds supplies custom zebra blinds, roller shades, motorized blinds, and Dream Curtains throughout Leduc. Your consultation takes place in the room where the product will be used, making it easier to compare fabric colour, transparency, privacy, and operation under the home’s actual lighting conditions.',
			'local' => 'Leduc homeowners often need a practical mix: privacy at front-facing windows, glare reduction in living spaces, darkness in bedrooms, and easy access at patio doors. Instead of forcing one fabric throughout the house, we coordinate complementary products that solve the needs of each room while maintaining a consistent look.',
			'fit' => 'Our team checks window depth, casing, handles, sill clearance, and nearby doors before production. That measurement process is especially important for wide roller shades, shallow frames, grouped zebra blinds, and motorized systems. Each finished order is made locally, installed professionally, tested, and explained before we leave.',
		),
		'spruce-grove' => array(
			'city' => 'Spruce Grove',
			'intro' => 'HighEnd Blinds offers free consultations and professional blind installation in Spruce Grove. We bring samples to your property, help narrow the choices, record exact measurements, manufacture the selected window coverings in Edmonton, and install the finished order with local warranty and adjustment support.',
			'local' => 'Spruce Grove homes include established neighbourhood properties, townhomes, acreages, and newer houses with open layouts and large windows. Window direction and surrounding sightlines affect the best choice, so we evaluate daytime glare, evening privacy, furniture placement, and how often each blind will be operated.',
			'fit' => 'Sunscreen rollers can preserve an outdoor view while reducing glare, zebra blinds make privacy adjustable, and blackout roller fabrics are designed for sleeping spaces. Rechargeable motors are a clean option for grouped windows and difficult locations because they need no new electrical wiring and eliminate loose operating chains.',
		),
		'fort-saskatchewan' => array(
			'city' => 'Fort Saskatchewan',
			'intro' => 'HighEnd Blinds provides custom window-covering consultations, local manufacturing, and professional installation in Fort Saskatchewan. We serve residential and commercial spaces with solutions built to the dimensions and operating requirements of each window rather than trimmed-down, ready-made products.',
			'local' => 'Homes and workplaces in Fort Saskatchewan can require privacy, heat and glare management, bedroom darkness, or convenient control of tall glass. We match fabrics and mechanisms to those priorities, considering window direction, interior finishes, daily use, children and pets, and whether several shades should operate together.',
			'fit' => 'For offices, clinics, and customer-facing spaces, roller blinds provide a clean appearance and can be produced in matching fabric lots. In homes, zebra blinds, blackout rollers, sunscreen shades, and motorized options can be combined. Dream Curtains add soft light filtering and privacy at patio doors without being a blackout treatment.',
		),
	);
}

function highend_render_service_city( $key ) {
	$data = highend_service_city_data();
	if ( ! isset( $data[ $key ] ) ) { return; }
	$c = $data[ $key ];
	$city = $c['city'];
	?>
	<section class="hb-city-hero">
		<div class="hb-wrap">
			<div class="eyebrow">Locally Made in Edmonton</div>
			<h1>Custom Blinds in <?php echo esc_html( $city ); ?></h1>
			<p><?php echo esc_html( $c['intro'] ); ?></p>
			<div class="hb-city-actions"><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Book Free Consultation <?php highend_arrow(); ?></a><a class="btn btn--outline" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>">Call <?php echo esc_html( HIGHEND_PHONE ); ?></a></div>
		</div>
	</section>
	<article class="hb-city-content">
		<div class="hb-wrap">
			<h2>Window Coverings Selected for <?php echo esc_html( $city ); ?> Homes</h2>
			<p><?php echo esc_html( $c['local'] ); ?></p>
			<p><?php echo esc_html( $c['fit'] ); ?></p>

			<h2>Custom Blinds and Motorized Options</h2>
			<p>Our product range includes <a href="<?php echo esc_url( home_url( '/zebra-blinds/' ) ); ?>">zebra blinds</a> for adjustable light and privacy, <a href="<?php echo esc_url( home_url( '/roller-blinds/' ) ); ?>">roller blinds</a> in light-filtering, sunscreen, privacy, and blackout fabrics, and <a href="<?php echo esc_url( home_url( '/motorized-blinds/' ) ); ?>">motorized blinds</a> for convenient cordless operation. We also manufacture motorized Dream Curtains for family rooms, open-to-above spaces, and patio doors. Dream Curtains softly filter daylight and provide privacy; they are not blackout curtains.</p>
			<p>Operating choices include wand control, a chain secured with a safety guard, rechargeable motors, remotes, wall switches, phone apps, schedules, and compatible smart-home controls. We explain the practical differences and demonstrate suitable samples during the consultation. The goal is not to add technology where it is unnecessary, but to make frequently used, wide, tall, or inaccessible windows easier and safer to operate.</p>

			<h2>Our Measurement, Manufacturing, and Installation Process</h2>
			<p>We begin with a free in-home consultation in <?php echo esc_html( $city ); ?>. You can compare materials beside your flooring, paint, furniture, and natural light. We then measure width, height, depth, squareness, obstacles, and mounting conditions. After you approve the product and fabric, the order is manufactured locally at our Edmonton facility instead of being sent through a distant retail chain.</p>
			<p>During installation, our team mounts and levels the hardware, checks clearances, tests every blind, and programs motorized products. We show you how to operate and care for the finished window coverings and remain available for local support. Product and installation coverage is explained in our <a href="<?php echo esc_url( home_url( '/warranty/' ) ); ?>">warranty information</a>.</p>

			<h2>Residential and Commercial Projects</h2>
			<p>HighEnd Blinds works with homeowners, landlords, builders, offices, clinics, and other local businesses. A single-room project receives the same careful measurement as a full house or coordinated commercial order. For larger projects, we can help organize fabric lots, control types, room groups, and installation sequencing so the result looks consistent and operates reliably.</p>

			<h2>Choosing and Caring for Your New Blinds</h2>
			<p>During the consultation, we encourage you to view samples in both direct daylight and the softer light found deeper inside the room. Fabric colour and openness can look different as conditions change. We discuss cleaning requirements, expected privacy during the day and at night, room-darkening goals, control placement, and how furniture or doors may affect operation before you approve the order.</p>
			<p>Most blinds need only regular light dusting with a soft brush or vacuum attachment. Suitable roller fabrics can be wiped carefully with a damp cloth, while delicate zebra and curtain fabrics should be spot-cleaned without soaking. Motorized systems should be operated periodically and recharged as recommended. Clear care guidance helps the fabric, hardware, and motor continue to look and perform properly after installation.</p>

			<div class="hb-city-cta"><div><h2>Book a Free <?php echo esc_html( $city ); ?> Consultation</h2><p>Tell us what you need from the room—privacy, daylight, glare reduction, blackout, child safety, or motorized control—and we will bring suitable options.</p></div><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Get Free Estimate <?php highend_arrow(); ?></a></div>
			<nav class="hb-city-nav" aria-label="Service area navigation"><a href="<?php echo esc_url( home_url( '/service-areas/' ) ); ?>">All service areas</a><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">View installations</a><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About our Edmonton factory</a></nav>
		</div>
	</article>
	<?php
}
