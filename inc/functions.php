<?php

/**
 * Black Friday Deals 2023
 */
// inclue plugin.php file

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if(!function_exists('tf_black_friday_2023_admin_notice') &&  !is_plugin_active('beaf-before-and-after-gallery-pro/before-and-after-gallery-pro.php')){
	function tf_black_friday_2023_admin_notice(){

		// Set the expiration time to 3 hours from the current time
        $expiration_time = time() + 3 * 60 * 60;  
        $tf_display_admin_notice_time = get_option( 'tf_display_admin_notice_time' );
        if($tf_display_admin_notice_time == ''){
            update_option( 'tf_display_admin_notice_time', $expiration_time );
        }

		$deal_link =sanitize_url('https://themefic.com/deals/');
		$get_current_screen = get_current_screen();  
		if(!isset($_COOKIE['tf_dismiss_admin_notice']) && $get_current_screen->base == 'dashboard' && time() > $tf_display_admin_notice_time ){ 
            ?>
            <style> 
                .tf_black_friday_20222_admin_notice a:focus {
                    box-shadow: none;
                } 
                .tf_black_friday_20222_admin_notice {
                    padding: 7px;
                    position: relative;
                    z-index: 10;
					max-width: 825px;
                } 
                .tf_black_friday_20222_admin_notice button:before {
                    color: #fff !important;
                }
                .tf_black_friday_20222_admin_notice button:hover::before {
                    color: #d63638 !important;
                }
            </style>
            <div class="notice notice-success tf_black_friday_20222_admin_notice"> 
                <a href="<?php echo $deal_link; ?>" style="display: block; line-height: 0;" target="_blank" >
                    <img  style="width: 100%;" src="<?php echo plugin_dir_url(__FILE__) ?>../assets/image/BLACK_FRIDAY_BACKGROUND_GRUNGE_notice.png" alt="">
                </a> 
                <button type="button" class="notice-dismiss tf_black_friday_notice_dismiss"><span class="screen-reader-text"><?php echo __('Dismiss this notice.', 'ultimate-addons-cf7' ) ?></span></button>
            </div>
            <script>
                jQuery(document).ready(function($) {
                    $(document).on('click', '.tf_black_friday_notice_dismiss', function( event ) {
                        jQuery('.tf_black_friday_20222_admin_notice').css('display', 'none')
                        data = {
                            action : 'tf_black_friday_notice_dismiss_callback',
                        };

                        $.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: data,
                            success: function (data) { ;
                            },
                            error: function (data) { 
                            }
                        });
                    });
                });
            </script>
        
        <?php 
		}
		
	} 
	if (strtotime('2023-12-01') > time()) {
		add_action( 'admin_notices', 'tf_black_friday_2023_admin_notice' );  
	}   
}

if(!function_exists('tf_black_friday_notice_dismiss_callback')){
	function tf_black_friday_notice_dismiss_callback() { 
		$cookie_name = "tf_dismiss_admin_notice";
		$cookie_value = "1"; 
		setcookie($cookie_name, $cookie_value, strtotime('2023-12-01'), "/"); 
		update_option( 'tf_display_admin_notice_time', '1' );
		wp_die();
	}
	add_action( 'wp_ajax_tf_black_friday_notice_dismiss_callback', 'tf_black_friday_notice_dismiss_callback' );
}
 
add_action( 'wp_ajax_beaf_black_friday_notice_dismiss_callback', 'beaf_black_friday_notice_dismiss_callback' );
 
