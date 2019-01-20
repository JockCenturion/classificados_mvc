<?php


class Categoria extends model {

	public function getLista() {
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM categorias");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}


		return $array;
	}

}

?>