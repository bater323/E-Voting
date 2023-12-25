<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Kelompok 4" content="Evotting" />

    <link
        href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700|Playfair+Display:400,700"
        rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/icon.png">
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/style.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/one-page/onepage.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/one-page/css/et-line.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/fonts.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/colors.php?color=6C63FF" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>themes/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Voting</title>

    <style>
    body.stretched #header.full-header .container {
        padding-right: 56px;
    }

    .slider-element {
        background-image: linear-gradient(to right, #FFF 20%, rgba(108, 99, 255, .2) 100%);
        background-position: right top;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 30px 0;
    }

    .top-title {
        display: block;
        position: relative;
        padding-left: 60px;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6C63FF;
    }

    .top-title::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 50px;
        height: 2px;
        margin-top: -1px;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .slider-element p {
        font-size: 16px;
        line-height: 1.75;
        font-weight: 400;
        color: #999;
    }

    .social-icons {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0 20px;
        height: 100vh;
        background-color: #FFF;
        z-index: 5;
    }

    @media (max-width: 991.98px) {
        .social-icons {
            position: relative;
            padding: 0 20px;
            height: auto;
            width: 100%;
            background-color: transparent;
        }

        .social-icons .separator {
            display: none;
        }
    }

    .social-icons .social-icon {
        position: relative;
        margin: 4px 2px;
        color: rgba(0, 0, 0, 0.4);
    }

    .social-icons .separator {
        width: 2px;
        height: 60px;
        background-color: rgba(0, 0, 0, 0.06);
        margin: 10px 0;
    }

    .form-group {
        position: relative;
        padding: 10px 20px;
        border-radius: 2px;
        background-color: #FFF;
    }

    #widget-subscribe-form-email-error {
        text-indent: -9999px;
        height: 0;
        margin: 0 !important;
    }

    #widget-subscribe-form-email-error {
        display: block !important;
    }

    .form-group input+#widget-subscribe-form-email-error::after {
        content: "";
        font-family: 'font-icons';
        position: absolute;
        top: 50%;
        right: 5%;
        font-size: 24px;
        transform: translateY(-50%);
        text-indent: 0;
        cursor: default;
        color: red;
    }

    .form-group input.error+#widget-subscribe-form-email-error::after {
        content: "\e9f7";
        color: red;
    }

    .form-control.valid+#widget-subscribe-form-email-error::after {
        content: "\e988";
        color: green;
    }

    .form-group input:not(:focus)+#widget-subscribe-form-email-error::after {
        content: none;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 500;
        text-transform: none;
        letter-spacing: 0;
        margin-bottom: 0;
    }

    .form-group input {
        position: relative;
        background-color: transparent;
        border: 0;
        padding: 0;
        font-size: 18px;
        font-weight: 600;
    }

    .form-group input:active,
    .form-group input:focus {
        border-color: transparent;
        background-color: transparent;
    }
    </style>

</head>

