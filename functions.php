<?php
require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));


// cache cleaar on assets file
if(site_url( )=="http://localhost:8080/ithemedev"){
	define("VERSION", time());
}else{
	define("VERSION",wp_get_theme()->get("Version"));
}

// after theme setup
function iphiloso_after_setup_theme(){
	// add textdomain
	load_theme_textdomain("iphiloso");
	// add theme support
	add_theme_support( "post-thumbnails" );
	add_theme_support( "title-tags" );
	add_theme_support('html5',array('seach-form','comment-list'));
	add_theme_support("post-formats",array("image","audio","video","quote","gallery","link"));
	add_editor_style( "/assets/markup/css/editor-style.css" );
	add_image_size("iphiloso_square",400,400, true );

	// register menu
	register_nav_menu( "topmenu", __("Top Menu","iphiloso"));
}
add_action( "after_setup_theme","iphiloso_after_setup_theme" );

// assets including
function iphiloso_assets_including(){
	// css
	wp_enqueue_style( "iphiloso_font_awesome", get_theme_file_uri( "/assets/markup/css/font-awesome/css/font-awesome.min.css" ),null,"1.0");
	wp_enqueue_style("iphiloso_font",get_theme_file_uri("/assets/markup/css/fonts.css"),null,"1.0");
	wp_enqueue_style("iphiloso_base",get_theme_file_uri("/assets/markup/css/base.css"),null,"1.0");
	wp_enqueue_style("iphiloso_vendor",get_theme_file_uri("/assets/markup/css/vendor.css"),null,"1.0");
	wp_enqueue_style("iphiloso_main",get_theme_file_uri("/assets/markup/css/main.css"),null,"1.0");
	wp_enqueue_style("iphiloso_main_style",get_theme_file_uri(),null,VERSION);

	// js
	wp_enqueue_script("iphiloso_modernizr",get_theme_file_uri("/assets/markup/js/modernizr.js"),null,"1.0");
	wp_enqueue_script("iphiloso_pace",get_theme_file_uri("/assets/markup/js/pace.min.js"),null,"1.0");
	wp_enqueue_script("iphiloso_plugin",get_theme_file_uri("/assets/markup/js/plugins.js"),array("jquery"),"1.0",true);
	wp_enqueue_script("iphiloso_main",get_theme_file_uri("/assets/markup/js/main.js"),array("jquery"),"1.0",true);
}
add_action("wp_enqueue_scripts","iphiloso_assets_including");


function iphiloso_pagination_links(){
	global $wp_query;

	$links = paginate_links(array(
		"current"=>max(1,get_query_var('paged')),
		"total"=> $wp_query->max_num_pages,
		"mid-size"=>3,
		"type"=>"list"
	));
	$links = str_replace("<ul class='page-numbers'>","<ul>", $links);
	$links = str_replace("page-numbers","pgn__num", $links);
	$links = str_replace("next page-numbers","pgn__next", $links);


	 


	echo $links;

}

remove_action("term_description","wpautop");
/**
 * Add a sidebar.
 */
function iphiloso_register_widget() {
	register_sidebar( array(
		'name'          => __( 'About Us Page Sidebar', 'iphiloso' ),
		'id'            => 'about-us-sidebar',
		'description'   => __( 'Widgets in this area will be shown on about us page.', 'iphiloso' ),
		'before_widget' => '<li id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Contact  Page Maps', 'iphiloso' ),
		'id'            => 'contact-page-maps',
		'description'   => __( 'Widgets in this area will be shown on Contact page.', 'iphiloso' ),
		'before_widget' => '<li id="%1$s" class="%2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Contact Page Description', 'iphiloso' ),
		'id'            => 'contact-page-description',
		'description'   => __( 'Widgets in this area will be shown on contact page.', 'iphiloso' ),
		'before_widget' => '<li id="%1$s" class="%2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'iphiloso_register_widget' );
?>
