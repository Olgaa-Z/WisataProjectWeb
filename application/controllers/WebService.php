<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Webservice
 *
 * @author Lenovo
 */
class Webservice extends CI_Controller{

     //WEBSERVICE BERITA
    function select_berita() {
        //menampilkan semua data dari tabel berita
        $response = array();
        $data['data'] = array();

        $result = $this->Berita_m->select_db();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_berita'] = $value->id_berita;
                $response['judul'] = $value->judul;
                $response['isi'] = $value->isi;
                $response['gambar'] = $value->gambar;
                $response['tanggal'] = $value->tanggal;
                array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }

    function select_by_get_berita($id) {
        //menampilkan data dari tabel berita berdasarkan id_berita
        //id_berita dapat dari get
        $response = array();
        $data['data'] = array();

        $result = $this->Berita_m->select_berita_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_berita'] = $value->id_berita;
                $response['judul'] = $value->judul;
                $response['isi'] = $value->isi;
                $response['gambar'] = $value->gambar;
                $response['tanggal'] = $value->tanggal;

                array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }
    


}
