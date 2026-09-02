<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
</main>
<footer class="site-footer">
    <div class="container">
        <div class="footer-cta">
            <h3><?php esc_html_e('Need a growth partner that actually moves the needle?', 'brand-builders'); ?></h3>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary"><?php esc_html_e('Book a call', 'brand-builders'); ?></a>
        </div>
        <div class="footer-grid">
            <div class="footer-brand-column">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand footer-brand">
                    <span class="brand-mark">B</span><span><?php bloginfo('name'); ?></span>
                </a>
                <p><?php bloginfo('description'); ?></p>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer')) : dynamic_sidebar('footer'); else : ?>
                    <h4><?php esc_html_e('Explore', 'brand-builders'); ?></h4>
                    <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'fallback_cb' => 'wp_page_menu')); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(wp_date('Y')); ?> <?php bloginfo('name'); ?></p>
            <div class="footer-legal">
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'brand-builders'); ?></a>
                <a href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>"><?php esc_html_e('Terms & Conditions', 'brand-builders'); ?></a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
