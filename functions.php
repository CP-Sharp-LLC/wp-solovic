<?php
// Start the engine
require_once get_template_directory() . '/lib/init.php';

require_once get_stylesheet_directory() . '/custom/init.php';
require_once get_stylesheet_directory() . '/custom/build.php';
require_once get_stylesheet_directory() . '/custom/header.php';
require_once get_stylesheet_directory() . '/custom/slider.php';

$styles = [];


/*add_action( 'genesis_site_description', 'header_images');
function header_images(){
	echo "<div>Test</div>";
}*/