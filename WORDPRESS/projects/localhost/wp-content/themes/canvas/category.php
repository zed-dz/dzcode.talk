<?php
#Emulate default settings for page without personal ID
$gt3_theme_pagebuilder = gt3_get_default_pb_settings();
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
                            echo '<div class="row"><div class="span12">';
                            while (have_posts()) : the_post();
                                get_template_part("bloglisting");
                            endwhile;
                            gt3_get_theme_pagination();
                            echo '</div><div class="clear"></div></div>';
                            ?>
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