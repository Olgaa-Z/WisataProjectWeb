<?php

/**
 * 
 */
// $BASE_URL = "https://app.moota.co/api/v1/";
class Moota extends CI_Controller {
	

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

	// function saldo($key){
	// 	$ch = curl_init();
	// 	$headers = [
	// 		"Accept: application/json",
 //    		"Authorization: Bearer FSSnC6UKtwXtrzgDf8nozC8pHhYZfluoYHrt3v4ixdQuZBBRo5"
	// 	];

	// 	curl_setopt($ch, CURLOPT_URL, "http://103.28.59.187/api/moota");
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	// 	curl_exec($ch);
	// }

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

	function transaksiSaldo(){
		date_default_timezone_set("Asia/Jakarta");
		$nomorTelp = $this->input->post("noTelp");
		$amount = $this->input->post("amount");
		$desc = $this->input->post("description");
		$note = $this->input->post("note");
		$type = $this->input->post("type");
		$balance = $this->input->post("balance");
		$saldoUser = $this->login->getSaldoUser($nomorTelp)->row()->saldo;

		if  ($type == 'K') {
			$kredit = $saldoUser- $amount;
			if ($kredit < 0){
				echo json_encode(['message' => "Saldo anda tidak cukup!", 'code' => 300 ]);
		}else{
				$dataHistory =[
					'date' => date('Y-m-d  H:i:s'),
					'description' => $desc,
					'amount' => $amount,
					'type' => $type,
					'balance' => $kredit,
					'note' => $note,
					'notelp' => $nomorTelp
				];

				$history = $this->crud->insert("history_mutasi_user", $dataHistory);
				$dataUpdatesaldo = ['saldo' => $kredit];
				$where = ['notelp' => $nomorTelp];

				$updateSaldo = $this->crud->update("user", $dataUpdatesaldo, $where);

				if (($history) && ($updateSaldo > 0)){
					echo json_encode(['message' => "Transaksi Berhasil!", 'code' => 200 ]);
				}else{
					echo json_encode(['message' => "Transaksi gagal!", 'code' => 500 ]);
				}
		}
		}else{
		$debit = $saldoUser + $amount;
		$dataHistory =[
					'date' => date('Y-m-d H:i:s'),
					'description' => $desc,
					'amount' => $amount,
					'type' => $type,
					'balance' => $debit,
					'note' => $note,
					'notelp' => $nomorTelp
				];

				$history = $this->crud->insert("history_mutasi_user", $dataHistory);
				$dataUpdatesaldo = ['saldo' => $debit];
				$where = ['notelp' => $nomorTelp];

				$updateSaldo = $this->crud->update("user", $dataUpdatesaldo, $where);

				if (($history) && ($updateSaldo > 0)){
					echo json_encode(['message' => "Transaksi Berhasil!", 'code' => 200 ]);
				}else{
					echo json_encode(['message' => "Transaksi gagal!", 'code' => 500 ]);
				}
	}
}

		function tampilHistory($notelp, $page = 10){
			$data['history'] = [];
			$history = $this->login->getHistoryTransaksi($notelp, $page);
			if ($history->num_rows() > 0) {
				foreach ( $history->result() as $h){
				$tmp= [];
				$tmp['date']= $h->date;
				$tmp['balance']= $h->balance;
				$tmp['description']= $h->description;
				$tmp['type']= $h->type;
				$tmp['amount']= $h->amount;

				array_push($data['history'], $tmp);
			}

			$data['message'] = 'data ditemukan';
			$data['code'] = '200';

			echo json_encode($data);
		}else{
			echo json_encode(['message' => "Tidak ada data!", 'code' => 500 ]);
			
		}
	}

	function getsaldouser($notelp){
			$data['saldo']= [];
			$saldo = $this->login->getSaldoUser($notelp);
			if ($saldo->num_rows()>0){
				foreach ($saldo->result() as $s) {
					$tmp = [];
					$tmp['saldo'] = $s->saldo;

					array_push($data['saldo'], $tmp);

				}

				$data['message'] = 'data ditemukan';
				$data['code'] = '200';

				echo json_encode($data);

			}else{
				echo json_encode(['message' => "something wrong!", 'code' => 500 ]);
			}
	}


	function requestSaldo(){
		date_default_timezone_set("Asia/Jakarta");
		$email = $this->input->post("email");
		$kodeUnik = $this->input->post("kode-unik");
		$nominal = $this->input->post("nominal");

		$dataInsert = [
			'email' => $email,
			'kode_unik' => $kodeUnik,
			'nominal' => $nominal,
		];

		$res = $this->crud->insert("request_saldo", $dataInsert);
		if($res > 0){
			echo json_encode(['message' => "Berhasil", "code" => "200"]);
		}else{
			echo json_encode(['message' => "Terjadi Kesalahan", "code" => "404"]);
		}
	}

//admin ngelist saldo untuk user
	function getListSaldoRequest(){
		$data['data'] = [];
		$query = $this->crud->listRequestSaldo();
		foreach ($query->result() as $r) {
			$tmp = [];
			$tmp['email'] = $r->email;
			$tmp['nama'] = $r->nama;
			$tmp['nominal'] = $r->nominal;
			$tmp['kode_unik'] = $r->kode_unik;
			$tmp['tanggal'] = $r->request_timestamp;

			array_push($data['data'], $tmp);

		}

		if(!empty($data['data'])){
			$data['message'] = "data ditemukan";
			$data['code'] = 200;
			echo json_encode($data);
		}else{
			echo json_encode(['message' => 'tidak ada data', 'code' => "404"]);
		}
	}

}

?>