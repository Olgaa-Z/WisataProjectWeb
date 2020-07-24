<?php
class Apiservice_m extends CI_Model{  
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function insert_db($data){
        $this->db->insert('foto',$data);
    }

        function select_db(){

            return $this->db->query("Select * FROM foto")->result();
        }

        function select_id($id){
            return $this->db->query("Select * FROM foto WHERE id_foto='$id'")->result();
        }
        
        function select_berita(){
        $query = $this->db->query("SELECT * FROM foto order by tanggal DESC limit 10");
        return $query->result();
    }
        function select_berita_where($id) {
        $query = $this->db->query("SELECT * FROM foto WHERE id_foto='$id'");
        return $query->result();
    }
    
} 