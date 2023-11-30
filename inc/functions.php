<?php 
//all functions goes here
/**
 * Add a checkbox to disable public queryable
 * @param $bafg_publicly_queriable_html
 * @param $bafg_publicly_queriable
 * @return string
 * @since 1.0.0
 * @package BAFG
 * 
 */
$beaf_pro_license_status = get_option( 'beaf_pro_license_status' );
/**
 * Register shortcode for bafg_preview.
 *
 * @param array $atts The shortcode attributes.
 * @return string The shortcode output.
 * 
 * @author Abu Hena
 */
if( ! function_exists( 'bafg_frontend_preview_shortcode_pro_cb' ) ) {
    function bafg_frontend_preview_shortcode_pro_cb( $atts ) {

        ob_start();
        //extract the shortcode attributes
        extract( shortcode_atts( array(
        'id' => '',
        ), $atts ) );

        //define the before and after images url
        $before_image = plugins_url( '../assets/image/before.jpg', __FILE__ );
        $after_image  = plugins_url( '../assets/image/after.jpg', __FILE__ );
        ?>
        <div class="bafg-twentytwenty-container bafg-frontend-preview" bafg-overlay="yes" bafg-move-slider-on-hover="no">       
            <img class="bafg-before-prev-image"  before-image-url="<?php echo esc_url( $before_image ) ?>" src="<?php echo esc_url( $before_image ) ?>" >
            <img class="bafg-after-prev-image" after-image-url="<?php echo esc_url( $after_image ) ?>" src="<?php echo esc_url( $after_image ) ?>" >
        </div>
        <div class="bafg-frontend-upload-buttons">
            <div class="bafg-bimage-up">
                <label><?php echo __( "Upload Before Image","bafg-pro" ); ?></label>
                <input type="file" name="" id="bafg-before-image" class="upload-before-image" accept="image/*">
            </div>
            <div class="bafg-aimage-up">
                <label><?php echo __( "Upload After Image","bafg-pro" ); ?></label>
                <input type="file" name="" id="bafg-after-image" class="upload-after-image" accept="image/*">
            </div>
            <div class="bafg-reset-preview">
                <button class="bafg-reset-preview-btn"><?php echo __( "Reset","bafg-pro" ); ?></button>
            </div>
        </div>
        <?php
        
        return ob_get_clean();
    }
    add_shortcode( 'bafg_preview', 'bafg_frontend_preview_shortcode_pro_cb' );
}

if( ! function_exists( 'bafg_before_after_method' ) ) {
    add_filter( 'beaf_before_after_method', 'bafg_before_after_method', 30, 2 );
    /**
     * Generates the function comment for the given function body.
     *
     * @param array $options an array of options
     * @param mixed $post the post data
     * @return array the modified $options array
     */
    function bafg_before_after_method( $options, $post ) {
        $pro_options = array(
            'id'      => 'bafg_before_after_method',
            'options' => array(
                'method_1' => __( 'Method 1 (Using 2 images)', 'bafg' ),
                'method_2' => __( 'Method 2 (Using 1 image)', 'bafg' ),
                'method_3' => apply_filters( 'bafg_three_image_slider_method', array(
                    'label'  => __( 'Method 3 (Using 3 images )<div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">Pro feature! 3 image slider addon required to activate this. <a href="https://themefic.com/wp-content/uploads/2023/07/3-image-slider-addon.png" target="_blank"> More info</a></div></div>', 'bafg' ),
                    'is_pro' => true
                ),$post),
                'method_4' => apply_filters( 'bafg_video_slider_method',array(
                    'label'  => __( 'Method 4 (Using Video) <div class="bafg-tooltip method-3-tooltip"><span>?</span><div class="bafg-tooltip-info">Pro feature! Video slider addon required to activate this. <a href="https://themefic.com/wp-content/uploads/2023/07/video-slider-addon.png" target="_blank"> More info</a></div></div>', 'bafg' ),
                    'is_pro' => true
                ), $post),
            ),
            'default' => 'method_1',
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }
        return $options;
    }
}

