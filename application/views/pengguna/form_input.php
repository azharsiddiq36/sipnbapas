<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Pengguna
					</span>
    <form class="form" method="post" action="<?php echo base_url()?>post_pengguna">
        <table class="wrap-input100">
            <tr>
                <td><label class="label"><a>Username</a></label></td>
                <td>:</td>
                <td>
                    <div class="wrap-input100 validate-input" data-validate = "Username tidak boleh kosong">
                        <input class="input100" type="text" name="username" placeholder="Nama" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Email</a></label></td>
                <td>:</td>
                <td>
                    <div class="wrap-input100 validate-input" data-validate = "email tidak boleh kosong">
                        <input class="input100" type="email" name="email" placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Password</a></label></td>
                <td>:</td>
                <td>
                    <div class="wrap-input100 validate-input" data-validate = "Password tidak boleh kosong">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label class="label"><a>Hak Akses</a></label></td>
                <td>:</td>
                <td>
                    <div class="wrap-input100 validate-input" data-validate = "Hak Akses tidak boleh kosong">
                        <select class="input100" name="hak_akses">
                            <option value="administrator">Administrator</option>
                            <option value="pembimbing kemasyarakatan">Pembimbing Kemasyarakatan</option>
                        </select>
                        <!--                                <input class="input100" type="text" name="tingkatijazah" placeholder="Tingkat Ijazah">-->
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
                    <td align="center" class="login100">
                        <button style="width: 90%" class="btn btn-danger">
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