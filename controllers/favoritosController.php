<?php

class favoritosController extends controller {

	
	public function index() {

		if ($this->verificaSession()) {
			$this->redireciona();
		}

		$dados['anuncios'] = (new Anuncio())->getFavoritosDoUsuario($_SESSION['cLogin']);
		$this->loadViewTemplate('favoritos', $dados);
	}

	public function adiciona($idAnuncio) {

		if ($this->verificaSession()) {
			$this->redireciona();
		} else if ($this->verificaSessionOrId($idAnuncio)) {
			$this->redirecionaAnterior();
		} else if (!$this->verificaSeAnuncioEhDoUsuario($idAnuncio)) {
			(new Favorito())->adicionaFavorito($_SESSION['cLogin'], $idAnuncio);
		}

		$this->redirecionaAnterior();
	}


	public function exclui($idFavorito) {

		if ($this->verificaSessionOrId($idAnuncio)) {
			$this->redirecionaAnterior();
		}

		(new Favorito())->excluiFavorito($_SESSION['cLogin'], $idFavorito);
		$this->redirecionaAnterior();
	}

	private function verificaSeAnuncioEhDoUsuario($idAnuncio) {

		$anunciosDoUsuario = (new Anuncio())->getMeusAnuncios();

		foreach ($anunciosDoUsuario as $anuncio) {
			if ($_SESSION['cLogin'] == $anuncio['id_usuario'] && $idAnuncio == $anuncio['id']) {
				return true;
			}
		}

		return false;
	}


}

?>