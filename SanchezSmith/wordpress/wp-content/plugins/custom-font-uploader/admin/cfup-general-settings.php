<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Save General Settings
if( isset( $_POST['cfup-general-settings-submit'] ) ) {
	$cfup_general_settings = array();

	/************************** API KEY **************************/
	$cfup_general_settings['apikey_settings'] = sanitize_text_field( $_POST['cfup-apikey'] );
	$apikey_verified = get_option( 'cfup_apikey_verified' );
	if( $apikey_verified == '' || $apikey_verified == 'no' ) {
		$err_msg = "<div class='error is-dismissible' id='message'>";
		$err_msg .= "<p>".__( 'Please verify the API Key before proceeding.', CFUP_TEXT_DOMAIN )."</p>";
		$err_msg .= "</div>";
		echo $err_msg;
	} else {
		update_option( 'cfup_general_settings', $cfup_general_settings );
		$success_msg = "<div class='notice updated is-dismissible' id='message'>";
		$success_msg .= "<p>".__( 'Settings Saved.', 'cfup' )."</p>";
		$success_msg .= "</div>";
		echo $success_msg;
	}
}

//Retrieve Settings
$settings = get_option( 'cfup_general_settings', true );
$apikey = '';
if( isset( $settings['apikey_settings'] ) ) {
	$apikey = $settings['apikey_settings'];
}
$wp_loader = includes_url('images/wpspin.gif');
?>
<div class="wrap">
	<h3><?php _e( 'General Settings', CFUP_TEXT_DOMAIN ); ?></h3>
	<div class="cfup-general-settings-container">
		<table class="form-table">
			<tbody>
				<!-- API KEY SETTINGS -->
				<tr>
					<th scope="row">
						<label for="api-key"><?php _e( 'API Key', CFUP_TEXT_DOMAIN );?></label>
						<p><a href="javascript:void(0);" onClick="window.open('https://developers.google.com/maps/documentation/javascript/get-api-key','pagename','resizable,height=600,width=700'); return false;">
							<?php _e( 'Don\'t have it? Get it here!', CFUP_TEXT_DOMAIN );?>
						</a></p>
					</th>
					<td>
						<input required id="cfup-apikey" name="cfup-apikey" type="text" class="regular-text" placeholder="<?php _e( 'Google API Key', CFUP_TEXT_DOMAIN );?>" value="<?php echo $apikey;?>">
						<?php if( $apikey != '' ) {?>
							<input type="button" class="button button-secondary" value="<?php _e( 'Verify', CFUP_TEXT_DOMAIN );?>" id="cfup-verify-apikey">
							<img src="<?php echo $wp_loader;?>" class="cfup-admin-loader">
						<?php }?>
						<p class="description"><?php _e( 'This is the API Key from Google which will help you fetch fonts from Google.', CFUP_TEXT_DOMAIN );?></p>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit"><input type="submit" name="cfup-general-settings-submit" class="button button-primary" value="<?php _e( 'Save Changes', CFUP_TEXT_DOMAIN ); ?>"></p>
	</div>
</div>