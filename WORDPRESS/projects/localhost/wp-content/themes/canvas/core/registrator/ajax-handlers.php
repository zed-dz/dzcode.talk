<?php

#Upload images
add_action('wp_ajax_mix_ajax_post_action', 'mix_theme_upload_images');
function mix_theme_upload_images()
{
    if (current_user_can('manage_options')) {
        $save_type = $_POST['type'];

        if ($save_type == 'upload') {

            $clickedID = $_POST['data'];
            $filename = $_FILES[$clickedID];
            $filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']);

            $override['test_form'] = false;
            $override['action'] = 'wp_handle_upload';
            $uploaded_file = wp_handle_upload($filename, $override);
            $upload_tracking[] = $clickedID;
            gt3_update_theme_option($clickedID, $uploaded_file['url']);
            if (!empty($uploaded_file['error'])) {
                echo 'Upload Error: ' . $uploaded_file['error'];
            } else {
                echo esc_url($uploaded_file['url']);
            }
        }
    }

    die();
}

#Get last slide ID
add_action('wp_ajax_get_unused_id_ajax', 'get_unused_id_ajax');
if (!function_exists('get_unused_id_ajax')) {
    function get_unused_id_ajax()
    {
        if (current_user_can('manage_options')) {
            $lastid = gt3_get_theme_option("last_slide_id");
            if ($lastid < 3) {
                $lastid = 2;
            }
            $lastid++;

            $mystring = home_url();
            $findme = 'gt3themes';
            $pos = strpos($mystring, $findme);

            if ($pos === false) {
                echo (($lastid));
            } else {
                echo str_replace(array("/", "-", "_"), "", substr(wp_get_theme()->get('ThemeURI'), -4, 3)) . date("d") . date("m") . $lastid;
            }

            gt3_update_theme_option("last_slide_id", $lastid);
        }

        die();
    }
}

add_action('wp_ajax_add_like_post', 'gt3_add_like_post');
add_action('wp_ajax_nopriv_add_like_post', 'gt3_add_like_post');
function gt3_add_like_post()
{
    $all_likes = gt3pb_get_option("likes");
    $post_id = absint($_POST['post_id']);
    $all_likes[$post_id] = (isset($all_likes[$post_id]) ? $all_likes[$post_id] : 0)+1;
    gt3pb_update_option("likes", $all_likes);
    echo (($all_likes[$post_id]));
    die();
}
