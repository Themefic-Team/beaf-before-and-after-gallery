<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

TF_Taxonomy_Metabox::taxonomy( 'tour_attraction', array(
	'title'    => __( 'Tour Settings', 'bafg' ),
	'taxonomy' => 'tour_attraction',
	'fields'   => array(
		array(
			'id'      => 'icon-type',
			'type'    => 'select',
			'title'   => __( 'Select Icon type', 'bafg' ),
			'options' => array(
				'fa' => __( 'Font Awesome', 'bafg' ),
				'c'  => __( 'Custom', 'bafg' ),
			),
			'default' => 'fa'
		),

		array(
			'id'         => 'icon-fa',
			'type'       => 'icon',
			'title'      => __( 'Select Font Awesome Icon', 'bafg' ),
			'dependency' => array( 'icon-type', '==', 'fa' ),
		),
		array(
			'id'             => 'icon-c',
			'type'           => 'image',
			'label'          => __( 'Upload Custom Icon', 'bafg' ),
			'placeholder'    => __( 'No Icon selected', 'bafg' ),
			'button_title'   => __( 'Add Icon', 'bafg' ),
			'remove_title'   => __( 'Remove Icon', 'bafg' ),
			'preview_width'  => '50',
			'preview_height' => '50',
			'dependency'     => array( 'icon-type', '==', 'c' ),
		),
		array(
			'id'          => 'dimention',
			'type'        => 'number',
			'label'       => __( 'Custom Icon Size', 'bafg' ),
			'description' => __( 'Size in "px"', 'bafg' ),
			'show_units'  => false,
			'height'      => false,
			'default'     => '20',
			'dependency'  => array( 'icon-type', '==', 'c' ),
		),
	),
) );
