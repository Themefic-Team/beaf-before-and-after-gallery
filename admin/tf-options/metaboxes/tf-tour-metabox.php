<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

/**
 * Get all the meals from glabal settings
 * @author AbuHena
 * @since 1.7.0
 */
function tf_tour_meals() {
	$itinerary_options = ! empty( tf_data_types( tfopt( 'itinerary-builder-setings' ) ) ) ? tf_data_types( tfopt( 'itinerary-builder-setings' ) ) : '';
	$all_meals         = [];
	if ( ! empty( $itinerary_options['meals'] ) && is_array( $itinerary_options['meals'] ) ) {
		$meals = $itinerary_options['meals'];
		foreach ( $meals as $key => $meal ) {
			$all_meals[ $meal['meal'] . $key ] = $meal['meal'];
		}
	}

	return $all_meals;
}

TF_Metabox::metabox( 'tf_tours_opt', array(
	'title'     => __( 'Tour Setting', 'bafg' ),
	'post_type' => 'tf_tours',
	'sections'  => array(
		// General
		'general'              => array(
			'title'  => __( 'General', 'bafg' ),
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'       => 'tour_as_featured',
					'type'     => 'switch',
					'label'    => __( 'Set as featured', 'bafg' ),
					'subtitle' => __( 'This tour will be highlighted at the top of the search result and tour archive page', 'bafg' ),
				),
				array(
					'id'          => 'featured_text',
					'type'        => 'text',
					'label'       => __( 'Tour Featured Text', 'bafg' ),
					'subtitle'    => __( 'Enter Featured Tour Text', 'bafg' ),
					'placeholder' => __( 'Enter Featured Tour Text', 'bafg' ),
					'default' => __( 'Hot Deal', 'bafg' ),
					'dependency'  => array( 'tour_as_featured', '==', true ),
				),
				array(
					'id'       => 'tf_single_tour_layout_opt',
					'type'     => 'select',
					'label'    => __( 'Tour Page Layout', 'bafg' ),
					'subtitle' => __( 'Select your Layout logic', 'bafg' ),
					'options'  => [
						'global' => __( 'Global Settings', 'bafg' ),
						'single' => __( 'Single Settings', 'bafg' ),
					],
					'default'  => 'global',
				),
				array(
					'id'       => 'tf_single_tour_template',
					'type'     => 'imageselect',
					'label'    => __( 'Single Tour Page Layout', 'bafg' ),
					'multiple' 		=> true,
					'inline'   		=> true,
					'options'   	=> array( 
						'design-1' 				=> array(
							'title'			=> 'Design 1',
							'url' 			=> TF_ASSETS_ADMIN_URL."images/template/design1-tour.jpg",
						),
						'default' 			=> array(
							'title'			=> 'Defult',
							'url' 			=> TF_ASSETS_ADMIN_URL."images/template/default-tour.jpg",
						),
					),
					'default'   	=> function_exists( 'bafg_template_settings' ) ? bafg_template_settings() : '',
					'dependency'  => [
						array( 'tf_single_tour_layout_opt', '==', 'single' )
					],
				),

				array(
					'id'    => 'tour_gallery',
					'type'  => 'gallery',
					'label' => __( 'Tour Gallery', 'bafg' ),
				),

				array(
					'id'     => 'tour_video',
					'type'   => 'text',
					'label'  => __( 'Tour Video', 'bafg' ),
				),
			),
		),
		// Location
		'location'             => array(
			'title'  => __( 'Location', 'bafg' ),
			'icon'   => 'fa-solid fa-location-dot',
			'fields' => array(
				array(
					'id'          => 'text_location',
					'type'        => 'textarea',
					'label'       => __( 'Tour Location', 'bafg' ),
					'subtitle'    => __( 'Manually enter your tour location', 'bafg' ),
					'placeholder' => __( 'e.g. 123 ABC Road, Toronto, Ontario 20100', 'bafg' ),
					'attributes'  => array(
						'required' => 'required',
					),
				),
				array(
					'id'       => 'location',
					'class'    => 'gmaps',
					'type'     => 'map',
					'label'    => __( 'Dynamic Location Search', 'bafg' ),
					'subtitle' => __( 'Location suggestions will be provided from Google or OpenStreetMap (Depending on your selection from the Settings Panel)', 'bafg' ),
					'height'   => '250px',
					'settings' => array(
						'scrollWheelZoom' => true,
					)
				),
			),
		),
		// Information
		'information'          => array(
			'title'  => __( 'Information', 'bafg' ),
			'icon'   => 'fa-solid fa-circle-info',
			'fields' => array(
				array(
					'id'          => 'duration',
					'type'        => 'text',
					'label'       => __( 'Tour Duration', 'bafg' ),
					'subtitle'    => __( 'E.g. 3', 'bafg' ),
					'field_width' => 33.33,
				),				
				array(
					'id'      => 'duration_time',
					'type'    => 'select',
					'label'   => __( 'Duration time', 'bafg' ),
					'subtitle'    => __( 'E.g. Days', 'bafg' ),
					'options' => array(
						'Day' => __( 'Days', 'bafg' ),
						'Hour' => __( 'Hours', 'bafg' ),
						'Minute' => __( 'Minutes', 'bafg' ),
					),
					'field_width' => 33.33,
				),
				array(
					'id'       => 'tour_types',
					'type'     => 'select2',
					'multiple' => true,
					'is_pro'   => true,
					'field_width' => 33.33,
					'label'    => __( 'Select Tour Types', 'bafg' ),
					'subtitle' => __( 'Select your tour types', 'bafg' ),
				),
				array(
					'id'          => 'night',
					'type'        => 'switch',
					'label'       => __( 'Night', 'bafg' ),
					'field_width' => '33.33',
				),
				
				array(
					'id'          => 'night_count',
					'type'        => 'number',
					'label'       => __( 'Total nights', 'bafg' ),
					'subtitle'    => __( 'E.g. 2', 'bafg' ),
					'field_width' => '33.33',
					'dependency'  => array(
						array( 'night', '==', 'true' ),
					),
				),
				array(
					'id'          => 'group_size',
					'type'        => 'text',
					'label'       => __( 'Group Size', 'bafg' ),
					'subtitle'    => __( 'E.g. 10 people', 'bafg' ),
					'field_width' => '33.33',
				),
				array(
					'id'          => 'language',
					'type'        => 'text',
					'label'       => __( 'Languages', 'bafg' ),
					'subtitle'    => __( 'Include multiple language seperated by comma (,)', 'bafg' ),
					'field_width' => '33.33',
				),
				array(
					'id'          => 'refund_des',
					'type'        => 'text',
					'label'       => __( 'Refund Text', 'bafg' ),
					'subtitle'    => __( 'Add, if you have any refund policy', 'bafg' ),
					'field_width' => '33.33',
				),
				array(
					'id'      => 'highlights-sections',
					'type'    => 'heading',
					'content' => __( 'Tour Highlights', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'    => 'highlights-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Highlights"
				),
				array(
					'id'       => 'additional_information',
					'type'     => 'editor',
					'label'    => __( 'Tour Highlights', 'bafg' ),
					'subtitle' => __( 'Enter a summary or full subtitle of your tour', 'bafg' ),
				),
				array(
					'id'      => 'hightlights_thumbnail',
					'type'    => 'image',
					'label'   => __( 'Tour Highlights Thumbnail', 'bafg' ),
					'library' => 'image',
				),
				array(
					'id'       => 'features',
					'type'     => 'select2',
					'multiple' => true,
					'is_pro'   => true,
					'label'    => __( 'Select features', 'bafg' ),
					'subtitle' => __( 'Select features that are available in this tour', 'bafg' ),
				),
			),
		),
		// Contact Info
		'contact_info'         => array(
			'title'  => __( 'Contact Info', 'bafg' ),
			'icon'   => 'fa-solid fa-address-book',
			'fields' => array(
				array(
					'id'    => 'contact-info-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Contact Information"
				),
				array(
					'id'          => 'email',
					'type'        => 'text',
					'label'       => __( 'Email address', 'bafg' ),
					'field_width' => '50',
				),
				array(
					'id'          => 'phone',
					'type'        => 'text',
					'label'       => __( 'Phone Number', 'bafg' ),
					'field_width' => '50',
				),
				array(
					'id'          => 'website',
					'type'        => 'text',
					'label'       => __( 'Website Url', 'bafg' ),
					'field_width' => '50',
				),
				array(
					'id'          => 'fax',
					'type'        => 'text',
					'label'       => __( 'Fax Number', 'bafg' ),
					'field_width' => '50',
				),
			),
		),
		// //  Tour Extra
		'tour_extra'           => array(
			'title'  => __( 'Tour Extra', 'bafg' ),
			'icon'   => 'fa-solid fa-route',
			'fields' => array(
				array(
					'id'     => 'tour-extra',
					'type'   => 'repeater',
					'label'  => __( 'Extra Services Available on Your Tour', 'bafg' ),
					'is_pro' => true,
					'fields' => array(
						array(
							'id'     => '',
							'type'   => 'text',
							'label'  => __( 'Title', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'     => '',
							'type'   => 'textarea',
							'label'  => __( 'Short subtitle', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'       => '',
							'type'     => 'select',
							'label'    => __( 'Pricing rule', 'bafg' ),
							'subtitle' => __( 'Select Your Pricing Logic', 'bafg' ),
							'class'    => 'pricing',
							'options'  => [
								'fixed'  => __( 'Fixed', 'bafg' ),
								'person' => __( 'Per Person', 'bafg' ),
							],
							'default'  => 'fixed',
							'is_pro' => true,
						),
						array(
							'id'         => '',
							'type'       => 'text',
							'label'      => __( 'Price', 'bafg' ),
							'is_pro'     => true,
							'attributes' => array(
								'min' => '0',
							),
						),
					),
				),
			),
		),

		// // Price
		'price'                => array(
			'title'  => __( 'Price Settings', 'bafg' ),
			'icon'   => 'fa-solid fa-money-check',
			'fields' => array(
				array(
					'id'       => 'pricing',
					'type'     => 'select',
					'label'    => __( 'Pricing rule', 'bafg' ),
					'subtitle' => __( 'Select your pricing logic', 'bafg' ),
					'class'    => 'pricing',
					'options'  => [
						'person' => __( 'Per Person', 'bafg' ),
						''       => __( 'Per Group (Pro)', 'bafg' ),
					],
					'default'  => 'person',
				),
				array(
					'id'          => 'adult_price',
					'type'        => 'number',
					'label'       => __( 'Price for Adult', 'bafg' ),
					'subtitle'    => __( 'Insert amount only', 'bafg' ),
					'dependency'  => [
						array( 'pricing', '==', 'person' ),
						[ 'disable_adult_price', '==', 'false' ]
					],
					'attributes'  => array(
						'min' => '0',
					),
					'field_width' => '33.33',
				),
				array(
					'id'          => 'child_price',
					'type'        => 'number',
					'dependency'  => [
						array( 'pricing', '==', 'person' ),
						[ 'disable_child_price', '==', 'false' ]
					],
					'label'       => __( 'Price for Child', 'bafg' ),
					'subtitle'    => __( 'Insert amount only', 'bafg' ),
					'attributes'  => array(
						'min' => '0',
					),
					'field_width' => '33.33',
				),
				array(
					'id'          => 'infant_price',
					'type'        => 'number',
					'dependency'  => [
						array( 'pricing', '==', 'person' ),
						[ 'disable_infant_price', '==', 'false' ],
						[ 'disable_adult_price', '==', 'false' ],
					],
					'label'       => __( 'Price for Infant', 'bafg' ),
					'subtitle'    => __( 'Insert amount only', 'bafg' ),
					'attributes'  => array(
						'min' => '0',
					),
					'field_width' => '33.33',
				),
				array(
					'id'         => '',
					'type'       => 'number',
					'dependency' => array( 'pricing', '==', 'group' ),
					'label'      => __( 'Price per Group', 'bafg' ),
					'subtitle'   => __( 'Insert amount only', 'bafg' ),
					'is_pro'     => true,
					'attributes' => array(
						'min' => '0',
					),
				),
				array(
					'id'       => 'discount_type',
					'type'     => 'select',
					'label'    => __( 'Discount Type', 'bafg' ),
					'subtitle' => __( 'Select discount type: Percentage or Fixed', 'bafg' ),
					'options'  => array(
						'none'    => __( 'None', 'bafg' ),
						'percent' => __( 'Percent', 'bafg' ),
						'fixed'   => __( 'Fixed', 'bafg' ),
					),
					'default'  => 'none',
				),
				array(
					'id'         => 'discount_price',
					'type'       => 'number',
					'label'      => __( 'Discount Price', 'bafg' ),
					'subtitle'   => __( 'Insert amount only', 'bafg' ),
					'attributes' => array(
						'min' => '0',
					),
					'dependency' => array(
						array( 'discount_type', '!=', 'none' ),
					),
				),
				array(
					'id'          => 'disable_adult_price',
					'type'        => 'switch',
					'label'       => __( 'Disable adult price', 'bafg' ),
					'field_width' => '33.33',
				),
				array(
					'id'          => 'disable_child_price',
					'type'        => 'switch',
					'label'       => __( 'Disable children price', 'bafg' ),
					'field_width' => '33.33',
				),
				array(
					'id'          => 'disable_infant_price',
					'type'        => 'switch',
					'label'       => __( 'Disable infant price', 'bafg' ),
					'field_width' => '33.33',
				),
				array(
					'id'      => 'price_deposit',
					'type'    => 'heading',
					'content' => __( 'Deposit', 'bafg' ),
				),

				array(
					'id'      => 'allow_deposit',
					'type'    => 'switch',
					'label'   => __( 'Enable Deposit', 'bafg' ),
					'is_pro'  => true,
					'default' => false,
				),
			),
		),

		// // Availability
		'availability'         => array(
			'title'  => __( 'Availability', 'bafg' ),
			'icon'   => 'fa-solid fa-clipboard',
			'fields' => array(
				array(
					'id'       => 'type',
					'type'     => 'select',
					'label'    => __( 'Tour Type', 'bafg' ),
					'subtitle' => __( 'Fixed: Tour will be available on a fixed date. Continous: Tour will be available every month within the mentioned range.', 'bafg' ),
					'class'    => 'tour-type',
					'options'  => [
						'continuous' => __( 'Continuous', 'bafg' ),
						'fixed'      => __( 'Fixed (Pro)', 'bafg' ),
					],
					'default'  => 'continuous',

				),
				array(
					'id'         => 'custom_avail',
					'type'       => 'switch',
					'label'      => __( 'Custom Availability', 'bafg' ),
					'is_pro'     => true,
					'dependency' => array( 'type', '==', 'continuous' ),
					'label_on'   => __( 'Yes', 'bafg' ),
					'label_off'  => __( 'No', 'bafg' ),
				),
				array(
					'id'         => 'cont_custom_date',
					'type'       => 'repeater',
					'label'      => __( 'Allowed Dates', 'bafg' ),
					'is_pro'     => true,
					'dependency' => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'true' ),
					),
					'fields'     => array(
						array(
							'id'         => '',
							'type'       => 'date',
							'label'      => __( 'Date Range', 'bafg' ),
							'is_pro'     => true,
							'format'     => 'Y/m/d',
							'range'      => true,
							'label_from' => 'Start Date',
							'label_to'   => 'End Date',
							'attributes' => array(
								'autocomplete' => 'off',
							),
						),
						array(
							'id'     => '',
							'type'   => 'number',
							'label'  => __( 'Min people', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'     => '',
							'type'   => 'number',
							'label'  => __( 'Maximum people', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'       => 'pricing',
							'type'     => 'select',
							'label'    => __( 'Pricing rule', 'bafg' ),
							'subtitle' => __( 'Select your pricing logic', 'bafg' ),
							'is_pro'   => true,
							'class'    => 'pricing',
							'options'  => [
								'person' => __( 'Per Person', 'bafg' ),
								'group'  => __( 'Per Group', 'bafg' ),
							],
							'default'  => 'person',
						),
						array(
							'id'         => '',
							'type'       => 'number',
							'label'      => __( 'Price for Adult', 'bafg' ),
							'subtitle'   => __( 'Insert amount only', 'bafg' ),
							'is_pro'     => true,
							'dependency' => array( 'pricing', '==', 'person' ),
							'attributes' => array(
								'min' => '0',
							),
						),
						array(
							'id'         => '',
							'type'       => 'number',
							'label'      => __( 'Price for Child', 'bafg' ),
							'subtitle'   => __( 'Insert amount only', 'bafg' ),
							'is_pro'     => true,
							'dependency' => array( 'pricing', '==', 'person' ),
							'attributes' => array(
								'min' => '0',
							),
						),
						array(
							'id'         => '',
							'type'       => 'number',
							'label'      => __( 'Price for Infant', 'bafg' ),
							'subtitle'   => __( 'Insert amount only', 'bafg' ),
							'is_pro'     => true,
							'dependency' => array( 'pricing', '==', 'person' ),
							'attributes' => array(
								'min' => '0',
							),
						),
						array(
							'id'         => '',
							'type'       => 'number',
							'dependency' => array( 'pricing', '==', 'group' ),
							'label'      => __( 'Group Price', 'bafg' ),
							'subtitle'   => __( 'Insert amount only', 'bafg' ),
							'is_pro'     => true,
							'attributes' => array(
								'min' => '0',
							),
						),
						array(
							'id'     => 'allowed_time',
							'type'   => 'repeater',
							'label'  => __( 'Allowed Time', 'bafg' ),
							'is_pro' => true,
							'fields' => array(

								array(
									'id'       => '',
									'type'     => 'date',
									'label'    => __( 'Time', 'bafg' ),
									'subtitle' => __( 'Select your Time', 'bafg' ),
									'is_pro'   => true,
									'settings' => array(
										'noCalendar' => true,
										'enableTime' => true,
										'dateFormat' => "h:i K"
									),
								),


							),
						),

					),
				),
				/**
				 * Custom: No
				 *
				 * Continuous Avaialbility
				 */
				array(
					'id'          => 'cont_min_people',
					'type'        => 'number',
					'label'       => __( 'Minimum Person', 'bafg' ),
					'subtitle'    => __( 'Minimum person needed to travel Per Booking', 'bafg' ),
					'dependency'  => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
					'field_width' => '50',
				),
				array(
					'id'          => 'cont_max_people',
					'type'        => 'number',
					'label'       => __( 'Maximum Person', 'bafg' ),
					'subtitle'    => __( 'Maximum person allowed to travel Per Booking', 'bafg' ),
					'dependency'  => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
					'field_width' => '50',
				),
				array(
					'id'          => 'cont_max_capacity',
					'type'        => 'number',
					'label'       => __( 'Maximum Capacity', 'bafg' ),
					'subtitle'    => __( 'Maximum Capacity allowed per day to travel this tour (Adult & Child)', 'bafg' ),
					'dependency'  => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
				),
				array(
					'id'           => 'allowed_time',
					'type'         => 'repeater',
					'label'        => __( 'Allowed Time', 'bafg' ),
					'button_title' => __( 'Add New Time', 'bafg' ),
					'is_pro'       => true,
					'dependency'   => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
					'fields'       => array(
						array(
							'id'       => '',
							'type'     => 'datetime',
							'title'    => __( 'Time', 'bafg' ),
							'subtitle' => __( 'Select your Time', 'bafg' ),
							'is_pro'   => true,
							'settings' => array(
								'noCalendar' => true,
								'enableTime' => true,
								'dateFormat' => "h:i K"
							),
						),
					),
				),
				array(
					'id'         => 'Disabled_Dates',
					'type'       => 'heading',
					'content'    => __( 'Disabled Dates', 'bafg' ),
					'dependency' => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
				),
				array(
					'id'         => '',
					'type'       => 'checkbox',
					'label'      => __( 'Select day to disable', 'bafg' ),
					'is_pro'     => true,
					'dependency' => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
					'inline'     => true,
					'options'    => array(
						'0' => __( 'Sunday', 'bafg' ),
						'1' => __( 'Monday', 'bafg' ),
						'2' => __( 'Tuesday', 'bafg' ),
						'3' => __( 'Wednesday', 'bafg' ),
						'4' => __( 'Thursday', 'bafg' ),
						'5' => __( 'Friday', 'bafg' ),
						'6' => __( 'Saturday', 'bafg' ),
					),
				),
				array(
					'id'           => 'disable_range',
					'type'         => 'repeater',
					'label'        => __( 'Disabled Date Range', 'bafg' ),
					'button_title' => __( 'Add New Date', 'bafg' ),
					'max'          => 2,
					'dependency'   => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
					'fields'       => array(

						array(
							'id'         => 'date',
							'type'       => 'date',
							'label'      => __( 'Select date range', 'bafg' ),
							'format'     => 'Y/m/d',
							'range'      => true,
							'label_from' => 'Start Date',
							'label_to'   => 'End Date',
							'multiple'   => true,
							'attributes' => array(
								'autocomplete' => 'off',
							),
						),

					),
				),
				array(
					'id'         => '',
					'type'       => 'date',
					'label'      => __( 'Disable Specific Dates', 'bafg' ),
					'is_pro'     => true,
					'dependency' => array(
						array( 'type', '==', 'continuous' ),
						array( 'custom_avail', '==', 'false' ),
					),
					'format'     => 'Y/m/d',
					'label_from' => 'Start Date',
					'label_to'   => 'End Date',
					'multiple'   => true,
					'attributes' => array(
						'autocomplete' => 'off',
					),
				),
				/**
				 * Fixed Availability
				 */
				array(
					'id'         => 'fixed_availability',
					'type'       => 'tab',
					'label'      => __( 'Availability', 'bafg' ),
					'dependency' => array(
						array( 'type', '==', 'fixed' ),
					),
					'is_pro'     => true,
					'class'      => 'fixed_availability',
					'tabs'       => array(
						array(
							'id'     => 'tab-1',
							'title'  => 'Availability',
							'icon'   => 'fa fa-heart',
							'fields' => array(
								array(
									'id'         => '',
									'type'       => 'date',
									'label'      => __( 'Check In', 'bafg' ),
									'subtitle'   => __( 'Select check in date', 'bafg' ),
									'is_pro'     => true,
									'format'     => 'Y/m/d',
									'range'      => true,
									'label_from' => 'Start Date',
									'label_to'   => 'End Date',
									'attributes' => array(
										'autocomplete' => 'off',
									),
									'from_to'    => true,
								),
								array(
									'id'       => '',
									'type'     => 'number',
									'label'    => __( 'Minimum People', 'bafg' ),
									'is_pro'   => true,
									'subtitle' => __( 'Minimum person needed to travel Per Booking', 'bafg' ),
								),
								array(
									'id'       => '',
									'type'     => 'number',
									'label'    => __( 'Maximum People', 'bafg' ),
									'is_pro'   => true,
									'subtitle' => __( 'Maximum person allowed to travel Per Booking', 'bafg' ),
								),
								array(
									'id'          => '',
									'type'        => 'number',
									'label'       => __( 'Maximum Capacity', 'bafg' ),
									'subtitle'    => __( 'Maximum Capacity allowed to travel this tour (Adult & Child)', 'bafg' ),
									'is_pro'   => true,
								),
							),
						),

					),
				)

			),
		),

		// // Booking
		'booking'              => array(
			'title'  => __( 'Booking', 'bafg' ),
			'icon'   => 'fa-solid fa-person-walking-luggage',
			'fields' => array(
				array(
					'id'       => '',
					'type'     => 'number',
					'label'    => __( 'Minimum days to book before departure', 'bafg' ),
					'is_pro'   => true,
					'subtitle' => __( 'Customer can not book after this date', 'bafg' ),
				),
				array(
					'id'        => 'disable_same_day',
					'type'      => 'switch',
					'label'     => __( 'Are You Want Disable Same Day Booking?', 'bafg' ),
					'subtitle'  => __( 'If you enable this option, then the tour can not booking same day.', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
				),
				array(
					'id'      => 'Booking-Type',
					'type'    => 'heading',
					'content' => __( 'Booking', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'        => '',
					'type'      => 'switch',
					'label'     => __( 'Enable Traveler Info', 'bafg' ),
					'subtitle'  => __( 'Enable this option, if you want to add traveler info.', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => true,
					'is_pro'  => true,
				),
				array(
					'id'      => '',
					'type'    => 'select',
					'label'   => __( 'Booking Type', 'bafg' ),
					'options' => array(
						'1' => __( 'Internal', 'bafg' ),
						'2' => __( 'External + Without Payment', 'bafg' ),
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
					'placeholder' => __( 'adult={adult}&child={child}&infant={infant}', 'bafg' ),
					'is_pro'  => true
				),
				array(
					'id'      => 'booking-notice',
					'type'    => 'notice',
					'class'   => 'info',
					'title'   => __( 'Query Attribute List', 'bafg' ),
					'content' => __( 'You can use the following placeholders in the Query Attribute body:', 'bafg' ) . '<br><br><strong>{adult} </strong> : To Display Adult Number from Search.<br>
					<strong>{child} </strong> : To Display Child Number from Search.<br>
					<strong>{booking_date} </strong> : To display the Booking date from Search.<br>
					<strong>{infant} </strong> : To display the infant number from Search.<br>',
					'is_pro'  => true
				),
			),
		),
		// // Exclude/Include
		'exclude_Include'      => array(
			'title'  => __( 'Exclude/Include', 'bafg' ),
			'icon'   => 'fa-solid fa-square-check',
			'fields' => array(
				array(
					'id'           => 'inc',
					'type'         => 'repeater',
					'label'        => __( 'Items/Features Included in this tour', 'bafg' ),
					'button_title' => __( 'Add New Include', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'inc',
							'type'  => 'text',
							'label' => __( 'Insert your item', 'bafg' ),
						),
					),
				),
				array(
					'id'       => 'inc_icon',
					'type'     => 'icon',
					'label'    => __( 'Included item icon', 'bafg' ),
					'subtitle' => __( 'Choose icon', 'bafg' ),
				),
				array(
					'id'           => 'exc',
					'type'         => 'repeater',
					'label'        => __( 'Items/Features Excluded in this tour', 'bafg' ),
					'button_title' => __( 'Add New Exclude', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'exc',
							'type'  => 'text',
							'label' => __( 'Insert your item', 'bafg' ),
						),
					),
				),
				array(
					'id'       => 'exc_icon',
					'type'     => 'icon',
					'label'    => __( 'Excluded item icon', 'bafg' ),
					'subtitle' => __( 'Choose icon', 'bafg' ),
				),
				array(
					'id'      => 'include-exclude-bg',
					'type'    => 'image',
					'label'   => __( 'Background Image', 'bafg' ),
					'library' => 'image',
				),
			),
		),

		// // Itinerary
		'itinerary'            => array(
			'title'  => __( 'Itinerary Builder', 'bafg' ),
			'icon'   => 'fa-solid fa-clipboard-list',
			'fields' => array(
				array(
					'id'    => 'itinerary-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Travel Itinerary"
				),
				array(
					'id'           => 'itinerary',
					'type'         => 'repeater',
					'label'        => __( 'Create your Travel Itinerary', 'bafg' ),
					'button_title' => __( 'Add New Itinerary', 'bafg' ),
					'fields'       => array(
						array(
							'id'          => 'time',
							'type'        => 'text',
							'label'       => __( 'Time or Day', 'bafg' ),
							'subtitle'    => __( 'e.g. Day 1 or 9:00 am', 'bafg' ),
							'field_width' => '50',
						),
						array(
							'id'          => 'title',
							'type'        => 'text',
							'label'       => __( 'Title', 'bafg' ),
							'subtitle'    => __( 'Input the title here', 'bafg' ),
							'field_width' => '50',
						),
						array(
							'id'          => 'duration',
							'label'       => __( 'Duration', 'bafg' ),
							'type'        => 'text',
							'placeholder' => 'Duration',
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'          => 'timetype',
							'label'       => __( 'Duration Type', 'bafg' ),
							'type'        => 'select',
							'options'     => [
								'Hour'   => __( 'Hour', 'bafg' ),
								'Minute' => __( 'Minute', 'bafg' ),
							],
							'default'     => 'Hour',
							'field_width' => 50,
							'is_pro'      => true,
						),
						array(
							'id'           => 'image',
							'type'         => 'image',
							'label'        => __( 'Upload Image', 'bafg' ),
							'library'      => 'image',
							'placeholder'  => 'http://',
							'button_title' => __( 'Add Image', 'bafg' ),
							'remove_title' => __( 'Remove Image', 'bafg' ),
						),
						array(
							'id'    => 'desc',
							'type'  => 'editor',
							'label' => __( 'Description', 'bafg' ),
						),
						array(
							'id'     => 'gallery_image',
							'type'   => 'gallery',
							'label'  => __( 'Gallery Image', 'bafg' ),
							'is_pro' => true,
						),
						array(
							'id'           => 'itinerary-sleep-mode',
							'type'         => 'repeater',
							'button_title' => __( 'Add New Option', 'bafg' ),
							'label'        => __( 'Custom Itinerary options', 'bafg' ),
							'subtitle'     => __( 'You can create these options from Tourfic Settings', 'bafg' ),
							'is_pro'       => true,
							'fields'       => array(
								array(
									'id'               => 'sleepmode',
									'type'             => 'select',
									'is_pro'           => true,
									'options_callback' => 'sleep_mode_option_callback'
								),
								array(
									'id'            => 'sleep',
									'type'          => 'editor',
									'is_pro'        => true,
									'label'         => __( 'Description', 'bafg' ),
									'media_buttons' => false,
								)
							),
						),
						array(
							'id'               => 'meals',
							'type'             => 'checkbox',
							'label'            => __( 'Meals Included', 'bafg' ),
							'inline'           => true,
							'options_callback' => 'tf_tour_meals',
							'is_pro'           => true,
						),
						array(
							'id'          => 'loacation',
							'label'       => __( 'Location', 'bafg' ),
							'type'        => 'text',
							'class'       => 'ininenary-group',
							'placeholder' => 'Location',
							'field_width' => 33,
							'is_pro'      => true,
						),
						array(
							'id'          => 'altitude',
							'label'       => __( 'Altitude', 'bafg' ),
							'type'        => 'text',
							'placeholder' => 'Altitude',
							'class'       => 'ininenary-group',
							'field_width' => 33,
							'is_pro'      => true,
						),
						array(
							'id'               => 'valuetype',
							'label'            => __( 'Elevation Input', 'bafg' ),
							'type'             => 'select',
							'class'            => 'ininenary-group',
							'options_callback' => 'elevation_option_callback',
							'field_width'      => 33,
							'is_pro'           => true,
						),
					),
				),

				array(
					'id'      => 'itinerary-downloader-settings',
					'type'    => 'heading',
					'content' => __( 'Itinerary Downloader Settings', 'bafg' ),
				),
				array(
					'id'      => 'itenary_download_glbal_settings',
					'label'   => __( 'Itenary Downolad Settings', 'bafg' ),
					'type'    => 'select',
					'options' => [
						'global' => __( 'Global Setting', 'bafg' ),
						'custom'  => __( 'Custom Setting', 'bafg' ),
					],
					'default' => 'custom',
					'is_pro'   => true,
				),
				array(
					'id'       => 'itinerary-downloader',
					'type'     => 'switch',
					'label'    => __( 'Enable Itinerary Downloader', 'bafg' ),
					'subtitle' => __( 'Enabling this will allow customers to download the itinerary plan in PDF format.', 'bafg' ),
					'dependency'  => array(
						array( 'itenary_download_glbal_settings', '==', 'custom' ),
					),
					'is_pro'   => true,
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
					'is_pro'   => true,
				),
				array(
					'id'    => '',
					'type'  => 'text',
					'label' => __( 'Tour Downloader Sort Text', 'bafg' ),
					'default' => "Download this tour's PDF brochure and start your planning offline.",
					'is_pro'   => true,
				),
				array(
					'id'    => '',
					'type'  => 'text',
					'label' => __( 'Tour Downloader Button Text', 'bafg' ),
					'default' => "Download Now",
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
					'label'  => __( 'Company Logo', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'     => '',
					'type'   => 'textarea',
					'label'  => __( 'Short Company Description', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Company Email Address', 'bafg' ),
					'field_width' => 33.33,
					'is_pro'      => true,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Company Address', 'bafg' ),
					'field_width' => 33.33,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Company Phone', 'bafg' ),
					'field_width' => 33.33,
					'is_pro'      => true,
				),
				array(
					'id'    => 'export_heading',
					'type'  => 'heading',
					'label' => __( 'Talk to Expert', 'bafg' ),
				),
				array(
					'id'      => '',
					'type'    => 'switch',
					'label'   => __( 'Enable Talk To Expert - Section in PDF', 'bafg' ),
					'default' => true,
					'is_pro'  => true,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Talk to Expert - Label', 'bafg' ),
					'field_width' => 25,
					'is_pro'      => true,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Expert Name', 'bafg' ),
					'field_width' => 25,
					'is_pro'      => true,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Expert Email Address', 'bafg' ),
					'field_width' => 25,
					'is_pro'      => true,
				),
				array(
					'id'          => '',
					'type'        => 'text',
					'label'       => __( 'Expert Phone Address', 'bafg' ),
					'field_width' => 25,
					'is_pro'      => true,
				),
				array(
					'id'     => '',
					'type'   => 'image',
					'label'  => __( 'Expert Avatar Image', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'     => '',
					'type'   => 'switch',
					'label'  => __( 'Viber Contact Available', 'bafg' ),
					'is_pro' => true,
				),
				array(
					'id'     => '',
					'type'   => 'switch',
					'label'  => __( 'WhatsApp Contact Available', 'bafg' ),
					'is_pro' => true,
				),
			),
		),

		// FAQs
		'faqs'                 => array(
			'title'  => __( 'FAQs', 'bafg' ),
			'icon'   => 'fa-solid fa-clipboard-question',
			'fields' => array(
				array(
					'id'    => 'faq-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Frequently Asked Questions"
				),
				array(
					'id'           => 'faqs',
					'type'         => 'repeater',
					'label'        => __( 'FAQs', 'bafg' ),
					'button_title' => __( 'Add New Faq', 'bafg' ),
					'fields'       => array(
						array(
							'id'    => 'title',
							'type'  => 'text',
							'label' => __( 'FAQ Title', 'bafg' ),
						),
						array(
							'id'    => 'desc',
							'type'  => 'editor',
							'label' => __( 'FAQ Subtitle', 'bafg' ),
						),
					),
				),
			),
		),


		// // Terms & Conditions
		'terms_and_conditions' => array(
			'title'  => __( 'Terms & Conditions', 'bafg' ),
			'icon'   => 'fa-regular fa-square-check',
			'fields' => array(
				array(
					'id'    => 'tc-section-title',
					'type'  => 'text',
					'label' => __( 'Section Title', 'bafg' ),
					'default' => "Tour Terms & Conditions"
				),
				array(
					'id'    => 'terms_conditions',
					'type'  => 'editor',
					'label' => __( 'Terms & Conditions of this tour', 'bafg' ),
				),
			),
		),


		// // Settings
		'settings'             => array(
			'title'  => __( 'Settings', 'bafg' ),
			'icon'   => 'fa-solid fa-viruses',
			'fields' => array(
				array(
					'id'    => 'settings_headding',
					'type'  => 'heading',
					'label' => __( 'Settings', 'bafg' ),
				),
				array(
					'id'        => 't-review',
					'type'      => 'switch',
					'label'     => __( 'Disable Review Section', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => false
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
					'default'   => false
				),

				array(
					'id'      => 'notice',
					'type'    => 'notice',
					'notice'  => 'info',
					'content' => __( 'These settings will overwrite global settings', 'bafg' ),
				),

				array(
					'id'      => 'tour-booking-section',
					'type'    => 'heading',
					'content' => __( 'Booking Section', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'    => 'booking-section-title',
					'type'  => 'text',
					'label' => __( 'Booking Section Title', 'bafg' ),
					'default' => "Book This Tour"
				),
				array(
					'id'      => 'tour-description-section',
					'type'    => 'heading',
					'content' => __( 'Description', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'    => 'description-section-title',
					'type'  => 'text',
					'label' => __( 'Description Section Title', 'bafg' ),
					'default' => "Description"
				),
				array(
					'id'      => 'popular-map',
					'type'    => 'heading',
					'content' => __( 'Map', 'bafg' ),
					'class'   => 'tf-field-class',
				),
				array(
					'id'    => 'map-section-title',
					'type'  => 'text',
					'label' => __( 'Map Section Title', 'bafg' ),
					'default' => "Maps"
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
					'id'        => 't-enquiry-section',
					'type'      => 'switch',
					'label'     => __( 'Tour Enquiry Option', 'bafg' ),
					'label_on'  => __( 'Yes', 'bafg' ),
					'label_off' => __( 'No', 'bafg' ),
					'default'   => true
				),
				array(
					'id'    => 't-enquiry-option-title',
					'type'  => 'text',
					'label' => __( 'Tour Enquiry Title Text', 'bafg' ),
					'default' => "Have a question in mind",
					'dependency' => array( 't-enquiry-section', '==', '1' ),
				),
				array(
					'id'    => 't-enquiry-option-content',
					'type'  => 'text',
					'label' => __( 'Tour Enquiry Short Text', 'bafg' ),
					'default' => "Looking for more info? Send a question to the property to find out more.",
					'dependency' => array( 't-enquiry-section', '==', '1' ),
				),
				array(
					'id'    => 't-enquiry-option-btn',
					'type'  => 'text',
					'label' => __( 'Tour Enquiry Button Text', 'bafg' ),
					'default' => "Ask a Question",
					'dependency' => array( 't-enquiry-section', '==', '1' ),
				),
			),
		),
	),
) );
