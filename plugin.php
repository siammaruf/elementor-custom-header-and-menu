<?php
/**
 * @link            https://creativehead.me/
 * @since           1.0.0
 * @package         creative-head-theme-options
 *
 * Plugin Name: Elementor Custom Header And Menu
 * Plugin URI: https://siammaruf.com/
 * Description: Elementor custom widget for Header and Menu.
 * Version: 1.0.0
 * Author: Md. Siam Maruf
 * Author URI: https://siammaruf.com
 * License: GPL v3
 * Text-Domain: ELCHM
 */

use ELCHM\Elementor\Widgets;
use ELCHM\Includes\Admin;
use ELCHM\Includes\Assets;

if( ! defined( 'ABSPATH' ) ) exit(); // No direct access allowed
/**
 * Require Autoloader
 */
require_once 'vendor/autoload.php';

final class EL_CHM{
	/**
	 * Define Plugin version
	 */
	const VERSION = '1.0.0';

	/**
	 * Construct Function
	 */
	public function __construct() {
		$this->plugin_constants();
		register_activation_hook(__FILE__,[$this,'activate']);
		register_activation_hook(__FILE__,[$this,'deactivate']);
		add_action( 'plugin_loaded', [$this,'init_plugin'] );
	}

	/**
	 * Plugin Constants
	 * @since 1.0.0
	 */
	public function plugin_constants(){
		define( 'ELCHM_VERSION',self::VERSION );
		define( 'ELCHM_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'ELCHM_PLUGIN_URL', trailingslashit(plugins_url( '',__FILE__ )) );
		define( 'ELCHM_NONCE', 'b?le*;K7.T2jk_*(+3&[G[xAc8O~Fv)2T/Zk9N:GKBkn$piN0.N%N~X91VbCn@.4' );
	}

	/**
	 * Singletone Instance
	 * @since 1.0.0
	 */
	public static function init(){
		static $instance = false;
		if (!$instance){
			$instance = new Self();
		}
		return $instance;
	}

	/**
	 * On Plugin Activation
	 * @since 1.0.0
	 */
	public function activate(){
		$is_installed = get_option('ELCHM_is_installed');
		if (!$is_installed){
			update_option( 'ELCHM_is_installed',time() );
		}
		update_option( 'ELCHM_is_installed',ELCHM_VERSION );
	}

	/**
	 * On Plugin Deactivation
	 * @since 1.0.0
	 */
	public function deactivate(){
		// On Plugin deactivation
	}

	/**
	 * Init Plugin
	 * @since 1.0.0
	 */
	public function init_plugin(){
		new Admin();
		new Assets();
		new Widgets();
	}

}

/**
 * Initialize Main Plugin
 * @since 1.0.0
 */
function EL_CHM_init(){
	return EL_CHM::init();
}


// Run the Plugin
EL_CHM_init();
