<!-- aqui poner un ciclo for que me itere todos los mensajes -->
<div class="row mt-4">
    <?php foreach($container_data as $comment){ ?>
        <div class="col-md-3">
            <div class="card">
                <!-- hacer una consulta que me traiga el nombre o email del usuario con una consulta multi tabla -->
                <div class="card-header"><?=$comment->user_name?></div>
                <div class="card-body"><?=$comment->content?></div>
            </div>
        </div>
    <?php } ?>
</div>