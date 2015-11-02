<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1) {
    	redirect('dashboard');
    }
  }
	function index(){
		$dt['title']='Pasti Jaya Motor | Home';
		$cek = $this->session->userdata('logged_in');

		$data['data'] = $this->app_model->getAllData('tbl_sales')->result();

		if (!empty($cek)) {
			if ($this->session->userdata['level'] != 'sales') {
			$this->load->view('elements/header', $dt);
			$this->load->view('tagihan/index', $data);
			$this->load->view('elements/footer');
			}else{
				redirect(base_url('tagihan/list_tagihan_bulan/'.$this->session->userdata['kd_sales']));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function list_tagihan_bulan($id){
		$dt['title']='Pasti Jaya Motor | Tagihan';
		$cek = $this->session->userdata('logged_in');

		$data['data'] = $this->app_model->manualQuery("select MONTH(FROM_UNIXTIME(a.tgl_penjualan)) as kd_bulan, YEAR(FROM_UNIXTIME(a.tgl_penjualan)) as kd_tahun, DATE_FORMAT(FROM_UNIXTIME(a.tgl_penjualan), '%M %Y') as bulan, sum(b.harga_tersimpan * b.qty) as total_tagihan, (select sum(jml_pembayaran_tagihan) as ttl_p_tgh from tbl_tagihan where kd_penjualan = a.kd_penjualan) as total_pembayaran_tagihan, (select sum(x.qty_retur * (select harga_tersimpan from tbl_penjualan_detail where kd_penjualan = a.kd_penjualan AND kd_barang = x.kd_barang)) as ttl_r_tgh from tbl_retur_penjualan_detail x left join tbl_retur_penjualan y on x.kd_retur_penjualan = y.kd_retur_penjualan where y.kd_penjualan = a.kd_penjualan) as total_retur from tbl_penjualan a left join tbl_penjualan_detail b on a.kd_penjualan = b.kd_penjualan left join tbl_order c on a.kd_order = c.kd_order where c.kd_sales ='".$id."' GROUP BY MONTH(FROM_UNIXTIME(a.tgl_penjualan)), YEAR(FROM_UNIXTIME(a.tgl_penjualan))")->result();

		$data_sales = $this->app_model->manualQuery("select kd_sales, nama_sales from tbl_sales where kd_sales ='".$id."'")->result();
		foreach ($data_sales as $key => $value) {
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $value->nama_sales;
		}

		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('tagihan/list_tagihan_bulan', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function bayar_tagihan($id){
		$dt['title']='Pasti Jaya Motor | Tagihan';
		$cek = $this->session->userdata('logged_in');

			$data['data'] = $this->app_model->manualQuery("SELECT a.kd_penjualan, a.kd_order, a.nama_pelanggan, a.tgl_penjualan, a.alamat, a.kd_user, a.jenis, b.nama_user, c.kd_sales, d.nama_sales, (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan) as jumlah, (select sum(harga_tersimpan * qty)as ttl from tbl_penjualan_detail where kd_penjualan=a.kd_penjualan) as total_harga from tbl_penjualan a left join tbl_user b on a.kd_user=b.kd_user left join tbl_order c on a.kd_order=c.kd_order left join tbl_sales d on c.kd_sales=d.kd_sales where DATE_FORMAT(FROM_UNIXTIME(a.tgl_penjualan), '%M_%Y') = '".$id."'")->result();

		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('tagihan/bayar_tagihan', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}
}