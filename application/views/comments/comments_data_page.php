<div class="row mt-4">
    <?php foreach($container_data as $comment){ ?>
        <div class="col-md-12">
            <!-- la siguiente deberia tener la clase card -->
            <div class="card">
                <div class="card-header border-0">
                    <strong>
                        <?=$comment->user_name?></div>
                    </strong>
                <div class="card-body"><?=$comment->content?></div>
            </div>
        </div>
    <?php } ?>
</div>