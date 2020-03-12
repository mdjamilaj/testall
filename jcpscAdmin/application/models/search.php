<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Model {


	public function search_info1($id1, $id2)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('student_id', $id1);
		$this->db->or_where('student_id', $id2);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}


	public function search_info2($id1, $id2)
	{
		$query = $this->db->select('*')
				// ->limit(5, 2)
				->where('student_id >=', $id1)
				->where('student_id <=', $id2)
                ->get('student');

		$result = $query->result_array();
		return $result;
	}


	public function search_date_value($date1, $date2)
	{
		$query = $this->db->select('*')
				->where('date >=', $date1)
				->where('date <=', $date2)
				->get('send_sms_info');
			
		$result = $query->result_array();
		return $result;
	}




	function search_info3( $name)
	{

	    	$this->db->select('*');
			$this->db->from('student');
			$this->db->like('name',$name);
			$result = $this->db->get()->result_array();

			return $result;

	} 


	public function search_sms($sms)
	{
		$this->db->select('*');
		$this->db->from('sms');
		$this->db->where('id',$sms);
		
		$result = $this->db->get()->row();
		return $result;
	}





	function search_sms_student( $send_student_id)
	{

	    	$this->db->select('*');
			$this->db->from('student');
			$this->db->where('id',$send_student_id);
			$result = $this->db->get()->row();

			return $result;

	}

	function pdf($data)
	{

			$result = `
			`;

			return $result;

	}




}
