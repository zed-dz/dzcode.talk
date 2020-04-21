<?php
the_post();

/* LOAD PAGE BUILDER ARRAY */
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$gt3_theme_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
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
                            class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                            <div class="contentarea">
                                <div class="row">
                                    <div class="span12 module_cont module_standimage  ">
                                        <div class="blog_post_page portfolio_post blog_post_content">

                                            <?php
                                            $post = get_post();
                                            $attachment_size = array(1170, 800);
                                            $next_attachment_url = wp_get_attachment_url();

                                            $attachment_ids = get_posts(array(
                                                'post_parent' => $post->post_parent,
                                                'fields' => 'ids',
                                                'numberposts' => -1,
                                                'post_status' => 'inherit',
                                                'post_type' => 'attachment',
                                                'post_mime_type' => 'image',
                                                'order' => 'ASC',
                                                'orderby' => 'menu_order ID'
                                            ));

                                            if (count($attachment_ids) > 1) {
                                                foreach ($attachment_ids as $attachment_id) {
                                                    if ($attachment_id == $post->ID) {
                                                        $next_id = current($attachment_ids);
                                                        break;
                                                    }
                                                }

                                                if ($next_id) {
                                                    $next_attachment_url = get_attachment_link($next_id);
                                                } else {
                                                    $next_attachment_url = get_attachment_link(array_shift($attachment_ids));
                                                }
                                            }

                                            printf('%1$s',
                                                wp_get_attachment_image($post->ID, $attachment_size)
                                            );

                                            ?>

                                            <section class="blog_post-topline">
                                                <?php if (has_excerpt()) : ?>
                                                    <h2 class="blog_post-title"><?php echo get_the_excerpt(); ?></h2>
                                                <?php endif; ?>
                                                <div class="blog_post-meta">
                                                    <?php
                                                    $published_text = __('<span class="attachment-meta">Published on <time class="entry-date" datetime="%1$s">%2$s</time> in <a href="%3$s" title="Return to %4$s" rel="gallery">%5$s</a></span>', 'canvas');
                                                    $post_title = get_the_title($post->post_parent);
                                                    if (empty($post_title) || 0 == $post->post_parent) {
                                                        $published_text = '<span class="attachment-meta"><time class="entry-date" datetime="%1$s">%2$s</time></span>';
                                                    }

                                                    printf($published_text,
                                                        esc_attr(get_the_date('c')),
                                                        esc_html(get_the_date()),
                                                        esc_url(get_permalink($post->post_parent)),
                                                        esc_attr(strip_tags($post_title)),
                                                        $post_title
                                                    );

                                                    $metadata = wp_get_attachment_metadata();
                                                    printf('<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
                                                        esc_url(wp_get_attachment_url()),
                                                        esc_attr__('Link to full-size image', 'canvas'),
                                                        __('Full resolution', 'canvas'),
                                                        $metadata['width'],
                                                        $metadata['height']
                                                    );

                                                    edit_post_link(__('Edit', 'canvas'), '<span class="edit-link">', '</span>');
                                                    ?>
                                                </div>
                                            </section>
                                            <?php if (!empty($post->post_content)) { ?>
                                                <article class="contentarea">
                                                    <?php the_content(); ?>
                                                    <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'canvas'), 'after' => '</div>')); ?>
                                                </article>
                                            <?php } ?>


                                            <div class="prev_next_links">
                                            <span class="gallery_back"><a
                                                    href="<?php echo esc_js("javascript:history.back()");?>">&laquo; <?php echo __('Back', 'canvas'); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .entry-content -->
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