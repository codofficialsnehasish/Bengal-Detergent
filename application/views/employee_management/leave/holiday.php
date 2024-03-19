<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Holiday</h6>
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
                                                <input class="form-control" name="holiday_name" type="text" placeholder="Holiday Name" required id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="input-daterange input-group mb-3" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                            <input type="text" class="form-control" name="start_date" placeholder="Start Date" autocomplete="off" required/>
                                            <input type="text" class="form-control" name="end_date" onchange="calculation()" placeholder="End Date" autocomplete="off" required/>
                                        </div>

                                        <!-- <div class="row mb-3">
                                            <label class="col-sm-4 col-form-label">Start Date</label>
                                            <div class="col-sm-8">
                                                <div class="input-group" id="datepicker6">
                                                    <input type="text" id="start_date" class="form-control" name="start_date" placeholder="Start Date" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" autocomplete="off" data-date-autoclose="true" required>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="row mb-3">
                                            <label class="col-sm-4 col-form-label">End Date</label>
                                            <div class="col-sm-8">
                                                <div class="input-group" id="datepicker6">
                                                    <input type="text" class="form-control" name="end_date" id="end_date" placeholder="End Date" data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker" autocomplete="off" data-date-autoclose="true" required>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">No of Days</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="no_of_days" type="text" placeholder="No of Days" id="no_of_days">
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
                    // $(function(){
                    //     alert("ok");
                    //     $("#start_date").datepicker({ dateFormat:'dd/mm/yy' });
                    //     $("#end_date").datepicker({ dateFormat:'dd/mm/yy' }).bind("change",function(){
                    //         var minValue = $(this).val();
                    //         minValue = $.datepicker.parseDate("dd/mm/yy", minValue);
                    //         minValue.setDate(minValue.getDate());
                    //         $("#end_date").datepicker( "option", "minDate", minValue );
                    //     })
                    // });
                    // $(document).ready(function(e) {
                        function calculation(){
                            var startDate = $('#datepicker6 input[name="start_date"]').val();
                            var endDate = $('#datepicker6 input[name="end_date"]').val();
                            if (startDate && endDate) {
                                // Parse the dates and calculate the difference in milliseconds
                                var date1 = new Date(startDate);
                                var date2 = new Date(endDate);
                                var timeDiff = Math.abs(date2.getTime() - date1.getTime());

                                // Convert the difference from milliseconds to days
                                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                                // Update the total number of days input field
                                $('#no_of_days').val(diffDays + 1);
                            } else {
                                // If either start date or end date is not provided, clear the total number of days input field
                                $('#no_of_days').val('');
                            }
                            // alert(diffDays+1);
                            // var from = $('#start_date').val().split("/").reverse( ).join( '-' );
                            // var to = $('#end_date').val().split("/").reverse( ).join( '-' );
                            // console.log(from);
                            // var date1 =new Date(from);
                            // var date2 =new Date(to);
                            // var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                            // var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                            // $('#no_of_days').val(diffDays+1);
                            
                        }
                        // $('#end_date').change(calculation)
                    // });
                </script>