<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */

	function index(){
		$data['title']='Pasti Jaya Motor Login';
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			$this->load->view('login/index', $data);
		}else{
			redirect(base_url('dashboard'));
		}
	}

	function in() {
		$data['title']='Pasti Jaya Motor Login';
        //Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		$password = $this->input->post('password');
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
				$sess_data['level'] = 6;
				$sess_data['kd_sales'] = $value->kd_sales;
			}else{
				$sess_data['nama'] = $value->nama_user;
				$sess_data['level'] = $value->level;
				$sess_data['kd_user'] = $value->kd_user;
			}
			switch ($sess_data['level']) {
				case 1:
				$sess_data['level_name'] = 'Owner';
					break;
				case 2:
				$sess_data['level_name'] = 'Super Admin';
					break;
				case 3:
				$sess_data['level_name'] = 'Admin Pembelian';
					break;
				case 4:
				$sess_data['level_name'] = 'Admin Penjualan';
					break;
				case 5:
				$sess_data['level_name'] = 'Gudang';
					break;
				case 6:
				$sess_data['level_name'] = 'Sales';
					break;
				
				default:
				$sess_data['level_name'] = 'Undentified';
					break;
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