if( ! function_exists( 'bafg_publicly_queriable_cb') ){
    function bafg_publicly_queriable_cb( $options  ) {
        $pro_options = array(
            'id' => 'bafg_publicly_queriable',
            'is_pro' => false,
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
        
    }
    add_filter( 'bafg_publicly_queriable', 'bafg_publicly_queriable_cb', 30 );
}

if( ! function_exists( 'bafg_before_image_link_cb') ){
    add_filter( 'before_image_link', 'bafg_before_image_link_cb',30 );
    function bafg_before_image_link_cb( $options ) {
        $pro_options = array(
            'id'         => 'before_image_link',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

//after_image_link
if( ! function_exists( 'bafg_after_image_link_cb') ){
    add_filter( 'after_image_link', 'bafg_after_image_link_cb', 30 );
    function bafg_after_image_link_cb( $options ) {
        $pro_options = array(
            'id'         => 'after_image_link',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}
//bafg_readmore_text
if( ! function_exists( 'bafg_readmore_text_cb') ){
    add_filter( 'bafg_readmore_text', 'bafg_readmore_text_cb', 30 );
    function bafg_readmore_text_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_readmore_text',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

//bafg_before_after_style
if( ! function_exists( 'bafg_before_after_style_cb') ){
    add_filter( 'bafg_before_after_style', 'bafg_before_after_style_cb', 30 );
    function bafg_before_after_style_cb( $options ) {
        $pro_options = array(
            'id'      => 'bafg_before_after_style',
            'options' => array(
                'default' => array(
                    'title' => __( 'Default', 'bafg' ),
                    'url'   => BEAF_ASSETS_URL . 'image/default.png',
                ),
                'design-1' => array(
                    'title'  => __( 'Design 1', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style1.png',
                ),
                'design-2' => array(
                    'title'  => __( 'Design 2', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style2.png',
                ),
                'design-3' => array(
                    'title'  => __( 'Design 3', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style3.png',
                ),
                'design-4' => array(
                    'title'  => __( 'Design 4', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style4.png',
                ),                      
                'design-5' => array(
                    'title'  => __( 'Design 5', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style5.png',
            ),
                'design-6' => array(
                    'title'  => __( 'Design 6', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style6.png',
                ),
                'design-7' => array(
                    'title'  => __( 'Design 7', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style7.png',
                ),
                'design-8' => array(                          
                    'title'  => __( 'Design 8', 'bafg' ),
                    'url'    => BEAF_ASSETS_URL . 'image/style8.png',
                ),
                'design-9' => array(
                    'title' => __( 'Design 9', 'bafg' ),
                    'url'   => BEAF_ASSETS_URL . 'image/style9.png',
                )
            )
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

//bafg_label_outside
if( ! function_exists( 'bafg_label_outside_cb') ){
    add_filter( 'show_label_outside_image', 'bafg_label_outside_cb', 30 );
    function bafg_label_outside_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_label_outside',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

//bafg_auto_slide
if( ! function_exists( 'bafg_auto_slide_cb') ){
    add_filter( 'bafg_auto_slide', 'bafg_auto_slide_cb', 30);
    function bafg_auto_slide_cb( $options ){
        $pro_options = array(
            'id'         => 'bafg_auto_slide',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }   

        return $options;
    }    
}
if( ! function_exists( 'bafg_before_after_image_cb') ){
    add_filter( 'bafg_before_after_image', 'bafg_before_after_image_cb', 30 );
    function bafg_before_after_image_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_before_after_image',
            'is_pro'     => false
        );
        
        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}
if( ! function_exists( 'bafg_bottom_image_cb' ) ){
    add_filter( 'bafg_bottom_image', 'bafg_bottom_image_cb', 30 );
    function bafg_bottom_image_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_bottom_image',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_middle_image_cb' ) ) {
    add_filter( 'bafg_middle_image', 'bafg_middle_image_cb', 30 );
    function bafg_middle_image_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_middle_image',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }    
}

if( ! function_exists( 'bafg_top_image_cb' ) ) {
    add_filter( 'bafg_top_image', 'bafg_top_image_cb', 30 );
    function bafg_top_image_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_top_image',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_slider_video_type_cb' ) ) {
    add_filter( 'bafg_slider_video_type', 'bafg_slider_video_type_cb', 30 );
    function bafg_slider_video_type_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_slider_video_type',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_before_video_cb' ) ) {
    add_filter( 'bafg_before_video', 'bafg_before_video_cb', 30 );
    function bafg_before_video_cb( $options ) {
        $pro_options = array(
            'id'          => 'bafg_before_video',
            'is_pro'      => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_after_video_cb' ) ) {
    add_filter( 'bafg_after_video', 'bafg_after_video_cb', 30 );
    function bafg_after_video_cb( $options ) {
        $pro_options = array(
            'id'          => 'bafg_after_video',
            'is_pro'      => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }    
}

if( ! function_exists( 'bafg_before_vimeo_video_cb' ) ){
    add_filter( 'bafg_before_vimeo_video', 'bafg_before_vimeo_video_cb', 30 );
    function bafg_before_vimeo_video_cb( $options ) {
        $pro_options = array(
            'id'          => 'bafg_before_vimeo_video',
            'is_pro'      => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_after_vimeo_video_cb' ) ) {
    add_filter( 'bafg_after_vimeo_video', 'bafg_after_vimeo_video_cb', 30 );
    function bafg_after_vimeo_video_cb( $options ) {
        $pro_options = array(
            'id'          => 'bafg_after_vimeo_video',
            'is_pro'      => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_before_self_video_cb' ) ){
    add_filter( 'bafg_before_self_video', 'bafg_before_self_video_cb', 30 );
    function bafg_before_self_video_cb( $options ) {
        $pro_options = array(
            'id'          => 'bafg_before_self_video',
            'is_pro'      => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_after_self_video_cb' ) ) {
    add_filter( 'bafg_after_self_video', 'bafg_after_self_video_cb', 30 );
    function bafg_after_self_video_cb( $options ) {
        $pro_options = array(
            'id'          => 'bafg_after_self_video',
            'is_pro'      => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_filter_style_cb' ) ){ 
    add_filter( 'bafg_filter_style', 'bafg_filter_style_cb', 30 );
    function bafg_filter_style_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_filter_style',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_on_scroll_slider_cb') ){
    add_filter( 'bafg_on_scroll_slide', 'bafg_on_scroll_slider_cb', 30 );
    function bafg_on_scroll_slider_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_on_scroll_slide',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_popup_preview_cb' ) ) {
    add_filter( 'bafg_popup_preview', 'bafg_popup_preview_cb', 30 );
    function bafg_popup_preview_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_popup_preview',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_handle_color_cb' ) ) {
    add_filter( 'bafg_handle_color', 'bafg_handle_color_cb', 30 );
    function bafg_handle_color_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_handle_color',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_overlay_color_cb' ) ){
    add_filter( 'bafg_overlay_color', 'bafg_overlay_color_cb', 30 );
    function bafg_overlay_color_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_overlay_color',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;

    }
}
if( ! function_exists( 'bafg_width_cb' ) ) {
    add_filter( 'bafg_width', 'bafg_width_cb', 30 );
    function bafg_width_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_width',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_height_cb' ) ) {
    add_filter( 'bafg_height', 'bafg_height_cb', 30 );
    function bafg_height_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_height',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_video_width_cb' ) ) {
    add_filter( 'bafg_video_width', 'bafg_video_width_cb', 30 );
    function bafg_video_width_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_video_width',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_video_height_cb' ) ) {
    add_filter( 'bafg_video_height', 'bafg_video_height_cb', 30 );
    function bafg_video_height_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_video_height',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_slider_alignment_cb' ) ) {
    add_filter( 'bafg_slider_alignment', 'bafg_slider_alignment_cb', 30 );
    function bafg_slider_alignment_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_slider_alignment',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_filter_apply_cb' ) ) {
    add_filter( 'bafg_filter_apply', 'bafg_filter_apply_cb', 30 );
    function bafg_filter_apply_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_filter_apply',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_before_after_image_link_cb' ) ) {
    add_filter( 'bafg_before_after_image_link', 'bafg_before_after_image_link_cb', 30 );
    function bafg_before_after_image_link_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_before_after_image_link',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_open_url_new_tab_cb' ) ) {
    add_filter( 'bafg_open_url_new_tab', 'bafg_open_url_new_tab_cb', 30 );
    function bafg_open_url_new_tab_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_open_url_new_tab',
            'is_pro'     => false
        );

        if( is_array( $options ) ) {
            $options = array_merge( $options, $pro_options );
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_enable_watermark_cb' ) ) {
    function bafg_enable_watermark_cb( $options ) {
        $pro_options = array(
            'id'         => 'enable_watermark',
            'is_pro'     => false
        );
        
        if( ! is_plugin_active( 'watermark-addon-for-beaf/watermark-addon-for-beaf.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
				$options = array_merge( $options, $pro_options );
			}
        }
        
        return $options;
    }
    add_filter( 'bafg_enable_watermark', 'bafg_enable_watermark_cb', 30 );
}

if( ! function_exists( 'bafg_enable_opacity_cb' ) ) {
    add_filter( 'bafg_enable_opacity', 'bafg_enable_opacity_cb', 30 );
    function bafg_enable_opacity_cb( $options ) {
        $pro_options = array(
            'id'         => 'wm_opacity_enable',
            'is_pro'     => false
        );

        if( ! is_plugin_active( 'watermark-addon-for-beaf/watermark-addon-for-beaf.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
				$options = array_merge( $options, $pro_options );
			}
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_watermark_opacity_cb' ) ) {
    add_filter( 'bafg_watermark_opacity', 'bafg_watermark_opacity_cb', 30 );
    function bafg_watermark_opacity_cb( $options ) {
        $pro_options = array(
            'id'         => 'wm_opacity',
            'is_pro'     => false
        );

        if( ! is_plugin_active( 'watermark-addon-for-beaf/watermark-addon-for-beaf.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
				$options = array_merge( $options, $pro_options );
			}
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_watermark_position_cb' ) ) {
    add_filter( 'bafg_watermark_position', 'bafg_watermark_position_cb', 30 );
    function bafg_watermark_position_cb( $options ) {
        $pro_options = array(
            'id'         => 'bafg_wm_position',
            'is_pro'     => false
        );

        if( ! is_plugin_active( 'watermark-addon-for-beaf/watermark-addon-for-beaf.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
				$options = array_merge( $options, $pro_options );
			}
        }

        return $options;
    }
}

//3 images slider option
if( ! function_exists( 'bafg_three_image_slider_method_cb' ) ) {
    add_filter( 'bafg_three_image_slider_method', 'bafg_three_image_slider_method_cb', 30, 2 );
    function bafg_three_image_slider_method_cb( $options, $post ) {
        $pro_options = array(
            'label'         => __( 'Method 3 ( Using 3 images )', 'bafg' ),
            'is_pro'     => false
        );

        if( ! is_plugin_active( 'beaf-pro-three-images-slider-addon/beaf-pro-three-images-slider-addon.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
				$options = array_merge( $options, $pro_options );
			}
        }

        return $options;
    }
}

//Video slider option
if( ! function_exists( 'bafg_video_slider_method_cb' ) ) {
    add_filter( 'bafg_video_slider_method', 'bafg_video_slider_method_cb', 30, 2 );
    function bafg_video_slider_method_cb( $options, $post ) {
        $pro_options = array(
            'label'         => __( 'Method 4 ( Using Videos )', 'bafg' ),
            'is_pro'     => false
        );

        if( ! is_plugin_active( 'beaf-pro-video-slider-addon/beaf-pro-video-slider-addon.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
				$options = array_merge( $options, $pro_options );
			}
        }

        return $options;
    }
}

if( ! function_exists( 'bafg_watermark_enable_field_meta_cb' ) ) {
    add_filter( 'bafg_watermark_enable_field_meta', 'bafg_watermark_enable_field_meta_cb', 30, 2 );
    function bafg_watermark_enable_field_meta_cb( $options, $post ) {
        $settings         = get_option( 'beaf_settings' );
        $watermark_enable = isset( $settings['enable_watermark'] ) ? $settings['enable_watermark'] : '';
        if( $watermark_enable == '1' ){
            $className = 'bafg-watermark-enabled';
        } else {
            $className = 'watermark-in-free-version';
        }

        $pro_options = array(
            'id'         => 'watermark_en_dis',
            'is_pro'     => false,
            'class'      => $className
        );

        if( ! is_plugin_active( 'watermark-addon-for-beaf/watermark-addon-for-beaf.php' ) ) {
            $options = $options;
        } else {
            if( is_array( $options ) ) {
            	$options = array_merge( $options, $pro_options );
        	}
        }

        return $options;
    }
}