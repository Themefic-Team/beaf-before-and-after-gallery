<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

if ( file_exists( BEAF_ADMIN_PATH . 'tf-options/options/tf-menu-icon.php' ) ) {
	require_once BEAF_ADMIN_PATH . 'tf-options/options/tf-menu-icon.php';
} else {
	$menu_icon = 'dashicons-palmtree';
}

TF_Settings::option( 'beaf_settings', array(
	'title'    => __( 'Beaf Settings ', 'bafg' ),
	'icon'     => $menu_icon,
	'position' => 25,
	'sections' => array(
		'tools' => array(
			'title' => __( 'Tools', 'bafg' ),
			'fields' => array(
				array(
					'id'      => 'enable_preloader',
					'title'   => __( 'Enable Preloader', 'bafg' ),
					'type'    => 'checkbox',
					'label'   => __( 'Enable Preloader', 'bafg' ),
					'default' => false
				),
				array(
					'id'       => 'bafg_publicly_queriable',
					'type'     => 'checkbox',
					'title'    => __( 'Disable publicly queryable', 'bafg' ),
					'label'    => __( 'Disable publicly queryable', 'bafg' ),
					'subtitle' => __( 'Disable publicly queryable', 'bafg' ),
				),
				array(
					'id'       => 'enable_debug_mode',
					'type'     => 'checkbox',
					'title'    => __( 'Enable Debug Mode', 'bafg' ),
					'label'    => __( 'Enable Debug Mode', 'bafg' ),
					'subtitle' => __( 'Debug mode allows you to troubleshoot conflicts with the theme or other plugins.', 'bafg' ),
				),
				array(
					'id'       => 'bafg_before_after_image_link',
					'type'     => 'checkbox',
					'title'    => __( 'Enable Image Link', 'bafg' ),
					'label'    => __( 'Enable Image Link', 'bafg' ),
					'subtitle' => __( ' Enable before after image link', 'bafg' ),
				),
				array(
					'id'       => 'bafg_open_url_new_tab',
					'type'     => 'checkbox',
					'title'    => __( 'Open Link', 'bafg' ),
					'label'    => __( 'Open Link', 'bafg' ),
					'subtitle' => __( 'Open URL in new tab', 'bafg' ),
				),
				
			)
			),
			'watermark' => array(
				'title' => __( 'Watermark', 'bafg' ),
				'fields' => array(
					array(
						'id'       => 'bafg_enable_watermark',
						'type'     => 'checkbox',
						'title'    => __( 'Enable Watermark', 'bafg' ),
						'label'    => __( 'Enable Watermark', 'bafg' ),
						'is_pro'   => true,
					),
					array(
						'id'       => 'path',
						'type'     => 'image',
						'title'    => __( 'Watermark Image Upload (PNG Recommended)', 'bafg' ),
						'label'    => __( 'Upload Watermark Image', 'bafg' ),
					),
					array(
						'id'       => 'enable_opacity',
						'type'     => 'checkbox',
						'title'    => __( 'Enable Watermark Opacity', 'bafg' ),
						'label'    => __( 'Enable Watermark Opacity', 'bafg' ),						
					),
					array(
						'id'       => 'watermark_position',
						'type'     => 'select',
						'title'    => __( 'Enable Watermark Opacity', 'bafg' ),
						'label'    => __( 'Enable Watermark Opacity', 'bafg' ),
						'options'  => array(
							'top-left'    => 'Top Left',
							'top-right'   => 'Top Right',
							'bottom-left' => 'Bottom Left',
							'bottom-right' => 'Bottom Right',
						)				
					),
				)
			),
			'shortcodes' => array(
				'title' => __( 'Shortcodes', 'bafg' ),
				'fields' => array(
					array(
						'id'       => 'bafg_before_after_shortcode',
						'title'    => __( 'All the available shortcodes', 'bafg' ),
						'type' => 'notice',
						'content' => "<code>[bafg_preview]</code> - Before After Gallery Frontend Preview (Users will be able to upload images without login)",

					)
				)
			),
			'documentation' => array(
				'title' => __( 'Documentation', 'bafg' ),
				'fields' => array(
					array(
						'id'       => 'bafg_documentation',
						'title'    => __( 'Documentation', 'bafg' ),
						'type' => 'notice',
						'content' => '<a href="https://themefic.com/docs/beaf" target="_blank">Please click here to visit the Documentation page.</a>',
					)
				)
			)
	),
) );