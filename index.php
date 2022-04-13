<?php
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Api\Seas\Page;
use \Api\Seas\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

    $page = new PageAdmin([
        "header"=> false,
        "footer"=> false
    ]);

    $page->setTpl("index");

});

// $app->get("/servico/Cursos-e-Treinamentos", function () {

// 	$page = new PageAdminSite([
// 		"header" => false,
// 		"footer" => false
// 	]);

// 	$page->setTpl("Cursos-e-Treinamentos");
// });

$app->run();

?>