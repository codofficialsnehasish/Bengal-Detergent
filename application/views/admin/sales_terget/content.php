<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Sales Target</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
                                    </ol>
                                </div>
                                <?php if($this->auth_user->role == 'admin'){ ?>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= admin_url('sales-target/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php if($this->auth_user->role == 'admin'){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Month</th>
                                                    <!-- <th>Duration</th> -->
                                                    <th>Salesman Name</th>
                                                    <th>Designation</th>
													<th>Target</th>
                                                    <!-- <th>Product</th> -->
                                                    <th>Achieved</th>
                                                    <th>Gift</th>
                                                    <th>Visibility</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):
                                                    $saman = $this->select->select_single_data("users","id",$item->salesman_id);
                                                    $saman = $saman[0];
                                                ?>

                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><?= date('F', strtotime($item->month));?></td>
                                                    <!-- <td><?= $item->month;?></td> -->
                                                    <!-- <td><?= $item->start_date;?> - <?= $item->end_date;?></td> -->
                                                    <td><?= $saman->full_name;?></td>
                                                    <td><span class="badge <?= $saman->role == 'dristributor'? 'bg-success' : 'bg-info' ?>" style="font-size:15px;"><?= ucfirst($saman->role);?></span></td>
                                                    <td><?= $item->terget_amount; ?></td>
                                                    <!-- <td>
                                                        <ol>
                                                        <?php 
                                                            $pdct_id = explode(",",$item->perticilar_product); 
                                                            foreach($pdct_id as $d){
                                                                echo "<li>".get_title($d,"products")."</li>";
                                                            }
                                                        ?>
                                                        </ol>
                                                    </td> -->
                                                    <td><?= get_achieved_target_data($item->salesman_id,$item->month); ?> (<?= check_target_completion_percentage($item->terget_amount,get_achieved_target_data($item->salesman_id,$item->month)); ?>%)</td>
                                                    <td><?= get_title($item->gift,"gift") ? get_title($item->gift,"gift") : ""; ?></td>
                                                    <td><?= check_visibility($item->is_visible); ?></td>
                                                    <td>
                                                        <a href="<?= admin_url('sales-target/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'sales-target');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
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
                        <?php }
                        elseif($this->auth_user->role == 'dristributor'){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Month</th>
                                                    <!-- <th>Duration</th> -->
													<th>Target</th>
                                                    <!-- <th>Product</th> -->
                                                    <th>Achieved</th>
                                                    <th>Gift</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):
                                                    if($this->auth_user->id == $item->salesman_id):
                                                    $saman = $this->select->select_single_data("users","id",$item->salesman_id);
                                                    $saman = $saman[0];
                                                ?>

                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><?= date('F', strtotime($item->month));?></td>
                                                    <!-- <td><?= $item->start_date;?> - <?= $item->end_date;?></td> -->
                                                    <td><?= $item->terget_amount; ?></td>
                                                    <!-- <td>
                                                        <ol>
                                                        <?php 
                                                            $pdct_id = explode(",",$item->perticilar_product); 
                                                            foreach($pdct_id as $d){
                                                                echo "<li>".get_title($d,"products")."</li>";
                                                            }
                                                        ?>
                                                        </ol>
                                                    </td> -->
                                                    <td><?= get_achieved_target_data($item->salesman_id,$item->month); ?> (<?= check_target_completion_percentage($item->terget_amount,get_achieved_target_data($item->salesman_id,$item->month)); ?>%)</td>
                                                    <td><?= get_title($item->gift,"gift") ? get_title($item->gift,"gift") : ""; ?></td>
                                                </tr>
                                                <?php endif; endforeach;?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <?php } ?>

                    </div> <!-- container-fluid -->
                </div>