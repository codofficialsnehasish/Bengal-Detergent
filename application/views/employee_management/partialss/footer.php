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
    document.addEventListener("DOMContentLoaded", function() {
        // Get the start date input element
        var startDateInput = document.querySelector('input[name="start_date"]');
        
        // Get the end date input element
        var endDateInput = document.querySelector('input[name="end_date"]');
        
        // Get the input element for displaying the number of days
        var numberOfDaysInput = document.querySelector('input[name="no_of_days"]');
        
        // Function to calculate the number of days between two dates
        function calculateNumberOfDays() {
            // Parse the start date and end date strings
            var startDate = new Date(startDateInput.value);
            var endDate = new Date(endDateInput.value);
            
            // Calculate the difference in milliseconds
            var differenceInMs = endDate - startDate;
            
            // Convert milliseconds to days and round it
            var differenceInDays = Math.round(differenceInMs / (1000 * 60 * 60 * 24));
            
            // Update the number of days input value
            numberOfDaysInput.value = differenceInDays;
        }
        
        // Add event listener to the end date input field
        endDateInput.addEventListener("change", calculateNumberOfDays);
    });
</script>

</body>
    
</html>