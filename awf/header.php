<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
    <head>
        <title><?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title').' - '.get_bloginfo('description')); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
        <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
        <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?>" />
        <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
        <meta property="og:url" content="<?php echo site_url(); ?>" />
        <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="true">
        <?php wp_meta(); ?>
        <link rel="canonical" href="<?php echo site_url(); ?>" />
        <?php 
          wp_head(); 
          global $post;
          $menu = wp_get_nav_menu_items('header');
          $current_user = wp_get_current_user();
        ?>
        <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    </head>
    <body class="home page-template page-template-template-frontpage page-template-template-frontpage-php page page-id-4 wp-custom-logo woocommerce-js elementor-default body-desktop  <?php if (is_front_page()) {echo ' pg-home'; } else if(is_author()){echo ' pg-author pg-profile pg-interna'; } else if(is_archive()){echo ' pg-archive pg-interna pg-'.get_queried_object()->slug; } else if(is_category()){echo ' pg-category pg-interna pg-'.get_queried_object()->slug; } else if(is_search()){echo ' pg-search pg-interna'; } else if(is_single()){echo ' pg-single pg-interna'; } else if(is_404()){ echo ' pg-404 pg-interna'; } else { echo ' pg-interna pg-'.str_replace(' ','-',strToLower(get_the_title())).' page_id_'.$post->ID; } ?>">
    <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="https://demos.famethemes.com/onepress/#content">Skip to content</a>
        <div id="header-section" class="h-on-top no-transparent">
            <header id="masthead" class="site-header header-contained is-sticky no-scroll no-t h-on-top" role="banner">
                <div class="container">
                    <div class="site-branding">
                        <div class="site-brand-inner has-logo-img no-desc">
                            <h1 class="site-logo-div">
                                <?php get_template_part('template_parts/logo'); ?>
                            </h1>
                        </div>
                    </div>
                    <div class="header-right-wrapper"> <a href="https://demos.famethemes.com/onepress/#0" id="nav-toggle">Menu<span></span></a>
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <ul class="onepress-menu">
                                <?php 
                                    foreach ($menu as $key => $value) {
                                        echo '<li id="menu-item-'.$value->ID.'" class="'; 
                                        if(!empty($value->classes)){
                                            foreach ($value->classes as $v) {
                                                echo $v.' ';
                                            } 
                                        }
                                        echo '"><a href="'.$value->url.'">'.$value->title.'</a></li>';
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
            <!-- Banner -->
            <?php 
                $images = array();
                foreach (explode(',', get_Theme_mod('banner-imagens')) as $value) {
                    array_push($images, '&quot;'.$value.'&quot;');
                }
            ?>
            <section id="hero" data-images="[<?php print_r(implode(',', $images)); ?>]" class="hero-slideshow-wrapper hero-slideshow-normal">
                <div class="slider-spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <div class="container" style="padding-top: 10%; padding-bottom: 10%;">
                    <div class="hero__content hero-content-style1">
                        <h2 class="hero-large-text">
                            <?php echo get_theme_mod('banner-titulo'); ?>
                            <!-- <span class="js-rotating">OnePress | One Page | Responsive | Perfection</span> -->
                        </h2>
                        <p class="hero-small-text"><?php echo get_theme_mod('banner-texto'); ?></p> 
                        <?php if(get_theme_mod('banner-url') && get_theme_mod('banner-label')) : ?>
                        <a href="<?php echo get_theme_mod('banner-url'); ?>" class="btn btn-theme-primary btn-lg"><?php echo get_theme_mod('banner-label'); ?></a>
                        <?php endif; ?>
                        </div>
                </div>
            </section>
        </div>
        <div id="content" class="site-content">
            <main id="main" class="site-main" role="main">
