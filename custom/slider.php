<?php

remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
add_action( 'genesis_after_content', 'solovic_image_slider' );

function solovic_image_slider() {
	echo '<aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemtype="http://schema.org/WPSideBar">';
	echo '<section class="widget widget_text">';
	echo '<div id="promoimage"><figure>';
	echo '</figure></div>';
	echo '</section></aside>';
}