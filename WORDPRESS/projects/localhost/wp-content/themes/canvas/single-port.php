<?php
    the_post();

/* LOAD PAGE BUILDER ARRAY */
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$gt3_theme_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];
$pf = get_post_format();

/* ADD 1 view for this post */
$post_views = (get_post_meta(get_the_ID(), "post_views", true) > 0 ? get_post_meta(get_the_ID(), "post_views", true) : "0");
update_post_meta(get_the_ID(), "post_views", (int)$post_views + 1);

wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);
wp_enqueue_script('gt3_swipe_js', get_template_directory_uri() . '/js/jquery.event.swipe.js', array(), false, true);
$all_likes = gt3pb_get_option("likes");

$portfolioType = gt3_get_theme_option('default_portfolio_style');
if (isset($gt3_theme_pagebuilder['settings']['portfolio_style'])) {
    if ($gt3_theme_pagebuilder['settings']['portfolio_style'] == 'simple-portfolio-post') {
        $portfolioType = 'simple-portfolio-post';
    }
    if ($gt3_theme_pagebuilder['settings']['portfolio_style'] == 'fw-portfolio-post') {
        $portfolioType = 'fw-portfolio-post';
    }
}

if ($portfolioType == 'simple-portfolio-post') {
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu');
    } else {
        get_header();
    }
} else {
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-fullscr');
    } else {
        get_header('portfolio-fullscreen');
    }
}

if ($pf !== "image" && $pf !== "video") {
    $pf = "standart";
}

if (get_the_content() !== '' || (isset($gt3_theme_pagebuilder['modules']) && is_array($gt3_theme_pagebuilder['modules']) && count($gt3_theme_pagebuilder['modules'])>0)) {
    $info_class = "hasContent";
    $hasContent = true;
} else {
    $info_class = "noContent";
    $hasContent = false;
}
?>

    <script>
        var html = jQuery('html');
        jQuery(document).ready(function() {
            html.addClass('port_post');
        });
    </script>

