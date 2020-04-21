<?php

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
    add_submenu_page( GT3_THEMESHORT . 'options', 'Product Activation', 'Product Activation', 'administrator', 'gt3_activation_submenu_page', 'gt3_activation_submenu_page_callback' ); 
    wp_enqueue_script(
        'license_verification-js', 
        get_template_directory_uri() . '/core/license_verification/license_verification.js', 
        array( 'jquery' ),
        time(),
        true
    );

    wp_enqueue_style(
        'license_verification-css', 
        get_template_directory_uri() . '/core/license_verification/license_verification.css',
        time(),
        true
    );
}

function gt3_activation_submenu_page_callback() {

    echo '<div class="wrap" id="wrap">';
    echo '<h2>Product Activation</h2>';

    $nonce = wp_create_nonce( "gt3_registrator" );

    
    $option_value = get_option( 'gt3_registration_data' );
    if (!is_array($option_value)) {
        $option_value = array(
            'puchase_code' => $option_value,
        );
    }
    $purchase_code = '';

    $gt3_registration_status = get_option( 'gt3_registration_status');
     echo '<div class="gt3_register_container'.($gt3_registration_status == 'active' ? ' gt3_register_active' : '').'" data-nonce="' . $nonce . '">';
    echo '<input type="text" id="gt3_registrator_purchase_code" name="gt3_registrator__puchase_code" value="'.$option_value['puchase_code'].'" class="regular-text "'
                .($gt3_registration_status == 'active' ? ' readonly="readonly"' : '')
                . esc_attr('gt3_registrator') 
        . '>';
    echo '<div class="gt3_register__buttons">';
        echo '<a href="javascript:void(0);" class="gt3_register__submit">'.__( 'Activate', 'canvas' ).'</a>';
        echo '<a href="javascript:void(0);" class="gt3_register__deregister">'.__( 'Deactivate', 'canvas' ).'</a>';
        echo '<a href="javascript:void(0);" class="gt3_activation_refresh" title="'.__( 'Refresh Activation', 'canvas' ).'"><i class="dashicons-before dashicons-update" aria-hidden="true"></i></a>';
    echo "</div>";


    if ($gt3_registration_status != 'active') {
        echo '<div class="gt3_info_container">'.__( 'To unlock all theme features and get auto-updates, please activate the theme. Enter your purchase code and click "Activate". Don\'t know where the purchase code is? ', 'canvas' ).'<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">'.__( 'Click here.', 'canvas').'</a>'.'</div>';
    }


    if ($gt3_registration_status == 'active') {

        if (get_option( 'gt3_account_attached' ) == 'true') {
            echo "<div class='gt3_support_container gt3_info_container'>";
                echo '<div><strong>'.esc_html( 'The purchase code is linked to your GT3themes account', 'canvas' ).' </strong></div>';
                echo "<a class='button button-primary' href='https://gt3accounts.com/app' style='color: #71c341;background: #ffffff;border-color: #ffffff;box-shadow: none;text-shadow: none;color: #d54e21;font-weight: 600;margin-top: 5px;'>". esc_html( "Go to Your Account", "canvas" ) ." </a>";
            echo "</div>";
        }else{
            echo '<div class="gt3_info_container gt3_info_container--no_icon gt3_account_submit_container">';
                echo "<div class='gt3_register__popup_sepparator'><span>".__( 'Next Step', 'canvas' )."</span></div>";
                echo '<strong style="font-size: 1.4em;color: #121212;">'.__( 'It\'s time to protect your purchase code.', 'canvas' ).'</strong>';
                echo '<p class="gt3_register__key"><i class="dashicons dashicons-admin-network" aria-hidden="true"></i> <span class="key" style="text-decoration: underline;">'.$option_value['puchase_code'].'</span></p>';
                echo "<p>".__( 'Enter your email address to bind the purchase code. We will create a customer account for you by using your email address.', 'canvas' )."</p>";
                echo "<div>".__( 'After that, you will be able to:', 'canvas' )."</div>";
                echo "<ul>
                    <li>".__( 'View where your purchase code is used.', 'canvas' )."</li>
                    <li>".__( 'Manage all your purchase codes.', 'canvas' )."</li>
                    <li>".__( 'Check for product and support status.', 'canvas' )."</li>
                </ul>";
                $admin_email = empty($option_value['email_account']) ? get_bloginfo('admin_email') : $option_value['email_account'];
                echo '<input type="email"  id="gt3_registrator_account_email"  name="gt3_registrator__email_account" value="'.$admin_email.'" class="regular-text gt3_account '.esc_attr('gt3_registrator') .'">';
                $newsletter_value = '';
                echo '<a href="javascript:void(0);" class="gt3_account_submit">'.__( 'Protect & Create Account', 'canvas' ).'</a>';
            echo "</div>";
        }

        
        if (get_option('sdfgdsfgdfg') != 'Product is activated!') {
            update_option( 'gt3_registration_status', '');
        }
        if (function_exists('gt3_get_support_time_left')) {
            $support_time_left = gt3_get_support_time_left();               
            if (!empty($support_time_left['time_to_left'])) {
                $gt3_tmeme_id = get_option( 'gt3_tmeme_id' );
                if (!empty($gt3_tmeme_id)) {
                    $theme_link = 'https://themeforest.net/checkout/from_item/'.(int)$gt3_tmeme_id.'?license=regular&size=source&support=renew_6month';
                }else{
                    $theme_link = 'https://themeforest.net/user/gt3themes/portfolio?ref=gt3themes';
                }
                echo "<div class='".(!empty($support_time_left['expired']) && $support_time_left['expired'] == true ? '' : 'gt3_support_container')." gt3_info_container'>";
                if (!empty($support_time_left['expired']) && $support_time_left['expired'] == true) {
                    printf( 'Your support package for this theme expired <strong>%1$s</strong> ago', $support_time_left['time_to_left']);
                }else{
                    printf( 'You have <strong>%1$s</strong> of available support', $support_time_left['time_to_left']);
                }  
                echo '<div><a class="button button-primary" href="'. $theme_link .'" style="color: #71c341;background: #ffffff;border-color: #ffffff;box-shadow: none;text-shadow: none;color: #d54e21;font-weight: 600;margin-top: 5px;">'. esc_html( "Update Support Package", "canvas" ) .' <i class="dashicons dashicons-arrow-right-alt2" style="width: 1em;height: 1em;font-size: inherit;line-height: inherit;" aria-hidden="true"></i></a></div>';
                echo "</div>";
            }
        }
    }
            

    echo "<div class='gt3_register__popup'>";
        echo "<div class='gt3_register__popup_container'>";
            echo "<div class='gt3_register__popup_close'><i class='dashicons dashicons-no-alt' aria-hidden='true'></i></div>";
            echo '<div class="gt3_info_container gt3_info_container--no_icon gt3_account_submit_container">';
                echo "<div class='gt3_register__popup_sepparator'><span>".__( 'Next Step', 'canvas' )."</span></div>";
                echo '<strong style="font-size: 1.4em;color: #121212;">'.__( 'It\'s time to protect your purchase code.', 'canvas' ).'</strong>';
                echo '<p class="gt3_register__key"><i class="dashicons dashicons-admin-network" aria-hidden="true"></i> <span class="key" style="text-decoration: underline;">'.$option_value['puchase_code'].'</span></p>';
                echo "<p>".__( 'Enter your email address to bind the purchase code. We will create a customer account for you by using your email address.', 'canvas' )."</p>";
                echo "<div>".__( 'After that, you will be able to:', 'canvas' )."</div>";
                echo "<ul>
                    <li>".__( 'View where your purchase code is used.', 'canvas' )."</li>
                    <li>".__( 'Manage all your purchase codes.', 'canvas' )."</li>
                    <li>".__( 'Check for product and support status.', 'canvas' )."</li>
                </ul>";
                $admin_email = empty($option_value['email_account']) ? get_bloginfo('admin_email') : $option_value['email_account'];
                echo '<input type="email"  id="gt3_registrator_account_email"  name="gt3_registrator__email_account" value="'.$admin_email.'" class="regular-text gt3_account '.esc_attr('gt3_registrator') .'">';
                $newsletter_value = '';
                echo '<a href="javascript:void(0);" class="gt3_account_submit">'.__( 'Protect & Create Account', 'canvas' ).'</a>';
            echo "</div>";
        echo "</div>";

    echo "</div>";


    echo "</div>"; //end gt3_register_container

    echo '</div>';// end wrapp

}


