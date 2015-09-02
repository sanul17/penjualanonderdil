<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Pasti Jaya Motor | Pembelian';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("SELECT a.kd_pembelian, a.kd_supplier, a.tgl_pembelian, a.kd_user, b.nama_supplier, c.nama_user from tbl_pembelian a left join tbl_supplier b on a.kd_supplier = b.kd_supplier left join tbl_user c on a.kd_user = c.kd_user")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('pembelian/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | Create pembelian';
		$data['kd_pembelian'] = $this->app_model->getMaxKodePembelian();
		$data['data_supplier'] = $this->app_model->getAllData("tbl_supplier")->result();
		$data['data_barang'] = $this->app_model->manualQuery('select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
		$data['kd_user'] = $this->session->userdata('kd_user');
		$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
			if ($this->form_validation->run()) {
				$cek_qty_array = $this->input->post('qty');
				$cek_qty = 0;
				for ($i=0; $i < count($cek_qty_array); $i++) { 
					$cek_qty+= $cek_qty_array[$i];
				}
				if ($cek_qty >0) {
					$id_cek['kd_pembelian'] = $this->input->post('kd_pembelian');
					$cek_kd_pembelian = $data['data_pembelian'] = $this->app_model->getSelectedData("tbl_pembelian", $id_cek)->result();
					$kd_pembelian = '';
					if (count($cek_kd_pembelian > 0)) {
						$kd_pembelian = $this->app_model->getMaxKodePembelian();
					}else{
						$kd_pembelian = $this->input->post('kd_pembelian');
					}
					$create['kd_pembelian'] = $kd_pembelian;
					$create['kd_supplier'] = $this->input->post('kd_supplier');
					$create['kd_user'] = $this->session->userdata('kd_user');
					$create['total_harga'] = $this->input->post('total');
					$create['tgl_pembelian'] = strtotime(date('Y-m-d H:i:s'));
					$result = $this->app_model->insertData('tbl_pembelian', $create);
					$result2 = 0;

					$kd_barang = $this->input->post('kd_barang');
					$qty = $this->input->post('qty');
					$harga_beli = $this->input->post('harga_beli');
					$update_harga = $this->input->post('update_harga');

					for ($i=0; $i < count($kd_barang); $i++) { 
						if ($qty[$i] > 0) {
							$create_detail['kd_pembelian'] = $kd_pembelian;
							$create_detail['kd_barang'] = $kd_barang[$i];
							$create_detail['qty'] = $qty[$i];
							$create_detail['harga_beli'] = $harga_beli[$i];

							$create_history['kd_barang'] = $create_detail['kd_barang'];
							$create_history['qty_masuk'] = $create_detail['qty'];
							$create_history['qty_keluar'] = 0;
							$create_history['qty_awal'] = $this->app_model->getSisaStok($create_detail['kd_barang']);
							$create_history['tgl_history'] = $create['tgl_pembelian'];
							$create_history['type_history'] = 1;
							$create_history['kd_user'] = $this->session->userdata('kd_user');

							$result2 = $this->app_model->insertData("tbl_pembelian_detail", $create_detail);
							$stok['stok'] = $this->app_model->getSisaStok($create_detail['kd_barang']) + $qty[$i];

							$create_history['qty_akhir'] = $stok['stok'];
							$this->app_model->insertData('tbl_history', $create_history);

							$key = $create_detail['kd_barang'];
							$this->app_model->updateStok($stok, $key);


							if($update_harga[$i]){
								$update_harga_barang['modal'] = $harga_beli[$i];
								$id_update_harga['kd_barang'] = $kd_barang[$i];
								$this->app_model->updateData('tbl_barang', $update_harga_barang, $id_update_harga);
							}
						}
					}	

					if ($result && $result2) {
						$pesan = 'Pembelian Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('pembelian'));
					}else{
						$data['pesan'] = 'Pembelian Cash Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('pembelian/confirm', $data);
						$this->load->view('elements/footer');
					}
				}else{
					redirect(base_url('pembelian'));
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('pembelian/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}
/*
	function get_barang_supplier(){
		$id['kd_supplier']=$this->input->post('kd_supplier');
		$result = $this->app_model->manualQuery("select *, c.type as tipe from tbl_supplier_barang a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_supplier = '".$id['kd_supplier']."'")->result_array();
		echo json_encode($result);
	}
	*/

	function get_detail_supplier(){
		$id['kd_supplier']=$this->input->post('kd_supplier');
		$result = $this->app_model->manualQuery("select * from tbl_supplier where kd_supplier = '".$id['kd_supplier']."'")->result();
		$data = array();
		foreach ($result as $key => $value) {
			$data['alamat'] = $value->alamat;
			$data['kota'] = $value->kota;
		}
		$this->load->view('pembelian/detail_supplier',$data);
	}

	function get_detail_barang(){
		$id['kd_barang']=$this->input->post('kd_barang');
		$data=array(
			'detail_barang'=>$this->app_model->manualQuery("select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where kd_barang = '".$id['kd_barang']."'")->result(),
			'stok'=>$this->app_model->getSisaStok($id['kd_barang']),
			);
		$this->load->view('pembelian/ajax_detail_barang',$data);
	}


	function detail($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Pasti Jaya Motor | Detail Pembelian';
		$detail['kd_pembelian'] = $id;
		$data['kd_pembelian'] = $detail['kd_pembelian'];
		$data['data_pembelian'] = $this->app_model->manualQuery("SELECT a.kd_pembelian, a.kd_supplier, a.tgl_pembelian, a.kd_user, b.nama_supplier, c.nama_user from tbl_pembelian a left join tbl_supplier b on a.kd_supplier = b.kd_supplier left join tbl_user c on a.kd_user = c.kd_user where a.kd_pembelian='".$detail['kd_pembelian']."'")->result();
		$data['data_pembelian_detail'] = $this->app_model->manualQuery("select * from tbl_pembelian_detail a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_pembelian='".$detail['kd_pembelian']."'")->result();

		foreach ($data['data_pembelian'] as $key => $value) {
			$data['kd_pembelian'] = $value->kd_pembelian;
			$data['kd_supplier'] = $value->kd_supplier;
			$data['nama_supplier'] = $value->nama_supplier;
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $value->nama_user;
			$data['tgl_pembelian'] = $value->tgl_pembelian;
		}

		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('pembelian/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}
/*
	function cetak($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Pasti Jaya Motor | Update pembelian';
		$detail['kd_pembelian'] = $id;
		$data['kd_pembelian'] = $detail['kd_pembelian'];
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['data_pembelian'] = $this->app_model->manualQuery("SELECT *, a.kd_pembelian, a.kd_order, a.nama_pelanggan, a.tgl_pembelian, a.alamat, a.kd_user, a.jenis, b.nama_user, (select count(kd_pembelian) as jum from tbl_pembelian_detail where kd_pembelian=kd_pembelian) as jumlah from tbl_pembelian a left join tbl_user b on a.kd_user=b.kd_user")->result();
		/-
		per barang
		$data['data_pembelian_detail'] = $this->app_model->manualQuery("select a.kd_pembelian, a.kd_barang, a.qty, a.potongan, a.dus, b.brand, c.kategori, c.type, a.harga_tersimpan from tbl_pembelian_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_pembelian='".$detail['kd_pembelian']."'")->result();
-/

		$data['data_pembelian_detail'] = $this->app_model->manualQuery("select a.kd_pembelian, a.qty, sum(a.qty) as total_qty, a.potongan, a.dus, b.brand, c.kategori, c.type, a.harga_tersimpan, sum(a.harga_tersimpan) as harga from tbl_pembelian_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_pembelian='".$detail['kd_pembelian']."' group by b.id_tipe_kategori")->result();

		foreach ($data['data_pembelian'] as $key => $value) {
			$data['kd_pembelian'] = $value->kd_pembelian;
			$data['kd_order'] = $value->kd_order;
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['alamat'] = $value->alamat;
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $value->nama_user;
			$data['total_harga'] = $value->total_harga;
			$data['tgl_cetak'] =  date('d-M-Y');
			$data['jenis'] =  $value->jenis;
		}

		$data['total'] = 0;
		foreach ($data['data_pembelian_detail'] as $key => $value) {
			$data['total'] += $value->harga_tersimpan*$value->qty;
		}



		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('pembelian/print', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}
	*/

}