if(!function_exists('beaf_black_friday_20222')){
	function beaf_black_friday_20222() { 
		if ( ! isset( $_COOKIE['beaf_tour_friday_sidbar_notice'] ) ) {
			add_meta_box( 'beaf_black_friday_docs', ' ', 'beaf_black_friday_2022_callback','bafg','side' );   
		}
		
	}
	if (strtotime('2023-12-01') > time()) {  
		add_action( 'add_meta_boxes', 'beaf_black_friday_20222' );
	}   
	function beaf_black_friday_2022_callback(){
		$deal_link = sanitize_url('https://themefic.com/deals/');
	?> 
		<style> 
			.back_friday_2022_preview a:focus {
				box-shadow: none;
			} 
			.back_friday_2022_preview a {
				display: inline-block;
			}
			#beaf_black_friday_docs .inside {
				padding: 0;
				margin-top: 0;
			}
			#beaf_black_friday_docs .postbox-header {
				display: none;
				visibility: hidden;
			}
		</style>
		<div class="back_friday_2022_preview" style="text-align: center; overflow: hidden;">
			<button type="button" class="notice-dismiss beaf_friday_notice_dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			<a href="<?php echo $deal_link; ?>" target="_blank" >
				<img  style="width: 100%;" src="<?php echo BEAF_PLUGIN_URL ?>assets/image/BLACK_FRIDAY_BACKGROUND_GRUNGE.png" alt=" BLACK FRIDAY 2022">
			</a> 
		</div>
		<script>
            jQuery(document).ready(function($) {
                $(document).on('click', '.beaf_friday_notice_dismiss', function( event ) { 
                    jQuery('#beaf_black_friday_docs').css('display', 'none')
					var cookieName = "beaf_tour_friday_sidbar_notice";
					var cookieValue = "1";

					// Create a date object for the expiration date
					var expirationDate = new Date(); 
					expirationDate.setTime(expirationDate.getTime() + (5 * 24 * 60 * 60 * 1000)); // 5 days in milliseconds

					// Construct the cookie string
					var cookieString = cookieName + "=" + cookieValue + ";expires=" + expirationDate.toUTCString() + ";path=/";

					// Set the cookie
					document.cookie = cookieString;
                });
            });
        </script>
	<?php
	}  
}




add_action( 'bafg_after_slider', 'bafg_slider_info', 10 );

function bafg_slider_info($id){
	
	$bafg_width            = !empty(get_post_meta( $id, 'bafg_width', true )) ? get_post_meta( $id, 'bafg_width', true ) : '';
	$bafg_height           = !empty(get_post_meta( $id, 'bafg_height', true )) ? get_post_meta( $id, 'bafg_height', true ) : '';
	$bafg_slider_alignment = !empty(get_post_meta( $id, 'bafg_slider_alignment', true )) ? get_post_meta( $id, 'bafg_slider_alignment', true ) : '';
	
	$bafg_pro_activated = get_option( 'bafg_pro_activated' );
	?>
	<div class="bafg-slider-info-wraper">
		<div style="<?php if( $bafg_pro_activated == 'true' ) { if($bafg_width != ''){ echo 'width: '.$bafg_width.';'; } ?> <?php if( $bafg_width != '' && $bafg_slider_alignment == 'right' ){ echo ' float: right;'; } ?> <?php if( $bafg_width == '' && $bafg_slider_alignment == 'right' ){ echo ' float: right; width: 100%;'; } ?> <?php if( $bafg_slider_alignment == 'center' ){ echo ' margin: 0 auto;'; } } ?>" class="<?php echo esc_attr('slider-info-'.$id.''); ?> bafg-slider-info">
			<?php
			$bafg_slider_title = get_post_meta($id,'bafg_slider_title',true);
			if( trim($bafg_slider_title) != '' ) :
			?>
			<h2 class="bafg-slider-title"><?php echo esc_html($bafg_slider_title); ?></h2>
			<?php
			endif;

			$bafg_slider_description = get_post_meta($id,'bafg_slider_description',true);

			if( trim($bafg_slider_description) != '' ) :
			?>
			<div class="bafg-slider-description">
				<?php
				echo esc_html($bafg_slider_description);
				?>
			</div>
			<?php
			endif;

			$bafg_readmore_link = get_post_meta($id,'bafg_readmore_link',true);
			if( trim($bafg_readmore_link) != '' ) :
			?>
			<div>
			<?php
			$bafg_readmore_link_target = get_post_meta( $id, 'bafg_readmore_link_target', true );
			$bafg_pro_activated        = get_option( 'bafg_pro_activated' );
			
			$bafg_readmore_text = esc_html__('Read more','bafg');
			if($bafg_pro_activated == 'true') {
				$bafg_readmore_text = !empty(get_post_meta( $id, 'bafg_readmore_text', true )) ? get_post_meta( $id, 'bafg_readmore_text', true ) : esc_html__('Read more','bafg');
			}
			?>
			<a href="<?php echo esc_url($bafg_readmore_link); ?>" class="bafg_slider_readmore_button" <?php if($bafg_readmore_link_target == 'new_tab') echo 'target="_blank"'; ?> ><?php echo esc_html__( $bafg_readmore_text , 'bafg' ); ?></a>
			</div>

			<?php endif; ?>
		</div>
	</div>
	<?php
}


add_action( 'bafg_before_slider', 'bafg_slider_info_styles', 10 );

