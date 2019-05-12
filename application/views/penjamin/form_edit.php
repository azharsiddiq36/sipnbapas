<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Pengguna
					</span>
            <form class="wrap100-form validate-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('PenjaminController/edit/').$record['id_penjamin']?>">
                <table class="wrap-input100">
                    <tr>
                        <td><label class="label"><a>Nama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
                                <input class="input100" type="text" name="nama" placeholder="Nama" value="<?php echo $record['nama']?>" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Nomor Kartu Keluarga</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nomor Kartu Keluarga tidak boleh kosong">
                                <input class="input100" type="text" name="nokk" placeholder="Nomor KK" value="<?php echo $record['nokk']?>" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Nomor KTP</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "No KTP tidak boleh kosong">
                                <input class="input100" type="text" name="noktp" placeholder="Nomor KTP" required value="<?php echo $record['noktp']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tanggal Lahir</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Tanggal Lahir tidak boleh kosong">
                                <input class="input100" value="<?php echo $record['tgl_lahir']?>" type="text" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						        </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Alamat</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
                                <textarea style="padding-top: 5px" class="input100" type="text" name="alamat" placeholder="Alamat"><?php echo $record['alamat']?></textarea>
                                <span class="focus-input100"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Pekerjaan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "No KTP tidak boleh kosong">
                                <input class="input100" type="text" name="pekerjaan" placeholder="Nomor KTP" required value="<?php echo $record['pekerjaan']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="container-login100-form-btn">
                    <table width="100%">
                        <tr>
                            <td  style="width: 100%">
                                <a title="Back" class="btn btn-danger" href="<?php echo base_url()?>penjamin"> <label class="glyphicon glyphicon-plus"> Batal</label></a>
                            </td>
                            <td align="center" style="width: 100%">
                                <button class="btn btn-success" name="submit" type="submit" value="submit">
                                    Simpan
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
</div>

