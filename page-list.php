<?php /* Template Name: List */ ?>
<?php get_header(); ?>
<style>
    html {
        margin-top: 0 !important;
    }
    .send-photo{
        display: none;
    }
</style>
<div class="page-content static-page book-list-page">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-content-text">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>

<?php get_footer(); ?>