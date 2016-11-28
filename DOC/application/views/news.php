<div id="container">
	
   <div class="mainWrapper">
   	<div class="newsWrapper">
   	<?php
   	 if(is_array($news_record) and count($news_record)>0){
   	 	foreach($news_record as $data){ ?>
   	 		<div class="newsDetails">
   	 			<h3><?php echo stripslashes($data['news_title']); ?></h3>
   	 			<p><?php  echo stripslashes($data['news_description']); ?></p>
   	 			
   	 		</div>
   	 <?php	}
   	 }
   	?>
   	</div>
   	</div>
	
</div>