function bafg_slider_info_styles($id){
	
	$bafg_slider_info_heading_font_size = !empty(get_post_meta( $id, 'bafg_slider_info_heading_font_size', true )) ? get_post_meta( $id, 'bafg_slider_info_heading_font_size', true ) : '22px';

	$bafg_slider_info_heading_alignment = !empty(get_post_meta( $id, 'bafg_slider_info_heading_alignment', true )) ? get_post_meta( $id, 'bafg_slider_info_heading_alignment', true ) : '';

	$bafg_slider_info_desc_alignment 	= !empty(get_post_meta( $id, 'bafg_slider_info_desc_alignment', true )) ? get_post_meta( $id, 'bafg_slider_info_desc_alignment', true ) : '';

	$bafg_slider_info_readmore_alignment = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_alignment', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_alignment', true ) : '';

	$bafg_slider_info_readmore_button_padding_top_bottom = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_top_bottom', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_top_bottom', true ) : '';

	$bafg_slider_info_readmore_button_padding_left_right = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_left_right', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_button_padding_left_right', true ) : '';

	$bafg_slider_info_readmore_button_width = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_button_width', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_button_width', true ) : '';

	$bafg_slider_info_heading_font_color        = !empty(get_post_meta( $id, 'bafg_slider_info_heading_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_heading_font_color', true ) : '';
	$bafg_slider_info_desc_font_size            = !empty(get_post_meta( $id, 'bafg_slider_info_desc_font_size', true )) ? get_post_meta( $id, 'bafg_slider_info_desc_font_size', true ) : '';
	$bafg_slider_info_desc_font_color           = !empty(get_post_meta( $id, 'bafg_slider_info_desc_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_desc_font_color', true ) : '';
	$bafg_slider_info_readmore_font_size        = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_font_size', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_font_size', true ) : '';
	$bafg_slider_info_readmore_font_color       = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_font_color', true ) : '';
	$bafg_slider_info_readmore_bg_color         = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_bg_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_bg_color', true ) : '';
	$bafg_slider_info_readmore_hover_font_color = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_hover_font_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_hover_font_color', true ) : '';
	$bafg_slider_info_readmore_hover_bg_color   = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_hover_bg_color', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_hover_bg_color', true ) : '';
	
	$bafg_slider_info_readmore_border_radius = !empty(get_post_meta( $id, 'bafg_slider_info_readmore_border_radius', true )) ? get_post_meta( $id, 'bafg_slider_info_readmore_border_radius', true ) : '';
	
	?>
	
	<style type="text/css">
		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg-slider-title {
			<?php if( $bafg_slider_info_heading_font_size != '' ) : ?>
			font-size: <?php echo esc_attr($bafg_slider_info_heading_font_size); ?>;
			<?php endif; ?>
			
			<?php if( $bafg_slider_info_heading_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_heading_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_heading_alignment != '' ) : ?>
			text-align: <?php echo esc_attr($bafg_slider_info_heading_alignment); ?>;
			<?php endif; ?>
		}

		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg-slider-description {
			<?php if( $bafg_slider_info_desc_font_size != '' ) : ?>
			font-size: <?php echo esc_attr($bafg_slider_info_desc_font_size); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_desc_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_desc_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_desc_alignment != '' ) : ?>
			text-align: <?php echo esc_attr($bafg_slider_info_desc_alignment); ?>;
			<?php endif; ?>
		}

		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg_slider_readmore_button {
			<?php if( $bafg_slider_info_readmore_font_size != '' ) : ?>
			font-size: <?php echo esc_attr($bafg_slider_info_readmore_font_size); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_readmore_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_bg_color != '' ) : ?>
			background-color: <?php echo esc_attr($bafg_slider_info_readmore_bg_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_bg_color != '' ) : ?>
			border: 1px solid <?php echo esc_attr($bafg_slider_info_readmore_bg_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_border_radius != '' ) : ?>
			border-radius: <?php echo esc_attr($bafg_slider_info_readmore_border_radius); ?>;
			<?php endif; ?>

			text-align: center;

			<?php if( $bafg_slider_info_readmore_alignment == 'right' ) : ?>
			float: <?php echo esc_attr($bafg_slider_info_readmore_alignment); ?>;
			max-width: 200px;
			display: block;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_alignment == 'center' ) : ?>
			margin: 10px auto;
			max-width: 200px;
			display: block;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_top_bottom != '' ) : ?>
			padding-top: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_top_bottom); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_top_bottom != '' ) : ?>
			padding-bottom: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_top_bottom); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_left_right != '' ) : ?>
			padding-left: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_left_right); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_padding_left_right != '' ) : ?>
			padding-right: <?php echo esc_attr($bafg_slider_info_readmore_button_padding_left_right); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_button_width == 'full-width' ) : ?>
			display: block;
			width: 100%;
			<?php endif; ?>
		}

		.<?php echo esc_attr('slider-info-'.$id.''); ?>.bafg-slider-info .bafg_slider_readmore_button:hover {

			<?php if( $bafg_slider_info_readmore_hover_font_color != '' ) : ?>
			color: <?php echo esc_attr($bafg_slider_info_readmore_hover_font_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_hover_bg_color != '' ) : ?>
			background-color: <?php echo esc_attr($bafg_slider_info_readmore_hover_bg_color); ?>;
			<?php endif; ?>

			<?php if( $bafg_slider_info_readmore_bg_color != '' ) : ?>
			border: 1px solid <?php echo esc_attr($bafg_slider_info_readmore_bg_color); ?>;
			<?php endif; ?>
		}

	</style>
	<?php
}

