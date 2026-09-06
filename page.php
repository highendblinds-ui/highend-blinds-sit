<?php
/**
 * Static page template.
 *
 * @package HighEnd_Blinds
 */
get_header();

while ( have_posts() ) : the_post();
	?>
	<article class="hb-article">
		<h1><?php the_title(); ?></h1>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large', array( 'style' => 'width:100%;border-radius:16px;margin:0 0 28px' ) ); ?>
		<?php endif; ?>
		<div class="content"><?php the_content(); ?></div>
	</article>
	<?php
endwhile;

get_footer();
