<?php
/**
 * Assets
 *
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */

namespace app;

/**
 * Returns the assets path
 * @package app
 */
class Assets {

	/**
	 * Return path for CSS and JS
	 *
	 * @param string $type File type (styles|scripts)
	 * @param string $filename File name to include
	 *
	 * @return string
	 */
	public static function get($type, $filename) {

		$ds = DIRECTORY_SEPARATOR;
		$uri = get_stylesheet_directory_uri() . '/dist/'.$type.'/';

		// Path to rev-manifest.json
		$manifest = get_stylesheet_directory() . $ds . 'dist' . $ds . $type . $ds . 'rev-manifest.json';

		// Read manifest to get files
		if ( file_exists($manifest) ) {
			$files = json_decode(file_get_contents($manifest), true);
		} else {
			$files = [];
		}

		// Return path
		if (array_key_exists($filename, $files)) {
			return $uri . $files[$filename];
		} else {
			return '';
		}

	}

}