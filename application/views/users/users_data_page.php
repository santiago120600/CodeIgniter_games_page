<div class="row">
            <!-- card -->
            <?php foreach($container_data as $user){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="card-header">
                        <div class="row pt-4">
                            <!-- <div class="col-3 text-center">
                                <img src="<?=base_url("resources/img/usuario.jpg");?>" alt="..." style="width:50px" class="rounded-circle">
                            </div> -->
                            <div class="col-9 pt-2">
                                <h5 class="card-title"><?=$user->user_name?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row text-muted">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <i class="far fa-envelope"></i> 
                                    </div>
                                    <div class="col-9">
                                        <div>Email: <span class="text-dark"><?=$user->user_email?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- card -->