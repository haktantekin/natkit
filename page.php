<?php /* Template Name: Image */ ?>
<?php get_header(); ?>
<style>
    html {
        margin-top: 0 !important;
    }
    .send-photo{
        display: none;
    }
</style>
<div class="page-content static-page">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full');
            $nowebp = str_replace(".webp", "", $url);
            $nowebp = $nowebp;
            ?>
            <div class="page-content-img">
                <img alt="<?php the_title(); ?>" src="<?php echo $nowebp ?>" />
            </div>
            <div class="page-content-text">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>

<?php get_footer(); ?>