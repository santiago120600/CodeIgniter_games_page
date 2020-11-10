<?php  $current_session = $this->session->userdata('store_sess'); ?>
<div class="row">
    <h3>Change password</h3>
</div>
<!--Success Message Start-->
<?php if($this->session->flashdata('success_msg')){ ?>
<div class="row">
    <div class="col-4">
        <div class="alert alert-success alert-mg-b" role="alert">
            <?=@$this->session->flashdata('success_msg');?>
        </div>
    </div>
</div>
<?php } ?>
<!--Success Message End-->
<!--Error Message Start-->
<?php if($this->session->flashdata('error_msg_pass_update')){ ?>
<div class="row">
    <div class="col-4">
        <div class="alert alert-danger alert-mg-b" role="alert">
            <?=@$this->session->flashdata('error_msg_pass_update');?>
        </div>
    </div>
</div>

<?php } ?>
<!--Error Message End-->
<div class="row">
    <?=form_open('users/updatePass');?>
    <input type="hidden" value="<?=$current_session->user_id?>" name="user_id">
    <div class="form-group">
        <label for="exampleInputPassword1">Old password</label>
        <input type="password" class="form-control" name="old_pass">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">New password</label>
        <input type="password" class="form-control" name="new_pass">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm new password</label>
        <input type="password" class="form-control" name="conf_new_pass">
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Update password</button>
        </div>
        <div class="col align-self-center">
            <a href="<?=base_url("Forgot_pass");?>">I forgot password</a>
        </div>
    </div>
    <?=form_close();?>
</div>