function gt3_get_product_name (){
    $product = 'Canvas Interior & Furniture Portfolio WP Theme';
    return $product;
}

function gt3_registration($code = '',$action_type = 'register'){
    if (empty($code)) {
        $code = get_option( 'gt3_registration');
    }
    global $wp_version;
    $product = gt3_get_product_name();
    $my_theme = wp_get_theme();
    $version = $my_theme->get( 'Version' );
    $response = wp_remote_post('https://gt3accounts.com/update/activate.php', array(
        'user-agent' => 'WordPress/'.$wp_version.'; '.esc_url(home_url()),
        'body' => array(
            'code' => urlencode(esc_attr($code)),
            'action_type' => urlencode($action_type),
            'version' => urlencode($version),
            'product' => urlencode($product)
        )
    ));

    $response_code = wp_remote_retrieve_response_code( $response );
    $version_info = wp_remote_retrieve_body( $response );

    if ( $response_code != 200 || is_wp_error( $version_info ) ) {
        return json_encode(array("respond"=>"Registration Connection error"));
    }

    return $version_info;
}

function gt3_account_activation($code = '',$email = ''){
    if (empty($code)) {
        $code = get_option( 'gt3_registration');
    }
    global $wp_version;
    $product = gt3_get_product_name();
    $my_theme = wp_get_theme();
    $version = $my_theme->get( 'Version' );

    if (!empty($email)) {
            $response = wp_remote_request('https://gt3accounts.com/app?createnewuser=true&purchase_code='.urlencode(gt3_string_coding($code)).'&item='.urlencode(gt3_string_coding($product)).'&useremail=gt3themes'.urlencode(gt3_string_coding($email)), array(
            'user-agent' => 'WordPress/'.$wp_version.'; '.esc_url(home_url()),
            'method' => 'POST',
            'body' => array(
                'code' => urlencode($code),
                'version' => urlencode($version),
                'product' => urlencode($product)
            )
        ));

        $response_code = wp_remote_retrieve_response_code( $response );
        $version_info = wp_remote_retrieve_body( $response );

        if ( $response_code != 200 || is_wp_error( $version_info ) ) {
            $errore_return = new WP_Error( 'registration-error-connection-error', esc_html__( 'Registration Connection error', 'canvas' ) );
            return json_encode($errore_return);
        }
    }else{
        $errore_return = new WP_Error( 'registration-error-invalid-email', esc_html__( 'Please provide a valid email address.', 'canvas' ) );
        return json_encode($errore_return);
    }

    return $version_info;
}

