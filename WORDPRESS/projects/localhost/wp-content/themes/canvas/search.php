<?php
$gt3_theme_pagebuilder = gt3_get_default_pb_settings();
$gt3_current_page_sidebar = $gt3_theme_pagebuilder['settings']['layout-sidebars'];
if (gt3_get_theme_option('menu_type') == 'horizontal') {
    get_header('hor-menu-fullscr');
} else {
    get_header('fullscreen');
}
?>
    <div class="bc_area">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h1 class="entry-title"><?php echo __('Search', 'canvas') ?></h1>
                    <?php
                        gt3_the_breadcrumb();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content_block <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?> row">
            <div class="main_container">
                <div class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                    <div class="row">
                        <div class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                            <div class="contentarea">
                                <?php
                                echo '<div class="row-fluid"><div class="span12">';
                                global $paged;
                                $foundSomething = false;

                                if ($paged < 1) {
                                    $args = array(
                                        'numberposts' => -1,
                                        'post_type' => 'any',
                                        'meta_query' => array(
                                            array(
                                                'key' => 'pagebuilder',
                                                'value' => get_search_query(),
                                                'compare' => 'LIKE',
                                                'type' => 'CHAR'
                                            )
                                        )
                                    );
                                    $query = new WP_Query($args);
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <div <?php post_class("blog_post_preview theme_blog_listing search_page"); ?>>
                                            <div class="preview_wrapper no_marg">
                                                <div class="preview_topblock">
                                                    <h4 class="blogpost_title mb10"><a
                                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                    <div class="preview_meta">
                                                        <span class="date"><i class="icon-calendar-empty"></i><?php echo get_the_time("F d, Y"); ?></span>
                                                        <span class="preview_meta_author">
                                                            by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
                                                        </span>
                                                    </div>
                                                    <article class="contentarea mt15">

                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="horisontal_divider"></div>
                                        <?php
                                        $foundSomething = true;
                                    endwhile;
                                    wp_reset_query();
                                }

                                $defaults = array('numberposts' => 10, 'post_type' => 'any', 'post_status' => 'publish', 'post_password' => '', 'suppress_filters' => false, 's' => get_search_query(), 'paged' => $paged);
                                $query = http_build_query($defaults);
                                $posts = get_posts($query);

                                foreach ($posts as $post) {
                                    setup_postdata($post);
                                    ?>
                                    <div <?php post_class("blog_post_preview theme_blog_listing search_page"); ?>>
                                        <div class="preview_wrapper">
                                            <div class="preview_topblock no_marg">
                                                <h4 class="blogpost_title mb10">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <div class="preview_meta">
                                                    <span class="date"><i class="icon-calendar-empty"></i><?php echo get_the_time("F d, Y"); ?></span>
                                                    <span class="preview_meta_author">
                                                        by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
                                                    </span>
                                                </div>
                                                <article class="contentarea mt15">

                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="horisontal_divider"></div>
                                    <?php

                                    $foundSomething = true;
                                }
                                gt3_get_theme_pagination();

                                if ($foundSomething == false) {
                                    ?>
                                    <div class="block404">
                                        <h4><?php echo __('Oops!', 'canvas'); ?> <?php echo __('Not Found!', 'canvas'); ?></h4>
                                        <p><?php echo __('Apologies, but we were unable to find what you were looking for.', 'canvas'); ?></p>

                                        <div class="form404">
                                            <?php get_search_form(true); ?>
                                        </div>
                                    </div>
                                <?php
                                }

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