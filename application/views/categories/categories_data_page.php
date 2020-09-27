<div class="row">
    <?php foreach($container_data as $category){ ?>
        <div class="col-md-3">
            <div class="panel panel-default">
                <img src="<?=base_url('uploads/categories/'.$category->icon_category);?>" alt="">
                <div class="panel-heading"><?=$category->name_category?></div>
                <div class="panel-body"><?=$category->desc_category?></div>
                <div class="panel-footer">
                    <a href="<?=base_url('games/initial/'.$category->id_category);?>"  class="btn btn-sm btn-info float-right custom-action mg-b-15"><i class="fa fa-gamepad"></i></a>
                    <button type="button" class="btn btn-sm btn-danger float-right custom-action"
                        data-key="key_<?=$category->id_category;?>" data-opt="delete"><i class="fa fa-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success float-right mr-1 custom-action"
                        data-key="key_<?=$category->id_category;?>" data-opt="update"><i class="fa fa-pencil"></i></button>
                </div>
            </div>
        </div>
    <?php } ?>


</div>