function gt3_activation_check($code = '',$email = '',$check_is_linked = false){
    if (empty($code)) {
        $code = get_option( 'gt3_registration');
    }
    global $wp_version;
    $product = gt3_get_product_name();
    $my_theme = wp_get_theme();
    $version = $my_theme->get( 'Version' );

    if (!empty($email) || $check_is_linked) {
            $response = wp_remote_request('https://gt3accounts.com/app?user_check=true&purchase_code='.urlencode(gt3_string_coding($code)).'&item='.urlencode(gt3_string_coding($product)).'&useremail=gt3themes'.urlencode(gt3_string_coding($email)), array(
            'user-agent' => 'WordPress/'.$wp_version.'; '.esc_url(home_url()),
            'method' => 'POST',
            'body' => array(
                'code' => urlencode($code),
                'version' => urlencode($version),
                'product' => urlencode($product)
            )
        ));

        $response_code = wp_remote_retrieve_response_code( $response );
        $version_info = wp_remote_retrieve_body( $response );

        if ( $response_code != 200 || is_wp_error( $version_info ) ) {
            $errore_return = new WP_Error( 'registration-error-connection-error', esc_html__( 'Registration Connection error', 'canvas' ) );
            return json_encode($errore_return);
        }
    }else{
        $errore_return = new WP_Error( 'registration-error-invalid-email', esc_html__( 'Please provide a valid email address.', 'canvas' ) );
        return json_encode($errore_return);
    }

    return $version_info;
}



if (get_option( 'gt3_registration_status') != 'active') {
    add_action( 'admin_notices', 'gt3_registration_notice' );
}

