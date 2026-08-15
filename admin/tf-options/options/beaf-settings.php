<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

if ( file_exists( BEAF_ADMIN_PATH . 'tf-options/options/beaf-menu-icon.php' ) ) {
	require_once BEAF_ADMIN_PATH . 'tf-options/options/beaf-menu-icon.php';
} else {
	$bafg_menu_icon = 'dashicons-palmtree';
}
BEAF_Settings::option( 'beaf_settings', array(
	'title' => __( 'Beaf Settings ', 'beaf-before-and-after-gallery' ),
	'icon' => $bafg_menu_icon,
	'position' => 25,
	'sections' => array(
		'tools' => array(
			'title' => __( 'Tools', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa-solid fa-screwdriver-wrench',
			'fields' => array(
				array(
					'id' => 'enable_preloader',
					'title' => __( 'Enable Preloader', 'beaf-before-and-after-gallery' ),
					'type' => 'checkbox',
					'label' => __( 'Enable Preloader', 'beaf-before-and-after-gallery' ),
					'default' => false
				),
				apply_filters( 'bafg_publicly_queriable',
					array(
						'id' => '',
						'type' => 'checkbox',
						'title' => __( 'Disable publicly queryable', 'beaf-before-and-after-gallery' ),
						'label' => __( 'Disable publicly queryable', 'beaf-before-and-after-gallery' ),
						'is_pro' => true,
					)
				),
				array(
					'id' => 'enable_debug_mode',
					'type' => 'checkbox',
					'title' => __( 'Enable Debug Mode', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Enable Debug Mode', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Debug mode allows you to troubleshoot conflicts with the theme or other plugins.', 'beaf-before-and-after-gallery' ),
				),
				apply_filters( 'bafg_before_after_image_link', array(
					'id' => '',
					'type' => 'checkbox',
					'title' => __( 'Enable Image Link', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Enable Image Link', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( ' Enable before after image link', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
				) ),
				apply_filters( 'bafg_open_url_new_tab', array(
					'id' => '',
					'type' => 'checkbox',
					'title' => __( 'Open Link', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Open Link', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Open Before After image URL to a new tab', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
				) ),
			)
		),
		'watermark' => array(
			'title' => __( 'Watermark', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa-regular fa-image',
			'fields' => array(
				apply_filters( 'bafg_enable_watermark', array(
					'id' => 'enable_watermark',
					'type' => 'switch',
					'title' => __( 'Enable Watermark', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Enable Watermark', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
				) ),
				array(
					'id' => 'path',
					'type' => 'image',
					'title' => __( 'Watermark Image Upload (PNG Recommended)', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Upload Watermark Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'enable_watermark', '==', '1' ),
					'subtitle' => __( 'PNG image recommended', 'beaf-before-and-after-gallery' ),
				),
				apply_filters( 'bafg_enable_opacity', array(
					'id' => '',
					'type' => 'switch',
					'title' => __( 'Enable Watermark Opacity', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Watermark Opacity (Required PNG-8 image)', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'dependency' => array( 'enable_watermark', '==', '1' ),
				) ),
				apply_filters( 'bafg_watermark_opacity', array(
					'id' => 'wm_opacity',
					'type' => 'number',
					'title' => __( 'Watermark Opacity', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Watermark Opacity', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Input opacity value between 0 and 100', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'wm_opacity_enable', '==', '1' ),
					'default' => 50
				) ),
				apply_filters( 'bafg_watermark_position', array(
					'id' => '',
					'type' => 'select',
					'title' => __( 'Watermark Position', 'beaf-before-and-after-gallery' ),
					'label' => __( 'Watermark Position', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'center' => 'Center',
						'top_left' => 'Top Left',
						'top_right' => 'Top Right',
						'bottom_left' => 'Bottom Left',
						'bottom_right' => 'Bottom Right',
					),
					'dependency' => array( 'enable_watermark', '==', '1' ),
				) ),
			)
		),
		'shortcodes' => array(
			'title' => __( 'Shortcodes', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa-solid fa-code',
			'fields' => array(
				apply_filters( 'bafg_bafg_preview_shortcode', array(
					'id' => '',
					'title' => __( 'All the available shortcodes', 'beaf-before-and-after-gallery' ),
					'type' => 'notice',
					// 'is_pro' => true,
					'content' => "<code>[bafg_preview]</code> - Before After Gallery Frontend Preview (Users will be able to upload images without login)",
				) ),
			)
		),
		'documentation' => array(
			'title' => __( 'Documentation', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa-solid fa-file',
			'fields' => array(
				array(
					'id' => 'bafg_documentation',
					'title' => __( 'Documentation', 'beaf-before-and-after-gallery' ),
					'type' => 'notice',
					'content' => '<a href="https://themefic.com/docs/beaf" target="_blank">Please click here to visit the Documentation page.</a>',
				)
			)
		)
	),
) );