<?php include 'header.php' ?>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php if(count($details->find('.list-group'))>0){ ?>
          <ul class="nav nav-tabs responsive-tabs">
          <?php foreach($details->find('.list-group') as $index=>$l){  ?>
          
              <li class="col-md-4 col-xs-12 <?= (($index==0)?'active':'') ?>"><a data-toggle="tab" href="#<?= url_title($l->find('.cb-list-item',0)->innertext) ?>"><?= $l->find('.cb-list-item',0)->innertext ?></a></li>
          <?php } ?>
          </ul>
          <div class="tab-content">
            <?php foreach($details->find('.list-group') as $index=>$list){  ?>
            <div id="<?= url_title($list->find('.cb-list-item',0)->innertext) ?>" class="tab-pane fade <?= (($index==0)?' in active':'') ?>" >
             <div class="table-row">
              <div class="table-responsive">
                <table class="table table-condensed " cellspacing="0" cellpadding="0">
                <tbody>
                  <?php foreach($list->find('.table-row',0)->find('tr') as $tr){ ?>
                  <tr>
                    <?php foreach($tr->find('td')  as $td){ ?>
                      <td><?php if(count($td->find('b'))>0){
                          echo '<b>'.$td->plaintext.'</b>';
                        }
                        elseif(count($td->find('a'))>0){
                          echo "<a href='".NAV_URL."".str_replace('/cricket-stats/','',$td->find('a',0)->getAttribute('href'))."'>".$td->plaintext.'</a>';
                        }
                        else{
                          echo $td->plaintext;
                        }  ?></td>
                    <?php } ?>
                  </tr>
                  <?php } ?>
                </tbody>
                </table>
              </div>
             </div>
            </div>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
        
        </div>
     
    </section>
<!-- <script>$(function(){$('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
});})</script>   -->
    <!-- /.content -->
<?php include 'footer.php' ?>