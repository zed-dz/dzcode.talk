<?php
the_post();

/* LOAD PAGE BUILDER ARRAY */
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$attachment_image_src = wp_get_attachment_image_src(get_the_ID(), "full");
$gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];
if (gt3_get_theme_option('menu_type') == 'horizontal') {
    get_header('hor-menu');
} else {
    get_header();
}
?>

<div class="container">
    <div class="content_block <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?> row">
        <div class="main_container">
            <div
                class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                <div class="row">
                    <div
                        class="posts-block <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "left-sidebar" || $gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                        <div class="contentarea">
                            <div class="row">
                                <div class="span12 module_cont module_blog">
                                    <article class="contentarea" style="text-align: center;">
                                        <?php if (isset($attachment_image_src[1]) && $attachment_image_src[1] > 0) { ?>
                                            <img src="<?php echo (($attachment_image_src[0])); ?>" alt="<?php echo esc_html__('Attachment Image', 'canvas' ); ?>"/>
                                        <?php } ?>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- .contentarea -->
                    </div>
                    <?php get_sidebar('left'); ?>
                </div>
                <div class="clear"><!-- ClearFix --></div>
            </div>
            <!-- .fl-container -->
            <?php get_sidebar('right'); ?>
            <div class="clear"><!-- ClearFix --></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>