function gt3_get_support_time_left(){
    $time_left = array();
    $supported_until = get_option('gt3_registration_supported_until');
    if (!empty($supported_until)) {        
        $date_format = get_option( 'date_format' );
        $supported_until = strtotime($supported_until);
        $current_time = current_time('timestamp');
        $time_left['expired'] = false;
        if (($supported_until - $current_time) < (3600 * 24 * 7)) {
            $time_left['notice_srart'] = true;
        }
        if ($supported_until < $current_time) {
            $time_left['expired'] = true;
        }
        $time_left['time_to_left'] = human_time_diff($supported_until, $current_time);
        return $time_left;
    }else{
        return $time_left;  
    }
}

add_action( 'admin_print_styles', 'gt3_support_notice' );

function gt3_support_notice(){   
    if (get_option('gt3_supported_notice_srart') == 'true') {
        add_action( 'admin_notices', 'gt3_registration_notice_supported_until');
    } 
}

function gt3_registration_notice() {
  ?>
  <div class="notice notice-error" style="background-color: #d54e21; color: #ffffff; border-radius: 4px; padding: 10px 25px 10px 75px;position: relative;border-left: none;">
    <i aria-hidden="true" style="position: absolute; top: 50%; left: 15px; margin-top: -22px;font-size: 25px; line-height: 40px; width: 40px;text-align: center; border: 2px solid;border-radius: 40px;"><i style="display: inline-block;line-height: 0.8;" class="dashicons-before dashicons-lock"></i></i>
    <p style="font-size: 1.4em;font-weight: 500;margin-bottom: 0;"><?php esc_html_e( 'Purchase Validation! Please activate your theme.', 'canvas' ); ?></p>
    <div style="margin-bottom: 10px;"><a class="button button-primary" href="admin.php?page=gt3_activation_submenu_page" style="color: #ffffff;background: #ffffff;border-color: #ffffff;box-shadow: none;text-shadow: none;color: #d54e21;font-weight: 600;margin-top: 5px;"><?php esc_html_e( 'Register Now', 'canvas' ); ?> <i class="dashicons dashicons-arrow-right-alt2" style="width: 1em;height: 1em;font-size: inherit;line-height: inherit;" aria-hidden="true"></i></a> <a target="_blank" class="button button-primary" href="http://themeforest.net/cart/add_items?item_ids=10508369&ref=gt3themes" style="color: #ffffff;background: #ffffff;border-color: #ffffff;box-shadow: none;text-shadow: none;color: #d54e21;font-weight: 600;margin-top: 5px;"><?php esc_html_e( 'Buy Theme', 'canvas' ); ?> <i class="dashicons dashicons-arrow-right-alt2" style="width: 1em;height: 1em;font-size: inherit;line-height: inherit;" aria-hidden="true"></i></a></div>
  </div>
  <?php
}

function gt3_registration_notice_supported_until() {
    $support_time_left = gt3_get_support_time_left();
    if (!empty($support_time_left['notice_srart']) && $support_time_left['notice_srart']) {
        $gt3_tmeme_id = get_option( 'gt3_tmeme_id' );
        if (!empty($gt3_tmeme_id)) {
            $theme_link = 'https://themeforest.net/checkout/from_item/'.(int)$gt3_tmeme_id.'?license=regular&size=source&support=renew_6month';
        }else{
            $theme_link = 'https://themeforest.net/user/gt3themes/portfolio?ref=gt3themes';
        }
  ?>
    <div class="notice notice-error is-dismissible" style="background-color: #d54e21; color: #ffffff; border-radius: 4px; padding: 10px 25px 10px 75px;position: relative;border-left: none;">
        <i class="size-45 dashicons-before dashicons-warning" aria-hidden="true" style="position: absolute; top: 50%; left: 15px; margin-top: -26px;"></i>
        <p style="font-size: 1.4em;font-weight: 500;margin-bottom: 0;"><?php 
        if (!empty($support_time_left['expired']) && $support_time_left['expired'] == true) {
            esc_html_e( 'Your support package for this theme expired', 'canvas' ); ?><?php echo " ( ".$support_time_left['time_to_left']." ".esc_html( 'ago', 'canvas' )." ).";
        }else{
            esc_html_e( 'Your support package for this theme is about to expire', 'canvas' ); ?><?php echo " ( ".$support_time_left['time_to_left']." ".esc_html( 'left', 'canvas' )." )."; 
        }     
        ?></p>
        <div style="margin-bottom: 10px;"><a class="button button-primary" href="<?php echo (($theme_link)); ?>" style="color: #ffffff;background: #ffffff;border-color: #ffffff;box-shadow: none;text-shadow: none;color: #d54e21;font-weight: 600;margin-top: 5px;"><?php esc_html_e( 'Update Support Package', 'canvas' ); ?> <i class="dashicons dashicons-arrow-right-alt2" style="width: 1em;height: 1em;font-size: inherit;line-height: inherit;" aria-hidden="true"></i></a> <a class="button button-primary" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'gt3-hide-notice', 'notice_srart' ), 'gt3_hide_notices_nonce', '_gt3_notice_nonce' ) ); ?>" style="color: #ffffff;background: #ffffff;border-color: #ffffff;box-shadow: none;text-shadow: none;color: #d54e21;font-weight: 600;margin-top: 5px;"><?php esc_html_e( 'Dismiss this notice', 'canvas' ); ?> <i class="dashicons dashicons-arrow-right-alt2" style="width: 1em;height: 1em;font-size: inherit;line-height: inherit;" aria-hidden="true"></i></a></div>
    </div>
  <?php
    }
}

