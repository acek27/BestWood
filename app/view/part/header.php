<header>
    <div class="container clearfix">
        <?php if (session::get('cc-uji') != true) { ?>
            <ul class="left">
                <li class="logo">
<!--                    <a href="--><?php //echo URL . '/dashboard'; ?><!--"><img src="--><?php //echo IMG_URL; ?><!--/logo/logo.png"></a>-->
                </li>
            </ul>
            <nav class="nav right">
                <ul class="clearfix">
                    <li class="left"><a href="<?php echo URL; ?>/dashboard">Dashboard</a></li>
                    <?php if (session::get('cc-akses') == 'admin') { ?>
                        <li class="left"><a href="<?php echo URL; ?>/pertanyaan">Pertanyaan</a></li>
                        <li class="left"><a href="<?php echo URL; ?>/hasil">Hasil Kualitas</a></li>
                        <li class="left"><a href="<?php echo URL; ?>/user">Data User</a></li>
                    <?php } else { ?>
                        <li class="left"><a href="<?php echo URL; ?>/uji">Uji Kualitas</a></li>
                    <?php }
                    ?>
                    <li class="left dropdown">
                        <?php $nama = explode(" ", session::get('cc-nama')); ?>
                        <a href="" data-toggle="dropdown"><span><?php echo $nama[0]; ?>
                                <i class="md md-more-vert"></i></span></a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="<?php echo URL; ?>/profil">Profil</a></li>
                            <li><a href="<?php echo URL; ?>/login/logout">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="nav-m right dropdown">
                <div class="left">
                    <a href="" data-toggle="dropdown"><i class="md md-more-vert"></i></a>
                    <ul class="dropdown-menu animation-dock clearfix">
                        <li><a href="<?php echo URL; ?>/dashboard">Dashboard</a></li>
                        <?php if (session::get('cc-akses') == 'admin') { ?>
                            <li><a href="<?php echo URL; ?>/pertanyaan">Pertanyaan</a></li>
                            <li><a href="<?php echo URL; ?>/hasil">Hasil Kualitas</a></li>
                            <li><a href="<?php echo URL; ?>/user">Data User</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo URL; ?>/uji">Uji Kualitas</a></li>
                        <?php } ?>
                        <li><a href="<?php echo URL; ?>/profil">Profil</a></li>
                        <li><a href="<?php echo URL; ?>/login/logout">Keluar</a></li>
                    </ul>
                </div>
            </nav>
        <?php } else if (session::get('cc-uji') == true && session::get('cc-akses') != 'admin') { ?>
            <ul class="left">
                <li class="logo">
                    <a href="" data-toggle="modal" data-target="#keluar">><img src="<?php echo IMG_URL; ?>/logo/logo.png"></a>
                </li>
            </ul>
            <nav class="nav right">
                <ul class="clearfix">
                    <li class="left"><a href="" data-toggle="modal" data-target="#keluar">Dashboard</a></li>
                    <li class="left"><a href="" data-toggle="modal" data-target="#keluar">Uji Kualitas</a></li>
                    <li class="left dropdown">
                        <?php $nama = explode(" ", session::get('cc-nama')); ?>
                        <a href="" data-toggle="dropdown"><span><?php echo $nama[0]; ?>
                                <i class="md md-more-vert"></i></span></a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="" data-toggle="modal" data-target="#keluar">Profil</a></li>
                            <li><a href="" data-toggle="modal" data-target="#keluar">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="nav-m right dropdown">
                <div class="left">
                    <a href="" data-toggle="dropdown"><i class="md md-more-vert"></i></a>
                    <ul class="dropdown-menu animation-dock clearfix">
                        <li><a href="" data-toggle="modal" data-target="#keluar">Dashboard</a></li>
                        <li><a href="" data-toggle="modal" data-target="#keluar">Uji Kualitas</a></li>
                        <li><a href="" data-toggle="modal" data-target="#keluar">Profil</a></li>
                        <li><a href="" data-toggle="modal" data-target="#keluar">Keluar</a></li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
    </div>
</header>