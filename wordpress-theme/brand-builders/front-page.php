<?php
get_header();
while (have_posts()) : the_post();
?>
<section class="hero hero-home">
    <div class="container page-copy editable-homepage">
        <?php the_content(); ?>
    </div>
</section>
<?php
endwhile;
get_footer();
