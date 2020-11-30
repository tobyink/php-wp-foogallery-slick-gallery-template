<?php

if ( !class_exists( 'Slick_Template_FooGallery_Extension_Init' ) ) {
	class Slick_Template_FooGallery_Extension_Init {
	
		function __construct() {
			add_filter( 'foogallery_available_extensions', array( $this, 'add_to_extensions_list' ) );
		}
		
		function add_to_extensions_list( $extensions ) {
			$extensions[] = array(
				'slug'=> 'slick',
				'class'=> 'Slick_Template_FooGallery_Extension',
				'title'=> __('Slick', 'foogallery-slick'),
				'file'=> 'foogallery-slick-extension.php',
				'description'=> __('Carousel using slick.js', 'foogallery-slick'),
				'author'=> ' Toby Inkster',
				'author_url'=> 'http://toby.ink/',
				'thumbnail'=> SLICK_TEMPLATE_FOOGALLERY_EXTENSION_URL . '/assets/extension_bg.png',
				'tags'=> array( __('template', 'foogallery') ),	//use foogallery translations
				'categories'=> array( __('Build Your Own', 'foogallery') ), //use foogallery translations
				'source'=> 'generated'
			);
			
			return $extensions;
		}
	}
	
	new Slick_Template_FooGallery_Extension_Init();
}