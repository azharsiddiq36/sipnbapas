<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->
<br>
<a style="margin-bottom: 10px" title="tambah" class="btn btn-success" href="<?php echo base_url()?>tambah_narapidana"> <label class="glyphicon glyphicon-plus"> Tambah Narapidana</label></a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor KTP</th>
                        <th>Foto KTP</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Tanggal Masuk</th>
                        <th>Perkara</th>
                        <th>Hukuman</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($record->result() as $r) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $no+1?> </td>
                            <td><?php echo $r->nama; ?></td>
                            <td><?php echo $r->noktp; ?></td>
                            <td><img src="<?php echo $r->fotoktp?>" style="width: 50px" alt = "IMG"></td>
                            <td><?php echo $r->tempat_lahir.", ".$r->tgl_lahir; ?></td>
                            <td><?php echo $r->jenis_kelamin; ?></td>
                            <td><?php echo $r->agama; ?></td>
                            <td><?php echo $r->alamat; ?></td>
                            <td><?php echo $r->tgl_masuk; ?></td>
                            <td><?php echo $r->perkara; ?></td>
                            <td><?php echo $r->hukuman; ?></td>
                            <td><?php
                                if ($r->keterangan !=null){
                                    if ($r->keterangan === 'B'){
                                        echo 'Bebas';
                                    }
                                    else{
                                        echo 'Cuti Bersyarat';
                                    }
                                }
                                else{
                                    echo "Belum Ditentukan";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('NapiController/edit/'.$r->id_napi);?>" title="Edit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                                <br>
                                <br>
                                <a href="<?php echo site_url('NapiController/rincian/'.$r->id_napi);?>" title="Rincian" class="btn btn-success"> <span class="glyphicon glyphicon-eye-open"></span></a>

                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
