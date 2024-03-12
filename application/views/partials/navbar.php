<?php 
$categoriesMenu=$this->select->get_parent_categories();

		$menucon['where']['is_visible'] = 1;
        $menucon['where']['is_menu'] = 1;
        $menucon['where']['parent_id'] = 0;
		$menucon['tblName'] = 'categories';
        $menucategories = $this->select->getResult($menucon);
?>

<?php $this->load->view('partials/topbar');?>

<body class="template-product template-index diva home2-default">
        <!-- Page Wrapper -->
        <div class="pageWrapper">
            <!-- Search Form Drawer -->
            <div class="search">
                <div class="search__form">
                    <!-- <form class="search-bar__form" action="#"> -->
                        <form class="search-bar__form" id="frid" action="<?= base_url('search/') ?>" method="get">
                            <button id="sbtnid" class="go-btn search__button" type="submit"><i class="icon an an-search"></i></button>
                            <input class="search__input" id="sbtnidinp" name="name" type="text" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off" />
                        </form>
                    <!-- </form> -->
                    <button type="button" class="search-trigger close-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"><i class="icon an an-times"></i></button>
                </div>
            </div>
            <!-- End Search Form Drawer -->
            
            <!-- Main Header -->
            <div class="header-section clearfix animated hdr-sticky">
                <!-- Desktop Header -->
                <div class="header-1">
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
                                            <li class="lvl1 parent dropdown">
                                                <a href="javascript:void(0)">Category <i class="an an-angle-down"></i></a>
                                                  <ul class="dropdown">
                                                    <?php if($menucategories){ foreach ($menucategories as $catagory) { ?>
                                                    <li>
                                                        <?php $sub_catagory = $this->select->get_sub_categories_by_id($catagory->cat_id,"is_menu") ?>
                                                        <a href="<?= base_url('products/'.$catagory->cat_slug); ?>" class="site-nav"><?= $catagory->cat_name ?> <?php if($sub_catagory){ ?><i class="an an-angle-down"></i><?php }else{echo '';} ?></a>
                                                        <?php if($sub_catagory){ ?>
                                                        <ul class="dropdown">
                                                            <?php foreach($sub_catagory as $sub){ ?>
                                                            <li><a href="<?= base_url('products/'.$sub->cat_slug); ?>" class="site-nav"><?= $sub->cat_name; ?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                        <?php } ?>
                                                    </li>
                                                    <?php } }?>
                                                    <!-- <li><a href="lookbook-3columns.html" class="site-nav">3 Columns</a></li>
                                                    <li><a href="lookbook-4columns.html" class="site-nav">4 Columns</a></li>
                                                    <li><a href="lookbook-5columns.html" class="site-nav">5 Columns + Fullwidth</a></li>
                                                    <li><a href="lookbook-shop.html" class="site-nav last">Lookbook Shop</a></li> -->
                                                </ul>
                                            </li>

                                            <li class="lvl1 parent dropdown">
                                                <a href="<?= base_url('/about_us'); ?>">About Us <i class="an an-angle-down"></i></a>
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
                                                    <li class="item"><a href="<?= base_url('/my-dashboard'); ?>">Profile</a></li>
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
                        <a href="<?= base_url('/about_us'); ?>">About Us <i class="an an-plus"></i></a>
                    </li>
                  <!-- <li class="lvl1 parent megamenu">
                        <a href="#">Blog <i class="an an-plus"></i></a>
                    </li> -->
                   <li class="lvl1 parent megamenu">
                        <a href="<?= base_url('/contact_us'); ?>">Contact Us <i class="an an-plus"></i></a>
                    </li>
                </ul>
            </div>
            <!-- End Mobile Menu -->