<?php

/**
 * 
 */
// $BASE_URL = "https://app.moota.co/api/v1/";
class Moota extends CI_Controller {
	


	function __construct()
	{
		// parent::__construct();
		// if(empty($key)){
		// 	die(json_encode(['message' => 'No key send','code' => 403]));
		// }
	}

	function list_bank($key){
		$ch = curl_init();
		$headers = [
			"Accept: application/json",
    		"Authorization: Bearer $key"
		];

		curl_setopt($ch, CURLOPT_URL, "https://app.moota.co/api/v1/bank/");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_exec($ch);
	}

	function mutasi($key, $bankid, $count){
		$ch = curl_init();
		$headers = [
			"Accept: application/json",
    		"Authorization: Bearer $key"
		];

		curl_setopt($ch, CURLOPT_URL, "https://app.moota.co/api/v1/bank/$bankid/mutation/recent/$count");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_exec($ch);
	}

	function getsaldo($key){

	$curl = curl_init();
	$headers= [
    "Accept: application/json",
    "Authorization: Bearer $key"
	];

	curl_setopt($curl, CURLOPT_URL, 'https://app.moota.co/api/v1/balance');
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_exec($curl);
	}

	function historysaldo(){
		$nomorTelp = $this->input->post("noTelp");
		$amount = $this->input->post("amount");
		$desc = $this->input->post("description")
		$note = $this->input->post("note");
		$type = $this->input->post("type");
		$balance = $this->input->pist("balance");

		
	}
}

?>