<?php

class Berita extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_m');
    }

    function form() {
        $this->load->view('berita_form_v');
    }

    function insert() {
        $nm_file = time() . '.png';
        $config['upload_path'] = './assets/upload_berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data();
            $data = array(
                // 'id_korong' => $this->input->post('id_korong'),
                'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'isi' => $this->input->post('isi'),
                'gambar' => $gambar['file_name']
            );
            $this->Berita_m->insert_db($data);
            redirect('Berita/form');
        } else {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo json_encode($error);
        }
    }

    function index() {
        $this->load->view('berita_v');
    }

    function delete($id_berita) {
        $this->Berita_m->delete_db($id_berita);
        redirect('Berita');
    }

    function select_by($id_berita) {

        $data['berita'] = $this->Berita_m->select_id($id_berita);
        $this->load->view('berita_form_edit_v', $data);
    }

    function edit() {
        $id_berita = $this->input->post('id_berita');
        $nm_file = $this->input->post('nm_foto');
        $config['upload_path'] = './assets/upload_berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data();
            $data = array(
                // 'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'isi' => $this->input->post('isi'),
                'gambar' => $gambar['file_name']
            );
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'isi' => $this->input->post('isi')
               
            );  
        }


        $this->Berita_m->edit_db($id_berita, $data);
        redirect('Berita');
    }
     

}