<?php if ($portfolioType == 'simple-portfolio-post') {

    /////////////////
    // Simple Type //
    /////////////////
    ?>
    <div class="container">
        <div class="row <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?>">
            <div class="main_container">
                <div
                    class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                    <div class="row">
                        <div
                            class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                            <div class="contentarea">
                                <div <?php post_class("blog_post_preview"); ?>>
                                    <div class="preview_wrapper single_post">
                                        <div class="row">
                                            <div class="span7">
                                                <div class="meta">
                                                    <span><i class="icon-folder-close-alt"></i>
                                                        <?php
                                                        $terms = get_the_terms(get_the_ID(), 'portcat');
                                                        if ($terms && !is_wp_error($terms)) {
                                                            $draught_links = array();
                                                            foreach ($terms as $term) {
                                                                $draught_links[] = '<a href="' . get_term_link($term->slug, "portcat") . '">' . $term->name . '</a>';
                                                            }
                                                            $on_draught = join(", ", $draught_links);
                                                            $show_cat = true;
                                                        }

                                                        if ($terms !== false) {
                                                            echo (($on_draught));
                                                        }
                                                        ?>
                                                    </span>
                                                    <span><i class="icon-calendar-empty"></i> <?php echo get_the_time("F d, Y"); ?></span>
                                                    <?php
                                                    if (isset($gt3_theme_pagebuilder['page_settings']['portfolio']['skills']) && is_array($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'])) {
                                                        foreach ($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'] as $skillkey => $skillvalue) {
                                                            echo "<span><i class='" . esc_attr($skillvalue['icon']) . "'></i>" . esc_attr($skillvalue['name']) . ((isset($skillvalue['value']) && strlen($skillvalue['value']) > 0) && (isset($skillvalue['name']) && strlen($skillvalue['name']) > 0) ? ":" : "") . " " . esc_attr($skillvalue['value']) . "</span>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="span5">
                                                <div class="prev_next_links">
                                                    <?php next_post_link('<span class="thisnext">%link</span>') ?>
                                                    <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo get_pf_type_output(array("pf" => get_post_format(), "gt3_theme_pagebuilder" => $gt3_theme_pagebuilder));?>
                                        <div class="preview_content">
                                            <article class="contentarea">
                                                <?php
                                                the_content(__('Read more!', 'canvas'));
                                                wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'canvas') . ': ', 'after' => '</div>'));
                                                ?>
                                            </article>
                                        </div>
                                        <div class="postbottom">
                                            <div class="row">
                                                <div class="span8">
                                                    <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                                                    <?php next_post_link('<span class="thisnext">%link</span>') ?>
                                                </div>
                                                <div class="span4">
                                                    <div class="blogpost_share">
                                                        <div class="views_likes">
                                                            <?php
                                                            echo '
                                                            <div class="post_likes post_likes_add ' . (isset($_COOKIE['like' . get_the_ID()]) ? "already_liked" : "") . '" data-postid="' . get_the_ID() . '" data-modify="like_post">
                                                                <i class="stand_icon ' . (isset($_COOKIE['like' . get_the_ID()]) ? "icon-heart" : "icon-heart-empty") . '"></i>
                                                                <span>' . ((isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()] > 0) ? $all_likes[get_the_ID()] : 0) . '</span>
                                                            </div>
                                                            ';
                                                            ?>
                                                        </div>
                                                        <a target="_blank"
                                                           href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen($gt3_theme_featured_image[0]) > 0) ? $gt3_theme_featured_image[0] : gt3_get_theme_option("logo"); ?>"
                                                           class="share_pinterest"><i
                                                                class="stand_icon icon-pinterest"></i></a>
                                                        <a target="_blank"
                                                           href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"
                                                           class="share_gplus"><i class="icon-google-plus"></i></a>
                                                        <a target="_blank"
                                                           href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>"
                                                           class="share_tweet"><i
                                                                class="stand_icon icon-twitter"></i></a>
                                                        <a target="_blank"
                                                           href="https://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>"
                                                           class="share_facebook"><i
                                                                class="stand_icon icon-facebook-sign"></i></a>
                                                        <span class="share"><?php echo __('Share this', 'canvas'); ?></span>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if ($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "no-sidebar") {
                                        $posts_per_line = 4;
                                    } else {
                                        $posts_per_line = 3;
                                    }

                                    if (gt3_get_theme_option("related_posts") == "on" && is_gt3_builder_active()) {

                                        if ($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "no-sidebar") {
                                            $posts_per_line = 3;
                                        } else {
                                            $posts_per_line = 3;
                                        }

                                        echo '<div class="row"><div class="span12 module_feature_posts related single_portfolio_post">';

                                        $new_term_list = get_the_terms(get_the_id(), "portcat");
                                        $echoallterm = '';
                                        $echoterm = array();
                                        if (is_array($new_term_list)) {
                                            foreach ($new_term_list as $term) {
                                                $echoterm[] = $term->term_id;
                                            }
                                        }
                                        if (is_array($echoterm) && count($echoterm) > 0) {
                                            $post_type_terms = implode(",", $echoterm);
                                        } else {
                                            $post_type_terms = "";
                                        }

                                        echo do_shortcode("[feature_portfolio
                                heading_color=''
                                heading_size='h5'
                                heading_text=''
                                number_of_posts='" . $posts_per_line . "'
                                posts_per_line=" . $posts_per_line . "
                                sorting_type='random'
                                related='yes'
                                now_open_pageid='" . get_the_id() . "'
                                post_type_terms='" . $post_type_terms . "'
                                post_type='port'][/feature_portfolio]");
                                        echo '</div></div>';
                                    }
                                    ?>

                                    <?php if (gt3_get_theme_option("portfolio_comments") == "enabled") { ?>

                                        <div class="row">
                                            <div class="span12">
                                                <?php comments_template(); ?>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <?php get_sidebar('left'); ?>
                    </div>
                </div>
                <?php get_sidebar('right'); ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
<?php } elseif ($portfolioType == 'fw-portfolio-post') {

    /////////////////////
    // Fullscreen Type //
    /////////////////////

    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('body').addClass('fs_portfolio');
        });
    </script>
