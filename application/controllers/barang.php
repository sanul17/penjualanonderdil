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
		$dt['title']='Toko Onderdil | Barang';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('judul_barang', 'Judul', 'required');
			$this->form_validation->set_rules('isi_barang', 'Isi', 'required');
			if ($this->form_validation->run()) {
				$create['judul_barang'] = $this->input->post('judul_barang');
				$create['isi_barang'] = $this->input->post('isi_barang');
				$create['tgl_barang'] =  date('Y-m-d');
				
				if ($this->app_model->insertData('tbl_barang', $create)) {
					$data['pesan'] = 'Entri barang Sukses';
					$data['data'] = $this->app_model->getAllData('tbl_barang')->result();
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/index', $data);
					$this->load->view('elements/footer');
				}else{
					$data['pesan'] = 'Entri barang Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('barang/create');
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Toko Onderdil | Barang';
		$update['id_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_barang', $update)->result();
		foreach ($result as $key => $value) {
			$data['id_barang'] = $value->id_barang;
			$data['judul_barang'] = $value->judul_barang;
			$data['isi_barang'] = $value->isi_barang;
			$data['prev_image'] = $value->image_barang; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('judul_barang', 'Judul', 'required');
			$this->form_validation->set_rules('isi_barang', 'Isi', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['id_barang'] = $id;
					$update['judul_barang'] = $this->input->post('judul_barang');
					$update['isi_barang'] = $this->input->post('isi_barang');
					$update['tgl_barang'] =  date('Y-m-d');
					if ($this->app_model->updateData('tbl_barang', $update, $id_update)) {
						$data['pesan'] = 'Update Entri Sukses';
						$data['data'] = $this->app_model->getAllData('tbl_barang')->result();
						$this->load->view('elements/header', $dt);
						$this->load->view('barang/index', $data);
						$this->load->view('elements/footer');
					}else{
						$data['pesan'] = 'Update Entri Gagal';
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

	function delete($id){
		$dt['title']='Toko Onderdil | Barang';
		$delete['id_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$data['pesan']=($this->app_model->deleteData('tbl_barang', $delete) ? 'Delete Entri Sukses' : 'Delete Entri Gagal');
				$data['data'] = $this->app_model->getAllData('tbl_barang')->result();
				$this->load->view('elements/header', $dt);
				$this->load->view('barang/index', $data);
				$this->load->view('elements/footer');
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}

	}
	function search(){
		$dt['title']='Toko Onderdil | Barang';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$q=($this->input->get('q') ? $this->input->get('q') : '');
			$data['data'] = $this->app_model->searchData('tbl_barang', $q)->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('barang/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}

	}

}
