<div class="card">
    <div class="card-body">
    <!-- <button type="button" class="btn btn-outline-info waves-effect waves-light float-end">Download Profile</button> -->
        <h4 class="card-title">Login Details</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>

        <form class="row g-3 custom-validation" id="basicInfoForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />
            <div class="col-md-6">
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
          
           
            <div class="col-md-4">
                <label class="form-label">Date of Joining</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true" name="date_of_joining" value="<?= !empty($user->date_of_joining) ? formated_date($user->date_of_joining,'d M, Y') : ''; ?>" readonly>

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
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
            </div>
            <div class="col-md-6">
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
            </div>    
           
           
           

            <div class="col-12">
                <button class="btn btn-primary binfoBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
