<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <?php
        $id_admin = $this->session->userdata('idadmin');
        $q = $this->db->query("SELECT * FROM tblregister WHERE id='$id_admin'");
        $c = $q->row_array();
        ?>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
            <li class="user-pro"> 

<?php if (empty($c['nama'])) : ?>
    <a  href="javascript:void(0)" aria-expanded="false"><img src="<?php echo base_url() . 'assets/img/profile.png'?>" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $c['nama']; ?></span><BR><small class="text-success">online</small></a>
    <ul aria-expanded="false" class="collapse">
    <?php else : ?>

    <a  href="javascript:void(0)" aria-expanded="false"><img src="<?php echo base_url() . 'assets/img/profile.png'?>" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $c['nama']; ?> </span><BR><small class="text-success">online</small></a>
    
     <?php endif; ?>


</li>
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'dashboard1.aspx' ?>" aria-expanded="false"><i class="fa  fa-home"></i><span class="hide-menu">Beranda</span></a></li>
    
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'profil.aspx' ?>" aria-expanded="false"><i class=" fa fa-user"></i><span class="hide-menu">Data Pengguna</span></a></li>

                <!-- <li class="nav-small-cap">--- SUPPORT</li> -->
                <li> <a class="waves-effect waves-dark" href="<?php echo base_url() . 'logout.aspx' ?>" aria-expanded="false"><i class=" fa fa-lg fa-fw fa-sign-out"></i><span class="hide-menu"> Keluar</span></a></li>

            </ul>
        </nav>
    </div>
</aside>