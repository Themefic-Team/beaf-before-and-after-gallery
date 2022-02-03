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
    <?php settings_errors();?>
    <!--Tab buttons start-->
    <div class="bafg-setting-tab">
        <a class="tablinks active" onclick="bafg_option_tab(event, 'bafg-watermark')"><?php _e( 'Watermark', 'bafg' );?></a>

        <?php do_action( 'bafg_admin_tab' );?>
    </div>
    <!--Tab buttons end-->
    <div id="bafg-watermark" class="bafg-tabcontent">
        <form method="post" action="options.php">
            <?php
            settings_fields( 'bafg-global-settings' );
            do_settings_sections( 'bafg_settings' );
            submit_button();
            ?>
        </form>
    </div>
</div>

<?php
}

function bafg_general_sections_callback() {
    echo '<h2>Before After Global Settings</h2>';

}
function bafg_watermark_upload_callback() {
    echo '<input type="text" value="' . get_option( "bafg_watermark" ) . '" name="bafg_watermark"><input type="button" class="button button-primary" value="Upload Watermark"> ';

}
function bafg_register_settings() {
    register_setting(
        'bafg-global-settings', // $option_group
        'bafg_watermark', // $option_name
    );
    add_settings_section(
        'bafg_global_option_header', // Section $id
        __( 'General', 'bafg' ),
        'bafg_general_sections_callback', // Callback
        'bafg_settings' // Settings Page Slug
    );

    add_settings_field(
        'bafg_watermark', // Field $id
        __( 'Watermark Image Upload', 'bafg' ), // Setting $title
        'bafg_watermark_upload_callback',
        'bafg_settings', // Settings Page Slug
        'bafg_global_option_header', // Section $id
    );

}
add_action( 'admin_init', 'bafg_register_settings' );