<?php
	if ($pf == "video") {

        // Video Post Type //
        ?>
<?php
        $video_url = $gt3_theme_pagebuilder['post-formats']['videourl'];
        echo "<div class='fullscreen_block fw_background bg_video'>";

        #YOUTUBE
        $is_youtube = substr_count($video_url, "youtu");
        if ($is_youtube > 0) {
            $videoid = substr(strstr($video_url, "="), 1);
            echo "<iframe width=\"100%\" height=\"100%\" src=\"https://www.youtube.com/embed/" . $videoid . "?controls=0&autoplay=1&showinfo=0&modestbranding=1&wmode=opaque&rel=0\" frameborder=\"0\" allowfullscreen></iframe></div>";
        }

        #VIMEO
        $is_vimeo = substr_count($video_url, "vimeo");
        if ($is_vimeo > 0) {
            $videoid = substr(strstr($video_url, "m/"), 2);
            echo "<iframe src=\"https://player.vimeo.com/video/" . $videoid . "?autoplay=1&loop=0\" width=\"100%\" height=\"100%\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>";
        }?>

        <script>
            jQuery(document).ready(function() {
                var window_w = jQuery(window).width(),
                    window_h = jQuery(window).height();

                jQuery('.custom_bg').css({'background-color':'#000000','background-image':'none'});
                jQuery('.fixed_bg').remove();
                jQuery('.fw_background').height(jQuery(window).height());
                jQuery('.main_header').removeClass('hided');
                jQuery('.fullscreen_block').addClass('loaded');
                if (jQuery(window).width() > 1024) {
                    if (jQuery('.bg_video').size() > 0) {
                        if (((jQuery(window).height()+150)/9)*16 > jQuery(window).width()) {
                            jQuery('.fullscreen_block iframe').height(jQuery(window).height()+150).width(((jQuery(window).height()+150)/9)*16);
                            jQuery('.fullscreen_block iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'top' : "-75px", 'margin-top' : '0px'});
                        } else {
                            jQuery('.fullscreen_block iframe').width(jQuery(window).width()).height(((jQuery(window).width())/16)*9);
                            jQuery('.fullscreen_block iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'margin-top' : (-1*jQuery('iframe').height()/2)+'px', 'top' : '50%'});
                        }
                    }
                } else if (jQuery(window).width() < 760) {
                    jQuery('.bg_video').height(window_h-header.height()).width(window_w).css({
                        'top': '0px',
                        'left': '0px',
                        'margin-left': '0px',
                        'margin-top': '0px'
                    });
                    jQuery('.fullscreen_block iframe').height(window_h-header.height()).width(window_w).css({
                        'top': '0px',
                        'left': '0px',
                        'margin-left': '0px',
                        'margin-top': '0px'
                    });
                } else {
                    jQuery('.bg_video').height(window_h).width(window_w).css({
                        'top': '0px',
                        'margin-left' : '0px',
                        'left' : '0px',
                        'margin-top': '0px'
                    });
                    jQuery('.fullscreen_block iframe').height(window_h).width(window_w).css({
                        'top': '0px',
                        'margin-left' : '0px',
                        'left' : '0px',
                        'margin-top': '0px'
                    });
                }
            });
            jQuery(window).resize(function() {
                var window_w = jQuery(window).width(),
                    window_h = jQuery(window).height(),
                    header = jQuery('header');

                jQuery('.fw_background').height(jQuery(window).height());
                if (jQuery(window).width() > 1024	) {
                    if (jQuery('.bg_video').size() > 0) {
                        if (((jQuery(window).height()+150)/9)*16 > jQuery(window).width()) {
                            jQuery('.fullscreen_block iframe').height(jQuery(window).height()+150).width(((jQuery(window).height()+150)/9)*16);
                            jQuery('.fullscreen_block iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'top' : "-75px", 'margin-top' : '0px'});
                        } else {
                            jQuery('.fullscreen_block iframe').width(jQuery(window).width()).height(((jQuery(window).width())/16)*9);
                            jQuery('.fullscreen_block iframe').css({'margin-left' : (-1*jQuery('iframe').width()/2)+'px', 'margin-top' : (-1*jQuery('iframe').height()/2)+'px', 'top' : '50%'});
                        }
                    }
                } else if (jQuery(window).width() < 760) {
                    jQuery('.bg_video').height(window_h-header.height()).width(window_w).css({
                        'top': '0px',
                        'left': '0px',
                        'margin-left': '0px',
                        'margin-top': '0px'
                    });
                    jQuery('.fullscreen_block iframe').height(window_h-header.height()).width(window_w).css({
                        'top': '0px',
                        'left': '0px',
                        'margin-left': '0px',
                        'margin-top': '0px'
                    });
                } else {
                    jQuery('.bg_video').height(window_h).width(window_w).css({
                        'top': '0px',
                        'margin-left' : '0px',
                        'left' : '0px',
                        'margin-top': '0px'
                    });
                    jQuery('.fullscreen_block iframe').height(window_h).width(window_w).css({
                        'top': '0px',
                        'margin-left' : '0px',
                        'left' : '0px',
                        'margin-top': '0px'
                    });
                }
            });
        </script>

        <div class="fs_controls fs_controls-port fs-port-standart">
            <div class="fs_controls_append">
                <div class="fs_controls_append_left">
                    <a href="<?php echo esc_js("javascript:history.back()");?>" class="control_button fs_close"></a>
                    <div class="prev_next_links">
                        <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                        <?php next_post_link('<span class="thisnext">%link</span>') ?>
                    </div>
                </div>
                <div class="fs_controls_append_right">
                    <?php if ($hasContent == true) { ?>
                        <a href="<?php echo esc_js("javascript:void(0)");?>" class="control_button post_info <?php echo (($info_class)); ?>"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($hasContent == true) { ?>
            <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port has_content"></a>
        <?php } else { ?>
            <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port no_content"></a>
        <?php } ?>
        <div class="fs-port-bg" style="background-image:url(<?php echo (($featured_image[0])); ?>);"></div>

        <script>
            jQuery(document).ready(function(){
                jQuery('.close_controls').toggle(function(){
                        jQuery(html).addClass('hide_controls')},
                    function(){
                        jQuery(html).removeClass('hide_controls')
                    });
            });
        </script>

    <?php } elseif ($pf == "image") {
        //Image Post Type//
        wp_enqueue_script('gt3_fsGallery_js', get_template_directory_uri() . '/js/fs_gallery.js', array(), false, true);

        $sliderCompile = "";
        if (isset($gt3_theme_pagebuilder['post-formats']['images']) && is_array($gt3_theme_pagebuilder['post-formats']['images'])) {
            if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['controls']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['controls'] !== 'yes') {
                $controls = 0;
            } else {
                $controls = 1;
            }
            if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['thumbs']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['thumbs'] !== 'no') {
                $thmbs = 1;
            } else {
                $thmbs = 0;
            }
            if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['autoplay']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['autoplay'] == "no") {
                $autoplay = 0;
            } else {
                $autoplay = 1;
            }
            if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['interval']) && $gt3_theme_pagebuilder['sliders']['fullscreen']['interval'] > 0) {
                $interval = $gt3_theme_pagebuilder['sliders']['fullscreen']['interval'];
            } else {
                $interval = 3300;
            }
            $fit_style = "fit_width";

            $sliderCompile .= '<script>gallery_set = [';
            foreach ($gt3_theme_pagebuilder['post-formats']['images'] as $imageid => $image) {
                $uniqid = mt_rand(0, 9999);
                $photoTitle = "";
                $photoCaption = "";
                $titleColor = "a8abad";
                $captionColor = "a8abad";

                    $sliderCompile .= '{type: "image", image: "' . wp_get_attachment_url($image['attach_id']) . '", thmb: "", alt: "' . str_replace('"', "'",  $photoTitle) . '", title: "' . str_replace('"', "'", $photoTitle) . '", description: "' . str_replace('"', "'",  $photoCaption) . '", titleColor: "#'.$titleColor.'", descriptionColor: "#'.$captionColor.'"},';
            }
            $sliderCompile .= "]
            jQuery(document).ready(function(){
            var header = jQuery('header');
                header.addClass('fixed_header');
                jQuery('.custom_bg').remove();
                jQuery('body').fs_gallery({
                    fx: 'fade', /*fade, zoom, slide_left, slide_right, slide_top, slide_bottom*/
                    fit: '". $fit_style ."',
                    slide_time: ". $interval .", /*This time must be < then time in css*/
                    autoplay: ".$autoplay.",
                    show_controls: ". $controls .",
                    slides: gallery_set
                });
                jQuery('.fs_share').click(function(){
                    jQuery('.fs_fadder').removeClass('hided');
                    jQuery('.fs_sharing_wrapper').removeClass('hided');
                    jQuery('.fs_share_close').removeClass('hided');
                });
                jQuery('.fs_share_close').click(function(){
                    jQuery('.fs_fadder').addClass('hided');
                    jQuery('.fs_sharing_wrapper').addClass('hided');
                    jQuery('.fs_share_close').addClass('hided');
                });
                jQuery('.close_controls').click(function(){
                    html.toggleClass('hide_controls');
                });
            });
            </script>";
        }
        echo (($sliderCompile));
        ?>
        <div class="fs_controls fs_controls-port fs-port-standart">
            <div class="fs_controls_append">
                <div class="fs_controls_append_left">
                    <a href="<?php echo esc_js("javascript:history.back()");?>" class="control_button fs_close"></a>
                    <div class="prev_next_links">
                        <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                        <?php next_post_link('<span class="thisnext">%link</span>') ?>
                    </div>
                </div>
                <div class="fs_controls_append_right"></div>
            </div>
        </div>
        <?php if ($hasContent == true) { ?>
            <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port has_content"></a>
        <?php } else { ?>
            <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port no_content"></a>
        <?php } ?>


        <script>
            jQuery(document).ready(function($){
                <?php if ($hasContent == true) { ?>
                jQuery('.fs_controls_append_right').prepend('<a href="<?php echo esc_js("javascript:void(0)");?>" class="post_info <?php echo (($info_class)); ?>"></a>');
                <?php } ?>

                jQuery('.custom_bg').remove();
                jQuery('.main_header').removeClass('hided');
                jQuery('html').addClass('single-gallery');
                <?php if ($controls == 'false') {
                    echo "jQuery('html').addClass('hide_controls');";
                } ?>
                <?php if ($thmbs == 0) {
                    echo "jQuery('html').addClass('without_thmb');";
                } ?>
                jQuery('.share_toggle').click(function(){
                    jQuery('.share_block').toggleClass('show_share');
                });
            });
        </script>

    <?php
    } else {
        // Standart Post Type //
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
        ?>

        <div class="fs_controls fs_controls-port fs-port-standart">
            <div class="fs_controls_append">
                <div class="fs_controls_append_left">
                    <a href="<?php echo esc_js("javascript:history.back()");?>" class="control_button fs_close"></a>
                    <div class="prev_next_links">
                        <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                        <?php next_post_link('<span class="thisnext">%link</span>') ?>
                    </div>
                </div>
                <div class="fs_controls_append_right">
                    <?php if ($hasContent == true) { ?>
                        <a href="<?php echo esc_js("javascript:void(0)");?>" class="control_button post_info <?php echo (($info_class)); ?>"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($hasContent == true) { ?>
            <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port has_content"></a>
        <?php } else { ?>
            <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port no_content"></a>
        <?php } ?>
        <div class="fs-port-bg" style="background-image:url(<?php echo (($featured_image[0])); ?>);"></div>

        <script>
            jQuery(document).ready(function(){
                jQuery('.close_controls').toggle(function(){
                    jQuery(html).addClass('hide_controls')},
                    function(){
                        jQuery(html).removeClass('hide_controls')
                    });
            });
        </script>
    <?php
    } ?>
    <?php
    //Content//

    if ($hasContent == true) { ?>
        <div class="test"></div>
        <div class="port_content">
            <div class="contnt_block">
                <div class="content_wrapper">
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
                                        echo get_the_title();
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
                    <div class="container">
                        <div class="row <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?>">
                            <div class="main_container">
                                <div class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                                    <div class="row">
                                        <div class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                                            <div class="contentarea">
                                                <div <?php post_class("blog_post_preview"); ?>>
                                                    <div class="preview_wrapper single_post">
                                                        <div class="row">
                                                            <div class="span7">
                                                                <div class="meta">
                                                                <span><i class="icon-folder-close-alt"></i>
                                                                    <?php
                                                                    $terms = get_the_terms(get_the_ID(), 'portcat');
                                                                    if ($terms && !is_wp_error($terms)) {
                                                                        $draught_links = array();
                                                                        foreach ($terms as $term) {
                                                                            $draught_links[] = '<a href="' . get_term_link($term->slug, "portcat") . '">' . $term->name . '</a>';
                                                                        }
                                                                        $on_draught = join(", ", $draught_links);
                                                                        $show_cat = true;
                                                                    }

                                                                    if ($terms !== false) {
                                                                        echo (($on_draught));
                                                                    }
                                                                    ?>
                                                                </span>
                                                                    <span><i class="icon-calendar-empty"></i> <?php echo get_the_time("F d, Y"); ?></span>
                                                                    <?php
                                                                    if (isset($gt3_theme_pagebuilder['page_settings']['portfolio']['skills']) && is_array($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'])) {
                                                                        foreach ($gt3_theme_pagebuilder['page_settings']['portfolio']['skills'] as $skillkey => $skillvalue) {
                                                                            echo "<span><i class='" . esc_attr($skillvalue['icon']) . "'></i>" . esc_attr($skillvalue['name']) . ((isset($skillvalue['value']) && strlen($skillvalue['value']) > 0) && (isset($skillvalue['name']) && strlen($skillvalue['name']) > 0) ? ":" : "") . " " . esc_attr($skillvalue['value']) . "</span>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="span5">
                                                                <div class="prev_next_links">
                                                                    <?php next_post_link('<span class="thisnext">%link</span>') ?>
                                                                    <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php echo get_pf_type_output(array("pf" => get_post_format(), "gt3_theme_pagebuilder" => $gt3_theme_pagebuilder));?>
                                                        <div class="preview_content">
                                                            <article class="contentarea">
                                                                <?php
                                                                the_content(__('Read more!', 'canvas'));
                                                                wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'canvas') . ': ', 'after' => '</div>'));
                                                                ?>
                                                            </article>
                                                        </div>
                                                        <div class="postbottom">
                                                            <div class="row">
                                                                <div class="span8">
                                                                    <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                                                                    <?php next_post_link('<span class="thisnext">%link</span>') ?>
                                                                </div>
                                                                <div class="span4">
                                                                    <div class="blogpost_share">
                                                                        <div class="views_likes">
                                                                            <?php
                                                                            echo '
                                                                        <div class="post_likes post_likes_add ' . (isset($_COOKIE['like' . get_the_ID()]) ? "already_liked" : "") . '" data-postid="' . get_the_ID() . '" data-modify="like_post">
                                                                            <i class="stand_icon ' . (isset($_COOKIE['like' . get_the_ID()]) ? "icon-heart" : "icon-heart-empty") . '"></i>
                                                                            <span>' . ((isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()] > 0) ? $all_likes[get_the_ID()] : 0) . '</span>
                                                                        </div>
                                                                        ';
                                                                            ?>
                                                                        </div>
                                                                        <a target="_blank"
                                                                           href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (strlen($gt3_theme_featured_image[0]) > 0) ? $gt3_theme_featured_image[0] : gt3_get_theme_option("logo"); ?>"
                                                                           class="share_pinterest"><i
                                                                                class="stand_icon icon-pinterest"></i></a>
                                                                        <a target="_blank"
                                                                           href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"
                                                                           class="share_gplus"><i class="icon-google-plus"></i></a>
                                                                        <a target="_blank"
                                                                           href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>"
                                                                           class="share_tweet"><i
                                                                                class="stand_icon icon-twitter"></i></a>
                                                                        <a target="_blank"
                                                                           href="https://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>"
                                                                           class="share_facebook"><i
                                                                                class="stand_icon icon-facebook-sign"></i></a>
                                                                        <span class="share"><?php echo __('Share this', 'canvas'); ?></span>
                                                                        <div class="clear"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    if ($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "no-sidebar") {
                                                        $posts_per_line = 4;
                                                    } else {
                                                        $posts_per_line = 3;
                                                    }

                                                    if (gt3_get_theme_option("related_posts") == "on" && is_gt3_builder_active()) {

                                                        if ($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "no-sidebar") {
                                                            $posts_per_line = 3;
                                                        } else {
                                                            $posts_per_line = 3;
                                                        }

                                                        echo '<div class="row"><div class="span12 module_feature_posts related single_portfolio_post">';

                                                        $new_term_list = get_the_terms(get_the_id(), "portcat");
                                                        $echoallterm = '';
                                                        $echoterm = array();
                                                        if (is_array($new_term_list)) {
                                                            foreach ($new_term_list as $term) {
                                                                $echoterm[] = $term->term_id;
                                                            }
                                                        }
                                                        if (is_array($echoterm) && count($echoterm) > 0) {
                                                            $post_type_terms = implode(",", $echoterm);
                                                        } else {
                                                            $post_type_terms = "";
                                                        }

                                                        echo do_shortcode("[feature_portfolio
                                            heading_color=''
                                            heading_size='h5'
                                            heading_text=''
                                            number_of_posts='" . $posts_per_line . "'
                                            posts_per_line=" . $posts_per_line . "
                                            sorting_type='random'
                                            related='yes'
                                            now_open_pageid='" . get_the_id() . "'
                                            post_type_terms='" . $post_type_terms . "'
                                            post_type='port'][/feature_portfolio]");
                                                        echo '</div></div>';
                                                    }
                                                    ?>

                                                    <?php if (gt3_get_theme_option("portfolio_comments") == "enabled") { ?>

                                                        <div class="row">
                                                            <div class="span12">
                                                                <?php comments_template(); ?>
                                                            </div>
                                                        </div>

                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php get_sidebar('left'); ?>
                                    </div>
                                </div>
                                <?php get_sidebar('right'); ?>
                                <div class="clear"></div>
                            </div><!-- main_container -->
                        </div>
                    </div><!-- container -->
                </div><!-- content_wrapper -->
            </div><!-- contnt_block -->
        </div><!-- port_content -->
        <div class="clear"></div>
    <?php
    }
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('.post_info').click(function(){
                if (!jQuery(this).hasClass('noContent')) {
                    html.toggleClass('show_content');
                }
            });
        });
    </script>
<?php
get_footer('none');
} ?>