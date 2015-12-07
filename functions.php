<?php
/**
 * Enqueue styles from Twenty Sixteen
 */
function twentysixteen_fcm_enqueue_style() {
	wp_enqueue_style( 'twentysixteen-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'twentysixteen-fcm-child-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_fcm_enqueue_style' );

/**
 * Add theme support for Featured Content Manager
 */
function twentysixteen_fcm_add_fcm_support() {
	add_theme_support( 'featured-content-manager' );
}
add_action( 'after_setup_theme', 'twentysixteen_fcm_add_fcm_support' );

/**
 * Alter main query on home page to render posts from featured area 'Main area'
 */
function twentysixteen_fcm_alter_home_query( $query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
        		// Set post_status to draft in the customizer so we can preview our changes without altering the live site
		global $wp_customize;
		if ( isset( $wp_customize ) ) {
			$query->set('post_status', 'draft');
		}
		$taxquery = array(
			array(
				'taxonomy' => Featured_Content_Manager::TAXONOMY,
				'field' => 'slug',
				'terms' => 'fcm-main-area',
				'operator'=> 'IN'
				)
			);

		$query->set('post_type', Featured_Content_Manager::POST_TYPE);
		$query->set('tax_query', $taxquery );
		$query->set('post_parent', 0);
		$query->set('orderby', 'menu_order');
		$query->set('order', 'ASC');
	}
}
add_action( 'pre_get_posts', 'twentysixteen_fcm_alter_home_query' );