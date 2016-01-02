<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sanatorium.ninja
 * @since             1.0.0
 * @package           Underscore_Audio_Player
 *
 * @wordpress-plugin
 * Plugin Name:       Underscore Audio Player
 * Plugin URI:        http://plugins.sanatorium.ninja
 * Description:       Custom Audio Player made for underscore.co.uk
 * Version:           1.0.0
 * Author:            Sanatorium
 * Author URI:        http://sanatorium.ninja/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       underscore-audio-player
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-underscore-audio-player-activator.php
 */
function activate_underscore_audio_player() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-underscore-audio-player-activator.php';
	Underscore_Audio_Player_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-underscore-audio-player-deactivator.php
 */
function deactivate_underscore_audio_player() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-underscore-audio-player-deactivator.php';
	Underscore_Audio_Player_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_underscore_audio_player' );
register_deactivation_hook( __FILE__, 'deactivate_underscore_audio_player' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-underscore-audio-player.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_underscore_audio_player() {

	$plugin = new Underscore_Audio_Player();
	$plugin->run();

}
run_underscore_audio_player();

/**
 * Register shortcut functions
 */
function get_underscore_audio_player() {

	return Underscore_Audio_Player_Public::get_underscore_audio_player();

}

function the_underscore_audio_player() {

	Underscore_Audio_Player_Public::the_underscore_audio_player();
	
}