add_action( 'wp_loaded', 'gt3_hide_notice' );

function gt3_hide_notice (){
    if ( isset( $_GET['gt3-hide-notice'] ) && isset( $_GET['_gt3_notice_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_GET['_gt3_notice_nonce'], 'gt3_hide_notices_nonce' ) ) {
            wp_die( __( 'Action failed. Please refresh the page and retry.', 'canvas' ) );
        }
        $hide_notice = sanitize_text_field( $_GET['gt3-hide-notice'] );
        update_option( 'gt3_supported_'.$hide_notice , 'false' );
    }
}

if (get_option('gt3_supported_account_notice_srart') != 'false' 
    && get_option( 'gt3_registration_status') == 'active' 
    && get_option( 'gt3_account_attached' ) != 'true') {
    add_action( 'admin_notices', 'gt3_account_notice' );
}
function gt3_account_notice(){    
    ?>
  <div class="notice notice-warning" style="padding: 10px">
    <p><strong><?php esc_html_e( 'Create account and manage your theme purchase codes.', 'canvas' ) ?></strong></p>
    <p><strong><a href="admin.php?page=gt3_activation_submenu_page"><?php esc_html_e( 'Register Now', 'canvas' ); ?></a> |  <a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'gt3-hide-notice', 'account_notice_srart' ), 'gt3_hide_notices_nonce', '_gt3_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss this notice', 'canvas' ); ?></a></strong></p>
  </div>
  <?php
}

//  Autoupdate theme
function gt3_check_theme_update ( $transient ){
    $slug = basename( get_template_directory() );
    $slug = 'canvas';
    global $wp_version;

    if ( empty( $transient->checked ) || empty( $transient->checked[ $slug ] ) || ! empty( $transient->response[ $slug ] ) ) {
        return $transient;
    }    

    $product = gt3_get_product_name();
    $purchase_code = get_option('gt3_registration_data');
    if (is_array($purchase_code)) {
        $purchase_code = $purchase_code['puchase_code'];
    }
    $response = wp_remote_post('https://gt3accounts.com/update/upgrade.php', array(
        'user-agent' => 'WordPress/'.$wp_version.'; '.esc_url(home_url()),
        'body' => array(
            'code' => urlencode($purchase_code),
            'slug' => urlencode($slug),
            'product' => urlencode($product)
        )
    ));

    $response_code = wp_remote_retrieve_response_code( $response );
    $version_info = wp_remote_retrieve_body( $response );    

    if ( $response_code != 200 || is_wp_error( $version_info ) ) {
        return $transient;
    }

    $response = json_decode($version_info,true);
    if ( isset( $response['allow_update'] ) && $response['allow_update'] && isset( $response['transient'] ) 
    && version_compare( $transient->checked[ $slug ], $response['transient']['new_version'], '<') ) {
        $transient->response[ $slug ] = (array) $response['transient'];
    }

    return $transient;
}

add_action( 'pre_set_site_transient_update_themes', 'gt3_check_theme_update', 100 );




