<?php

class Anuncio extends model {

	public function getUltimosAnuncios($page, $perPage, $filtros) {

		$array = array();

		$offSet = ($page - 1) * 4;


		$filtrosString = array('1=1');

		if (!empty($filtros['categoria'])) {
			$filtrosString[] = 'anuncios.id_categoria = :id_categoria';
		}

		if (!empty($filtros['preco'])) {
			$filtrosString[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
		}

		if (!empty($filtros['estado'])) {
			$filtrosString[] = 'anuncios.estado = :estado';
		}


		$sql = $this->db->prepare("SELECT *, (SELECT url FROM anuncios_imagens WHERE id_anuncios = anuncios.id limit 1) AS url,
			(SELECT nome FROM categorias WHERE id = anuncios.id_categoria) as categoria
		FROM anuncios 
		WHERE ".implode(' AND ', $filtrosString)."
		ORDER BY id DESC LIMIT $offSet, $perPage");
		
		if (!empty($filtros['categoria'])) {
			$sql->bindValue(':id_categoria', $filtros['categoria']);
		}

		if (!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(':preco1', $preco[0]);
			$sql->bindValue(':preco2', $preco[1]);
		}

		if (!empty($filtros['estado'])) {
			$sql->bindValue(':estado', $filtros['estado']);
		}


		$sql->execute();
	
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;


	}

	public function getMeusAnuncios() {
		$array = array();

		$sql = $this->db->prepare("SELECT *, (SELECT url FROM anuncios_imagens WHERE id_anuncios = anuncios.id limit 1) AS url FROM anuncios WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->execute();
	
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getAnuncio($idAnuncio) {
		$array = array();

		$sql = $this->db->prepare("SELECT *,
		(SELECT nome FROM categorias WHERE id = anuncios.id_categoria) as categoria,
		(SELECT telefone FROM usuarios WHERE id = anuncios.id_usuario) as telefone
		FROM anuncios WHERE id = :id_anuncio");
		$sql->bindValue(":id_anuncio", $idAnuncio);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
			$array['fotos'] = array();

			$sql = $this->db->prepare("SELECT id, url FROM anuncios_imagens WHERE id_anuncios = :id_anuncio");
			$sql->bindValue("id_anuncio", $idAnuncio);
			$sql->execute();


			if ($sql->rowCount() > 0) {
				$array['fotos'] = $sql->fetchAll();
			}

		}

		return $array;
	}

	public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado) {

		$sql = $this->db->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->execute();
	}

	public function excluirAnuncio($id_anuncio) {
	
		$sql = $this->db->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
		$sql->bindValue(":id_anuncio", $id_anuncio);
		$sql->execute();

		$sql = $this->db->prepare("DELETE FROM anuncios WHERE id = :id_anuncio");
		$sql->bindValue(":id_anuncio", $id_anuncio);
		$sql->execute();

	}

	public function editarAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $idAnuncio) {
	
		$sql = $this->db->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id_anuncio");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id_anuncio", $idAnuncio);
		$sql->execute();


		if (count($fotos) > 0 && !empty($fotos['tmp_name'][0])) {

			for ($count = 0; $count < count($fotos['tmp_name']); $count++) {

				$tipoFoto = $fotos['type'][$count];
				$caminhoParaSalvarImagem  = 'assets/images/anuncios/';
				$caminhoTemporario = $fotos['tmp_name'][$count];
				$nomeDaImagem = md5(time().rand(0, 9999)).'.jpg';

				if ($this->redimensionaImagem($tipoFoto, $caminhoTemporario, $caminhoParaSalvarImagem, $nomeDaImagem, 400, 500)) {
					$sql = $this->db->prepare("INSERT INTO anuncios_imagens SET id_anuncios = :id_anuncio, url = :url");
					$sql->bindValue(":id_anuncio", $idAnuncio);
					$sql->bindValue(":url", $nomeDaImagem);
					$sql->execute();		
				}
			}
		}



	}


	public function excluirFoto($idFoto) {

		$sql = $this->db->prepare("SELECT id_anuncios FROM anuncios_imagens WHERE id = :id_foto");
		$sql->bindValue(":id_foto", $idFoto);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$idAnuncio = $sql->fetch();

			$sql = $this->db->prepare("DELETE FROM anuncios_imagens WHERE id = :id_foto");
			$sql->bindValue(":id_foto", $idFoto);
			$sql->execute();
			
			return $idAnuncio['id_anuncios'];
		}

		return null;
	}


