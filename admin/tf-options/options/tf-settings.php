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
				apply_filters( 'bafg_publicly_queriable',				
					array(
						'id'       => '',
						'type'     => 'checkbox',
						'title'    => __( 'Disable publicly queryable', 'bafg' ),
						'label'    => __( 'Disable publicly queryable', 'bafg' ),
						'is_pro'   => true,
					)
				),
				array(
					'id'       => 'enable_debug_mode',
					'type'     => 'checkbox',
					'title'    => __( 'Enable Debug Mode', 'bafg' ),
					'label'    => __( 'Enable Debug Mode', 'bafg' ),
					'subtitle' => __( 'Debug mode allows you to troubleshoot conflicts with the theme or other plugins.', 'bafg' ),
				),
				apply_filters( 'bafg_before_after_image_link', array(
					'id'       => '',
					'type'     => 'checkbox',
					'title'    => __( 'Enable Image Link', 'bafg' ),
					'label'    => __( 'Enable Image Link', 'bafg' ),
					'subtitle' => __( ' Enable before after image link', 'bafg' ),
					'is_pro'   => true,
				)),
				apply_filters( 'bafg_open_url_new_tab', array(
					'id'       => '',
					'type'     => 'checkbox',
					'title'    => __( 'Open Link', 'bafg' ),
					'label'    => __( 'Open Link', 'bafg' ),
					'subtitle' => __( 'Open URL in new tab', 'bafg' ),
					'is_pro'   => true,
				)),
				
			)
			),
			'watermark' => array(
				'title' => __( 'Watermark', 'bafg' ),
				'fields' => array(
					apply_filters( 'bafg_enable_watermark',array(
						'id'       => 'enable_watermark',
						'type'     => 'switch',
						'title'    => __( 'Enable Watermark', 'bafg' ),
						'label'    => __( 'Enable Watermark', 'bafg' ),
						'is_pro'   => true,
					)),
					array(
						'id'       => 'path',
						'type'     => 'image',
						'title'    => __( 'Watermark Image Upload (PNG Recommended)', 'bafg' ),
						'label'    => __( 'Upload Watermark Image', 'bafg' ),
						'dependency' => array( 'enable_watermark', '==', '1' ),
						'subtitle' => __( 'PNG image recommended', 'bafg' ),
					),
					apply_filters( 'bafg_enable_opacity',array(
						'id'       => '',
						'type'     => 'switch',
						'title'    => __( 'Enable Watermark Opacity', 'bafg' ),
						'label'    => __( 'Watermark Opacity (Required PNG-8 image)', 'bafg' ),
						'is_pro'   => true,
						'dependency' => array( 'enable_watermark', '==', '1' ),				
					)),
					apply_filters( 'bafg_watermark_opacity', array(
						'id'       => 'wm_opacity',
						'type'     => 'number',
						'title'    => __( 'Watermark Opacity', 'bafg' ),
						'label'    => __( 'Watermark Opacity', 'bafg' ),
						'subtitle' => __( 'Input opacity value between 0 and 100', 'bafg' ),
						'dependency' => array( 'wm_opacity_enable', '==', '1' ),
						'default'  => 50
					) ),
					apply_filters( 'bafg_watermark_position', array(
						'id'       => '',
						'type'     => 'select',
						'title'    => __( 'Watermark Position', 'bafg' ),
						'label'    => __( 'Watermark Position', 'bafg' ),
						'options'  => array(
							'top-left'    => 'Top Left',
							'top-right'   => 'Top Right',
							'bottom-left' => 'Bottom Left',
							'bottom-right' => 'Bottom Right',
						),
						'dependency' => array( 'enable_watermark', '==', '1' ),				
					)),
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