<?php
class Usermodel extends CI_Model{

 	function __construct()
 	{
    	// Call the Model constructor
    	parent::__construct();
 	}

 	function get_user_profile_info($uid){
 		$this->db->select('*');		
 	 	$this->db->from('users');
 	 	$this->db->where('id', $uid);
 	 	$rs=$this->db->get(); 	    
		return $rs->row_array();
 	}

 	function get_quiz_subject_list(){
 		$this->db->select('*');		
 	 	$this->db->from('examinations');
 	 	$rs=$this->db->get(); 	    
		return $rs->result_array();
 	}

 	function get_totalUsers(){
 		$this->db->select("count(*) as no");		
 	 	$this->db->from('users');
 	 	$rs=$this->db->get(); 	
 	 	return $rs->result();    
 	}
/*
 	function get_totalPlayers(){
 		$this->db->select('count(*) as player ');		
 		$this->db->select('(select  id from users_exams ) ' , FLASE);		
 		// $this->db->select('count(id)(select  id from users_exams group by user_id )');		
 	 	$this->db->from('users_exams' );
 	 	$this->db->group_by('user_id' );
 	 	$rs=$this->db->get(); 	
 	 	return $rs->result();  
 		 // select Count(*) from (select  id from users_exams group by user_id ) as player
 	}
 	*/

 	function get_totalPlayers(){
 		$rowCount =  $this->db->count_all_results('users_exams');		
 		$this->db->select('(select  id from users_exams group by user_id )');		
 	 	$this->db->from('users_exams as player' );
 	 	$rs=$this->db->get(); 	
 	 	return $rs->result();  
 		 // select Count(*) from (select  id from users_exams group by user_id ) as z
 	}
 
	

}

?>