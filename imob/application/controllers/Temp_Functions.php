<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key');
class Temp_Functions extends CI_Controller {

	public function Email_Simples() {
		$dados = $this->input->post();
		var_dump($dados);
 		$this->load->library('email');
		$config['protocol'] = 'stmp';
		$config['smtp_host'] = 'mail.smtp2go.com';
		$config['smtp_port'] = '465'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
		$config['smtp_crypto'] = 'ssl';
		$config['smtp_user'] = 'leads@marketingmidia9.com.br';
		$config['smtp_pass'] = 'YjVvZnl1aWxrNWZi';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;
		$config['smtp_crypto'] = 'ssl';
		$config['priority'] = '1';
		$this->email->initialize($config);
		$this->email->from('leads@marketingmidia9.com.br', 'CRM Midia9');
		$this->email->to($dados['Para']);
		$this->email->cc($dados['Copia']);
		$this->email->bcc('yuricarvalho48@gmail.com, leads@midia9.com.br');
		$this->email->subject($dados['TituloEmail']);
		$this->email->message($dados['CorpoEmail']);	
		if ($this->email->send()) {
			$retorno['success'] = true;
		}
		else{
			$retorno['success'] = false;
			$retorno['msg'] = print_debugger();
		}
	}
}
