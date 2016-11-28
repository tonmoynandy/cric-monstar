<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
<style>

</style>

</head>
<body>

<div id="container">
<?php if($html) {
	$match = $html->find('scrCard',0); 
 ?>
   <div class="matchContent">
   	  <div class="matchHead">
   	  	  <div class="serContent"><?php echo $match->attr['srs'];  ?></div>
   	  	  
   	  	  <div class="teamContent">
<!--    	TEAMS LOGO  	  	 -->
   	  	  </div>
   	  	  <div class="gameName"><?php echo ($match->attr['type']=='T20')? $match->attr['type'].' - ':'';echo $match->attr['mnum']; ?></div>
   	  	  <div class="gameGrnd"><?php echo $match->attr['grnd']; ?></div>
   	  	  <div class="gameDate"><?php echo $match->find('Tme',0)->attr['dt'];
   	  	  	
   	  	  	echo ($match->attr['type']=='TEST')? ' -  '.$match->find('Tme',0)->attr['enddt']:'' ; ?></div>
   	  </div>
   	  <div class="matchDetails">
   	  	<div class="gameToss">Toss: <?php echo $match->find('state',0)->attr['tw'].' won and elected to '.$match->find('state',0)->attr['decisn']; ?></div>
   	  	<div class="gameStatus"><?php echo $match->find('state',0)->attr['addnstatus']; ?></div>
   	  	<?php if(array_key_exists('splstatus', $match->find('state',0)->attr) and $match->find('state',0)->attr['splstatus']==''){ ?>
   	  		<div class="gameSpacialStatus"><?php echo $match->find('state',0)->attr['splstatus']; ?></div>
   	  	<?php } ?>
   	  	<div class="gameStatus">
   	  		<?php echo $match->find('state',0)->attr['status'];?>
   	  	</div>
   	  	<?php if(count($match->find('manofthematch'))>0){ ?>
   	  	<div class="gameMOM">
   	  		<?php echo '<label>MOM: </label>'.$match->find('manofthematch',0)->find('mom',0)->attr['name'];?>
   	  	</div>
   	  	<?php } ?>
   	  </div>
   	  <?php if(count($match->find('scrs'))>0){ $total_ins = $match->find('scrs',0)->attr['noofinngs']; ?>
   	  	<div class="scoreCardContent">
   	  	<?php for($x=$total_ins; $x>=1; $x--){ $element = $match->find('scrs',0)->find('Inngs', ($x-1) );  ?>
   	  	  <div class="insDetails">
   	  	  		<div class="insHeading">
	   	  	  	  <?php 
	   	  	  	  		echo '<p>'.$element->attr['desc'].'</p>';
	   	  	  	  		echo '<p><label>'.$element->find('btTm',0)->attr['sname'].'</label>'  ;
				  		echo '&nbsp;&nbsp;&nbsp;';
				  		echo '<label>'.$element->attr['r'].'/'.$element->attr['wkts'];
				  		if($element->attr['decl']==1){
				  			echo ' <span class="insStatus"> Dec</span>';
				  		}
						if($element->attr['followon']==1){
				  			echo ' <span class="insStatus"> FollowOn</span>';
				  		}
				  		echo '</label>';
				  		echo '&nbsp;&nbsp;&nbsp;';
						echo '<label>'.$element->attr['ovrs'].'</label>';
						echo '</p>';
				   ?>
			    </div>
			    <div class="scoreDetails">
			    	<div class="btScore">
			    		<?php if(count($element->find('btTm'))>0 and count($element->find('btTm',0)->find('plyr'))>0){ ?>
			    			<table>
			    				<thead>
			    					<tr>
			    						<th>Name</th>
			    						<th>Status</th>
			    						<th>Score(B)</th>
			    						<th>4(s)</th>
			    						<th>6(s)</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    			<?php foreach($element->find('btTm',0)->find('plyr') as $pl){ ?>
			    				<tr>
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
			    	<div class="blScore">
			    		<?php if(count($element->find('blTm'))>0 and count($element->find('blTm',0)->find('plyr'))>0){ ?>
			    			<table>
			    				<thead>
			    					<tr>
			    						<th>Name</th>
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
			    </div>
   	  	  </div> 		
   	  	<?php	} ?>
   	  	</div>
   	    <?php } ?>   
   </div>			
<?php }?>
	
</div>

</body>
</html>