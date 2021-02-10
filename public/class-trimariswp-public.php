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

	// trimariswp_query_paramaters
	function trimariswp_register_query_vars( $vars ) {
		$vars[] = 'linknum';
		$vars[] = 'op_letter';
		return $vars;
	}

	// Process the Shortcodes
	public function trimariswp_shortcode_processor( $atts = [], $content = null, $tag = ''  ){ 
		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );
	
		// override default attributes with user attributes
		$trimariswp_atts = shortcode_atts(
			array(
				'page' => 'op_toc',
			), $atts, $tag
		);

		switch ($trimariswp_atts['page']) {
			case "op_alphabetical":
				$trimariswp_output = $this->trimariswp_op_alphabetical( );
				break;
			case "op_event":
				$trimariswp_output = $this->trimariswp_op_event( );
				break;
				case "op_individual":
				$trimariswp_output = $this->trimariswp_op_individual( );
				break;
			case "op_recent_events":
				$trimariswp_output = $this->trimariswp_op_recent_events( );
				break;
			case "op_toc":
				$trimariswp_output = $this->trimariswp_op_toc( );
				break;
			default:
				$trimariswp_output = '<center><b>Sorry, Something went wrong</b></center>';
		}

		return $trimariswp_output;
	}

	// Table of Contents
	public function trimariswp_op_toc( ) {

		$output = $this->trimariswp_op_toc_alphabet( );

		return $output;
	}

	// Table of Contents
	public function trimariswp_op_alphabetical( ) {

		global $wp_query;
		if (isset($wp_query->query_vars['op_letter'])) {
			$op_letter = sanitize_html_class( $wp_query->query_vars['op_letter'] );
		} else {
			return "<center><b>No Letter Provided</b></center>";
		}
		
		$output = $this->trimariswp_op_toc_alphabet( );		

		global $wpdb;
		$op_masternames_results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT scaname,linknum FROM op_masternames WHERE LEFT(scaname,1) = %s ORDER BY scaname",
                $op_letter
            )
        );

		if(!empty($op_masternames_results)) {
			foreach ($op_masternames_results as $row){
				
				$output .= sprintf("<a href=\"/officers/office-of-the-triskele-herald/order-of-precedence/individual/?linknum=%06d\">%s</a><BR>",$row->linknum,$row->scaname);
			}
		}

		return $output;
	}

	public function trimariswp_op_individual( ) {

		global $wp_query;
		if (isset($wp_query->query_vars['linknum'])) {
			$linknum = sanitize_html_class( $wp_query->query_vars['linknum'] );
		} else {
			return "<center><b>No Name Provided</b></center>";
		}

		$output = $this->trimariswp_op_toc_alphabet( );		

		global $wpdb;

		$op_masternames_results = $wpdb->get_row(
            $wpdb->prepare(
                "select scaname,blazon from OP_MASTERNAMES where linknum = %s",
                $linknum
            )
        );

		if(empty($op_masternames_results)) {
			return "<center><b>Invalid Name Provided</b></center>";
		}

		$awards_results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT op_data.scaname, DATE_FORMAT(op_data.awarddate, '%%Y-%%d-%%m') as awarddate, op_awards.awardname, op_data.award, op_awards.awardimage FROM op_data AS op_data INNER JOIN op_awards AS op_awards ON op_data.award=op_awards.award
				WHERE op_data.linknum = %s ORDER BY awarddate",
                $linknum
            )
        );

		$template_filepath = plugin_dir_path(__FILE__) . 'partials/op_individual.php';
		if ( ! is_file( $template_filepath ) || ! is_readable( $template_filepath ) ) {
			return '<b>Individual Template Missing</b>';
		}

		ob_start();
    	include $template_filepath;
    	$output = ob_get_clean();

		return $output;

	}
	// Get the Recent OP events
	public function trimariswp_op_recent_events( ) {
		// Maxiun Number of Events
		$maxiumevents = 15;

		global $wpdb;
		$op_events_results = $wpdb->get_results(
            $wpdb->prepare(
                "select evntname, DATE_FORMAT(datebegin, '%%Y') as courtyear, evntcode FROM op_events WHERE courtheld = 1 ORDER by datebegin DESC LIMIT %d",
                $maxiumevents
            )
        );

		$template_filepath = plugin_dir_path(__FILE__) . 'partials/op_recent_events.php';
		if ( ! is_file( $template_filepath ) || ! is_readable( $template_filepath ) ) {
			return '<b>Individual Template Missing</b>';
		}

		ob_start();
    	include $template_filepath;
    	$output = ob_get_clean();

		return $output;

	}

	// Table of Contents
	public function trimariswp_op_toc_alphabet( ) {

		$template_filepath = plugin_dir_path(__FILE__) . 'partials/op_toc_alphabet.php';
		if ( ! is_file( $template_filepath ) || ! is_readable( $template_filepath ) ) {
			return '<b>TOC Alphabet Template Missing</b>';
		}
		$output = file_get_contents( $template_filepath );

		return $output;
	}




}


