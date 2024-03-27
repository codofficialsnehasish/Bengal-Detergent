<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title"><?= $page_head; ?></h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $page_head; ?></li>
                    </ol>
                </div>
                <!-- <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                        <a href="<?= admin_url('modules/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                        <i class="fas fa-plus me-2"></i> Add New
                        </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Information</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile Picture</button>
                            <button class="nav-link" id="v-documents-tab" data-bs-toggle="pill" data-bs-target="#documents" type="button" role="tab" aria-controls="v-documents" aria-selected="false">Documents</button>
                            <button class="nav-link" id="v-contact-details-tab" data-bs-toggle="pill" data-bs-target="#contact_details" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contact Details</button>
                            <!-- <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#emergency_contacts" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Salary</button> -->
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#qualification_details" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Qualification</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#work_experience" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Work Experience</button>
                            <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#achievements_details" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Achievements</button> -->
                            <button class="nav-link " id="v-salary_configuration-tab" data-bs-toggle="pill" data-bs-target="#salary_configuration" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Salary Configuration</button>
                            <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#bank_details" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Bank Account</button>
                            <!-- <button class="nav-link " id="v-login-details-tab" data-bs-toggle="pill" data-bs-target="#login_details" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Login Details</button> -->
                            <!-- <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</button> -->
                            <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">User Role</button> -->
                        </div>
                        <div class="tab-content col-lg-9" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="work_experience" role="tabpanel" aria-labelledby="work_experience-tab">
                                <?php $this->load->view('employee_management/employee/details/_workExperience');?>
                            </div>
                            <div class="tab-pane fade" id="achievements_details" role="tabpanel" aria-labelledby="achievements_details-tab">
                                <?php $this->load->view('employee_management/employee/details/_achievements');?>
                            </div>
                            <div class="tab-pane fade" id="qualification_details" role="tabpanel" aria-labelledby="qualification_details-tab">
                                <?php $this->load->view('employee_management/employee/details/_qualification');?>
                            </div>
                            <div class="tab-pane fade" id="bank_details" role="tabpanel" aria-labelledby="bank_details-tab">
                                <?php $this->load->view('employee_management/employee/details/_bankAccount');?>
                            </div>
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <?php $this->load->view('employee_management/employee/details/_basicinfo');?>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <?php $this->load->view('employee_management/employee/details/_profilepicture');?>
                            </div>
                            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="v-documents-tab">
                                <?php $this->load->view('employee_management/employee/details/_documents');?>
                            </div>
                            <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="v-contact-details-tab">
                                <?php $this->load->view('employee_management/employee/details/_contactDetails');?>
                            </div>
                            <div class="tab-pane fade" id="salary_configuration" role="tabpanel" aria-labelledby="v-salary_configuration-tab">
                                <?php $this->load->view('employee_management/employee/details/_salaryConfiguration');?>
                            </div>
                            <div class="tab-pane fade" id="login_details" role="tabpanel" aria-labelledby="v-login-details-tab">
                                <?php $this->load->view('employee_management/employee/details/_loginDetails');?>
                            </div>


                        </div>
                    </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>