	public function getTotalAnuncios($filtros) {

		$filtrosString = array('1=1');

		if (!empty($filtros['categoria'])) {
			$filtrosString[] = 'anuncios.id_categoria = :id_categoria';
		}

		if (!empty($filtros['preco'])) {
			$filtrosString[] = 'anuncios.valor BETWEEN :preco1 AND :preco2';
		}

		if (!empty($filtros['estado'])) {
			$filtrosString[] = 'anuncios.estado = :estado';
		}

		$sql = $this->db->prepare("SELECT count(*) AS total FROM anuncios WHERE ".implode(' AND ', $filtrosString)."");

		if (!empty($filtros['categoria'])) {
			$sql->bindValue(':id_categoria', $filtros['categoria']);
		}

		if (!empty($filtros['preco'])) {
			$preco = explode('-', $filtros['preco']);
			$sql->bindValue(':preco1', $preco[0]);
			$sql->bindValue(':preco2', $preco[1]);
		}

		if (!empty($filtros['estado'])) {
			$sql->bindValue(':estado', $filtros['estado']);
		}

		$sql->execute();

		$array = $sql->fetch();
		$totalAnuncios = $array['total'];

		return $totalAnuncios;
	}


	public function getFavoritosDoUsuario($idUsuario) {
		$sql = $this->db->prepare("SELECT f.id, f.id_anuncio, f.id_usuario, a.titulo, a.valor, (SELECT url FROM anuncios_imagens WHERE f.id_anuncio = id_anuncios limit 1) AS url FROM favoritos f JOIN anuncios a
							      WHERE f.id_anuncio = a.id and f.id_usuario = :idUsuario");
		$sql->bindValue(":idUsuario", $idUsuario);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
			
		}

		return array();

		
	}


	/** 
    * Esta função realiza o redimensionamento de uma imagem para a dimensões desejadas
    * 
    * @access private
    * @param $tipoFoto recebe o valor do POST $FILES['type'][chave = 0, 1, ..]
    * @param $caminhoTemporario recebe o valor do POST POST $FILES['tmp_name'][chave = 0, 1, ...];
    * @param $caminhoParaSalvarImagem recebe a rota para salvar a imagem (ex: 'assets/images/anuncios/';) 
    * @param $novaLargura define a nova largura da imagem
    * @param $novaAltura define a nova altura da imagem
    * @return true em caso de sucesso ou false em caso de erro
    */ 
	private function redimensionaImagem($tipoFoto, $caminhoTemporario, $caminhoParaSalvarImagem, $nomeDaImagem, $novaLargura, $novaAltura) {

		if ( in_array($tipoFoto, array('image/jpeg', 'image/png', 'image/pjpeg')) ) {

			$imagemTemporaria = ($tipoFoto == 'image/jpeg' || $tipoFoto == 'image/pjpeg') ? imagecreatefromjpeg($caminhoTemporario) : imagecreatefrompng($caminhoTemporario);
			$larguraOriginal = imagesx($imagemTemporaria);
			$alturaOriginal = imagesy($imagemTemporaria);
			$imagemRedimensionada = $img = imagecreatetruecolor($novaLargura, $novaAltura);
			$caminhoParaSalvarImagem .= $nomeDaImagem;

			imagecopyresampled($imagemRedimensionada, $imagemTemporaria, 0, 0, 0, 0, $novaLargura, $novaAltura, $larguraOriginal, $alturaOriginal);
			imagejpeg($imagemRedimensionada, $caminhoParaSalvarImagem);

			return true;

		}

		return false;

	}



		//adcionando uma foto ao anuncio
		/*if (count($fotos) > 0) {

			for ($count = 0; $count < count($fotos['tmp_name']); $count++) {
				$tipo = $fotos['type'][$count];

				if (in_array($tipo, array('image/jpeg', 'image/png'))) {

					$tmpname = md5(time().rand(0, 9999)).'.jpg';
					$caminhoImagem  = 'assets/images/anuncios/'.$tmpname;

				
					move_uploaded_file($fotos['tmp_name'][$count], $caminhoImagem);
					$this->redimensionaImagem($tipo, $caminhoImagem);

					$sql = $this->db->prepare("INSERT INTO anuncios_imagens SET id_anuncios = :id_anuncio, url = :url");
					$sql->bindValue(":id_anuncio", $idAnuncio);
					$sql->bindValue(":url", $tmpname);
					$sql->execute();	
				}
			}

		}*/
		
	/*private function redimensionaImagem($tipo, $caminho) {

		list($width_orig, $height_orig) = getimagesize($caminho);

		$ratio = $width_orig / $height_orig;

		$width = 400;
		$height = 400;

		if ($width / $height > $ratio) {
			$width = $height * $ratio;
		} else {
			$height = $width / $ratio;
		}

		$img = imagecreatetruecolor($width, $height);

		if ($tipo == 'image/jpeg') {
			$origi = imagecreatefromjpeg($caminho);
		} else {
			$origi = imagecreatefrompng($caminho);
		}


		imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);


		imagejpeg($img, $caminho, 80);
	}*/


		
}


?>