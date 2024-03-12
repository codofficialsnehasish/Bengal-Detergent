<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Member</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= employee_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Members</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= employee_url('employees/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a>
                                        </div>
                                    </div>
                                </div>
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
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Date of Birth</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $userdata):
                                                    // $userdata = get_user_data($item->user_id);
                                                ?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><a href="<?= employee_url('employees/details/'.$userdata->id);?>"><img class="rounded-circle avatar-xl" alt="200x200" src="<?= get_image($userdata->user_image); ?>" data-holder-rendered="true" style="width: 38px;height: 38px;margin-right: 20px;"><?= $userdata->full_name;?></a></td>
                                                    <td><?= $userdata->status == 1? '<span class="badge bg-success"style="font-size:15px;">Active</span>' : '<span class="badge bg-danger"style="font-size:15px;">Inactive</span>'; ?> </td>
                                                    <td><?= $userdata->phone_number;?> </td>
                                                    <td><?= get_name("gender_master",$userdata->gender); ?> </td>
                                                    <td><?= $userdata->dob;?> </td>
                                                    <!-- <td><= formated_date($item->created_at);?></td> -->
                                                    <td>
                                                        <a href="<?= employee_url('employees/employee-profile/'.$userdata->id);?>" class="btn btn-success btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                            <i class="fas fa-eye" title="Edit"></i>
                                                        </a>
                                                        <a href="<?= employee_url('employees/details/'.$userdata->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'employees');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $userdata->id;?>">
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