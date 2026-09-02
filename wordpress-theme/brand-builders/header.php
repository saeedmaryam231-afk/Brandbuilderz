<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container nav-wrap">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="brand" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> home">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="brand-mark">B</span>
                <span><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>
        <nav class="main-nav" aria-label="<?php esc_attr_e('Main navigation', 'brand-builders'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'wp_page_menu',
            ));
            ?>
        </nav>
        <div class="nav-actions">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary"><?php esc_html_e('Book a call', 'brand-builders'); ?></a>
        </div>
        <button class="menu-toggle" type="button" aria-label="<?php esc_attr_e('Open menu', 'brand-builders'); ?>" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>
<main>
