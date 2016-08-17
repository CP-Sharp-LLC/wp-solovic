<?php
const HeaderImageSetting = 'main_header_image';
const MiniHeaderImages = 'mini_header_images';

define('CHILD_THEME_NAME', 'Solovic Rebirth');
define('CHILD_THEME_URL', 'http://www.cpsharp.net');

add_action('genesis_meta', 'sample_viewport_meta_tag');
function sample_viewport_meta_tag()
{
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
	echo '<meta http-equiv="x-ua-compatible" content="IE=edge" />';
}

add_theme_support('html5');
add_theme_support('html5', array('gallery', 'caption'));
add_theme_support('genesis-structural-wraps', array('header', 'nav', 'subnav', 'site-inner', 'footer-widgets', 'footer'));
add_theme_support('genesis-footer-widgets', 1);
remove_action( 'genesis_footer', 'genesis_do_footer' );