<?php
// don't load directly
defined( 'ABSPATH' ) || exit;
$badge_up     = '<div class="tf-csf-badge"><span class="tf-upcoming">' . __( "Upcoming", "bafg" ) . '</span></div>';
$badge_pro    = '<div class="tf-csf-badge"><span class="tf-pro">' . __( "Pro Feature", "bafg" ) . '</span></div>';
$badge_up_pro = '<div class="tf-csf-badge"><span class="tf-upcoming">' . __( "Upcoming", "bafg" ) . '</span><span class="tf-pro">' . __( "Pro Feature", "bafg" ) . '</span></div>';

TF_Metabox::metabox( 'tf_hotels_opt', array(
	'title'     => 'Hotel Settings',
	'post_type' => 'tf_hotel',
	'sections'  => array(
		'general' => array(
			'title'  => __( 'General', 'bafg' ),
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'        => 'featured',
					'type'      => 'switch',
					'label'     => __( 'Featured Hotel', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false,
				),
				array(
					'id'          => 'featured_text',
					'type'        => 'text',
					'label'       => __( 'Hotel Featured Text', 'bafg' ),
					'subtitle'    => __( 'Enter Featured Hotel Text', 'bafg' ),
					'placeholder' => __( 'Enter Featured Hotel Text', 'bafg' ),
					'default' => __( 'Hot Deal', 'bafg' ),
					'dependency'  => array( 'featured', '==', true ),
				),
				array(
					'id'       => 'tf_single_hotel_layout_opt',
					'type'     => 'select',
					'label'    => __( 'Hotel Page Layout', 'bafg' ),
					'subtitle' => __( 'Select your Layout logic', 'bafg' ),
					'options'  => [
						'global' => __( 'Global Settings', 'bafg' ),
						'single' => __( 'Single Settings', 'bafg' ),
					],
					'default'  => 'global',
				),
				array(
					'id'       => 'tf_single_hotel_template',
					'type'     => 'imageselect',
					'label'    => __( 'Single Hotel Page Layout', 'bafg' ),
					'multiple' 		=> true,
					'inline'   		=> true,
					'options'   	=> array( 
						'design-1' 				=> array(
							'title'			=> 'Design 1',
							'url' 			=> TF_ASSETS_ADMIN_URL."images/template/design1-hotel.jpg",
						),
						'default' 			=> array(
							'title'			=> 'Defult',
							'url' 			=> TF_ASSETS_ADMIN_URL."images/template/default-hotel.jpg",
						),
					),
					'default'   	=> function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
					'dependency'  => [
						array( 'tf_single_hotel_layout_opt', '==', 'single' )
					],
				),
			),
		),
		'location'         => array(
			'title'  => __( 'Location', 'bafg' ),
			'icon'   => 'fa-solid fa-location-dot',
			'fields' => array(
				array(
					'id'          => 'address',
					'type'        => 'textarea',
					'label'       => __( 'Hotel Address', 'bafg' ),
					'subtitle'    => __( 'The address you want to show below the Hotel Title', 'bafg' ),
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
					'subtitle' => __( 'Write your desired address and select the address from the suggestions. This address will be used to hyperlink the hotel address on the frontend.', 'bafg' ),
					'height'   => '250px',
					'settings' => array(
						'scrollWheelZoom' => true,
					),
				),
			),
		),
		// Hotel Details
		'hotel_details'    => array(
			'title'  => __( 'Gallery & Video', 'bafg' ),
			'icon'   => 'fa-solid fa-hotel',
			'fields' => array(
				array(
					'id'       => 'gallery',
					'type'     => 'gallery',
					'label'    => __( 'Hotel Gallery', 'bafg' ),
					'subtitle' => __( 'Upload one or many images to create a hotel image gallery for customers. This is common gallery visible at the top part of the hotel page', 'bafg' ),
				),
				array(
					'id'          => 'video',
					'type'        => 'text',
					'label'       => __( 'Hotel Video', 'bafg' ),
					'subtitle'    => __( 'Enter YouTube/Vimeo URL here', 'bafg' ),
					'placeholder' => __( 'Input full url here', 'bafg' ),
				),
			),
		),
		// Hotel Details
		'hotel_service'    => array(
			'title'  => __( 'Hotel Services', 'bafg' ),
			'icon'   => 'fa-solid fa-van-shuttle',
			'fields' => array(
				array(
					'id'      => 'hotel-service',
					'type'    => 'switch',
					'label'   => __( 'Airport Pickup Service', 'bafg' ),
					'default' => true,
					'is_pro'  => true,
				)
			),
		),
		// Room Details
		'room_details'     => array(
			'title'  => __( 'Room Management', 'bafg' ),
			'icon'   => 'fa-sharp fa-solid fa-door-open',
			'fields' => array(
				array(
					'id'    => 'room-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Available Rooms"
				),
				array(
					'id'           => 'room',
					'type'         => 'repeater',
					'label'        => __( 'Insert / Create your hotel rooms', 'bafg' ),
					'button_title' => __( 'Add New Room', 'bafg' ),
					'class'        => 'room-repeater',
					'max'          => 5,
					'fields'       => array(
						array(
							'id'          => 'unique_id',
							'class'       => 'unique-id',
							'type'        => 'text',
							'label'       => __( 'Unique ID', 'bafg' ),
							'attributes'  => array(
								'readonly' => 'readonly',
							),
							'placeholder' => __( '', 'bafg' ),
						),
						array(
							'id'          => 'order_id',
							'class'       => 'tf-order_id',
							'type'        => 'text',
							'label'       => __( 'Order ID', 'bafg' ),
							'attributes'  => array(
								'readonly' => 'readonly',
							),
							'placeholder' => __( '', 'bafg' ),
						),
						array(
							'id'        => 'enable',
							'type'      => 'switch',
							'label'     => __( 'Status', 'bafg' ),
							'subtitle'  => __( 'Enable/disable this Room', 'bafg' ),
							'label_on'  => __( 'Enabled', 'bafg' ),
							'label_off' => __( 'Disabled', 'bafg' ),
							'width'     => 100,
							'default'   => 1,
						),
						array(
							'id'          => 'title',
							'type'        => 'text',
							'subtitle'    => __( 'e.g. Superior Queen Room with Two Queen Beds', 'bafg' ),
							'label'       => __( 'Room Title', 'bafg' ),
							'field_width' => 100,
						),

						array(
							'id'      => 'Details',
							'type'    => 'heading',
							'content' => __( 'Details', 'bafg' ),
							'class'   => 'tf-field-class',
						),
						array(
							'id'      => 'room_preview_img',
							'type'    => 'image',
							'label'   => __( 'Room Thumbnail', 'bafg' ),
							'subtitle' => __( 'Upload Thumbnail for this room', 'bafg' ),
							'library' => 'image',
						),
						array(
							'id'       => 'gallery',
							'type'     => 'gallery',
							'label'    => __( 'Room Gallery', 'bafg' ),
							'subtitle' => __( 'Upload images specific to this room', 'bafg' ),
							'is_pro'   => true,
						),
						array(
							'id'          => 'bed',
							'type'        => 'number',
							'label'       => __( 'Number of Beds', 'bafg' ),
							'subtitle'    => __( 'Number of beds available in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 33.33,
						),
						array(
							'id'          => 'adult',
							'type'        => 'number',
							'label'       => __( 'Number of Adults', 'bafg' ),
							'subtitle'    => __( 'Max number of persons allowed in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 33.33,
						),
						array(
							'id'          => 'child',
							'type'        => 'number',
							'label'       => __( 'Number of Children', 'bafg' ),
							'subtitle'    => __( 'Max number of children allowed in the room', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 33.33,
						),
						array(
							'id'          => 'children_age_limit',
							'type'        => 'number',
							'is_pro'      => true,
							'label'       => __( 'Children age limit', 'bafg' ),
							'subtitle'    => __( 'Maximum age of a children', 'bafg' ),
							'description' => __( 'keep blank if don\'t want to add', 'bafg' ),
							'attributes'  => array(
								'min' => '0',
							),
							'field_width' => 33.33,
						),
						array(
							'id'          => 'footage',
							'type'        => 'text',
							'label'       => __( 'Room Footage', 'bafg' ),
							'subtitle'    => __( 'Room footage (in sft)', 'bafg' ),
							'field_width' => 50,
						),
						array(
							'id'          => 'features',
							'type'        => 'select2',
							'label'       => __( 'Select Features', 'bafg' ),
							'subtitle'    => __( 'e.g. Coffee Machine, Microwave Oven (Select as many as applicable). You need to create these features from the “Features” tab.', 'bafg' ),
							'placeholder' => __( 'Select', 'bafg' ),
							'multiple'    => true,
							'options'     => 'terms',
							'query_args'  => array(
								'taxonomy'   => 'hotel_feature',
								'hide_empty' => false,
							),
							'field_width' => 50,
						),
						array(
							'id'    => 'description',
							'type'  => 'editor',
							'label' => __( 'Room Description', 'bafg' ),
						),
						array(
							'id'      => 'minimum_maximum_stay_requirements',
							'type'    => 'heading',
							'content' => __( 'Stay Requirements', 'bafg' ),
							'class'   => 'tf-field-class',
						),
						array(
							'id'          => 'minimum_stay_requirement',
							'type'        => 'number',
							'label'       => __( 'Minimum Stay Requirement', 'bafg' ),
							'subtitle'    => __( 'Minimum number of nights required to book this room', 'bafg' ),
							'attributes'  => array(
								'min' => '1',
							),
							'default'     => '1',
							'field_width' => 50,
						),
						array(
							'id'          => 'maximum_stay_requirement',
							'type'        => 'number',
							'label'       => __( 'Maximum Stay Requirement', 'bafg' ),
							'subtitle'    => __( 'Maximum number of nights allowed to book this room', 'bafg' ),
							'field_width' => 50,
						),
						array(
							'id'      => 'Pricing',
							'type'    => 'heading',
							'content' => __( 'Pricing', 'bafg' ),
							'class'   => 'tf-field-class',
						),
						array(
							'id'      => 'pricing-by',
							'type'    => 'select',
							'label'   => __( 'Room Pricing Type', 'bafg' ),
							'options' => array(
								'1' => __( 'Per room', 'bafg' ),
								'2' => __( 'Per person (Pro)', 'bafg' ),
							),
							'default' => '1',
							'attributes'  => array(
								'class' => 'tf_room_pricing_by',
							),
						),
						array(
							'id'         => 'price',
							'type'       => 'text',
							'label'      => __( 'Insert Your Price', 'bafg' ),
							'subtitle'   => __( 'The price of room per one night', 'bafg' ),
							'dependency' => array( 'pricing-by', '==', '1' ),
						),
						array(
							'id'          => '',
							'type'        => 'text',
							'label'       => __( 'Price per Adult', 'bafg' ),
							'is_pro'      => true,
							'dependency'  => array( 'pricing-by', '==', '2' ),
							'field_width' => 50,
						),

						array(
							'id'          => '',
							'type'        => 'text',
							'label'       => __( 'Price per Children', 'bafg' ),
							'is_pro'      => true,
							'dependency'  => array( 'pricing-by', '==', '2' ),
							'field_width' => 50,
						),
						array(
							'id'       => 'discount_hotel_type',
							'type'     => 'select',
							'label'    => __( 'Discount Type', 'bafg' ),
							'subtitle' => __( 'Select Discount Type ( Percentage / Fixed )', 'bafg' ),
							'options'  => array(
								'none'    => __( 'None', 'bafg' ),
								'percent' => __( 'Percent', 'bafg' ),
								'fixed'   => __( 'Fixed', 'bafg' ),
							),
							'default'  => 'none',
						),
						array(
							'id'         => 'discount_hotel_price',
							'type'       => 'number',
							'label'      => __( 'Discount Price', 'bafg' ),
							'subtitle'   => __( 'Insert amount only', 'bafg' ),
							'attributes' => array(
								'min' => '0',
							),
							'dependency' => array(
								array( 'discount_hotel_type', '!=', 'none' ),
							),
						),
						array(
							'id'        => 'price_multi_day',
							'type'      => 'switch',
							'label'     => __( 'Multiply Pricing By Night', 'bafg' ),
							'subtitle'  => __( 'During booking, pricing will be multiplied by number of nights (Check-in to Check-out)', 'bafg' ),
							'label_on'  => __( 'Yes', 'bafg' ),
							'label_off' => __( 'No', 'bafg' ),
							'default'   => true,
						),
						array(
							'id'      => 'Booking-Type',
							'type'    => 'heading',
							'content' => __( 'Booking', 'bafg' ),
							'class'   => 'tf-field-class',
						),
						array(
							'id'      => 'booking-by',
							'type'    => 'select',
							'label'   => __( 'Booking Type', 'bafg' ),
							'options' => array(
								'1' => __( 'Internal', 'bafg' ),
								'2' => __( 'External', 'bafg' ),
							),
							'default' => '2',
							'is_pro'  => true,
						),
						array(
							'id'          => '',
							'type'        => 'text',
							'label'       => __( 'External URL', 'bafg' ),
							'placeholder' => __( 'https://website.com', 'bafg' ),
							'is_pro'  => true
						),
						array(
							'id'        => '',
							'type'      => 'switch',
							'label'     => __( 'Allow Attribute', 'bafg' ),
							'subtitle'  => __( 'If attribute allow, You can able to add custom Attribute', 'bafg' ),
							'label_on'  => __( 'Yes', 'bafg' ),
							'label_off' => __( 'No', 'bafg' ),
							'is_pro'  => true
						),
						array(
							'id'          => '',
							'type'        => 'textarea',
							'label'       => __( 'Query Attribute', 'bafg' ),
							'placeholder' => __( 'adult={adult}&child={child}&room={room}', 'bafg' ),
							'is_pro'  => true
						),
						array(
							'id'      => 'booking-notice',
							'type'    => 'notice',
							'class'   => 'info',
							'title'   => __( 'Query Attribute List', 'bafg' ),
							'content' => __( 'You can use the following placeholders in the Query Attribute body:', 'bafg' ) . '<br><br><strong>{adult} </strong> : To Display Adult Number from Search.<br>
							<strong>{child} </strong> : To Display Child Number from Search.<br>
							<strong>{checkin} </strong> : To display the Checkin date from Search.<br>
							<strong>{checkout} </strong> : To display the Checkout date from Search.<br>
							<strong>{room} </strong> : To display the room number from Search.<br>',
							'is_pro'  => true
						),
						array(
							'id'      => 'Deposit',
							'type'    => 'heading',
							'content' => __( 'Deposit', 'bafg' ),
							'class'   => 'tf-field-class',
						),
						array(
							'id'      => '',
							'type'    => 'switch',
							'label'   => __( 'Enable Deposit', 'bafg' ),
							'is_pro'  => true,
							'default' => false,
						),
						array(
							'id'      => 'ical',
							'type'    => 'heading',
							'content' => __( 'iCal Sync', 'bafg' ),
						),
						array(
							'id'          => '',
							'type'        => 'ical',
							'label'       => __( 'iCal URL', 'bafg' ),
							'placeholder' => __( 'https://website.com', 'bafg' ),
							'button_text' => __( 'Import', 'bafg' ),
							'button_class'   => 'room-ical-import',
							'attributes'  => array(
								'class' => 'ical_url_input',
							),
							'is_pro'      => true
						),
						array(
							'id'      => 'Availability',
							'type'    => 'heading',
							'content' => __( 'Availability', 'bafg' ),
							'class'   => 'tf-field-class',
						),
						array(
							'id'          => 'num-room',
							'type'        => 'number',
							'label'       => __( 'Room Availability', 'bafg' ),
							'subtitle'    => __( 'Number of rooms available for booking', 'bafg' ),
							'field_width' => 100,
							'attributes'  => array(
								'min' => '0',
							),
						),
						array(
							'id'        => '',
							'type'      => 'switch',
							'is_pro'    => true,
							'label'     => __( 'Room Inventory Management', 'bafg' ),
							'subtitle'  => __( 'Reduce total number of available rooms once a rooms is booked by a customer', 'bafg' ),
							'label_on'  => __( 'Yes', 'bafg' ),
							'label_off' => __( 'No', 'bafg' ),
							'default'   => false,
						),
						array(
							'id'      => '',
							'type'    => 'switch',
							'label'   => __( 'Enable Availability by Date', 'bafg' ),
							'is_pro'  => true,
							'default' => true,
							'attributes'  => array(
								'class' => 'tf_room_availability_by_date',
							),
						),
						array(
							'id'        => '',
							'type'      => 'hotelAvailabilityCal',
							'label'     => __( 'Availability Calendar', 'bafg' ),
							'is_pro'  => true,
							'dependency' => array( 'avil_by_date', '!=', 'false' ),
						),
					),
				)
			),
		),
		// FAQ Details
		'faq'              => array(
			'title'  => __( 'F.A.Q', 'bafg' ),
			'icon'   => 'fa-solid fa-clipboard-question',
			'fields' => array(
				array(
					'id'    => 'faq-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Faq’s"
				),
				array(
					'id'           => 'faq',
					'type'         => 'repeater',
					'label'        => __( 'Frequently Asked Questions', 'bafg' ),
					'button_title' => __( 'Add FAQ', 'bafg' ),
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
			),
		),
		// Terms & conditions
		'terms_conditions' => array(
			'title'  => __( 'Terms & Conditions', 'bafg' ),
			'icon'   => 'fa-regular fa-square-check',
			'fields' => array(
				array(
					'id'    => 'tc-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Hotel Terms & Conditions"
				),
				array(
					'id'    => 'tc',
					'type'  => 'editor',
					'label' => __( 'Hotel Terms & Conditions', 'bafg' ),
				),
			),
		),
		// Settings
		'settings'         => array(
			'title'  => __( 'Settings', 'bafg' ),
			'icon'   => 'fa-solid fa-viruses',
			'fields' => array(
				array(
					'id'    => 'settings',
					'type'  => 'heading',
					'label' => __( 'Settings', 'bafg' ),
					'class' => 'tf-field-class',
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
					'id'      => 'notice',
					'type'    => 'notice',
					'notice'  => 'info',
					'content' => __( 'These settings will overwrite global settings', 'bafg' ),
				),
				array(
					'id'      => 'popular-feature',
					'type'    => 'heading',
					'content' => __( 'Popular Features', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'    => 'popular-section-title',
					'type'  => 'text',
					'label' => __( 'Popular Features Section Title', 'bafg' ),
					'default' => "Popular Features"
				),
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
					'default' => "Average Guest Reviews"
				),
				array(
					'id'      => 'enquiry-section',
					'type'    => 'heading',
					'content' => __( 'Enquiry', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'        => 'h-enquiry-section',
					'type'      => 'switch',
					'label'     => __( 'Hotel Enquiry Option', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => true
				),
				array(
					'id'    => 'h-enquiry-option-title',
					'type'  => 'text',
					'label' => __( 'Hotel Enquiry Title Text', 'bafg' ),
					'default' => "Have a question in mind",
					'dependency' => array( 'h-enquiry-section', '==', '1' ),
				),
				array(
					'id'    => 'h-enquiry-option-content',
					'type'  => 'text',
					'label' => __( 'Hotel Enquiry Short Text', 'bafg' ),
					'default' => "Looking for more info? Send a question to the property to find out more.",
					'dependency' => array( 'h-enquiry-section', '==', '1' ),
				),
				array(
					'id'    => 'h-enquiry-option-btn',
					'type'  => 'text',
					'label' => __( 'Hotel Enquiry Button Text', 'bafg' ),
					'default' => "Ask a Question",
					'dependency' => array( 'h-enquiry-section', '==', '1' ),
				),
			),
		),
	),
) );
