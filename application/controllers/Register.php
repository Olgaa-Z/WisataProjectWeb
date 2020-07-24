 <?php

 date_default_timezone_set("Asia/Jakarta");

class Register extends CI_Controller{

    function doRegister(){
        $noTelp = $this->input->post("notelp");
        $nama = $this->input->post("nama");
        $email = $this->input->post("email");
        $alamat = $this->input->post("alamat");
        $terdaftarPada = date("Y-m-d H:i:s");

        $dataInsert =['notelp' => $noTelp, 'nama' => $nama, 'email'=> $email, 'alamat'=> $alamat, 'terdaftar_pada'=> $terdaftarPada];

        if ($this->crud->insert("user", $dataInsert)){
            echo json_encode(['message' => "registrasi berhasil", 'code'=> 200]);

        }else {
            echo json_encode(['message' => "registrasi gagal", 'code'=> 500]);
        }
    }

    function getDetail(){
        $noTelp = $this->input->post("notelp");
        $data['data'] = [];
        $detail = $this->login->getSaldoUser($noTelp);
        if($detail->num_rows() > 0 ){
            $data['message'] =" data ditemukan ! ";
            $data['code'] = 200;
            $data['data'] = $detail -> result();
            echo json_encode($data);
        }else {
            echo json_encode(['message' => "Nomor Telepon Tidak terdaftar Silahkan Registrasi dulu", 'code'=> 404]);
        }
    }

}

?>

        

