<?php
include 'pages/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
  ?>
    <script>
      alert('Session is Denied Please Goto Login...')
      window.open('index.php','_self')
    </script>
  <?php
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Babu`s Pizza | Admin Dashboard...!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script>

  function getSubCat(val) {

    $.ajax({
    type: "POST",
    url: "get_subcategory.php",
    data:'catid='+val,
    success: function(data)
    {
      $("#sub_type").html(data);
    }
  });

}
  </script>
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
              <a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block">
                    <span>Babu`s  </span><strong>Pizza</strong>
                  </div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none">
                    <strong>B`s P</strong>
                  </div>
                </a>
                <a id="toggle-btn" href="#" class="menu-btn active">
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center">
                  <i class="icon-user mr-2"></i>
                    <?php echo $_SESSION['admin'];?>
                </li>
                
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> 
                  <span class="d-none d-sm-inline">Logout</span>
                  <i class="fa fa-sign-out"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>