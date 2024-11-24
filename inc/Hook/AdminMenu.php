<?php

class AdminMenu {



    /*
	 * Adding submenu for pro version
	 * Retrun @Pro Batch 
	 */
	public function bafg_register_menu_page() {

		add_submenu_page(
			'edit.php?post_type=bafg',
			__( 'Gallery Generator', 'bafg' ),
			__( 'Gallery Generator', 'bafg' ),
			'manage_options',
			'bafg_gallery',
			'bafg_gallery_cb'
		);
	
		add_submenu_page(
			'edit.php?post_type=bafg',
			__( 'Documentation', 'bafg' ),
			__( 'Documentation', 'bafg' ),
			'manage_options',
			'https://themefic.com/docs/beaf/'
		);

		if ( ! is_plugin_active( 'beaf-before-and-after-gallery-pro/before-and-after-gallery-pro.php' ) ) {
			add_submenu_page(
				'edit.php?post_type=bafg',
				'Go Pro',
				'<span class="bafg-pro-link">★ Go Pro</span>',
				'manage_options',
				'https://themefic.com/plugins/beaf/pro/'
			);
		}

	}

}