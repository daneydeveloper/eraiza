<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	public function __construct(){
    $this->CI =& get_instance();
  }

  public function make($content, $dados = null) {
  	$dados['modulo_url'] = $this->CI->uri->segment(1);
		$dados['header'] = $this->CI->load->view('template/v_header',$dados, true);
		/*$dados['menu'] = $this->CI->load->view('template/v_menu',$dados, true);*/
		$dados['content'] = $this->CI->load->view($content ,@$dados, true);
		$this->CI->load->view('template/v_main',@$dados);
	}

	public function alert($msg, $type = 'info', $style = 'border') {
		if ($style == 'fill') {
			return '<div class="alert alert-'.$type.' alert-border-left alert-close alert-dismissible" role="alert">'.$msg.'</div>';
		}
		if ($style == 'border') {
			return '<div class="alert alert-'.$type.' alert-fill alert-border-left alert-close alert-dismissible" role="alert">'.$msg.'</div>';
		}
	}

	public function tooltip($msg, $position='top', $size='small') {
		return 'tooltips tooltip-side="'.$position.'" tooltip-template="'.$msg.'" tooltip-size="'.$size.'"';
	}

	public function includeHTML($url){
		$this->CI->load->helper('directory');
		$map = directory_map(FCPATH.$url);
		return $map;
		/*foreach ($map as $key => $value) {
			if (count($value) > 1) {
				foreach ($value as $a) {
					$url = (base_url($url.$key.$a));
					echo '<script type="text/javascript" src="'.$url.'"></script>';
				}
			}
		}*/
	}
}