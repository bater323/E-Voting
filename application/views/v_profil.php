<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Dashboard || Profile Pengguna</title>
    <link href="<?php echo base_url() . 'assets/dist/css/style.min.css' ?>" rel="stylesheet">

</head>

<body class="skin-megna fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">All User</p>
        </div>
    </div>

    <div id="main-wrapper">
        <?php
        $this->load->view('admin/v_header');
        ?>
        <?php
        $this->load->view('admin/v_sidebar');
        ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> Profile Pengguna</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">My Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <?php
                $id_admin = $this->session->userdata('idadmin');
                $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
                $c = $q->row_array();
                ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="user-bg">



                                <?php if ($c['pengguna_photo'] == '') {
                                ?>

                                <img class="img-circle" width="50"
                                    src="<?php echo base_url() . 'assetss/images/user_blank.png'; ?>" width="100%">
                                <?php } else {
                                ?>
                                <img src="<?php echo base_url() . 'assets/images/' . $c['pengguna_photo']; ?>"
                                    alt="user-img" width="100%" class="img-circle">
                                <span class="hide-menu">
                                    <?php } ?>

                            </div>
                            <div class="card-body">
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r">
                                        <strong>Nama</strong>
                                        <p><?php echo $c['pengguna_nama']; ?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Jenkel</strong>
                                        <?php if ($c['pengguna_jenkel'] == 'L') : ?>
                                        <div class="radio radio-info radio-inline">
                                            <p> Laki-Laki </p>
                                        </div>
                                        <?php else : ?>
                                        <div class="radio radio-info radio-inline">
                                            <p> Perempuan </p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- /.row -->
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Email ID</strong>
                                        <p><?php echo $c['pengguna_email']; ?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Phone</strong>
                                        <p><?php echo $c['pengguna_nohp']; ?></p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">

                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings"
                                        role="tab">Update Profile</a> </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="home" role="tabpanel">


                                    <?php
                                    $id_admin = $this->session->userdata('idadmin');
                                    $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
                                    $c = $q->row_array();
                                    ?>
                                    <div class="card-body">
                                        <form action="<?php echo base_url() . 'admin/Pengguna/update_PROFIL' ?>"
                                            method="post" class="form-horizontal form-material"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="kode" value="<?php echo $c['pengguna_id']; ?>" />
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="xnama"
                                                        value="<?php echo $c['pengguna_nama']; ?>"
                                                        placeholder="Johnathan Doe"
                                                        class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputUserName" class="col-sm-4 control-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-7">
                                                    <?php if ($c['pengguna_jenkel'] == 'L') : ?>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel"
                                                            checked>
                                                        <label for="inlineRadio1"> Laki-Laki </label>
                                                    </div>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                        <label for="inlineRadio2"> Perempuan </label>
                                                    </div>
                                                    <?php else : ?>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                                        <label for="inlineRadio1"> Laki-Laki </label>
                                                    </div>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel"
                                                            checked>
                                                        <label for="inlineRadio2"> Perempuan </label>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" name="xemail"
                                                        value="<?php echo $c['pengguna_email']; ?>"
                                                        placeholder="johnathan@admin.com"
                                                        class="form-control form-control-line" name="example-email"
                                                        id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="xusername"
                                                        value="<?php echo $c['pengguna_username']; ?>"
                                                        placeholder="johnathan@admin.com"
                                                        class="form-control form-control-line" name="example-email"
                                                        id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name="xpassword"
                                                        value="<?php echo $c['pengguna_password']; ?>"
                                                        class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="xkontak"
                                                        value="<?php echo $c['pengguna_nohp']; ?>"
                                                        placeholder="123 456 7890"
                                                        class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-12">Select Foto</label>
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="special" name="foto" class="form-control"
                                                        placeholder="Foto" value="<?php echo $c['pengguna_photo'];  ?>"
                                                        required>
                                                    <input type="file" name="filefoto"
                                                        class="form-control form-control-line">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <!--second tab-->



                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a>
                                </li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna"
                                        class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark"
                                        class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark"
                                        class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a>
                                </li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark"
                                        class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark"
                                        class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark"
                                        class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/1.jpg"
                                            alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/2.jpg"
                                            alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                                class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/3.jpg"
                                            alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small
                                                class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/4.jpg"
                                            alt="user-img" class="img-circle"> <span>Arijit Sinh <small
                                                class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/5.jpg"
                                            alt="user-img" class="img-circle"> <span>Govinda Star <small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/6.jpg"
                                            alt="user-img" class="img-circle"> <span>John Abraham<small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/7.jpg"
                                            alt="user-img" class="img-circle"> <span>Hritik Roshan<small
                                                class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/assets/images/users/8.jpg"
                                            alt="user-img" class="img-circle"> <span>Pwandeep rajan <small
                                                class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('admin/v_footer');
        ?>

        <script src="<?php echo base_url() . 'assets/node_modules/jquery/jquery-3.2.1.min.js' ?>"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?php echo base_url() . 'assets/node_modules/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?php echo base_url() . 'assets/dist/js/perfect-scrollbar.jquery.min.js' ?>"></script>
        <!--Wave Effects -->
        <script src="<?php echo base_url() . 'assets/dist/js/waves.js' ?>"></script>
        <!--Menu sidebar -->
        <script src="<?php echo base_url() . 'assets/dist/js/sidebarmenu.js' ?>"></script>
        <!--stickey kit -->
        <script src="<?php echo base_url() . 'assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js' ?>">
        </script>
        <script src="<?php echo base_url() . 'assets/node_modules/sparkline/jquery.sparkline.min.js' ?>"></script>
        <!--Custom JavaScript -->
        <script src="<?php echo base_url() . 'assets/dist/js/custom.min.js' ?>"></script>
</body>

</html>