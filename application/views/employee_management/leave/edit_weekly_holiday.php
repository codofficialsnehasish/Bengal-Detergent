<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Leave</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/')?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= employee_url('attendance/attendance-list')?>">Leave</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Week Leave</li>
                    </ol>
                </div>
                <!-- <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="<?= employee_url('attendance/attendance-list')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                            <i class="fas fa-list"></i> Attendance List 
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="row mb-5">
            <?php $this->load->view('employee_management/partialss/_messages');?>
        </div>
        <!-- end page title -->
        <?= form_open_multipart('employee-management/leave/process-update-weekly-holiday', 'class="custom-validation"');?>
        <input type="hidden" name="wk_id" value="<?= $this->uri->segment(4); ?>">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Update Week Leave
                    </div>
                    <?php 
                        $arr = explode(',',$item->dayname); 
                    ?>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" style="line-height: 8px;">Weekly Leave Day</label>
                            <div class="row col-sm-9">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" <?= in_array("Friday", $arr) ? 'checked' : ''; ?> name="dayname[]" type="checkbox" value="Friday" id="invalidCheck1" data-parsley-multiple="invalidCheck1">
                                            <label class="form-check-label" for="invalidCheck1">
                                                Friday
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" <?= in_array("Saturday", $arr) ? 'checked' : ''; ?> name="dayname[]" type="checkbox" value="Saturday" id="invalidCheck2" data-parsley-multiple="invalidCheck2">
                                            <label class="form-check-label" for="invalidCheck2">
                                                Saturday
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" <?= in_array("Sunday", $arr) ? 'checked' : ''; ?> name="dayname[]" type="checkbox" value="Sunday" id="invalidCheck3" data-parsley-multiple="invalidCheck3">
                                            <label class="form-check-label" for="invalidCheck3">
                                                Sunday
                                            </label>
                                        </div>
                                    </div>
                                </div>
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