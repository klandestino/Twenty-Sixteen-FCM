<aside <?php post_class( 'fcm-child' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'fcm-child-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</a>
	<?php endif; ?>
	<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	<?php the_excerpt(); ?>
</aside>