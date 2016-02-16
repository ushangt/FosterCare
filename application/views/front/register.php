<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Foster Care Management System for adoption of child">
  <meta name="keywords" content="foster care, child, adoption, parent, deed">
  <title>Foster Care | Register</title>

  <!-- Favicons-->
  <link rel="icon" href="<?=base_url();?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?=base_url();?>assets/images/favicon/apple-touch-icon-152x152.png">
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
      <form class="login-form" method="post" action="action_register">
        <div class="row">
          <div class="input-field col s12 center" style="margin-bottom:-30px">
            <h4>Register</h4>           
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input id="name" type="text" name="name">
            <label for="name" class="center-align">Full Name</label>
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
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email" name="email">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-again" type="password" name="password_again">
            <label for="password-again">Password again</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
            <input id="contact_no" type="text" name="contact_number">
            <label for="contact_no" class="center-align">Contact No.</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12" style="margin-top:-15px;">          
            <p>
              <input id="adopting" name="role_id" type="radio" value="2"> 
              <label for="adopting" class="center-align">Adopting Parent</label>
            </p>
            <p>
              <input id="biological" name="role_id" type="radio" value="3"> 
              <label for="biological" class="center-align">Biological Parent/ Guardian</label>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Register Now</button>
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