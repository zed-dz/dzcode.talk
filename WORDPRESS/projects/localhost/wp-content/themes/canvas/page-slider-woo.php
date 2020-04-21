<?php
/*
Template Name: Slider WooCommerce Grid Ajax
*/

if (!post_password_required()) {
    the_post();
    wp_enqueue_script('gt3_isotope_js', get_template_directory_uri() . '/js/isotope.min.js', array(), false, true);
    wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
    wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);

    $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    $pf = get_post_format();
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-fullscr');
    } else {
        get_header('portfolio-grid-ajax');
    }
    ?>
    <div class="fullscreen_block_grid_ajax">
        <div class="slider-wrapper">
            <?php
                echo do_shortcode($gt3_theme_pagebuilder['slider_code']);
            ?>
        </div>
        <div class="grid_ajax_isotope_block"></div>
        <a href="<?php echo esc_js("javascript:void(0)");?>" class="load_more_posts"><?php _e('More Items', 'canvas') ?></a>
    </div>

    <script>
        jQuery(document).ready(function () {
            jQuery(".grid_ajax_isotope_block").isotope({
                layoutMode: 'fitRows',
                itemSelector: '.blogpost_preview_fw'
            });
            jQuery(".optionset li").eq(0).find("a").click();
        });

        jQuery(window).load(function () {
			jQuery(".grid_ajax_isotope_block").isotope("reLayout");
			setTimeout('jQuery(".grid_ajax_isotope_block").isotope("reLayout")',500);
			setTimeout('jQuery(".grid_ajax_isotope_block").isotope("reLayout")',1000);
			setTimeout('jQuery(".grid_ajax_isotope_block").isotope("reLayout")',1500);
        });

        jQuery(window).resize(function () {
			jQuery(".grid_ajax_isotope_block").isotope("reLayout");
        });
	
        jQuery('.optionset li a').click(function(){
            jQuery('.optionset li a').removeClass('selected');
            jQuery('.optionset li').removeClass('selected');
            jQuery(this).addClass('selected');
            jQuery(this).parent().addClass('selected');
            var filterSelector = jQuery(this).attr('data-category');

            jQuery('.grid_ajax_isotope_block').isotope({
                filter: filterSelector
            });
            setTimeout('jQuery(".optionset li a.selected").click();', 80);
            return false;
        });
    </script>

    <?php

    if (isset($gt3_theme_pagebuilder['pb_options']['items_per_page'])) {
        $items_per_page = $gt3_theme_pagebuilder['pb_options']['items_per_page'];
    } else {
        $items_per_page = gt3_get_theme_option("fw_port_per_page");
    }

    if (isset($gt3_theme_pagebuilder['pb_options']['items_per_klick'])) {
        $items_per_click = $gt3_theme_pagebuilder['pb_options']['items_per_klick'];
    } else {
        $items_per_click = gt3_get_theme_option("fw_port_per_page");
    }

    if (isset($gt3_theme_pagebuilder['settings']['cat_ids']) && (is_array($gt3_theme_pagebuilder['settings']['cat_ids']))) {
        $compile_cats = array();
        foreach ($gt3_theme_pagebuilder['settings']['cat_ids'] as $catkey => $catvalue) {
            array_push($compile_cats, $catkey);
        }
        $selected_categories = implode(",", $compile_cats);
    } else {
        $selected_categories = '';
    }

    $GLOBALS['showOnlyOneTimeJS']['home-1'] = '
    <script>
    var posts_already_showed = 0;
    jQuery(window).load(function () {
        gt3_get_posts_grid_ajax("gt3_get_posts", "product", "' . $items_per_page . '", posts_already_showed, "portfolio_grid_ajax", "'.$selected_categories.'");
        posts_already_showed = posts_already_showed + ' . $items_per_page . ';
    });

    jQuery(".load_more_posts").click(function(){
        gt3_get_posts_grid_ajax("gt3_get_posts", "product", "' . $items_per_click . '", posts_already_showed, "portfolio_grid_ajax", "'.$selected_categories.'");
        posts_already_showed = posts_already_showed + ' . $items_per_click . ';
        return false;
    });

    function gt3_get_posts_grid_ajax(action, post_type, posts_count, posts_already_showed, template, selected_categories) {
    jQuery.post(gt3_ajaxurl, {
        action: action,
        post_type: post_type,
        posts_count: posts_count,
        posts_already_showed: posts_already_showed,
        template: template,
        selected_categories: selected_categories
    })
        .done(function (data) {
            if (data.length < 1) {
                jQuery(".load_more_posts").hide("fast");
            }

            jQuery(".grid_ajax_isotope_block").isotope("insert", jQuery(data), function () {
                jQuery(".grid_ajax_isotope_block").ready(function () {
                    jQuery(".grid_ajax_isotope_block").isotope("reLayout");
                });
            });
        });
    }
    </script>
    ';

    get_footer();
} else {
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu');
    } else {
        get_header();
    }
    echo "<div class='fixed_bg' style='background-image:url(" . gt3_get_theme_option('bg_img') . ")'></div>";
    ?>
    <div class="pp_block">
        <div class="container">
            <h1 class="pp_title"><?php _e('THIS CONTENT IS PASSWORD PROTECTED', 'canvas'); ?></h1>

            <div class="pp_wrapper">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="global_center_trigger"></div>
    <script>
        jQuery(document).ready(function () {
            jQuery('.post-password-form').find('label').find('input').attr('placeholder', 'Enter The Password...');
            jQuery('html').addClass('without_border');
        });
    </script>
    <?php
    get_footer();
} ?>