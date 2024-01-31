<!-- Body Content -->
<div id="page-content">
   <!-- Bredcrumbs -->
   <div class="bredcrumbWrap bredcrumb-style2">
      <div class="container breadcrumbs">
         <a href="<?= base_url(' ') ?>" title="Back to the home page">Home</a><span aria-hidden="true">|</span><span class="title-bold">Products</span>
      </div>
   </div>
   <!-- End Bredcrumbs -->

   <div class="container">
      <!-- Main Content -->
      <div id="ProductSection-product-template" class="product-template__container prstyle2">
         <!-- #ProductSection product template -->
         <div class="product-single product-single-1">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="product-details-img product-single__photos bottom">
                        <!-- Product Images -->
                        <?php $this->load->view('products/details/_preview');?>
                        <!-- End Product Images -->
                        <!-- Wishlist - Share -->
                        <!-- <div class="display-table shareRow pt-3 pb-0 d-table">
                           <div class="display-table-cell text-center align-top">
                              <div class="social-sharing">
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook">
                                       <i class="icon an an-facebook" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Facebook</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter">
                                       <i class="icon an an-twitter" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Tweet</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-google" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on google+">
                                       <i class="icon an an-google-plus" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Google+</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest">
                                       <i class="icon an an-pinterest-p" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Pin it</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-email" data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email">
                                       <i class="icon an an-envelope" aria-hidden="true"></i><span class="share-title" aria-hidden="true">Email</span>
                                    </a>
                              </div>
                           </div>
                        </div> -->
                        <!-- End Wishlist - Share -->
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <!-- Product Info -->
                  <div class="product-single__meta">
                        <h1 class="product-single__title"><?= $product->title;?></h1>
            
                        <!-- Product Reviews -->
                        <div class="prInfoRow d-flex flex-wrap">
                           <div class="product-review">
                              <a class="reviewLink d-flex flex-wrap align-items-center" href="#tab2">
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
                                 <!-- <i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i> -->
                                 <span class="spr-badge-caption"><?= $product->rating;?> reviews</span>
                              </a>
                           </div>
                        </div>
                        <!-- End Product Reviews -->
                        <!-- Product Price -->
                        <div class="product-single__price product-single__price-product-template">
                           <?php if($product->no_discount!=1){?>
                              <s id="ComparePrice-product-template"><span class="money"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $product->dis_price;}else{echo $product->price;}?></span></s>
                           <?php }?>
                           <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                              <span id="ProductPrice-product-template"><span class="money"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $product->dis_discounted_price;}else{echo $product->discounted_price;}?></span></span>
                           </span>
                           <?php if($product->no_discount!=1){?>
                           <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                              <span>You Save</span>
                              <span id="SaveAmount-product-template" class="product-single__save-amount">
                                    <span class="money"><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $product->dis_price - $product->dis_discounted_price;}else{echo $product->price - $product->discounted_price;}?></span>
                              </span>
                              <span class="off">(<span><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $product->dis_discount_rate;}else{echo $product->discount_rate;}?></span>%)</span>
                           </span>
                           <?php }?>
                           <div class="product__policies rte" data-product-policies="">Tax included.</div>
                        </div>
                        <!-- End Product Price -->
                        <!-- Product Description -->
                        <div class="product-single__description rte">
                           <p class="mb-2"><?= $product->short_desc;?></p>
                        </div>
                        <!-- End Product Description -->
               
                        <!-- Form -->
                        <?= form_open('/add-to-cart', 'class="needs-validation product-form product-form-product-template product-form-border hidedropdown" id="form_add_cart"  novalidate '); ?>
					            <input type="hidden" name="product_id" id="product_id" value="<?= $product->id;?>">
                           
                           <!-- Size Swatch -->
                           <?php if (!empty($full_width_product_variations)):
                              foreach ($full_width_product_variations as $variation):
                                 $this->load->view('products/details/_product_variations', ['variation' => $variation]);
                              endforeach;
                              endif;
                              if (!empty($half_width_product_variations)):
                              foreach ($half_width_product_variations as $variation):
                                 $this->load->view('products/details/_product_variations', ['variation' => $variation]);
                              endforeach;
                              endif; 
                           ?>
                           <!-- End Size Swatch -->

                           <!-- Product Action -->
                           <div class="product-action clearfix">
                              <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                       <div class="qtyField">
                                          <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon an an-minus" aria-hidden="true"></i></a>
                                          <input type="number" name="product_quantity" value="1" class="product-form__input qty" />
                                          <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon an an-plus" aria-hidden="true"></i></a>
                                       </div>
                                    </div>
                              </div>                                
                              <div class="product-form__item--submit">
                                    <!-- <button type="button" name="add" class="btn product-form__cart-submit"><span>Add to cart</span></button> -->
                                 <?php $buttton = get_product_form_data($product)->button;
                                    if (!empty($buttton)):?>
                                       <?php echo $buttton; ?> 
                                 <?php endif; ?>
                              </div>
                              <div class="payment-button" data-shopify="payment-button">
                                 <button type="button" id="<?= $product->id; ?>" onclick="buynow(this.id)" class="payment-button__button payment-button__button--unbranded">Buy it now</button>
                              </div>
                           </div>
                           <!-- End Product Action -->
                           <!-- </form> -->
                        <?= form_close(); ?>
                        <!-- End Form -->

                        <!-- Product Feature -->
                        <div class="safecheckout row my-3">
                           <div class="item col-lg-3 mb-1 mb-sm-0">
                              <div class="icon"><i class="icon an an-truck"></i></div>
                              <div class="content">Free & fast shipping</div>
                           </div>
                           <div class="item col-lg-3 mb-1 mb-sm-0">
                              <div class="icon"><i class="icon an an-certificate"></i></div>
                              <div class="content">Secure checkout</div>
                           </div>
                           <div class="item col-lg-3">
                              <div class="icon"><i class="icon an an-thumbs-up"></i></div>
                              <div class="content">Satisfaction guarantee</div>
                           </div>
                           <div class="item col-lg-3">
                              <div class="icon"><i class="icon an an-lock"></i></div>
                              <div class="content">Privacy protected</div>
                           </div>
                        </div>
                        <!-- End Product Feature -->

                        <!-- Product Intro -->
                        <div class="product-info">
                           <p class="product-stock">
                              Availability: 
                              <span class="<?php if($product->stock_status == 1){echo 'instock';}else{echo 'outstock';} ?>">
                                 <?php if($product->stock_status == 1){echo "In Stock";}else{echo "Unavailable";} ?>
                              </span>
                           </p> 
                           <p class="product-sku">SKU: <span class="variant-sku"><?= $product->sku;?></span></p>
                        </div>
                        <!-- End Product Intro -->
                  </div>
                  <!-- End Product Info -->
               </div>
            </div>
            <!-- End Product single -->

            <!-- Product Tabs -->
            <div class="tabs-listing tab-details mt-0 mt-md-4">
               <!-- Tabs -->
               <ul class="product-tabs d-none d-md-block">
                  <li class="active" rel="tab1"><a class="tablink">Product Details</a></li>
                  <li rel="tab3"><a class="tablink">Product Specification</a></li>
                  <li rel="tab2"><a class="tablink">Product Reviews</a></li>
                  <!-- <li rel="tab4"><a class="tablink">Shipping &amp; Returns</a></li> -->
               </ul>
               <!-- End Tabs -->
               <!-- Tabs Container -->
               <div class="tab-container pb-0 mb-0">
                  <!-- Tabs Content One -->
                  <h3 class="acor-ttl active d-block d-md-none" rel="tab1">Product Details</h3>
                  <div id="tab1" class="tab-content py-3 py-md-0" style="display:block;">
                     <div class="product-description rte">
                        <?= $product->description;?> 
                     </div>
                  </div>
                  <!-- End Tabs Content One -->
                  <h3 class="acor-ttl active d-block d-md-none" rel="tab3">Product Specification</h3>
                  <div id="tab3" class="tab-content py-3 py-md-0" style="display:block;">
                     <div class="product-description rte">
                        <?= $product->product_specification;?> 
                     </div>
                  </div>
                  <!-- Tabs Content Two -->
                  <h3 class="acor-ttl d-block d-md-none" rel="tab2">Product Reviews</h3>
                  <div id="tab2" class="tab-content py-3 py-md-0">
                     <?php $this->load->view('products/details/_reviews');?>
                        <!-- <div id="shopify-product-reviews">
                           <div class="spr-container">
                              <div class="spr-header clearfix">
                                    <div class="spr-summary text-center d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row">
                                       <span class="product-review justify-content-center"><a class="reviewLink"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i></a><span class="spr-summary-actions-togglereviews ms-2">Based on 6 reviews 456</span></span>
                                       <span class="spr-summary-actions mt-3 mt-sm-0">
                                          <a href="#" class="spr-summary-actions-newreview write-review-btn btn"><i class="an-1x an an-pencil-alt me-1"></i> Write a review</a>
                                       </span>
                                    </div>
                              </div>
                              <div class="spr-content">
                                    <div class="product-review-form spr-form clearfix" style="display:none;">
                                       <form method="post" action="#" id="new-review-form" class="new-review-form">
                                          <h3 class="spr-form-title">Write a review</h3>
                                          <fieldset class="spr-form-contact">
                                                <div class="spr-form-contact-name">
                                                   <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                                   <input class="spr-form-input spr-form-input-text" id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                                </div>
                                                <div class="spr-form-contact-email">
                                                   <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                                   <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                                </div>
                                          </fieldset>
                                          <fieldset class="spr-form-review">
                                                <div class="spr-form-review-rating">
                                                   <label class="spr-form-label">Rating</label>
                                                   <div class="spr-form-input spr-starrating">
                                                      <div class="product-review justify-content-start">
                                                            <a class="reviewLink" href="#"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i></a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="spr-form-review-title">
                                                   <label class="spr-form-label" for="review_title_10508262282">Review Title</label>
                                                   <input class="spr-form-input spr-form-input-text" id="review_title_10508262282" type="text" name="review[title]" value="" placeholder="Give your review a title">
                                                </div>
                                                <div class="spr-form-review-body">
                                                   <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                   <div class="spr-form-input">
                                                      <textarea class="spr-form-input spr-form-input-textarea" id="review_body_10508262282" data-product-id="10508262282" name="review[body]" rows="5" placeholder="Write your comments here"></textarea>
                                                   </div>
                                                </div>
                                          </fieldset>
                                          <fieldset class="spr-form-actions">
                                                <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                          </fieldset>
                                       </form>
                                    </div>
                                    <div class="spr-reviews">
                                       <div class="spr-review">
                                          <div class="spr-review-header">
                                                <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i></span></span>
                                                <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                                <span class="spr-review-header-byline"><strong>dsacc</strong> on <strong>Apr 09, 2019</strong></span>
                                          </div>
                                          <div class="spr-review-content">
                                                <p class="spr-review-content-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                          </div>
                                       </div>
                                       <div class="spr-review">
                                          <div class="spr-review-header">
                                                <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star"></i><i class="an an-star-half-alt"></i></span></span>
                                                <h3 class="spr-review-header-title">Lorem Ipsum is simply dummy text of the printing</h3>
                                                <span class="spr-review-header-byline"><strong>larrydude</strong> on <strong>Dec 30, 2018</strong></span>
                                          </div>
                                          <div class="spr-review-content">
                                                <p class="spr-review-content-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                </p>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div> -->
                  </div>
                  <!-- End Tabs Content Two -->
                  <!-- Tabs Content Four -->
                  <!-- <h3 class="acor-ttl d-block d-md-none" rel="tab4">Shipping &amp; Returns</h3>
                  <div id="tab4" class="tab-content py-3 py-md-0">
                        <h4>Returns Policy</h4>
                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                        <h4>Shipping</h4>
                        <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                  </div> -->
                  <!-- End Tabs Content Four -->
               </div>
               <!-- End Tabs Container -->
            </div>
            <!-- End Product Tabs -->

            <!-- Related Product Slider -->
            <div class="related-product grid-products">
               <header class="section-header">
                  <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                  <!-- <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p> -->
               </header>
               <div class="productPageSlider">
                  <?php
                     if(!empty($similarproducts)):
                        foreach($similarproducts as $sproduct):
                  ?>
                  <div class="col-12 item">
                        <!-- Product Image -->
                        <div class="product-image">
                           <!-- Product Image -->
                           <a href="<?= base_url('product/'.$sproduct->slug);?>">
                              <!-- Image -->
                              <img class="primary blur-up lazyload" data-src="<?= get_product_main_image($sproduct); ?>" src="<?= get_product_main_image($sproduct); ?>" alt="image" title="<?= $sproduct->title; ?>" />
                              <!-- End Image -->
                              <!-- Hover Image -->
                              <img class="hover blur-up lazyload" data-src="<?= get_product_image_by_hovar($sproduct); ?>" src="<?= get_product_image_by_hovar($sproduct); ?>" alt="image" title="<?= $sproduct->title; ?>" />
                              <!-- End Hover Image -->
                              <!-- Product Label -->
                              <div class="product-labels rectangular"><span class="lbl on-sale">Exclusive</span></div>
                              <!-- End Product Label -->
                           </a>
                           <!-- End Product Image -->
                           <!-- Product Button -->
                           <div class="button-set">
                              <div class="variants add" data-bs-toggle="tooltip" data-bs-placement="top" title="add to cart">
                                 <?php //if($this->auth_check) { ?>
                                    <?= form_open('/add-to-cart', 'class="needs-validation" id="cartForm'.$sproduct->id.'"  novalidate '); ?>
                                       <input type="hidden" name="product_id" id="product_id" value="<?= $sproduct->id; ?>">
                                       <input value="1" name="product_quantity"  class="cart-plus-minus-box" type="hidden">
                                       <button type="button" id="<?= $sproduct->id; ?>" onClick="addToCart(this.id)" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></button>
                                    <?= form_close(); ?>
                                 <?php //}else{ ?>
                                    <!-- <a href="<= base_url('login/');?>" class="btn cartIcon btn-addto-cart open-addtocart-popup"><i class="icon an an-shopping-bag"></i></a> -->
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
                              <a href="<?= base_url('product/'.$sproduct->slug);?>"><?= $sproduct->title; ?></a>
                           </div>
                           <!-- End Product Name -->
                           <!-- Product Price -->
                           <div class="product-price">
                              <?php if($sproduct->no_discount!=1){?>
                                 <span class="old-price"><?= select_value_by_id('currencies','id',$sproduct->currency_code,'hex');?> <?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $sproduct->dis_price;}else{echo $sproduct->price;}?></span>
                              <?php }?>
                              <span class="price"><?= select_value_by_id('currencies','id',$sproduct->currency_code,'hex');?><?php if(!empty($this->auth_user) && $this->auth_user->role == 'dristributor'){echo $sproduct->dis_discounted_price;}else{echo $sproduct->discounted_price;}?></span>
                           </div>
                           <!-- End Product Price -->
                           <!-- Product Review -->
                           <div class="product-review">
                              <?php
                                 $averageRating = get_avg_rationg_count($sproduct->id);
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
                           <!-- Variant -->
                           
                           <!-- End Variant -->
                        </div>
                        <!-- End Product Details -->
                        <!-- Countdown -->
                        <!-- <div class="timermobile"><div class="saleTime desktop" data-countdown="2022/03/01"></div></div> -->
                        <!-- End Countdown -->
                  </div>
                  <?php 
                     endforeach;
                     endif;
                  ?>	 
               </div>
            </div>
         </div>
         <!-- #ProductSection product template -->
      </div>
      <!-- End Main Content -->
   </div>                
</div>
<!-- End Body Content -->
