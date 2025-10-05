<?php
/**
 * Shalom Darom theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', function () {
    load_theme_textdomain( 'shalom-darom', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'automatic-feed-links' );
} );

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'shalom-darom-style', get_stylesheet_uri(), [], '1.0.0' );
    wp_enqueue_style( 'shalom-darom-fonts', 'https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;600;700&family=Rubik:wght@400;500&display=swap', [], null );
} );
