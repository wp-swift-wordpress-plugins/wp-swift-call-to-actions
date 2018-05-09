<?php
function cptui_register_my_cpts_call_to_action() {

	/**
	 * Post Type: Call to Actions.
	 */

	$labels = array(
		"name" => __( "Call to Actions", "" ),
		"singular_name" => __( "Call to Action", "" ),
	);

	$args = array(
		"label" => __( "Call to Actions", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => false,
		"query_var" => true,
		"menu_position" => 50,
		"menu_icon" => "dashicons-megaphone",
		"supports" => array( "title", "editor" ),
	);

	register_post_type( "call_to_action", $args );
}

add_action( 'init', 'cptui_register_my_cpts_call_to_action' );
