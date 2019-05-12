<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="table">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Narapidana</th>
                    <th>Penjamin</th>
                    <th>Nomor KK</th>
                    <th>Nomor KTP</th>
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
                        <td><?php echo $r->status;

                            ?>
                        </td>
                        <?php
                        $no++;
                    }
                    if($this->session->userdata('hak_akses')==='pembimbing kemasyarakatan' ){
                        ?>
                        <tr class="odd gradeX">

                        <td><?php echo $no+1?> </td>
                        <td><?php echo $getnapi['nama'] ?></td>
                        <td><?php echo $r->nama; ?></td>
                        <td><?php echo $r->nokk; ?></td>
                        <td><?php echo $r->noktp; ?></td>
                        <td>                            <a title="print" class="btn btn-success" href="<?php echo site_url('BimbinganController/laporan/'.$getnapi['id_napi']);?>" >
                                <span class="glyphicon glyphicon-print "></span><br></a></td>

                            <?php
                        }
                        $no++;

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
