<script src="<?= base_url('assets/libs/parsleyjs/parsley.min.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-validation.init.js');?>"></script>

<!--tinymce js-->
<script src="<?= base_url('assets/libs/tinymce/tinymce.min.js');?>"></script>

<script src="<?= base_url('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
<!-- init js -->
<script src="<?= base_url('assets/js/pages/form-editor.init.js');?>"></script>

<script src="<?= base_url('assets/js/pages/form-advanced.init.js');?>"></script>

<script src="<?= base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
         <script src="<?= base_url('assets/libs/dropzone/min/dropzone.min.js');?>"></script>

<script>
    $(document).ready(function() {
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";

        $("#designations").on('change', function(){ 
            $("#employees").html('');
            const designationid= $(this).val();
            $.ajax({
                url : base_url + "employee-according-designation",
                data:{designation_id : designationid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    $('#employees').html('<option value="">Loading...</option>'); 
                },
                success:function(response) {
                    $('#employees').html('');
                    $("#employees").append('<option selected disabled value="">Choose...</option>');
                    $.each(response , function(index, item) { 
                        $("#employees").append('<option value="'+item.id+'">'+item.full_name+'</option>');
                    });
                }
            });
        });

        $("#employees").on('change', function(){ 
            const empid= $(this).val();
            $.ajax({
                url : base_url + "get-salary-config-by-employe-id",
                data:{emp_id : empid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                success:function(response) {
                    // console.log(response);
                    if(response == false){
                        $("#base_salary").val('');
                        $("#provident_fund").val('');
                        $("#health_insurance").val('');
                        $("#other_deductions").val('');
                        $("#net_salary_pay").val('');
                        $("#income_tax").val('');
                    }
                    $.each(response , function(index, item) { 
                        // console.log(index+' : '+ item.id);
                        $("#base_salary").val(item.base_salary);
                        $("#provident_fund").val(item.provident_fund);
                        $("#health_insurance").val(item.health_insurance);
                        $("#other_deductions").val(item.other_deductions);
                        $("#net_salary_pay").val(item.paying_in_hand);
                        $("#income_tax").val(item.income_tax);
                    });
                    check_payslip_created_or_not(empid);
                }
            });
        });

        function check_payslip_created_or_not(){
            const emp_id= $('#employees').val();
            const month = $('#salary_month').val();
            $.ajax({
                url : base_url + "check-employee-payslip-created-or-not",
                data:{empid : emp_id, salary_month : month, csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                success: function(response) {
                    if(response.trim() !== '') { // Check if the response is not empty
                        $('#payslbtn').text(response); // Update the button text
                        $('#payslbtn').prop("disabled", true); // Disable the button
                    }else{
                        $('#payslbtn').text('Create Payslip');
                        $('#payslbtn').prop("disabled", false);
                    }
                }
            });
        }

        $("#salary_month").on('change', function(){ 
            check_payslip_created_or_not();
        });
    });

</script>