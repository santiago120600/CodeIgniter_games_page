<div class="row mt-4">
    <?php foreach($container_data as $category){ ?>
        <div class="col-md-3">
            <div class="card">
                <div class="d-flex justify-content-center">
                    <img src="<?=base_url('uploads/categories/'.$category->icon_category);?>" alt="" width="200" height="150">
                </div>
                <div class="card-header"><?=$category->name_category?></div>
                <div class="card-body"><?=$category->desc_category?></div>
                <div class="card-footer">
                    <a href="<?=base_url('games/initial/'.$category->id_category);?>"  class="btn btn-sm btn-info float-right custom-action mg-b-15"><i class="fa fa-gamepad"></i></a>
                    <button type="button" class="btn btn-sm btn-danger float-right custom-action"
                        data-key="key_<?=$category->id_category;?>" data-opt="delete"><i class="fa fa-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success float-right mr-1 custom-action"
                        data-key="key_<?=$category->id_category;?>" data-opt="update"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
        </div>
    <?php } ?>


</div>