<?php
/**
 * Template Name: Gallery
 */
get_header();
?>
<section style="background:#fff">
	<div class="hb-wrap" style="padding:56px 20px 72px;text-align:center">
		<div style="font-size:12.5px;font-weight:700;letter-spacing:.16em;color:#C9973E;text-transform:uppercase;margin-bottom:12px">Our Gallery</div>
		<h1 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.7rem,3vw,2.2rem);margin:0 0 36px">Real Installations Across Edmonton</h1>
		<div class="hb-gallery-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;text-align:left">
			<?php for ( $i = 1; $i <= 17; $i++ ) :
				$num = str_pad( $i, 2, '0', STR_PAD_LEFT );
				$src = get_template_directory_uri() . '/assets/images/gallery-' . $num . '.jpg';
				?>
				<a href="<?php echo esc_url( $src ); ?>" data-gallery="hb-gallery" onclick="event.preventDefault();hbOpenGallery(<?php echo (int) ( $i - 1 ); ?>);" class="cell" style="display:block;border-radius:12px;overflow:hidden;aspect-ratio:1/1">
					<img src="<?php echo esc_url( $src ); ?>" alt="HighEnd Blinds installation photo <?php echo esc_attr( $i ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block">
				</a>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
