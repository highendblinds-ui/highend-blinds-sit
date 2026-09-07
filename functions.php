<?php
/**
 * HighEnd Blinds theme functions.
 *
 * @package HighEnd_Blinds
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! defined( 'HIGHEND_PHONE' ) )  { define( 'HIGHEND_PHONE', '780-219-9999' ); }
if ( ! defined( 'HIGHEND_EMAIL' ) )  { define( 'HIGHEND_EMAIL', 'highendblinds@hotmail.com' ); }
if ( ! defined( 'HIGHEND_ADDR' ) )   { define( 'HIGHEND_ADDR', '3261 Parsons Rd NW, Edmonton, AB T6N 1B4' ); }
if ( ! defined( 'HIGHEND_NAME' ) )   { define( 'HIGHEND_NAME', 'HighEnd Blinds Inc.' ); }

/**
 * Edmonton-focused titles and descriptions for the site's permanent pages.
 */
function highend_seo_data() {
	return array(
		'home'               => array( 'Custom Blinds Edmonton | Zebra, Roller & Motorized Blinds | HighEnd Blinds', 'Custom blinds Edmonton homeowners trust — locally made zebra blinds, roller blinds, motorized blinds, and light-filtering Dream Curtains with privacy. Free in-home consultation and professional installation.' ),
		'zebra-blinds'       => array( 'Zebra Blinds Edmonton | HighEnd Blinds', 'Zebra blinds Edmonton homeowners trust — custom made with professional measurement, installation, light control, privacy, and motorized options.' ),
		'roller-blinds'      => array( 'Roller Blinds Edmonton | HighEnd Blinds', 'Roller blinds Edmonton homeowners trust — custom roller shades including blackout, sunscreen, privacy, cordless, and motorized options.' ),
		'curtains'           => array( 'Long Curtains Edmonton | HighEnd Blinds', 'Long curtains Edmonton homeowners choose for tall windows and patio doors — floor-to-ceiling Dream Curtains with light filtering, privacy, and motorized operation, custom measured and professionally installed.' ),
		'motorized-blinds'   => array( 'Motorized Blinds Edmonton | HighEnd Blinds', 'Motorized blinds Edmonton homeowners choose for smart, remote-control shades with rechargeable motors, app control, scheduling, and professional installation.' ),
		'motorized-curtains' => array( 'Motorized Curtains Edmonton | HighEnd Blinds', 'Motorized curtains Edmonton homeowners choose for light filtering with privacy, including patio doors, open-to-above family rooms, and normal-height windows.' ),
		'about-us'           => array( 'About HighEnd Blinds Inc. | Edmonton', 'Meet HighEnd Blinds Inc., an Edmonton manufacturer and installer of custom blinds, shades, curtains, and motorized window coverings.' ),
		'contact-us'         => array( 'Contact HighEnd Blinds Inc. | Edmonton', 'Contact HighEnd Blinds Inc. in Edmonton for a free in-home consultation, professional measurement, and custom window-covering estimate.' ),
		'gallery'            => array( 'Custom Blinds Gallery | Edmonton Projects', 'View custom zebra blinds, roller blinds, curtains, and motorized window-covering installations completed across Edmonton and area.' ),
		'service-areas'      => array( 'Blinds Service Areas Near Edmonton | HighEnd Blinds', 'HighEnd Blinds provides free measurement and professional installation in Edmonton, St. Albert, Sherwood Park, Beaumont, Leduc, Spruce Grove, Fort Saskatchewan, and nearby communities.' ),
		'edmonton'           => array( 'Custom Blinds Edmonton | Measurement & Installation', 'Custom blinds Edmonton homeowners trust — locally manufactured and professionally installed. Explore zebra, roller, blackout, sunscreen, Dream Curtain, and motorized options.' ),
		'sherwood-park'      => array( 'Custom Blinds Sherwood Park | HighEnd Blinds', 'Custom blinds Sherwood Park homeowners trust — free in-home consultation, precise measurement, local manufacturing, and professional installation.' ),
		'st-albert'          => array( 'Custom Blinds St. Albert | HighEnd Blinds', 'Custom blinds St. Albert homeowners trust — motorized window coverings made locally with free measurement and professional installation.' ),
		'beaumont'           => array( 'Custom Blinds Beaumont | HighEnd Blinds', 'Custom blinds Beaumont homeowners trust — made-to-measure blinds and motorized window coverings, with local manufacturing and professional installation.' ),
		'leduc'              => array( 'Custom Blinds Leduc | HighEnd Blinds', 'Custom blinds Leduc homeowners trust — zebra, roller, blackout, sunscreen, and motorized options, with free consultation and professional installation.' ),
		'spruce-grove'       => array( 'Custom Blinds Spruce Grove | HighEnd Blinds', 'Custom blinds Spruce Grove homeowners trust — in-home fabric guidance, exact measurement, Edmonton manufacturing, and professional installation.' ),
		'fort-saskatchewan'  => array( 'Custom Blinds Fort Saskatchewan | HighEnd Blinds', 'Custom blinds Fort Saskatchewan homeowners trust — residential and commercial, with local manufacturing, free measurement, and professional installation.' ),
		'blog'               => array( 'Blinds & Window Covering Blog | Edmonton', 'Helpful Edmonton guides about zebra blinds, roller blinds, motorized shades, curtains, installation, light control, and home automation.' ),
		'warranty'           => array( 'Blinds Warranty | HighEnd Blinds Edmonton', 'Review warranty coverage for blinds, components, motors, installation, curtains, and drapery supplied by HighEnd Blinds Inc. in Edmonton.' ),
	);
}

