<!-- falta que en esta pagina se vea la informacion del juego ademas de los comentarios -->
<!-- arreglar que en el header_page aparezca el juego en el que esta  -->
<!-- Games > Gears of war -->
<!-- Mostrar la imagen del juego -->
<!-- poder agregar comentario -->
<!-- mostrar calificacion del juego -->
<style>
.iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    height: 0;
}

.iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

<?php
  $current_session = $this->session->userdata('store_sess');
?>

<!-- falta poner el titulo en algun lado -->

<div class="container">
    <div class="row">
        <div class="col">
            <!-- el trailer tiene que ser de acuerdo al juego -->
            <div class="iframe-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$game_data->trailer_game?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 d-flex justify-content-center">
            <img src="<?=base_url('uploads/games/'.$game_data->img_game);?>" alt="" width="206" height="315">
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            <div class="card w-100 h-100">
                <div class="card-body d-flex justify-content-center">
                    <div class="align-self-center">
                        <!-- gauge chart here -->
                        <h1>Rate</h1>
                        <h1><?=$game_data->rate?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 col-lg-12">
             <!--Error Message Start-->
             <?php if($this->session->flashdata('error_commment')){ ?>
            <div class="alert alert-danger alert-mg-b" role="alert">
                <?=@$this->session->flashdata('error_commment');?>
            </div>
            <?php } ?>
            <!--Error Message End-->
            <div class="card">
                <div class="card-body">
                    <?=form_open('Games/saveComment');?>
                        <div class="row">
                            <input type="hidden" value="<?=$current_session->user_id ?>" name="user_id_input">
                            <input type="hidden" value="<?=$game_data->id_game?>" name="game_id_input">
                            <div class="col-xl-11 col-lg-11 col-md-10 col-sm-9 col-9">
                                <textarea type="text" class="form-control" placeholder="Add a comment" name="comment_input"></textarea>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2 col-2">
                                <button class="btn btn-primary" type="submit"><i
                                        class="far fa-paper-plane"></i></button>
                            </div>
                        </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col ml-2">
                            <h3>
                                Comments
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <?=$container_data;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>