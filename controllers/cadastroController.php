<?php

class cadastroController extends controller {

	public function index() {

		$dados['sucesso'] = false;
		$dados['warning'] = false;

		if (isset($_POST['nome']) && !empty($_POST['nome']) ) {


			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha = $_POST['senha'];
			$telefone = addslashes($_POST['telefone']);
			$celular = addslashes($_POST['celular']);



			if (!empty($email) && !empty($senha)) {

				$usuario = new Usuario();

				if ($usuario->cadastrar($nome, $email, $senha, $telefone)) {
					$dados['sucesso'] = true;

				} else {
					$dados['warning'] = true;
				}

			} 

		}


		//sempre colocar a passagem de dados no final
		$this->loadViewTemplate('cadastroUsuario', $dados);


	}


}

?>