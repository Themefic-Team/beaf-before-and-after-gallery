<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit();
}

//Register Meta box
add_action('add_meta_boxes', function (){
    add_meta_box('bafg_shortcode_metabox','Shortcode','bafg_shortcode_callback','bafg','side','high');
    //add_meta_box('bafg_blackfriday','Black Friday Offer','bafg_blackfriday','bafg','side','high');
});


//Metabox shortcode
function bafg_shortcode_callback(){
    $bafg_scode = isset($_GET['post']) ? '[bafg id="'.$_GET['post'].'"]' : '';
    ?>
    <input type="text" name="bafg_display_shortcode" class="bafg_display_shortcode" value="<?php echo esc_attr($bafg_scode); ?>" readonly onclick="bafgCopyShortcode()">
    <?php
}

//Metabox shortcode
function bafg_blackfriday(){
    ?>
    <style>
	#bafg_blackfriday .postbox-header {
		display: none;
	}	
	</style>
    <a target="_blank" href="https://themefic.com/black-friday/"><img style="max-width: 100%;" src="<?php echo plugin_dir_url( __FILE__ ); ?>../BLACK_FRIDAY_BACKGROUND_GRUNGE.png" alt=""></a>
    <?php
}