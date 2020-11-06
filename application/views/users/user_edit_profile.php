<div class="container mb-5">
    <div class="row">
        <div class="col">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=base_url('users/editMenu/profile');?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('users/editMenu/account');?>">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('users/editMenu/account_security');?>">Account security</a>
                </li>
            </ul>
        </div>
        <div class="col">
            <?=$container_data;?>
        </div>
    </div>
</div>