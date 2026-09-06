<?php
/**
 * Blog index / archive template (Posts page, categories, tags, search).
 *
 * @package HighEnd_Blinds
 */
get_header();

if ( is_home() ) {
	$title = get_the_title( get_option( 'page_for_posts' ) ) ? get_the_title( get_option( 'page_for_posts' ) ) : 'Our Blog';
} elseif ( is_category() ) {
	$title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$title = single_tag_title( '', false );
} elseif ( is_search() ) {
	$title = sprintf( 'Search results for &ldquo;%s&rdquo;', get_search_query() );
} elseif ( is_archive() ) {
	$title = get_the_archive_title();
} else {
	$title = 'Blog';
}
?>

<section class="hb-archive-head">
	<div class="eyebrow">HighEnd Blinds</div>
	<h1><?php echo wp_kses_post( $title ); ?></h1>
</section>

<section class="hb-blog hb-sec">
	<div class="hb-wrap">
		<div class="hb-blog-grid">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$cats = get_the_category();
					$cat  = $cats ? $cats[0]->name : 'Blog';
					?>
					<a class="hb-post" href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="thumb"><?php the_post_thumbnail( 'highend_wide' ); ?></div>
						<?php else : ?>
							<div class="thumb ph"><span><?php echo esc_html( $cat ); ?></span></div>
						<?php endif; ?>
						<div class="body">
							<div class="meta"><span><?php echo esc_html( $cat ); ?></span><span style="color:#c9c1b2">&bull;</span><span class="date"><?php echo esc_html( get_the_date() ); ?></span></div>
							<div class="title"><?php the_title(); ?></div>
							<div class="excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></div>
							<span class="more">Read More <?php highend_arrow(); ?></span>
						</div>
					</a>
					<?php
				endwhile;
			else :
				echo '<p style="grid-column:1/-1;color:var(--muted)">No posts found. Add your first post in <strong>WP Admin &rarr; Posts &rarr; Add New</strong>.</p>';
			endif;
			?>
		</div>
		<?php
		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '&larr; Prev',
			'next_text' => 'Next &rarr;',
			'class'     => 'hb-pagination',
		) );
		?>
	</div>
</section>

<?php get_footer(); ?>
