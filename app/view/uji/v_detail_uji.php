<body id="page-dashboard" class="page-dashboard crud hasil">
    <?php require_once '/../part/header.php'; ?>
    <div id="main">
        <div class="container clearfix">
            <div class="title"><i class="md md-folder"></i>Detail Hasil Uji Kualitas Kayu</div>
            <div class="card clearfix section">
                <div class="card-body">
<!--                    <form>-->
<!--                        --><?php //foreach ($this->hasil as $key => $value) {
//                            $cek = explode('-', $value['tanggal_uji']);
//                            require '/../part/tanggal.php'; ?>
<!--                            <div class="form-group clearfix">-->
<!--                                <label>ID User</label>-->
<!--                                <input class="input-area" type="text" value="--><?php //echo $value['id_user']; ?><!--" readonly>-->
<!--                                --><?php //$id_user = $value['id_user']; ?>
<!--                            </div>-->
<!--                            <div class="form-group clearfix">-->
<!--                                <label>Nama</label>-->
<!--                                <input class="input-area" type="text" value="--><?php //echo $value['nama']; ?><!--" readonly>-->
<!--                            </div>-->
<!--                            <div class="form-group clearfix">-->
<!--                                <label>Tanggal Uji</label>-->
<!--                                <input class="input-area" type="text" value="--><?php //echo $tanggal . ' ' . $bulan . ' ' . $tahun ?><!--" readonly>-->
<!--                            </div>-->
<!--                            <div class="form-group clearfix">-->
<!--                                <label>Grade</label>-->
<!--                                <input class="input-area" type="text" value="--><?php //echo $value['grade'] . ' - ' . $value['syarat'] ?><!--" readonly>-->
<!--                            </div>-->
<!--                        --><?php //} ?>
<!--                        <div class="form-group clearfix">-->
<!--                            <div class="desktop">-->
<!--                                <table>-->
<!--                                    <thead>-->
<!--                                        <tr>-->
<!--                                            <th>Pertanyaan</th>-->
<!--                                            <th>Nilai Ketetapan</th>-->
<!--                                            <th>Nilai Inputan</th>-->
<!--                                            <th>Jumlah</th>-->
<!--                                        </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                        --><?php //foreach ($this->nilai as $key => $value) { ?>
<!--                                            <tr>-->
<!--                                                <td>--><?php //echo $value['pertanyaan']; ?><!--</td>-->
<!--                                                <td>--><?php //echo $value['nilai']; ?><!--</td>-->
<!--                                                <td>--><?php //echo $value['nilai_input']; ?><!--</td>-->
<!--                                                <td>--><?php //echo $this->controller->getJumlah($id_user, $value['id_pertanyaan'], $value['uji_ke']) ?><!--</td>-->
<!--                                            </tr>-->
<!--                                        --><?php //} ?>
<!--                                        <tr>-->
<!--                                            <td colspan="3" style="line-height: 35px;font-size: 20px">Nilai Cacat</td>-->
<!--                                            --><?php //foreach ($this->hasil as $key => $value) { ?>
<!--                                                <td style="line-height: 35px;font-size: 20px">--><?php //echo $value['nilai_cacat']; ?><!--</td>-->
<!--                                            --><?php //} ?>
<!--                                        </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                            <div class="mobile">-->
<!--                                <label>Nilai Cacat</label>-->
<!--                                <input class="input-area" type="text" value="--><?php //echo $value['nilai_cacat']; ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group clearfix">-->
<!--                            <a class="btn btn-raised" href="--><?php //echo URL; ?><!--/uji"><i class="md md-reply"></i>&nbsp;&nbsp;Kembali</a>-->
<!--                        </div>-->
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>