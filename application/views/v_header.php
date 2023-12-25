<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">

        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url() . 'dashboard.aspx' ?>">
                <img src="<?php echo base_url() . 'assets/img/sidebar.png' ?> " class="light-logo" alt="e-voting" />
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                        class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="icon-menu"></i></a> </li>

            </ul>
            <ul class="navbar-nav my-lg-0">




                <?php
                $id_admin = $this->session->userdata('idadmin');
                $q = $this->db->query("SELECT * FROM tblregister WHERE id='$id_admin'");
                $c = $q->row_array();
                ?>
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="<?php echo base_url() . 'assets/img/profile.png'; ?>" alt="user" class=""> <span
                            class="hidden-md-down"><?php echo $c['nama']; ?><i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">

                        <a href="<?php echo base_url() . 'pengguna' ?>" class="dropdown-item"><i class="ti-user"></i> My
                            Profile</a>

                        <a href="<?php echo base_url() . 'logout.aspx' ?>" class="dropdown-item"><i
                                class="fa fa-lg fa-fw fa-sign-out"></i> Keluar</a>

                    </div>
                </li>
                <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                        href="javascript:void(0)"></a></li>
            </ul>
        </div>
    </nav>
</header>