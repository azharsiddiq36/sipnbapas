<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="table">
            <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                <form method="post" action="">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Penjamin</th>
                    <th>Nomor KK</th>
                    <th>Nomor KTP</th>
                    <th>Pembimbing</th>
                    <th>Narapidana</th>
                    <th>Tanggal Lahir</th>
                    <th>alamat</th>
                    <th>pekerjaan</th>
                    <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                foreach ($record->result() as $r) {

                    $getnapi = $this->Model_Penjamin->get_napi($r->id_napi)->row_array();
                    $getpembimbing = $this->Model_Penjamin->get_pembimbing($r->id_pembimbing)->row_array();
                    ?>

                    <?php
                    if ($getpembimbing['nip']===$this->session->userdata('id_pegawai')){
                        ?>
                        <tr class="odd gradeX">
                        <?php

                        ?>
                        <td><?php echo $no+1?> </td>
                        <td><?php echo $r->nama; ?></td>
                        <td><?php echo $r->nokk; ?></td>
                        <td><?php echo $r->noktp; ?></td>
                        <td>
                            <?php
                            if ($r->id_pembimbing===null){
                                echo "Belum Ada";
                                ?>
                                <br><br>
                                <a title="Tentukan Pembimbing" class="btn btn-success" href="<?php echo site_url('PenjaminController/pembimbing/'.$r->id_penjamin);?>" onclick="return confirm('Apakah anda yakin ingin Menentukan Pembimbing?')">
                                    <span class="glyphicon glyphicon-user "></span><br>
                                    <label style="font-size: 10px">Tentukan<br>Pembimbing</label>
                                </a>
                                <?php
                            }
                            else{
                                echo $getpembimbing['nama'];
                            }
                            ?><br></td>
                        <td><?php echo $getnapi['nama'] ?><br>
                            <img style="width: 80px" src="<?php echo base_url().$getnapi['fotoktp']?>"></td>
                        <td><?php echo $r->tgl_lahir; ?></td>
                        <td><?php echo $r->alamat; ?></td>
                        <td><?php echo $r->pekerjaan; ?></td>
                        <?php

                    }
                    $idpenjamin = null;
                    $n = null;
                    $p = null;

                    if($this->session->userdata('hak_akses')==='pembimbing kemasyarakatan' ){
                        ?>

                        <tr class="odd gradeX">
                        <td><?php echo $no+1?> </td>
                        <td><?php echo $r->nama; ?></td>
                        <td><?php echo $r->nokk; ?></td>
                        <td><?php echo $r->noktp; ?></td>
                        <td><?php echo $getpembimbing['nama'];?><br></td>
                        <td><?php echo $getnapi['nama'] ?></td>
                        <td><?php echo $r->tgl_lahir; ?></td>
                        <td><?php echo $r->alamat; ?></td>
                        <td><?php echo $r->pekerjaan; ?></td>
                        <td>
                        <?php
                        if ($r->status === 'Disetujui'){
                            ?>
                            <input type="text" class="id_penjamin" value="<?= $r->id_penjamin?>" style="width: 1px;color: white" readonly>
                            <button href="#" data-nama = "<?= $r->nama?>" data-isi = "<?= $r->id_penjamin?>" type="button" class="btn btn-success btnView" data-toggle="modal" data-target="#exampleModal">
                                <?php
                                $idpenjamin = 13;
                                $n = $r->nama;
                                $p = $getnapi['nama'];
                                ?>

                                <span class="glyphicon glyphicon-eye-open "></span>
                            </button>

                            <?php
                        }
                    }
                    $no++;
                }
                ?>
                </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Riwayat Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <br>
                <div id="cetak">

                </div>
                <br>
                    <div class="table">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Penjamin</th>
                                <th>Narapidana</th>
                                <th>Tanggal Bimbingan</th>
                                <th>Keterangan</th>
                            </tr>
                            <tbody class = "tb_bimbingan">



                            </tbody>
                            </thead>
                        </table>
                        <?php
                        if ($getnapi['keterangan'] == null){
                            ?>
                            <span id="status">Status Pembebasan : <a class = 'btn btn-success' type="button" href="<?php echo site_url('NapiController/keteranganNapi/'.$getnapi['id_napi'])?>">Belum di Tentukan</a></span>
                        <?php
                        }
                        else{
                            $status;
                            if ($getnapi['keterangan'] === 'CB'){
                                $status = 'Cuti Bersyarat';
                            }
                            else{
                                $status = 'Bebas';
                            }
                            ?>
                            <span>Status Pembebasan : <?php echo $status?></span>
                        <?php
                        }
                        ?>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="btnBb"></a>
            </div>
        </div>
    </div>
</div>