function highend_current_seo_key() {
	if ( is_front_page() ) { return 'home'; }
	if ( is_home() ) { return 'blog'; }
	if ( is_page() ) { return get_post_field( 'post_name', get_queried_object_id() ); }
	return '';
}

function highend_document_title( $title ) {
	$data = highend_seo_data();
	$key  = highend_current_seo_key();
	return isset( $data[ $key ] ) ? html_entity_decode( $data[ $key ][0], ENT_QUOTES, 'UTF-8' ) : $title;
}
add_filter( 'pre_get_document_title', 'highend_document_title', 9999 );

/* Output one deliberate canonical URL below instead of WordPress's default tag. */
remove_action( 'wp_head', 'rel_canonical' );

function highend_seo_head() {
	$data = highend_seo_data();
	$key  = highend_current_seo_key();
	if ( isset( $data[ $key ] ) ) {
		echo '<meta name="description" content="' . esc_attr( $data[ $key ][1] ) . '">' . "\n";
		$canonical = is_front_page() ? home_url( '/' ) : get_permalink();
		$images = array(
			'zebra-blinds' => 'zebra-blinds.jpg', 'roller-blinds' => 'roller-blinds.jpg',
			'curtains' => 'dream-curtain.jpg', 'motorized-blinds' => 'motorized-blinds.jpg',
			'motorized-curtains' => 'motorized-curtains.jpg', 'home' => 'hero-1.png',
		);
		$social_image = get_template_directory_uri() . '/assets/images/' . ( isset( $images[ $key ] ) ? $images[ $key ] : 'hero-1.png' );
		echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
		echo '<meta property="og:type" content="website">' . "\n";
		echo '<meta property="og:site_name" content="HighEnd Blinds">' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( html_entity_decode( $data[ $key ][0], ENT_QUOTES, 'UTF-8' ) ) . '">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $data[ $key ][1] ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
		echo '<meta property="og:image" content="' . esc_url( $social_image ) . '">' . "\n";
		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	}
	if ( is_front_page() ) {
		$business_schema = array(
			'@context' => 'https://schema.org',
			'@type' => 'HomeAndConstructionBusiness',
			'name' => HIGHEND_NAME,
			'alternateName' => 'HighEnd Blinds',
			'url' => home_url( '/' ),
			'image' => get_template_directory_uri() . '/assets/images/hero-1.png',
			'telephone' => '+1-780-219-9999',
			'email' => HIGHEND_EMAIL,
			'priceRange' => '$$',
			'description' => 'Edmonton manufacturer and installer of custom blinds, curtains, and motorized window coverings with over 12 years of experience.',
			'address' => array(
				'@type' => 'PostalAddress',
				'streetAddress' => '3261 Parsons Rd NW',
				'addressLocality' => 'Edmonton',
				'addressRegion' => 'AB',
				'postalCode' => 'T6N 1B4',
				'addressCountry' => 'CA',
			),
			'areaServed' => array( 'Edmonton', 'St. Albert', 'Sherwood Park', 'Beaumont', 'Leduc', 'Spruce Grove', 'Fort Saskatchewan' ),
			'sameAs' => array( 'https://www.instagram.com/highendblinds', 'https://share.google/DpDn1awWkUwqHFZyt' ),
			'aggregateRating' => array(
				'@type' => 'AggregateRating',
				'ratingValue' => '4.8',
				'reviewCount' => '559',
			),
		);
		$website_schema = array(
			'@context' => 'https://schema.org',
			'@type' => 'WebSite',
			'name' => 'HighEnd Blinds',
			'alternateName' => 'HighEnd Blinds Inc.',
			'url' => home_url( '/' ),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $business_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
		echo '<script type="application/ld+json">' . wp_json_encode( $website_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
	if ( is_page() && function_exists( 'highend_product_data' ) ) {
		$products = highend_product_data();
		if ( isset( $products[ $key ] ) ) {
			$product = $products[ $key ];
			$service_schema = array(
				'@context' => 'https://schema.org', '@type' => 'Service',
				'name' => wp_strip_all_tags( html_entity_decode( $product['title'] ) ),
				'description' => $product['intro'], 'url' => get_permalink(),
				'image' => get_template_directory_uri() . '/assets/images/' . $product['img'],
				'provider' => array( '@type' => 'HomeAndConstructionBusiness', 'name' => HIGHEND_NAME, 'telephone' => '+1-780-219-9999' ),
				'areaServed' => array( 'Edmonton', 'St. Albert', 'Sherwood Park', 'Beaumont', 'Leduc', 'Spruce Grove', 'Fort Saskatchewan' ),
			);
			$faq_schema = array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array() );
			foreach ( $product['faqs'] as $faq ) {
				$faq_schema['mainEntity'][] = array( '@type' => 'Question', 'name' => $faq[0], 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $faq[1] ) );
			}
			echo '<script type="application/ld+json">' . wp_json_encode( $service_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
			echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
		}
	}
	if ( 'service-areas' === $key ) {
		$area_schema = array(
			'@context' => 'https://schema.org', '@type' => 'Service',
			'name' => 'Custom Blinds Measurement and Installation Near Edmonton',
			'description' => $data[ $key ][1], 'url' => get_permalink(),
			'provider' => array( '@type' => 'HomeAndConstructionBusiness', 'name' => HIGHEND_NAME, 'telephone' => '+1-780-219-9999' ),
			'areaServed' => array( 'Edmonton', 'St. Albert', 'Sherwood Park', 'Beaumont', 'Leduc', 'Spruce Grove', 'Fort Saskatchewan' ),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $area_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
	if ( function_exists( 'highend_service_city_data' ) ) {
		$cities = highend_service_city_data();
		if ( isset( $cities[ $key ] ) ) {
			$city_schema = array(
				'@context' => 'https://schema.org', '@type' => 'Service',
				'name' => 'Custom Blinds in ' . $cities[ $key ]['city'], 'description' => $data[ $key ][1], 'url' => get_permalink(),
				'provider' => array( '@type' => 'HomeAndConstructionBusiness', 'name' => HIGHEND_NAME, 'telephone' => '+1-780-219-9999' ),
				'areaServed' => $cities[ $key ]['city'],
			);
			echo '<script type="application/ld+json">' . wp_json_encode( $city_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
		}
	}
}
add_action( 'wp_head', 'highend_seo_head', -999 );

/** Use the uploaded root favicon until a WordPress Site Icon is selected. */
function highend_favicon_fallback() {
	if ( ! has_site_icon() ) {
		echo '<link rel="icon" type="image/png" href="' . esc_url( home_url( '/favicon.png' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'highend_favicon_fallback', 3 );

/** Keep the temporary Hostinger address out of Google until the main domain is connected. */
function highend_temporary_site_robots( $robots ) {
	if ( false !== strpos( home_url(), '.hostingersite.com' ) ) {
		$robots['noindex'] = true;
		$robots['nofollow'] = false;
	}
	return $robots;
}
add_filter( 'wp_robots', 'highend_temporary_site_robots' );

/**
 * Theme setup.
 */
function highend_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 108, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'highend-blinds' ),
		'footer'  => __( 'Footer Menu', 'highend-blinds' ),
	) );

	add_image_size( 'highend_card', 600, 600, true );
	add_image_size( 'highend_wide', 640, 400, true );
}
add_action( 'after_setup_theme', 'highend_setup' );

/**
 * Enqueue styles & scripts.
 */
function highend_assets() {
	wp_enqueue_style(
		'highend-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);
	$style_ver = file_exists( get_stylesheet_directory() . '/style.css' ) ? filemtime( get_stylesheet_directory() . '/style.css' ) : wp_get_theme()->get( 'Version' );
	$js_ver    = file_exists( get_template_directory() . '/assets/main.js' ) ? filemtime( get_template_directory() . '/assets/main.js' ) : wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'highend-style', get_stylesheet_uri(), array( 'highend-fonts' ), $style_ver );
	wp_enqueue_script( 'highend-main', get_template_directory_uri() . '/assets/main.js', array(), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'highend_assets' );

/**
 * Trim excerpt length for cards.
 */
function highend_excerpt_length( $len ) { return 28; }
add_filter( 'excerpt_length', 'highend_excerpt_length' );
function highend_excerpt_more( $more ) { return '&hellip;'; }
add_filter( 'excerpt_more', 'highend_excerpt_more' );

/**
 * Output the HighEnd Blinds logo as inline SVG (icon + wordmark).
 * Uses the custom logo from Customizer if one is set, otherwise the built-in SVG.
 *
 * @param int $height Rendered height in px.
 */
function highend_logo( $height = 54 ) {
	if ( has_custom_logo() ) {
		$id  = get_theme_mod( 'custom_logo' );
		$img = wp_get_attachment_image( $id, 'full', false, array( 'style' => 'height:' . intval( $height ) . 'px;width:auto;', 'alt' => get_bloginfo( 'name' ) ) );
		echo '<a class="hb-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . $img . '</a>';
		return;
	}
	$slats = 'M161.065,118.508 L182.197,110.984 L182.261,118.723 L161.065,124.280 L161.065,127.163 L182.272,122.721 L181.958,130.462 L161.065,132.903 L161.065,136.522 L182.341,134.700 L182.341,139.831 L182.298,142.432 L133.322,142.337 L133.322,144.216 L182.341,146.000 L182.341,153.724 L160.743,151.064 L160.743,154.351 L182.341,157.836 L182.341,165.528 L160.743,160.225 L160.743,163.272 L182.341,169.233 L182.341,176.911 L160.743,168.972 L160.743,172.217 L182.341,180.940 L182.341,188.616 L133.322,164.715 L133.322,167.452 L135.088,167.452 L135.088,181.092 L133.322,181.092 L133.322,182.227 L130.606,182.227 L130.606,181.092 L128.841,181.092 L128.841,167.452 L130.606,167.452 L130.606,163.390 L123.799,160.070 L123.669,157.549 L123.690,157.251 L130.606,160.045 L130.606,157.895 L123.820,155.398 L123.977,153.123 L130.606,154.951 L130.606,152.828 L124.111,151.233 L124.302,148.475 L130.606,149.490 L130.606,147.351 L124.435,146.591 L124.623,143.899 L130.606,144.117 L130.606,142.332 L124.815,142.320 L124.802,141.338 L124.923,139.613 L130.606,139.126 L130.606,136.463 L125.456,137.062 L125.544,134.606 L130.606,133.545 L130.606,132.266 L125.456,133.617 L125.544,131.158 L130.606,129.356 C130.606,129.334 130.615,129.301 130.624,129.266 L161.065,118.454 Z Z M133.322,138.896 L157.702,136.810 L157.702,133.296 L133.322,136.145 Z Z M133.322,132.976 L157.702,127.867 L157.702,125.162 L133.322,131.552 Z Z M133.322,128.388 L157.702,119.706 Z Z M133.322,147.686 L133.322,149.929 L158.026,153.911 L158.026,150.729 Z Z M133.322,153.494 L133.322,155.702 L158.026,162.520 L158.026,159.557 Z Z M133.322,158.892 L133.322,161.142 L158.026,171.118 L158.026,167.972 Z';
	$ribbon = 'M108.620,100.907 L114.887,100.907 L179.921,101.690 L114.887,107.802 L114.887,191.642 L183.995,198.691 L114.887,198.224 L108.620,198.224 Z';
	?>
	<a class="hb-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="HighEnd Blinds — custom window coverings in Edmonton">
		<svg viewBox="105 98 220 106" style="height:<?php echo intval( $height ); ?>px;width:auto;display:block" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="HighEnd Blinds">
			<path d="<?php echo $ribbon; ?>" fill="#F5332A"></path>
			<path d="<?php echo $slats; ?>" fill="#151515"></path>
			<text x="0" y="0" transform="translate(193.18,140.22) scale(1.3354,1)" font-family="Arial, Helvetica, sans-serif" font-weight="700" font-size="24.16" fill="#151515">HighEnd</text>
			<text x="0" y="0" transform="translate(190.51,184.36) scale(0.8624,1)" font-family="Arial, Helvetica, sans-serif" font-weight="700" font-size="42.56" fill="#F5332A">BLINDS</text>
		</svg>
	</a>
	<?php
}

/**
 * Tiny arrow icon helper.
 */
function highend_arrow() {
	echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>';
}

/**
 * Returns every gallery image found in /assets/images/ (gallery-*.jpg), sorted in
 * numeric order. Powers the gallery lightbox/slider so it always includes every
 * photo that exists in the folder - no code changes needed when photos are added.
 */
function highend_gallery_images() {
	$files = glob( get_template_directory() . '/assets/images/gallery-*.jpg' );
	if ( ! $files ) {
		return array();
	}
	natsort( $files );
	$urls = array();
	foreach ( $files as $file ) {
		$urls[] = get_template_directory_uri() . '/assets/images/' . basename( $file );
	}
	return array_values( $urls );
}

/**
 * Handle the estimate/contact form submission — emails the lead and redirects back.
 */
function highend_handle_estimate_form() {
	if ( ! isset( $_POST['highend_nonce'] ) || ! wp_verify_nonce( $_POST['highend_nonce'], 'highend_estimate' ) ) {
		wp_die( 'Security check failed. Please go back and try again.' );
	}
	$name    = isset( $_POST['fullname'] ) ? sanitize_text_field( $_POST['fullname'] ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	$product = isset( $_POST['interest'] ) ? sanitize_text_field( $_POST['interest'] ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

	$body  = "New estimate request from the website:\n\n";
	$body .= "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nInterested in: {$product}\n\nMessage:\n{$message}\n";

	wp_mail( HIGHEND_EMAIL, 'New Free Estimate Request — ' . $name, $body, array( 'Reply-To: ' . $email ) );

	$redirect = ! empty( $_POST['redirect_to'] ) ? esc_url_raw( $_POST['redirect_to'] ) : home_url( '/' );
	wp_safe_redirect( add_query_arg( 'estimate_sent', '1', $redirect ) );
	exit;
}
add_action( 'admin_post_highend_estimate', 'highend_handle_estimate_form' );
add_action( 'admin_post_nopriv_highend_estimate', 'highend_handle_estimate_form' );

require_once get_template_directory() . '/inc-product-page.php';
require_once get_template_directory() . '/inc-service-cities.php';
require_once get_template_directory() . '/inc-simple-admin.php';

/**
 * Import the legacy HighEnd Blinds articles once. The bundled JSON contains
 * public content from highendblinds.com and a fresh theme image assignment.
 */
function highend_import_legacy_blog() {
	if ( get_option( 'highend_legacy_blog_imported_v4' ) ) { return; }
	$file = get_template_directory() . '/blog-import.json';
	if ( ! file_exists( $file ) ) { return; }
	$posts = json_decode( file_get_contents( $file ), true );
	if ( ! is_array( $posts ) ) { return; }
	foreach ( $posts as $item ) {
		$existing = get_page_by_path( sanitize_title( $item['slug'] ), OBJECT, 'post' );
		$postarr = array(
			'post_title'   => wp_strip_all_tags( html_entity_decode( $item['title'], ENT_QUOTES, 'UTF-8' ) ),
			'post_name'    => sanitize_title( $item['slug'] ),
			'post_content' => wp_kses_post( $item['content'] ),
			'post_excerpt' => wp_strip_all_tags( $item['excerpt'] ),
			'post_status'  => 'publish',
			'post_type'    => 'post',
		);
		if ( $existing ) { $postarr['ID'] = $existing->ID; }
		$id = wp_insert_post( $postarr );
		if ( ! is_wp_error( $id ) && ! empty( $item['image'] ) ) {
			update_post_meta( $id, '_highend_card_image', sanitize_file_name( $item['image'] ) );
		}
	}
	$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
	if ( $hello ) { wp_update_post( array( 'ID' => $hello->ID, 'post_status' => 'draft' ) ); }
	update_option( 'highend_legacy_blog_imported_v4', 1, false );
}
add_action( 'init', 'highend_import_legacy_blog', 20 );

function highend_post_card_image( $post_id ) {
	$file = get_post_meta( $post_id, '_highend_card_image', true );
	return $file ? get_template_directory_uri() . '/assets/images/' . rawurlencode( $file ) : '';
}

/**
 * Auto-create the required WordPress Pages (with matching slugs + templates)
 * if they don't already exist, so the theme's URLs work without manual setup.
 */
function highend_ensure_pages() {
	$pages = array(
		array( 'About Us', 'about-us', 'page-about-us.php' ),
		array( 'Contact Us', 'contact-us', 'page-contact-us.php' ),
		array( 'Gallery', 'gallery', 'page-gallery.php' ),
		array( 'Service Areas', 'service-areas', 'page-service-areas.php' ),
		array( 'Edmonton', 'edmonton', 'page-service-city.php' ),
		array( 'Sherwood Park', 'sherwood-park', 'page-service-city.php' ),
		array( 'St. Albert', 'st-albert', 'page-service-city.php' ),
		array( 'Beaumont', 'beaumont', 'page-service-city.php' ),
		array( 'Leduc', 'leduc', 'page-service-city.php' ),
		array( 'Spruce Grove', 'spruce-grove', 'page-service-city.php' ),
		array( 'Fort Saskatchewan', 'fort-saskatchewan', 'page-service-city.php' ),
		array( 'Terms of Service', 'terms', 'page-terms.php' ),
		array( 'Privacy Policy', 'privacy-policy', 'page-privacy-policy.php' ),
		array( 'Zebra Blinds', 'zebra-blinds', 'page-zebra-blinds.php' ),
		array( 'Roller Blinds', 'roller-blinds', 'page-roller-blinds.php' ),
		array( 'Curtains', 'curtains', 'page-curtains.php' ),
		array( 'Motorized Blinds', 'motorized-blinds', 'page-motorized-blinds.php' ),
		array( 'Motorized Curtains', 'motorized-curtains', 'page-motorized-curtains.php' ),
		array( 'Blog', 'blog', 'page-blog.php' ),
	);
	foreach ( $pages as $p ) {
		list( $title, $slug, $template ) = $p;
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			if ( get_post_meta( $existing->ID, '_wp_page_template', true ) !== $template ) {
				update_post_meta( $existing->ID, '_wp_page_template', $template );
			}
			continue;
		}
		$id = wp_insert_post( array(
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => '',
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, '_wp_page_template', $template );
		}
	}
}
add_action( 'init', 'highend_ensure_pages' );

/** Preserve visitors and search signals from misspelled URLs used by the old site. */
function highend_legacy_city_redirects() {
	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
	$redirects = array( 'sheerwood-park' => 'sherwood-park', 'beamount' => 'beaumont', 'spruce-groove' => 'spruce-grove' );
	if ( isset( $redirects[ $path ] ) ) {
		wp_safe_redirect( home_url( '/' . $redirects[ $path ] . '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'highend_legacy_city_redirects', 1 );
