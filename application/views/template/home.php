        <div class="main-wrapper">
            <div class="header-search mobile-search">
                <input type="text" class="form-control" placeholder="Search for products" aria-label="Search for products " aria-describedby="button-addon2">
                <button class="btn" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>

            <!-- Hero Slider -->
            <?php if(!empty($slider)): ?>
            <div class="hero">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach($slider as $slide): ?>
                        <div class="carousel-item active">
                            <a href="<?= base_url('/products/all_products'); ?>"><img src="<?= get_image($slide->media_id); ?>" class="d-block w-100" alt="..."></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Healthy & Tasty</h3>
                                <p class="text-one">Pet</p>
                                <p class="text-two">Food</p>
                                <a href=" " class="btn btn-dark">Shop Now</a>
                            </div>
                            <?php 
                                // if(!empty(get_desc($slide->id))):
                                // $array = preg_split("/\r\n|\n|\r/", get_desc($slide->id)); 
                            ?>
                            <!-- <div class="carousel-caption d-none d-md-block"> -->
                                <!-- <h3><= strip_tags($array[0]); ?></h3> -->
                                <!-- <h3>Healthy & Tasty</h3> -->
                                <!-- <p class="text-one"><= strip_tags($array[1]); ?></p> -->
                                <!-- <p class="text-one">Pet</p> -->
                                <!-- <p class="text-two"><= strip_tags($array[2]); ?></p> -->
                                <!-- <p class="text-two">Food</p> -->
                                <!-- <a href="<= base_url('/products/all_products'); ?>" class="btn btn-dark">Shop Now</a> -->
                            <!-- </div> -->
                            <?php //endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- Hero Slider -->

            <?php if(!empty($allcategories)): ?>
            <!-- Explore Categories -->
            <section class="explore-category p-60">
                <div class="container">
                    <div class="slider-heading d-flex justify-content-between align-items-start">
                        <h2>Explore Categories</h2>
                    </div>
                    <div class="owl-carousel owl-theme explore-category-slider">
                        <?php foreach($allcategories as $cata): ?>
                        <div class="item">
                            <img src="<?= get_image($cata->media_id);?>" alt="">
                            <a href="" class="stretched-link"><?= $cata->cat_name ?></a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Explore Categories -->
            <?php endif; ?>

            <!-- Offer -->
            <section class="category-banner p-60 pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="category-banner-container">
                                <img src="<?= base_url('assets/site/images/category-banner1.jpg'); ?>" alt="">
                                <div class="banner-content">
                                    <p>Bring Out The<span>Fashionista</span>In Your Pooch</p>
                                    <p class="category-offer">upto <span>20%</span> off</p>
                                </div>
                                <a href="" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="category-banner-container">
                                <img src="<?= base_url('assets/site/images/category-banner2.jpg'); ?>" alt="">
                                <div class="banner-content">
                                    <p>Grab The<span>Purr-fect</span>Treat For Your Cat</p>
                                    <p class="category-offer">upto <span>20%</span> off</p>
                                </div>
                                <a href="" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Offer -->
            
            <?php if(!empty($featuredproducts)): ?>
            <!-- Featured Products -->
            <section class="feature-product p-60 pt-0">
                <div class="container">
                    <div class="feature-product-heading d-flex justify-content-between align-items-start">
                        <h2>Featured Products</h2>
                        <a href="" class="btn btn-dark">View All</a>
                    </div>
                    <div class="owl-carousel owl-theme feature-product-slider">
                        <?php foreach($featuredproducts as $featurproducts): ?>
                        <div class="item">
                            <div class="icon-wishlist <?= is_favorite(1,$featurproducts->id) ? 'in-wishlist' : ''; ?> "></div>
                            <img src="<?= get_product_main_image($featurproducts); ?>" alt="">
                            <p><?= $featurproducts->title; ?></p>
                            <p class="product-price">
                                Rs.<?= $featurproducts->price; ?>
                                <?php if($featurproducts->no_discount!=1){?>
                                    <span><?= $featurproducts->discount_rate; ?>% off</span>
                                <?php }?>
                            </p>
                            <a href="" class="btn btn-blue w-100">View Details</a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Featured Products -->
            <?php endif; ?>

            <!-- Offer 2 -->
            <section class="ads-banner ads1 p-60 pt-0">
                <div class="container">
                    <div class="ads-banner-container">
                        <img src="<?= base_url('assets/site/images/ads-banner1.jpg'); ?>" alt="">
                        <div class="ads-banner-content">
                            <h3>Best Selling Dog Food</h3>
                            <a href="" class="btn btn-dark">Shop Now</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Offer 2 -->

            <!-- Latest Arrivals / Best Selling -->
            <section class="latest-arrival p-60 pt-0">
                <div class="container">
                    <div class="feature-product-heading d-flex justify-content-between align-items-start">
                        <h2><span>Latest Arrivals</span> / Best Selling</h2>
                        <a href="" class="btn btn-dark">View All</a>
                    </div>
                    <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/latest1.jpg'); ?>" alt="">
                                <p>Nulo Cat Food</p>
                                <p class="product-price">Rs.500<span>20% off</span></p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/latest2.jpg'); ?>" alt="">
                                <p>Dog Food</p>
                                <p class="product-price">Rs.500</p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/latest3.jpg'); ?>" alt="">
                                <p>Bird Food</p>
                                <p class="product-price">Rs.500</p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product4.jpg'); ?>" alt="">
                                <p>Hamster Food</p>
                                <p class="product-price">Rs.500<span>10% off</span></p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest Arrivals / Best Selling -->

            <!-- Toys & Accessories -->
            <section class="ads-banner ads2 p-60 pt-0">
                <div class="ads-banner-container">
                    <img src="<?= base_url('assets/site/images/ads-banner2.jpg'); ?>" alt="">
                    <div class="ads-banner-content">
                        <h3>Toys & Accessories</h3>
                        <a href="" class="btn btn-dark">Shop Now</a>
                    </div>
                </div>
            </section>
            <!-- Toys & Accessories -->

            <!-- Chirpy Treats -->
            <section class="chirpy-treat p-60 pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="chirpy-treat-img">
                                <a href=""><img src="<?= base_url('assets/site/images/chirpy-treat-img.jpg'); ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-9">
                        <div class="chirpy-treat-heading">
                            <h2>Chirpy Treats</h2>
                        </div>
                        <div class="owl-carousel owl-theme chirpy-treat-slider">
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product1.jpg'); ?>" alt="">
                                <p>Nulo Cat Food</p>
                                <p class="product-price">Rs.500<span>20% off</span></p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product2.jpg'); ?>" alt="">
                                <p>Dog Food</p>
                                <p class="product-price">Rs.500</p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product3.jpg'); ?>" alt="">
                                <p>Bird Food</p>
                                <p class="product-price">Rs.500</p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product4.jpg'); ?>" alt="">
                                <p>Hamster Food</p>
                                <p class="product-price">Rs.500<span>10% off</span></p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product1.jpg'); ?>" alt="">
                                <p>Nulo Cat Food</p>
                                <p class="product-price">Rs.500</p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                            <div class="item">
                                <div class="icon-wishlist"></div>
                                <img src="<?= base_url('assets/site/images/product2.jpg'); ?>" alt="">
                                <p>Hamster Food</p>
                                <p class="product-price">Rs.500</p>
                                <a href="" class="btn btn-blue w-100">View Details</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Chirpy Treats -->

            <!-- Shop By Brand -->
            <section class="shop-by-brand p-60 pt-0">
                <div class="container">
                    <h2 class="text-center">Shop By Brand</h2>
                    <div class="shop-by-brand-items d-flex justify-content-center justify-content-lg-between">
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand1.jpg'); ?>" alt=""></a></span>
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand2.jpg'); ?>" alt=""></a></span>
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand3.jpg'); ?>" alt=""></a></span>
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand4.jpg'); ?>" alt=""></a></span>
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand5.jpg'); ?>" alt=""></a></span>
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand6.jpg'); ?>" alt=""></a></span>
                        <span><a href=""><img src="<?= base_url('assets/site/images/brand1.jpg'); ?>" alt=""></a></span>
                    </div>
                </div>
            </section>
            <!-- Shop By Brand -->

            <?php if(!empty($videoslider)): ?>
            <!-- Youtube Video -->
            <section class="pets-in-action p-60">
                <div class="container">
                    <div class="pets-in-action-heading d-flex justify-content-between align-items-start">
                        <h2>Adorable Pets In Action</h2>
                        <a href="" class="btn btn-dark">View All</a>
                    </div>
                    <div class="owl-carousel owl-theme pets-in-action-slider">
                        <?php foreach($videoslider as $t): ?> 
                        <div class="item-video" data-merge="1">
                            <iframe width="543" height="415" src="<?= $t->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- Youtube Video -->
            <?php endif; ?>

            <?php if(!empty($testimonial)): ?>
            <!-- Testimonial -->
            <section class="testimonial p-60 pt-0">
                <div class="container">
                    <h2 class="text-center">What They Say</h2>
                    <div class="row">
                        <div class="col-lg-12 offset-lg-0 col-xl-8 offset-xl-2">
                            <div class="owl-carousel owl-theme testimonial-slider">
                                <?php foreach($testimonial as $t): ?>
                                <div class="item d-block d-md-flex">
                                    <figure><img src="<?= get_image($t->media_id);?>" alt=""></figure>
                                    <div class="testimonial-content">
                                        <div class="rate">
                                            <?php for ($i = 0; $i < (5 - ceil($t->rating)); $i++) { // Print empty stars if necessary ?>
                                                <label title="text"></label>
                                            <?php } ?>
                                            <?php for ($i = 0; $i < $t->rating; $i++) { // Print full stars ?>
                                                <label title="text" style="color:#deb217 !important;"></label>
                                            <?php } ?>
                                        </div>
                                        <h4><?= $t->title ?></h4>
                                        <p><?= $t->description ?></p>
                                        <h5><?= $t->name ?></h5>
                                    </div>
                                </div> 
                                <?php endforeach; ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial -->
            <?php endif; ?>

            <!-- Instagram Feed -->
            <section class="insta-slider-container p-60 pt-0">
                <div class="container">
                    <h2 class="text-center">Follow Us @talesofjoy</h2>
                </div>
                <div class="owl-carousel owl-theme insta-slider">
                    <?php
                        $instagramData = instagram('instagram',10);
                        if(!empty($instagramData)){
                        foreach($instagramData as $insta){
                            $username = isset($insta->username) ? $insta->username : "";
                            $caption = isset($insta->caption) ? $insta->caption : "";
                            $media_url = isset($insta->media_url) ? $insta->media_url : "";
                            $permalink = isset($insta->permalink) ? $insta->permalink : "";
                            $media_type = isset($insta->media_type) ? $insta->media_type : "";
                    ?>
                    <div class="item">
                        <a href="<?= $permalink; ?>" target="_blank">
                            <img src="<?= $media_url ?>" alt="" />
                        </a>
                    </div>
                    <?php } }?>
                </div>
            </section>
            <!-- Instagram Feed -->


            <!-- Quick Links -->
            <section class="quick-link-container p-0">
                <div class="container">
                    <div class="quick-link d-flex align-items-center justify-content-lg-evenly">
                        <span>Quick Links</span>
                        <ul class="d-flex gap-20">
                            <li><a href="">CONTACT US</a></li>
                            <li><a href="">PRIVACY POLICY</a></li>
                            <li><a href="">TERMS OF USE</a></li>
                            <li><a href="">SHIPPING POLICY</a></li>
                            <li><a href="">CANCELLATIONS AND REFUNDS</a></li>
                            <li><a href="">STORES</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Quick Links -->

            <!-- Join Our Newsletter -->
            <section class="newsletter-container p-60">
                <div class="container">
                    <h2 class="text-center">Join Our Newsletter</h2>
                    <p>Subscribe to our Newsletter and receive special <br />promotions and insider information about upcoming collections.</p>
                    <div class="newsletter-form">
                        <div class="header-search d-block">
                            <input type="text" class="form-control" placeholder="Your Email Address" aria-label="Your Email Address " aria-describedby="button-addon2">
                            <button class="btn" type="button" id="button-addon2"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </section> 
            <!-- Join Our Newsletter -->

            <!-- Popular searches -->
            <section class="popular-search-container p-0">
                <div class="container">
                    <div class="popular-search">
                        <span>Popular searches</span>
                        <ul class="d-flex flex-wrap">
                            <li><a href="">Dog</a></li>
                            <li><a href="">Cat Food</a></li>
                            <li><a href="">Royal Canin</a></li>
                            <li><a href="">Mat</a></li>
                            <li><a href="">Whiskas</a></li>
                            <li><a href="">Toys</a></li>
                            <li><a href="">Spa</a></li>
                            <li><a href="">Harness</a></li>
                            <li><a href="">Dog Food</a></li>
                            <li><a href="">Toy 2024</a></li>
                            <li><a href="">Collar PAWS</a></li>
                            <li><a href="">32 Ball</a></li>
                            <li><a href="">Dog Toys</a></li>
                            <li><a href="">PINK PAWS BISCUITS 600</a></li>
                            <li><a href="">Pedigree</a></li>
                            <li><a href="">Me O Kitten Food DENTAL</a></li>
                            <li><a href="">Fit 32</a></li>
                            <li><a href="">Bed</a></li>
                            <li><a href="">Bowl  Dog Treats</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Popular searches -->


   <!-- Collection -->
   <?php if(!empty($offeralldata)){ ?>
   <!-- <div class="collection-box tle-bold section">
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
                     <a href="<?= $offer->link_url ?>" class="collection-grid-item__title-wrapper">
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
   </div> -->
   <!-- End Collection -->
   <?php } ?>
