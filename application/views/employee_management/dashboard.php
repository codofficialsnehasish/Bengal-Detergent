<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Employee Management Dashboard</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Welcome to <?= $this->settings->application_name?> Employee Management Dashboard</li>
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
                        <?php if($this->auth_user->role=='admin'){?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <a href="<?= employee_url('employees/')?>">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/14.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Total Employee</h5>
                                            <h4 class="fw-medium font-size-24" style="color:white;">
                                                <?= $employee_count; ?> <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                            </h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">10%</p>
                                            </div> -->
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/15.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Today Present</h5>
                                            <h4 class="fw-medium font-size-24">
                                                0 <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                            </h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">10%</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/16.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Today Absent</h5>
                                            <h4 class="fw-medium font-size-24">
                                                0 <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                            </h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">10%</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/17.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Late Checkin</h5>
                                            <h4 class="fw-medium font-size-24">
                                                0 <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                            </h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">10%</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/18.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Today On Leave</h5>
                                            <h4 class="fw-medium font-size-24">
                                                0 <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                            </h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">10%</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-start mini-stat-img me-4">
                                                <img src="<?= base_url('assets/admin/images/services-icon/20.png') ?>" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase text-white-50">Now Working</h5>
                                            <h4 class="fw-medium font-size-24">
                                                0 <i class="mdi mdi-arrow-up text-success ms-2"></i>
                                            </h4>
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">10%</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3">
                               <div class="card">
                                   <div class="card-body">
                                       <h4 class="card-title mb-4">Sales Report</h4>

                                       <div class="cleafix">
                                           <p class="float-start"><i class="mdi mdi-calendar me-1 text-primary"></i> Jan 01
                                               - Jan 31</p>
                                           <h5 class="font-18 text-end">$4230</h5>
                                       </div>

                                       <div id="ct-donut" class="ct-chart wid"></div>

                                       <div class="mt-4">
                                           <table class="table mb-0">
                                               <tbody>
                                                   <tr>
                                                       <td><span class="badge bg-primary">Desk</span></td>
                                                       <td>Desktop</td>
                                                       <td class="text-end">54.5%</td>
                                                   </tr>
                                                   <tr>
                                                       <td><span class="badge bg-success">Mob</span></td>
                                                       <td>Mobile</td>
                                                       <td class="text-end">28.0%</td>
                                                   </tr>
                                                   <tr>
                                                       <td><span class="badge bg-warning">Tab</span></td>
                                                       <td>Tablets</td>
                                                       <td class="text-end">17.5%</td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                            </div> -->
                        <!--    <div class="col-xl-4">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <h4 class="card-title mb-4">Activity</h4>-->
                        <!--                <ol class="activity-feed">-->
                        <!--                    <li class="feed-item">-->
                        <!--                        <div class="feed-item-list">-->
                        <!--                            <span class="date">Jan 22</span>-->
                        <!--                            <span class="activity-text">Responded to need “Volunteer-->
                        <!--                                Activities”</span>-->
                        <!--                        </div>-->
                        <!--                    </li>-->
                        <!--                    <li class="feed-item">-->
                        <!--                        <div class="feed-item-list">-->
                        <!--                            <span class="date">Jan 20</span>-->
                        <!--                            <span class="activity-text">At vero eos et accusamus et iusto odio-->
                        <!--                                dignissimos ducimus qui deleniti atque...<a href="#"-->
                        <!--                                    class="text-success">Read more</a></span>-->
                        <!--                        </div>-->
                        <!--                    </li>-->
                        <!--                    <li class="feed-item">-->
                        <!--                        <div class="feed-item-list">-->
                        <!--                            <span class="date">Jan 19</span>-->
                        <!--                            <span class="activity-text">Joined the group “Boardsmanship-->
                        <!--                                Forum”</span>-->
                        <!--                        </div>-->
                        <!--                    </li>-->
                        <!--                    <li class="feed-item">-->
                        <!--                        <div class="feed-item-list">-->
                        <!--                            <span class="date">Jan 17</span>-->
                        <!--                            <span class="activity-text">Responded to need “In-Kind-->
                        <!--                                Opportunity”</span>-->
                        <!--                        </div>-->
                        <!--                    </li>-->
                        <!--                    <li class="feed-item">-->
                        <!--                        <div class="feed-item-list">-->
                        <!--                            <span class="date">Jan 16</span>-->
                        <!--                            <span class="activity-text">Sed ut perspiciatis unde omnis iste natus-->
                        <!--                                error sit rem.</span>-->
                        <!--                        </div>-->
                        <!--                    </li>-->
                        <!--                </ol>-->
                        <!--                <div class="text-center">-->
                        <!--                    <a href="#" class="btn btn-primary">Load More</a>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->

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
                        <?php } ?>



                    </div> <!-- container-fluid -->
</div>