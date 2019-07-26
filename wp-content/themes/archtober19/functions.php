<?php 

	/* 
	archtober 2019,
	update to archtober 2018 theme
	by lukas eigler-harding
	*/


/* opening */
function archtober_scripts() {
	$ver = '1.1';
	wp_enqueue_style( 'style', get_stylesheet_uri(), null, $ver );
	wp_enqueue_script( 'jqueryfull', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js', array(), false );
	wp_enqueue_script( 'TweenMax', get_template_directory_uri() . '/assets/js/TweenMax.min.js', array(), false );
	wp_enqueue_script( 'ScrollToPlugin', get_template_directory_uri() . '/assets/js/ScrollToPlugin.min.js', array(), false );
	wp_enqueue_script( 'barbaUmd', get_template_directory_uri() . '/assets/js/barba.umd.js', array(), true );
	wp_enqueue_script( 'polyfill', 'https://polyfill.io/v3/polyfill.min.js?features=Promise%2CArray.prototype.filter%2CMap%2CArray.prototype.find%2Cdocument.querySelector%2CArray.prototype.forEach%2CArray.prototype.includes', array(), true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/script.js', array('jqueryfull', 'TweenMax', 'ScrollToPlugin', 'barbaUmd', 'polyfill'), $ver, true );
}
add_action( 'wp_enqueue_scripts', 'archtober_scripts' );


/* TEMPLATE FUNCTIONS */
/* EVENTS */
function register_events() {
	register_post_type( 'events',
		array(
			'labels' => array(
				'name' => __( 'Event Index' ),
				'singular_name' => __( 'Event' )
			),
			'menu_position' => 4,
			'menu_icon' => 'dashicons-building',
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'thumbnail', 'editor')
		)
	);
}
add_action( 'init', 'register_events' );


function register_event_types() {
	$event_type_args = array(
		'labels' => array(
			'name'              => _x( 'Event Types', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Event Type', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Event Types', 'textdomain' ),
			'all_items'         => __( 'All Event Types', 'textdomain' ),
			'parent_item'       => __( 'Parent Event Type', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Event Type:', 'textdomain' ),
			'edit_item'         => __( 'Edit Event Type', 'textdomain' ),
			'update_item'       => __( 'Update Event Type', 'textdomain' ),
			'add_new_item'      => __( 'Add New Event Type', 'textdomain' ),
			'new_item_name'     => __( 'New Event Type Name', 'textdomain' ),
			'menu_name'         => __( 'Event Types', 'textdomain' ),
		),
		'hierarchical' => true,
		'show_uri' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
	);
	register_taxonomy( 'event_type', array( 'events' ), $event_type_args );
}
add_action( 'init', 'register_event_types' );


/* EXHIBTIONS */
function register_exhibitions() {
	register_post_type( 'exhibitions',
		array(
			'labels' => array(
				'name' => __( 'Exhibitions' ),
				'singular_name' => __( 'Exhibition' )
			),
			'menu_position' => 5,
			'menu_icon' => 'dashicons-calendar-alt',
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'thumbnail', 'editor')
		)
	);
}
add_action( 'init', 'register_exhibitions' );

function register_institutions() {
	$institution_args = array(
		'labels' => array(
			'name'              => _x( 'Institutions', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Institution', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Institutions', 'textdomain' ),
			'all_items'         => __( 'All Institutions', 'textdomain' ),
			'parent_item'       => __( 'Parent Institution', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Institution:', 'textdomain' ),
			'edit_item'         => __( 'Edit Institution', 'textdomain' ),
			'update_item'       => __( 'Update Institution', 'textdomain' ),
			'add_new_item'      => __( 'Add New Institution', 'textdomain' ),
			'new_item_name'     => __( 'New Institution Name', 'textdomain' ),
			'menu_name'         => __( 'Institutions', 'textdomain' ),
		),
		'hierarchical' => true,
		'show_uri' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
	);
	register_taxonomy( 'institution', array( 'exhibitions' ), $institution_args );
}
add_action( 'init', 'register_institutions' );


/* SPONSORS */

function register_sponsors() {
	register_post_type( 'sponsors',
		array(
			'labels' => array(
				'name' => __( 'Sponsors' ),
				'singular_name' => __( 'Sponsor' )
			),
			'menu_position' => 6,
			'menu_icon' => 'dashicons-universal-access',
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'thumbnail', 'editor')
		)
	);
}
add_action( 'init', 'register_sponsors' );

function register_sponsor_types() {
	$sponsor_type_args = array(
		'labels' => array(
			'name'              => _x( 'Sponsor Types', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Sponsor Type', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Sponsor Types', 'textdomain' ),
			'all_items'         => __( 'All Sponsor Types', 'textdomain' ),
			'parent_item'       => __( 'Parent Sponsor Type', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Sponsor Type:', 'textdomain' ),
			'edit_item'         => __( 'Edit Sponsor Type', 'textdomain' ),
			'update_item'       => __( 'Update Sponsor Type', 'textdomain' ),
			'add_new_item'      => __( 'Add New Sponsor Type', 'textdomain' ),
			'new_item_name'     => __( 'New Sponsor Type Name', 'textdomain' ),
			'menu_name'         => __( 'Sponsor Types', 'textdomain' ),
		),
		'hierarchical' => true,
		'show_uri' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
	);
	register_taxonomy( 'sponsor_type', array( 'sponsors' ), $sponsor_type_args );
}
add_action( 'init', 'register_sponsor_types' );


/* PARTNERS */
function register_partners() {
	register_post_type( 'partners',
		array(
			'labels' => array(
				'name' => __( 'Partners' ),
				'singular_name' => __( 'Partner' )
			),
			'menu_position' => 7,
			'menu_icon' => 'dashicons-universal-access-alt',
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'thumbnail', 'editor')
		)
	);
}
add_action( 'init', 'register_partners' );


function register_partner_types() {
	$partner_type_args = array(
		'labels' => array(
			'name'              => _x( 'Partner Types', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Partner Type', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Partner Types', 'textdomain' ),
			'all_items'         => __( 'All Partner Types', 'textdomain' ),
			'parent_item'       => __( 'Parent Partner Type', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Partner Type:', 'textdomain' ),
			'edit_item'         => __( 'Edit Partner Type', 'textdomain' ),
			'update_item'       => __( 'Update Partner Type', 'textdomain' ),
			'add_new_item'      => __( 'Add New Partner Type', 'textdomain' ),
			'new_item_name'     => __( 'New Partner Type Name', 'textdomain' ),
			'menu_name'         => __( 'Partner Types', 'textdomain' ),
		),
		'hierarchical' => true,
		'show_uri' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
	);
	register_taxonomy( 'partner_type', array( 'partners' ), $partner_type_args );
}
add_action( 'init', 'register_partner_types' );

# add options page for option
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(); 
}

/* EXTRA */
# day related functions

function weekday_month_day( $datetime ){
	// Friday, October 13
	date_default_timezone_set('US/Eastern');
	$the_date = new DateTime($datetime);
	$day_of_month = $the_date->format('j');
	$date_str = $the_date->format('Y-m-d');
	$month = $the_date->format('M');
	$date_unix = strtotime($date_str);
	$day_of_week = date("l", $date_unix);

	$str = $day_of_week.", ".$month.". ".$day_of_month;
	return $str;
}

function day_slug($daytime){
	date_default_timezone_set('US/Eastern');
	$the_date = new DateTime($datetime);
	$date_str = $the_date->format('Y-m-d');
	$date_unix = strtotime($date_str);
	$str = date("l", $date_unix);
	return $str;
}


# cleanup url for display purposes:
function pretty_url( $url ) {
	$url = http($url);
	$url = parse_url($url);
	$url = $url['host'];
	$url = preg_replace( '#^www1\.(.+\.)#i', '$1', $url );
	$url = preg_replace( '#^www\.(.+\.)#i', '$1', $url );
	return $url;
}

function http($url) {
	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
	}
	return $url;
}


