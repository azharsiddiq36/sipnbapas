<a style="margin-bottom: 10px" title="tambah" class="btn btn-success" href="<?php echo base_url()?>add_pengguna"> <label class="glyphicon glyphicon-plus"> Tambah Pengguna</label></a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Hak akses</th>

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
                            <td><?php echo $r->username; ?></td>
                            <td><?php echo $r->email; ?></td>
                            <td><?php echo $r->hak_akses; ?></td>
<!--                            <td><a title="Edit" class="btn btn-default" href="--><?php //echo site_url('Guru/edit/'.$r->nip);?><!--"><span class="glyphicon glyphicon-pencil"></span></a></td>-->
                            <td>
                                <a href="<?php echo site_url('PenggunaController/edit/'.$r->id_pengguna);?>" title="Edit" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
                                <a title="Delete" class="btn btn-danger" href="<?php echo site_url('PenggunaController/delete/'.$r->id_pengguna)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <span class="glyphicon glyphicon-trash"></span></a>
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

