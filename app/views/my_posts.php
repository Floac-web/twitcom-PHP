

<?php $this->view("./components/header",$data); ?>
<main>


<div class="container-s">
    <div class="wrapper">
        <a href="<?=ROOT?>posts/add" class="btn-primary btn">Додати пост</a>
    </div>
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
                <a href="<?=ROOT?>posts/edit/<?=$postItem->post_id?>">редагувати</a>
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


