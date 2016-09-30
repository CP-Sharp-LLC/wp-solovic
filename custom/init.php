<?php
const HeaderImageSetting = 'main_header_image';
const MiniHeaderImages   = 'mini_header_images';

define( 'BRAND_IMAGE_PATH', get_stylesheet_directory_uri() . '/img/branding/' );
define( 'CHILD_THEME_NAME', 'Solovic Rebirth' );
define( 'CHILD_THEME_URL', 'http://www.cpsharp.net' );

add_theme_support( 'html5' );
add_theme_support( 'html5', array( 'gallery', 'caption' ) );
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer'
) );

add_theme_support( 'genesis-footer-widgets', 1 );


add_action( 'wp_enqueue_scripts', 'solovic_enqueue_scripts' );
function solovic_enqueue_scripts() {
	wp_register_script( 'jquery3', get_stylesheet_directory_uri() . '/js/jquery-3.1.1.min.js', array(), '1.0.0', true );

	wp_register_script( 'solovic-helper', get_stylesheet_directory_uri() . '/js/solovic_helper.js', array( 'jquery3' ), '1.0.0', true );
	wp_localize_script( 'solovic-helper', 'solovicAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	wp_register_script( 'solovic-scroll', get_stylesheet_directory_uri() . '/js/scrolling.js', array( 'solovic-helper' ), '1.0.0', true );

	wp_enqueue_script( 'jquery3' );
	wp_enqueue_script( 'solovic-scroll' );
	wp_enqueue_script( 'solovic_helper' );
}


add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
	echo '<meta http-equiv="x-ua-compatible" content="IE=edge" />';
}


remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'solovic_do_footer' );
function solovic_do_footer() {
	echo '<div id="everlong_pager" class="row-container everlong-pager-inactive"></div>';
	echo '<p>Copyright &copy;&nbsp;' . date( 'Y' ) . ' · Susan Solovic Media</p><p><a href="http://www.cpsharp.net"><img src="' . BRAND_IMAGE_PATH . 'cpsharp.png" alt="Website Design by CP Sharp"></a></p>';
}