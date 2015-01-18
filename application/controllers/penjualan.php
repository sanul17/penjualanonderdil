<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | Penjualan';
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
		$dt['title']='Toko Onderdil | Create penjualan';
		$data['kd_penjualan'] = $this->app_model->getMaxKodePenjualan();
		$data['data_barang'] = $this->app_model->getAllData('tbl_barang')->result();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				

				/*UNDER CONSTRUCTION */


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


	function detail($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Toko Onderdil | Update penjualan';
		$detail['kd_penjualan'] = $id;
		$data['kd_penjualan'] = $detail['kd_penjualan'];
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['data_penjualan'] = $this->app_model->getSelectedData("tbl_penjualan", $detail)->result();
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select a.kd_penjualan, a.kd_barang, a.qty, b.nama_barang, b.harga from tbl_penjualan_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_penjualan='".$detail['kd_penjualan']."'");

		foreach ($data['data_penjualan'] as $key => $value) {
			$data['kd_penjualan'] = $value->kd_penjualan;
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $this->app_model->getNamaSales($value->kd_user);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['tgl_penjualan'] = $value->tgl_penjualan;
		}

				

				/*UNDER CONSTRUCTION */


	
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('penjualan/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function cetak($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Toko Onderdil | Update penjualan';
		$detail['kd_penjualan'] = $id;
		$data['kd_penjualan'] = $detail['kd_penjualan'];
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['data_penjualan'] = $this->app_model->manualQuery("select * from tbl_penjualan a left join tbl_order b on a.kd_order=b.kd_order left join tbl_user c on a.kd_user=c.kd_user where a.kd_penjualan='".$detail['kd_penjualan']."'")->result();
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select a.kd_penjualan, a.kd_barang, a.qty, a.potongan, a.dus, b.nama_barang, a.harga_tersimpan from tbl_penjualan_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_penjualan='".$detail['kd_penjualan']."'");

		foreach ($data['data_penjualan'] as $key => $value) {
			$data['kd_penjualan'] = $value->kd_penjualan;
			$data['kd_order'] = $value->kd_order;
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['alamat'] = $value->alamat;
			$data['kd_user'] = $value->kd_user;
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_user'] = $value->nama_user;
			$data['nama_sales'] = $this->app_model->getNamaSales($value->kd_sales);
			$data['total_harga'] = $value->total_harga;
			$data['tgl_penjualan'] =  $value->tgl_penjualan;
			$data['jenis'] =  $value->jenis;
		}

						

				/*UNDER CONSTRUCTION */


	
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('penjualan/print', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

}
