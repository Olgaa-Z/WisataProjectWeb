<?php

/**
 * 
 */
// $BASE_URL = "https://app.moota.co/api/v1/";
class Wisata extends CI_Controller {


	function addWisata(){
		$namaWisata = $this->input->post('namawisata');
		$deskripsi = $this->input->post('deskripsi');
		$alamat = $this->input->post('alamat');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$tanggal = $this->input->post('tanggal');
		$notelp = $this->input->post('notelp');
		$wisata = time(); 

		//proses upload
		if(move_uploaded_file($_FILES["files"]["tmp_name"], "./asset/wisata/".$wisata.'.jpg')){

			//prepare for data
			$dataInsert =['id_wisata' => $wisata,
			'nama_wisata' => $namaWisata,
			'deskripsi' => $deskripsi,
			'alamat' => $alamat,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'tanggal' => $tanggal,
			'notelp' => $notelp,
			];

			$wis = $this->crud->insert('wisata', $dataInsert);

			$dataFoto = ['foto' => $wisata.'.jpg', 'tanggal' => $tanggal, 'id_wisata' => $wisata];

			$foto = $this->crud->insert('foto', $dataFoto);

			if ($wis == true && $foto == true ){
				echo json_encode(['message' => 'insert data berhasil', 'code' => 200]);
			}else{
				echo json_encode(['message' => 'terjadi kesalahan', 'code' => 500]);
			}

		}else{
			echo json_encode(['message' => 'upload gagal', 'code' => 500]);
		}

		//configure for upload
		// $config['upload_path']='./asset/wisata';
		// $config['allowed_types']='png|jpg';
		// $config['overwrite'] = true;
		// $config['file_name'] = $wisata;       
		// $config['max_size'] = 0;


		// $this->load->library('upload', $config);

		// if($this->upload->do_upload("files")){
		// 	$metaData = $this->upload->data();


		// 	//prepare for data
		// 	$dataInsert =['id_wisata' => $wisata,
		// 	'nama_wisata' => $namaWisata,
		// 	'deskripsi' => $deskripsi,
		// 	'alamat' => $alamat,
		// 	'latitude' => $latitude,
		// 	'longitude' => $longitude,
		// 	'tanggal' => $tanggal,
		// 	'notelp' => $notelp,
		// 	];

		// 	$wis = $this->crud->insert('wisata', $dataInsert);

		// 	$dataFoto = ['foto' => $metaData['file_name'], 'tanggal' => $tanggal, 'id_wisata' => $wisata];

		// 	$foto = $this->crud->insert('foto', $dataFoto);

		// 	if ($wis == true && $foto == true ){
		// 		echo json_encode(['message' => 'insert data berhasil', 'code' => 200]);
		// 	}else{
		// 		echo json_encode(['message' => 'terjadi kesalahan', 'code' => 500]);
		// 	}


	}
}

?>