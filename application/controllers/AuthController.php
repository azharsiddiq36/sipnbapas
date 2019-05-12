<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 13/02/19
 * Time: 11:09
 */

class AuthController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_pengguna');
        $this->load->model('Model_Pegawai');
        $this->load->helper('form');
        /*chek_session();*/
    }
    public function loginAction(){
        //$this->load->model('Model_pengguna');
        if (isset($_POST['submit'])){
            $username = $this->input->post('username');
            $password = $this->input->post('pass');
            $params = array('username'=>$username,
                            'password'=>md5($password));
            //var_dump($cek_login = $this->Model_pengguna->tampilkan_data());die;
            $cek_login = $this->Model_pengguna->login($params)->num_rows();
            if ($cek_login >0){

                    $datauser = $this->Model_pengguna->dataUser($params);
                    $this->session->set_userdata('username',$datauser['username']);
                $this->session->set_userdata('id_pegawai',$datauser['id_pegawai']);
                    $this->session->set_userdata('id_pengguna',$datauser['id_pengguna']);
                    $this->session->set_userdata('hak_akses',$datauser['hak_akses']);
                    $this->session->set_userdata('email',$datauser['email']);
                    if ($this->session->userdata('hak_akses') === 'administrator'){
                        redirect('dashboard_admin');
                    }
                    else{
                       redirect('dashboard');
                    }

            }
            else{
                $this->session->set_flashdata('alert','gagal');
                redirect('welcome');


            }
//            if ($params)
        }
    }
    function coba(){
        $data = $this->Model_pengguna->tampilkan_data()->result_array();
        $response = null;
        foreach ($data as $hasil){
            $response = array(array(
                "username"=>$hasil['username'],
                "password"=>$hasil['password'],
            ));
        }
//        $params = array('username'=>"admin",
//            'password'=>md5("aaaa1234"));
//        $data = $this->Model_pengguna->dataUser($params);
        echo json_encode($response);
    }
    function profile(){
       $this->template->load('template','pengguna/profile');
    }
    function ubah_password(){
        if ($this->input->post('username') !=null){
            $id = $this->session->userdata('id_pengguna');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            if ($password === $repassword){
                $params = array('password'=>md5($password));
                $this->Model_pengguna->edit($params,$id);
                $this->session->set_flashdata('alert','berhasil');

                redirect('profile');
            }
            else{
                $this->session->set_flashdata('alert','gagal');
                redirect('ubah_password');
            }
        }
        else{
            $this->template->load('template','pengguna/ubah_password');
        }
    }
}