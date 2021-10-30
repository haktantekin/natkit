<?php /* Template Name: Image */ ?>
<?php get_header(); ?>
<style>
    html {
        margin-top: 0 !important;
    }
</style>
<div class="page-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full');
            ?>
            <div class="page-content-img">
                <?php if (has_post_thumbnail()) { ?>
                    <img alt="<?php the_title(); ?>" src="<?php echo $url ?>" />
                <?php } else { ?>
                    <img alt="<?php the_title(); ?>" src="<?php echo 'https://kitapalintilari.com/wp-content/uploads/2021/07/kitapalintilari.jpg' ?>" />
                <?php }  ?>

            </div>
            <div class="page-content-text">
                <div class="page-content-cat">
                    <?php the_category(', ') ?>
                </div>
                <div class="page-content-cat page-content-tag">
                    <?php the_tags(); ?>
                </div>
                <h1><?php the_title(); ?></h1>
                <?php
                the_content();
                ?>
                <div class="post-social twitter"> Twitter'da <a href="https://twitter.com/alintilari_" rel="noopener" target="_blank">Kitap Alıntııları</a></div>
                <div class="post-social instagram"> Instagram'da <a href="https://www.instagram.com/kitapalintilaricom/" rel="noopener" target="_blank">Kitap Alıntııları</a></div>
                <div class="post-social pinterest"> Pinterest'te <a href="https://tr.pinterest.com/kitapalintilaricom" rel="noopener" target="_blank">Kitap Alıntııları</a></div>

                <?php $orig_post = $post;
                global $post;
                $tags = wp_get_post_tags($post->ID);

                if ($tags && count($tags) > 1) {

                    $tag_ids = array();

                    echo ' <div class="other-post">';
                    echo ' <h3>Yazarın Diğer Konuları</h3>';

                    foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                    $args = array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 3, // Number of related posts that will be shown.
                        'ignore_sticky_posts' => 1
                    );
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) {
                            $my_query->the_post(); ?>
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                <?php }
                    }
                    echo '</div>';
                }
                $post = $orig_post;
                wp_reset_query(); ?>


                <div class="other-post">
                    <h3><?php the_category(', ') ?> Kategorisindeki Diğer Konular</h3>
                    <?php $orig_post = $post;
                    global $post;
                    $categories = get_the_category($post->ID);
                    if ($categories) {
                        $category_ids = array();
                        foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                        $args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => 3,
                            'ignore_sticky_posts' => 1
                        );

                        $my_query = new wp_query($args);
                        if ($my_query->have_posts()) {

                            while ($my_query->have_posts()) {
                                $my_query->the_post(); ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <?
                            }
                        }
                    }
                    $post = $orig_post;
                    wp_reset_query(); ?>

                </div>
                <?php
                if (!empty(get_post_meta($post->ID, "Yazan", true)) && !empty(get_post_meta($post->ID, "Yazar Link", true))) { ?>
                    <div class="content-author"><a href="<?php echo get_post_meta($post->ID, "Yazar Link", true); ?>"><i class="fa fa-edit"></i> <?php echo get_post_meta($post->ID, "Yazan", true); ?> Kimdir?</a></div>
                <?php } ?>
                <?php
                if (!empty(get_post_meta($post->ID, "Kitap", true)) && !empty(get_post_meta($post->ID, "Kitap Link", true))) { ?>
                    <div class="content-book"><a href="<?php echo get_post_meta($post->ID, "Kitap Link", true); ?>"><i class="fa fa-book"></i> <?php echo get_post_meta($post->ID, "Kitap", true); ?> Kitap Konusu</a></div>
                <?php } ?>
                <?php
                if (!empty(get_post_meta($post->ID, "Etiket", true)) && !empty(get_post_meta($post->ID, "Yazan", true))) { ?>
                    <div class="content-author"><a target="_top" href="<?php echo get_post_meta($post->ID, "Etiket", true); ?>"><i class="fa fa-share"></i><?php echo get_post_meta($post->ID, "Yazan", true); ?> Alıntıları</a></div>
                <?php } ?>

            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        <?php comments_template() ?>
            </div>
            <?php get_footer(); ?>