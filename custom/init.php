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

	wp_enqueue_script( 'solovic-scroll', get_stylesheet_directory_uri() . '/js/scrolling.js', array( 'jquery3' ), '1.0.0', true );
}


add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
	echo '<meta http-equiv="x-ua-compatible" content="IE=edge" />';
}

add_action( 'genesis_before_footer', 'solovic_infinite' );
function solovic_infinite() {
	echo '<div class="row-container">';
	// this will fill in via jq
	echo '</div>';
}

function solovic_everlong_next_page( $page ) {
	echo '<div id="everlong-' . $page . '" class="everlong">';
	solovic_everlong_get_page( $page );
	echo '</div>';
	echo '<div class="sidebar">';
	echo '<div class="contact">';
	solovic_everlong_get_page( $page );
	echo '</div>';
	echo '</div>';
}

function solovic_everlong_get_page( $page ) {
	solovic_static_column1_p1();
	solovic_static_column2_p1();
	solovic_static_column3_p1();
}

function solovic_static_column1_p1() {
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
        </div>';
}

function solovic_static_column2_p1() {
	echo '<div class="blurb">';
	echo '<div class="writeup gray-highlight">';
	echo '<p><strong>Susan Solovic</strong> is the authority that media groups such as Fox Business, Fox News, ABC News, PBS, MSBNC,The Wall Street Journal and others turn to when they want expert analysis of what\'s happening in the world of small business.</p>';
	echo '<p>She is also one of the most popular speakers at events for small businesses or any group looking to instill the spirit of entrepreneurism and give attendees the know-how to make it happen. Her keynote addresses are custom tailored to meet the special needs and interests of each group. Susan\'s talent for communicating has not only made her one of the country\'s top small business keynote speakers, it has made her a New York Times, Wall Street Journal, and USA Today bestselling author.</p>';
	echo '<p class="green-highlight"><em>When Susan works with your group, she delivers content that reaches beyond her formal speaking engagement.</em></p></div></div>';
}

function solovic_static_column3_p1() {
	echo '<div class="hover panel flip">
		  <div class="front">
		    <div class="pad">
		      <h2>Contact Susan Solovic</h2>
		    </div>
		  </div>
		  <div class="back" style="">
		  <div class="pad" style="">';
	solovic_write_contact_form();
	echo '</div></div></div>';
}

function solovic_write_contact_form() {
	echo '<form id="signupform" class="infusion-form" data-id="embedded_signup:form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup" onsubmit="submitfire(event)">
	        <input data-id="ca:input" type="hidden" name="ca" value="3327101e-dce3-47ef-804f-dcb4bf6ae892">
	        <input data-id="list:input" type="hidden" name="list" value="1118451030">
	        <input data-id="source:input" type="hidden" name="source" value="EFD">        
	        <label for="fname">name</label><input id="fname" data-id="First Name:input" type="text" name="first_name" value="" maxlength="50" /><br />
	        <label for="email">e-mail</label><input id="email" data-id="Email Address:input" type="text" name="email" value="" maxlength="80">
	        <button type="submit" class="" data-enabled="enabled" id="ajaxsignup">Sign Up</button>
	    </form>';
}

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'solovic_do_footer' );
function solovic_do_footer() {
	echo '<p>Copyright ©&nbsp;' . date( 'Y' ) . ' · Susan Solovic Media</p><p><a href="http://www.cpsharp.net"><img src="' . BRAND_IMAGE_PATH . 'cpsharp.png" alt="Website Design by CP Sharp"></a></p>';
}
