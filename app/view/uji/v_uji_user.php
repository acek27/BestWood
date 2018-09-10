<body id="page-dashboard" class="page-dashboard page-panuji">
    <?php require_once '/../part/header.php'; ?>
    <div id="main">
        <div class="container clearfix uji">
            <div class="title"><i class="md md-check"></i>Pertanyaan Ke <?php echo $this->tahap; ?>
                <a href="" class="right" style="font-size: 13px;text-transform: uppercase;" data-toggle="modal" data-target="#keluar">Keluar dari uji kualitas</a>
            </div>
            <?php foreach ($this->data as $key => $value) { ?>
                <div class="pertanyaan"><?php echo $value['pertanyaan']; ?></div>
                <form class="clearfix">
                    <input type="text" name="nilai" id="nilai" value="<?php echo $this->nilai; ?>">
                    <input type="hidden" name="username" id="username" value="<?php echo session::get('cc-username') ?>">
                    <input type="hidden" name="tahap" id="tahap" value="<?php echo $this->tahap; ?>">
                </form>
                <div class="penjelasan">
                    <h5>Penjelasan:</h5>
                    <p><?php echo $value['penjelasan']; ?></p>
                </div>
                <div class="clearfix nextprev">
                    <?php
                    if ($this->tahap > 1) {
                        ?>
                        <a class="next left btn btn-raised" href="<?php echo URL; ?>/uji/tahap/<?php echo $this->tahap - 1 ?>" style="margin: 0px"><i class="md md-navigate-before"></i></a>
                    <?php }
                    if ($this->tahap == 20) { ?>
                        <a class="next right btn btn-raised" href="<?php echo URL; ?>/uji/selesai?selesai=true" style="margin: 0px"><i class="md md-check"></i></a>
                    <?php } else { ?>
                        <a class="next right btn btn-raised" href="<?php echo URL; ?>/uji/tahap/<?php echo $this->tahap + 1 ?>" style="margin: 0px"><i class="md md-navigate-next"></i></a>
                    <?php } ?>
                </div>
                <a href="" class="reset" data-toggle="modal" data-target="#reset">Reset</a>
            <?php } ?>
        </div>
    </div>
    <div id="keluar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="width: 350px">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Keluar Uji Kualitas</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 10px">
                    <p style="line-height: 25px">Apakah anda yakin akan keluar dari proses ini? Data yang tersimpan akan hilang.</p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo URL; ?>/uji/keluar?keluar=true">keluar</a>
                    <a href="" data-dismiss="modal">batal</a>
                </div>
            </div>
        </div>
    </div>
    <div id="reset" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="width: 350px">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Uji Kualitas</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 10px">
                    <p style="line-height: 25px">Apakah anda yakin akan mereset proses ini? Data yang tersimpan akan hilang.</p>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo URL; ?>/uji/reset?reset=true">reset</a>
                    <a href="" data-dismiss="modal">batal</a>
                </div>
            </div>
        </div>
    </div>
