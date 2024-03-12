<style>
    .legendcls{
    font-size: 1rem !important;
    float: none !important;
    width: auto !important;
    padding: 0px !important;
    }
</style>
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Add Employees</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= employee_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= employee_url('employees')?>">Employees</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add new Member</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= employee_url('employees/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-5">
      <?php $this->load->view('employee_management/partialss/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('employee-management/employees/process', 'class="row g-3 needs-validation" novalidate');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Add New Member
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" required>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Middle name</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="">
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                         <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Contact No.</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->mobile : ''; ?>" name="phone_number" id="phone_number"
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4 mb-3">
                            <label for="home_phone_number" class="form-label">Home Contact No.</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->opt_mobile : ''; ?>" name="home_phone_number" id="home_phone_number"
                                    aria-describedby="inputGroupPrepend">
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" value="<?= !empty($inquiry_data) ? $inquiry_data->email : ''; ?>" name="email" id="email"><i class="fas fa-at"></i></span>
                                <input type="text" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" name="email">
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender" required>
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($gender_master)):
                                    foreach($gender_master as $gender):
                                ?>
                                <option value="<?= $gender->id;?>"><?= $gender->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <div class="input-group" id="datepicker2">
                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                    data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                    data-date-autoclose="true" name="dob" required readonly>
            
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Nationality</label>
                            <select class="form-select" name="nationality" id="nationality" required>
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($nationality_master)):
                                    foreach($nationality_master as $nationaliy):
                                ?>
                                     <option value="<?= $nationaliy->id;?>"><?= $nationaliy->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                       
                      
                      
                        <div class="col-md-3 mb-3">
                            <label for="religion" class="form-label">Religion</label>
                            <select class="form-select" name="religion" id="religion">
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($religion_master)):
                                    foreach($religion_master as $relation):
                                ?>
                                     <option value="<?= $relation->id;?>"><?= $relation->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="marital_status" class="form-label">Marital Status</label>
                            <select class="form-select" name="marital_status" id="marital_status">
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($marital_status_master)):
                                    foreach($marital_status_master as $maritalStatus):
                                ?>
                                     <option value="<?= $maritalStatus->id;?>"><?= $maritalStatus->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select class="form-select" name="blood_group" id="blood_group">
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($blood_group_master)):
                                    foreach($blood_group_master as $blood):
                                ?>
                                <option value="<?= $blood->id;?>"><?= $blood->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">Shift</label>
                            <select class="form-select" id="validationCustom04">
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($shift_master)):
                                    foreach($shift_master as $shift):
                                ?>
                                <option value="<?= $shift->id;?>"><?= $shift->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>                         -->
                        <!-- <div class="col-md-4">
                            <label for="medical_history" class="form-label">Medical History</label>
                            <select class="form-select" name="medical_history" id="medical_history">
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($medical_history_master)):
                                    foreach($medical_history_master as $medical):
                                ?>
                                <option value="<?= $medical->id;?>"><?= $medical->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>  -->
                        <div class="col-md-4">
                            <label for="aadhar_no" class="form-label">Aadhar No.</label>
                            <input type="text" class="form-control" name="aadhar_no" id="aadhar_no">
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="pan_no" class="form-label">Pan No.</label>
                            <input type="text" class="form-control" name="pan_no" id="pan_no">
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <fieldset class="form-group border p-3 mb-3">
                             <legend class="legendcls">Present Address</legend>
                             <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04" class="form-label">Country</label>
                                    <select class="form-select" name="country_id" id="pr_country_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($countries)):
                                            foreach($countries as $country):
                                        ?>
                                        <option value="<?= $country->id;?>"><?= $country->name;?></option>
                                        <?php 
                                            endforeach;    
                                        endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">State</label>
                                    <select class="form-select" name="state_id" id="pr_state_id" required>
                                        <option selected disabled value="">Choose...</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <select class="form-select" name="city_id" id="pr_city_id">
                                        <option selected disabled value="">Choose...</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Pin Code</label>
                                    <input type="text" class="form-control" name="zip_code" id="validationCustom03" required>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                             </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="validationCustom03"></textarea>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        
                        </fieldset>
                        <fieldset class="form-group border p-3">
                             <legend class="legendcls">Permanent Address</legend>
                             <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04" class="form-label">Country</label>
                                    <select class="form-select" name="pn_country_id" id="pm_country_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($countries)):
                                            foreach($countries as $country):
                                        ?>
                                        <option value="<?= $country->id;?>"><?= $country->name;?></option>
                                        <?php 
                                            endforeach;    
                                        endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">State</label>
                                    <select class="form-select" name="pn_state_id" id="pm_state_id" required>
                                        <option selected disabled value="">Choose...</option>
                                      
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <select class="form-select" name="pn_city_id" id="pm_city_id" >
                                        <option selected disabled value="">Choose...</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Pin Code</label>
                                    <input type="text" class="form-control" name="pn_zip_code" id="validationCustom03" required>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                             </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <textarea class="form-control" name="pn_address" id="validationCustom03"></textarea>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        
                        </fieldset>
                        </div>
                </div>
               </div>
               
            </div>
            <!-- end col -->
            <div class="col-lg-3">
                <?php $this->load->view('employee_management/partialss/_input-image');?>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Designation
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <label for="package_id" class="form-label">Designation</label>
                            <select class="form-select" name="designation" id="package_id" required>
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($designation)):
                                    foreach($designation as $designatin):
                                ?>
                                <option value="<?= $designatin->id;?>"><?= $designatin->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Publish
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <label class="form-label mb-3 d-flex">Status</label>
                            <input class="form-check form-switch" type="checkbox" name="status" id="switch3" value="1" switch="bool" checked>
                            <label class="form-label" for="switch3" data-on-label="Active" data-off-label="Inactive"></label>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Save & Publish
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Reset
                                </button>
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
   <!-- container-fluid -->
</div>


                                            
