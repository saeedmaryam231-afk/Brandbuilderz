<?php
get_header();
?>
<section class="section">
    <div class="container page-copy">
        <p class="eyebrow"><?php esc_html_e('Latest updates', 'brand-builders'); ?></p>
        <h1><?php bloginfo('name'); ?></h1>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class('info-card'); ?> id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e('Add your first page or post from the WordPress dashboard.', 'brand-builders'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer();
