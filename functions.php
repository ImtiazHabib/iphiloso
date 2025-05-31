<?php
require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));
require_once(get_theme_file_path("/widgets/social-icons-widget.php"));

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
	// footer menus 
	register_nav_menus( array(
		'footer-left-menu' => __("Quick Links","iphiloso"),
		'footer-middle-menu' => __("Archives","iphiloso"),
		'footer-right-menu' => __("Social Links","iphiloso"),
	) );
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


	 


	echo wp_kses_post($links);

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
	register_sidebar( array(
		'name'          => __( 'Footer Right Description', 'iphiloso' ),
		'id'            => 'footer-right-description',
		'description'   => __( 'this widget will show on right side of the footer area', 'iphiloso' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Our NewsLetter', 'iphiloso' ),
		'id'            => 'footer-our-newsletter',
		'description'   => __( 'this widget will show on right side of the footer area', 'iphiloso' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'copyright', 'iphiloso' ),
		'id'            => 'copyright',
		'description'   => __( 'this widget will show on right side of the footer area', 'iphiloso' ),
		'before_widget' => '<div class="s-footer__copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'iphiloso_register_widget' );

function iphiloso_cpt_link($post_link,$id){
    $p=get_post($id);
	if(is_object($p) && "chapter" == get_post_type($id) ){
		$parent_post_id = get_field('parent_book');
		$parent_post = get_post($parent_post_id);
		if($parent_post){
			$post_link = str_replace("%book%",$parent_post->post_name,$post_link);
		}
	}
	return $post_link;
}
add_filter("post_type_link","iphiloso_cpt_link",1,2);

function iphiloso_footer_language_heading( $title ) {
    if ( is_post_type_archive( 'books' ) || is_tax('languages') ) {
        $title = __( 'Languages', 'philosophy' );
    }

    return $title;
}

add_filter( 'iphiloso_footer_tags_title_filter', 'iphiloso_footer_language_heading' );

function iphiloso_footer_language_terms( $tags ) {
    if ( is_post_type_archive( 'books' ) || is_tax('languages') ) {
        $tags = get_terms( array(
            'taxonomy'   => 'languages',
            'hide_empty' => true
        ) );
    }
    return $tags;
}

add_filter( 'iphiloso_footer_tags_terms_filter', 'iphiloso_footer_language_terms' );

?>
