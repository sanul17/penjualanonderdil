<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | Sales';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$data['data'] = $this->app_model->getAllData('tbl_sales')->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('sales/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Toko Onderdil | Create Sales';
		$data['kd_sales'] = $this->app_model->getMaxKodesales();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_sales', 'Kode Sales', 'required');
			$this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');
			$this->form_validation->set_rules('username', 'Username Sales', 'required');
			$this->form_validation->set_rules('password', 'Password Sales', 'required');
			if ($this->form_validation->run()) {
				$create['kd_sales'] = $this->input->post('kd_sales');
				$create['nama_sales'] = $this->input->post('nama_sales');
				$create['username'] = $this->input->post('username');
				$create['password'] = $this->input->post('password');
				
				if ($this->app_model->insertData('tbl_sales', $create)) {
					$pesan = 'Create Sales Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('sales'));
				}else{
					$data['pesan'] = 'Create Sales Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('sales/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('sales/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$dt['title']='Toko Onderdil | Update Sales';
		$detail['kd_sales'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_sales', $detail)->result();
		foreach ($result as $key => $value) {
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $value->nama_sales;
			$data['username'] = $value->username;
			$data['password'] = $value->password; 
		}
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('sales/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Toko Onderdil | Update Sales';
		$update['kd_sales'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_sales', $update)->result();
		foreach ($result as $key => $value) {
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $value->nama_sales;
			$data['username'] = $value->username;
			$data['password'] = $value->password;  
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_sales', 'Kode Sales', 'required');
			$this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');
			$this->form_validation->set_rules('username', 'Username Sales', 'required');
			$this->form_validation->set_rules('password', 'Password Sales', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_sales'] = $id;
					$update['nama_sales'] = $this->input->post('nama_sales');
					$update['username'] = $this->input->post('username');
					$update['password'] = $this->input->post('password');
					if ($this->app_model->updateData('tbl_sales', $update, $id_update)) {
						$pesan = 'Update Sales Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('sales'));
					}else{
						$data['pesan'] = 'Update Sales Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('sales/update', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('sales/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('sales'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Toko Onderdil | Sales';
		$delete['kd_sales'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$pesan=($this->app_model->deleteData('tbl_sales', $delete) ? 'Delete Sales Sukses' : 'Delete Sales Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('sales'));
			}else{
				redirect(base_url('sales'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

}
