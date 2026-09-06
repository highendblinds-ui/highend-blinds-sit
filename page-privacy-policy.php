<?php
/**
 * Template Name: Privacy Policy
 */
get_header();
?>
<article class="hb-article">
	<h1>Privacy Policy</h1>
	<div class="content">
		<p>HighEnd Blinds ("we", "us") respects your privacy. This policy explains what information we collect through this website and how we use it.</p>
		<h2>Information we collect</h2>
		<p>When you submit our contact or estimate form, we collect your name, phone number, email address, and any message or product details you provide. We do not collect payment information through this website.</p>
		<h2>How we use it</h2>
		<p>We use your information solely to respond to your inquiry, schedule an in-home consultation, and provide a quote. We do not sell or rent your information to third parties.</p>
		<h2>Contact</h2>
		<p>Questions about this policy can be sent to <a href="mailto:<?php echo esc_attr( HIGHEND_EMAIL ); ?>"><?php echo esc_html( HIGHEND_EMAIL ); ?></a> or <?php echo esc_html( HIGHEND_ADDR ); ?>.</p>
		<p><em>Last updated: <?php echo esc_html( date( 'F Y' ) ); ?></em></p>
	</div>
</article>
<?php get_footer(); ?>
