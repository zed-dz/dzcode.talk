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
<header>
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
                        <span class="blog_phone"><i class="icon-phone"></i> <?php gt3_the_theme_option("phone"); ?></span>
                        <?php if (class_exists('WooCommerce') && gt3_get_theme_option("woo_shop_header_cart") == "yes") { ?>
                        	<div class="header_cart_content">
							   <?php global $woocommerce; ?>
                               <a class="cart-contents" href="<?php echo (($woocommerce->cart->get_cart_url())); ?>" title="<?php _e('View your shopping cart', 'canvas'); ?>"><span class="total_price"><i class="icon-shopping-cart"></i><?php echo (($woocommerce->cart->get_cart_total())); ?></span><?php echo sprintf(_n('(%d item)', '(%d items)', $woocommerce->cart->cart_contents_count, 'canvas'), $woocommerce->cart->cart_contents_count);?></a>
                            </div>
                        <?php } ?>
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

    <?php
    if (!isset($gt3_theme_pagebuilder['settings']['show_title_area']) || ($gt3_theme_pagebuilder['settings']['show_title_area'] !== "no" && gt3_get_theme_option("show_title_area") !== "no")) {
        ?>
        <div class="bc_area">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <?php
                        echo '<h1 class="entry-title">';
                        if (is_404()) {
                            echo __('404 Error', 'canvas');
                        } else {
                            if (is_category()) {
                                echo  __('Category Archives: ', 'canvas') . single_cat_title('', false);

                            } elseif (is_search()) {
                                echo get_search_query();

                            } elseif (is_day()) {
                                echo get_the_time('d');

                            } elseif (is_month()) {
                                echo get_the_time('F');

                            } elseif (is_year()) {
                                echo get_the_time('Y');

                            } elseif (is_tag()) {
                                echo __('Tag Archives: ', 'canvas') . single_tag_title('', false);

                            } elseif (is_author()) {
                                global $author;
                                $userdata = get_userdata($author);
                                echo __('All posts by ', 'canvas') . $userdata->display_name;

                            } elseif (is_home() || is_front_page()) {
                                $home = __('Home', 'canvas');

                                echo (($home));
                            } else {
                                echo get_the_title();
                            }
                        }
                        echo '</h1>';

                        if (!isset($gt3_theme_pagebuilder['settings']['show_breadcrumb_area']) || ($gt3_theme_pagebuilder['settings']['show_breadcrumb_area'] !== "no" && gt3_get_theme_option("show_breadcrumb_area") !== "no")) {
                            gt3_the_breadcrumb();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif (!isset($gt3_theme_pagebuilder['settings']['show_breadcrumb_area']) || ($gt3_theme_pagebuilder['settings']['show_breadcrumb_area'] !== "no" && gt3_get_theme_option("show_breadcrumb_area") !== "no")) { ?>
        <div class="bc_area">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <?php
                        gt3_the_breadcrumb();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</header>
<div class="wrapper">