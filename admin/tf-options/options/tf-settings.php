<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

if ( file_exists( TF_ADMIN_PATH . 'tf-options/options/tf-menu-icon.php' ) ) {
	require_once TF_ADMIN_PATH . 'tf-options/options/tf-menu-icon.php';
} else {
	$menu_icon = 'dashicons-palmtree';
}

TF_Settings::option( 'tf_settings', array(
	'title'    => __( 'Tourfic Settings ', 'bafg' ),
	'icon'     => $menu_icon,
	'position' => 25,
	'sections' => array(
		'general'               => array(
			'title'  => __( 'General', 'bafg' ),
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'       => 'disable-services',
					'type'     => 'checkbox',
					'label'    => __( 'Disable Services', 'bafg' ),
					'subtitle' => __( 'Disable or hide the services you don\'t need by ticking the checkbox', 'bafg' ),
					'options'  => array(
						'hotel'     => __( 'Hotels', 'bafg' ),
						'tour'      => __( 'Tours', 'bafg' ),
						'apartment' => __( 'Apartment', 'bafg' ),
					),
				),
				array(
					'id'       => 'tf-date-format-for-users',
					'type'     => 'select',
					'label'    => __( 'Select Date Format', 'bafg' ),
					'subtitle' => __( 'Select a format, that will show when a user select date', 'bafg' ),
					'options'  => array(
						'Y/m/d'  => __( 'YYYY/MM/DD', 'bafg' ),
						'Y-m-d' => __( 'YYYY-MM-DD', 'bafg' ),
						'd-m-Y'  => __( 'DD-MM-YYYY', 'bafg' ),
						'd/m/Y'  => __( 'DD/MM/YYYY', 'bafg' ),
						'Y.m.d'  => __( 'YYYY.MM.DD', 'bafg' ),
						'd.m.Y'  => __( 'DD.MM.YYYY', 'bafg' ),
					),
					'default'    => 'Y/m/d',
				),
				array(
					'id'       => 'template_heading',
					'type'     => 'heading',
					'label'    => __( 'Template Settings', 'bafg' ),
					'subtitle' => __( 'You can able to change your hotel & tour template. Currently, we only allow 2 template.', 'bafg' ),
				),
				array(
					'id'    => 'tf-template',
					'type'  => 'tab',
					'label' => 'Hotel, Tour & Apartment Template',
					'tabs'  => array(
						array(
							'id'     => 'hotel_template',
							'title'  => __( 'Hotel', 'bafg' ),
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'      => 'hotel-title',
									'type'    => 'heading',
									'content' => __( 'Hotel Single Page', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'       => 'single-hotel',
									'type'     => 'imageselect',
									'label'    => __( 'Select Single Template', 'bafg' ),
									'multiple' => true,
									'inline'   => true,
									'options'  => array(
										'design-1' => array(
											'title' => 'Design 1',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/design1-hotel.jpg",
										),
										'default'  => array(
											'title' => 'Defult',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/default-hotel.jpg",
										),
									),
									'default'  => function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
								),
								array(
									'id'         => 'single-hotel-layout',
									'class'      => 'disable-sortable',
									'type'       => 'repeater',
									'drag_only'  => true,
									'label'      => __( 'Single Hotel Template Sections', 'bafg' ),
									'subtitle'   => __( 'You can able to change section positions by Drag & Drop.', 'bafg' ),
									'dependency' => array( 'single-hotel', '==', 'design-1' ),
									'fields'     => array(
										array(
											'id'         => 'hotel-section',
											'class'      => 'tf-section-name-hidden',
											'type'       => 'text',
											'label'      => __( 'Section Name', 'bafg' ),
											'attributes' => array(
												'readonly' => 'readonly',
											),
										),
										array(
											'id'         => 'hotel-section-slug',
											'class'      => 'tf-section-name-hidden',
											'type'       => 'text',
											'label'      => __( 'Section Slug', 'bafg' ),
											'attributes' => array(
												'readonly' => 'readonly',
											),
										),
										array(
											'id'       => 'hotel-section-status',
											'type'     => 'switch',
											'label'    => __( 'Section Status', 'bafg' ),
											'subtitle' => __( 'You can able to enable/disable this section.', 'bafg' ),
										),
									),
									'default'    => array(
										array(
											'hotel-section'        => __( 'Description', 'bafg' ),
											'hotel-section-slug'   => __( 'description', 'bafg' ),
											'hotel-section-status' => true,
										),
										array(
											'hotel-section'        => __( 'Features', 'bafg' ),
											'hotel-section-slug'   => __( 'features', 'bafg' ),
											'hotel-section-status' => true,
										),
										array(
											'hotel-section'        => __( 'Room', 'bafg' ),
											'hotel-section-slug'   => __( 'rooms', 'bafg' ),
											'hotel-section-status' => true,
										),
										array(
											'hotel-section'        => __( 'FAQ', 'bafg' ),
											'hotel-section-slug'   => __( 'faq', 'bafg' ),
											'hotel-section-status' => true,
										),
										array(
											'hotel-section'        => __( 'Review', 'bafg' ),
											'hotel-section-slug'   => __( 'review', 'bafg' ),
											'hotel-section-status' => true,
										),
										array(
											'hotel-section'        => __( 'Terms & Conditions', 'bafg' ),
											'hotel-section-slug'   => __( 'trams-condition', 'bafg' ),
											'hotel-section-status' => true,
										),
									)
								),
								array(
									'id'      => 'hotel-title',
									'type'    => 'heading',
									'content' => __( 'Hotel Archive & Search Result Page', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'       => 'hotel-archive',
									'type'     => 'imageselect',
									'label'    => __( 'Select Archive & Search Result Template', 'bafg' ),
									'multiple' => true,
									'inline'   => true,
									'options'  => array(
										'design-1' => array(
											'title' => 'Design 1',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/hotel-archive-design1.jpg",
										),
										'default'  => array(
											'title' => 'Defult',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/hotel-archive-default.jpg",
										),
									),
									'default'  => function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
								),
								array(
									'id'         => 'hotel_archive_view',
									'type'       => 'select',
									'label'      => __( 'Archive Layout', 'bafg' ),
									'options'    => array(
										'list' => __( 'List', 'bafg' ),
										'grid' => __( 'Grid', 'bafg' ),
									),
									'default'    => 'List',
									'dependency' => array( 'hotel-archive', '==', 'design-1' ),
								),
								array(
									'id'       => 'hotel_archive_price_minimum_settings',
									'type'     => 'select',
									'label'    => __( 'Select Minimum Price to Show?', 'bafg' ),
									'options'  => array(
										'all'   => __( 'All', 'bafg' ),
										'adult'   => __( 'Adult', 'bafg' ),
										'child'   => __( 'Child', 'bafg' ),
									),
									'default'    => 'All',
								), 
								array(
									'id'      => 'hotel_archive_notice',
									'type'    => 'notice',
									'content' => __( 'Edit the sidebar filter from Appearance -> Widgets', 'bafg' ),
								),
							),
						),
						array(
							'id'     => 'tour_template',
							'title'  => __( 'Tour', 'bafg' ),
							'fields' => array(
								array(
									'id'      => 'tour-title',
									'type'    => 'heading',
									'content' => __( 'Tour Single Page', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'       => 'single-tour',
									'type'     => 'imageselect',
									'label'    => __( 'Select Single Template', 'bafg' ),
									'multiple' => true,
									'inline'   => true,
									'options'  => array(
										'design-1' => array(
											'title' => 'Design 1',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/design1-tour.jpg",
										),
										'default'  => array(
											'title' => 'Defult',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/default-tour.jpg",
										),
									),
									'default'  => function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
								),
								array(
									'id'         => 'single-tour-layout',
									'class'      => 'disable-sortable',
									'type'       => 'repeater',
									'drag_only'  => true,
									'label'      => __( 'Single Tour Template Sections', 'bafg' ),
									'subtitle'   => __( 'You can able to change section positions by Drag & Drop.', 'bafg' ),
									'dependency' => array( 'single-tour', '==', 'design-1' ),
									'fields'     => array(
										array(
											'id'         => 'tour-section',
											'class'      => 'tf-section-name-hidden',
											'type'       => 'text',
											'label'      => __( 'Section Name', 'bafg' ),
											'attributes' => array(
												'readonly' => 'readonly',
											),
										),
										array(
											'id'         => 'tour-section-slug',
											'class'      => 'tf-section-name-hidden',
											'type'       => 'text',
											'label'      => __( 'Section Slug', 'bafg' ),
											'attributes' => array(
												'readonly' => 'readonly',
											),
										),
										array(
											'id'       => 'tour-section-status',
											'type'     => 'switch',
											'label'    => __( 'Section Status', 'bafg' ),
											'subtitle' => __( 'You can able to enable/disable this section.', 'bafg' ),
										),
									),
									'default'    => array(
										array(
											'tour-section'        => __( 'Gallery', 'bafg' ),
											'tour-section-slug'   => __( 'gallery', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Price', 'bafg' ),
											'tour-section-slug'   => __( 'price', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Description', 'bafg' ),
											'tour-section-slug'   => __( 'description', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Information', 'bafg' ),
											'tour-section-slug'   => __( 'information', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Highlights', 'bafg' ),
											'tour-section-slug'   => __( 'highlights', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Include Exclude', 'bafg' ),
											'tour-section-slug'   => __( 'include-exclude', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Itinerary', 'bafg' ),
											'tour-section-slug'   => __( 'itinerary', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Map', 'bafg' ),
											'tour-section-slug'   => __( 'map', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'FAQ', 'bafg' ),
											'tour-section-slug'   => __( 'faq', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Terms & Conditions', 'bafg' ),
											'tour-section-slug'   => __( 'trams-condition', 'bafg' ),
											'tour-section-status' => true,
										),
										array(
											'tour-section'        => __( 'Review', 'bafg' ),
											'tour-section-slug'   => __( 'review', 'bafg' ),
											'tour-section-status' => true,
										),
									)
								),
								array(
									'id'      => 'tour-title',
									'type'    => 'heading',
									'content' => __( 'Tour Archive & Search Result Page', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'       => 'tour-archive',
									'type'     => 'imageselect',
									'label'    => __( 'Select Archive & Search Result Template', 'bafg' ),
									'multiple' => true,
									'inline'   => true,
									'options'  => array(
										'design-1' => array(
											'title' => 'Design 1',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/tour-archive-design-1.jpg",
										),
										'default'  => array(
											'title' => 'Defult',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/tour-archive-default.jpg",
										),
									),
									'default'  => function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
								),
								array(
									'id'         => 'tour_archive_view',
									'type'       => 'select',
									'label'      => __( 'Archive Layout', 'bafg' ),
									'options'    => array(
										'list' => __( 'List', 'bafg' ),
										'grid' => __( 'Grid', 'bafg' ),
									),
									'default'    => 'List',
									'dependency' => array( 'tour-archive', '==', 'design-1' ),
								),
								array(
									'id'       => 'tour_archive_price_minimum_settings',
									'type'     => 'select',
									'label'    => __( 'Select Minimum Price to Show?', 'bafg' ),
									'options'  => array(
										'all'   => __( 'All', 'bafg' ),
										'adult'   => __( 'Adult', 'bafg' ),
										'child'   => __( 'Child', 'bafg' ),
									),
									'default'    => 'All',
								),
								array(
									'id'      => 'tour_archive_notice',
									'type'    => 'notice',
									'content' => __( 'Edit the sidebar filter from Appearance -> Widgets', 'bafg' ),
								),
							),
						),
						array(
							'id'     => 'apartment_template',
							'title'  => __( 'Apartment', 'bafg' ),
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'      => 'apartment-title',
									'type'    => 'heading',
									'content' => __( 'Apartment Single Page', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'       => 'single-apartment',
									'type'     => 'imageselect',
									'label'    => __( 'Select Single Template', 'bafg' ),
									'multiple' => true,
									'inline'   => true,
									'options'  => array(
										'default'  => array(
											'title' => 'Default',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/default-apartment.jpg",
										),
									),
									'default'  => function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
								),
								array(
									'id'      => 'apartment-title',
									'type'    => 'heading',
									'content' => __( 'Apartment Archive & Search Result Page', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'       => 'apartment-archive',
									'type'     => 'imageselect',
									'label'    => __( 'Select Archive & Search Result Template', 'bafg' ),
									'multiple' => true,
									'inline'   => true,
									'options'  => array(
										'default'  => array(
											'title' => 'Default',
											'url'   => TF_ASSETS_ADMIN_URL . "images/template/apartment-archive-default.jpg",
										),
									),
									'default'  => function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
								),
								array(
									'id'      => 'apartment_archive_notice',
									'type'    => 'notice',
									'content' => __( 'Edit the sidebar filter from Appearance -> Widgets', 'bafg' ),
								),
							),
						),
					),
				)
			),
		),
		'hotel_option'          => array(
			'title'  => __( 'Hotel Options', 'bafg' ),
			'icon'   => 'fas fa-hotel',
			'fields' => array(),
		),
		'single_page'           => array(
			'title'  => __( 'Single Page', 'bafg' ),
			'parent' => 'hotel_option',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'    => 'label_off_heading',
					'type'  => 'heading',
					'label' => __( 'Single Hotel Settings', 'bafg' ),
				),

				array(
					'id'        => 'h-review',
					'type'      => 'switch',
					'label'     => __( 'Disable Review Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
				),

				array(
					'id'        => 'h-share',
					'type'      => 'switch',
					'label'     => __( 'Disable Share Option', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
				),
				array(
					'id'        => 'feature-filter',
					'type'      => 'switch',
					'label'     => __( 'Filter By Feature', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => true,
					'is_pro'    => true
				),
				array(
					'id'     => 'h-enquiry-email',
					'type'   => 'text',
					'label'  => __( 'Enquiry Email', 'bafg' ),
					'is_pro' => true,
				),
			),
		),
		'room_config'           => array(
			'title'  => __( 'Room Config', 'bafg' ),
			'parent' => 'hotel_option',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'    => 'hotel_room_heading',
					'type'  => 'heading',
					'label' => __( 'Hotel Room Configuration', 'bafg' ),
				),

				array(
					'id'       => 'children_age_limit',
					'type'     => 'switch',
					'label'    => __( 'Children age limit', 'bafg' ),
					'subtitle' => __( 'keep blank if don\'t want to add', 'bafg' ),
					'is_pro'   => true,
				),
				array(
					'id'         => '',
					'type'       => 'number',
					'label'      => __( 'Insert your Maximum Age Limit', 'bafg' ),
					'subtitle'   => __( 'Numbers Only', 'bafg' ),
					'attributes' => array(
						'min' => '0',
					),
					'is_pro'     => true,
				),
			),
		),
		// Hotel service Popup
		'payment_popup'         => array(
			'title'  => __( 'Popup Settings', 'bafg' ),
			'parent' => 'hotel_option',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'    => 'hotel_popup_heading',
					'type'  => 'heading',
					'label' => __( 'Settings for Popup', 'bafg' ),
				),
				array(
					'id'     => '',
					'type'   => 'text',
					'label'  => __( 'Popup Title', 'bafg' ),
					'is_pro' => true,
				),

				array(
					'id'     => '',
					'type'   => 'textarea',
					'label'  => __( 'Popup Description', 'bafg' ),
					'is_pro' => true,
				),

				array(
					'id'      => '',
					'type'    => 'text',
					'label'   => __( 'Popup Button Text', 'bafg' ),
					'default' => __( 'Continue to booking', 'bafg' ),
					'is_pro'  => true,
				)
			),
		),

		//Apartment Options
		'apartment_option'      => array(
			'title'  => __( 'Apartment Options', 'bafg' ),
			'icon'   => 'fa-solid fa-house-chimney',
			'fields' => array(),
		),
		'apartment_single_page' => array(
			'title'  => __( 'Single Page', 'bafg' ),
			'parent' => 'apartment_option',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'    => 'label_off_heading',
					'type'  => 'heading',
					'label' => __( 'Single Apartment Settings', 'bafg' ),
				),

				array(
					'id'           => 'amenities_cats',
					'type'         => 'repeater',
					'label'        => __( 'Amenities Categories', 'bafg' ),
					'button_title' => __( 'Add New', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'amenities_cat_name',
							'type'  => 'text',
							'label' => __( 'Category Name', 'bafg' ),
						),
					),
				),

				array(
					'id'        => 'disable-apartment-review',
					'type'      => 'switch',
					'label'     => __( 'Disable Review Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
				),

				array(
					'id'        => 'disable-apartment-share',
					'type'      => 'switch',
					'label'     => __( 'Disable Share Option', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
				),

				array(
					'id'        => 'disable-related-apartment',
					'type'      => 'switch',
					'label'     => __( 'Disable Related Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
				),
			),
		),

		// Tour Options
		'tour'                  => array(
			'title'  => __( 'Tour Options', 'bafg' ),
			'icon'   => 'fas fa-umbrella-beach',
			'fields' => array(),
		),
		'single_tour'           => array(
			'title'  => __( 'Single Page', 'bafg' ),
			'parent' => 'tour',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'       => 'signle_tour_heading',
					'type'     => 'heading',
					'label'    => __( 'Global Settings for Single Tours Page', 'bafg' ),
					'subtitle' => __( 'These options can be overridden from Single Hotel Settings.', 'bafg' ),
				),

				array(
					'id'        => 't-review',
					'type'      => 'switch',
					'label'     => __( 'Disable Review Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'        => 't-share',
					'type'      => 'switch',
					'label'     => __( 'Disable Share Option', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
				),
				array(
					'id'        => 't-related',
					'type'      => 'switch',
					'label'     => __( 'Disable Related Tour Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'       => 'rt-title',
					'type'     => 'text',
					'label'    => __( 'Related Tour Title', 'bafg' ),
					'subtitle' => __( 'This Title will show on single tour, Related tour Section as Section Title.', 'bafg' ),
					'default'  => __( 'You might also like', 'bafg' ),
				),
				array(
					'id'       => 'rt-description',
					'type'     => 'text',
					'label'    => __( 'Related Tour Description', 'bafg' ),
					'subtitle' => __( 'This Description will show on single tour, Related tour Section as Section Description.', 'bafg' ),
					'default'  => __( 'Travel is my life. Since 1999, I have been traveling around the world nonstop. If you also love travel, you are in the right place!', 'bafg' ),
				),
				array(
					'id'      => 'rt-display',
					'type'    => 'radio',
					'is_pro'  => true,
					'label'   => __( 'Related tour display type', 'bafg' ),
					'options' => array(
						'auto'     => __( 'Auto', 'bafg' ),
						'selected' => __( 'Selected', 'bafg' )
					),
					'default' => 'auto',
					'inline'  => true,
				),
				array(
					'id'         => 'tf-ralated-tours',
					'type'       => 'select2',
					'is_pro'     => true,
					'label'      => __( 'Choose related tours for single page', 'bafg' ),
					'options'    => 'posts',
					'query_args' => array(
						'post_type'      => 'tf_tours',
						'posts_per_page' => - 1,
					),
				),
				array(
					'id'       => 't-enquiry-email',
					'type'     => 'text',
					'label'    => __( 'Email for Enquiry Form', 'bafg' ),
					'subtitle' => __( 'The Email to receive all enquiry form submissions', 'bafg' ),
					'is_pro'   => true,
				),
				array(
					'id'        => 't-auto-draft',
					'type'      => 'switch',
					'label'     => __( 'Expired Tours for Backend', 'bafg' ),
					'subtitle'  => __( 'If you enable this option, then the tour will be auto-expired after the date expired. (Status will be change after every 24 hours)', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'        => 't-show-expire-tour',
					'type'      => 'switch',
					'label'     => __( 'Show All Tours (Publish + Expired)', 'bafg' ),
					'subtitle'  => __( 'If you enable this option, all tours whose status is Published and Expired will be displayed', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'        => 't-hide-start-price',
					'type'      => 'switch',
					'label'     => __( 'Hide Start Price', 'bafg' ),
					'subtitle'  => __( 'If you enable this option, then the start price will be hidden from the tour list.', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				)
			),
		),
		// Partial Payment Popup
		'tour_payment_popup'    => array(
			'title'  => __( 'Partial Payment', 'bafg' ),
			'parent' => 'tour',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'    => 'signle_tour_heading',
					'type'  => 'heading',
					'label' => __( 'Settings for Partial Payment', 'bafg' ),
				),
				array(
					'id'      => '',
					'type'    => 'text',
					'label'   => __( 'Label', 'bafg' ),
					'is_pro'  => true,
					'default' => __( 'Pertial payment of {amount} on total', 'bafg' ),
				),
				array(
					'id'      => '',
					'type'    => 'textarea',
					'label'   => __( 'Description', 'bafg' ),
					'is_pro'  => true,
					'default' => __( 'You can Partial Payment amount for booking the tour. After booking the tour, you can pay the rest amount after the tour is completed.', 'bafg' ),
				),
				array(
					'id'      => 'notice_shortcode',
					'type'    => 'notice',
					'content' => __( 'Use shortcode <code>{amount}</code> to show percentage amount in Label', 'bafg' ),
					'is_pro' => true
				),
			),
		),
		// Itinerary Settings
		'tour_itinerary'        => array(
			'title'  => __( 'Itinerary Settings', 'bafg' ),
			'parent' => 'tour',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'   => 'itinerary-builder-setings',
					'type' => 'tab',
					'tabs' => array(
						array(
							'id'     => 'itinerary-builder-setting',
							'title'  => 'Itinerary Builder Settings',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => 'itinerary-builder-heading',
									'type'     => 'heading',
									'subtitle' => __( 'You can create your own Itinerary using Tourfic\'s Itinerary builder. The builder can be found on Single Tour Settings', 'bafg' ),
								),
								array(
									'id'           => '',
									'type'         => 'repeater',
									'label'        => __( 'Create Custom Itinerary options', 'bafg' ),
									'button_title' => __( 'Add New Options', 'bafg' ),
									'is_pro'       => true,
									'fields'       => array(
										array(
											'id'    => 'sleep-mode-title',
											'type'  => 'text',
											'label' => __( 'Field Title', 'bafg' ),
										),
										array(
											'id'    => 'sleep-mode-icon',
											'type'  => 'icon',
											'label' => __( 'Field Icon', 'bafg' ),
										),
									),
								),
								array(
									'id'           => '',
									'type'         => 'repeater',
									'button_title' => __( 'Add New Meal', 'bafg' ),
									'label'        => __( 'Include Meal', 'bafg' ),
									'is_pro'       => true,
									'fields'       => array(
										array(
											'id'    => 'meal',
											'type'  => 'text',
											'label' => __( 'Meal name', 'bafg' ),
										),
									),
								),
								array(
									'id'      => '',
									'label'   => __( 'Elevation Input', 'bafg' ),
									'type'    => 'select',
									'options' => [
										'Meter' => __( 'Meter', 'bafg' ),
										'Feet'  => __( 'Feet', 'bafg' ),
									],
									'is_pro'  => true,
									'default' => 'Meter',
								),
								array(
									'id'          => '',
									'type'        => 'switch',
									'is_pro'      => true,
									'label'       => __( 'Show Chart on Trip Page', 'bafg' ),
									'field_width' => 50,
								),
								array(
									'id'          => '',
									'type'        => 'switch',
									'is_pro'      => true,
									'label'       => __( 'Always Show All Itinerary', 'bafg' ),
									'field_width' => 50,
								),
								array(
									'id'          => '',
									'type'        => 'switch',
									'is_pro'      => true,
									'label'       => __( 'Show X-Axis', 'bafg' ),
									'field_width' => 50,
								),
								array(
									'id'          => '',
									'type'        => 'switch',
									'is_pro'      => true,
									'label'       => __( 'Show Y-Axis', 'bafg' ),
									'field_width' => 50,
								),
								array(
									'id'          => '',
									'type'        => 'switch',
									'is_pro'      => true,
									'label'       => __( 'Show line Graph', 'bafg' ),
									'field_width' => 50,
								),
							),
						),
						array(
							'id'     => 'itinerary-downloader-setting',
							'title'  => 'Itinerary Downloader Settings',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => '',
									'type'     => 'switch',
									'is_pro'   => true,
									'label'    => __( 'Enable Itinerary Downloader', 'bafg' ),
									'subtitle' => __( 'Enabling this will allow customers to download the itinerary plan in PDF format.', 'bafg' ),
									"default" => true,
								),
								array(
									'id'      => 'tour_pdf_downloader_section',
									'type'    => 'heading',
									'content' => __( 'Tour Downloader Section', 'bafg' ),
								),
								array(
									'id'    => '',
									'type'  => 'text',
									'label' => __( 'Tour Downloader Title Text', 'bafg' ),
									'default' => "Want to read it later?",
									'placeholder' => "Want to read it later?",
									'is_pro'   => true,
								),
								array(
									'id'    => '',
									'type'  => 'text',
									'label' => __( 'Tour Downloader Sort Text', 'bafg' ),
									'default' => "Download this tour's PDF brochure and start your planning offline.",
									'placeholder' => "Download this tour's PDF brochure and start your planning offline.",
									'is_pro'   => true,
								),
								array(
									'id'    => '',
									'type'  => 'text',
									'label' => __( 'Tour Downloader Button Text', 'bafg' ),
									'default' => "Download Now",
									'placeholder' => "Download Now",
									'is_pro'   => true,
								),
								array(
									'id'      => 'tour_settings',
									'type'    => 'heading',
									'content' => __( 'Tour Settings in PDF', 'bafg' ),
								),
								array(
									'id'          => '',
									'type'        => 'number',
									'label'       => __( 'Tour Thumbnail Height', 'bafg' ),
									'field_width' => 50,
									'is_pro'      => true,
								),
								array(
									'id'          => '',
									'type'        => 'number',
									'label'       => __( 'Tour Thumbnail Width', 'bafg' ),
									'field_width' => 50,
									'is_pro'      => true,
								),
								array(
									'id'      => 'companey_info_heading',
									'type'    => 'heading',
									'content' => __( 'Company Info', 'bafg' ),
								),

								array(
									'id'     => '',
									'type'   => 'image',
									'is_pro' => true,
									'label'  => __( 'Company Logo', 'bafg' ),
								),
								array(
									'id'     => '',
									'type'   => 'textarea',
									'is_pro' => true,
									'label'  => __( 'Short Company Description', 'bafg' ),
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'is_pro'      => true,
									'label'       => __( 'Company Email Address', 'bafg' ),
									'field_width' => 33.33,
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'is_pro'      => true,
									'label'       => __( 'Company Address', 'bafg' ),
									'field_width' => 33.33,
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'is_pro'      => true,
									'label'       => __( 'Company Phone', 'bafg' ),
									'field_width' => 33.33,
								),
								array(
									'id'    => 'export_heading',
									'type'  => 'heading',
									'label' => __( 'Talk to Expert', 'bafg' ),
								),
								array(
									'id'      => '',
									'type'    => 'switch',
									'is_pro'  => true,
									'label'   => __( 'Enable Talk To Expert - Section in PDF', 'bafg' ),
									'default' => false,
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'is_pro'      => true,
									'label'       => __( 'Talk to Expert - Label', 'bafg' ),
									'field_width' => 25,
									'dependency'  => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'label'       => __( 'Expert Name', 'bafg' ),
									'field_width' => 25,
									'is_pro'      => true,
									'dependency'  => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'label'       => __( 'Expert Email Address', 'bafg' ),
									'field_width' => 25,
									'is_pro'      => true,
									'dependency'  => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'label'       => __( 'Expert Phone Address', 'bafg' ),
									'field_width' => 25,
									'is_pro'      => true,
									'dependency'  => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'         => '',
									'type'       => 'image',
									'is_pro'     => true,
									'label'      => __( 'Expert Avatar Image', 'bafg' ),
									'dependency' => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'         => '',
									'type'       => 'switch',
									'label'      => __( 'Viber Contact Available', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'         => '',
									'type'       => 'switch',
									'is_pro'     => true,
									'label'      => __( 'WhatsApp Contact Available', 'bafg' ),
									'dependency' => array(
										array( 'itinerary-expert', '==', 'true' ),
									),
								),
								array(
									'id'       => 'signle_tour_fonts',
									'type'     => 'heading',
									'label'    => __( 'PDF Downloader Font Support', 'bafg' ),
									'subtitle' => __( 'If your site\'s language is not English, then upload your language font. Otherwise, your Downloader PDF may not work properly.', 'bafg' ),
								),
								array(
									'id'     => '',
									'type'   => 'file',
									'label'  => __( 'Upload Fonts', 'bafg' ),
									'is_pro' => true,
								),
							),
						),
					),
				),
				array(
					'id'          => '',
					'type'        => 'switch',
					'label'       => __( 'Enable Itinerary Map', 'bafg' ),
					'label_on'    => __( 'Yes', 'bafg' ),
					'label_off'   => __( 'No', 'bafg' ),
					'is_pro'      => true,
					'field_width' => 50,
				),
				array(
					'id'          => '',
					'type'        => 'select',
					'label'       => __( 'Travel Mode', 'bafg' ),
					'options'     => array(
						'DRIVING'   => __( 'Driving', 'bafg' ),
						'WALKING'   => __( 'Walking', 'bafg' ),
						'BICYCLING' => __( 'Bycycling', 'bafg' ),
					),
					'default'     => 'driving',
					'is_pro'      => true,
					'field_width' => 50,
				),

			),
		),
		// Without Payment Popup
		'without_payment_book'  => array(
			'title'  => __( 'Without Payment', 'bafg' ),
			'parent' => 'tour',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'       => 'confirmation_fields_heading',
					'type'     => 'heading',
					'label'    => __( 'Settings for Booking Confirmation Fields', 'bafg' ),
					'subtitle' => __( 'Booking Confirmation Fields works for without payment.', 'bafg' ),
				),
				array(
					'id'           => 'book-confirm-field',
					'class'        => 'disable-sortable',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'Fields for Booking Confirmation', 'bafg' ),
					'subtitle'     => __( 'Custom fields allowed', 'bafg' ),
					'is_pro'       => true,
					'fields'       => array(
						array(
							'id'    => 'reg-field-label',
							'type'  => 'text',
							'label' => __( 'Label', 'bafg' ),
						),
						array(
							'id'       => 'reg-field-name',
							'type'     => 'text',
							'label'    => __( 'Name', 'bafg' ),
							'subtitle' => __( 'Space Not allowed (Ex: tf_name)', 'bafg' ),
							'validate' => 'no_space_no_special',
							'class'    => 'tf_hidden_fields'
						),
						array(
							'id'      => 'reg-fields-type',
							'type'    => 'select',
							'label'   => __( 'Field Type', 'bafg' ),
							'options' => array(
								'text'     => __( 'Text', 'bafg' ),
								'email'    => __( 'Email', 'bafg' ),
								'date'     => __( 'Date', 'bafg' ),
								'radio'    => __( 'Radio', 'bafg' ),
								'checkbox' => __( 'Checkbox', 'bafg' ),
								'select'   => __( 'Select', 'bafg' ),
							),
							'class'   => 'tf_hidden_fields'
						),
						array(
							'id'           => 'reg-options',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Option Label', 'bafg' ),
							'dependency'   => array(
								array( 'reg-fields-type', '==', 'radio' ),
							),
							'fields'       => array(
								array(
									'label' => __( 'Field Label', 'bafg' ),
									'id'    => 'option-label',
									'type'  => 'text',
								),
								array(
									'label' => __( 'Field Value', 'bafg' ),
									'id'    => 'option-value',
									'type'  => 'text',
								),
							),
						),
						array(
							'id'           => 'reg-options',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Option Label', 'bafg' ),
							'dependency'   => array(
								array( 'reg-fields-type', '==', 'select' ),
							),
							'fields'       => array(
								array(
									'label' => __( 'Field Label', 'bafg' ),
									'id'    => 'option-label',
									'type'  => 'text',
								),
								array(
									'label' => __( 'Field Value', 'bafg' ),
									'id'    => 'option-value',
									'type'  => 'text',
								),
							),
						),
						array(
							'id'           => 'reg-options',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Option Label', 'bafg' ),
							'dependency'   => array(
								array( 'reg-fields-type', '==', 'checkbox' ),
							),
							'fields'       => array(
								array(
									'label' => __( 'Field Label', 'bafg' ),
									'id'    => 'option-label',
									'type'  => 'text',
								),
								array(
									'label' => __( 'Field Value', 'bafg' ),
									'id'    => 'option-value',
									'type'  => 'text',
								),
							),
						),
						array(
							'id'    => 'reg-field-required',
							'type'  => 'switch',
							'label' => __( 'Required Field ?', 'bafg' ),
							'class' => 'tf_hidden_fields'
						),

					),
					'default'      => array(
						array(
							'reg-field-label'    => __( 'First Name', 'bafg' ),
							'reg-field-name'     => __( 'tf_first_name', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Last Name', 'bafg' ),
							'reg-field-name'     => __( 'tf_last_name', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Email', 'bafg' ),
							'reg-field-name'     => __( 'tf_email', 'bafg' ),
							'reg-fields-type'    => 'email',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Phone', 'bafg' ),
							'reg-field-name'     => __( 'tf_phone', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Country', 'bafg' ),
							'reg-field-name'     => __( 'tf_country', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Street Address', 'bafg' ),
							'reg-field-name'     => __( 'tf_street_address', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Town/City', 'bafg' ),
							'reg-field-name'     => __( 'tf_town_city', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'State/Country', 'bafg' ),
							'reg-field-name'     => __( 'tf_state_country', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Postcode/ZIP', 'bafg' ),
							'reg-field-name'     => __( 'tf_postcode', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
					),
				),
				array(
					'id'          => '',
					'type'        => 'editor',
					'label'       => __( 'Booking Confirmation Message', 'bafg' ),
					'default' 	  => 'Booked Successfully',
					'is_pro'       => true,
				),
			),
		),
		// Booking Settings
		'tour_booking_settings'  => array(
			'title'  => __( 'Booking', 'bafg' ),
			'parent' => 'tour',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array( // start
					'id'    => 'booking_tour_heading',
					'type'  => 'heading',
					'label' => __( 'Settings for Booking', 'bafg' ),
				),
				array(
					'id'        => 'disable_traveller_info',
					'type'      => 'switch',
					'label'     => __( 'Enable Traveler Info', 'bafg' ),
					'subtitle'  => __( 'Enable this option, if you want to add traveler info.', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'is_pro'    => true
				),
				array(
					'id'    => 'custom_fields_heading',
					'type'  => 'heading',
					'label' => __( 'Settings for Traveler Info Fields', 'bafg' ),
					'dependency' => array(
						array( 'disable_traveller_info', '==', 'true' ),
					),
				),
				array(
					'id'           => 'without-payment-field',
					'class'        => 'disable-sortable',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'Fields for Traveler Info', 'bafg' ),
					'subtitle'     => __( 'Custom fields allowed', 'bafg' ),
					'is_pro'       => true,
					'dependency' => array(
						array( 'disable_traveller_info', '==', 'true' ),
					),
					'fields'       => array(
						array(
							'id'    => 'reg-field-label',
							'type'  => 'text',
							'label' => __( 'Label', 'bafg' ),
						),
						array(
							'id'       => 'reg-field-name',
							'type'     => 'text',
							'label'    => __( 'Name', 'bafg' ),
							'subtitle' => __( 'Space Not allowed (Ex: tf_name)', 'bafg' ),
							'validate' => 'no_space_no_special',
						),
						array(
							'id'      => 'reg-fields-type',
							'type'    => 'select',
							'label'   => __( 'Field Type', 'bafg' ),
							'options' => array(
								'text'     => __( 'Text', 'bafg' ),
								'email'    => __( 'Email', 'bafg' ),
								'date'     => __( 'Date', 'bafg' ),
								'radio'    => __( 'Radio', 'bafg' ),
								'checkbox' => __( 'Checkbox', 'bafg' ),
								'select'   => __( 'Select', 'bafg' ),
							),
						),
						array(
							'id'           => 'reg-options',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Option Label', 'bafg' ),
							'dependency'   => array(
								array( 'reg-fields-type', '==', 'radio' ),
							),
							'fields'       => array(
								array(
									'label' => __( 'Field Label', 'bafg' ),
									'id'    => 'option-label',
									'type'  => 'text',
								),
								array(
									'label' => __( 'Field Value', 'bafg' ),
									'id'    => 'option-value',
									'type'  => 'text',
								),
							),
						),
						array(
							'id'           => 'reg-options',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Option Label', 'bafg' ),
							'dependency'   => array(
								array( 'reg-fields-type', '==', 'select' ),
							),
							'fields'       => array(
								array(
									'label' => __( 'Field Label', 'bafg' ),
									'id'    => 'option-label',
									'type'  => 'text',
								),
								array(
									'label' => __( 'Field Value', 'bafg' ),
									'id'    => 'option-value',
									'type'  => 'text',
								),
							),
						),
						array(
							'id'           => 'reg-options',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Option Label', 'bafg' ),
							'dependency'   => array(
								array( 'reg-fields-type', '==', 'checkbox' ),
							),
							'fields'       => array(
								array(
									'label' => __( 'Field Label', 'bafg' ),
									'id'    => 'option-label',
									'type'  => 'text',
								),
								array(
									'label' => __( 'Field Value', 'bafg' ),
									'id'    => 'option-value',
									'type'  => 'text',
								),
							),
						),
						array(
							'id'    => 'reg-field-required',
							'type'  => 'switch',
							'label' => __( 'Required Field ?', 'bafg' ),
						),

					),
					'default'      => array(
						array(
							'reg-field-label'    => __( 'Full Name', 'bafg' ),
							'reg-field-name'     => __( 'tf_full_name', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'Date of birth', 'bafg' ),
							'reg-field-name'     => __( 'tf_dob', 'bafg' ),
							'reg-fields-type'    => 'date',
							'reg-field-required' => true,
						),
						array(
							'reg-field-label'    => __( 'NID', 'bafg' ),
							'reg-field-name'     => __( 'tf_nid', 'bafg' ),
							'reg-fields-type'    => 'text',
							'reg-field-required' => true,
						)
					),
				),
				array(
					'id'          => 'tour_popup_extras_text',
					'type'        => 'text',
					'label'       => __( 'Enter Tour Extra', 'bafg' ),
					'subtitle'    => __( 'Tours Extras Description Text', 'bafg' ),
					'default' 	  => "Here we include our tour extra services. If you want take any of the service. Start and end in Edinburgh! With the In-depth Cultural",
					'placeholder' => "Here we include our tour extra services. If you want take any of the service. Start and end in Edinburgh! With the In-depth Cultural",
					'is_pro'      => true
				),
				array(
					'id'          => 'tour_traveler_details_text',
					'type'        => 'text',
					'label'       => __( 'Enter Traveler Details Text', 'bafg' ),
					'subtitle'    => __( 'Enter traveler details text filed text', 'bafg' ),
					'default' 	  => "All of your information will be confidential and the reason of this is for your privacy purpose",
					'placeholder' => "All of your information will be confidential and the reason of this is for your privacy purpose",
					'is_pro'    => true
				),
			),
		),
		//Frontend Dashboard
		'frontend_dashboard'    => array(
			'title'  => __( 'Frontend Dashboard', 'bafg' ),
			'icon'   => 'fa-solid fa-gauge-high',
			'fields' => array(
				//logo
				array(
					'id'           => '',
					'type'         => 'image',
					'label'        => __( 'Logo', 'bafg' ),
					'library'      => 'image',
					'placeholder'  => 'http://',
					'button_title' => __( 'Add Image', 'bafg' ),
					'remove_title' => __( 'Remove Image', 'bafg' ),
					'is_pro'       => true,
				),
				//minified logo
				array(
					'id'           => '',
					'type'         => 'image',
					'label'        => __( 'Minified Logo', 'bafg' ),
					'library'      => 'image',
					'placeholder'  => 'http://',
					'button_title' => __( 'Add Image', 'bafg' ),
					'remove_title' => __( 'Remove Image', 'bafg' ),
					'is_pro'       => true,
				),
				//mobile logo
				array(
					'id'           => '',
					'type'         => 'image',
					'label'        => __( 'Mobile Logo', 'bafg' ),
					'library'      => 'image',
					'placeholder'  => 'http://',
					'button_title' => __( 'Add Image', 'bafg' ),
					'remove_title' => __( 'Remove Image', 'bafg' ),
					'is_pro'       => true,
				),
			),
		),
		//user options
		'user_options'          => array(
			'title'  => __( 'User Options', 'bafg' ),
			'icon'   => 'fas fa-user',
			'fields' => array(
				array(
					'id'   => 'tf_user_permission',
					'type' => 'tab',
					'tabs' => array(
						array(
							'id'     => 'vendor_permission',
							'title'  => 'Vendor Settings',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => '',
									'type'     => 'checkbox',
									'label'    => __( 'Vendor Can Add Post', 'bafg' ),
									'subtitle' => __( 'Select the post type that you want to allow vendor to add.', 'bafg' ),
									'is_pro'   => true,
									'options'  => array(
										'hotel'     => __( 'Hotel', 'bafg' ),
										'tour'      => __( 'Tour', 'bafg' ),
										'apartment' => __( 'Apartment', 'bafg' ),
									),
								),
								array(
									'id'       => '',
									'type'     => 'checkbox',
									'label'    => __( 'Vendor Can Add Taxonomy', 'bafg' ),
									'subtitle' => __( 'Select the taxonomy that you want to allow vendor to add.', 'bafg' ),
									'is_pro'   => true,
									'options'  => array(
										'hotel_location'     => __( 'Hotel Location', 'bafg' ),
										'hotel_feature'      => __( 'Hotel Feature', 'bafg' ),
										'hotel_type'         => __( 'Hotel Type', 'bafg' ),
										'tour_destination'   => __( 'Tour Destination', 'bafg' ),
										'tour_attraction'    => __( 'Tour Attraction', 'bafg' ),
										'tour_activities'    => __( 'Tour Activities', 'bafg' ),
										'tour_features'      => __( 'Tour Features', 'bafg' ),
										'tour_type'          => __( 'Tour Types', 'bafg' ),
										'apartment_location' => __( 'Apartment Location', 'bafg' ),
										'apartment_feature'  => __( 'Apartment Feature', 'bafg' ),
										'apartment_type'     => __( 'Apartment Types', 'bafg' ),
									),
								),
								array(
									'id'       => '',
									'type'     => 'checkbox',
									'label'    => __( 'Vendor Can Manage Options', 'bafg' ),
									'subtitle' => __( 'Select the options that you want to allow vendor to manage.', 'bafg' ),
									'is_pro'   => true,
									'options'  => array(
										'view_hotel_enquiry'     => __( 'View Hotel Enquiry', 'bafg' ),
										'view_hotel_booking'     => __( 'View Hotel Booking', 'bafg' ),
										'view_tour_enquiry'      => __( 'View Tour Enquiry', 'bafg' ),
										'view_tour_booking'      => __( 'View Tour Booking', 'bafg' ),
										'view_apartment_enquiry' => __( 'View Apartment Enquiry', 'bafg' ),
										'view_apartment_booking' => __( 'View Apartment Booking', 'bafg' ),
										'view_commission'        => __( 'View Commission', 'bafg' ),
										'view_payout'            => __( 'View Payout', 'bafg' ),
									),
								),
							)
						),
						array(
							'id'     => 'manager_permission',
							'title'  => 'Manager Settings',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => '',
									'type'     => 'checkbox',
									'label'    => __( 'Manager Can Add Post', 'bafg' ),
									'subtitle' => __( 'Select the post type that you want to allow manager to manage.', 'bafg' ),
									'is_pro'   => true,
									'options'  => array(
										'hotel'     => __( 'Hotel', 'bafg' ),
										'tour'      => __( 'Tour', 'bafg' ),
										'apartment' => __( 'Apartment', 'bafg' ),
									),
								),
								array(
									'id'       => '',
									'type'     => 'checkbox',
									'label'    => __( 'Manager Can Add Taxonomy', 'bafg' ),
									'subtitle' => __( 'Select the taxonomy that you want to allow manager to manage.', 'bafg' ),
									'is_pro'   => true,
									'options'  => array(
										'hotel_location'     => __( 'Hotel Location', 'bafg' ),
										'hotel_feature'      => __( 'Hotel Feature', 'bafg' ),
										'hotel_type'         => __( 'Hotel Type', 'bafg' ),
										'tour_destination'   => __( 'Tour Destination', 'bafg' ),
										'tour_attraction'    => __( 'Tour Attraction', 'bafg' ),
										'tour_activities'    => __( 'Tour Activities', 'bafg' ),
										'tour_features'      => __( 'Tour Features', 'bafg' ),
										'tour_type'          => __( 'Tour Types', 'bafg' ),
										'apartment_location' => __( 'Apartment Location', 'bafg' ),
										'apartment_feature'  => __( 'Apartment Feature', 'bafg' ),
										'apartment_type'     => __( 'Apartment Types', 'bafg' ),
									),
								),
								array(
									'id'       => '',
									'type'     => 'checkbox',
									'label'    => __( 'Manager Can Manage Options', 'bafg' ),
									'subtitle' => __( 'Select the options that you want to allow manager to manage.', 'bafg' ),
									'is_pro'   => true,
									'options'  => array(
										'approve_hotel'          => __( 'Approve Hotel', 'bafg' ),
										'add_hotel'              => __( 'Add Hotel', 'bafg' ),
										'edit_hotel'             => __( 'Edit Hotel', 'bafg' ),
										'delete_hotel'           => __( 'Delete Hotel', 'bafg' ),
										'approve_tour'           => __( 'Approve Tour', 'bafg' ),
										'add_tour'               => __( 'Add Tour', 'bafg' ),
										'edit_tour'              => __( 'Edit Tour', 'bafg' ),
										'delete_tour'            => __( 'Delete Tour', 'bafg' ),
										'approve_apartment'      => __( 'Approve Apartment', 'bafg' ),
										'add_apartment'          => __( 'Add Apartment', 'bafg' ),
										'edit_apartment'         => __( 'Edit Apartment', 'bafg' ),
										'delete_apartment'       => __( 'Delete Apartment', 'bafg' ),
										'approve_vendor'         => __( 'Approve Vendor', 'bafg' ),
										'add_vendor'             => __( 'Add Vendor', 'bafg' ),
										'edit_vendor'            => __( 'Edit Vendor', 'bafg' ),
										'delete_vendor'          => __( 'Delete Vendor', 'bafg' ),
										'approve_payout'         => __( 'Approve Payout', 'bafg' ),
										'add_payout'             => __( 'Add Payout', 'bafg' ),
										'edit_payout'            => __( 'Edit Payout', 'bafg' ),
										'view_hotel_enquiry'     => __( 'View Hotel Enquiry', 'bafg' ),
										'view_hotel_booking'     => __( 'View Hotel Booking', 'bafg' ),
										'view_tour_enquiry'      => __( 'View Tour Enquiry', 'bafg' ),
										'view_tour_booking'      => __( 'View Tour Booking', 'bafg' ),
										'view_apartment_enquiry' => __( 'View Apartment Enquiry', 'bafg' ),
										'view_apartment_booking' => __( 'View Apartment Booking', 'bafg' ),
										'view_commission'        => __( 'View Commission', 'bafg' ),
										'view_payout'            => __( 'View Payout', 'bafg' ),
									),
								),
							)
						),
					)
				),
			)
		),
		// Multi Vendor
		'vendor'                => array(
			'title'  => __( 'Multi Vendor', 'bafg' ),
			'icon'   => 'fa fa-handshake',
			'fields' => array(
				array(
					'id'   => 'multi-vendor-setings',
					'type' => 'tab',
					'tabs' => array(
						array(
							'id'     => 'general-setting',
							'title'  => 'General Options',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => 'vendor-reg',
									'type'     => 'switch',
									'label'    => __( 'Enable Vendor Registration', 'bafg' ),
									'subtitle' => __( 'Visitor can register as vendor using the registration form', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'user_approval',
									'type'     => 'switch',
									'label'    => __( 'Automatic Approval', 'bafg' ),
									'subtitle' => __( 'Partner be automatic approval (register account).', 'bafg' ),
									'is_pro'   => true,
								),
								/*array(
									'id'        => 'reg-pop',
									'type'      => 'switch',
									'label'     => __( 'Registration Form Popup', 'bafg' ),
									'subtitle'  => __( 'Add class <code>tf-reg-popup</code> to trigger the popup', 'bafg' ),
									'is_pro'   => true,
								),*/

								array(
									'id'      => 'notice',
									'type'    => 'notice',
									'content' => __( 'Use shortcode <code>[tf_registration_form]</code> to show registration form in post/page/widget.', 'bafg' ),
								),
								array(
									'id'       => 'email-verify',
									'type'     => 'switch',
									'label'    => __( 'Email Verification', 'bafg' ),
									'subtitle' => __( 'ON: Vendor must verify by email', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'partner_post',
									'type'     => 'switch',
									'label'    => __( "Partner's Post Must be Approved by Admin", 'bafg' ),
									'subtitle' => __( 'ON: When partner posts a service, it needs to be approved by administrator ', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'      => 'notice_shortcode',
									'type'    => 'notice',
									'content' => __( 'Use shortcode <code>[tf_login_form]</code> to show login form in post/page/widget.', 'bafg' ),
								),
								array(
									'id'         => 'partner_commission',
									'type'       => 'number',
									'label'      => __( 'Commission(%)', 'bafg' ),
									'subtitle'   => __( 'Enter commission of partner for admin after each item is booked ', 'bafg' ),
									'attributes' => array(
										'min' => '0',
									),
									'is_pro'     => true,
								),
								array(
									'id'      => 'pabbly-title',
									'type'    => 'heading',
									'content' => __( 'Pabbly', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'vendor-integrate-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for New Vendor Registration?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Pabbly with New Vendor Registration.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'vendor-integrate-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Vendor Registration Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Vendor Registration Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'vendor-integrate-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'      => 'zapier-title',
									'type'    => 'heading',
									'content' => __( 'Zapier', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'vendor-integrate-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for New Vendor Registration?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Zapier with New Vendor Registration.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'vendor-integrate-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Vendor Registration Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Vendor Registration Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'vendor-integrate-zapier', '==', 'true' ),
									),
								),
							),
						),
						array(
							'id'     => 'layout-setting',
							'title'  => 'Vendor Dashboard',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => 'vendor-config',
									'type'     => 'switch',
									'label'    => __( 'Configuration Partner Profile info', 'bafg' ),
									'subtitle' => __( 'Show/hide sections for partner dashboard', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'vendor-earning',
									'type'     => 'switch',
									'label'    => __( 'Show total Earning', 'bafg' ),
									'subtitle' => __( 'ON: Display earnings information in accordance with time periods', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'vendor-each-earning',
									'type'     => 'switch',
									'label'    => __( 'Show each service Earning', 'bafg' ),
									'subtitle' => __( 'ON: Display earnings according to each service', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'vendor-earning-chart',
									'type'     => 'switch',
									'label'    => __( 'Show Chart info', 'bafg' ),
									'subtitle' => __( 'ON: Display visual graphs to follow your earnings through each time', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'vendor-booking-history',
									'type'     => 'switch',
									'label'    => __( 'Show Booking history', 'bafg' ),
									'subtitle' => __( 'ON: Show booking history of partner', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'       => 'vendor-enquiry-history',
									'type'     => 'switch',
									'label'    => __( 'Show Enquiry history', 'bafg' ),
									'subtitle' => __( 'ON: Show Enquiry history of partner', 'bafg' ),
									'is_pro'   => true,
								),
							),
						),
						array(
							'id'     => 'withdraw-setting',
							'title'  => 'Withdrawal Options',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => 'vendor-withdraw',
									'type'     => 'switch',
									'label'    => __( 'Allow Request Withdrawal', 'bafg' ),
									'subtitle' => __( 'ON: Partner is allowed to withdraw money', 'bafg' ),
									'is_pro'   => true,
								),
								array(
									'id'         => 'vendor_min_withdraw',
									'type'       => 'number',
									'label'      => __( 'Minimum value request when withdrawal', 'bafg' ),
									'subtitle'   => __( 'Enter minimum value when a withdrawal is conducted', 'bafg' ),
									'attributes' => array(
										'min' => '0',
									),
									'is_pro'     => true,
								),
								array(
									'id'         => 'vendor_withdraw_date',
									'type'       => 'number',
									'label'      => __( 'Date of sucessful payment in current month', 'bafg' ),
									'subtitle'   => __( 'Enter the date monthly payment. Ex: 25', 'bafg' ),
									'attributes' => array(
										'min' => '1',
										'max' => '28',
									),
									'is_pro'     => true,
								),
							),
						),
					),
				),
			),
		),
		// Search Options
		'search'                => array(
			'title'  => __( 'Search', 'bafg' ),
			'icon'   => 'fas fa-search',
			'fields' => array(
				// Registration
				array(
					'id'          => 'search-result-page',
					'type'        => 'select2',
					'placeholder' => __( 'Select a page', 'bafg' ),
					'label'       => __( 'Select Search Result Page', 'bafg' ),
					'description' => __( 'This page will be used to show the Search form Results. Please make sure Page template: <code>Tourfic - Search Result</code> is selected while creating this page.', 'bafg' ),
					'options'     => 'posts',
					'query_args'  => array(
						'post_type'      => 'page',
						'posts_per_page' => - 1,
					)
				),

				array(
					'id'       => 'posts_per_page',
					'type'     => 'number',
					'label'    => __( 'Search Items to show per page', 'bafg' ),
					'subtitle' => __( 'Add the total number of hotels/tours you want to show per page on the Search result.', 'bafg' ),
				),

				array(
					'id'        => 'date_hotel_search',
					'type'      => 'switch',
					'label'     => __( 'Date Required in Hotel Search', 'bafg' ),
					'subtitle'  => __( 'Enable this option if you want the user to select their Checkin/Checkout date to search', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false,
				),

				array(
					'id'        => 'date_tour_search',
					'type'      => 'switch',
					'label'     => __( 'Date Required in Tour Search', 'bafg' ),
					'subtitle'  => __( 'Enable this option if you want the user to select their Tour date to search', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'        => 'date_apartment_search',
					'type'      => 'switch',
					'label'     => __( 'Date Required in Apartment Search', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'        => 'disable_child_search',
					'type'      => 'switch',
					'label'     => __( 'Disabled Child in Tour Search', 'bafg' ),
					'subtitle'  => __( 'If you enable this option, then the child is not showing on the Search form.', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'        => 'disable_infant_search',
					'type'      => 'switch',
					'label'     => __( 'Disabled Infant in Tour Search', 'bafg' ),
					'subtitle'  => __( 'If you enable this option, then the Infant is not showing on the Search form.', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				)
			),
		),
		// Design Options
		'design-panel'          => array(
			'title'  => __( 'Design Panel', 'bafg' ),
			'icon'   => 'fas fa-palette',
			'fields' => array(),
		),
		'global_design'         => array(
			'title'  => __( 'Global', 'bafg' ),
			'parent' => 'design-panel',
			'icon'   => 'fas fa-cogs',
			'fields' => array(
				array(
					'id'      => 'global_design_notice',
					'type'    => 'notice',
					'style'   => 'info',
					'content' => __( "To ensure maximum compatiblity with your theme, all Heading (h1-h6), Paragraph & Link's Color-Font Styles are not controlled by Tourfic. Those need to be edited using your Theme's option Panel.", "bafg" ),
				),
				array(
					'id'      => 'colorGlobal',
					'type'    => 'heading',
					'content' => __( 'Global Option', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'       => 'bafg-design1-global-color',
					'type'     => 'color',
					'label'    => __( 'Global Color', 'bafg' ),
					'subtitle' => __( 'Global Colors of Design 2 related to Tourfic', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'default'  => array(
						'gcolor' => '#0e3dd8'
					),
					'colors'   => array(
						'gcolor' => __( 'Primary Color', 'bafg' ),
					),
				),
				array(
					'id'       => 'bafg-design1-p-global-color',
					'type'     => 'color',
					'label'    => __( 'Global Color of P', 'bafg' ),
					'subtitle' => __( 'Global Colors of P, Design 2 related to Tourfic', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'default'  => array(
						'pgcolor' => '#36383C'
					),
					'colors'   => array(
						'pgcolor' => __( 'P Primary Color', 'bafg' ),
					),
				),
				array(
					'id'      => 'typography',
					'type'    => 'heading',
					'content' => __( 'Typography', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-body-fonts-family',
					'type'        => 'select',
					'label'       => __( 'Global Body Fonts Family', 'bafg' ),
					'subtitle'    => __( 'Global Body Fonts Family of Tourfic', 'bafg' ),
					'options'     => function_exists( 'bafg_google_fonts_list' ) ? bafg_google_fonts_list() : '',
					'default'     => 'Default',
					'field_width' => 45,
				),
				array(
					'id'          => 'global-heading-fonts-family',
					'type'        => 'select',
					'label'       => __( 'Global Heading Fonts Family', 'bafg' ),
					'subtitle'    => __( 'Global Heading Fonts Family of Tourfic', 'bafg' ),
					'options'     => function_exists( 'bafg_google_fonts_list' ) ? bafg_google_fonts_list() : '',
					'default'     => 'Default',
					'field_width' => 45,
				),
				array(
					'id'      => 'h1-heading',
					'type'    => 'heading',
					'content' => __( 'H1 Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-h1',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 38
				),
				array(
					'id'          => 'global-h1-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.2
				),
				array(
					'id'          => 'global-h1-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '500',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-h1-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'      => 'h2-heading',
					'type'    => 'heading',
					'content' => __( 'H2 Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-h2',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 30
				),
				array(
					'id'          => 'global-h2-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.2
				),
				array(
					'id'          => 'global-h2-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '500',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-h2-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'      => 'h3-heading',
					'type'    => 'heading',
					'content' => __( 'H3 Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-h3',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 24
				),
				array(
					'id'          => 'global-h3-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.2
				),
				array(
					'id'          => 'global-h3-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '500',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-h3-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'      => 'h4-heading',
					'type'    => 'heading',
					'content' => __( 'H4 Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-h4',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 20
				),
				array(
					'id'          => 'global-h4-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.2
				),
				array(
					'id'          => 'global-h4-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '500',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-h4-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'      => 'h5-heading',
					'type'    => 'heading',
					'content' => __( 'H5 Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-h5',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 18
				),
				array(
					'id'          => 'global-h5-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.2
				),
				array(
					'id'          => 'global-h5-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '500',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-h5-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'      => 'h6-heading',
					'type'    => 'heading',
					'content' => __( 'H6 Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-h6',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 14
				),
				array(
					'id'          => 'global-h6-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.2
				),
				array(
					'id'          => 'global-h6-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '500',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-h6-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'      => 'p-heading',
					'type'    => 'heading',
					'content' => __( 'P Font Settings', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'          => 'global-p',
					'type'        => 'number',
					'label'       => __( 'Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 16
				),
				array(
					'id'          => 'global-p-line-height',
					'type'        => 'text',
					'label'       => __( 'Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 20,
					'default'     => 1.5
				),
				array(
					'id'          => 'global-p-weight',
					'type'        => 'select',
					'label'       => __( 'Font Weight', 'bafg' ),
					'subtitle'    => __( 'Font Weight of Tourfic', 'bafg' ),
					'options'     => array(
						'100' => __( '100(Thin)', 'bafg' ),
						'200' => __( '100(Extra Light)', 'bafg' ),
						'300' => __( '300(Light)', 'bafg' ),
						'400' => __( '400(Normal)', 'bafg' ),
						'500' => __( '500(Medium)', 'bafg' ),
						'600' => __( '600(Semi Bold)', 'bafg' ),
						'700' => __( '700(Bold)', 'bafg' ),
						'800' => __( '800(Extra Bold)', 'bafg' ),
						'900' => __( '900(Black)', 'bafg' ),
					),
					'default'     => '400',
					'field_width' => 20,
				),
				array(
					'id'          => 'global-p-style',
					'type'        => 'select',
					'label'       => __( 'Font Style', 'bafg' ),
					'subtitle'    => __( 'Font Style of Tourfic', 'bafg' ),
					'options'     => array(
						'normal' => __( 'Normal', 'bafg' ),
						'italic' => __( 'Italic', 'bafg' ),
					),
					'default'     => 'normal',
					'field_width' => 20,
				),
				array(
					'id'       => 'bafg-button-color',
					'type'     => 'color',
					'label'    => __( 'Button Color', 'bafg' ),
					'subtitle' => __( 'Colors of all buttons related to Tourfic', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'regular' => __( 'Normal', 'bafg' ),
						'hover'   => __( 'Hover', 'bafg' ),
					),
				),
				array(
					'id'       => 'bafg-button-bg-color',
					'type'     => 'color',
					'label'    => __( 'Button Background Color', 'bafg' ),
					'subtitle' => __( 'Background Colors of all buttons related to Tourfic ', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'regular' => __( 'Normal', 'bafg' ),
						'hover'   => __( 'Hover', 'bafg' ),
					),
				),
				array(
					'id'          => 'button-font-size',
					'type'        => 'number',
					'label'       => __( 'Button Font Size (PX)', 'bafg' ),
					'subtitle'    => __( 'Button Font Size of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 45,
					'default'     => 14
				),
				array(
					'id'          => 'button-line-height',
					'type'        => 'text',
					'label'       => __( 'Button Line Height (REM)', 'bafg' ),
					'subtitle'    => __( 'Button Line Height of Tourfic', 'bafg' ),
					'attributes'  => array(
						'min' => '1',
					),
					'field_width' => 45,
					'default'     => 1.2
				),
				array(
					'id'       => 'bafg-sidebar-booking',
					'type'     => 'color',
					'label'    => __( 'Sidebar Booking Form', 'bafg' ),
					'subtitle' => __( 'The Gradient color of Sidebar Booking (Available on Search Result and Single Hotel Page)', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'gradient_one_reg' => __( 'Gradient One Color', 'bafg' ),
						'gradient_two_reg' => __( 'Gradient Two Color', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-faq-style',
					'type'     => 'color',
					'label'    => __( 'FAQ Styles', 'bafg' ),
					'subtitle' => __( 'Style of FAQ Section for both Hotels and Tours', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'faq_color'        => __( 'Heading Color', 'bafg' ),
						'faq_icon_color'   => __( 'Icon Color', 'bafg' ),
						'faq_border_color' => __( 'Border Color', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-review-style',
					'type'     => 'color',
					'label'    => __( 'Review Styles', 'bafg' ),
					'subtitle' => __( 'Style of Review Section both Hotels and Tours', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'rating_color'          => __( 'Rating Color', 'bafg' ),
						'rating_bg_color'       => __( 'Rating Background', 'bafg' ),
						'param_bg_color'        => __( 'Parameter Background', 'bafg' ),
						'param_single_bg_color' => __( 'Single Parameter', 'bafg' ),
						'param_txt_color'       => __( 'Single Parameter Text', 'bafg' ),
						'review_color'          => __( 'Review Color', 'bafg' ),
						'review_bg_color'       => __( 'Review Background', 'bafg' ),
					)
				),

			),
		),
		'hotel_design'          => array(
			'title'  => __( 'Hotel', 'bafg' ),
			'parent' => 'design-panel',
			'icon'   => 'fas fa-hotel',
			'fields' => array(
				array(
					'id'      => 'hotel_design_heading',
					'type'    => 'heading',
					'content' => __( 'Hotel Settings', 'bafg' ),
				),
				array(
					'id'       => 'bafg-hotel-type-bg-color',
					'type'     => 'color',
					'label'    => __( 'Hotel Type Color', 'bafg' ),
					'subtitle' => __( 'The "Hotel" text above main heading of single hotel ', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'regular' => __( 'Color', 'bafg' ),
						'hover'   => __( 'Background Color', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-hotel-share-icon',
					'type'     => 'color',
					'label'    => __( 'Share Icon Color', 'bafg' ),
					'subtitle' => __( 'The color of the Share Icons', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'regular' => __( 'Normal', 'bafg' ),
						'hover'   => __( 'Hover', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-hotel-map-button',
					'type'     => 'color',
					'label'    => __( 'Map Button Background', 'bafg' ),
					'subtitle' => __( 'Map Button Background Color (Gradient)', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'gradient_one_reg' => __( 'Gradient One Color', 'bafg' ),
						'gradient_two_reg' => __( 'Gradient Two Color', 'bafg' ),
						'gradient_one_hov' => __( 'Gradient One Hover', 'bafg' ),
						'gradient_two_hov' => __( 'Gradient Two Hover', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-hotel-map-button-text',
					'type'     => 'color',
					'label'    => __( 'Map Button Text Color', 'bafg' ),
					'subtitle' => __( 'The text color of Map Button', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'regular' => __( 'Text Color', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-hotel-features-color',
					'type'     => 'color',
					'label'    => __( 'Hotel Features Color', 'bafg' ),
					'subtitle' => __( 'Features section icon color', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'regular' => __( 'Color', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-hotel-table-style',
					'type'     => 'color',
					'label'    => __( 'Room Table Styles', 'bafg' ),
					'subtitle' => __( 'Hotel Room Table styling options', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'table_color'        => __( 'Heading Color', 'bafg' ),
						'table_bg_color'     => __( 'Heading Background Color', 'bafg' ),
						'table_border_color' => __( 'Border Color', 'bafg' ),
					)
				),
			),
		),
		'tour_design'           => array(
			'title'  => __( 'Tour', 'bafg' ),
			'parent' => 'design-panel',
			'icon'   => 'fas fa-umbrella-beach',
			'fields' => array(
				array(
					'id'      => 'tour_design_heading',
					'type'    => 'heading',
					'content' => __( 'Tour Settings', 'bafg' )
				),
				array(
					'id'       => 'bafg-tour-pricing-color',
					'type'     => 'color',
					'label'    => __( 'Price Section', 'bafg' ),
					'subtitle' => __( 'Styling of the Pricing Section', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'sale_price'      => __( 'Sale Price', 'bafg' ),
						'org_price'       => __( 'Original Price', 'bafg' ),
						'tab_text'        => __( 'Tab Text', 'bafg' ),
						'tab_bg'          => __( 'Tab Background', 'bafg' ),
						'active_tab_text' => __( 'Active Tab Text', 'bafg' ),
						'active_tab_bg'   => __( 'Active Tab Background', 'bafg' ),
						'tab_border'      => __( 'Tab Border', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-tour-info-color',
					'type'     => 'color',
					'label'    => __( 'Information / Summary Section', 'bafg' ),
					'subtitle' => __( 'Styling of the Info  / Summary', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'icon_color'    => __( 'Icon Color', 'bafg' ),
						'heading_color' => __( 'Heading Color', 'bafg' ),
						'text_color'    => __( 'Text Color', 'bafg' ),
						'bg_one'        => __( 'Background One', 'bafg' ),
						'bg_two'        => __( 'Background Two', 'bafg' ),
						'bg_three'      => __( 'Background Three', 'bafg' ),
						'bg_four'       => __( 'Background Four', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-tour-sticky-booking',
					'type'     => 'color',
					'label'    => __( 'Sticky Booking', 'bafg' ),
					'subtitle' => __( 'Styling of Sticky Booking Form', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'btn_col'         => __( 'Button Color', 'bafg' ),
						'btn_bg'          => __( 'Button Background', 'bafg' ),
						'btn_hov_col'     => __( 'Button Hover Color', 'bafg' ),
						'btn_hov_bg'      => __( 'Button Hover Background', 'bafg' ),
						'form_background' => __( 'Form Background', 'bafg' ),
						'form_border'     => __( 'Form Border', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-include-exclude',
					'type'     => 'color',
					'label'    => __( 'Include - Exclude Section', 'bafg' ),
					'subtitle' => __( 'Styling of Include - Exclude Section', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'gradient_one_reg' => __( 'Gradient One Color', 'bafg' ),
						'gradient_two_reg' => __( 'Gradient Two Color', 'bafg' ),
						'heading_color'    => __( 'Heading Color', 'bafg' ),
						'text_color'       => __( 'Text Color', 'bafg' ),
					)
				),
				array(
					'id'       => 'bafg-tour-itinerary',
					'type'     => 'color',
					'label'    => __( 'Travel Itinerary', 'bafg' ),
					'subtitle' => __( 'Styling of Travel Itinerary', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'time_day_txt'  => __( 'Time or Day Text', 'bafg' ),
						'time_day_bg'   => __( 'Time or Day Background', 'bafg' ),
						'heading_color' => __( 'Heading Color', 'bafg' ),
						'text_color'    => __( 'Text Color', 'bafg' ),
						'bg_color'      => __( 'Background Color', 'bafg' ),
						'icon_color'    => __( 'Icon Color', 'bafg' ),
					)
				),
			),
		),
		'apartment_design'      => array(
			'title'  => __( 'Apartment', 'bafg' ),
			'parent' => 'design-panel',
			'icon'   => 'fa-solid fa-house-chimney',
			'fields' => array(
				array(
					'id'      => 'apartment_form_heading',
					'type'    => 'heading',
					'content' => __( 'Booking Form Design', 'bafg' )
				),
				array(
					'id'       => 'booking-form-design',
					'type'     => 'color',
					'label'    => __( 'Booking Form', 'bafg' ),
					'subtitle' => __( 'Styling of the Booking Form', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'form_heading_color' => __( 'Heading Color', 'bafg' ),
						'form_bg'            => __( 'Background', 'bafg' ),
						'form_border_color'  => __( 'Border Color', 'bafg' ),
						'form_text'          => __( 'Text Color', 'bafg' ),
						'form_fields_bg'     => __( 'Fields Background', 'bafg' ),
						'form_fields_border' => __( 'Fields Border', 'bafg' ),
						'form_fields_text'   => __( 'Fields Text Color', 'bafg' ),
					)
				),
				array(
					'id'      => 'apartment_host_heading',
					'type'    => 'heading',
					'content' => __( 'Apartment Host Design', 'bafg' )
				),
				array(
					'id'       => 'host-card-design',
					'type'     => 'color',
					'label'    => __( 'Apartment Host', 'bafg' ),
					'subtitle' => __( 'Styling of the Apartment Host', 'bafg' ),
					'multiple' => true,
					'inline'   => true,
					'colors'   => array(
						'host_heading_color' => __( 'Heading Color', 'bafg' ),
						'host_bg'            => __( 'Background', 'bafg' ),
						'host_border_color'  => __( 'Border Color', 'bafg' ),
						'host_text'          => __( 'Text Color', 'bafg' ),
					)
				),
			),
		),

		// Miscellaneous Options
		'miscellaneous'         => array(
			'title'  => __( 'Miscellaneous', 'bafg' ),
			'icon'   => 'fas fa-globe',
			'fields' => array(),
		),
		/**
		 * Login Register Settings
		 *
		 * Sub Menu
		 */
		'login_register'        => array(
			'title'  => __( 'Login & Register', 'bafg' ),
			'parent' => 'miscellaneous',
			'icon'   => 'fas fa-user',
			'fields' => array(
				array(
					'id'   => 'log_reg_settings',
					'type' => 'tab',
					'tabs' => array(
						array(
							'id'     => 'login-setting',
							'title'  => 'Login Settings',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'         => '',
									'type'       => 'select',
									'options'    => 'posts',
									'query_args' => array(
										'post_type'      => 'page',
										'posts_per_page' => - 1,
									),
									'label'      => __( 'Login Page', 'bafg' ),
									'subtitle'   => __( 'Select a page for login', 'bafg' ),
									'default'    => get_option( 'tf_login_page_id' ),
									'is_pro'     => true,
								),
								array(
									'id'          => '',
									'type'        => 'select',
									'label'       => __( 'Login Redirect', 'bafg' ),
									'subtitle'    => __( 'Select a type for login redirect', 'bafg' ),
									'options'     => array(
										'page' => __( 'Page', 'bafg' ),
										'url'  => __( 'Custom URL', 'bafg' ),
									),
									'field_width' => '50',
									'is_pro'      => true,
								),
								array(
									'id'          => '',
									'type'        => 'select',
									'options'     => 'posts',
									'query_args'  => array(
										'post_type'      => 'page',
										'posts_per_page' => - 1,
									),
									'label'       => __( 'Login Redirect Page', 'bafg' ),
									'subtitle'    => __( 'Select a page for login redirect', 'bafg' ),
									'default'     => get_option( 'tf_dashboard_page_id' ),
									'field_width' => '50',
									'dependency'  => array( 'login_redirect_type', '==', 'page' ),
									'is_pro'      => true,
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'label'       => __( 'Login Redirect Url', 'bafg' ),
									'subtitle'    => __( 'Enter a URL to redirect after login', 'bafg' ),
									'default'     => site_url() . '/tf-dashboard',
									'field_width' => '50',
									'dependency'  => array( 'login_redirect_type', '==', 'url' ),
									'is_pro'      => true,
								),
							),
						),
						array(
							'id'     => 'register-setting',
							'title'  => 'Register Settings',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'         => '',
									'type'       => 'select',
									'options'    => 'posts',
									'query_args' => array(
										'post_type'      => 'page',
										'posts_per_page' => - 1,
									),
									'label'      => __( 'Register Page', 'bafg' ),
									'subtitle'   => __( 'Select a page for register', 'bafg' ),
									'default'    => get_option( 'tf_register_page_id' ),
									'is_pro'     => true,
								),
								array(
									'id'          => '',
									'type'        => 'select',
									'label'       => __( 'Register Redirect', 'bafg' ),
									'subtitle'    => __( 'Select a type for register redirect', 'bafg' ),
									'options'     => array(
										'page' => __( 'Page', 'bafg' ),
										'url'  => __( 'Custom URL', 'bafg' ),
									),
									'field_width' => '50',
									'is_pro'      => true,
								),
								array(
									'id'          => '',
									'type'        => 'select',
									'options'     => 'posts',
									'query_args'  => array(
										'post_type'      => 'page',
										'posts_per_page' => - 1,
									),
									'label'       => __( 'Register Redirect Page', 'bafg' ),
									'subtitle'    => __( 'Select a page for register redirect', 'bafg' ),
									'default'     => get_option( 'tf_login_page_id' ),
									'field_width' => '50',
									'dependency'  => array( 'register_redirect_type', '==', 'page' ),
									'is_pro'      => true,
								),
								array(
									'id'          => '',
									'type'        => 'text',
									'label'       => __( 'Register Redirect Url', 'bafg' ),
									'subtitle'    => __( 'Enter a URL to redirect after register', 'bafg' ),
									'default'     => site_url() . '/tf-login',
									'field_width' => '50',
									'dependency'  => array( 'register_redirect_type', '==', 'url' ),
									'is_pro'      => true,
								),
							),
						),
						array(
							'id'     => 'social-login-setting',
							'title'  => 'Social Login Options',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'       => '',
									'type'     => 'switch',
									'label'    => __( 'Allow Google Login', 'bafg' ),
									'subtitle' => __( 'ON: Partner is allowed to Google Login', 'bafg' ),
									'badge_up' => true,
									'is_pro'   => true,
								),
								array(
									'id'         => '',
									'type'       => 'text',
									'label'      => __( 'Google App Client ID', 'bafg' ),
									'subtitle'   => __( 'Enter the App ID', 'bafg' ),
									'dependency' => array(
										array( 'vendor-google-login', '==', true ),
									),
									'badge_up'   => true,
									'is_pro'     => true,
								),
								array(
									'id'         => '',
									'type'       => 'text',
									'label'      => __( 'Google App Client Secret', 'bafg' ),
									'subtitle'   => __( 'Enter the App Secret', 'bafg' ),
									'dependency' => array(
										array( 'vendor-google-login', '==', true ),
									),
									'badge_up'   => true,
									'is_pro'     => true,
								),
								array(
									'id'         => '',
									'type'       => 'text',
									'label'      => __( 'Google Redirect URI', 'bafg' ),
									'subtitle'   => __( 'Enter the Redirect URI', 'bafg' ),
									'dependency' => array(
										array( 'vendor-google-login', '==', true ),
									),
									'badge_up'   => true,
									'is_pro'     => true,
								),
							),
						),
						array(
							'id'     => 'registration-fields',
							'title'  => 'Custom Registration Fields',
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'           => '',
									'class'        => 'disable-sortable',
									'type'         => 'repeater',
									'button_title' => __( 'Add New', 'bafg' ),
									'label'        => __( 'Registration Fields for Vendor', 'bafg' ),
									'subtitle'     => __( 'Custom fields allowed', 'bafg' ),
									'is_pro'       => true,
									'fields'       => array(
										array(
											'id'    => 'reg-field-label',
											'type'  => 'text',
											'label' => __( 'Label', 'bafg' ),
										),
										array(
											'id'       => 'reg-field-name',
											'type'     => 'text',
											'label'    => __( 'Name', 'bafg' ),
											'subtitle' => __( 'Space Not allowed (Ex: tf_name)', 'bafg' ),
											'validate' => 'no_space_no_special',
										),
										array(
											'id'      => 'reg-fields-type',
											'type'    => 'select',
											'label'   => __( 'Field Type', 'bafg' ),
											'options' => array(
												'text'     => __( 'Text', 'bafg' ),
												'email'    => __( 'Email', 'bafg' ),
												'password' => __( 'Password', 'bafg' ),
												'textarea' => __( 'Textarea', 'bafg' ),
												'radio'    => __( 'Radio', 'bafg' ),
												'checkbox' => __( 'Checkbox', 'bafg' ),
												'select'   => __( 'Select', 'bafg' ),
											),
										),
										array(
											'id'           => 'radio-reg-options',
											'type'         => 'repeater',
											'button_title' => __( 'Add New Option', 'bafg' ),
											'label'        => __( 'Option Label', 'bafg' ),
											'dependency'   => array(
												array( 'reg-fields-type', '==', 'radio' ),
											),
											'fields'       => array(
												array(
													'label' => __( 'Field Label', 'bafg' ),
													'id'    => 'option-label',
													'type'  => 'text',
												),
												array(
													'label' => __( 'Field Value', 'bafg' ),
													'id'    => 'option-value',
													'type'  => 'text',
												),
											),
										),
										array(
											'id'           => 'select-reg-options',
											'type'         => 'repeater',
											'button_title' => __( 'Add New Option', 'bafg' ),
											'label'        => __( 'Option Label', 'bafg' ),
											'dependency'   => array(
												array( 'reg-fields-type', '==', 'select' ),
											),
											'fields'       => array(
												array(
													'label' => __( 'Field Label', 'bafg' ),
													'id'    => 'option-label',
													'type'  => 'text',
												),
												array(
													'label' => __( 'Field Value', 'bafg' ),
													'id'    => 'option-value',
													'type'  => 'text',
												),
											),
										),
										array(
											'id'           => 'checkbox-reg-options',
											'type'         => 'repeater',
											'button_title' => __( 'Add New Option', 'bafg' ),
											'label'        => __( 'Option Label', 'bafg' ),
											'dependency'   => array(
												array( 'reg-fields-type', '==', 'checkbox' ),
											),
											'fields'       => array(
												array(
													'label' => __( 'Field Label', 'bafg' ),
													'id'    => 'option-label',
													'type'  => 'text',
												),
												array(
													'label' => __( 'Field Value', 'bafg' ),
													'id'    => 'option-value',
													'type'  => 'text',
												),
											),
										),
										array(
											'id'    => 'reg-field-placeholder',
											'type'  => 'text',
											'label' => __( 'Placeholder', 'bafg' ),
										),
										array(
											'id'    => 'reg-field-required',
											'type'  => 'switch',
											'label' => __( 'Required Field ?', 'bafg' ),
										),

									),
								),
							),
						),
					),
				),
			)
		),
		/**
		 * Google Map
		 *
		 * Sub Menu
		 */
		'map_settings'          => array(
			'title'  => __( 'Map Settings', 'bafg' ),
			'parent' => 'miscellaneous',
			'icon'   => 'fas fa-umbrella-beach',
			'fields' => array(
				array(
					'id'      => 'map_settings_heading',
					'type'    => 'heading',
					'content' => __( 'Map Settings', 'bafg' )
				),
				array(
					'id'       => 'google-page-option',
					'type'     => 'select',
					'label'    => __( 'Select Map', 'bafg' ),
					'subtitle' => __( 'This map is used to dynamically search your hotel/tour location on the option panel. The frontend map information is based on this data. We use "OpenStreetMap” by default. You can also use Google Map. To use Google map, you need to insert your Google Map API Key.', 'bafg' ),
					'options'  => array(
						'default' => __( 'Default Map', 'bafg' ),
						''        => __( 'Google Map (Pro)', 'bafg' ),
					),
					'default'  => 'default'
				),
				array(
					'id'         => '',
					'type'       => 'text',
					'label'      => __( 'Google Map API Key', 'bafg' ),
					'dependency' => array(
						array( 'google-page-option', '==', 'googlemap' ),
					),
					'is_pro'     => true,
				)
			),
		),
		/**
		 * Wishlist
		 *
		 * Sub Menu
		 */
		'wishlist'              => array(
			'title'  => __( 'Wishlist', 'bafg' ),
			'parent' => 'miscellaneous',
			'icon'   => 'fas fa-heart',
			'fields' => array(
				array(
					'id'      => 'wishlist_heading',
					'type'    => 'heading',
					'content' => __( 'Wishlist Settings', 'bafg' )
				),

				array(
					'id'      => 'wl-for',
					'type'    => 'checkbox',
					'label'   => __( 'Enable Wishlist for', 'bafg' ),
					'options' => array(
						'li' => __( 'Logged in User', 'bafg' ),
						'lo' => __( 'Logged out User', 'bafg' ),
					),
					'default' => array( 'li', 'lo' )
				),

				array(
					'id'      => 'wl-bt-for',
					'type'    => 'checkbox',
					'label'   => __( 'Show Wishlist Button on', 'bafg' ),
					'options' => array(
						'1' => __( 'Single Hotel Page', 'bafg' ),
						'2' => __( 'Single Tour Page', 'bafg' ),
						'3' => __( 'Single Apartment Page', 'bafg' ),
					),
					'default' => array( '1', '2', '3' ),
				),

				array(
					'id'          => 'wl-page',
					'type'        => 'select2',
					'label'       => __( 'Select Wishlist Page', 'bafg' ),
					'placeholder' => __( 'Select Wishlist Page', 'bafg' ),
					'options'     => 'posts',
					'query_args'  => array(
						'post_type'      => 'page',
						'posts_per_page' => - 1,
						'orderby'        => 'post_title',
						'order'          => 'ASC'
					)
				),

			),
		),

		/**
		 * Permalink Settings
		 *
		 * Sub Menu
		 */

		'permalink' => array(
			'title'  => __( 'Permalink Settings', 'bafg' ),
			'parent' => 'miscellaneous',
			'icon'   => 'fas fa-link',
			'fields' => array(
				array(
					'id'      => 'permalink_heading',
					'type'    => 'heading',
					'content' => __( 'Permalink Settings', 'bafg' )
				),
				array(
					'id'      => 'permalink_notice',
					'type'    => 'notice',
					'content' => __( 'For permalink settings go to default <a href="' . get_admin_url() . 'options-permalink.php">permalink settings page</a>.', 'bafg' ),
				),

			),
		),
		/**
		 * Review
		 *
		 * Sub Menu
		 */

		'review'       => array(
			'title'  => __( 'Review', 'bafg' ),
			'parent' => 'miscellaneous',
			'icon'   => 'fas fa-star',
			'fields' => array(
				array(
					'id'      => 'review_heading',
					'type'    => 'heading',
					'content' => __( 'Review Settings', 'bafg' ),
				),
				array(
					'id'      => 'r-for',
					'type'    => 'checkbox',
					'label'   => __( 'Enable Review for', 'bafg' ),
					'options' => array(
						'li' => __( 'Logged in User', 'bafg' ),
						''   => __( 'Log out User (Pro)', 'bafg' ),
					),
					'default' => array( 'li' ),
				),

				array(
					'id'        => 'r-auto-publish',
					'type'      => 'switch',
					'label'     => __( 'Auto Publish Review', 'bafg' ),
					'subtitle'  => __( 'By default review will be pending and waiting for admin approval', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),

				array(
					'id'      => 'r-base',
					'type'    => 'radio',
					'label'   => __( 'Calculate Review Based on', 'bafg' ),
					'inlines' => true,
					'options' => array(
						'5'  => __( '5', 'bafg' ),
						'10' => __( '10', 'bafg' ),
					),
					'default' => '5',
				),

				array(
					'id'       => 'r-hotel',
					'class'    => 'disable-sortable',
					'type'     => 'repeater',
					'label'    => __( 'Review Fields for Hotels', 'bafg' ),
					'subtitle' => __( 'Add Custom Review Fields', 'bafg' ),
					'is_pro'   => true,
					'max'      => '6',
					'fields'   => array(
						array(
							'id'    => 'r-field-type',
							'type'  => 'text',
							'label' => __( 'Review for', 'bafg' ),
						),

					),
					'default'  => array(
						array(
							'r-field-type' => __( 'Staff', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Facilities', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Cleanliness', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Comfort', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Value for money', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Location', 'bafg' ),
						),
					)
				),
				array(
					'id'       => 'r-tour',
					'type'     => 'repeater',
					'label'    => __( 'Review Fields for Tours', 'bafg' ),
					'subtitle' => __( 'Add Custom Review Fields', 'bafg' ),
					'is_pro'   => true,
					'max'      => '6',
					'fields'   => array(

						array(
							'id'    => 'r-field-type',
							'type'  => 'text',
							'label' => __( 'Review for', 'bafg' ),
						),

					),
					'default'  => array(
						array(
							'r-field-type' => __( 'Guide', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Transportation', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Value for money', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Safety', 'bafg' ),
						),
					)
				),
				array(
					'id'       => 'r-apartment',
					'class'    => 'disable-sortable',
					'type'     => 'repeater',
					'label'    => __( 'Review Fields for Apartments', 'bafg' ),
					'subtitle' => __( 'Maximum 10 fields allowed', 'bafg' ),
					'is_pro'   => true,
					'max'      => '6',
					'fields'   => array(
						array(
							'id'    => 'r-field-type',
							'type'  => 'text',
							'label' => __( 'Review for', 'bafg' ),
						),

					),
					'default'  => array(
						array(
							'r-field-type' => __( 'Staff', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Facilities', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Cleanliness', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Comfort', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Value for money', 'bafg' ),
						),
						array(
							'r-field-type' => __( 'Location', 'bafg' ),
						),
					)
				),


				array(
					'id'       => 'tf_delete_old_review_fields_button',
					'type'     => 'callback',
					'function' => 'tf_delete_old_review_fields_button',
				),
				array(
					'id'       => 'tf_delete_old_complete_review_button',
					'type'     => 'callback',
					'function' => 'tf_delete_old_complete_review_button',
				),

			),
		),
		/**
		 * optimization Settings
		 *
		 * Sub Menu
		 */
		'optimization' => array(
			'title'  => __( 'Optimization', 'bafg' ),
			'parent' => 'miscellaneous',
			'icon'   => 'fas fa-star',
			'fields' => array(
				array(
					'id'      => 'optimization_heading',
					'type'    => 'heading',
					'content' => __( 'Minification Settings', 'bafg' ),
				),
				array(
					'id'        => 'css_min',
					'type'      => 'switch',
					'label'     => __( 'Minify CSS', 'bafg' ),
					'subtitle'  => __( 'Enable/disable Tourfic CSS minification', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Enabled', 'bafg' ),
					'label_off' => __( 'Disabled', 'bafg' ),
					'width'     => 100,
					'default'   => false
				),

				array(
					'id'        => 'js_min',
					'type'      => 'switch',
					'label'     => __( 'Minify JS', 'bafg' ),
					'subtitle'  => __( 'Enable/disable Tourfic JS minification', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Enabled', 'bafg' ),
					'label_off' => __( 'Disabled', 'bafg' ),
					'width'     => 100,
					'default'   => false
				),

				array(
					'id'      => 'cdn_heading',
					'type'    => 'heading',
					'content' => __( 'CDN Settings', 'bafg' ),
				),

				array(
					'id'        => 'ftpr_cdn',
					'type'      => 'switch',
					'label'     => __( 'Flatpickr CDN', 'bafg' ),
					'subtitle'  => __( 'Enable/disable cloudflare CDN for Flatpickr CSS & JS', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Enabled', 'bafg' ),
					'label_off' => __( 'Disabled', 'bafg' ),
					'width'     => 100
				),

				array(
					'id'        => 'fnybx_cdn',
					'type'      => 'switch',
					'label'     => __( 'Fancybox CDN', 'bafg' ),
					'subtitle'  => __( 'Enable/disable cloudflare CDN for Fancybox CSS & JS', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Enabled', 'bafg' ),
					'label_off' => __( 'Disabled', 'bafg' ),
					'width'     => 100
				),

				array(
					'id'        => 'slick_cdn',
					'type'      => 'switch',
					'label'     => __( 'Slick CDN', 'bafg' ),
					'subtitle'  => __( 'Enable/disable cloudflare CDN for Slick CSS & JS', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Enabled', 'bafg' ),
					'label_off' => __( 'Disabled', 'bafg' ),
					'width'     => 100
				),

				array(
					'id'        => 'fa_cdn',
					'type'      => 'switch',
					'label'     => __( 'Font Awesome CDN', 'bafg' ),
					'subtitle'  => __( 'Enable/disable cloudflare CDN for Font Awesome CSS', 'bafg' ),
					'is_pro'    => true,
					'label_on'  => __( 'Enabled', 'bafg' ),
					'label_off' => __( 'Disabled', 'bafg' ),
					'width'     => 100
				),


			),
		),

		/**
		 * Affiliate Options
		 *
		 * Main menu
		 */

		'affiliate' => array(
			'title'  => __( 'Affiliate', 'bafg' ),
			'icon'   => 'fa fa-handshake-o',
			'fields' => array(
				array(
					'id'       => 'affiliate_heading',
					'type'     => 'heading',
					'label'    => __( 'Affiliate Settings', 'bafg' ),
					'subtitle' => __( 'Use these options if you want to show 3rd party data and earn commission from them. Currently, we only allow Booking.com and TravelPayout. Gradually more options would be added.', 'bafg' ),
				),
				array(
					'id'     => 'tf-tab',
					'type'   => 'tab',
					'label'  => 'Affiliate',
					'is_pro' => true,
					'tabs'   => array(
						array(
							'id'     => 'affiliate_booking',
							'title'  => __( 'Booking.com', 'bafg' ),
							'fields' => array(
								array(
									'id'        => 'enable-booking-dot-com',
									'type'      => 'switch',
									'title'     => __( 'Enable Booking.com?', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => true
								),
							),
						),
						array(
							'id'     => 'travelPayouts',
							'title'  => __( 'TravelPayouts', 'bafg' ),
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'        => 'enable-travel-payouts',
									'type'      => 'switch',
									'title'     => __( 'Enable TravelPayouts?', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => true
								),
							),
						),
					),
				)
			),
		),

		'emails'  => array(
			'title'  => __( 'Emails', 'bafg' ),
			'icon'   => 'fa fa-envelope-o',
			'fields' => array(
				array(
					'id'   => 'email-settings',
					'type' => 'tab',
					'tabs' => array(
						array(
							'id'     => 'admin_emails',
							'title'  => __( 'Admin Email', 'bafg' ),
							'icon'   => 'fa fa-gear',
							'fields' => array(
								//file upload
								array(
									'id'    => 'brand_logo',
									'type'  => 'image',
									'label' => __( 'Admin Email Logo', 'bafg' ),
								),
								array(
									'id'      => 'send_notification',
									'type'    => 'select',
									'label'   => __( 'Send Notification', 'bafg' ),
									'options' => array(
										'admin'        => __( 'Admin', 'bafg' ),
										'admin_vendor' => __( 'Admin + Vendor', 'bafg' ),
										'turn_off'     => __( 'Turn Off', 'bafg' ),
									),
									'default' => 'admin',
								),
								array(
									'id'      => 'sale_notification_email',
									'type'    => 'text',
									'label'   => __( 'Sale Notification Email', 'bafg' ),
									'default' => get_bloginfo( 'admin_email' ),
								),
								//enable disable admin email
								array(
									'id'      => 'admin_email_disable',
									'type'    => 'switch',
									'label'   => __( 'Disable Admin Email', 'bafg' ),
									'default' => 'false',
								),
								//heading
								array(
									'id'    => 'admin_email_heading',
									'type'  => 'heading',
									'label' => __( 'Admin Email Setting', 'bafg' ),
								),
								array(
									'id'      => 'admin_email_subject',
									'type'    => 'text',
									'label'   => __( 'Booking Email Subject', 'bafg' ),
									'default' => __( 'New Tour Booking', 'bafg' ),
								),
								array(
									'id'      => 'email_from_name',
									'type'    => 'text',
									'label'   => __( 'Email From Name', 'bafg' ),
									'default' => get_bloginfo( 'name' ),
								),
								array(
									'id'      => 'email_from_email',
									'type'    => 'text',
									'label'   => __( 'Email From Email', 'bafg' ),
									'default' => get_bloginfo( 'admin_email' ),
								),
								array(
									'id'      => 'order_email_heading',
									'type'    => 'text',
									'label'   => __( 'Order Email Heading', 'bafg' ),
									'default' => __( 'You booking has been received', 'bafg' ),
								),
								//type color
								array(
									'id'       => 'email_heading_bg',
									'type'     => 'color',
									'label'    => __( 'Email header background color', 'bafg' ),
									'default'  => array(
										'bg_color' => '#0209AF'
									),
									'multiple' => true,
									'inline'   => true,
									'colors'   => array(
										'bg_color' => __( 'Background Color', 'bafg' ),
									)
								),
								//email body
								array(
									'id'          => 'admin_booking_email_template',
									'type'        => 'editor',
									'label'       => __( 'Booking Confrimation Template', 'bafg' ),
									'default'     => TF_Handle_Emails::get_email_template( 'order_confirmation', '', 'admin' ),
									'description' => __( 'This template will be sent to admin', 'bafg' )
								),
								//heading
								array(
									'id'    => 'vendor_email_heading',
									'type'  => 'heading',
									'label' => __( 'Vendor Email', 'bafg' ),
								),
								// //vendor email from name
								// array(
								// 	'id'      => 'vendor_from_name',
								// 	'type'    => 'text',
								// 	'label'   => __( 'Vendor Email From Name', 'bafg' ),
								// 	'default' => get_bloginfo( 'name' ),
								// ),
								// //vendor email from email
								// array(
								// 	'id'      => 'vendor_from_email',
								// 	'type'    => 'text',
								// 	'label'   => __( 'Vendor Email From Email', 'bafg' ),
								// 	'default' => get_bloginfo( 'admin_email' ),
								// ),
								//vendor email template
								array(
									'id'          => 'vendor_booking_email_template',
									'type'        => 'editor',
									'label'       => __( 'Vendor Notification Template', 'bafg' ),
									'default'     => TF_Handle_Emails::get_email_template( 'order_confirmation', '', 'vendor' ),
									'description' => __( 'This template will be sent to vendor', 'bafg' )
								),
								// array(
								// 	'id'      => 'email_content_type',
								// 	'type'    => 'select',
								// 	'label'   => __( 'Email Content Type', 'bafg' ),
								// 	'options' => array(
								// 		'text/html'  => __( 'HTML', 'bafg' ),
								// 		'plain/text' => __( 'Plain Text', 'bafg' ),
								// 	),
								// 	'default' => 'text/html',
								// ),
							),

						),

						//customer email tab
						array(
							'id'     => 'customer-email',
							'title'  => __( 'Customer Email', 'bafg' ),
							'icon'   => 'fa fa-envelope',
							'fields' => array(
								//disable customer email
								array(
									'id'      => 'customer_email_disable',
									'type'    => 'switch',
									'label'   => __( 'Disable Customer Email', 'bafg' ),
									'default' => 'false',
								),
								array(
									'id'      => 'customer_confirm_email_subject',
									'type'    => 'text',
									'label'   => __( 'Booking Confirmation Email Subject', 'bafg' ),
									'default' => __( 'Your booking has been confirmed', 'bafg' ),
								),
								//from name
								array(
									'id'      => 'customer_from_name',
									'type'    => 'text',
									'label'   => __( 'Email From Name', 'bafg' ),
									'default' => get_bloginfo( 'name' ),
								),
								//from email
								array(
									'id'      => 'customer_from_email',
									'type'    => 'text',
									'label'   => __( 'Email From Email', 'bafg' ),
									'default' => get_bloginfo( 'admin_email' ),
								),
								array(
									'id'          => 'customer_confirm_email_template',
									'type'        => 'editor',
									'label'       => __( 'Booking Confirmation Email', 'bafg' ),
									'default'     => TF_Handle_Emails::get_email_template( 'order_confirmation', '', 'customer' ),
									'description' => __( 'This template will be sent to customer after booking is confirmed.', 'bafg' ),
								),
							),
						),
					),
				),
				//notice field
				array(
					'id'      => 'notice',
					'type'    => 'notice',
					'class'   => 'info',
					'title'   => __( 'Email Shortcodes', 'bafg' ),
					'content' => __( 'You can use the following placeholders in the email body:', 'bafg' ) . '<br><br><strong>{order_id} </strong> : To display the booking ID.<br>
					<strong>{booking_id} </strong> : To display the booking ID.<br>
					<strong>{booking_date} </strong> : To display the booking date.<br>
					<strong>{fullname} </strong> : To display the customer name.<br>
					<strong>{user_email} </strong> : To display the customer email.<br>
					<strong>{phone} </strong> : To display the customer phone.<br>
					<strong>{address} </strong> : To display the customer address.<br>
					<strong>{city} </strong> : To display the customer city.<br>
					<strong>{country} </strong> : To display the customer country.<br>
					<strong>{zip} </strong> : To display the customer zip.<br>
					<strong>{booking_details} </strong> : To display the booking details.<br>
					<strong>{shipping_address} </strong> : To display the shipping address.<br>
					<strong>{shipping_method} </strong> : To display the shipping method.<br>
					<strong>{shipping_city} </strong> : To display the shipping city.<br>
					<strong>{shipping_country} </strong> : To display the shipping country.<br>
					<strong>{shipping_zip} </strong> : To display the shipping zip.<br>
					<strong>{order_total} </strong> : To display the total price.<br>
					<strong>{order_subtotal} </strong> : To display the subtotal price.<br>
					<strong>{order_date} </strong> : To display the order date.<br>
					<strong>{order_status} </strong> : To display the order status.<br>
					<strong>{payment_method} </strong> : To display the payment method.<br>
					<strong>{booking_url} </strong> : To display the booking url.<br>
					<strong>{site_name} </strong> : To display the site name.<br>
					<strong>{site_url} </strong> : To display the site url.<br>

					'

				,
				),
			),
		),

		//QR Code settings
		'qr_code' => array(
			'title'  => __( 'QR Code', 'bafg' ),
			'icon'   => 'fa fa-qrcode',
			'fields' => array(
				array(
					'id'      => 'qr-code-title',
					'type'    => 'heading',
					'content' => __( 'Tour QR Code', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'     => 'qr_logo',
					'type'   => 'image',
					'label'  => __( 'Company Logo', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'     => 'qr_background',
					'type'   => 'image',
					'label'  => __( 'QR Code WaterMark', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'      => 'qr-ticket-title',
					'type'    => 'text',
					'label'   => __( 'Voucher Title', 'bafg' ),
					'default' => "Voucher ID",
					'is_pro'  => true,
				),
				array(
					'id'     => 'qr-ticket-prefix',
					'type'   => 'text',
					'label'  => __( 'Voucher ID Prefix', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'      => 'qr-ticket-content',
					'type'    => 'text',
					'label'   => __( 'Voucher Policy', 'bafg' ),
					'default' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.",
					'is_pro'  => true,
				),
				array(
					'id'      => 'qr-ticket-verify',
					'type'    => 'select',
					'label'   => __( 'QR Code Verification', 'bafg' ),
					'options' => array(
						'1' => __( '1 Step', 'bafg' ),
						'2' => __( '2 Steps', 'bafg' ),
					),
					'default' => '2',
					'is_pro'  => true,
				),
			),
		),

		/**
		 * Integration
		 *
		 * Main menu
		 */

		'integration' => array(
			'title'  => __( 'Integration', 'bafg' ),
			'icon'   => 'fa fa-plus',
			'fields' => array(
				array(
					'id'       => 'integration_heading',
					'type'     => 'heading',
					'label'    => __( 'Pabbly & Zapier Settings', 'bafg' ),
					'subtitle' => __( 'If you want to integrate your system with other platforms. Currently, we only allow Pabbly and Zapier.', 'bafg' ),
				),
				array(
					'id'     => 'tf-integration',
					'type'   => 'tab',
					'label'  => 'Pabbly & Zapier',
					'is_pro' => true,
					'tabs'   => array(
						array(
							'id'     => 'pabbly_integration',
							'title'  => __( 'Pabbly', 'bafg' ),
							'fields' => array(
								array(
									'id'      => 'hotel-title',
									'type'    => 'heading',
									'content' => __( 'Hotel', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'hotel-integrate-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Hotel?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Pabbly with Hotel create and update.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'hotel-integrate-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Hotel Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Hotel Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'hotel-integrate-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'        => 'h-enquiry-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Hotel Enquiry?', 'bafg' ),
									'subtitle'  => __( 'Integrate Pabbly with Hotel Enquiry Form.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true
								),
								array(
									'id'         => 'h-enquiry-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Hotel Enquiry Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Hotel Enquiry Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'h-enquiry-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'      => 'tour-title',
									'type'    => 'heading',
									'content' => __( 'Tour', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'tour-integrate-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Tour?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Pabbly with Tour create and update.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'tour-integrate-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Tour Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Tour Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'tour-integrate-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'        => 't-enquiry-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Tour Enquiry?', 'bafg' ),
									'subtitle'  => __( 'Integrate Pabbly with Tour Enquiry Form.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true
								),
								array(
									'id'         => 't-enquiry-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Tour Enquiry Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Tour Enquiry Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 't-enquiry-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'      => 'apartment-title',
									'type'    => 'heading',
									'content' => __( 'Apartment', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'apartment-integrate-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Apartment?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Pabbly with Apartment create and update.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'apartment-integrate-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Apartment Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Apartment Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'apartment-integrate-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'        => 'a-enquiry-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Apartment Enquiry?', 'bafg' ),
									'subtitle'  => __( 'Integrate Pabbly with Apartment Enquiry Form.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true
								),
								array(
									'id'         => 'a-enquiry-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Apartment Enquiry Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Apartment Enquiry Pabbly Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'a-enquiry-pabbly', '==', 'true' ),
									),
								),
								array(
									'id'      => 'woocommerce-title',
									'type'    => 'heading',
									'content' => __( 'WooCommerce', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'tf-new-order-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for Booking?', 'bafg' ),
									'subtitle'  => __( 'Integrate Pabbly with WooCommerce Booking.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'tf-new-order-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'Booking Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Booking Pabbly Web Hook.', 'bafg' ),
									'dependency' => array(
										array( 'tf-new-order-pabbly', '==', 'true' ),
									),
									'is_pro'     => true,
								),
								array(
									'id'        => 'tf-new-customer-pabbly',
									'type'      => 'switch',
									'label'     => __( 'Enable Pabbly for New Customer?', 'bafg' ),
									'subtitle'  => __( 'Integrate Pabbly with WooCommerce New Customer.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'tf-new-customer-pabbly-webhook',
									'type'       => 'text',
									'label'      => __( 'New Customer Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your New Customer Pabbly Web Hook.', 'bafg' ),
									'dependency' => array(
										array( 'tf-new-customer-pabbly', '==', 'true' ),
									),
									'is_pro'     => true,
								),
							),
						),
						array(
							'id'     => 'zapier_integration',
							'title'  => __( 'Zapier', 'bafg' ),
							'icon'   => 'fa fa-gear',
							'fields' => array(
								array(
									'id'      => 'hotel-title',
									'type'    => 'heading',
									'content' => __( 'Hotel', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'hotel-integrate-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Hotel?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Zapier with Hotel create and update.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'hotel-integrate-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Hotel Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Hotel Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'hotel-integrate-zapier', '==', 'true' ),
									),
								),
								array(
									'id'        => 'h-enquiry-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Hotel Enquiry?', 'bafg' ),
									'subtitle'  => __( 'Integrate Zapier with Hotel Enquiry Form.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true
								),
								array(
									'id'         => 'h-enquiry-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Hotel Enquiry Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Hotel Enquiry Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'h-enquiry-zapier', '==', 'true' ),
									),
								),
								array(
									'id'      => 'tour-title',
									'type'    => 'heading',
									'content' => __( 'Tour', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'tour-integrate-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Tour?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Zapier with Tour create and update.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'tour-integrate-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Tour Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Tour Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'tour-integrate-zapier', '==', 'true' ),
									),
								),
								array(
									'id'        => 't-enquiry-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Tour Enquiry?', 'bafg' ),
									'subtitle'  => __( 'Integrate Zapier with Tour Enquiry Form.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true
								),
								array(
									'id'         => 't-enquiry-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Tour Enquiry Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Tour Enquiry Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 't-enquiry-zapier', '==', 'true' ),
									),
								),
								array(
									'id'      => 'apartment-title',
									'type'    => 'heading',
									'content' => __( 'Apartment', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'apartment-integrate-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Apartment?', 'bafg' ),
									'subtitle'  => __( 'You can able to Integrate Zapier with Apartment create and update.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'apartment-integrate-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Apartment Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Apartment Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'apartment-integrate-zapier', '==', 'true' ),
									),
								),
								array(
									'id'        => 'a-enquiry-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Apartment Enquiry?', 'bafg' ),
									'subtitle'  => __( 'Integrate Zapier with Apartment Enquiry Form.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true
								),
								array(
									'id'         => 'a-enquiry-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Apartment Enquiry Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Apartment Enquiry Zapier Web Hook.', 'bafg' ),
									'is_pro'     => true,
									'dependency' => array(
										array( 'a-enquiry-zapier', '==', 'true' ),
									),
								),
								array(
									'id'      => 'woocommerce-title',
									'type'    => 'heading',
									'content' => __( 'WooCommerce', 'bafg' ),
									'class'   => 'tf-field-class',
								),
								array(
									'id'        => 'tf-new-order-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for Booking?', 'bafg' ),
									'subtitle'  => __( 'Integrate Zapier with WooCommerce Booking.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'tf-new-order-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'Booking Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your Booking Zapier Web Hook.', 'bafg' ),
									'dependency' => array(
										array( 'tf-new-order-zapier', '==', 'true' ),
									),
									'is_pro'     => true,
								),
								array(
									'id'        => 'tf-new-customer-zapier',
									'type'      => 'switch',
									'label'     => __( 'Enable Zapier for New Customer?', 'bafg' ),
									'subtitle'  => __( 'Integrate Zapier with WooCommerce New Customer.', 'bafg' ),
									'label_on'  => __( 'Yes', 'bafg' ),
									'label_off' => __( 'No', 'bafg' ),
									'default'   => false,
									'is_pro'    => true,
								),
								array(
									'id'         => 'tf-new-customer-zapier-webhook',
									'type'       => 'text',
									'label'      => __( 'New Customer Web Hook', 'bafg' ),
									'subtitle'   => __( 'Enter Here Your New Customer Zapier Web Hook.', 'bafg' ),
									'dependency' => array(
										array( 'tf-new-customer-zapier', '==', 'true' ),
									),
									'is_pro'     => true,
								),
							),
						),
					),
				)
			),
		),

		/**
		 * Import/Export
		 *
		 * Main menu
		 */
		// 'import_export' => array(
		// 	'title' => __( 'Import/Export', 'bafg' ),
		// 	'icon' => 'fas fa-hdd',
		// 	'fields' => array(
		// 		array(
		// 			'id' => 'backup',
		// 			'type' => 'backup',
		// 		),  

		// 	),
		// ),
	),
) );
