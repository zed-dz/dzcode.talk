<?php
namespace ElementorPro;

use Elementor\Rollback;
use Elementor\Settings;
use Elementor\Tools;
use Elementor\Utils;
use ElementorPro\License\API;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Admin {

	/**
	 * Enqueue admin styles.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function enqueue_styles() {
		$suffix = Utils::is_script_debug() ? '' : '.min';

		$direction_suffix = is_rtl() ? '-rtl' : '';

		wp_register_style(
			'elementor-pro-admin',
			ELEMENTOR_PRO_ASSETS_URL . 'css/admin' . $direction_suffix . $suffix . '.css',
			[],
			ELEMENTOR_PRO_VERSION
		);

		wp_enqueue_style( 'elementor-pro-admin' );
	}

	public function enqueue_scripts() {
		$suffix = Utils::is_script_debug() ? '' : '.min';

		wp_enqueue_script(
			'elementor-pro-admin',
			ELEMENTOR_PRO_URL . 'assets/js/admin' . $suffix . '.js',
			[
				'elementor-common',
			],
			ELEMENTOR_PRO_VERSION,
			true
		);

		$locale_settings = [];

		/**
		 * Localize admin settings.
		 *
		 * Filters the admin localized settings.
		 *
		 * @since 1.0.0
		 *
		 * @param array $locale_settings Localized settings.
		 */
		$locale_settings = apply_filters( 'elementor_pro/admin/localize_settings', $locale_settings );

		Utils::print_js_config(
			'elementor-pro-admin',
			'ElementorProConfig',
			$locale_settings
		);
	}

	public function remove_go_pro_menu() {
		remove_action( 'admin_menu', [ Plugin::elementor()->settings, 'register_pro_menu' ], Settings::MENU_PRIORITY_GO_PRO );
	}

	public function register_admin_tools_fields( Tools $tools ) {
		// Rollback
		$tools->add_fields( 'versions', 'rollback', [
			'rollback_pro_separator' => [
				'field_args' => [
					'type' => 'raw_html',
					'html' => '<hr>',
				],
			],
			'rollback_pro' => [
				'label' => __( 'Rollback Pro Version', 'elementor-pro' ),
				'field_args' => [
					'type' => 'raw_html',
					'html' => sprintf( '<a href="%s" class="button elementor-button-spinner elementor-rollback-button">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=elementor_pro_rollback' ), 'elementor_pro_rollback' ), sprintf( __( 'Reinstall Pro v%s', 'elementor-pro' ), ELEMENTOR_PRO_PREVIOUS_STABLE_VERSION ) ),
					'desc' => '<span style="color: red;">' . __( 'Warning: Please backup your database before making the rollback.', 'elementor-pro' ) . '</span>',
				],
			],
		] );
	}

	public function post_elementor_pro_rollback() {
		check_admin_referer( 'elementor_pro_rollback' );

		$plugin_slug = basename( ELEMENTOR_PRO__FILE__, '.php' );

		$package_url = API::get_previous_package_url();
		if ( is_wp_error( $package_url ) ) {
			wp_die( $package_url );
		}

		$rollback = new Rollback( [
			'version' => ELEMENTOR_PRO_PREVIOUS_STABLE_VERSION,
			'plugin_name' => ELEMENTOR_PRO_PLUGIN_BASE,
			'plugin_slug' => $plugin_slug,
			'package_url' => $package_url,
		] );

		$rollback->run();

		wp_die( '', __( 'Rollback to Previous Version', 'elementor-pro' ), [ 'response' => 200 ] );
	}

	public function plugin_action_links( $links ) {
		unset( $links['go_pro'] );

		return $links;
	}

	public function plugin_row_meta( $plugin_meta, $plugin_file ) {
		if ( ELEMENTOR_PRO_PLUGIN_BASE === $plugin_file ) {
			$plugin_slug = basename( ELEMENTOR_PRO__FILE__, '.php' );
			$plugin_name = __( 'Elementor Pro', 'elementor-pro' );

			$row_meta = [
				'view-details' => sprintf( '<a href="%s" class="thickbox open-plugin-details-modal" aria-label="%s" data-title="%s">%s</a>',
					esc_url( network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $plugin_slug . '&TB_iframe=true&width=600&height=550' ) ),
					/* translators: %s: Plugin name - Elementor Pro. */
					esc_attr( sprintf( __( 'More information about %s', 'elementor-pro' ), $plugin_name ) ),
					esc_attr( $plugin_name ),
					__( 'View details', 'elementor-pro' )
				),
				'changelog' => '<a href="https://go.elementor.com/pro-changelog/" title="' . esc_attr( __( 'View Elementor Pro Changelog', 'elementor-pro' ) ) . '" target="_blank">' . __( 'Changelog', 'elementor-pro' ) . '</a>',
			];

			$plugin_meta = array_merge( $plugin_meta, $row_meta );
		}

		return $plugin_meta;
	}

	public function change_tracker_params( $params ) {
		unset( $params['is_first_time'] );

		return $params;
	}

	public function add_finder_items( array $categories ) {
		$settings_url = Settings::get_url();

		$categories['settings']['items']['integrations'] = [
			'title' => __( 'Integrations', 'elementor-pro' ),
			'icon' => 'integration',
			'url' => $settings_url . '#tab-integrations',
			'keywords' => [ 'integrations', 'settings', 'typekit', 'facebook', 'recaptcha', 'mailchimp', 'drip', 'activecampaign', 'getresponse', 'convertkit', 'elementor' ],
		];

		return $categories;
	}

	/**
	 * Admin constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'admin_menu', [ $this, 'remove_go_pro_menu' ], 0 );

		add_action( 'elementor/admin/after_create_settings/' . Tools::PAGE_ID, [ $this, 'register_admin_tools_fields' ], 50 );

		add_filter( 'plugin_action_links_' . ELEMENTOR_PLUGIN_BASE, [ $this, 'plugin_action_links' ], 50 );
		add_filter( 'plugin_row_meta', [ $this, 'plugin_row_meta' ], 10, 2 );

		add_filter( 'elementor/finder/categories', [ $this, 'add_finder_items' ] );

		add_filter( 'elementor/tracker/send_tracking_data_params', [ $this, 'change_tracker_params' ], 200 );
		add_action( 'admin_post_elementor_pro_rollback', [ $this, 'post_elementor_pro_rollback' ] );
	}
}
