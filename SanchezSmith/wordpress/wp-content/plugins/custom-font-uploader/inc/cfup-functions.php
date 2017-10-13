<?php 
//Funtion for deleting fonts using upload method
add_action('wp_ajax_delete_customfont', 'delete_customfont');
add_action('wp_ajax_nopriv_delete_customfont', 'delete_customfont');
function delete_customfont() {

    $fontsDBData = get_option('font_file_name', true);
    $delckey = sanitize_text_field( $_POST['del_key'] );
    $custom_font_file = CUSTOM_FONT_UPLOADER_UPLOADS_DIR_PATH . $fontsDBData[$delckey] ;
    unlink( realpath( $custom_font_file ) );
    unset($fontsDBData[$delckey]);
    update_option( 'font_file_name', $fontsDBData );
    echo 'custom-font-deleted';
    die;
}

//Function for deleting fonts using google fonts
add_action('wp_ajax_delete_googlefont', 'delete_googlefont');
add_action('wp_ajax_nopriv_delete_googlefont', 'delete_googlefont');

function delete_googlefont() {
    $gfontsDBData = get_option('googlefont_file_name', true);
    $del_gkey = sanitize_text_field( $_POST['del_gkey'] );
    unset( $gfontsDBData[ $del_gkey ] );
    update_option('googlefont_file_name', $gfontsDBData);
    echo 'google-font-deleted';
    die;
}

//Function for deleting fonts using google fonts
add_action('wp_ajax_cfup_verify_apikey', 'cfup_verify_apikey');
add_action('wp_ajax_nopriv_cfup_verify_apikey', 'cfup_verify_apikey');

function cfup_verify_apikey() {
    $apikey = sanitize_text_field( $_POST['apikey'] );
    $response = cfup_get_google_fonts( $apikey );
    if( isset( $response->items ) ) {
        echo 'apikey-verified';
        update_option( 'cfup_apikey_verified', 'yes' );
    } else {
        update_option( 'cfup_apikey_verified', 'no' );
        echo 'apikey-unverified';
    }
    die;
}

// Get google fonts through google api and pass it in curl
function cfup_get_google_fonts( $api_key ) {
    $api_url = 'https://www.googleapis.com/webfonts/v1/webfonts';
    $params = array( 'key' => $api_key );
    $url = add_query_arg($params, esc_url_raw($api_url));
    $response = wp_remote_get(esc_url_raw($url));
    
    // Check the response code
    $response_code = wp_remote_retrieve_response_code($response);
    $response_message = wp_remote_retrieve_response_message($response);

    if (200 != $response_code && !empty($response_message)) {
        return new WP_Error($response_code, $response_message);
    } elseif (200 != $response_code) {
        return new WP_Error($response_code, 'Unknown error occurred');
    } else {
        //Everything seems OK, retreive the fonts
        return json_decode( wp_remote_retrieve_body( $response ) );
    }
}