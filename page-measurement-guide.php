<?php
/** Measurement Guide page. */
get_header();
?>
<section style="background:#151515;color:#fff">
	<div class="hb-wrap" style="padding:60px 20px">
		<div style="font-size:12px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#C9973E">Customer Care</div>
		<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(2rem,4vw,3rem);line-height:1.1;margin:12px 0 0">Window Measurement Guide</h1>
		<p style="margin-top:16px;color:#C9CDD2;line-height:1.7;max-width:62ch">Measuring instructions by mount — inside mount and outside mount — plus why our free in-home measurement still matters.</p>
	</div>
</section>

<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding:54px 20px 70px;max-width:980px">
		<div style="background:#fff;border:1px solid #E8DFD0;border-radius:20px;padding:clamp(24px,4vw,42px);box-shadow:0 16px 45px rgba(40,31,20,.07)">
			<p style="font-size:16px;line-height:1.75;color:#3a352d;margin:0 0 28px">Every custom blind or curtain is built to the exact size of your window, so accurate measurement matters. Below are our measuring instructions by mount type. We still recommend a free in-home measurement before ordering — our team takes all required manufacturing allowances for you.</p>

			<div style="display:grid;grid-template-columns:auto 1fr;gap:24px;align-items:start;margin-bottom:36px">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/measurement-inside-mount.gif' ); ?>" alt="Inside mount window measurement diagram showing width and height measurement points" style="width:150px;height:auto;flex-shrink:0">
				<div>
					<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">Inside mount</h2>
					<ul style="display:grid;gap:12px;margin:0;padding-left:22px;line-height:1.65;color:#3a352d">
						<li>Measure the width inside the window opening at the top, middle, and bottom. Take the narrowest of the three measurements, and round down to the nearest 1/8″.</li>
						<li>Measure the height inside the window opening at the left, centre, and right, from the top of the opening to the sill. Take the longest of the three measurements. To keep the blind from resting on the sill, deduct 1/4″ from the height. If there's no sill, measure to the point you'd like the blind to reach.</li>
						<li>Measure the window on the diagonal. If the two diagonal measurements differ significantly, an outside mount may give better light control and privacy instead.</li>
						<li>Don't take any allowances on the height or width yourself — our factory takes all required allowances for mounting and operating clearance.</li>
					</ul>
				</div>
			</div>

			<div style="display:grid;grid-template-columns:auto 1fr;gap:24px;align-items:start;margin-bottom:36px">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/measurement-outside-mount.gif' ); ?>" alt="Outside mount window measurement diagram showing width and height measurement points" style="width:150px;height:auto;flex-shrink:0">
				<div>
					<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">Outside mount</h2>
					<ul style="display:grid;gap:12px;margin:0;padding-left:22px;line-height:1.65;color:#3a352d">
						<li>Measure the full width you'd like covered. To minimize light leakage, the blind should overlap the window opening by at least 1-1/2″ on each side (3″ total across the width).</li>
						<li>Measure from where the top of the blind will sit down to the sill. The blind should overlap the opening at the top by at least 1-1/2″ — some products need more clearance for mounting hardware, so we'll confirm the exact amount for your chosen product. If there's no sill, measure to the point you'd like the blind to reach.</li>
					</ul>
				</div>
			</div>

			<div style="background:#F7F3EC;border-left:4px solid #C9973E;border-radius:12px;padding:22px 24px;margin-bottom:30px">
				<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.45rem;margin:0 0 10px">Why we still measure for you</h2>
				<p style="margin:0;color:#3a352d;line-height:1.7">Tall or two-storey windows, out-of-square openings, and motorized tracks all have their own tolerances that are easy to miss without experience. Every HighEnd Blinds order includes a free in-home measurement by our own team before we manufacture anything, so the final fit is exact.</p>
			</div>

			<div style="display:flex;flex-wrap:wrap;gap:14px;align-items:center;justify-content:space-between;border-top:1px solid #E8DFD0;padding-top:26px">
				<div><strong style="display:block;color:#151515">Ready to get your windows measured?</strong><span style="display:block;color:#625E57;font-size:14px;margin-top:4px">Book a free in-home consultation and we'll measure every window for you.</span></div>
				<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Book Free Consultation <?php highend_arrow(); ?></a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
