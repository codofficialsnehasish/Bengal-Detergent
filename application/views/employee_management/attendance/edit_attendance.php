<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Attendance</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/')?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= employee_url('attendance/attendance-list')?>">Attendance</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Attendance</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="<?= employee_url('attendance/attendance-list')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                            <i class="fas fa-list"></i> Attendance List 
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
        <?= form_open_multipart('employee-management/attendance/process_edit_attendance', 'class="custom-validation"');?>
        <input type="hidden" name="id" value="<?= $item->id; ?>">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Edit Attendance
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" id="validationCustom04">Employee</label>
                            <div class="col-sm-10">
                                <select class="form-select select2" id="validationCustom04" name="employee_id" aria-label="Default select example" required="">
                                    <option value="" desabled selected>Choose....</option>
                                    <?php foreach($all_employee as $emp){ ?>
                                    <option value="<?= $emp->id ?>" <?= $item->user_id == $emp->id?'selected':''; ?>><?= $emp->full_name ?> [<?= $emp->user_id; ?>]</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <div class="input-group" id="datepicker2">
                                    <input type="text" class="form-control" name="date" value="<?= date("d M, Y",strtotime($item->date)); ?>" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" autocomplete="off" data-date-autoclose="true" required>
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-time-input" class="col-sm-2 col-form-label">Check in Time</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="time" value="<?= $item->check_in_time ?>" name="check_in_time" id="example-time-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-time-input" class="col-sm-2 col-form-label">Check Out Time</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="time" value="<?= $item->check_out_time ?>" name="check_out_time" id="example-time-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" id="validationCustom04">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="validationCustom04" name="status" aria-label="Default select example" required="">
                                    <option value="" desabled selected>Choose....</option>
                                    <option value="Check In" <?= $item->status == 'Check In'? 'desabled selected' : ''?>>Check In</option>
                                    <option value="Checked Out" <?= $item->status == 'Check Out'? 'desabled selected' : ''?>>Check Out</option>
                                </select>
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