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
<header class="fs">
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
                        <span class="blog_description"><?php echo get_bloginfo('description'); ?></span>
                        <span class="blog_phone"><i
                                class="icon-phone"></i> <?php gt3_the_theme_option("phone"); ?></span>
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
</header>
<div class="wrapper">