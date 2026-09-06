<?php
/**
 * Template Name: About Us
 */
get_header();
?>
<section style="background:#151515;color:#fff">
	<div class="hb-wrap" style="padding:64px 20px">
		<div style="font-size:11.5px;font-weight:800;letter-spacing:.2em;text-transform:uppercase;color:#C9973E">About HighEnd Blinds</div>
		<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.9rem,3.6vw,2.7rem);line-height:1.1;margin-top:12px;max-width:26ch">Edmonton's own factory-direct blind maker</h1>
		<p style="margin-top:18px;font-size:16px;line-height:1.7;color:#B9C2CE;max-width:62ch">For more than 12 years, we have designed, manufactured, and installed zebra blinds, roller blinds, dream curtains, and motorized window coverings — all made locally in Edmonton.</p>
	</div>
</section>
<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding:56px 20px;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:22px">
		<div style="background:#fff;border:1px solid #E8DFD0;border-radius:20px;padding:28px">
			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:22px;color:#151515;margin:0">Why we started HighEnd Blinds</h2>
			<p style="margin-top:14px;font-size:15px;line-height:1.7;color:#2b2620">Edmonton homeowners were used to ordering blinds from big-box catalogs, waiting weeks, and calling a national hotline if anything went wrong. We started HighEnd Blinds to fix that.</p>
			<p style="margin-top:14px;font-size:15px;line-height:1.7;color:#2b2620">That factory-direct model is why we can offer a free in-home consultation with real fabric samples, a written quote on the spot, and installation by our own trained team — not a subcontractor.</p>
		</div>
		<div style="background:#fff;border:1px solid #E8DFD0;border-radius:20px;padding:28px">
			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:22px;color:#151515;margin:0">What sets us apart</h2>
			<ul style="display:flex;flex-direction:column;gap:14px;margin-top:18px;padding:0;list-style:none">
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">—</span>More than 12 years in the blinds business</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">—</span>Thousands of satisfied clients</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">—</span>Manufactured in our own Edmonton facility, not imported</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">—</span>Free in-home measurement &amp; consultation</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">—</span>Licensed, insured, in-house installation team</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">—</span>4.8 rating across 556+ Google reviews</li>
			</ul>
		</div>
		<div style="background:#fff;border:1px solid #E8DFD0;border-radius:20px;padding:28px;grid-column:1/-1">
			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:22px;color:#151515;margin:0">How we work</h2>
			<ul style="display:flex;flex-direction:column;gap:14px;margin-top:18px;padding:0;list-style:none">
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">01</span>Free in-home visit — we measure and bring real samples</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">02</span>Your blinds or curtains are custom-made in our Edmonton facility</li>
				<li style="display:flex;gap:11px;font-size:14.5px;line-height:1.6;color:#2b2620"><span style="color:#C9973E;font-weight:800">03</span>Our own installers fit and finish the job — no subcontractors</li>
			</ul>
		</div>
		<div style="grid-column:1/-1;background:#151515;color:#F8F6F1;border-radius:20px;padding:34px;display:flex;flex-wrap:wrap;gap:20px;align-items:center;justify-content:space-between">
			<div>
				<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:24px;margin:0">Visit our Parsons Road showroom &amp; factory</h2>
				<p style="margin-top:10px;font-size:14.5px;line-height:1.7;color:#B9C2CE;max-width:56ch">See fabric samples in person and watch how your blinds are made — <?php echo esc_html( HIGHEND_ADDR ); ?></p>
			</div>
			<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" style="display:inline-flex;background:#C9973E;color:#151515;border-radius:999px;padding:15px 28px;font-size:14.5px;font-weight:800;white-space:nowrap">Book Free Estimate <?php highend_arrow(); ?></a>
		</div>
	</div>
</section>
<?php get_footer(); ?>
