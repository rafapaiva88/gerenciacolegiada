<?php 

use \Colegiada\Page;
use \Colegiada\Model\User;

$app->get("/users", function(){ //rota com metodos para listar os usuarios

	User::verifyLogin();

	$users = User::listAll();

	$page = new Page();

	$page->setTpl("users", array(
		"users"=>$users
	));

});

$app->get("/users/create", function(){ //rota com metodo para criar usuario

	User::verifyLogin();

	$page = new Page();

	$page->setTpl("users-create");

});

$app->get("/users/:iduser/delete",function($iduser){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /users");
	exit;	


});

$app->get("/users/:iduser", function($iduser){ // rota com metodo para listar o usuario e editar

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new Page();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()

	));	

});

$app->post("/users/create", function(){ // rota para enviar o formulario preenchido e criar usuario

	User::verifyLogin();

	$user = new User;

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0; //se foi definido valor é 1, se não 0

	$_POST["despassword"] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	$user->setData($_POST);

	$user->save();

	header("Location: /users");
	exit;

});	

$app->post("/users/:iduser", function($iduser){ //rota para enviar formulario preenchido com a edição do usuário

	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /users");
	exit;	

});	


 ?>