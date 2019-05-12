<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Narapidana
					</span>
            <form enctype="multipart/form-data" class="form" method="post" action="<?php echo base_url()?>add_napi">
                <table class="wrap-input100">
                    <tr>
                        <td><label class="label"><a>Nama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
                                <input class="input100" type="text" name="nama" placeholder="Nama">
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
                                <input class="input100" type="text" name="noktp" placeholder="No KTP">
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
                            <div class="form-group">
                                <input type="file" name="fotonapi" class="dropify" data-height="200">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tempat Lahir</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Tempat Lahir Tidak Boleh Kosong">
                                <input class="input100" type="text" name="tempatlahir" placeholder="Tempat Lahir">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Jenis Kelamin</a></label></td>
                        <td>:</td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" name="jk" value="Pria" checked><span style="font-size: 15px">Pria</span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" value="Wanita"><span style="font-size: 15px">Wanita</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Tanggal Lahir</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Pangkat tidak boleh kosong">
                                <input class="input100" type="text" id="datepicker" name="tgl_lahir" placeholder="Tanggal Lahir">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="label"><a>Agama</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Hak Akses tidak boleh kosong">
                                <select class="input100" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                                <!--                                <input class="input100" type="text" name="tingkatijazah" placeholder="Tingkat Ijazah">-->
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
                            <div class="wrap-input100 validate-input" data-validate = "Hukuman tidak boleh kosong">
                                <textarea class="input100" type="text" name="alamat" style="padding-top: 15px" placeholder="alamat"></textarea>
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
                                <input class="input100" id="datepicker2" type="text" name="tgl_masuk" placeholder="Tanggal Masuk">
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
                                <input class="input100" type="text" name="kebangsaan" placeholder="Kebangsaan">
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
                                <input class="input100" type="text" name="suku" placeholder="Suku">
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
                                <input class="input100" type="text" name="pendidikan" placeholder="Pendidikan">
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
                                <input class="input100" type="text" name="pekerjaan" placeholder="Pekerjaan">
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
                                <input class="input100" type="text" name="warna_kulit" placeholder="Warna Kulit">
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
                                <input class="input100" type="text" name="tinggi_badan" placeholder="Tinggi Badan">
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
                                <input class="input100" type="text" name="perkara" placeholder="Perkara">
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
                            <table width=400px >
                                <td>
                                    <div class="wrap-input100 validate-input" data-validate = "Hukuman tidak boleh kosong">
                                        <input class="input100" type="text" name="tahun" placeholder="tahun">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                                    </div>
                                </td>
                                <td>
                                    <label>Tahun</label>
                                </td>
                                <td>
                                    <div class="wrap-input100 validate-input" data-validate = "Hukuman tidak boleh kosong">
                                        <input class="input100" type="text" name="bulan" placeholder="bulan">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                                    </div>
                                </td>
                                <td>
                                    <label>Bulan</label>
                                </td>
                            </table>

                        </td>
                    </tr>


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