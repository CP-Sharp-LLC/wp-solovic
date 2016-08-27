<?php
const HeaderImageSetting = 'main_header_image';
const MiniHeaderImages   = 'mini_header_images';

define( 'CHILD_THEME_NAME', 'Solovic Rebirth' );
define( 'CHILD_THEME_URL', 'http://www.cpsharp.net' );

add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
	echo '<meta http-equiv="x-ua-compatible" content="IE=edge" />';
}

add_theme_support( 'infinite-scroll', array(
	'container'      => 'everlong',
	'footer'         => 'solovicfooter',
	'type'           => 'scroll',
	'footer_widgets' => false,
	'wrapper'        => true,
	'render'         => false,
	'posts_per_page' => false,
) );

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

add_action( 'genesis_before_footer', 'solovic_infinite' );
function solovic_infinite() {
	echo '<div class="row-container">';
	echo '<div id="everlong" class="everlong">';
	echo '<div class="content"><div class="speaking">
				<span class="green-highlight">MAKE</span>
				<span class="orange-highlight">THE</span>
				<span class="">SMALL</span>
				<span class="">BUSINESS</span>
				<span class="">EXPERT</span><br>
				<span class="orange-highlight standout">YOUR</span><br>
				<span class="green-highlight">SMALL</span>
				<span class="green-highlight">BUSINESS</span>
				<span class="green-highlight">EXPERT</span>
        </div></div>';
	echo '<div class="blurb">';
	echo '<div class="writeup gray-highlight">';
	echo '<p><strong>Susan Solovic</strong> is the authority that media groups such as Fox Business, Fox News, ABC News, PBS, MSBNC,The Wall Street Journal and others turn to when they want expert analysis of what\'s happening in the world of small business.</p>';
	echo '<p>She is also one of the most popular speakers at events for small businesses or any group looking to instill the spirit of entrepreneurism and give attendees the know-how to make it happen. Her keynote addresses are custom tailored to meet the special needs and interests of each group. Susan\'s talent for communicating has not only made her one of the country\'s top small business keynote speakers, it has made her a New York Times, Wall Street Journal, and USA Today bestselling author.</p>';
	echo '<p class="green-highlight"><em>When Susan works with your group, she delivers content that reaches beyond her formal speaking engagement.</em></p>	</div></div>';
	echo '<div class="sidebar">';
	echo '<div class="contact">
			<h2 class="firstTitle">INTERESTED IN BOOKING SUSAN SOLOVIC FOR YOUR NEXT EVENT?</h2>
			<a id="contact-init" href="#">CONTACT SUSAN</a>
			<img src="/template58417.motopreview.com/mt-demo/58400/58417/mt-content/uploads/2016/02/mt-0336-home-banner.jpg" >
			</a></div></div>';
}

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'solovic_do_footer' );
function solovic_do_footer() {
	echo "<footer id='solovicfooter' class='site-footer' itemtype='http://schema.org/WPFooter'>";
	echo "<div class='wrap'>";
	echo '<p>Copyright ©&nbsp;' . date( 'Y' ) . " · <a href='http://www.cpsharp.net'>CP Sharp</a></p></div></footer>";
}