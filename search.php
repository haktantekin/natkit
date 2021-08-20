<?php get_header(); ?>

<div class="row">
    <div class="col-12">
        <div class="page-top">
            <h1>
                <?php printf(__('%s', 'nat kah'), get_search_query()); ?> ile ilgili konularımız
            </h1>
        </div>
        <div class="content-list">
            <?php wp_reset_query(); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>
                    <?php
                    $the_cat = get_the_category();
                    $category_name = $the_cat[0]->cat_name;
                    $category_link = get_category_link($the_cat[0]->cat_ID);
                    ?>
                    <div class="content-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="content-img">
                                <img width="350" height="353" alt="<?php the_title(); ?>" src="<?php echo $url ?>" />
                            </div>
                        </a>
                        <div class="content-cat">
                            <?php the_category(', ') ?>
                        </div>
                        <div class="content-date">
                            <?php the_time('d.m.y ') ?>
                        </div>
                        <div class="content-text">
                            <a href="<?php the_permalink(); ?>">
                                <h2>
                                    <?php the_title(); ?>
                                </h2>
                                <p>
                                    <?php the_excerpt();  ?>
                                </p>

                            </a>
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
                                <div class="content-author"><a target="_top" href="<?php echo get_post_meta($post->ID, "Etiket", true); ?>"><i class="fa fa-share"></i><?php echo get_post_meta($post->ID, "Yazan", true); ?> Kitap Alıntıları</a></div>
                            <?php } ?>
                            <?php
                            if (!empty(get_post_meta($post->ID, "Kitap", true)) && !empty(get_post_meta($post->ID, "Alıntı", true))) { ?>
                                <div class="content-author"><a target="_top" href="<?php echo get_post_meta($post->ID, "Alıntı", true); ?>"><i class="fa fa-share"></i><?php echo get_post_meta($post->ID, "Kitap", true); ?> Kitap Alıntıları</a></div>
                            <?php } ?>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wpex_pagination(); ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>