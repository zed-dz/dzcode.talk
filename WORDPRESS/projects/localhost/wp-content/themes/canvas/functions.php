<?php
update_option( 'gt3_registration_status', 'active' );
update_option( 'gt3_registration_supported_until', '12.12.2030' );
update_option( 'gt3_supported_notice_srart', false );
update_option( 'sdfgdsfgdfg' , 'Product is activated!' );
if (!function_exists('gt3_string_coding')){
    function gt3_string_coding($code){
        return call_user_func('base64'.'_encode', $code);
    }
}

if (!isset($content_width)) $content_width = 940;

function gt3_get_theme_pagebuilder($postid, $args = array())
{
    $gt3_theme_pagebuilder = get_post_meta($postid, "pagebuilder", true);
    if (!is_array($gt3_theme_pagebuilder)) {
        $gt3_theme_pagebuilder = array();
    }

    if (!isset($gt3_theme_pagebuilder['settings']['show_content_area'])) {
        $gt3_theme_pagebuilder['settings']['show_content_area'] = "yes";
    }
    if (!isset($gt3_theme_pagebuilder['settings']['show_page_title'])) {
        $gt3_theme_pagebuilder['settings']['show_page_title'] = "yes";
    }
    if (!isset($gt3_theme_pagebuilder['settings']['show_title_area'])) {
        $gt3_theme_pagebuilder['settings']['show_title_area'] = "yes";
    }
    if (!isset($gt3_theme_pagebuilder['settings']['show_breadcrumb_area'])) {
        $gt3_theme_pagebuilder['settings']['show_breadcrumb_area'] = "yes";
    }
    if (isset($args['not_prepare_sidebars']) && $args['not_prepare_sidebars'] == "true") {

    } else {
        if (!isset($gt3_theme_pagebuilder['settings']['layout-sidebars']) || $gt3_theme_pagebuilder['settings']['layout-sidebars'] == "default") {
            $gt3_theme_pagebuilder['settings']['layout-sidebars'] = gt3_get_theme_option("default_sidebar_layout");
        }
    }

    return $gt3_theme_pagebuilder;
}

function gt3_get_theme_sidebars_for_admin()
{
    $theme_sidebars = gt3_get_theme_option("theme_sidebars");
    if (!is_array($theme_sidebars)) {
        $theme_sidebars = array();
    }

    return $theme_sidebars;
}

/*Work with options*/
if (!function_exists('gt3pb_get_option')) {
    function gt3pb_get_option($optionname, $defaultValue = "")
    {
        $returnedValue = get_option("gt3pb_" . $optionname, $defaultValue);

        if (gettype($returnedValue) == "string") {
            return stripslashes($returnedValue);
        } else {
            return $returnedValue;
        }
    }
}

if (!function_exists('gt3pb_delete_option')) {
    function gt3pb_delete_option($optionname)
    {
        return delete_option("gt3pb_" . $optionname);
    }
}

if (!function_exists('gt3pb_update_option')) {
    function gt3pb_update_option($optionname, $optionvalue)
    {
        if (update_option("gt3pb_" . $optionname, $optionvalue)) {
            return true;
        }
    }
}

function gt3_get_theme_option($optionname, $defaultValue = "")
{
    $returnedValue = get_option(GT3_THEMESHORT . $optionname, $defaultValue);

    if (gettype($returnedValue) == "string") {
        return stripslashes($returnedValue);
    } else {
        return $returnedValue;
    }
}

function gt3_the_theme_option($optionname, $beforeoutput = "", $afteroutput = "")
{
    $returnedValue = get_option(GT3_THEMESHORT . $optionname);

    if (strlen($returnedValue) > 0) {
        echo '' . $beforeoutput . stripslashes($returnedValue) . $afteroutput;
    }
}

function gt3_get_if_strlen($str, $beforeoutput = "", $afteroutput = "")
{
    if (strlen($str) > 0) {
        return $beforeoutput . $str . $afteroutput;
    }
}

function gt3_delete_theme_option($optionname)
{
    return delete_option(GT3_THEMESHORT . $optionname);
}

function gt3_update_theme_option($optionname, $optionvalue)
{
    if (update_option(GT3_THEMESHORT . $optionname, $optionvalue)) {
        return true;
    }
}

function gt3_messagebox($actionmessage)
{
    $compile = "<div class='admin_message_box fadeout'>" . $actionmessage . "</div>";
    return $compile;
}

