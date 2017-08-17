<?php
/**
 * Plugin Handler
 *
 * @package     Deftly\Pith;
 * @since       0.1.0
 * @author      Jeff Cleverley
 * @link        https://github.com/JeffCleverley/
 * @license     GNU General Public License 2.0+
 *
 */
namespace  Deftly\Pith;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue style and script assets
 *
 * @since   0.1.0
 *
 * @return  void
 */
function enqueue_assets() {
	wp_enqueue_style( 'dashicons' );
}

/**
 * Autoload Plugin Files
 *
 * @since   0.1.0
 *
 * @return  void
 */
function autoload() {
	$files = [
		'custom/module.php',
		'functions/module.php',
	];

	foreach( $files as $file ) {
		include( __DIR__ . '/' . $file );
	}
}
autoload();