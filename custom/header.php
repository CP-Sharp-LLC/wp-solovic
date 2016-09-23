<?php

remove_action('genesis_header', 'genesis_do_header');
add_action('genesis_header', 'solovic_do_header');

remove_action('genesis_after_header', 'genesis_do_nav');

const headline = 'New York Times Bestseller, regularly seen on';

function solovic_do_header()
{
	$header_image = get_stylesheet_directory_uri().'/img/branding/solovic-tm-logo.png';
	$image_size = getimagesize($header_image);

	$height_style = 'height: 7.5em; margin-bottom: 1em;';
	//$background_url_style = 'background: url(' . $header_image . ') no-repeat left center; ';
	//$header_title_style = $height_style . $background_url_style;
	$margin_left_style = 'margin-left:' . $image_size[0] . 'px; ';

	// echo '<div id="title-area" style="' . $header_title_style . '">';
	echo '<div id="title-area">';
	do_action('genesis_site_title');
	do_action('genesis_site_description');
	output_header_nav_container($height_style, $margin_left_style);
	echo '</div><!-- end #title-area -->';
}

function output_header_nav_container($height_style, $margin_style)
{
	echo '<div>';
	output_branding($margin_style);
	genesis_do_nav();
	echo '</div>';
}

function output_branding($style)
{
	$brand_images = array( 'cnn.png', 'fox.png', 'foxnews.png', 'msnbc.png', 'pbs.png', 'wsj.png' );
	$branding_path = get_stylesheet_directory_uri() . '/img/branding/';

	// echo '<a class="no-underline" href="' . '/' . '"><div class="branding" style="' . $style . '">';
	echo '<a class="no-underline" href="' . '/' . '"><div class="branding">';
	echo '<p>' . headline . '</p>';
	echo "<div class='branding-images'>";
	foreach ($brand_images as $the_image) {
		echo '<img src="' . $branding_path . $the_image . '" />';
	}
	echo '</div>';
	echo '</div></a>';
}