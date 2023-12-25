<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="#" crossorigin="anonymous"></script>
    <link href="<?php echo base_url() . 'assets/js/style.css' ?>" rel="stylesheet">
    <title>E-Voting</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/icon.png">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?php echo base_url() . 'Login/auth' ?>" method="post" class="sign-in-form">
                    <h2 class="title">Sign in E-Voting</h2>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="input-field">
                        <i class="fa fa-vcard-o"></i>
                        <input class="form-control" type="text" name="username" required="" placeholder="Nomor Anggota">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Masuk</button>
                        </div>
                    </div>
                </form>
                <form method="post" action="<?= base_url() ?>Register/save_user" class="sign-up-form">
                    <h2 class="title">Sign up E-Voting</h2>
                    <div class="input-field">
                        <i class="fa fa-vcard-o"></i>
                        <input class="input--style-5" type="text" name="no_anggota" placeholder="Nomor Anggota"
                            required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input class="input--style-5" type="text" name="nama" placeholder="Nama lengkap" required>
                    </div>
                    <div class="input-field">
                        <i class="fa  fa-building-o"></i>
                        <input class="input--style-5" type="text" name="asal_pt" placeholder="Komunitas/team" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input class="input--style-5" type="email" name="email" placeholder="Email" required>

                    </div>

                    <div class="input-field">
                        <i class="fa fa-mobile"></i>
                        <input class="input--style-5" type="number" name="notelpon" placeholder="No Hp/WA" required>
                    </div>
                    <div class="col-xs-12 p-b-20">
                        <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Register</button>

                    </div>

                </form>
            </div>
        </div>
        <br>
        <br>



        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Aplikasi E-Votting Online</h3>
                    <p>
                        Selamat datang di Aplikasi E-Votting Pemilihan secara Online,Transparan, Efisien Waktu dan Mudah
                        Digunakan.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Daftar
                    </button>
                </div>
                <img src="<?php echo base_url() . 'assets/img/log.svg' ?>" class="image" alt="" />
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Aplikasi E-Voting Online</h3>
                    <p>
                        Selamat datang di Aplikasi E-Voting Pemilihan secara Online,Transparan, Efisien Waktu dan Mudah
                        Digunakan.

                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign In
                    </button>
                </div>
                <img src="<?php echo base_url() . 'assets/img/register.svg' ?>" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() . 'assets/js/app.js' ?>"></script>
</body>

</html>