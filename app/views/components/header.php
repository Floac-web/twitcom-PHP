<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data["page_title"]) ? $data["page_title"] . " | " . WEBSITE_TITLE : WEBSITE_TITLE; ?></title>
    <link href="<?=ASSETS?>css/index.css"  type="text/css" rel="stylesheet">
</head>
<body>
<div class="page">

<header class="header">
    <div class="container">
        <div class="header__wrap">
            <a class="header__logo" href="<?=ROOT?>public/home">
                <img src="<?=ASSETS?>images/logo.png" alt="logo">
            </a>
            <?php if(is_logged_in()): ?>
                <div class="header__user-name">
                    <?=$_SESSION["user_name"]?>
                </div>
            <?php endif ?>
            <div class="header__menu menu">

                <?php if(is_logged_in()): ?>
                    <a href="<?=ROOT?>posts/my" class="menu__link">Мої пости</a>
                    <a href="<?=ROOT?>auth/logout" class="btn-secondary btn">вийти</a>
                <?php endif ?>

                <?php if(!is_logged_in()): ?>
                    <a href="<?=ROOT?>auth/login" class="btn-secondary btn">ввійти</a>
                    <a href="<?=ROOT?>auth/signup" class="btn-secondary btn">зареєструватися</a>
                <?php endif ?>

            </div>
        </div>
    </div>
</header>

<?php if(isset($_SESSION["error"])): ?>
<section class="error">
        <div class="error__message">
            <?=$_SESSION["error"]?>
        </div>
</section>
<?php endif ?>