<?php

remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
add_action( 'genesis_after_content', 'solovic_image_slider' );

function solovic_image_slider() {
	echo '<aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemtype="http://schema.org/WPSideBar">';
	echo '<section class="widget widget_text">';
	// echo '<ul class="moto-widget-slider-list" data-moto-slider-options="{&quot;itemsCount&quot;:3,&quot;slideshowEnabled&quot;:true,&quot;slideshowDelay&quot;:5,&quot;slideshowAnimationType&quot;:&quot;fade&quot;,&quot;showNextPrev&quot;:false,&quot;showPaginationDots&quot;:false,&quot;showSlideCaptions&quot;:true}" style="width: auto; position: relative;">';
	//$slide_images = [
	$slider_path = get_stylesheet_directory_uri() . '/img/slider/';
	echo '<div id="slider">
<figure>
<img src="' . $slider_path . 'confidence-red-dress-resize.png" alt>
<img src="' . $slider_path . 'square-blue-biz-resize.png" alt>
<img src="' . $slider_path . 'portrait-red-dress-resize.png" alt>
<img src="' . $slider_path . 'laughing-blue-dry-resize.png" alt>
</figure>
</div>';
	/*
		'',
		//'portrait-blue-mean-business.jpg',
		//'portrait-red-dress.jpg',
		'',
		//'square-blue-biz-two.jpg',
		// 'square-blue-wine-book-resize.png',
		''
		];*/

	/*foreach ($slide_images as $the_image) {
		echo '<li><img src="' . $slider_path . $the_image . '" /></li>';
	}
	echo '</ul>';*/
	echo '</section></aside>';
}	