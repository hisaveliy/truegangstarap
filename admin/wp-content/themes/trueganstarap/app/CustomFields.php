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
		if( function_exists('register_field_group') ){
			$this->add_fields();
		}
	}

	/**
	* Function to add ACFs
	*/
	function add_fields(){
        register_field_group(array (
            'id' => 'acf_authors',
            'title' => 'Authors',
            'fields' => array (
                array (
                    'key' => 'field_5ac3d474e3b39',
                    'label' => 'Thumbnail',
                    'name' => 'thumbnail',
                    'type' => 'image',
                    'save_format' => 'object',
                    'preview_size' => 'thumbnail',
                    'library' => 'uploadedTo',
                ),
                array (
                    'key' => 'field_5ac3d4a4e3b3a',
                    'label' => 'Biography',
                    'name' => 'biography',
                    'type' => 'wysiwyg',
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 'no',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'ef_taxonomy',
                        'operator' => '==',
                        'value' => 'author',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));
        register_field_group(array (
            'id' => 'acf_releases',
            'title' => 'Releases',
            'fields' => array (
                array (
                    'key' => 'field_5ac3d1de253de',
                    'label' => 'Download link',
                    'name' => 'download_link',
                    'type' => 'text',
                    'default_value' => '',
                    'placeholder' => 'https://example.com',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5ac3d2e121d51',
                    'label' => 'Related releases',
                    'name' => 'related_releases',
                    'type' => 'relationship',
                    'return_format' => 'object',
                    'post_type' => array (
                        0 => 'release',
                    ),
                    'taxonomy' => array (
                        0 => 'all',
                    ),
                    'filters' => array (
                        0 => 'search',
                    ),
                    'result_elements' => array (
                        0 => 'featured_image',
                        1 => 'post_title',
                    ),
                    'max' => '',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'release',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));
	}
}