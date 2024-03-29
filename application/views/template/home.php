<style>
    .box-content button {
    display: inline-block;
    color: #333;
    font-size: 14px;
    width: 35px;
    height: 35px;
    line-height: 35px;
    background: #fff;
    border: 1px solid #fff;
    border-radius: 50%;
    margin: 0 7px;
    transition: .5s;
}
</style>
<?php if(!empty($slider)): ?>
<!-- Body Content -->
<div id="page-content">
   <!-- Home Banner slider -->
   <div class="slideshow slideshow-wrapper pb-section">
      <div class="home-slideshow slideshow--large">
      <?php foreach($slider as $slide): ?>
         <div class="slide slide1 d-block">
               <div class="slideimg blur-up lazyload">
                  <img class="blur-up lazyload" data-src="<?= get_image($slide->media_id);?>" src="<?= get_image($slide->media_id);?>" alt="Welcome to Diva" title="Welcome to Diva" />
                  <div class="slideshow__text-wrap slideshow__overlay">
                     <div class="slideshow__text-content mt-0 left te_lef">
                           <div class="container">
                              <div class="wrap-caption left">
                                 <?php 
                                 if(!empty(get_desc($slide->id))):
                                 $array = preg_split("/\r\n|\n|\r/", get_desc($slide->id)); 
                                 ?>
                                 <h2 class="h1 mega-title slideshow__title"><?= strip_tags($array[0]); ?></h2>
                                 <span class="mega-subtitle slideshow__subtitle"><?= strip_tags($array[1]); ?></span>
                                 <a href="<?= base_url('/products/all_products'); ?>" class="btn btn--large">Purchase Now</a>
                                 <?php endif; ?>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
         <?php endforeach; ?>

         <!-- <div class="slide slide2 d-block">
               <div class="slideimg blur-up lazyload">
                  <img class="blur-up lazyload" data-src="assets/images/slideshow-banners/home2-banner2.jpg" src="assets/images/slideshow-banners/home2-banner2.jpg" alt="Beautiful Designs" title="Beautiful Designs" />
                  <div class="slideshow__text-wrap slideshow__overlay">
                     <div class="slideshow__text-content mt-0 right  te_lef">
                           <div class="container">
                              <div class="wrap-caption right">
                                 <h2 class="h1 mega-title slideshow__title">Beautiful Designs</h2>
                                 <span class="mega-subtitle slideshow__subtitle">Looks beautiful and sharp on every device</span>
                                 <a href="collection-4columns.html" class="btn btn--large">Top Notch support</a>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div> -->

            <!-- <div class="slide slide3 d-block">
               <div class="slideimg blur-up lazyload">
                  <img class="blur-up lazyload" data-src="assets/images/slideshow-banners/home2-banner3.jpg" src="assets/images/slideshow-banners/home2-banner3.jpg" alt="Awesome Desing" title="Awesome Desing" />
                  <div class="slideshow__text-wrap slideshow__overlay">
                     <div class="slideshow__text-content mt-0 right  te_lef">
                           <div class="container">
                              <div class="wrap-caption right">
                                 <h2 class="h1 mega-title slideshow__title">Beautiful Designs</h2>
                                 <span class="mega-subtitle slideshow__subtitle">Looks beautiful and sharp on every device</span>
                                 <a href="collection-4columns.html" class="btn btn--large">Top Notch support</a>
                              </div>
                           </div>
                     </div>
                  </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- End Home Banner slider -->


<?php endif; ?>

<?php 
   //set_cookie('user_id',1,time() + (86400 * 30)); 
   //delete_cookie('user_id');
?>

<!-- ======================= <?php //echo $this->input->cookie('user_id',true) ? $this->input->cookie('user_id',true) : "NULL"; ?> 
================== <?php //echo $this->auth_user->id; ?> -->