function get_terms_str( $post_id, $taxonomy ) {
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	$arr = array();
	foreach( $terms as $obj ){
		array_push( $arr, $obj->name );
	}
	$str = implode( ', ', $arr );
	return $str;
} # return string of terms associated w post

function get_terms_str_slug( $post_id, $taxonomy ) {
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	$arr = array();
	foreach( $terms as $obj ){
		array_push( $arr, $obj->slug );
	}
	$str = implode( ' ', $arr );
	return $str;
} # return string of slugified terms associated w post

function get_terms_array_slug( $post_id, $taxonomy ) {
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	$arr = array();
	foreach( $terms as $obj ){
		array_push( $arr, $obj->slug );
	}
	#print_r(json_encode($arr));
	return json_encode($arr);
} # return array of slugified terms associated w post

function get_terms_icons( $post_id, $taxonomy ) {
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	$arr = array();
	foreach( $terms as $obj ){
		$the_icon = get_field('event_type_icon', $obj->taxonomy . '_' . $obj->term_id);
		$icon_horizontal = get_field('event_type_horizontal', $obj->taxonomy . '_' . $obj->term_id);
		$icon_vertical = get_field('event_type_vertical', $obj->taxonomy . '_' . $obj->term_id);
		$icon_rotation = get_field('event_type_rotation', $obj->taxonomy . '_' . $obj->term_id);
		$icon_scale = get_field('event_type_scale', $obj->taxonomy . '_' . $obj->term_id);
		
		$icon_attributes = [
			'the_icon' => $the_icon, 
			'icon_x' => $icon_horizontal, 
			'icon_y' => $icon_vertical, 
			'icon_rotation' => $icon_rotation, 
			'icon_scale' => $icon_scale
		];

		#echo $the_icon;
		array_push( $arr, $icon_attributes );
	}
	return $arr;
} # return string of icon urls associated w post

function get_terms_height( $post_id, $taxonomy ) {
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	$arr = array();
	foreach( $terms as $obj ){
		$the_height = get_field('event_type_height', $obj->taxonomy . '_' . $obj->term_id);
		array_push( $arr, $the_height.' ' );
	}
	$str = implode( ',', $arr );
	return $str;
} # return string of icon urls associated w post

add_image_size( 'custom', 800, 533, true );
add_filter( 'show_admin_bar', '__return_false' ); # when logged in