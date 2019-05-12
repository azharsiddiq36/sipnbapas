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
                                <input required class="input100" type="text" name="nama" value="<?php echo $record['nama']?>" placeholder="Nama">
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
                                <input required class="input100" type="number" name="noktp" placeholder="No Ktp" value="<?php echo $record['noktp']?>" >
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
                                <input required value="<?php echo $record['tgl_lahir']?>" class="input100" type="text" id="datepicker" name="tgl_lahir" placeholder="Tanggal Lahir">
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
                                <input class="input100" id="datepicker2" type="text" required value="<?php echo $record['tgl_masuk']?>" name="tgl_masuk" placeholder="Tanggal Masuk">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Kebangsaan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" type="text" name="kebangsaan" placeholder="Kebangsaan" value="<?php echo $record['kebangsaan']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Suku</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" type="text" name="suku" placeholder="Suku" value="<?php echo $record['suku']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Pendidikan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" type="text" name="pendidikan" placeholder="Pendidikan" value="<?php echo $record['pendidikan']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Pekerjaan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $record['pekerjaan']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Warna Kulit</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" type="text" name="warna_kulit" placeholder="Warna Kulit" value="<?php echo $record['warna_kulit']?>">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tinggi Badan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Jabatan tidak boleh kosong">
                                <input class="input100" type="text" name="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $record['tinggi_badan']?>">
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
                                <input class="input100" value="<?php echo $record['perkara']?>" required type="text" name="perkara" placeholder="Perkara">
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
                                <input class="input100" type="text" name="hukuman" placeholder="Hukuman" required value="<?php echo $record['hukuman']?>">
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

                                <textarea class="input100" name="keterangan" required placeholder="Keterangan" style="padding-top:5px;height: 80px;"><?php echo $record['keterangan']?></textarea>

                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
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