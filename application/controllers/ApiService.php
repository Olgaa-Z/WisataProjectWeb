<?php

class ApiService extends CI_Controller{


    function select_foto() {
        //menampilkan semua data dari tabel berita
        $response = array();
        $data['data'] = array();

        $result = $this->Apiservice_m->select_db();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_foto'] = $value->id_foto;
                $response['foto'] = $value->foto;
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

    function select_by_get_foto($id) {
        //menampilkan data dari tabel berita berdasarkan id_berita
        //id_berita dapat dari get
        $response = array();
        $data['data'] = array();

        $result = $this->Apiservice_m->select_foto_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_foto'] = $value->id_berita;
                $response['foto'] = $value->foto;
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



    function select_gallery() {
        //menampilkan semua data dari tabel category
        $response = array();
        $data['data'] = array();

        // $result = $this->Berita_m->select_berita();

        $result = $this->Apiservice_m->select_db();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['nama_wisata'] = $value->nama_wisata;
                $response['id_foto'] = $value->id_foto;
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

    function select_by_get_gallery($id) {
        //menampilkan data dari tabel category berdasarkan category_id
        //id_category dapat dari get

        $response = array();
        $data['data'] = array();

        $result = $this->Apiservice_m->select_gallery_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_foto'] = $value->id_foto;
                $response['foto'] = $value->foto;

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
