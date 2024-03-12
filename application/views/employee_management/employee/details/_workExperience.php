<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>GYM Name</th>
                    <th>Experience</th>
                    <th>Sertificate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="work_exprence">
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td></td>
            </tr>
            </tbody>
        </table>
   </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Experience</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="workexprenceinfo" method="post" novalidate>
        <input type="hidden" name="trainer_id" value="<?= $this->uri->segment(3); ?>" >
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">GYM Name</label>
                <input type="integer" class="form-control" name="name" id="validationCustom01" placeholder="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Experience in Year</label>
                <div class="input-group has-validation">
                    <input type="integer" class="form-control" name="exp_year" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <span class="input-group-text" id="inputGroupPrepend">Year/s</span>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Experience in Months</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="exp_months" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <span class="input-group-text" id="inputGroupPrepend">Month/s</span>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-0">
                <div class="mt-4 mt-md-0">
                    <img class="rounded" alt="200x200" src="<?= base_url('admin/assets/images/users/user-4.jpg') ?>" data-holder-rendered="true">
                </div>
                <label class="form-label">Sertificate (if any)</label>
                <input type="file" class="filestyle" data-input="false" data-buttonname="btn-secondary">
            </div>

            <div class="col-12">
                <button class="btn btn-primary workxpBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>