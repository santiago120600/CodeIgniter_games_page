<div class="row">
    <?php foreach($container_data as $game){ ?>
        <div class="col-md-3">
            <div class="panel panel-default">
                <img src="<?=base_url('uploads/categories/'.$game->img_game);?>" alt="">
                <div class="panel-heading"><?=$game->name_game?></div>
                <div class="panel-body"><?=$game->desc_game?></div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-sm btn-danger float-right custom-action"
                        data-key="key_<?=$game->id_game;?>" data-opt="delete"><i class="fa fa-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success float-right mr-1 custom-action"
                        data-key="key_<?=$game->id_category;?>" data-opt="update"><i class="fa fa-pencil"></i></button>
                </div>
            </div>
        </div>
    <?php } ?>


</div>