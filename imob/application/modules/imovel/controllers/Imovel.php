<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH . '/controllers/Evo_Basic.php');

class Imovel extends Evo_Basic {

	public function index() { 
		if ($this->logged()) {
			$this->template('imovel/v_imovel');
		}
	}

	public function getImoveis($limit = null, $id = null) {
		if ($this->logged()) {

			$tipo = $this->db->from('imovel_tipo')
												 ->get()
												 ->result();

			$estados = $this->db->select('IMV_Estado')
													->from('imovel')
													->distinct('IMV_Estado')
													->get()
													->result();

			$cidades = $this->db->select('IMV_Cidade')
													->from('imovel')
													->distinct('IMV_Cidade')
													->get()
													->result();

			if ($id) {
				$query = $this->db->from('imovel')
													->where('IMV_CodigoImovel', $id)
													->get()
													->first_row();

				$query->IMV_Caracteristicas = json_decode($query->IMV_Caracteristicas);
				$query->IMV_MetaDados = json_decode($query->IMV_MetaDados);
				$query->IMV_Suites = intval($query->IMV_Suites);
				$query->IMV_Quartos = intval($query->IMV_Quartos);
				$query->IMV_Banheiros = intval($query->IMV_Banheiros);
				$query->IMV_AreaUtil = intval($query->IMV_AreaUtil);
				$query->IMV_AreaConstruida = intval($query->IMV_AreaConstruida);

				$data['imagens'] = $this->db->from('imovel_imagens')
																		->where('IMG_CodigoImovel', $query->IMV_CodigoImovel)
																		->get()
																		->result();
			}
			else {
				$data = $this->input->post();
				$limit = ($limit != null)? $limit:50;

				$query = $this->db->from('imovel')
													->join('imovel_tipo', 'IMV_Tipo = IMT_CodigoTipo')
													->where('IMV_Status <> 3 ', NULL)
													->where($data)
													->limit($limit)
													->get()
													->result();

			}

			$data['estados'] = $estados;
			$data['cidades'] = $cidades;
			$data['imovel'] = $query;
			$data['tipo'] = $tipo;
			$this->json($data);
		}
	}

	public function buscaPersonalizada() {
		if ($this->logged()) {
			$data = $this->input->post();
			$limit = (!empty($data['IMV_Limit']))? $data['IMV_Limit']: "";
			unset($data['IMV_Limit']);

			$query = $this->db->from('imovel')
												->join('imovel_tipo', 'IMV_Tipo = IMT_CodigoTipo')	
												->where($data)
												->where('IMV_Status <> 3 ', NULL)
												->limit($limit)
												->get()
												->result();
			$this->json($query);
		}
	}

	public function setStatusImovel ($id, $status) {
		if ($this->logged()) {
			$query = $this->db->where('IMV_CodigoImovel', $id)
												->update('imovel', array('IMV_Status'=>$status));
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

            $image = $this->db->select('CON_Logo')
            									->from('configuracao')
            									->get()
            									->first_row();

            /*Marca D´agua*/
            Image::resize($upload_path . $newfilename,800,500);
            Image::watermark($upload_path . $newfilename, $upload_path . $image->CON_Logo);

            echo $newfilename;
				}
			}
		}
	}

	public function addImovel(){
		if ($this->logged()) {
			$dados = $this->input->post();
			/*Essa porra não ta salvando*/
			$imagem['IMG_Imagens'] = $dados['IMG_Imagens'];
			unset($dados['IMG_Imagens']);

			$dados['IMV_DataPublicacao'] = Date('Y-m-d H:i:s');
			$dados['IMV_CodigoUsuario'] = $this->usuario()->USR_CodigoUsuario;
			$dados['IMV_MetaDados'] = ($dados['IMV_MetaDados'])? json_encode($dados['IMV_MetaDados']):NULL;
			$dados['IMV_Caracteristicas'] = json_encode($dados['IMV_Caracteristicas']);
			$dados['IMV_URL'] = $this->urlAmigavel($dados['IMV_Nome']." ".$dados['IMV_Estado'] ." " .$dados['IMV_Cidade']. " ". $dados['IMV_Rua'] ." ". $dados['IMV_Numero']);
			$dados['IMV_Status'] = 1;

			$query = $this->db->insert('imovel', $dados);
			if ($query) {
				$id = $this->db->insert_id();
				for($i=0; $i < count($imagem['IMG_Imagens']); $i++) {
					$img['IMG_CodigoImovel'] = $id;
					$img['IMG_Imagem'] = $imagem['IMG_Imagens'][$i];
					$query_imagens = $this->db->insert('imovel_imagens', $img);
					echo $i;
				}
			}
			$this->json($dados);
		}
	}

	public function removeImage($id) {
		if ($this->logged()){
			$query = $this->db->where('IMG_CodigoImagem', $id)
												->delete('imovel_imagens');
			$this->json($this->db->last_query());
		}
	}

	public function updateImovel() {
		if ($this->logged()){
			$dados = $this->input->post();
			var_dump($dados['IMG_Imagens']);
			$imagem['IMG_Imagens'] = (count($dados['IMG_Imagens'])>0)? $dados['IMG_Imagens']:false;
			unset($dados['IMG_Imagens']);

			$dados['IMV_MetaDados'] = ($dados['IMV_MetaDados'])? json_encode($dados['IMV_MetaDados']):NULL;
			$dados['IMV_Caracteristicas'] = json_encode($dados['IMV_Caracteristicas']);
			$dados['IMV_URL'] = $this->urlAmigavel($dados['IMV_Nome']." ".$dados['IMV_Estado'] ." " .$dados['IMV_Cidade']. " ". $dados['IMV_Rua']);

			$query = $this->db->where('IMV_CodigoImovel', $dados['IMV_CodigoImovel'])
												->update('imovel', $dados);
			if ($query) {
				if ($imagem['IMG_Imagens']) {
					for($i=0; $i < count($imagem['IMG_Imagens']); $i++) {
						$img['IMG_CodigoImovel'] = $dados['IMV_CodigoImovel'];
						$img['IMG_Imagem'] = $imagem['IMG_Imagens'][$i];
						$query_imagens = $this->db->insert('imovel_imagens', $img);
						echo $i;
					}
				}
			}
			$this->json($dados);
		}
	}
}
