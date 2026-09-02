<?php
get_header();
while (have_posts()) : the_post();
?>
<section class="page-section section">
    <div class="container page-copy">
        <p class="eyebrow"><?php esc_html_e('Brand Builders', 'brand-builders'); ?></p>
        <h1><?php the_title(); ?></h1>
        <?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'page-featured-image')); endif; ?>
        <?php the_content(); ?>
    </div>
</section>
<?php
endwhile;
get_footer();