function ajax_gt3_registration(){

    if ( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], "gt3_registrator" ) ) {
        die( 0 );
    }
    //var_dump(function_exists('gt3_registration'));
    update_option( 'gt3_account_attached' , 'false' );
    if ( function_exists('gt3_registration') ) {
        $return_array = array();

        if (isset( $_REQUEST['type'] )) {
            $type = $_REQUEST['type'];
        }else{
            $type = 'register';
        }
        if (isset( $_REQUEST['code'] )) {
            $code = $_REQUEST['code'];
        }else{
            $code = '';
        }
        if (isset( $_REQUEST['field_id'] )) {
            $field_id = $_REQUEST['field_id'];
        }else{
            $field_id = '';
        }

        $registration_returns = gt3_registration($code,$type);
        $return_array['respond_out'] = $registration_returns;
        $registration_returns = json_decode($registration_returns,true);
        if (!empty($registration_returns['respond'])) {
            $return_array['msg'] = $registration_returns['respond'];
            $return_array['msg_type'] = 'notice';
            $return_array['action_done'] = 'nothing';

            if ($registration_returns['respond'] == 'Invalid license key.') {
                $return_array['msg'] = 'Invalid purchase code. Please make sure that you have entered the correct code.';
                $return_array['msg_type'] = 'error';
            }

            if ($registration_returns['respond'] == 'Envato API Connection error' || $registration_returns['respond'] == 'Registration Connection error') {
                $return_array['msg_type'] = 'error';
            }

            if ($registration_returns['respond'] == 'Purchase code already exists') {
                $return_array['msg'] = 'This purchase code already activated!';
                $return_array['msg_type'] = 'error';
            }
            if ($registration_returns['respond'] == 'Product is activated!') {
                $return_array['msg'] = 'Congrats! Your purchase code has been activated successfully.';
                $return_array['msg_type'] = 'success';
                $return_array['action_done'] = 'register_active';
                update_option( 'gt3_registration_status' , 'active');
                update_option( 'sdfgdsfgdfg' , $registration_returns['respond'] );
                $gt3_registration_data = get_option( 'gt3_registration_data' );
                if (is_array($gt3_registration_data)) {
                    $gt3_registration_data['puchase_code'] = $code;
                }else{
                    $gt3_registration_data = array('puchase_code' => $code );
                }
                update_option( 'gt3_registration_data' , $gt3_registration_data);
                update_option( 'gt3_tmeme_id' , $registration_returns['id'] );
                if (!empty($registration_returns['supported_until'])) {
                    update_option( 'gt3_registration_supported_until' , $registration_returns['supported_until']);
                    update_option( 'gt3_supported_notice_srart' , 'true' );
                }
                $account_respond = gt3_activation_check($code,'',true);
                $account_respond = json_decode($account_respond,true);
                $return_array['already_linked'] = !empty($account_respond['already_linked']) ? $account_respond['already_linked'] : '';
                if (!empty($account_respond['already_linked']) && ($account_respond['already_linked'] == 'true')) {
                    update_option( 'gt3_account_attached' , 'true' );
                }
                
            }
            if ($registration_returns['respond'] == 'Deregister successfully') {
                $return_array['msg'] = 'The purchase code has been deactivated successfully.';
                $return_array['msg_type'] = 'success';
                $return_array['action_done'] = 'register_deactive';
                $gt3_registration_data = get_option( 'gt3_registration_data' );
                if (is_array($gt3_registration_data)) {
                    $gt3_registration_data['puchase_code'] = '';
                }else{
                    $gt3_registration_data = array('puchase_code' => '' );
                }
                update_option( 'gt3_registration_data' , $gt3_registration_data);
                update_option( 'gt3_tmeme_id' , '' );
                update_option( 'gt3_registration_status' , '');
                update_option( 'sdfgdsfgdfg' , $registration_returns['respond'] );
                update_option( 'gt3_registration_supported_until' , '');
                update_option( 'gt3_supported_notice_srart' , 'false' );
            }

        }

        echo json_encode($return_array);

        die();
    }

    die();
}

