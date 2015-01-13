<?php
/*
Plugin Name: Re-slug
Plugin URI: http://exygy.com/re-slug-wordpress-plugin/
Description: Regenerate the post permalink after changing the title
Author: Exygy
Author URI: http://exygy.com 
Version: 1.0
*/

function add_reslug_button ($return) {
	// Add Re-slug button after Edit buton
	$return = str_replace('Edit</a></span>', 'Edit</a></span> <span id="re-slug" style="display:none;"><a href="#re-slug" class="button button-small hide-if-no-js">Re-slug</a></span>', $return);
	return $return;
}

add_filter( 'get_sample_permalink_html', 'add_reslug_button', 10, 1 );


function enqueue_reslug_script($hook) {
    if( 'post.php' != $hook && 'post-new.php' != $hook )
        return;
    wp_enqueue_script( 'reslug', plugin_dir_url( __FILE__ ) . '/re-slug.js' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_reslug_script' );