<?php
// don't load directly

use Automattic\WooCommerce\Utilities\ArrayUtil;

defined( 'ABSPATH' ) || exit;
$post = get_the_ID();
BEAF_Metabox::metabox( 'beaf_meta', array(
	'title' => __( 'Before After Slider Options', 'beaf-before-and-after-gallery' ),
	'post_type' => 'bafg',
	'sections' => array(
		'content' => array(
			'title' => __( 'Content', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa fa-cog',
			'fields' => array(
				apply_filters( 'beaf_before_after_method',
					array(
						'id' => 'bafg_before_after_method',
						'type' => 'radio',
						'label' => __( 'Before After Method', 'beaf-before-and-after-gallery' ),
						'title' => __( 'Before After Method', 'beaf-before-and-after-gallery' ),
						'subtitle' => __( 'Choose a method to make a before after slider using a single image, 2 images, 3 images, and Videos.', 'beaf-before-and-after-gallery' ),
						'options' => array(
							'method_1' => __( 'Method 1 (Using 2 images)', 'beaf-before-and-after-gallery' ),
							'method_2' => array(
								'label' => sprintf(
									/* translators: %1$s, %2$s is replaced with "tooltip " */
									esc_html__( 'Method 2 (Using 1 image ) %1$s', 'beaf-before-and-after-gallery' ),
									'<div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">Pro feature!</div></div>',
								),
								'is_pro' => true
							),
							'method_3' => array(
								'label' => sprintf(
									/* translators: %1$s, %2$s is replaced with "tooltip & link" */
									esc_html__( 'Method 3 (Using 3 images ) %1$s Pro feature! 3 image slider addon required to activate this. %2$s', 'beaf-before-and-after-gallery' ),
									'<div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">',
									'<a href="' . esc_url( 'https://themefic.com/wp-content/uploads/2023/07/3-image-slider-addon.png' ) . '" target="_blank"> More info</a></div></div>',
								),
								'is_pro' => true
							),
							'method_4' => array(
								'label' => sprintf(
									/* translators: %1$s, %2$s is replaced with "tooltip & link" */
									esc_html__( 'Method 4 (Using Video) %1$s Pro feature! Video slider addon required to activate this. %2$s', 'beaf-before-and-after-gallery' ),
									'<div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">',
									'<a href="' . esc_url( 'https://themefic.com/wp-content/uploads/2023/07/3-image-slider-addon.png' ) . '" target="_blank"> More info</a></div></div>',
								),
								'is_pro' => true
							),
						),

						'default' => 'method_1',
					), $post ),

				apply_filters( 'bafg_watermark_enable_field_meta', array(
					'id' => '',
					'type' => 'switch',
					'label' => __( 'Enable Watermark', 'beaf-before-and-after-gallery' ),
					'title' => __( 'Enable Watermark', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Enable or Disable watermark for this individual slider (Page will reload to save data)', 'beaf-before-and-after-gallery' ),
					'class' => 'watermark-in-free-version',
					'dependency' => array( 'bafg_before_after_method', '!=', 'method_4' ),
					'is_pro' => true,
					'default' => true
				), $post ),
				array(
					'id' => 'heading_before_after',
					'type' => 'heading',
					'label' => __( 'Before After Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_2' ),
				),
				apply_filters( 'bafg_before_after_image', array(
					'id' => '',
					'type' => 'image',
					'label' => __( 'Before After Image', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Upload before and after image for the slider', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_2' ),
					'is_pro' => true
				), $post ),
				array(
					'id' => 'heading_before_image',
					'type' => 'heading',
					'label' => __( 'Before Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
				),
				array(
					'id' => 'bafg_before_image',
					'type' => 'image',
					'label' => __( 'Before Image', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Upload before image for the slider', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
				),
				array(
					'id' => 'before_img_alt',
					'type' => 'text',
					'label' => __( 'Before Image Alter text', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
				),
				apply_filters( 'bafg_before_image_link',
					array(
						'id' => '',
						'type' => 'text',
						'label' => __( 'Before Image link', 'beaf-before-and-after-gallery' ),
						'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
						'is_pro' => true
					), $post
				),
				array(
					'id' => 'heading_after_image',
					'type' => 'heading',
					'label' => __( 'After Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
				),
				array(
					'id' => 'bafg_after_image',
					'type' => 'image',
					'label' => __( 'After Image', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Upload after image for the slider', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
				),
				array(
					'id' => 'after_img_alt',
					'type' => 'text',
					'label' => __( 'After Image Alter text', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
				),
				apply_filters( 'bafg_after_image_link',
					array(
						'id' => '',
						'type' => 'text',
						'label' => __( 'After Image link', 'beaf-before-and-after-gallery' ),
						'dependency' => array( 'bafg_before_after_method', '==', 'method_1' ),
						'is_pro' => true
					), $post
				),
				array(
					'id' => 'heading_three_image',
					'type' => 'heading',
					'label' => __( 'Three Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
				),
				apply_filters( 'bafg_first_image', array(
					'id' => '',
					'type' => 'image',
					'label' => __( 'First Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_first_img_alt', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'First Image Alter text', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_second_image', array(
					'id' => '',
					'type' => 'image',
					'label' => __( 'Second Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_second_img_alt', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Second Image Alter text', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_third_image', array(
					'id' => '',
					'type' => 'image',
					'label' => __( 'Third Image', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_third_img_alt', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Third Image Alter text', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_3' ),
					'is_pro' => true
				), $post ),
				array(
					'id' => 'heading_video',
					'type' => 'heading',
					'label' => __( 'Video Slider Option', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_4' ),
				),
				apply_filters( 'bafg_slider_video_type', array(
					'id' => '',
					'type' => 'select',
					'label' => __( 'Slider Video Type', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'youtube' => __( 'Youtube', 'beaf-before-and-after-gallery' ),
						'vimeo' => __( 'Vimeo', 'beaf-before-and-after-gallery' ),
						'self' => __( 'Self Hosted', 'beaf-before-and-after-gallery' ),
					),
					'is_pro' => true,
					'dependency' => array( 'bafg_before_after_method', '==', 'method_4' ),
				), $post ),

				apply_filters( 'bafg_video_width', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Video Width', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 50,
					'dependency' => array( 'bafg_before_after_method', '==', 'method_4' ),
				), $post ),

				apply_filters( 'bafg_video_height', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Video Height', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 50,
					'dependency' => array( 'bafg_before_after_method', '==', 'method_4' ),
				), $post ),

				apply_filters( 'bafg_before_video', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Before Video', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'Before Video URL', 'beaf-before-and-after-gallery' ),
					'subtitle' => '<small>' . esc_html( __( 'Use video url eg. ', 'beaf-before-and-after-gallery' ) ) . '<code>' . esc_url( 'https://www.youtube.com/watch?v=aR8vA8BY0oA' ) . '</code></small>',
					'dependency' => array(
						array( 'bafg_slider_video_type', '==', 'youtube' ),
						array( 'bafg_before_after_method', '==', 'method_4' ),
					),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_after_video', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'After Video', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'After Video URL', 'beaf-before-and-after-gallery' ),
					'subtitle' => '<small>' . esc_html( __( 'Use video url eg. ', 'beaf-before-and-after-gallery' ) ) . '<code>' . esc_url( 'https://www.youtube.com/watch?v=aR8vA8BY0oA' ) . '</code></small>',
					'dependency' => array(
						array( 'bafg_slider_video_type', '==', 'youtube' ),
						array( 'bafg_before_after_method', '==', 'method_4' ),
					),
					'is_pro' => true
				), $post ),

				apply_filters( 'bafg_before_vimeo_video', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Before Vimeo Video', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'Before Vimeo Video URL', 'beaf-before-and-after-gallery' ),
					'subtitle' => '<small>' . esc_html( __( 'Use video url eg. ', 'beaf-before-and-after-gallery' ) ) . '<code>' . esc_url( 'https://vimeo.com/186470604' ) . '</code></small>',
					'dependency' => array(
						array( 'bafg_slider_video_type', '==', 'vimeo' ),
						array( 'bafg_before_after_method', '==', 'method_4' ),
					),
					'is_pro' => true
				) ),

				apply_filters( 'bafg_after_vimeo_video', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'After Vimeo Video', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'After Vimeo Video URL', 'beaf-before-and-after-gallery' ),
					'subtitle' => '<small>' . esc_html( __( 'Use video url eg. ', 'beaf-before-and-after-gallery' ) ) . '<code>' . esc_url( 'https://vimeo.com/294247197' ) . '</code></small>',
					'dependency' => array(
						array( 'bafg_slider_video_type', '==', 'vimeo' ),
						array( 'bafg_before_after_method', '==', 'method_4' ),
					),
					'is_pro' => true
				) ),

				apply_filters( 'bafg_before_self_video', array(
					'id' => '',
					'type' => 'video',
					'label' => __( 'Before Self Hosted Video', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'Before Self Hosted Video URL', 'beaf-before-and-after-gallery' ),
					'subtitle' => '<small>' . esc_html( __( 'HTML5 video player supports only ', 'beaf-before-and-after-gallery' ) ) . '<code>' . esc_html( __( 'MP4, WebM, and Ogg', 'beaf-before-and-after-gallery' ) ) . '</code> ' . esc_html( __( 'formats.', 'beaf-before-and-after-gallery' ) ) . '</small>',
					// 'dependency' => array( 'bafg_slider_video_type', '==', 'self' ),
					'dependency' => array(
						array( 'bafg_before_after_method', '==', 'method_4' ),
						array( 'bafg_slider_video_type', '==', 'self' ),
					),
					'is_pro' => true
				) ),

				apply_filters( 'bafg_after_self_video', array(
					'id' => '',
					'type' => 'video',
					'label' => __( 'After Self Hosted Video', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'After Self Hosted Video URL', 'beaf-before-and-after-gallery' ),
					'subtitle' => '<small>' . esc_html( __( 'HTML5 video player supports only ', 'beaf-before-and-after-gallery' ) ) . '<code>' . esc_html( __( 'MP4, WebM, and Ogg', 'beaf-before-and-after-gallery' ) ) . '</code> ' . esc_html( __( 'formats.', 'beaf-before-and-after-gallery' ) ) . '</small>',
					'dependency' => array(
						array( 'bafg_slider_video_type', '==', 'self' ),
						array( 'bafg_before_after_method', '==', 'method_4' ),
					),
					'is_pro' => true
				) ),
				array(
					'id' => 'heading_information',
					'type' => 'heading',
					'label' => __( 'Slider Information', 'beaf-before-and-after-gallery' ),
				),
				array(
					'id' => 'bafg_slider_title',
					'type' => 'text',
					'label' => __( 'Slider Title', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'Optional', 'beaf-before-and-after-gallery' ),
				),
				array(
					'id' => 'bafg_slider_description',
					'type' => 'textarea',
					'label' => __( 'Slider Description', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'Optional', 'beaf-before-and-after-gallery' ),
				),
				array(
					'id' => 'bafg_readmore_link',
					'type' => 'text',
					'label' => __( 'Read More Link', 'beaf-before-and-after-gallery' ),
					'placeholder' => __( 'https://example.com', 'beaf-before-and-after-gallery' ),
				),
				array(
					'id' => 'bafg_readmore_link_target',
					'type' => 'select',
					'label' => __( 'Read More Link Target', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'' => __( 'Same Page', 'beaf-before-and-after-gallery' ),
						'new_tab' => __( 'New Tab', 'beaf-before-and-after-gallery' ),
					),
				),
				apply_filters( 'bafg_readmore_text',
					array(
						'id' => 'bafg_readmore_text',
						'type' => 'text',
						'label' => __( 'Read More Text', 'beaf-before-and-after-gallery' ),
						'placeholder' => __( 'Optional', 'beaf-before-and-after-gallery' ),
						'is_pro' => true
					), $post
				),

				apply_filters( 'bafg_filter_style', array(
					'id' => '',
					'type' => 'radio',
					'label' => __( 'Select Filter Effect', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Select a filtering effect to use on the before or after image.', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'none' => __( 'None', 'beaf-before-and-after-gallery' ),
						'grayscale' => __( 'Grayscale', 'beaf-before-and-after-gallery' ),
						'blur' => __( 'Blur', 'beaf-before-and-after-gallery' ),
						'sepia' => __( 'Sepia', 'beaf-before-and-after-gallery' ),
						'saturate' => __( 'Saturate', 'beaf-before-and-after-gallery' ),
					),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_2' ),
					'is_pro' => true
				), $post
				),

				apply_filters( 'bafg_filter_apply', array(
					'id' => '',
					'type' => 'radio',
					'label' => __( 'Apply Filter For', 'beaf-before-and-after-gallery' ),
					'subtitle' => __( 'Filtering will applicable on selected image.', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'none' => __( 'None', 'beaf-before-and-after-gallery' ),
						'apply_before' => __( 'Before Image', 'beaf-before-and-after-gallery' ),
						'apply_after' => __( 'After Image', 'beaf-before-and-after-gallery' ),
					),
					'dependency' => array( 'bafg_before_after_method', '==', 'method_2' ),
					'is_pro' => true
				) ),

				array(
					'id' => 'bafg_image_styles',
					'type' => 'imageselect',
					'label' => __( 'Orientation Styles', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'vertical' => array(
							'title' => __( 'Vertical', 'beaf-before-and-after-gallery' ),
							'url' => BEAF_ASSETS_URL . 'image/v.jpg',
						),
						'horizontal' => array(
							'title' => __( 'Horizontal', 'beaf-before-and-after-gallery' ),
							'url' => BEAF_ASSETS_URL . 'image/h.jpg',
						)
					),
					'default' => 'horizontal',
				),
				apply_filters( 'bafg_before_after_style',
					array(
						'id' => 'bafg_before_after_style',
						'type' => 'imageselect',
						'label' => __( 'BEAF template style', 'beaf-before-and-after-gallery' ),
						'subtitle' => __( 'Select a style for the before and after label.', 'beaf-before-and-after-gallery' ),
						'options' => array(
							'default' => array(
								'title' => __( 'Default', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/default.png',
							),
							'design-1' => array(
								'title' => __( 'Design 1', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style1.png',
								'is_pro' => true
							),
							'design-2' => array(
								'title' => __( 'Design 2', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style2.png',
								'is_pro' => true
							),
							'design-3' => array(
								'title' => __( 'Design 3', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style3.png',
								'is_pro' => true
							),
							'design-4' => array(
								'title' => __( 'Design 4', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style4.png',
								'is_pro' => true
							),
							'design-5' => array(
								'title' => __( 'Design 5', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style5.png',
								'is_pro' => true
							),
							'design-6' => array(
								'title' => __( 'Design 6', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style6.png',
								'is_pro' => true
							),
							'design-7' => array(
								'title' => __( 'Design 7', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style7.png',
								'is_pro' => true
							),
							'design-8' => array(
								'title' => __( 'Design 8', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style8.png',
								'is_pro' => true
							),
							'design-9' => array(
								'title' => __( 'Design 9', 'beaf-before-and-after-gallery' ),
								'url' => BEAF_ASSETS_URL . 'image/style9.png',
								'is_pro' => true
							)
						),
						'default' => 'default',
					), $post ),
			),

		),
		'options' => array(
			'title' => __( 'Options', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa fa-cog',
			'fields' => array(
				array(
					'id' => 'bafg_default_offset',
					'type' => 'text',
					'label' => __( 'Default offset', 'beaf-before-and-after-gallery' ),
					'default' => '0.5',
					'subtitle' => __( 'How much of the before image is visible when the page loads. (e.g: 0.7)', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				),
				array(
					'id' => 'bafg_before_label',
					'type' => 'text',
					'label' => __( 'Before Label', 'beaf-before-and-after-gallery' ),
					'default' => 'Before',
					'subtitle' => __( 'Set a custom label for the before image.', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				),
				apply_filters( 'bafg_middle_label', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Middle Label', 'beaf-before-and-after-gallery' ),
					'default' => 'Middle',
					'subtitle' => __( 'Set a custom label for the middle image.', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 50,
				), $post ),
				array(
					'id' => 'bafg_after_label',
					'type' => 'text',
					'label' => __( 'After Label', 'beaf-before-and-after-gallery' ),
					'default' => 'After',
					'subtitle' => __( 'Set a custom label for the after image.', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				),
				// apply_filters( 'show_label_outside_image', array(
				// 	'id' => '',
				// 	'type' => 'switch',
				// 	'label' => __( 'Show Label Outside Of Image', 'beaf-before-and-after-gallery' ),
				// 	'default' => false,
				// 	'subtitle' => __( 'Show Label Outside of Image', 'beaf-before-and-after-gallery' ),
				// 	'is_pro' => true,
				// 	'field_width' => 50,
				// ), $post ),
				apply_filters( 'bafg_auto_slide', array(
					'id' => '',
					'type' => 'switch',
					'label' => __( 'Auto Slide', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'The before and after image will slide automatically.', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 50,
				), $post ),
				array(
					'id' => 'bafg_both_video_play',
					'type' => 'switch',
					'label' => __( 'Play Both Videos On Slide', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'Plays both before after videos on slide togather.', 'beaf-before-and-after-gallery' ),
					'class' => 'bafg-both-video-play',
					'field_width' => 50,
				),
				apply_filters( 'bafg_on_scroll_slide', array(
					'id' => '',
					'type' => 'switch',
					'label' => __( 'On Scroll Slide', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'The before and after image slider will slide on scroll automatically.', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_auto_slide', '==', false ),
					'field_width' => 50,
				), $post ),

				array(
					'id' => 'bafg_slide_handle',
					'type' => 'switch',
					'label' => __( 'Disable Handle', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'Disable the slider handle.', 'beaf-before-and-after-gallery' ),
					'dependency' => array( 'bafg_auto_slide', '==', true ),
					'field_width' => 50,
				),
				apply_filters( 'bafg_popup_preview', array(
					'id' => '',
					'type' => 'switch',
					'label' => __( 'Full Screen View', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'Enable to display slider on full screen.', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 50,
				), $post ),

				array(
					'id' => 'bafg_move_slider_on_hover',
					'type' => 'switch',
					'label' => __( 'Move slider on mouse hover?', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'field_width' => 50,
				),

				array(
					'id' => 'bafg_click_to_move',
					'type' => 'switch',
					'label' => __( 'Click To Move', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'Allow a user to click (or tap) anywhere on the image to move the slider to that location.', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
					'dependency' => array( 'bafg_auto_slide', '==', '' )
				),

				array(
					'id' => 'bafg_click_to_move_text',
					'type' => 'heading',
					'label' => __( 'Click To Move', 'beaf-before-and-after-gallery' ),
					'default' => false,
					'subtitle' => __( 'The \'Click to Move\' feature is unavailable when \'Auto Slide\' is enabled. Please disable \'Auto Slide\' to use the \'Click to Move\' functionality.', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
					'dependency' => array( 'bafg_auto_slide', '!=', '' )
				),

				array(
					'id' => 'bafg_no_overlay',
					'type' => 'switch',
					'label' => __( 'Show Overlay', 'beaf-before-and-after-gallery' ),
					'default' => true,
					'subtitle' => __( 'Show overlay on the before and after image.', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				),
				array(
					'id' => 'skip_lazy_load',
					'type' => 'switch',
					'label' => __( 'Skip Lazy Load', 'beaf-before-and-after-gallery' ),
					'default' => true,
					'subtitle' => __( 'Conflicting with lazy load? Try to skip lazy load.', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				),
			)

		),
		'style' => array(
			'title' => __( 'Style', 'beaf-before-and-after-gallery' ),
			'icon' => 'fa fa-paint-brush',
			'fields' => array(
				array(
					'id' => 'bafg_before_label_background',
					'type' => 'color',
					'label' => __( 'Before Label Background', 'beaf-before-and-after-gallery' ),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_before_label_color',
					'type' => 'color',
					'label' => __( 'Before Label Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_after_label_background',
					'type' => 'color',
					'label' => __( 'After Label Background', 'beaf-before-and-after-gallery' ),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_after_label_color',
					'type' => 'color',
					'label' => __( 'After Label Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 33,
				),

				apply_filters( 'bafg_handle_color', array(
					'id' => '',
					'type' => 'color',
					'label' => __( 'Slider Handle Color', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 33,
				), $post ),

				apply_filters( 'bafg_overlay_color', array(
					'id' => '',
					'type' => 'color',
					'label' => __( 'Slider Overlay Color', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 33,
				), $post ),
				apply_filters( 'bafg_overlay_color_opacity', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Slider Overlay Opacity', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'placeholder' => __( 'Set a value between 0 to 100. (e.g: 50)', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				), $post ),

				apply_filters( 'bafg_width', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Slider Width', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'placeholder' => __( 'e.g:640px|%', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				), $post ),

				apply_filters( 'bafg_height', array(
					'id' => '',
					'type' => 'text',
					'label' => __( 'Slider Height', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'placeholder' => __( 'e.g:340px|%', 'beaf-before-and-after-gallery' ),
					'field_width' => 50,
				), $post ),

				apply_filters( 'bafg_slider_alignment', array(
					'id' => '',
					'type' => 'select',
					'label' => __( 'Slider Alignment', 'beaf-before-and-after-gallery' ),
					'is_pro' => true,
					'field_width' => 50,
					'options' => array(
						'' => 'Default',
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right'
					)
				), $post ),

				array(
					'id' => 'bafg_heading',
					'type' => 'heading',
					'title' => __( 'Heading Styles', 'beaf-before-and-after-gallery' ),
				),
				array(
					'id' => 'bafg_slider_info_heading_font_size',
					'type' => 'text',
					'label' => __( 'Font Size', 'beaf-before-and-after-gallery' ),
					'placeholder' => '16px',
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_slider_info_heading_alignment',
					'type' => 'select',
					'label' => __( 'Alignment', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'' => 'Default',
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right'
					),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_slider_info_heading_font_color',
					'type' => 'color',
					'label' => __( 'Font Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_desc',
					'type' => 'heading',
					'title' => __( 'Description Styles', 'beaf-before-and-after-gallery' ),
				),
				array(
					'id' => 'bafg_slider_info_desc_font_size',
					'type' => 'text',
					'label' => __( 'Font Size', 'beaf-before-and-after-gallery' ),
					'placeholder' => '14px',
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_slider_info_desc_alignment',
					'type' => 'select',
					'label' => __( 'Alignment', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'' => 'Default',
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right'
					),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_slider_info_desc_font_color',
					'type' => 'color',
					'label' => __( 'Font Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_readmore',
					'type' => 'heading',
					'title' => __( 'Read more Styles', 'beaf-before-and-after-gallery' ),
				),

				array(
					'id' => 'bafg_slider_info_readmore_font_color',
					'type' => 'color',
					'label' => __( 'Font Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 25,
				),
				//hover color
				array(
					'id' => 'bafg_slider_info_readmore_hover_font_color',
					'type' => 'color',
					'label' => __( 'Hover Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 25,
				),
				array(
					'id' => 'bafg_slider_info_readmore_bg_color',
					'type' => 'color',
					'label' => __( 'Background Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 25,
				),

				array(
					'id' => 'bafg_slider_info_readmore_hover_bg_color',
					'type' => 'color',
					'label' => __( 'Hover Background Color', 'beaf-before-and-after-gallery' ),
					'field_width' => 25,
				),
				array(
					'id' => 'bafg_slider_info_readmore_font_size',
					'type' => 'text',
					'label' => __( 'Font Size', 'beaf-before-and-after-gallery' ),
					'placeholder' => 'eg.14px',
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_slider_info_readmore_button_padding_top_bottom',
					'type' => 'text',
					'label' => __( 'Padding Top Bottom', 'beaf-before-and-after-gallery' ),
					'placeholder' => 'eg.14px',
					'field_width' => 33,
				),
				array(
					'id' => 'bafg_slider_info_readmore_button_padding_left_right',
					'type' => 'text',
					'label' => __( 'Padding Left Right', 'beaf-before-and-after-gallery' ),
					'placeholder' => 'eg.14px',
					'field_width' => 33,
				),
				//border radius
				array(
					'id' => 'bafg_slider_info_readmore_border_radius',
					'type' => 'text',
					'label' => __( 'Border Radius', 'beaf-before-and-after-gallery' ),
					'placeholder' => 'eg.14px',
					'field_width' => 33,
				),
				//button width
				array(
					'id' => 'bafg_slider_info_readmore_button_width',
					'type' => 'select',
					'label' => __( 'Button Width', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'' => 'Default',
						'full-width' => 'Full width',
					),
					'field_width' => 33,
				),
				//alignment
				array(
					'id' => 'bafg_slider_info_readmore_alignment',
					'type' => 'select',
					'label' => __( 'Alignment', 'beaf-before-and-after-gallery' ),
					'options' => array(
						'' => 'Default',
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right'
					),
					'field_width' => 33,
					'dependency' => array( 'bafg_slider_info_readmore_button_width', '==', '' ),
				),


			)
		)

	),
) );
