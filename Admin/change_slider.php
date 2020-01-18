<?php include 'pages/header.php';?>



<div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
            <img src="img/admin.png" alt="..." class="img-fluid rounded-circle">
            </div>
            <div class="title">
              <h1 class="h4">
                <?php echo $_SESSION['admin']; ?>
              </h1>
              <p>Bussiness Man</p>
            </div>
          </div>
          <ul class="list-unstyled">

            <li >
              <a href="view_customer.php"> 
                <i class="icon-user">
                </i>View Customer
              </a>
            </li>

            <li>
              <a href="add_product.php"> 
                <i class="icon-padnote">
                </i>Add Product
              </a>
            </li>

            <li>
              <a href="add_category.php"> 
                <i class="icon-bill"></i>
                Add Category 
              </a>
              </li>

              <li class="">
                <a href="subcategory.php"> 
                  <i class="icon-bill"></i>
                    Add SubCategory  
                </a>
            </li>
            <li>
              <a href="view_product.php"> 
                <i class="icon-interface-windows"></i>
                View Product
              </a>
            </li>
            <li>
              <a href="view_orders.php"> 
                <i class="icon-interface-windows"></i>
                View Orders
              </a>
            </li>

            <li class="active">
              <a href="change_slider.php"> 
                <i class="icon-picture"></i>
              Change Slider
            </a>
          </li>
            <li>
              <a href="logout.php"> 
                <i class="icon-paper-airplane"></i>
              Logout </a>
            </li>
          </ul>
        </nav>
      
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>

          <section class="updates padding-top">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <!-- Recent Updates-->
                <div class="col-lg-11">
                  <div class="recent-updates card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>

                    <div class="card-header">
                      <h3 class="h4">Add Slider Image</h3>
                    </div>

                      <div class="card-body padding">
                        <form action=""  method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-sm-10">
                                <div class="form-group">
                                  <input type="file" name="file"  class="input-material" autofocus="autofocus" placeholder="Upload slider image..">
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="form-group">
                                  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                                </div>     
                              </div>
                          </div>
                        </form>

                        <table id="myTable" class="table table-bordered table-hover text-black text-center mt-4">
                            <thead class="text-black">
                            <tr class="text-black">
                              <th>#</th>
                              <th>Image</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>                 
                              <?php
                              $query="SELECT * FROM slider";
                              $run=mysqli_query($con,$query);
                              while ($row=mysqli_fetch_array($run)) {
                                $img=$row['slide'];
                                ?>
                                  <tr>
                                    <td><?php echo $row['slid_id'];?></td>
                                    <td>
                                        <img class="" src="img/<?php echo htmlentities($img);?>" style="width: 150px; height: 150px;">
                                    </td>
                                    <td>
                                      <button class="btn btn-info btn-sm editimage">Update</button>
                                    </td>
                                    <td><button class="btn btn-danger btn-sm deletimage">Delete</button></td>
                                  </tr>
                                <?php
                              }
                             ?>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                            </tfoot>
                          </table>

                      </div>
                    </div>
                     
                    </div>
                  </div>
                </div>
          </section>


 <!--edit slider Modal  -->
<div class="modal fade" id="slider1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Update Slider</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="image_id" id="image_id" >
              <div class="input-group">

                <input type="file"  name="file" id="update_image"
                class="form-control" autocomplete="autocomplete" autofocus="autofocus"  placeholder="Update image">
                <span class="input-group-btn">
                <button type="submit" name="image_update" 
                class="btn btn-primary font-weight-bold">Upload</button>
                </span>

            </div>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>




 <!--Delete Slider Modal -->

  <div class="modal fade" id="slider2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Delete Slider</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>

        <form action="" method="post">
        <!-- Modal body -->
        <div class="modal-body">
          
          <input type="hidden" name="delete_id" id="delete_id" >
          <h4>

            You want to delete Slider Id-> <span id="delete_id1"></span>
              

           </h4>
         
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" name="delete_image" 
                class="btn btn-primary font-weight-bold btn-sm">Delete</button>
        </div>
      
        </form>

        
      </div>
    </div>
  </div>



          <?php
            if (isset($_POST['upload'])) {
                $file=mysqli_real_escape_string($con , $_FILES["file"]["name"]);
                if (empty($file)) {
                    ?>
                      <script>
                      sweetAlert(
                          {
                              title: "please choose a image...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'change_slider.php';
                          });
                    </script>
                  <?php
                }
                else{

                     $dir="img/";
                    if(!is_dir($dir))
                      {
                        mkdir("img/");
                      }

                    move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

                      $query="INSERT INTO slider (slide) VALUES ('$file')";
                      $run=mysqli_query($con,$query);
                      if ($run > 0) {
                            ?>
                              <script>
                              sweetAlert(
                                  {
                                      title: "Successfully Uploaded",
                                      text: "Just wait for a Second",
                                      type: "success"
                                  },
                                  function () {
                                      window.location.href = 'change_slider.php';
                                  });
                            </script>
                          <?php
                      }
                      else{
                        ?>
                              <script>
                              sweetAlert(
                                  {
                                      title: "Somthing went wrong..!",
                                      text: "Just wait for a Second",
                                      type: "error"
                                  },
                                  function () {
                                      window.location.href = 'change_slider.php';
                                  });
                            </script>
                          <?php
                      }
                }
            }



            if (isset($_POST['image_update'])) {
                $image_id=mysqli_real_escape_string($con , $_POST['image_id']);
                $update_image=mysqli_real_escape_string($con , $_FILES["file"]["name"]);
                if (empty($image_id) && empty($update_image)) {
                    ?>
                      <script>
                      sweetAlert(
                          {
                              title: "please choose a image...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'change_slider.php';
                          });
                    </script>
                    <?php
                }
                else{

                  $dir="img/";
                    if(!is_dir($dir))
                      {
                        mkdir("img/");
                      }
                    move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

                    $query="UPDATE slider SET slide='$update_image' WHERE slid_id=$image_id";
                    $run=mysqli_query($con,$query);
                    if ($run > 0) {
                      ?>
                        <script>
                              sweetAlert(
                                  {
                                      title: "Successfully Upated",
                                      text: "Just wait for a Second",
                                      type: "success"
                                  },
                                  function () {
                                      window.location.href = 'change_slider.php';
                                  });
                            </script>
                      <?php
                    }
                }
            }



            if (isset($_POST['delete_image'])) {
                $id=mysqli_real_escape_string($con , $_POST['delete_id']);
                if (empty($id)) {
                  ?>
                    
                    <script>
                      sweetAlert(
                          {
                              title: "Somthing went wrong...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                  <?php
                }
                else
                {
                  $query="DELETE FROM slider WHERE slid_id=$id";
                  $run=mysqli_query($con , $query);

                  if ($run > 0) {
                    ?>
                      <script>
                          sweetAlert(
                              {
                                  title: "One Image Deleted Successfully..!",
                                  text: "Just wait for a Second",
                                  type: "success"
                              },
                              function () {
                                  window.location.href = 'change_slider.php';
                              });
                      </script>
                    <?php
                  }
                }
            }
          ?>



          <!-- Page Footer-->
          <?php include 'pages/footer.php';?>






                          