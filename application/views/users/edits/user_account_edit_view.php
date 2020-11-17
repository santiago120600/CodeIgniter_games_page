<?php  $current_session = $this->session->userdata('store_sess'); ?>
<!--Success Message Start-->
<?php if($this->session->flashdata('success_msg_username')){ ?>
<div class="row">
    <div class="col-4">
        <div class="alert alert-success alert-mg-b" role="alert">
            <?=@$this->session->flashdata('success_msg_username');?>
        </div>
    </div>
</div>
<?php } ?>
<!--Success Message End-->
<!--Error Message Start-->
<?php if($this->session->flashdata('error_msg_username')){ ?>
<div class="row">
    <div class="col-4">
        <div class="alert alert-danger alert-mg-b" role="alert">
            <?=@$this->session->flashdata('error_msg_username');?>
        </div>
    </div>
</div>

<?php } ?>
<!--Error Message End-->
<div class="row">
    <h3>Change username</h3>
</div>
<div class="row">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="">Change
        username</button>
</div>

<!-- Modal start -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change username</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                  <?=form_open('users/editUsername');?>
                    <div class="form-group">
                        <input type="hidden" value="<?=$current_session->user_id?>" name="user_id">
                        <label for="">New username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                <?=form_close();?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->