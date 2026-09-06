<?php
/**
 * Template Name: Blog
 */
get_header();
?>
<section class="hb-archive-head">
	<div class="eyebrow">HighEnd Blinds</div>
	<h1><?php the_title(); ?></h1>
</section>
<section class="hb-blog hb-sec">
	<div class="hb-wrap">
		<div class="hb-blog-grid">
			<?php
			$q = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 24, 'paged' => max( 1, get_query_var( 'paged' ) ) ) );
			if ( $q->have_posts() ) :
				while ( $q->have_posts() ) : $q->the_post();
					$cats = get_the_category();
					$cat  = $cats ? $cats[0]->name : 'Blog';
					$card_image = highend_post_card_image( get_the_ID() );
					?>
					<a class="hb-post" href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="thumb"><?php the_post_thumbnail( 'highend_wide' ); ?></div>
						<?php elseif ( $card_image ) : ?>
							<div class="thumb"><img src="<?php echo esc_url( $card_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></div>
						<?php else : ?>
							<div class="thumb ph"><span><?php echo esc_html( $cat ); ?></span></div>
						<?php endif; ?>
						<div class="body">
							<div class="meta"><span><?php echo esc_html( $cat ); ?></span></div>
							<div class="title"><?php the_title(); ?></div>
							<div class="excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></div>
							<span class="more">Read More <?php highend_arrow(); ?></span>
						</div>
					</a>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p style="grid-column:1/-1;color:var(--muted)">No posts yet. Add your first post in <strong>WP Admin &rarr; Posts &rarr; Add New</strong>.</p>';
			endif;
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
