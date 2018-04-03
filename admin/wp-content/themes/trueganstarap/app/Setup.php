<?php
/**
 * Setup
 *
 * @package True Gansta Rap Theme
 * @since 1.0.0
 * @author hisaveliy
 */

namespace app;


class Setup{

    /**
     * Theme setup constructor.
     */
    public function __construct(){
        add_action( 'after_setup_theme', array( $this, 'theme_setup'  ) );
        add_filter( 'image_size_names_choose', array( $this, 'custom_sizes') );
    }


    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    public function theme_setup(){

        /*
         * Make theme available for translation.
         * Translations can be filed in the /lang/ directory.
         */
        load_theme_textdomain( 'tgr', get_template_directory() . '/lang' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Main Menu', 'tgr' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'post-thumbnails'
        ) );


        // Add excerpt to pages
        add_post_type_support( 'page', 'excerpt' );

        add_image_size( '1450-size', 1450, 1450 );
        add_image_size( '1150-size', 1150, 1150 );
        add_image_size( '760-size', 700, 700 );
        add_image_size( '550-size', 500, 500 );
        add_image_size( '380-size', 350, 350 );
    }

    public function custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            '1450-size' => 'Size 1400',
            '1150-size' => 'Size 1150',
            '760-size'  => 'Size 760',
            '550-size'  => 'Size 550',
            '380-size'  => 'Size 380',
        ) );
    }
}