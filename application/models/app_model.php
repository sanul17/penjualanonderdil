<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model {

	/**
	 * @author : Adam Syufi Ikhsanul Khair
	 **/
	
	//query otomatis dengan active record
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
	
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	
	function updateData($table,$data,$field_key)
	{
		return $this->db->update($table,$data,$field_key);
	}
	
	function updateStok($data, $id)
	{       
		$this->db->where('kd_barang', $id);
		$this->db->update('tbl_barang', $data);
	}
	
	function deleteData($table,$data)
	{
		return $this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	
	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	public function searchData($table, $q)
	{
		$this->db->or_like('judul_berita', $q);
		return $this->db->get($table);
	}
	public function getMaxKodeUser()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_user, 3)) as kd_max from tbl_user");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}
		else
		{
			$kd = "001";
		}	
		return "KD".$kd;
	}
	public function getMaxKodeSupplier()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_supplier, 3)) as kd_max from tbl_supplier");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}
		else
		{
			$kd = "001";
		}	
		return "SP".$kd;
	}
	
	public function getMaxKodeSales()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_sales, 3)) as kd_max from tbl_sales");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}
		else
		{
			$kd = "001";
		}	
		return "SL".$kd;
	}
	
	public function getMaxKodeBarang()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_barang,4)) as kd_max from tbl_barang");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "BR".$kd;
	}

	public function getMaxKodeOrder()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_order,8)) as kd_max from tbl_order");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "OD".$kd;
	}
	
	public function getMaxKodePembelian()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_pembelian,8)) as kd_max from tbl_pembelian");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PB".$kd;
	}
	
	public function getMaxKodePenjualan()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_penjualan,8)) as kd_max from tbl_penjualan");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PJ".$kd;
	}
	
	public function getMaxKodeReturPembelian()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_retur_pembelian,8)) as kd_max from tbl_retur_pembelian");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "RB".$kd;
	}

	public function getMaxKodeReturPenjualan()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_retur_penjualan,8)) as kd_max from tbl_retur_penjualan");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "RP".$kd;
	}

	public function getMaxKodeStokOpname()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_opname, 8)) as kd_max from tbl_stok_opname");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "SO".$kd;
	}
	
	public function getSisaStok($kd_barang)
	{
		$q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
		$stok = "";
		foreach($q->result() as $d)
		{
			$stok = $d->stok;
		}
		return $stok;
	}
	
	public function getBalancedStok($kd_barang,$kurangi)
	{
		$q = $this->db->query("select stok from tbl_barang where kd_barang='".$kd_barang."'");
		$stok = 0;
		foreach($q->result() as $d)
		{
			if (($d->stok-$kurangi) < 0) {
				$stok = 0;
			}else{
				$stok = $d->stok-$kurangi;
			}
		}
		return $stok;
	}

	function getBarangJual(){
		return $this->db->query ("SELECT * from tbl_barang where stok > 0");
	}


	function getNamaSales($id){
		$q = $this->db->query ("SELECT nama_sales from tbl_sales where kd_sales='".$id."'");
		$nama_sales = "";
		foreach($q->result() as $d)
		{
			$nama_sales = $d->nama_sales;
		}
		return $nama_sales;
	}

	function getNamaUser($id){
		$q = $this->db->query ("SELECT nama_user from tbl_user where kd_user='".$id."'");
		$nama_user = "";
		foreach($q->result() as $d)
		{
			$nama_user = $d->nama_user;
		}
		return $nama_user;
	}

	//query login
	public function getLoginData($tabel, $usr, $psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = mysql_real_escape_string($psw);
		return $result = $this->db->get_where($tabel, array('username' => $u, 'password' => $p))->result();
	}
}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */