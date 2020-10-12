<div class="row mt-4">
    <?php foreach($games_data as $game){ ?>
        <div class="col-md-3">
            <div class="card">
                <img src="<?=base_url('uploads/games/'.$game->img_game);?>" alt="">
                <div class="card-header"><?=$game->name_game?></div>
                <div class="card-body"><?=$game->desc_game?></div>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-danger float-right custom-action"
                        data-key="key_<?=$game->id_game;?>" data-opt="delete"><i class="fa fa-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success float-right mr-1 custom-action"
                        data-key="key_<?=$game->id_game;?>" data-opt="update"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
        </div>
    <?php } ?>


</div>