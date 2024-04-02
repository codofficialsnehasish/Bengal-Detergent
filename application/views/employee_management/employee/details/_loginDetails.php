<div class="card">
    <div class="card-body">
    <!-- <button type="button" class="btn btn-outline-info waves-effect waves-light float-end">Download Profile</button> -->
        <h4 class="card-title">Login Details</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>

        <form class="row g-3 custom-validation" id="logindetailsForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Email-id</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="" name="login_email" value="<?= $user->email;?>" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Password</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder=""  name="login_password" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3">
            </div>
            <div class="col-12">
                <button class="btn btn-primary binlogBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
