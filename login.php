<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Api\Seas\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

    $page = new Page([
        "header"=> false,
        "footer"=> false
    ]);

    $page->setTpl("index");

});

$app->run();

?>