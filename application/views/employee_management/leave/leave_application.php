<style>
    .dl-horizontal dt {
      float: left;
      clear: left;
      width: 130px; /* Adjust as needed */
      text-align: right;
      margin-right: 15px;
      font-weight: bold;
    }
    .dl-horizontal dd {
      margin-left: 0;
      margin-bottom: 5px;
      /* margin-right: 120px; Adjust as needed */
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Leave Application</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/');?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= employee_url('attendance/attendance-list')?>">Leave</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leave Application</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="modal"
                                        data-bs-target=".bs-example-modal-lg">
                            <i class="fas fa-plus me-2"></i> Add New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Leave Application Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('employee-management/leave/process-leave-application', 'class="custom-validation"');?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="employee_id" class="col-sm-4 col-form-label">Employee</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" name="employee_id" id="employee_id" required>
                                            <option selected disabled value="">Choose...</option>
                                            <?php if(!empty($allemployee)):
                                                foreach($allemployee as $emp):
                                            ?>
                                            <option value="<?= $emp->id;?>"><?= $emp->full_name;?></option>
                                            <?php 
                                                endforeach;
                                            endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">No of Days</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="no_of_days" type="text" id="no_of_days" readonly>
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
                                            <option value="<?= $leavet->id;?>"><?= $leavet->name;?></option>
                                            <?php 
                                                endforeach;
                                            endif;?>
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-daterange input-group mb-3" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" class="form-control" name="start_date" placeholder="Start Date" autocomplete="off" required/>
                                    <input type="text" class="form-control" name="end_date" onchange="calculation()" placeholder="End Date" autocomplete="off" required/>
                                </div>
                                <div class="row mb-3">
                                    <div>
                                        <textarea required class="form-control" name="reason" placeholder="Describe the reason for your leave.." rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>
                        <button type="submit"class="btn btn-primary">Submit</button>
                    </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Apply Days</th>
                                    <th>Approved Days</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Approved</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                foreach($allitems as $item):?>
                                <tr>
                                    <td class="text-wrap"><?= get_user_name($item->employee_id); ?></td>
                                    <td><?= get_name("leave_type_master",$item->leave_type_id); ?></td>
                                    <td><?= $item->apply_strt_date;?></td>
                                    <td><?= $item->apply_end_date;?></td>
                                    <td><?= $item->apply_day;?></td>
                                    <td><?= $item->num_aprv_day;?></td>
                                    <td>
                                        <?php 
                                            if($item->status == -1){ echo '<span style="font-size:15px;" class="badge bg-danger">Canceled</span>';} 
                                            if($item->status == 0){ echo '<span style="font-size:15px;" class="badge bg-warning">Pending</span>';} 
                                            if($item->status == 1){ echo '<span style="font-size:15px;" class="badge bg-success">Approved</span>';} 
                                            if($item->status == 2){ echo '<span style="font-size:15px;" class="badge bg-info">In Progress</span>';} 
                                        ?>
                                    </td>
                                    <td class="text-wrap">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal<?= $item->leave_appl_id; ?>" class="btn btn-xs btn-info leaveView m-r-2 mx-1 my-1" data-id="4">
                                            <i class="fa fa-eye"></i>
                                        </a> 
                                        <a href="<?= employee_url('leave/update-leave-application/'.$item->leave_appl_id) ?>" class="btn btn-xs btn-primary m-r-2 mx-1 my-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?= employee_url('leave/delete-leave-application/'.$item->leave_appl_id) ?>" onclick="return confirm('Are You Sure?');" class="btn btn-xs btn-danger deleteAction mx-1 my-1" data-id="4">
                                            <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                        </a> 
                                    </td>
                                    <td class="text-wrap">
                                        <?php
                                            if($item->status == 0){ ?>
                                                <a href="<?= employee_url('leave/update-leave-status/'.$item->leave_appl_id.'/2');?>" onclick="return confirm('Are You Sure?');" class="btn btn-info mx-1 my-1">In Progress</a>
                                                <a href="<?= employee_url('leave/update-leave-status/'.$item->leave_appl_id.'/1');?>" onclick="return confirm('Are You Sure?');" class="btn btn-success mx-1 my-1">Approved</a>
                                                <a href="<?= employee_url('leave/update-leave-status/'.$item->leave_appl_id.'/-1');?>" onclick="return confirm('Are You Sure?');" class="btn btn-danger mx-1 my-1">Cancel</a>
                                        <?php
                                            }elseif($item->status == 2){ ?>
                                                <a href="<?= employee_url('leave/update-leave-status/'.$item->leave_appl_id.'/1');?>" onclick="return confirm('Are You Sure?');" class="btn btn-success mx-1 my-1">Approved</a>
                                                <a href="<?= employee_url('leave/update-leave-status/'.$item->leave_appl_id.'/-1');?>" onclick="return confirm('Are You Sure?');" class="btn btn-danger mx-1 my-1">Cancel</a>
                                        <?php
                                            } 
                                        ?>
                                    </td>
                                </tr>
                                <div id="myModal<?= $item->leave_appl_id; ?>" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">View Leave Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <dl class="dl-horizontal">
                                                            <dt>Employee Name :</dt><dd><?= get_user_name($item->employee_id); ?></dd> 
                                                            <dt>Leave Type :</dt><dd><?= get_name("leave_type_master",$item->leave_type_id); ?></dd> 
                                                            <dt>From Date :</dt><dd><?= $item->apply_strt_date;?></dd> 
                                                            <dt>To Date :</dt><dd><?= $item->apply_end_date;?></dd> 
                                                            <dt>Apply Day :</dt><dd><?= $item->apply_day;?></dd> 
                                                            <dt>Approved Days :</dt><dd><?= $item->num_aprv_day;?></dd> 
                                                            <dt>Create Day :</dt><dd><?= $item->apply_date; ?></dd> 
                                                            <?php if(!empty($item->approve_date)){ ?><dt>Approved Date :</dt><dd><?= $item->approve_date ?></dd> <?php } ?>
                                                            <dt>Reason :</dt><dd><?= $item->reason; ?></dd> 
                                                            <dt>Status :</dt><dd><?php 
                                                                if($item->status == -1){ echo 'Canceled';} 
                                                                if($item->status == 0){ echo 'Pending';} 
                                                                if($item->status == 1){ echo 'Approved';} 
                                                                if($item->status == 2){ echo 'In Progress';} 
                                                            ?></dd> 
                                                        </dl> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <?php endforeach;?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

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