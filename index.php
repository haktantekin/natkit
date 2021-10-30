<?php get_header(); ?>

<div class="row">
  <div class="col-12">
    <div class="index-spot">
      <h1>
        Kitap Alıntıları
      </h1>
      <p>
        Her gün güncellenen <a href="/kategori/kitap-alintilari/">kitap alıntıları</a>, <a href="/kategori/kitap-konusu-ne/">kitap konuları</a>, <a href="/kategori/yazarlar-sairler/">yazar ve şairlerin hayatları</a>, birbirinden <a href="/kategori/guzel-sozler/">güzel sözler</a> Kitap Alıntıları'nda. Ayrıca altını çizdiğiniz kitap alıntılarını <a href="/cek-gonder/">bize gönderebilir</a>, sosyal medya hesaplarınızda dilediğiniz gibi sözleri paylaşabilirsiniz. Konulara yorum yaparak kitap hakkındaki fikirlerinizi belirtebilirsiniz!
        <br /> <a href="/kitaplik/">Tüm kitapları gör</a>
      </p>
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
                <?php if (has_post_thumbnail()) { ?>
                  <img decoding="async" width="350" height="353" alt="<?php the_title(); ?>" src="<?php echo $url ?>" />
                <?php } else { ?>
                  <img alt="<?php the_title(); ?>" src="<?php echo 'https://kitapalintilari.com/wp-content/uploads/2021/07/kitapalintilari.jpg' ?>" />
                <?php }  ?>

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