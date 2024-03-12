<div class="card">
    <div class="card-body">
        <h4 class="card-title">Documents</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>
    
        <form class="row g-3 needs-validation" id="documentForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Aadhar No.</label>
                <input type="text" class="form-control" value="<?= $user->aadhar_no;?>" name="aadhar_no" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Pan No.</label>
                <input type="text" class="form-control" value="<?= $user->pan_no;?>" name="pan_no" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
           
            <div class="col-md-6 mb-0">
                         
                <div class="mt-4 mt-md-0">
                    <img class="rounded" alt="200x200" style="width:100px;" src="<?= get_image($user->aadhar_proof); ?>" data-holder-rendered="true">
                </div>
           

                <label class="form-label">Aadhar Card Scan Copy</label>
                <input type="file" name="aadhar_proof" class="filestyle" data-input="false" data-buttonname="btn-secondary">
            </div>
            <div class="col-md-6 mb-0">
                <div class="mt-4 mt-md-0">
                    <img class="rounded" alt="200x200" style="width:100px;" src="<?= get_image($user->pan_proof); ?>" data-holder-rendered="true">
                </div>
                <label class="form-label">Pancard Scan Copy</label>
                <input type="file" name="pan_froof" class="filestyle" data-input="false" data-buttonname="btn-secondary">
            </div>
            <div class="col-12 ">
                <button class="btn btn-primary float-end" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
