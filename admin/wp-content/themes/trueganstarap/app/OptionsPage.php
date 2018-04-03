<?php 
/**
 * OptionPage
 *
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */

namespace app;


/**
 * Rgister Custom Post Types
 *
 * @package app
 */
class OptionsPage {

	/**
	 * Constructor.
	 */
	public function __construct() {

		if( function_exists('acf_add_options_page') ) {
			
			acf_add_options_page( 
				array( 'page_title' => 'Site Options' ) 
			);
			
		}
	}
}
