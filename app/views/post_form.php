<?php $this->view("./components/header", $data); ?>
<main>

    <div class="container-s">
        
        <form class="form" method="post">
            <?php if(isset($data["post_obj"])) :?>
            <textarea class="form__textarea" name="content"><?= $data["post_obj"]->content ?>
            </textarea>
            <?php endif ?>
            <?php if(!isset($data["post_obj"])) :?>
            <textarea class="form__textarea" name="content"></textarea>
            <?php endif ?>
            <?php if(isset($data["post_obj"])): ?>
            <input type="submit" value="змінити" name="edit_post" class="btn btn-primary">
            <?php endif ?>
            <?php if(!isset($data["post_obj"])): ?>
            <input type="submit" value="додати" name="add_post" class="btn btn-primary">
            <?php endif ?>
        </form>
    </div>



</main>
<?php $this->view("./components/footer"); ?>