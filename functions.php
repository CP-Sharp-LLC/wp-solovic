<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Solovic Rebirth' );
define( 'CHILD_THEME_URL', 'http://www.cpsharp.net' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

//* Enable HTML5 markup
add_theme_support('html5');

//* Enable HTML5 markup for galleries
add_theme_support('html5', array('gallery', 'caption'));

//* Add support for structural wraps
add_theme_support('genesis-structural-wraps', array('header', 'nav', 'subnav', 'site-inner', 'footer-widgets', 'footer'));

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 1050,
	'height' => 150
) );

add_theme_support( 'genesis-footer-widgets', 1 );

remove_action('genesis_header', 'genesis_do_header');
add_action('genesis_header', 'solovic_do_header');

function solovic_do_header() {
	echo '<a href="wp_guess_url()">';
	echo '<div id="title-area" style="cursor: hand;">';
	do_action('genesis_site_title');
	do_action('genesis_site_description');
	echo '</div><!-- end #title-area -->';
	echo '</a>';
}

/*add_action( 'genesis_site_description', 'header_images');
function header_images(){
	echo "<div>Test</div>";
}*/