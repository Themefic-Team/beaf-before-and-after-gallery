<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

TF_Taxonomy_Metabox::taxonomy( 'tf_apartment_feature', array(
	'title'    => __( '', 'bafg' ),
	'taxonomy' => 'apartment_feature',
	'fields'   => array(
		array(
			'id'      => 'icon-type',
			'type'    => 'select',
			'title'   => __( 'Select Icon type', 'bafg' ),
			'options' => array(
				'icon'   => __( 'Icon Library', 'bafg' ),
				'custom' => __( 'Custom Icon', 'bafg' ),
			),
			'default' => 'icon'
		),

		array(
			'id'         => 'apartment-feature-icon',
			'type'       => 'icon',
			'title'      => __( 'Select Icon', 'bafg' ),
			'dependency' => array( 'icon-type', '==', 'icon' ),
		),
		array(
			'id'             => 'apartment-feature-icon-custom',
			'type'           => 'image',
			'label'          => __( 'Upload Custom Icon', 'bafg' ),
			'placeholder'    => __( 'No Icon selected', 'bafg' ),
			'button_title'   => __( 'Add Icon', 'bafg' ),
			'remove_title'   => __( 'Remove Icon', 'bafg' ),
			'preview_width'  => '50',
			'preview_height' => '50',
			'dependency'     => array( 'icon-type', '==', 'custom' ),
		),
		array(
			'id'          => 'apartment-feature-icon-dimension',
			'type'        => 'number',
			'label'       => __( 'Custom Icon Size', 'bafg' ),
			'description' => __( 'Size in "px"', 'bafg' ),
			'show_units'  => false,
			'height'      => false,
			'default'     => '20',
			'dependency'  => array( 'icon-type', '==', 'custom' ),
		),
	),
) );
