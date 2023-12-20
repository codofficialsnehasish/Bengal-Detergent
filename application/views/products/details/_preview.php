<script src="<?= base_url('assets/admin/libs/zoom/js/my-zoom.js');?>"></script>
<link href="<?= base_url('assets/admin/libs/zoom/css/my-zoom.css');?>" rel="stylesheet" type="text/css"/>

   <!-- Product Details Image -->
   <!-- <div class="col-md-6 col-xs-12">
      <div class="pd_img fix">
      <?php //print_r($product_images[0]); ?>
         <a class="venobox vbox-item" href="#"><img src="<= get_product_image($product_images[0]->media_id);?>" alt=""></a>
      </div>
   </div> -->



   <div class="zoompro-wrap product-zoom-right pl-20">
      <div class="zoompro-span">
         <img class="blur-up lazyload zoompro" data-zoom-image="<?= get_product_image($product_images[0]->media_id);?>" alt="" src="<?= get_product_image($product_images[0]->media_id);?>" />               
      </div>
      <div class="product-labels"><span class="lbl pr-label1">new</span><span class="lbl on-sale">Exclusive</span></div>
      <!-- <div class="product-buttons">
         <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" data-bs-toggle="tooltip" data-bs-placement="left" title="Watch Video"><i class="icon an an-play" aria-hidden="true"></i></a>
         <a href="#" class="btn prlightbox" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom Image"><i class="icon an an-expand-arrows-alt" aria-hidden="true"></i></a>
      </div> -->
   </div>