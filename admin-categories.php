<?php 

use \Colegiada\Page;
use \Colegiada\Model\Category;
use \Colegiada\Model\User;

$app->get("/unidades", function(){ //lista as categorias

	User::verifyLogin();

	$categories = Category::listAll();

	$page = new Page();

	$page->setTpl("categories", [
		"categories"=>$categories
	]);

});

$app->get("/unidades/create", function(){ //carrega pagina de criação de categorias

	User::verifyLogin();

	$page = new Page();

	$page->setTpl("categories-create");

});

$app->post("/unidades/create", function(){ // envia as categorias preenchidas e salva no banco

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /unidades");
	exit;

});

$app->get("/unidades/:idunidade/delete", function($idunidade){ // deleta caretagoria carregando pelo id

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idunidade);

	$category->delete();

	header("Location: /unidades");
	exit;

});

$app->get("/unidades/:idunidade", function($idunidade){  //carega pagina de edição de categoria pelo id

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idunidade);

	$page = new Page();

	$page->setTpl("categories-update", array(
		"category"=>$category->getValues()

	));	

});

$app->post("/unidades/:idunidade", function($idunidade){  // envia edição da categoria e salva

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idunidade);

	$category->setData($_POST);

	$category->save();

	header("Location: /unidades");
	exit;	

});	

$app->get("/unidades/:idunidade/products", function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-products", [
		'category'=>$category->getValues(),
		'productsRelated'=>[],
		'productsNotRelated'=>[]
	]);
});

 ?>