<?php

class anuncioController extends controller {

 	/** 
    * Ação default do controller anuncio, ele redireciona para o HOME
    * 
    * @access public
    * @param none
    * @return void 
    */ 
	public function index() {
		$this->redireciona();
	}

 	/** 
    * Ação adiciona Anúncio do controller anuncio, ele pega os dados via POST
    * e adicionar o anúncio no BANCO DE DADOS.
    * 
    * @access public
    * @param none
    * @return void 
    */ 
	public function adiciona() {

		if ($this->verificaSession()) {
			$this->redireciona();
		}

		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {

			$titulo = addslashes($_POST['titulo']);
			$categoria = addslashes($_POST['categoria']);
			$valor = addslashes($_POST['valor']);
			$descricao = addslashes($_POST['descricao']);
			$estado = addslashes($_POST['estado']);

			$anuncio = new Anuncio();
			$anuncio->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
		}

		$dados['categorias'] = (new Categoria())->getLista();
		$dados['anuncioCadastrado'] = isset($_POST['titulo']) && !empty($_POST['titulo']);
		$this->loadViewTemplate('adicionarAnuncio', $dados);

	}

 	/** 
    * Ação abrir Anúncio do controller anuncio, ele abri um
    * anuncio da lista de anuncios do HOME
    * 
    * @access public
    * @param none
    * @return void 
    */ 
	public function abrir($idAnuncio) {

		$anuncio = new Anuncio();
		$usuario = new Usuario();

		if (empty($idAnuncio)) {
			$this->redireciona();
		}

		$info = $anuncio->getAnuncio($idAnuncio);
		$info['usuario'] = $usuario->getNome($info['id_usuario']);;
		$dados['info'] = $info; 
		$this->loadViewTemplate('produto', $dados);
	}

 	/** 
    * Ação edita Anúncio do controller anuncio, ele edita uma anuncio
    * da lista de anuncios do usuario
    * 
    * @access public
    * @param none
    * @return void 
    */ 
	public function edita($idAnuncio) {

		if ($this->verificaSessionOrId($idAnuncio)) {
			$this->redireciona();
		}


		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {

			$titulo = addslashes($_POST['titulo']);
			$categoria = addslashes($_POST['categoria']);
			$valor = addslashes($_POST['valor']);
			$descricao = addslashes($_POST['descricao']);
			$estado = addslashes($_POST['estado']);
			$fotos = isset($_FILES['fotos']) ? $_FILES['fotos'] : array();

			$anuncio = new Anuncio();
			$anuncio->editarAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $idAnuncio);
		}

		$info = (new Anuncio())->getAnuncio($idAnuncio);
		$categorias = (new Categoria())->getLista();
		$dados['anuncioEditado'] = isset($_POST['titulo']) && !empty($_POST['titulo']);
		$dados['info'] = $info;
		$dados['categorias'] = $categorias;

		$this->loadViewTemplate('editarAnuncio', $dados);
	}

 	/** 
    * Ação aexclui Anúncio do controller anuncio, ele exclui um
    * anuncio da lista de anuncios do usuário
    * @access public
    * @param none
    * @return void 
    */ 
	public function exclui($idAnuncio) {

		if ($this->verificaSessionOrId($idAnuncio)) {
			$this->redireciona();
		}
	
		(new Anuncio())->excluirAnuncio($idAnuncio); 

		$this->lista();
	}

	/** 
    * Ação lista Anúncio do controller anuncio, ele pega todos
    * os anúncios do usuário.
    * 
    * @access public
    * @param none
    * @return void 
    */ 
	public function lista() {

		if ($this->verificaSession()) {
			$this->redireciona();
		}

		$anuncios = (new Anuncio())->getMeusAnuncios();

		$dados['anuncios'] = $anuncios;

		$this->loadViewTemplate('meusAnuncios', $dados);		
	}


 	/** 
    * Ação excluiFoto Anúncio do controller anuncio, ele apaga uma das
    * fotos do anúncio do usuário e volta a pagina de editar anuncio.
    * 
    * @access public
    * @param none
    * @return void 
    */ 
	public function excluiFoto($idFoto) {
		
		if ($this->verificaSessionOrId($idFoto)) {
			$this->redireciona();
		}

		(new Anuncio())->excluirFoto($idFoto);

		$this->redirecionaAnterior();

		//header("Location: ".$_SERVER['HTTP_REFERER']."");
		
	}


}


?>