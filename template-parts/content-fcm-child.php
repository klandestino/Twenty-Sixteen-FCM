<aside <?php post_class( 'fcm-child' ); ?>>
	<?php twentysixteen_post_thumbnail(); ?>
	<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<?php the_excerpt(); ?>
</aside>