<?php
/**
 * CustomFields
 *
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */

namespace app;

/**
 * ACFs class
 * @package app
 */
class CustomFields {

	/**
	 * Constructor.
	 */
	public function __construct() {
		if( function_exists('acf_add_local_field_group') ){
			$this->add_fields();
		}
	}

	/**
	* Function to add ACFs
	*/
	function add_fields(){
		//acf_add_local_field_group(array());
	}
}