<?php

require_once get_template_directory() . '/core/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'gt3_register_required_plugins');
function gt3_register_required_plugins()
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $path =  get_template_directory();
    $plugins = array(
        array(
            'name'               => esc_html__('Revolution Slider', 'canvas' ), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => $path. '/core/tgm/plugins/revslider.zip', // The plugin source
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.4.8.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'               => esc_html__('GT3 Page Builder (For Canvas Theme Only)', 'canvas' ), // The plugin name.
            'slug'               => 'gt3-pagebuilder-custom', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/core/tgm/plugins/gt3-pagebuilder-custom.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.9.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
    );

    $plugins_autoupdate = get_option( 'gt3_plugins' );
    foreach ($plugins as $plugin => $plugin_array) {
        $slug = $plugin_array['slug'];
        if (!empty($plugins_autoupdate) && is_array($plugins_autoupdate) && array_key_exists($slug,$plugins_autoupdate)) {
            if (!empty($plugins_autoupdate[$slug]['version']) && version_compare( $plugin_array['version'], $plugins_autoupdate[$slug]['version'], '<')) {
                $plugins[$plugin]['version'] = $plugins_autoupdate[$slug]['version'];
                $plugins[$plugin]['source'] = $plugins_autoupdate[$slug]['source'];
            }
        }
    }

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                       // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins',  // Menu slug.
        'has_notices'  => true,                     // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                     // Automatically activate plugins after installation or not.
        'message'      => '',                       // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'canvas' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'canvas' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'canvas' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'canvas' ),
            'notice_can_install_required'     => esc_html__( 'This theme requires the following plugins: %1$s.', 'canvas' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => esc_html__( 'This theme recommends the following plugins: %1$s.', 'canvas' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => esc_html__( 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'canvas' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => esc_html__( 'The following required plugins are currently inactive: %1$s.', 'canvas' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => esc_html__( 'The following recommended plugins are currently inactive: %1$s.', 'canvas' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => esc_html__( 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'canvas' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => esc_html__( 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'canvas' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => esc_html__( 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'canvas' ), // %1$s = plugin name(s).
            'install_link'                    => esc_html__( 'Begin installing plugins', 'canvas' ),
            'activate_link'                   => esc_html__( 'Begin activating plugins', 'canvas' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'canvas' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'canvas' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'canvas' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}