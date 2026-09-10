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
			<?php $hb_gallery_photos = highend_gallery_images(); ?>
			<?php foreach ( $hb_gallery_photos as $hb_gi => $src ) : ?>
				<a href="<?php echo esc_url( $src ); ?>" data-gallery="hb-gallery" onclick="event.preventDefault();hbOpenGallery(<?php echo (int) $hb_gi; ?>);" class="cell" style="display:block;border-radius:12px;overflow:hidden;aspect-ratio:1/1">
					<img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( highend_gallery_alt( $src, $hb_gi ) ); ?>" loading="lazy" style="width:100%;height:100%;object-fit:cover;display:block">
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
