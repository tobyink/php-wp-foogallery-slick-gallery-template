<?php
/**
 * FooGallery Slick Extension
 *
 * Carousel using slick.js
 *
 * @package   Slick_Template_FooGallery_Extension
 * @author     Toby Inkster
 * @license   GPL-2.0+
 * @link      http://toby.ink/
 * @copyright 2014  Toby Inkster
 *
 * @wordpress-plugin
 * Plugin Name: FooGallery - Slick
 * Description: Carousel using slick.js
 * Version:     1.1.0
 * Author:       Toby Inkster
 * Author URI:  http://toby.ink/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !class_exists( 'Slick_Template_FooGallery_Extension' ) ) {

	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_FILE', __FILE__ );
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL', plugin_dir_url( __FILE__ ));
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION', '1.1.0');
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_PATH', plugin_dir_path( __FILE__ ));
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_SLUG', 'foogallery-slick');
	
	require_once( 'foogallery-slick-init.php' );
	
	class Slick_Template_FooGallery_Extension {
		function __construct() {
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
			add_filter( 'foogallery_located_template-slick', array( $this, 'enqueue_dependencies' ) );
			add_filter( 'foogallery_template_js_ver-slick', array( $this, 'override_version' ) );
			add_filter( 'foogallery_template_css_ver-slick', array( $this, 'override_version' ) );
		}
		
		function register_myself( $extensions ) {
			$extensions[] = __FILE__;
			return $extensions;
		}
		
		function override_version( $version ) {
			return SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION;
		}
		
		function enqueue_dependencies() { }
		
		function add_template( $gallery_templates ) {
			$gallery_templates[] = array(
				'slug'        => 'slick',
				'name'        => __( 'Slick', 'foogallery-slick'),
				'preview_css' => SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/gallery-slick.css',
				'admin_js'    => SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/admin-gallery-slick.js',
				'fields'      => array(
					array(
						'id'    => 'slickoptions',
						'title' => __( 'Options', 'foogallery-slick' ),
						'type'  => 'text',
						'desc'  => __( 'Javascript object to pass as options to slick.js.', 'foogallery-slick' )
					),
					array(
						'id'    => 'extendedoutput',
						'title' => __( 'Extended Output', 'foogallery-slick' ),
						'desc'  => 'Include title and caption in output',
						'type'  => 'checkbox',
						'default' => 'off'
					)
				)
			);
			return $gallery_templates;
		}
	}
}
