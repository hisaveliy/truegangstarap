<?php
/**
 * PostTypes
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
class PostTypes {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'releases_post_type' ) );
		add_action( 'init', array( $this, 'genre_taxonomy' ) );
		add_action( 'init', array( $this, 'origin_taxonomy' ) );
		add_action( 'init', array( $this, 'author_taxonomy' ) );
		add_action( 'init', array( $this, 'tag_taxonomy' ) );
	}

	public function releases_post_type() {
		$labels = array(
			'name'                  => __( 'Releases', 'tgr' ),
			'singular_name'         => __( 'Release', 'tgr' ),
			'menu_name'             => __( 'Releases', 'tgr' ),
			'name_admin_bar'        => __( 'Releases', 'tgr' ),
			'archives'              => __( 'Releases Archives', 'tgr' ),
			'attributes'            => __( 'Releases Attributes', 'tgr' ),
			'parent_item_colon'     => __( 'Parent Release:', 'tgr' ),
			'all_items'             => __( 'All Releases', 'tgr' ),
			'add_new_item'          => __( 'Add Release', 'tgr' ),
			'add_new'               => __( 'Add Release', 'tgr' ),
			'new_item'              => __( 'New Release', 'tgr' ),
			'edit_item'             => __( 'Edit Release', 'tgr' ),
			'update_item'           => __( 'Update Release', 'tgr' ),
			'view_item'             => __( 'View Release', 'tgr' ),
			'view_items'            => __( 'View Release', 'tgr' ),
			'search_items'          => __( 'Search Release', 'tgr' ),
			'not_found'             => __( 'Not found', 'tgr' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tgr' ),
			'featured_image'        => __( 'Cover image', 'tgr' ),
			'set_featured_image'    => __( 'Set cover image', 'tgr' ),
			'remove_featured_image' => __( 'Remove cover image', 'tgr' ),
			'use_featured_image'    => __( 'Use as cover image', 'tgr' ),
			'insert_into_item'      => __( 'Insert into Release', 'tgr' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Release', 'tgr' ),
			'items_list'            => __( 'Releases list', 'tgr' ),
			'items_list_navigation' => __( 'Releases list navigation', 'tgr' ),
			'filter_items_list'     => __( 'Filter Releases list', 'tgr' ),
		);
		$args = array(
			'label'               => __( 'Release', 'tgr' ),
			'description'         => __( 'Release', 'tgr' ),
			'labels'              => $labels,
			'taxonomies'          => array('tags', 'genre', 'origin', 'author', 'tag'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-groups',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
            'supports'            => array('title', 'editor','thumbnail','excerpt', 'revisions')
		);
		register_post_type( 'release', $args );
	}

    public function genre_taxonomy() {
        $labels = array(
            'name' => __( 'Genres'  ),
            'singular_name' => __( 'Genre'  ),
            'search_items' =>  __( 'Search Genres' ),
            'all_items' => __( 'All Genres' ),
            'parent_item' => __( 'Parent Genre' ),
            'parent_item_colon' => __( 'Parent Genre:' ),
            'edit_item' => __( 'Edit Genre' ),
            'update_item' => __( 'Update Genre' ),
            'add_new_item' => __( 'Add New Genre' ),
            'new_item_name' => __( 'New Genre Name' ),
            'menu_name' => __( 'Genres' ),
        );
        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
        );
        register_taxonomy('genre', 'release', $args);
    }

    public function origin_taxonomy() {
        $labels = array(
            'name' => __( 'Origins'  ),
            'singular_name' => __( 'Origin'  ),
            'search_items' =>  __( 'Search Origins' ),
            'all_items' => __( 'All Origins' ),
            'parent_item' => __( 'Parent Origin' ),
            'parent_item_colon' => __( 'Parent Origin:' ),
            'edit_item' => __( 'Edit Origin' ),
            'update_item' => __( 'Update Origin' ),
            'add_new_item' => __( 'Add New Origin' ),
            'new_item_name' => __( 'New Origin Name' ),
            'menu_name' => __( 'Origins' ),
        );
        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
        );
        register_taxonomy('origin', 'release', $args);
    }

    public function author_taxonomy() {
        $labels = array(
            'name' => __( 'Authors'  ),
            'singular_name' => __( 'Author'  ),
            'search_items' =>  __( 'Search Authors' ),
            'all_items' => __( 'All Authors' ),
            'parent_item' => __( 'Parent Author' ),
            'parent_item_colon' => __( 'Parent Author:' ),
            'edit_item' => __( 'Edit Author' ),
            'update_item' => __( 'Update Author' ),
            'add_new_item' => __( 'Add New Author' ),
            'new_item_name' => __( 'New Author Name' ),
            'menu_name' => __( 'Authors' ),
        );
        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
        );
        register_taxonomy('author', 'release', $args);
    }

    public function tag_taxonomy() {
        $labels = array(
            'name' => __( 'Tags'  ),
            'singular_name' => __( 'Tag'  ),
            'search_items' =>  __( 'Search Tags' ),
            'all_items' => __( 'All Tags' ),
            'parent_item' => __( 'Parent Tag' ),
            'parent_item_colon' => __( 'Parent Tag:' ),
            'edit_item' => __( 'Edit Tag' ),
            'update_item' => __( 'Update Tag' ),
            'add_new_item' => __( 'Add New Tag' ),
            'new_item_name' => __( 'New Tag Name' ),
            'menu_name' => __( 'Tags' ),
        );
        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'rewrite' => array( 'slug' => 'tag' ),
        );
        register_taxonomy('tag', 'release', $args);
    }
}

