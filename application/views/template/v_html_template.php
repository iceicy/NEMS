<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>NEMs - SE 59</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fontawesome/css/font-awesome.min.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/animate.css/animate.min.css">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/whirl/dist/whirl.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/weather-icons/css/weather-icons.min.css">
    <!-- DATETIMEPICKER-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" id="maincss">

    <!-- =============== VENDOR SCRIPTS ===============-->
    <!-- MODERNIZR-->
    <script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.custom.js"></script>
    <!-- MATCHMEDIA POLYFILL-->
    <script src="<?php echo base_url(); ?>assets/vendor/matchMedia/matchMedia.js"></script>
    <!-- JQUERY-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.js"></script>
    <!-- BOOTSTRAP-->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.js"></script>
    <!-- STORAGE API-->
    <script src="<?php echo base_url(); ?>assets/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
    <!-- JQUERY EASING-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.easing/js/jquery.easing.js"></script>
    <!-- ANIMO-->
    <script src="<?php echo base_url(); ?>assets/vendor/animo.js/animo.js"></script>
    <!-- SLIMSCROLL-->
    <script src="<?php echo base_url(); ?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- SCREENFULL-->
    <script src="<?php echo base_url(); ?>assets/vendor/screenfull/dist/screenfull.js"></script>
    <!-- LOCALIZE-->
    <!--<script src="-->
    <?php //echo base_url();?><!--assets/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>-->
    <!-- RTL demo-->
    <script src="<?php echo base_url(); ?>assets/js/demo/demo-rtl.js"></script>
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <!-- SPARKLINE-->
    <script src="<?php echo base_url(); ?>assets/vendor/sparkline/index.js"></script>
    <!-- FLOT CHART-->
    <script src="<?php echo base_url(); ?>assets/vendor/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/Flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/Flot/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
    <!-- CLASSY LOADER-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-classyloader/js/jquery.classyloader.min.js"></script>
    <!-- MOMENT JS-->
    <script src="<?php echo base_url(); ?>assets/vendor/moment/min/moment-with-locales.min.js"></script>
    <!-- DEMO-->
    <script src="<?php echo base_url(); ?>assets/js/demo/demo-flot.js"></script>
    <!-- Register -->
    <script src="<?php echo base_url(); ?>assets/js/register/regis.js"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

    <!-- include javascript of testresult -->
    <!-- DATATABLES-->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/media/js/dataTables.bootstrap.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/testresult/app.js""></script>  
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/testresult/app.js""></script>


</head>

<body>
<div class="wrapper">
    <?php $this->load->view('template/v_header_topnavbar.php'); ?>
    <!-- sidebar-->
    <aside class="aside">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
                <!-- START sidebar nav-->
                <ul class="nav">
                    <!-- START user info-->
                    <li class="has-user-block">
                        <div id="user-block" class="collapse">
                            <div class="item user-block">
                                <!-- User picture-->
                                <div class="user-block-picture">
                                    <div class="user-block-status">
                                        <img src="<?php echo base_url(); ?>assets/img/user/02.jpg" alt="Avatar"
                                             width="60" height="60"
                                             class="<?php echo base_url(); ?>assets/img/-thumbnail img-circle">
                                        <div class="circle circle-success circle-lg"></div>
                                    </div>
                                </div>
                                <!-- Name and Job-->
                                <div class="user-block-info">
                                    <?php
                                      $fname = '';
                                      $fname .= $this->session->userdata('title').' ';
                                      $fname .= $this->session->userdata('first_name').' ';
                                      $fname .= $this->session->userdata('last_name');
                                      ?>
                                    <span class="user-block-name"><?php echo $fname; ?></span>
                                    <span class="user-block-role"><?php echo $this->session->userdata('student_ID'); ?></span>
                                    <!--span class="user-block-name">Software Engineering, KMUTT</span>
                                    <span class="user-block-role">SE 13th</span-->
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- END user info-->
                    <!-- Iterates over all sidebar items-->
                    <li class="nav-heading ">
                        <span data-localize="sidebar.heading.HEADER">NEMs</span>
                    </li>
                    <?php
                    $this->load->view('template/v_menu_module_registration_and_announcement');
                    $this->load->view('template/v_menu_module_examination_management');
                    $this->load->view('template/v_menu_module_test_result_management');
                    $this->load->view('template/v_menu_module_logistics');
                    $this->load->view('template/v_menu_module_payment_and_audit');
                    ?>
                </ul>
                <!-- END sidebar nav-->
            </nav>
        </div>
        <!-- END Sidebar (left)-->
    </aside>
    <!-- Main section-->
    <section>

        <?php echo $body; ?>

    </section>
    <!-- Page footer-->
    <footer>
        <span>&copy; 2016 - Angle</span>
    </footer>
</div>
</body>

</html>
