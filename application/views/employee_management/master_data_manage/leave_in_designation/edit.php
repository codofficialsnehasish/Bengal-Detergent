<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Assign Leave for Designation</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= employee_url('master-manage/leave-in-designation/')?>">Assign Leave for Designation</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= employee_url('master-manage/leave-in-designation/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
      <?php $this->load->view('employee_management/partialss/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('employee-management/master-manage/leave-in-designation/update-process/'.$item->id, 'class="custom-validation"');?>
      
         <div class="row">
            <div class="col-lg-9">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Edit Assign Leave for Designation
                  </div>
                  <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Choose Designation</label>
                            <div>
                                <select class="form-select" name="designation_id">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <?php if(!empty($designation)):
                                        foreach($designation as $desig):
                                    ?>
                                    <option value="<?= $desig->id;?>" <?= $item->designation_id == $desig->id ? 'selected':''; ?>><?= $desig->name;?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Asign Leave</label>
                            <div>
                                <select class="form-select" name="leave_id">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <?php if(!empty($leave_type)):
                                        foreach($leave_type as $leave):
                                    ?>
                                    <option value="<?= $leave->id;?>" <?= $item->leave_id == $leave->id ? 'selected':''; ?>><?= $leave->name;?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No of Days</label>
                            <div>
                                <input type="number" name="no_of_days" value="<?= $item->no_of_days ?>" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- end col -->
            <div class="col-lg-3">
               <div class="card">
                  <div class="card-header bg-primary text-light">
                     Publish
                  </div>
                  <div class="card-body">
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" <= check_uncheck($item->is_visible,1);?>>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0" <= check_uncheck($item->is_visible,0);?>>
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
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
   <!-- container-fluid -->
</div>


                                            