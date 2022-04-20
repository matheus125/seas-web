<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Api\Seas\Page;
use \Api\Seas\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

    $page = new Page([
        "header"=> false,
        "footer"=> false
    ]);

    $page->setTpl("index", [
		'error'=>User::getError()
	]);

});

$app->post("/", function() {
    
	try {

		User::login($_POST["login"], $_POST["password"]);

	} catch(Exception $e){

		User::setError($e->getMessage());

	}
		
	header("Location: /admin");
	exit;

});

// $app->get("/admin/logout", function(){
	
// 	User::logout();

// 	header("Location: /admin/Funcionario");
// 	exit;

// });

$app->run();

?>