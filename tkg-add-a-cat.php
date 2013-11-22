<?php
/*
Plugin Name: Add a Cat
Version: 0.1-alpha
Description: Replaces featured images with cats from http://random.cat/meow - thanks for that cats random cat!!
Author: Tarei King
Author URI: Tarei.me
Plugin URI: 
Text Domain: tkg-add-a-cat
*/

function tkg_get_a_cat( $content ) {

	// If no featured image exists.. add a cat
	if ( !has_post_thumbnail() && !is_page() ) {

		$link_to_cat = wp_remote_get( 'http://random.cat/meow' );
		$cat = '<img src="' . $link_to_cat['body'] . '">';
		$catified = $cat .= $content;

		return $catified;
	} else {
		return $content;
	}

}

add_action( 'the_content', 'tkg_get_a_cat' );