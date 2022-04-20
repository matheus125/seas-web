<?php

use \Slim\Slim;
use \Api\Seas\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/admin', function() {

    $page = new PageAdmin();

    $page->setTpl("index");

});

?>