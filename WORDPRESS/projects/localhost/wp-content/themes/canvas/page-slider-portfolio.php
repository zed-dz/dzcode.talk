<?php
/*
Template Name: Fullscreen Slider
*/

if (!post_password_required()) {
    the_post();
    wp_enqueue_script('gt3_isotope_js', get_template_directory_uri() . '/js/isotope.min.js', array(), false, true);
    wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
    wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);

    $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    $pf = get_post_format();if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-fullscr');
    } else {
        get_header('fullscreen');
    }
    ?>
    <div class="fullscreen_block_grid_ajax_fullscreen_slider">
        <div class="slider-wrapper">
            <?php
                if (isset($gt3_theme_pagebuilder['slider_code'])) {echo do_shortcode($gt3_theme_pagebuilder['slider_code']);}
            ?>
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            var slider_type = (jQuery('.rev_slider_wrapper').hasClass('fullscreen-container')),
                header_h = jQuery('header').height(),
                footer_h = jQuery('footer').height();

            if (slider_type !== true) {
                jQuery('.wrapper').css({'margin-bottom': '50px'});
            }
        });
    </script>

    <?php
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