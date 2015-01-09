<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */

	function index(){
		$data['title']='Toko Onderdil Login';
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			$this->load->view('login/index', $data);
		}else{
			redirect(base_url('dashboard'));
		}
	}

	function in() {
		$data['title']='Toko Onderdil Login';
        //Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember');
		$login_as_admin = $this->input->post('login-as-admin');
        //query the database
        if (!$login_as_admin) {
		$result = $this->app_model->getLoginData('tbl_sales', $username, $password);
        }else{
		$result = $this->app_model->getLoginData('tbl_user', $username, $password);
        }
		if(count($result)>0){
			foreach($result as $key => $value)
			{
				$sess_data['logged_in'] = 'yesGetMeLogin';
				$sess_data['username'] = $value->username;
				$sess_data['last_login'] = date('D-M-Y');
				if(!$login_as_admin){
				$sess_data['nama'] = $value->nama_sales;
				$sess_data['level'] = 'sales';
				$sess_data['kd_sales'] = $value->kd_sales;
			}else{
				$sess_data['nama'] = $value->nama_user;
				$sess_data['level'] = $value->level;
				$sess_data['kd_user'] = $value->kd_user;
			}
				if($remember){
				$sess_data['new_expiration'] = 60*60*24*30;//30 days
				$this->session->sess_expiration = $sess_data['new_expiration'];
			}
			$this->session->set_userdata($sess_data);
			redirect(base_url('dashboard'));
		}
	}else{
		$data['error']='Username atau Password salah';
		$this->load->view('login/index', $data);
	}
}

function out() {
	$cek = $this->session->userdata('logged_in');
	if(empty($cek))
	{
		redirect(base_url('login'));
	}
	else
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
}