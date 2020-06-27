<?php

use \Colegiada\Page;
use \Colegiada\Model\User;

$app->get('/', function() {  //carrega index
    
    User::verifyLogin();

	$page = new Page();

	$page->setTpl("index");

});

$app->get('/login', function() {  //rota para carregar pagina de login
    
	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/login', function() {  //metodo para enviar o formulario preenchido na pagina login
    
    User::login($_POST["login"], $_POST["password"]);

    header("Location: /");
    exit;
	
});

$app->get('/logout', function(){ //rota com metodos para efetuar logout

	User::logout();

	header("Location: /login");
	exit;
});

?>