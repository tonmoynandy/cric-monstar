<?php include 'header.php' ?>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="col-md-6">
                <h3><?= $details->match->series ?></h3>
                <h4><?= $details->match->gameDesc ?>,
                <?= $details->match->home ?>
                vs
                <?= $details->match->away ?>
                </h4>
                <h5><?= $details->match->venue ?></h5>
                <?php if(property_exists($details->match,'toss')){ ?>
                <h5><?= $details->match->toss->winner.' won the toss and elected to '.$details->match->toss->decision.' first' ?></h5>
                <?php } ?>
            </div>
            <div class="col-md-6">
              
              <?php if(property_exists($details->match,'umpires') and property_exists($details->match->umpires,'Umpire1')){  ?>
              <p><b>Umpires</b></p>
              <p><b>Umpire 1 : </b><?= $details->match->umpires->Umpire1->Name.'('.$details->match->umpires->Umpire1->Country.')' ?></p>
              <?php } ?>
               <?php if(property_exists($details->match,'umpires') and property_exists($details->match->umpires,'Umpire2')){  ?>
              <p><b>Umpire 2 : </b><?= $details->match->umpires->Umpire2->Name.'('.$details->match->umpires->Umpire2->Country.')' ?></p>
              <?php } ?>
              
              <?php if(property_exists($details->match,'umpires') and property_exists($details->match->umpires,'ThirdUmpire')){  ?>
              <p><b>Third Umpire : </b><?= $details->match->umpires->ThirdUmpire->Name.'('.$details->match->umpires->ThirdUmpire->Country.')' ?></p>
              <?php } ?>
              
              <?php if(property_exists($details->match,'umpires') and property_exists($details->match->umpires,'MatchReferee')){  ?>
              <p><b>Match Referee : </b><?= $details->match->umpires->MatchReferee->Name.'('.$details->match->umpires->MatchReferee->Country.')' ?></p>
              <?php } ?>
              
             </div>
            <div style="clear: both"></div>
          </div>
        
       
       <ul class="nav nav-tabs responsive-tabs">
        <li class="col-md-6 col-xs-12 active"><a data-toggle="tab" href="#summery">Summery</a></li>
        <li class="col-md-6 col-xs-12 "><a data-toggle="tab" href="#scoreboard">Scoreboard</a></li>
      </ul>
       
       <div class="tab-content">
        
       <div id="summery" class="tab-pane fade in active">
        <?php  if(property_exists($details,'currentscores') ){ ?>
        
          <div class=" box box-default">
            <div class="col-md-6 col-xs-12 bg-navy color-palette">
              <h4>
                <?= $details->currentscores->batteamname ?>
                &nbsp;&nbsp;
                <?= $details->currentscores->batteamruns  ?>
                /
                <?= $details->currentscores->batteamwkts   ?>
                (<b>Ov:</b> <?= $details->currentscores->batteamovers    ?>)
              </h4>
              <?php if(property_exists($details->currentscores,'batsman') ){   ?>
              <table class="table" >
                <thead>
                <tr>
                  <th>Batsman</th>
                  <th>R</th>
                  <th>B</th>
                  <th>4(s)</th>
                  <th>6(s)</th>
                </tr>
                </thead>
                <tbody>
              <?php foreach($details->currentscores->batsman as $batsman){$bat = (array)$batsman; ?>
              <tr>
              <td><?= $bat['name'] ?></td>
              <td><?= $bat['runs'] ?></td>
              <td><?= $bat['balls-faced'] ?></td>
              <td><?= $bat['fours'] ?> </td>
              <td><?= $bat['sixes'] ?></td>
              </tr>
              <?php } ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
            
            <div class="col-md-6 col-xs-12 bg-navy color-palette">
              <h4>
                 <?= $details->currentscores->bwlteamname ?>
              </h4>
              <?php if(property_exists($details->currentscores,'bowler') ){   ?>
              <table class="table">
                <thead>
                <tr>
                  <th>Bowler</th>
                  <th>O</th>
                  <th>M</th>
                  <th>R</th>
                  <th>W</th>
                </tr>
                </thead>
                <tbody>
              <?php foreach($details->currentscores->bowler as $bowler){ ?>
              <tr>
              <td><?= $bowler->name ?></td>
              <td><?= $bowler->overs ?></td>
              <td><?= $bowler->maidens ?></td>
              <td><?= $bowler->runs ?> </td>
              <td><?= $bowler->wickets ?></td>
              </tr>
              <?php } ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
            
            
          
          </div>
          <div style="clear: both"></div>
        <?php } ?>
         <?php if(property_exists($details,'commentary') ){   ?>
        <div class="col-md-12 box box-default">
          <div style="height:300px;overflow-y: scroll">
          <table class="table table-striped">
            <tbody>
          <?php foreach($details->commentary->line as $line){ ?>
          <tr>
            <td>
              <?= $line ?>
            </td>
            </tr>
          <?php } ?>
          </tbody>
          </table>
          </div>
        </div>
        <?php } ?>
        </div>
       
       
              <div id="scoreboard" class="tab-pane fade">
                <?php if( property_exists($details,'innings') ){   ?>
                <ul class="nav nav-tabs responsive-tabs">
                  <?php foreach($details->innings  as $ins) { ?>
                  <li class="col-md-3 col-xs-12 <?= (($ins[0]['no'] ==1)?'active':'') ?>"><a data-toggle="tab" href="#ins<?= $ins[0]['no'] ?>"><?= $ins->batteam[0]['name'] ?>&nbsp; (<?= $ins->totalruns ?> / <?= $ins->totalwickets?>)</a></li>
                  <?php } ?>
                </ul>
                <div class="tab-content">
                <?php foreach($details->innings  as $ins) { ?>
                <div id="ins<?= $ins[0]['no'] ?>" class="tab-pane fade <?= (($ins[0]['no'] ==1)?'in active':'') ?>">
                
                <?php if(property_exists($ins,'batteam') and property_exists($ins->batteam,'players') ){   ?>
                <div id="no-more-tables">
                    <table class="table table-bordered table-striped table-condensed cf">
                		<thead class="cf">
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Runs</th>
                      <th>Balls</th>
                      <th>Fours</th>
                      <th>Sixes</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($ins->batteam->players->player as $player){ ?>
                  <tr>
                      <td data-title="Name"><?= $player->name.( ($player->captain == 'yes')?'(c)':'').( ($player->keeper == 'yes')?'(k)':'') ?></td>
                      <td data-title="">
                      <?php if($player->status !='batting'){ ?>
                      <?= $player->status.' '.(($player->fielder !='')?$player->fielder:'' ).(($player->status !='bowled')? 'b ':'' ).$player->bowler ?>
                      <?php }else{ echo "not out"; } ?>
                      </td>
                      <td data-title="Runs"><?= $player->runs ?></td>
                      <td data-title="Balls"><?= $player->balls ?></td>
                      <td data-title="Fours"><?= $player->fours ?></td>
                      <td data-title="Sixes"><?= $player->sixes ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  </table>
                </div>
                <?php } ?>
                
                <div class="bg-navy-active color-palette col-xs-12"><h4>Extras</h4></div><br/><br>
                  <div id="no-more-tables">
                    <table class="table  table-bordered table-striped table-condensed cf">
                		<thead class="cf">
                    <tr>
                      <th>Byes</th>
                      <th>Wides</th>
                      <th>Noballs</th>
                      <th>Legbyes</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-title="Byes"><?= $ins->extras->byes ?></td>
                      <td data-title="Wides"><?= $ins->extras->wides ?></td>
                      <td data-title="Noballs"><?= $ins->extras->noballs ?></td>
                      <td data-title="Legbyes"><?= $ins->extras->legbyes ?></td>
                      <td data-title="Total"><?= $ins->extras->total ?></td>
                      </tr>
                  </tbody>
                  </table>
                    </div>
                
                
                <?php if(property_exists($ins,'bowlteam') and property_exists($ins->bowlteam,'players') ){   ?>
                <div class="bg-navy-active color-palette col-xs-12"><h4>Bowling</h4></div><br><br>
                <div id="no-more-tables">
                    <table class="table  table-bordered table-striped table-condensed cf">
                		<thead class="cf">
                    <tr>
                      <th></th>
                      <th>Overs</th>
                      <th>Maidens</th>
                      <th>Runs</th>
                      <th>Wickets</th>
                      <th>NB</th>
                      <th>WB</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($ins->bowlteam->players->player as $player){ if($player->overs != 0){ ?>
                  <tr>
                      <td data-title="Name"><?= $player->name.( ($player->captain == 'yes')?'(c)':'').( ($player->keeper == 'yes')?'(k)':'') ?></td>
                      <td data-title="Overs"><?= $player->overs ?></td>
                      <td data-title="Maidens"><?= $player->maidens ?></td>
                      <td data-title="Runs"><?= $player->runsoff ?></td>
                      <td data-title="Wickets"><?= $player->wickets ?></td>
                      <td data-title="NB"><?= $player->noballs ?></td>
                      <td data-title="WB"><?= $player->wides ?></td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  </table></div>
                <?php } ?>
                
                <?php if(property_exists($ins,'fallofwickets') and property_exists($ins->fallofwickets,'wicket') ){   ?>
                <div class="bg-navy-active color-palette col-xs-12"><h4>Fall of Wickets</h4></div>
                <table class="table table-striped" >
                  
                  <tbody>
                  <?php foreach($ins->fallofwickets->wicket as $player){  ?>
                  <tr>
                      <td><?= $player->runs.'/'.$player->nbr ?></td>
                      <td><?= $player->batsman ?></td>
                      <td><?= $player->overs ?></td>
                  </tr>
                  <?php  } ?>
                  </tbody>
                  </table>
                <?php } ?>
                  
                  </div>
                <?php } ?>
                </div>
             <?php } ?>
       </div>

      
       
        </div>
        
        </div>
     </div>
    </section>
<!-- <script>$(function(){$('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
});})</script>   -->
    <!-- /.content -->
<?php include 'footer.php' ?>