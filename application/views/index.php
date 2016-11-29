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
           <div class="box box-solid">
            <div class="col-md-6">
                    <h4><?= $match->attr['srs'] ?></h4>
                    <h5><?= $match->attr['mchdesc'] ?></h5>
                    <h5><?= ((array_key_exists('grnd',$match->attr)) ? $match->attr['grnd']:'' ).(array_key_exists('vcity',$match->attr)? ', '.$match->attr['vcity']:'') ?></h5>
                    <h5><?= (array_key_exists('tw',$match->find('state',0)->attr)? $match->find('state',0)->attr['tw'].' won the toss and elected to '.$match->find('state',0)->attr['decisn'].' first':'') ?></h5>
                <p><?= $match->attr['mnum'] ?></p>
                <p><?= (array_key_exists('addnstatus',$match->find('state',0)->attr)? $match->find('state',0)->attr['addnstatus']: '')  ?></p>
                
            </div>
            <div class="col-md-6 ">
              <div class="bg-light-blue color-palette" style="margin: 0px 0 0 0;padding: 9px;">
              <div class="col-md-12"><h4><?= $match->find('state',0)->attr['status']  ?></h4></div>
              <?php if(count($match->find('manofthematch'))>0){ ?>
              <div class="col-md-12"><b>MOM : </b><?= $match->find('manofthematch',0)->find('mom',0)->attr['name'] ?></div>
              <?php } ?>
              <?php if(count($match->find('mscr'))>0){ ?>
              <?php $btTm = $match->find('mscr',0)->find('btTm',0) ?>
              <div class="col-md-6">
                <strong><?= $btTm->attr['sname']; ?></strong>
                <?php foreach($btTm->find('Inngs') as $b){ ?>
                <p>
                  <b><?= (($b->attr['desc']!='Inns')? $b->attr['desc'].':':'') ?>  </b>
                  <span class="ran">
                  <?= $b->attr['r'].'/'.$b->attr['wkts'].' (<b>Ov:</b>'.$b->attr['ovrs'].')' ?>
                  <?=  (($b->attr['decl']=='1')? ' (Dec)':'') ?>
                  </span>
                </p>
                <?php } ?>
              </div>
              
              <?php $blgTm = $match->find('mscr',0)->find('blgTm',0) ?>
              <div class="col-md-6">
                <strong><?= $blgTm->attr['sname']; ?></strong>
                <?php foreach($blgTm->find('Inngs') as $b){ ?>
                <p>
                  <b><?= (($b->attr['desc']!='Inns')? $b->attr['desc'].':' :'') ?>  </b>
                  <span class="ran">
                  <?= $b->attr['r'].'/'.$b->attr['wkts'].' (<b>Ov:</b>'.$b->attr['ovrs'].')' ?>
                  <?=  (($b->attr['decl']=='1')? ' (Dec)':'') ?>
                  </span>
                </p>
                <?php } ?>
              </div>
              <div style="clear:both"></div>
              <?php } ?>
              <div style="clear:both"></div>
              <p><a href="<?= NAV_URL ?>match-center<?= getGameUri($match->attr['datapath']) ?>" class="btn btn-block btn-info btn-sm">Match Center</a></p>
              
              </div>
              
            </div>
            <div style="clear:both"></div>
          </div>
        <?php } 
        ?>
        </div>
     </div>
    </section>
    <!-- /.content -->
<?php include 'footer.php' ?>