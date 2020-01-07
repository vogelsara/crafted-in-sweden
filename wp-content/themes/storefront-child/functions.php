<?php
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles' );
function storefront_child_enqueue_styles() {
 
    $parent_style = 'storefront';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        rand(111,9999)
    );
}

add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );
function custom_add_google_fonts() {
    wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Anton|Open+Sans+Condensed:300,300i,700&display=swap&subset=latin-ext', false );
    }
    
add_action('init', 'function_to_add_author_woocommerce', 999 );

function function_to_add_author_woocommerce() {
    add_post_type_support( 'product', 'author' );
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_product_author', 6);
function woocommerce_product_author() {
    the_author();
}

?>