<?php
  $current_session = $this->session->userdata('store_sess');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php if ($current_session->user_privilege == 'Administrator') {
                        ?> 
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="alert alert-secondary">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalView" id="openModal" data-opt="new"><i class="fa fa-plus"></i>  New Category</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                    <div class="row mg-t-15">
                        <div class="col-md-12 col-lg-12" id="data_container">
                            <?=$container_data;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>