<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderan extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Toko Onderdil | Orderan';
		$cek = $this->session->userdata('logged_in');
		
		
		if (!empty($cek)) {	
			$this_sales = $this->session->userdata('kd_sales');
			if ($this->session->userdata('level') == 'sales') {
				$data['data'] = $this->app_model->manualQuery("SELECT a.kd_order, a.kd_sales, a.nama_pelanggan, a.alamat, b.nama_sales, a.tgl_order, a.status, (select count(kd_order) as jum from tbl_order_detail where kd_order=kd_order) as jumlah from tbl_order a left join tbl_sales b on a.kd_sales=b.kd_sales where status='Pending' && a.kd_sales = '".$this_sales."'")->result();
			}else{
				$data['data'] = $this->app_model->manualQuery("SELECT a.kd_order, a.kd_sales, a.nama_pelanggan, a.alamat, b.nama_sales, a.tgl_order, a.status, (select count(kd_order) as jum from tbl_order_detail where kd_order=kd_order) as jumlah from tbl_order a left join tbl_sales b on a.kd_sales=b.kd_sales where status='Pending'")->result();
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
		$data['data_barang'] = $this->app_model->getAllData('tbl_barang')->result();
		$data['kd_sales'] = $this->session->userdata('kd_sales');
		$data['nama_sales'] = $this->app_model->getNamaSales($this->session->userdata('kd_sales'));
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$cek_kd_order = $data['data_order'] = $this->app_model->getSelectedData("tbl_order", $detail)->result();
				$kd_order = '';
				if (count($cek_kd_order > 0)) {
					$kd_order = $this->app_model->getMaxKodeOrder();
				}else{
					$kd_order = $this->input->post('kd_order');
				}
				$create['kd_order'] = $kd_order;
				$create['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$create['alamat'] = $this->input->post('alamat');
				$create['kd_sales'] = $this->input->post('kd_sales');
				$create['potongan'] = $this->input->post('potongan');
				$create['tgl_order'] = strtotime(date('Y-m-d H:i:s'));
				$create['status'] = 'Pending';
				$result = $this->app_model->insertData('tbl_order', $create);

				$kd_barang = $this->input->post('kd_barang');
				$qty = $this->input->post('qty');

				for ($i=0; $i < count($kd_barang); $i++) { 
					$create_detail['kd_order'] = $kd_order;
					$create_detail['kd_barang'] = $kd_barang[$i];
					$create_detail['qty'] = $qty[$i];
					$result2 = $this->app_model->insertData("tbl_order_detail",$create_detail);
				}	

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
			on a.kd_barang=b.kd_barang where a.kd_order='".$detail['kd_order']."'")->result();

		foreach ($data['data_order'] as $key => $value) {
			$data['kd_order'] = $value->kd_order;
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $this->app_model->getNamaSales($value->kd_sales);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['potongan'] = $value->potongan;
			$data['alamat'] = $value->alamat;
			$data['tgl_order'] = $value->tgl_order;
		}

		$data['total'] = 0;
		foreach ($data['data_order_detail'] as $key => $value) {
			$data['total'] += $value->harga*$value->qty;
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
		$data['data_barang'] = $this->app_model->getAllData('tbl_barang')->result();
		$data['data_order'] = $this->app_model->getSelectedData("tbl_order", $update)->result();
		$data['data_order_detail'] = $this->app_model->manualQuery("select a.kd_order, a.kd_barang, a.qty, b.nama_barang, b.harga from tbl_order_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_order='".$update['kd_order']."'")->result();

		foreach ($data['data_order'] as $key => $value) {
			$data['kd_order'] = $value->kd_order;
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $this->app_model->getNamaSales($value->kd_sales);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['alamat'] = $value->alamat;
			$data['potongan'] = $value->potongan;
		}

		$data['total'] = 0;
		foreach ($data['data_order_detail'] as $key => $value) {
			$data['total'] += $value->harga*$value->qty;
		}

		

		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			if ($this->form_validation->run()) {
				$id_update['kd_order'] = $id;
				$update['nama_pelanggan'] = $this->input->post('nama_pelanggan');
				$update['alamat'] = $this->input->post('alamat');
				$update['kd_sales'] = $this->input->post('kd_sales');
				$update['potongan'] = $this->input->post('potongan');
				$result = $this->app_model->updateData('tbl_order', $update, $id_update);

				$this->app_model->deleteData("tbl_order_detail", $id_update);

				$kd_barang = $this->input->post('kd_barang');
				$qty = $this->input->post('qty');

				for ($i=0; $i < count($kd_barang); $i++) { 
					$update_detail['kd_order'] = $id;
					$update_detail['kd_barang'] = $kd_barang[$i];
					$update_detail['qty'] = $qty[$i];
					$result2 = $this->app_model->insertData("tbl_order_detail",$update_detail);
				}	

				if ($result && $result2) {
					$pesan = 'Update Orderan Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('Orderan'));
				}else{
					$data['pesan'] = 'Update Orderan Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('orderan/create', $data);
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
		$dt['title']='Toko Onderdil | Confirm Orderan';
		$id_confirm['kd_order'] = $id;
		$data['kd_order'] = $id;
		$data['kd_penjualan'] = $this->app_model->getMaxKodePenjualan();
		$data['data_order'] = $this->app_model->getSelectedData("tbl_order", $id_confirm)->result();
		$data['data_order_confirm'] = $this->app_model->manualQuery("select a.kd_order, a.kd_barang, a.qty, b.nama_barang, b.harga, b.stok from tbl_order_detail a left join tbl_barang b 
			on a.kd_barang=b.kd_barang where a.kd_order='".$id_confirm['kd_order']."'")->result();

		foreach ($data['data_order'] as $key => $value) {
			$data['kd_order'] = $value->kd_order;
			$data['kd_sales'] = $value->kd_sales;
			$data['nama_sales'] = $this->app_model->getNamaSales($value->kd_sales);
			$data['nama_pelanggan'] = $value->nama_pelanggan;
			$data['potongan'] = $value->potongan;
			$data['alamat'] = $value->alamat;
			$data['tgl_order'] = $value->tgl_order;
		}

		$data['total'] = 0;
		foreach ($data['data_order_confirm'] as $key => $value) {
			$data['total'] += $value->harga*$value->qty;
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
				$confirm['alamat'] = $this->input->post('alamat');
				$confirm['tgl_penjualan'] = strtotime(date('Y-m-d H:i:s'));
				$confirm['jenis'] = 'Order';
				$status['status'] = 'Confirm';
				$result = $this->app_model->insertData('tbl_penjualan', $confirm);
				$result2 = $this->app_model->updateData('tbl_order', $status, $id_confirm);
				$result3 = 0;

				$kd_barang = $this->input->post('kd_barang');
				$qty_dikirim = $this->input->post('qty_dikirim');
				$potongan = $this->input->post('potongan');
				$harga_potongan= $this->input->post('harga_potongan');
				$dus = $this->input->post('dus');

				for ($i=0; $i < count($kd_barang); $i++) { 
					$confirm_detail['kd_penjualan'] = $id;
					$confirm_detail['kd_barang'] = $kd_barang[$i];
					$confirm_detail['qty'] = $qty_dikirim[$i];
					$confirm_detail['harga_tersimpan'] = $harga_potongan[$i];
					$confirm_detail['potongan'] = $potongan[$i];
					$confirm_detail['dus'] = $dus[$i];
					$result3 = $this->app_model->insertData("tbl_penjualan_detail", $confirm_detail);
					$stok['stok'] = $this->app_model->getBalancedStok($confirm_detail['kd_barang'], $confirm_detail['qty']);
					$key = $confirm_detail['kd_barang'];
					$this->app_model->updateStok($stok, $key); 
					$i++;
				}	
				
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
