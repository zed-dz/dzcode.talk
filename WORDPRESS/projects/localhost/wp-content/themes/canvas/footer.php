</div><!-- .wrapper -->
</div>
<footer>
    <div class="ip">
        <div class="fl">
            <div><?php gt3_the_theme_option("copyright"); ?></div>
        </div>
        <div class="fr">
            <div class="share_page">
                <span class="share_text"><?php echo __('Share', 'canvas') ?></span>
                <span class="sh_fo_detail">
                    <a target="_blank" href="https://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>" class="stand_icon share_facebook"></a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_permalink(); ?>" class="stand_icon share_tweet"></a>
                    <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo (isset($gt3_theme_featured_image[0]) && strlen($gt3_theme_featured_image[0]) > 0) ? $gt3_theme_featured_image[0] : gt3_get_theme_option("logo"); ?>" class="stand_icon share_pinterest"></a>
                    <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="stand_icon share_gplus"></a>
                </span>
            </div>
            <div class="socials">
                <span class="follow_text active"><?php echo __('Follow', 'canvas') ?></span>
                <span class="sh_fo_detail" style="display: inline-block;">
                    <?php echo gt3_show_social_icons(array(
                        array(
                            "uniqid" => "social_linked_in",
                            "class" => "stand_icon soc-linkedin-sign",
                            "title" => "Linked In",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_facebook",
                            "class" => "stand_icon soc-facebook-sign",
                            "title" => "Facebook",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_twitter",
                            "class" => "stand_icon soc-twitter",
                            "title" => "Twitter",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_instagram",
                            "class" => "stand_icon soc-instagram",
                            "title" => "Instagram",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_dribbble",
                            "class" => "stand_icon soc-dribbble",
                            "title" => "Dribbble",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_gplus",
                            "class" => "stand_icon soc-google-plus-sign",
                            "title" => "Google+",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_youtube",
                            "class" => "stand_icon soc-youtube-sign",
                            "title" => "Youtube",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_pinterest",
                            "class" => "stand_icon soc-pinterest",
                            "title" => "Pinterest",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_tumblr",
                            "class" => "stand_icon soc-tumblr-sign",
                            "title" => "Tumblr",
                            "target" => "_blank",
                        ),
                        array(
                            "uniqid" => "social_flickr",
                            "class" => "stand_icon soc-flickr",
                            "title" => "Flickr",
                            "target" => "_blank",
                        )
                    ));
                    ?>
                </span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</footer>
<?php gt3_the_pb_custom_bg_and_color(gt3_get_theme_pagebuilder(@get_the_ID()));
gt3_the_theme_option("code_before_body");
wp_footer(); ?>

</body>
</html>