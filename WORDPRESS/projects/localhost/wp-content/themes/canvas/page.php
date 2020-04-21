<?php
the_post();
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];
if (gt3_get_theme_option('menu_type') == 'horizontal') {
    get_header('hor-menu');
} else {
    get_header();
}
?>

    <div class="container">
        <div class="row <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?>">
            <div class="main_container">
                <div class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                    <div class="row">
                        <div class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                            <div class="contentarea">
                                <?php
                                the_content(__('Read more!', 'canvas'));
                                wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'canvas') . ': ', 'after' => '</div>'));

                                if (gt3_get_theme_option("page_comments") == "enabled") { ?>

                                    <div class="row">
                                        <div class="span12">
                                            <?php comments_template(); ?>
                                        </div>
                                    </div>
                                <?php } ?>
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