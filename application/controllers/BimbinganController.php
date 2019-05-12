<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 9:36
 */

class BimbinganController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Penjamin');
        $this->load->model('Model_Bimbingan');
        $this->load->model('Model_Pegawai');
        $this->load->model('Model_Napi');
        $this->load->helper('form');
        $this->load->library('pdf');
        if($this->session->userdata('username')===null){
            redirect('iseng');
        }
        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Bimbingan->tampilkan_data();
        $this->template->load('template','bimbingan/index.php',$data);
//        elseif ($this->session->userdata('hak_akses'==='pegawai')){
//            $data ['record'] = $this->Model_Bimbingan->tampilkan_penjamin();
//            $this->template->load('template','bimbingan/index.php',$data);
//        }
    }

    function post(){
        if (isset($_POST['submit'])){
            $id_pembimbing = $this->session->userdata('id_pegawai');
            $tanggal = $this->input->post('tgl_bimbingan');
            $idpenjamin = $this->input->post('id_penjamin');
            $idnapi = $this->input->post('id_napi');
            $keterangan = $this->input->post('keterangan');

            $data = array('id_penjamin'=>$idpenjamin,
                'id_pegawai'=>$id_pembimbing,
                'id_napi'=>$idnapi,
                'tgl_surat'=>$tanggal,
                'bimbingan_keterangan'=>$keterangan
            );
            $this->Model_Bimbingan->add_bimbingan($data);
            redirect('bimbingan');
        }
        else{
            $data ['record'] = $this->Model_Penjamin->get_one($this->uri->segment(3));
            $this->template->load('template','bimbingan/form_input',$data);
        }
    }

