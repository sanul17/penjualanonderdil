<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {

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
		$dt['title']='Pasti Jaya Motor | Home';
		$cek = $this->session->userdata('logged_in');

		/*
		$data['data'] = $this->app_model->manualQuery('SELECT tgl_history AS tgl_history, SUM(qty_masuk) as qty_masuk, SUM(qty_keluar) as qty_keluar FROM tbl_history GROUP BY DATE(FROM_UNIXTIME(tgl_history))ORDER BY tgl_history desc')->result();
				*/if (!empty($cek)) {
		$this->load->view('elements/header', $dt);
		$this->load->view('history/index');
		$this->load->view('elements/footer');
	}else{
		redirect(base_url('login'));
	}
}


function getHistory(){
	$arrayHistory['data'] = $this->app_model->manualQuery('SELECT c.tgl_history, c.kd_barang, c.type_history, (select nama_user from tbl_user where kd_user = c.kd_user) as nama_user, (select CONCAT(b.kategori, " ", b.type, " ", a.brand) from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where a.kd_barang = c.kd_barang) as nama_barang, SUM(c.qty_masuk) as qty_masuk, SUM(c.qty_keluar) as qty_keluar FROM tbl_history c GROUP BY DATE(FROM_UNIXTIME(c.tgl_history)), kd_barang ORDER BY c.tgl_history desc')->result_array();
	foreach($arrayHistory['data'] as $i => $data) {

		switch ($data['type_history']) {
			case 1:
			$data['type_history'] = 'Pembelian';
			break;

			case 2:
			$data['type_history'] = 'Penjualan';
			break;

			case 3:
			$data['type_history'] = 'Return Pembelian';
			break;

			case 4:
			$data['type_history'] = 'Return Penjualan';
			break;

			case 5:
			$data['type_history'] = 'Add Stock';
			break;

			case 6:
			$data['type_history'] = 'Update Barang';
			break;

			default:
			$data['type_history'] = ' - ' ;
			break;
		}
		$data['tgl_history'] = date('Y-m-d H:i:s', $data['tgl_history']);
		$arrayHistory['data'][$i] = $data;
	}
		header('Content-Type: application/json');
	echo json_encode($arrayHistory);
}
}