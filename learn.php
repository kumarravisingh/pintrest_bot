<?php
// Add Password, Repeat Password and Are You Human fields to WordPress registration form

add_action( 'register_form', 'ts_show_extra_register_fields' );
function ts_show_extra_register_fields(){
?>
	<p class="input-container input-password">
		<label for="password" style="display: none;">Password</label>
		<input id="password" class="input" type="password" tabindex="30" size="25" value="" name="password" placeholder="Password" />
		
	</p>
	

	<p class="input-container input-password">
		<label for="repeat_password" style="display: none;">Repeat password </label>
		<input id="repeat_password" class="input" type="password" tabindex="40" size="25" value="" name="repeat_password" placeholder="Confirm Password" />
		
	</p>
	<br />
	
<?php
}
// Check the form for errors
add_action( 'register_post', 'ts_check_extra_register_fields', 10, 3 );
function ts_check_extra_register_fields($login, $email, $errors) {
	if ( $_POST['password'] !== $_POST['repeat_password'] ) {
		$errors->add( 'passwords_not_matched', "<strong>ERROR</strong>: Passwords must match" );
	}
	if ( strlen( $_POST['password'] ) < 8 ) {
		$errors->add( 'password_too_short', "<strong>ERROR</strong>: Passwords must be at least eight characters long" );
	}
	
}




// Storing WordPress user-selected password into database on registration

add_action( 'user_register', 'ts_register_extra_fields', 100 );
function ts_register_extra_fields( $user_id ){
	$userdata = array();
	$userdata['ID'] = $user_id;
	if ( $_POST['password'] !== '' ) {
		$userdata['user_pass'] = $_POST['password'];
	}
	$new_user_id = wp_update_user( $userdata );
}






// Editing WordPress registration confirmation message

add_filter( 'gettext', 'ts_edit_password_email_text' );
function ts_edit_password_email_text ( $text ) {
	if ( $text == 'A password will be e-mailed to you.' ) {
		$text = 'If you leave password fields empty one will be generated for you. Password must be at least eight characters long.';
	}
	return $text;
}
?>