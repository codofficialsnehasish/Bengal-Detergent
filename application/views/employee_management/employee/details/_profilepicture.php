<div class="card">
    <div class="card-body">
        <h4 class="card-title">Profie Picture</h4>
         <p class="card-title-desc"><?= $user->full_name;?></p>
        <div class="row">
            <!-- <div class="col-md-6">
                <div class="mt-4 mt-md-0">
                    <img class="avatar-xl" alt="200x200" src="<?= get_image($user->user_image); ?>" data-holder-rendered="true" style="height: 17.5rem;width: 17.5rem;">
                </div>
            </div> -->
            <div class="col-md-12 d-flex ">
            <?= form_open_multipart('employee-management/employees/profilepicture');?>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(4);?>" />        
            <div class="card">
                <!-- <div class="card-header bg-primary text-light">
                    Profile Image
                </div> -->
                <div class="card-body text-center">
                    <div class="mb-0">
                        <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="<?= get_image($user->user_image);?>" data-holder-rendered="true" style="display:<?= $user->user_image!=0?'block;':'none;';?>">
                    </div>
                    <div class="mb-0">
                        <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                        <input type="hidden" name="media_id" id="media_id" />
                        <input type="hidden" name="hdn_media_id" id="media_id" value="<?= $user->user_image;?>" />
                        <!-- <a href="javascript:;" id="openLibrary">or Choose From Library</a> -->
                    </div> 
                </div>
                <div class="col-12">
                    <button class="btn btn-primary binfoBtn" type="submit">Save Changes</button>
                </div>
            </div>
            <?= form_close();?>
            </div>
        </div>
    </div>
</div>