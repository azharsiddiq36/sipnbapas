<!--<a title="Edit" class="btn btn-default"> <span class="glyphicon glyphicon-plus">Tambah</span></a>-->

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="table">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <form enctype="multipart/form-data" class="form" method="post" action="">
                        <table class="wrap-input100">
                            <tr>
                                <td><label class="label"><a>Nomor Surat</a></label></td>
                                <td>:</td>
                                <td align="center">
                                    <table>
                                        <td>
                                            <div class="wrap-input100 validate-input" style="width: 75%">
                                                <input class="input100" type="text" name="nomorsurat" id="nosurat" placeholder="Nomor Surat">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i>                                            </span>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="label"><a>Tanggal</a></label>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <div class="wrap-input100 validate-input" style="width: 80%">
                                                <input style="" class="input100" type="text" id="tglsurat" name="tanggal" placeholder="Tanggal Surat">
                                                <span class="focus-input100"></span>
                                                <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i>                                            </span>
                                            </div>
                                        </td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "3" align="center">
                                    <button id="btnCari" style="width: 98%" class="btn btn-success" name="submit" type="button" value="submit">
                                        <i style="margin-right: 20px" class="glyphicon glyphicon-search"> Periksa</i>
                                    </button>
                                </td>
                            </tr>
                        </table>

                    </form>
                    <form method="post" action="<?php echo base_url()?>keteranganNapi">
                        <div id="biodatanapi">

                        </div
                    </form>

            </div>
        </div>
    </div>



