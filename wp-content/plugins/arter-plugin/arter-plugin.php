<?php
/**
 * Plugin Name: Arter Plugin
 * Plugin URI: https://bslthemes.com/
 * Description: This plugin it's designed for Arter Theme
 * Version: 1.6.6
 * Author: bslthemes
 * Author URI: https://bslthemes.com/
 * Text Domain: arter-plugin
 * Domain Path: /languages/
 * License: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Init all plugins constants
if ( ! defined( 'ARTER_PLUGIN_PATH' ) ) {
	define( 'ARTER_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'ARTER_PLUGIN_URI' ) ) {
	define( 'ARTER_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}

// Main Class
if ( ! class_exists( 'ArterPlugin' ) ) {

	class ArterPlugin {

		public function __construct() {

		}

		public function init() {

			/*init*/
			$this->init_hooks();
			$this->init_cpt();
			$this->init_theme_helpers();
			$this->init_acf_ext();
			$this->init_elementor_addons();
			$this->init_dashboard();
		}

		public function plugin_load_textdomain() {
			/* load plugin text-domain */
			load_plugin_textdomain( 'arter-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		public function init_hooks() {
			/* hooks */

			/* load languages */
			add_action( 'plugins_loaded', [$this, 'plugin_load_textdomain'] );

			/* fixed theme update */
			function arter_fix_trans_after_update() {
				$transient = get_option( '_site_transient_update_themes' );
				$theme_slug = 'arter';

				if ( isset( $transient->response[$theme_slug] ) && !empty( $transient ) ) {
					if ( $transient->response[$theme_slug]['new_version'] == wp_get_theme()->Version ) {
						unset($transient->response[$theme_slug]);
					}
					update_option( '_site_transient_update_themes', $transient );
				}
			}
			add_action('admin_init', 'arter_fix_trans_after_update');

			/* notice register */
			add_action( 'admin_head', array( $this, 'dismiss' ) );
			add_action( 'upgrader_process_complete', array( $this, 'after_theme_upgrade' ), 10, 2 );
			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );
		}

		public function init_cpt() {
			/* include custom post types */
			require_once ARTER_PLUGIN_PATH . 'inc/custom-post-types.php';
		}

		public function init_acf_ext() {
			/* include acf fields extention */
			require_once ARTER_PLUGIN_PATH . 'acf-ext/acf-ui-google-font/acf-ui-google-font.php';
			require_once ARTER_PLUGIN_PATH . 'acf-ext/acf-cf7/acf-cf7.php';
			require_once ARTER_PLUGIN_PATH . 'acf-ext/acf-fa/acf-font-awesome-font.php';
		}

		public function init_theme_helpers() {
			/* include social share */
			require_once ARTER_PLUGIN_PATH . '/inc/social-share/social-share.php';
		}

		public function init_elementor_addons() {
			/* include elementor addons */
			require_once ARTER_PLUGIN_PATH . 'elementor/functions.php';
		}

		public function init_dashboard() {
			/* include theme dashboard */
			require_once ARTER_PLUGIN_PATH . 'admin/dashboard-theme-helper.php';
			require_once ARTER_PLUGIN_PATH . 'admin/dashboard-theme-init.php';
			require_once ARTER_PLUGIN_PATH . 'admin/dashboard-theme-activation.php';
		}

		public function dismiss() {
			if ( isset( $_GET['arter-dismiss'] ) && check_admin_referer( 'arter-dismiss-' . get_current_user_id() ) ) {
				update_user_meta( get_current_user_id(), 'arter_dismissed_notice', 1 );
			}
		}

		public function after_theme_upgrade( $upgrader_object, $options ) {
			if ( ( $options['action'] == 'install' ) && $options['type'] == 'theme' ) {
				 if ( $upgrader_object->new_theme_data['Name'] == 'Arter' ) {
					 self::update_dismiss();
				 }
			}
			if ( ( $options['action'] == 'install' ) && $options['type'] == 'plugin' ) {
				 if ( $upgrader_object->new_plugin_data['Name'] == 'Arter Plugin' ) {
					 self::update_dismiss();
				 }
			}
		}

		static function update_dismiss() {
			delete_metadata( 'user', null, 'arter_dismissed_notice', null, true );
		}

		static function get_plugin_info() {
			if ( !function_exists( 'get_plugin_data' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			return get_plugin_data( __FILE__ );
		}

		static function clear_rewrite_rules() {
			update_option( 'rewrite_rules', '' );
		}

		static function elementor_init_cpt_support() {
			$cpt_support = get_option( 'elementor_cpt_support' );

			if( ! $cpt_support ) {
			    $cpt_support = [ 'page', 'post', 'portfolio' ];
			    update_option( 'elementor_cpt_support', $cpt_support );
			} else if( ! in_array( 'portfolio', $cpt_support ) ) {
			    $cpt_support[] = 'portfolio';
			    update_option( 'elementor_cpt_support', $cpt_support );
			}
		}

		static function elementor_disable_default_schemes() {
			$color_schemes = get_option( 'elementor_disable_color_schemes' );
			$typography_schemes = get_option( 'elementor_disable_typography_schemes' );
			$global_image_lightbox = get_option( 'elementor_global_image_lightbox' );

			if( ! $color_schemes ) {
			    update_option( 'elementor_disable_color_schemes', 'yes' );
			}
			if( ! $typography_schemes ) {
			    update_option( 'elementor_disable_typography_schemes', 'yes' );
			}
			if( $global_image_lightbox == 'yes' ) {
			    update_option( 'elementor_global_image_lightbox', 'no' );
			}
		}

		static function elementor_disable_experiment_latest_swiper() {
			update_option( 'elementor_experiment-e_swiper_latest', 'inactive' );
		}

		static function activation() {
			self::clear_rewrite_rules();
			self::elementor_init_cpt_support();
			self::elementor_disable_default_schemes();
			self::elementor_disable_experiment_latest_swiper();
			self::update_dismiss();
		}

		static function deactivation() {
			self::clear_rewrite_rules();
			self::update_dismiss();
		}
	}

}

$arterPlugin = new ArterPlugin();
$arterPlugin->init();

register_activation_hook( __FILE__, array( $arterPlugin, 'activation' ) );
register_deactivation_hook( __FILE__, array( $arterPlugin, 'deactivation' ) );
