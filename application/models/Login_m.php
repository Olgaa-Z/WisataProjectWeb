<?php
class Login_m extends CI_Model
{
	
	// function login($username,$password)
	// {
	// 	$query=$this->db->query("select * from usert where user_username = '$username' and user_password='$password'");
	// 	return $query;
	// }

	function getSaldoUser($noTelp){
		return $this->db->query("select  * from user where notelp in ('$noTelp')");
	}
 
	function getHistoryTransaksi($notelp, $page){
		return $this->db->query("select * from history_mutasi_user where notelp in ('$notelp') ORDER BY date DESC limit $page");
	}
}