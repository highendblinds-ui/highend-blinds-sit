<?php
/** Measurement Guide page. */
get_header();
?>
<section style="background:#151515;color:#fff">
	<div class="hb-wrap" style="padding:60px 20px">
		<div style="font-size:12px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:#C9973E">Customer Care</div>
		<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(2rem,4vw,3rem);line-height:1.1;margin:12px 0 0">Window Measurement Guide</h1>
		<p style="margin-top:16px;color:#C9CDD2;line-height:1.7;max-width:62ch">How inside-mount and outside-mount measurements work for custom blinds and curtains — plus why our free in-home measurement still matters.</p>
	</div>
</section>

<section style="background:#F7F3EC">
	<div class="hb-wrap" style="padding:54px 20px 70px;max-width:980px">
		<div style="background:#fff;border:1px solid #E8DFD0;border-radius:20px;padding:clamp(24px,4vw,42px);box-shadow:0 16px 45px rgba(40,31,20,.07)">
			<p style="font-size:16px;line-height:1.75;color:#3a352d;margin:0 0 28px">Every custom blind or curtain is built to the exact size of your window, so accurate measurement matters. This guide explains how the two main mounting styles are measured. We still recommend a free in-home measurement before ordering — a stud finder, tape measure error, or an out-of-square frame can easily throw off a DIY number by enough to matter.</p>

			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">What you'll need</h2>
			<ul style="display:grid;gap:12px;margin:0 0 36px;padding-left:22px;line-height:1.65;color:#3a352d">
				<li>A steel tape measure (fabric tape measures stretch and lose accuracy).</li>
				<li>A pencil and paper, or your phone's notes app.</li>
				<li>A step stool for taller windows.</li>
			</ul>

			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">Inside mount</h2>
			<p style="margin:0 0 16px;color:#3a352d;line-height:1.7">An inside mount fits within the window frame itself, giving a clean, built-in look.</p>
			<ul style="display:grid;gap:12px;margin:0 0 36px;padding-left:22px;line-height:1.65;color:#3a352d">
				<li><strong>Width:</strong> measure the inside of the frame at the top, middle, and bottom. Frames are rarely perfectly square — use the narrowest of the three measurements.</li>
				<li><strong>Height:</strong> measure the inside of the frame on the left, centre, and right. Use the longest of the three measurements.</li>
				<li><strong>Depth:</strong> check the frame has enough depth for the mounting brackets and, if motorized, the motor housing.</li>
			</ul>

			<h2 style="font-family:'Playfair Display',Georgia,serif;font-size:1.7rem;margin:0 0 16px">Outside mount</h2>
			<p style="margin:0 0 16px;color:#3a352d;line-height:1.7">An outside mount attaches to the wall or trim above the window, covering the full opening — a good option when a frame is too shallow for an inside mount, or when you want fuller light and privacy coverage.</p>
			<ul style="display:grid;gap:12px;margin:0 0 36px;padding-left:22px;line-height:1.65;color:#3a352d">
				<li><strong>Width:</strong> measure the full width you want covered, typically extending 3–4 inches beyond the frame on each side for better light blockage and privacy.</li>
				<li><strong>Height:</strong> measure from where the top of the hardware will sit down to where you want the covering to end.</li>
				<li><strong>Mounting surface:</strong> confirm the wall or trim above the window can support the bracket hardware.</li>
			</ul>

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
