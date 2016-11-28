
<div id="container">
	
	<div style="min-height: 50px;">
        <!-- Jssor Slider Begin -->
        <!-- You can move inline styles to css file or css block. -->
        <!-- ================================================== -->
        <div id="slider1_container" style="">
            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <div style="position: absolute; display: block; background: url(<?php echo FRONTEND_IMAGE_PATH; ?>loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
            </div>
            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">
                 <?php if(is_array($liveGame) and count($liveGame)>0){?>
                 	<?php foreach($liveGame as $index=>$game){ ?>
                 		<div class="main_slider_container">
                		
                		<div class="main_slider_body">
                			<div class="slider_body_header">
                				<?php echo stripslashes($game['series_name']); ?>
                			</div>
                			<div>
		                		<div class="sub_slider_body">
		                			<span class="team <?php echo strtoupper($game['first_team_name']); ?>"></span>
		                		</div>
		                		<div class="sub_slider_body game_details">
		                			<p><?php echo stripslashes($game['play_name']); ?></p>
		                			<p><?php echo stripslashes($game['play_ground']); ?></p>
		                		</div>
		                		<div class="sub_slider_body">
									<span class="team <?php echo strtoupper($game['last_team_name']); ?>"></span>
								</div>
							</div>
							<div class="slider_footer">
								<p align="center">
	                				<button class="btn btn-primary matchcenterBtn" data-attr="<?php echo $game['play_slug']; ?>">Match Center</button>
	                			</p>
							</div>
						</div>
						
                	</div>	
                 	<?php } ?>
                 <?php } ?>
                	
                                   
            </div>

        </div>
        <!-- Jssor Slider End -->
    </div>
<div class="mainWrapper">
<div>
	<span class="team IND"></span>
	<span class="team SL"></span>
	<span class="team AUS"></span>
	<span class="team BAN"></span>
	<span class="team WI"></span>
	<span class="team ENG"></span>
	<span class="team RSA"></span>
	<span class="team IRE"></span>
	<span class="team NZ"></span>
	<span class="team CAN"></span>
	<span class="team OMAN"></span>
	<span class="team GCB"></span>
	<span class="team AFG"></span>
	
	<span class="team KEN"></span>
	<span class="team PAK"></span>
	<span class="team NOPIC"></span>
	<span class="team UAE"></span>
	<span class="team ZIM"></span>
	<span class="team NL"></span>
	<span class="team CANADA"></span>
	<span class="team SCO"></span>
</div>
	
	
	
<?php if($html) { ?>

<div id='cricket-score-container'>
			
				<?php foreach($html->find("match") as $match) { ?>
			<div class='match_content'>
			<div class='match_head'><?php echo $match->attr["srs"];?></div>
			<div class='match_head'><?php echo $match->attr["mchdesc"]."( ".$match->attr['mnum']." )";?></div>
			<div class='match_body'>
			<?php $batting= (isset($match->find("btTm",0)->attr['sname']))?$match->find("btTm",0)->attr['sname']:''; ?>
			<div class='cricket-score-score'>
			<?php if(isset($match->find("Inngs ",0)->attr["r"])){ ?>
				
			
						<div>
							<?php echo $match->find("Inngs ",0)->attr["r"]."/"; ?>
							<?php echo $match->find("Inngs ",0)->attr["wkts"]."<br>";?>
						</div>
			
				
			
				<div><?php echo "Overs: ".$match->find("Inngs ",0)->attr["ovrs"]; ?></div>
				<?php 	} ?>
			
				<div><?php echo $match->find("state ",0)->attr["status"]; ?></div>
			    </div>
			    <?php
			    $path = md5( $match->attr['id'].$match->attr['mchdesc'].$match->attr['mnum'] );
				
			    ?>
			    <div class="score-footer">
			    	<a href="<?php echo base_url().'summery/'.$path;  ?>">Match Center</a></div>
			    	<a href="<?php echo base_url().'scorecard/'.$path;  ?>">Full ScoreCard</a></div>
			    </div>
			    </div>
				<?php $match = "";
				} //foreach ?>
			</div>
			
			<?php }?>
	
</div>
</div>