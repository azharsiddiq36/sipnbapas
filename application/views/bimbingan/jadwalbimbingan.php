<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->
<a style="margin-bottom: 10px;margin-left: 80%" title="Print Surat Pengantar" class="btn btn-default" href="<?php echo base_url()?>cetakpengantar"> <label class="glyphicon glyphicon-print"> Surat Pengantar</label></a>
<?php
$user = $this->session->userdata('username');
$id_user = $this->Model_Penjamin->getbykk($user)->row_array();
$bimbingan = $this->Model_Bimbingan->get_one($id_user['id_penjamin'])->row_array();
$pembimbing = $this->Model_Pegawai->get_one($id_user['id_pembimbing'])->row_array();
$napi = $this->Model_Napi->get_one($id_user['id_napi'])->row_array();
$rincian = json_decode($bimbingan['rincian']);
?>
<br>
<table>
<tr>
    <td style="padding-right: 5px"><label>Penjamin</label></td>
    <td><label>:</label></td>
    <td style="padding-left: 5px"><?php echo $id_user['nama']?></td>
</tr>
<tr>
    <td style="padding-right: 5px"><label>Pembimbing Kemasyarakatan</label></td>
    <td><label>:</label></td>
    <td style="padding-left: 5px"><?php echo $pembimbing['nama']?></td>
</tr>
<tr>
    <td style="padding-right: 5px"><label>Narapidana</label></td>
    <td><label>:</label></td>
    <td style="padding-left: 5px"><?php echo $napi['nama']?></td>
</tr>
</table>
<div class="panel panel-primary">

    <div class="panel-body">
        <div class="table">

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pembahasan</th>

                </tr>
                </thead>
                <tbody>
                <?php

                    $no = 0;
                    if($rincian != null){
                    foreach ($rincian as $tes) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $no+1;?> </td>
                            <td>
                                <?php echo $tes->tgl_bimbingan; ?>
                            </td>
                            <td>
                                <?php echo $tes->keterangan; ?>
                            </td>
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
