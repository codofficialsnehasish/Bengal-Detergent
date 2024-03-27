<style>
    .profile-card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .profile-header {
        background-color: #007bff;
        color: #fff;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 20px;
    }
    .profile-picture {
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 200px;
        height: 200px;
    }
    .profile-info {
        padding: 20px;
    }
    .profile-info h3 {
        color: #007bff;
    }
    .profile-info p {
        color: #495057;
    }
    .profile-info ul {
        list-style-type: none;
        padding: 0;
    }
    .profile-info ul li {
        margin-bottom: 10px;
    }
    .profile-footer {
        text-align: center;
        padding: 20px;
        background-color: #f8f9fa;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }
</style>
<div class="row mt-5 mb-5" style="margin-top: 6rem!important;">
    <div class="col-md-10 mx-auto">
        <div class="card profile-card">
            <div class="card-header profile-header">
                <h3 class="text-center">Employee Profile</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <img src="<?= get_image($userdata->user_image); ?>" alt="Profile Picture" class="img-fluid profile-picture">
                        <p class="pt-3"><?= $userdata->status == 1? '<span class="badge bg-success"style="font-size:15px;">Active</span>' : '<span class="badge bg-danger"style="font-size:15px;">Inactive</span>'; ?></p>
                    </div>
                    <div class="col-md-5 profile-info">
                        <h3><?= $userdata->full_name; ?></h3>
                        <p><strong>Employee ID : </strong><?= $userdata->user_id; ?></p>
                        <p><strong>Date of Birth :</strong><?= $userdata->dob; ?></p>
                        <p><strong>Email : </strong><?= $userdata->email; ?></p>
                        <p><strong>Email:</strong><?= $userdata->email; ?></p>
                    </div>
                    <div class="col-md-4 profile-info">
                        <h3 class="pt-4"></h3>
                        <p><strong>Designation : </strong><?= get_name("designation_master",$userdata->designation); ?></p>
                        <p><strong>Gender : </strong><?= get_name("gender_master",$userdata->gender); ?></p>
                        <p><strong>Phone No. : </strong><?= $userdata->phone_number; ?></p>
                        <p><strong>Email:</strong><?= $userdata->email; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 profile-info">
                        <h4>Education</h4>
                        <ul>
                            <li>Degree: Bachelor of Science in Computer Science</li>
                            <li>University: Example University</li>
                            <li>Year of Graduation: 2020</li>
                        </ul>
                    </div>
                    <div class="col-md-6 profile-info">
                        <h4>Documents</h4>
                        <ul>
                            <li><a href="#">Document 1</a></li>
                            <li><a href="#">Document 2</a></li>
                            <!-- Add more documents here -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="profile-footer">
                <a href="<?= employee_url('employees/details/'.$userdata->id); ?>" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>