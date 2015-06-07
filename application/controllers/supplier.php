<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Pasti Jaya Motor | Supplier';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$data['data'] = $this->app_model->getAllData('tbl_supplier')->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('supplier/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | Create Supplier';
		$data['kd_supplier'] = $this->app_model->getMaxKodeSupplier();
		$data['data_barang'] = $this->app_model->manualQuery('select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_supplier', 'Kode supplier', 'required');
			$this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
			if ($this->form_validation->run()) {
				$kd_supplier =$this->app_model->getMaxKodeSupplier();
				$create['kd_supplier'] = $kd_supplier;
				$create['nama_supplier'] = $this->input->post('nama_supplier');
				$create['alamat'] = $this->input->post('alamat');
				$create['kota'] = $this->input->post('kota');
				$create['telepon'] = $this->input->post('telepon');
				$result = $this->app_model->insertData('tbl_supplier', $create);

				$create_br['kd_supplier'] = $this->input->post('kd_supplier');
				$kd_barang= $this->input->post('kd_barang');

				for ($i=0; $i < count($kd_barang); $i++) { 
					$create_br['kd_supplier'] = $kd_supplier;
					$create_br['kd_barang'] = $kd_barang[$i];
					$result2 = $this->app_model->insertData("tbl_supplier_barang", $create_br);
				}
				if ($result && $result2) {
					$pesan = 'Create Supplier Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('supplier'));
				}else{
					$data['pesan'] = 'Create Supplier Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('supplier/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('supplier/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$dt['title']='Pasti Jaya Motor | Update Supplier';
		$detail['kd_supplier'] = $id;
		$cek = $this->session->userdata('logged_in');
		$data['data_supplier'] = $this->app_model->getSelectedData("tbl_supplier", $detail)->result();
		$data['data_supplier_barang'] = $this->app_model->manualQuery("select b.kd_barang, b.brand, c.kategori, c.type from tbl_supplier_barang a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori=c.id_tipe_kategori where a.kd_supplier='".$detail['kd_supplier']."'")->result();

		foreach ($data['data_supplier'] as $key => $value) {
			$data['kd_supplier'] = $value->kd_supplier;
			$data['nama_supplier'] = $value->nama_supplier;
			$data['alamat'] = $value->alamat;
			$data['kota'] = $value->kota;
			$data['telepon'] = $value->telepon;
		}
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('supplier/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Pasti Jaya Motor | Update Supplier';
		$update['kd_supplier'] = $id;
		$data['kd_supplier'] = $this->app_model->getMaxKodeSupplier();
		$data['data_barang'] = $this->app_model->manualQuery('select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
		$data['data_supplier'] = $this->app_model->getSelectedData("tbl_supplier", $update)->result();
		$data['data_supplier_barang'] = $this->app_model->manualQuery("select b.kd_barang, b.brand, c.kategori, c.type from tbl_supplier_barang a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori=c.id_tipe_kategori where a.kd_supplier='".$update['kd_supplier']."'")->result();

		foreach ($data['data_supplier'] as $key => $value) {
			$data['kd_supplier'] = $value->kd_supplier;
			$data['nama_supplier'] = $value->nama_supplier;
			$data['alamat'] = $value->alamat;
			$data['kota'] = $value->kota;
			$data['telepon'] = $value->telepon;
		}

		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_supplier', 'Kode supplier', 'required');
			$this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
			if ($this->form_validation->run()) {
				$id_update['kd_supplier'] = $id;
				$update['nama_supplier'] = $this->input->post('nama_supplier');
				$update['alamat'] = $this->input->post('alamat');
				$update['kota'] = $this->input->post('kota');
				$update['telepon'] = $this->input->post('telepon');
				$result = $this->app_model->updateData('tbl_supplier', $update, $id_update);


				$update_br['kd_supplier'] = $this->input->post('kd_supplier');
				$kd_barang= $this->input->post('kd_barang');

				$this->app_model->deleteData("tbl_supplier_barang", $id_update);

				for ($i=0; $i < count($kd_barang); $i++) { 
					$update_br['kd_supplier'] = $id;
					$update_br['kd_barang'] = $kd_barang[$i];
					$result2 = $this->app_model->insertData("tbl_supplier_barang", $update_br);
				}
				if ($result && $result2) {
					$pesan = 'Update Supplier Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('supplier'));
				}else{
					$data['pesan'] = 'Update Supplier Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('supplier/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('supplier/update', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}


	function get_detail_barang(){
		$id['kd_barang']=$this->input->post('kd_barang');
		$data['detail_barang']=$this->app_model->manualQuery("select b.type, b.kategori, a.kd_barang, a.brand from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where kd_barang = '".$id['kd_barang']."'")->result();
		$this->load->view('supplier/ajax_detail_barang',$data);
	}


	function delete($id){
		$dt['title']='Pasti Jaya Motor | Supplier';
		$delete['kd_supplier'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$pesan=($this->app_model->deleteData('tbl_supplier', $delete) ? 'Delete Supplier Sukses' : 'Delete supplier Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('supplier'));
			}else{
				redirect(base_url('supplier'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

}
