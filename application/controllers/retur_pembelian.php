<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_pembelian extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 2 && $this->session->userdata('level') != 3) {
    	redirect('dashboard');
    }
  }
	function index(){
		$dt['title']='Pasti Jaya Motor | Retur Pembelian';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("select a.*, b.tgl_pembelian, c.nama_supplier, d.nama_user from tbl_retur_pembelian a left join tbl_pembelian b on a.kd_pembelian = b.kd_pembelian left join tbl_supplier c on b.kd_supplier = c.kd_supplier left join tbl_user d on a.kd_user = d.kd_user")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('retur_pembelian/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function list_pembelian(){
		$dt['title']='Pasti Jaya Motor | Retur Pembelian';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("SELECT a.kd_pembelian, a.kd_supplier, a.tgl_pembelian, a.kd_user, b.nama_supplier, c.nama_user from tbl_pembelian a left join tbl_supplier b on a.kd_supplier = b.kd_supplier left join tbl_user c on a.kd_user = c.kd_user where a.retur_status = 0")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('retur_pembelian/list_pembelian', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create($id){
		$dt['title']='Pasti Jaya Motor | Create pembelian';
		$kd_pembelian = $id;
		$data['kd_retur_pembelian'] = $this->app_model->getMaxKodeReturPembelian();
		$data['data_pembelian'] = $this->app_model->manualQuery("SELECT a.kd_pembelian, a.kd_supplier, a.tgl_pembelian, b.nama_supplier from tbl_pembelian a left join tbl_supplier b on a.kd_supplier = b.kd_supplier where a.kd_pembelian='".$kd_pembelian."'")->result();
		$data['data_pembelian_detail'] = $this->app_model->manualQuery("select * from tbl_pembelian_detail a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_pembelian='".$kd_pembelian."'")->result();
		$data['kd_user'] = $this->session->userdata('kd_user');
		$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));

		foreach ($data['data_pembelian'] as $key => $value) {
			$data['kd_pembelian'] = $value->kd_pembelian;
			$data['kd_supplier'] = $value->kd_supplier;
			$data['nama_supplier'] = $value->nama_supplier;
			$data['tgl_pembelian'] = $value->tgl_pembelian;
		}
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_retur_pembelian', 'Kode Retur Pembelian', 'required');
			$this->form_validation->set_rules('kd_pembelian', 'Kode Pembelian', 'required');
			if ($this->form_validation->run()) {
				$cek_qty_array = $this->input->post('qty_retur');
				$cek_qty = 0;
				for ($i=0; $i < count($cek_qty_array); $i++) { 
					$cek_qty+= $cek_qty_array[$i];
				}
				if ($cek_qty >0) {
					$create['kd_retur_pembelian'] = $this->app_model->getMaxKodeReturPembelian();
					$create['kd_pembelian'] = $kd_pembelian;
					$create['keterangan'] = 'Belum Ada';
					$create['kd_user'] = $this->input->post('kd_user');
					$create['tgl_retur_pembelian'] = strtotime(date('Y-m-d H:i:s'));

					$this->app_model->manualQuery("update tbl_pembelian set retur_status = 1 where kd_pembelian='".$create['kd_pembelian']."'");

					$result = $this->app_model->insertData('tbl_retur_pembelian', $create);
					$result2 = 0;

					$kd_barang = $this->input->post('kd_barang');
					$qty = $this->input->post('qty_retur');
					$keterangan = $this->input->post('keterangan');

					for ($i=0; $i < count($kd_barang); $i++) { 
						if ($qty[$i] > 0) {
							$create_detail['kd_retur_pembelian'] = $create['kd_retur_pembelian'];
							$create_detail['kd_barang'] = $kd_barang[$i];
							$create_detail['qty_retur'] = $qty[$i];
							$create_detail['keterangan'] = $keterangan[$i];

							$create_history['kd_barang'] = $create_detail['kd_barang'];
							$create_history['kd_transaksi'] = $create_detail['kd_retur_pembelian'];
							$create_history['qty_masuk'] = 0;
							$create_history['qty_keluar'] = $create_detail['qty_retur'];
							$create_history['qty_awal'] = $this->app_model->getSisaStok($create_detail['kd_barang']);
							$create_history['tgl_history'] = $create['tgl_retur_pembelian'];
							$create_history['type_history'] = 3;
							$create_history['kd_user'] = $this->session->userdata('kd_user');

							$result2 = $this->app_model->insertData("tbl_retur_pembelian_detail", $create_detail);
							$stok['stok'] = $this->app_model->getBalancedStok($create_detail['kd_barang'], $create_detail['qty_retur']);

							$create_history['qty_akhir'] = $stok['stok'];
							$this->app_model->insertData('tbl_history', $create_history);

							$key = $create_detail['kd_barang'];
							$this->app_model->updateStok($stok, $key);

						}
					}	

					if ($result && $result2) {
						$pesan = 'Retur Pembelian Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('retur_pembelian'));
					}else{
						$data['pesan'] = 'Retur Pembelian Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('retur_pembelian/create', $data);
						$this->load->view('elements/footer');
					}
				}else{
					redirect(base_url('retur_pembelian'));
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('retur_pembelian/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Pasti Jaya Motor | Detail Retur Pembelian';
		$detail['kd_retur_pembelian'] = $id;
		$data['kd_retur_pembelian'] = $detail['kd_retur_pembelian'];
		$data['data_retur_pembelian'] = $this->app_model->manualQuery("select a.*, b.tgl_pembelian, c.nama_supplier, d.kd_user, d.nama_user from tbl_retur_pembelian a left join tbl_pembelian b on a.kd_pembelian = b.kd_pembelian left join tbl_supplier c on b.kd_supplier = c.kd_supplier left join tbl_user d on a.kd_user = d.kd_user where a.kd_retur_pembelian='".$detail['kd_retur_pembelian']."'")->result();
		$data['data_retur_pembelian_detail'] = $this->app_model->manualQuery("select *, a.keterangan from tbl_retur_pembelian_detail a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_retur_pembelian='".$detail['kd_retur_pembelian']."'")->result();

		foreach ($data['data_retur_pembelian'] as $key => $value) {
			$data['kd_retur_pembelian'] = $value->kd_retur_pembelian;
			$data['kd_pembelian'] = $value->kd_pembelian;
			$data['nama_supplier'] = $value->nama_supplier;
			$data['tgl_retur_pembelian'] = $value->tgl_retur_pembelian;
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $value->nama_user;
			$data['tgl_pembelian'] = $value->tgl_pembelian;
		}

		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('retur_pembelian/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

}
