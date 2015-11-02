<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipe_kategori extends CI_Controller {

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
		$dt['title']='Pasti Jaya Motor | Tipe Kategori';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$data['data'] = $this->app_model->getAllData('tbl_tipe_kategori')->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('tipe_kategori/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | Create Tipe Kategori';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			if ($this->form_validation->run()) {
				$create['kategori'] = $this->input->post('kategori');
				$create['type'] = $this->input->post('type');
				
				if ($this->app_model->insertData('tbl_tipe_kategori', $create)) {
					$pesan = 'Create Tipe Kategori Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('tipe_kategori'));
				}else{
					$data['pesan'] = 'Create Tipe Kategori Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('tipe_kategori/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('tipe_kategori/create');
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Pasti Jaya Motor | Update Tipe Kategori';
		$update['id_tipe_kategori'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_tipe_kategori', $update)->result();
		foreach ($result as $key => $value) {
			$data['id_tipe_kategori'] = $value->id_tipe_kategori;
			$data['kategori'] = $value->kategori;
			$data['type'] = $value->type; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['id_tipe_kategori'] = $id;
					$update['kategori'] = $this->input->post('kategori');
					$update['type'] = $this->input->post('type');
					if ($this->app_model->updateData('tbl_tipe_kategori', $update, $id_update)) {
						$pesan = 'Update Tipe Kategori Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('tipe_kategori'));
					}else{
						$data['pesan'] = 'Update Tipe Kategori Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('tipe_kategori/update', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('tipe_kategori/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('tipe_kategori'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Pasti Jaya Motor | Tipe Kategori';
		$delete['id_tipe_kategori'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$pesan=($this->app_model->deleteData('tbl_tipe_kategori', $delete) ? 'Delete Tipe Kategori Sukses' : 'Delete Tipe Kategori Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('tipe_kategori'));
			}else{
				redirect(base_url('tipe_kategori'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

}
