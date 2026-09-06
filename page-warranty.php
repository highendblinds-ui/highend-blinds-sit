<?php
/** Warranty page. */
get_header();
?>
<section style="background:#151515;color:#fff">
	<div class="hb-wrap" style="padding:60px 20px">
		<div style="font-size:12px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#C9973E">Customer Care</div>
		<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(2rem,4vw,3rem);line-height:1.1;margin:12px 0 0">Product &amp; Installation Warranty</h1>
		<p style="margin-top:16px;color:#C9CDD2;line-height:1.7;max-width:62ch">Warranty information for blinds, components, motors, curtains, drapery, and installation by HighEnd Blinds Inc.</p>
	</div>
</section>

<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding:54px 20px 70px;max-width:980px">
		<div style="background:#fff;border:1px solid #E8DFD0;border-radius:20px;padding:clamp(24px,4vw,42px);box-shadow:0 16px 45px rgba(40,31,20,.07)">
			<p style="font-size:16px;line-height:1.75;color:#3a352d;margin:0 0 28px">HighEnd Blinds products are covered against defects in materials, workmanship, or failure to operate, subject to the coverage and exclusions below.</p>

			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">What is covered</h2>
			<ul style="display:grid;gap:12px;margin:0 0 36px;padding-left:22px;line-height:1.65;color:#3a352d">
				<li>All internal mechanisms.</li>
				<li>Components and brackets.</li>
				<li>Operational cords for chained products.</li>
				<li>Repair or replacement with like or similar parts or products available at that time.</li>
				<li>Motors are covered for two years. Power-supply accessories are excluded.</li>
				<li>Installation warranty and service calls are free for one year after product installation.</li>
			</ul>

			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">What is not covered</h2>
			<ul style="display:grid;gap:12px;margin:0 0 36px;padding-left:22px;line-height:1.65;color:#3a352d">
				<li>Damage or defects caused by normal wear and tear.</li>
				<li>Abuse, accidental fabric tears, misuse, or alterations to the product.</li>
				<li>Wind damage, water damage, or discolouration over time.</li>
				<li>Removal and reinstallation requested for window-glass replacement before one year, or for any reason after one year.</li>
			</ul>

			<div style="background:#F7F3EC;border-left:4px solid #C9973E;border-radius:12px;padding:22px 24px;margin-bottom:30px">
				<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.45rem;margin:0 0 10px">Curtains and drapery</h2>
				<p style="margin:0;color:#3a352d;line-height:1.7">HighEnd Blinds provides a 30-day installation warranty for drapery installations. Customers must report requested installation adjustments within this period. After 30 days, installer visits are chargeable.</p>
			</div>

			<div style="display:flex;flex-wrap:wrap;gap:14px;align-items:center;justify-content:space-between;border-top:1px solid #E8DFD0;padding-top:26px">
				<div><strong style="display:block;color:#151515">Questions about your warranty?</strong><span style="display:block;color:#625E57;font-size:14px;margin-top:4px">Have your invoice or installation date ready when contacting us.</span></div>
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <?php highend_arrow(); ?></a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
