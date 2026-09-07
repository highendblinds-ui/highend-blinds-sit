<?php
/**
 * Header template.
 *
 * @package HighEnd_Blinds
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="hb-skip" href="#hb-content"><?php esc_html_e( 'Skip to content', 'highend-blinds' ); ?></a>

<div class="hb-topbar">
	<div class="hb-wrap">
		<div class="hb-tb-item hb-rating"><span class="ico"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.5 7 .7-5.2 4.7 1.5 6.9L12 17.8 5.7 21.5l1.5-6.9L2 9.9l7-.7z"></path></svg></span><strong style="color:#3a352d;font-weight:700">4.8</strong>&nbsp;Google Rated Manufacturer</div>
		<div class="hb-tb-item hb-addr"><span class="ico"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s7-6.6 7-12a7 7 0 1 0-14 0c0 5.4 7 12 7 12z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></span><?php echo esc_html( HIGHEND_ADDR ); ?></div>
		<div class="hb-social">
			<a class="hb-tb-phone" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', HIGHEND_PHONE ) ); ?>"><span class="ico"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"><path d="M5 3h4l2 5-3 2a12 12 0 0 0 6 6l2-3 5 2v4a2 2 0 0 1-2 2A18 18 0 0 1 3 5a2 2 0 0 1 2-2z"></path></svg></span><?php echo esc_html( HIGHEND_PHONE ); ?></a>
			<a href="https://www.instagram.com/highendblinds?igsi=YWpweHR2bTMyMHoy&utm_source=qr" target="_blank" rel="noopener" aria-label="Instagram"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"></circle></svg></a>
			<a href="https://share.google/DpDn1awWkUwqHFZyt" target="_blank" rel="noopener" aria-label="Google"><svg width="15" height="15" viewBox="0 0 24 24"><path fill="#4285F4" d="M23 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.2a5.3 5.3 0 0 1-2.3 3.5v2.9h3.7c2.2-2 3.4-5 3.4-8.6z"></path><path fill="#34A853" d="M12 24c3.1 0 5.7-1 7.6-2.8l-3.7-2.9c-1 .7-2.3 1.1-3.9 1.1-3 0-5.5-2-6.4-4.7H1.8v3C3.7 21.4 7.5 24 12 24z"></path><path fill="#FBBC05" d="M5.6 14.7a7.2 7.2 0 0 1 0-4.6v-3H1.8a12 12 0 0 0 0 10.6z"></path><path fill="#EA4335" d="M12 4.8c1.7 0 3.2.6 4.4 1.7l3.3-3.3C17.7 1.2 15.1 0 12 0 7.5 0 3.7 2.6 1.8 6.4l3.8 3c.9-2.7 3.4-4.6 6.4-4.6z"></path></svg></a>
		</div>
	</div>
</div>

<header class="hb-header">
	<div class="hb-wrap">
		<?php highend_logo( 54 ); ?>
		<div class="hb-sticky-social" aria-label="Follow HighEnd Blinds">
			<a href="https://www.instagram.com/highendblinds?igsi=YWpweHR2bTMyMHoy&utm_source=qr" target="_blank" rel="noopener" aria-label="Follow HighEnd Blinds on Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"></circle></svg></a>
			<a href="https://share.google/DpDn1awWkUwqHFZyt" target="_blank" rel="noopener" aria-label="View HighEnd Blinds on Google"><svg viewBox="0 0 24 24"><path fill="#4285F4" d="M23 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.2a5.3 5.3 0 0 1-2.3 3.5v2.9h3.7c2.2-2 3.4-5 3.4-8.6z"></path><path fill="#34A853" d="M12 24c3.1 0 5.7-1 7.6-2.8l-3.7-2.9c-1 .7-2.3 1.1-3.9 1.1-3 0-5.5-2-6.4-4.7H1.8v3C3.7 21.4 7.5 24 12 24z"></path><path fill="#FBBC05" d="M5.6 14.7a7.2 7.2 0 0 1 0-4.6v-3H1.8a12 12 0 0 0 0 10.6z"></path><path fill="#EA4335" d="M12 4.8c1.7 0 3.2.6 4.4 1.7l3.3-3.3C17.7 1.2 15.1 0 12 0 7.5 0 3.7 2.6 1.8 6.4l3.8 3c.9-2.7 3.4-4.6 6.4-4.6z"></path></svg></a>
		</div>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => 'nav',
				'menu_class'     => 'hb-nav',
				'depth'          => 1,
				'fallback_cb'    => 'highend_default_nav',
			) );
		} else {
			highend_default_nav();
		}
		?>
		<a class="btn btn--primary btn--sm hb-header-cta" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"><path d="M4 7h16v12H4z"></path><path d="M4 7l8 6 8-6"></path></svg><?php esc_html_e( 'Free Estimate', 'highend-blinds' ); ?></a>
		<button type="button" class="hb-burger" aria-label="Menu" aria-expanded="false">
			<svg class="hb-burger-open" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"></path></svg>
			<svg class="hb-burger-close" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 5l14 14M19 5L5 19"></path></svg>
		</button>
	</div>
</header>

<?php
/**
 * Fallback nav when no menu is assigned. Links to home-page sections.
 */
function highend_default_nav() {
	$home = home_url( '/' );
	echo '<nav class="hb-nav">';
	echo '<a class="current" href="' . esc_url( $home ) . '">Home</a>';
	echo '<details class="hb-nav-dd"><summary>Products <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M6 9l6 6 6-6"></path></svg></summary><div>';
	echo '<a href="' . esc_url( home_url( '/zebra-blinds/' ) ) . '">Zebra <span style="color:var(--brand-red)">Blinds</span></a>';
	echo '<a href="' . esc_url( home_url( '/roller-blinds/' ) ) . '">Roller <span style="color:var(--brand-red)">Blinds</span></a>';
	echo '<a href="' . esc_url( home_url( '/curtains/' ) ) . '">Dream <span style="color:var(--brand-red)">Curtains</span></a>';
	echo '<a href="' . esc_url( home_url( '/motorized-blinds/' ) ) . '">Motorized <span style="color:var(--brand-red)">Blinds</span></a>';
	echo '<a href="' . esc_url( home_url( '/motorized-curtains/' ) ) . '">Motorized <span style="color:var(--brand-red)">Curtains</span></a>';
	echo '</div></details>';
	echo '<a href="' . esc_url( $home . '#gallery' ) . '">Gallery</a>';
	echo '<a href="' . esc_url( $home . '#reviews' ) . '">Reviews</a>';
	echo '<a href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ? get_permalink( get_option( 'page_for_posts' ) ) : $home . '#blog' ) . '">Blog</a>';
	echo '<a href="' . esc_url( home_url( '/about-us/' ) ) . '">About</a>';
	echo '<a href="' . esc_url( home_url( '/contact-us/' ) ) . '">Contact</a>';
	echo '</nav>';
}
?>

<main id="hb-content">
