<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | Orderan';
		$cek = $this->session->userdata('logged_in');
		$this->cart->destroy();
		$this->session->unset_userdata('limit_add_cart');
		$this->session->unset_userdata('nama_pelanggan');
		if (!empty($cek)) {	
			$this_sales = $this->session->userdata('kd_sales');
			if ($this->session->userdata('level') == 'sales') {
				$data['data'] = $this->app_model->manualQuery("SELECT a.kd_order, a.kd_sales, a.nama_pelanggan, b.nama_sales, a.tgl_order, a.status, (select count(kd_order) as jum from tbl_order_detail where kd_order=kd_order) as jumlah from tbl_order a left join tbl_sales b on a.kd_sales=b.kd_sales where status='Pending' && a.kd_sales = '".$this_sales."'")->result();
			}else{
				$data['data'] = $this->app_model->manualQuery("SELECT a.kd_order, a.kd_sales, a.nama_pelanggan, b.nama_sales, a.tgl_order, a.status, (select count(kd_order) as jum from tbl_order_detail where kd_order=kd_order) as jumlah from tbl_order a left join tbl_sales b on a.kd_sales=b.kd_sales where status='Pending'")->result();
			}
			$this->load->view('elements/header', $dt);
			$this->load->view('orderan/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Toko Onderdil | Create orderan';
		$data['kd_order'] = $this->app_model->getMaxKodeOrder();
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['nama_sales'] = $this->app_model->getNamaSales($this->session->userdata('kd_sales'));
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$create['kd_order'] = $this->input->post('kd_order');
				$create['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$create['kd_sales'] = $this->input->post('kd_sales');
				$create['tgl_order'] = strtotime(date('Y-m-d H:i:s'));
				$create['status'] = 'Pending';
				$result = $this->app_model->insertData('tbl_order', $create);

				foreach($this->cart->contents() as $items)
				{
					$create_detail['kd_order'] = $this->input->post('kd_order');
					$create_detail['kd_barang'] = $items['id'];
					$create_detail['qty'] = $items['qty'];
					$result2 = $this->app_model->insertData("tbl_order_detail",$create_detail);
				}

				$this->session->unset_userdata('nama_pelanggan');
				$this->session->unset_userdata('limit_add_cart');
				$this->cart->destroy();

				if ($result && $result2) {
					$pesan = 'Create Orderan Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('Orderan'));
				}else{
					$data['pesan'] = 'Create Orderan Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('orderan/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('orderan/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function set_session_pemesan(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
			$sess_data['kd_sales'] = $_POST["kd_sales"];
			$sess_data['nama_pelanggan'] = $_POST["nama_pelanggan"];
			$this->session->set_userdata($sess_data);
		}else{
			redirect(base_url('login'));
		}
	}

	//    INSERT DATA
	function add_to_cart(){
		$data = array(
			'id'    => $this->input->post('kd_barang'),
			'qty'   => $this->input->post('qty'),
			'price' => $this->input->post('harga'),
			'name'  => $this->input->post('nama_barang'),
			);
		$this->cart->insert($data);
		$create_or_update = $this->input->post('create_or_update');
		if ($create_or_update == 'create') {
			redirect(base_url('orderan/create'));
		}elseif ($create_or_update == 'update') {
			$kd_order = $this->input->post('kd_order');
			redirect(base_url('orderan/update/'.$kd_order));
		}else{
			redirect(base_url('orderan/index'));
		}
	}
//    DELETE
	function remove_from_cart(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
			$kode = explode("/",$_GET['kode']);
			if($kode[0]=="create")
			{
				$data = array(
					'rowid' => $kode[1],
					'qty'   => 0);
				$this->cart->update($data);
			}
			else if($kode[0]=="update")
			{
				$data = array(
					'rowid' => $kode[1],
					'qty'   => 0);
				$this->cart->update($data);
				/* LANGSUNG UPDATE ORDER DETAIL
				$hps['kd_order'] = $kode[2];
				$hps['kd_barang'] = $kode[3];
				$this->app_model->deleteData("tbl_order_detail",$hps);
				*/
			}
		}else{
			redirect(base_url('login'));
		}
	}


	function get_detail_barang(){
		$id['kd_barang']=$this->input->post('kd_barang');
		$data=array(
			'detail_barang'=>$this->app_model->getSelectedData('tbl_barang',$id)->result(),
			);
		$this->load->view('orderan/ajax_detail_barang',$data);
	}


	function detail($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Toko Onderdil | Update orderan';
		$detail['kd_order'] = $id;
		$data['kd_order'] = $detail['kd_order'];
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['data_order'] = $this->app_model->getSelectedData("tbl_order", $detail)->result();
		$data['data_order_detail'] = $this->app_model->manualQuery("select a.kd_order, a.kd_barang, a.qty, b.nama_barang, b.harga from tbl_order_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_order='".$detail['kd_order']."'");

		foreach ($data['data_order'] as $key => $value) {
			$data['kd_order'] = $value->kd_order;
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $this->app_model->getNamaSales($value->kd_sales);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['tgl_order'] = $value->tgl_order;
		}

		if($this->session->userdata("limit_add_cart")==""){
			$in_cart = array();
			foreach($data['data_order_detail']->result() as $dpd)
			{
				$in_cart[] = array(
					'id'      => $dpd->kd_barang,
					'qty'     => $dpd->qty,
					'price'   => $dpd->harga,
					'name'    => $dpd->nama_barang
					);
			}
			$this->cart->insert($in_cart);
		}
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('orderan/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Toko Onderdil | Update orderan';
		$update['kd_order'] = $id;
		$data['kd_order'] = $update['kd_order'];
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['data_order'] = $this->app_model->getSelectedData("tbl_order", $update);
		foreach($data['data_order']->result() as $dph)
		{
			$sess_data['nama_pelanggan'] = $dph->nama_pelanggan;
			$data['nama_sales'] = $this->app_model->getNamaSales($dph->kd_sales);
			$this->session->set_userdata($sess_data);
		}

		$data['data_order_detail'] = $this->app_model->manualQuery("select a.kd_order, a.kd_barang, a.qty, b.nama_barang, b.harga from tbl_order_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_order='".$update['kd_order']."'");


		if($this->session->userdata("limit_add_cart")==""){
			$in_cart = array();
			foreach($data['data_order_detail']->result() as $dpd)
			{
				$in_cart[] = array(
					'id'      => $dpd->kd_barang,
					'qty'     => $dpd->qty,
					'price'   => $dpd->harga,
					'name'    => $dpd->nama_barang
					);
			}
			$this->cart->insert($in_cart);
			$sess_data['limit_add_cart'] = "update";
			$this->session->set_userdata($sess_data);
		}
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$id_update['kd_order'] = $this->input->post('kd_order');
				$update['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$update['kd_sales'] = $this->input->post('kd_sales');
				$result = $this->app_model->updateData('tbl_order', $update, $id_update);

				$this->app_model->deleteData("tbl_order_detail", $id_update);

				foreach($this->cart->contents() as $items)
				{
					$update_detail['kd_order'] = $this->input->post('kd_order');
					$update_detail['kd_barang'] = $items['id'];
					$update_detail['qty'] = $items['qty'];
					$result2 = $this->app_model->insertData("tbl_order_detail",$update_detail);
				}

				$this->session->unset_userdata('nama_pelanggan');
				$this->session->unset_userdata('limit_add_cart');
				$this->cart->destroy();

				if ($result && $result2) {
					$pesan = 'Update Orderan Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('orderan'));
				}else{
					$data['pesan'] = 'Update Orderan Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('orderan/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('orderan/update', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function addStok($id){
		$dt['title']='Toko Onderdil | Tambah orderan';
		$update['kd_order'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_order', $update)->result();
		foreach ($result as $key => $value) {
			$data['kd_order'] = $value->kd_order;
			$data['nama_orderan'] = $value->nama_orderan; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_order', 'kd_order', 'required');
			$this->form_validation->set_rules('nama_orderan', 'Nama orderan', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('qty', 'Quantity', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_order'] = $id;
					$update['nama_orderan'] = $this->input->post('nama_orderan');
					$update['min_stok'] = $this->input->post('min_stok'); 
					$stok = $this->input->post('stok');
					$update['stok'] = $stok+$this->input->post('qty');
					if ($this->app_model->updateData('tbl_order', $update, $id_update)) {
						$pesan = 'Tambah Stok orderan Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('orderan'));
					}else{
						$data['pesan'] = 'Tambah Stok orderan Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('orderan/add', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('orderan/add', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('orderan'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Toko Onderdil | orderan';
		$delete['kd_order'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
			//kembalikan kuantitas barang
				$q = $this->app_model->getSelectedData("tbl_order_detail", $delete);
				$result1 = $this->app_model->deleteData("tbl_order",$delete);
				$result2 = $this->app_model->deleteData("tbl_order_detail",$delete);
				$pesan=($result1 && $result2 ? 'Delete orderan Sukses' : 'Delete orderan Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('orderan'));
			}else{
				redirect(base_url('orderan'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

	function confirm($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Toko Onderdil | Update orderan';
		$detail['kd_order'] = $id;
		$data['kd_order'] = $detail['kd_order'];
		$data['kd_penjualan'] = $this->app_model->getMaxKodePenjualan();
		$data['data_order'] = $this->app_model->getSelectedData("tbl_order", $detail)->result();
		$data['data_order_detail'] = $this->app_model->manualQuery("select a.kd_order, a.kd_barang, a.qty, b.nama_barang, b.harga, b.stok from tbl_order_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_order='".$detail['kd_order']."'");

		foreach ($data['data_order'] as $key => $value) {
			$data['kd_order'] = $value->kd_order;
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $this->app_model->getNamaSales($value->kd_sales);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['tgl_order'] = $value->tgl_order;
		}

		if($this->session->userdata("limit_add_cart")==""){
			$in_cart = array();
			foreach($data['data_order_detail']->result() as $dpd)
			{
				$in_cart[] = array(
					'id'      => $dpd->kd_barang,
					'qty'     => $dpd->qty,
					'price'   => $dpd->harga,
					'name'    => $dpd->nama_barang,
					'options'    => array('qty_stok' => $dpd->stok)
					);
			}
			$this->cart->insert($in_cart);
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$confirm['kd_penjualan'] = $this->input->post('kd_penjualan');
				$confirm['kd_order'] = $this->input->post('kd_order');
				$confirm['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$confirm['kd_user'] = $this->input->post('kd_user');
				$confirm['total_harga'] = $this->input->post('total');
				$confirm['tgl_penjualan'] = strtotime(date('Y-m-d H:i:s'));
				$confirm['jenis'] = 'Order';
				$status['status'] = 'Confirm';
				$result = $this->app_model->insertData('tbl_penjualan', $confirm);
				$result2 = $this->app_model->updateData('tbl_order', $status, $detail);
				$result3 = 0;


				$qty_dikirim = $this->input->post('qty_dikirim');
				$harga = $this->input->post('harga');
				$potongan = $this->input->post('potongan');
				$dus = $this->input->post('dus');


				$i = 0;
				foreach($this->cart->contents() as $items)
				{
					$confirm_detail['kd_penjualan'] = $this->input->post('kd_penjualan');
					$confirm_detail['kd_barang'] = $items['id'];
					$confirm_detail['qty'] = $qty_dikirim[$i];
					$confirm_detail['harga_tersimpan'] = $harga[$i];
					$confirm_detail['potongan'] = $potongan[$i];
					$confirm_detail['dus'] = $dus[$i];
					$result3 = $this->app_model->insertData("tbl_penjualan_detail", $confirm_detail);
					$stok['stok'] = $this->app_model->getBalancedStok($confirm_detail['kd_barang'], $confirm_detail['qty']);
					$key = $items['id'];
					$this->app_model->updateStok($stok, $key); 
					$i++;
				}

				$this->session->unset_userdata('nama_pelanggan');
				$this->session->unset_userdata('limit_add_cart');
				$this->cart->destroy();

				if ($result && $result2 && $result3) {
					$pesan = 'confirm Orderan Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('orderan'));
				}else{
					$data['pesan'] = 'confirm Orderan Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('orderan/confirm', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('orderan/confirm', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}


}
