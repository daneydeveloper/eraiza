<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH . '/controllers/Evo_Basic.php');

class Login extends Evo_Basic {

  public function index(){
    if ($this->logged()) {
      redirect('dashboard','refresh');
    }
  }

  /*JSON FUNCTIONS*/
  public function auth() {
    if ($_POST) {
      $email = $this->input->post('email');
      $senha = $this->crypter($this->input->post('senha'));
      
      $query = $this->db->from('usuario')
                        ->where('USR_Email',$email)
                        ->get()
                        ->first_row();
      if ($query) {
        if ($senha == $query->USR_Senha) {
           $this->session->set_userdata('usuario', $query);
        }
        else {
          $retorno['error'] = 'Senha incorreta';  
        }
      }
      else {
        $retorno['error'] = 'E-mail não cadastrado';  
      }
    }
    else {
      $retorno['error'] = 'POST REQUIRED';
    }
    $this->json($retorno);
  }

  public function sair(){
    $this->session->unset_userdata('usuario');
    $this->session->sess_destroy();
    redirect('login','refresh');
  }
}