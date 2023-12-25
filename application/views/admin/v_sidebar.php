<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <?php
        $id_admin = $this->session->userdata('idadmin');
        $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
        $c = $q->row_array();
        ?>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro">

                    <?php if (empty($c['pengguna_nama'])) : ?>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img
                            src="<?php echo base_url() . 'assets/images/user_blank.png' ?>" alt="user-img"
                            class="img-circle"><span class="hide-menu"><?php echo $c['pengguna_nama']; ?></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <?php else : ?>

                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><img
                                src="<?php echo base_url() . 'assets/images/' . $c['pengguna_photo']; ?>" alt="user-img"
                                class="img-circle"><span class="hide-menu"><?php echo $c['pengguna_nama']; ?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php endif; ?>



                        </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'beranda.aspx' ?>"
                        aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Beranda</span></a></li>
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'data-polling.aspx' ?>"
                        aria-expanded="false"><i class="fa   fa-gavel"></i><span class="hide-menu">Data Calon
                            Ketua</span></a></li>



                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'data-daftar-user.aspx' ?>"
                        aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Data
                            Pendaftar</span></a></li>
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'data-inbox.aspx' ?>"
                        aria-expanded="false"><i class="fa fa-inbox"></i><span class="hide-menu">Data Inbox</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'data-pengguna-user.aspx' ?>"
                        aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Pengguna</span></a></li>



                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'logout.aspx' ?>"
                        aria-expanded="false"><i class=" fa fa-lg fa-fw fa-sign-out"></i><span class="hide-menu">
                            Keluar</span></a></li>

        </nav>
    </div>
</aside>