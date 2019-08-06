<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH . '/controllers/Evo_Basic.php');

class Configuracao extends Evo_Basic {

	public function index(){
		if ($this->logged()) {
			$this->template('v_configuracao');
		}
	}

	public function getConfig() {
		if ($this->logged()) {
			$query = $this->db->from('configuracao')
												->get()
												->first_row();
			$this->json($query);
		}
	}

	public function addConfig() {
		if ($this->logged()) {
			$dados = $this->input->post();

			$dados['CON_Key'] = $this->crypter($dados['CON_CodigoConfig'] . $dados['CON_URL']);

			$query = $this->db->where('CON_CodigoConfig', $dados['CON_CodigoConfig'])
												->update('configuracao', $dados);
			$this->json($query);
		}
	}

	public function upload(){
		if ($_FILES)  {
			$upload_path = getcwd() . DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."image".DIRECTORY_SEPARATOR."imoveis".DIRECTORY_SEPARATOR;
			$this->load->helper("image");
			foreach ($_FILES as $file) {
				if ($file["size"] > 0) {
					$filename = $file["tmp_name"];
          $fileinfo = pathinfo($file["name"]);
          $fileext = strtolower($fileinfo["extension"]);
          $newfilename = md5_file($filename) . '.' . $fileext;
          $newfile = $upload_path . "/" . $newfilename;

            rename($filename,$newfile);
            chmod($newfile,0644);
            /*Marca D´agua*/
          /*  Image::watermark($upload_path . $newfilename, $upload_path . 'logo.png');*/

            echo $newfilename;
				}
			}
		}
	}
}
