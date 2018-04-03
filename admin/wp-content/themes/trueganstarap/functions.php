<?php
/**
 * True Gansta Rap Theme functions and definitions
 * 
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */


/**
 * Autoloader
 *
 * @param string $class class name
 * @return void
 */
function app_autoloader($class) {

	$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;

	$class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
	if ( file_exists($path . $class . '.php') ) {
		include $path . $class . '.php';
	}

}
// Register autoloader
spl_autoload_register('app_autoloader');

// Theme setup
new \app\Setup();

// JS and CSS
new \app\Enqueue();

// Custom Post Types
new \app\PostTypes();

// Custom Post Types
new \app\OptionsPage();

// Custom Fields
new \app\CustomFields();

