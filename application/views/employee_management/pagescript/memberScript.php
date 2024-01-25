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
        /////////////////////////////get state name
          $("#pr_country_id").on('change', function(){ 
          $("#pr_state_id").html('');
          const countryid= $(this).val();
         // console.log(base_url);
            $.ajax({
                url : base_url + "get-state-list",
                data:{country_id : countryid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                       $('#pr_state_id').html('<option value="">Loading...</option>'); 
                    },
                success:function(response) {
                    console.log(response);
                    $("#pr_state_id").append('<option selected disabled value="">Choose...</option>');
                    $.each(response , function(index, item) { 
                    $("#pr_state_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                });
                //  $('.spinner-border').hide();
                }
            });
});

         $("#pm_country_id").on('change', function(){ 
                  $("#pm_state_id").html('');
                  const countryid= $(this).val();
                 // console.log(base_url);
                    $.ajax({
                        url : base_url + "get-state-list",
                        data:{country_id : countryid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                              $('#pm_state_id').html('<option value="">Loading...</option>'); 
                            },
                        success:function(response) {
                            console.log(response);
                            $("#pm_state_id").append('<option selected disabled value="">Choose...</option>');
                            $.each(response , function(index, item) { 
                            $("#pm_state_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });
        });

        //////////////////////////////get city list
        $("#pr_state_id").on('change', function(){ 
            $("#pr_city_id").html('');
                const stateid= $(this).val();
               // console.log(base_url);
                    $.ajax({
                        url : base_url + "get-city-list",
                        data:{state_id : stateid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                            $('#pr_city_id').html('<option value="">Loading...</option>'); 
                            },
                        success:function(response) {
                            $("#pr_city_id").html('');
                            $("#pr_city_id").append('<option value="">Select City</option>');
                            $.each(response , function(index, item) { 
                            $("#pr_city_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });
        });
        $("#pm_state_id").on('change', function(){ 
            $("#pm_city_id").html('');
                const stateid= $(this).val();
               // console.log(base_url);
                    $.ajax({
                        url : base_url + "get-city-list",
                        data:{state_id : stateid,csrf_modesy_token:getCookie('csrf_modesy_token')},
                        method:'post',
                        dataType:'json',
                        beforeSend: function(){
                            $('#pm_city_id').html('<option value="">Loading...</option>'); 
                            },
                        success:function(response) {
                            $("#pm_city_id").html('');
                            $("#pm_city_id").append('<option value="">Select City</option>');
                            $.each(response , function(index, item) { 
                            $("#pm_city_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        //  $('.spinner-border').hide();
                        }
                    });
        });
        
        
       // basicInfoForm    
        $(document).on("submit", "#bodymeasurementForm", function (event) {
            $('.bmBtn').prop("disabled", true);
            $('.bmBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#bodymeasurementForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/bodymeasurement",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.bmBtn').prop("disabled", false);
                    $('.bmBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                           // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
        });
        event.preventDefault();

 });
 
         // body measurement    
        $(document).on("submit", "#basicInfoForm", function (event) {
            $('.binfoBtn').prop("disabled", true);
            $('.binfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#basicInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/basicinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.binfoBtn').prop("disabled", false);
                    $('.binfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                           // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
        });
        event.preventDefault();

 });

 
        // body measurement    
        $(document).on("submit", "#contactInfoForm", function (event) {
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            var form = $("#contactInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "members/contactinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                           // form[0].reset();  
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
        });
        event.preventDefault();

 });


 
});
</script>