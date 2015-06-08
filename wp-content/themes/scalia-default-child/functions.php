<?php

add_action('wp_enqueue_scripts', 'enqueue_parent_theme_style');
function enqueue_parent_theme_style() {
	wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css', array('scalia-icons', 'scalia-reset', 'scalia-grid'));

}
function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );

