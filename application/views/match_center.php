<?php include 'header.php' ?>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12 box box-default">
            <div class="col-md-6">
                <h3><?= $details->find('scorecard',0)->find('match',0)->find('series',0)->xmltext ?></h3>
                <h4><?= $details->find('scorecard',0)->find('match',0)->find('gamedesc',0)->xmltext ?>,
                <?= $details->find('scorecard',0)->find('match',0)->find('home',0)->xmltext ?>
                vs
                <?= $details->find('scorecard',0)->find('match',0)->find('away',0)->xmltext ?>
                </h4>
                <h5><?= $details->find('scorecard',0)->find('match',0)->find('venue',0)->xmltext ?></h5>
                <?php if(count($details->find('scorecard',0)->find('match',0)->find('toss'))>0){ ?>
                <h5><?= $details->find('scorecard',0)->find('match',0)->find('toss',0)->find('winner',0)->xmltext.' won the toss and elected to '.$details->find('scorecard',0)->find('match',0)->find('toss',0)->find('decision',0)->xmltext.' first' ?></h5>
                <?php } ?>
            </div>
            <div class="col-md-6">
              
              <?php if(count($details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('Umpire1'))>0){ ?>
              <p><b>Umpires</b></p>
              <p><b>Umpire 1 : </b><?= $details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('Umpire1',0)->find('Name',0)->xmltext.'('.$details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('Umpire1',0)->find('Country',0)->xmltext.')' ?></p>
              <?php } ?>
               <?php if(count($details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('Umpire2'))>0){ ?>
              <p><b>Umpire 2 : </b><?= $details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('Umpire2',0)->find('Name',0)->xmltext.'('.$details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('Umpire2',0)->find('Country',0)->xmltext.')' ?></p>
               <?php } ?>
                <?php if(count($details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('ThirdUmpire'))>0){ ?>
              <p><b>Third Umpire : </b><?= $details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('ThirdUmpire',0)->find('Name',0)->xmltext.'('.$details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('ThirdUmpire',0)->find('Country',0)->xmltext.')' ?></p>
              <?php } ?>
              <?php if(count($details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('MatchReferee'))>0){ ?>
              <p><b>Match Referee : </b><?= $details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('MatchReferee',0)->find('Name',0)->xmltext.'('.$details->find('scorecard',0)->find('match',0)->find('umpires',0)->find('MatchReferee',0)->find('Country',0)->xmltext.')' ?></p>
              <?php } ?>
             </div>
            <div style="clear: both"></div>
          </div>
        
        <?php if(count($details->find('scorecard',0)->find('currentscores'))>0){ ?>
        <div class="col-md-12">
          <div class="box box-default">
            <div class="bg-navy color-palette">
              <h4>
                <?= $details->find('scorecard',0)->find('currentscores',0)->find('batteamname',0)->xmltext ?>
                &nbsp;&nbsp;
                <?= $details->find('scorecard',0)->find('currentscores',0)->find('batteamruns',0)->xmltext ?>
                /
                <?= $details->find('scorecard',0)->find('currentscores',0)->find('batteamwkts',0)->xmltext ?>
                (<b>Ov:</b> <?= $details->find('scorecard',0)->find('currentscores',0)->find('batteamovers',0)->xmltext ?>)
              </h4>
              <?php if(count($details->find('scorecard',0)->find('currentscores',0)->find('batsman'))>0){ ?>
              <table >
                <tr>
                  <th>Batsman</th>
                  <th>R</th>
                  <th>B</th>
                  <th>4(s)</th>
                  <th>6(s)</th>
                </tr>
                <tbody>
              <?php foreach($details->find('scorecard',0)->find('currentscores',0)->find('batsman') as $batsman){ ?>
              <tr>
              <td><?= $batsman->find('name',0)->xmltext ?></td>
              <td><?= $batsman->find('runs',0)->xmltext ?></td>
              <td><?= $batsman->find('balls-faced',0)->xmltext ?></td>
              <td><?= $batsman->find('fours',0)->xmltext ?> </td>
              <td><?= $batsman->find('sixes',0)->xmltext ?></td>
              </tr>
              <?php } ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
            
            <div class="bg-navy color-palette">
              <h4>
                <?= $details->find('scorecard',0)->find('currentscores',0)->find('bwlteamname',0)->xmltext ?>
              </h4>
              <?php if(count($details->find('scorecard',0)->find('currentscores',0)->find('batsman'))>0){ ?>
              <table >
                <tr>
                  <th>Bowler</th>
                  <th>O</th>
                  <th>M</th>
                  <th>R</th>
                  <th>W</th>
                </tr>
                <tbody>
              <?php foreach($details->find('scorecard',0)->find('currentscores',0)->find('bowler') as $bowler){ ?>
              <tr>
              <td><?= $bowler->find('name',0)->xmltext ?></td>
              <td><?= $bowler->find('overs',0)->xmltext ?></td>
              <td><?= $bowler->find('maidens',0)->xmltext ?></td>
              <td><?= $bowler->find('runs',0)->xmltext ?> </td>
              <td><?= $bowler->find('wickets',0)->xmltext ?></td>
              </tr>
              <?php } ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
            
            </div>
          
          </div>
        <?php } ?>
        </div>
     </div>
    </section>
    <!-- /.content -->
<?php include 'footer.php' ?>