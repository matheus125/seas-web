<?php

use \Slim\Slim;
use \Api\Seas\PageAdmin;
use \Api\Seas\Model\User;

$app = new Slim();

$app->get('/admin', function() {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("index");

});

?>