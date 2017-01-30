<?php include 'header.php' ?>

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <img src="<?=  $details->TeamLargeRoundFlagPath ?>" />
        <?= $details->TeamName ?>
      </h1>
      <br/><br/>
      <div class="row">
      <div class="col-md-12">
             <div class="box box-warning box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Description</h3>
      
                    <div class="box-tools pull-right">
                      <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding" style="display: block;">
                        <div class="col-md-12">
                              <?= $details->Description ?>
                        </div>
                  </div>
            </div>
      </div>
    
      </div>
      <div class="row">
      <div class="col-md-12">
             <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Ranking</h3>
      
                    <div class="box-tools pull-right">
                      <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding" style="display: block;">
                        <div class="col-md-12">
                              <table class="table table-striped">
                                    <?php $rank = $details->Ranking; ?>
                                    <tr>
                                          <?php foreach($rank  as $r){ ?>
                                          <th><?= $r->mtype ?></th>
                                          <?php } ?>
                                    </tr>
                                    <tr>
                                          
                                          <?php foreach($rank  as $r){ ?>
                                          <td><?= $r->content ?></td>
                                          <?php } ?>
                                    </tr>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
    
      </div>

      <div class="row">
      <div class="col-md-12">
             <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Captain & Coach</h3>
      
                    <div class="box-tools pull-right">
                      <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding" style="display: block;">
                       <?php $captain = $details->Captain; ?>
                                    
                                        
                                         <div class="col-md-12 text-center">
                                          <?php foreach($captain  as $c){ ?>
                                          <div class="col-md-3 col-xs-12 profile-image-container">
                                                <strong><?= $c->mtype ?></strong>
                                                <div class="profile-img" data-profile-id="<?= $c->personid  ?>"><img src="<?= FRONT_URL ?>img/loading2.gif" style="display:block;margin:0 auto;" /></div>
                                                <div class="player-name-box"><span><?= $c->FirstName.' '.$c->LastName ?></span></div>
                                          </div>
                                          <?php } ?>
                                          <div class="col-md-3 col-xs-12 profile-image-container">
                                                <strong>Coach</strong>
                                                <div class="profile-img" data-profile-id="<?= $details->Coach->personid  ?>"><img src="<?= FRONT_URL ?>img/loading2.gif" style="display:block;margin:0 auto;"  /></div>
                                                <div class="player-name-box"><span><?= $details->Coach->FirstName.' '.$details->Coach->LastName  ?></span></div>
                                          </div>
                                          <div style="clear:both"></div>
                                       </div>
                              
                  </div>
            </div>
      </div>
    
      </div>
      
            <div class="row">
      <div class="col-md-12">
             <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Players</h3>
      
                    <div class="box-tools pull-right">
                      <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding" style="display: block;">
                       <?php $players = $details->Players->Player; ?>
                                    
                                        
                                         <div class="col-md-12 text-center">
                                          <?php foreach($players  as $p){ ?>
                                          <div class="col-md-3 col-xs-12 profile-image-container">
                                                <div class="profile-img" data-profile-id="<?= $p->personid  ?>"><img src="<?= FRONT_URL ?>img/loading2.gif" style="display:block;margin:0 auto;" /></div>
                                                <div class="player-name-box"><span><?= $p->FirstName.' '.$p->LastName ?></span></div>
                                          </div>
                                          <?php } ?>
                                          
                                          <div style="clear:both"></div>
                                       </div>
                              
                  </div>
            </div>
      </div>
    
      </div>

     <div class="row">
      <div class="col-md-12">
             <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Statistics</h3>
      
                    <div class="box-tools pull-right">
                      <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding" style="display: block;">
                       <?php $statistics = $details->Tally;
                       $matches = [];
                       foreach($statistics  as $s){
                        $matches[$s->mtype][] = $s;
                        }
                       ?>
                       <?php foreach($matches as $mType=>$match){ ?>
                       <div class="box box-primary col-md-12">
                              <div class="box-header ui-sortable-handle" style="cursor: move;">
                                <i class="ion ion-clipboard"></i>
                  
                                <h3 class="box-title"><?= $mType ?></h3>
                  
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                    
                                          <?php foreach($match as $m){ ?>
                                          <div class="col-md-4 col-xs-12">
                                                
                                                <?php if($m->Name == 'all') { ?>
                                                <div class="small-box bg-red">
                                                      <div class="inner">
                                                <?php }else{ ?>
                                                <div class="box box-primary ">
                                                
                                                <div class="box-body">
                                                <?php } ?>
                                              <ul class="nav nav-stacked">
                                                <li><a >Team <span class="pull-right badge bg-blue"><?= $m->Name ?></span></a></li>
                                                <li><a >Played <span class="pull-right badge bg-aqua"><?= $m->Played ?></span></a></li>
                                                <li><a >Wins <span class="pull-right badge bg-green"><?= $m->Wins ?></span></a></li>
                                                <li><a >Losses <span class="pull-right badge bg-red"><?= $m->Losses ?></span></a></li>
                                                
                                                <li><a >Ties <span class="pull-right badge bg-blue"><?= $m->Ties ?></span></a></li>
                                                <li><a >No Results <span class="pull-right badge bg-aqua"><?= $m->NoResults ?></span></a></li>
                                                <li><a >Home Wins <span class="pull-right badge bg-green"><?= $m->HomeWins ?></span></a></li>
                                                <li><a >Away Wins <span class="pull-right badge bg-red"><?= $m->AwayWins ?></span></a></li>
                                              </ul>
                                                      
                                                </div>
                                                
                                              </div>
                                           </div>
                                          <?php } ?>
                                           
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer clearfix no-border">
                                
                              </div>
                            </div>
                       <?php } ?>
                              
                  </div>
            </div>
      </div>
    
      </div>


    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
     </div>
    </section>
<script>
      $(function(){
            var profile = {};
             $('.profile-img').each(function(){
                  var profileId = $(this).attr('data-profile-id');
                  profile[ profileId ] = profileId;
             });
             setTimeout(function(){
             $.each(profile,function(i,e){
                  profileId = e;
                  $.ajax({
                        url: '<?= NAV_URL.'welcome/player_images/' ?>'+profileId,
                        type:'POST',
                        dataType:'JSON',
                        async: false,
                        success:function(response){
                              $('.profile-img[data-profile-id='+profileId+'] img').attr('src',response.image);
                        }
                  })
             })
             },1000);     
      })
 </script>   
<!--  -->    <!-- /.content -->
<?php include 'footer.php' ?>