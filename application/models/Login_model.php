<?php
/**
 * 
 */
class Login_model extends CI_Model
{
	
	public function login($data)
	{
		
		$condition = array('username' => $data['username'] , 'password'=> $data['password']);
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->num_rows();
	}
}