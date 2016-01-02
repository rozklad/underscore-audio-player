<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://plugins.sanatorium.ninja
 * @since      1.0.0
 *
 * @package    Underscore_Audio_Player
 * @subpackage Underscore_Audio_Player/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Underscore_Audio_Player
 * @subpackage Underscore_Audio_Player/public
 * @author     Sanatorium <info@sanatorium.ninja>
 */
class Underscore_Audio_Player_Public {

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
	 * @param      string    $Underscore_Audio_Player       The name of the plugin.
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
		 * defined in Underscore_Audio_Player_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Underscore_Audio_Player_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/underscore-audio-player-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/underscore-audio-player-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'moment', plugin_dir_url( __FILE__ ) . 'js/moment.js', array( 'jquery' ), $this->version, false );


	}

	/**
	 * Get audio player
	 * 
	 * @since    1.0.0
	 */
	public static function get_underscore_audio_player() {

		$podcast_content = powerpress_get_enclosure_data(get_the_ID(), $feed_slug = 'podcast');

		// No podcast available
		if ( $podcast_content == false )
			return null;

		$options = get_option('Underscore_Audio_Player_Admin');

		// Output buffer
		ob_start();
		
		include_once( dirname( __FILE__ ) . '/partials/underscore-audio-player-public-display.php' ); 

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

	/**
	 * Audio player shortcut output
	 * 
	 * @since    1.0.0
	 */
	public static function the_underscore_audio_player() {

		echo self::get_underscore_audio_player();

	}

}
