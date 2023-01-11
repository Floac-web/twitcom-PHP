

<?php $this->view("./components/header", $data); ?>


<main class="auth">
    <div class="container-s">
        <div class="auth__wrapper">
            <div class="auth__title">Реєстрація</div>
            <form class="form" method="POST">
                <div class="form__input-wrap">
                    <label class="form__label">Нік</label>
                    <input class="form__input" type="text" maxlength="24" name="name" placeholder="User name" require>
                </div>
                <div class="form__input-wrap">
                    <label class="form__label">Пошта</label>
                    <input class="form__input" type="text" maxlength="24" name="email" placeholder="email" require>
                </div>
                <div class="form__input-wrap">
                    <labe class="form__label">Пароль</label>
                        <input class="form__input" type="password" maxlength="24" name="password" placeholder="password" require>
                </div>
                <input type="submit" name="signup" value="ввійти" class="btn-primary btn">
            </form>
            <div class="auth__sub-message">або <a href="<?= ROOT ?>auth/login">ввійти</a></div>
        </div>
    </div>
</main>


<?php $this->view("./components/footer"); ?>