<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 2 && $this->session->userdata('level') != 3 && $this->session->userdata('level') != 4) {
    	redirect('dashboard');
    }
  }
	function index(){
		$dt['title']='Pasti Jaya Motor | Home';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('report/index');
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}
}