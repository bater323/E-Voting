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
    <title>Dashboar | All Pengguna</title>
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
    $this->load->view('admin/v_header');
  ?>

        <?php 
    $this->load->view('admin/v_sidebar');
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Pengguna</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-plus-circle"></i> Tambah Pengguna</button>

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
                                <h4 class="card-title"> All Pengguna</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                                 <th>No</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                                <th>level</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                        <?php 
                                        $no=0;
                                        foreach ($data->result_array() as $i) :
                                         $no++;
                       $pengguna_id=$i['pengguna_id'];
                       $pengguna_nama=$i['pengguna_nama'];
                       $pengguna_jenkel=$i['pengguna_jenkel'];
                       $pengguna_email=$i['pengguna_email'];
                       $pengguna_username=$i['pengguna_username'];
                       $pengguna_password=$i['pengguna_password'];
                       $pengguna_nohp=$i['pengguna_nohp'];
                       $pengguna_level=$i['pengguna_level'];
                       $pengguna_photo=$i['pengguna_photo'];
                    ?>
                                            <tr>
                                            <td><?php echo $no;?></td>
                                            

                                                <td style="vertical-align: middle;">
                                                        <?php if (empty($pengguna_photo)) : ?>
                                                            <img class="img-circle" width="50" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"> <?php echo $pengguna_nama;?>
                                                        <?php else : ?>
                                                            <img class="img-circle" width="50" src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>"> <?php echo $pengguna_nama;?>
                                                        <?php endif; ?>
                                                    </td>
                                        
                                        <td><?php echo $pengguna_username;?></td>
                                        <?php if($pengguna_jenkel=='L'):?>
                                                <td>Laki-Laki</td>
                                        <?php else:?>
                                                <td>Perempuan</td>
                                        <?php endif;?>
                                       
                                        <?php if($pengguna_level=='1'):?>
                                                <td>Administrator</td>
                                        <?php else:?>
                                                <td>Author</td>
                                        <?php endif;?>
                                        <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $pengguna_id;?>"
                                                                >Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#Delete<?php echo $pengguna_id;?>">Delete</a>
                                                            


                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
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
                            
                              
                                <!-- sample modal content -->
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Add New Pengguna</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                        
                                            <form action="<?php echo base_url().'admin/Pengguna/addpengguna'?>" method="post" enctype="multipart/form-data">

                                            <div class="modal-body">
                                            <div class="form-group">
                                        <label class="col-md-12" for="example-text">Name</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="xnama" class="form-control" placeholder="enter your name"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="xjenkel" required>
                                                <option>Select Gender</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                  
                               
                                    
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Username</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="xusername" class="form-control" placeholder="username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Password</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="password" id="special" name="xpassword" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Konfirmasi Password</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="password" id="special" name="xpassword2" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="bdate">Email</span>
                                        </label>
                                        <div class="col-md-12">
                                        <input type="text" id="example-text" name="xemail" class="form-control" placeholder="hermanto.hmt11@gmail.com"  required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Kontak</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="number" id="special" name="xkontak" class="form-control" placeholder="08953xxx"  required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="col-sm-12">Level</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="xlevel" required>
                                                <option>Select Level</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">User</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Profile Image</label>
                                        <BR>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <input type="file" name="filefoto" class="form-control form-control-line">
                                        </div>
                                        </div>
                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect text-left">Simpan</button>
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

    
    
    <?php
					$no=0;
					foreach ($data->result_array() as $i) :
					   $no++;
                       $pengguna_id=$i['pengguna_id'];
                       $pengguna_nama=$i['pengguna_nama'];
                       $pengguna_jenkel=$i['pengguna_jenkel'];
                       $pengguna_email=$i['pengguna_email'];
                       $pengguna_username=$i['pengguna_username'];
                       $pengguna_password=$i['pengguna_password'];
                       $pengguna_nohp=$i['pengguna_nohp'];
                       $pengguna_level=$i['pengguna_level'];
                       $pengguna_photo=$i['pengguna_photo'];
                       
                    ?>




            <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                                <div class="modal fade bs-example-modal-lg<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Pengguna</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                        

                                            <form action="<?php echo base_url().'admin/Pengguna/update'?>" method="post" enctype="multipart/form-data">

                                            <div class="modal-body">
                                            <div class="form-group">
                                            <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>" />
                                        <label class="col-md-12" for="example-text">Name</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="xnama" value="<?php echo $pengguna_nama;?>" class="form-control" placeholder="enter your name"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="xjenkel"  value="<?php echo $pengguna_jenkel;?>" required>
                                                <option>Select Gender</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                  
                               
                                    
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Username</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="xusername" value="<?php echo $pengguna_username;?>"  class="form-control" placeholder="username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Password</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="xpassword" value="<?php echo $pengguna_password;?>" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="bdate">Email</span>
                                        </label>
                                        <div class="col-md-12">
                                        <input type="text" id="example-text" name="xemail" value="<?php echo $pengguna_email;?>"  class="form-control" placeholder="Mtryout@gmail.com"  required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Kontak</span>
                                        </label>
                                        <div class="col-md-12">
                                            <input type="number" id="special" name="xkontak" value="<?php echo $pengguna_nohp;?>"  class="form-control" placeholder="08xxxx"  required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="col-sm-12">Level</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="xlevel" value="<?php echo $pengguna_level;?>"  required>
                                                <option>Select Level</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Profile Image</label>
                                        <BR>
                                        <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            

                                            <?php if(file_exists("assets/images/" . $pengguna_photo)){ ?>

                                                <img src="<?php echo base_url() . 'assets/images/' . $pengguna_photo ?>" alt="" class="img-responsive" width="200" height="200">    
                                                        <?php }else{
                                                    ?>
                                        
                                        <input type="hidden" id="special" name="foto" class="form-control" placeholder="Foto" value="<?php echo $pengguna_photo; ?>" required>
 
                                                        <?php }?>
                                            
                                                <input type="file" name="filefoto" class="form-control form-control-line">
                                        
                                        </div>
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
    
  <?php endforeach;?>



  <?php

foreach ($data->result() as $row) :


?>




    <div class="modal fade" id="Delete<?php echo $row->pengguna_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/pengguna/hapus_pengguna' ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-12 m-b-20">
                                <input type="hidden" name="xkode" value="<?php echo $row->pengguna_id; ?>" />
                                <input type="hidden" name="file" value="<?php echo $row->pengguna_photo; ?>" />
                                <p>Apakah Anda yakin mau menghapus Data <b> <?php echo $row->pengguna_nama; ?> </b> ini ?</p>

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
    $this->load->view('admin/v_footer');
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