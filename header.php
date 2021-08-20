<!DOCTYPE html>
<html>

<head>
    <title><?php wp_title(); ?></title>

    <link href="<?php bloginfo('template_url'); ?>/assets/public/css/natkah-min.css" rel="stylesheet" rel="preload" as="style" onload="this.rel='stylesheet'" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php bloginfo('template_url'); ?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/faviconfavicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/assets/favicon/manifest.json">
    <link rel="preconnect" href="https://kitapalintilari.com" />
    <link rel="dns-prefetch" href="https://kitapalintilari.com" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff">
    <?php
    add_action('wp_head', 'insert_fb_in_head', 5);
    add_action('init', 'admin_bar');
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>


    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-4 order-lg-1 order-1 d-md-block d-none">
                    <ul class="social">
                        <li>
                            <a rel="nofollow" target="_blank" href="https://twitter.com/alintilari_">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" target="_blank" href="https://www.instagram.com/alintilari_/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" target="_blank" href="https://tr.pinterest.com/kitapalintilaricom/">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-12 order-lg-2 order-2">
                    <div class="mobile-menu-icon d-md-none d-inline-block">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="logo text-center">
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img class="lazy" alt="Kitap Alıntıları" width="161" height="65" src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" /></a>
                    </div>
                </div>
                <div class="col-lg-4 col-4 order-lg-3 order-2 d-md-block d-none">
                    <div class="search-top">
                        <form method="get" action="<?php bloginfo('url'); ?>">
                            <input class="search-text" type="text" placeholder="Arama..." autocomplete="off" list="searchtext_s" name="s" />
                            <div class="input-button-icon fas fa-search">
                                <input class="search-button " type="button" src="<?php bloginfo('template_url'); ?>" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <nav>
                <?php wp_nav_menu(array('theme_location' => 'Header')); ?>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="container">