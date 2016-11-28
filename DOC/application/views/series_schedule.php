
<div class="container">
	
	<div class="mainWrapper">
		 <div class="seriesDetailsContainer">
		 	 <span class="detailsContainerHeader">
		 	 	<?php echo stripslashes($series_details['s_name']); ?>
		 	 </span>
		 </div> 
		 
		 <div class="seriesScheduleDetails">
		 	<?php if(is_array($series_schedule) and count($series_schedule)>0){
		 		foreach ($series_schedule as $index=>$game){ ?>
		 			<div class="gameContainer">
		 				<div class="gameDetailsContainer">
		 					    <div class="gameTeamcontainer">
		                			<span class="team <?php echo strtoupper($game['first_team_name']); ?>"></span>
		                		</div>
		                		<div class="gameTeamcontainer">
		                			<p>vs</p>
		                		</div>
		                		<div class="gameTeamcontainer">
									<span class="team <?php echo strtoupper($game['last_team_name']); ?>"></span>
								</div>
		 				</div>
		 				<div class="gameDetailsContainer">
		 						<div class="gameActioncontainer">
		                			<p><strong><?php echo stripslashes($game['play_name']); ?></strong> 
		                				at 
		                				<?php echo stripslashes($game['play_ground']); ?>
		                			</p>
		                			<p><?php echo ($game['play_start_date']);
									   if($game['play_start_date']!= $game['play_end_date']){
									   	echo ' - '.$game['play_end_date'];
									   }
									 ?>
									 <?php echo " GMT: ".stripslashes($game['gmt_time']); ?>
									 </p>
									 
		                		</div>
		                		<div class="gameActioncontainer">
		                			<?php if($game['play_start_date'] <= date('Y-m-d')){ ?>
		                			<p align="right">
		                				<button class="btn btn-primary matchcenterBtn" data-attr="<?php echo $game['play_slug']; ?>">Match Center</button>
		                			</p>
		                			<?php } ?>
		                		</div>
		 				</div>
		 				<div class="allClear"></div>
		 			</div>
		 	<?php	}
		 	} ?>
		 </div>
	</div>
</div>