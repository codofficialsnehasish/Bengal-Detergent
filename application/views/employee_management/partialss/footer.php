<?php $this->load->view('employee_management/partialss/inner-footer');?>
                
                </div>
                <!-- end main content-->
    
            </div>
            <!-- END layout-wrapper -->
            <?php $this->load->view('employee_management/partialss/right-sidebar');?>
            
    
            <?php $this->load->view('employee_management/partialss/vendor-script');?>
             
            <script src="<?= base_url('assets/admin/js/app.js');?>"></script>
            <?php $this->load->view('employee_management/partialss/mediaUpload');?>
            <script>
                $("#switch3").on("click", function() {
                    var currentValue = parseInt($(this).val());
        
                    // Toggle the value between 1 and 0
                    var newValue = currentValue === 1 ? 0 : 1;
                    
                    // Set the new value of the checkbox
                    $(this).val(newValue);
                    
                    // Output the new value to the console
                    console.log("Checkbox value:", newValue);
                });
            </script>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     var startDateInput = document.querySelector('input[name="start_date"]');
    //     var endDateInput = document.querySelector('input[name="end_date"]');
    //     var numberOfDaysInput = document.querySelector('input[name="no_of_days"]');
    //     function calculateNumberOfDays() {
    //         var startDate = new Date(startDateInput.value);
    //         var endDate = new Date(endDateInput.value);
    //         var differenceInMs = endDate - startDate;
    //         var differenceInDays = Math.round(differenceInMs / (1000 * 60 * 60 * 24));
    //         numberOfDaysInput.value = differenceInDays;
    //     }
    //     endDateInput.addEventListener("change", calculateNumberOfDays);
    // });
</script>


</body>
    
</html>