<?php
$gt3_theme_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());

if (get_the_category()) $categories = get_the_category();
$post_categ = '';

if (isset($categories)) {
    foreach ($categories as $category) {
        $post_categ = $post_categ . '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . ', ';
    }
}

if (get_the_tags() !== '') {
    $posttags = get_the_tags();

}
if ($posttags) {
    $post_tags = '';
    $post_tags_compile = '<span class="preview_meta_tags"><i class="icon-tag"></i>';
    foreach ($posttags as $tag) {
        $post_tags = $post_tags . '<a href="?tag=' . $tag->slug . '">' . $tag->name . '</a>' . ', ';
    }
    $post_tags_compile .= ' ' . trim($post_tags, ', ') . '</span>';
} else {
    $post_tags_compile = '';
}

$comments_num = '' . get_comments_number(get_the_ID()) . '';

if ($comments_num == 1) {
    $comments_text = '';
} else {
    $comments_text = '';
}

$compile_bloglisting = '
<div class="bloglisting_post row">
    <div class="span12 post_preview">
        <h3 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>
        ' . get_pf_type_output(array("pf" => get_post_format(), "gt3_theme_pagebuilder" => $gt3_theme_pagebuilder)) . '
        <div class="post_preview_wrapper">
            <div class="date">
                <div class="month">
                    ' . get_the_time("M") . '
                </div>
                <div class="day">
                    ' . get_the_time("d") . '
                </div>
            </div>
            <p>' . ((strlen(get_the_excerpt()) > 0) ? get_the_excerpt() : get_the_content()) . '</p>
            <div class="clear"></div>
        </div>';

if (is_gt3_builder_active()) {
    $compile_bloglisting .= '
        <div class="post_otput_container">

            <div class="readmore_cont">
                ' . do_shortcode("[custom_button style='btn_normal btn_type1' icon='' target='_self' href='" . get_permalink() . "']" . __('Read More<i class="icon-caret-right"></i>', 'canvas') . "[/custom_button]") . '
            </div>
            <div class="meta">
                <span><i class="icon-pencil"></i><a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author_meta('display_name') . '</a></span>';
            if (get_post_type(get_the_ID()) == 'post') {
                $compile_bloglisting .= '
                    <span><i class="icon-folder-close-alt"></i>' . trim($post_categ, ', ') . '</span>
                ';
            }
    $compile_bloglisting .= '
                <span><i class="icon-comment-alt"></i><a href="' . get_comments_link() . '">' . get_comments_number(get_the_ID()) . ' ' . $comments_text . '</a></span>
            </div>
        </div>
    ';
}

$compile_bloglisting .= '
    </div>
</div>
<div class="horisontal_divider"></div>
';

echo (($compile_bloglisting));
?>