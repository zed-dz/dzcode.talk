<?php
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'canvas'); ?></p>
    <?php return;
}
?>


<div id="comments">
    <?php

    #Required for nested reply function that moves reply inline with JS
    if (is_singular()) wp_enqueue_script('comment-reply');

    $GLOBALS['showOnlyOneTimeJS']['comment_button'] = "
    <script>
        jQuery(document).ready(function($) {
            var this_submit_button = jQuery('.comment-respond .form-submit input#submit');
            this_submit_button.wrap('<div class=\"temp_submit_comment\"></div>');
            jQuery('.temp_submit_comment').html('<div class=\"send_this_comment shortcode_button btn_small btn_type1\"><span class=\"btn_text\">" . __('Submit', 'canvas') . "</span></div>');
            jQuery('.send_this_comment').live( 'click', function() {
                jQuery('#commentform').submit();
            });
        });
    </script>
    ";

    if (have_comments()) : ?>
        <h4 class="headInModule postcomment"><?php
            echo __('Comments', 'canvas') . ": "; ?></h4>
        <ol class="commentlist">
            <?php wp_list_comments('type=comment&callback=gt3_theme_comment'); ?>
        </ol>

        <div class="dn"><?php paginate_comments_links(); ?></div>

        <?php if ('open' == $post->comment_status) : ?>

        <?php else : // comments are closed ?>

        <?php endif; ?>
    <?php endif; ?>

    <?php if ('open' == $post->comment_status) :

        $comment_form = array(
            'fields' => apply_filters('comment_form_default_fields', array(
                'author' => '<label class="label-name"></label><input type="text" placeholder="' . __('Name', 'canvas') . '" title="' . __('Name *', 'canvas') . '" id="author" name="author" class="form_field">',
                'email' => '<label class="label-email"></label><input type="text" placeholder="' . __('Email', 'canvas') . '" title="' . __('Email *', 'canvas') . '" id="email" name="email" class="form_field">',
                'url' => '<label class="label-web"></label><input type="text" placeholder="' . __('URL', 'canvas') . '" title="' . __('URL', 'canvas') . '" id="web" name="url" class="form_field">'
            )),
            'comment_field' => '<label class="label-message"></label><textarea name="comment" cols="45" rows="5" placeholder="' . __('Message', 'canvas') . '" id="comment-message" class="form_field"></textarea>',
            'comment_form_before' => '',
            'comment_form_after' => '',
            'must_log_in' => __('You must be logged in to post a comment.', 'canvas'),
            'title_reply' => __('Leave a Comment!', 'canvas'),
            'label_submit' => __('Post Comment', 'canvas'),
            'logged_in_as' => '<p class="logged-in-as">' . __('Logged in as', 'canvas') . ' <a href="' . admin_url('profile.php') . '">' . $user_identity . '</a>. <a href="' . wp_logout_url(apply_filters('the_permalink', get_permalink())) . '">' . __('Log out?', 'canvas') . '</a></p>',
        );
        comment_form($comment_form, $post->ID);

    else : // Comments are closed
        ?>
        <p><?php _e('Sorry, the comment form is closed at this time.', 'canvas') ?></p>
    <?php endif; ?>
</div>