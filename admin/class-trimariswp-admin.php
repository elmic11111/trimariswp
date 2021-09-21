<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link              https://github.com/elmic11111/trimariswp
 * @since      1.0.1
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/admin
 * @author     David Hofmann <elmic11111@gmail.com>
 */
class Trimariswp_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.1
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

		// Load CSS for only specific pages
		$valid_pages = array("trimaris-plugin","trimaris-awards","trimaris-new-award");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
		if (in_array($page, $valid_pages)){
			wp_enqueue_style( "trimariswp-bootstrap", TRIMARISWP_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( "trimariswp-datatable", TRIMARISWP_PLUGIN_URL . 'assets/css/jquery.dataTables.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( "trimariswp-sweetalert", TRIMARISWP_PLUGIN_URL . 'assets/css/sweetalert.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( "trimariswp-sweetalert", TRIMARISWP_PLUGIN_URL . 'assets/css/sweetalert.min.css', array(), $this->version, 'all' );
			// Used to Override some things
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trimariswp-admin.css', array(), $this->version, 'all' );
		}
		$trimariswp_admin_datepicker_pages = array("trimaris-new-award");
		if (in_array($page, $trimariswp_admin_datepicker_pages)){
			wp_enqueue_style( "trimariswp-bootstrap-datepicker", TRIMARISWP_PLUGIN_URL . 'assets/css/bootstrap-datepicker.min.css', array(), $this->version, 'all' );
		}
		

	}

	/**
	 * Register the JavaScript for the admin area.
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
		// Load CSS for only specific pages
		$valid_pages = array("trimaris-plugin","trimaris-awards","trimaris-new-award");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
		if (in_array($page, $valid_pages)){
			wp_enqueue_script( "jquery");
			wp_enqueue_script( "trimariswp-bootstrap", TRIMARISWP_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( "trimariswp-datatable", TRIMARISWP_PLUGIN_URL . 'assets/js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( "trimariswp-validate", TRIMARISWP_PLUGIN_URL . 'assets/js/jquery.validate.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( "trimariswp-sweetalert", TRIMARISWP_PLUGIN_URL . 'assets/js/sweetalert.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trimariswp-admin-op.js', array( 'jquery' ), $this->version, false );

		}
		$trimariswp_admin_datepicker_pages = array("trimaris-new-award");
		if (in_array($page, $trimariswp_admin_datepicker_pages)){
			wp_enqueue_script( "trimariswp-bootstrap-datepicker", TRIMARISWP_PLUGIN_URL . 'assets/js/bootstrap-datepicker.min.js', array( 'jquery' ), $this->version, false );
		}
		// Default JS
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trimariswp-admin.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( $this->plugin_name, "trimariswp", array(
			"ajaxurl" => admin_url("admin-ajax.php")
		));

	}

	// Create menu method for Trimaris Admin menu
	public function trimariswp_admin_menu() {
		// Add Main Menu on Admin page
		add_menu_page("Trimaris Plugin","Trimaris Plugin","manage_options","trimaris-plugin",array($this,"trimariswp_plugin"),"dashicons-smiley",27);
		// Add a submenu to the Trimaris Plugin menu on Admin page
		add_submenu_page("trimaris-plugin","Dashboard","Dashboard","manage_options","trimaris-plugin",array($this,"trimariswp_plugin"));
		// Add sub Menu for managing Awards
		add_submenu_page("trimaris-plugin","Awards","Awards","manage_options","trimaris-awards",array($this,"trimariswp_op_awards_list"));
		add_submenu_page("trimaris-plugin","Add New Award","Add New Award","manage_options","trimaris-new-award",array($this,"trimariswp_new_award"));

	}

	//menu callback function
	public function trimariswp_op_awards_list(){
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		global $wpdb;

		$op_awards_list_results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT id, award, kingdomcode, awardtype, awardlevel, awardrank, awardopened, awardclosed, awardreason, awardname, awardcomment, awardorder, awardimage FROM op_awards",''
            )
        );


		$partial_file = "partials/trimariswp-admin-op-awards-list.php";
		include_once( plugin_dir_path( __FILE__ ) . $partial_file );
	}
	public function trimariswp_new_award(){
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$partial_file = "partials/trimariswp-admin-new-op-award.php";
		include_once( plugin_dir_path( __FILE__ ) . $partial_file );
	}

	public function trimariswp_plugin(){
		echo "<h3>Welcome to Trimaris Plug Menu</h3>";
	}

	public function handle_ajax_request_admin(){
		// Load Wordpress DB Stuff
		global $wpdb;

		// Handles all ajax requests of Admin
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";

		if(!empty($param)){
			if ($param == "first_simple_ajax"){
				echo json_encode(array(
					"status" => 1,
					"message" => "First Ajax Request",
					"data" => array(
						"name" => "Online Web Tutor",
						"author" => "David"
					)
				));
			} elseif ($param == "add_new_op_award"){

				if (isset($_REQUEST['award']) && isset($_REQUEST['awardname'])) {
					// get all data from form
					$award = isset($_REQUEST['award']) ? $_REQUEST['award'] : NULL;
					$kingdomcode = isset($_REQUEST['kingdomcode']) ? $_REQUEST['kingdomcode'] : NULL;
					$awardtype = isset($_REQUEST['awardtype']) ? $_REQUEST['awardtype'] : NULL;
					$awardlevel = isset($_REQUEST['awardlevel']) ? $_REQUEST['awardlevel'] : NULL;
					$awardrank = isset($_REQUEST['awardrank']) ? $_REQUEST['awardrank'] : NULL;
					$awardopened = isset($_REQUEST['awardopened']) ? $_REQUEST['awardopened'] : NULL;
					$awardclosed = isset($_REQUEST['awardclosed']) ? $_REQUEST['awardclosed'] : 0;
					$awardreason = isset($_REQUEST['awardreason']) ? $_REQUEST['awardreason'] : NULL;
					$awardname = isset($_REQUEST['awardname']) ? $_REQUEST['awardname'] : NULL;
					$awardcomment = isset($_REQUEST['awardcomment']) ? $_REQUEST['awardcomment'] : NULL;
					$awardorder = isset($_REQUEST['awardorder']) ? $_REQUEST['awardorder'] : NULL;
					$awardimage = isset($_REQUEST['awardimage']) ? $_REQUEST['awardimage'] : NULL;

					$max_id = $wpdb->get_var( 'SELECT MAX(id) FROM op_awards' );
					$id = $max_id + 1;

					$insert_results = $wpdb->insert('op_awards',array(
						"id" => $id, 
						"award" => $award, 
						"kingdomcode" => $kingdomcode, 
						"awardtype" => $awardtype, 
						"awardlevel" => $awardlevel, 
						"awardrank" => $awardrank, 
						"awardopened" => $awardopened, 
						"awardclosed" => $awardclosed, 
						"awardreason" => $awardreason, 
						"awardname" => $awardname, 
						"awardcomment" => $awardcomment, 
						"awardorder" => $awardorder, 
						"awardimage" => $awardimage 
					), array(
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
						'%d',
						'%s',
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s'						
					));

					if ($insert_results){
						echo json_encode(array(
							"status" => 1,
							"message" => "Award Created"
						));
					} else {
						echo json_encode(array(
							"status" => 0,
							"message" => "Failed to Created Award "
						));
					}

				}

				
			}
		}



		

		wp_die();
	}
}
