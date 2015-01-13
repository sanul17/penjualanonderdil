<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | Barang';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$data['data'] = $this->app_model->getAllData('tbl_barang')->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('barang/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Toko Onderdil | Create Barang';
		$data['kd_barang'] = $this->app_model->getMaxKodeBarang();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_barang', 'kd_barang', 'required');
			$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori Barang', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('modal', 'Modal', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('posisi', 'Posisi', 'required');
			if ($this->form_validation->run()) {
				$create['kd_barang'] = $this->input->post('kd_barang');
				$create['nama_barang'] = $this->input->post('nama_barang');
				$create['kategori'] = $this->input->post('kategori');
				$create['brand'] = $this->input->post('brand');
				$create['type'] = $this->input->post('type');
				$create['min_stok'] = $this->input->post('min_stok');
				$create['stok'] = $this->input->post('stok');
				$create['modal'] = $this->input->post('modal');
				$create['harga'] = $this->input->post('harga');
				$create['posisi'] = $this->input->post('posisi');
				
				if ($this->app_model->insertData('tbl_barang', $create)) {
					$pesan = 'Create Barang Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('barang'));
				}else{
					$data['pesan'] = 'Create Barang Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('barang/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$dt['title']='Toko Onderdil | Update Barang';
		$detail['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_barang', $detail)->result();
		foreach ($result as $key => $value) {
			$data['kd_barang'] = $value->kd_barang;
			$data['nama_barang'] = $value->nama_barang;
			$data['kategori'] = $value->kategori;
			$data['brand'] = $value->brand; 
			$data['type'] = $value->type; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
			$data['modal'] = $value->modal; 
			$data['harga'] = $value->harga; 
			$data['posisi'] = $value->posisi; 
		}
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('barang/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Toko Onderdil | Update Barang';
		$update['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_barang', $update)->result();
		foreach ($result as $key => $value) {
			$data['kd_barang'] = $value->kd_barang;
			$data['nama_barang'] = $value->nama_barang;
			$data['kategori'] = $value->kategori;
			$data['brand'] = $value->brand; 
			$data['type'] = $value->type; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
			$data['modal'] = $value->modal; 
			$data['harga'] = $value->harga; 
			$data['posisi'] = $value->posisi; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_barang', 'kd_barang', 'required');
			$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori Barang', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('modal', 'Modal', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('posisi', 'Posisi', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_barang'] = $id;
					$update['nama_barang'] = $this->input->post('nama_barang');
					$update['kategori'] = $this->input->post('kategori');
					$update['brand'] = $this->input->post('brand'); 
					$update['type'] = $this->input->post('type'); 
					$update['min_stok'] = $this->input->post('min_stok'); 
					$update['stok'] = $this->input->post('stok'); 
					if ($update['stok'] < 0) {
						$update['stok'] = 0;
					}
					$update['modal'] = $this->input->post('modal'); 
					$update['harga'] = $this->input->post('harga'); 
					$update['posisi'] = $this->input->post('posisi'); 
					if ($this->app_model->updateData('tbl_barang', $update, $id_update)) {
						$pesan = 'Update Barang Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('barang'));
					}else{
						$data['pesan'] = 'Update Barang Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('barang/update', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function addStok($id){
		$dt['title']='Toko Onderdil | Tambah Barang';
		$update['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_barang', $update)->result();
		foreach ($result as $key => $value) {
			$data['kd_barang'] = $value->kd_barang;
			$data['nama_barang'] = $value->nama_barang; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_barang', 'kd_barang', 'required');
			$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('qty', 'Quantity', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_barang'] = $id;
					$update['nama_barang'] = $this->input->post('nama_barang');
					$update['min_stok'] = $this->input->post('min_stok'); 
					$stok = $this->input->post('stok');
					$update['stok'] = $stok+$this->input->post('qty');
					if ($update['stok'] < 0) {
						$update['stok'] = 0;
					}
					if ($this->app_model->updateData('tbl_barang', $update, $id_update)) {
						$pesan = 'Tambah Stok Barang Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('barang'));
					}else{
						$data['pesan'] = 'Tambah Stok Barang Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('barang/add', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/add', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Toko Onderdil | Barang';
		$delete['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$pesan=($this->app_model->deleteData('tbl_barang', $delete) ? 'Delete Barang Sukses' : 'Delete Barang Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('barang'));
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

}
