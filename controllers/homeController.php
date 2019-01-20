<?php

class homeController extends controller {

	public function index() {
		
		$dados = array();

		$anuncio = new Anuncio();
		$usuario = new Usuario();
		$categoria = new Categoria();


		//filtros 
		$filtros = array(
			'categoria' => '',
			'preco'     => '',
			'estado'   => ''
		);


		if (isset($_GET['filtros'])) {
			$filtros = $_GET['filtros'];
		}

		$totalAnuncios = $anuncio->getTotalAnuncios($filtros);
		$totalUsuarios = $usuario->getTotalUsuarios();
		$categorias = $categoria->getLista();

		//Paginação
		$pagina = 1;

		if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
			$pagina = addslashes($_GET['pagina']);
		}

		$porPagina = 4;
		$totalPaginas = ceil($totalAnuncios / $porPagina);
		$utlimosAnuncios = $anuncio->getUltimosAnuncios($pagina, $porPagina, $filtros);


		//dados para home
		$dados['totalAnuncios'] = $totalAnuncios;
		$dados['totalUsuarios'] = $totalUsuarios;
		$dados['categorias'] = $categorias;
		$dados['filtros'] = $filtros;
		$dados['utlimosAnuncios'] = $utlimosAnuncios;
		$dados['totalPaginas'] = $totalPaginas;
		$dados['pagina'] = $pagina;

		//Load home.php

		$this->loadViewTemplate('home', $dados);

	}
}

?>