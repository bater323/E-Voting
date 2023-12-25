<?php
$username = $this->session->userdata('username');
$query = $this->db->query("SELECT * FROM `tblregister` WHERE no_anggota='$username';")->row();
$status_anggota = $query->status_anggota;
$tgl_sekarang = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard E-Voting</title>

    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/icon.png">

    <link href="<?php echo base_url() . 'assets/node_modules/morrisjs/morris.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/node_modules/toast-master/css/jquery.toast.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/style.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/pages/dashboard1.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/pages/user-card.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css' ?>"
        rel="stylesheet">


</head>

<body class="skin-blue fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">E-Votting</p>
        </div>
    </div>
    <div id="main-wrapper">
        <?php
        $this->load->view('v_header');
        ?>
        <?php
        $this->load->view('v_sidebar');
        ?>

        <?php
        $c = $pengguna->row_array();
        $pengguna_nama = $this->session->userdata('nama');
        ?>



        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">

                        <h4 class="text-themecolor"> Selamat Datang di Aplikasi E-Votting Online &nbsp;<b
                                class='text-danger'><?php echo $pengguna_nama; ?></b></h4>

                    </div>

                </div>

                <div><?php echo $this->session->flashdata('message'); ?></div>





                <div class="row el-element-overlay">
                    <?php

                    foreach ($datacalon->result() as $row) :

                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img
                                        src="<?php echo base_url() . 'assets/images/' . $row->flayer; ?>" alt="user" />
                                    <div class="el-overlay scrl-up">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit"
                                                    href="<?php echo base_url() . 'assets/images/' . $row->flayer; ?>"><i
                                                        class="icon-magnifier"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title"><?php echo $row->nama; ?></h3>
                                    <br>
                                    <h3><b class="text-danger"><?php echo $row->deskripsi; ?> </b></h3><br>


                                    <?php
                                        if ($status_anggota == '1') {
                                        ?>
                                    <center> <a href='dashboard.aspx' button type='button'
                                            class='btn btn-info text-white'>Melakukan Votting</a></center>
                                </div>

                                <?php
                                        } else {
                                ?>
                                <center> <a href='#' button type='button' class='btn btn-danger text-white'>Akun Anda
                                        Belum diVerifikasi</a></center>
                            </div>
                            <?php
                                        }



                            ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>




    <?php
    foreach ($user->result() as $row) :
    ?>
    <div class="modal fade" id="votting<?php echo $row->id; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Konfirmasi Votting</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'Votting/votting' ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" name="xkode" value="<?php echo $row->id; ?>" />


                                <p>Apakah Anda yakin memilih Votting <b> <?php echo $row->nama; ?> </b> ini ?</p>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger waves-effect text-left">Ya</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    </div>

    <?php endforeach; ?>
    <?php
    $this->load->view('v_footer');
    ?>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    </div>

    <script src="<?php echo base_url() . 'assets/node_modules/jquery/jquery-3.2.1.min.js' ?>"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo base_url() . 'assets/node_modules/popper/popper.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() . 'assets/dist/js/perfect-scrollbar.jquery.min.js' ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() . 'assets/dist/js/waves.js' ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() . 'assets/dist/js/sidebarmenu.js' ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() . 'assets/dist/js/custom.min.js' ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo base_url() . 'assets/node_modules/raphael/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/morrisjs/morris.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/jquery-sparkline/jquery.sparkline.min.js' ?>"></script>
    <!-- Popup message jquery -->
    <script src="<?php echo base_url() . 'assets/node_modules/toast-master/js/jquery.toast.js' ?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url() . 'assets/dist/js/dashboard1.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/toast-master/js/jquery.toast.js' ?>"></script>


    <script
        src="<?php echo base_url() . 'assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js' ?>">
    </script>
    <script
        src="<?php echo base_url() . 'assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js' ?>">
    </script>
</body>

</html>