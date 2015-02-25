<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Pasti Jaya Motor | Home';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('dashboard/index');
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}
	function barangNotification(){
		$jml_notif = count($this->app_model->manualQuery('select * from tbl_barang where stok <= min_stok')->result());
		if ($jml_notif != 0) {
			echo "<small class='badge pull-right bg-red'>".$jml_notif."</small>";
		}
	}
	function orderNotification(){
		$jml_notif = count($this->app_model->manualQuery('select * from tbl_order where status = "Pending"')->result());
		if ($jml_notif != 0) {
			echo "<small class='badge pull-right bg-red'>".$jml_notif."</small>";
		}
	}

	function notification(){
		$jml_notif = count($this->app_model->manualQuery('select * from tbl_barang where stok <= min_stok')->result());
		$jml_notif2 = count($this->app_model->manualQuery('select * from tbl_order where status = "Pending"')->result());
		$jml_notif += $jml_notif2;
		if ($jml_notif != 0) {
			echo $jml_notif;
		}
	}
}