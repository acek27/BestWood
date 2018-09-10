<header>
    <div class="container clearfix">
        <div class="logo left">
<!--            <a href="--><?php //echo URL; ?><!--"><img src="--><?php //echo IMG_URL; ?><!--/logo/logo.png"></a>-->
        </div>
        <nav class="nav right">
            <ul class="clearfix">
                <li class="left"><a href="">Tentang BestWood</a></li>
                <?php if (session::get('cc-loggedIn') == true) { ?>
                    <li class="left">
                        <?php $nama = explode(' ', session::get('cc-nama')); ?>
                        <a href="#" data-toggle="dropdown"><span><?php echo $nama[0]; ?>
                                <i class="md md-expand-more"></i></span></a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="<?php echo URL; ?>/dashboard">Dashboard</a></li>
                            <li><a href="<?php echo URL; ?>/profil">Profil</a></li>
                            <li><a href="<?php echo URL; ?>/login/logout">Keluar</a></li>
                        </ul>
                    </li>
                <?php } else {
                    if (session::get('cc-log') == false) {
                        ?>
                        <li class="left"><a href="<?php echo URL; ?>/login">Login</a></li>
                    <?php } else {
                        ?>
                        <li class="left"><a href="<?php echo URL; ?>/register">Daftar</a></li>
                        <?php
                    }
                } ?>
            </ul>
        </nav>
        <nav class="nav-m right dropdown">
            <div class="left">
                <a href="" data-toggle="dropdown"><i class="md md-more-vert"></i></a>
                <ul class="dropdown-menu animation-dock clearfix">
                    <li class="left"><a href="">Tentang Coffee Count</a></li>
                    <?php if (session::get('cc-loggedIn') == true) { ?>
                        <li><a href="<?php echo URL; ?>/dashboard">Dashboard</a></li>
                        <li><a href="<?php echo URL; ?>/profil">Profil</a></li>
                        <li><a href="<?php echo URL; ?>/login/logout">Keluar</a></li>
                    <?php } else {
                        if (session::get('cc-log') == false) {
                            ?>
                            <li><a href="<?php echo URL; ?>/login">Login</a></li>
                        <?php } else {
                            ?>
                            <li><a href="<?php echo URL; ?>/register">Daftar</a></li>
                            <?php
                        }
                    } ?>
                </ul>
            </div>
        </nav>
    </div>
</header>