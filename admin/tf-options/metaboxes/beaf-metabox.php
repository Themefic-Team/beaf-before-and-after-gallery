<?php
// don't load directly

use Automattic\WooCommerce\Utilities\ArrayUtil;

defined( 'ABSPATH' ) || exit;
$post = get_the_ID();
TF_Metabox::metabox( 'beaf_meta', array(
	'title'     => __( 'Before After Content', 'bafg' ),
	'post_type' => 'bafg',
	'sections'  => array(
		'content' => array(
			'title'  => __( 'Content', 'bafg' ),
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'id'        => 'bafg_before_after_method',
					'type'      => 'radio',
					'label'     => __( 'Before After Method', 'bafg' ),
                    'title'     => __( 'Before After Method', 'bafg' ),
                    'subtitle'  => __( 'Choose a method to make a before after slider using a single image, 2 images, 3 images and Videos.', 'bafg' ),
                    'options'   => apply_filters( 'beaf_before_after_method', array(
                        'bafg_before_after_method1' => __( 'Method 1 (Using 2 images)', 'bafg' ),
                        'bafg_before_after_method2' => array(
                            'label'  => __( 'Method 2 (Using 1 image )<div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">Pro feature!</div></div>', 'bafg' ),
                            'is_pro' => true
                         ),
                        'bafg_before_after_method3' => array(
                           'label'  => __( 'Method 3 (Using 3 images )<div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">Pro feature! 3 image slider addon required to activate this. <a href="https://themefic.com/wp-content/uploads/2023/07/3-image-slider-addon.png" target="_blank"> More info</a></div></div>', 'bafg' ),
                           'is_pro' => true
                        ),
                        'bafg_before_after_method4' => array(
                            'label'  => __( 'Method 4 (Using Video) <div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">Pro feature! 3 image slider addon required to activate this. <a href="https://themefic.com/wp-content/uploads/2023/07/3-image-slider-addon.png" target="_blank"> More info</a></div></div>', 'bafg' ),
                            'is_pro' => true
                        ),
                    ), $post ),
				),
                array(
                    'id'         => 'bafg_before_image',
                    'type'       => 'image',
                    'label'      => __( 'Before Image', 'bafg' ),
                    'subtitle'   => __( 'Upload before image for the slider', 'bafg' ),
                    'dependency' => array( 'bafg_before_after_method', '==', 'bafg_before_after_method1' ),
                ),                                
                array(
					'id'    => 'before_img_alt',
					'type'  => 'text',
					'label' => __( 'Before Image Alter text', 'bafg' ),
                    'dependency' => array( 'bafg_before_after_method', '==', 'bafg_before_after_method1' ),
                ),                
                array(
					'id'    => 'before_image_link',
					'type'  => 'text',
					'label' => __( 'Before Image link', 'bafg' ),
                    'dependency' => array( 'bafg_before_after_method', '==', 'bafg_before_after_method1' ),
                ),
                array(
                    'id'       => 'bafg_after_image',
                    'type'     => 'image',
                    'label'    => __( 'After Image', 'bafg' ),
                    'subtitle' => __( 'Upload after image for the slider', 'bafg' ),
                    'dependency' => array( 'bafg_before_after_method', '==', 'bafg_before_after_method1' ),
                ),                                               
                array(
					'id'    => 'after_img_alt',
					'type'  => 'text',
					'label' => __( 'After Image Alter text', 'bafg' ),
                    'dependency' => array( 'bafg_before_after_method', '==', 'bafg_before_after_method1' ),
                ),                   
                array(
					'id'    => 'after_image_link',
					'type'  => 'text',
					'label' => __( 'After Image link', 'bafg' ),
                    'dependency' => array( 'bafg_before_after_method', '==', 'bafg_before_after_method1' ),
                ),
                array(
                    'id'          => 'bafg_slider_title',
                    'type'        => 'text',
                    'label'       => __( 'Slider Title', 'bafg' ),
                    'placeholder' => __( 'Optional', 'bafg' ),
                ),
                array(
                    'id'          => 'bafg_slider_description',
                    'type'        => 'textarea',
                    'label'       => __( 'Slider Description', 'bafg' ),
                    'placeholder' => __( 'Optional', 'bafg' ),
                ),
                array(
                    'id'          => 'bafg_readmore_link',
                    'type'        => 'text',
                    'label'       => __( 'Read More Link', 'bafg' ),
                    'placeholder' => __( 'Optional', 'bafg' ),
                ),
                array(
                    'id'          => 'bafg_readmore_link_target',
                    'type'        => 'select',
                    'label'       => __( 'Read More Link Target', 'bafg' ),
                    'options'     => array(
                        '_self'  => __( 'Same Page', 'bafg' ),
                        '_blank' => __( 'New Tab', 'bafg' ),
                    ),
                ),
                array(
                    'id'          => 'bafg_readmore_text',
                    'type'        => 'text',
                    'label'       => __( 'Read More Text', 'bafg' ),
                    'placeholder' => __( 'Optional', 'bafg' ),
                ),
                array(
                   'id'          => 'bafg_image_styles',
                   'type'        => 'imageselect',
                   'label'       => __( 'Orientation Styles', 'bafg' ),
                   'options'     => array(
                     'horizontal' => array(
                        'title' => __( 'Horizontal', 'bafg' ),
                        'url'   => BEAF_ASSETS_URL . 'image/v.jpg',
                     ),
                     'vertical' => array(
                        'title' => __( 'Vertical', 'bafg' ),
                        'url'   => BEAF_ASSETS_URL . 'image/h.jpg',
                     )
                    )
                ),                
                array(
                    'id'          => 'bafg_before_after_style',
                    'type'        => 'imageselect',
                    'label'       => __( 'BEAF template style', 'bafg' ),
                    'options'     => array(
                      'default' => array(
                         'title' => __( 'Default', 'bafg' ),
                         'url'   => BEAF_ASSETS_URL . 'image/default.png',
                      ),
                      'design-1' => array(
                         'title'  => __( 'Design 1', 'bafg' ),
                         'url'    => BEAF_ASSETS_URL . 'image/style1.png',
                         'is_pro' => true
                      ),
                      'design-2' => array(
                         'title'  => __( 'Design 2', 'bafg' ),
                         'url'    => BEAF_ASSETS_URL . 'image/style2.png',
                         'is_pro' => true
                      ),
                      'design-3' => array(
                         'title'  => __( 'Design 3', 'bafg' ),
                         'url'    => BEAF_ASSETS_URL . 'image/style3.png',
                         'is_pro' => true
                      ),
                      'design-4' => array(
                         'title'  => __( 'Design 4', 'bafg' ),
                         'url'    => BEAF_ASSETS_URL . 'image/style4.png',
                         'is_pro' => true
                      ),                      
                      'design-5' => array(
                        'title'  => __( 'Design 5', 'bafg' ),
                        'url'    => BEAF_ASSETS_URL . 'image/style5.png',
                        'is_pro' => true
                     ),
                      'design-6' => array(
                        'title'  => __( 'Design 6', 'bafg' ),
                        'url'    => BEAF_ASSETS_URL . 'image/style6.png',
                        'is_pro' => true
                      ),
                      'design-7' => array(
                        'title'  => __( 'Design 7', 'bafg' ),
                        'url'    => BEAF_ASSETS_URL . 'image/style7.png',
                        'is_pro' => true
                      ),
                      'design-8' => array(                          
                        'title'  => __( 'Design 8', 'bafg' ),
                        'url'    => BEAF_ASSETS_URL . 'image/style8.png',
                        'is_pro' => true
                      ),
                      'design-9' => array(
                        'title' => __( 'Design 9', 'bafg' ),
                        'url'   => BEAF_ASSETS_URL . 'image/style9.png',
                        'is_pro' => true                          
                      )
                    )
                 ),

                
			),

		),
        'options' => array(
            'title' => __( 'Options', 'bafg' ),
            'icon'  => 'fa fa-cog',
            'fields' => array(
                array(
                    'id'       => 'bafg_default_offset',
                    'type'     => 'text',
                    'label'    => __( 'Default offset', 'bafg' ),
                    'default'  => '0.5',
                    'subtitle' => __( 'How much of the before image is visible when the page loads. (e.g: 0.7)', 'bafg' ),
                ),
                array(
                    'id'       => 'bafg_before_label',
                    'type'     => 'text',
                    'label'    => __( 'Before Label', 'bafg' ),
                    'default'  => 'Before',
                    'subtitle' => __( 'Set a custom label for the before image.', 'bafg' ),
                ),
                array(
                    'id'       => 'bafg_after_label',
                    'type'     => 'text',
                    'label'    => __( 'After Label', 'bafg' ),
                    'default'  => 'After',
                    'subtitle' => __( 'Set a custom label for the after image.', 'bafg' ),
                ),
                array(
                    'id'       => 'bafg_auto_slide',
                    'type'     => 'switch',
                    'label'    => __( 'Auto Slide', 'bafg' ),
                    'default'  => false,
                    'subtitle' => __( 'The before and after image will slide automatically.', 'bafg' ),
                ),
                array(
                    'id'       => 'bafg_on_scroll_slide',
                    'type'     => 'switch',
                    'label'    => __( 'On Scroll Slide', 'bafg' ),
                    'default'  => false,
                    'subtitle' => __( 'The before and after image slider will slide on scroll automatically.', 'bafg' ),
                    'dependency' => array( 'bafg_auto_slide', '==', false ),
                ),
                array(
                    'id'       => 'bafg_slide_handle',
                    'type'     => 'switch',
                    'label'    => __( 'Disable Handle', 'bafg' ),
                    'default'  => false,
                    'subtitle' => __( 'Disable the slider handle.', 'bafg' ),
                ),                
                array(
                    'id'       => 'bafg_popup_preview',
                    'type'     => 'switch',
                    'label'    => __( 'Full Screen View', 'bafg' ),
                    'default'  => false,
                ),               
                array(
                    'id'       => 'bafg_click_to_move',
                    'type'     => 'switch',
                    'label'    => __( 'Click To Move', 'bafg' ),
                    'default'  => false,
                    'subtitle' => __( 'Allow a user to click (or tap) anywhere on the image to move the slider to that location.', 'bafg' ),
                ),
                array(
                    'id'       => 'bafg_no_overlay',
                    'type'     => 'switch',
                    'label'    => __( 'Show Overlay', 'bafg' ),
                    'default'  => true,
                    'subtitle' => __( 'Show overlay on the before and after image.', 'bafg' ),
                ),
                array(
                    'id'       => 'skip_lazy_load',
                    'type'     => 'switch',
                    'label'    => __( 'Skip Lazy Load', 'bafg' ),
                    'default'  => true,
                    'subtitle' => __( 'Conflicting with lazy load? Try to skip lazy load.', 'bafg' ),
                ),
            )
            
        )
	),
));
