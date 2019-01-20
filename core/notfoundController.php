<?php
class notfoundController extends controller {

	public function index() {
		$this->loadViewTemplate('404', array());
	}

}

?>