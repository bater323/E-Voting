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
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/icon.png">
    <title>Dashboar Polling</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/dist/css/style.min.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/node_modules/dropify/dist/css/dropify.min.css' ?>">

</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"> Polling</p>
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
                        <h4 class="text-themecolor">Data Polling</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active"> Polling</li>
                            </ol>



                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> All Polling</h4>

                                <br>
                                <div><?php echo $this->session->flashdata('message'); ?></div>
                                <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal"
                                    data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Tambah
                                    Data</button>
                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Flayer</th>
                                                <th>Images</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah Polling</th>
                                                <th>Tanggal Post</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Flayer</th>
                                                <th>Images</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah Polling</th>
                                                <th>Tanggal Post</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($data->result() as $row) :
                                                $no++;
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>

                                                <td><?php echo $row->id; ?></td>
                                                <td>
                                                    <?php if ($row->flayer == '') { ?>

                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target=".bs-example-modal-lg-file<?php echo $row->id; ?>">
                                                        <i class="fa  fa-cloud-upload">Upload Flayer</i></button>
                                                    <?php } else {
                                                        ?>

                                                    <div class="el-card-avatar el-overlay-1"> <img width="100"
                                                            src="<?php echo base_url() . 'assets/images/' . $row->flayer; ?>"
                                                            alt="user" />

                                                        <a class="btn-xs btn btn-info" target="_blank"
                                                            href="<?php echo base_url() . 'assets/images/' . $row->flayer; ?>"><i
                                                                class="icon-magnifier"></i></a>



                                                        <button type="button" data-toggle="modal"
                                                            data-target="#deletefile<?php echo $row->id; ?>" button
                                                            type="button" class="btn-xs btn btn-danger"><i
                                                                class="fa   fa-trash-o"></i>

                                                        </button>

                                                        <?php } ?>
                                                </td>

                                                <td style="vertical-align: middle;">
                                                    <?php if (empty($row->gambar)) : ?>
                                                    <img class="img-circle" width="100"
                                                        src="<?php echo base_url() . 'assets/images/noimage.png'; ?>">
                                                    <?php else : ?>
                                                    <img class="img-circle" width="100"
                                                        src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->deskripsi; ?></td>
                                                <td>
                                                    <center>
                                                        <h3> <b><?php echo $row->totalpolling; ?></b></h3>
                                                    </center>
                                                </td>
                                                <td><?php echo date('d M Y', strtotime($row->tgl_create)); ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target=".bs-example-modal-lg-edit<?php echo $row->id; ?>">Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#Delete<?php echo $row->id; ?>">Delete</a>



                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>



        </div>
    </div>





    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Tambah Data Polling</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>


                            <form action="<?php echo base_url() . 'admin/Polling/save' ?>" method="post"
                                enctype="multipart/form-data">

                                <div class="modal-body">


                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Nama Lengkap</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="nama" class="form-control"
                                                placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi </label>
                                        <textarea class="form-control" rows="5" placeholder="Ketikan Deskripsi Images.."
                                            name="xdeksripsi" required></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-sm-12">Upload Images</label>

                                        <BR>
                                        <div class="col-sm-12">
                                            <small class="form-text text-muted">Ukuran Gambar:</small>
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <input type="file" id="input-file-now" class="dropify" name="filefoto"
                                                    accept="application/jpg" required />

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect text-left">Simpan</button>
                                    <button type="button" class="btn btn-danger waves-effect text-left"
                                        data-dismiss="modal">Keluar</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>
        </div>




    </div>







    <?php
    foreach ($data->result_array() as $i) :
        $id = $i['id'];
        $nama = $i['nama'];
        $deskripsi = $i['deskripsi'];
        $gambar = $i['gambar'];


    ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="modal fade bs-example-modal-lg-edit<?php echo $id; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Edit data Polling</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>


                            <form action="<?php echo base_url() . 'admin/Polling/update' ?>" method="post"
                                enctype="multipart/form-data">

                                <div class="modal-body">




                                    <div class="form-group">
                                        <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                                        <label class="col-md-12" for="special">Nama Lengkap</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="nama" value="<?php echo $nama; ?>"
                                                class="form-control" placeholder="username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi </label>
                                        <textarea class="form-control" rows="5" placeholder="Ketikan Deskripsi Images.."
                                            name="xdeksripsi" required><?php echo $deskripsi; ?></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-sm-12">Image</label>
                                        <BR>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <?php if (file_exists("assets/images/" . $gambar)) { ?>

                                                <img src="<?php echo base_url() . 'assets/images/' . $gambar ?>" alt=""
                                                    lass="dropify" width="200" height="200">
                                                <?php } else {
                                                    ?>

                                                <input type="hidden" id="special" name="foto" class="form-control"
                                                    placeholder="foto" value="<?php echo $gambar; ?>" required>


                                                <?php } ?>
                                                <input type="file" id="input-file-now" class="dropify" name="filefoto"
                                                    accept="application/jpg" />

                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect text-left">Update</button>
                                    <button type="button" class="btn btn-danger waves-effect text-left"
                                        data-dismiss="modal">Keluar</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>
        </div>




    </div>



    <?php endforeach; ?>



    <?php

    foreach ($data->result() as $row) :


    ?>




    <div class="modal fade" id="Delete<?php echo $row->id; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/Polling/delete' ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" name="xkode" value="<?php echo $row->id; ?>" />
                                <input type="hidden" name="file" value="<?php echo $row->gambar; ?>" />

                                <p>Apakah Anda yakin mau menghapus Data <b><?php echo $row->nama; ?> </b> ini ?</p>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary" id="delete">Hapus</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    </div>

    <?php endforeach; ?>

    <?php
    foreach ($data->result() as $row) :
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="modal fade bs-example-modal-lg-file<?php echo $row->id; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Upload File </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <form action="<?php echo base_url() . 'admin/Polling/updatefile' ?>" method="post"
                                enctype="multipart/form-data">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="kode" value="<?php echo $row->id; ?>" />
                                        <label class="col-md-12" for="example-text">Upload File :</span>
                                            <br>
                                            <span class='label label-danger'>FILE MAX 5 Mb</span>
                                        </label>
                                        </label>

                                        <div class="col-md-12">
                                            <input type="file" id="example-text" name="filedokumen"
                                                class="form-control">
                                        </div>
                                        <small class="form-text text-muted"><b>NB: Ukuran 800 x 800, file harus bertype
                                                JPEF,PNG.</b></small>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect text-left">Upload</button>
                                    <button type="button" class="btn btn-danger waves-effect text-left"
                                        data-dismiss="modal">Keluar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="modal fade" id="deletefile<?php echo $row->id; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Hapus File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/Polling/deleteFile' ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" name="xkode" value="<?php echo $row->id; ?>" />
                                <input type="hidden" name="file" value="<?php echo $row->flayer; ?>" />
                                <p>Apakah Anda yakin mau menghapus File ini ?</p>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="delete">Hapus</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    </div>

    <?php endforeach; ?>

    <?php
    $this->load->view('admin/v_footer');
    ?>
    </div>


    <script src="<?php echo base_url() . 'assets/node_modules/jquery/jquery-3.2.1.min.js' ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() . 'assets/node_modules/popper/popper.min.js' ?>"></script>
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
    <!-- This is data table -->
    <script src="<?php echo base_url() . 'assets/node_modules/datatables/jquery.dataTables.min.js' ?>"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>


    <script src="<?php echo base_url() . 'assets/node_modules/dropify/dist/js/dropify.min.js' ?>"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
</body>

</html>