<!-- Product slider -->
<div class="product-rows section">
   <div class="container">
      <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
               <div class="section-header text-center">
                  <h2 class="h2">New Arrivals</h2>
               </div>
               <!-- Product List -->
               <div class="grid-products grid-products-hover-btn">
                  <div class="productSlider">
                        <?php 
                           if(!empty($newproducts)): 
                              foreach($newproducts as $topproduct):
                        ?>
                        <div class="col-12 item">
                           <!-- Product Image -->
                           <div class="product-image">
                              <!-- product Image -->
                              <a href="<?= base_url('product/'.$topproduct->slug);?>">
                                    <!-- Image -->
                                    <img class="primary blur-up lazyload" data-src="<?= get_product_main_image($topproduct); ?>" src="<?= get_product_main_image($topproduct); ?>" alt="image" title="<?= $topproduct->title; ?>" />
                                    <img class="hover blur-up lazyload" data-src="<?= get_product_image_by_hovar($topproduct); ?>" src="<?= get_product_image_by_hovar($topproduct); ?>" alt="image" title="<?= $topproduct->title; ?>" />
                                    <!-- End Hover Image -->
                                    <!-- Product Label -->
                                    <div class="product-labels rectangular">
                                       <!-- <span class="lbl on-sale">-<?php //if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor' && $topproduct->dis_no_discount!=1){echo $topproduct->dis_discount_rate;}else{if($topproduct->no_discount!=1){echo $topproduct->discount_rate;}}?>%</span>  -->
                                       <span class="lbl pr-label1">new</span>
                                    </div>
                                    <!-- End Product Label -->
                              </a>
                              <div class="button-set style2">
                                    <div class="variants add" data-bs-toggle="tooltip" data-bs-placement="right" title="add to cart">

                                       <?php //if ($this->auth_check || get_cookie('user_id')) { ?>
                                          <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$topproduct->id.'"  novalidate '); ?>
                                             <input type="hidden" name="product_id" id="product_id" value="<?= $topproduct->id; ?>">
                                             <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                             <button type="button" id="<?= $topproduct->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></button>
                                          <?= form_close(); ?>
                                       <?php //}else{ ?>
                                          <!-- <a href="<= base_url('login/'); ?>" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></a> -->
                                       <?php //} ?>
                                    </div>
                              </div>
                              <!-- End Product Button -->
                           </div>
                           <!-- End Product Image -->
                           <!-- Product Details -->
                           <div class="product-details text-center">
                              <!-- Product Name -->
                              <div class="product-name">
                                    <a href="<?= base_url('product/'.$topproduct->slug);?>"><?= $topproduct->title; ?></a>
                              </div>
                              <!-- End Product Name -->
                              <!-- Product Price -->
                              <div class="product-price">
                                    <!-- <span class="old-price">$800.00</span> -->
                                    <?php if($topproduct->no_discount!=1){?>
                                       <span class="old-price"><?= select_value_by_id('currencies','id',$topproduct->currency_code,'hex');?> <?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $topproduct->dis_price;}else{echo $topproduct->price;}?></span>
                                    <?php }?>
                                    <span class="price"><?= select_value_by_id('currencies','id',$topproduct->currency_code,'hex');?><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $topproduct->dis_discounted_price;}else{echo $topproduct->discounted_price;}?></span>
                              </div>
                              <!-- End Product Price -->
                              <!-- Product Review -->
                              <div class="product-review">
                                 <?php
                                    $averageRating = get_avg_rationg_count($topproduct->id);
                                    $fullStars = floor($averageRating);
                                    $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
                                    for ($i = 0; $i < $fullStars; $i++) { // Print full stars ?>
                                       <img src="<?= base_url("assets/site/images/icon/full-star.png");?>" width="20px" alt="">
                                    <?php }
                                    if ($hasHalfStar) { // Print half star ?>
                                       <img src="<?= base_url("assets/site/images/icon/half-star.png");?>" width="20px" alt="">
                                    <?php }
                                    for ($i = 0; $i < (5 - ceil($averageRating)); $i++) { // Print empty stars if necessary ?>
                                       <img src="<?= base_url("assets/site/images/icon/empty-star.png");?>" width="20px" alt="">
                                    <?php }
                                 ?>
                              </div>
                           </div>
                           <!-- End Product Details -->
                        </div>
                        
                        <?php 
                           endforeach;
                           endif; 
                        ?> 
                  </div>
               </div>
               <!-- End Product List -->
            </div>
      </div>
   </div>
