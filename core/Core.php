<?php

class Core {

	private $url;
	private $currentController;
	private $currentAction;
	private $params;

	public function __construct() {
		$this->url = '/';
		$this->currentController = 'homeController';
		$this->currentAction = 'index';
		$this->params = array(0 => '');
	}

 	/** 
    * Função para iniciar o projeto
    * @access public 
    * @param sem parâmentros
    * @return void 
    */ 
	public function run() {
		
		$this->url = (isset($_GET['url']) && !empty($_GET['url'])) ? $_GET['url'] : $this->url;
		
		//Não é responsabilidade de run, ele só executa o controller e sua ação
		if ($this->url != '/') {
			$this->montaUrl();
		}

		if(!file_exists('controllers/'.$this->currentController.'.php') || !method_exists($this->currentController, $this->currentAction)) {
			$this->currentController = 'notfoundController';
			$this->currentAction = 'index';
		}

		$this->currentController = new $this->currentController();
		call_user_func_array(array($this->currentController, $this->currentAction), $this->params);
	}

 	/** 
    * Função que pega as partes relevantes da url: controller, action e os parametros
    * ex: localhost/projeto/home/abrir/123 (homeController, metodo abrir, parametro 123)
    * @access private 
    * @param parametro opcional caso seja uma Action e obrigatorio se for um Controller
    * @return o controller, caso seja passado o parametro 'Controller' ou uma action caso o parametro esteja vazio
    */ 
	private function pegaStringCurrent($tipoCurrent = '') {
		$currentString = $this->url[0] . $tipoCurrent;
		array_shift($this->url);
		return $currentString;
	}
	
 	/** 
    * Função que monta as partes relevantes da url: controller, action e os parametros
    * @access private 
    * @return void
    */ 
	private function montaUrl() {
		$this->url = explode('/', $this->url);
		$this->currentController = $this->pegaStringCurrent('Controller');
		$this->currentAction = ( empty($this->url) || empty($this->url[0]) ) ? $this->currentAction : $this->pegaStringCurrent();
		$this->params = empty($this->url[0]) ? $this->params : array($this->pegaStringCurrent());	
	}
}

?>