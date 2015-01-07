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
	
	public function getMaxKodeSales()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_user, 3)) as kd_max from tbl_sales");
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

	public function getMaxKodePesanan()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_pesanan,8)) as kd_max from tbl_order");
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
	
	public function getMaxKodePenjualan()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_pesanan,8)) as kd_max from tbl_penjualan");
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
	
	public function getMaxKodeFaktur()
	{
		$q = $this->db->query("select MAX(RIGHT(kd_faktur,8)) as kd_max from tbl_faktur");
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
		return "FK".$kd;
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
		$stok = "";
		foreach($q->result() as $d)
		{
			$stok = $d->stok-$kurangi;
		}
		return $stok;
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