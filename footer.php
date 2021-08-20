</div>
</main>
<div class="side-panel">
  <div class="side-panel-close">
    <i class="fa fa-times"></i>
  </div>
  <div class="search-top">
    <form method="get" action="<?php bloginfo('url'); ?>">
      <input class="search-text" type="text" placeholder="Arama..." autocomplete="off" list="searchtext_s" name="s" />
      <div class="input-button-icon fas fa-search">
        <input class="search-button " type="button" src="<?php bloginfo('template_url'); ?>" />
      </div>
    </form>
  </div>
  <div class="side-panel-in">
    <?php wp_nav_menu(array('theme_location' => 'Header')); ?>
  </div>
  <div class="mobile-menu-social">
    <a rel="nofollow" target="_blank" href="https://twitter.com/alintilari_">
      <i class="fab fa-twitter"></i>
    </a>
    <a rel="nofollow" target="_blank" href="https://www.instagram.com/alintilari_/">
      <i class="fab fa-instagram"></i>
    </a>
    <a rel="nofollow" target="_blank" href="https://tr.pinterest.com/kitapalintilaricom/">
      <i class="fab fa-pinterest"></i>
    </a>
  </div>
</div>
<!-- <div class="send-photo">
  <a href="/cek-gonder/">
    <i class="fa fa-camera"></i>

  </a>
  <div class="send-photo-text">
    Çek <span>Gönder</span>
  </div>
</div> -->
<?php wp_footer(); ?>
<script async src="<?php bloginfo('template_url'); ?>/assets/public/js/natkah-min.js"></script>
</body>

</html>