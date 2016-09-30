<?php
add_action( 'genesis_before_footer', 'solovic_infinite' );
function solovic_infinite() {
	echo '<div id="everlong_container" class="row-container">';
	echo '</div>';
}

function solovic_everlong_next_page( $page, $element, $url = '' ) {
	$output = '<div id="' . $element . '" class="everlong">';
	$output .= solovic_everlong_get_page( $page, $url );
	$output .= '</div>';

	return $output;
}

function solovic_everlong_get_page( $page_num, $url = '' ) {
	$output = '';
	if ( $page_num === '1' ) {
		$output = solovic_static_column1_p1();
		$output .= solovic_static_column2_p1();
		$output .= solovic_static_column3_p1();

	} else if ( $url !== '' ) {
		$output = do_shortcode(apply_filters('all', get_page_by_path( basename(untrailingslashit($url)))->post_content));
	}

	return $output;
}

function solovic_static_column1_p1() {
	return '<div class="content"><div class="speaking">
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
}

function solovic_static_column2_p1() {
	$output = '<div class="blurb">';
	$output .= '<div class="writeup gray-highlight">';
	$output .= '<p><strong>Susan Solovic</strong> is the authority that media groups such as Fox Business, Fox News, ABC News, PBS, MSBNC,The Wall Street Journal and others turn to when they want expert analysis of what\'s happening in the world of small business.</p>';
	$output .= '<p>She is also one of the most popular speakers at events for small businesses or any group looking to instill the spirit of entrepreneurism and give attendees the know-how to make it happen. Her keynote addresses are custom tailored to meet the special needs and interests of each group. Susan\'s talent for communicating has not only made her one of the country\'s top small business keynote speakers, it has made her a New York Times, Wall Street Journal, and USA Today bestselling author.</p>';
	$output .= '<p class="green-highlight"><em>When Susan works with your group, she delivers content that reaches beyond her formal speaking engagement.</em></p></div></div>';

	return $output;
}

function solovic_static_column3_p1() {
	$output = '<div class="sidebar">';
	$output .= '<div class="contact">';
	$output .= '<div class="hover panel flip"><div class="front"><div class="pad"><h2>Contact Susan Solovic</h2></div></div><div class="back" style=""><div class="pad" style="">';
	$output .= solovic_write_contact_form();
	$output .= '</div></div></div>';
	$output .= '</div></div>';

	return $output;
}

function solovic_write_contact_form() {
	return '<form id="signupform" class="infusion-form" data-id="embedded_signup:form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup" onsubmit="submitfire(event)">
	<input data-id="ca:input" type="hidden" name="ca" value="3327101e-dce3-47ef-804f-dcb4bf6ae892">
	<input data-id="list:input" type="hidden" name="list" value="1118451030">
	<input data-id="source:input" type="hidden" name="source" value="EFD">
	<label for="fname">name</label><input id="fname" data-id="First Name:input" type="text" name="first_name" value="" maxlength="50" /><br />
	<label for="email">e-mail</label><input id="email" data-id="Email Address:input" type="text" name="email" value="" maxlength="80">
	<button type="submit" class="" data-enabled="enabled" id="ajaxsignup">Sign Up</button>
</form>';
}


add_action( 'wp_ajax_get_next_page', 'get_next_page' );
add_action( 'wp_ajax_nopriv_get_next_page', 'get_next_page' );

add_action( 'wp_ajax_get_specific_page', 'get_specific_page' );
add_action( 'wp_ajax_nopriv_get_specific_page', 'get_specific_page' );

function get_next_page() {
	$retriever = new NextPageRetriever();
	$retriever->write_page();
}

function get_specific_page() {
	$retriever = new SpecificPageRetriever();
	$retriever->write_page();
}

class SpecificPageRetriever extends PageRetriver {
	/**
	 * @return string
	 */
	protected function get_page_data() {
		$page_path = $_REQUEST['page_context']['url'];

		return solovic_everlong_next_page( $this->new_page, $this->new_element, $page_path );
	}
}

class NextPageRetriever extends PageRetriver {

	/**
	 * @return string
	 */
	protected function get_page_data() {
		return solovic_everlong_next_page( $this->new_page, $this->new_element );
	}
}

abstract class PageRetriver {
	protected $new_page;
	protected $new_element;

	/**
	 * @return mixed
	 */
	abstract protected function get_page_data();

	public function write_page() {
		if ( empty( $_REQUEST['page_context'] ) ) {
			die();
		}
		$this->new_page    = $_REQUEST['page_context']['page_id'];
		$this->new_element = $_REQUEST['page_context']['element_id'];
		$result['type']    = 'success';
		$result['page_id'] = $this->new_page;
		$result['row']     = $this->get_page_data();
		$output            = json_encode( $result );
		echo $output;
		die();
	}
}


