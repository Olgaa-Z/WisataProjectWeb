 <?php
class Login extends CI_Controller{

function select() {
            //menampilkan semua data dari tabel berita
            $response = array();
            $data['data'] = array();
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $result = $this->Login_m->login($username,md5($password))->result();

            if (sizeof($result) > 0) {
                foreach ($result as $value) {
                    $response['user_username'] = $value->user_username;
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

        

