<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 9:36
 */

class NapiController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('username')===null){
            redirect('iseng');
        }
        $this->load->model('Model_Napi');
        $this->load->model('Model_Penjamin');
        $this->load->model('Model_Pegawai');

        /*chek_session();*/
    }

    function index()
    {
        $data ['record'] = $this->Model_Napi->tampilkan_data();
        $this->template->load('template', 'napi/index.php', $data);
    }

    function add_napi()
    {
        $this->template->load('template', 'napi/form_input.php');
    }

    public function post()
    {

        if (isset($_POST['submit'])) {
            $nama = $this->input->post('nama');
            $noktp = $this->input->post('noktp');
            $foto = null;
            $tgl_lahir = $this->input->post('tgl_lahir');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $perkara = $this->input->post('perkara');
            $tahun = $this->input->post('tahun');
            $bulan = $this->input->post('bulan');
            $hukuman = $tahun." tahun ".$bulan." bulan";
            $keterangan = $this->input->post('keterangan');
            $tempat_lahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $agama = $this->input->post('agama');
            $alamat = $this->input->post('alamat');
            $kebangsaan = $this->input->post('kebangsaan');
            $suku = $this->input->post('suku');
            $pendidikan = $this->input->post('pendidikan');
            $warna_kulit = $this->input->post('warna_kulit');
            $tinggi_badan = $this->input->post('tinggi_badan');
            $pekerjaan = $this->input->post('pekerjaan');
            $config['upload_path']          = './upload/foto_napi/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1028;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('fotonapi')){
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }else{
                $foto = 'upload/foto_napi/'.$this->upload->data('file_name');
                $data           = array('nama'=>$nama,
                    'noktp'=>$noktp,
                    'fotoktp'=>$foto,
                    'tempat_lahir'=>$tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'jenis_kelamin'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'tgl_masuk'=>$tgl_masuk,
                    'perkara'=>$perkara,
                    'hukuman' => $hukuman,
                    'pendidikan'=>$pendidikan,
                    'pekerjaan'=>$pekerjaan,
                    'warna_kulit'=>$warna_kulit,
                    'tinggi_badan'=>$tinggi_badan,
                    'kebangsaan'=>$kebangsaan,
                    'suku'=>$suku,
                    'keterangan'=>$keterangan,
                );

                $this->Model_Napi->add_napi($data);
                redirect('daftar_narapidana');
            }

        }else{

        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Napi->delete($id);
        redirect('daftar_narapidana');
    }
//    function hapus($id){
//        $where = array('id_pengguna' => $id);
//        $this->Model_pengguna->hapus_data($where,'pengguna');
//        redirect('pengguna');
//    }
    function edit()
    {
        if(isset($_POST['submit'])){
            $id=$this->uri->segment(3);
            $nama = $this->input->post('nama');
            $noktp = $this->input->post('noktp');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $perkara = $this->input->post('perkara');
            $tahun = $this->input->post('tahun');
            $bulan = $this->input->post('bulan');
            $hukuman = $tahun." tahun ".$bulan." bulan";
            $keterangan = $this->input->post('keterangan');
            $tempat_lahir = $this->input->post('tempatlahir');
            $jk = $this->input->post('jk');
            $agama = $this->input->post('agama');
            $alamat = $this->input->post('alamat');
            $kebangsaan = $this->input->post('kebangsaan');
            $suku = $this->input->post('suku');
            $pendidikan = $this->input->post('pendidikan');
            $warna_kulit = $this->input->post('warna_kulit');
            $tinggi_badan = $this->input->post('tinggi_badan');
            $pekerjaan = $this->input->post('pekerjaan');

            //$foto = 'upload/foto_napi/'.$this->upload->data('file_name');
            $data           = array('nama'=>$nama,
                'noktp'=>$noktp,
                'tempat_lahir'=>$tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin'=>$jk,
                'agama'=>$agama,
                'alamat'=>$alamat,
                'tgl_masuk'=>$tgl_masuk,
                'perkara'=>$perkara,
                'hukuman' => $hukuman,
                'pendidikan'=>$pendidikan,
                'pekerjaan'=>$pekerjaan,
                'warna_kulit'=>$warna_kulit,
                'tinggi_badan'=>$tinggi_badan,
                'kebangsaan'=>$kebangsaan,
                'suku'=>$suku,
                'keterangan'=>$keterangan,
            );
            $this->Model_Napi->edit($data,$id);
            if ($this->session->userdata('hak_akses'==='administrator')){
                redirect('daftar_narapidana');
            }
            else{
                redirect('bimbingan');
            }

        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Napi');
            $data['record']     =  $this->Model_Napi->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','napi/form_edit',$data);
        }
    }
    function suratpengantar(){
        if (isset($_POST['submit'])){

        }else{
            redirect('pengantar_surat');
        }
    }
    function detailNapiAjx(){
        $data = $this->Model_Napi->tampilkan_data()->result();
        echo json_encode($data);
    }
    function keteranganNapi(){
        $id=  $this->uri->segment(3);
        $this->load->model('Model_Napi');
        $data['record']     =  $this->Model_Napi->get_one($id)->row_array();
        //$this->load->view('siswa/form_edit',$data);
        $this->template->load('template','napi/form_pembebasan',$data);


    }
    function rincian(){
        $id = $this->uri->segment(3);
        $data['record'] =  $this->Model_Napi->get_one($id)->row_array();
        $this->template->load('template','napi/rincian',$data);
    }
}