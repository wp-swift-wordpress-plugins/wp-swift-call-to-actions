<?php
/*
Plugin Name: WP Swift: Call to Actions
Plugin URI: https://github.com/wp-swift-wordpress-plugins/wp-swift-call-to-actions
Description: Call to Actions CPT
Version: 1
Author: Gary Swift
Author URI: https://github.com/wp-swift-wordpress-plugins
License: GPL2
*/

require_once plugin_dir_path( __FILE__ ) . 'cpt/call_to_action.php';

if (!function_exists("wp_swift_html_callout")) {
	function wp_swift_html_callout( $title, $content, $class = '' ) {
	?>
		<div class="callout-banner <?php echo $class ?>">
			<div class="main-title-bar"><div><?php echo $title ?></div></div>			
			<div class="content">
				<div class="cell-content bold"><?php echo $content ?></div>
			</div>
		</div>
	<?php
	}
}

function wp_swift_callout( $i, $show_at_count, $call_to_actions ) {
	if ( $i === $show_at_count ):
		$call_to_action = wp_swift_get_call_to_action($call_to_actions);	;
		if ( $call_to_action ) {
			wp_swift_html_callout( $call_to_action["title"], $call_to_action["content"], "in-loop" );
		}
	endif;
}

function wp_swift_get_call_to_action($call_to_actions) {
	$call_to_action = false;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$count = count($call_to_actions);
	for ($i=0; $i < 20; $i++) { 
		if ( isset( $call_to_actions[$paged - $count * $i] )) {
			$call_to_action = $call_to_actions[$paged - $count * $i];
			break;
		}
	}
	return $call_to_action;
}

function wp_swift_get_call_to_actions() {
	$call_to_actions = false;
	$posts = get_posts(array(
		'posts_per_page' => 20,
		'post_type'	=> 'call_to_action', 
		'status' => 'published'  
	));
	if( $posts ) {
		$i = 0;
		$call_to_actions = array();
		foreach( $posts as $post ) {
			$call_to_action = array();
			$call_to_action["ID"] = $post->ID;
			$call_to_action["title"] = $post->post_title;
			$call_to_action["content"] = $post->post_content;
			$call_to_actions[++$i] = $call_to_action;
		} 	
	}
	return $call_to_actions;
}

function wp_swift_get_show_at_count() {
	$posts_per_page = get_option('posts_per_page');
	return (int) ceil( $posts_per_page / 2 );
}