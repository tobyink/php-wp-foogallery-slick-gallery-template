//Use this file to inject custom javascript behaviour into the foogallery edit page
//For an example usage, check out wp-content/foogallery/extensions/default-templates/js/admin-gallery-default.js

(function (SLICK_TEMPLATE_FOOGALLERY_EXTENSION, $, undefined) {

	SLICK_TEMPLATE_FOOGALLERY_EXTENSION.doSomething = function() {
		//do something when the gallery template is changed to slick
	};

	SLICK_TEMPLATE_FOOGALLERY_EXTENSION.adminReady = function () {
		$('body').on('foogallery-gallery-template-changed-slick', function() {
			SLICK_TEMPLATE_FOOGALLERY_EXTENSION.doSomething();
		});
	};

}(window.SLICK_TEMPLATE_FOOGALLERY_EXTENSION = window.SLICK_TEMPLATE_FOOGALLERY_EXTENSION || {}, jQuery));

jQuery(function () {
	SLICK_TEMPLATE_FOOGALLERY_EXTENSION.adminReady();
});