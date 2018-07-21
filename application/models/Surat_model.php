<?php
/**
 * 
 */
class Surat_model extends CI_Model
{
	
	public function carinik($nik)
	{
		
		$condition = array('nik' => $nik);
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return 0;
		}
		
	}
	public function insertsurat($data)
	{
		

		$this->db->insert('surat', $data);
	}
	public function getSurat()
	{
		//SELECT * FROM `surat` JOIN penduduk on penduduk.id = surat.penduduk
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->join('penduduk', 'penduduk.id = surat.penduduk');
		$query = $this->db->get();
		return $query->result_array();


		
	}
}