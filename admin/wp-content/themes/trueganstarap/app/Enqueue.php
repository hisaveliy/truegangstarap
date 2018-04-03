<?php
/**
 * Enqueue
 *
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */

namespace app;

/**
 * Enqueue JS and CSS assets
 * @package app
 */
class Enqueue {

	/**
	 * Enqueue constructor.
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', [$this, 'styles'] );
		add_action( 'wp_enqueue_scripts', [$this, 'scripts'] );

	}

	/**
	 * Add CSS
	 */
	public function styles() {
		wp_enqueue_style( 'main-style', Assets::get('styles', 'app.css') );
	}



	/**
	 * Add JS
	 */
	public function scripts() {

	    // the lib below has been reincluded through source code
		wp_enqueue_script( 'main-script', Assets::get('scripts', 'app.js'), [], null, true );

		// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
		wp_localize_script( 
			'main-script', 
			'ajaxObj', 
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( "nonce" ) 
			) 
		);
	}

}