</div>
<!-- End Product slider -->


<div class="product-rows section">
   <div class="container">
      <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
               <div class="section-header text-center">
                  <h2 class="h2">Featured Products</h2>
               </div>
               <!-- Product List -->
               <div class="grid-products grid-products-hover-btn">
                  <div class="row">
                        <?php 
                           if(!empty($featuredproducts)): 
                              foreach($featuredproducts as $featurproducts):
                        ?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 item">
                           <div class="product-image">
                              <a href="<?= base_url('product/'.$topproduct->slug);?>">
                                 <img class="primary blur-up lazyload" data-src="<?= get_product_main_image($featurproducts); ?>" src="<?= get_product_main_image($featurproducts); ?>" alt="image" title="<?= $featurproducts->title; ?>" />
                                 <img class="hover blur-up lazyload" data-src="<?= get_product_image_by_hovar($featurproducts); ?>" src="<?= get_product_image_by_hovar($featurproducts); ?>" alt="image" title="<?= $featurproducts->title; ?>" />
                                 <!-- <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div> -->
                              </a>
                              <!-- <div class="saleTime desktop" data-countdown="2022/03/01"></div> -->
                              <div class="button-set style2">
                                 <div class="variants add" data-bs-toggle="tooltip" data-bs-placement="right" title="add to cart">
                                    <?php //if($this->auth_check) { ?>
                                       <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$featurproducts->id.'"  novalidate '); ?>
                                          <input type="hidden" name="product_id" id="product_id" value="<?= $featurproducts->id; ?>">
                                          <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                          <button type="button" id="<?= $featurproducts->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></button>
                                       <?= form_close(); ?>
                                    <?php //}else{ ?>
                                       <!-- <a href="<= base_url('login/');?>" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></a> -->
                                    <?php //} ?>
                                 </div>
                              </div>
                           </div>
                           <div class="product-details text-center">
                              <div class="product-name">
                                 <a href="<?= base_url('product/'.$featurproducts->slug);?>"><?= $featurproducts->title; ?></a>
                              </div>
                              <div class="product-price">
                                 <?php if($featurproducts->no_discount!=1){?>
                                    <span class="old-price"><?= select_value_by_id('currencies','id',$featurproducts->currency_code,'hex');?> <?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $featurproducts->dis_price;}else{echo $featurproducts->price;}?></span>
                                 <?php }?>
                                 <span class="price"><?= select_value_by_id('currencies','id',$featurproducts->currency_code,'hex');?><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $featurproducts->dis_discounted_price;}else{echo $featurproducts->discounted_price;}?></span>
                              </div>
                              <div class="product-review">
                                 <?php
                                    $averageRating = get_avg_rationg_count($featurproducts->id);
                                    $fullStars = floor($averageRating);
                                    $hasHalfStar = ($averageRating - $fullStars) >= 0.5;
                                    for ($i = 0; $i < $fullStars; $i++) { // Print full stars ?>
                                       <img src="<?= base_url("assets/site/images/icon/full-star.png");?>" width="20px" alt="">
                                    <?php }
                                    if ($hasHalfStar) { // Print half star ?>
                                       <img src="<?= base_url("assets/site/images/icon/half-star.png");?>" width="20px" alt="">
                                    <?php }
                                    for ($i = 0; $i < (5 - ceil($averageRating)); $i++) { // Print empty stars if necessary ?>
                                       <img src="<?= base_url("assets/site/images/icon/empty-star.png");?>" width="20px" alt="">
                                    <?php }
                                 ?>
                              </div>
                           </div>
                        </div>
                        <?php 
                           endforeach;
                           endif; 
                        ?>
                     </div>
               </div>
               <!-- End Product List -->
            </div>
      </div>
   </div>
