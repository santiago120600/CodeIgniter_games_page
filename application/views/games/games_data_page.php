<?php
  $current_session = $this->session->userdata('store_sess');
?>

<div class="row mt-4">
    <?php foreach($games_data as $game){ ?>
        <div class="col-md-3">
            <div class="card">
                <!-- hacer que al dar click a la imagen redirija a la pagina de informacion del juego -->
                <div class="d-flex justify-content-center">
                    <a href="<?=base_url('games/gameInfo/'.$game->id_game);?>">
                        <img src="<?=base_url('uploads/games/'.$game->img_game);?>" alt="" width="200" height="150">
                    </a>
                </div>
                <div class="card-header"><h3><?=$game->name_game?></h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Description:
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <?=$game->desc_game?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Rate: <?=$game->rate?>
                        </div>
                    </div>
                </div>
                <?php if ($current_session->user_privilege == 'Administrator') {
                    ?> 
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-danger float-right custom-action"
                                data-key="key_<?=$game->id_game;?>" data-opt="delete"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-primary float-right mr-1 custom-action"
                                data-key="key_<?=$game->id_game;?>" data-opt="update"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    <?php
                    } 
                ?>
            </div>
        </div>
    <?php } ?>


</div>