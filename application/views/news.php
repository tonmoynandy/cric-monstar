<?php include 'header.php' ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Current News
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12" ><?php $i=1; ?>
          <?php foreach($lists as $index=> $item){ ?>
            <div class="col-md-6 col-xs-12">
                  <div class="box <?= (($i%2 == 0)? 'box-success':'box-warning') ?> box-solid collapsed-box">
                        <div class="box-header with-border">
                        
                         <div class="box-title">
                           <h3 ><?= $item->title ?></h3>
                             <span><?= date('d M, Y h:i A', strtotime(str_replace('T',' ',substr($item->pubDate,0,19)))) ?></span>
                           </div>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                          </button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                        <div class="box-body table-responsive " >
                              <?php if($item->thumburl !=''){ $urlArr = explode('http://',$item->thumburl); ?>
                              <img src="<?= 'http://'.$urlArr[1] ?>" alt="news Photo" style="width: 100%" />
                               <?php } ?>
                              <p><?= $item->description ?></p>
                        </div>
               </div>
             </div>
        <?php if($i%2 == 0){  ?>
        <div style="clear:both"></div>
        <?php }$i++; ?>
        <?php } ?>
        </div>
     </div>
    </section>
    
    <!-- /.content -->
<?php include 'footer.php' ?>