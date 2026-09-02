<?php
/**
 * Brand Builders theme setup.
 */

if (!defined('ABSPATH')) {
    exit;
}

function brand_builders_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 80,
        'width' => 240,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'brand-builders'),
        'footer' => __('Footer Menu', 'brand-builders'),
    ));
}
add_action('after_setup_theme', 'brand_builders_setup');

function brand_builders_assets() {
    wp_enqueue_style('brand-builders-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('brand-builders-site', get_template_directory_uri() . '/assets/site.css', array('brand-builders-style'), '1.0.0');
    wp_enqueue_script('brand-builders-script', get_template_directory_uri() . '/assets/theme.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'brand_builders_assets');

function brand_builders_widgets() {
    register_sidebar(array(
        'name' => __('Footer', 'brand-builders'),
        'id' => 'footer',
        'description' => __('Optional footer widgets.', 'brand-builders'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'brand_builders_widgets');
