<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Evo {

	public function __construct(){
    $this->CI =& get_instance();
  }
	/*Chave para Encryptação*/
	private $salt = 'midia9';


  public function crypter($text){
		$result = $this->CI->pbkdf2->calc('sha256', $text, md5($this->salt), 1000, strlen($text)*2);
		return base64_encode($result);
	}

	public function json($retorno = array()) {
		echo json_encode($retorno);
	}

	public function checkSession($dados = array()) {
		if ($this->CI->session->userdata('usuario')) {
			return true;
		}
		else {
			$this->CI->load->view('login/v_login', $dados);
			return false;
		}
	}

	public function usuario() {
		if (@$this->CI->session->userdata('usuario')) {
			return $this->CI->session->userdata('usuario');
		}
		else {
			return false;
		}
	}


	public function administrador() {
		if (@$this->CI->session->userdata('usuario')->USR_Nivel == 99) {
			return $this->CI->session->userdata('usuario');
		}
		else {
			return false;
		}
	}

	function Date_Converter($date, $locale = "br") {

    # Exception
    if (is_null($date))
        $date = date("m/d/Y H:i:s");

    # Let's go ahead and get a string date in case we've been given a Unix Time Stamp
    if ($locale == "unix")
        $date = date("m/d/Y H:i:s", $date);

    # Separate Date from Time
    $date = explode(" ", $date);

    if ($locale == "br") {
        # Separate d/m/Y from Date
        $date[0] = explode("/", $date[0]);
        # Rearrange Date into m/d/Y
        $date[0] = $date[0][1] . "/" . $date[0][0] . "/" . $date[0][2];
    }

    # Return date in all formats
        # US
        $Return["datetime"]["us"]   = implode(" ", $date);
        $Return["date"]["us"]       = $date[0];
        # Universal
        $Return["unix_datetime"]    = strtotime($Return["datetime"]["us"]);
        $Return["unix_date"]        = strtotime($Return["date"]["us"]);
        $Return["getdate"]          = getdate($Return["unix_datetime"]);
        # BR
        $Return["datetime"]["br"]   = date("d/m/Y H:i:s", $Return["unix_datetime"]);
        $Return["date"]["br"]       = date("d/m/Y", $Return["unix_date"]);
        $Return["date2"]["us"]       = date("Y-m-d", $Return["unix_date"]);

        $Data['US'] = date("Y-m-d", $Return["unix_date"]);
        $Data['BR'] = date("d/m/Y", $Return["unix_date"]);

    # Return
    return $Data;
  } 


	public function limpaString($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
	}
}