function gt3__account_registration(){
    if ( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], "gt3_registrator" ) ) {
        die( 0 );
    }
    if ( function_exists('gt3_account_activation') ) {
        $return_array = array();

        if (isset( $_REQUEST['code'] )) {
            $code = $_REQUEST['code'];
        }else{
            $code = '';
        }
        if (isset( $_REQUEST['email'] )) {
            $email = $_REQUEST['email'];
        }else{
            $email = '';
        }
        if (isset( $_REQUEST['field_id'] )) {
            $field_id = $_REQUEST['field_id'];
        }else{
            $field_id = '';
        }

        $registration_returns = gt3_account_activation($code,$email);
        //$registration_returns = json_decode($registration_returns);
        $return_array['respond_out'] = $registration_returns;
        

        /*$registration_returns = (array)$registration_returns;*/

        update_option( 'gt3_account_attached' , 'false' );

        if ( !empty($registration_returns) ) {
            $registration_obj = json_decode($registration_returns,true);   
            if (!empty($registration_obj['errors'])) {
                $errors = $registration_obj['errors'];
                foreach ($errors as $error => $error_message) {
                    
                    switch ($error) {
                        case 'error-user-attached-code':
                            $return_array['msg'] = $error_message[0];
                            $return_array['msg_type'] = 'notice';
                            update_option( 'gt3_account_attached' , 'true' );
                            break;

                        case 'success-user-attached-code':
                            $return_array['msg'] = $error_message[0];
                            $return_array['msg_type'] = 'success';
                            update_option( 'gt3_account_attached' , 'true' );
                            break;

                        case 'error-user-attached-code':
                            $return_array['msg'] = $error_message[0];
                            $return_array['msg_type'] = 'error';
                            break;
                            

                        default:
                            $return_array['msg'] = $error_message[0];
                            $return_array['msg_type'] = 'error';
                            break;
                    }

                }
            }
            $gt3_registration_data = get_option( 'gt3_registration_data' );
            if (is_array($gt3_registration_data)) {
                $gt3_registration_data['email_account'] = $email;
            }else{
                $gt3_registration_data = array('puchase_code' => $code, 'email_account' => $email );
            }
            update_option( 'gt3_registration_data' , $gt3_registration_data);

        }

        if (!empty($registration_returns['respond'])) {
            $return_array['msg'] = $registration_returns['respond'];
            $return_array['msg_type'] = 'notice';
            $return_array['action_done'] = 'nothing';

            if ($registration_returns['respond'] == 'Invalid license key.') {
                $return_array['msg'] = 'Invalid purchase code. Please make sure that you have entered the correct code.';
                $return_array['msg_type'] = 'error';
            }

            if ($registration_returns['respond'] == 'Envato API Connection error' || $registration_returns['respond'] == 'Registration Connection error') {
                $return_array['msg_type'] = 'error';
            }

            if ($registration_returns['respond'] == 'Purchase code already exists') {
                $return_array['msg'] = 'This purchase code already activated!';
                $return_array['msg_type'] = 'error';
            }

        }

        echo json_encode($return_array);

        die();
    }

    die();
}

function gt3__activation_refresh_on_autoupdate($transient){

    $code = '';
    $email = '';
    
    $gt3_registration_data = get_option( 'gt3_registration_data' );
    $field_id = 'gt3_registration_id';
    if (is_array($gt3_registration_data)) {
        if (isset($gt3_registration_data['puchase_code'])) {
            $code = $gt3_registration_data['puchase_code'];
        } 
        if (isset($gt3_registration_data['email_account'])) {
            $email = $gt3_registration_data['email_account'];
        }  
    }else{
        return $transient;
    }
    
    if ( function_exists('gt3_activation_check') ) {
        $return_array = array();        
        if (empty($email)) {
            $registration_returns = gt3_activation_check($code,$email,true);
        }else{
            $registration_returns = gt3_activation_check($code,$email);
        }
        $return_array['respond_out'] = $registration_returns;
        $return_array['msg'] = 'Nothing happened';
        $return_array['msg_type'] = 'notice';
        $return_array['action_done'] = 'register_nothing';

        if (!empty($registration_returns)) {
            $registration_returns = json_decode($registration_returns,true);
            $supported_until = !empty($registration_returns['Support_until']) ? $registration_returns['Support_until'] : '';
            $status_active = !empty($registration_returns['Status_active']) ? $registration_returns['Status_active'] : '';
            if (!empty($status_active)) {
                if ($status_active == '1') {
                    if (!empty($supported_until)) {
                        if (!empty($supported_until)) {
                            update_option( 'gt3_registration_supported_until' , $supported_until);
                            //update_option( 'gt3_supported_notice_srart' , 'true' );
                            $return_array['msg'] = 'Updated successfully';
                            $return_array['msg_type'] = 'success';
                        }
                        
                    }   
                }

            }elseif(isset($registration_returns['Status_active']) && $status_active == ''){
                $gt3_registration_data = get_option( 'gt3_registration_data' );
                if (is_array($gt3_registration_data)) {
                    $gt3_registration_data['puchase_code'] = '';
                }else{
                    $gt3_registration_data = array('puchase_code' => '' );
                }
                update_option( 'gt3_registration_data' , $gt3_registration_data );
                update_option( 'gt3_tmeme_id' , '' );
                update_option( 'gt3_registration_status' , '');
                update_option( 'sdfgdsfgdfg' , 'Deregister successfully' );
                update_option( 'gt3_registration_supported_until' , '');
                //update_option( 'gt3_supported_notice_srart' , 'false' );
                $return_array['msg'] = 'Updated successfully';
                $return_array['msg_type'] = 'success';
                $return_array['action_done'] = 'register_deactive';
            }
        }

        return $transient;
    }

    return $transient;
}