//get the option value
if ( !function_exists( 'bafg_option_value' ) ) {
    function bafg_option_value( $name ) {

        $option_value = get_option( 'bafg_watermark' );
        if ( isset( $option_value[$name] ) ) {
            return $option_value[$name];
        }

    }
}


// Themefic Plugin Set Admin Notice Status
if(!function_exists('bafg_review_activation_status')){

    function bafg_review_activation_status(){ 
        $bafg_installation_date = get_option('bafg_installation_date'); 
        if( !isset($_COOKIE['bafg_installation_date']) && empty($bafg_installation_date) && $bafg_installation_date == 0){
            setcookie('bafg_installation_date', 1, time() + (86400 * 7), "/"); 
        }else{
            update_option( 'bafg_installation_date', '1' );
        }
    }
    add_action('admin_init', 'bafg_review_activation_status');
}

// Themefic Plugin Review Admin Notice
if(!function_exists('bafg_review_notice')){
    
     function bafg_review_notice(){ 
        $get_current_screen = get_current_screen();  
        if($get_current_screen->base == 'dashboard'){
            $current_user = wp_get_current_user();
        ?>
            <div class="notice notice-info themefic_review_notice"> 
               
                <?php echo sprintf( 
                        __( ' <p>Hey %1$s 👋, You have been using %2$s for quite a while. If you feel %2$s is helping your business to grow in any way, would you please help %2$s to grow by simply leaving a 5* review on the WordPress Forum?', 'bafg' ),
                        $current_user->user_login,
                        'Ultimate Before After Image Slider & Gallery'
                    ); ?> 
                
                <ul>
                    <li><a target="_blank" href="<?php echo esc_url('https://wordpress.org/support/plugin/beaf-before-and-after-gallery/reviews/#new-post') ?>" class=""><span class="dashicons dashicons-external"></span><?php _e(' Ok, you deserve it!', 'bafg' ) ?></a></li>
                    <li><a href="#" class="already_done" data-status="already"><span class="dashicons dashicons-smiley"></span> <?php _e('I already did', 'bafg') ?></a></li>
                    <li><a href="#" class="later" data-status="later"><span class="dashicons dashicons-calendar-alt"></span> <?php _e('Maybe Later', 'bafg') ?></a></li>
                    <li><a target="_blank"  href="<?php echo esc_url('https://themefic.com/docs/beaf/') ?>" class=""><span class="dashicons dashicons-sos"></span> <?php _e('I need help', 'bafg') ?></a></li>
                    <li><a href="#" class="never" data-status="never"><span class="dashicons dashicons-dismiss"></span><?php _e('Never show again', 'bafg') ?> </a></li> 
                </ul>
				<button type="button" class="notice-dismiss review_notice_dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>

            </div>

            <!--   Themefic Plugin Review Admin Notice Script -->
            <script>
                jQuery(document).ready(function($) {
                    $(document).on('click', '.already_done, .later, .never', function( event ) {
                        event.preventDefault();
                        var $this = $(this);
                        var status = $this.attr('data-status'); 
                        $this.closest('.themefic_review_notice').css('display', 'none')
                        data = {
                            action : 'bafg_review_notice_callback',
                            status : status,
                        };

                        $.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: data,
                            success: function (data) { ;
                            },
                            error: function (data) { 
                            }
                        });
                    });
					$(document).on('click', '.review_notice_dismiss', function( event ) {
                        event.preventDefault(); 
						var $this = $(this);
                        $this.closest('.themefic_review_notice').css('display', 'none')
                        
                    });
                });
            </script>
        <?php  
        }
     }
     $bafg_review_notice_status = get_option('bafg_review_notice_status');
     $bafg_installation_date    = get_option('bafg_installation_date');
     if(isset($bafg_review_notice_status) && $bafg_review_notice_status <= 0 && $bafg_installation_date == 1 && !isset($_COOKIE['bafg_review_notice_status']) && !isset($_COOKIE['bafg_installation_date'])){ 
        add_action( 'admin_notices', 'bafg_review_notice' );  
     }
     
}

 
// Themefic Plugin Review Admin Notice Ajax Callback 
if( !function_exists( 'bafg_review_notice_callback' ) ){

    function bafg_review_notice_callback(){
        $status = $_POST['status'];
        if( $status == 'already'){ 
            update_option( 'bafg_review_notice_status', '1' );
        }else if($status == 'never'){ 
            update_option( 'bafg_review_notice_status', '2' );
        }else if($status == 'later'){
            $cookie_name  = "bafg_review_notice_status";
            $cookie_value = "1";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); 
            update_option( 'bafg_review_notice_status', '0' ); 
        }  
        wp_die();
    }
    add_action( 'wp_ajax_bafg_review_notice_callback', 'bafg_review_notice_callback' );

}


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
if(!function_exists('appsero_init_tracker_beaf_before_and_after_gallery')){ 
	/* 
	* Initialize the appsero
	*/

	function appsero_init_tracker_beaf_before_and_after_gallery() {

		if ( ! class_exists( 'Appsero\Client' ) ) {
			require_once ( plugin_dir_path( __DIR__ ) . '/inc/app/src/Client.php');
		}
	
		$client = new Appsero\Client( 'daee3b5d-d8a3-46f0-ae49-7b6f869f4b42', 'Ultimate Before After Image Slider & Gallery – BEAF', __FILE__ );
	
		// Change Admin notice text
	
		$notice = sprintf( $client->__trans( 'Want to help make <strong>%1$s</strong> even more awesome? Allow %1$s to collect non-sensitive diagnostic data and usage information. I agree to get Important Product Updates & Discount related information on my email from  %1$s (I can unsubscribe anytime).' ), $client->name );
		$client->insights()->notice($notice); 
	
		
		// Active insights
		$client->insights()->init();
	
	}
	appsero_init_tracker_beaf_before_and_after_gallery();
}

