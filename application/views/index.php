<?php include 'header.php' ?>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Live Games
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <?php
        foreach($games->find('mchdata',0)->find('match') as $match){ ?>
          <!-- echo $match->attr['srs'].'<br/>';-->
           <div class="callout callout-info">
                <h4><?= $match->attr['srs'] ?></h4>
                <h5><?= $match->attr['mchdesc'] ?></h5>
            <p><?= $match->attr['mnum'].(array_key_exists('vcity',$match->attr)? ', '.$match->attr['vcity']:'') ?></p>
          </div>
        <?php }
        ?>
        </div>
     </div>
    </section>
    <!-- /.content -->
<?php include 'footer.php' ?>