<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH . '/controllers/Evo_Basic.php');

class Dashboard extends Evo_Basic {

	public function index(){
		$this->template('dashboard/v_home');
	}
}
