<body id="page-dashboard" class="page-dashboard hasil">
    <?php require_once '/../part/header.php'; ?>
    <div id="main">
        <div class="container clearfix">
            <div class="title">
                <i class="md md-people"></i>DATA HASIL UJI KUALITAS KAYU - <?php echo strtoupper(session::get('cc-nama')) ?>
            </div>
            <div class="toolbar clearfix section">
                <a class="btn btn-raised left" href="" data-toggle="modal" data-target="#pilihJenis"><i class="md md-search"></i>&nbsp;&nbsp;UJI KUALITAS KAYU</a>
<!--                <a class="btn btn-raised" href="--><?php //echo URL; ?><!--/uji/mulai?jenis=arabika" style="margin-right: 10px">UJI KUALITAS KAYU</a>-->
            </div>
            <div class="card clearfix section">
                <div class="card-body">
                    <div class="desktop">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID User</th>
                                    <th>Tanggal Uji</th>
                                    <th>Jenis Kayu</th>
                                    <th>Nilai Cacat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->data as $key => $value) {
                                    $cek = explode('-', $value['tanggal_uji']);
                                    require '/../part/tanggal.php';
                                    ?>
                                    <tr>
<!--                                        <td>--><?php //echo $value['id_user'] ?><!--</td>-->
<!--                                        <td>--><?php //echo $tanggal . ' ' . $bulan . ' ' . $tahun ?><!--</td>-->
<!--                                        <td>--><?php //echo $value['jenis_kopi'] ?><!--</td>-->
<!--                                        <td>--><?php //echo $value['grade'] ?><!--</td>-->
<!--                                        <td>--><?php //echo $value['nilai_cacat'] ?><!--</td>-->
<!--                                        <td>-->
<!--                                            <a class="detail" href="--><?php //echo URL; ?><!--/uji/detail?username=--><?php //echo $value['id_user'] ?><!--&ke=--><?php //echo $value['hasil_ke'] ?><!--" title="detail"><i class="md md-search"></i></a>-->
<!--                                        </td>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mobile">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal Uji</th>
                                    <th>Jenis Kopi</th>
                                    <th>Grade</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->data as $key => $value) {
                                    $cek = explode('-', $value['tanggal_uji']);
                                    require '/../part/tanggal.php';
                                    ?>
                                    <tr>
                                        <td><?php echo $tanggal . ' ' . $bulan . ' ' . $tahun ?></td>
                                        <td><?php echo $value['jenis_kopi'] ?></td>
                                        <td><?php echo $value['grade'] ?></td>
                                        <td>
                                            <a class="detail" href="<?php echo URL; ?>/uji/detail?username=<?php echo $value['id_user'] ?>&ke=<?php echo $value['hasil_ke'] ?>" title="detail"><i class="md md-search"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    <div id="pilihJenis" class="modal fade" role="dialog">-->
<!--        <div class="modal-dialog modal-sm" style="width: 350px">-->
<!--            <!-- Modal content-->-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h4 class="modal-title">Pilih Jenis Kopi</h4>-->
<!--                </div>-->
<!--                <div class="modal-body" style="margin-bottom: 10px">-->
<!--                    <p style="line-height: 25px">Coffee Count memberikan fasilitas uji kualitas untuk dua jeni kopi.</p>-->
<!--                    <p style="margin: 15px 0px">Silahkan pilih salah satu</p>-->
<!--                    <div class="clearfix" style="text-align: center">-->
<!--                        <a class="btn btn-raised" href="--><?php //echo URL; ?><!--/uji/mulai?jenis=arabika" style="margin-right: 10px">ARABIKA</a>-->
<!--                        <a class="btn btn-raised" href="--><?php //echo URL; ?><!--/uji/mulai?jenis=robusta" style="margin-left: 10px">ROBUSTA</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->