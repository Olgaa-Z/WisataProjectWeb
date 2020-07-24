<?php
class Crud_m extends CI_Model
{
	
	
	function insert($table, $data){
		return $this->db->insert($table, $data);
	}

	function update($table, $data, $where){
		$this->db->where($where);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}

	function delete($table, $where){
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	public function listRequestSaldo()
	{

		return $this->db->query("SELECT * FROM request_saldo INNER JOIN user ON request_saldo.email=user.email WHERE is_done NOT IN ('Y')");
	}

}