<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | Penjualan';
		$cek = $this->session->userdata('logged_in');
		$this->cart->destroy();
		$this->session->unset_userdata('limit_add_cart');
		$this->session->unset_userdata('nama_pelanggan');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
				$data['data'] = $this->app_model->manualQuery("SELECT a.kd_penjualan, a.kd_order, a.nama_pelanggan, a.tgl_penjualan, a.total_harga, a.kd_user, a.jenis, b.nama_user, (select count(kd_penjualan) as jum from tbl_penjualan_detail where kd_penjualan=kd_penjualan) as jumlah from tbl_penjualan a left join tbl_user b on a.kd_user=b.kd_user")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('penjualan/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Toko Onderdil | Create penjualan';
		$data['kd_penjualan'] = $this->app_model->getMaxKodeOrder();
		$data['data_barang'] = $this->app_model->getBarangJual()->result();
		$data['nama_user'] = $this->app_model->getNamaSales($this->session->userdata('kd_user'));
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$create['kd_penjualan'] = $this->input->post('kd_penjualan');
				$create['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$create['kd_user'] = $this->input->post('kd_user');
				$create['tgl_penjualan'] = strtotime(date('Y-m-d H:i:s'));
				$create['status'] = 'Pending';
				$result = $this->app_model->insertData('tbl_penjualan', $create);

				foreach($this->cart->contents() as $items)
				{
					$create_detail['kd_penjualan'] = $this->input->post('kd_penjualan');
					$create_detail['kd_barang'] = $items['id'];
					$create_detail['qty'] = $items['qty'];
					$result2 = $this->app_model->insertData("tbl_penjualan_detail",$create_detail);
				}

				$this->session->unset_userdata('nama_pelanggan');
				$this->session->unset_userdata('limit_add_cart');
				$this->cart->destroy();

				if ($result && $result2) {
					$pesan = 'Create Penjualan Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('Penjualan'));
				}else{
					$data['pesan'] = 'Create Penjualan Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('penjualan/create', $data);
					$this->load->view('elements/footer');
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

	function set_session_pemesan(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
			$sess_data['kd_user'] = $_POST["kd_user"];
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
			redirect(base_url('penjualan/create'));
		}elseif ($create_or_update == 'update') {
			$kd_penjualan = $this->input->post('kd_penjualan');
			redirect(base_url('penjualan/update/'.$kd_penjualan));
		}else{
			redirect(base_url('penjualan/index'));
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
				$hps['kd_penjualan'] = $kode[2];
				$hps['kd_barang'] = $kode[3];
				$this->app_model->deleteData("tbl_penjualan_detail",$hps);
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

		if($this->session->userdata("limit_add_cart")==""){
			$in_cart = array();
			foreach($data['data_penjualan_detail']->result() as $dpd)
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
			$this->load->view('penjualan/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Toko Onderdil | penjualan';
		$delete['kd_penjualan'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
			//kembalikan kuantitas barang
				$q = $this->app_model->getSelectedData("tbl_penjualan_detail", $delete);
				$result1 = $this->app_model->deleteData("tbl_penjualan",$delete);
				$result2 = $this->app_model->deleteData("tbl_penjualan_detail",$delete);
				$pesan=($result1 && $result2 ? 'Delete penjualan Sukses' : 'Delete penjualan Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('penjualan'));
			}else{
				redirect(base_url('penjualan'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

	function confirm($id){
		$cek = $this->session->userdata('logged_in');
		$dt['title']='Toko Onderdil | Update penjualan';
		$detail['kd_penjualan'] = $id;
		$data['kd_penjualan'] = $detail['kd_penjualan'];
		$data['kd_penjualan'] = $this->app_model->getMaxKodePenjualan();
		$data['data_penjualan'] = $this->app_model->getSelectedData("tbl_penjualan", $detail)->result();
		$data['data_penjualan_detail'] = $this->app_model->manualQuery("select a.kd_penjualan, a.kd_barang, a.qty, b.nama_barang, b.harga, b.stok from tbl_penjualan_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_penjualan='".$detail['kd_penjualan']."'");

		foreach ($data['data_penjualan'] as $key => $value) {
			$data['kd_penjualan'] = $value->kd_penjualan;
			$data['kd_user'] = $value->kd_user;
			$data['nama_user'] = $this->app_model->getNamaSales($value->kd_user);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['tgl_penjualan'] = $value->tgl_penjualan;
		}

		if($this->session->userdata("limit_add_cart")==""){
			$in_cart = array();
			foreach($data['data_penjualan_detail']->result() as $dpd)
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
				$confirm['kd_penjualan'] = $this->input->post('kd_penjualan');
				$confirm['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$confirm['kd_user'] = $this->input->post('kd_user');
				$confirm['total_harga'] = $this->input->post('total');
				$confirm['tgl_penjualan'] = strtotime(date('Y-m-d H:i:s'));
				$confirm['jenis'] = 'Order';
				$status['status'] = 'Confirm';
				$result = $this->app_model->insertData('tbl_penjualan', $confirm);
				$result2 = $this->app_model->updateData('tbl_penjualan', $status, $detail);
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
					$pesan = 'confirm Penjualan Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('penjualan'));
				}else{
					$data['pesan'] = 'confirm Penjualan Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('penjualan/confirm', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('penjualan/confirm', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}


}
