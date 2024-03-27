<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php 
    $userdata = get_user_data($paydata->employee_id);
?>
<div class="container mt-5 mb-5">
    <div class="img">
        <img src="<?= get_logo(); ?>" width="60px" alt="">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center lh-1 mb-5">
                <h1 class="fw-bold">Payslip</h1> 
                <span class="fw-normal"><strong>Payment slip for the month of <?= DateTime::createFromFormat('!m', $paydata->salary_month)->format('F');?> <?= $paydata->salary_year; ?></strong></span>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Employee ID : </span> <small class="ms-3"><?= $userdata->user_id; ?></small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Employee Name : </span> <small class="ms-3"><?= $userdata->full_name; ?></small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Phone No. : </span> <small class="ms-3"><?= $userdata->phone_number; ?></small> </div>
                        </div>
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Designation : </span> <small class="ms-3"><?= get_name("designation_master",$userdata->designation); ?></small> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div> <span class="fw-bolder">Mode of Pay : </span> <small class="ms-3"><?= $paydata->payment_method; ?></small> </div>
                        </div>
                    </div>
                </div>
                <table class="mt-4 table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Deductions</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Basic</th>
                            <td><?= $paydata->basic_pay; ?></td>
                            <td>PF</td>
                            <td><?= $paydata->pf_pay; ?></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td>Health Insurance</td>
                            <td><?= $paydata->health_insurance_pay; ?></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td>Income Tax</td>
                            <td><?= $paydata->income_tax_pay; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Bonus</th>
                            <td><?= $paydata->bonas_pay; ?></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            <td><?= $paydata->basic_pay + $paydata->bonas_pay ?>.00</td>
                            <td>Total Deductions</td>
                            <td><?= $paydata->pf_pay + $paydata->health_insurance_pay + $paydata->income_tax_pay + $paydata->other_deductions_pay ?>.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : <?= $paydata->net_salary_pay; ?></span> </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For <?= $this->settings->application_name?></span> <span class="mt-4">Authorised Signatory</span> </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>