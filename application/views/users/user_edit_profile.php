<div class="container mb-5">
    <div class="row">
        <div class="col-3 mr-5">
            <div class="list-group">
                <a class="list-group-item list-group-item-action <?=@$profile_selected ? 'list-group-item-primary' : '';?>" href="<?=base_url('users/editMenu/profile');?>">Profile</a>
                <a class="list-group-item list-group-item-action <?=@$account_selected ? 'list-group-item-primary' : '';?>" href="<?=base_url('users/editMenu/account');?>">Account</a>
                <a class="list-group-item list-group-item-action <?=@$account_security_selected ? 'list-group-item-primary' : '';?>" href="<?=base_url('users/editMenu/account_security');?>">Account security</a>
            </div>
        </div>
        <div class="col">
            <?=$container_data;?>
        </div>
    </div>
</div>