<?php
/**
 * Single post template.
 *
 * @package HighEnd_Blinds
 */
get_header();

while ( have_posts() ) : the_post();
	$cats = get_the_category();
	$cat  = $cats ? $cats[0]->name : '';
	?>
	<article class="hb-article">
		<?php if ( $cat ) : ?><div class="pmeta"><?php echo esc_html( $cat ); ?></div><?php endif; ?>
		<h1><?php the_title(); ?></h1>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;border-radius:16px;margin:0 0 28px' ) ); ?>
		<?php elseif ( highend_post_card_image( get_the_ID() ) ) : ?>
			<img src="<?php echo esc_url( highend_post_card_image( get_the_ID() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" style="width:100%;max-height:520px;object-fit:cover;border-radius:16px;margin:0 0 28px">
		<?php endif; ?>
		<div class="content"><?php the_content(); ?></div>
		<?php
		$related_product_links = array(
			'zebra-blinds-vs-roller-blinds-edmonton' => 'Compare our <a href="' . esc_url( home_url( '/zebra-blinds/' ) ) . '">custom Zebra Blinds Edmonton</a> with <a href="' . esc_url( home_url( '/roller-blinds/' ) ) . '">custom roller shades</a>, including privacy, light-filtering, blackout, and motorized options.',
			'vertical-blinds-vs-zebra-blinds-edmonton-guide' => 'See colours, band sizes, privacy options, and motor choices on our <a href="' . esc_url( home_url( '/zebra-blinds/' ) ) . '">custom Zebra Blinds Edmonton</a> page.',
			'blackout-blinds-what-actually-blocks-light' => 'Compare fabric and mounting choices on our <a href="' . esc_url( home_url( '/roller-blinds/' ) ) . '">blackout and light-filtering roller blinds</a> page.',
			'light-filtering-vs-blackout-blinds-edmonton' => 'Explore <a href="' . esc_url( home_url( '/roller-blinds/' ) ) . '">blackout and light-filtering roller blinds</a>, or compare them with adjustable <a href="' . esc_url( home_url( '/zebra-blinds/' ) ) . '">zebra blinds for Edmonton homes</a>.',
		);
		$article_slug = get_post_field( 'post_name', get_the_ID() );
		if ( isset( $related_product_links[ $article_slug ] ) ) :
			?>
			<aside aria-label="Related window coverings" style="margin-top:32px;padding:22px 24px;background:#F7F3EC;border-left:4px solid #C9973E;border-radius:12px;line-height:1.7">
				<strong style="display:block;margin-bottom:6px">Related window coverings</strong>
				<?php echo wp_kses_post( $related_product_links[ $article_slug ] ); ?>
			</aside>
		<?php endif; ?>
		<div style="margin-top:40px;padding-top:24px;border-top:1px solid var(--border);display:flex;flex-wrap:wrap;gap:14px;justify-content:space-between;align-items:center">
			<a class="btn btn--outline" href="<?php echo esc_url( get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' ) ); ?>">&larr; Back to Blog</a>
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Free Estimate <?php highend_arrow(); ?></a>
		</div>
	</article>
	<?php
endwhile;

get_footer();
