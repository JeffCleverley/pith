<?php
/**
 * Deftly Pith Plugin
 *
 * @package         Deftly\Pith
 * @since           0.1.0
 * @author          Jeff Cleverley
 * @link            https://github.com/JeffCleverley/Pith
 * @copyright       Jeff Cleverley
 * @license         GNU General Public License 2.0+
 *
 * @wordpress-plugin
 *
 * Plugin Name:     Pith
 * Plugin URI:      https://github.com/JeffCleverley/Pith
 * Description:     Must Use plugin with modules to add functionality to core and aid development.
 * Version:         0.1.0
 * Author:          Jeff Cleverley
 * Author URI:      https://jeffcleverley.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     pith
 * Requires WP:     4.7.5
 * Requires PHP:    7.0
 *
*/
namespace  Deftly\Pith;

use Deftly\Module\Custom as CustomModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Nothing to see here, move along now...!" );
}

define( 'PITH_PLUGIN', __FILE__ );
define( 'PITH_DIR', plugin_dir_path( __FILE__ ) );
$plugin_url = plugin_dir_url( __FILE__ );
if ( is_ssl() ) {
	$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
}
define( 'PITH_URL', $plugin_url );
define( 'PITH_TEXT_DOMAIN', 'collapsible_content' );

include( __DIR__ . '/src/plugin.php' );

CustomModule\register_plugin_with_custom_module_rewrite_deletes( __FILE__ );





