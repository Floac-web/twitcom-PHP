




<?php $this->view("./components/header",$data); ?>
<main>


<div class="container-s">
    <ul class="postlist">
        <?php if(isset($data["postList"][0])): ?>
        <?php foreach($data["postList"] as $postItem): ?>
            
            <div class="post">
                <a href="<?= ROOT . "posts/" . $postItem->user_id ?>" class="post__author">
                    <?=$data["user_name"]?>
                </a>
                <div class="post__content">
                    <p class="post__text">
                        <?= $postItem->content ?>
                    </p>
                    <span class="post__date"><?= $postItem->created ?></span>
                </div>
            </div>

        <?php endforeach ?>
        <?php endif ?>
        <?php if(!isset($data["postList"][0])): ?>
            <div>Постів немає</div>
        <?php endif ?>
    </ul>

</div>


</main>
<?php $this->view("./components/footer"); ?>