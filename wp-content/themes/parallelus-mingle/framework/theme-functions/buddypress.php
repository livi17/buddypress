<?php

#-----------------------------------------------------------------
# BuddyPress Related Functions
#-----------------------------------------------------------------


// Include BuddyPress JS and CSS functions
//................................................................

// Add a class when admin bar is enabled for logged out users
if (!bp_get_option( 'hide-loggedout-adminbar' )) {
	// Add class to body
	add_filter('body_class','bp_adminbar_class');
	function bp_adminbar_class($classes) {
		$classes[] = 'bp-adminbar';
		return $classes;
	}	
}

if ( ! function_exists( 'bp_support_enqueue_scripts' ) ) :
	function bp_support_enqueue_scripts() {
		global $cssPath;
		
		// Load the BuddyPress CSS file
		theme_register_css( 'buddypress', $cssPath.'buddypress.css', 1 );

	}
endif;
add_action( 'wp_enqueue_scripts', 'bp_support_enqueue_scripts' );



#-----------------------------------------------------------------
# BuddyPress specific menu options in WP Nav Menus
#-----------------------------------------------------------------


// Specify BuddyPress menu items to include in meta box
//................................................................

$bp_nav_menu_items = array(
	array (
		'post_title' => __( 'Login Popup', THEME_NAME ),
		'url' => get_home_url() . '/#LoginPopup',
		'classes' => array('popup', '-function-is-user-logged-in')
	),
	array (
		'post_title' => __( 'Logout Link', THEME_NAME ),
		'url' => add_query_arg( 
				array('action' => 'logout', '_wpnonce' => '((logout_nonce))'), 
				site_url('wp-login.php', 'login')
		),
		'classes' => array('function-is-user-logged-in')
	)
);

	

// Displays a metabox for BuddyPress specific menu items
//................................................................

function bp_nav_menu_item_meta_box() {
	global $_nav_menu_placeholder, $nav_menu_selected_id, $bp_nav_menu_items;

	$post_type = array();
	
	$post_type_name = 'bp-menu';

	$args = array(
		'offset' => 0,
		'order' => 'ASC',
		'orderby' => 'title',
		'posts_per_page' => 50,
		'post_type' => $post_type_name,
		'suppress_filters' => true,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false
	);

	if ( isset( $post_type['args']->_default_query ) )
		$args = array_merge($args, (array) $post_type['args']->_default_query );

	$menu_items = $bp_nav_menu_items;

	if ( !$menu_items )
		$error = '<li id="error">Error: Links not found</li>';

	$db_fields = false;
	$walker = new Walker_Nav_Menu_Checklist( $db_fields );

	$current_tab = 'all';

	?>
	<div id="posttype-<?php echo $post_type_name; ?>" class="posttypediv">
		<ul id="posttype-<?php echo $post_type_name; ?>-tabs" class="posttype-tabs add-menu-item-tabs">
			<li <?php echo ( 'all' == $current_tab ? ' class="tabs"' : '' ); ?>><a class="nav-tab-link" href="<?php if ( $nav_menu_selected_id ) echo esc_url(add_query_arg($post_type_name . '-tab', 'all', remove_query_arg($removed_args))); ?>#<?php echo $post_type_name; ?>-all"><?php _e('All Links', THEME_NAME); ?></a></li>
		</ul>

		<div id="<?php echo $post_type_name; ?>-all" class="tabs-panel tabs-panel-view-all <?php
			echo ( 'all' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' );
		?>">
			<ul id="<?php echo $post_type_name; ?>checklist" class="list:<?php echo $post_type_name?> categorychecklist form-no-clear">
				<?php
				$links = array();
				$deafault_links = array (
					'ID' => 0,
					'object_id' => 0,
					'post_content' => '',
					'post_excerpt' => '',
					'post_parent' => '',
					'post_type' => 'nav_menu_item',
					'object' => '',
					'type' => 'custom',
					'post_title' => '',
					'url' => ''
				);

				$count = 0;
				foreach( (array) $menu_items as $menu_item ) {
					if ($_nav_menu_placeholder) {
						$menu_item['object_id'] = ( 0 > $_nav_menu_placeholder ) ? intval($_nav_menu_placeholder) - 1 : -1;
					} else {
						$menu_item['object_id'] = $count - 1;
					}
					$links[] = (object) array_merge($deafault_links, $menu_item);
					$count = $count - 1;
				}
				$args['walker'] = $walker;
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $links), 0, (object) $args );
				?>
			</ul>
		</div><!-- /.tabs-panel -->

		<p class="button-controls">
			<span class="list-controls">
				<a href="<?php
					echo esc_url(add_query_arg(
						array(
							$post_type_name . '-tab' => 'all',
							'selectall' => 1,
						),
						remove_query_arg($removed_args)
					));
				?>#posttype-<?php echo $post_type_name; ?>" class="select-all"><?php _e('Select All', THEME_NAME); ?></a>
			</span>

			<span class="add-to-menu">
				<input type="submit"<?php disabled( $nav_menu_selected_id, 0 ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu', THEME_NAME); ?>" name="add-post-type-menu-item" id="submit-posttype-<?php echo $post_type_name; ?>" />
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.posttypediv -->
	<?php
}


// This function tells WP to add a new "meta box"
function add_bp_menu_meta_box() {
	global $bp_nav_menu_items;
	// Create the meta box call
	add_meta_box( "add-bpMenu", __( 'Special Functionality', THEME_NAME ), 'bp_nav_menu_item_meta_box', 'nav-menus', 'side', 'default', $bp_nav_menu_items );
}
// Hook things in, late enough so that add_meta_box() is defined
if (is_admin())
	add_action('admin_menu', 'add_bp_menu_meta_box', 99);
	



?>