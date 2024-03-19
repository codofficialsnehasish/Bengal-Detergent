<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Edit Leave Application</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/');?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= employee_url('attendance/attendance-list')?>">Leave</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Leave Application</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="<?= employee_url('leave/leave-application'); ?>" class="btn btn-primary dropdown-toggle">
                            <i class="fas fa-arrow-left me-2"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <?= form_open_multipart('employee-management/leave/process-update-leave-application', 'class="custom-validation"');?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Edit Leave Application
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="leave_id" value="<?= $item->leave_appl_id; ?>">
                                <div class="row mb-3">
                                    <label for="employee_id" class="col-sm-4 col-form-label">Employee</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="employee_id" id="employee_id" required>
                                            <option selected disabled value="">Choose...</option>
                                            <?php if(!empty($allemployee)):
                                                foreach($allemployee as $emp):
                                            ?>
                                            <option value="<?= $emp->id;?>" <?= $item->employee_id == $emp->id? 'selected' : ''; ?>><?= $emp->full_name;?></option>
                                            <?php 
                                                endforeach;
                                            endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">No of Days</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="no_of_days" value="<?= $item->apply_day ?>" type="text" id="no_of_days" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="leave_type" class="col-sm-4 col-form-label">Leave Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="leave_type" id="leave_type" required>
                                            <option selected disabled value="">Choose...</option>
                                            <?php if(!empty($allleavetype)):
                                                foreach($allleavetype as $leavet):
                                            ?>
                                            <option value="<?= $leavet->id;?>" <?= $item->leave_type_id == $leavet->id? 'selected' : ''; ?>><?= $leavet->name;?></option>
                                            <?php 
                                                endforeach;
                                            endif;?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-daterange input-group mb-3" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" class="form-control" name="start_date"  value="<?= $item->apply_strt_date ?>" placeholder="Start Date" autocomplete="off" required/>
                                    <input type="text" class="form-control" name="end_date"  value="<?= $item->apply_end_date ?>" onchange="calculation()" placeholder="End Date" autocomplete="off" required/>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <textarea required class="form-control" name="reason" placeholder="Describe the reason for your leave.." rows="3"><?= $item->reason; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-md m-b-5">Submit</button>
                        </div>
                        </div>
                        </div>
                        </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

<script> 
    function calculation(){
        var startDate = $('#datepicker6 input[name="start_date"]').val();
        var endDate = $('#datepicker6 input[name="end_date"]').val();
        if (startDate && endDate) {
            var date1 = new Date(startDate);
            var date2 = new Date(endDate);
            var timeDiff = Math.abs(date2.getTime() - date1.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            $('#no_of_days').val(diffDays + 1);
        } else {
            $('#no_of_days').val('');
        }
    }
</script>