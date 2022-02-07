<?php

/**
 * Custom Post Type add Subpage to Custom Post Menu
 */

add_action( 'admin_menu', 'bafg_submenu_settings_page' );

//admin_menu callback function

function bafg_submenu_settings_page() {

    add_submenu_page(
        'edit.php?post_type=bafg', //$parent_slug
        __( 'Settings', 'bafg-pro' ), //$page_title
        __( 'Settings', 'bafg-pro' ), //$menu_title
        'manage_options', //$capability
        'bafg_settings', //$menu_slug
        'bafg_settings_page_callback', //$function
        3,
    );

}

//add_submenu_page callback function
function bafg_settings_page_callback() {
    ?>
<div class="wrap">
    <h1><?php _e( 'Before After Global Settings','bafg' ); ?></h1>
    <?php settings_errors();?>
    <!--Tab buttons start-->
    <div class="bafg-setting-tab">
        <a class="bafg-tablinks active" onclick="bafg_option_tab(event, 'bafg-watermark')"><?php _e( 'Watermark', 'bafg' );?></a>
        <a class="bafg-tablinks" onclick="bafg_option_tab(event, 'bafg-doc')"><?php _e( 'Documentation', 'bafg' );?></a>
        <?php do_action( 'bafg_admin_tab' );?>
    </div>
    <!--Tab buttons end-->
    <div id="bafg-watermark" class="bafg-tabcontent" style="display: block;">
        <form method="post" action="options.php">
            <?php
                settings_fields( 'bafg-global-settings' );
                do_settings_sections( 'bafg_settings' );
                submit_button();
            ?>
        </form>
    </div>
    <div id="bafg-doc" class="bafg-tabcontent">
        <a href="#"><?php _e( 'Documentation','bafg' ); ?></a>
    </div>
</div>

<?php
}

function bafg_register_settings() {
    register_setting(
        'bafg-global-settings', // $option_group
        'bafg_watermark', // $option_name
        'bafg_sanitize_global_options' //sanitize callback
    );
    add_settings_section(
        'bafg_global_option_header', // Section $id
        __( 'General', 'bafg' ),
        'bafg_general_sections_callback', // Callback
        'bafg_settings' // Settings Page Slug
    );

    add_settings_field(
        'enable_watermark', // Field $id
        __( 'Enable Watermark', 'bafg' ), // Setting $title
        'bafg_enable_watermark_callback',
        'bafg_settings', // Settings Page Slug
        'bafg_global_option_header', // Section $id
    );
    add_settings_field(
        'path', // Field $id
        __( 'Watermark Image Upload', 'bafg' ), // Setting $title
        'bafg_watermark_upload_callback',
        'bafg_settings', // Settings Page Slug
        'bafg_global_option_header', // Section $id
    );
    add_settings_field(
        'prev', // Field $id
        __( 'Watermark Image', 'bafg' ), // Setting $title
        'bafg_watermark_prev_callback',
        'bafg_settings', // Settings Page Slug
        'bafg_global_option_header', // Section $id
    );
    add_settings_field(
        'bafg_attachment_id',
        "",
        'bafg_attachment_id_callback',
        'bafg_settings',
        'bafg_global_option_header'
    );

}
add_action( 'admin_init', 'bafg_register_settings' );

function bafg_sanitize_global_options( $input ){

    $sanitary_values = array();

    if ( isset( $input['enable_watermark'] ) ) {
        $sanitary_values['enable_watermark'] = $input['enable_watermark'];
    }

    if ( isset( $input['bafg_attachment_id'] ) ) {
        $sanitary_values['bafg_attachment_id'] = $input['bafg_attachment_id'];
    }
    if ( isset( $input['prev'] ) ) {
        $sanitary_values['prev'] = $input['prev'];
    }

    if ( isset( $input['path'] ) ) {
        $sanitary_values['path'] = $input['path'];
    }

    return apply_filters( 'bafg_save_global_option', $sanitary_values, $input );
}

//callback functions for options
function bafg_general_sections_callback() {
    echo '';

}
function bafg_watermark_upload_callback() {
    
    $attach_id = bafg_option_value('bafg_attachment_id');
    echo '
    <input class="bafg-watermark-path" type="text" value="' . get_attached_file( $attach_id )  . '" name="bafg_watermark[path]">
    <input type="button" class="button button-primary bafg-watermark-upload" value="Upload Watermark"> '
    ;

}

function bafg_enable_watermark_callback(){
    printf(
        '<input type="checkbox" name="bafg_watermark[enable_watermark]" id="bafg_enable_watermark" '. checked(bafg_option_value("enable_watermark"),'on',false) .' >'
    );
    
}
function bafg_attachment_id_callback(){

    printf(
        '<input type="hidden" class="bafg-attachment-id" value="'. bafg_option_value('bafg_attachment_id') .'" name="bafg_watermark[bafg_attachment_id]">'
    );
}
function bafg_watermark_prev_callback() {
    echo '
    <input type="hidden" class="bafg-watermark-prev-url"  name="bafg_watermark[prev]" value="' . bafg_option_value( "prev" ) . '">
    <img src="' .  bafg_option_value( "prev" ) . '" class="bafg-watermark-prev" type="text">';

}