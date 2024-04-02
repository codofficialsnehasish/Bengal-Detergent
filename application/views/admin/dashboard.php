<div class="page-content">
                    <div class="container-fluid">
                    <?php if($this->auth_user->role=='admin'){?>
                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Dashboard</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to <?= $this->settings->application_name?> Dashboard</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <!--<div class="dropdown">-->
                                        <!--    <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">-->
                                        <!--        <i class="mdi mdi-cog me-2"></i> Settings-->
                                        <!--    </button>-->
                                            <!--<div class="dropdown-menu dropdown-menu-end">-->
                                            <!--    <a class="dropdown-item" href="#">Action</a>-->
                                            <!--    <a class="dropdown-item" href="#">Another action</a>-->
                                            <!--    <a class="dropdown-item" href="#">Something else here</a>-->
                                            <!--    <div class="dropdown-divider"></div>-->
                                            <!--    <a class="dropdown-item" href="#">Separated link</a>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/04.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Visitors</h5>
                                            <?php 
                                                $percentageChange = (($today_visitor - $previous_visitor) / abs($previous_visitor + $today_visitor)) * 100;
                                            ?>
                                            <h4 class="fw-medium font-size-24">
                                                <?= $today_visitor; ?> 
                                                <?php if($percentageChange > 0){ ?>
                                                    <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                                <?php }else{ ?>
                                                    <i class="mdi mdi-arrow-down text-danger ms-2"></i> 
                                                <?php } ?>
                                            </h4>
                                            <?php if($percentageChange > 0){ ?>
                                            <div class="mini-stat-label bg-success">
                                                <p class="mb-0">+<?= round($percentageChange) . "%" ?></p>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="mini-stat-label bg-danger">
                                                <p class="mb-0"><?= round($percentageChange) . "%" ?></p>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <a href="<?= base_url('admin/products/')?>">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <div class="float-start mini-stat-img me-4">
                                                    <img src="<?= base_url('assets/admin/images/services-icon/01.png') ?>" alt="">
                                                </div>
                                                <h5 class="font-size-16 text-uppercase text-white-50">Products</h5>
                                                <h4 class="fw-medium font-size-24" style="color:white;"><?= $total_product ?> <!--<i class="mdi mdi-arrow-up text-success ms-2"></i>--> </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <a href="<?= base_url('admin/dristributor/')?>">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <div class="float-start mini-stat-img me-4">
                                                    <img src="<?= base_url('assets/admin/images/services-icon/07.png') ?>" alt="">
                                                </div>
                                                <h5 class="font-size-16 text-uppercase text-white-50">Dristributor</h5>
                                                <h4 class="fw-medium font-size-24" style="color:white;">
                                                    <!-- <span class="text-success">0</span> -->
                                                    <span class="badge rounded-pill bg-success"><?= $active_total_distributer; ?></span>
                                                    <span class="badge rounded-pill bg-danger"><?= $inactive_total_distributer; ?></span>
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <a href="<?= base_url('admin/team-lead/')?>">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <div class="float-start mini-stat-img me-4">
                                                    <img src="<?= base_url('assets/admin/images/services-icon/08.png') ?>" alt="">
                                                </div>
                                                <h5 class="font-size-16 text-uppercase text-white-50">Retailer</h5>
                                                <h4 class="fw-medium font-size-24" style="color:white;">
                                                    <span><?= $active_retailer_count; ?></span>
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- <div class="row"> -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Monthly Earning</h4>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div>
                                                    <div id="chart-with-area" class="ct-chart earning ct-golden-section">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-center">
                                                            <p class="text-muted mb-4">This month</p>
                                                            <h3>₹ 34,252</h3>
                                                            <p class="text-muted mb-5">It will be as simple as in fact it
                                                                will be occidental.</p>
                                                            <span class="peity-donut"
                                                                data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                                                data-width="72" data-height="72">4/5</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-center">
                                                            <p class="text-muted mb-4">Last month</p>
                                                            <h3>₹ 36,253</h3>
                                                            <p class="text-muted mb-5">It will be as simple as in fact it
                                                                will be occidental.</p>
                                                            <span class="peity-donut"
                                                                data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }'
                                                                data-width="72" data-height="72">3/5</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        <!-- </div> -->
                        <!-- end row -->

                        <!--    <div class="col-xl-5">-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-6">-->
                        <!--                <div class="card text-center">-->
                        <!--                    <div class="card-body">-->
                        <!--                        <div class="py-4">-->
                        <!--                            <i-->
                        <!--                                class="ion ion-ios-checkmark-circle-outline display-4 text-success"></i>-->

                        <!--                            <h5 class="text-primary mt-4">Order Successful</h5>-->
                        <!--                            <p class="text-muted">Thanks you so much for your order.</p>-->
                        <!--                            <div class="mt-4">-->
                        <!--                                <a href="" class="btn btn-primary btn-sm">Chack Status</a>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->

                        <!--            </div>-->
                        <!--            <div class="col-md-6">-->
                        <!--                <div class="card bg-primary">-->
                        <!--                    <div class="card-body">-->
                        <!--                        <div class="text-center text-white py-4">-->
                        <!--                            <h5 class="mb-4 text-white-50 font-size-16">Top Product Sale</h5>-->
                        <!--                            <h1>1452</h1>-->
                        <!--                            <p class="font-size-14 pt-1">Computer</p>-->
                        <!--                            <p class="text-white-50 mb-0">At solmen va esser necessi far uniform-->
                        <!--                                myth... <a href="#" class="text-white">View more</a></p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->

                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-12">-->
                        <!--                <div class="card">-->
                        <!--                    <div class="card-body">-->
                        <!--                        <h4 class="card-title mb-4">Client Reviews</h4>-->
                        <!--                        <p class="text-muted mb-3 pb-4">" Everyone realizes why a new common-->
                        <!--                            language would be desirable one could refuse to pay expensive-->
                        <!--                            translators it would be necessary. "</p>-->
                        <!--                        <div class="float-end mt-2">-->
                        <!--                            <a href="#" class="text-primary">-->
                        <!--                                <i class="mdi mdi-arrow-right h5"></i>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <h6 class="mb-0"><img src="assets/images/users/user-3.jpg" alt=""-->
                        <!--                                class="avatar-sm rounded-circle me-2"> James Athey</h6>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- end row -->

                        <!--<div class="row">-->
                        <!--    <div class="col-xl-8">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <h4 class="card-title mb-4">Latest Transaction</h4>-->
                        <!--                <div class="table-responsive">-->
                        <!--                    <table class="table table-hover table-centered table-nowrap mb-0">-->
                        <!--                        <thead>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="col">(#) Id</th>-->
                        <!--                                <th scope="col">Name</th>-->
                        <!--                                <th scope="col">Date</th>-->
                        <!--                                <th scope="col">Amount</th>-->
                        <!--                                <th scope="col" colspan="2">Status</th>-->
                        <!--                            </tr>-->
                        <!--                        </thead>-->
                        <!--                        <tbody>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="row">#14256</th>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <img src="assets/images/users/user-2.jpg" alt=""-->
                        <!--                                            class="avatar-xs rounded-circle me-2"> Philip Smead-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                                <td>15/1/2018</td>-->
                        <!--                                <td>$94</td>-->
                        <!--                                <td><span class="badge bg-success">Delivered</span></td>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="row">#14257</th>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <img src="assets/images/users/user-3.jpg" alt=""-->
                        <!--                                            class="avatar-xs rounded-circle me-2"> Brent Shipley-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                                <td>16/1/2019</td>-->
                        <!--                                <td>$112</td>-->
                        <!--                                <td><span class="badge bg-warning">Pending</span></td>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="row">#14258</th>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <img src="assets/images/users/user-4.jpg" alt=""-->
                        <!--                                            class="avatar-xs rounded-circle me-2"> Robert Sitton-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                                <td>17/1/2019</td>-->
                        <!--                                <td>$116</td>-->
                        <!--                                <td><span class="badge bg-success">Delivered</span></td>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="row">#14259</th>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <img src="assets/images/users/user-5.jpg" alt=""-->
                        <!--                                            class="avatar-xs rounded-circle me-2"> Alberto Jackson-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                                <td>18/1/2019</td>-->
                        <!--                                <td>$109</td>-->
                        <!--                                <td><span class="badge bg-danger">Cancel</span></td>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="row">#14260</th>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <img src="assets/images/users/user-6.jpg" alt=""-->
                        <!--                                            class="avatar-xs rounded-circle me-2"> David Sanchez-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                                <td>19/1/2019</td>-->
                        <!--                                <td>$120</td>-->
                        <!--                                <td><span class="badge bg-success">Delivered</span></td>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        <!--                            <tr>-->
                        <!--                                <th scope="row">#14261</th>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <img src="assets/images/users/user-2.jpg" alt=""-->
                        <!--                                            class="avatar-xs rounded-circle me-2"> Philip Smead-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                                <td>15/1/2018</td>-->
                        <!--                                <td>$94</td>-->
                        <!--                                <td><span class="badge bg-warning">Pending</span></td>-->
                        <!--                                <td>-->
                        <!--                                    <div>-->
                        <!--                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>-->
                        <!--                                    </div>-->
                        <!--                                </td>-->
                        <!--                            </tr>-->
                        <!--                        </tbody>-->
                        <!--                    </table>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-xl-4">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <h4 class="card-title mb-4">Chat</h4>-->
                        <!--                <div class="chat-conversation">-->
                        <!--                    <ul class="conversation-list" data-simplebar style="max-height: 367px;">-->
                        <!--                        <li class="clearfix">-->
                        <!--                            <div class="chat-avatar">-->
                        <!--                                <img src="assets/images/users/user-2.jpg"-->
                        <!--                                    class="avatar-xs rounded-circle" alt="male">-->
                        <!--                                <span class="time">10:00</span>-->
                        <!--                            </div>-->
                        <!--                            <div class="conversation-text">-->
                        <!--                                <div class="ctext-wrap">-->
                        <!--                                    <span class="user-name">John Deo</span>-->
                        <!--                                    <p>-->
                        <!--                                        Hello!-->
                        <!--                                    </p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li class="clearfix odd">-->
                        <!--                            <div class="chat-avatar">-->
                        <!--                                <img src="assets/images/users/user-3.jpg"-->
                        <!--                                    class="avatar-xs rounded-circle" alt="Female">-->
                        <!--                                <span class="time">10:01</span>-->
                        <!--                            </div>-->
                        <!--                            <div class="conversation-text">-->
                        <!--                                <div class="ctext-wrap">-->
                        <!--                                    <span class="user-name">Smith</span>-->
                        <!--                                    <p>-->
                        <!--                                        Hi, How are you? What about our next meeting?-->
                        <!--                                    </p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li class="clearfix">-->
                        <!--                            <div class="chat-avatar">-->
                        <!--                                <img src="assets/images/users/user-2.jpg"-->
                        <!--                                    class="avatar-xs rounded-circle" alt="male">-->
                        <!--                                <span class="time">10:04</span>-->
                        <!--                            </div>-->
                        <!--                            <div class="conversation-text">-->
                        <!--                                <div class="ctext-wrap">-->
                        <!--                                    <span class="user-name">John Deo</span>-->
                        <!--                                    <p>-->
                        <!--                                        Yeah everything is fine-->
                        <!--                                    </p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li class="clearfix odd">-->
                        <!--                            <div class="chat-avatar">-->
                        <!--                                <img src="assets/images/users/user-3.jpg"-->
                        <!--                                    class="avatar-xs rounded-circle" alt="male">-->
                        <!--                                <span class="time">10:05</span>-->
                        <!--                            </div>-->
                        <!--                            <div class="conversation-text">-->
                        <!--                                <div class="ctext-wrap">-->
                        <!--                                    <span class="user-name">Smith</span>-->
                        <!--                                    <p>-->
                        <!--                                        Wow that's great-->
                        <!--                                    </p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                        <li class="clearfix odd">-->
                        <!--                            <div class="chat-avatar">-->
                        <!--                                <img src="assets/images/users/user-3.jpg"-->
                        <!--                                    class="avatar-xs rounded-circle" alt="male">-->
                        <!--                                <span class="time">10:08</span>-->
                        <!--                            </div>-->
                        <!--                            <div class="conversation-text">-->
                        <!--                                <div class="ctext-wrap">-->
                        <!--                                    <span class="user-name mb-2">Smith</span>-->

                        <!--                                    <img src="assets/images/small/img-1.jpg" alt="" height="48"-->
                        <!--                                        class="rounded me-2">-->
                        <!--                                    <img src="assets/images/small/img-2.jpg" alt="" height="48"-->
                        <!--                                        class="rounded">-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <!--                    </ul>-->
                        <!--                    <div class="row">-->
                        <!--                        <div class="col-sm-9 col-8 chat-inputbar">-->
                        <!--                            <input type="text" class="form-control chat-input"-->
                        <!--                                placeholder="Enter your text">-->
                        <!--                        </div>-->
                        <!--                        <div class="col-sm-3 col-4 chat-send">-->
                        <!--                            <div class="d-grid">-->
                        <!--                                <button type="submit" class="btn btn-success">Send</button>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                           </div>
                        </div>
                        <!-- end row -->
                    <?php } 
                    elseif($this->auth_user->role=='dristributor'){ ?>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Profile Card -->
                                    <div class="card" style="background-color: #f8f8fa;border: none;">
                                        <img src="<?= get_image($this->auth_user->user_image); ?>" class="card-img-top" alt="Profile Picture">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $this->auth_user->full_name;?></h5>
                                            <p class="card-text"><?= $this->auth_user->user_id;?></p>
                                            <p><a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" class="btn btn-outline-primary btn-block" style="width: 100%;">Edit Profile</a></p>
                                            <!-- Add more profile details -->
                                        </div>

                                        <!--  Modal content for the above example -->
                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php $item = get_user_by_id($this->auth_user->id); ?>
                                                        <?= form_open_multipart('admin/dristributor/updateProcess', 'class="custom-validation"');?>
                                                        <input type="hidden" name="id" value="<?= $item->id?>" />
                                                        
                                                            <div class="row">
                                                                <div class="col-lg-9">
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Edit Personal Details
                                                                    </div>
                                                                    <div class="card-body row">
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">First Name</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Name" name="first_name" value="<?= $item->first_name;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Last Name</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Name" name="last_name" value="<?= $item->last_name;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">eMail</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter eMail" name="email" value="<?= $item->email;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Phone Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number" value="<?= $item->phone_number;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Optional Phone Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="number" type="number" class="form-control" placeholder="Enter Optional Phone Number" value="<?= $item->alt_phone_number;?>" name="alt_phone_number" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Address</label>
                                                                            <div>
                                                                            <textarea class="form-control" rows="3" name="address" required><?= $item->address;?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Pin Code</label>
                                                                            <div>
                                                                            <input data-parsley-type="number" type="number" value="<?= $item->zip_code;?>" class="form-control" placeholder="Enter pin code" name="zip_code" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Police Station</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" value="<?= $item->police_station;?>" class="form-control"  placeholder="Enter Police Station" name="police_station" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Edit Business Details
                                                                    </div>
                                                                    <div class="card-body row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Business Name</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Shop Name" name="shop_name" value="<?= $item->shop_name;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Business Address</label>
                                                                            <div>
                                                                            <textarea class="form-control" rows="3" name="shop_address" required><?= $item->shop_address;?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Business Pin Code</label>
                                                                            <div>
                                                                            <input data-parsley-type="number" type="number" class="form-control" value="<?= $item->shop_pin_code;?>" placeholder="Enter Business Pin Code" name="shop_pin_code" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Police Station</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" value="<?= $item->shop_police_station;?>" placeholder="Enter Police Station" name="shop_police_station" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Pan Card Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Pan" name="pan_no" value="<?= $item->pan_no;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Pan Card Document Proof</label>
                                                                            <div class="mb-3">
                                                                            <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->pan_proof);?>" data-holder-rendered="true" style="display:<?= $item->pan_proof!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div>
                                                                            <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="pan_proof">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">GST Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter GST" name="gst_no" value="<?= $item->gst_no;?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">GST Document Proof</label>
                                                                            <div class="mb-3">
                                                                            <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->gst_proof);?>" data-holder-rendered="true" style="display:<?= $item->gst_proof!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div>
                                                                            <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="gst_proof" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Trade License</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Trade License" name="trade_license" value="<?= $item->trade_licence_no;?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Trade License Proof</label>
                                                                            <div class="mb-3">
                                                                            <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->trade_licence_proof);?>" data-holder-rendered="true" style="display:<?= $item->trade_licence_proof!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div>
                                                                            <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="trade_license_proof" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Edit Work Details
                                                                    </div>
                                                                    <div class="card-body row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Preferable Pin Code <b style="color: red;">Coma(,) Separated</b></label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Ex. 700003,582365,712406" value="<?= $item->prefarable_zip_code;?>" name="prefer_pin" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="col-lg-3">
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                            Image
                                                                    </div>
                                                                    <div class="card-body text-center">
                                                                            <div class="mb-0">
                                                                            <img class="img-thumbnail rounded me-2" id="blahe" alt="" width="200" src="<?= get_image($item->user_image);?>" data-holder-rendered="true" style="display:<?= $item->user_image!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div class="mb-0">
                                                                            <input type="file" name="file" class="filestyle" id="imgInpedit" data-input="false" data-buttonname="btn-secondary">
                                                                            <input type="hidden" name="media_id" id="media_id" />
                                                                            <input type="hidden" name="hdn_media_id" id="media_id" value="<?= $item->user_image;?>" />
                                                                            <!-- <a href="javascript:;" id="openLibrary">or Choose From Library</a> -->
                                                                            </div> 
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Publish
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- <div class="mb-3">
                                                                            <label class="form-label mb-3 d-flex">Visiblity</label>
                                                                            <div class="form-check form-check-inline">
                                                                            <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" <?= check_uncheck($item->status,1);?>>
                                                                            <label class="form-check-label" for="customRadioInline1">Active</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                            <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" <?= check_uncheck($item->status,0);?>>
                                                                            <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                                                            </div>
                                                                        </div> -->
                                                                        
                                                                        <div class="mb-0">
                                                                            <div>
                                                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                                            Save Changes
                                                                            </button>
                                                                            <!-- <button type="reset" class="btn btn-secondary waves-effect">
                                                                                Cancel
                                                                                </button> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <!-- end col -->
                                                            </div>
                                                            <!-- end row -->
                                                        <?= form_close();?>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                                <div class="row col-md-9">
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/01.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">All Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,'all');?> <!--<i class="mdi mdi-arrow-up text-success ms-2"></i>--> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/12.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Completed Order</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,1);?> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/11.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Cancelled Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,'cancelled');?></h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/10.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Active Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,'pending');?></h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/07.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Retailers Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_retailer_orders_count($this->auth_user->id,'pending');?></h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="#">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/08.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50"><?php echo date('F'); ?> Sales</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_achieved_target_data($this->auth_user->id,date('Y-m')); ?> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="#">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/13.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50"><?php echo date('F', strtotime('-1 month', strtotime(date('Y-m-d')))); ?> Sales</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_achieved_target_data($this->auth_user->id,date('Y-m')); ?> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    elseif($this->auth_user->role=='employee'){ ?>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Profile Card -->
                                    <div class="card" style="background-color: #f8f8fa;border: none;">
                                        <img src="<?= get_image($this->auth_user->user_image); ?>" class="card-img-top" alt="Profile Picture">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $this->auth_user->full_name;?></h5>
                                            <h6 class="card-text"><?= $this->auth_user->user_id;?></h6>
                                            <h6 class="card-text mb-3">Designation : <?= get_name("designation_master",$this->auth_user->designation); ?></h6>
                                            <p><a href="<?= employee_url('employees/details/'.$this->auth_user->id);?>" class="btn btn-outline-primary btn-block" style="width: 100%;">Edit Profile</a></p>
                                            <!-- Add more profile details -->
                                        </div>

                                        <!--  Modal content for the above example -->
                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php $item = get_user_by_id($this->auth_user->id); ?>
                                                        <?= form_open_multipart('admin/dristributor/updateProcess', 'class="custom-validation"');?>
                                                        <input type="hidden" name="id" value="<?= $item->id?>" />
                                                        
                                                            <div class="row">
                                                                <div class="col-lg-9">
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Edit Personal Details
                                                                    </div>
                                                                    <div class="card-body row">
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">First Name</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Name" name="first_name" value="<?= $item->first_name;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Last Name</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Name" name="last_name" value="<?= $item->last_name;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">eMail</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter eMail" name="email" value="<?= $item->email;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Phone Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number" value="<?= $item->phone_number;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Optional Phone Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="number" type="number" class="form-control" placeholder="Enter Optional Phone Number" value="<?= $item->alt_phone_number;?>" name="alt_phone_number" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Address</label>
                                                                            <div>
                                                                            <textarea class="form-control" rows="3" name="address" required><?= $item->address;?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Pin Code</label>
                                                                            <div>
                                                                            <input data-parsley-type="number" type="number" value="<?= $item->zip_code;?>" class="form-control" placeholder="Enter pin code" name="zip_code" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Police Station</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" value="<?= $item->police_station;?>" class="form-control"  placeholder="Enter Police Station" name="police_station" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Edit Business Details
                                                                    </div>
                                                                    <div class="card-body row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Business Name</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Shop Name" name="shop_name" value="<?= $item->shop_name;?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Business Address</label>
                                                                            <div>
                                                                            <textarea class="form-control" rows="3" name="shop_address" required><?= $item->shop_address;?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Business Pin Code</label>
                                                                            <div>
                                                                            <input data-parsley-type="number" type="number" class="form-control" value="<?= $item->shop_pin_code;?>" placeholder="Enter Business Pin Code" name="shop_pin_code" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Police Station</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" value="<?= $item->shop_police_station;?>" placeholder="Enter Police Station" name="shop_police_station" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Pan Card Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Pan" name="pan_no" value="<?= $item->pan_no;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Pan Card Document Proof</label>
                                                                            <div class="mb-3">
                                                                            <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->pan_proof);?>" data-holder-rendered="true" style="display:<?= $item->pan_proof!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div>
                                                                            <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="pan_proof">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">GST Number</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter GST" name="gst_no" value="<?= $item->gst_no;?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">GST Document Proof</label>
                                                                            <div class="mb-3">
                                                                            <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->gst_proof);?>" data-holder-rendered="true" style="display:<?= $item->gst_proof!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div>
                                                                            <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="gst_proof" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Trade License</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Enter Trade License" name="trade_license" value="<?= $item->trade_licence_no;?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Trade License Proof</label>
                                                                            <div class="mb-3">
                                                                            <img class="img-thumbnail rounded me-2" alt="" width="200" src="<?= get_image($item->trade_licence_proof);?>" data-holder-rendered="true" style="display:<?= $item->trade_licence_proof!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div>
                                                                            <input data-parsley-type="file" type="file" class="form-control" placeholder="Pan" name="trade_license_proof" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Edit Work Details
                                                                    </div>
                                                                    <div class="card-body row">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Preferable Pin Code <b style="color: red;">Coma(,) Separated</b></label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="Ex. 700003,582365,712406" value="<?= $item->prefarable_zip_code;?>" name="prefer_pin" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="col-lg-3">
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                            Image
                                                                    </div>
                                                                    <div class="card-body text-center">
                                                                            <div class="mb-0">
                                                                            <img class="img-thumbnail rounded me-2" id="blahe" alt="" width="200" src="<?= get_image($item->user_image);?>" data-holder-rendered="true" style="display:<?= $item->user_image!=0?'block':'none';?>">
                                                                            </div>
                                                                            <div class="mb-0">
                                                                            <input type="file" name="file" class="filestyle" id="imgInpedit" data-input="false" data-buttonname="btn-secondary">
                                                                            <input type="hidden" name="media_id" id="media_id" />
                                                                            <input type="hidden" name="hdn_media_id" id="media_id" value="<?= $item->user_image;?>" />
                                                                            <!-- <a href="javascript:;" id="openLibrary">or Choose From Library</a> -->
                                                                            </div> 
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header bg-primary text-light">
                                                                        Publish
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- <div class="mb-3">
                                                                            <label class="form-label mb-3 d-flex">Visiblity</label>
                                                                            <div class="form-check form-check-inline">
                                                                            <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" <?= check_uncheck($item->status,1);?>>
                                                                            <label class="form-check-label" for="customRadioInline1">Active</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                            <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" <?= check_uncheck($item->status,0);?>>
                                                                            <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                                                            </div>
                                                                        </div> -->
                                                                        
                                                                        <div class="mb-0">
                                                                            <div>
                                                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                                            Save Changes
                                                                            </button>
                                                                            <!-- <button type="reset" class="btn btn-secondary waves-effect">
                                                                                Cancel
                                                                                </button> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <!-- end col -->
                                                            </div>
                                                            <!-- end row -->
                                                        <?= form_close();?>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                                <div class="row col-md-9">
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/01.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">All Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,'all');?> <!--<i class="mdi mdi-arrow-up text-success ms-2"></i>--> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/12.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Completed Order</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,1);?> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/11.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Cancelled Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,'cancelled');?></h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders/dristibuter-order')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/10.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Active Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_any_orders_count($this->auth_user->id,'pending');?></h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="<?= admin_url('orders')?>">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/07.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50">Retailers Orders</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_retailer_orders_count($this->auth_user->id,'pending');?></h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="#">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/08.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50"><?php echo date('F'); ?> Sales</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_achieved_target_data($this->auth_user->id,date('Y-m')); ?> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stat bg-primary text-white">
                                            <a href="#">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <div class="float-start mini-stat-img me-4">
                                                            <img src="<?= base_url('assets/admin/images/services-icon/13.png') ?>" alt="">
                                                        </div>
                                                        <h5 class="font-size-16 text-uppercase text-white-50"><?php echo date('F', strtotime('-1 month', strtotime(date('Y-m-d')))); ?> Sales</h5>
                                                        <h4 class="fw-medium font-size-24" style="color:white;"><?= get_achieved_target_data($this->auth_user->id,date('Y-m')); ?> </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>



                    </div> <!-- container-fluid -->
</div>