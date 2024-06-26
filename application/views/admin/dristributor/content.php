<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Dristributor</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Dristributor</li>
                                    </ol>
                                </div>
                                <?php if($this->auth_user->role == "admin"){ ?>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="<?= admin_url('dristributor/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                                <i class="fas fa-plus me-2"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Business Name</th>
                                                    <?php if($this->auth_user->role == "admin"){ ?>
                                                    <th>Team Lead</th>
                                                    <?php } ?>
                                                    <th>Contact</th>
                                                    <th>E-Mail</th>
                                                    <th>Status</th>
                                                    <th>Work Pin Code</th>
                                                    <?php if($this->auth_user->role == "admin"){ ?>
                                                    <th>Action</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td class="text-wrap"><?= $item->user_id;?></td>
                                                    <td><img src="<?= get_image($item->user_image);?>" width="50" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= admin_url('dristributor/details/'.$item->id);?>"><?= $item->full_name;?></a></td>
                                                    <td class="text-wrap"><a href="<?= admin_url('dristributor/details/'.$item->id);?>"><?= $item->shop_name;?></a></td>
                                                    <?php if($this->auth_user->role == "admin"){ ?>
                                                    <td class="text-wrap"><?= get_user_name($item->tl_id);?></td>
                                                    <?php } ?>
                                                    <!-- <td><a href="<= admin_url('dristributor/details/'.$item->id);?>"><= $item->designation;?></a></td> -->
                                                    <td><a href="<?= admin_url('dristributor/details/'.$item->id);?>"><?= $item->phone_number;?></a></td>
                                                    <td class="text-wrap"><a href="<?= admin_url('dristributor/details/'.$item->id);?>"><?= $item->email;?></a></td>
                                                    <td class="text text-center"><?= check_status($item->status);?> </td>
                                                    <td class="text-wrap"><?= $item->prefarable_zip_code; ?></td>
                                                    <?php if($this->auth_user->role == "admin"){ ?>
                                                    <td>
                                                        <a href="<?= admin_url('dristributor/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>

                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'dristributor');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                                        </a>
                                                    </td>
                                                    <?php } ?>
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