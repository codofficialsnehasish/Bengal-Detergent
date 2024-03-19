<script src="<?= base_url('assets/admin/libs/parsleyjs/parsley.min.js');?>"></script>

<script src="<?= base_url('assets/admin/js/pages/form-validation.init.js');?>"></script>

<!--tinymce js-->
<script src="<?= base_url('assets/admin/libs/tinymce/tinymce.min.js');?>"></script>

<script src="<?= base_url('assets/admin/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js');?>"></script>
<!-- init js -->
<script src="<?= base_url('assets/admin/js/pages/form-editor.init.js');?>"></script>

<script src="<?= base_url('assets/admin/js/pages/form-advanced.init.js');?>"></script>

<script src="<?= base_url('assets/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?= base_url('assets/admin/libs/dropzone/min/dropzone.min.js');?>"></script>
<script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>

<script>
    $(document).ready(function() {
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
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
        $(document).on("submit", "#basicInfoForm", function (event) {
            $('.binfoBtn').prop("disabled", true);
            $('.binfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/" + getUrl.pathname.split('/')[2]+"/";
            var form = $("#basicInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "employees/basicinfo",
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

 
        // contact form   
        $(document).on("submit", "#contactInfoForm", function (event) {
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2]+"/";
            var form = $("#contactInfoForm");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "employees/contactinfo",
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

        //document form
        $(document).on("submit", "#documentForm", function (event) {
            $('.cinfoBtn').prop("disabled", true);
            $('.cinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/" + getUrl.pathname.split('/')[2]+"/";
            var form = new FormData($("#documentForm")[0]);
            // var serializedData = form.serializeArray();
            // serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            form.append("csrf_modesy_token",getCookie('csrf_modesy_token'));
            $.ajax({
                url: base_url + "employees/documentinfo",
                type: "post",
                data: form,
                // dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.cinfoBtn').prop("disabled", false);
                    $('.cinfoBtn').html('Save Changes');
                    var obj = JSON.parse(response);
                    //  console.log(response);
                    if (obj.status == 1) {
                        // form[0].reset();  
                        showToast('success','Success',obj.msg);                         
                    }else{
                        showToast('error','Error',obj.msg);
                    }
                }
            });
            event.preventDefault();
        }); 


        //qualification form
        $(document).on("submit", "#qualification", function (event) {
            $('.qinfoBtn').prop("disabled", true);
            $('.qinfoBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
            var form = $("#qualification");
            var serializedData = form.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            $.ajax({
                url: base_url + "employees/qualificationinfo",
                type: "post",
                data: serializedData,
                dataType: "json",
                success: function (response) {
                    $('.qinfoBtn').prop("disabled", false);
                    $('.qinfoBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                    if (response.status == 1) {
                           form[0].reset();  
                           qualification();
                            showToast('success','Success',response.msg);                         
                    }else{
                            showToast('error','Error',response.msg);
                    }
                }
            });
            event.preventDefault();
        });

        function qualification(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
            $.ajax({
                url: base_url + "employees/getQualification",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(4); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#qualificationdata").html(resp);
                }
            });
        }
        qualification();

        // function delete_qualification(delid){
        //     const getUrl = window.location;
        //     const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
        //     $.ajax({
        //         url: base_url + "employees/deletequalification",
        //         type: "POST",
        //         data: {
        //             csrf_modesy_token: getCookie('csrf_modesy_token'),
        //             id: delid
        //         },
        //         dataType: "html",
        //         success: function (response) {
        //             if (response.status == 1) {
        //                 qualification();
        //                 showToast('success','Success',response.msg);                         
        //             }else{
        //                 showToast('error','Error',response.msg);
        //             }
        //         }
        //     });
        // }


        //work exprence form
        $(document).on("submit", "#workexprenceinfo", function (event) {
            $('.workxpBtn').prop("disabled", true);
            $('.workxpBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
            // var form = $("#workexprenceinfo");
            var form = new FormData($("#workexprenceinfo")[0]);
            // var serializedData = form.serializeArray();
            // serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            form.append("csrf_modesy_token",getCookie('csrf_modesy_token'));
            $.ajax({
                url: base_url + "employees/workexprenceinfo",
                type: "post",
                // data: serializedData,
                // dataType: "json",
                data: form,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.workxpBtn').prop("disabled", false);
                    $('.workxpBtn').html('Save Changes');
                    //var obj = JSON.parse(response);
                     console.log(response);
                     var dataArray = JSON.parse(response);
                    if (dataArray.status == 1) {
                        //    form[0].reset();
                        $("#workexprenceinfo")[0].reset();  
                        exprence();
                        showToast('success','Success',dataArray.msg);                         
                    }else{
                        showToast('error','Error',dataArray.msg);
                    }
                }
            });
            event.preventDefault();
        });
        function exprence(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
            $.ajax({
                url: base_url + "employees/getworkExprence",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(4); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#work_exprence").html(resp);
                }
            });
        }
        exprence();




        //achievements form
        // $(document).on("submit", "#achievementsinfo", function (event) {
        //     $('.achieveBtn').prop("disabled", true);
        //     $('.achieveBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
        //     const getUrl = window.location;
        //     const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        //     var form = $("#achievementsinfo");
        //     var serializedData = form.serializeArray();
        //     serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
        //     $.ajax({
        //         url: base_url + "employees/achievementsinfo",
        //         type: "post",
        //         data: serializedData,
        //         dataType: "json",
        //         success: function (response) {
        //             $('.achieveBtn').prop("disabled", false);
        //             $('.achieveBtn').html('Save Changes');
        //             //var obj = JSON.parse(response);
        //              console.log(response);
        //             if (response.status == 1) {
        //                    form[0].reset();  
        //                    achievements();
        //                     showToast('success','Success',response.msg);                         
        //             }else{
        //                     showToast('error','Error',response.msg);
        //             }
        //         }
        //     });
        //     event.preventDefault();
        // });
        // function achievements(){
        //     const getUrl = window.location;
        //     const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        //     $.ajax({
        //         url: base_url + "employees/getachievements",
        //         type: "POST",
        //         data: {
        //             csrf_modesy_token: getCookie('csrf_modesy_token'),
        //             id: <= $this->uri->segment(3); ?>
        //         },
        //         dataType: "html",
        //         success: function (resp) {
        //             $("#achievements").html(resp);
        //         }
        //     });
        // }
        // achievements();


        //bank_account form
        $(document).on("submit", "#bank_acc_details", function (event) {
            $('.bankBtn').prop("disabled", true);
            $('.bankBtn').html('<span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading...');
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
            var formd = $("#bank_acc_details");
            var serializedData = formd.serializeArray();
            serializedData.push({name: "csrf_modesy_token", value: getCookie('csrf_modesy_token')});
            console.log(serializedData);
            $.ajax({
                url: base_url + "employees/bankinfo",
                type: "post",
                data: serializedData,
                dataType: "html",
                success: function (response) {
                    $('.bankBtn').prop("disabled", false);
                    $('.bankBtn').html('Save Changes');
                    var obj = JSON.parse(response);
                    if (obj.status == 1) {
                        // form[0].reset(); 
                        $("#bank_acc_details")[0].reset();  
                        bankaccounts();
                        showToast('success','Success',obj.msg);                         
                    }else{
                        showToast('error','Error',obj.msg);
                    }
                }
            });
            event.preventDefault();
        });
        function bankaccounts(){
            const getUrl = window.location;
            const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
            $.ajax({
                url: base_url + "employees/getbankaccounts",
                type: "POST",
                data: {
                    csrf_modesy_token: getCookie('csrf_modesy_token'),
                    id: <?= $this->uri->segment(4); ?>
                },
                dataType: "html",
                success: function (resp) {
                    $("#bankaccounts").html(resp);
                }
            });
        }
        bankaccounts();
    });
</script>