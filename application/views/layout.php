<!DOCTYPE html>
<html lang="en">
<head>
<?=isset($content_for_layout_seo)?$content_for_layout_seo:'';?> 
<script>var base_url ="<?php echo FRONTEND_URL; ?>"</script>
<link rel="stylesheet" type="text/css" href="<?php echo FRONTEND_CSS_PATH; ?>bootstrap.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo FRONTEND_CSS_PATH; ?>custom.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo FRONTEND_CSS_PATH; ?>easy-responsive-tabs.css" media="all" />
<script type="text/javascript" src="<?php echo FRONTEND_JS_PATH; ?>jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo FRONTEND_JS_PATH; ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo FRONTEND_JS_PATH; ?>jssor.slider.mini.js"></script>
<script type="text/javascript" src="<?php echo FRONTEND_JS_PATH; ?>easyResponsiveTabs.js"></script>
<script type="text/javascript" src="<?php echo FRONTEND_JS_PATH; ?>custom.js"></script>

<script>
            </script>
     <style>
        /* use navbar-wrapper to wrap navigation bar, the purpose is to overlay navigation bar above slider */
      
    </style>
</head>
<body>
<section class="page">
  <!--START : top navigation is loaded here-->
	<?=isset($content_for_layout_header)?$content_for_layout_header:'';?>             			
  <!--END : top navigation here-->
  <section class="main">
		  	<?=isset($content_for_layout_middle)?$content_for_layout_middle:'';?> 
  </section>

</section>


</body>
</html>