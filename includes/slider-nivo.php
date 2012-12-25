<script type="text/javascript"
	src="<?php echo get_template_directory_uri(); ?>/script/jquery.nivo.slider.pack.js"></script>
	<?php 
$interval=get_opt('_nivo_interval');
$animation=get_opt('_nivo_animation');
$slices=get_opt('_nivo_slices');
$columns=get_opt('_nivo_columns')?get_opt('_nivo_columns'):8;
$rows=get_opt('_nivo_rows')?get_opt('_nivo_rows'):4;

$speed=get_opt('_nivo_speed');
if(get_opt('_nivo_autoplay')=='true' || get_opt('_nivo_autoplay')=='on'){
	$autoplay='true';
}else{
	$autoplay='false';
}
if(get_opt('_nivo_pause_hover')=='true' || get_opt('_nivo_pause_hover')=='on'){
	$pauseOnHover='true';
}else{
	$pauseOnHover='false';		
}

$navigation=get_opt('_nivo_navigation');
switch ($navigation){
	case 'buttons': $buttons='true'; $arrows='false'; break;
	case 'arrows': $buttons='false'; $arrows='true'; break;
	case 'butarr': $buttons='true'; $arrows='true'; break;
	default : $buttons='false'; $arrows='false'; break;
}
?>
<script type="text/javascript">
jQuery(function(){
	pexetoSite.loadNivoSlider(jQuery('#nivo-slider'), "<?php echo $animation; ?>" , <?php echo $buttons; ?>, <?php echo $arrows; ?>, <?php echo $slices; ?>, <?php echo $speed; ?>, <?php echo $interval; ?>, <?php echo $pauseOnHover; ?>, <?php echo $autoplay; ?>, <?php echo $columns; ?>, <?php echo $rows; ?>);

});
</script>
<div id="layered-logo">
<?php 
	// home page
	if ( is_page(85) ) {
	  echo '<img src="http://pitterpatterpetsit.com/wp-content/uploads/2012/12/home-branding.png">';		
	}
	// Aboout page
	if ( is_page(86) )  {
	echo '<img src="http://pitterpatterpetsit.com/wp-content/uploads/2012/12/brandingAbout.png">';
	}
		// contact page
	if ( is_page(24) )  {
	echo '<img src="http://pitterpatterpetsit.com/wp-content/uploads/2012/12/brandingContact.png">';
	}
	// services
	if ( is_page(27) )  {
	echo '<img src="http://pitterpatterpetsit.com/wp-content/uploads/2012/12/brandingelse.png">';
	}
?>

<?php if ( is_category(10) ) {
echo '<?php the_excerpt(); ?>';
} else {
echo '<?php the_content(); ?>';
}
?>






<center>203.456.5186 | <a href="mailto:lisa@pitterpatterpetsit.com">lisa@pitterpatterpetsit.com</a></center>
</div>
<div id="slider-container">
<div id="slider-container-shadow"></div>

<div id="nivo-slider"> 
	  <?php 

$separator='|*|';

$sliderImagesString = get_option($slider_prefix.'_nivo_image_names');
$linkString=get_option($slider_prefix.'_nivo_image_links');
$descString=get_option($slider_prefix.'_nivo_image_descs');
if($descString==''){
	$descString=get_option($slider_prefix.'_nivo_image_desc');
}

$sliderImagesArray=explode($separator, $sliderImagesString);
$linkArray= explode($separator,$linkString);
$descArray= explode($separator,$descString);

$count=count($sliderImagesArray);
$linkCount=count($linkArray);

for($i=0;$i<$count-1;$i++){

	if($i<$linkCount && $linkArray[$i]!=''){
		echo('<a href="'.$linkArray[$i].'">');
	}
	echo('<img src="');
	if(get_opt('_nivo_auto_resize')=='true'||get_opt('_nivo_auto_resize')=='on'){
		$path=pexeto_get_resized_image($sliderImagesArray[$i], 980, 370);
	}else{
		$path=$sliderImagesArray[$i];
	}
	echo($path);
	echo('" alt=""');
	if($descArray[$i]!=''){
		echo(' title="'.stripslashes($descArray[$i]).'"');
	}
	echo('/>');
	if($i<$linkCount && $linkArray[$i]!=''){
		echo('</a>');
	}
}
?>
	
</div>
<?php if($buttons=='true'){ ?>
<div id="nivo-controlNav-holder"></div>
<?php } ?>

</div>

