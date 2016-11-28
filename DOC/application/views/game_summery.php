<div id="container">
	<?php if($html) {
	//$match = $html->find('match');$match=$match[0];
	
	//$match =$match->find('match',0); 
 ?>
   <div class="mainWrapper">
   	  <div class="matchHead">
   	  	  
   	  	   <div class="seriesDetailsContainer">
		 	 <span class="detailsContainerHeader">
		 	 	<?php echo ($html->attr['srs']); ?>
		 	 </span>
		 	 <br/>
		 	 
		 </div>
		 <div class="gameDetails">
		 	<p><?php echo ($html->attr['mnum']).' at '.($html->attr['grnd']); ?></p>
		 	<p class="toss"> 
		 		<strong><?php echo ($html->find('state',0)->attr['tw']).'</strong> won the toss and elected <strong>'.($html->find('state',0)->attr['decisn']);?></strong>
		 	</p>
		 	 
		 		<?php if($html->find('state',0)->attr['status']!=''){
		 			 echo '<p class="status">'.$html->find('state',0)->attr['status'].'</p>';  
				}  ?>
		 	<?php if(count($html->find('manofthematch'))>0){
		 			 echo '<p class="mom"><strong>Man of the match : </strong>'.$html->find('manofthematch',0)->find('mom',0)->attr['name'].'</p>';  
				}  ?>
		 	
		 	</div> 
		 <div class="allClear"></div>
   	  	  <div class="teamContent">
				<div class="teamDetails teamDetails1">
					<div class="subteam teamLogo">
						<span class="team <?php echo strtoupper($html->find('tm',0)->attr['name']); ?>"></span>
						<span class="teamFullName">
							<?php //echo $match->find('home',0)->xmltext; ?>
						</span>
					</div>
				
				</div>
				<div class="teamDetails teamDetails2">
					
					
					<div class="subteam teamLogo">
						<span class="team <?php echo strtoupper($html->find('tm',1)->attr['name']); ?>"></span>
						<span class="teamFullName">
							<?php //echo $match->find('away',0)->xmltext; ?>
						</span>
					</div>
				</div>
				<div class="allClear"></div>
   	  	  </div>
   	  	  
   	  	  
   	  	  <div class="gameAllDetails">
   	  	  	  <?php if(count($html->find('scrs'))>0){
   	  	  	  	$total_ins = $html->find('scrs',0)->attr['noofinngs'];
				 ?>
   	  	  	  	 <ul class="game-nav resp-tabs-list hor_1">
   	  	  	  	 	<li>Match Info</li>
   	  	  	  	 <?php
   	  	  	  	 for($x=$total_ins,$y=1; $x>=1; $x--,$y++){
   	  	  	  	 	 $element = $html->find('scrs',0)->find('Inngs', ($x-1) );   
					 	echo '<li>innings '
					 				.($y)
					 				.' ( '.
					 				$element->find('bttm',0)->attr['sname']
					 				.' ) '
					 				.'</li>';
   	  	  	  	 }?>
   	  	  	  	 </ul>
   	  	  	  	 <div class="resp-tabs-container game-nav-content hor_1">
   	  	  	  	 	<div id="matchInfo"  class="sub-game-nav-content">
   	  	  	  	 		<div class="">
						 	<p>
						 		<strong>Match :</strong>
						 		<?php echo $html->find('tm',0)->attr['name']; ?>
						 		vs 
						 		<?php echo $html->find('tm',1)->attr['name']; ?>
						 		<?php echo ($html->attr['mnum']).' at '.($html->attr['grnd']); ?>
						 		
						 	</p>
						 	<p>
						 		<strong>Date :</strong>
						 		<?php
						 		  echo $html->find('tme',0)->attr['dt'];
						 		 ?>
						 	</p>
						 	<p class="toss"> 
						 		<strong>Toss : </strong>
						 		<b><?php echo ($html->find('state',0)->attr['tw']).'</b> won the toss and elected <b>'.($html->find('state',0)->attr['decisn']);?></b>
						 	</p>
						 	 
						 		<?php if($html->find('state',0)->attr['status']!=''){
						 			 echo '<p class="status">'.$html->find('state',0)->attr['status'].'</p>';  
								}  ?>
						 	<?php if(count($html->find('manofthematch'))>0){
						 			 echo '<p class="mom"><strong>Man of the match : </strong>'.$html->find('manofthematch',0)->find('mom',0)->attr['name'].'</p>';  
								}  ?>
								<?php if(count($html->find('squads')) >0 ){ ?>
						 	<div class="squads">
						 		<?php foreach($html->find('squads',0)->find('team') as $team){ ?>
						 			<div class="teamDetails">
						 				<div class="teamNameDetails">
						 					<strong><?php echo $team->attr['name']; ?> squads</strong> 
						 				</div>
						 				<div>
						 					<?php $team_list = $team->attr['mem'];$team_list_arr=explode(",", $team_list) ?>
						 					<ul>
						 						<?php foreach($team_list_arr as $t){
						 							echo '<li>'.$t.'</li>';
						 						} ?>
						 					</ul>
						 				</div>
						 			</div>
						 		<?php } ?>
						 		<div class="allClear"></div>	
						 	</div>
						 	<?php } ?>
						 	
						 	</div>		
   	  	  	  	 	</div>
   	  	  	  	 	<?php for($x=$total_ins,$y=1; $x>=1; $x--,$y++){
   	  	  	  	 			 $element = $html->find('scrs',0)->find('Inngs', ($x-1) );   
					 ?>
   	  	  	  	 		<div id="ins<?php echo $y; ?>" class="sub-game-nav-content resp-vtabs">
   	  	  	  	 			<ul class="resp-tabs-list ver_1 sab-game-nav">
   	  	  	  	 				    <li>OverView</li>
   	  	  	  	 				    <li>ScoreBoard</li>
   	  	  	  	 				    
   	  	  	  	 			</ul>
   	  	  	  	 			<div class="resp-tabs-container ver_1 game-nav-content">
   	  	  	  	 				<div id="overview<?php echo $y ; ?>" class="">
   	  	  	  	 					<div class="scoreSummery">
   	  	  	  	 						<p><strong>Run :</strong><span><?php echo $element->attr['r']; ?></span></p>
	   	  	  	  	 					<p><strong>Wicket :</strong><span><?php echo $element->attr['wkts']; ?></span></p>
	   	  	  	  	 					<p><strong>Overs :</strong><span><?php echo $element->attr['ovrs']; ?></span></p>
	   	  	  	  	 					<p><strong>Run Rate:</strong><span><?php echo $element->find('bttm',0)->attr['rr']; ?></span></p>
	   	  	  	  	 					<?php if($element->find('bttm',0)->attr['rreq']!=''){ ?>
	   	  	  	  	 					<p><strong>Run Rate:</strong><span><?php echo $element->find('bttm',0)->attr['rreq']; ?></span></p>
	   	  	  	  	 					<?php } ?>
   	  	  	  	 					</div>
   	  	  	  	 				</div>
   	  	  	  	 				<div id="score<?php echo $y ; ?>" class="scoreBoard">
   	  	  	  	 					<div class="scoreSummery">
   	  	  	  	 						<p><strong>Run :</strong><span><?php echo $element->attr['r']; ?></span></p>
	   	  	  	  	 					<p><strong>Wicket :</strong><span><?php echo $element->attr['wkts']; ?></span></p>
	   	  	  	  	 					<p><strong>Overs :</strong><span><?php echo $element->attr['ovrs']; ?></span></p>
	   	  	  	  	 					<p><strong>Run Rate:</strong><span><?php echo $element->find('bttm',0)->attr['rr']; ?></span></p>
	   	  	  	  	 					<?php if($element->find('bttm',0)->attr['rreq']!=''){ ?>
	   	  	  	  	 					<p><strong>Run Rate:</strong><span><?php echo $element->find('bttm',0)->attr['rreq']; ?></span></p>
	   	  	  	  	 					<?php } ?>
   	  	  	  	 					</div>
   	  	  	  	 					<div class="scoreHeader btHeader">
   	  	  	  	 						Batting
   	  	  	  	 					</div>
   	  	  	  	 					<div class="btScore">
   	  	  	  	 						
			    		<?php if(count($element->find('btTm'))>0 and count($element->find('btTm',0)->find('plyr'))>0){ ?>
			    			<table cellpadding="0" cellspacing="0">
			    				<thead>
			    					<tr>
			    						<th></th>
			    						<th></th>
			    						<th>Score(B)</th>
			    						<th>4(s)</th>
			    						<th>6(s)</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    			<?php foreach($element->find('btTm',0)->find('plyr') as $pl){ ?>
			    				<tr <?php echo (trim($pl->find('status',0)->xmltext)=='not out')? 'class="notoutTr"':''; ?>>
			    					<td><?php echo $pl->attr['sname']; ?></td>
			    					<td><?php echo $pl->xmltext; ?></td>
			    					<td><?php echo $pl->attr['r'].'( '.$pl->attr['b'].' )'; ?></td>
			    					<td><?php echo $pl->attr['frs']; ?></td>
			    					<td><?php echo $pl->attr['six']; ?></td>
			    				</tr>
			    			<?php } ?>
			    			</tbody>
			    			</table>
			    		<?php } ?>
			    	</div>
			    	<div class="scoreHeader blHeader">
 						Bolwing
 					</div>
			    	<div class="blScore">
			    		<?php if(count($element->find('blTm'))>0 and count($element->find('blTm',0)->find('plyr'))>0){ ?>
			    			<table  cellpadding="0" cellspacing="0">
			    				<thead>
			    					<tr>
			    						<th></th>
			    						<th>Overs</th>
			    						<th>Madin</th>
			    						<th>Wickets</th>
			    						<th>Runs</th>
			    						<th>NB</th>
			    						<th>WB</th>
			    						<th>ER</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    			<?php foreach($element->find('blTm',0)->find('plyr') as $pl){ ?>
			    				<tr>
			    					<td><?php echo $pl->attr['sname']; ?></td>
			    					<td><?php echo $pl->attr['ovrs']; ?></td>
			    					<td><?php echo $pl->attr['mdns']; ?></td>
			    					<td><?php echo $pl->attr['wkts']; ?></td>
			    					<td><?php echo $pl->attr['roff']; ?></td>
			    					<td><?php echo $pl->attr['nb']; ?></td>
			    					<td><?php echo $pl->attr['wds']; ?></td>
			    					<td><?php echo $pl->attr['er']; ?></td>
			    				</tr>
			    			<?php } ?>
			    			</tbody>
			    			</table>
			    		<?php } ?>
			    	</div>
			    	<div class="scoreHeader btHeader">
 						Extra
 					</div>
 					<div class="extraScore">
 						<table>
 							<tr>
 						<?php foreach($element->find('xtras',0)->getAllAttributes() as $key=>$attr){ ?>
 								<th><?php echo $key; ?></th>
 						<?php } ?>
 							</tr>
 							<tr>
 						<?php foreach($element->find('xtras',0)->getAllAttributes() as $key=>$attr){ ?>
 								<td><?php echo $attr; ?></td>
 						<?php } ?>
 						</tr>
 						</table>
 					</div>
 					<div class="scoreHeader btHeader">
 						Fall Of Wickets
 					</div>
 					<div class="fowBoard">
 						<table>
 							<tr>
 								<th></th>
 								<th>Score</th>
 								<th>Over</th>
 							</tr>
 							<?php
 							if(count($element->find('fow'))>0 and count($element->find('fow',0)->find('wkt'))>0 ){
 							foreach($element->find('fow',0)->find('wkt') as $index=>$wkt ){ ?>
 								<tr>
 									<td><?php echo $wkt->attr['btsmn']; ?></td>
 									<td><?php echo $wkt->attr['r'].' / '.($index+1); ?></td>
 									<td><?php echo $wkt->attr['ovrs']; ?></td>
 								</tr>
 						  <?php	} } ?>
 						</table>
 					</div>
   	  	  	  	 				</div>
   	  	  	  	 				
   	  	  	  	 			
   	  	  	  	 			
   	  	  	  	 			</div>
   	  	  	  	 <p class="allClear"></p>
   	  	  	  	 		</div>
   	  	  	  	 <p class="allClear"></p>
   	  	  	  	 	<?php }?>
   	  	  	  	 	</div>
   	  	  	  	 <div class="allClear"></div>	
   	  	  	  <?php } ?>
   	  	  </div>
   	  </div>
   	  </div>
   	  <?php }?>
	
</div>
<script>
	$(function(){
		setTimeout(function(){
			//location.reload();
		},10000);
	});
</script>