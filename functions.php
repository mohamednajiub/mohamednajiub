<?php

function add_styles()
{
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.min.css');
    wp_enqueue_style('bootstrap_grid', get_template_directory_uri().'/css/bootstrap-grid.min.css');
    
    
    // horizontal timeline 2.0
    wp_enqueue_style('horizontal', 'https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2/css/horizontal_timeline.2.0.min.css');

    wp_enqueue_style('theme_main_styles', get_template_directory_uri().'/css/main.css');
}


function add_scripts()
{
    wp_enqueue_script("jquery");
    wp_enqueue_script('theme_main_script', get_template_directory_uri() . '/js/main.bundle.js' );
    
    // horizontal timeline 2.0
    wp_enqueue_script('horizontal','https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2/JavaScript/horizontal_timeline.2.0.min.js' );
}


function theme_features()
{
    add_theme_support('title-tag');
    // Enable support for Post Thumbnails and featured images on posts and pages.
    add_theme_support('post-thumbnails');
    // html5 features
    $html5_args = array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    );
    add_theme_support( 'html5', $html5_args );
}

function theme_post_types(){
    register_post_type( 'technologies',
    // technologies custom post type Options
        array(
            'labels' => array(
                'menu_name' => 'Technologies',
                'name' => 'Technologies',
                'singular_name' => 'Technology',
                'add_new' => 'Add Technology',
                'add_new_item' => 'Add Technology',
                'edit_item' => 'Edit Technology',
                'view_item' => 'View Technology',
                'view_items' => 'View All Technologies',
                'search_items' => 'Search in Technologies',
                'not_found' => 'No Technologies found in your search',
                'all_items' => 'All Technologies',
                'insert_into_item' => 'Insert in Technologies Post Type',
                'uploaded_to_this_item' => 'Upload this to Technologies Post Type',    
            ),
            'description' => 'Technogies is the skills that I Know',
            'show_in_rest' => true,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-dashboard',
            'supports' => array('title', 'excerpt', 'thumbnail'),
            // the post type doesn't have single page
            'publicly_queryable' => false
        )
    );


    register_post_type( 'experience',
    // experience custom post type Options
        array(
            'labels' => array(
                'menu_name' => 'Experiences',
                'name' => 'Experiences',
                'singular_name' => 'Experience',
                'add_new' => 'Add new Experience',
                'add_new_item' => 'Add New Experience',
                'edit_item' => 'Edit Experience',
                'view_item' => 'View Experience',
                'view_items' => 'View All Experiences',
                'search_items' => 'Search in Experiences',
                'not_found' => 'No Experiences found in your search',
                'all_items' => 'All Experiences',
                'insert_into_item' => 'Insert in Experiences Post Type',
                'uploaded_to_this_item' => 'Upload this to Experiences Post Type',    
            ),
            'description' => 'Experiences is the all work experience that I worked on.',
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-id',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}

function mohamed_najiub_metabox() {

	$cmb = new_cmb2_box( array(
		'id'           => 'job_timeline',
		'title'        => 'Job Timeline',
        'object_types' => array( 'experience' ),
        'context'      => 'advanced',
        'priority'     => 'high'
	) );

	$cmb->add_field( array(
        'name' => 'Start date',
        'id'   => 'mn_job_start_date',
        'type' => 'text_date'
    ) );

    $cmb->add_field( array(
        'name' => 'End Date',
        'id'   => 'mn_job_end_date',
        'type' => 'text_date'
    ) );

}
add_action( 'cmb2_admin_init', 'mohamed_najiub_metabox' );

add_action("wp_enqueue_scripts", "add_styles");
add_action("wp_enqueue_scripts", "add_scripts");
add_action("after_setup_theme", "theme_features");
add_action( 'init', 'theme_post_types' );