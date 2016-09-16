<?php

class flopbutton {
	private $display_text;
	private $show_text;
	private $subdisplay_text;

	public function __construct( $display_text, $subdisplay_text, $show_text ) {
		$this->display_text = $display_text;
		$this->show_text    = $show_text;
		$this->subdisplay_text = $subdisplay_text;
	}

	public function write() {
		echo '<div class="hover panel flip">
			  <div class="front">
			    <div class="pad">
			      <h2>' . $this->display_text . '</h2>
			    </div>
			  </div>
			  <div class="back" style="">
			      <div class="pad" style="">';
					$contactform = new contact_former();
					$contactform.write();
		echo '</div>';
		echo '</div>';
	}
}