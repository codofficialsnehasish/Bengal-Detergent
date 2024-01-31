

<!-- <div class="pagination">
<?php  //echo $this->pagination->create_links(); ?>
</div> -->







<!-- Body Content -->
<div id="page-content">
   <!-- Collection Banner -->
   <div class="collection-header">
      <div class="collection-hero">
         <div class="collection-hero__image blur-up lazyload" style="background-image:url('<?= base_url('assets/site/images/collection/collection-bnr.jpg') ?>');"></div>
         <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Shop Grid Fullwidth</h1></div>
      </div>
   </div>
   <!-- End Collection Banner -->

      <div class="container">
         <div class="row">
            <!-- Main Content -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                  <div class="productList">
                     <!-- Toolbar -->
                     <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                              <div class="row">
                                 <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-Start align-items-center">
                                    <!-- <button type="button" class="btn-filter d-block d-md-block d-lg-block icon an an-sliders-h" data-bs-toggle="tooltip" data-bs-placement="top" title="Filters"></button> -->
                                    <a href="#" class="change-view change-view--active" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid View">
                                          <i class="icon an an-table"></i>
                                    </a>
                                    <!-- <a href="shop-listview.html" class="change-view" data-bs-toggle="tooltip" data-bs-placement="top" title="List View">
                                          <i class="icon an an-th-list"></i>
                                    </a> -->
                                 </div>
                                 <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Showing: <?php if(!empty($allproducts)){ echo count($allproducts); } ?></span>
                                 </div>
                                 <div class="col-4 col-md-4 col-lg-4 d-flex justify-content-end align-items-center text-end">
                                    <div class="filters-toolbar__item">
                                       <?= form_open('products/all_products/', 'class="needs-validation"  novalidate '); ?>
                                          <label for="SortBy" class="hidden">Sort</label>
                                          <select id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort" name="sort_by" onchange="this.form.submit()">
                                             <option value="title-ascending" selected="selected">Sort</option>
                                             <option <?php if($sort_by != '' && $sort_by== "rating_high_to_low") echo "selected"; ?> >Best Selling</option>
                                             <option <?php if($sort_by != '' && $sort_by== "a_to_z") echo "selected"; ?> value="a_to_z">Alphabetically, A-Z</option>
                                             <option <?php if($sort_by != '' && $sort_by== "z_to_a") echo "selected"; ?> value="z_to_a">Alphabetically, Z-A</option>
                                             <option <?php if($sort_by != '' && $sort_by== "cost_low_to_high") echo "selected"; ?> value="cost_low_to_high" >Price, low to high</option>
                                             <option <?php if($sort_by != '' && $sort_by== "cost_high_to_low") echo "selected"; ?> value="cost_high_to_low" >Price, high to low</option>
                                             <option <?php if($sort_by != '' && $sort_by== "rating_high_to_low") echo "selected"; ?> >Date, new to old</option>
                                             <option <?php if($sort_by != '' && $sort_by== "rating_high_to_low") echo "selected"; ?> >Date, old to new</option>
                                          </select>
                                          <?= form_close(); ?>
                                          <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                     <!-- End Toolbar -->

                     <!-- Grid Product -->
                     <div class="grid-products grid--view-items">
                        <div class="row">
                           <?php 
                              if(!empty($allproducts)):
                                 foreach($allproducts as $product): 
                           ?>  
                           <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                              <!-- Product Image -->
                              <div class="product-image">
                                 <!-- Product Image -->
                                 <a href="<?= base_url('product/'.$product->slug);?>">
                                       <!-- Image -->
                                       <img class="primary blur-up lazyload" data-src="<?= get_product_main_image($product); ?>" src="<?= get_product_main_image($product); ?>" alt="image" title="<?= $product->title; ?>" />
                                       <!-- End Image -->
                                       <!-- Hover image -->
                                       <img class="hover blur-up lazyload" data-src="<?= get_product_image_by_hovar($product); ?>" src="<?= get_product_image_by_hovar($product); ?>" alt="image" title="<?= $product->title; ?>" />
                                       <!-- End Hover Image -->
                                       <!-- Product Label -->
                                       <div class="product-labels rectangular"><span class="lbl on-sale">Exclusive</span></div>
                                       <!-- End Product Label -->
                                 </a>
                                 <!-- End Product Image -->

                                 <!-- Product Button -->
                                 <div class="button-set">
                                    <div class="variants add" data-bs-toggle="tooltip" data-bs-placement="top" title="add to cart">
                                    <?php //if ($this->auth_check) { ?>
                                       <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$product->id.'"  novalidate '); ?>
                                          <input type="hidden" name="product_id" id="product_id" value="<?= $product->id; ?>">
                                          <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                          <button type="button" id="<?= $product->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></button>
                                       <?= form_close(); ?>
                                    <?php //}else{ ?>
                                       <!-- <a href="<= base_url('login/');?>"><i class="fa fa-cart-plus"></i></a> -->
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
                                    <a href="<?= base_url('product/'.$product->slug); ?>"><?= $product->title; ?></a>
                                 </div>
                                 <!-- End Product Name -->
                                 <!-- Product Price -->
                                 <div class="product-price">
                                    <?php if($product->no_discount!=1){?>
                                       <span class="old-price"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $product->dis_price;}else{echo $product->price;}?></span>
                                    <?php }?>
                                    <span class="price"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $product->dis_discounted_price;}else{echo $product->discounted_price;}?></span>
                                 </div>
                                 <!-- End Product Price -->
                                 <!-- Product Review -->
                                 <div class="product-review">
                                    <?php
                                       $averageRating = get_avg_rationg_count($product->id);
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
                                 <!-- End Product Review -->

                              </div>
                              <!-- End product details -->
                              <!-- Countdown -->
                              <div class="timermobile"><div class="saleTime desktop" data-countdown="2022/03/01"></div></div>
                              <!-- End Countdown -->
                           </div>
                           <?php 
                              endforeach;
                              else:
                                 echo '<p>No products Found!</p>';
                              endif;
                           ?> 
                        </div>
                     </div>
                     <!-- End Grid Product -->
                  </div>

                  <hr class="clear">

                  <!-- Number Pagination -->
                  <!-- <div class="pagination">
                     <ul>
                        <li class="prev"><a href="#"><i class="icon an an-caret-left" aria-hidden="true"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">…</a></li>
                        <li><a href="#">6</a></li>
                        <li class="next"><a href="#"><i class="icon an an-caret-right" aria-hidden="true"></i></a></li>
                     </ul>
                  </div> -->
                  <!-- End Number Pagination -->
            </div>
            <!-- End Main Content -->
         </div>
      </div>
</div>
<!-- End Body Content -->