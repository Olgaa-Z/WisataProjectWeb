<?php
class Berita_m extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function insert_db($data){
        $this->db->insert('berita',$data);
    }
        function select_db(){

            return $this->db->query("Select * FROM berita")->result();
            // return $this->db->query("Select t1.id_berita, t1.judul, t1.kategori, t1.isi, t1.gambar, t1.tanggal, t2.id_korong, t2.nama_korong
            // FROM berita t1
            // LEFT JOIN korong t2 ON (t2.id_korong = t1.id_korong)")->result();

            // return $this->db->query("Select t1.id_berita, t1.judul, t1.gambar, t2.id_korong, t2.nama_korong
            // FROM lembaga t1
            // LEFT JOIN korong t2 ON (t2.id_korong = t1.id_korong)")->result();
        }
       function delete_db($id){
            $this->db->where('id_berita',$id);
            $this->db->delete('berita');
        }
        function select_id($id){
            return $this->db->query("Select * FROM berita WHERE id_berita='$id'")->result();
        }
        function edit_db($id,$data){
            $this->db->where('id_berita',$id);
            $this->db->update('berita',$data);
        }
        
        function select_berita(){
        $query = $this->db->query("SELECT * FROM berita order by tanggal DESC limit 10");
        return $query->result();
    }
        function select_berita_where($id) {
        $query = $this->db->query("SELECT * FROM berita WHERE id_berita='$id'");
        return $query->result();
    }
}