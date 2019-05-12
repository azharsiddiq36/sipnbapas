<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 9:36
 */

class PenjaminController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Penjamin');
        $this->load->model('Model_pengguna');
        $this->load->model('Model_Napi');
        $this->load->model('Model_Pegawai');
        $this->load->helper('form');
        if($this->session->userdata('username')===null){
            redirect('iseng');
        }
        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Penjamin->tampilkan_data();
        $this->template->load('template','penjamin/index.php',$data);
    }

    function post()
    {
        $fotokk = null;
        $fotoktp = null;
        $fotosurat = null;
        $nama      = $this->input->post('nama');
        $nokk    = $this->input->post('nokk');
        $noktp    = $this->input->post('noktp');
        $tgl_lahir    = $this->input->post('tgl_lahir');
        $alamat    = $this->input->post('alamat');
        $pekerjaan    = $this->input->post('pekerjaan');
        $noktpnapi = $this->input->post('id_napi');
        $id_napi = explode("-",$noktpnapi);
        if(isset($_POST['submit'])){
        for ($i = 0;$i<3;$i++){
            if ($i==0){
                $config['upload_path']          = './upload/foto_penjamin';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1028;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('fotoktp')){
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                }
                else {
                    $fotoktp = 'upload/foto_penjamin/' . $this->upload->data('file_name');

                }
            }
            elseif ($i==1){
/*                $config['upload_path']          = './upload/foto_surat';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1028;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('fotosurat')){
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                }
                else {
                    $fotosurat = 'upload/foto_surat/' . $this->upload->data('file_name');
                }*/

            }
            elseif($i==2){
                $config['upload_path']          = './upload/foto_kk';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1028;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
//                $this->upload->do_upload('fotokk');
                if ( ! $this->upload->do_upload('fotokk')){
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                }
                else {
                    $fotokk = 'upload/foto_kk/' . $this->upload->data('file_name');

                }

            }
        }
            $data = array('nama' => $nama,
                'nokk' => $nokk,
                'noktp' => $noktp,
                'id_napi' => $id_napi[0],
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'fotoktp' => $fotoktp,
                'fotokk' => $fotokk,
                'fotosurat' => $fotosurat,
                'pekerjaan'=>$pekerjaan
            );
            $this->Model_Penjamin->add_penjamin($data);
            redirect('daftar_penjamin');

        }
        else{
            $this->template->load('template','penjamin/form_input.php');
        }

    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Penjamin->delete($id);
        redirect('daftar_penjamin');
    }
//    function hapus($id){
//        $where = array('id_Penjamin' => $id);
//        $this->Model_Penjamin->hapus_data($where,'Penjamin');
//        redirect('Penjamin');
//    }
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses siswa
            $id=$this->uri->segment(3);
            $nama      = $this->input->post('nama');
            $nokk    = $this->input->post('nokk');
            $noktp    = $this->input->post('noktp');
            $tgl_lahir    = $this->input->post('tgl_lahir');
            $alamat    = $this->input->post('alamat');
            $pekerjaan    = $this->input->post('pekerjaan');
            $data           = array('nama' => $nama,
                'nokk' => $nokk,
                'noktp' => $noktp,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'pekerjaan'=>$pekerjaan


            );
            $this->Model_Penjamin->edit($data,$id);
            redirect('daftar_penjamin');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Penjamin');
            $data['record']     =  $this->Model_Penjamin->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','penjamin/form_edit',$data);
        }
    }
    function disposisi(){
        $id=$this->uri->segment(3);
        $x = $this->Model_Penjamin->get_one($id)->row_array();
        $setuju = 'Disetujui';
        $data = array('status'=>$setuju);
        $this->Model_Penjamin->edit($data,$id);
//        $data = array('idpenjamin'=>$x['id_penjamin']);
//        $this->Model_Napi->edit($data,$x['id_napi']);
        if ($x['email']===null){
            $x['email'] = 'default@gmail.com';
        }
        $data1           = array(
            'username'=>$x['noktp'],
            'email'=>$x['email'],
            'password'=>md5($x['nokk']),
            'hak_akses' => 'penjamin'
        );
        $this->Model_pengguna->add_pengguna($data1);
        redirect('daftar_penjamin');
    }
    function pembimbing(){
        if (isset($_POST['submit'])){
            $id=$this->uri->segment(3);
            $pembimbing = $this->input->post('pembimbing');
//            $x = $this->Model_Penjamin->get_one($id)->row_array();
            $data = array('id_pembimbing'=>$pembimbing);
            $this->Model_Penjamin->edit($data,$id);
//            $this->Model_Napi->edit($data,$x['id_napi']);
            redirect('daftar_penjamin');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Penjamin');
            $data['record']     =  $this->Model_Penjamin->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','penjamin/form_pembimbing',$data);
        }
    }
    function disposisipenjamin(){
        $id=$this->uri->segment(3);
        $data = array('status'=>'Disetujui');
        $this->Model_Penjamin->edit($data,$id);
        redirect('persetujuan_penjamin');
    }
    function rincian(){
        $id = $this->uri->segment(3);
        $data['record'] =  $this->Model_Penjamin->get_one($id)->row_array();
        $this->template->load('template','penjamin/rincian',$data);
    }
}