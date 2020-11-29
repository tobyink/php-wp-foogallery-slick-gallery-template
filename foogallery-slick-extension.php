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
 * Version:     1.0.0
 * Author:       Toby Inkster
 * Author URI:  http://toby.ink/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( !class_exists( 'Slick_Template_FooGallery_Extension' ) ) {

	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_FILE', __FILE__ );
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL', plugin_dir_url( __FILE__ ));
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION', '1.0.0');
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_PATH', plugin_dir_path( __FILE__ ));
	define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_SLUG', 'foogallery-slick');
	//define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_URL', 'http://fooplugins.com');
	//define('SLICK_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_ITEM_NAME', 'Slick');

	require_once( 'foogallery-slick-init.php' );

	class Slick_Template_FooGallery_Extension {
		/**
		 * Wire up everything we need to run the extension
		 */
		function __construct() {
			add_filter( 'foogallery_gallery_templates', array( $this, 'add_template' ) );
			add_filter( 'foogallery_gallery_templates_files', array( $this, 'register_myself' ) );
			add_filter( 'foogallery_located_template-slick', array( $this, 'enqueue_dependencies' ) );
			add_filter( 'foogallery_template_js_ver-slick', array( $this, 'override_version' ) );
			add_filter( 'foogallery_template_css_ver-slick', array( $this, 'override_version' ) );

			//used for auto updates and licensing in premium extensions. Delete if not applicable
			//init licensing and update checking
			//require_once( SLICK_TEMPLATE_FOOGALLERY_EXTENSION_PATH . 'includes/EDD_SL_FooGallery.php' );

			//new EDD_SL_FooGallery_v1_1(
			//	SLICK_TEMPLATE_FOOGALLERY_EXTENSION_FILE,
			//	SLICK_TEMPLATE_FOOGALLERY_EXTENSION_SLUG,
			//	SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION,
			//	SLICK_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_URL,
			//	SLICK_TEMPLATE_FOOGALLERY_EXTENSION_UPDATE_ITEM_NAME,
			//	'Slick');
		}

		/**
		 * Register myself so that all associated JS and CSS files can be found and automatically included
		 * @param $extensions
		 *
		 * @return array
		 */
		function register_myself( $extensions ) {
			$extensions[] = __FILE__;
			return $extensions;
		}

		/**
		 * Override the asset version number when enqueueing extension assets
		 */
		function override_version( $version ) {
			return SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION;
		}

		/**
		 * Enqueue any script or stylesheet file dependencies that your gallery template relies on
		 */
		function enqueue_dependencies() {
			//$js = SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/jquery.slick.js';
			//wp_enqueue_script( 'slick', $js, array('jquery'), SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );

			//$css = SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/slick.css';
			//foogallery_enqueue_style( 'slick', $css, array(), SLICK_TEMPLATE_FOOGALLERY_EXTENSION_VERSION );
		}

		/**
		 * Add our gallery template to the list of templates available for every gallery
		 * @param $gallery_templates
		 *
		 * @return array
		 */
		function add_template( $gallery_templates ) {

			$gallery_templates[] = array(
				'slug'        => 'slick',
				'name'        => __( 'Slick', 'foogallery-slick'),
				'preview_css' => SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'css/gallery-slick.css',
				'admin_js'	  => SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . 'js/admin-gallery-slick.js',
				'fields'	  => array(
							array(
									'id'	  => 'slickoptions',
        					'title'   => __( 'Options', 'foogallery-slick' ),
									'type'	  => 'text',
									'desc'	  => __( 'Javascript object to pass as options to slick.js.', 'foogallery-slick' )
							)
         )
			);

			return $gallery_templates;
		}
	}
}