<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

function tf_apt_amenities_cats() {
	$amenities_cats = ! empty( tf_data_types( tfopt( 'amenities_cats' ) ) ) ? tf_data_types( tfopt( 'amenities_cats' ) ) : '';
	$all_cats       = [];
	if ( ! empty( $amenities_cats ) && is_array( $amenities_cats ) ) {
		foreach ( $amenities_cats as $key => $cat ) {
			$all_cats[ (string) $key ] = $cat['amenities_cat_name'];
		}
	}

	if(empty($all_cats)){
		$all_cats[''] = __( 'Select Category', 'bafg' );
	}

	return $all_cats;
}

TF_Metabox::metabox( 'tf_apartment_opt', array(
	'title'     => __( 'Apertment Options', 'bafg' ),
	'post_type' => 'tf_apartment',
	'sections'  => array(
		// General
		'general'         => array(
			'title'  => __( 'General', 'bafg' ),
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'    => 'apartment_gallery',
					'type'  => 'gallery',
					'label' => __( 'Apartment Gallery', 'bafg' ),
				),
				array(
					'id'        => 'apartment_as_featured',
					'type'      => 'switch',
					'label'     => __( 'Featured Apartment', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'          => 'featured_text',
					'type'        => 'text',
					'label'       => __( 'Apartment Featured Text', 'bafg' ),
					'subtitle'    => __( 'Enter Featured Apartment Text', 'bafg' ),
					'placeholder' => __( 'Enter Featured Apartment Text', 'bafg' ),
					'default'     => __( 'Hot Deal', 'bafg' ),
					'dependency'  => array( 'apartment_as_featured', '==', true ),
				),
				array(
					'id'       => 'tf_single_apartment_layout_opt',
					'type'     => 'select',
					'label'    => __( 'Apartment Page Layout', 'bafg' ),
					'subtitle' => __( 'Select your Layout logic', 'bafg' ),
					'options'  => [
						'global' => __( 'Global Settings', 'bafg' ),
						'single' => __( 'Single Settings', 'bafg' ),
					],
					'default'  => 'global',
				),
				array(
					'id'       => 'tf_single_apartment_template',
					'type'     => 'imageselect',
					'label'    => __( 'Single Apartment Page Layout', 'bafg' ),
					'multiple' 		=> true,
					'inline'   		=> true,
					'options'   	=> array(
						'default' 			=> array(
							'title'			=> 'Default',
							'url' 			=> TF_ASSETS_ADMIN_URL."images/template/default-apartment.jpg",
						),
					),
					'default'   	=> function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
					'dependency'  => [
						array( 'tf_single_apartment_layout_opt', '==', 'single' )
					],
				),
			)
		),
		// location
		'location'        => array(
			'title'  => __( 'Location', 'bafg' ),
			'icon'   => 'fa-solid fa-location-dot',
			'fields' => array(
				array(
					'id'       => 'location_title',
					'type'     => 'text',
					'label'    => __( 'Section Title', 'bafg' ),
					'subtitle' => __( 'Enter location section title', 'bafg' ),
					'default'  => __( 'Where you’ll be', 'bafg' ),
				),
				array(
					'id'          => 'address',
					'type'        => 'textarea',
					'label'       => __( 'Apartment Address', 'bafg' ),
					'subtitle'    => __( 'The address you want to show below the apartment title', 'bafg' ),
					'placeholder' => __( 'e.g. 123 ABC Road, Toronto, Ontario 20100', 'bafg' ),
					'attributes'  => array(
						'required' => 'required',
					),
				),
				array(
					'id'       => 'map',
					'class'    => 'gmaps',
					'type'     => 'map',
					'label'    => __( 'Dynamic Location Search', 'bafg' ),
					'subtitle' => __( 'Write your desired address and select the address from the suggestions. This address will be used to hyperlink the apartment address on the frontend.', 'bafg' ),
					'height'   => '250px',
					'settings' => array(
						'scrollWheelZoom' => true,
					)
				),
				//Property Surroundings
				array(
					'id'    => 'surroundings_heading',
					'type'  => 'heading',
					'label' => __( 'Property Surroundings', 'bafg' ),
				),
				array(
					'id'       => 'surroundings_sec_title',
					'type'     => 'text',
					'label'    => __( 'Section Title', 'bafg' ),
					'subtitle' => __( 'Enter surroundings section title', 'bafg' ),
					'is_pro'   => true,
				),
				array(
					'id'       => 'surroundings_subtitle',
					'type'     => 'text',
					'label'    => __( 'Section Subtitle', 'bafg' ),
					'subtitle' => __( 'Enter surroundings section subtitle', 'bafg' ),
					'is_pro'   => true,
				),
				array(
					'id'     => 'surroundings_places',
					'type'   => 'repeater',
					'label'  => __( 'Surroundings Places', 'bafg' ),
					'button_title' => __( 'Add New Criteria', 'bafg' ),
					'is_pro' => true,
					'fields' => array(
						array(
							'id'          => 'place_criteria_label',
							'type'        => 'text',
							'label'       => __( 'Place Criteria Label', 'bafg' ),
							'placeholder' => __( 'Enter place criteria label', 'bafg' ),
						),
						array(
							'id'    => 'place_criteria_icon',
							'type'  => 'icon',
							'label' => __( 'Criteria Icon', 'bafg' ),
						),
						array(
							'id'     => 'places',
							'type'   => 'repeater',
							'label'  => __( 'Places', 'bafg' ),
							'button_title' => __( 'Add New Place', 'bafg' ),
							'fields' => array(
								array(
									'id'          => 'place_name',
									'type'        => 'text',
									'label'       => __( 'Place Name', 'bafg' ),
									'placeholder' => __( 'Enter place name', 'bafg' ),
								),
								array(
									'id'          => 'place_distance',
									'type'        => 'text',
									'label'       => __( 'Place Distance', 'bafg' ),
									'placeholder' => __( 'Enter place distance', 'bafg' ),
								),
							),
						)
					),
				),
			),
		),
		// Booking
		'booking'         => array(
			'title'  => __( 'Booking', 'bafg' ),
			'icon'   => 'fa-solid fa-calendar-check',
			'fields' => array(
				array(
					'id'    => 'booking_form_title',
					'type'  => 'text',
					'label' => __( 'Form Title', 'bafg' ),
					'default' => __( 'Book your apartment', 'bafg' ),
				),
				array(
					'id'          => 'price_per_night',
					'type'        => 'number',
					'label'       => __( 'Price Per Night', 'bafg' ),
					'subtitle'    => __( 'Enter price per night', 'bafg' ),
					'field_width' => 50,
					'attributes'  => array( 'min' => 0 )
				),
				array(
					'id'          => 'min_stay',
					'type'        => 'number',
					'label'       => __( 'Minimum Night Stay', 'bafg' ),
					'subtitle'    => __( 'Enter minimum night stay', 'bafg' ),
					'field_width' => 50,
					'attributes'  => array( 'min' => 0 )
				),
				array(
					'id'          => 'max_adults',
					'type'        => 'number',
					'label'       => __( 'Maximum Adults', 'bafg' ),
					'subtitle'    => __( 'Enter maximum adults', 'bafg' ),
					'field_width' => 33.33,
					'attributes'  => array( 'min' => 1 )
				),
				array(
					'id'          => 'max_children',
					'type'        => 'number',
					'label'       => __( 'Maximum Children', 'bafg' ),
					'subtitle'    => __( 'Enter maximum children', 'bafg' ),
					'field_width' => 33.33,
					'attributes'  => array( 'min' => 0 )
				),
				array(
					'id'          => 'max_infants',
					'type'        => 'number',
					'label'       => __( 'Maximum Infants', 'bafg' ),
					'subtitle'    => __( 'Enter maximum infants', 'bafg' ),
					'field_width' => 33.33,
					'attributes'  => array( 'min' => 0 )
				),
				array(
					'id'          => 'additional_fee_label',
					'type'        => 'text',
					'label'       => __( 'Additional Fee Label', 'bafg' ),
					'subtitle'    => __( 'Enter additional fee', 'bafg' ),
					'field_width' => 33.33,
				),
				array(
					'id'          => 'additional_fee',
					'type'        => 'number',
					'label'       => __( 'Additional Fee', 'bafg' ),
					'subtitle'    => __( 'Enter additional fee', 'bafg' ),
					'field_width' => 33.33,
					'attributes'  => array( 'min' => 0 )
				),
				array(
					'id'          => 'fee_type',
					'type'        => 'select',
					'label'       => __( 'Fee Type', 'bafg' ),
					'subtitle'    => __( 'Select fee type', 'bafg' ),
					'options'     => array(
						'per_stay'   => __( 'Per Stay', 'bafg' ),
						'per_night'  => __( 'Per Night', 'bafg' ),
						'per_person' => __( 'Per Person', 'bafg' ),
					),
					'field_width' => 33.33,
				),
				array(
					'id'          => 'discount_type',
					'type'        => 'select',
					'label'       => __( 'Discount Type', 'bafg' ),
					'subtitle'    => __( 'Select Discount Type: Percentage or Fixed', 'bafg' ),
					'options'     => array(
						'none'    => __( 'None', 'bafg' ),
						'fixed'   => __( 'Fixed', 'bafg' ),
						'percent' => __( 'Percent', 'bafg' ),
					),
					'field_width' => 50,
				),
				array(
					'id'          => 'discount',
					'type'        => 'number',
					'label'       => __( 'Discount Amount', 'bafg' ),
					'subtitle'    => __( 'Insert your discount amount', 'bafg' ),
					'dependency'  => array( 'discount_type', '!=', 'none' ),
					'attributes'  => array( 'min' => 0 ),
					'field_width' => 50,
				),
				/*array(
					'id'       => 'weekly_discount',
					'type'     => 'number',
					'label'    => __( 'Weekly Discount Per Night', 'bafg' ),
					'subtitle' => __( 'Weekly discounts for stays longer than 7 days (per night)', 'bafg' ),
				),
				array(
					'id'       => 'monthly_discount',
					'type'     => 'number',
					'label'    => __( 'Monthly Discount Per Night', 'bafg' ),
					'subtitle' => __( 'Monthly discounts for stays longer than 30 days (per night)', 'bafg' ),
				),*/
			),
		),
		//Room Management
		'room_management' => array(
			'title'  => __( 'Room Management', 'bafg' ),
			'icon'   => 'fa-solid fa-bed',
			'fields' => array(
				array(
					'id'    => 'room_details_title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => __( 'Where you\'ll sleep', 'bafg' ),
				),
				array(
					'id'           => 'rooms',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'Rooms', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'title',
							'type'  => 'text',
							'label' => __( 'Room Title', 'bafg' ),
						),
						array(
							'id'    => 'subtitle',
							'type'  => 'text',
							'label' => __( 'Room Subtitle', 'bafg' ),
						),
						array(
							'id'     => 'description',
							'type'   => 'editor',
							'label'  => __( 'Room Description', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'    => 'thumbnail',
							'type'  => 'image',
							'label' => __( 'Room Thumbnail', 'bafg' ),
						),
						array(
							'id'     => '',
							'type'   => 'gallery',
							'label'  => __( 'Room Gallery', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'          => '',
							'type'        => 'select',
							'label'       => __( 'Room Type', 'bafg' ),
							'subtitle'    => __( 'Select room type', 'bafg' ),
							'options'     => array(
								'bedroom'     => __( 'Bedroom', 'bafg' ),
								'common_room' => __( 'Common Room', 'bafg' ),
								'kitchen'     => __( 'Kitchen', 'bafg' ),
								'bathroom'    => __( 'Bathroom', 'bafg' ),
							),
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'          => '',
							'type'        => 'text',
							'label'       => __( 'Room Footage', 'bafg' ),
							'subtitle'    => __( 'Room footage (in sft)', 'bafg' ),
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'          => '',
							'type'        => 'number',
							'label'       => __( 'Number of Beds', 'bafg' ),
							'subtitle'    => __( 'Number of beds available in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'          => '',
							'type'        => 'number',
							'label'       => __( 'Number of Adults', 'bafg' ),
							'subtitle'    => __( 'Max number of persons allowed in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'          => '',
							'type'        => 'number',
							'label'       => __( 'Number of Children', 'bafg' ),
							'subtitle'    => __( 'Max number of children allowed in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'          => '',
							'type'        => 'number',
							'label'       => __( 'Number of Infants', 'bafg' ),
							'subtitle'    => __( 'Max number of infants allowed in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 50,
							'is_pro'      => true,
						),
					),
				),
			),
		),

		// Information
		'information'     => array(
			'title'  => __( 'Information\'s', 'bafg' ),
			'icon'   => 'fa-solid fa-circle-info',
			'fields' => array(
				//highlights
				array(
					'id'    => 'highlights_heading',
					'type'  => 'heading',
					'label' => __( 'Highlights', 'bafg' ),
				),
				array(
					'id'    => 'highlights_title',
					'type'  => 'text',
					'label' => __( 'Highlights Title', 'bafg' ),
					'default' => __( 'Discover Our Top Features', 'bafg' ),
				),
				array(
					'id'           => 'highlights',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'Highlights', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'title',
							'type'  => 'text',
							'label' => __( 'Title', 'bafg' ),
						),
						array(
							'id'    => 'subtitle',
							'type'  => 'text',
							'label' => __( 'Subtitle', 'bafg' ),
						),
						array(
							'id'    => 'icon',
							'type'  => 'icon',
							'label' => __( 'Icon', 'bafg' ),
						),
					),
				),
				//amenities
				array(
					'id'    => 'amenities_heading',
					'type'  => 'heading',
					'label' => __( 'Amenities', 'bafg' ),
				),
				array(
					'id'    => 'amenities_title',
					'type'  => 'text',
					'label' => __( 'Amenities Title', 'bafg' ),
					'default' => __( 'What this place offers', 'bafg' ),
				),
				array(
					'id'           => 'amenities',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'Amenities', 'bafg' ),
					'fields'       => array(
						array(
							'id'          => 'feature',
							'type'        => 'select2',
							'label'       => __( 'Feature', 'bafg' ),
							'placeholder' => __( 'Select feature', 'bafg' ),
							'options'     => 'terms',
							'query_args'  => array(
								'taxonomy'   => 'apartment_feature',
								'hide_empty' => false,
							),
							'field_width' => 50,
						),
						array(
							'id'          => 'cat',
							'type'        => 'select2',
							'label'       => __( 'Category', 'bafg' ),
							'placeholder' => __( 'Select category', 'bafg' ),
							'options'     => tf_apt_amenities_cats(),
							'description' => __( 'Add new category from <a target="_blank" href="'.admin_url('admin.php?page=tf_settings#tab=apartment_single_page').'">Amenities Categories</a>', 'bafg' ),
							'field_width' => 50,
						),
						array(
							'id'        => 'favorite',
							'type'      => 'switch',
							'label'     => __( 'Mark as Favorite', 'bafg' ),
							'label_on'  => __( 'Yes', 'bafg' ),
							'label_off' => __( 'No', 'bafg' ),
						),
					),
				),

				//house rules
				array(
					'id'    => 'house_rules_heading',
					'type'  => 'heading',
					'label' => __( 'House Rules', 'bafg' ),
				),
				array(
					'id'    => 'house_rules_title',
					'type'  => 'text',
					'label' => __( 'House Rules Title', 'bafg' ),
					'default' => __( 'House Rules', 'bafg' ),
				),
				array(
					'id'           => 'house_rules',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'House Rules', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'title',
							'type'  => 'text',
							'label' => __( 'Title', 'bafg' ),
						),
						array(
							'id'    => 'desc',
							'type'  => 'editor',
							'label' => __( 'Description', 'bafg' ),
						),
						array(
							'id'        => 'include',
							'type'      => 'switch',
							'label'     => __( 'Allowed?', 'bafg' ),
							'label_on'  => __( 'Yes', 'bafg' ),
							'label_off' => __( 'No', 'bafg' ),
							'default'   => true,
						),
					),
				),
			),
		),
		// faq and terms and conditions
		'faq'             => array(
			'title'  => __( 'FAQ & Terms', 'bafg' ),
			'icon'   => 'fa-solid fa-clipboard-question',
			'fields' => array(
				array(
					'id'    => 'faq_heading',
					'type'  => 'heading',
					'label' => __( 'Frequently Asked Questions', 'bafg' ),
				),
				array(
					'id'    => 'faq_title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => __( 'Frequently Asked Questions', 'bafg' ),
				),
				array(
					'id'    => 'faq_desc',
					'type'  => 'textarea',
					'label' => __( 'Section Description', 'bafg' ),
				),
				array(
					'id'           => 'faq',
					'type'         => 'repeater',
					'button_title' => __( 'Add New', 'bafg' ),
					'label'        => __( 'Frequently Asked Questions', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'title',
							'type'  => 'text',
							'label' => __( 'Title', 'bafg' ),
						),
						array(
							'id'    => 'description',
							'type'  => 'editor',
							'label' => __( 'Description', 'bafg' ),
						),
					),
				),
				array(
					'id'    => 'terms_heading',
					'type'  => 'heading',
					'label' => __( 'Terms & Conditions', 'bafg' ),
				),
				array(
					'id'    => 'terms_title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => __( 'Terms & Conditions', 'bafg' ),
				),
				array(
					'id'    => 'terms_and_conditions',
					'type'  => 'editor',
					'label' => __( 'Apartment Terms & Conditions', 'bafg' ),
				),
			),
		),
		// Settings
		'settings'        => array(
			'title'  => __( 'Settings', 'bafg' ),
			'icon'   => 'fa-solid fa-viruses',
			'fields' => array(
				//disable options
				array(
					'id'      => 'disable_options',
					'type'    => 'heading',
					'label'   => __( 'Disable Options', 'bafg' ),
					'content' => __( 'These settings will overwrite global settings', 'bafg' ),
				),
				array(
					'id'        => 'disable-apartment-review',
					'type'      => 'switch',
					'label'     => __( 'Disable Review Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false,
				),
				array(
					'id'        => 'disable-apartment-share',
					'type'      => 'switch',
					'label'     => __( 'Disable Share Option', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false,
				),
				array(
					'id'        => 'disable-related-apartment',
					'type'      => 'switch',
					'label'     => __( 'Disable Related Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false,
				),
				//description
				array(
					'id'    => 'description',
					'type'  => 'heading',
					'label' => __( 'Description', 'bafg' ),
				),
				array(
					'id'      => 'description_title',
					'type'    => 'text',
					'label'   => __( 'Description Title', 'bafg' ),
					'default' => __( 'About this place', 'bafg' ),
				),
				//review
				array(
					'id'      => 'review-sections',
					'type'    => 'heading',
					'content' => __( 'Review', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'    => 'review-section-title',
					'type'  => 'text',
					'label' => __( 'Reviews Section Title', 'bafg' ),
					'default' => "Guest Reviews"
				),
				//Related Apartment
				array(
					'id'    => 'related',
					'type'  => 'heading',
					'label' => __( 'Related Apartment', 'bafg' ),
				),
				array(
					'id'      => 'related_apartment_title',
					'type'    => 'text',
					'label'   => __( 'Related Apartment Title', 'bafg' ),
					'default' => __( 'You may also like', 'bafg' ),
				),
				//enquiry
				array(
					'id'      => 'enquiry',
					'type'    => 'heading',
					'content' => __( 'Enquiry', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'        => 'enquiry-section',
					'type'      => 'switch',
					'label'     => __( 'Apartment Enquiry Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => true
				),
				array(
					'id'    => 'enquiry-title',
					'type'  => 'text',
					'label' => __( 'Apartment Enquiry Title Text', 'bafg' ),
					'default' => __('Have a question in mind', 'bafg'),
					'dependency' => array( 'enquiry-section', '==', '1' ),
				),
				array(
					'id'    => 'enquiry-content',
					'type'  => 'text',
					'label' => __( 'Apartment Enquiry Short Text', 'bafg' ),
					'default' => __('Looking for more info? Send a question to the property to find out more.', 'bafg'),
					'dependency' => array( 'enquiry-section', '==', '1' ),
				),
				array(
					'id'    => 'enquiry-btn',
					'type'  => 'text',
					'label' => __( 'Apartment Enquiry Button Text', 'bafg' ),
					'default' => __('Contact Host', 'bafg'),
					'dependency' => array( 'enquiry-section', '==', '1' ),
				),
			),
		),
	),
) );
