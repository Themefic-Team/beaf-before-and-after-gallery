<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

if ( file_exists( BEAF_ADMIN_PATH . 'tf-options/options/tf-menu-icon.php' ) ) {
	require_once BEAF_ADMIN_PATH . 'tf-options/options/tf-menu-icon.php';
} else {
	$menu_icon = 'dashicons-palmtree';
}

TF_Settings::option( 'tf_settings', array(
	'title'    => __( 'Tourfic Settings ', 'bafg' ),
	'icon'     => $menu_icon,
	'position' => 25,
	'sections' => array(),
) );
