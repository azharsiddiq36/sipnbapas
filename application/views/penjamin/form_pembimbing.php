<div class="limiter">
            <span class="login100-form-title">
						Formulir Tambah Narapidana
					</span>
    <form enctype="multipart/form-data" class="form" method="post" action="<?php echo site_url('PenjaminController/pembimbing/').$record['id_penjamin']?>">
        <table class="wrap-input100">
            <tr>
                <td><label class="label"><a>Pembimbing</a></label></td>
                <td>:</td>
                <td>
                    <div class="wrap-input100 validate-input" data-validate = "Pembimbing tidak boleh kosong">
                        <select class="input100" type="text" name="pembimbing" placeholder="Pembimbing">
                            <?php
                            $a = $this->Model_Pegawai->tampilkan_data();

                            foreach ($a->result() as $r){
                                if($record['id_pembimbing'] === $r->id_pegawai){

                                    ?>

                                    <option value="<?php echo $r->id_pegawai?>" selected><?php echo $r->nama?></option>
                                    <?php
                                }
                                else{
                                    ?>

                                    <option value="<?php echo $r->id_pegawai?>"><?php echo $r->nama?></option>
                                    <?php
                                }
                                ?>
                                <?php
                            }
                            ?>

                        </select>
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


    </form>
</div>