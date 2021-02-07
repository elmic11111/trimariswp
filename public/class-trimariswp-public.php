<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       test2
 * @since      1.0.0
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/public
 * @author     David Hofmann <elmic11111@gmail.com>
 */
class Trimariswp_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Trimariswp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trimariswp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trimariswp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Trimariswp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trimariswp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trimariswp-public.js', array( 'jquery' ), $this->version, false );

	}

	public function trimariswp_shortcode_processor( $atts = [], $content = null, $tag = ''  ){ 

		$template_filepath = plugin_dir_path(__FILE__) . 'partials/op_toc.php';
		if ( ! is_file( $template_filepath ) || ! is_readable( $template_filepath ) ) {
			return '<b>TOC Template Missing</b>';
		}

		$template_output .= file_get_contents( $template_filepath );

		return $template_output;
	}

}
