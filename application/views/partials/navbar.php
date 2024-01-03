<?php 
$categoriesMenu=$this->select->get_parent_categories();

		$menucon['where']['is_visible'] = 1;
        $menucon['where']['is_menu'] = 1;
		$menucon['tblName'] = 'categories';
        $menucategories = $this->select->getResult($menucon);
?>


<?php $this->load->view('partials/topbar');?>


<!-- <div class="header_btm_area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3"> 
                <a class="logo" href="<= base_url(''); ?>"> <img alt="" src="<= get_logo(); ?>"></a> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 text-right">
                <div class="menu_wrap">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="<= base_url(''); ?>">home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li>
                                    <a href="<= base_url('/products/all_products'); ?>">Products </a>
                                </li>
                                <li><a href="<= base_url('/contact_us'); ?>">Contact</a></li>
                                <li><a href="<= base_url('/contact_us'); ?>">Faq</a></li>
                            </ul>
                        </nav>
                    </div>
              				
                  <div class="mobile-menu text-right ">
                     <nav>
                        <ul>
                           <li><a href="<= base_url(''); ?>">home</a></li>
                           <li>
                               <a href="<= base_url('/products/all_products'); ?>">Menu </a>
                           </li>
                           <li><a href="#">About Us</a></li>
                           <li><a href="<= base_url('/contact_us'); ?>">Contact</a></li>
                        </ul>
                     </nav>
                  </div>
         
                <div class="right_menu">
                   <ul class="nav justify-content-end">
                      <li>
                         <div class="offer"><a href="<= base_url('/products/all_offer_products') ?>"><img alt="" src="<?= base_url('assets/site/img/offer.png'); ?>"></a></div>
                      </li>
                      <li>
                         <div class="search_icon"><a class="btn btn-outline-warning" style="padding: 1px 5px; font-size: 14px !important;" href="<?= base_url('login-distributer') ?>">Register as Distributer</a></div>
                      </li>
                      <li>
                         <div class="search_icon"><a href="<= base_url('/login'); ?>"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                      </li>

                      <li>
                         <div class="cart_menu_area">
                           <?php 
                              // $c = $this->cart_model->get_cart_by_buyer();
                              // $val = 0;
                              // if($c == false){
                              //    $val = 0;
                              // }elseif(count($c) > 0){
                              //    $val = count($c);
                              // }
                           ?>                            
                           <div class="cart_icon">
                               <a href="<= base_url('/cart'); ?>"><i class="fa fa-shopping-bag " aria-hidden="true"></i></a>
                               <span class="cart_number cartcount"><= $val; ?></span>
                            </div>
                         </div>
                      </li>
                   </ul>
                </div>
             </div>
          </div>									
       </div>
    </div>
 </div>
</header> -->


  





