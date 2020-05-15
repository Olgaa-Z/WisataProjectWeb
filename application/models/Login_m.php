<?php
class Login_m extends CI_Model
{
	
	function login($username,$password)
	{
		$query=$this->db->query("select * from usert where user_username = '$username' and user_password='$password'");
		return $query;
	}
}