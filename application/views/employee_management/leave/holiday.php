<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Leave</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/');?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="<?= employee_url('attendance/attendance-list')?>">Leave</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Holiday</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">
                                            <i class="fas fa-plus me-2"></i> Add New
                                            </a>
                                            <a href="<?= employee_url('leave/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                            <i class="fas fa-plus me-2"></i> Manage Holiday
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Holiday</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?= form_open_multipart('employee-management/leave/process-holiday', 'class="custom-validation"');?>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Holiday Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="holiday_name" type="text" placeholder="Holiday Name" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-4 col-form-label">Start Date</label>
                                            <div class="col-sm-8">
                                                <div class="input-group" id="datepicker2">
                                                    <input type="text" class="form-control" name="start_date" placeholder="Start Date" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" autocomplete="off" data-date-autoclose="true" required>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-4 col-form-label">End Date</label>
                                            <div class="col-sm-8">
                                                <div class="input-group" id="datepicker2">
                                                    <input type="text" class="form-control" name="end_date" id="enddate" placeholder="End Date" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" autocomplete="off" data-date-autoclose="true" required>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">No of Days</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="no_of_days" type="text" placeholder="No of Days" id="example-text-input">
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
                                                    <th>Holiday Name</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>No. Of Days</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $item->holiday_name;?></td>
                                                    <td><?= $item->start_date;?></td>
                                                    <td><?= $item->end_date;?></td>
                                                    <td><?= $item->no_of_days;?></td>
                                                </tr>
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
                    $(document).ready(function() {
                        // Get the start date input element
                        var $startDateInput = $('input[name="start_date"]');
                        
                        // Get the end date input element
                        var $endDateInput = $('input[name="end_date"]');
                        
                        // Get the input element for displaying the number of days
                        var $numberOfDaysInput = $('input[name="no_of_days"]');
                        
                        // Function to calculate the number of days between two dates
                        function calculateNumberOfDays() {
                            console.log("ok");
                            // Parse the start date and end date strings
                            var startDate = new Date($startDateInput.val());
                            var endDate = new Date($endDateInput.val());
                            
                            // Calculate the difference in milliseconds
                            var differenceInMs = endDate - startDate;
                            
                            // Convert milliseconds to days and round it
                            var differenceInDays = Math.round(differenceInMs / (1000 * 60 * 60 * 24));
                            
                            // Update the number of days input value
                            $numberOfDaysInput.val(differenceInDays);
                        }
                        
                        // Add event listener to the end date input field
                        $endDateInput.change(calculateNumberOfDays);
                    });
                </script>