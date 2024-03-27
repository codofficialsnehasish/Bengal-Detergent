<style>
    .label {
        display: inline-block;
        width: 120px; /* Adjust as needed */
        text-align: right;
        margin-right: 10px; /* Adjust as needed for spacing */
    }

    .value {
        display: inline-block;
        width: 120px; /* Adjust as needed */
        text-align: left;
        margin-left: 10px; /* Adjust as needed for spacing */
    }
</style>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Payslip</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= employee_url('dashboard');?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Payslips</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= employee_url('payroll/create-payslip')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Create Payslip
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
                                                    <th>Employee Name</th>
                                                    <th>Summary</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $paydata):
                                                    // $userdata = get_user_data($item->user_id);
                                                ?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td class="text-wrap"><?= get_user_name($paydata->employee_id);?></td>
                                                    <td>
                                                        <span class="label">Basic Salary :</span><span class="value"><?= $paydata->basic_pay; ?></span><br>
                                                        <span class="label">Total Deduction :</span><span class="value"><?= $paydata->pf_pay + $paydata->health_insurance_pay + $paydata->income_tax_pay + $paydata->other_deductions_pay ?></span><br>
                                                        <?php if($paydata->bonas_pay != 0.00){ ?>
                                                            <span class="label">Bonus Pay :</span><span class="value"><?= $paydata->bonas_pay; ?></span><br>
                                                        <?php } ?>
                                                        <span class="label">Net Salary :</span><span class="value"><?= $paydata->net_salary_pay; ?></span><br>
                                                    </td>
                                                    <td><?= $paydata->salary_year;?> </td>
                                                    <td><?= DateTime::createFromFormat('!m', $paydata->salary_month)->format('F');?> </td>
                                                    <td><?= $paydata->status;?> </td>
                                                    <td>
                                                        <a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= employee_url(); ?>payroll/payslip/<?= $paydata->id ?>', title: 'Payslip', w: 1000, h: 600});" class="btn btn-success  dropdown-toggle" aria-expanded="false">
                                                            <i class="mdi mdi-cloud-download me-2"></i>Payslip
                                                        </a>
                                                        <!-- <a href="<?= employee_url('payroll/payslip/'.$paydata->id);?>" class="btn btn-success btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                            Payslip
                                                        </a> -->
                                                        <a class="btn btn-danger" onclick="confirmDelete(this.id,'payroll');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $paydata->id;?>">
                                                            <i class="fas fa-trash-alt me2" title="Remove"></i>
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


<script>
	const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;
    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )
    if (window.focus) newWindow.focus();
    newWindow.print();
}
</script>