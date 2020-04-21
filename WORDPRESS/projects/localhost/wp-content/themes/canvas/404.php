<?php
$gt3_theme_pagebuilder = gt3_get_default_pb_settings();
if (gt3_get_theme_option('menu_type') == 'horizontal') {
    get_header('hor-menu');
} else {
    get_header();
}
?>

<div class="container cont404">
    <div class="row <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?>">
        <div class="main_container">
            <div class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                <div class="row">
                    <div class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                        <div class="contentarea">
                            <div class="block404">
                                <h4><?php echo __('Oops! Not found!', 'canvas'); ?></h4>
                                <p><?php echo __('Apologies, but we were unable to find what you were looking for.', 'canvas'); ?></p>
                                <div class="form404">
                                    <?php get_search_form(true); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php get_sidebar('left'); ?>
                </div>
            </div>
            <?php get_sidebar('right'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>