<body class="template-product template-index diva home2-default">
        <!-- Page Wrapper -->
        <div class="pageWrapper">
            <!-- Promotion Bar -->
            <div class="notification-bar mobilehide">
                <a href="<?= base_url('/products/all_products'); ?>" class="notification-bar__message">20% off your very first purchase, use promo code: bengal detergent</a>
                <span class="close-announcement icon an an-times"></span>
            </div>
            <!-- End Promotion Bar -->

            <!-- Search Form Drawer -->
            <div class="search">
                <div class="search__form">
                    <form class="search-bar__form" action="#">
                        <button class="go-btn search__button" type="submit"><i class="icon an an-search"></i></button>
                        <input class="search__input" type="search" name="search" value="" id="input_search" placeholder="Search entire store..." aria-label="Search" autocomplete="off" />
                    </form>
                    <button type="button" class="search-trigger close-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"><i class="icon an an-times"></i></button>
                </div>
            </div>
            <!-- End Search Form Drawer -->

            <!-- Main Header -->
            <div class="header-section clearfix animated hdr-sticky">
                <!-- Desktop Header -->
                <div class="header-1">
                    <!-- Top Header -->
                    <div class="top-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                                    <p class="phone-no float-start"><i class="icon an an-phone me-1"></i><a href="tel:+91<?= $this->settings->contact_phone;?>"><?= $this->settings->contact_phone;?></a></p>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-md-none d-lg-block">
                                    <div class="text-center">
                                        <p class="top-header_middle-text">Free express shipping & import fees included</p>
                                    </div>
                                </div>
                                <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-none d-sm-block d-md-block d-lg-block">
                                    <div class="header-social">
                                        <ul class="justify-content-end list--inline social-icons">
                                            <li><a class="social-icons__link" href="<?= $this->settings->facebook_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook"><i class="icon an an-facebook"></i> <span class="icon__fallback-text">Facebook</span></a></li>
                                            <li><a class="social-icons__link" href="<?= $this->settings->twitter_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Twitter"><i class="icon an an-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                                            <li><a class="social-icons__link" href="<?= $this->settings->pinterest_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pinterest"><i class="icon an an-pinterest-p"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                                            <li><a class="social-icons__link" href="<?= $this->settings->instagram_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Instagram"><i class="icon an an-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                                            <li><a class="social-icons__link" href="<?= $this->settings->youtube_url;?>" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="YouTube"><i class="icon icon an an-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-2 col-sm-4 col-md-5 col-lg-4 text-end d-block d-sm-none d-md-none d-lg-none">
                                    <!-- Mobile User Links -->
                                    <div class="user-menu-dropdown">
                                        <span class="user-menu"><i class="an an-user-alt"></i></span>
                                        <!-- <ul class="customer-links list-inline" style="display:none;">
                                            <li class="item"><a href="#">Login</a></li>
                                            <li class="item"><a href="#">Register</a></li>
                                            <li class="item"><a href="#">Orders</a></li>
                                        </ul> -->
                                        <ul class="customer-links list-inline" style="display:none;">
                                            <?php if($this->auth_check){ ?>
                                                <li class="item"><a href="<?= base_url('/logout'); ?>">Logout</a></li>
                                            <?php }else{ ?>
                                                <li class="item"><a href="<?= base_url('/login'); ?>">Login</a></li>
                                                <li class="item"><a href="#" data-bs-toggle="modal" data-bs-target="#register-modal">Register</a></li>
                                                <!-- <li class="item"><a href="#">Orders</a></li> -->
                                            <?php } ?>
                                            <!-- <li class="item"><a href="#">Compare</a></li> -->
                                        </ul>
                                    </div>
                                    <!-- End Mobile User Links -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Header -->

                    <!-- Header -->
                    <div class="header-wrap d-flex">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-4 col-md-4 col-lg-8 d-block d-lg-none">
                                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Menu"><i class="icon an an-times"></i><i class="icon an an-bars"></i></button>
                                    <!-- Mobile Search -->
                                    <div class="site-header__search d-block d-lg-none mobile-search-icon">
                                        <button type="button" class="search-trigger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search"><i class="icon an an-search"></i></button>
                                    </div>
                                    <!-- End Mobile Search -->
                                </div>
                                <!-- Desktop Logo -->
                                <div class="logo col-4 col-sm-4 col-md-4 col-lg-2 align-self-center">
                                    <a href="<?= base_url(''); ?>"><img src="<?= get_logo(); ?>" alt="Diva Multipurpose Html Template" title="Diva Multipurpose Html Template" /></a>
                                </div>
                                <!-- End Desktop Logo -->
                                <!-- Desktop Navigation -->
                                <div class="col-2 col-sm-3 col-md-3 col-lg-8 d-none d-lg-block">
                                    <!-- Desktop Menu -->
                                    <nav class="grid__item" id="AccessibleNav">
                                        <ul id="siteNav" class="d-flex flex-wrap site-nav medium left ms-0 hidearrow">
                                            <li class="lvl1 parent dropdown">
                                                <a href="<?= base_url(''); ?>">Home <i class="an an-angle-down"></i></a>
                                            </li>
                                            <li class="lvl1 parent dropdown">
                                                <a href="<?= base_url('/products/all_products'); ?>">Shop <i class="an an-angle-down"></i></a>
                                            </li>

                                            <!-- <li class="lvl1 parent dropdown">
                                                <a href="#">Category <i class="an an-angle-down"></i></a>
                                            </li> -->

                                            <li class="lvl1 parent dropdown">
                                                <a href="#">About Us <i class="an an-angle-down"></i></a>
                                            </li>

                                            <!-- <li class="lvl1 parent dropdown">
                                                <a href="#">Blog <i class="an an-angle-down"></i></a>
                                            </li> -->

                                             <li class="lvl1 parent dropdown">
                                                <a href="<?= base_url('/contact_us'); ?>">Contact Us <i class="an an-angle-down"></i></a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                    <!-- End Desktop Menu -->
                                </div>
                                <!-- End Desktop Navigation -->
                                <!-- Right Side -->
                                <div class="col-4 col-sm-4 col-md-4 col-lg-2">
                                    <div class="right-action d-flex-align-center justify-content-end">
                                        <!-- Search -->
                                        <div class="item site-header__search d-none d-lg-block">
                                            <button type="button" class="search-trigger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search"><i class="icon an an-search"></i></button>
                                        </div>
                                        <!-- End Search -->
                                        <!-- User Links -->
                                        <div class="item user-menu-dropdown d-none d-sm-block d-md-block d-lg-block">
                                            <span class="user-menu" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Account"><i class="icon an an-user-alt"></i></span>
                                            <ul class="customer-links list-inline" style="display:none;">
                                                <?php if($this->auth_check){ ?>
                                                    <?php if($this->auth_user->role == 'teamlead'){ ?>
                                                        <li class="item"><a href="<?= base_url('authentication/add_distributor'); ?>">Add Dristributor</a></li>
                                                    <?php } ?>
                                                    <li class="item"><a href="<?= base_url('/logout'); ?>">Logout</a></li>
                                                <?php }else{ ?>
                                                    <li class="item"><a href="<?= base_url('/login'); ?>">Login</a></li>
                                                    <li class="item"><a href="#" data-bs-toggle="modal" data-bs-target="#register-modal">Register</a></li>
                                                    <!-- <li class="item"><a href="#">Orders</a></li> -->
                                                <?php } ?>
                                                <!-- <li class="item"><a href="#">Compare</a></li> -->
                                            </ul>
                                        </div>
                                        <!-- End User Links -->

                                        <!-- Minicart -->
                                        <div class="item site-cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart">
                                            <a href="#" class="site-header__cart btn-minicart" data-bs-toggle="modal" data-bs-target="#minicart-drawer" onclick="cart_popup_data()"><!-- fetchCart -->
                                                <i class="icon an an-shopping-bag"></i><?php //if($this->auth_check){ ?><span id="CartCount" class="site-header__cart-count .cartcount"></span> <?php //} ?>
                                            </a>  
                                        </div>
                                        <!-- End Minicart -->
                                    </div>
                                </div>
                                <!-- End Right Side -->
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->
                </div>
                <!-- End Desktop Header -->
            </div>
            <!-- End Main Header -->

            <!-- Mobile Menu -->
            <div class="mobile-nav-wrapper" role="navigation">
                <div class="closemobileMenu"><i class="icon an an-times-circle closemenu"></i> Close Menu</div>
                <ul id="MobileNav" class="mobile-nav">
                    <li class="lvl1 parent megamenu">
                        <a href="<?= base_url(''); ?>">Home <i class="an an-plus"></i></a>
                    </li>
               <li class="lvl1 parent megamenu">
                        <a href="<?= base_url('/products/all_products'); ?>">Shop <i class="an an-plus"></i></a>
                    </li>
                 <!-- <li class="lvl1 parent megamenu">
                        <a href="#">Category <i class="an an-plus"></i></a>
                    </li> -->
                   <li class="lvl1 parent megamenu">
                        <a href="#">About Us <i class="an an-plus"></i></a>
                    </li>
                  <!-- <li class="lvl1 parent megamenu">
                        <a href="#">Blog <i class="an an-plus"></i></a>
                    </li> -->
                   <li class="lvl1 parent megamenu">
                        <a href="#">Contact Us <i class="an an-plus"></i></a>
                    </li>
                </ul>
            </div>
            <!-- End Mobile Menu -->