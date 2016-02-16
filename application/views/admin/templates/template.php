<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Foster Care Management System for adoption of child">
  <meta name="keywords" content="foster care, child, adoption, parent, deed">
  <title>Foster Care | <?=$page_name;?> </title>

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


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?=base_url();?>assets/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?=base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
   <link href="<?=base_url();?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><span class="logo-text">Foster Care</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <!-- <li>    
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light" title="Settings"><i class="mdi-action-settings"></i></a>                              
                        </li> -->
                        <li>
                          <a href="<?=base_url('front/logout');?>" class="waves-effect waves-block waves-light" title="Logout"><i class="mdi-hardware-keyboard-tab"></i></a>
                        </li>                                            
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
     <?php
      switch($this->session->userdata('ROLE_ID')){
        case 1:
            $menu_file = "admin/templates/menu";
            break;
        case 2:
            $menu_file = "front/adopting_parent/menu";
            break;
        case 3:
            $menu_file = "front/biological_parent/menu";
            break;
      }
     ?>
     <?php $this->load->view($menu_file);?>

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
                        

        <!--start container-->
        <div class="container">
          <div class="section">
            <?php
            if($this->session->flashdata('success'))
            {?>
                  <div class="card light-green">
                    <div class="card-content white-text">
                      <span class="card-title">Success</span>
                      <p><?=$this->session->flashdata('success');?></p>                     
                    </div>  
                  </div>
            <?php
            } 
            if($this->session->flashdata('error'))
            {?>
                  <div class="card red">
                    <div class="card-content white-text">
                      <span class="card-title">Error</span>
                      <p><?=$this->session->flashdata('error');?></p>                     
                    </div>  
                  </div>
            <?php
            }             
            ?>
            <?php $this->load->view($view_file);?>

          </div>
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->

      

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2015 </span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Ushang Thakker</a></span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



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
    <!-- data-tables -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/data-tables/data-tables-script.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins.js"></script>
    
</body>

</html>