function gt3__activation_refresh(){
    if ( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], "gt3_registrator" ) ) {
        return false;
    }
    if ( function_exists('gt3_activation_check') ) {
        $return_array = array();

        if (isset( $_REQUEST['code'] )) {
            $code = $_REQUEST['code'];
        }else{
            $code = '';
        }
        if (isset( $_REQUEST['email'] )) {
            $email = $_REQUEST['email'];
        }else{
            $email = '';
        }
        if (isset( $_REQUEST['field_id'] )) {
            $field_id = $_REQUEST['field_id'];
        }else{
            $field_id = '';
        }

        if (empty($email)) {
            $registration_returns = gt3_activation_check($code,$email,true);
        }else{
            $registration_returns = gt3_activation_check($code,$email);
        }
        //$registration_returns = json_decode($registration_returns);
        $return_array['respond_out'] = $registration_returns;
        $return_array['msg'] = 'Nothing happened';
        $return_array['msg_type'] = 'notice';
        $return_array['action_done'] = 'register_nothing';

        if (!empty($registration_returns)) {
            $registration_returns = json_decode($registration_returns,true);
            $supported_until = !empty($registration_returns['Support_until']) ? $registration_returns['Support_until'] : '';
            $status_active = !empty($registration_returns['Status_active']) ? $registration_returns['Status_active'] : '';
            if (!empty($status_active)) {
                if ($status_active == '1') {
                    if (!empty($supported_until)) {
                        if (!empty($supported_until)) {
                            update_option( 'gt3_registration_supported_until' , $supported_until);
                            //update_option( 'gt3_supported_notice_srart' , 'true' );
                            $return_array['msg'] = 'Updated successfully';
                            $return_array['msg_type'] = 'success';
                        }
                        
                    }   
                }

            }elseif(isset($registration_returns['Status_active']) && $status_active == ''){
                $gt3_registration_data = get_option( 'gt3_registration_data' );
                if (is_array($gt3_registration_data)) {
                    $gt3_registration_data['puchase_code'] = '';
                }else{
                    $gt3_registration_data = array('puchase_code' => '' );
                }
                update_option( 'gt3_registration_data' , $gt3_registration_data );
                update_option( 'gt3_tmeme_id' , '' );
                update_option( 'gt3_registration_status' , '');
                update_option( 'sdfgdsfgdfg' , 'Deregister successfully' );
                update_option( 'gt3_registration_supported_until' , '');
                //update_option( 'gt3_supported_notice_srart' , 'false' );
                $return_array['msg'] = 'Updated successfully';
                $return_array['msg_type'] = 'success';
                $return_array['action_done'] = 'register_deactive';
            }
        }
        
        echo json_encode($return_array);

        die();
    }

    die();
}


add_action( 'wp_ajax_gt3_registration', 'ajax_gt3_registration' );
add_action( 'wp_ajax_gt3__account_registration', 'gt3__account_registration' );
add_action( 'wp_ajax_gt3__activation_refresh', 'gt3__activation_refresh' );
add_action( 'pre_set_site_transient_update_themes', 'gt3__activation_refresh_on_autoupdate');

