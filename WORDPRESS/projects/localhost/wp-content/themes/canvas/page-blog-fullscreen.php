<?php
/*
Template Name: Fullscreen Blog
*/
if (!post_password_required()) {

    the_post();
    wp_enqueue_script('gt3_isotope_js', get_template_directory_uri() . '/js/isotope.min.js', array(), false, true);
    wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
    wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);

    $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
    $pf = get_post_format();
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-fullscr');
    } else {
        get_header('fullscreen');
    }
    ?>
    <div class="fullscreen_block">
        <div class="fs_blog_module is_masonry">

            <?php
            global $gt3_wp_query_in_shortcodes, $paged;
            if (empty($paged)) {
                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            }
            if (isset($gt3_theme_pagebuilder['settings']['cat_ids']) && (is_array($gt3_theme_pagebuilder['settings']['cat_ids']))) {
                $compile_cats = array();
                foreach ($gt3_theme_pagebuilder['settings']['cat_ids'] as $catkey => $catvalue) {
                    array_push($compile_cats, $catkey);
                }
                $selected_categories = implode(",", $compile_cats);
            } else {
                $selected_categories = "";
            }
            $gt3_wp_query_in_shortcodes = new WP_Query();
            $args = array(
                'post_type' => 'post',
                'paged' => $paged,
                'cat' => $selected_categories,
                'post_status' => 'publish',
                'posts_per_page' => gt3_get_theme_option('fw_posts_per_page')
            );
            $gt3_wp_query_in_shortcodes->query($args);
            while ($gt3_wp_query_in_shortcodes->have_posts()) : $gt3_wp_query_in_shortcodes->the_post();
                $all_likes = gt3pb_get_option("likes");
                $gt3_theme_pagebuilder = get_post_meta(get_the_ID(), "pagebuilder", true);

                if (get_the_category()) $categories = get_the_category();
                $post_categ = '';
                $separator = ', ';
                if ($categories) {
                    foreach ($categories as $category) {
                        $post_categ = $post_categ . '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
                    }
                }

                ?>
                <div <?php post_class("blogpost_preview_fw"); ?>>
                    <div class="fw_preview_wrapper">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php echo get_pf_type_output(array("pf" => get_post_format(), "gt3_theme_pagebuilder" => $gt3_theme_pagebuilder, "width" => '1170', "height" => null, "fw_post" => true)); ?>
                        </a>
                        <h6 class="blogpost_title"><a
                                href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>

                        <div class="postmeta">
                            <div><?php echo get_the_time("F d, Y"); ?></div>
                            <div><?php echo trim($post_categ, ', '); ?></div>
                            <div><i class="icon-comment-alt"></i> <a
                                    href="<?php echo get_comments_link(); ?>"><?php echo get_comments_number(get_the_ID()); ?></a>
                            </div>
                            <div>
                                <a href="<?php echo get_permalink(); ?>"
                                   class="reamdore"><?php _e('Read More', 'canvas'); ?> <i
                                        class="icon-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        gt3_get_theme_pagination("10", "show_in_shortcodes");
        wp_reset_query();
        ?>
    </div>
    <script>
        jQuery(window).load(function () {
            jQuery(".is_masonry").isotope({
                itemSelector: '.blogpost_preview_fw'
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