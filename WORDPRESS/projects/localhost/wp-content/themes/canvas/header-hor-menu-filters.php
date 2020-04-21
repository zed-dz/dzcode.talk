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
                <div class="span12 logo_links_cont_hor">
                    <div class="fl noselect">
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
                        <div class="horizontal_menu">
                            <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new gt3_menu_walker())); ?>
                        </div>

                        <div class="phone_menu">
                            <span class="menu_toggler"></span>
                        </div>

                        <?php if (class_exists('WooCommerce') && gt3_get_theme_option("woo_shop_header_cart") == "yes") { ?>
                        	<div class="header_cart_content hor">
							   <?php global $woocommerce; ?>
                               <a class="cart-contents" href="<?php echo (($woocommerce->cart->get_cart_url())); ?>" title="<?php _e('View your shopping cart', 'canvas'); ?>"><span class="total_price"><i class="icon-shopping-cart"></i><?php echo (($woocommerce->cart->get_cart_total())); ?></span><?php echo sprintf(_n('(%d item)', '(%d items)', $woocommerce->cart->cart_contents_count, 'canvas'), $woocommerce->cart->cart_contents_count);?></a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                    <div class="header-divider"></div>
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