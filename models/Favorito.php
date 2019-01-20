<?php

class Favorito extends model {

	public function adicionaFavorito($idUsuario, $idAnuncio) {

		$sql = $this->db->prepare("SELECT * FROM favoritos f WHERE f.id_usuario = :idUsuario and f.id_anuncio = :idAnuncio");
		$sql->bindValue(":idAnuncio", $idAnuncio);
		$sql->bindValue(":idUsuario", $idUsuario);
		$sql->execute();

		if ($sql->rowCount() == 0) {
			$sql = $this->db->prepare("INSERT INTO favoritos SET id_usuario = :idUsuario, id_anuncio = :idAnuncio");
			$sql->bindValue(":idUsuario", $idUsuario);
			$sql->bindValue(":idAnuncio", $idAnuncio);
			$sql->execute();	

			return true;
		}

		return false;
	}

	public function excluiFavorito($idUsuario, $idFavorito) {

		$sql = $this->db->prepare("DELETE FROM favoritos WHERE id_usuario = :idUsuario and id = :idFavorito");
		$sql->bindValue(":idUsuario", $idUsuario);
		$sql->bindValue(":idFavorito", $idFavorito);
		$sql->execute();
	}

	public function buscaFavorito($idFavorito) {

	}

}


?>