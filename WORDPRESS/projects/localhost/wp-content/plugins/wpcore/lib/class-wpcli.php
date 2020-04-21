<?php
/**
 * wp-cli wpcore
 *
 * @version 0.0.1
 * @author Stuart Starr <stuart@stuey.net>
 */

if ( true === class_exists( 'WP_CLI_Command' ) && defined( 'WP_CLI' ) && WP_CLI ){
	/**
	 * Do something.
	 */
	class WP_CLI_WPCore_Command extends WP_CLI_Command{
		
		private $version = '0.1.3';
        /**
         * Import WPCore.com collections via the command line!
         *
         * <install>
         * : Install the plugins from a wpcore collection.
         * --key=<key>
         * : The collection key you want to install.
         * 
         * [--activate=<no>]
         * : Whether or not to activate all the plugins.
         * ---
         * default: no
         * options:
         *   - yes
         *   - no
         * [--network=<no>]
         * : Whether or not to network activate all the plugins.
         * ---
         * default: no
         * options:
         *   - yes
         *   - no
         * [--force=<no>]
         * : Whether or not to force install all the plugins.
         * ---
         * default: no
         * options:
         *   - yes
         *   - no
         * ---
         *
         * @when before_wp_load
         */
		public function __invoke( $args = null, $assoc_args = null ){
			// print_r( $args );
            // print_r( $assoc_args );

            $key = $assoc_args['key'];
            
            $com_activate = $assoc_args['activate'] === 'yes' ? '--activate' : null;
            $com_force = $assoc_args['force'] === 'yes' ? '--force' : null;
            $com_network = $assoc_args['network'] === 'yes' ? '--activate-network' : null;

            $response =  wp_remote_get('https://wpcore.com/api/'.$key, array('timeout' => 5, 'sslverify' => false));

            $json =  wp_remote_retrieve_body($response);
 
            $payload = json_decode($json,true);

            if(! $payload[0]['success']) {
                return WP_CLI::error("Collection {$key} not found");
            }
            
            if ( isset( $payload['data']['plugins'] ) ) {
                // Go through all the plugins and add the, to the array also
                foreach($payload['data']['plugins'] as $plugin){
                    if($payload['success']){
                        $payload['data']['plugins'][] = $plugin;
                    }
                }
            }

            if($payload[0]['success'] == 1 && count($payload[0]['data']['plugins']) > 0) {
                WP_CLI::success( "Collection {$key} found..." );
                $plugins = $payload[0]['data']['plugins'];
                
                $force = $com_force ? 'force ' : '';

                $install = $com_network ? 'network install' : 'install';

                $action = $com_activate ? $install . ' and activate' :  $install;

                $warnings = 'There are ' . count($plugins) . ' plugins in this collection. Are you sure you want to ' . $force . $action .' them?';

                WP_CLI\Utils\format_items( 'table', $plugins, array( 'name', 'slug' ) );

                WP_CLI::confirm( $warnings );

                foreach($plugins as $plugin){

                    $from = isset($plugin['source']) ? $plugin['source'] : 'https://wordpress.org/plugins/' . $plugin['slug'];

                    WP_CLI::line("Installing " . $plugin['name'] . " from " . $from);

                    $source = isset($plugin['source']) ? $plugin['source'] : $plugin['slug'];

                    $command = 'plugin install ' . $com_network . ' ' . $com_force . ' ' . $com_activate . ' ' . $source;
                    WP_CLI::runcommand( $command, $options = array() );

                    WP_CLI::line("");
                }
            } else {
                WP_CLI::error("No plugins found");
            }
            
            WP_CLI::runcommand( $command, $options = array() );
            WP_CLI::success( 'Plugin installation complete' );
		}
		
		/**
		 * Return command version
		 *
		 * @since 0.0.1
		 * @when before_wp_load
		 */
		public function version(){
			WP_CLI::line( 'wp-cli wpcore importing collection ' . $this->version );
        }
	}
	WP_CLI::add_command( 'wpcore', 'WP_CLI_WPCore_Command' );
}