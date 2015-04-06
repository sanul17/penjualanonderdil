<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class 	PHPExcelExample extends CI_Controller {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 */

	function index(){
		$dt['title']='Pasti Jaya Motor | Upload By Excel';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			$this->load->view('elements/header', $dt);
			$this->load->view('phpexcelexample/index');
			$this->load->view('elements/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	function create(){
		$dt['title']='Pasti Jaya Motor | PHPExcel';
		$cek = $this->session->userdata('logged_in');
		if (!empty($cek)) {	
			if ($this->form_validation->run()) {
				$fileName = $_FILES['import']['name'];
				
				$config['upload_path'] = './assets/files/';
				$config['file_name'] = $fileName;
				$config['allowed_types'] = 'xls|xlsx';
				$config['max_size']        = 10000;
				
				$this->load->library('upload');
				$this->upload->initialize($config);
				
				if(! $this->upload->do_upload('import') )
					$this->upload->display_errors();
				
				$media = $this->upload->data('import');
				$inputFileName = './assets/files/'.$media['file_name'];

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
					$kategori = $arraydata[$i][0];
					$type = $arraydata[$i][1];
				//SET CREATE DATA
					$create_barang['kd_barang'] = $this->app_model->getMaxKodeBarang();
					$create_barang['brand'] = $arraydata[$i][2];
					$create_barang['min_stok'] = $arraydata[$i][3];
					$create_barang['stok'] = $arraydata[$i][4];
					$create_barang['modal'] = $arraydata[$i][5];
					$create_barang['harga'] = $arraydata[$i][6];
					$create_barang['posisi'] = $arraydata[$i][7];
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
						$this->app_model->insertData('tbl_barang', $create_barang);
					}
				}


				$data['highestRow'] = $highestRow;
				$data['highestColumnIndex'] = $highestColumnIndex;
				$data['arrayData'] = $arraydata;

				$this->load->view('elements/header', $dt);
				$this->load->view('phpexcelexample/index', $data);
				$this->load->view('elements/footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}
}