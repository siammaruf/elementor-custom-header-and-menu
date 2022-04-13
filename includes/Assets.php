<?php
namespace ELCHM\Includes;
if( ! defined( 'ABSPATH' ) ) exit();

class Assets {
	/**
	 * Construct Function
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'register' ]);
	}


	/**
	 * Regsiter Scripts & Styles
	 * @since 1.0.0
	 */
	public function register() {
		$this->register_scripts( $this->get_scripts() );
		$this->register_styles( $this->get_styles() );
	}

	/**
	 * Register Scritps
	 * @since 1.0.0
	 */
	public function register_scripts( $scripts ) {
		foreach( $scripts as $handle => $script ) {
			$deps      = isset( $script[ 'deps' ] ) ? $script[ 'deps' ] : false;
			$in_footer = isset( $script[ 'in_footer' ] ) ? $script[ 'in_footer' ] : false;
			$version   = isset( $script[ 'version' ] ) ? $script[ 'version' ] : ELCHM_VERSION;

			wp_register_script( $handle, $script[ 'src' ], $deps, $version, $in_footer );
			wp_enqueue_script($handle);
		}
	}

	/**
	 * Regsiter Styles
	 * @since 1.0.0
	 */
	public function register_styles( $styles ) {
		foreach( $styles as $handle => $style ) {
			$deps = isset( $style[ 'deps' ] ) ? $style[ 'deps' ] : false;

			wp_register_style( $handle, $style[ 'src' ], $deps, ELCHM_VERSION );
			wp_enqueue_style($handle);
		}
	}

	/**
	 * Get All Registered Scripts
	 * @since 1.0.0
	 */
	public function get_scripts() {
		$scripts = [
			'ELCHM-frontend' => [
				'src'       => ELCHM_PLUGIN_URL . 'assets/js/elchm-script.js',
				'version'   => \filemtime( ELCHM_PLUGIN_PATH . 'assets/js/elchm-script.js' ),
				'in_footer' => true
			],
		];

		return $scripts;
	}

	/**
	 * Get All Register Styles
	 * @since 1.0.0
	 */
	public function get_styles() {
		$styles = [
			'ELCHM-frontend' => [
				'src' => ELCHM_PLUGIN_URL . 'assets/css/elchm-style.css'
			],
		];

		return $styles;
	}

}