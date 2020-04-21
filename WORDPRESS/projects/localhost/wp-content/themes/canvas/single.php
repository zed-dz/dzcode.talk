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

/* ADD 1 view for this post */
$post_views = (get_post_meta(get_the_ID(), "post_views", true) > 0 ? get_post_meta(get_the_ID(), "post_views", true) : "0");
update_post_meta(get_the_ID(), "post_views", (int)$post_views + 1);
$comments_num = '' . get_comments_number(get_the_ID()) . '';

if ($comments_num == 1) {
    $comments_text = '' . __('Comment', 'canvas') . '';
} else {
    $comments_text = '' . __('Comments', 'canvas') . '';
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
                                                    <span><i class="icon-folder-close-alt"></i><?php echo the_category(', '); ?></span>
                                                    <span><i class="icon-calendar-empty"></i><?php echo get_the_time("F d, Y"); ?></span>
                                                    <span><i class="icon-pencil"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('display_name'); ?></a></span>
                                                </div>
                                            </div>
                                            <div class="span5">
                                                <div class="prev_next_links">
                                                    <?php next_post_link('<span class="thisnext">%link</span>') ?>
                                                    <?php previous_post_link('<span class="thisprev">%link</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo get_pf_type_output(array("pf" => get_post_format(), "gt3_theme_pagebuilder" => $gt3_theme_pagebuilder)); ?>
                                        <div class="preview_content">
                                            <article class="contentarea">
                                                <?php
                                                the_content(__('Read more!', 'canvas'));
                                                wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'canvas') . ': ', 'after' => '</div>'));
                                                ?>
                                                <div class="clear"></div>
                                            </article>
                                        </div>
                                        <div class="dn"><?php posts_nav_link(); ?></div>
                                        <div class="postbottom">
                                            <div class="row">
                                                <div class="span8">
                                                    <div class="tagshere">
                                                        <?php the_tags("<span class='tags'><i class='icon-tags'></i></span><span>Tags</span>", ''); ?>
                                                    </div>
                                                </div>
                                                <div class="span4">
                                                    <div class="blogpost_share">
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

                                    <?php if (strlen(get_the_author_meta('description')) > 0) { ?>
                                        <section class="blogpost_about_author">
                                            <div class="author-ava">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 68); ?>
                                            </div>
                                            <div class="thisdesc">
                                                <div class="author-name"><h6>About the
                                                        Author: <?php the_author_posts_link(); ?></h6></div>
                                                <div class="author-description"><?php the_author_meta('description'); ?></div>
                                            </div>
                                        </section>
                                    <?php } ?>

                                </div>

                                <?php
                                if ($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "no-sidebar") {
                                    $posts_per_line = 3;
                                } else {
                                    $posts_per_line = 3;
                                }

                                if (is_gt3_builder_active()) {
                                    echo '<div class="row"><div class="span12 module_feature_posts related">';
                                    echo do_shortcode("[feature_posts
                                    heading_color=''
                                    heading_size='h4'
                                    heading_text='" . __('Recent posts', 'canvas') . "'
                                    number_of_posts=" . $posts_per_line . "
                                    posts_per_line=" . $posts_per_line . "
                                    sorting_type='random'
                                    related='yes'
                                    post_type='post'][/feature_posts]");
                                    echo '</div></div>';
                                }
                                ?>

                                <div class="row">
                                    <div class="span12">
                                        <?php comments_template(); ?>
                                    </div>
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