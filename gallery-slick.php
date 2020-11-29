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

?>

<div id="foogallery-gallery-<?php echo $current_foogallery->ID; ?>" class="foogallery-gallery-slick">
<ul style="padding:0;margin:0;list-style:none">
<?php
	while (count($images)) {
		$image = array_shift($images);
		$startlink = '';
		$endlink   = '';
		if ($image->custom_url) {
			$startlink = sprintf("<a href=\"%s\">", htmlspecialchars($image->custom_url));
			$endlink   = '</a>';
		}
		print "\t<li style=\"padding:0;margin:0\">\n";
		printf("\t\t%s<img src=\"%s\" alt=\"%s\" title=\"%s\">%s\n", $startlink, htmlspecialchars($image->url), htmlspecialchars($image->alt), htmlspecialchars($image->title), $endlink);
		print "\t</li>\n";
	}
?>
</ul>
<script type="text/javascript">
  if ('undefined' != typeof window.jQuery) {
    jQuery(function () {
  		var slideshow = jQuery("#foogallery-gallery-<?php echo $current_foogallery->ID; ?> ul");
  		if (slideshow.slick) {
  			slideshow.slick(<?php echo $slickopts; ?>);
  		}
    });
  }
</script>
</div>
