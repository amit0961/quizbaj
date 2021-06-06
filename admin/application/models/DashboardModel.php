<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboardModel extends CI_Model{

 	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


/**
 ***********************************************************************
 * @Start Global Section of Reseller ***********************************
 ***********************************************************************
*/

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function get_totalUsers(){
        $this->db->select("*");        
        $this->db->from('users');
        $rs=$this->db->get();   
        return $rs->result();    
    }

		

	
		 	


}

?>