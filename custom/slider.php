<?php
const slide_images = ['confidence-red-dress.jpg', 'laughing-blue-dry.jpg', 'portrait-blue-mean-business.jpg', 'portrait-red-dress.jpg',
	'square-blue-biz.jpg', 'square-blue-biz-two.jpg', 'square-blue-wine-book.jpg', 'square-red-dress.jpg'];

remove_action('genesis_after_content', 'genesis_get_sidebar');
add_action('genesis_after_content', 'solovic_image_slider');

function solovic_image_slider()
{
	echo '<aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemtype="http://schema.org/WPSideBar">';
	echo '<section class="widget widget_text">';
	echo '<ul class="moto-widget-slider-list" data-moto-slider-options="{&quot;itemsCount&quot;:3,&quot;slideshowEnabled&quot;:true,&quot;slideshowDelay&quot;:5,&quot;slideshowAnimationType&quot;:&quot;fade&quot;,&quot;showNextPrev&quot;:false,&quot;showPaginationDots&quot;:false,&quot;showSlideCaptions&quot;:true}" style="width: auto; position: relative;">';
	$slider_path = get_stylesheet_directory_uri() . '/img/slider/';
	foreach (slide_images as $the_image) {
		echo '<li><img src="' . $slider_path . $the_image . '" /></li>';
	}
	echo '</ul>';
	echo '</section></aside>';
}	