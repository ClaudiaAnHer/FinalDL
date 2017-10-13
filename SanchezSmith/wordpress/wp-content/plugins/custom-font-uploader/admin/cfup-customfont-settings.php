<?php
$allowedFontFormats = array('ttf', 'otf', 'woff');
if (isset($_POST['submit_cfup_font']) && wp_verify_nonce($_POST['browsefont-nonce'], 'cfup-font')) {
    $font_file_name = $_FILES['font_file']['name'];
    $font_file_details = pathinfo($_FILES['font_file']['name']);
    $font_name = $font_file_details['filename'];
    $file_extension = strtolower($font_file_details['extension']);

    if( !in_array( $file_extension, $allowedFontFormats ) ) {
        $err_msg = "<div class='error is-dismissible' id='message'>";
        $err_msg .= "<p>".__( 'Only .woff, .otf, & .ttf files allowed. Try again!', CFUP_TEXT_DOMAIN )."</p>";
        $err_msg .= "<button class='notice-dismiss' type='button'>";
        $err_msg .= "<span class='screen-reader-text'>Dismiss this notice.</span>";
        $err_msg .= "</button>";
        $err_msg .= "</div>";
        echo $err_msg;
    } else {
        $upload_dir = CUSTOM_FONT_UPLOADER_UPLOADS_DIR_PATH . basename($_FILES['font_file']['name']);
        if( file_exists( $upload_dir ) ) {
            $err_msg = "<div class='error is-dismissible' id='message'>";
            $err_msg .= "<p>".__( 'The file you\'re trying to upload already exists.', CFUP_TEXT_DOMAIN )."</p>";
            $err_msg .= "<button class='notice-dismiss' type='button'>";
            $err_msg .= "<span class='screen-reader-text'>Dismiss this notice.</span>";
            $err_msg .= "</button>";
            $err_msg .= "</div>";
            echo $err_msg;
        } else {
            //Everything seems to be OK, upload the font file.
            if ( move_uploaded_file($_FILES['font_file']['tmp_name'], $upload_dir ) ) {
                $custom_fonts = get_option( 'font_file_name', true );
                if( !is_array( $custom_fonts ) ) {
                    $custom_fonts = array();
                }
                $custom_fonts[$font_name] = $font_file_name;
                update_option( 'font_file_name', $custom_fonts );
                
                $success_msg = "<div class='updated notice is-dismissible' id='message'>";
                $success_msg .= "<p>".__( 'Font Enqueued: <strong>'.$font_name.'</strong>', CFUP_TEXT_DOMAIN )."</p>";
                $success_msg .= "<button class='notice-dismiss' type='button'>";
                $success_msg .= "<span class='screen-reader-text'>Dismiss this notice.</span>";
                $success_msg .= "</button>";
                $success_msg .= "</div>";
                echo $success_msg;
            } else {
                $err_msg = "<div class='error is-dismissible' id='message'>";
                $err_msg .= "<p>".__( 'The file was not uploaded due to some error. Please try again!', CFUP_TEXT_DOMAIN )."</p>";
                $err_msg .= "<button class='notice-dismiss' type='button'>";
                $err_msg .= "<span class='screen-reader-text'>Dismiss this notice.</span>";
                $err_msg .= "</button>";
                $err_msg .= "</div>";
                echo $err_msg;
            }
        }
    }
}

//Retreive all custom uploaded fonts
$custom_fonts = get_option( 'font_file_name', true );
if( !is_array( $custom_fonts ) ) {
    $custom_fonts = array();
}
$sn = 0;
?>
<!--settings for enqueuing font with browse and uploads approach-->
<div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <div class="wrap">
            <h1><?php _e( 'Custom Font', CFUP_TEXT_DOMAIN ); ?></h1>

            <table class="wp-list-table widefat fixed bookmarks">
                <thead>
                    <tr>
                        <th><?php _e( 'Please upload font file format of type :ttf,tf,woff ', CFUP_TEXT_DOMAIN ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p align="right"><input type="button" name="open_add_font" id="open_add_font" class="button-secondary" value="<?php _e( 'Add Font', CFUP_TEXT_DOMAIN ); ?>" /></p>
                            <div id="font-upload" style="display:none;">
                                <table class="cfup_form">
                                    <tr>    
                                        <td><?php _e( 'Font File', CFUP_TEXT_DOMAIN ); ?></td>
                                        <td><input type="file" name="font_file" accept=".woff,.ttf,.otf" required></td>
                                    </tr>
                                    <tr>        
                                        <td></td>
                                        <td>
                                            <?php wp_nonce_field('cfup-font','browsefont-nonce');?>
                                            <input type="submit" name="submit_cfup_font" class="button-primary" value="<?php _e( 'Upload', CFUP_TEXT_DOMAIN ); ?>" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php if ( !empty( $custom_fonts ) ) {?>
                            <table cellspacing="0" class="wp-list-table widefat fixed bookmarks">
                                <thead>
                                    <tr>
                                        <th width="20"><?php _e( 'Sn', CFUP_TEXT_DOMAIN ); ?></th>
                                        <th><?php _e( 'Font', CFUP_TEXT_DOMAIN ); ?></th>
                                        <th width="100"><?php _e( 'Actions', CFUP_TEXT_DOMAIN ); ?></th>
                                    </tr>
                                </thead>
                               <?php foreach ( $custom_fonts as $key => $unserial_font ) { $sn++;?>
                                    <tr id="delete-font-<?php echo strtolower(preg_replace('/\s+/', '', $key)); ?>">
                                        <td><?php echo $sn; ?></td>
                                        <td><?php echo $key; ?></td>
                                        <td><a class="delete-font" data-fid="delete-font-<?php echo strtolower(preg_replace('/\s+/', '', $key)); ?>" data-delete_font_key="<?php echo $key; ?>"href="javascript:void(0)">Delete</a></td>
                                    </tr>
                                <?php }?>
                            </table>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
    </div><!-- wpbody-content -->
</div>