<?php
/**
 * @package		WPCore
 * @author		stueynet
 * @link		http://stuey.net
 */
if ( ! class_exists( 'WPCore' ) ) {
    /**
     * Class WPCore
     */
    class WPCore {

        /**
         * Plugin version, used for cache-busting of style and script file references.
         *
         * @var     string
         */
        const VERSION = '1.0.0';

        /**
         *
         * The variable name is used as the text domain when internationalizing strings
         * of text. Its value should match the Text Domain file header in the main
         * plugin file.
         *
         * @since    1.0.0
         *
         * @var      string
         */
        protected $plugin_slug = 'wpcore';

        /**
         * @var string
         */
        protected $plugin_basename = 'wpcore';

        /**
         * @var string
         */
        protected $transient_key = 'wpcore_payload';

        /**
         * @var int
         */
        protected $transient_timeout = null;

        /**
         * Instance of this class.
         * @var      object
         */
        protected static $instance = null;

        /**
         * Initialize the plugin by setting localization and loading public scripts
         * and styles.
         */

        protected $plugin_screen_hook_suffix = null;

        /**
         *
         */
        function __construct() {
            // Load plugin text domain
            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

            // Activate plugin when new blog is added
            add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

            // Main functions
            add_action( 'tgmpa_register', array( $this, 'wpcore_register_required_plugins') );

            // Admin stuff
            // Add the options page and menu item.
            add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

            // Register the settings
            add_action( 'admin_init', array( $this, 'register_settings' ) );


            // Add an action link pointing to the options page.
            $plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . $this->plugin_slug . '.php' );
            add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );

        }

        /**
         * Return the plugin slug.
         *
         * @return    Plugin slug variable.
         */
        public function get_plugin_slug() {
            return $this->plugin_slug;
        }

        /**
         * Return an instance of this class.
         *
         * @return    object    A single instance of this class.
         */
        public static function get_instance() {

            // If the single instance hasn't been set, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         * Fired when the plugin is activated.
         *
         * @param    boolean    $network_wide    True if WPMU superadmin uses
         *                                       "Network Activate" action, false if
         *                                       WPMU is disabled or plugin is
         *                                       activated on an individual blog.
         */
        public static function activate( $network_wide ) {

            if ( function_exists( 'is_multisite' ) && is_multisite() ) {

                if ( $network_wide  ) {

                    // Get all blog ids
                    $blog_ids = self::get_blog_ids();

                    foreach ( $blog_ids as $blog_id ) {

                        switch_to_blog( $blog_id );
                        self::single_activate();

                        restore_current_blog();
                    }

                } else {
                    self::single_activate();
                }

            } else {
                self::single_activate();
            }

        }

        /**
         * Fired when the plugin is deactivated.
         * @param    boolean    $network_wide    True if WPMU superadmin uses
         *                                       "Network Deactivate" action, false if
         *                                       WPMU is disabled or plugin is
         *                                       deactivated on an individual blog.
         */
        public static function deactivate( $network_wide ) {

            if ( function_exists( 'is_multisite' ) && is_multisite() ) {

                if ( $network_wide ) {

                    // Get all blog ids
                    $blog_ids = self::get_blog_ids();

                    foreach ( $blog_ids as $blog_id ) {

                        switch_to_blog( $blog_id );
                        self::single_deactivate();

                        restore_current_blog();

                    }

                } else {
                    self::single_deactivate();
                }

            } else {
                self::single_deactivate();
            }

        }


        /**
         * Fired when a new site is activated with a WPMU environment.
         * @param    int    $blog_id    ID of the new blog.
         */
        public function activate_new_site( $blog_id ) {

            if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
                return;
            }

            switch_to_blog( $blog_id );
            self::single_activate();
            restore_current_blog();

        }

        /**
         * Get all blog ids of blogs in the current network that are:
         * - not archived
         * - not spam
         * - not deleted
         *
         * @return   array|false    The blog ids, false if no matches.
         */
        private static function get_blog_ids() {

            global $wpdb;

            // get an array of blog ids
            $sql = "SELECT blog_id FROM $wpdb->blogs
				WHERE archived = '0' AND spam = '0'
				AND deleted = '0'";

            return $wpdb->get_col( $sql );

        }

        /**
         * Fired for each blog when the plugin is activated.
         *
         * @since    1.0.0
         */
        private static function single_activate() {
            //
        }

        /**
         * Fired for each blog when the plugin is deactivated.
         *
         * @since    1.0.0
         */
        private static function single_deactivate() {
            //
        }
        /**
         * Load the plugin text domain for translation.
         *
         * @since    1.0.0
         */
        public function load_plugin_textdomain() {

            $domain = $this->plugin_slug;
            $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

            load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
            load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );

        }

        /**
         * The main logic to set the recommended plugins
         */
        function wpcore_register_required_plugins() {

            // Get plugins from payload and pass to TGM
            $plugins = $this->get_plugins_from_payload();

            // convert to object
            $theme_text_domain = 'wpcore';

            /**
             * Array of configuration settings. Amend each line as needed.
             * If you want the default strings to be available under your own theme domain,
             * leave the strings uncommented.
             * Some of the strings are added into a sprintf, so see the comments at the
             * end of each line for what each argument will be.
             */
            $config = array(
                    'id'           => $theme_text_domain,                 // Unique ID for hashing notices for multiple instances of TGMPA.
                    'default_path' => '',                      // Default absolute path to bundled plugins.
                    'menu'         => 'wpcore-install-plugins', // Menu slug.
                    'parent_slug'  => 'plugins.php',            // Parent menu slug.
                    'capability'   => 'install_plugins',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
                    'has_notices'  => true,                    // Show admin notices or not.
                    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
                    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
                    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
                    'message'      => '',                      // Message to output right before the plugins table.
                    'strings'      => array(
                            'page_title'                      => __( 'WPCore Install Plugins', 'wpcore' ),
                            'notice_can_install_required'     => _n_noop(
                                    'WPCore requires the following plugin: %1$s.',
                                    'WPCore requires the following plugins: %1$s.',
                                    'wpcore'
                            ), // %1$s = plugin name(s).
                            'notice_can_install_recommended'  => _n_noop(
                                    'WPCore recommends the following plugin: %1$s.',
                                    'WPCore recommends the following plugins: %1$s.',
                                    'wpcore'
                            ),
                    )
            );
            if(isset($plugins) && current_user_can( 'install_plugins' )){
                tgmpa( $plugins, $config );
            }
        }

        /**
         * Add the menus
         */
        function add_plugin_admin_menu() {

            add_menu_page( 'WPCore Settings', 'WPCore', 'install_plugins', 'wpcore', array ( $this, 'wpcore_options_page' ), plugins_url('assets/img/icon.png', dirname(__FILE__)), 69.324 );
            add_submenu_page('wpcore', 'Manage Keys', 'Manage Keys', 'install_plugins', 'wpcore', array( $this, 'wpcore_options_page' ) );

            /**
             * Enqueue wpcore.js with jQuery dependency
             */
        }

        /**
         * Register the setting for storing keys
         */
        function register_settings() {
            add_option( 'wpcore_keys', '');
            register_setting( 'default', 'wpcore_keys', array( $this, 'save_keys' ) );
        }

        /**
         * This is the callback for register_setting above
         * @param $input
         * @return mixed
         */
        function save_keys($input){

            // every time we save keys we need to generate the payload
            $this->generate_payload($input);
            return $input;
        }

        /**
         * Transport for payload. Give back the transient cache contents
         * or build a new payload and send that back
         * @return array|null
         */
        function get_payload(){
            if( get_transient( $this->transient_key )){
                //			echo 'from cache!!';
                return get_transient( $this->transient_key );
            }
            return $this->generate_payload( get_option( 'wpcore_keys' ) );
        }

        /**
         * If necessary generate a new payload. This is heavy on
         * the server so we only do this when we have to.
         * @param $input
         * @return array|null
         */
        function generate_payload($input){
            if($input){
                $request = implode(',',$input);

                $response =  wp_remote_get('https://wpcore.com/api/'.$request, array('timeout' => 5, 'sslverify' => false));
                $json =  wp_remote_retrieve_body($response);
                // decode to array
                $payload = json_decode($json,true);
                if ( isset( $payload['data']['plugins'] ) ) {
                    // Go through all the plugins and add the, to the array also
                    foreach($payload['data']['plugins'] as $plugin){
                        if($payload['success']){
                            $payload['data']['plugins'][] = $plugin;
                        }
                    }
                }
            } else {
                $payload = null;
            }
            set_transient($this->transient_key, $payload, $this->transient_timeout);
            return $payload;
        }

        /**
         * Helper to grab all the plugins from the payload.
         * This is because the plugin list is flat.
         * @return array|null
         */
        function get_plugins_from_payload(){
            $payload = $this->get_payload();
            if($payload){
                foreach( $payload as $collection ){
                    if( array_key_exists('success',$collection) && $collection['success'] == true ){
                        foreach( $collection['data']['plugins'] as $plugin){
                            $plugins[] = $plugin;
                        }
                    } else {
                        $plugins[] = null;
                    }
                }
            } else {
                $plugins = null;
            }
            return $plugins;
        }

        /**
         * Render the settings page
         */
        function wpcore_options_page() {

            wp_enqueue_script(
                    'wpcore-js-script',
                    plugins_url('assets/js/wpcore.js', dirname(__FILE__) ),
                    array( 'jquery' )
            );

            wp_enqueue_style(
                    'wpcore-css',
                    plugins_url('assets/css/wpcore.css', dirname(__FILE__) )
            );
            wp_enqueue_style(
                    'wpcore-gridism',
                    plugins_url('assets/css/gridism.css', dirname(__FILE__) )
            );


            include( dirname(__FILE__).'/../views/settings.php' );
        }

        /**
         * Return the link to create a collection with active plugins on this site
         */
        public function wpcore_export_link($active = true){

            if($active)
            {
                $plugin_array = get_option('active_plugins');

            } else {
                $plugin_array_raw = get_plugins();

                // First check if we have plugins, else return false
                if ( empty( $plugin_array_raw ) )
                    return false;

                // Define our variable as an empty array to avoid bugs if $plugin_array is empty
                $plugin_array = array();

                foreach ( $plugin_array_raw as $plugin_slug=>$values ){
                    $plugin_array[] = basename(
                            $plugin_slug, // Get the key which holds the folder/file name
                            '.php' // Strip away the .php part
                    );
                }
            }
            $pstring = array();
            foreach($plugin_array as $pl){
                preg_match('/([^\/]+)/', $pl, $matches);
                $pstring[] = $matches[1];
            }


            $plugins = implode(',', $pstring);

            return 'https://wpcore.com/collections/create/'.$plugins;

        }

        /**
         * Add settings action link to the plugins page.
         */
        public function add_action_links( $links ) {

            return array_merge(
                    array(
                            'settings' => '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_slug ) . '">' . __( 'Settings', $this->plugin_slug ) . '</a>'
                    ),
                    $links
            );
        }
    }

}