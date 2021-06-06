<?php
class Loginmodel extends CI_Model{

 	function __construct()
 	{
    	// Call the Model constructor
    	parent::__construct();
 	}

 	function check_phone_number($phone_number){
		$this->db->select('id');
 	 	$this->db->from('users');
 	 	$this->db->where('phone_no', $phone_number);	
 	 	return  $this->db->count_all_results(); 
	}

	function user_registration($data){
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
	
	function last_user_info(){
		$this->db->select('*');		
 	 	$this->db->from('users');
 	 	$this->db->order_by("id", " DESC");
 	 	$rs=$this->db->get(); 	    
		return $rs->row_array();
	}

}

?>