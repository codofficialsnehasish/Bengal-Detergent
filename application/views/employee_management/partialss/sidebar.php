<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php //if($this->auth_user->role=='admin'){?>
                <li>
                    <a href="<?= employee_url('dashboard/')?>" class="waves-effect <?= emp_active_link('dashboard');?>">
                         <i class="ti-home"></i><!--<span class="badge rounded-pill bg-primary float-end">2</span> -->
                        <span>Dashboard</span>
                    </a>
                </li>  

                <?php 
                    $usegment='';
                    if($this->uri->segment(3)=='shift-master'){$usegment='shift-master';}
                    if($this->uri->segment(3)=='gender-master'){$usegment='gender-master';}
                    if($this->uri->segment(3)=='medical-history-master'){$usegment='medical-history-master';}
                    if($this->uri->segment(3)=='package-master'){$usegment='package-master';}
                    if($this->uri->segment(3)=='payment-mode-master'){$usegment='payment-mode-master';}
                    if($this->uri->segment(3)=='blood-group-master'){$usegment='blood-group-master';}
                    if($this->uri->segment(3)=='marital-status-master'){$usegment='marital-status-master';}
                    if($this->uri->segment(3)=='religion-master'){$usegment='religion-master';}
                    if($this->uri->segment(3)=='nationality-master'){$usegment='nationality-master';}
                    if($this->uri->segment(3)=='status-master'){$usegment='status-master';}
                    if($this->uri->segment(3)=='catagory-master'){$usegment='catagory-master';}
                    if($this->uri->segment(3)=='how-to-know-master'){$usegment='how-to-know-master';}
                ?>
                <!-- All Master Data -->
                <li class="<?= emp_active_menu($usegment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= emp_active_menu($usegment);?>">
                        <i class="fas fa-coins"></i>
                        <span>All Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= emp_tab_active('shift-master');?>"><a href="<?= base_url('employee-management/master-manage/shift-master/')?>" class="<?= emp_active_link('shift-master');?>">Shift Master</a></li>
                        <li class="<?= emp_tab_active('gender-master');?>"><a href="<?= base_url('employee-management/master-manage/gender-master/')?>" class="<?= emp_active_link('gender-master');?>">Gender Master</a></li>
                        <li class="<?= emp_tab_active('medical-history-master');?>"><a href="<?= base_url('employee-management/master-manage/medical-history-master/')?>" class="<?= emp_active_link('medical-history-master');?>">Medical History Master</a></li>
                        <li class="<?= emp_tab_active('package-master');?>"><a href="<?= base_url('employee-management/master-manage/package-master/')?>" class="<?= emp_active_link('package-master');?>">Package Master</a></li>
                        <li class="<?= emp_tab_active('payment-mode-master');?>"><a href="<?= base_url('employee-management/master-manage/payment-mode-master/')?>" class="<?= emp_active_link('payment-mode-master');?>">Payment Mode Master</a></li>
                        <li class="<?= emp_tab_active('blood-group-master');?>"><a href="<?= base_url('employee-management/master-manage/blood-group-master/')?>" class="<?= emp_active_link('blood-group-master');?>">Blood Group Master</a></li>
                        <li class="<?= emp_tab_active('marital-status-master');?>"><a href="<?= base_url('employee-management/master-manage/marital-status-master/')?>" class="<?= emp_active_link('marital-status-master');?>">Marital Status Master</a></li>
                        <li class="<?= emp_tab_active('religion-master');?>"><a href="<?= base_url('employee-management/master-manage/religion-master/')?>" class="<?= emp_active_link('religion-master');?>">Religion Master</a></li>
                        <li class="<?= emp_tab_active('nationality-master');?>"><a href="<?= base_url('employee-management/master-manage/nationality-master/')?>" class="<?= emp_active_link('nationality-master');?>">Nationality Master</a></li>
                        <li class="<?= emp_tab_active('status-master');?>"><a href="<?= base_url('employee-management/master-manage/status-master/')?>" class="<?= emp_active_link('status-master');?>">Status Master</a></li>
                        <li class="<?= emp_tab_active('catagory-master');?>"><a href="<?= base_url('employee-management/master-manage/catagory-master/')?>" class="<?= emp_active_link('catagory-master');?>">Catagory Master</a></li>
                        <li class="<?= emp_tab_active('how-to-know-master');?>"><a href="<?= base_url('employee-management/master-manage/how-to-know-master/')?>" class="<?= emp_active_link('how-to-know-master');?>">How to Know Master</a></li>
                    </ul>
                </li> 
                <?php
                    if ($this->permission->module('permission')->access() || $this->permission->method('add_role', 'create')->access()) {
                ?>
                <!-- Role & Permission -->
                <li class="<= active_menu($rolesegment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <= active_menu($rolesegment);?>">
                        <i class="ti-unlock"></i>
                        <span>Role & Permission</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php
                            if ($this->permission->method('add_role', 'create')->access() || $this->permission->method('add_role', 'read')->access() || $this->permission->method('add_role', 'update')->access() || $this->permission->method('add_role', 'delete')->access()) {
                        ?>
                            <li class="<?= emp_tab_active('role');?>"><a href="<?= base_url('role/')?>" class="<?= emp_active_link('role');?>">Role</a></li>
                        <?php } ?>
                        <li class="<?= emp_tab_active('role-permission');?>"><a href="<?= base_url('role-permission/')?>" class="<?= emp_active_link('role-permission');?>">Role Permission</a></li>
                        <?php
                        if ($this->permission->module('assign_role')->access()) {
                            ?>
                        <li class="<?= emp_tab_active('asign-role');?>"><a href="<?= base_url('asign-role/')?>" class="<?= emp_active_link('asign-role');?>">Asign Role</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>

                <!-- Modules -->
                <li class="<= active_menu($segment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <= active_menu($segment);?>">
                        <i class="ti-settings"></i>
                        <span>Modules</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= emp_tab_active('modules');?>"><a href="<?= base_url('employee-management/modules/')?>" class="<?= emp_active_link('modules');?>">All Modules</a></li>
                        <li class="<?= emp_tab_active('sub-modules');?>"><a href="<?= base_url('employee-management/sub-modules/')?>" class="<?= emp_active_link('sub-modules');?>">All Sub Modules</a></li>
                    </ul>
                </li>

                <!-- Employee -->
                <li class="<= active_menu($segment);?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <= active_menu($segment);?>">
                        <i class="fas fa-users"></i>
                        <span>Manage Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?= emp_tab_active('modules');?>"><a href="<?= base_url('employee-management/employees/')?>" class="<?= emp_active_link('modules');?>">Employees</a></li>
                        <li class="<?= emp_tab_active('modules');?>"><a href="<?= base_url('employee-management/employees/')?>" class="<?= emp_active_link('modules');?>">Attendance</a></li>
                    </ul>
                </li>
                <?php //}?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->