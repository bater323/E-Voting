<?php
error_reporting(0);
$username = $this->session->userdata('username');
$query = $this->db->query("SELECT * FROM `detail_votting` WHERE `id_user`='$username';");
$cek_votting = $query->num_rows();
$cek_num = $query->row();
$cek = $cek_num->id_polling;
$query1 = $this->db->query("SELECT * FROM tblpolling WHERE id='$cek' ;");
$cek_pilih = $query1->row();


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




                <div><?php echo $this->session->flashdata('message'); ?></div>
                <div class="row el-element-overlay">


                    <?php

                    foreach ($user->result() as $row) :

                    ?>
                    <center>
                        <div class="col-lg-10 col-md-10">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img
                                            src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>"
                                            alt="user" />

                                        <div class="el-overlay scrl-up">
                                            <ul class="el-info">
                                                <li><a class="btn default btn-outline image-popup-vertical-fit"
                                                        href="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>"><i
                                                            class="icon-magnifier"></i></a></li>

                                            </ul>
                                        </div>


                                    </div>
                                    <div class="el-card-content">
                                        <h3 class="box-title"><?php echo $row->nama; ?></h3>
                                        <br>


                                        <h3><b class="text-danger"><?php echo $row->deskripsi; ?></b></h3>
                                        <br />
                                    </div>
                                    <br>
                                    <?php
                                        if ($cek_votting > 0) {
                                            $tombol = "<center> <b class='btn btn-danger'>Anda Sudah Melakukan Votting</b></center><br>
                                        <center> <a href='data-votting.aspx' target='_blank'> <type='button'  class='btn btn-success'>Detail Votting</a></center>
                                        ";
                                        } else {
                                            $tombol = "<center> <a href='#' button type='button' class='btn btn-info' data-toggle='modal' data-target='#votting$row->id'>Voting</a></center>";
                                            // $tombol="<center> <a href='#' button type='button' class='btn btn-danger'>Voting di Tutup</a></center>";
                                        }
                                        ?>
                                    <?php echo $tombol; ?>


                                </div>
                            </div>

                        </div>
                    </center>
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
                        <h4 class="modal-title" id="exampleModalLabel1">Konfirmasi Voting !</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'Votting/votting' ?>" method="post">
                            <div class="form-group">
                                <div class="col-md-12 m-b-20">
                                    <input type="hidden" name="xkode" value="<?php echo $row->id; ?>" />
                                    <input type="hidden" name="xnama" value="<?php echo $row->nama; ?>" />
                                    <center>
                                        <div class="el-card-avatar el-overlay-1"> <img
                                                src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>"
                                                width="50%" height="50%" alt="user" />
                                    </center><br>

                                    <p>Apakah Anda yakin memilih Voting <b>
                                            <h4> <?php echo $row->nama; ?> ?</h4>
                                        </b> </p>

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



    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/excanvas.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.pie.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.time.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.stack.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot/jquery.flot.crosshair.js"></script>
    <script src=".<?php echo base_url() . '' ?>assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/dist/js/pages/flot-data.js"></script>
    <script src="<?php echo base_url() . '' ?>assets/node_modules/Chart.js/Chart.min.js"></script>

    <?php
    $this->load->view('js');
    ?>
    <script>
    //Flot Pie Chart
    $(function() {
        var data = [{
            label: "Dr. Deni Mahdiana, S.Kom, M.M, M.Kom",
            data: <?php echo $calon1; ?>,
            color: "#4f5467",
        }, {
            label: "Dr. DIDI ROSIYADI S,Kom., M.Kom",
            data: <?php echo $calon2; ?>,
            color: "#26c6da",
        }];
        var plotObj = $.plot($("#flot-pie-chart"), data, {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            color: null,
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });
    });



    /// bar cart

    // var ctx2 = document.getElementById("chart22").getContext("2d");
    //     var data2 = {
    //         labels: <?php echo json_encode($bulan); ?>,
    //         datasets: [
    //             {
    //                 label: "My First dataset",
    //                 fillColor: "rgba(19,218,254,0.8)",
    //                 strokeColor: "rgba(19,218,254,1)",
    //                 pointColor: "rgba(19,218,254,1)",
    //                 pointStrokeColor: "#fff",
    //                 pointHighlightFill: "#fff",
    //                 pointHighlightStroke: "rgba(19,218,254,1)",
    //                 data:  <?php echo json_encode($value); ?>
    //             }
    //         ]
    //     };

    //     var chart2 = new Chart(ctx2).Bar(data2, {
    //         scaleBeginAtZero : true,
    //         scaleShowGridLines : true,
    //         scaleGridLineColor : "rgba(0,0,0,.005)",
    //         scaleGridLineWidth : 0,
    //         scaleShowHorizontalLines: true,
    //         scaleShowVerticalLines: true,
    //         barShowStroke : true,
    //         barStrokeWidth : 0,
    // 		tooltipCornerRadius: 2,
    //         barDatasetSpacing : 3,
    //         legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //         responsive: true
    //     });



    var ctx2 = document.getElementById("chart2").getContext("2d");

    var data2 = {

        labels: ["Prosentase Suara"],
        datasets: [{
                label: "Calon 1",
                fillColor: "#4f5467",
                strokeColor: "#4f5467",
                highlightFill: "#4f5467",
                highlightStroke: "rgba(252,201,186,1)",
                data: [<?php echo $calon1; ?>]
            },
            {
                label: "Calon 2",
                fillColor: "#26c6da",
                strokeColor: "#26c6da",
                highlightFill: "#26c6da",
                highlightStroke: "rgba(180,193,215,1)",
                data: [<?php echo $calon2; ?>]
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