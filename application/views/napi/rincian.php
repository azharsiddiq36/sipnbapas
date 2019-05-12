<div class="limiter">
            <span class="login100-form-title">
						Narapidana
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
                <td><label class="label"><a>No KTP</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['noktp']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Tempat Lahir</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['tempat_lahir']?></a></label>
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
                <td><label class="label"><a>Agama</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['agama']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Kebangsaan</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['kebangsaan']?></a></label>
                </td>

            </tr>
            <tr>
                <td><label class="label"><a>Suku</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['suku']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Pendidikan</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['pendidikan']?></a></label>
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
                <td><label class="label"><a>Warna Kulit</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['warna_kulit']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Tinggi Badan</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['tinggi_badan']?></a></label>
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
                <td><label class="label"><a>Tanggal Masuk</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['tgl_masuk']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Perkara</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['perkara']?></a></label>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Hukuman</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><?= $record['hukuman']?></a></label>
                </td>
            </tr>

            <tr>
                <td><label class="label"><a>Foto KTP</a></label></td>
                <td>:</td>
                <td>
                    <label class="label"><a><img src="<?= base_url().$record['fotoktp']?>" style="width: 50px"></a></label>
                </td>
            </tr>

        </table>
        <div class="container-login100-form-btn">
        <a href="<?php echo site_url('NapiController/edit/'.$this->uri->segment(3));?>" style="width: 100%" title="Edit" class="btn btn-success"> Edit</a>
        </div>

</div>