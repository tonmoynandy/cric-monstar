<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title><?php echo $title; ?></title>
  <meta name="description" content="" />
  <meta name="author" content="Developer PC" />

  <meta name="viewport" content="width=device-width; initial-scale=1.0" />
  
<link rel="stylesheet" type="text/css" href="<?php echo FRONTEND_CSS_PATH; ?>style.css" media="all" />
<script type="text/javascript" src="<?php echo FRONTEND_JS_PATH; ?>jquery-1.9.1.js"></script>
<script>
	$(function(){
		setTimeout(function(){
			location.reload();
		},45000);
	});

	$(function(){


		$(".customTabContent .subTabContent").addClass('inactive');
		$(".customTab .tab-link").click(function(){
		  var index =$(".customTab .tab-link").index($(this));
		  $(".customTabContent .subTabContent").addClass('inactive');
		  $(".customTabContent .subTabContent").removeClass('active');
		  $(".customTabContent .subTabContent:eq("+index+")").addClass('active');
		  $(".customTabContent .subTabContent:eq("+index+")").removeClass('inactive');
		});
		$(".customTab .tab-link:eq(0)").trigger('click');
/* Mobile */
		$('#mainMenuWrap').prepend('<div id="menu-trigger">Menu</div>');		
		$("#menu-trigger").on("click", function(){
			$("#menu").slideToggle();
		});

		// iPad
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) $('#menu ul').addClass('no-transition');    		
	});

</script>
</head>

