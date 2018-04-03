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

		// Team CPT
		//add_action( 'init', array( $this, 'team_post_type' ) );
	}

	/**
	 * Team CPT
	 */
	public function team_post_type() {

		$labels = array(
			'name'                  => __( 'Team', 'tgr' ),
			'singular_name'         => __( 'Team', 'tgr' ),
			'menu_name'             => __( 'Team', 'tgr' ),
			'name_admin_bar'        => __( 'Team', 'tgr' ),
			'archives'              => __( 'Team Archives', 'tgr' ),
			'attributes'            => __( 'Team Attributes', 'tgr' ),
			'parent_item_colon'     => __( 'Parent Item:', 'tgr' ),
			'all_items'             => __( 'All Team Members', 'tgr' ),
			'add_new_item'          => __( 'Add Team Member', 'tgr' ),
			'add_new'               => __( 'Add Team Member', 'tgr' ),
			'new_item'              => __( 'New Team Member', 'tgr' ),
			'edit_item'             => __( 'Edit Team Member', 'tgr' ),
			'update_item'           => __( 'Update Team Member', 'tgr' ),
			'view_item'             => __( 'View Team Member', 'tgr' ),
			'view_items'            => __( 'View Team Members', 'tgr' ),
			'search_items'          => __( 'Search Team Member', 'tgr' ),
			'not_found'             => __( 'Not found', 'tgr' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'tgr' ),
			'featured_image'        => __( 'Featured Image', 'tgr' ),
			'set_featured_image'    => __( 'Set featured image', 'tgr' ),
			'remove_featured_image' => __( 'Remove featured image', 'tgr' ),
			'use_featured_image'    => __( 'Use as featured image', 'tgr' ),
			'insert_into_item'      => __( 'Insert into Team Member', 'tgr' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'tgr' ),
			'items_list'            => __( 'Team Members list', 'tgr' ),
			'items_list_navigation' => __( 'Team Members list navigation', 'tgr' ),
			'filter_items_list'     => __( 'Filter Team Member list', 'tgr' ),
		);
		$args = array(
			'label'                 => __( 'Team', 'tgr' ),
			'description'           => __( 'Team', 'tgr' ),
			'labels'                => $labels,
			'supports'              => array( ),
			'taxonomies'            => array( 'category'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'team', $args );

	}
}

