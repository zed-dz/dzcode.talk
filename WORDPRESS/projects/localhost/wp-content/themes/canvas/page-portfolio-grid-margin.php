<?php
/*
Template Name: Portfolio Grid Margin
*/
if (!post_password_required()) {
    the_post();
    wp_enqueue_script('gt3_isotope_js', get_template_directory_uri() . '/js/isotope.min.js', array(), false, true);
    wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
    wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);

    $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    $pf = get_post_format();
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-filters');
    } else {
        get_header('portfolio-grid');
    }

    if (isset($gt3_theme_pagebuilder['settings']['cat_ids']) && (is_array($gt3_theme_pagebuilder['settings']['cat_ids']))) {
        $compile_cats = array();
        foreach ($gt3_theme_pagebuilder['settings']['cat_ids'] as $catkey => $catvalue) {
            array_push($compile_cats, $catkey);
        }
        $selected_categories = implode(",", $compile_cats);
    }
    ?>
    <div class="filters">
        <div class="fl">
            <?php
            if (function_exists('gt3pb_showPortCats')) {
                echo gt3pb_showPortCats($selected_categories);
            }
            ?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="fullscreen_block">
        <div class="fs_portfolio_module is_masonry">

            <?php
            global $gt3_wp_query_in_shortcodes, $paged;

            if(empty($paged)){
                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            }

            $post_type_terms = array();
            if (isset($selected_categories) && strlen($selected_categories) > 0) {
                $post_type_terms = explode(",", $selected_categories);
                $post_type_filter = explode(",", $selected_categories);
                $post_type_field = "id";
            }

            $gt3_wp_query_in_shortcodes = new WP_Query();
            $args = array(
                'post_type' => 'port',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => gt3_get_theme_option('fw_port_per_page')
            );

            if (isset($_GET['slug']) && strlen($_GET['slug']) > 0) {
                $post_type_terms = $_GET['slug'];
                $selected_categories = $_GET['slug'];
                $post_type_field = "id";
            }
            if (count($post_type_terms) > 0) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'portcat',
                        'field' => $post_type_field,
                        'terms' => $post_type_terms
                    )
                );
            }

            $gt3_wp_query_in_shortcodes->query($args);
            while ($gt3_wp_query_in_shortcodes->have_posts()) : $gt3_wp_query_in_shortcodes->the_post();
                $all_likes = gt3pb_get_option("likes");
                $gt3_theme_pagebuilder = get_post_meta(get_the_ID(), "pagebuilder", true);
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');

                if (isset($gt3_theme_pagebuilder['page_settings']['portfolio']['work_link']) && strlen($gt3_theme_pagebuilder['page_settings']['portfolio']['work_link']) > 0) {
                    $linkToTheWork = esc_url($gt3_theme_pagebuilder['page_settings']['portfolio']['work_link']);
                    $target = "target='_blank'";
                } else {
                    $linkToTheWork = get_permalink();
                    $target = "";
                }

                $terms = get_the_terms(get_the_ID(), 'portcat');
                if ($terms && !is_wp_error($terms)) {
                    $draught_links = array();
                    foreach ($terms as $term) {
                        $draught_links[] = '<a href="' . get_term_link($term->slug, "portcat") . '">' . $term->name . '</a>';
                    }
                    $on_draught = (is_array($draught_links) ? join(", ", $draught_links) : "");
                }

                if (strlen($featured_image[0]) > 0) {
                    ?>
                    <div <?php post_class("blogpost_preview_fw port_type"); ?>>
                        <div class="fw_preview_wrapper">
                            <div class="image_wrapper">
                                <?php echo '<img class="featured_image_standalone" src="' . aq_resize($featured_image[0], 1170, 950, true, true, true) . '" alt="'. esc_html__('Featured Image', 'canvas' ) .'" />'; ?>
                            </div>
                            <div class="inner">
                            <h6 class="blogpost_title"><a <?php echo (($target));?> href="<?php echo (($linkToTheWork)); ?>"><?php echo get_the_title(); ?></a></h6>
                            <div class="inmeta">
                                <div>
                                    <?php
                                    echo implode(", ", $draught_links);
                                    ?>
                                </div>
                                <?php echo '
                                <div class="post_likes post_likes_add ' . (isset($_COOKIE['like' . get_the_ID()]) ? "already_liked" : "") . '" data-postid="' . get_the_ID() . '" data-modify="like_post">
                                    <i class="stand_icon ' . (isset($_COOKIE['like' . get_the_ID()]) ? "icon-heart" : "icon-heart-empty") . '"></i>
                                    <span>' . ((isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()] > 0) ? $all_likes[get_the_ID()] : 0) . '</span>
                                </div>
                                ';
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            endwhile;
            ?>
        </div>
        <?php
        gt3_get_theme_pagination("10", "show_in_shortcodes");
        wp_reset_query();
        ?>
    </div>
    <script>
        jQuery(window).load(function () {
            jQuery(".is_masonry").isotope().isotope({
                itemSelector: '.isotope-item'
            });

            jQuery('.optionset a').click(function(){
                jQuery('.optionset a').removeClass('selected');
                jQuery(this).addClass('selected');
                var selector = jQuery(this).attr('data-category');
            });
        });
        jQuery(window).resize(function () {
            jQuery('.is_masonry').isotope({
                itemSelector: '.isotope-item'
            });
        });
    </script>
    <?php get_footer();
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