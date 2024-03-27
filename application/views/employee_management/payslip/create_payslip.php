<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
      <div class="page-title-box">
         <div class="row align-items-center">
            <div class="col-md-8">
               <h6 class="page-title">Payroll</h6>
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="<?= employee_url('dashboard')?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= employee_url('payroll')?>">Payroll</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Payslip</li>
               </ol>
            </div>
            <div class="col-md-4">
               <div class="float-end d-none d-md-block">
                  <div class="dropdown">
                     <a href="<?= employee_url('payroll/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                     <i class="fas fa-arrow-left me-2"></i> Back
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row mb-5">
      <?php $this->load->view('employee_management/partialss/_messages');?>
      </div>
      <!-- end page title -->
      <?= form_open_multipart('employee-management/payroll/create-pay-slip', 'class="row g-3 needs-validation" novalidate');?>
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01" class="form-label">Designation</label>
                            <select class="form-select" name="designation" id="designations" required>
                                <option selected disabled value="">Choose...</option>
                                <?php if(!empty($designation)):
                                    foreach($designation as $designation):
                                ?>
                                <option value="<?= $designation->id;?>"><?= $designation->name;?></option>
                                <?php 
                                    endforeach;
                                endif;?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01" class="form-label">Employee</label>
                            <select class="form-select" name="employee" id="employees" required>
                                <option selected disabled value="">Choose...</option>
                            </select>
                            <div class="invalid-feedback">
                                This field is required
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="salary_month" class="form-label">Month & Year</label>
                            <div class="input-group has-validation">
                                <input class="form-control" type="month" name="salary_date" value="<?= date("Y-m") ?>" id="salary_month">
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
               
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Summary
                    </div>
                    <div class="card-body row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label for="base_salary" class="col-sm-4 col-form-label">Besic Salary</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" name="base_salary" value="" type="search" placeholder="0.00" id="base_salary" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="provident_fund" class="col-sm-4 col-form-label">Provident Fund</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="provident_fund" placeholder="0.00" id="provident_fund" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="health_insurance" class="col-sm-4 col-form-label">Health Insurance</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="health_insurance" placeholder="0.00" id="health_insurance" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="income_tax" class="col-sm-4 col-form-label">Income Tax</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="income_tax" placeholder="0.00" id="income_tax" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="other_deductions" class="col-sm-4 col-form-label">Other Deductions</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="other_deductions" placeholder="0.00" id="other_deductions" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bonas" class="col-sm-4 col-form-label">Bonas (if any)</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="bonas" placeholder="0.00" id="bonas" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="net_salary_pay" class="col-sm-4 col-form-label">Net Salary Paying</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="net_salary_pay" placeholder="0.00" id="net_salary_pay" onkeyup="calculatePayingInHand()">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pay_method" class="col-sm-4 col-form-label">Payment Method</label>
                                <div class="col-sm-8">
                                    <!-- <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input"> -->
                                    <select class="form-select" name="payment_method" id="pay_method" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Bank Account">Bank Account</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <!-- <input class="form-control input-group" type="search" placeholder="0.00" id="example-search-input"> -->
                                    <select class="form-select" name="status" id="status" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-4 col-form-label">Comments</label>
                                <div class="col-sm-8">
                                    <input class="form-control input-group" type="search" name="comments" placeholder="" id="example-search-input">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div style="float: inline-end;">
                                    <button type="submit" id="payslbtn" class="btn btn-primary waves-effect waves-light me-1 btn-block">
                                    Create Payslip
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
               </div>
               
            </div>
            <!-- end col -->
        </div>
      <?= form_close();?>
   </div>
   <!-- container-fluid -->
</div>


                                            
<script>
    function calculatePayingInHand() {
        var baseSalary = parseFloat(document.getElementById('base_salary').value) || 0;
        var pfContribution = parseFloat(document.getElementById('provident_fund').value) || 0;
        var healthInsurance = parseFloat(document.getElementById('health_insurance').value) || 0;
        var incomeTax = parseFloat(document.getElementById('income_tax').value) || 0;
        var otherDeductions = parseFloat(document.getElementById('other_deductions').value) || 0;
        var bonas = parseFloat(document.getElementById('bonas').value) || 0;

        var totalDeductions = pfContribution + healthInsurance + incomeTax + otherDeductions;
        var payingInHand = baseSalary - totalDeductions + bonas;

        document.getElementById('net_salary_pay').value = payingInHand.toFixed(2);
    }
    calculatePayingInHand();
</script>