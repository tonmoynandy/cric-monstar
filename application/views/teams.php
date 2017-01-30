<?php include 'header.php' ?>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Teams
      </h1>
      
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row"><?php $i=0; ?>
        <div class="col-md-12" ><table class="table" style="background: #FFF;"><tr>
          <?php foreach($lists->Team as $index=> $item){ ?>
          <?php if($i%3 == 0){ echo "</tr><tr>"; } ?>
            <td>
                <a href="<?= NAV_URL ?>team/<?= $item->TeamId ?>/<?= $item->ShortName ?>" style="text-align:center;font-weight:bold;display:block;">
                    <?php if($item->TeamLogoPath !=''){  ?>
                    <img src="<?= $item->TeamLogoPath ?>" alt="Team  Photo" style="width: 76px;height: 76px;" />
                     <?php } ?>
                    <p><?= $item->TeamName ?></p>
                </a>   
            </td>
        <?php $i +=1; ?>
        <?php } ?>
        </tr>
        </table>
        </div>
     </div>
    </section>
    
    <!-- /.content -->
<?php include 'footer.php' ?>