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
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="#">
                  <span style="color:#FFFFFF"><b>NEMs - SE 59</b></span>
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">SIGN IN TO CONTINUE.</p>
              <div class="col-sm-10">
                <?php echo $err_msg; ?>
              </div>
               <form role="form" data-parsley-validate="" novalidate="" class="mb-lg" action="<?php echo site_url().'/registration/login/checkaction'?>" enctype="multipart/form-data" method="post"><!--//echo base_url();-->
                  <!--div class="form-group has-feedback">
                     <input id="exampleInputEmail1" type="email" placeholder="Enter email" autocomplete="off" required class="form-control" value="mail@mail.com">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div-->
                  <div class="form-group has-feedback">
                     <input type="text" placeholder="Enter ID" autocomplete="off" required maxlength="13" data-parsley-length="[13, 13]" class="form-control" value="" name="user_name">
                     <span class="fa fa-key form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input id="exampleInputPassword1" type="password" placeholder="Password" required maxlength="8" class="form-control" value="" name="password">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="" name="remember">
                           <span class="fa fa-check"></span>Remember Me</label>
                     </div>
                     <div class="pull-right"><a href="<?php echo site_url('registration/login/recover'); ?>" class="text-muted">Forgot your password?</a>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-primary mt-lg">Login</button>
               </form>
               <p class="pt-lg text-center">Need to Signup?</p><a href="<?php echo site_url('registration/singup/register'); ?>" class="btn btn-block btn-default">Register Now</a>
            </div>
         </div>
         <!-- END panel-->
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2016</span>
            <span>-</span>
            <span>Angle</span>
            <br>
            <span>Bootstrap Admin Template</span>
         </div>
      </div>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.custom.js"></script>
   <!-- JQUERY-->
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="<?php echo base_url(); ?>assets/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- PARSLEY-->
   <script src="<?php echo base_url(); ?>assets/vendor/parsleyjs/dist/parsley.min.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <!--script src="js/app.js"></script-->
</body>

</html>