<body>
  <div class="mainWrapper">
    <header class="mainHeader">
      <div class="mainNav">
      	<div class="mainLogo">
      		Cric Star
      	</div>
      	<div class="mainMenuWrap">
      	<ul class="mainNavUl">
      		<li class="mainNavLi"><a href="#">Home</a></li>
      		<li class="mainNavLi"><a href="#">Current Series</a>
      			<ul class="subnavUl slider">
      				<li><a href="#">ICC Cricket Worlcup 2015</a></li>
      				<li><a href="#">IND VS AUS 2015</a></li>
      			</ul>
      		</li>
      		<li class="mainNavLi"><a href="#">Upcoming Series</a>
      			<ul class="subnavUl">
      				<li><a href="#">ICC Cricket Worlcup 2015</a></li>
      				<li><a href="#">IND VS AUS 2015</a></li>
      				<li><a href="#">ICC Cricket Worlcup 2015</a></li>
      				<li><a href="#">IND VS AUS 2015</a></li>
      				<li><a href="#">ICC Cricket Worlcup 2015</a></li>
      				<li><a href="#">IND VS AUS 2015</a></li>
      			</ul>
      		</li>
      		<li class="mainNavLi"><a href="#">News</a></li>
      	</ul>
      	</div>
      </div>
    </header>
    

    <div class="bodyWrapper">
       <div class="matchHeader">
       	<div class="seriesDetailsContainer">
		 	 <span class="detailsContainerHeader">
		 	 	<?php echo ($game_details['s_name']); ?>
		 	 </span>
		 	 <br/>
		 	 
		 </div>
       	<div class="matchHeaderContainer">
       		<?php $arr_score = array();
			  foreach($html->find('innings') as $ins){
			  	$index = $ins->find('batteam',0)->attr['name'];
			  	$arr_score[ $index ]['totalruns']=$ins->find('totalruns',0)->xmltext;
				$arr_score[ $index ]['totalwickets']=$ins->find('totalwickets',0)->xmltext;
				$arr_score[ $index ]['totalovers']=$ins->find('totalovers',0)->xmltext;
			  }
			  
			 ?>
       	 <div class="gameDetails">
       	 	<div class="subteam teamLogo">
						<span class="team <?php echo strtoupper($html->find('match',0)->find('homeabbr',0)->xmltext); ?>"></span>
						<span class="teamFullName">
							<?php $team_name =$html->find('match',0)->find('home',0)->xmltext;  echo strtoupper($team_name); ?>
						</span>
						<div class="scoreBody">
							<span class="runBody">
							<?php  echo (array_key_exists($team_name, $arr_score))? $arr_score[$team_name]['totalruns'].'/'.$arr_score[$team_name]['totalwickets']:''; ?>
							</span>
							<span class="overBody"><strong>Overs:</strong> <?php echo (array_key_exists($team_name, $arr_score))? $arr_score[$team_name]['totalovers']:''; ?></span>
						</div>
					</div>
				
       	 </div>
		 <div class="gameDetails">
		 	<p><?php echo ($html->find('match',0)->find('gamedesc',0)->xmltext).' at '.($html->find('match',0)->find('venue',0)->xmltext); ?></p>
		 		<?php if($html->find('match',0)->find('status',0)->xmltext!=''){
		 			 echo '<p class="status">'.$html->find('match',0)->find('status',0)->xmltext.'</p>';  
				}  ?>
		 	  <p class="vs">V</p>
		 </div>
		 <div class="gameDetails">
		 	<div class="subteam teamLogo">
						<span class="team <?php echo strtoupper($html->find('match',0)->find('awayabbr',0)->xmltext); ?>"></span>
						<span class="teamFullName">
							<?php $team_name=$html->find('match',0)->find('away',0)->xmltext; echo strtoupper($team_name); ?>
						</span>
						<div class="scoreBody">
							<span class="runBody">
							<?php echo (array_key_exists($team_name, $arr_score))? $arr_score[$team_name]['totalruns'].'/'.$arr_score[$team_name]['totalwickets']:''; ?>
							</span>
							<span  class="overBody"><strong>Overs:</strong> <?php echo (array_key_exists($team_name, $arr_score))? $arr_score[$team_name]['totalovers']:''; ?></span>
						</div>
					</div>
       	 </div> 
		 </div>
       </div>
       
       <div class="matchNav">
       	  <ul class="customTab">
       	  	
       	  	<li class="tab-link"><a href="javascript:void(0)">OverView</a></li>
       	  	<li class="tab-link"><a href="javascript:void(0)">Score Board</a></li>
       	  	<!-- <li class="tab-link"><a href="javascript:void(0)">Team</a></li> -->
       	  	<li class="tab-link"><a href="javascript:void(0)">Match Info</a></li>
       	  </ul>
       </div>
       <div class="matchMainBody customTabContent">
       	  <div class="matchSubBody subTabContent" id="overView">
       	  	 <div class="overViewLeft">
       	  	 	<div class="currentBatScore">
       	  	 		<div class="scoreTeam">
       	  	 		<span class="team <?php echo (count($html->find('currentscores'))>0)? strtoupper($html->find('currentscores',0)->find('batteamname',0)->xmltext):''; ?>"></span>
       	  	 		<span class="score">
       	  	 			<?php echo (count($html->find('currentscores'))>0)? $html->find('currentscores',0)->find('batteamruns',0)->xmltext:''; ?>
       	  	 			/
       	  	 			<?php echo (count($html->find('currentscores'))>0)? $html->find('currentscores',0)->find('batteamwkts',0)->xmltext:''; ?>
       	  	 		</span>
       	  	 		</div>
       	  	 		<div class="currentBatBox">
       	  	 			<?php 
       	  	 			if(count($html->find('currentscores'))>0){
       	  	 			foreach($html->find('currentscores',0)->find('batsman') as $bat){ ?>
       	  	 				<div class="currentBat">
       	  	 					<p class="batName">
       	  	 						<?php echo $bat->find('name',0)->xmltext; ?>
       	  	 					</p>
       	  	 					<table>
       	  	 						<thead>
       	  	 						<tr>
       	  	 							<th>Run(s)</th>
       	  	 							<th>Ball(s)</th>
       	  	 							<th>Four(s)</th>
       	  	 							<th>Six(s)</th>
       	  	 						</tr>
       	  	 						</thead>
       	  	 						<tbody>
       	  	 						<tr>
       	  	 							<td><?php echo $bat->find('runs',0)->xmltext; ?></td>
       	  	 							<td><?php echo $bat->find('balls-faced',0)->xmltext; ?></td>
       	  	 							<td><?php echo $bat->find('fours',0)->xmltext; ?></td>
       	  	 							<td><?php echo $bat->find('sixes',0)->xmltext; ?></td>
       	  	 						</tr>
       	  	 						</tbody>
       	  	 					</table>
       	  	 				</div>
       	  	 			<?php } }  ?>
       	  	 			
       	  	 			<?php if(count($html->find('currentscores'))>0 and count($html->find('currentscores',0)->find('lastwicket'))>0){ $bat=$html->find('currentscores',0)->find('lastwicket',0); ?>
       	  	 			<div class="currentBat">
       	  	 					<p class="batName">
       	  	 						<?php echo $bat->find('name',0)->xmltext; ?>
       	  	 						(Last Wicket)
       	  	 					</p>
       	  	 					<table>
       	  	 						<thead>
       	  	 						<tr>
       	  	 							<th>Run(s)</th>
       	  	 							<th>Ball(s)</th>
       	  	 							<th>Team Score</th>
       	  	 						</tr>
       	  	 						</thead>
       	  	 						<tbody>
       	  	 						<tr>
       	  	 							<td><?php echo $bat->find('player-runs',0)->xmltext; ?></td>
       	  	 							<td><?php echo $bat->find('player-balls',0)->xmltext; ?></td>
       	  	 							<td><?php echo $bat->find('runs',0)->xmltext.'/'.
													   $bat->find('wicket-nbr',0)->xmltext; ?></td>
       	  	 						</tr>
       	  	 						</tbody>
       	  	 					</table>
       	  	 				</div>
       	  	 			<?php } ?>
       	  	 		</div>
       	  	 		
       	  	 	</div>
       	  	 	<div class="currentBallScore">
       	  	 		<div class="scoreTeam">
       	  	 		<span class="team <?php echo (count($html->find('currentscores'))>0)? strtoupper($html->find('currentscores',0)->find('bwlteamname',0)->xmltext):''; ?>"></span>
       	  	 		<span class="over">
       	  	 			
       	  	 			<?php echo (count($html->find('currentscores'))>0)? $html->find('currentscores',0)->find('batteamovers',0)->xmltext:''; ?>
       	  	 			<strong>Overs</strong>
       	  	 		</span>
       	  	 		</div>
       	  	 		<div class="currentBallBox">
       	  	 			<?php
       	  	 			if(count($html->find('currentscores'))>0){
       	  	 			 foreach($html->find('currentscores',0)->find('bowler') as $ball){ ?>
       	  	 				<div class="currentBall">
       	  	 					<p class="ballName">
       	  	 						<?php echo $ball->find('name',0)->xmltext; ?>
       	  	 					</p>
       	  	 					<table>
       	  	 						<thead>
       	  	 						<tr>
       	  	 							<th>Overs</th>
       	  	 							<th>Maidens</th>
       	  	 							<th>Runs</th>
       	  	 							<th>Wickets</th>
       	  	 						</tr>
       	  	 						</thead>
       	  	 						<tbody>
       	  	 						<tr>
       	  	 							<td><?php echo $ball->find('overs',0)->xmltext; ?></td>
       	  	 							<td><?php echo $ball->find('maidens',0)->xmltext; ?></td>
       	  	 							<td><?php echo $ball->find('runs',0)->xmltext; ?></td>
       	  	 							<td><?php echo $ball->find('wickets',0)->xmltext; ?></td>
       	  	 						</tr>
       	  	 						</tbody>
       	  	 					</table>
       	  	 				</div>
       	  	 			<?php } } ?>
       	  	 			<div class="currentBall">
       	  	 					<p class="ballName">
       	  	 						Extras
       	  	 					</p>
       	  	 					<table>
       	  	 						<thead>
       	  	 						<tr>
       	  	 							<th>By</th>
       	  	 							<th>WD</th>
       	  	 							<th>NB</th>
       	  	 							<th>LB</th>
       	  	 							<th>P</th>
       	  	 							<th>Total</th>	
       	  	 						</tr>
       	  	 						</thead>
       	  	 						<tbody>
       	  	 						<tr>
       	  	 							<?php if(count($html->find('extras'))>0){ ?>
       	  	 							<td><?php echo $html->find('extras',0)->find('byes',0)->xmltext; ?></td>
       	  	 							<td><?php echo $html->find('extras',0)->find('wides',0)->xmltext; ?></td>
       	  	 							<td><?php echo $html->find('extras',0)->find('noballs',0)->xmltext; ?></td>
       	  	 							<td><?php echo $html->find('extras',0)->find('legbyes',0)->xmltext; ?></td>
       	  	 							<td><?php echo $html->find('extras',0)->find('penalty',0)->xmltext; ?></td>
       	  	 							<td><?php echo $html->find('extras',0)->find('total',0)->xmltext; ?></td>
       	  	 							<?php } ?>
       	  	 						</tr>
       	  	 						</tbody>
       	  	 					</table>
       	  	 				</div>
       	  	 		</div>
       	  	 	</div>
       	  	 </div>
       	  	 <div class="overViewRight">
       	  	  <div class="overViewRightHeading">Commentry</div>
       	  	  <div class="commentryBox">
       	  	  	<?php if(count($html->find('commentary',0)->find('line'))>0){ foreach($html->find('commentary',0)->find('line') as $l){ ?>
       	  	  		<p class="comment"><?php echo $l->xmltext; ?></p>
       	  	  	<?php } } ?>
       	  	  </div>
       	  	 	
       	  	 </div>
       	  </div>
       	  <div class="matchSubBody subTabContent" id="scoreBoard">
       	  	<?php if(count($html->find('innings'))>0){ ?>
       	  		<?php foreach($html->find('innings') as $ins){ ?>
       	  		<div class="scoreMainBox">
       	  			  <div class="scoreHeading">
       	  			    <?php echo $ins->find('batteam',0)->attr['name']; ?> 	
       	  			  </div>
       	  			  <div>
       	  			  <div class="scoreBat res-table-container">
       	  			  	  <ul class="HeaderUl res-table-header">
       	  			  	  	<li class="res-th res-item">Name</li>
       	  			  	  	<li class="res-th res-item">Status</li>
       	  			  	  	<li class="res-th res-item">Run(s)</li>
       	  			  	  	<li class="res-th res-item">Ball(s)</li>
       	  			  	  	<li class="res-th res-item">Four(s)</li>
       	  			  	  	<li class="res-th res-item">Six(s)</li>
       	  			  	  </ul>
       	  			  	  <?php foreach($ins->find('players',0)->find('player') as $player){  ?>
       	  			  	  <ul class="bodyUl res-table-body">
       	  			  	  	<li class=" res-item">
       	  			  	  		<span class="res-heading">Name</span>
       	  			  	  		<span class="res-value"><?php echo $player->find('name',0)->xmltext; ?></span>
       	  			  	  	</li>
       	  			  	  	<li  class=" res-item">
       	  			  	  		<span class="res-heading">Status</span>
       	  			  	  		<span class="res-value ">
       	  			  	  			<?php
       	  			  	  			
       	  			  	  			if($player->find('status',0)->xmltext!='batting' and $player->find('status',0)->xmltext!='dnb'){
	       	  			  	  			if($player->find('status',0)->xmltext=='caught'){
	       	  			  	  				echo $player->find('status',0)->xmltext.' '; 
	       	  			  	  				echo ' by '.$player->find('fielder',0)->xmltext.' ';
											echo ' bowl  by '.$player->find('bowler',0)->xmltext;
										}
										else if($player->find('status',0)->xmltext=='run out'){
											echo $player->find('status',0)->xmltext.' '; 
	       	  			  	  				echo ' by '.$player->find('fielder',0)->xmltext.' ';
											
										}else{
											echo $player->find('status',0)->xmltext.' '; 
											echo '  by'.$player->find('bowler',0)->xmltext;
										}
									}else{
										echo $player->find('status',0)->xmltext.' '; 
									}
									 ?></span>
       	  			  	  	</li>
       	  			  	  	<li  class=" res-item">
       	  			  	  		<span class="res-heading">Run(s)</span>
       	  			  	  		<span class="res-value">
       	  			  	  			<?php echo $player->find('runs',0)->xmltext; ?>
       	  			  	  		</span>
       	  			  	  	</li>
       	  			  	  	<li  class=" res-item">
       	  			  	  		<span class="res-heading">Ball(s)</span>
       	  			  	  		<span class="res-value">
       	  			  	  			<?php echo $player->find('balls',0)->xmltext; ?>
       	  			  	  		</span>
       	  			  	  	</li>
       	  			  	  	<li  class=" res-item">
       	  			  	  		<span class="res-heading">Fours(s)</span>
       	  			  	  		<span class="res-value">
       	  			  	  			<?php echo $player->find('fours',0)->xmltext; ?>
       	  			  	  		</span>
       	  			  	  	</li>
       	  			  	  	<li  class=" res-item">
       	  			  	  		<span class="res-heading">Six(s)</span>
       	  			  	  		<span class="res-value">
       	  			  	  			<?php echo $player->find('sixes',0)->xmltext; ?>
       	  			  	  		</span>
       	  			  	  	</li>
       	  			  	  </ul>
       	  			  	  <?php } ?>
       	  			  
       	  			  
       	  			  </div>
       	  			  </div>
       	  			  <div class="team-bolwer">
       	  			  	<div class="score-heading">Bolwers</div>
       	  			  	<div class="scoreBat res-table-container">
       	  			  	  <ul class="HeaderUl res-table-header">
       	  			  	  	<li class="res-th res-item">Name</li>
       	  			  	  	<li class="res-th res-item">Overs</li>
       	  			  	  	<li class="res-th res-item">Runs</li>
       	  			  	  	<li class="res-th res-item">Maidens</li>
       	  			  	  	<li class="res-th res-item">Wickets</li>
       	  			  	  	<li class="res-th res-item">WD</li>
       	  			  	  	<li class="res-th res-item">NB</li>
       	  			  	  </ul>
       	  			  	  <?php foreach($ins->find('bowlteam',0)->find('players',0)->find('player') as $player){  ?>
       	  			  	    <ul class="bodyUl res-table-body">
       	  			  	    	<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Name</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('name',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Overs</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('overs',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Runs</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('runsoff',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Maidens</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('maidens',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Wickets</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('wickets',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">WD</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('wides',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">NB</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('noballs',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  	</ul>
       	  			  	  <?php } ?>
       	  			  </div>

       	  			  </div>
       	  			  <div class="fall-of-wick">
       	  			  	<div class="score-heading">Fall Of Wickets</div>
       	  			  	<div class="scoreBat res-table-container">
       	  			  	  <ul class="HeaderUl res-table-header">
       	  			  	  	<li class="res-th res-item">Batsman</li>
       	  			  	  	<li class="res-th res-item">Score</li>
       	  			  	  	<li class="res-th res-item">Overs</li>
       	  			  	  </ul>
       	  			  	  <?php foreach($ins->find('fallofwickets',0)->find('wicket') as $player){  ?>
       	  			  	    <ul class="bodyUl res-table-body">
       	  			  	    	<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Batsman</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('batsman',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Score</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('runs',0)->xmltext.'/'.$player->find('nbr',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  		<li  class=" res-item">
	       	  			  	    	<span class="res-heading">Overs</span>
	       	  			  	  		<span class="res-value">
	       	  			  	  			<?php echo $player->find('overs',0)->xmltext; ?>
	       	  			  	  		</span>
       	  			  	  		</li>
       	  			  	  	</ul>
       	  			  	  <?php } ?>
       	  			  </div>
       	  			  
       	  			  
       	  		</div>
       	  		<div style="clear: both"></div>
       	  	<?php }}  ?>
       	  	
       	  </div>
       	  <div class="matchSubBody subTabContent" id="teamBoard"></div>
       	  <div class="matchSubBody subTabContent" id="matchInfo">
       	  	<div class="toss"> 
       	  			<span class="subBodyHeading">Toss</span>
		 		<strong><?php echo ($html->find('match',0)->find('toss',0)->find('winner',0)->xmltext)
		 		.'</strong> won the toss and elected <strong>'.
		 		($html->find('match',0)->find('toss',0)->find('decision',0)->xmltext);?></strong>
		 	</div>
       	  	<div class="umpBox">
       	  		<span class="subBodyHeading">Umpires</span>
       	  		<p>
       	  			<?php  $u1=$html->find('umpires',0)->find('umpire1',0); ?>
       	  			<strong>Umpire 1 : </strong>
       	  			<?php echo $u1->find('name',0)->xmltext.', '.$u1->find('country',0)->xmltext;  ?>
       	  		</p>
       	  		<p>
       	  			<?php  $u2=$html->find('umpires',0)->find('umpire2',0); ?>
       	  			<strong>Umpire 2 : </strong>
       	  			<?php echo $u2->find('name',0)->xmltext.', '.$u1->find('country',0)->xmltext;  ?>
       	  		</p>
       	  		<p>
       	  			<?php  $u3=$html->find('umpires',0)->find('thirdumpire',0); ?>
       	  			<strong>Umpire 3 : </strong>
       	  			<?php echo $u3->find('name',0)->xmltext.', '.$u3->find('country',0)->xmltext;  ?>
       	  		</p>
       	  		<p>
       	  			<?php  $mr=$html->find('umpires',0)->find('matchreferee',0); ?>
       	  			<strong>Match Referee : </strong>
       	  			<?php echo $mr->find('name',0)->xmltext.', '.$mr->find('country',0)->xmltext;  ?>
       	  		</p>
       	  	</div>
       	  </div>
       	  
       </div>
       
    </div>

    <footer>
     <p>&copy; Copyright  by Developer PC</p>
    </footer>
  </div>
</body>
</html>
