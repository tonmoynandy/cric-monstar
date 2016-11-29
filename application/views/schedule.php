<?php include 'header.php' ?>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Schedule
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php foreach($schedule->find('schedule',0)->find('series') as $index=> $series){ ?>
       <div class="col-md-12">
          <div class="box <?= (($index%2 == 0)? 'box-success':'box-warning') ?> box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $series->find('title',0)->xmltext ?></h3>

              <div class="box-tools pull-right">
                <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="display: block;">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#Game</th>
                    <th>Vs</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Venue</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($series->find('match')  as $match){ ?>
                  <?php
                    
                    $start = $match->find('startdate',0)->xmltext;
                    $startArr = explode(' ',$start);
                    $start = $startArr[2].'-'.$startArr[0].'-'.$startArr[1];
                    $end = $match->find('enddate',0)->xmltext;
                    $endArr = explode(' ',$end);
                    $end = $endArr[2].'-'.$endArr[0].'-'.$endArr[1];
                    $current = date('Y-m-d');
                    ?>
                  <tr <?php if (($current > $start) && ($current < $end)){ ?> class="bg-gray color-palette" <?php } ?>>
                    <td><?= $match->find('desc',0)->xmltext ?></td>
                    <td><?php if(count($match->find('team1'))>0){ ?><?= $match->find('team1',0)->xmltext ?> vs <?= $match->find('team2',0)->xmltext ?><?php } ?></td>
                    
                    <td><?= date('l, jS M, Y',strtotime($start)) ?></td>
                    <td><?= date('l, jS M, Y',strtotime($end)) ?></td>
                    <td><?= $match->find('venue',0)->xmltext ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <?php } ?>
        </div>
     </div>
    </section>
    <!-- /.content -->
<?php include 'footer.php' ?>