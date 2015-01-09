<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | User';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$data['data'] = $this->app_model->getAllData('tbl_user')->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('user/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Toko Onderdil | Create User';
		$data['kd_user'] = $this->app_model->getMaxKodeUser();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_user', 'Kode user', 'required');
			$this->form_validation->set_rules('nama_user', 'Nama user', 'required');
			$this->form_validation->set_rules('username', 'Username User', 'required');
			$this->form_validation->set_rules('password', 'Password User', 'required');
			$this->form_validation->set_rules('level', 'Level User', 'required');
			if ($this->form_validation->run()) {
				$create['kd_user'] = $this->input->post('kd_user');
				$create['nama_user'] = $this->input->post('nama_user');
				$create['username'] = $this->input->post('username');
				$create['password'] = $this->input->post('password');
				$create['level'] = $this->input->post('level');
				
				if ($this->app_model->insertData('tbl_user', $create)) {
					$pesan = 'Create User Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('user'));
				}else{
					$data['pesan'] = 'Create User Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('user/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('user/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$dt['title']='Toko Onderdil | Update User';
		$detail['kd_user'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_user', $detail)->result();
		foreach ($result as $key => $value) {
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $value->nama_user;
			$data['username'] = $value->username;
			$data['password'] = $value->password;
			$data['level'] = $value->level; 
		}
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('user/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Toko Onderdil | Update User';
		$update['kd_user'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_user', $update)->result();
		foreach ($result as $key => $value) {
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $value->nama_user;
			$data['username'] = $value->username;
			$data['password'] = $value->password;
			$data['level'] = $value->level;  
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_user', 'Kode user', 'required');
			$this->form_validation->set_rules('nama_user', 'Nama user', 'required');
			$this->form_validation->set_rules('username', 'Username User', 'required');
			$this->form_validation->set_rules('password', 'Password User', 'required');
			$this->form_validation->set_rules('level', 'Level User', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_user'] = $id;
					$update['nama_user'] = $this->input->post('nama_user');
					$update['username'] = $this->input->post('username');
					$update['password'] = $this->input->post('password');
					$update['level'] = $this->input->post('level');
					if ($this->input->post('level') == 'owner') {
						$this->session->set_userdata('nama', $this->input->post('nama_user'));
					}
					if ($this->app_model->updateData('tbl_user', $update, $id_update)) {
						$pesan = 'Update User Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('user'));
					}else{
						$data['pesan'] = 'Update User Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('user/update', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('user/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('user'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Toko Onderdil | User';
		$delete['kd_user'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$pesan=($this->app_model->deleteData('tbl_user', $delete) ? 'Delete User Sukses' : 'Delete user Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('user'));
			}else{
				redirect(base_url('user'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

}