function gt3_theme_comment($comment, $args, $depth)
{
    $max_depth_comment = ($args['max_depth'] > 4 ? 4 : $args['max_depth']);

    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="stand_comment">
        <div class="commentava">
            <?php echo get_avatar($comment->comment_author_email, 50); ?>
        </div>
        <div class="thiscommentbody">
            <div class="comment_info">
                <span class="author_name"><?php printf('%s', get_comment_author_link()) ?> <?php edit_comment_link('(Edit)', '  ', '') ?></span>
                <span>:</span>
                <span class="date"><?php printf('%1$s', get_comment_date("F d, Y")) ?></span>
                <!--<span>:</span>-->
                <?php comment_reply_link(array_merge($args, array('before' => ' <span class="comments">', 'after' => '</span>', 'depth' => $depth, 'reply_text' => __(' Reply', 'canvas'), 'max_depth' => $max_depth_comment))) ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <p><em><?php _e('Your comment is awaiting moderation.', 'canvas'); ?></em></p>
            <?php endif; ?>
            <?php comment_text() ?>
        </div>
        <div class="clear"></div>
    </div>
<?php
}

#Custom paging
function gt3_get_theme_pagination($range = 10, $type = "")
{
    if ($type == "show_in_shortcodes") {
        global $paged, $gt3_wp_query_in_shortcodes;
        $wp_query = $gt3_wp_query_in_shortcodes;
    } else {
        global $paged, $wp_query;
    }

    if (empty($paged)) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    }

    $max_page = $wp_query->max_num_pages;
    if ($max_page > 1) {
        echo '<ul class="pagerblock">';
    }
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        $ppl = "<span class='btn_prev'></span>";
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo "<li><a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<li><a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo "<li><a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a></li>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo "<li><a href='" . get_pagenum_link($i) . "'";
                if ($i == $paged) echo " class='current'";
                echo ">$i</a></li>";
            }
        }
        $npl = "<span class='btn_next'></span>";
    }
    if ($max_page > 1) {
        echo '</ul>';
    }
}

function gt3_the_pb_custom_bg_and_color($gt3_theme_pagebuilder, $args = array())
{
    if (!isset($gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'])) {
        $gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] = "default";
    }

    if ($gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] == "default") {
        $layout_type = gt3_get_theme_option("default_layout");
        $bgimg_url = gt3_get_theme_option("bg_img");
        $bgpattern_url = gt3_get_theme_option("bg_pattern");
        $bgcolor_hash = gt3_get_theme_option("default_bg_color");
    } else {
        $layout_type = $gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'];
        $bgimg_url = wp_get_attachment_url($gt3_theme_pagebuilder['page_settings']['page_layout']['img']['attachid']);
        $bgpattern_url = wp_get_attachment_url($gt3_theme_pagebuilder['page_settings']['page_layout']['img']['attachid']);
        $bgcolor_hash = $gt3_theme_pagebuilder['page_settings']['page_layout']['color']['hash'];
    }

    if ($layout_type == "bgimage") {
        if (isset($args['classes_for_body']) && $args['classes_for_body'] == true) {
            return "gt3_boxed gt3_bg_image";
        } else {
            echo '<div class="custom_bg img_bg" style="background-image: url(\'' . $bgimg_url . '\'); background-color:#' . $bgcolor_hash . ';"></div>';
        }
        return true;
    }
    if ($layout_type == "boxed") {
        if (isset($args['classes_for_body']) && $args['classes_for_body'] == true) {
            return "gt3_boxed gt3_bg_pattern";
        } else {
            echo '<div class="custom_bg" style="background-image: url(\'' . $bgpattern_url . '\'); background-color:#' . $bgcolor_hash . ';"></div>';
        }
        return true;
    }
    if ($layout_type == "clean") {
        if (isset($args['classes_for_body']) && $args['classes_for_body'] == true) {
            return "gt3_clean";
        }
        return true;
    }
}

