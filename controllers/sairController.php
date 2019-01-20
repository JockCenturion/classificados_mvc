<?php

class sairController extends controller {

	public function index() {
		session_start();
		unset($_SESSION['cLogin']);
		header("Location: " . BASE_URL);
	}
}

?>