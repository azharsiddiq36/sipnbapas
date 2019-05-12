<div class="p-0" style="margin-bottom: 10px">
<a title="tambah" class="btn btn-success" href="<?php echo base_url()?>tambah_pegawai"> <span class="glyphicon glyphicon-plus">Tambah Pegawai</span></a>
</div>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Pangkat</th>
                        <th>TMT Pangkat</th>
                        <th>Jabatan</th>
                        <th>TMT Jabatan</th>
                        <th>Nama Diklat</th>
                        <th>Tahun Diklat</th>
                        <th>Pendidikan</th>
                        <th>Tingkat Ijazah</th>
                        <th>Tanggal Lahir</th>
                        <th>KGB</th>
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
                            <td><?php echo $r->nip; ?></td>
                            <td><?php echo $r->pangkat; ?></td>
                            <td><?php echo $r->tmtpangkat; ?></td>
                            <td><?php echo $r->jabatan; ?></td>
                            <td><?php echo $r->tmtjabatan; ?></td>
                            <td><?php echo $r->namadiklat; ?></td>
                            <td><?php echo $r->tahundiklat; ?></td>
                            <td><?php echo $r->pendidikan; ?></td>
                            <td><?php echo $r->tingkatijazah; ?></td>
                            <td><?php echo $r->tgl_lahir; ?></td>
                            <td><?php echo $r->kgb; ?></td>

<!--                            <td><a title="Edit" class="btn btn-default" href="--><?php //echo site_url('Guru/edit/'.$r->nip);?><!--"><span class="glyphicon glyphicon-pencil"></span></a></td>-->
                            <td>
                                <a href="<?php echo site_url('PegawaiController/edit/'.$r->id_pegawai);?>" title="Edit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                                <br><br>
                                <a title="Delete" class="btn btn-danger" href="<?php echo site_url('PegawaiController/delete/'.$r->id_pegawai)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <span class="glyphicon glyphicon-trash"></span></a>
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
