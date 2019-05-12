<div class="limiter">
            <span class="login100-form-title">
						Penjamin
					</span>

        <table class="wrap-input100">
            <tr>
                <td><label class="label"><a>Nama</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['nama']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>No KK</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['nokk']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>No KTP</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['noktp']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Tanggal Lahir</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['tgl_lahir']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Alamat</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['alamat']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Pekerjaan</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['pekerjaan']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Status</a></label></td>
                <td>:</td>

                <td>
                    <label class="label"><a><?= $record['status']?></a></label>
                </td>

            </tr>
            <tr>
                <td><label class="label"><a>Foto KTP</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><img src="<?= base_url().$record['fotoktp']?>" style="width: 50px"></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Foto KK</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><img src="<?= base_url().$record['fotokk']?>" style="width: 50px"></a></label>
                </td>
            </tr>

        </table>
        <div class="container-login100-form-btn">
        <a href="<?php echo site_url('PenjaminController/edit/'.$this->uri->segment(3));?>" style="width: 100%" title="Edit" class="btn btn-success"> Edit</a>
        </div>

</div>