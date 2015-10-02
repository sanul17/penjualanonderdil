<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_penjualan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Pasti Jaya Motor | Retur Penjualan';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("select a.*, b.tgl_penjualan, b.nama_pelanggan, c.nama_user from tbl_retur_penjualan a left join tbl_penjualan b on a.kd_penjualan = b.kd_penjualan left join tbl_user c on a.kd_user = c.kd_user")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('retur_penjualan/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function list_penjualan(){
		$dt['title']='Pasti Jaya Motor | Retur Penjualan';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("SELECT a.kd_penjualan, a.nama_pelanggan, a.tgl_penjualan, a.kd_user, b.nama_user from tbl_penjualan a left join tbl_user b on a.kd_user = b.kd_user where a.retur_status = 0")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('retur_penjualan/list_penjualan', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create($id){
		$dt['title']='Pasti Jaya Motor | Create penjualan';
		$kd_penjualan = $id;
		$data['kd_retur_penjualan'] = $this->app_model->getMaxKodeReturPenjualan();
		$data['data_penjualan'] = $this->app_model->manualQuery("SELECT a.kd_penjualan, a.nama_pelanggan, a.tgl_penjualan from tbl_penjualan a where a.kd_penjualan='".$kd_penjualan."'")->result();
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select * from tbl_penjualan_detail a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_penjualan='".$kd_penjualan."'")->result();
		$data['kd_user'] = $this->session->userdata('kd_user');
		$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));

		foreach ($data['data_penjualan'] as $key => $value) {
			$data['kd_penjualan'] = $value->kd_penjualan;
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['tgl_penjualan'] = $value->tgl_penjualan;
		}
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_retur_penjualan', 'Kode Retur Penjualan', 'required');
			$this->form_validation->set_rules('kd_penjualan', 'Kode Penjualan', 'required');
			if ($this->form_validation->run()) {
				$cek_qty_array = $this->input->post('qty_retur');
				$cek_qty = 0;
				for ($i=0; $i < count($cek_qty_array); $i++) { 
					$cek_qty+= $cek_qty_array[$i];
				}
				if ($cek_qty >0) {
					$create['kd_retur_penjualan'] = $this->app_model->getMaxKodeReturPenjualan();
					$create['kd_penjualan'] = $kd_penjualan;
					$create['keterangan'] = 'Belum Ada';
					$create['kd_user'] = $this->input->post('kd_user');
					$create['tgl_retur_penjualan'] = strtotime(date('Y-m-d H:i:s'));

					$this->app_model->manualQuery("update tbl_penjualan set retur_status = 1 where kd_penjualan='".$create['kd_penjualan']."'");

					$result = $this->app_model->insertData('tbl_retur_penjualan', $create);
					$result2 = 0;

					$kd_barang = $this->input->post('kd_barang');
					$qty = $this->input->post('qty_retur');
					$keterangan = $this->input->post('keterangan');

					for ($i=0; $i < count($kd_barang); $i++) { 
						if ($qty[$i] > 0) {
							$create_detail['kd_retur_penjualan'] = $create['kd_retur_penjualan'];
							$create_detail['kd_barang'] = $kd_barang[$i];
							$create_detail['qty_retur'] = $qty[$i];
							$create_detail['keterangan'] = $keterangan[$i];

							$create_history['kd_barang'] = $create_detail['kd_barang'];
							$create_history['kd_transaksi'] = $create_detail['kd_retur_penjualan'];
							$create_history['qty_masuk'] = 0;
							$create_history['qty_keluar'] = $create_detail['qty_retur'];
							$create_history['qty_awal'] = $this->app_model->getSisaStok($create_detail['kd_barang']);
							$create_history['tgl_history'] = $create['tgl_retur_penjualan'];
							$create_history['type_history'] = 4;

							$result2 = $this->app_model->insertData("tbl_retur_penjualan_detail", $create_detail);
							$stok['stok'] = $this->app_model->getSisaStok($create_detail['kd_barang']) + $qty[$i];
							
							$create_history['qty_akhir'] = $stok['stok'];
							$this->app_model->insertData('tbl_history', $create_history);

							$key = $create_detail['kd_barang'];
							$this->app_model->updateStok($stok, $key);
						}
					}	

					if ($result && $result2) {
						$pesan = 'Retur Penjualan Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('retur_penjualan'));
					}else{
						$data['pesan'] = 'Retur Penjualan Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('retur_penjualan/create', $data);
						$this->load->view('elements/footer');
					}
				}else{
					redirect(base_url('retur_penjualan'));
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('retur_penjualan/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Pasti Jaya Motor | Detail Retur Penjualan';
		$detail['kd_retur_penjualan'] = $id;
		$data['kd_retur_penjualan'] = $detail['kd_retur_penjualan'];
		$data['data_retur_penjualan'] = $this->app_model->manualQuery("select a.*, b.tgl_penjualan, b.nama_pelanggan, d.kd_user, d.nama_user from tbl_retur_penjualan a left join tbl_penjualan b on a.kd_penjualan = b.kd_penjualan left join tbl_user d on a.kd_user = d.kd_user where a.kd_retur_penjualan='".$detail['kd_retur_penjualan']."'")->result();
		$data['data_retur_penjualan_detail'] = $this->app_model->manualQuery("select *, a.keterangan from tbl_retur_penjualan_detail a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_retur_penjualan='".$detail['kd_retur_penjualan']."'")->result();

		foreach ($data['data_retur_penjualan'] as $key => $value) {
			$data['kd_retur_penjualan'] = $value->kd_retur_penjualan;
			$data['kd_penjualan'] = $value->kd_penjualan;
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['tgl_retur_penjualan'] = $value->tgl_retur_penjualan;
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $value->nama_user;
			$data['tgl_penjualan'] = $value->tgl_penjualan;
		}

		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('retur_penjualan/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

}
