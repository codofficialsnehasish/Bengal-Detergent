                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Attendance</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard/');?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="<?= employee_url('attendance/attendance-list')?>">Attendance</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Today Attendance Logs</li>
                                    </ol>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= employee_url('category/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Employee</th>
                                                    <th>Date</th>
                                                    <th>Check In</th>
                                                    <th>Check In Location</th>
                                                    <th>Check Out</th>
                                                    <th>Check Out Location</th>
                                                    <th>Stay Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                foreach($all_attendance as $item):?>
                                                <tr>
                                                    <td><?= $item->user_id;?></td>
                                                    <td><?= $item->date;?></td>
                                                    <td><?= $item->check_in_time;?></td>
                                                    <td><?= $item->check_in_location;?></td>
                                                    <td><?= $item->check_out_time;?></td>
                                                    <td><?= $item->check_out_location;?></td>
                                                    <td><?= $item->stay_time;?></td>
                                                    <td><?= $item->status;?></td>
                                                    <td>
                                                        <a href="<?= employee_url('attendance/edit-attendance/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'today-log');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                                        </a>
                                                    </td>
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