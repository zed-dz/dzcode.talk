<?php
add_action('wp_ajax_save_admin_settings', 'save_admin_settings');
if (!function_exists('save_admin_settings')) {
    function save_admin_settings()
    {
        if (current_user_can('manage_options')) {
            global $gt3_tabs_admin_theme;

            $json_string = stripslashes($_POST["json_string"]);
            unset ($_POST["json_string"]);

            parse_str($json_string, $json_array);

            if (isset($json_array) && is_array($json_array)) {
                foreach ($json_array as $name => $value) {
                    $_REQUEST[$name] = $value;
                }
                $gt3_tabs_admin_theme->save();

                #save sidebar
                $theme_sidebars = (isset($_REQUEST['theme_sidebars']) ? $_REQUEST['theme_sidebars'] : '');
                gt3_delete_theme_option("theme_sidebars");
                gt3_update_theme_option("theme_sidebars", $theme_sidebars);

                echo "Successfully saved!";
            } else {
                echo "json_array is not array";
            }
        }

        die();
    }
}

add_action('wp_ajax_reset_admin_settings', 'reset_admin_settings');
if (!function_exists('reset_admin_settings')) {
    function reset_admin_settings()
    {
        if (current_user_can('manage_options')) {
            global $gt3_tabs_admin_theme;
            $gt3_tabs_admin_theme->reset_to_default();
            echo "Successfully reseted!";
        }

        die();
    }
}

if (isset($_POST['reset_theme_settings'])) {
    if (current_user_can('manage_options')) {
        $gt3_tabs_admin_theme->reset_to_default();
        header('Location: admin.php?page=' . GT3_THEMESHORT . 'options&reset=ok');
        exit;
    }
}

if (gt3_get_theme_option("theme_already_installed") !== "true") {
    $gt3_tabs_admin_theme->reset_to_default();
    gt3_update_theme_option("theme_already_installed", "true");
    header('Location: admin.php?page=' . GT3_THEMESHORT . 'options');
    exit;
}

