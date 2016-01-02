<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://plugins.sanatorium.ninja
 * @since      1.0.0
 *
 * @package    Underscore_Audio_Player
 * @subpackage Underscore_Audio_Player/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Underscore_Audio_Player
 * @subpackage Underscore_Audio_Player/admin
 * @author     Sanatorium <info@sanatorium.ninja>
 */
class Underscore_Audio_Player_Admin {

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
	 * Add admin page to menu
	 *
	 * @since    1.0.0
	 */
	public function admin_menu() {

		add_menu_page(
				__('<u>U</u> Audio Player'), 
				__('<u>U</u> Audio Player'), 
				'manage_options', 
				__CLASS__, 
				array( $this, 'admin_page' ),
				'dashicons-format-audio'
			);

	}

	/**
	 * Show admin page
	 *
	 * @since    1.0.0
	 */
	public function admin_page() {

		$this->process();

		$options = get_option( __CLASS__ , array() );

		$class = __CLASS__;

		require_once dirname(__FILE__) . '/partials/underscore-audio-player-admin-display.php';

	}

	public function process() {

		if ( isset($_POST['save']) && isset($_POST[__CLASS__]) ) {
			update_option(__CLASS__, $_POST[__CLASS__]);
		}

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Underscore_Audio_Player_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Underscore_Audio_Player_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/underscore-audio-player-admin.css', array(), $this->version, 'all' );

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
		 * defined in Underscore_Audio_Player_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Underscore_Audio_Player_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/underscore-audio-player-admin.js', array( 'jquery' ), $this->version, false );

	}

}