if (!function_exists('gt3_get_default_pb_settings')) {
    function gt3_get_default_pb_settings()
    {

        $gt3_theme_pagebuilder['page_settings']['page_layout']['layout_type'] = gt3_get_theme_option("default_layout");
        $gt3_theme_pagebuilder['settings']['layout-sidebars'] = gt3_get_theme_option("default_sidebar_layout");
        $gt3_theme_pagebuilder['settings']['left-sidebar'] = "Default";
        $gt3_theme_pagebuilder['settings']['right-sidebar'] = "Default";
        $gt3_theme_pagebuilder['settings']['bg_image']['src'] = gt3_get_theme_option("bg_img");
        $gt3_theme_pagebuilder['settings']['custom_color']['status'] = gt3_get_theme_option("show_bg_color_by_default");
        $gt3_theme_pagebuilder['settings']['custom_color']['value'] = gt3_get_theme_option("default_bg_color");
        $gt3_theme_pagebuilder['settings']['bg_image']['type'] = gt3_get_theme_option("default_bg_img_position");

        return $gt3_theme_pagebuilder;
    }
}

if (!function_exists('gt3_get_selected_pf_images')) {
    function gt3_get_selected_pf_images($gt3_theme_pagebuilder)
    {
        if (!isset($compile)) {
            $compile = '';
        }
        if (isset($gt3_theme_pagebuilder['post-formats']['images']) && is_array($gt3_theme_pagebuilder['post-formats']['images'])) {
            if (count($gt3_theme_pagebuilder['post-formats']['images']) == 1) {
                $onlyOneImage = "oneImage";
            } else {
                $onlyOneImage = "";
            }
            $compile .= '
                <div class="slider-wrapper theme-default">
                    <div class="nivoSlider ' . $onlyOneImage . '">
            ';

            if (is_array($gt3_theme_pagebuilder['post-formats']['images'])) {
                foreach ($gt3_theme_pagebuilder['post-formats']['images'] as $imgid => $img) {
                    $compile .= '<img src="' . aq_resize(wp_get_attachment_url($img['attach_id']), "1170", "563", true, true, true) . '" data-thumb="' . aq_resize(wp_get_attachment_url($img['attach_id']), "1170", "563", true, true, true) . '" alt="'. esc_html__('Attachment Image', 'canvas' ) .'" />
                    ';
                }
            }

            $compile .= '
                    </div>
                </div>
            ';

        }

        $GLOBALS['showOnlyOneTimeJS']['nivo_slider'] = "
        <script>
            jQuery(document).ready(function() {
                jQuery('.nivoSlider').each(function(){
                    jQuery(this).nivoSlider({
                        directionNav: true,
                        controlNav: false,
                        effect:'sliceUpDownLeft',
                        animSpeed: 600,
                        pauseTime:3000
                    });
                });
            });
        </script>
        ";

        wp_enqueue_script('gt3_nivo_js', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
        return $compile;
    }
}

if (!function_exists('gt3_HexToRGB')) {
    function gt3_HexToRGB($hex = "ffffff")
    {
        $color = array();
        if (strlen($hex) < 1) {
            $hex = "ffffff";
        }

        if (strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex, 0, 1) . $r);
            $color['g'] = hexdec(substr($hex, 1, 1) . $g);
            $color['b'] = hexdec(substr($hex, 2, 1) . $b);
        } else if (strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
        }

        return $color['r'] . "," . $color['g'] . "," . $color['b'];
    }
}

if (!function_exists('gt3_smarty_modifier_truncate')) {
    function gt3_smarty_modifier_truncate($string, $length = 80, $etc = '... ',
                                          $break_words = false, $middle = false)
    {
        if ($length == 0)
            return '';

        if (mb_strlen($string, 'utf8') > $length) {
            $length -= mb_strlen($etc, 'utf8');
            if (!$break_words && !$middle) {
                $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
            }
            if (!$middle) {
                return mb_substr($string, 0, $length, 'utf8') . $etc;
            } else {
                return mb_substr($string, 0, $length / 2, 'utf8') . $etc . mb_substr($string, -$length / 2, utf8);
            }
        } else {
            return $string;
        }
    }
}

function gt3_show_social_icons($array)
{
    $compile = "";
    foreach ($array as $key => $value) {
        if (strlen(gt3_get_theme_option($value['uniqid'])) > 0) {
            $compile .= "<a class='" . $value['class'] . "' target='" . $value['target'] . "' href='" . gt3_get_theme_option($value['uniqid']) . "' title='" . $value['title'] . "'></a>";
        }
    }
    $compile .= "";
    if (is_array($array) && count($array) > 0) {
        return $compile;
    } else {
        return "";
    }
}

