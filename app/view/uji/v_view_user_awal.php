<body id="page-dashboard" class="page-dashboard">
    <?php require_once '/../part/header.php'; ?>
    <div id="main">
        <div class="container clearfix">
            <div class="panuji">
                <img src="<?php echo IMG_URL ?>/icon/uji.png"/>
                <p><i>Coffee Count</i> memudahkan anda dalam menentukan kualitas kopi</p>
                <a class="btn btn-raised" href="" data-toggle="modal" data-target="#pilihJenis">COBA SEKARANG</a>
            </div>
        </div>
        <div id="pilihJenis" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm" style="width: 350px">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pilih Jenis Kopi</h4>
                    </div>
                    <div class="modal-body" style="margin-bottom: 10px">
                        <p style="line-height: 25px">Coffee Count memberikan fasilitas uji kualitas untuk dua jeni kopi.</p>
                        <p style="margin: 15px 0px">Silahkan pilih salah satu</p>
                        <div class="clearfix" style="text-align: center">
                            <a class="btn btn-raised" href="<?php echo URL; ?>/uji/mulai?jenis=arabika" style="margin-right: 10px">ARABIKA</a>
                            <a class="btn btn-raised" href="<?php echo URL; ?>/uji/mulai?jenis=robusta" style="margin-left: 10px">ROBUSTA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>