<div class="container">
    <div class="row mb-5">
        <div class="col-12 d-flex justify-content-center">
            <img src="<?=base_url('uploads/users/'.$container_data->user_img);?>" alt="" width="260" height="260" class="rounded-circle">
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <h2><?=$container_data->user_name?></h2>
            <h2><?=$container_data->user_email?></h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-4">
            <a href="<?=base_url('users/editMenu');?>" class="btn btn-primary btn-block">Edit profile</a>
        </div>
    </div>