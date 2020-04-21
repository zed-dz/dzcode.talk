<?php
namespace ElementorPro\Modules\AssetsManager\AssetTypes\Icons\IconSets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Fontello extends Icon_Set_Base {

	protected $data_file = 'config.json';
	protected $stylesheet_file = '';
	protected $allowed_zipped_files = [ 'config.json', 'demo.html', 'README.txt', 'LICENSE.txt', 'css/', 'font/' ];
	protected $allowed_webfont_extensions = [ 'woff', 'woff2', 'ttf', 'svg', 'otf' ];

	protected function prepare() {
		return [];
	}

	public function get_type() {
		return __( 'Fontello', 'elementor-pro' );
	}

	public function is_valid() {
		if ( ! file_exists( $this->directory . $this->data_file ) ) {
			return false; // missing data file
		}
		return true;
	}

	private function get_json() {
		return json_decode( file_get_contents( $this->directory . $this->data_file ) );
	}

	protected function extract_icon_list() {
		$config = $this->get_json();
		if ( ! isset( $config->glyphs ) ) {
			return false; //  missing icons list
		}
		$icons = [];
		foreach ( $config->glyphs as $icon ) {
			$icons[] = $icon->css;
		}
		return $icons;
	}

	protected function get_url( $filename = '' ) {
		return $this->get_file_url( $this->dir_name . $filename );
	}

	protected function get_prefix() {
		$config = $this->get_json();
		if ( ! isset( $config->css_prefix_text ) ) {
			return false; //  missing css_prefix_text
		}
		return $config->css_prefix_text;
	}

	public function get_name() {
		$config = $this->get_json();
		if ( ! isset( $config->name ) ) {
			return false; //  missing name
		}
		return $config->name;
	}

	protected function get_stylesheet() {
		$name = $this->get_name();
		if ( ! $name ) {
			return false; //  missing name
		}
		return $this->get_url() . '/css/' . $name . '.css';
	}
}
