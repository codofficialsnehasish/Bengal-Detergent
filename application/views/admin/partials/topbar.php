<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="background:#ffffff;">
                <a href="<?= base_url('admin/dashboard/');?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= get_logo();?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= get_logo();?>" alt="" height="17">
                    </span>
                </a>
  
                
                <a href="<?= admin_url('dashboard')?>" class="logo logo-light">
                    <span class="logo-sm">
                    <!-- <h3>SOLAR TATTOO</h3> -->
                        <img src="<?= get_logo();?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                    <!-- <h3>SOLAR TATTOO</h3> -->
                        <img src="<?= get_logo();?>" alt="" height="50" style=""> 
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- <div class="d-none d-sm-block">
                <div class="dropdown pt-3 d-inline-block">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create <i class="mdi mdi-chevron-down"></i>
                        </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="d-flex">
            <?php if($this->auth_user->role == "admin"){ ?>
            <div class="d-none d-sm-block">
                <div class="dropdown pt-3 d-inline-block text text-center">
                    <a class="btn btn-success text text-center dropdown-toggle" href="<?= base_url('employee-management/dashboard') ?>">Go to Employee Management <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php } ?>
            <button type="button" onclick="javascript:window.location.href='<?= base_url();?>'" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <i class="mdi mdi-eye"></i> -->
                    <i class="fas fa-home"></i>
            </button>
            <!-- App Search-->
            <!-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" id="search-input" placeholder="Search..." onkeyup="search()">
                    <span class="fa fa-search"></span>
                </div>
            </form> -->

            <!-- <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <!-- <div class="dropdown d-none d-md-block ms-2">
                <button type="button" class="btn header-item waves-effect"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="me-2" src="<?= base_url('assets/admin/images/flags/us_flag.jpg');?>" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    
                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= base_url('assets/admin/images/flags/germany_flag.jpg');?>" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                    </a>

                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= base_url('assets/admin/images/flags/italy_flag.jpg');?>" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                    </a>

                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= base_url('assets/admin/images/flags/french_flag.jpg');?>" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                    </a>

                    
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= base_url('assets/admin/images/flags/spain_flag.jpg');?>" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                    </a>

                     
                      <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= base_url('assets/admin/images/flags/russia_flag.jpg');?>" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                    </a>
                </div>
            </div> --> 

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                                            <i class="mdi mdi-message-text-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New Message received</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-info rounded-circle font-size-16">
                                            <i class="mdi mdi-glass-cocktail"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It is a long established fact that a reader will</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-danger rounded-circle font-size-16">
                                            <i class="mdi mdi-message-text-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New Message received</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                View all
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div style="width: 0;border-right: 1px solid #c3c6d0;height: calc(4.375rem - 2rem);margin: auto 1rem;"></div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size:15px;"><?= $this->auth_user->full_name; ?></span>
                    <img class="rounded-circle header-profile-user" src="<?= get_user_image($this->auth_user->user_image);?>"
                        alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">  
                    <?php //if(is_admin()):?>               
                    <a class="dropdown-item" href="<?= admin_url('changepassword')?>"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> Change Password</a>
                    <div class="dropdown-divider"></div>
                    <?php //endif;?>
                    <a class="dropdown-item text-danger" href="<?= admin_url('dashboard/logout')?>"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline"></i>
                </button>
            </div> -->
            
        </div>
    </div>
</header>

<script>
    // function search() {
    //     var searchText = document.getElementById('search-input').value;
    //     var found = window.find(searchText);
    //     // if (!found) {
    //     //     alert('No results found.');
    //     // }
    // }
</script>