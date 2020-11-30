<?php
/**
 * FooGallery Parity Gallery gallery template
 * This is the template that is run when a FooGallery shortcode is rendered to the frontend
 */
//the current FooGallery that is currently being rendered to the frontend
global $current_foogallery;
//the current shortcode args
global $current_foogallery_arguments;

$images    = $current_foogallery->attachments();
$slickopts = $current_foogallery->settings['slick_slickoptions'];
if (empty($slickopts)) {
  $slickopts = '';
}
$extendedoutput = $current_foogallery->settings['slick_extendedoutput'];

?>

<div id="foogallery-gallery-<?php echo $current_foogallery->ID; ?>" class="foogallery-gallery-slick">
	<ul style="padding:0;margin:0;list-style:none">
		<?php
			while (count($images)) {
				$image = array_shift($images);
				$startlink = '';
				$endlink   = '';
				$info      = '';
				if ($image->custom_url) {
					$startlink = sprintf("<a href=\"%s\">", htmlspecialchars($image->custom_url));
					$endlink   = '</a>';
				}
				print "\t\t<li style=\"padding:0;margin:0\" class=\"wp-image-" . $image->ID . "-wrapper\">\n";
				printf("\t\t\t%s<img class=\"wp-image-%d\" src=\"%s\" alt=\"%s\" title=\"%s\">%s\n", $startlink, $image->ID, htmlspecialchars($image->url), htmlspecialchars($image->alt), htmlspecialchars($image->title), $endlink);
				if ( $extendedoutput ) {
					$title   = $image->title;
					$caption = $image->caption;
					if ( strlen($title) || strlen($caption) ) {	
						print "\t\t\t<div class=\"image-info\">\n";
						if ( strlen($title) ) {
							print "\t\t\t<div class=\"image-info-title\">".htmlspecialchars($title)."</div>\n";
						}
						if ( strlen($caption) ) {
							print "\t\t\t<div class=\"image-info-caption\">" . $caption . "</div>\n";
						}
						print "\t\t\t</div>\n";
					}
				}
				print "\t\t</li>\n";
			}
		?>
	</ul>
	<script type="text/javascript">
		if ( 'undefined' != typeof window.jQuery ) {
			jQuery( function () {
				var slideshow = jQuery("#foogallery-gallery-<?php echo $current_foogallery->ID; ?> ul");
				if (slideshow.slick) {
					slideshow.slick(<?php echo $slickopts; ?>);
				}
			} );
		}
	</script>
</div>