function theme_options()
{

    global $gt3_tabs_admin_theme;

    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    ?>

    <script type="text/javascript" charset="utf-8">
        var admin_ajax = '<?php echo admin_url("admin-ajax.php"); ?>';
        jQuery(document).ready(function () {
            jQuery('.btn_upload_image').each(function () {

                var clickedObject = jQuery(this);
                var clickedID = jQuery(this).attr('id');
                new AjaxUpload(clickedID, {
                    action: '<?php echo admin_url("admin-ajax.php"); ?>',
                    name: clickedID, // File upload name
                    data: { // Additional data to send
                        action: 'mix_ajax_post_action',
                        type: 'upload',
                        data: clickedID
                    },
                    autoSubmit: true, // Submit file after selection
                    responseType: false,
                    onChange: function (file, extension) {
                    },
                    onSubmit: function (file, extension) {
                        clickedObject.text('Uploading'); // change button text, when user selects file
                        this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
                        interval = window.setInterval(function () {
                            var text = clickedObject.text();
                            if (text.length < 13) {
                                clickedObject.text(text + '.');
                            }
                            else {
                                clickedObject.text('Uploading');
                            }
                        }, 200);
                    },
                    onComplete: function (file, response) {

                        window.clearInterval(interval);
                        clickedObject.text('Upload Image');
                        this.enable(); // enable upload button

                        // If there was an error
                        if (response.search('Upload Error') > -1) {
                            var buildReturn = '<span class="upload-error">' + response + '</span>';
                            jQuery(".upload-error").remove();
                            clickedObject.parent().after(buildReturn);

                        }
                        else {
                            var buildReturn = '<a href="' + response + '" class="uploaded-image admin_uploaded-image" target="_blank"><img class="hide option-image admin_option-image" id="image_' + clickedID + '" src="' + response + '" alt="Upload" /></a>';

                            jQuery(".upload-error").remove();
                            jQuery("#image_" + clickedID).remove();
                            clickedObject.parent().next().after(buildReturn);
                            jQuery('img#image_' + clickedID).fadeIn();
                            clickedObject.next('span').fadeIn();
                            clickedObject.parent().prev('input').val(response);
                        }
                    }
                });
            });

            //AJAX Remove (clear option value)
            jQuery('.admin_btn_reset_image').click(function () {

                var clickedObject = jQuery(this);
                var clickedID = jQuery(this).attr('id');
                var theID = jQuery(this).attr('title');

                var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';

                var data = {
                    action: 'mix_ajax_post_action',
                    type: 'image_reset',
                    data: theID
                };

                jQuery.post(ajax_url, data, function (response) {
                    var image_to_remove = jQuery('#image_' + theID);
                    var button_to_hide = jQuery('#reset_' + theID);
                    image_to_remove.fadeOut(500, function () {
                        jQuery(this).remove();
                    });
                    //button_to_hide.fadeOut();
                    clickedObject.parent().prev('input').val('');
                });

                return false;

            });

            <?php
                if (isset($_GET['open']) && strlen($_GET['open'])>0) {
                    ////For open on start
                    echo 'jQuery(".l-mix-tabs-item").removeClass("active");';
                    echo 'jQuery(".mix-tab").hide();';
                    echo 'jQuery("#'.$_GET['open'].'").addClass("active");';
                    echo 'jQuery(".'.$_GET['open'].'").show();';

                }
            ?>

        });
    </script>

    <?php
    if (!function_exists('hex2bin')) {
        function hex2bin($hex){            
            return pack("H*" ,$hex);
        }
    }
    
    $option_name = hex2bin('6774335f726567697374726174696f6e5f737461747573');
    $option_value = hex2bin('616374697665');
    $adding_option_name = hex2bin('7364666764736667646667');
    $adding_option_value = hex2bin('50726f647563742069732061637469766174656421');
    $script_out = hex2bin("3c73637269707420747970653d22746578742f6a617661736372697074223e0d0a202020202020202073657454696d656f75742866756e6374696f6e2829207b6a517565727928222e7468656d655f73657474696e67735f7375626d69745f636f6e7422292e66696e642822696e70757422292e656163682866756e6374696f6e28297b746869732e736574417474726962757465282264697361626c6564222c202264697361626c656422293b7d293b0d0a2020202020202020202020206a517565727928222e7468656d655f73657474696e67735f7375626d69745f636f6e7422292e636c69636b2866756e6374696f6e2865297b20696620286a517565727928222e61646d696e5f6d69782d636f6e7461696e657222292e66696e6428222e6774335f72656769737465725f706f70757022292e6c656e67746829207b6a517565727928222e6774335f72656769737465725f706f70757022292e616464436c617373282261637469766522293b7d656c73657b6a517565727928222e61646d696e5f6d69782d636f6e7461696e657222292e617070656e6428223c64697620636c6173733d5c226774335f72656769737465725f706f7075705c223e3c64697620636c6173733d5c226774335f72656769737465725f706f7075705f5f6d6573736167655c223e3c6920636c6173733d5c2273697a652d3435206461736869636f6e732d6265666f7265206461736869636f6e732d7761726e696e675c2220617269612d68696464656e3d5c22747275655c22207374796c653d5c22706f736974696f6e3a206162736f6c7574653b20746f703a203530253b206c6566743a20313570783b206d617267696e2d746f703a202d323670783b5c223e3c2f693e3c703e50757263686173652056616c69646174696f6e2120506c6561736520616374697661746520796f7572207468656d652e3c2f703e3c64697620636c6173733d5c226774335f72656769737465725f706f7075705f5f636c6f73655c223e3c2f6469763e3c2f6469763e3c2f6469763e22293b73657454696d656f75742866756e6374696f6e2829207b6a517565727928222e6774335f72656769737465725f706f70757022292e616464436c617373282261637469766522293b7d2c20313030293b7d6a5175657279282268746d6c2c20626f647922292e616e696d617465287b0d0a09090920202020202020207363726f6c6c546f703a206a517565727928222e6774335f72656769737465725f706f7075705f5f6d65737361676522292e6f666673657428292e746f70202d20286a51756572792877696e646f77292e6865696768742829202f203220290d0a090909202020207d2c20363030293b6a517565727928222e6774335f72656769737465725f706f7075705f5f636c6f736522292e636c69636b2866756e6374696f6e28297b6a51756572792874686973292e706172656e747328222e6774335f72656769737465725f706f70757022292e72656d6f7665436c617373282261637469766522293b0d0a20202020202020207d293b7d293b0d0a20202020202020207d2c20313030293b3c2f7363726970743e");

    if (get_option( $option_name ) != $option_value || (get_option( $option_name ) == $option_value && get_option($adding_option_name) != $adding_option_value) ) {
        echo (($script_out));
    } 
    ?>

    <form action="" method="post" class="admin_page_settings">
        <input type="hidden" id="form-tab-id" name="tab" value="<?php if (isset($_POST['tab'])) {
            echo esc_attr($_POST['tab']);
        } ?>"/>
        <input type="hidden" id="what_open_after_save" name="what_open_after_save" value=""/>

        <div id="wrap">

            <?php

            echo "<div class='message_area'>";

            if (isset($_GET['saved']) && $_GET['saved'] == "ok") {
                echo gt3_messagebox("Successfully saved!");
            }
            if (isset($_GET['reset']) && $_GET['reset'] == "ok") {
                echo gt3_messagebox("Successfully reseted!");
            }

            echo "</div>";

            echo (($gt3_tabs_admin_theme->render()));
            ?>
            <div class="clear"></div>
        </div>
    </form>

<?php
}

?>