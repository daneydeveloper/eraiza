<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){

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

		/*IMOVEIS*/	
	 	$query['imoveis'] = $this->db->from('imovel')
	 										 ->join('imovel_imagens','IMV_CodigoImovel = IMG_CodigoImovel')
	 										 ->join('imovel_tipo','IMV_Tipo = IMT_CodigoTipo')
											 ->where('IMV_Status = 1', NULL)
											 ->order_by('IMV_CodigoImovel','desc')
											 ->group_by('IMV_CodigoImovel')
											 ->limit(9)
											 ->get()
											 ->result();
		if ($query['imoveis']) {
			for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
      	  $query['imoveis'][$i]->IMG_Path = 'http://imob.charlysresendeimoveis.com.br/assets/image/imoveis';
      	}
		}	
		else {
			$query['error'] = "Nenhum imovel disponivel";
		}
	 	
	 	$this->load->view('v_home',$query);

	}

	public function verImoveis(){
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
		
		$query['imoveis'] = $this->db->from('imovel')
											 ->join('imovel_imagens','IMV_CodigoImovel = IMG_CodigoImovel')
											 ->join('imovel_tipo', 'IMV_Tipo = IMT_CodigoTipo')
											 ->where('IMV_Status = 1', NULL)
											 ->order_by('IMV_CodigoImovel','desc')
											 ->group_by('IMV_CodigoImovel')
											 ->get()
											 ->result();
		if ($query['imoveis']) {
			for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
	        $query['imoveis'][$i]->IMG_Path = 'http://imob.charlysresendeimoveis.com.br/assets/image/imoveis';
      	}
		}	
		else {
			$query['error'] = "Nenhum imovel disponivel";
		}

		$this->template->make('v_imoveis',$query);
	}

	public function verImovel($url){
		if($url){
			$query['imovel'] = $this->db->from('imovel')
									->where('IMV_URL',$url)
									->get()
									->first_row();

			$query['imagens'] = $this->db->from('imovel_imagens')
												  ->where('IMG_CodigoImovel',$query['imovel']->IMV_CodigoImovel)
												  ->get()
												  ->result();

			$query['imovel']->IMV_MetaDados = json_decode($query['imovel']->IMV_MetaDados);
         $query['imovel']->IMV_Caracteristicas = json_decode($query['imovel']->IMV_Caracteristicas);
         $query['imovel']->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imovel']->IMV_CodigoImovel)->get()->result();
         $query['imovel']->IMG_Path = 'http://imob.charlysresendeimoveis.com.br/assets/image/imoveis';
			
			$this->template->make('v_imovel',$query);
		}
	}

	public function verSobre(){
		$this->template->make('v_sobre');
	}
	public function verContato(){
		$this->template->make('v_contato');
	}

	public function buscarHome(){
		$dados = $this->input->get();

		if(@$dados['IMV_Finalidade'] != "") {
			$data['IMV_Finalidade'] = $dados['IMV_Finalidade'];
    	}
	    else {
	       unset($dados['IMV_Finalidade']);
	    }

	    if(@$dados['IMV_Tipo'] != "") {
	    	$data['IMV_Tipo'] = $dados['IMV_Tipo'];
	    }
	    else {
	       unset($dados['IMV_Tipo']);
	    }

	    if(@$dados['IMV_Estado'] != "") {
	    	$data['IMV_Estado'] = $dados['IMV_Estado'];
	    }
	    else {
	       unset($dados['IMV_Estado']);
	    }

	    if(@$dados['IMV_Cidade'] != "") {
	    	$data['IMV_Cidade'] = $dados['IMV_Cidade'];
	    }
	    else {
	       unset($dados['IMV_Cidade']);
	    }

	    if(@$dados['IMV_Bairro'] != "") {
	    	$data['IMV_Bairro'] = $dados['IMV_Bairro'];
	    }
	    else {
	       unset($dados['IMV_Bairro']);
	    }

	    if(@$dados['IMV_Quartos'] != "") {
	    	$data['IMV_Quartos'] = $dados['IMV_Quartos'];
	    }
	    else {
	       unset($dados['IMV_Quartos']);
	    }

	    if(@$dados['IMV_Banheiros'] != "") {
	    	$data['IMV_Banheiros'] = $dados['IMV_Banheiros'];
	    }
	    else {
	       unset($dados['IMV_Banheiros']);
	    }

		$query['tipo'] = $this->db->select('IMT_CodigoTipo, IMT_Nome')
												->from('imovel')
											  ->join('imovel_tipo', 'IMV_Tipo = IMT_CodigoTipo')
											  ->order_by('IMT_Nome', 'ASC')
											  ->group_by('IMT_Nome')
											  ->get()
											  ->result();	

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

		/*IMOVEIS*/	
	 	$query['imoveis'] = $this->db->from('imovel')
	 										 ->join('imovel_imagens','IMV_CodigoImovel = IMG_CodigoImovel')
	 										 ->join('imovel_tipo','IMV_Tipo = IMT_CodigoTipo')
											 ->where('IMV_Status = 1', NULL)
											 ->where($data)
											 ->order_by('IMV_CodigoImovel','desc')
											 ->group_by('IMV_CodigoImovel')
											 ->limit(9)
											 ->get()
											 ->result();
											 
		if ($query['imoveis']) {
			for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
      	  $query['imoveis'][$i]->IMG_Path = 'http://imob.charlysresendeimoveis.com.br/assets/image/imoveis';
      	}
		}	

		$this->load->view('v_home',$query);
	}

	public function buscarImoveis(){
		$dados = $this->input->get();

		if(@$dados['IMV_Finalidade'] != "") {
			$data['IMV_Finalidade'] = $dados['IMV_Finalidade'];
    	}
	    else {
	       unset($dados['IMV_Finalidade']);
	    }

	    if(@$dados['IMV_Tipo'] != "") {
	    	$data['IMV_Tipo'] = $dados['IMV_Tipo'];
	    }
	    else {
	       unset($dados['IMV_Tipo']);
	    }

	    if(@$dados['IMV_Estado'] != "") {
	    	$data['IMV_Estado'] = $dados['IMV_Estado'];
	    }
	    else {
	       unset($dados['IMV_Estado']);
	    }

	    if(@$dados['IMV_Cidade'] != "") {
	    	$data['IMV_Cidade'] = $dados['IMV_Cidade'];
	    }
	    else {
	       unset($dados['IMV_Cidade']);
	    }

	    if(@$dados['IMV_Bairro'] != "") {
	    	$data['IMV_Bairro'] = $dados['IMV_Bairro'];
	    }
	    else {
	       unset($dados['IMV_Bairro']);
	    }

	    if(@$dados['IMV_Quartos'] != "") {
	    	$data['IMV_Quartos'] = $dados['IMV_Quartos'];
	    }
	    else {
	       unset($dados['IMV_Quartos']);
	    }

	    if(@$dados['IMV_Banheiros'] != "") {
	    	$data['IMV_Banheiros'] = $dados['IMV_Banheiros'];
	    }
	    else {
	       unset($dados['IMV_Banheiros']);
	    }

		$query['tipo'] = $this->db->select('IMT_CodigoTipo, IMT_Nome')
												->from('imovel')
											  ->join('imovel_tipo', 'IMV_Tipo = IMT_CodigoTipo')
											  ->order_by('IMT_Nome', 'ASC')
											  ->group_by('IMT_Nome')
											  ->get()
											  ->result();	

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

		/*IMOVEIS*/	
	 	$query['imoveis'] = $this->db->from('imovel')
	 										 ->join('imovel_imagens','IMV_CodigoImovel = IMG_CodigoImovel')
	 										 ->join('imovel_tipo','IMV_Tipo = IMT_CodigoTipo')
											 ->where('IMV_Status = 1', NULL)
											 ->where($data)
											 ->order_by('IMV_CodigoImovel','desc')
											 ->group_by('IMV_CodigoImovel')
											 ->limit(9)
											 ->get()
											 ->result();
											 
		if ($query['imoveis']) {
			for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
      	  $query['imoveis'][$i]->IMG_Path = 'http://imob.charlysresendeimoveis.com.br/assets/image/imoveis';
      	}
		}	

		$this->template->make('v_imoveis',$query);
	}

}
