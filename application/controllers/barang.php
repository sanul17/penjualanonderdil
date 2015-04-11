<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */
	
	function index(){
		$dt['title']='Pasti Jaya Motor | Barang';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$data['data'] = $this->app_model->manualQuery('select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori')->result();
			$data['data_for_sales'] = $this->app_model->getAllData('tbl_tipe_kategori')->result();
			$this->load->view('elements/header', $dt);
			$this->load->view('barang/index', $data);
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | Create Barang';
		$data['kd_barang'] = $this->app_model->getMaxKodeBarang();
		$data['list_tipe_kategori'] = $this->app_model->getAllData('tbl_tipe_kategori')->result();
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i> ', ' </div>');
			$this->form_validation->set_rules('kd_barang', 'kd_barang', 'required');
			$this->form_validation->set_rules('tipe_kategori', 'Kategori Barang', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('modal', 'Modal', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('posisi', 'Posisi', 'required');
			if ($this->form_validation->run()) {
				$id_cek['kd_barang'] = $this->input->post('kd_barang');
				$cek_kd_barang = $data['data_barang'] = $this->app_model->getSelectedData("tbl_barang", $id_cek)->result();
				$kd_barang = '';
				if (count($cek_kd_barang > 0)) {
					$kd_barang = $this->app_model->getMaxKodeBarang();
				}else{
					$kd_barang = $this->input->post('kd_barang');
				}
				$create['kd_barang'] = $kd_barang;
				$create['id_tipe_kategori'] = $this->input->post('tipe_kategori');
				$create['brand'] = $this->input->post('brand');
				$create['min_stok'] = $this->input->post('min_stok');
				$create['stok'] = $this->input->post('stok');
				$create['modal'] = $this->input->post('modal');
				$create['harga'] = $this->input->post('harga');
				$create['posisi'] = $this->input->post('posisi');
				
				if ($this->app_model->insertData('tbl_barang', $create)) {
					$pesan = 'Create Barang Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('barang'));
				}else{
					$data['pesan'] = 'Create Barang Gagal';
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/create', $data);
					$this->load->view('elements/footer');
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('barang/create', $data);
				$this->load->view('elements/footer');				
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function detail($id){
		$dt['title']='Pasti Jaya Motor | Update Barang';
		$detail['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->manualQuery("select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where a.kd_barang='".$detail['kd_barang']."'")->result();
		foreach ($result as $key => $value) {
			$data['kd_barang'] = $value->kd_barang;
			$data['kategori'] = $value->kategori;
			$data['type'] = $value->type;
			$data['brand'] = $value->brand; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
			$data['modal'] = $value->modal; 
			$data['harga'] = $value->harga; 
			$data['posisi'] = $value->posisi; 
		}
		if (!empty($cek)) {
			$this->load->view('elements/header', $dt);
			$this->load->view('barang/detail', $data);
			$this->load->view('elements/footer');

		}else{
			redirect(base_url('login'));
		}
	}

	function update($id){
		$dt['title']='Pasti Jaya Motor | Update Barang';
		$update['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->getSelectedData('tbl_barang', $update)->result();
		$data['list_tipe_kategori'] = $this->app_model->getAllData('tbl_tipe_kategori')->result();
		foreach ($result as $key => $value) {
			$data['kd_barang'] = $value->kd_barang;
			$data['id_tipe_kategori'] = $value->id_tipe_kategori;
			$data['brand'] = $value->brand; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
			$data['modal'] = $value->modal; 
			$data['harga'] = $value->harga; 
			$data['posisi'] = $value->posisi; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_barang', 'kd_barang', 'required');
			$this->form_validation->set_rules('tipe_kategori', 'Kategori Barang', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('modal', 'Modal', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('posisi', 'Posisi', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_barang'] = $id;
					$update['id_tipe_kategori'] = $this->input->post('tipe_kategori');
					$update['brand'] = $this->input->post('brand'); 
					$update['min_stok'] = $this->input->post('min_stok'); 
					$update['stok'] = $this->input->post('stok'); 
					if ($update['stok'] < 0) {
						$update['stok'] = 0;
					}
					$update['modal'] = $this->input->post('modal'); 
					$update['harga'] = $this->input->post('harga'); 
					$update['posisi'] = $this->input->post('posisi'); 
					if ($this->app_model->updateData('tbl_barang', $update, $id_update)) {
						$pesan = 'Update Barang Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('barang'));
					}else{
						$data['pesan'] = 'Update Barang Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('barang/update', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/update', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function addStok($id){
		$dt['title']='Pasti Jaya Motor | Tambah Barang';
		$update['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		$result = $this->app_model->manualQuery("select * from tbl_barang a left join tbl_tipe_kategori b on a.id_tipe_kategori = b.id_tipe_kategori where a.kd_barang='".$update['kd_barang']."'")->result();
		foreach ($result as $key => $value) {
			$data['kd_barang'] = $value->kd_barang;
			$data['kategori'] = $value->kategori; 
			$data['type'] = $value->type; 
			$data['min_stok'] = $value->min_stok; 
			$data['stok'] = $value->stok; 
		}
		if (!empty($cek)) {
			$this->form_validation->set_error_delimiters('<div class="text-red"> <i class="fa fa-ban"></i>  ', ' </div>');
			$this->form_validation->set_rules('kd_barang', 'kd_barang', 'required');
			$this->form_validation->set_rules('min_stok', 'Minimal Stok', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('qty', 'Quantity', 'required');
			if(isset($id)){
				if ($this->form_validation->run()) {
					$id_update['kd_barang'] = $id;
					$update['min_stok'] = $this->input->post('min_stok'); 
					$stok = $this->input->post('stok');
					$update['stok'] = $stok+$this->input->post('qty');
					if ($update['stok'] < 0) {
						$update['stok'] = 0;
					}
					if ($this->app_model->updateData('tbl_barang', $update, $id_update)) {
						$pesan = 'Tambah Stok Barang Sukses';
						$this->session->set_flashdata('pesan', $pesan);
						redirect(base_url('barang'));
					}else{
						$data['pesan'] = 'Tambah Stok Barang Gagal';
						$this->load->view('elements/header', $dt);
						$this->load->view('barang/add', $data);
						$this->load->view('elements/footer');
					}
				}else{
					$this->load->view('elements/header', $dt);
					$this->load->view('barang/add', $data);
					$this->load->view('elements/footer');
				}
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}
	}

	function delete($id){
		$dt['title']='Pasti Jaya Motor | Barang';
		$delete['kd_barang'] = $id;
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {
			if(isset($id)){
				$pesan=($this->app_model->deleteData('tbl_barang', $delete) ? 'Delete Barang Sukses' : 'Delete Barang Gagal');
				$this->session->set_flashdata('pesan', $pesan);
				redirect(base_url('barang'));
			}else{
				redirect(base_url('barang'));
			}
		}else{
			redirect(base_url('login'));
		}

	}

	function importexcel(){
		$dt['title']='Pasti Jaya Motor | PHPExcel';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			
			if(isset($_FILES["import"]))
			{
				//generate name
				$random_secure = md5(date('Y-m-d H:i:s:u'));
				$namefile_generate = "FILE_EXCEL_". $random_secure;

				$info = pathinfo($_FILES['import']['name']);
				$ext = $info['extension'];
				$namefile_generate = $namefile_generate.".".$ext;

				$path_upload = "assets/files/";
				
				$path_upload = $path_upload . basename( $namefile_generate);
				move_uploaded_file($_FILES['import']['tmp_name'], $path_upload);

				$file = $path_upload;

//load the excel library
				$this->load->library('excel');

//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				$objWorksheet = $objPHPExcel->getActiveSheet();

//get only the Cell Collection
				$highestRow = $objWorksheet->getHighestRow(); 
				$highestColumn = $objWorksheet->getHighestColumn();  
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  
				for ($row = 1; $row <= $highestRow;++$row) 
				{  
					for ($col = 0; $col <$highestColumnIndex;++$col)
					{  
						$value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  
						$arraydata[$row-1][$col]=$value; 


					}  

				}

				$tipe_kategori = $this->app_model->getAllData('tbl_tipe_kategori')->result();

				for ($i=1; $i < $highestRow; $i++) { 
				//SET KATEGORI AND TYPE
					$kategori = $arraydata[$i][1];
					$type = $arraydata[$i][2];
				//SET CREATE DATA
					$create_barang['kd_barang'] = $arraydata[$i][0];

					$create_barang['brand'] = ($arraydata[$i][3]) ? $arraydata[$i][3] : "No Brand" ;

					$create_barang['min_stok'] = ($arraydata[$i][4]) ? $arraydata[$i][4] : 0 ;

					$create_barang['stok'] = ($arraydata[$i][5]) ? $arraydata[$i][5] : 0 ;

					$create_barang['modal'] = ($arraydata[$i][6]) ? $arraydata[$i][6] : 0 ;

					$create_barang['harga'] = ($arraydata[$i][7]) ? $arraydata[$i][7] : 0 ;

					$create_barang['posisi'] = ($arraydata[$i][8]) ? $arraydata[$i][8] : "-" ;

				//KATEGORI EXIST ARE FALSE DEFAULT
					$kategori_exist = false;

				//CHECKING IF KATEGORI AND TIPE ALREADY EXIST OR NOT
					foreach ($tipe_kategori as $key => $value) {
						if (strtolower(trim($value->kategori)) != strtolower(trim($kategori)) || strtolower(trim($value->type)) != strtolower(trim($type))) {
						//KATEGORI NOT EXIST, SET CREATE KATEGORI
							$kategori_exist = false;
							$create_kategori['kategori'] = $kategori;
							$create_kategori['type'] = $type;
						}else{
						//KATEGORI EXIST, BREAK FROM LOOP
							$kategori_exist = true;
							break;
						}
					}

				//IF KATEGORI NOT EXIST, CREATE NEW TIPE KATEGORI AND INSERT BARANG BY LAST ID
					if (!$kategori_exist) {
						$this->app_model->insertData('tbl_tipe_kategori', $create_kategori);
						$create_barang['id_tipe_kategori'] = $this->db->insert_id();
						$this->app_model->insertData('tbl_barang', $create_barang);
					}else{
				//IF KATEGORI EXIST, CHECK THE MATCH ID TIPE KATEGORI
						foreach ($tipe_kategori as $key => $value) {
							if (strtolower(trim($value->kategori)) == strtolower(trim($kategori)) && strtolower(trim($value->type)) == strtolower(trim($type))) {
								$create_barang['id_tipe_kategori'] = $value->id_tipe_kategori;
								break;
							}
						}
						$result = $this->app_model->insertData('tbl_barang', $create_barang);
					}
				}

				$create['user'] = $this->session->userdata('username');
				$create['date'] = date('Y-m-d H:i:s');
				$create['file_name'] = $namefile_generate;
				$create['file_path'] = $path_upload;
				$this->app_model->insertData('tbl_import', $create);

				if ($result) {
					$pesan = 'Import Excel Sukses';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('barang/importexcel'));
				}else{
					$pesan = 'Import Excel Gagal';
					$this->session->set_flashdata('pesan', $pesan);
					redirect(base_url('barang/importexcel'));
				}
			}else{
				$this->load->view('elements/header', $dt);
				$this->load->view('barang/importexcel');
				$this->load->view('elements/footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}

}
