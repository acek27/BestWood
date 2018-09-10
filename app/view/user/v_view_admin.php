<body id="page-dashboard" class="page-dashboard">
    <?php require_once '/../part/header.php'; ?>
    <div id="main">
        <div class="container clearfix">
            <div class="title"><i class="md md-people"></i>DATA USER</div>
            <div class="card clearfix section">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th>ID User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value['id_user'] ?></td>
                                    <td><?php echo $value['nama'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td><?php echo $value['alamat'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>