/**
 * Admin notice if using older version BEAF PRO
 * @since 4.3.24
 * @author Abu Hena
 */
if( !function_exists( 'bafg_pro_version_notice' ) ){

	function bafg_pro_version_notice(){
		if( ! function_exists('get_plugin_data') ){
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		if ( is_plugin_active('beaf-before-and-after-gallery-pro/before-and-after-gallery-pro.php') ){
			//get this pro plugin version
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/beaf-before-and-after-gallery-pro/before-and-after-gallery-pro.php', false, false );
			$bafg_pro_version = $plugin_data['Version'];

			if( !empty( $bafg_pro_version ) && version_compare( $bafg_pro_version, '4.2.15', '<' )){
				//get wp version
				global $wp_version;
				$get_current_screen = get_current_screen();  
				if( $get_current_screen->base == 'dashboard' || $get_current_screen->base = 'plugins' ){
					if( isset( $_COOKIE['bafg_update_pro']) && $_COOKIE['bafg_update_pro'] == '1' ){
						return;
					}else{
				?>
					<div class="notice notice-warning is-dismissible bafg-update-pro">
						<p style="font-size:16px"><?php echo sprintf( __('<b>Warning:</b> The installed version of BEAF Pro ('.$bafg_pro_version.') has not been tested on your version of WordPress ('.$wp_version.'). It has been tested up to version 5.9. <a href="%s" target="_blank">You should update BEAF Pro to latest version to make sure that you have a version that has been tested for compatibility.</a>', 'bafg'), "https://themefic.com/docs/beaf/seeing-warning-versions-wordpress-beaf-tested/"  ) ?></p>
					</div>
				<?php
					}
				}
			}
		}
	}
	add_action( 'admin_notices', 'bafg_pro_version_notice' );
}
/*
* Ajax callback for update pro notice closing
*/
if( ! function_exists( 'bafg_update_pro' ) ){
	function bafg_update_pro(){
		$cookie = 'bafg_update_pro';
		setcookie( $cookie, '1', time() + (86400 * 7), "/" );
	}
	add_action( 'wp_ajax_bafg_update_pro', 'bafg_update_pro' );
}
