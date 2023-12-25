<?php
error_reporting(0);
$username = $this->session->userdata('username');
$query1 = $this->db->query("SELECT
a.`id_user`,
a.`id_polling`,
a.`tgl_vot`,
b.`nama`,
b.`deskripsi`
FROM `detail_votting` AS a
LEFT JOIN `tblpolling` AS b ON a.`id_polling`=b.`id` WHERE a.`id_user`='$username'")->result();
$query = $this->db->query("SELECT * FROM `detail_votting` WHERE `id_user`='$username';");
$cek_votting = $query->num_rows();

$hasil = $this->db->query("SELECT * FROM tblpolling ")->result();
$hasil11 = $this->db->query("SELECT nama FROM tblpolling")->result();
foreach ($hasil11 as $nm) {
    $caln .= ",'$nm->nama'";
}
foreach ($hasil as $vot) {
    $hasilvot = $vot->id;
    $nm = $vot->nama;
    $hasil1 = $this->db->query("SELECT COUNT(jumlah_vot) AS hasilvotting FROM detail_votting where id_polling='$hasilvot' and status_vot='2'")->result();

    foreach ($hasil1 as $jum1) {
        $jumvoti .= ",$jum1->hasilvotting";
    }
}

$hasiloke1 = substr($jumvoti, 1);
$hasiloke = substr($jumvoti, 1);
$namaclo = substr($caln, 1);
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
    <link href="<?php echo base_url() . '' ?>assets/dist/css/pages/float-chart1.css" rel="stylesheet">

    <?php

    $daftar = $user->row_array();
    $poling = $polling->row_array();
    $vott = $pilihan->row_array();
    $user = $pengguna_admin->row_array();
    $Belum_verifikasi = $blm_verifikasi->row_array();
    $sdh_verifikasi = $sdh_verifikasi->row_array();
    $pilih = $pilihan->row_array();

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

                        <h4 class="text-themecolor"> Selamat Datang di Aplikasi E-Voting Online &nbsp;<b
                                class='text-danger'><?php echo $pengguna_nama; ?></b></h4>

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

                                            <h3><i class="icon-calender"></i></h3>

                                            <h4 class="counter text-success"><b>SUDAH TERVERIFIKASI </b></h4></a>
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
                                            <h3><i class="fa  fa-refresh"></i></h3>

                                            <h4 class="counter text-info"><b>TIDAK TERVERIFIKASI </b></h4></a>
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
                                            <h3><i class="fa fa-user-o "></i></h3>

                                            <h4 class="counter text-warning"><b>SUDAH MELAKUKAN VOTING</b></h4></a>
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

                <div class="card">
                    <div class="card-body">
                        <center> <b> Anda Sudah Memilih &nbsp;</b>
                            <h3><b class='text-danger'><?php echo $pilih['deskripsi']; ?> -
                                    &nbsp;<?php echo $pilih['nama_calon']; ?></b></h3>&nbsp; <b>Sebagai Calon Ketua
                                Periode tahun 2022-2025</b>
                        </center>.
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">History Voting</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Calon</th>
                                                <th>Nomor Calon</th>
                                                <th style="text-align: right;">Tanggal Voting</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($query1 as $row) :
                                                $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no; ?></th>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->deskripsi; ?></td>
                                                <td style="text-align: right;">
                                                    <?php echo ($row->tgl_vot); ?></td>
                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Prosentase Suara Calon Ketua</h4>

                                <!-- <canvas id="canvas" width="400" height="400" ></canvas> -->
                                <canvas id="chart2" height="200"></canvas>
                            </div>
                        </div>
                    </div>




                </div>








            </div>
        </div>







        <?php
        $this->load->view('v_footer');
        ?>

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

    <script src="<?php echo base_url() . 'assets/node_modules/raphael/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/morrisjs/morris.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/jquery-sparkline/jquery.sparkline.min.js' ?>"></script>
    <!-- Popup message jquery -->
    <script src="<?php echo base_url() . 'assets/node_modules/toast-master/js/jquery.toast.js' ?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url() . 'assets/dist/js/dashboard1.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/node_modules/toast-master/js/jquery.toast.js' ?>"></script>

    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/excanvas.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.pie.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.time.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.stack.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.crosshair.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/dist/js/pages/flot-data.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/node_modules/Chart.js/Chart.min.js"></script>


    <script>
    var ctx2 = document.getElementById("chart2").getContext("2d");

    var data2 = {

        labels: [<?= $namaclo ?>],
        datasets: [{
                label: "Prosentase Suara",
                fillColor: "#e73852",
                strokeColor: "#e73852",
                highlightFill: "#e73852",
                highlightStroke: "rgba(252,201,186,1)",
                data: [<?= $hasiloke ?>]
            }

        ]
    };
    var chart2 = new Chart(ctx2).Bar(data2, {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.005)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke: true,
        barStrokeWidth: 0,
        tooltipCornerRadius: 2,
        barDatasetSpacing: 3,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
    </script>
</body>

</html>