//    function hapus($id){
//        $where = array('id_pengguna' => $id);
//        $this->Model_pengguna->hapus_data($where,'pengguna');
//        redirect('pengguna');
//    }
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses siswa
            $id=$this->uri->segment(3);
            $username    = $this->input->post('username');
            $hak_akses    = $this->input->post('hak_akses');
            $email  = $this->input->post('email');
            $data           = array('username'=>$username,
                'email'=>$email,
                'hak_akses'=>$hak_akses


            );
            $this->Model_pengguna->edit($data,$id);
            redirect('pengguna');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_pengguna');
            $data['record']     =  $this->Model_pengguna->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','pengguna/form_edit',$data);
        }
    }
    function cetak(){
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf -> Image(base_url().'upload/foto_surat/newspaper.png',20,10,10,10);
        // mencetak string
        $pdf->Cell(190,7,'Ayam Den Lapeh',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Daftar Bimbingan',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Pembimbing',1,0);
        $pdf->Cell(30,6,'Penjamin',1,0);
        $pdf->Cell(30,6,'Narapidana',1,0);
        $pdf->Cell(90,6,'Rincian',1,1);
        $pdf->SetFont('Arial','',10);
        $data = $this->Model_Bimbingan->tampilkan_data();
//        $mahasiswa = $this->load->get('mahasiswa')->result();
        foreach ($data->result() as $row){
            $pdf->Cell(30,6,$row->id_penjamin,1,0);
            $pdf->Cell(30,6,$row->id_pegawai,1,0);
            $pdf->Cell(30,6,$row->id_napi,1,0);
            $pdf->Cell(90,6,$row->rincian,1,1);
        }
        $pdf->Output();
    }
    function cetakpengantar(){
        $user = $this->session->userdata('id_pegawai');
        $id_user = $this->Model_Penjamin->getbykk($user)->row_array();
        $bimbingan = $this->Model_Bimbingan->get_one($id_user['id_penjamin'])->row_array();
        $pembimbing = $this->Model_Pegawai->get_one($id_user['id_pembimbing'])->row_array();
        $napi = $this->Model_Napi->get_one($id_user['id_napi'])->row_array();
        $tanggal = date('d');
        $bulan = date('m');
        $namabulan = null;
        switch ($bulan){
            case 1:$namabulan = 'January';break;
            case 2:$namabulan = 'Februari';break;
            case 3:$namabulan = 'Maret';break;
            case 4:$namabulan = 'April';break;
            case 5:$namabulan = 'Mei';break;
            case 6:$namabulan = 'Juni';break;
            case 7:$namabulan = 'Juli';break;
            case 8:$namabulan = 'Agustus';break;
            case 9:$namabulan = 'September';break;
            case 10:$namabulan = 'Oktober';break;
            case 11:$namabulan = 'November';break;
            case 12:$namabulan = 'Desember';break;
        }
        $tahun = date('20y');
        $x = substr($id_user['tgl_lahir'],6);
        $umur = $tahun-$x;
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('times','B',16);
        // mencetak string
        $pdf->Cell(190,7,'SURAT PERNYATAAN PENJAMIN',0,1,'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(190,7,'Yang bertanda tangan dibawah ini  :',0,1,'J');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'Nama           : '.$id_user['nama'], 0,1);
        $pdf->Cell(10,7,'Umur           : '.$umur.' tahun',0,1);
        $pdf->Cell(10,7,'Pekerjaan     : '.$id_user['pekerjaan'],0,1);
        $pdf->Cell(10,7,'Alamat         : '.$id_user['alamat'],0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->MultiCell(190,7,'Adalah '.strtoupper($id_user['nama']).' sebagai penjamin dari Narapidana '.strtoupper($napi['nama']).' yang sedang sedang menjalani pidana dilapas/Rutan Pekanbaru memberikan pernyataan apabila yang bersangkutan mendapatkan izin yang bersifat khusus maupun Assimilasi Cuti Menjelang Bebas (CMB), Cuti Bersyarat (CB) dan Pembebasan bersyarat dan Pembebasan Bersyarat (PB) maka :',0,'J',0,15);
        $pdf->MultiCell(190,7,'                     1. Kami bersedia menerima kembali yang bersangkutan untuk bertempat tinggal dirumah kami.
                     2. Kami sanggup membantu kehidupannya baik moril maupun materil.
                     3. Penjamin wajib mengingatkan kepada klien untuk melapor 2 kali dalam 1 bulan ke Balai
                         Permasyarakatan Klas II Pekanbaru sesuai waktu yang telah ditentukan oleh Pembimbing 
                         Kemasyarakatan (PK).
                     4. Apabila saya ingkar dengan persayratan tersebut berarti saya telah melakukan penipuan
                         dengan Pasal 378 KUHP dan bersedia dilaporkan kepada pihak berwajib.',0,'L',0);
        $pdf->MultiCell(190,7,'Demikian Surat Pernyataan ini saya buat dengan sebenarnya untuk dapat digunakan dengan seperlunya.',0,'J',0,15);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(190,10,"Pekanbaru, ".$tanggal.' '.$namabulan.' '.$tahun,0,1,'R');
        $pdf->Cell(10,10,'',0,1);

        $pdf->Cell(190,0,'Penjamin                   ',0,1,'R');
        $pdf->Cell(190,0,'Pembimbing Kemasyarakatan',0,1,'C');
        $pdf->Cell(190,0,'Asisten Pembimbing Kemasyarakatan',0,1,'L');
        $pdf->Cell(10,10,'',0,1);

        $pdf->Cell(160,5,'Materai',0,1,'R');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(190,0,''.strtoupper($id_user['nama']).'                   ',0,1,'R');
        $pdf->Cell(190,0,''.strtoupper($pembimbing['nama']),0,1,'C');

        $pdf->Cell(10,1,'',0,1);
        $pdf->Cell(190,0,'_________________      ',0,1,'R');
        $pdf->Cell(190,0,'_______________________',0,1,'C');
        $pdf->Cell(190,0,'_____________________________',0,1,'L');

        $pdf->Output();
    }
    function jadwal(){
        $data ['record'] = $this->Model_Bimbingan->tampilkan_data();
        $this->template->load('template','bimbingan/jadwalbimbingan.php',$data);
    }
    function ajx_surat(){

        $id = $this->input->post('id_bimbingan');
        $data = $this->Model_Bimbingan->ajx_surat($id)->result();
        if ($data){
            echo json_encode($data);
        }
        else{
            $respon['id_penjamin']='gagal';
            echo json_encode($respon);
        }
    }
    function riwayat(){
        $id = $this->input->post('id_penjamin');

        $data  = $this->Model_Bimbingan->getByPenjamin($id)->result();

        //$d ['penjamin'] = $this->Model_Penjamin->get_one($id)->row_array();
        if ($data){
            echo json_encode($data);
            //echo json_encode($d);
        }
        else{
            $respon['id_penjamin']='gagal';
            echo json_encode($respon);
        }

    }
    function listbimbingan(){
        $id = $this->session->userdata('id_pegawai');
        $data['record']= $this->Model_Bimbingan->disposisibimbingan($id);
        $this->template->load('template','bimbingan/pk_bimbingan.php',$data);
    }
    function persetujuanbimbingan(){
        $id = $this->session->userdata('id_pegawai');
        $data['record']= $this->Model_Bimbingan->disposisibimbingan($id);
        $this->template->load('template','bimbingan/pk_disposisi.php',$data);
    }
    function bukti_laporan(){
        $id = $this->session->userdata('id_pegawai');
        $data['record']= $this->Model_Bimbingan->disposisibimbingan($id);
        $this->template->load('template','bimbingan/bukti_laporan.php',$data);
    }
    function laporan(){
        $id=$this->uri->segment(3);
        $napi = $this->Model_Napi->get_one($id)->row_array();

        $border =0;
        $foto =base_url().$napi['fotoktp'];

        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $tahun = date('20y');
        $pdf->AddPage();
        $pdf->SetLineWidth(1);
        $pdf->Line(3,3,115,3);
        $pdf->Line(3,200,3,3);
        $pdf->Line(3,200,115,200);
        $pdf->Line(115,200,115,3);

//        $this->Line(10,36,138,36);
//        $pdf->SetLineWidth(0);
//        $pdf->Line(10,37,138,37);
        // setting jenis font yang akan digunakan
        $tanggal = date('d');
        $bulan = date('m');
        $namabulan = null;
        switch ($bulan){
            case 1:$namabulan = 'January';break;
            case 2:$namabulan = 'Februari';break;
            case 3:$namabulan = 'Maret';break;
            case 4:$namabulan = 'April';break;
            case 5:$namabulan = 'Mei';break;
            case 6:$namabulan = 'Juni';break;
            case 7:$namabulan = 'Juli';break;
            case 8:$namabulan = 'Agustus';break;
            case 9:$namabulan = 'September';break;
            case 10:$namabulan = 'Oktober';break;
            case 11:$namabulan = 'November';break;
            case 12:$namabulan = 'Desember';break;
        }
        $tahun = date('20y');
        $pdf->SetFont('times','B',14);
        $pdf->SetX(115);$pdf->Cell(150,0,'IDENTITAS',0,0);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('times','',12);
        $pdf->SetX(115);$pdf->Cell(150,0,'Nama',0,0);
        $pdf->SetX(150);$pdf->Cell(150,0,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,0,''.$napi['nama'],0,0);
        $pdf->Cell(10,7,'',0,1);
        $space = 13;
        $pdf->SetX(115);$pdf->Cell(150,0,'Tempat/Tgl Lahir',0,0);
        $pdf->SetX(150);$pdf->Cell(150,0,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,0,''.$napi['tempat_lahir'].','.$napi['tgl_lahir'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,13,'Kebangsaan',0,0);
        $pdf->SetX(150);$pdf->Cell(150,13,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,13,''.$napi['kebangsaan'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,26,'Suku',0,0);
        $pdf->SetX(150);$pdf->Cell(150,26,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,26,''.$napi['suku'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,39,'Agama',0,0);
        $pdf->SetX(150);$pdf->Cell(150,39,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,39,''.$napi['agama'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,52,'Pendidikan',0,0);
        $pdf->SetX(150);$pdf->Cell(150,52,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,52,''.$napi['pendidikan'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,65,'Pekerjaan',0,0);
        $pdf->SetX(150);$pdf->Cell(150,65,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,65,''.$napi['pekerjaan'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,78,'Alamat',0,0);
        $pdf->SetX(150);$pdf->Cell(150,78,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,78,''.$napi['alamat'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*7,'Nomor KTP',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space*7,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space*7,''.$napi['noktp'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*8,'Warna Kulit',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space*8,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space*8,''.$napi['warna_kulit'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*9,'Tinggi Badan',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space*9,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space*9,''.$napi['tinggi_badan'].' cm',0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*10,'Tanggal Masuk',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space*10,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space*10,''.$napi['tgl_masuk'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*11,'Hukuman',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space*11,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space*11,''.$napi['hukuman'],0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*12,'Perkara',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space*12,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space*12,''.$napi['perkara'],0,0);
        $pdf->SetFont('times','B',16);
        // mencetak string
        $pdf->Image(base_url().'upload/logo.png',37,5,40,40);
        $pdf->Cell(10,25,'',0,1);
        $pdf->Cell(100,7,'KEMENTRIAN HUKUM DAN HAM',0,1,'C');
        $pdf->Cell(100,7,'REPUBLIK INDONESIA',0,1,'C');
        $pdf->SetFont('times','',14);
        $pdf->Cell(100,7,'BALAI PERMASYARAKATAN (BAPAS) KELAS',0,1,'C');
        $pdf->Cell(100,7,'II PEKANBARU',0,1,'C');
        $pdf->SetFont('times','',11);
        $pdf->Cell(100,7,'Jalan Chandradimuka No.1 Km 20.5 Telp-(0765)65322',0,1,'C');
        $pdf->Cell(100,7,'Fax.(0761)65322 Pekanbaru - 28294',0,1,'C');
        $pdf->Cell(100,7,'Email: bapaspku@gmail.com',0,1,'C');
        $pdf->SetX(115);$pdf->Cell(150,$space+7,'Keterangan',0,0);
        $pdf->SetX(150);$pdf->Cell(150,$space+7,':',0,0);
        $pdf->SetX(152);$pdf->Cell(150,$space+7,''.$napi['keterangan'],0,0);


        $pdf->SetFont('times','B',14);
        $pdf->SetX(115);$pdf->Cell(150,$space*3,'Catatan',0,0);
        $pdf->SetFont('times','',10);
        $pdf->SetX(115);$pdf->Cell(150,$space*4,'1. Penegak hukum berpendapat bahwa anda masih dapat menjadi anggota masyarakat',0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*5,'2. Dengan Cuti Bersyarat Anda masih dapat memperbaiki diri',0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*6,'3. Setiap Perubahan Alamat Harus dilaporkan',0,0);
        $pdf->SetX(115);$pdf->Cell(150,$space*7,'4. INGATLAH!!! Apabila tidak mentaati peraturan anda langsung menjalani sisa masa pidana',0,0);
        $pdf->Cell(10,20,'',0,1);
        $pdf->SetFont('times','',15);
        $pdf->Cell(100,7,'KARTU BIMBINGAN DAN PENYULUHAN',0,1,'C');
        $pdf->Cell(100,7,'POS BAPAS SIAK SRI INDRAPURA',0,1,'C');
        $pdf->SetFont('times','',10);
        $pdf->SetX(115);$pdf->Cell(150,$space*2+9,'5. Bawalah kartu ini setiap anda datang melapor',0,0);
        $pdf->Image($foto,40,150,40,40);
        $pdf->Cell(10,10,'',0,1);


        $pdf->SetFont('times','',11);
        $pdf->Cell(100,7,'NOMOR REGISTER : '.$napi['id_napi'].'/'.$napi['keterangan'].'/'.$tahun,0,1,'C');

        $pdf->SetFont('times','',10);
        $pdf->SetX(230);$pdf->Cell(150,$space,'Pekanbaru, '.$tanggal.' '.$namabulan.' '.$tahun,0,0);
        $ttd = $this->Model_Pegawai->get_one($this->session->userdata('id_pegawai'))->row_array();
        $pdf->SetX(230);$pdf->Cell(150,$space+27.5,''.$ttd['nama'],0,0);

        $pdf->Output();
    }
    function tambah(){
        $data ['record'] = $this->Model_Penjamin->get_one($this->uri->segment(3))->result();
        $this->template->load('template','bimbingan/form_input',$data);
    }
    function cetak_riwayat(){
        $id=$this->uri->segment(3);
        $napi = $this->Model_Napi->get_one($id)->row_array();
        $penjamin = $this->Model_Penjamin->get_one($id)->row_array();
        $pembimbing = $this->Model_Pegawai->get_one($this->session->userdata('id_pegawai'))->row_array();
        $border =0;
        $foto =base_url().$napi['fotoktp'];
        $tanggal = date('d');
        $bulan = date('m');
        $namabulan = null;
        switch ($bulan){
            case 1:$namabulan = 'January';break;
            case 2:$namabulan = 'Februari';break;
            case 3:$namabulan = 'Maret';break;
            case 4:$namabulan = 'April';break;
            case 5:$namabulan = 'Mei';break;
            case 6:$namabulan = 'Juni';break;
            case 7:$namabulan = 'Juli';break;
            case 8:$namabulan = 'Agustus';break;
            case 9:$namabulan = 'September';break;
            case 10:$namabulan = 'Oktober';break;
            case 11:$namabulan = 'November';break;
            case 12:$namabulan = 'Desember';break;
        }
        $tahun = date('20y');
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $tahun = date('20y');
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('times','B',14);
        $pdf->Image(base_url().'upload/logo.png',20,20,25);
        //$pdf->Cell(10,25,'',0,1);

        $pdf->SetX(50);$pdf->Cell(130,7,'KEMENTRIAN HUKUM DAN HAM REPUBLIK INDONESIA',0,1,'C');
        $pdf->SetFont('times','',12);
        $pdf->SetX(50);$pdf->Cell(130,7,'BALAI PERMASYARAKATAN (BAPAS) KELAS II PEKANBARU',0,1,'C');
        $pdf->SetFont('times','',8);
        $pdf->SetX(50);$pdf->Cell(130,2,'Jalan Chandradimuka No.1 Km 20.5 Telp-(0765)65322 Fax.(0761)65322 Pekanbaru - 28294 Email: bapaspku@gmail.com',0,1,'C');
        $pdf->Line(10,44,195,44);
        $pdf->Line(10,44,195,44);
        $pdf->Cell(100,7,'',0,1,'C');
        // mencetak string
        $pdf->SetFont('times','B',12);
        $pdf->Cell(190,10,'RIWAYAT BIMBINGAN',0,1,'C');
        $pdf->SetX(30);$pdf->Cell(10,7,'Narapidana       : '.$napi['nama'], 0,1);
        $pdf->SetX(30);$pdf->Cell(10,7,'Penjamin           : '.$penjamin['nama'],0,1);
        $pdf->SetX(30);$pdf->Cell(10,7,'Alamat               : '.$napi['alamat'],0,1);
        $pdf->SetX(30);$pdf->Cell(10,7,'Perkara              : '.$napi['perkara'],0,1);
        $pdf->SetFont('times','B',11);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetX(30);$pdf->Cell(15,6,'Nomor',1,0);
        $pdf->Cell(35,6,'Tanggal Bimbingan',1,0);
        $pdf->Cell(100,6,'Keterangan',1,1);
        $data = $this->Model_Bimbingan->getByPenjamin($id);
        $pdf->SetFont('times','',11);
//        $mahasiswa = $this->load->get('mahasiswa')->result();
        $nomor = 1;
        foreach ($data->result() as $row){
            $pdf->SetX(30);$pdf->Cell(15,6,$nomor,1,0);
            $pdf->Cell(35,6,$row->tgl_surat,1,0);
            $pdf->Cell(100,6,$row->bimbingan_keterangan,1,1);
            $nomor++;
        }
        $pdf->Cell(10,7,'',0,1);
        
        // Memberikan space kebawah agar tidak terlalu rapat
        
        $pdf->Cell(10,2,'',0,1);
        $pdf->SetX(30);$pdf->MultiCell(150,7,'      Dengan ini menyatakan bahwa yang bersangkutan mendapatkan izin yang bersifat khusus maupun Assimilasi Cuti Menjelang Bebas (CMB), Cuti Bersyarat (CB) dan Pembebasan bersyarat dan Pembebasan Bersyarat (PB) maka :',0,'J',0,15);
        $pdf->MultiCell(190,7,'                     1. Penjamin bersedia menerima kembali yang bersangkutan untuk bertempat tinggal dirumah kami.
                     2. Penjamin sanggup membantu kehidupannya baik moril maupun materil.
                     3. Penjamin wajib mengingatkan kepada klien untuk melapor 2 kali dalam 1 bulan ke Balai
                         Permasyarakatan Klas II Pekanbaru sesuai waktu yang telah ditentukan oleh Pembimbing 
                         Kemasyarakatan (PK).
                     4. Apabila penjamin ingkar dengan persayratan tersebut berarti penjamin telah melakukan penipuan
                         dengan Pasal 378 KUHP dan bersedia dilaporkan kepada pihak berwajib.',0,'L',0);
        $pdf->SetX(30);$pdf->MultiCell(150,7,'Demikian surat riwayat bimbingan ini dibuat dengan sebenarnya untuk dapat digunakan dengan seperlunya.',0,'J',0,15);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(190,10,"Pekanbaru, ".$tanggal.' '.$namabulan.' '.$tahun,0,1,'R');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(175,0,'Penjamin                   ',0,1,'R');

        $pdf->SetX(30);$pdf->Cell(190,0,'Pembimbing Kemasyarakatan',0,1,'L');
        $pdf->Cell(10,10,'',0,1);

        $pdf->Cell(150,5,'Materai',0,1,'R');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(180,0,''.strtoupper($penjamin['nama']).'                   ',0,1,'R');
        $pdf->SetX(40);$pdf->Cell(190,0,''.strtoupper($pembimbing['nama']),0,1,'L');

        $pdf->Cell(10,1,'',0,1);
        $pdf->Cell(180,0,'_________________      ',0,1,'R');

        $pdf->SetX(30);$pdf->Cell(190,0,'_______________________',0,1,'L');

        $pdf->Output();
    }
}