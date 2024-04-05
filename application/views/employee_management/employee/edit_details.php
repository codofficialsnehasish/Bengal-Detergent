
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Edit Profile</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basicinfo" role="tab">
                                        <span class="d-none d-md-block">Basic Information</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profilepicture" role="tab">
                                        <span class="d-none d-md-block">Profile Picture</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#documents" role="tab">
                                        <span class="d-none d-md-block">Documents</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#contacts" role="tab">
                                        <span class="d-none d-md-block">Contact Details</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#qualification" role="tab">
                                        <span class="d-none d-md-block">Qualification</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#workexperience" role="tab">
                                        <span class="d-none d-md-block">Work Experience</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#bankacounts" role="tab">
                                        <span class="d-none d-md-block">Bank Account</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="basicinfo" role="tabpanel">
                                    <form class="row g-3 custom-validation" id="basicInfoForm" method="post" novalidate>
                                        <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />
                                        <div class="col-md-12" style="display:none;">
                                            <input class="form-check form-switch" type="checkbox" id="switch3" name="status" value="<?= $user->status; ?>" switch="bool" <?= check_uncheck(1,$user->status);?> />
                                            <label class="form-label" for="switch3" data-on-label="Active" data-off-label="Inactive"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">First name</label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" name="first_name" value="<?= $user->first_name;?>" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">Middle name</label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder=""  name="middle_name" value="<?= $user->middle_name;?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">Last name</label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder=""  name="last_name" value="<?= $user->last_name;?>" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Employee Id</label>
                                            <input type="text" class="form-control" id="validationCustom03" value="<?= $user->user_id;?>" disabled>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                    
                                    
                                        <div class="col-md-4" style="display:none;">
                                            <label class="form-label">Date of Joining</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                                    data-date-autoclose="true" name="date_of_joining" value="<?= !empty($user->date_of_joining) ? formated_date($user->date_of_joining,'d M, Y') : ''; ?>" readonly>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="col-md-4" style="display:none;">
                                            <label class="form-label">Date of Leaving</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" name="date_of_leaving" data-date-container='#datepicker2' data-provide="datepicker"
                                                    data-date-autoclose="true" value="<?= !empty($user->date_of_leaving) ? formated_date($user->date_of_leaving,'d M, Y') : ''; ?>"  readonly>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Gender</label>
                                            <select class="form-select" name="gender" id="gender" required>
                                                <option selected disabled value="">Choose...</option>
                                                <?php if(!empty($gender_master)):
                                                    foreach($gender_master as $gender):
                                                ?>
                                                <option value="<?= $gender->id;?>" <?= $gender->id==$user->gender?'selected':'';?>><?= $gender->name;?></option>
                                                <?php 
                                                    endforeach;
                                                endif;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Date of Birth</label>
                                            <div class="input-group" id="datepicker2">
                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                                    data-date-autoclose="true" name="dob" value="<?= $user->dob; ?>" readonly>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Religion</label>
                                            <select class="form-select" name="religion" id="religion" required>
                                                <option selected disabled value="">Choose...</option>
                                                <?php if(!empty($religion_master)):
                                                    foreach($religion_master as $religion):
                                                ?>
                                                    <option value="<?= $religion->id;?>" <?= $religion->id==$user->religion?'selected':'';?>><?= $religion->name;?></option>
                                                <?php 
                                                    endforeach;
                                                endif;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom04" class="form-label">Marital Status</label>
                                            <select class="form-select" name="marital_status" id="marital_status" required>
                                                <option selected disabled value="">Choose...</option>
                                                <?php if(!empty($marital_status_master)):
                                                    foreach($marital_status_master as $maritalStatus):
                                                ?>
                                                        <option value="<?= $maritalStatus->id;?>" <?= $maritalStatus->id==$user->marital_status?'selected':'';?>><?= $maritalStatus->name;?></option>
                                                <?php 
                                                    endforeach;
                                                endif;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom04" class="form-label">Blood Group</label>
                                            <select class="form-select" name="blood_group" id="blood_group" required>
                                                <option selected disabled value="">Choose...</option>
                                                <?php if(!empty($blood_group_master)):
                                                    foreach($blood_group_master as $blood):
                                                ?>
                                                <option value="<?= $blood->id;?>" <?= $blood->id==$user->blood_group?'selected':'';?>><?= $blood->name;?></option>
                                                <?php 
                                                    endforeach;
                                                endif;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom04" class="form-label">Nationality</label>
                                            <select class="form-select" name="nationality" id="nationality" required>
                                                <option selected disabled value="">Choose...</option>
                                                <?php if(!empty($nationality_master)):
                                                    foreach($nationality_master as $nationaliy):
                                                ?>
                                                        <option value="<?= $nationaliy->id;?>" <?= $nationaliy->id==$user->nationality?'selected':'';?>><?= $nationaliy->name;?></option>
                                                <?php 
                                                    endforeach;
                                                endif;?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>          
                                    
                                    
                                    

                                        <div class="col-12">
                                            <button class="btn btn-primary binfoBtn" type="submit">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane p-3" id="profilepicture" role="tabpanel">
                                    <div class="col-md-12 d-flex ">
                                        <?= form_open_multipart('employee-management/employees/profile-picture'); ?>
                                        <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />        
                                        <div class="card">
                                            <!-- <div class="card-header bg-primary text-light">
                                                Profile Image
                                            </div> -->
                                            <div class="card-body text-center">
                                                <div class="mb-0">
                                                    <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="<?= get_image($user->user_image);?>" data-holder-rendered="true" style="display:<?= $user->user_image!=0?'block;':'none;';?>">
                                                </div>
                                                <div class="mb-0">
                                                    <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                                                    <input type="hidden" name="media_id" id="media_id" value="<?= $user->user_image;?>" />
                                                    <input type="hidden" name="hdn_media_id" id="media_id" value="<?= $user->user_image;?>" />
                                                    <!-- <a href="javascript:;" id="openLibrary">or Choose From Library</a> -->
                                                </div> 
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary binfoBtn" type="submit">Save Changes</button>
                                            </div>
                                        </div>
                                        <?= form_close();?>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="documents" role="tabpanel">
                                    <form class="row g-3 needs-validation" id="documentForm" method="post" novalidate>
                                        <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />
                                        <div class="col-md-6">
                                            <label for="validationCustom03" class="form-label">Aadhar No.</label>
                                            <input type="text" class="form-control" value="<?= $user->aadhar_no;?>" name="aadhar_no" id="validationCustom03" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom03" class="form-label">Pan No.</label>
                                            <input type="text" class="form-control" value="<?= $user->pan_no;?>" name="pan_no" id="validationCustom03" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid city.
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6 mb-0">
                                                    
                                            <div class="mt-4 mt-md-0">
                                                <img class="rounded" alt="200x200" style="width:100px;" src="<?= get_image($user->aadhar_proof); ?>" data-holder-rendered="true">
                                            </div>
                                    

                                            <label class="form-label">Aadhar Card Scan Copy</label>
                                            <input type="file" name="aadhar_proof" class="filestyle" data-input="false" data-buttonname="btn-secondary">
                                        </div>
                                        <div class="col-md-6 mb-0">
                                            <div class="mt-4 mt-md-0">
                                                <img class="rounded" alt="200x200" style="width:100px;" src="<?= get_image($user->pan_proof); ?>" data-holder-rendered="true">
                                            </div>
                                            <label class="form-label">Pancard Scan Copy</label>
                                            <input type="file" name="pan_froof" class="filestyle" data-input="false" data-buttonname="btn-secondary">
                                        </div>
                                        <div class="col-12 ">
                                            <button class="btn btn-primary float-end" type="submit">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane p-3" id="contacts" role="tabpanel">
                                    <form class="row g-3 needs-validation" id="contactInfoForm" method="post" novalidate>
                                        <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                                                    <input type="text" class="form-control" name="email" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" value="<?= $user->email?>" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Contact No.</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" name="phone_number" value="<?= $user->phone_number?>" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Official Contact No.</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                                    <input type="text" class="form-control" name="official_phone_number" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" value="<?= $user->official_phone_number?>" >
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
                                                                        <option value="<?= $country->id;?>" <?= $country->id==$user->country_id?'selected':'';?>><?= $country->name;?></option>
                                                                        <?php 
                                                                            endforeach;    
                                                                        endif;?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="validationCustom04" class="form-label">State</label>
                                                                    <select class="form-select" name="state_id" id="pr_state_id" required>
                                                                        <option selected disabled value="">Choose...</option>
                                                                        <?php if(!empty($stateData)):
                                                                            foreach($stateData as $state):
                                                                        ?>
                                                                        <option value="<?= $state->id;?>" <?= $state->id==$user->state_id?'selected':'';?>><?= $state->name;?></option>
                                                                        <?php 
                                                                            endforeach;    
                                                                        endif;?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="validationCustom04" class="form-label">City</label>
                                                                    <select class="form-select" name="city_id" id="pr_city_id" required>
                                                                        <option selected disabled value="">Choose...</option>
                                                                        <?php if(!empty($cityData)):
                                                                            foreach($cityData as $city):
                                                                        ?>
                                                                        <option value="<?= $city->id;?>" <?= $city->id==$user->city_id?'selected':'';?>><?= $city->name;?></option>
                                                                        <?php 
                                                                            endforeach;    
                                                                        endif;?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="validationCustom03" class="form-label">Pin Code</label>
                                                                    <input type="text" class="form-control" name="zip_code" id="validationCustom03" value="<?= $user->zip_code;?>" required>
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid city.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="validationCustom03" class="form-label">Address</label>
                                                            <textarea class="form-control" name="address" id="validationCustom03" required><?= $user->address;?></textarea>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
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
                                                                        <option value="<?= $country->id;?>" <?= $country->id==$user->pn_country_id?'selected':'';?>><?= $country->name;?></option>
                                                                        <?php 
                                                                            endforeach;    
                                                                        endif;?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="validationCustom04" class="form-label">State</label>
                                                                    <select class="form-select" name="pn_state_id" id="pm_state_id" required>
                                                                        <option selected disabled value="">Choose...</option>
                                                                        <?php if(!empty($pmstateData)):
                                                                            foreach($pmstateData as $pmstate):
                                                                        ?>
                                                                        <option value="<?= $pmstate->id;?>" <?= $pmstate->id==$user->state_id?'selected':'';?>><?= $pmstate->name;?></option>
                                                                        <?php 
                                                                            endforeach;    
                                                                        endif;?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="validationCustom04" class="form-label">City</label>
                                                                    <select class="form-select" name="pn_city_id" id="pm_city_id" required>
                                                                        <option selected disabled value="">Choose...</option>
                                                                        <?php if(!empty($pmcityData)):
                                                                            foreach($pmcityData as $pmcity):
                                                                        ?>
                                                                        <option value="<?= $pmcity->id;?>" <?= $pmcity->id==$user->city_id?'selected':'';?>><?= $pmcity->name;?></option>
                                                                        <?php 
                                                                            endforeach;    
                                                                        endif;?>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select a valid state.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="validationCustom03" class="form-label">Pin Code</label>
                                                                    <input type="text" class="form-control" name="pn_zip_code" id="validationCustom03" value="<?= $user->pn_zip_code;?>" required>
                                                                    <div class="invalid-feedback">
                                                                        Please provide a valid city.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="col-md-12">
                                                            <label for="validationCustom03" class="form-label">Address</label>
                                                            <textarea class="form-control" id="validationCustom03" name="pn_address" required><?= $user->pn_address;?></textarea>
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                        
                                                        </fieldset>

                                            <div class="col-12">
                                                <button class="btn btn-primary cinfoBtn" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                </div>
                                <div class="tab-pane p-3" id="qualification" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Qualification</th>
                                                        <th>Board/University</th>
                                                        <th>Subject</th>
                                                        <th>Passing Year</th>
                                                        <th>Percentage</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="qualificationdata"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Add New Qualification</h4>
                                            <p class="card-title-desc">&nbsp;</p>
                                            <form class="row g-3 custom-validation" id="qualification" method="post" novalidate>
                                                <input type="hidden" name="user_id" value="<?= $this->uri->segment(4); ?>" >
                                                <div class="col-md-6">
                                                    <label for="validationCustom01" class="form-label">Qualification</label>
                                                    <input type="text" class="form-control" name="qualification" id="validationCustom01" placeholder="" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Board/University</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" id="validationCustomUsername" name="board_university"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Subject</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" name="subject" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Passing Year</label>
                                                    <div class="input-group has-validation">
                                                        <input class="form-control" type="month" name="passing_year" value="" id="example-month-input" required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Percentage</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" name="percentage" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary qinfoBtn" type="submit">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <script>
                                        function delete_qualification(delid){
                                            const getUrl = window.location;
                                            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
                                            $.ajax({
                                                url: base_url + "employees/deletequalification",
                                                type: "POST",
                                                data: {
                                                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                                                    id: delid
                                                },
                                                dataType: "html",
                                                success: function (response) {
                                                    var dataArray = JSON.parse(response);
                                                    if(dataArray.status == 1){
                                                        $.ajax({
                                                            url: base_url + "employees/getQualification",
                                                            type: "POST",
                                                            data: { csrf_modesy_token: getCookie('csrf_modesy_token'),id: <?= $this->uri->segment(4); ?> },
                                                            dataType: "html",
                                                            success: function (resp) {
                                                                $("#qualificationdata").html(resp);
                                                            }
                                                        });
                                                        showToast('success','Success',dataArray.msg);     
                                                    }else{
                                                        showToast('error','Error',dataArray.msg);
                                                    }
                                                }
                                            });
                                        } 
                                    </script>
                                </div>
                                <div class="tab-pane p-3" id="workexperience" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Experience</th>
                                                        <th>Sertificate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="work_exprence">
                                                </tbody>
                                            </table>
                                    </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Add New Experience</h4>
                                            <p class="card-title-desc">&nbsp;</p>
                                            <form class="row g-3 custom-validation" id="workexprenceinfo" method="post" novalidate>
                                            <input type="hidden" name="trainer_id" value="<?= $this->uri->segment(4); ?>" >
                                                <div class="col-md-12">
                                                    <label for="validationCustom01" class="form-label">Company Name</label>
                                                    <input type="integer" class="form-control" name="name" id="validationCustom01" placeholder="Mark" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Experience in Year</label>
                                                    <div class="input-group has-validation">
                                                        <input type="integer" class="form-control" name="exp_year" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <span class="input-group-text" id="inputGroupPrepend">Year/s</span>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Experience in Months</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" name="exp_months" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <span class="input-group-text" id="inputGroupPrepend">Month/s</span>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-0">
                                                    <label class="form-label">Sertificate (if any)</label>
                                                    <input type="file" name="sertificate" class="filestyle" data-buttonname="btn-secondary">
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary workxpBtn" type="submit">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>



                                    <script>
                                        function delete_work_exp(delid){
                                            const getUrl = window.location;
                                            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
                                            $.ajax({
                                                url: base_url + "employees/deleteworkexp",
                                                type: "POST",
                                                data: {
                                                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                                                    id: delid
                                                },
                                                dataType: "html",
                                                success: function (response) {
                                                    var dataArray = JSON.parse(response);
                                                    if (dataArray.status == 1) {
                                                        $.ajax({
                                                            url: base_url + "employees/getworkExprence",
                                                            type: "POST",
                                                            data: {
                                                                csrf_modesy_token: getCookie('csrf_modesy_token'),
                                                                id: <?= $this->uri->segment(4); ?>
                                                            },
                                                            dataType: "html",
                                                            success: function (resp) {
                                                                $("#work_exprence").html(resp);
                                                            }
                                                        });
                                                        showToast('success','Success',dataArray.msg);     

                                                    }else{
                                                        showToast('error','Error',dataArray.msg);
                                                    }
                                                }
                                            });
                                        } 

                                    </script>
                                </div>
                                <div class="tab-pane p-3" id="bankacounts" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <th>Account Number</th>
                                                    <th>IFSC</th>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                                <tbody id="bankaccounts">
                                                </tbody>
                                            </table>
                                    </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Add New Bank Account</h4>
                                            <p class="card-title-desc">&nbsp;</p>
                                            <form class="row g-3 custom-validation" id="bank_acc_details" method="post" novalidate>
                                                <input type="hidden" name="employee_id" value="<?= $this->uri->segment(4); ?>">
                                                <div class="col-md-6">
                                                    <label for="validationCustom01" class="form-label">Bank Name</label>
                                                    <input type="text" class="form-control" name="bank_name" id="validationCustom01" placeholder="" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">Account Number</label>
                                                    <div class="input-group has-validation">
                                                        <input type="number" class="form-control" name="account_number" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationCustomUsername" class="form-label">IFSC</label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" class="form-control" name="ifsc_code" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary bankBtn" type="submit">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <script>
                                        function delete_bank_accounts_details(delid){
                                            const getUrl = window.location;
                                            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
                                            $.ajax({
                                                url: base_url + "employees/deletebankaccounts",
                                                type: "POST",
                                                data: {
                                                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                                                    id: delid
                                                },
                                                dataType: "html",
                                                success: function (response) {
                                                    var dataArray = JSON.parse(response);
                                                    if(dataArray.status == 1){
                                                        $.ajax({
                                                            url: base_url + "employees/getbankaccounts",
                                                            type: "POST",
                                                            data: {
                                                                csrf_modesy_token: getCookie('csrf_modesy_token'),
                                                                id: <?= $this->uri->segment(4); ?>
                                                            },
                                                            dataType: "html",
                                                            success: function (resp) {
                                                                $("#bankaccounts").html(resp);
                                                            }
                                                        });
                                                        showToast('success','Success',dataArray.msg);     
                                                    }else{
                                                        showToast('error','Error',dataArray.msg);
                                                    }
                                                }
                                            });
                                        } 
                                    </script>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Page-content -->
