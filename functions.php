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

function create_posts_type() {

    // Addresses
    register_post_type( 'addresses',
        [
            'labels' => array(
                'name' => __( 'Adresses' ),
                'singular_name' => __( 'Adresse' )
            ),
            'description' => 'Administrer les coordonnées',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-location-alt'
        ]
    );

    // Emails
    register_post_type( 'emails',
        [
            'labels' => array(
                'name' => __( 'Emails' ),
                'singular_name' => __( 'Email' )
            ),
            'description' => 'Emails des différents services',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-email-alt'
        ]
    );

    // Sections
    register_post_type( 'services',
        [
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Service' )
            ),
            'description' => 'Les services',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor'],
            'menu_icon' => 'dashicons-welcome-write-blog',
            'has_archive' => true
        ]
    );

    // Membres
    register_post_type( 'membres',
        [
            'labels' => array(
                'name' => __( 'Membres' ),
                'singular_name' => __( 'Membre' ),
                'add_new_item' => 'Ajouter un nouveau membre'
            ),
            'description' => 'Gérer les membres des équipes',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-businessman'
        ]
    );
    remove_post_type_support( 'membres', 'title' );

    // Tarifs
    register_post_type( 'tarifs',
        [
            'labels' => array(
                'name' => __( 'Tarifs' ),
                'singular_name' => __( 'Tarif' ),
                'add_new_item' => 'Ajouter un nouveau tarif'
            ),
            'description' => 'Gérer les tarifs',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-tickets-alt'
        ]
    );
    remove_post_type_support( 'tarifs', 'title' );

    // Questions
    register_post_type( 'questions',
        [
            'labels' => array(
                'name' => __( 'Questions' ),
                'singular_name' => __( 'Question' ),
                'add_new_item' => 'Ajouter une nouvelle question'
            ),
            'description' => 'Gérer les questions pour la page FAQ',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-editor-help'
        ]
    );
    remove_post_type_support( 'questions', 'title' );

    // Liens
    register_post_type( 'liens',
        [
            'labels' => array(
                'name' => __( 'Liens' ),
                'singular_name' => __( 'Lien' ),
                'add_new_item' => 'Ajouter un nouveau lien'
            ),
            'description' => 'Gérer les liens',
            'public' => true,
            'has_archive' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-admin-links'
        ]
    );
}

function register_taxonomies() {

    // Membres
    register_taxonomy( 'equipes', 'membres', [
        'labels' => [
            'name' => 'Équipes',
            'singular_name' => 'Équipe',
            'add_new_item' => 'Ajouter une nouvelle équipe',
            'edit_item' => 'Editer un membre',
            'update_item' => 'Editer un membre',
            'view_item' => 'Voir un membre'
        ],
        'show_in_menu' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'hierarchical' => true
    ] );

    // Services
    register_taxonomy( 'services-categories', 'services', [
        'labels' => [
            'name' => 'Catégories Services',
            'singular_name' => 'Catégorie Service',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'edit_item' => 'Editer une catégorie',
            'update_item' => 'Editer une catégorie',
            'view_item' => 'Voir une catégorie'
        ],
        'show_in_menu' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'hierarchical' => true
    ] );
}

# Set good columns
function set_membres_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Nom'),
        'taxonomy-equipes' => __('Équipe')
    );
}

# Display good colums
function my_manage_membres_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'name' :

            $name = get_post_meta( $post_id, 'name', true );

            if ( empty( $name ) ){
                echo __( 'Inconu' );
            } else {
                printf( $name );
            }

            break;

        default :
            break;
    }
}

function set_tarifs_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'service' => __('Service'),
        'tarifs' => __('Tarifs')
    );
}

function set_questions_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'question' => __('Question')
    );
}

# Display good colums
function my_manage_tarifs_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'service' :

            $service = get_post_meta( $post_id, 'service', true );

            if ( empty( $service ) ){
                echo __( 'Inconu' );
            } else {
                printf( $service );
            }

            break;

        case 'tarifs' :

            $tarif = get_post_meta( $post_id, 'tarifs', true );

            if ( empty( $tarif ) ){
                echo __( 'Inconu' );
            } else {
                printf( $tarif );
            }

            break;

        default :
            break;
    }
}

function my_manage_questions_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'question' :

            $question = get_post_meta( $post_id, 'question', true );

            if ( empty( $question ) ){
                echo __( 'Inconu' );
            } else {
                printf( $question );
            }

            break;

        default :
            break;
    }
}

# Remove item from menu
function custom_menu_page_removing() {
    remove_menu_page( 'index.php' ); //Dashboard
    //remove_menu_page( 'edit.php' ); // Posts
    remove_menu_page( 'tools.php' ); // Tools
    remove_menu_page( 'edit-comments.php' ); //Comments
    remove_menu_page( 'users.php' ); //Users
    remove_menu_page( 'upload.php' ); //Media
    //remove_menu_page( 'themes.php' ); // Apparance
}

function sortArrayByProperty($a, $b) {
    return $a->term_id > $b->term_id ? 1 : -1;
}

# Change default title placeholder for links
function wpfstop_change_default_title( $title ){
    $screen = get_current_screen();
    if ( 'liens' == $screen->post_type ){
        $title = 'Nom du lien';
    }
    return $title;
}

# Order search results by post_typ
function my_sort_custom( $orderby, $query ){
    global $wpdb;

    if(!is_admin() && is_search())
        $orderby =  $wpdb->prefix."posts.post_type ASC, {$wpdb->prefix}posts.post_date DESC";

    return  $orderby;
}

# Filters
add_filter('manage_membres_posts_columns' , 'set_membres_columns');
add_filter('manage_tarifs_posts_columns' , 'set_tarifs_columns');
add_filter('manage_questions_posts_columns' , 'set_questions_columns');
add_filter( 'enter_title_here', 'wpfstop_change_default_title' );
add_filter('posts_orderby','my_sort_custom',10,2);

# Actions
add_action( 'admin_menu', 'custom_menu_page_removing' );
add_action( 'manage_membres_posts_custom_column', 'my_manage_membres_columns', 10, 2 );
add_action( 'manage_tarifs_posts_custom_column', 'my_manage_tarifs_columns', 10, 2 );
add_action( 'manage_questions_posts_custom_column', 'my_manage_questions_columns', 10, 2 );
add_action( 'init', 'create_posts_type' );
add_action( 'init', 'register_taxonomies' );
add_action( 'init', 'register_my_menus' );
add_action( 'widgets_init', 'themename_widgets_init' );
add_action( 'after_setup_theme', 'CentreAlfa_setup' );
