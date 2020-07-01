<div class="modal-header">
    <h5 class="modal-title">
        <?php if ($action == 'New') {
            echo 'New';
        }else if($action=='update'){
            echo 'Update';
        }else{
            echo 'Delete';
        }

        ?>
         Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_categories">
    <input type="hidden" name="form_action" value="<?=$action;?>">
    <?php if ($action!='new') {
        ?>
            <input type="hidden" name="id_category" value="<?=@$current_data['id_category'];?>">
        <?php
    }
    ?>
    <div class="modal-body">
        <div class="row mg-tb-15">
            <div class="col-12">
                <div class="form-group">
                    <label for="name_category">Name: </label>
                    <input type="text" name="name_category" class="form-control" id="name_category" value="<?=@$current_data['name_category'];?>">
                    <?php if (@$errors['name_category']) {
                        ?>
                    <small class="form-text text-danger float-right"><?=$errors['name_category'];?></small>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group"><label for="desc_category">Description: </label></div>
            </div>
            <textarea name="desc_category" class="form-control" id="desc_category"><?=@$current_data['desc_category'];?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Ok</button>
    </div>
</form>