<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 2 && $this->session->userdata('level') != 4) {
			redirect('dashboard');
		}
	}

	function index(){
		$dt['title']='Pasti Jaya Motor | Penjualan';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$this->load->view('elements/header', $dt);
			$this->load->view('penjualan/index');
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function getPenjualan(){
		$arrayPenjualan['data'] = $this->app_model->manualQuery("SELECT a.kd_penjualan, a.kd_order, a.nama_pelanggan, a.tgl_penjualan, a.alamat, a.kd_user, a.jenis, b.nama_user, c.kd_sales, d.nama_sales, (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan) as jumlah, (select sum(harga_tersimpan * qty)as ttl from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan) as total_harga from tbl_penjualan a left join tbl_user b on a.kd_user=b.kd_user left join tbl_order c on a.kd_order=c.kd_order left join tbl_sales d on c.kd_sales=d.kd_sales")->result_array();
		foreach($arrayPenjualan['data'] as $i => $data) {
			$data['action'] = "                                                <div class=\"btn-group\">
			<a class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
			Action
			<span class=\"caret\"></span>
			</a>
			<ul class=\"dropdown-menu\">
			<li>
			<a href=\"".base_url('penjualan/cetak/'.$data['kd_penjualan'])."\">Cetak</a>
			</li>
			<li>
			<a href=\"".base_url('penjualan/update/'.$data['kd_penjualan'])."\">Update</a>
			</li>
			</ul>
			</div>";

			$arrayPenjualan['data'][$i] = $data;
			$arrayPenjualan['tgl_penjualan'] = date('Y-m-d H:i:s', $data['tgl_penjualan']);
			$arrayPenjualan['total_harga'] = number_format($data['total_harga'], 2, ",", ".");
		}
		echo json_encode($arrayPenjualan);
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | Create penjualan';
		$data['kd_penjualan'] = $this->app_model->getMaxKodePenjualan();
		$data['data_barang'] = $this->app_model->manualQuery('select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
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
					$create['kd_user'] = $this->session->userdata('kd_user');
					$create['total_harga'] = $this->input->post('total');
					$create['tgl_penjualan'] = strtotime(date('Y-m-d H:i:s'));
					$create['tgl_pengiriman'] = strtotime($this->input->post('tgl_pengiriman'));
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

							$create_history['kd_transaksi'] = $create_detail['kd_penjualan'];
							$create_history['kd_barang'] = $create_detail['kd_barang'];
							$create_history['qty_masuk'] = 0;
							$create_history['qty_keluar'] = $create_detail['qty'];
							$create_history['qty_awal'] = $this->app_model->getSisaStok($create_detail['kd_barang']);
							$create_history['tgl_history'] = $create['tgl_penjualan'];
							$create_history['type_history'] = 2;
							$create_history['kd_user'] = $this->session->userdata('kd_user');

							$result2 = $this->app_model->insertData("tbl_penjualan_detail", $create_detail);
							$stok['stok'] = $this->app_model->getBalancedStok($create_detail['kd_barang'], $create_detail['qty']);

							$create_history['qty_akhir'] = $stok['stok'];
							$this->app_model->insertData('tbl_history', $create_history);

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
						$this->load->view('penjualan/create', $data);
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
	function update($id){
		$dt['title']='Pasti Jaya Motor | Update penjualan';
		$update['kd_penjualan'] = $id;
		$data['kd_penjualan'] = $update['kd_penjualan'];
		$data['data_barang'] = $this->app_model->manualQuery('select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
		$data['data_penjualan'] = $this->app_model->getSelectedData("tbl_penjualan", $update)->result();
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select c.type, c.kategori, b.brand, b.kd_barang, b.stok, a.qty, a.harga_tersimpan, a.potongan, a.dus from tbl_penjualan_detail a left join tbl_barang b on a.kd_barang = b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_penjualan='".$update['kd_penjualan']."'")->result();

		$data['total'] = $this->app_model->manualQuery("select sum(qty * (harga_tersimpan - (harga_tersimpan * potongan))) as total from tbl_penjualan_detail where kd_penjualan = '".$id."'")->row()->total;
		foreach ($data['data_penjualan'] as $key => $value) {
			$data['kd_penjualan'] = $value->kd_penjualan;
			$data['kd_user'] = $this->session->userdata('kd_user');
			$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['alamat'] = $value->alamat;
			$data['tgl_pengiriman'] = gmdate('Y-m-d', $value->tgl_pengiriman);
		}

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
					$id_update['kd_penjualan'] = $update['kd_penjualan'];
					$update['nama_pelanggan'] = $this->input->post('nama_pelanggan');
					$update['alamat'] = $this->input->post('alamat');
					$update['kd_user'] = $this->session->userdata('kd_user');
					$update['total_harga'] = $this->input->post('total');
					$update['tgl_pengiriman'] = strtotime($this->input->post('tgl_pengiriman'));
					$result = $this->app_model->updateData('tbl_penjualan', $update, $id_update);
					$result2 = 0;

					$kd_barang = $this->input->post('kd_barang');
					$qty = $this->input->post('qty');
					$potongan = $this->input->post('potongan');
					$harga_potongan= $this->input->post('harga_potongan');
					$dus = $this->input->post('dus');

					//delete previous penjualan, return the stock
					$this->app_model->deleteData('tbl_penjualan_detail', $id_update);
					$id_update_history['kd_transaksi'] = $update['kd_penjualan'];
					$this->app_model->deleteData('tbl_history', $id_update_history);

					foreach ($data['data_penjualan_detail'] as $key => $value) {
						$now_stok['stok'] = $value->stok + $value->qty;
						$id_update_barang['kd_barang'] = $value->kd_barang;
						$this->app_model->updateData('tbl_barang', $now_stok, $id_update_barang);
					}

					for ($i=0; $i < count($kd_barang); $i++) { 
						if ($qty[$i] > 0) {

							$update_detail['kd_penjualan'] = $id_update['kd_penjualan'];
							$update_detail['kd_barang'] = $kd_barang[$i];
							$update_detail['qty'] = $qty[$i];
							$update_detail['harga_tersimpan'] = $harga_potongan[$i];
							$update_detail['potongan'] = $potongan[$i];
							$update_detail['dus'] = $dus[$i];

							$update_history['kd_transaksi'] = $id_update_history['kd_transaksi'];
							$update_history['kd_barang'] = $update_detail['kd_barang'];
							$update_history['qty_masuk'] = 0;
							$update_history['qty_keluar'] = $update_detail['qty'];
							$update_history['qty_awal'] = $this->app_model->getSisaStok($update_detail['kd_barang']);
							$update_history['type_history'] = 2;
							$update_history['kd_user'] = $this->session->userdata('kd_user');

							$result2 = $this->app_model->insertData("tbl_penjualan_detail", $update_detail);
							$stok['stok'] = $this->app_model->getBalancedStok($update_detail['kd_barang'], $update_detail['qty']);

							$update_history['qty_akhir'] = $stok['stok'];
							$this->app_model->insertData('tbl_history', $update_history);

							$key = $update_detail['kd_barang'];
							$this->app_model->updateStok($stok, $key);
						}
					}
					if ($result && $result2) {
						$pesan = 'Update Penjualan Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('penjualan'));
					}else{
						$data['pesan'] = 'Update Penjualan Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('penjualan/update', $data);
						$this->load->view('elements/footer');
					}		
				}else{
					redirect(base_url('penjualan'));
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('penjualan/update', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}


	function get_detail_barang(){
		$id['kd_barang']=$this->input->post('kd_barang');
		$data=array(
			'detail_barang'=>$this->app_model->manualQuery("select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where kd_barang = '".$id['kd_barang']."'")->result(),
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
		$data['data_penjualan'] = $this->app_model->manualQuery("SELECT *, a.kd_penjualan, a.kd_order, a.nama_pelanggan, a.tgl_penjualan, a.alamat, a.kd_user, a.jenis, b.nama_user, (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=kd_penjualan) as jumlah from tbl_penjualan a left join tbl_user b on a.kd_user=b.kd_user where a.kd_penjualan = '".$id."'")->result();
		/*
		per barang
		*/
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select a.kd_penjualan, a.kd_barang, a.qty, sum(a.qty) as total_qty, a.potongan, a.dus, b.brand, c.kategori, c.type, max(a.harga_tersimpan) as harga_tersimpan, max(a.harga_tersimpan) as harga_satuan from tbl_penjualan_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_penjualan='".$detail['kd_penjualan']."' group by b.id_tipe_kategori")->result();
/*
	per tipe kategori
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select a.kd_penjualan, a.qty, sum(a.qty) as total_qty, a.potongan, a.dus, b.brand, c.kategori, c.type, a.harga_tersimpan, max(a.harga_tersimpan) as harga_satuan, sum(a.harga_tersimpan) as harga from tbl_penjualan_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang left join tbl_tipe_kategori c on b.id_tipe_kategori = c.id_tipe_kategori where a.kd_penjualan='".$detail['kd_penjualan']."' group by b.id_tipe_kategori")->result();

*/

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
	$data['total'] += $value->harga_tersimpan*$value->total_qty;
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
