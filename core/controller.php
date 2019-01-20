<?php

class controller {

	public function loadViewTemplate($viewName, $viewData = array()) {
		require "views/template.php";
	}

	private function loadViewBody($viewName, $viewData = array()) {
		extract($viewData);
		require "views/{$viewName}.php";
	}

	protected function redireciona() {
		header("location: " . BASE_URL);
		exit;
	}

	protected function redirecionaAnterior() {
		header("Location: ".$_SERVER['HTTP_REFERER']."");
	}

	protected function verificaSession() {
		return empty($_SESSION['cLogin']);
	}

	protected function verificaSessionOrId($idAnuncio) {
		return ($this->verificaSession() || empty($idAnuncio));
	}

	protected function atualizaPagina() {
		header("Refresh: 0");
	}
}

?>