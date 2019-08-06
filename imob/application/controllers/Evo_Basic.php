<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . '/controllers/Evo_Template.php');

class Evo_Basic extends Evo_Template {

	private $salt = 'midia9';

	public function logged($dados = array()){
		if ($this->session->userdata('usuario')) {
			return true;
		}
		else {
			$this->load->view('v_login', $dados);
			$this->session->unset_userdata('usuario');
			$this->session->sess_destroy();
			return false;
		}
	}

	public function usuario() {
		return $this->session->usuario;
	}

	public function crypter($text){
		$result = $this->pbkdf2->calc('sha256', $text, md5($this->salt), 1000, strlen($text)*2);
		return base64_encode($result);
	}

	public function json($retorno = array()) {
		echo json_encode($retorno);
	}

	public function nivel() {
		return $this->session->usuario->USR_Nivel;
	}

	public function urlAmigavel($nom_tag,$slug="-") {
  	$string = strtolower($nom_tag);
	
	    // Código ASCII das vogais
	    $ascii['a'] = range(224, 230);
	    $ascii['e'] = range(232, 235);
	    $ascii['i'] = range(236, 239);
	    $ascii['o'] = array_merge(range(242, 246), array(240, 248));
	    $ascii['u'] = range(249, 252);
	 
	    // Código ASCII dos outros caracteres
	    $ascii['b'] = array(223);
	    $ascii['c'] = array(231);
	    $ascii['d'] = array(208);
	    $ascii['n'] = array(241);
	    $ascii['y'] = array(253, 255);
	 
	    foreach ($ascii as $key=>$item) {
	        $acentos = '';
	        foreach ($item AS $codigo) $acentos .= chr($codigo);
	        $troca[$key] = '/['.$acentos.']/i';
	    }
	 
	    $string = preg_replace(array_values($troca), array_keys($troca), $string);
	 
	    // Slug?
	    if ($slug) {
	        // Troca tudo que não for letra ou número por um caractere ($slug)
	        $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
	        // Tira os caracteres ($slug) repetidos
	        $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
	        $string = trim($string, $slug);
	    }
	    return $string;
	}

	public function limpa_string($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
	}
}