add_action("wp_head", "wp_head_mix_var");
function wp_head_mix_var()
{
    echo "<script>var " . GT3_THEMESHORT . "var = true;</script>";
}

function get_pf_type_output($args)
{
    $compile = "";
    extract($args);
    if (!isset($width)) {$width = 1170;}
    if (!isset($height)) {$height = 600;}

    if (isset($pf)) {
        $compile .= '<div class="pf_output_container">';

        if (isset($fw_post) && $fw_post == true) {$pf = "text"; $height = null;}

        /* Image */
        if ($pf == 'image') {
            $compile .= gt3_get_selected_pf_images($gt3_theme_pagebuilder);
        } else if ($pf == "video") {

            $uniqid = mt_rand(0, 9999);
            global $gt3_YTApiLoaded, $gt3_allYTVideos;
            if (empty($gt3_YTApiLoaded)) {
                $gt3_YTApiLoaded = false;
            }
            if (empty($gt3_allYTVideos)) {
                $gt3_allYTVideos = array();
            }

            $video_url = ((isset($gt3_theme_pagebuilder['post-formats']['videourl']) && strlen($gt3_theme_pagebuilder['post-formats']['videourl']) > 0) ? $gt3_theme_pagebuilder['post-formats']['videourl'] : "");
            if (isset($gt3_theme_pagebuilder['post-formats']['video_height'])) {
                $video_height = $gt3_theme_pagebuilder['post-formats']['video_height'];
            } else {
                $video_height = $GLOBALS["pbconfig"]['default_video_height'];
            }

            #YOUTUBE
            $is_youtube = substr_count($video_url, "youtu");
            if ($is_youtube > 0) {
                $videoid = substr(strstr($video_url, "="), 1);
                $compile .= "<div id='player{$uniqid}'></div>";

                array_push($gt3_allYTVideos, array("h" => $video_height, "w" => "100%", "videoid" => $videoid, "uniqid" => $uniqid));
            }

            #VIMEO
            $is_vimeo = substr_count($video_url, "vimeo");
            if ($is_vimeo > 0) {
                $videoid = substr(strstr($video_url, "m/"), 2);
                $compile .= "
            <iframe src=\"https://player.vimeo.com/video/" . $videoid . "\" width=\"100%\" height=\"" . $video_height . "\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        ";
            }
        } else {
            $gt3_theme_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
            if (strlen($gt3_theme_featured_image[0]) > 0) {
                $compile .= '<img class="featured_image_standalone" src="' . aq_resize($gt3_theme_featured_image[0], $width, $height, true, true, true) . '" alt="'. esc_html__('Featured Image', 'canvas' ) .'" />';
            }
        }

        $compile .= '</div>';
    }

    $GLOBALS['showOnlyOneTimeJS']['post_video_js'] = "
	<script>
		function video_size() {
			if (jQuery(window).width() < 768) {
				jQuery('.pf_output_container').each(function(){	
					jQuery(this).find('iframe').css({'height': jQuery(this).width()*9/16 + 'px'});
				});
			} else {
				jQuery('.pf_output_container iframe').css({'height': ''});
			}	
		}
		jQuery(document).ready(function($) {
			video_size();
		});
		jQuery(window).resize(function () {
			video_size();
		});
	</script>
	";

    return $compile;
}

