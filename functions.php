<?php
/*
Author: David R Poindexter
URL: 	http://davidrpoindexter.com
*/

/*
@TODO: Custom images sizes for upload resizing
*/
add_image_size( 'featured', 540, 265, true );
add_image_size( 'thumbnail-rectangle', 220, 135, true );
add_image_size( 'thumbnail-square', 80, 80, true );


/*
Custom admin backend limiting for site editors and authors
*/
add_action('admin_init', 'my_remove_menu_pages');
function my_remove_menu_pages()
{
	//if they are not the "admin"
	if ( current_user_can('administrator') == false ) 
	{
		//remove custom types
		remove_menu_page('edit.php?post_type=custom_type');
		//remove links
		remove_menu_page('link-manager.php');
		//remove pages
		remove_menu_page('edit.php?post_type=page');
		//remove comments
		remove_menu_page('edit-comments.php');
		//remove contact
		//Handled as a wp-config.php constant definition
		//remove tools
		remove_menu_page('tools.php');
		//remove posts
		remove_menu_page('edit.php');
		
	}
}

/*
Custom dashboard junk removal for site editors and authors
*/
add_action('wp_dashboard_setup', 'remove_normal_dashboard_widgets');
function remove_normal_dashboard_widgets()
{
	//if they are not the "admin"
	if ( current_user_can('administrator') == false )
	{	
		//remove a bunch of stuff they don't need to twiddle with
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		
	}
}

/*
@TODO: Site static assets content type
*/

add_action('init', 'static_custom_init');
function static_custom_init()
{
	$labels = array(
		'name' => _x('Static Assets', 'post type general name'),
		'singular_name' => _x('Static Asset', 'post type singular name'),
		'add_new' => _x('Add New', 'Static Asset'),
		'add_new_item' => __('Add New Static Asset'),
		'edit_item' => __('Edit Static Asset'),
		'new_item' => __('New Static Asset'),
		'view_item' => __('View Static Assets'),
		'search_items' => __('Search Static Assets'),
		'not_found' =>  __('No Static Assets found'),
		'not_found_in_trash' => __('No Static Assets found in Trash'),
		'parent_item_colon' => ''
	);
	
	register_taxonomy(
		'page_selection',
		'static asset',
		array(
				'hierarchical' 	=> true,
				'label'			=> 'Page Selection',
				'query_var'		=> true,
				'rewrite'		=> false
			)
	);
	
	register_taxonomy(
		'page_position',
		array(
			'static asset', 'project'
			),
		array(
				'hierarchical' 	=> true,
				'label'			=> 'Page Position',
				'query_var'		=> true,
				'rewrite'		=> false
			)
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('page_selection', 'page_position')
	);
	register_post_type('static asset', $args);
	
}



/*
Project custom content type
*/
add_action('init', 'project_custom_init');

function project_custom_init()
{
	$labels = array(
		'name' => _x('Projects', 'post type general name'),
		'singular_name' => _x('Project', 'post type singular name'),
		'add_new' => _x('Add New', 'Project'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Projects'),
		'not_found' =>  __('No Projects found'),
		'not_found_in_trash' => __('No Projects found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug'=>'','with_front'=>false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('page_position'),
		'has_archive' => true
	);
	register_post_type('project', $args);
}

/*
@TODO: Products custom content type
*/
add_action('init', 'product_custom_init');

function product_custom_init()
{
	$labels = array(
		'name' => _x('Products', 'post type general name'),
		'singular_name' => _x('Product', 'post type singular name'),
		'add_new' => _x('Add New', 'Product'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Product'),
		'new_item' => __('New Product'),
		'view_item' => __('View Product'),
		'search_items' => __('Search Product'),
		'not_found' =>  __('No Products found'),
		'not_found_in_trash' => __('No Products found in Trash'),
		'parent_item_colon' => ''
	);
	register_taxonomy(
		'product_type',
		'product',
		array(
				'hierarchical' 	=> true,
				'label'			=> 'Product type',
				'query_var'		=> true,
				'rewrite' => true
			)
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug'=>'','with_front'=>false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('product_type'),
		'has_archive' => true
	);
	register_post_type('product', $args);
}

/*
@TODO: Services custom content type
*/
add_action('init', 'service_custom_init');

function service_custom_init()
{
	$labels = array(
		'name' => _x('Services', 'post type general name'),
		'singular_name' => _x('Service', 'post type singular name'),
		'add_new' => _x('Add New', 'Service'),
		'add_new_item' => __('Add New Service'),
		'edit_item' => __('Edit Service'),
		'new_item' => __('New Service'),
		'view_item' => __('View Service'),
		'search_items' => __('Search Services'),
		'not_found' =>  __('No Services found'),
		'not_found_in_trash' => __('No Services found in Trash'),
		'parent_item_colon' => ''
	);
	register_taxonomy(
		'service_type',
		'service',
		array(
				'hierarchical' 	=> true,
				'label'			=> 'Service Type',
				'query_var'		=> true,
				'rewrite' => true
			)
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug'=>'','with_front'=>false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('service_type'),
		'has_archive' => true
	);
	register_post_type('service', $args);
}

/*
FAQ Custom Content type
*/

add_action('init', 'faq_custom_init');
function faq_custom_init()
{
	$labels = array(
	  'name' => _x('FAQs', 'post type general name'),
	  'singular_name' => _x('FAQ', 'post type singular name'),
	  'add_new' => _x('Add New', 'FAQ'),
	  'add_new_item' => __('Add New FAQ'),
	  'edit_item' => __('Edit FAQ'),
	  'new_item' => __('New FAQ'),
	  'view_item' => __('View FAQ'),
	  'search_items' => __('Search FAQs'),
	  'not_found' =>  __('No FAQs found'),
	  'not_found_in_trash' => __('No FAQs found in Trash'),
	  'parent_item_colon' => ''
	);
	$args = array(
	  'labels' => $labels,
	  'public' => true,
	  'publicly_queryable' => true,
	  'show_ui' => true,
	  'query_var' => true,
	  'rewrite' => false,
	  'capability_type' => 'post',
	  'hierarchical' => false,
	  'menu_position' => 5,
	  'supports' => array('title','editor')
	);
	register_post_type('faq',$args);
}


?>