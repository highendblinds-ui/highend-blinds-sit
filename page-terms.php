<?php
/**
 * Template Name: Terms of Service
 */
get_header();
?>
<article class="hb-article">
	<h1>Terms of Service</h1>
	<div class="content">
		<p>By using this website or requesting a quote from HighEnd Blinds, you agree to the following terms.</p>
		<h2>Estimates &amp; quotes</h2>
		<p>In-home measurements and quotes are free and carry no obligation to purchase. Final pricing is confirmed in writing before any order is placed.</p>
		<h2>Custom orders</h2>
		<p>Blinds and curtains are made to your exact window measurements. Once production begins on a confirmed order, custom items cannot be cancelled or returned except for manufacturing defects.</p>
		<h2>Installation</h2>
		<p>Installation is carried out by our own trained team. Any warranty on materials or workmanship will be provided in your written quote.</p>
		<h2>Contact</h2>
		<p>Questions about these terms can be sent to <a href="mailto:<?php echo esc_attr( HIGHEND_EMAIL ); ?>"><?php echo esc_html( HIGHEND_EMAIL ); ?></a>.</p>
		<p><em>Last updated: <?php echo esc_html( date( 'F Y' ) ); ?></em></p>
	</div>
</article>
<?php get_footer(); ?>
