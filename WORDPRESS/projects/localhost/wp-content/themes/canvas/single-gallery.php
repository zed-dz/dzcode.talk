<?php
if (!post_password_required()) {
    the_post();

    /* LOAD PAGE BUILDER ARRAY */
    $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    $gt3_theme_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
    $gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-fullscr');
    } else {
        get_header('portfolio-fullscreen');
    }
    ?>
<?php
    wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);
    wp_enqueue_script('gt3_fsGallery_js', get_template_directory_uri() . '/js/fs_gallery.js', array(), false, true);

    $sliderCompile = "";
    if (isset($gt3_theme_pagebuilder['sliders']['fullscreen']['slides']) && is_array($gt3_theme_pagebuilder['sliders']['fullscreen']['slides'])) {


        $controls = 1;
        $thmbs = 0;
        $autoplay = 1;
        $interval = 3300;
        $fit_style = "fit_width";

        $sliderCompile .= '<script>gallery_set = [';
        foreach ($gt3_theme_pagebuilder['sliders']['fullscreen']['slides'] as $imageid => $image) {
            $uniqid = mt_rand(0, 9999);
            $photoTitle = (isset($image['title']['value']) ? $image['title']['value'] : '');
            $photoCaption = "";
            $titleColor = "a8abad";
            $captionColor = "a8abad";

            if ($image['slide_type'] == 'image') {
                $sliderCompile .= '{type: "image", image: "' . wp_get_attachment_url($image['attach_id']) . '", thmb: "", alt: "' . str_replace('"', "'", $photoTitle) . '", title: "' . str_replace('"', "'", $photoTitle) . '", description: "' . str_replace('"', "'", $photoCaption) . '", titleColor: "#' . $titleColor . '", descriptionColor: "#' . $captionColor . '"},';
            } else if ($image['slide_type'] == 'video') {
                #YOUTUBE
                $is_youtube = substr_count($image['src'], "youtu");
                if ($is_youtube > 0) {
                    $videoid = substr(strstr($image['src'], "="), 1);
                    $thmb = "https://img.youtube.com/vi/".$videoid."/0.jpg";
                    $sliderCompile .= '{type: "youtube", uniqid: "' . $uniqid . '", src: "' . $videoid . '", thmb: "'.$thmb.'", alt: "' . str_replace('"', "'",  $photoTitle) . '", title: "' . str_replace('"', "'", $photoTitle) . '", description: "' . str_replace('"', "'",  $photoCaption) . '", titleColor: "#'.$titleColor.'", descriptionColor: "#'.$captionColor.'"},';
                }
                #VIMEO
                $is_vimeo = substr_count($image['src'], "vimeo");
                if ($is_vimeo > 0) {
                    $videoid = substr(strstr($image['src'], "m/"), 2);
                    $thmbArray = json_decode(wp_remote_get("https://vimeo.com/api/v2/video/".$videoid.".json"));
                    if (!empty($thmbArray))
                        $thmb = $thmbArray[0]->thumbnail_large;
                    $sliderCompile .= '{type: "vimeo", uniqid: "' . $uniqid . '", src: "' . $videoid . '", thmb: "'.$thmb.'", alt: "' . str_replace('"', "'",  $photoTitle) . '", title: "' . str_replace('"', "'", $photoTitle) . '", description: "' . str_replace('"', "'",  $photoCaption) . '", titleColor: "#'.$titleColor.'", descriptionColor: "#'.$captionColor.'"},';
                }
            }
        }

        $sliderCompile .= "]
            jQuery(document).ready(function(){
            var header = jQuery('header'),
                html = jQuery('html');
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
                <h6 class="fs_title_main"><?php echo the_title(); ?>&nbsp;</h6>
            </div>
            <div class="fs_controls_append_right"></div>
        </div>
    </div>
        <a href="<?php echo esc_js("javascript:void(0)");?>" class="close_controls show_me_always in_post in_port has_content"></a>


    <script>
        jQuery(document).ready(function($){
            jQuery('header').addClass('single_gallery_header');
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
    get_footer('none');
} else {
    the_content();
}
?>