<body class="stretched">

    <div id="wrapper" class="clearfix">
        <header id="header" class="full-header header-size-custom" data-sticky-shrink="false">

            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">
                        <div id="logo">
                            <a href="index.js" class="standard-logo"
                                data-dark-logo="<?= base_url() ?>assets/img/evot.png"><img
                                    src="<?= base_url() ?>assets/img/evot.png" alt="E-votting"></a>
                            <a href="index.html" class="retina-logo"
                                data-dark-logo="<?= base_url() ?>assets/img/evot.png"><img
                                    src="<?= base_url() ?>assets/img/evot.png" alt="E-votting"></a>
                        </div><!-- #logo end -->
        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <nav class="primary-menu">

                            <ul class="one-page-menu menu-container" data-easing="easeInOutExpo" data-speed="1250"
                                data-offset="65">
                                <li class="menu-item">
                                    <a href="#" class="menu-link" data-href="#wrapper">
                                        <div>Home</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="menu-link" data-href="#section-about">
                                        <div>Candidate</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="menu-link" data-href="#section-works">
                                        <div>About</div>
                                    </a>
                                </li>


                                <li class="menu-item">
                                    <a href="#" class="menu-link" data-href="#section-contact">
                                        <div>Contact</div>
                                    </a>
                                </li>
                            </ul>

                        </nav>

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>

        </header>
        <section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header">

            <div class="slider-inner">
                <div class="vertical-middle">

                    <div class="container">
                        <div class="row align-items-center justify-content-between py-5">

                            <div class="col-lg-5 col-md-6">
                                <div class="subscribe-widget" data-loader="button" data-alert-type="inline">
                                    <h1 class="display-4 nott" style="letter-spacing:-1px; line-height: 1;">
                                        <div class="top-title">Welcome</div>
                                        <span class="text-rotater nocolor" style="font-family: 'Playfair Display';"
                                            data-separator="|" data-rotate="fadeIn" data-speed="1300"><span
                                                class="t-rotate fw-bold opm-large-word">E-Voting.|Pemilihan.|Komunitas.|Website.|Digital.|Voting
                                                .</span></span>
                                    </h1>
                                    <p class="mb-5">E-voting atau electronic voting adalah sebuah sistem untuk memungut
                                        suara pemilih secara online dan realtime.</p>
                                    <div class="widget-subscribe-form-result"></div>

                                    <a href="login.aspx"
                                        class="button button-xlarge button-rounded ms-0 mt-2 shadow ls0">Masuk
                                        Voting</a>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-5">
                                <img src="<?= base_url() ?>themes/one-page/images/page/design.svg" alt="Image">
                            </div>

                        </div>
                    </div>

                </div>
            </div>



            <a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65"
                class="one-page-arrow ms-2 mt-5" style="left: 80px;"><i
                    class="icon-line-arrow-down infinite animated fadeInDown"></i></a>

        </section>
        <section id="content">
            <div class="content-wrap py-0">

                <div id="section-about" class="center page-section">

                    <div class="container clearfix">


                        <div class="row topmargin-lg mx-auto" style="max-width: 1000px;">
                            <?php

                            foreach ($user->result() as $row) :

                            ?>
                            <div class="col-md-4 mb-5">

                                <div class="team">
                                    <div class="team-image">
                                        <img src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>"
                                            alt="Candidate">
                                        <div class="bg-overlay">

                                            <div class="bg-overlay-bg" data-hover-animate="fadeIn"
                                                data-hover-speed="400"></div>
                                        </div>
                                    </div>
                                    <div class="team-desc team-desc-bg">
                                        <div class="team-title">
                                            <h4><?php echo $row->nama; ?></h4>
                                            <span><?php echo $row->deskripsi; ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php endforeach; ?>


                        </div>

                    </div>

                </div>

                <div id="section-works" class="page-section pt-0">

                    <div class="section m-0">
                        <div class="container clearfix">
                            <div class="mx-auto center" style="max-width: 900px;">
                                <h2 class="mb-0 fw-light ls1">E-voting atau electronic voting adalah sebuah sistem untuk
                                    memungut suara pemilih secara online dan realtime.<br>
                                    Aplikasi E-Voting ini dibuat agar untuk mempermudah dalam melakukan pemilihan secara
                                    online seperti pemilihan osis, pengurus RT RW, pemilihan ketua kelas, pemilihan
                                    presiden mahasiswa dan lain sejenisnya.</h2>
                            </div>
                        </div>
                    </div>






                </div>

                <div id="section-contact" class="page-section pt-0">
                    <div class="container clearfix">

                        <div class="mx-auto topmargin" style="max-width: 850px;">

                            <?php echo $this->session->flashdata('msg'); ?>

                            <form class="row mb-0" action="kontak-send.aspx" method="post">


                                <div class="col-md-6 mb-4">
                                    <input type="text" name="name" class="sm-form-control border-form-control required"
                                        placeholder="Name" />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" name="email"
                                        class="required email sm-form-control border-form-control"
                                        placeholder="Email Address" />
                                </div>

                                <div class="w-100"></div>


                                <div class="col-md-12 mb-4">
                                    <input type="text" name="subject"
                                        class="required sm-form-control border-form-control" placeholder="Subject" />
                                </div>

                                <div class="w-100"></div>

                                <div class="col-12 mb-4">
                                    <textarea class="required sm-form-control border-form-control" name="message"
                                        rows="7" cols="30" placeholder="Your Message"></textarea>
                                </div>

                                <div class="col-12 center mb-4">
                                    <button class="button button-border button-circle fw-medium ms-0 topmargin-sm"
                                        type="submit">Send Message</button>

                                </div>




                            </form>


                        </div>

                    </div>

                </div>

            </div>
        </section><!-- #content end -->

        <!-- Footer
		============================================= -->
        <footer id="footer" class="dark border-0">



            <div id="copyrights">
                <div class="container center clearfix">
            
                </div>
            </div>

        </footer>

    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
    <script src="<?= base_url() ?>themes/js/jquery.js"></script>
    <script src="<?= base_url() ?>themes/js/plugins.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>

    <script src="<?= base_url() ?>themes/js/functions.js"></script>

</body>

</html>