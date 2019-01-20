<?php

class Usuario extends model {

	public function cadastrar($nome, $email, $senha, $telefone) {

		$sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if ($sql->rowCount() == 0) {

			$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();
			return true;
		} else {
			return false;
		}

	}

	public function login($email, $senha) {

		$sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;
		} else {
			return false;
		}

	}

	public static function getNome($id) {
		global $db;

		$sql = $db->prepare("SELECT nome FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		$user = $sql->fetch();

		return $user['nome'];
	}

	public function getTotalUsuarios() {

		$sql = $this->db->prepare("SELECT COUNT(*) AS total FROM usuarios");
		$sql->execute();

		$array = $sql->fetch();
		$totalUsuarios = $array['total'];

		return $totalUsuarios;
	}
}

?>