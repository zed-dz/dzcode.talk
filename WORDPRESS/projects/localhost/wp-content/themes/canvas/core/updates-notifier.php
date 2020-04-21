<?php

if (defined('GT3_THEMESHORT')) {
    $gt3_un_theme_pref = GT3_THEMESHORT;
} else {
    global $gt3_themeshort;
    $gt3_un_theme_pref = $gt3_themeshort;
}

$check_for_global_disable = gt3_un_get_option('never_show_updates_notify');
# Config
if (isset($check_for_global_disable['yes_never'])) {
    define('GT3_THEME_UPDATES_NOTIFIER_ENABLE', false);
} else {
    define('GT3_THEME_UPDATES_NOTIFIER_ENABLE', true); # false = disable this feature
}
define('GT3_TF_RELATION_LIST', 'https://s3.amazonaws.com/gt3themes/update/tf.txt');
# End config

function gt3_un_get_option($optionname, $defaultValue = "")
{
    global $gt3_un_theme_pref;
    $returnedValue = get_option($gt3_un_theme_pref . $optionname, $defaultValue);

    if (gettype($returnedValue) == "string") {
        return stripslashes($returnedValue);
    } else {
        return $returnedValue;
    }
}

function gt3_un_update_option($optionname, $optionvalue)
{
    global $gt3_un_theme_pref;
    if (update_option($gt3_un_theme_pref . $optionname, $optionvalue)) {
        return true;
    }
}

function gt3_un_delete_option($optionname)
{
    global $gt3_un_theme_pref;
    return delete_option($gt3_un_theme_pref . $optionname);
}

function gt3_un_check_theme_relation()
{
    global $gt3_un_theme_pref;
    $gt3_update_notify_system['checkers']['last_check_id_relation_file'] = time();
    $wp_remote_get_tf_relation_list = wp_remote_get(GT3_TF_RELATION_LIST);
    $array = json_decode(wp_remote_retrieve_body($wp_remote_get_tf_relation_list));
    if (isset($array->$gt3_un_theme_pref)) {
        $gt3_update_notify_system['theme_tf_id'] = $array->$gt3_un_theme_pref;
    }
    gt3_un_update_option('update_notify_system', $gt3_update_notify_system);
    return true;
}

function gt3_un_start_showing_notify()
{
    gt3_un_update_option('update_notify_system_showing', 'true');
}

function gt3_un_stop_showing_notify()
{
    gt3_un_update_option('update_notify_system_showing', 'false');
}

function gt3_un_never_show_notify_from_now()
{
    gt3_un_update_option('never_show_updates_notify', array("yes_never" => "true"));
}

function gt3_un_check_info_from_tf()
{
    global $gt3_update_notify_system;
    $wp_remote_tf_info = wp_remote_get('http://marketplace.envato.com/api/v3/item:' . $gt3_update_notify_system['theme_tf_id'] . '.json');
    $gt3_update_notify_system['checkers']['last_check_tf_update_field'] = time();

    $gt3_un_my_theme = wp_get_theme();
    $new_theme_version = $gt3_un_my_theme->get('Version');
    $gt3_update_notify_system['checkers']['theme_version_on_check_moment'] = $new_theme_version;


    if (is_array($wp_remote_tf_info)) {
        $array = json_decode(wp_remote_retrieve_body($wp_remote_tf_info));
        $new_last_update = $array->item->last_update;
        if (!isset($gt3_update_notify_system['checkers']['theme_last_update_on_check_moment'])) {
            $gt3_update_notify_system['checkers']['theme_last_update_on_check_moment'] = $new_last_update;
        }
        if ($gt3_update_notify_system['checkers']['theme_last_update_on_check_moment'] !== $new_last_update) {
            gt3_un_start_showing_notify();
        }
    }

    if ($gt3_update_notify_system['checkers']['theme_version_on_check_moment'] !== $new_theme_version) {
        gt3_un_stop_showing_notify();
    }
    $gt3_update_notify_system['checkers']['theme_last_update_on_check_moment'] = $new_last_update;
    gt3_un_update_option('update_notify_system', $gt3_update_notify_system);
}

##########################################################################################

if (GT3_THEME_UPDATES_NOTIFIER_ENABLE == true) {
    $gt3_update_notify_system = gt3_un_get_option('update_notify_system');

    # Check for the relation
    if (isset($gt3_update_notify_system['theme_tf_id'])) {
        if (!isset($gt3_update_notify_system['checkers']['last_check_tf_update_field']) || (time() - $gt3_update_notify_system['checkers']['last_check_tf_update_field'] > 86400)) {
            gt3_un_check_info_from_tf();
        }
    } else {
        if (!isset($gt3_update_notify_system['checkers']['last_check_id_relation_file']) || (time() - $gt3_update_notify_system['checkers']['last_check_id_relation_file'] > 86400)) {
            gt3_un_check_theme_relation();
        }
    }

    if (gt3_un_get_option('update_notify_system_showing') == 'true') {
        function gt3_wp_admin_area_notice()
        {
            $gt3_un_my_theme = wp_get_theme();
            $themename = $gt3_un_my_theme->get('Name');
            echo '<div class="update-nag gt3_un" style="clear: both; display: block; margin-top: 40px; margin-bottom: 10px;"><p>
            <b>There is a new version of ' . $themename . ' available.</b> To update the theme, please follow this link <a href="http://themeforest.net/downloads" target="_blank">Download Update</a>.</p>
            <p>Do you want to get notifications about theme updates? &nbsp;&nbsp;&nbsp;<a href="#" class="gt3_un_yes_show_me_updates">Yes</a> | <a href="#" class="gt3_un_no_never_show_updates">No</a></p></div>
            <script>
                jQuery(".gt3_un_yes_show_me_updates").click(function(){
                    var data = {
                        action: "gt3_un_yes_show_me_updates"
                    };

                    jQuery.post(ajaxurl, data, function(response) {
                        jQuery(".update-nag.gt3_un").slideUp("fast");
                    });
                });

                jQuery(".gt3_un_no_never_show_updates").click(function(){
                    var data = {
                        action: "gt3_un_no_never_show_updates"
                    };

                    jQuery.post(ajaxurl, data, function(response) {
                        jQuery(".update-nag.gt3_un").slideUp("fast");
                    });
                });
            </script>
            ';
        }

        add_action('admin_notices', 'gt3_wp_admin_area_notice');
    }

    add_action('wp_ajax_gt3_un_yes_show_me_updates', 'gt3_un_yes_show_me_updates');
    function gt3_un_yes_show_me_updates()
    {
        gt3_un_stop_showing_notify();
        die();
    }

    add_action('wp_ajax_gt3_un_no_never_show_updates', 'gt3_un_no_never_show_updates');
    function gt3_un_no_never_show_updates()
    {
        gt3_un_never_show_notify_from_now();
        die();
    }
}