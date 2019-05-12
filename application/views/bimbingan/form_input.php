<div class="limiter">
            <span class="login100-form-title">
						Tambah Bimbingan
					</span>
            <form enctype="multipart/form-data" class="form" method="post" action="<?php echo base_url()?>bimbinganpost">
                <table class="wrap-input100">
                        <?php
                        $id_napi = null;
                        $penjamin = null;
                        $pembimbing = null;
                        $id_penjamin = null;
                        foreach ($record as $r){
                            $id_napi = $r->id_napi;
                            $penjamin = $r->nama;
                            $id_penjamin = $r->id_penjamin;
                            $pembimbing = $r->id_pembimbing;
                        }
                        $mNapi = $this->Model_Napi->get_one($id_napi)->row_array();
                        $tanggal = date('d-m-20y');
                        ?>
                    <tr>
                                <td><label class="label"><a>Penjamin</a></label></td>
                                <td>:</td>
                                <td>
                                    <div class="wrap-input100 validate-input" data-validate = "Pangkat tidak boleh kosong">
                                        <input class="input100" type="text" name="penjamin" value="<?php echo $penjamin?>" placeholder="Penjamin" readonly>
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                                    </div>
                                </td>

                    </tr>
                    <tr>
                        <td><label class="label"><a>Narapidana</a></label></td>
                        <td>:</td>
                        <td>

                            <div class="wrap-input100 validate-input" data-validate = "Narapidana tidak boleh kosong">
                                <input class="input100" type="text" readonly name="napi" value="<?php echo $mNapi['nama']?>" placeholder="Narapidana">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td><label class="label"><a>Tanggal Bimbingan</a></label></td>
                        <td>:</td>
                        <td>
                            <div class="wrap-input100 validate-input" data-validate = "Pangkat tidak boleh kosong">
                                <input class="input100" type="text" required id="datepicker" name="tgl_bimbingan" value="<?php echo $tanggal?>" readonly placeholder="Tanggal Bimbingan">
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
                            <div class="wrap-input100 validate-input" data-validate = "Keterangan tidak boleh kosong">
                                <textarea style="padding-top: 10px" class="input100" name="keterangan" placeholder="Keterangan" required></textarea>
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
                <input style="color: white" type="text" value="<?php echo $id_napi?>" name="id_napi">
                <input style="color: white" type="text" value="<?php echo $id_penjamin?>" name="id_penjamin">
            </form>
</div>