<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Foster Care Management System for adoption of child">
  <meta name="keywords" content="foster care, child, adoption, parent, deed">
  <title>Foster Care | Login</title>

  <!-- Favicons-->
  <link rel="icon" href="<?=base_url();?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?=base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?=base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?=base_url();?>assets/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?=base_url();?>assets/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?=base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="post" action="front/action_login">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?=base_url();?>assets/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Foster Care Management</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row" align="center">          
          <?php
            if($this->input->get('error'))
              echo '<span class="red-text">Invalid username/password</span>';
          ?>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 32">
            <p class="margin medium-small"><a href="front/register">Register Now!</a></p>
          </div>
             
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?=base_url();?>assets/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?=base_url();?>assets/js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?=base_url();?>assets/js/plugins.js"></script>

</body>

</html>