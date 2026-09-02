<?php
get_header();
?>
<section class="section">
    <div class="container error-panel">
        <div class="error-badge">404</div>
        <h1><?php esc_html_e('Looks like this page wandered off.', 'brand-builders'); ?></h1>
        <p><?php esc_html_e('The page you are looking for may have moved or never existed.', 'brand-builders'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php esc_html_e('Go home', 'brand-builders'); ?></a>
    </div>
</section>
<?php get_footer();
