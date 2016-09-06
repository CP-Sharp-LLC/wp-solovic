<?php

namespace wpsolovic;


class contact_former {

	public function __construct() {
	}

	public function write() {
		echo /** @lang HTML */
		'<form id="signupform" class="infusion-form" data-id="embedded_signup:form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup" onsubmit="submitfire(event)">
        <input data-id="ca:input" type="hidden" name="ca" value="3327101e-dce3-47ef-804f-dcb4bf6ae892">
        <input data-id="list:input" type="hidden" name="list" value="1118451030">
        <input data-id="source:input" type="hidden" name="source" value="EFD">
        <label for="fname">First Name *</label><input id="fname" data-id="First Name:input" type="text" name="first_name" value="" maxlength="50" />
		<label for="email">Email *</label><input id="email" data-id="Email Address:input" type="text" name="email" value="" maxlength="80">
        <button type="submit" class="" data-enabled="enabled" id="ajaxsignup">Sign Up</button>
    </form>';
	}
}