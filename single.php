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
		<div style="margin-top:40px;padding-top:24px;border-top:1px solid var(--border);display:flex;flex-wrap:wrap;gap:14px;justify-content:space-between;align-items:center">
			<a class="btn btn--outline" href="<?php echo esc_url( get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' ) ); ?>">&larr; Back to Blog</a>
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Free Estimate <?php highend_arrow(); ?></a>
		</div>
	</article>
	<?php
endwhile;

get_footer();
