<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_opname extends CI_Controller {

	public function index()
	{
		$dt['title']='Pasti Jaya Motor | Stok Opname';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this_user = $this->session->userdata('kd_user');
			$data['data'] = $this->app_model->manualQuery("SELECT a.kd_opname, a.tgl_opname, (select count(kd_barang) from tbl_stok_opname_detail where kd_opname = a.kd_opname) as total, a.kd_user, b.nama_user, a.status from tbl_stok_opname a left join tbl_user b on a.kd_user = b.kd_user")->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('stok_opname/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	public function create(){
		$dt['title']='Pasti Jaya Motor | Stok Opname';
		$data['kd_opname'] = $this->app_model->getMaxKodeStokOpname();
		$data['kd_user'] = $this->session->userdata('kd_user');
		$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));
		$data['data_barang'] = $this->app_model->manualQuery('select a.kd_barang, a.brand, b.type, b.kategori from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_opname', 'Kode Stok Opname', 'required');
			if ($this->form_validation->run()) {

				$create['kd_opname'] = $this->app_model->getMaxKodeStokOpname();
				$create['kd_user'] = $this->session->userdata('kd_user');
				$create['tgl_opname'] = strtotime(date('Y-m-d H:i:s'));
				$create['status'] = 0;
				$result = $this->app_model->insertData('tbl_stok_opname', $create);

				$kd_barang = $this->input->post('kd_barang');
				$stok_komp = $this->input->post('stok_komp');
				$stok_fisik = $this->input->post('stok_fisik');

				//$data['barang_opname'] = array();

				for ($i=0; $i < count($kd_barang); $i++) { 
					//$selisih = $stok_komp[$i] - $stok_fisik[$i];
					//if ($selisih != 0) {
						/*
						$barang_opname = $this->app_model->manualQuery('select a.kd_barang, a.brand, a.stok, CONCAT(b.kategori, " ", b.type) as nama_barang from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where kd_barang = "'.$kd_barang[$i].'"')->row_array();
						$barang_opname['stok_komp'] = $stok_komp[$i];
						$barang_opname['stok_fisik'] = $stok_fisik[$i];
						$barang_opname['selisih'] = $selisih;
						array_push($data['barang_opname'], $barang_opname);
						*/
						$create_detail['kd_opname'] = $create['kd_opname'];
						$create_detail['kd_barang'] = $kd_barang[$i];
						$create_detail['stok_komp'] = 0;
						$create_detail['stok_fisik'] = $stok_fisik[$i];
						$create_detail['selisih'] = 0;

						$result2 = $this->app_model->insertData('tbl_stok_opname_detail', $create_detail);
						//var_dump($create_detail);
						//echo "<hr>";
					//}
					}

					if ($result && $result2) {
						//exit();
						redirect(base_url('stok_opname/proses/'.$create['kd_opname']));
					}else{
						$pesan = 'Create Stok Opname Gagal';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('stok_opname/create'));
					}

				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('stok_opname/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('login'));
			}
		}


		public function add($id){
			$dt['title']='Pasti Jaya Motor | Stok Opname';
			$data['kd_opname'] = $id;
			$data['kd_user'] = $this->session->userdata('kd_user');
			$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));

			$barang_opname = $this->app_model->manualQuery('select kd_barang from tbl_stok_opname_detail where kd_opname = "'.$id.'"')->result_array();
			$barang_stok = $this->app_model->manualQuery('select a.kd_barang, a.brand, b.type, b.kategori from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result_array();
			$data['data_barang'] = array();

			foreach ($barang_stok as $bs) {
				$exist = false;
				foreach ($barang_opname as $bo) {
					if ($bs['kd_barang'] == $bo['kd_barang']) {
						$exist = true;
						break;
					}
				}
				if (!$exist) {
					array_push($data['data_barang'], $bs);
				}
			}
		/*
		echo "<hr>opname<hr>";
		var_dump($barang_opname);
		echo "<hr>STOK<hr>";
		var_dump($barang_stok);
		echo "<hr>SISA<hr>";
		var_dump($data['data_barang']);
		echo "<hr>";
		exit();
		*/
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_opname', 'Kode Stok Opname', 'required');
			if ($this->form_validation->run()) {

				$id_add['kd_opname'] = $id;
				$add['kd_user'] = $this->session->userdata('kd_user');
				$add['tgl_opname'] = strtotime(date('Y-m-d H:i:s'));
				$result = $this->app_model->updateData('tbl_stok_opname', $add, $id_add);

				$kd_barang = $this->input->post('kd_barang');
				$stok_komp = $this->input->post('stok_komp');
				$stok_fisik = $this->input->post('stok_fisik');

				//$data['barang_opname'] = array();

				for ($i=0; $i < count($kd_barang); $i++) { 
					//$selisih = $stok_komp[$i] - $stok_fisik[$i];
					//if ($selisih != 0) {
						/*
						$barang_opname = $this->app_model->manualQuery('select a.kd_barang, a.brand, a.stok, CONCAT(b.kategori, " ", b.type) as nama_barang from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where kd_barang = "'.$kd_barang[$i].'"')->row_array();
						$barang_opname['stok_komp'] = $stok_komp[$i];
						$barang_opname['stok_fisik'] = $stok_fisik[$i];
						$barang_opname['selisih'] = $selisih;
						array_push($data['barang_opname'], $barang_opname);
						*/
						$add_detail['kd_opname'] = $id_add['kd_opname'];
						$add_detail['kd_barang'] = $kd_barang[$i];
						$add_detail['stok_komp'] = 0;
						$add_detail['stok_fisik'] = $stok_fisik[$i];
						$add_detail['selisih'] = 0;

						$result2 = $this->app_model->insertData('tbl_stok_opname_detail', $add_detail);
						//var_dump($add_detail);
						//echo "<hr>";
					//}
					}

					if ($result && $result2) {
						//exit();
						redirect(base_url('stok_opname/proses/'.$id_add['kd_opname']));
					}else{
						$pesan = 'Add Stok Opname Gagal';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('stok_opname/add/'.$id_add['kd_opname']));
					}

				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('stok_opname/add', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('login'));
			}
		}

		public function proses($id){
			$dt['title']='Pasti Jaya Motor | Stok Opname';
			$data['kd_opname'] = $id;
			$data['kd_user'] = $this->session->userdata('kd_user');
			$data['nama_user'] = $this->app_model->getNamaUser($this->session->userdata('kd_user'));
			$data['barang_opname'] = $this->app_model->manualQuery('select b.kd_barang, CONCAT(d.kategori, " ", d.type) as nama_barang, c.brand, b.stok_fisik, c.stok, (b.stok_fisik - c.stok) as selisih from tbl_stok_opname a left join tbl_stok_opname_detail b on a.kd_opname = b.kd_opname left join tbl_barang c on b.kd_barang = c.kd_barang left join tbl_tipe_kategori d on c.id_tipe_kategori = d.id_tipe_kategori where a.kd_opname = "'.$id.'"')->result_array();
			$cek = $this->session->userdata('logged_in');
			if (!empty($cek)) {	
/*
			$create['kd_opname'] = $this->app_model->getMaxKodeStokOpname();
			$create['kd_user'] = $this->session->userdata('kd_user');
			$create['tgl_opname'] = strtotime(date('Y-m-d H:i:s'));
			$result = $this->app_model->insertData('tbl_stok_opname', $create);

			$kd_barang = $this->input->post('kd_barang');
			$stok_komp = $this->input->post('stok_komp');
			$stok_fisik = $this->input->post('stok_fisik');
			$selisih = $this->input->post('selisih');

			for ($i=0; $i < count($kd_barang); $i++) { 
				$create_detail['kd_opname'] = $create['kd_opname'];
				$create_detail['kd_barang'] = $kd_barang[$i];
				$create_detail['stok_komp'] = $stok_komp[$i];
				$create_detail['stok_fisik'] = $stok_fisik[$i];
				$create_detail['selisih'] = $selisih[$i];

				$id_update['kd_barang'] = $kd_barang[$i];
				$update['stok'] = $stok_fisik[$i];
				$result2 = $this->app_model->insertData('tbl_stok_opname_detail', $create_detail);
				$result3 = $this->app_model->updateData('tbl_barang', $update, $id_update);
			}
*/
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_opname', 'Kode Stok Opname', 'required');
			if ($this->form_validation->run()) {
				if ($this->input->post('sesuaikan')) {

					$id_update['kd_opname'] = $id;
					$update['status'] = 1;
					$result = $this->app_model->updateData('tbl_stok_opname', $update, $id_update);

					foreach ($data['barang_opname'] as $value) {
						$id_update_detail['kd_barang'] = $value['kd_barang'];
						$update_detail['stok'] = $value['stok_fisik'];
						$result2 = $this->app_model->updateData('tbl_barang', $update_detail, $id_update_detail);

						$id_update_opname_detail['kd_opname'] = $id_update['kd_opname'];
						$id_update_opname_detail['kd_barang'] = $value['kd_barang'];
						$update_opname_detail['stok_komp'] = $value['stok'];
						$update_opname_detail['selisih'] = $value['selisih'];
						$result3= $this->app_model->updateData('tbl_stok_opname_detail', $update_opname_detail, $id_update_opname_detail);
					}

					if ($result && $result2 && $result3) {
						$pesan = 'Penyesuaian Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('stok_opname'));
					}else{
						$pesan = 'Penyesuaian Gagal';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('stok_opname/proses/'.$id));
					}
				}
				else if ($this->input->post('sesuaikan_seluruh')) {

					$id_update['kd_opname'] = $id;
					$update['status'] = 1;
					$result = $this->app_model->updateData('tbl_stok_opname', $update, $id_update);

					foreach ($data['barang_opname'] as $value) {
						$id_update_detail['kd_barang'] = $value['kd_barang'];
						$update_detail['stok'] = $value['stok_fisik'];
						$result2 = $this->app_model->updateData('tbl_barang', $update_detail, $id_update_detail);

						$id_update_opname_detail['kd_opname'] = $id_update['kd_opname'];
						$id_update_opname_detail['kd_barang'] = $value['kd_barang'];
						$update_opname_detail['stok_komp'] = $value['stok'];
						$update_opname_detail['selisih'] = $value['selisih'];
						$result3= $this->app_model->updateData('tbl_stok_opname_detail', $update_opname_detail, $id_update_opname_detail);
					}


					$all_barang = $this->app_model->manualQuery('select kd_barang from tbl_barang')->result_array();
					$barang_not_opname = array();

					foreach ($all_barang as $ab) {
						$exist = false;
						foreach ($data['barang_opname'] as $bo) {
							if ($ab['kd_barang'] == $bo['kd_barang']) {
								$exist = true;
								break;
							}
						}
						if (!$exist) {
							$result4= $this->app_model->manualQuery('update tbl_barang set stok = 0 where kd_barang ="'.$ab['kd_barang'].'"');
						}
					}
					/*
					foreach ($barang_not_opname as $value) {
						$id_update_all_stok['kd_barang'] = $value['kd_barang'];
						$update_all_stok['stok'] = 0;
						$result4= $this->app_model->updateData('tbl_barang', $update_all_stok, $id_update_all_stok);
					}
					*/

					if ($result && $result2 && $result3 && $result4) {
						$pesan = 'Penyesuaian Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('stok_opname'));
					}else{
						$pesan = 'Penyesuaian Gagal';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('stok_opname/proses/'.$id));
					}
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('stok_opname/proses', $data);
				$this->load->view('elements/footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}

	public function getBarang(){
		$kd_barang = $this->input->post('kd_barang');

		//$kd_barang = array('BR00000001', 'BR00000004');

		$list_barang = array();

		foreach ($kd_barang as $kdb) {
			$get_data = $this->app_model->manualQuery('select a.kd_barang, a.brand, a.stok, CONCAT(b.kategori, " ", b.type) as nama_barang from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where kd_barang = "'.$kdb.'"')->row_array();
			array_push($list_barang, $get_data);
		}
		header('Content-Type: application/json');
		echo json_encode($list_barang);
	}

}

/* End of file stok_opname.php */
/* Location: ./application/controllers/stok_opname.php */