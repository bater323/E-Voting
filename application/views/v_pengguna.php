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

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/aptikom.png">
    <title>Dashboar | Pengguna</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/dist/css/style.min.css'?>" rel="stylesheet">

</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Pengguna</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <?php 
    $this->load->view('v_header');
  ?>

        <?php 
    $this->load->view('v_sidebar');
  ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Pengguna</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Beranda</a></li>
                                <li class="breadcrumb-item active">Pengguna</li>
                            </ol>
                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-plus-circle"></i> Tambah Pengguna</button> -->

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Data Pengguna</h4>
                                <br>
                                <div><?php echo $this->session->flashdata('message');?></div>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                                <th>No</th>
                                                <th>File Kartu anggota</th>
                                                <th>No Anggota</th>
                                                <th>Nama Lengkap</th>
                                                <th>Asal PT</th>
                                                <th>Email</th>
                                                <th>Telpon</th>
                                                <th>Password</th>
                                                <th>Status Anggota</th>
                                                <th>Tanggal Register</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>File Kartu anggota</th>
                                                <th>No Anggota</th>
                                                <th>Nama Lengkap</th>
                                                <th>Asal PT</th>
                                                <th>Email</th>
                                                <th>Telpon</th>
                                                <th>Password</th>
                                                <th>Status Anggota</th>
                                                <th>Tanggal Register</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                        <?php 
                                                $no=0;
                                                foreach ($user->result() as $row):
                                                    $no++;
                                            ?>


                                            <tr>
                                            <td><?php echo $no;?></td>
                                            

                                                          <td>   
                                                        <?php if($row->bukti_file==''){?>
                                                      
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg-file<?php echo $row->id;?>">
                                                        <i class="fa  fa-cloud-upload">Upload File</i></button>
                                                        <?php }
                                                         
                                                        
                                                        else{
                                                       ?>
                                                      
                                                         <button type="button"  data-toggle="modal"
                                                                data-target="#deletefile<?php echo $row->id;?>" button type="button" class="btn-xs btn btn-danger"><i class="fa   fa-trash-o"></i> Delete File</button>
<!-- 
                                                                    &nbsp;
                                                                    &nbsp;
                                                        <a href="<?php echo base_url().'Pengguna/downloadFile/'.$row->id;?>" button type="button" class="btn-xs btn btn-success"><i class="fa  fa-cloud-download"></i> Download File </a> -->

                                                        <a href="<?php echo base_url().'./assets/downloadfile/'.$row->bukti_file;?>" button type="button" class="btn-xs btn btn-success" target="_blank"><i class="fa  fa-cloud-download"></i> Lihat File </a>

                                                        <?php }?>
                                                    </td>

                                                      <td><?php echo $row->no_anggota;?></td>
                                                      <td><?php echo $row->nama;?></td>
                                                      <td><?php echo $row->asal_pt;?></td>
                                                      <td><?php echo $row->email;?></td>
                                                      <td><?php echo $row->telpon;?></td>
                                                      <td><?php echo $row->password_user;?></td>
                                       

                                                   
                                                      <td style="text-align:center;"> 
                                              <?php
                                                  if ($row->status_anggota == '1') {
                                                  ?>
                                                      <h3><center><span class='label label-success'> Sudah diVerifikasi</span></center></h3>
                                               
                                                  <?php
                                                  } 

                                            else {
                                                ?>
                                            <h3><center> <span class='label label-danger'>Belum diVerifikasi</span></center></h3>
                                            <?php
                                                }

                                            
                                            
                                                ?>
                                              
                                              </td>
                                              <td><?php echo $row->tgl_register;?></td>

                                    <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $row->id;?>"
                                                                >Edit</a>
                                                         
                                                            


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


    
    <?php 
                                                $no=0;
                                                foreach ($user->result() as $row):
                                                    $no++;
                                            ?>




            <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                                <div class="modal fade bs-example-modal-lg<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Pengguna</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                        

                                            <form action="<?php echo base_url().'Pengguna/update'?>" method="post" enctype="multipart/form-data">

                                            <div class="modal-body">
                                            <div class="form-group">
                                            <input type="hidden" name="kode" value="<?php echo $row->id;?>" />
                                        <label class="col-md-12" for="example-text">Nomor Anggota</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="no_anggota" value="<?php echo $row->no_anggota;?>" class="form-control" placeholder="enter your name"  >
                                        </div>
                                    </div>
                            
                               
                                    
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Nama Lengkap</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="nama" value="<?php echo $row->nama;?>"  class="form-control" placeholder="username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Asal PT</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="asal_pt" value="<?php echo $row->asal_pt;?>" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="bdate">Email</span>
                                        </label>
                                        <div class="col-md-12">
                                        <input type="text" id="example-text" name="email" value="<?php echo $row->email;?>"  class="form-control" placeholder="Mtryout@gmail.com"  required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Kontak</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="number" id="special" name="notelpon" value="<?php echo $row->telpon;?>"  class="form-control" placeholder="08xxxx"  required>
                                        </div>
                                    </div>
                               
                                            </div>
                                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect text-left">Update</button>
                                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Keluar</button>
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



                
    <!-- upload Surat Pengantar -->
    <?php
foreach ($user->result() as $row):
?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="modal fade bs-example-modal-lg-file<?php echo $row->id;?>" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Upload File </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <form action="<?php echo base_url() . 'Pengguna/updatefile' ?>"  method="post" enctype="multipart/form-data">

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
                                     <small class="form-text text-muted"><b>NB: file harus bertype pdf,jpeg,png.</b></small>

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

    <?php endforeach;?>

    <?php
foreach ($user->result() as $row):
?>
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
                    <form action="<?php echo base_url() . 'Pengguna/deleteFile' ?>"  method="post">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" name="xkode" value="<?php echo $row->id; ?>" />
                                <input type="hidden" name="file" value="<?php echo $row->bukti_file; ?>" />
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

    <?php endforeach;?>

    <!-- upload Surat Pengantar -->


 

  <?php 
    $this->load->view('v_footer');
  ?>
    </div>


    <script src="<?php echo base_url().'assets/node_modules/jquery/jquery-3.2.1.min.js'?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url().'assets/node_modules/popper/popper.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/node_modules/bootstrap/dist/js/bootstrap.min.js'?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/perfect-scrollbar.jquery.min.js'?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url().'assets/dist/js/waves.js'?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url().'assets/dist/js/sidebarmenu.js'?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url().'assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js'?>">
    </script>
    <script src="<?php echo base_url().'assets/node_modules/sparkline/jquery.sparkline.min.js'?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/custom.min.js'?>"></script>
    <!-- This is data table -->
    <script src="<?php echo base_url().'assets/node_modules/datatables/jquery.dataTables.min.js'?>"></script>
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
</body>

</html>