</div>

   <!-- Collection -->
   <?php if(!empty($offeralldata)){ ?>
   <div class="collection-box tle-bold section">
      <div class="container">
         <div class="section-header text-center">
               <h2 class="h2">Great Offers</h2>
         </div>
         <!-- Collection Box -->
         <div class="row collection-grids">
            <?php foreach($offeralldata as $offer){ ?>
               <div class="col-12 col-sm-6 col-md-4 item">
                  <div class="collection-grid-item">
                     <img class="blur-up lazyload" data-src="<?= get_image($offer->media_id); ?>" src="<?= get_image($offer->media_id); ?>" alt="collection" title="" />
                     <a href="<?= $offer->link_url == ''? base_url('/products/all_products') : $offer->link_url ?>" class="collection-grid-item__title-wrapper">
                        <div class="title-wrapper">
                           <h3 class="collection-grid-item__title fw-bold"><?= $offer->title; ?> <span><?= $offer->description; ?></span></h3>
                           <span class="btn btn--secondary border-btn-1"><?= $offer->link_title; ?></span>
                        </div>
                     </a>
                  </div>
               </div>
               <?php } ?>
         </div>
         <!-- End Collection Box -->
      </div>
   </div>
   <!-- End Collection -->
   <?php } ?>

   <!-- Logo Slider -->
   <!-- <div class="section logo-section">
      <div class="container">
         <div class="row">
               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="section-header text-center">
                     <h2 class="h2">Our Brands</h2>
                     <p>We have got the brands you love</p>
                  </div>
                  <div class="logo-bar">
                     <div class="logo-bar__item"><a href="#" class="d-block"><img src="<?= base_url('assets/site/images/logo/brandlogo1.png') ?>" alt="Logo" title="" /></a></div>
                     <div class="logo-bar__item"><a href="#" class="d-block"><img src="<?= base_url('assets/site/images/logo/brandlogo2.png') ?>" alt="Logo" title="" /></a></div>
                     <div class="logo-bar__item"><a href="#" class="d-block"><img src="<?= base_url('assets/site/images/logo/brandlogo3.png') ?>" alt="Logo" title="" /></a></div>
                     <div class="logo-bar__item"><a href="#" class="d-block"><img src="<?= base_url('assets/site/images/logo/brandlogo4.png') ?>" alt="Logo" title="" /></a></div>
                     <div class="logo-bar__item"><a href="#" class="d-block"><img src="<?= base_url('assets/site/images/logo/brandlogo5.png') ?>" alt="Logo" title="" /></a></div>
                     <div class="logo-bar__item"><a href="#" class="d-block"><img src="<?= base_url('assets/site/images/logo/brandlogo6.png') ?>" alt="Logo" title="" /></a></div>
                  </div>
               </div>
         </div>
      </div>
   </div> -->
   <!-- End Logo Slider -->

   <?php //if(!empty($testimonial)): ?>
   <!-- Testimonial Slider -->
   <!-- <div class="section testimonial-bg-style testimonial-slider">
      <div class="container-fluid px-0">
         <div class="quote-wraper" style="background:url('<?= base_url('assets/site/images/parallax-banners/testimonials-bg.jpg') ?>') no-repeat center/cover">
            <div class="quotes-slider">
               <?php //foreach($testimonial as $t): ?>  
               <div class="quotes-slide">
                  <div class="section-header text-center">
                     <div class="img" style="width: 100px;height: 100px;border-radius: 50%;float: none;border: 5px solid #fff;box-shadow: 2px 3px 6px -3px rgba(0, 0, 0, 0.35);position: relative;display: inline-block;">
                        <img src="<= get_image($t->media_id);?>" alt="" style="width: 100%;height: 100%;border-radius: 50%;">
                     </div>
                  </div>
                  <blockquote class="quotes-slider__text text-center">             
                     <div class="rte-setting text-white">
                        <p><= $t->description ?></p>
                     </div>
                     <p class="authour text-white mb-0"><= $t->name; ?></p>
                  </blockquote>
               </div>
               <?php //endforeach ?>
            </div>
         </div>
      </div>
   </div> -->
   <!--End Testimonial Slider-->
   <?php //endif; ?>


   <?php if(!empty($videoslider)): ?>
   <!-- Testimonial Slider -->
   <div class="section testimonial-bg-style testimonial-slider">
      <div class="container-fluid px-0">
         <div class="quote-wraper">
            <div class="quotes-slider">
               <?php foreach($videoslider as $t): ?>  
                  <div class="quotes-slide">
                     <iframe width="90%" height="600" src="<?= $t->video_link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" ></iframe>
                  </div>
               <?php endforeach ?>
            </div>
         </div>
      </div>
   </div>
   <!--End Testimonial Slider-->
   <?php endif; ?>

   <!-- Latest Blog -->
   <!-- <div class="latest-blog section">
      <div class="container">
         <div class="row">
               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="section-header text-center">
                     <h2 class="h2">Fresh From our blog</h2>
                     <p>If you like shopify you are going to love this amazing theme.</p>
                  </div>
               </div>
         </div>
         <div class="row">
               <div class="blog-item col-12 col-sm-6 col-md-4 col-lg-4 text-start">
                  <a href="#" class="article__grid-image">   
                     <img class="blur-up lazyload" data-src="<?= base_url('assets/site/images/blog/post-img1.jpg') ?>" src="<?= base_url('assets/site/images/blog/post-img1.jpg') ?>" alt="blog image" />
                  </a> 
                  <div class="wrap-blog-inner text-center">
                     <h3 class="h5 article__title"><a href="#">It's all about how you wear</a></h3>
                     <span class="article__date">
                           <time datetime="2018-02-12T09:22:00Z">February 12, 2018</time>
                     </span>
                     <div class="rte-setting">
                           <p>Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d'entre elles a été altérée par l'addition d'humour ou ...</p>
                     </div>
                     <a href="#" class="btn btn--small border-btn-2">Read More</a>
                     <a href="#" class="btn border-btn-2 btn--small btn--link">1 comment</a>
                  </div>
               </div>
               <div class="blog-item col-12 col-sm-6 col-md-4 col-lg-4 text-start">
                  <a href="#" class="article__grid-image">   
                     <img class="blur-up lazyload" data-src="<?= base_url('assets/site/images/blog/post-img2.jpg') ?>" src="<?= base_url('assets/site/images/blog/post-img2.jpg') ?>" alt="blog image" />
                  </a> 
                  <div class="wrap-blog-inner text-center">
                     <h3 class="h5 article__title"><a href="#">27 Days of Spring Fashion Recap</a></h3>
                     <span class="article__date">
                           <time datetime="2018-02-12T09:22:00Z">February 12, 2018</time>
                     </span>
                     <div class="rte-setting">
                           <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la m...</p>
                     </div>
                     <a href="#" class="btn btn--small border-btn-2">Read More</a>
                  </div>
               </div>
               <div class="blog-item col-12 col-sm-6 col-md-4 col-lg-4 text-start">
                  <a href="#" class="article__grid-image">   
                     <img class="blur-up lazyload" data-src="<?= base_url('assets/site/images/blog/post-img3.jpg') ?>" src="<?= base_url('assets/site/images/blog/post-img2.jpg') ?>" alt="blog image" />
                  </a> 
                  <div class="wrap-blog-inner text-center">
                     <h3 class="h5 article__title"><a href="#">Great stores. Great choices.</a></h3>
                     <span class="article__date">
                           <time datetime="2018-02-12T09:22:00Z">February 12, 2018</time>
                     </span>
                     <div class="rte-setting">
                           <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la m...</p>
                     </div>
                     <a href="#" class="btn btn--small border-btn-2">Read More</a>
                  </div>
               </div>
         </div>
      </div>
   </div> -->
   <!-- End Latest Blog -->

   <!-- Store Feature -->
   <div class="store-feature style2 section">
      <div class="container">
         <div class="row">
               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <ul class="display-table store-info">
                     <li class="display-table-cell">
                           <div class="store-info-text">
                              <h5>we are dedicated to our customers 24/7</h5>
                              <span class="sub-text">Call us <?= $this->settings->contact_phone;?> . Talk to Us <?= $this->settings->contact_email;?></span>
                           </div>
                     </li>
                  </ul>
               </div>
         </div>
      </div>
   </div>
   <!-- End Store Feature -->
   
</div>
<!-- End Body Content -->