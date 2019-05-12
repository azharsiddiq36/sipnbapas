<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Narapidana
					</span>
            <form enctype="multipart/form-data" class="form" method="post" action="<?php echo site_url('NapiController/edit/').$record['id_napi']?>">
                <table class="wrap-input100">
                    <tr>
                        <td><label class="label"><a>Nama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
                                <input required class="input100" type="text" name="nama" value="<?php echo $record['nama']?>" placeholder="Nama" readonly>
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
                            <div class="wrap-input100 validate-input" data-validate = "No Ktp tidak boleh kosong">
                                <input required class="input100" type="number" name="noktp" placeholder="No Ktp" value="<?php echo $record['noktp']?>"readonly >
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Foto</a></label></td>
                        <td>:</td>
                        <td>
                            <div style="margin: 10px" data-validate = "Foto Ktp tidak boleh kosong">
                                <img src="<?php echo base_url().$record['fotoktp']?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tanggal Lahir</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Pangkat tidak boleh kosong">
                                <input required value="<?php echo $record['tgl_lahir']?>" class="input100" type="text" id="datepicker" name="tgl_lahir" placeholder="Tanggal Lahir"readonly>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tanggal Masuk</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Pangkat tidak boleh kosong">
                                <input class="input100" id="datepicker2" type="text" required value="<?php echo $record['tgl_masuk']?>" name="tgl_masuk" placeholder="Tanggal Masuk"readonly>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Perkara</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" value="<?php echo $record['perkara']?>" required type="text" name="perkara" placeholder="Perkara"readonly>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Hukuman</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Hukuman tidak boleh kosong">
                                <input class="input100" type="text" name="hukuman" placeholder="Hukuman" required value="<?php echo $record['hukuman']?>"readonly>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Keterangan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama diklat tidak boleh kosong">
                                <select class="input100" name="keterangan">
                                    <option value="cb">Cuti Bersyarat</option>
                                    <option value="b">Bebas</option>
                                </select>
						</span>

                            </div>
                        </td>
                    </tr>
<!--                    <tr>
                        <td><label class="label"><a>Pembimbing</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "KGB tidak boleh kosong">
                                <select class="input100" type="text" name="pembimbing" placeholder="Pembimbing">
                                    <?php
/*                                    $a = $this->Model_Pegawai->tampilkan_data();
                                    foreach ($a->result() as $r){
                                        if($record['id_pembimbing'] === $r->id_pegawai){
                                        */?>
                                        <option value="<?php /*echo $r->id_pegawai*/?>" selected><?php /*echo $r->nama*/?></option>
                                    <?php
/*                                        }
                                        else{
                                         */?>
                                            <option value="<?php /*echo $r->id_pegawai*/?>"><?php /*echo $r->nama*/?></option>
                                        <?php
/*                                            }
                                    */?>
                                    <?php
/*                                    }
                                    */?>

                                </select>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>-->
                </table>

                <div class="container-login100-form-btn">
                    <table width="100%">
                        <tr>
                            <td align="center" class="login100">
                                <button style="width: 90%" class="btn btn-danger" name="submit" type="submit" value="submit">
                                    Batal
                                </button>
                            </td>
                            <td align="center">
                                <button style="width: 80%" class="btn btn-success" name="submit" type="submit" value="submit">
                                    Simpan
                                </button>
                            </td>
                        </tr>
                    </table>

                </div>


            </form>
</div>