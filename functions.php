<?php

function CentreAlfa_setup() {
    add_theme_support("post-thumbnails");
}

//function themename_widgets_init() {
//    register_sidebar( array(
//        'name'          => __( 'Menu', 'CentreAlfa' ),
//        'id'            => 'sidebar-1',
//        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//        'after_widget'  => '</aside>',
//        'before_title'  => '<h1 class="widget-title">',
//        'after_title'   => '</h1>',
//    ) );
//}

function register_my_menus() {
    register_nav_menus(
        [
            'header-menu' => __( 'Header Menu' ),
            'footer-menu-1' => __( 'Footer Menu 1' ),
            'footer-menu-2' => __( 'Footer Menu 2' ),
            'services-menu' => __( 'Services Menu' ),
            'services-menu-footer' => __( 'Services Menu Footer' ),
            'addresses-menu' => __( 'Adresses Menu' ),
        ]
    );
}

function create_post_type() {
    register_post_type( 'addresses',
        [
            'labels' => array(
                'name' => __( 'Adresses' ),
                'singular_name' => __( 'Adresse' )
            ),
            'description' => 'Administrer les coordonnées',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title']
        ]
    );

    register_post_type( 'emails',
        [
            'labels' => array(
                'name' => __( 'Emails' ),
                'singular_name' => __( 'Email' )
            ),
            'description' => 'Emails des différents services',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title']
        ]
    );

    register_post_type( 'sections',
        [
            'labels' => array(
                'name' => __( 'Sections' ),
                'singular_name' => __( 'Section' )
            ),
            'description' => 'Sections pour chaques services',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor']
        ]
    );

    register_taxonomy_for_object_type( 'category', 'sections' );
}

add_action( 'init', 'create_post_type' );
add_action( 'init', 'register_my_menus' );
add_action( 'widgets_init', 'themename_widgets_init' );
add_action( 'after_setup_theme', 'CentreAlfa_setup' );