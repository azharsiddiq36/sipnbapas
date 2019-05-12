<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->
<a style="margin-bottom: 10px" title="Print" class="btn btn-default" href="<?php echo base_url()?>BimbinganController/cetak"> <label class="glyphicon glyphicon-print">Print</label></a>
    <div class="panel panel-primary">

        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <?php
                        if ($this->session->userdata('hak_akses')==='pegawai'){

                        }
                        else{
                            ?>
                            <th>Pembimbing</th>
                        <?php
                        }
                        ?>

                        <th>Penjamin</th>
                        <th>Narapidana</th>
                        <th>Kasus</th>
                        <th>Tanggal<br>Bimbingan</th>
                        <th>Pembahasan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor = 0;
                    if ($this->session->userdata('hak_akses')==='pegawai'){

                    foreach ($record->result() as $r) {
                        $getnapi = $this->Model_Bimbingan->get_napi($r->id_napi)->row_array();
                        $getpegawai = $this->Model_Bimbingan->get_pegawai($r->id_pegawai)->row_array();
                        $getpenjamin = $this->Model_Bimbingan->get_penjamin($r->id_penjamin)->row_array();
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $nomor+1?> </td>
                            <!--<td><?php /*echo $getpegawai['nama']; */?></td>-->
                            <td><?php echo $getpenjamin['nama']; ?></td>
                            <td><?php echo $getnapi['nama']; ?></td>
                            <td><?php echo $getnapi['perkara']; ?></td>
                            <td><?php
                                $rincian = json_decode($r->rincian);
                                $no =1;
                                foreach ($rincian as $tes){
                                    echo 'Pertemuan Ke-'.$no.' => '.$tes->tgl_bimbingan.',<br>';
                                    $no++;
//                                        echo $tes->tgl_bimbingan.'<br>';
                                }
                                //                                    sort($baru);
                                /*                                    for($i = 0;$i<$index;$i++){
                                                                        */?><!--
                                        <?php /*echo $baru[$i];*/?><br>
                                    --><?php
                                /*                                                            }
                                                                    */?>

                            </td>
                            <td><?php
                                $no = 0;
                                foreach ($rincian as $tes){
                                    $no++;
                                    echo 'Pembahasan Ke-'.$no.' =>'.$tes->keterangan.',<br>';
//                                        echo $tes->tgl_bimbingan.'<br>';
                                }
                                ?></td>
<!--                            <td><a title="Edit" class="btn btn-default" href="--><?php //echo site_url('Guru/edit/'.$r->nip);?><!--"><span class="glyphicon glyphicon-pencil"></span></a></td>-->

                        </tr>
                        <?php

                        $nomor++;
                    }
                    }
                    else{
                        $no = 0;
                        foreach ($record->result() as $r) {
                            $getnapi = $this->Model_Bimbingan->get_napi($r->id_napi)->row_array();
                            $getpegawai = $this->Model_Bimbingan->get_pegawai($r->id_pegawai)->row_array();
                            $getpenjamin = $this->Model_Bimbingan->get_penjamin($r->id_penjamin)->row_array();
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no+1?> </td>
                                <td><?php echo $getpegawai['nama']; ?></td>
                                <td><?php echo $getpenjamin['nama']; ?></td>
                                <td><?php echo $getnapi['nama']; ?></td>
                                <td><?php echo $getnapi['perkara']; ?></td>
                                <td><?php
                                    $rincian = json_decode($r->rincian);
                                    $nomor =1;
                                    foreach ($rincian as $tes){
                                        echo 'Pertemuan Ke-'.$nomor.' => '.$tes->tgl_bimbingan.',<br>';
                                        $nomor++;
//                                        echo $tes->tgl_bimbingan.'<br>';
                                    }
//                                    sort($baru);
/*                                    for($i = 0;$i<$index;$i++){
                                        */?><!--
                                        <?php /*echo $baru[$i];*/?><br>
                                    --><?php
/*                                                            }
                                    */?>

                                </td>
                                <td><?php
                                    $nomor = 0;
                                    foreach ($rincian as $tes){
                                        $nomor++;
                                        echo 'Pembahasan Ke-'.$nomor.' =>'.$tes->keterangan.',<br>';
//                                        echo $tes->tgl_bimbingan.'<br>';
                                    }
                                    ?></td>
                                <!--                            <td><a title="Edit" class="btn btn-default" href="--><?php //echo site_url('Guru/edit/'.$r->nip);?><!--"><span class="glyphicon glyphicon-pencil"></span></a></td>-->

                            </tr>
                            <?php

                            $no++;
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
