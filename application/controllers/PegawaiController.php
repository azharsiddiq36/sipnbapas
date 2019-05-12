<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 9:36
 */

class PegawaiController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Pegawai');
        $this->load->model('Model_pengguna');
        $this->load->helper('form');
        if($this->session->userdata('username')===null){
            redirect('iseng');
        }
        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Pegawai->tampilkan_data();
        $this->template->load('template','pegawai/index.php',$data);
    }
    function add_pegawai(){
        $this->template->load('template','pegawai/form_input.php');
    }

    function post()
    {
        if(isset($_POST['submit'])){
            $nama      = $this->input->post('nama');
            $nip    = $this->input->post('nip');
            $jabatan    = $this->input->post('jabatan');
            $tmtjabatan    = $this->input->post('tmtjabatan');
            $namadiklat    = $this->input->post('namadiklat');
            $tahundiklat    = $this->input->post('tahundiklat');
            $pendidikan    = $this->input->post('pendidikan');
            $tingkat    = $this->input->post('tingkat');
            $tgl_lahir    = $this->input->post('tgl_lahir');
            $kgb    = $this->input->post('kgb');
            $pangkat    = $this->input->post('pangkat');
            $tmtpangkat = $this->input->post('tmtpangkat');
            $data           = array('nama'=>$nama,
                'nip'=>$nip,
                'pangkat'=>$pangkat,
                'tmtpangkat' => $tmtpangkat,
                'jabatan'=>$jabatan,
                'namadiklat'=>$namadiklat,
                'tahundiklat'=>$tahundiklat,
                'pendidikan'=>$pendidikan,
                'tingkatijazah'=>$tingkat,
                'tgl_lahir'=>$tgl_lahir,
                'kgb'=>$kgb,
                'tmtjabatan'=>$tmtjabatan
            );
            $this->Model_Pegawai->add_Pegawai($data);
            $get_id = $this->Model_Pegawai->get($nip)->row_array();
            $data1=array(
                'username' => $nip,
                'password' => md5($nip),
                'hak_akses'=>'pembimbing kemasyarakatan',
                'id_pegawai'=>$get_id['id_pegawai'],
                'foto' => 'default.jpg',
                'email'=>'default@gmail.com'
            );
            $this->Model_pengguna->add_pengguna($data1);

            redirect('daftar_pegawai');
        }
        else{
            echo "Data Gagal";
        }
    }

    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Pegawai->delete($id);
        redirect('daftar_pegawai');
    }
//    function hapus($id){
//        $where = array('id_Pegawai' => $id);
//        $this->Model_Pegawai->hapus_data($where,'Pegawai');
//        redirect('Pegawai');
//    }
    function edit()
    {
        if(isset($_POST['submit'])){
            $id = $this->uri->segment(3);
            $nama      = $this->input->post('nama');
            $nip    = $this->input->post('nip');
            $jabatan    = $this->input->post('jabatan');
            $tmtjabatan    = $this->input->post('tmtjabatan');
            $namadiklat    = $this->input->post('namadiklat');
            $tahundiklat    = $this->input->post('tahundiklat');
            $pendidikan    = $this->input->post('pendidikan');
            $tingkat    = $this->input->post('tingkat');
            $tgl_lahir    = $this->input->post('tgl_lahir');
            $kgb    = $this->input->post('kgb');
            $pangkat    = $this->input->post('pangkat');
            $tmtpangkat = $this->input->post('tmtpangkat');
            $data           = array('nama'=>$nama,
                'nip'=>$nip,
                'pangkat'=>$pangkat,
                'tmtpangkat' => $tmtpangkat,
                'jabatan'=>$jabatan,
                'namadiklat'=>$namadiklat,
                'tahundiklat'=>$tahundiklat,
                'pendidikan'=>$pendidikan,
                'tingkatijazah'=>$tingkat,
                'tgl_lahir'=>$tgl_lahir,
                'kgb'=>$kgb,
                'tmtjabatan'=>$tmtjabatan
            );
            $this->Model_Pegawai->edit($data,$id);
            redirect('daftar_pegawai');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Pegawai');
            $data['record']     =  $this->Model_Pegawai->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','pegawai/form_edit',$data);
        }
    }

}