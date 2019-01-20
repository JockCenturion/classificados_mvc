<?php

class loginController extends controller {

 	/** 
    * Metodo veriica o resultado do POST, caso o usuario tenha colocado ou não email
    * se ele colocou email e senha validos ele é redirecionado para a HOME, caso contrario
    * o verificaoPOST vai ser true e vai gerar um erro pro usuario
    * @access public
    * @param none
    * @return void 
    */ 
	public function index() {

		if (!$this->verificaSession()) {
			$this->redireciona(); 
		}
	
		$dados['loginInvalido'] = false; 

		if (isset($_POST['email']) && !empty($_POST['email'])) {

			$email = addslashes($_POST['email']);
			$senha = $_POST['senha'];

			$usuario = new Usuario();

			if ($usuario->login($email, $senha)) {
				header("location: ".BASE_URL);
			} else {
				$dados['loginInvalido'] = true;
			}
		}

		$this->loadViewTemplate('login', $dados); 

	}



}

?>