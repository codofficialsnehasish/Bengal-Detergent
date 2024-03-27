<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Payroll</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= employee_url('')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= employee_url('payroll')?>">Payroll</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Payslip</li>
               </ol>
            </div>
         </div>
      </div>
      <div class="row mb-5">
      <?php $this->load->view('employee_management/partialss/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('employee-management/employees/process', 'class="row g-3 needs-validation" novalidate');?>
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01" class="form-label">Designation</label>
                            <select class="form-select" name="designation" id="designation" required>
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($designation)):
                                    foreach($designation as $designation):
                                ?>
                                <option value="<?= $designation->id;?>"><?= $designation->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01" class="form-label">Employee</label>
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
                        <div class="col-md-3">
                            <label for="validationCustomUsername" class="form-label">Month & Year</label>
                            <div class="input-group has-validation">
                                <input class="form-control" type="month" value="<?= date("Y-m") ?>" id="example-month-input">
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-3 mb-3">
                            <label for="" class="mb-4"></label>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Save & Publish
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>
               </div>
               
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Summary
                    </div>
                    <div class="card-body row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Besic Salary</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Provident Fund</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Health Insurance</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Income Tax</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Other Deductions</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Net Salary Paying</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Bonas (if any)</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Payment Method</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Comments</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" placeholder="" id="example-search-input">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div style="float: inline-end;">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1 btn-block">
                                    Save & Publish
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
               </div>
               
            </div>
            <!-- end col -->
        </div>
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>


                                            
