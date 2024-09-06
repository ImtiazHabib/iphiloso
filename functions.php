<?php

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
	add_theme_support("post-formats",array("image","audio","video","quote","galary"));
	add_editor_style( "/assets/markup/css/editor-style.css" );

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
?>
