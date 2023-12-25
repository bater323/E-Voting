<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Voting</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/icon.png">

    <link href="<?php echo base_url() . 'assets/node_modules/morrisjs/morris.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/node_modules/toast-master/css/jquery.toast.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/style.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/pages/dashboard1.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/chart/css/morris.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">

    <?php

    $daftar = $user->row_array();
    $poling = $polling->row_array();
    $user = $pengguna_admin->row_array();
    $Belum_verifikasi = $blm_verifikasi->row_array();
    $sdh_verifikasi = $sdh_verifikasi->row_array();

    ?>



    <?php
     error_reporting(0);
    /* Mengambil query report*/
    foreach ($visitor as $result) {
        $bulan[] = $result->tgl; //ambil bulan
        $value[] = (float) $result->jumlah; //ambil nilai
    }
    /* end mengambil query*/

    ?>
</head>

<body class="skin-blue fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">E-Voting</p>
        </div>
    </div>
    <div id="main-wrapper">
        <?php
        $this->load->view('admin/v_header');
        ?>
        <?php
        $this->load->view('admin/v_sidebar');
        ?>

        <?php
        $c = $pengguna->row_array();
        $pengguna_nama = $this->session->userdata('nama');
        ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        Selamat Datang di Dashboard Administrator E-Voting &nbsp;<b
                            class='text-danger'><?php echo $pengguna_nama; ?></b>
                    </div>
                </div>
                <div class="card-group">



                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">


                                        <div>
                                            <h3><i class="fa fa-users"></i></h3>

                                            <h4 class="counter text-danger"><b>DATA USER DAFTAR</b></h4></a>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-danger"><?php echo $daftar['jumlah']; ?></h2>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">

                                        <div>
                                            <h3><i class="fa  fa-refresh"></i></h3>

                                            <h4 class="counter text-info"><b>BELUM VERIFIKASI </b></h4></a>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter  text-purple">
                                                <?php echo $Belum_verifikasi['jml_verifikasi']; ?></h2>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>

                                            <h3><i class="icon-calender"></i></h3>

                                            <h4 class="counter text-success"><b>SUDAH VERIFIKASI </b></h4></a>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success">
                                                <?php echo $sdh_verifikasi['jml_verifikasi']; ?></h2>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">

                                        <div>
                                            <h3><i class="fa fa-user-o "></i></h3>

                                            <h4 class="counter text-warning"><b>SUDAH MEMILIH VOTTING</b></h4></a>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-info"><?php echo $poling['jumlah_polling']; ?></h2>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grafik User Daftar Perhari</h4>
                                <canvas id="canvas" width="900" height="280"></canvas>
                            </div>
                        </div>
                    </div>


                    <!-- column -->
                </div>




                <div class="row">

                </div>



            </div>
        </div>
        <?php
        $this->load->view('admin/v_footer');
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


    <script src="<?php echo base_url() . '' ?>assets/chart/js/jquery.min.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/chart/js/raphael-min.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/chart/js/morris.min.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/node_modules/echarts/echarts-all.js"></script>



    <script>
    var lineChartData = {
        labels: <?php echo json_encode($bulan); ?>,
        datasets: [

            {
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(152,235,239,1)",
                data: <?php echo json_encode($value); ?>
            }

        ]

    }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

    var canvas = new Chart(myLine).Line(lineChartData, {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.005)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 2,
        datasetStroke: true,
        tooltipCornerRadius: 2,
        datasetStrokeWidth: 2,
        datasetFill: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
    </script>

</body>

</html>