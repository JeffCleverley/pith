<?php
/**
 * Configuration array for Custom Post Taxonomies
 *
 * @package     Deftly\Module\Custom
 * @since       0.1.0
 * @author      Jeff Cleverley
 * @link        https://github.com/JeffCleverley/
 * @license     GNU General Public License 2.0+
 *
 */
namespace Deftly\Module\Custom;

return array (

	[ // Beginning of single Taxonomy Configuration /////////////////////////
		'labels'    => array(
			'slug'                  => 'topic',
			'singular_name'         => 'Topic',
			'plural_name'           => 'Topics',
			'text_domain'           => FAQ_MODULE_TEXT_DOMAIN,
			'specific_labels'       => array(),
		),
		'args'  => array(
			'public'                => true,
			'hierarchical'          => true,
			'show_in_quick_edit'    => true,
			'show_admin_column'     => true,
			'show_in_rest'          => false,
		),
		'post_types'    => array(
			'faq',
		)
	], // End of single Taxonomy Configuration ///////////////////////////////

	[ // Beginning of single Taxonomy Configuration /////////////////////////
		'labels'    => array(
			'slug'                  => 'theory',
			'singular_name'         => 'Theory',
			'plural_name'           => 'Theories',
			'text_domain'           => FAQ_MODULE_TEXT_DOMAIN,
		),
		'args'  => array(
			'public'                => true,
			'hierarchical'          => false,
			'show_in_quick_edit'    => true,
			'show_admin_column'     => true,
			'show_in_rest'          => false,
		),
		'post_types'    => array(
			'faq',
		),
	], // End of single Taxonomy Configuration ///////////////////////////////

);

