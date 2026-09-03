<?php
get_header();
while (have_posts()) : the_post();
    $sent = isset($_GET['contact_sent']);
    $error = isset($_GET['contact_error']);
?>
<section class="section">
    <div class="container contact-layout">
        <div class="page-copy">
            <p class="eyebrow"><?php esc_html_e('Start a conversation', 'brand-builders'); ?></p>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
        <div class="contact-form">
            <h2><?php echo esc_html(get_theme_mod('brand_builders_contact_heading', __('Tell us what you are building next.', 'brand-builders'))); ?></h2>
            <?php if ($sent) : ?><p class="form-notice"><?php echo esc_html(get_theme_mod('brand_builders_contact_success', __('Thanks. We will be in touch shortly.', 'brand-builders'))); ?></p><?php endif; ?>
            <?php if ($error) : ?><p class="form-notice"><?php esc_html_e('Please check your details and try again.', 'brand-builders'); ?></p><?php endif; ?>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="brand_builders_contact">
                <?php wp_nonce_field('brand_builders_contact', 'brand_builders_contact_nonce'); ?>
                <div class="field-row">
                    <div><label for="name"><?php esc_html_e('Name', 'brand-builders'); ?></label><input id="name" name="name" type="text" required></div>
                    <div><label for="email"><?php esc_html_e('Email', 'brand-builders'); ?></label><input id="email" name="email" type="email" required></div>
                </div>
                <div><label for="company"><?php esc_html_e('Company', 'brand-builders'); ?></label><input id="company" name="company" type="text"></div>
                <div><label for="message"><?php esc_html_e('Project details', 'brand-builders'); ?></label><textarea id="message" name="message" required></textarea></div>
                <button type="submit" class="btn btn-primary"><?php echo esc_html(get_theme_mod('brand_builders_contact_button', __('Send inquiry', 'brand-builders'))); ?></button>
            </form>
        </div>
    </div>
</section>
<?php
endwhile;
get_footer();