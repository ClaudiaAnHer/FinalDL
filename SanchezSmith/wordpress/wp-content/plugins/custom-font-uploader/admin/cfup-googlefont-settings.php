<?php
$settings = get_option( 'cfup_general_settings', true );
$api_key = '';
if( isset( $settings['apikey_settings'] ) ) {
    $api_key = $settings['apikey_settings'];
}
$options = $cfupgf_notices = array();

if( $api_key != '' ) {
    $cfupgf_fonts = get_option( 'cfupgooglefonts_data', true );
    $apikey_verified = get_option( 'cfup_apikey_verified' );
    // if( !is_array( $cfupgf_fonts ) ) $cfupgf_fonts = array();
    if ( empty( $cfupgf_fonts ) ) {
        $cfupgf_fonts = cfup_get_google_fonts( $api_key );
        update_option( 'cfupgooglefonts_data', $cfupgf_fonts );
    }
} else {
    $cfupgf_fonts = array();
}

$google_font_data = array();
if ( !empty( $cfupgf_fonts ) && isset( $cfupgf_fonts->items ) ) {
    foreach ( $cfupgf_fonts->items as $key => $cfupgf_font ) {
        $google_font_data[$cfupgf_font->family] = array(
            'font-family' => $cfupgf_font->family,
            'font-file' => $cfupgf_font->files
        );
    }
}

//Enqueue the selected google font - save in db
if (isset($_POST['submit-google-fonts']) && wp_verify_nonce($_POST['google-fonts-nonce'], 'cfup-googlefont')) {
    $font = sanitize_text_field($_POST['font']);
    
    $gfonts = get_option( 'googlefont_file_name', true );
    if( !is_array( $gfonts ) ) {
        $gfonts = array();
    }
    $gfonts[$google_font_data[$font]['font-family']] = $google_font_data[$font]['font-file']->regular;
    update_option('googlefont_file_name', $gfonts);

    $success_msg = "<div class='notice updated is-dismissible' id='message'>";
    $success_msg .= "<p>".__( 'Font Enqueued: <strong>'.$font.'</strong>', CFUP_TEXT_DOMAIN )."</p>";
    $success_msg .= "</div>";
    echo $success_msg;
}
$saved_google_fonts = get_option( 'googlefont_file_name', true );
if( !is_array( $saved_google_fonts ) ) {
    $saved_google_fonts = array();
}
$sn = 0;
$div_disable = '';
if( $api_key == '' && $apikey_verified == 'no' ) {
    $div_disable = 'cfup-google-font-disabled';
}
?>      
<div id="wpbody" role="main">
	<div id="wpbody-content" aria-label="Main content" tabindex="0">
        <?php if( $api_key == '' && $apikey_verified == 'no' ) {?>
            <?php $general_settings_url = admin_url('admin.php?page=custom-font-uploader-settings');?>
            <p class="cfup-google-font-disabled-msg"><?php _e( 'Google API key is missing or is invalid. Please update it in <a href="'.$general_settings_url.'">general settings!</a>', CFUP_TEXT_DOMAIN );?></p>
        <?php }?>
        <div class="wrap <?php echo $div_disable;?>"> 
            <table class="googletbl" width="650" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <h2><?php _e( 'Select Fonts', CFUP_TEXT_DOMAIN );?></h2>
                        <div class= "gfont">
                            <p><?php _e('After selecting and saving font from dropdown it will enqueue particular font in your site', CFUP_TEXT_DOMAIN) ?></p>
                            <select name="font" id="googlefont-select" class="webfonts-select" required>
                                <option value="">--Select--</option>
                                <?php foreach ( $google_font_data as $key => $google_font ) {?>
                                    <option value='<?php echo $google_font['font-family'];?>'><?php echo $google_font['font-family']; ?></option>
                                <?php }?>
                            </select>
                            <p class="submit">
                                <?php wp_nonce_field('cfup-googlefont','google-fonts-nonce');?>
                                <input id="submit-cfup-general-settings" name="submit-google-fonts" class="button button-primary" value="<?php _e( 'Save Font', CFUP_TEXT_DOMAIN ); ?>" type="submit">
                            </p>
                        </div>

                        <!--html for previewing fonts-->
                        <div class="font-preview-section">
                            <h2 class="add_text"><?php _e( 'H2 tags Preview', CFUP_TEXT_DOMAIN );?> </h2>
                            <h3 class="add_text"><?php _e( 'H3 tags Preview', CFUP_TEXT_DOMAIN );?> </h3>
                            <p class="add_text"><?php _e( 'Lorem ipsum dolor sit amet, vide paulo vidisse ex quo, vis dolor pertinax praesent id. No principes disputationi sea, mutat inermis delicatissimi id sed. Est semper moderatius no, et tamquam accommodare his. Wisi numquam scripserit in vix, sumo mandamus moderatius at vim..', CFUP_TEXT_DOMAIN );?>    <i><?php _e( 'fast looking italic text?', CFUP_TEXT_DOMAIN ); ?></i></p>
                       </div>
                    </td>
                </tr>
            </table>
            
            <?php if ( !empty( $saved_google_fonts ) ) {?>
                <!--Table structure for deleting google fonts-->
    			<table cellspacing="0" class="wp-list-table widefat fixed bookmarks">
    		        <thead>
    		            <tr>
    		                <th width="20"><?php _e( 'Sn', CFUP_TEXT_DOMAIN ); ?></th>
    		                <th><?php _e( 'Font', CFUP_TEXT_DOMAIN ); ?></th>
    		                <th width="100"><?php _e( 'Actions', CFUP_TEXT_DOMAIN ); ?></th>
    		            </tr>
    		        </thead>
                    <tbody>
        		        <?php foreach ($saved_google_fonts as $key => $googlefont_name) {?>
                            <?php $sn++;?>
        	                <tr id="delete_googlefont-<?php echo strtolower(preg_replace('/\s+/', '', $key)); ?>">
        	                    <td><?php echo $sn; ?></td>
        	                    <td><?php echo $key; ?></td>
        	                    <td><a class="delete-googlefont" data-fid="delete_googlefont-<?php echo strtolower(preg_replace('/\s+/', '', $key)); ?>" data-delete_font_gkey="<?php echo $key; ?>"href="javascript:void(0)">Delete</a></td>
        	                </tr>
        	            <?php }?>
                    </tbody>
    			</table>
            <?php }?>
        </div>
	</div>
	<div class="clear"></div>
</div>