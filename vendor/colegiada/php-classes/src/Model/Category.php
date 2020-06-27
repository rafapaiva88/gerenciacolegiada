<?php 

namespace Colegiada\Model;

use \Colegiada\DB\Sql;
use \Colegiada\Model;
use \Colegiada\Mailer;

class Category extends Model {

	public static function listAll()
	{

	$sql = new Sql();

	return $sql->select("SELECT * FROM tb_unidades ORDER BY desunidade");

	}

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_categories_save(:idunidade, :desunidade)", array(
			":idunidade"=>$this->getidunidade(),
			":desunidade"=>$this->getdesunidade()
		));

		$this->setData($results[0]);

		Category::updateFile();
	}

	public function get($idunidade)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_unidades WHERE idunidade = :idunidade", array(
			":idunidade"=>$idunidade
		));

		$this->setData($results[0]);
	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_unidades WHERE idunidade = :idunidade", array(
			":idunidade"=>$this->getidunidade()
		));

		Category::updateFile();
	}

		
	public static function updateFile()
	{
		$categories = Category::listAll();

		$html = [];

		foreach ($categories as $row) {
			array_push($html, '<li><a href="/unidades/'.$row['idunidade'].'">'.$row['desunidade'].'</a></li>');
		}

		file_put_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."categories-menu.html", implode('', $html));
	}

}


 ?>