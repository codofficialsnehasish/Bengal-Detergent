<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Board/University</th>
                    <th>Subject</th>
                    <th>Passing Year</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="qualificationdata"></tbody>
        </table>
   </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Qualification</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="qualification" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(4); ?>" >
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Qualification</label>
                <input type="text" class="form-control" name="qualification" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Board/University</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="validationCustomUsername" name="board_university"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Subject</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="subject" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Passing Year</label>
                <div class="input-group has-validation">
                    <input class="form-control" type="month" name="passing_year" value="" id="example-month-input" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Percentage</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="percentage" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary qinfoBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function delete_qualification(delid){
        const getUrl = window.location;
        const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/"+getUrl.pathname.split('/')[2]+"/";
        $.ajax({
            url: base_url + "employees/deletequalification",
            type: "POST",
            data: {
                csrf_modesy_token: getCookie('csrf_modesy_token'),
                id: delid
            },
            dataType: "html",
            success: function (response) {
                var dataArray = JSON.parse(response);
                if(dataArray.status == 1){
                    $.ajax({
                        url: base_url + "employees/getQualification",
                        type: "POST",
                        data: { csrf_modesy_token: getCookie('csrf_modesy_token'),id: <?= $this->uri->segment(4); ?> },
                        dataType: "html",
                        success: function (resp) {
                            $("#qualificationdata").html(resp);
                        }
                    });
                    showToast('success','Success',dataArray.msg);     
                }else{
                    showToast('error','Error',dataArray.msg);
                }
            }
        });
    } 
</script>