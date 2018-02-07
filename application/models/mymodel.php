<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

	public function Select($tabelName,$where=''){
		$data = $this->db->query('SELECT * FROM '.$tabelName.' '. $where);
		return $data->result();
	}

		public function Insert($tabelName, $data){
		$res = $this->db->insert($tabelName, $data);
		return $res;
	}

	public function Update($tabelName, $data, $where){
		$res = $this->db->update($tabelName, $data, $where);
		return $res;
	}

	public function Delete($tabelName, $where){
		$res = $this->db->delete($tabelName, $where);
		return $res;
	}

	function filename_exists($tabelName,$data){
	    $this->db->select('*');
	    $this->db->from($tabelName);
	    $this->db->where('no_surat', $data);
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result;
	}

	function is_no_available($no_surat){
		$this->db->where('no_surat', $no_surat);
		$query = $this->db->get('s_keluar');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
}

public function check_id_exist($id){
	$this->db->where('no_surat', $id);
	$this->db->from('s_keluar');
	$query = $this->db->get();
	if($query->num_rows() > 0){
		return $query->result();
	}else{
		return $query->result();
	}
}

	// =============================== EDUCATION =================================
	public function GetEducation($where=''){
		$data = $this->db->query('SELECT * FROM education'. $where);
		return $data->result();
	}

	// ============================== ORGANIZATION ===============================
	public function GetOrganization($where=''){
		$data = $this->db->query('SELECT * FROM organization'. $where);
		return $data->result();
	}

	// ================================== WORK ===================================
	public function GetWork($where=''){
		$data = $this->db->query('SELECT * FROM work'. $where);
		return $data->result();
	}

}
