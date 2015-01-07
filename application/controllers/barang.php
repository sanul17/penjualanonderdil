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
					$data['pesan'] = 'Create Barang Sukses';
					$data['data'] = $this->app_model->getAllData('tbl_barang')->result();
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/index', $data);
					$this->load->view('elements/footer');
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
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('judul_barang', 'Judul', 'required');
			$this->form_validation->set_rules('isi_barang', 'Isi', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['id_barang'] = $id;
					$update['judul_barang'] = $this->input->post('judul_barang');
					$update['isi_barang'] = $this->input->post('isi_barang');
					$update['tgl_barang'] =  date('Y-m-d');
					if ($this->app_model->updateData('tbl_barang', $update, $id_update)) {
						$data['pesan'] = 'Update Create Sukses';
						$data['data'] = $this->app_model->getAllData('tbl_barang')->result();
						$this->load->view('elements/header', $dt);
						$this->load->view('barang/index', $data);
						$this->load->view('elements/footer');
					}else{
						$data['pesan'] = 'Update Create Gagal';
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
				$data['pesan']=($this->app_model->deleteData('tbl_barang', $delete) ? 'Delete Create Sukses' : 'Delete Create Gagal');
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
