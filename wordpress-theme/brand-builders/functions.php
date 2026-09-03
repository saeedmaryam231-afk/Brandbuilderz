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

function brand_builders_customize_register($wp_customize) {
    $wp_customize->add_section('brand_builders_contact', array(
        'title' => __('Contact Form', 'brand-builders'),
        'priority' => 35,
    ));

    $settings = array(
        'contact_heading' => array('Contact form heading', 'Tell us what you are building next.'),
        'contact_button' => array('Submit button text', 'Send inquiry'),
        'contact_email' => array('Notification email', get_option('admin_email')),
        'contact_success' => array('Success message', 'Thanks. We will be in touch shortly.'),
    );

    foreach ($settings as $key => $values) {
        $wp_customize->add_setting('brand_builders_' . $key, array(
            'default' => $values[1],
            'sanitize_callback' => $key === 'contact_email' ? 'sanitize_email' : 'sanitize_text_field',
        ));
        $wp_customize->add_control('brand_builders_' . $key, array(
            'label' => __($values[0], 'brand-builders'),
            'section' => 'brand_builders_contact',
            'type' => $key === 'contact_email' ? 'email' : 'text',
        ));
    }
}
add_action('customize_register', 'brand_builders_customize_register');

function brand_builders_contact_form_handler() {
    if (!isset($_POST['brand_builders_contact_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['brand_builders_contact_nonce'])), 'brand_builders_contact')) {
        wp_die(esc_html__('Security check failed.', 'brand-builders'));
    }

    $name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $company = sanitize_text_field(wp_unslash($_POST['company'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));
    $recipient = get_theme_mod('brand_builders_contact_email', get_option('admin_email'));

    if (!$name || !is_email($email) || !$message) {
        wp_safe_redirect(add_query_arg('contact_error', '1', wp_get_referer()));
        exit;
    }

    $body = sprintf("Name: %s\nEmail: %s\nCompany: %s\n\n%s", $name, $email, $company, $message);
    wp_mail($recipient, __('New website inquiry', 'brand-builders'), $body, array('Reply-To: ' . $email));
    wp_safe_redirect(add_query_arg('contact_sent', '1', wp_get_referer()));
    exit;
}
add_action('admin_post_nopriv_brand_builders_contact', 'brand_builders_contact_form_handler');
add_action('admin_post_brand_builders_contact', 'brand_builders_contact_form_handler');
