<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Pasti Jaya Motor | Penjualan';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("SELECT a.kd_penjualan, a.kd_order, a.nama_pelanggan, a.tgl_penjualan, a.alamat, a.kd_user, a.jenis, b.nama_user, c.kd_sales, d.nama_sales, (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=kd_penjualan) as jumlah from tbl_penjualan a left join tbl_user b on a.kd_user=b.kd_user left join tbl_order c on a.kd_order=c.kd_order left join tbl_sales d on c.kd_sales=d.kd_sales")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('penjualan/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | Create penjualan';
		$data['kd_penjualan'] = $this->app_model->getMaxKodePenjualan();
		$data['data_barang'] = $this->app_model->getAllData('tbl_barang')->result();
		$data['kd_user'] = $this->session->userdata('kd_user');
		$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$cek_qty_array = $this->input->post('qty');
				$cek_qty = 0;
				for ($i=0; $i < count($cek_qty_array); $i++) { 
					$cek_qty+= $cek_qty_array[$i];
				}
				if ($cek_qty >0) {
					$id_cek['kd_penjualan'] = $this->input->post('kd_penjualan');
					$cek_kd_penjualan = $data['data_penjualan'] = $this->app_model->getSelectedData("tbl_penjualan", $id_cek)->result();
					$kd_penjualan = '';
					if (count($cek_kd_penjualan > 0)) {
						$kd_penjualan = $this->app_model->getMaxKodePenjualan();
					}else{
						$kd_penjualan = $this->input->post('kd_penjualan');
					}
					$create['kd_penjualan'] = $kd_penjualan;
					$create['kd_order'] = "";
					$create['nama_pelanggan'] = $this->input->post('nama_pelanggan');
					$create['alamat'] = $this->input->post('alamat');
					$create['kd_user'] = $this->input->post('kd_user');
					$create['total_harga'] = $this->input->post('total');
					$create['tgl_penjualan'] = strtotime(date('Y-m-d H:i:s'));
					$create['jenis'] = 'Cash';
					$result = $this->app_model->insertData('tbl_penjualan', $create);
					$result2 = 0;

					$kd_barang = $this->input->post('kd_barang');
					$qty = $this->input->post('qty');
					$potongan = $this->input->post('potongan');
					$harga_potongan= $this->input->post('harga_potongan');
					$dus = $this->input->post('dus');

					for ($i=0; $i < count($kd_barang); $i++) { 
						if ($qty[$i] > 0) {
							$create_detail['kd_penjualan'] = $kd_penjualan;
							$create_detail['kd_barang'] = $kd_barang[$i];
							$create_detail['qty'] = $qty[$i];
							$create_detail['harga_tersimpan'] = $harga_potongan[$i];
							$create_detail['potongan'] = $potongan[$i];
							$create_detail['dus'] = $dus[$i];
							$result2 = $this->app_model->insertData("tbl_penjualan_detail", $create_detail);
							$stok['stok'] = $this->app_model->getBalancedStok($create_detail['kd_barang'], $create_detail['qty']);
							$key = $create_detail['kd_barang'];
							$this->app_model->updateStok($stok, $key);
						}
					}	

					if ($result && $result2) {
						$pesan = 'Penjualan Cash Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('penjualan'));
					}else{
						$data['pesan'] = 'Penjualan Cash Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('penjualan/confirm', $data);
						$this->load->view('elements/footer');
					}
				}else{
					redirect(base_url('penjualan'));
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('penjualan/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function get_detail_barang(){
		$id['kd_barang']=$this->input->post('kd_barang');
		$data=array(
			'detail_barang'=>$this->app_model->getSelectedData('tbl_barang',$id)->result(),
			'stok'=>$this->app_model->getSisaStok($id['kd_barang']),
			);
		$this->load->view('penjualan/ajax_detail_barang',$data);
	}

	function cetak($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Pasti Jaya Motor | Update penjualan';
		$detail['kd_penjualan'] = $id;
		$data['kd_penjualan'] = $detail['kd_penjualan'];
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['data_penjualan'] = $this->app_model->manualQuery("SELECT *, a.kd_penjualan, a.kd_order, a.nama_pelanggan, a.tgl_penjualan, a.alamat, a.kd_user, a.jenis, b.nama_user, (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=kd_penjualan) as jumlah from tbl_penjualan a left join tbl_user b on a.kd_user=b.kd_user")->result();
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select a.kd_penjualan, a.kd_barang, a.qty, a.potongan, a.dus, b.brand, c.kategori, c.type, a.harga_tersimpan from tbl_penjualan_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_penjualan='".$detail['kd_penjualan']."'")->result();

		foreach ($data['data_penjualan'] as $key => $value) {
			$data['kd_penjualan'] = $value->kd_penjualan;
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
		foreach ($data['data_penjualan_detail'] as $key => $value) {
			$data['total'] += $value->harga_tersimpan*$value->qty;
		}



		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('penjualan/print', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

}
