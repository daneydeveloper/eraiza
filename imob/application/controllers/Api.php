<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key');
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH . '/controllers/Evo_Basic.php');
class Api extends Evo_Basic {
	public function getFiltros() {
		if ($this->auth()) {
			$query['tipo'] = $this->db->select('IMT_CodigoTipo, IMT_Nome')
												->from('imovel')
											  ->join('imovel_tipo', 'IMV_Tipo = IMT_CodigoTipo')
											  ->order_by('IMT_Nome', 'ASC')
											  ->group_by('IMT_Nome')
											  ->get()
											  ->result();	
																/*->order_by('IMT_Nome', 'ASC')
																->get()
																->result();*/
			$query['bairros'] = $this->db->select('IMV_Bairro')
																	 ->from('imovel')
																	 ->distinct('IMV_Bairro')
																	 ->order_by('IMV_Bairro', 'ASC')
																	 ->get()
																	 ->result();													
			$query['cidades'] = $this->db->select('IMV_Cidade')
																	 ->from('imovel')
																	 ->distinct('IMV_Cidade')
																	 ->order_by('IMV_Cidade', 'ASC')
																	 ->get()
																	 ->result();
			$query['estados'] = $this->db->select('IMV_Estado')
																	 ->from('imovel')
																	 ->distinct('IMV_Estado')
																	 ->order_by('IMV_Estado', 'ASC')
																	 ->get()
																	 ->result();
			$query['quartos'] = $this->db->select('IMV_Quartos')
																	 ->from('imovel')
																	 ->distinct('IMV_Quartos')
																	 ->order_by('IMV_Quartos', 'ASC')
																	 ->get()
																	 ->result();
			$query['banheiros'] = $this->db->select('IMV_Banheiros')
																	 ->from('imovel')
																	 ->distinct('IMV_Banheiros')
																	 ->order_by('IMV_Banheiros', 'ASC')
																	 ->get()
																	 ->result();
			$query['suites'] = $this->db->select('IMV_Suites')
																	 ->from('imovel')
																	 ->distinct('IMV_Suites')
																	 ->order_by('IMV_Suites', 'ASC')
																	 ->get()
																	 ->result();
			$this->json($query);
		}
	}
	public function getUltimosImoveis($limit = null) {
		if ($this->auth()) {
			$limit = ($limit)? $limit:50;
			$query['imoveis'] = $this->db->from('imovel')
																	 ->where('IMV_Status = 1', NULL)
																	 ->limit($limit)
																	 ->get()
																	 ->result();
			if ($query['imoveis']) {
				for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
	        $query['imoveis'][$i]->IMG_Path = base_url('assets/image/imoveis');
      	}
			}
			else {
				$query['error'] = "Nenhum imovel disponivel";
			}
     $this->json($query);
		}
	}
	public function getImovel($url) {
		if ($this->auth()) {
			if ($url) {
				$query['imoveis'] = $this->db->from('imovel')
																		->where('IMV_URL', $url)
																		->where('IMV_Status = 1', NULL)
																		->get()
																		->first_row();
				if ($query['imoveis']) {
					$query['corretor'] = $this->db->select('USR_Nome, USR_Email,USR_CRECI, USR_Telefone')->from('usuario')->where('USR_Nivel', 1)->get()->first_row();
					$query['imoveis']->IMG_Path = base_url('assets/image/imoveis');
					$query['imoveis']->IMV_MetaDados = json_decode($query['imoveis']->IMV_MetaDados);
					$query['imoveis']->IMV_Caracteristicas = json_decode($query['imoveis']->IMV_Caracteristicas);
					$query['imoveis']->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis']->IMV_CodigoImovel)->get()->result();
					$data['imoveis'] = $query['imoveis'];
					$data['corretor'] = $query['corretor'];
				}
				else {
					$data['error'] = 'Nenhum imovel disponivel para esta @url';
				}
			}
			else {
				$data['error'] = '@url nao foi informado';
			}
			$this->json($data);
		}
	}
	public function auth() {
/*		$headers = apache_request_headers();
	 	$query = $this->db->from('configuracao')
	 									 	->where('CON_URL', $headers['Origin'])
	 									 	->get()
	 									 	->first_row();
	 	if ($query) {
	 		return $query;
		}
		else {
			$query['host'] = $headers['Origin'];
			$query['error'] = "Você não pode realizar consultas deste HOST";
			$this->json($query);
		}*/
	return true;
	}
	public function debug() {
		echo $this->crypter('eraiza');
	}

	public function receberLead($dados = array()){

			if(!$dados) {
				/*INSERIR LEAD NO BANCO*/
				$dados = $this->input->post();
				$dados['LE_Status'] = 1;

				/*lead sem imovel especificado*/
				if ($dados['LE_CodigoImovel'] == 0){ 	 	
					$dados['LE_Tipo'] = 1;
				}
				/*lead com imovel especificado*/
				else{
					$dados['LE_Tipo'] = 2;
				}
				$query = $this->db->insert('lead',$dados);
				if ($query) {
					$retorno['success'] = 'lead inserido no banco com sucesso';
				}
				else{
					$retorno['error'] = 'Erro ao inserir lead no banco';
				}
			}
			else{
				$retorno['error'] = 'POST obrigatório';
			}
		}

}