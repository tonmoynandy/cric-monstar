<?php include 'header.php' ?>
<script src="<?= ASSETS ?>plugins/masonry.pkgd.min.js"></script>
<script>
      $(function(){
              $('.masonry').masonry({
       // options
       itemSelector: '.masonry-item--width2',
       columnWidth: 200
     });
        
        })
     </script>
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Current News
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="masonry" >
          <?php foreach($lists->channel->item as $index=> $item){ ?>
            <div class="masonry-item--width2">
               <img src="<?= $item->image ?>" width="100" />
               <h3><?= $item->title ?></h3>
               <p><?= $item->description ?></p>
             </div>
        
        <?php } ?>
        </div>
     </div>
    </section>
    
    <!-- /.content -->
<?php include 'footer.php' ?>