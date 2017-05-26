<?php
/*
Template Name: HomePage v2
*/
add_filter( 'genesis_attr_site-inner', 'wpvkp_att' );
function wpvkp_att( $attributes ) {
	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';
	return $attributes;
}
add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );
get_header();



genesis_widget_area( 'home-slider', array(
	'before'	=> '<div class="slider">',
	'after'		=> '',
));



/******** LOOP PERSONALI *********/
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
// remove_action('genesis_entry_content', 'genesis_do_post_content');
// remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
// remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_do_after_content_sidebar_wrap' );


// genesis_after_content_sidebar_wrap




add_action( 'genesis_entry_content', 'rtug_before_entry_content', 25 );

function rtug_before_entry_content() {
	// echo '<p><strong>An extra line of text before the entry content</strong></p>';
}


add_action( 'genesis_after_content_sidebar_wrap', 'rtug_before_entry_footer', 0 );

function rtug_before_entry_footer() {

	// echo '<p><strong>An extra line of text before the entry FOOTER</strong></p>';

	genesis_widget_area( 'home-featured', array(
	// 'before'	=> '<div class="home-featured widget-area">',
	// 'after'		=> '</div>',
	'before'	=> '<div class="content"><div class="novedades" id="">',
	'after'		=> '</div>',
	));

	// genesis_widget_area( 'home-middle', array(
	// 'before'	=> '<div class="home-featured widget-enlaces widget-area">',
	// 'after'		=> '</div>',
	// ));

	genesis_widget_area( 'home-middle', array(
	'before'	=> '<div class="enlaces widget" id="">',
	'after'		=> '</div></div>',
	));


}

add_action( 'genesis_before_footer', 'hug_before_footer', 0 );

function hug_before_footer(){

		genesis_widget_area( 'home-featured-posts', array(
		'before' => '<div class="home-featured-posts"><div class="site-inner">',
		'after' => '</div></div>',
	) );

}

 genesis();

/****************************/


genesis_widget_area( 'home-bottom', array(
		'before' => '<div id="blabla">',
		'after' => '</div></div>',
) );
add_filter( 'body_class', 'bw_home_body_class' );
function bw_home_body_class( $classes ) {
	$classes[] = 'featured-posts-home';
	return $classes;
}
get_footer();