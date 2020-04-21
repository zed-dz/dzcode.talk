<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php echo((gt3_get_theme_option("responsive") == "on") ? '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' : ''); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="shortcut icon" href="<?php echo gt3_get_theme_option('favicon'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo gt3_get_theme_option('apple_touch_57'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo gt3_get_theme_option('apple_touch_72'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo gt3_get_theme_option('apple_touch_114'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script type="text/javascript">
        var gt3_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php echo gt3_get_if_strlen(gt3_get_theme_option("custom_css"), "<style>", "</style>") . gt3_get_if_strlen(gt3_get_theme_option("code_before_head"));
    globalJsMessage::getInstance()->render();
    wp_head(); ?>
</head>
<?php $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(@get_the_ID()); ?>
<body <?php body_class(array(gt3_the_pb_custom_bg_and_color($gt3_theme_pagebuilder, array("classes_for_body" => true)))); ?>>
<div class="site_wrapper">
<header class="fs pfs">
    <div class="container fw">
        <div class="row">
            <div class="fw_ip">
                <div class="span12 logo_links_cont">
                    <div class="fl noselect">
                        <span class="menu_toggler"></span>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo"
                           style="width:<?php gt3_the_theme_option("header_logo_standart_width"); ?>px;"><img
                                src="<?php gt3_the_theme_option("logo"); ?>" alt="<?php echo esc_html__('Logo', 'canvas' ); ?>"
                                width="<?php gt3_the_theme_option("header_logo_standart_width"); ?>"
                                height="<?php gt3_the_theme_option("header_logo_standart_height"); ?>"
                                class="non_retina_image"><img
                                src="<?php gt3_the_theme_option("logo_retina"); ?>" alt="<?php echo esc_html__('Logo', 'canvas' ); ?>"
                                width="<?php gt3_the_theme_option("header_logo_standart_width"); ?>"
                                height="<?php gt3_the_theme_option("header_logo_standart_height"); ?>"
                                class="retina_image">
                        </a>
                    </div>
                    <div class="fr">
                        <div class="header_share">
                            <span class="share">Share:</span>
                            <a target="_blank"
                               href="https://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>"
                               class="share_facebook"><i
                                    class="stand_icon icon-facebook-sign"></i></a>
                            <a target="_blank"
                               href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen($gt3_theme_featured_image[0]) > 0) ? $gt3_theme_featured_image[0] : gt3_get_theme_option("logo"); ?>"
                               class="share_pinterest"><i
                                    class="stand_icon icon-pinterest"></i></a>
                            <a target="_blank"
                               href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>"
                               class="share_tweet"><i
                                    class="stand_icon icon-twitter"></i></a>
                            <a target="_blank"
                               href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"
                               class="share_gplus"><i class="icon-google-plus-sign"></i></a>
                            <div class="views_likes">
                                <?php
                                $all_likes = gt3pb_get_option("likes");
                                echo '
                                    <div class="post_likes post_likes_add ' . (isset($_COOKIE['like' . get_the_ID()]) ? "already_liked" : "") . '" data-postid="' . get_the_ID() . '" data-modify="like_post">
                                        <i class="stand_icon ' . (isset($_COOKIE['like' . get_the_ID()]) ? "icon-heart" : "icon-heart-empty") . '"></i>
                                        <span>' . ((isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()] > 0) ? $all_likes[get_the_ID()] : 0) . '</span>
                                    </div>
                                    ';
                                ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gt3_menu">
        <?php get_search_form(true); ?>
        <div class="menu_scroll">
            <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker())); ?>
        </div>
    </div>

    <script>
        jQuery(document).ready(function(){
            jQuery('.menu_toggler').toggle(function(){
                jQuery('header').css('left', '280px').css('transition', 'all 300ms ');
                jQuery('.fs_gallery_container').css('left', '280px').css('transition', 'all 300ms ');
                jQuery('.fs_controls').css('left', '280px').css('transition', 'all 300ms ');
                jQuery('.bg_video').css('left', '280px').css('transition', 'all 300ms ');
                jQuery('.fs-port-bg').css('left', '280px').css('transition', 'all 300ms ');
                jQuery('header.single_gallery_header').css('left', '0').css('transition', 'all 300ms ');
            }, function(){
                jQuery('header').css('left', '0').css('transition', 'all 300ms ');
                jQuery('.fs_gallery_container').css('left', '0').css('transition', 'all 300ms ');
                jQuery('.fs_controls').css('left', '0').css('transition', 'all 300ms ');
                jQuery('.bg_video').css('left', '0').css('transition', 'all 300ms ');
                jQuery('.fs-port-bg').css('left', '0').css('transition', 'all 300ms ');
            });

            var window_w = jQuery(window).width();
            if (window_w < 767) {
                jQuery('.menu_toggler').toggle(function(){
                    jQuery('header').css('left', '0px').css('transition', 'all 300ms ');
                    jQuery('.fs_gallery_container').css('left', '0px').css('transition', 'all 300ms ');
                    jQuery('.fs_controls').css('left', '0px').css('transition', 'all 300ms ');
                    jQuery('.bg_video').css('left', '0px').css('transition', 'all 300ms ');
                    jQuery('.fs-port-bg').css('left', '0px').css('transition', 'all 300ms ');
                    jQuery('header.single_gallery_header').css('left', '0').css('transition', 'all 300ms ');
                }, function(){
                    jQuery('header').css('left', '0').css('transition', 'all 300ms ');
                    jQuery('.fs_gallery_container').css('left', '0').css('transition', 'all 300ms ');
                    jQuery('.fs_controls').css('left', '0').css('transition', 'all 300ms ');
                    jQuery('.bg_video').css('left', '0').css('transition', 'all 300ms ');
                    jQuery('.fs-port-bg').css('left', '0').css('transition', 'all 300ms ');
                });
            }
        });
    </script>
</header>
<div class="wrapper">