<body id="page-dashboard" class="page-dashboard">
    <?php require_once '/../part/header.php'; ?>
    <div id="main">
        <div class="container clearfix">
            <div class="title"><i class="md md-people"></i>DATA HASIL UJI KUALITAS</div>
            <div class="card clearfix section">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Nama</th>
                                <th>Tanggal Uji</th>
                                <th>Jenis Kopi</th>
                                <th>Grade</th>
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
                                    <td><?php echo $value['id_user'] ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td><?php echo $tanggal . ' ' . $bulan . ' ' . $tahun ?></td>
                                    <td><?php echo $value['jenis_kopi'] ?></td>
                                    <td><?php echo $value['grade'] ?></td>
                                    <td><?php echo $value['nilai_cacat'] ?></td>
                                    <td>
                                        <a class="detail" href="<?php echo URL; ?>/hasil/detail?username=<?php echo $value['id_user'] ?>&ke=<?php echo $value['hasil_ke'] ?>" title="detail"><i class="md md-search"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>