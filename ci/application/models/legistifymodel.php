<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Legistifymodel extends CI_Model{
    function get_user_queries(){
		
		
		$retrieve = 'select * from queries ORDER BY time ASC';
		$tablename = 'queries';
		$result = $this->db->query($retrieve);
		if(!$result)
			echo 'No new Entries!!!';
		return $result->result();
    }
	function remove_query()
	{
		$retrieve = 'DELETE FROM queries t1 JOIN (SELECT min(time) AS min_time FROM queries) t2 WHERE t1.time  = t2.min_time';
		$result = $this->db->query($retrieve);
	}
}
?>