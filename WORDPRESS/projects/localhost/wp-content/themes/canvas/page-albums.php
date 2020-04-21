<?php
/*
Template Name: Gallery - Albums
*/
if ( !post_password_required() ) {
    the_post();

    $gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
    $pf = get_post_format();
    wp_enqueue_script('gt3_cookie_js', get_template_directory_uri() . '/js/jquery.cookie.js', array(), false, true);
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu-fullscr');
    } else {
        get_header('fullscreen');
    }

    ?>
   <div class="fullscreen_block">
        <?php
        global $wp_query_in_shortcodes, $paged;

        if(empty($paged)){
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        $post_type_terms = array();
        if (isset($selected_categories) && strlen($selected_categories) > 0) {
            $post_type_terms = explode(",", $selected_categories);
			$post_type_filter = explode(",", $selected_categories);
            if (count($post_type_terms) > 0) {
                $args = array(
                    'post_type' => 'gallery',
                    'order' => 'DESC',
                    'paged' => $paged,
                    'posts_per_page' => -1
                );
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'gallerycat',
                        'field' => 'id',
                        'terms' => $post_type_terms
                    )
                );
            }
        } else {
			$post_type_filter = "";
            $args = array(
                'post_type' => 'gallery',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => -1
            );
        }
        $wp_query_in_shortcodes = new WP_Query();

        if (isset($_GET['slug']) && strlen($_GET['slug']) > 0) {
            $post_type_terms = $_GET['slug'];
            if (count($post_type_terms) > 0) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'gallerycat',
                        'field' => 'slug',
                        'terms' => $post_type_terms
                    )
                );
            }
        }
        ?>
	    <div class="fs_blog_module is_masonry this_is_blog fs_filter">
            <?php
            $wp_query_in_shortcodes->query($args);
            while ($wp_query_in_shortcodes->have_posts()) : $wp_query_in_shortcodes->the_post();
                $all_likes = gt3pb_get_option("likes");
                $gt3_theme_post = get_post_meta(get_the_ID(), "pagebuilder", true);
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                $pf = get_post_format();
                $echoallterm = '';
                $new_term_list = get_the_terms(get_the_id(), "gallerycat");
                if (is_array($new_term_list)) {
                    foreach ($new_term_list as $term) {
                        $tempname = strtr($term->name, array(
                            ' ' => ', ',
                        ));
                        $echoallterm .= strtolower($tempname) . " ";
                        $echoterm = $term->name;
                    }
                } else {
                    $tempname = 'Uncategorized';
                }
				$picsCount = count($gt3_theme_post['sliders']['fullscreen']['slides']);
                ?>
				<div <?php post_class("blogpost_preview_fw"); ?>>
					<div class="fw_preview_wrapper featured_items">
                        <a class="image_block_wrapper" href="<?php echo get_permalink(); ?>">
                            <div class="img_block wrapped_img">
                                <img src="<?php echo aq_resize($featured_image[0], "540", "440", true, true, true); ?>" alt="<?php echo esc_html__('Featured Image', 'canvas' ); ?>" class="fw_featured_image" width="540">
                            </div>
                        </a>
                        <div class="bottom_box">
                            <div class="bc_content">
                                <h6 class="bc_title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h6>
                                <div class="featured_items_meta">
									<span><i class="icon-camera-retro"></i><?php echo (($picsCount)); ?></span>
                                    <div class="bc_likes gallery_likes_add <?php echo (isset($_COOKIE['like_album'.get_the_ID()]) ? "already_liked" : ""); ?>" data-attachid="<?php echo get_the_ID(); ?>" data-modify="like_album">
                                        <i class="icon-heart-empty <?php echo (isset($_COOKIE['like_album'.get_the_ID()]) ? "icon-heart" : "icon-heart-o"); ?>"></i>
                                        <span><?php echo ((isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()]>0) ? $all_likes[get_the_ID()] : 0); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>

            <?php endwhile; wp_reset_query();?>
            <div class="clear"></div>
        </div>
    </div>
	<?php
		$GLOBALS['showOnlyOneTimeJS']['gallery_likes'] = "
		<script>
			jQuery(document).ready(function($) {
				jQuery('.gallery_likes_add').click(function(){
				var gallery_likes_this = jQuery(this);
				if (!jQuery.cookie(gallery_likes_this.attr('data-modify')+gallery_likes_this.attr('data-attachid'))) {
					jQuery.post(gt3_ajaxurl, {
						action:'add_like_attachment',
						attach_id:jQuery(this).attr('data-attachid')
					}, function (response) {
						jQuery.cookie(gallery_likes_this.attr('data-modify')+gallery_likes_this.attr('data-attachid'), 'true', { expires: 7, path: '/' });
						gallery_likes_this.addClass('already_liked');
						gallery_likes_this.find('i').removeClass('icon-heart-o').addClass('icon-heart');
						gallery_likes_this.find('span').text(response);
					});
				}
				});
			});
		</script>
		";
	?>
    <script>
        jQuery(document).ready(function($){
            port_setup();
        });
        jQuery(window).load(function($){
            port_setup();
        });
        jQuery(window).resize(function($){
            port_setup();
        });
        function port_setup() {

        }
    </script>
    <?php
    ?>

    <?php get_footer('fullwidth');
} else {
    if (gt3_get_theme_option('menu_type') == 'horizontal') {
        get_header('hor-menu');
    } else {
        get_header('fullscreen');
    }
?>
    <div class="pp_block">
        <h1 class="pp_title"><?php  _e('THIS CONTENT IS', 'canvas') ?> <span><?php  _e('PASSWORD PROTECTED', 'canvas') ?></span></h1>
        <div class="pp_wrapper">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="global_center_trigger"></div>
    <script>
		jQuery(document).ready(function(){
			jQuery('.post-password-form').find('label').find('input').attr('placeholder', 'Enter The Password...');
		});
	</script>
<?php
	get_footer('fullscreen');
} ?>