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
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo text-center">
                    <h1 class="text-center ml-5">Welcome To Admin</h1>
                  </div>
                  <p class="text-right font-weight-bold">Babu`s Pizza Delivery</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate">
                    <div class="form-group">
                      <input  type="text" id="username" name="username" autofocus="autofocus" autocomplete="on" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password" autofocus="autofocus" autocomplete="on" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block font-weight-bold shadow" name="login" >Login</button>
                    </div>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>

          <?php
          include 'pages/config.php';
            session_start();
                        //include 'config/dbconnect.php';
            // $con=mysqli_connect('localhost','root','','babupizza');
                        

          if (isset($_POST['login'])) {
            $username=mysqli_real_escape_string($con,$_POST['username']);
            $password=mysqli_real_escape_string($con,$_POST['password']);
            $query="SELECT * FROM admin WHERE username='$username' and password='$password'";
            $run=mysqli_query($con,$query);
            $num=mysqli_fetch_array($run);
            if ($num > 0) {
              $_SESSION['admin']=$username;
              ?>
                <script>
                    sweetAlert(
                      {
                        title: "Welcome to Admin",
                        text: "Just wait for a Second",
                        type: "success"
                      },
                      function () {
                        window.location.href = 'dashboard.php';
                      });
                </script>
              <?php
                            //header("location:dashboard.php");
              }else{
                ?>
                  <script>
                    swal("UserName Or Password Is Incorrect.!", "UserName Or Password Is Incorrect.!", "error");
                  </script>
              <?php
                            //header('location : index.php');
            }
          }
        ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="#" class="external text-white">Dreams Digital</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>