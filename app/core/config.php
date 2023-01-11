<?php

define("WEBSITE_TITLE", "Twitcom");

define("DB_TYPE", "mysql");
define("DB_NAME", "twitcom");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_HOST", "localhost");

define("PROTOCOL", "http");


$path = str_replace("\\", "/", PROTOCOL ."://" . $_SERVER["SERVER_NAME"] . __DIR__ . "/");
$path = str_replace($_SERVER["DOCUMENT_ROOT"], "", $path);

define("ROOT", str_replace("app/core", "public", $path));
define("ASSETS", str_replace("app/core", "public/assets", $path));





