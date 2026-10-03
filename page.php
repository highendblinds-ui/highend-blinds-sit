<?php
/**
 * Static page template.
 *
 * @package HighEnd_Blinds
 */
get_header();

if ( is_page( 'smart-blinds-edmonton' ) && function_exists( 'highend_render_product_page' ) ) {
	highend_render_product_page( 'smart-blinds' );
	get_footer();
	return;
}

while ( have_posts() ) : the_post();
	?>
	<article class="hb-article"<?php echo is_page( 'blackout-blinds-edmonton' ) ? ' style="max-width:1280px"' : ''; ?>>
		<h1><?php the_title(); ?></h1>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;border-radius:16px;margin:0 0 28px' ) ); ?>
		<?php endif; ?>
		<div class="content"><?php the_content(); ?></div>
		<?php if ( is_page( 'blackout-blinds-edmonton' ) ) : ?>
			<aside aria-label="Compare window coverings" style="margin-top:30px;padding:22px 24px;background:#F7F3EC;border-left:4px solid #C9973E;border-radius:12px;line-height:1.7">
				<strong style="display:block;margin-bottom:6px">Compare window coverings</strong>
				For specialized room-darkening fabrics, explore our <a href="<?php echo esc_url( home_url( '/roller-blinds/' ) ); ?>">blackout and light-filtering roller blinds</a>. If adjustable daylight and privacy are the priority, compare <a href="<?php echo esc_url( home_url( '/zebra-blinds/' ) ); ?>">custom Zebra Blinds Edmonton</a>.
			</aside>
		<?php endif; ?>
	</article>
	<?php
endwhile;

get_footer();