function init_YTvideo_in_footer()
{
    global $gt3_allYTVideos;
    $compile = "";
    $result = "";
    if (is_array($gt3_allYTVideos) && count($gt3_allYTVideos) > 0) {
        $compile .= "
        <script>
        var tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        function onPlayerReady(event) {}
        function onPlayerStateChange(event) {}
        function stopVideo() {
            player.stopVideo();
        }
        ";

        foreach ($gt3_allYTVideos as $key => $value) {
            $result .= "
            new YT.Player('player{$value['uniqid']}', {
                height: '{$value['h']}',
                width: '{$value['w']}',
                playerVars: { 'autoplay': 0, 'controls': 1 },
                videoId: '{$value['videoid']}',
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
            ";
        }
        $compile .= "function onYouTubeIframeAPIReady() {" . $result . "}</script>";
    }
    echo (($compile));
}

add_action('wp_footer', 'init_YTvideo_in_footer');


function gt3_get_field_media_and_attach_id($name, $attach_id, $previewW = "200px", $previewH = null, $classname = "")
{
    return "<div class='select_image_root " . $classname . "'>
        <input type='hidden' name='" . $name . "' value='" . $attach_id . "' class='select_img_attachid'>
        <div class='select_img_preview'><img src='" . ($attach_id > 0 ? aq_resize(wp_get_attachment_url($attach_id), $previewW, $previewH, true, true, true) : "") . "' alt='".  esc_html__('Attachment Image', 'canvas' )."'></div>
        <input type='button' class='button button-secondary button-large select_attach_id_from_media_library' value='Select'>
    </div>";
}

function gt3_the_breadcrumb()
{
    $showOnHome = 1;
    $delimiter = '';
    $home = __('Home', 'canvas');
    $showCurrent = 1;
    $before = '<span class="current">';
    $after = '</span>';

    global $post;
    $homeLink = home_url();

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<div class="breadcrumbs"><span>' . $home . '</span></div>';

    } else {

        echo '<div class="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . '';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo wp_kses_post($before) . 'Archive "' . single_cat_title('', false) . '"' . $after;

        } #PORTFOLIO
        elseif (get_post_type() == 'port') {

            the_terms($post->ID, 'portcat', '', '', '');

            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif (is_search()) {
            echo wp_kses_post($before) . 'Search for "' . get_search_query() . '"' . $after;

        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $delimiter . ' ';
            echo wp_kses_post($before) . get_the_time('d') . $after;

        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . ' ';
            echo wp_kses_post($before) . get_the_time('F') . $after;

        } elseif (is_year()) {
            echo wp_kses_post($before) . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {

                $parent_id = $post->post_parent;
                if ($parent_id > 0) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo (($breadcrumbs[$i]));
                        if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
                    }
                    if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                } else {
                    echo wp_kses_post($before) . get_the_title() . $after;
                }

            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo (($cats));
                if ($showCurrent == 1) echo wp_kses_post($before) . get_the_title() . $after;
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo wp_kses_post($before) . $post_type->labels->singular_name . $after;

        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) echo wp_kses_post($before) . get_the_title() . $after;

        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo (($breadcrumbs[$i]));
                if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo '' . $delimiter . '' . $before . get_the_title() . $after;

        } elseif (is_tag()) {
            echo wp_kses_post($before) . 'Tag "' . single_tag_title('', false) . '"' . $after;

        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo wp_kses_post($before) . 'Author ' . $userdata->display_name . $after;

        } elseif (is_404()) {
            echo wp_kses_post($before) . 'Error 404' . $after;
        }

        echo '</div>';

    }
}

function gt3_showJSInFooter()
{
    if (isset($GLOBALS['showOnlyOneTimeJS']) && is_array($GLOBALS['showOnlyOneTimeJS'])) {
        foreach ($GLOBALS['showOnlyOneTimeJS'] as $id => $js) {
            echo (($js));
        }
    }
}

add_action('wp_footer', 'gt3_showJSInFooter');

function gt3_get_dynamic_sidebar($index)
{
    $sidebar_contents = "";
    ob_start();
    dynamic_sidebar($index);
    $sidebar_contents = ob_get_clean();
    return $sidebar_contents;
}

function is_gt3_builder_active() {
    return defined('GT3PBPLUGINROOTURL');
}

require_once("core/loader.php");

// Woocommerce Related Products (Redefine woocommerce_output_related_products())
function woocommerce_output_related_products() {
    $args = array(
		'posts_per_page' => gt3_get_theme_option("woo_related_products")
	);
	woocommerce_related_products($args);
}

// Woocommerce add to list categories
add_action('woocommerce_after_shop_loop_item','woocommerce_template_single_meta');

// Woocommerce products per page (9)
add_filter( 'loop_shop_per_page', function ($cols) { return esc_attr(gt3_get_theme_option("woo_shop_items_per_page"));}, 20 );

// Woocommerce Header cart
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo (($woocommerce->cart->get_cart_url())); ?>" title="<?php _e('View your shopping cart', 'canvas'); ?>"><span class="total_price"><i class="icon-shopping-cart"></i><?php echo (($woocommerce->cart->get_cart_total())); ?></span><?php echo sprintf(_n('(%d item)', '(%d items)', $woocommerce->cart->cart_contents_count, 'canvas'), $woocommerce->cart->cart_contents_count);?>
    </a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

add_theme_support('woocommerce');

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function gt3_theme_slug_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'gt3_theme_slug_setup' );
