<?php include 'pages/header.php';?>


<!---start left side coding --->
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

            <li>
              <a href="view_customer.php"> 
                <i class="icon-user">
                </i>View Customer
              </a>
            </li>

            <li class="">
              <a href="add_product.php"> 
                <i class="icon-padnote">
                </i>Add Product
              </a>
            </li>

            <li class="active">
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

            <li>
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
<!--end left contaqiner---->
      
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
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                  <div class="card">
                    <div class="card-header">
                      <h3>Add Category</h3>
                    </div>
                    
                      <div class="card-body">

                        <form action="" method="post">
                          <div class="input-group">
                            <input type="text" id="category" class="form-control" name="category" autocomplete="autocomplete" autofocus="autofocus"  placeholder="Add Category" >
                            <span class="input-group-btn">
                              <button type="submit" name="add_category" class="btn btn-primary font-weight-normal">Add Category</button>
                            </span>
                          </div>
                         </form>
                         <table id="table" class="table table-bordered table-hover text-black text-center mt-4">
                            <thead class="text-black">
                            <tr class="text-black">
                              <th>#</th>
                              <th>Category</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>                 
                              <?php
                              $query="SELECT * FROM category";
                              $run=mysqli_query($con,$query);
                              while ($row=mysqli_fetch_array($run)) {
                                ?>
                                  <tr>
                                    <td><?php echo $row['cat_id'];?></td>
                                    <td><?php echo $row['category'];?></td>
                                    <td>
                                      <button class="btn btn-info btn-sm editbtn">Edit</button>
                                    </td>
                                    <td><button class="btn btn-danger btn-sm deletbtn">Delete</button></td>
                                  </tr>
                                <?php
                              }
                             ?>
                            </tr>
                            </tbody>
                            <!-- <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Category</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                            </tfoot> -->
                          </table>
                      </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </section>


          
<!-----edit form----->

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Edit Category</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form action="" method="post">
            <input type="hidden" name="update_id" id="update_id" >
              <div class="input-group">

                <input type="text"  name="update_cat" id="update_cat"
                class="form-control" autocomplete="autocomplete" autofocus="autofocus"  placeholder="Add Category">
                <span class="input-group-btn">
                <button type="submit" name="update_category" 
                class="btn btn-primary font-weight-bold">Update</button>
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





<!-----delete modal form----->

<div class="modal fade deletemodal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Delete Item Category</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>

        <form action="" method="post">
        <!-- Modal body -->
        <div class="modal-body">
          
          <input type="hidden" name="delete_id" id="delete_id" >
          <h4>

            You want to delete -><span id="delete_item"></span>
              

           </h4>
         
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" name="delete_category" 
                class="btn btn-primary font-weight-bold btn-sm">Delete</button>
        </div>
      
        </form>

        
      </div>
    </div>
  </div>



      <?php


        //
        //Add category
        //

          if(isset($_POST['add_category']))
          {
            //// escape variables for security
          $category_name=mysqli_real_escape_string($con , $_POST['category']); 
            if (empty($category_name)) {
                ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Category field is blank",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                <?php
            }
            else{

              $match="SELECT * FROM category WHERE category='$category_name'";
              $execute=mysqli_query($con,$match);
              $row=mysqli_fetch_array($execute);
              if ($row['category'] === $category_name) {
                  ?>
                    <script>
                        sweetAlert(
                            {
                                title: "Allready Taken..! Plaese try another One.",
                                text: "Just wait for a Second",
                                type: "error"
                            },
                            function () {
                                window.location.href = 'add_category.php';
                            });
                    </script>
                  <?php
              }
              else{

              $Query="INSERT INTO category (category) VALUES ('$category_name')";
              $run=mysqli_query($con,$Query);
              if ($run > 0) {
                  ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Record Successfull Added...!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                  <?php
              }
              else{
                ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Plaese check Your Connection..!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                  <?php
              }
            }
          }
        }




        //
        //update category
        //


        if (isset($_POST['update_category'])) {

            $update_id=mysqli_real_escape_string($con , $_POST['update_id']);
            $update_cat=mysqli_real_escape_string($con , $_POST['update_cat']);

            if (empty($update_id) && empty($update_cat)) {
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
            else{

              $match="SELECT * FROM category WHERE category='$update_cat'";
              $execute=mysqli_query($con,$match);
              $row=mysqli_fetch_array($execute);
              if ($row['category'] === $update_cat) {
                  ?>
                    <script>
                        sweetAlert(
                            {
                                title: "Allready Taken..! Plaese try another keyword...!",
                                text: "Just wait for a Second",
                                type: "error"
                            },
                            function () {
                                window.location.href = 'add_category.php';
                            });
                    </script>
                  <?php
              }
              else{

              $query="UPDATE category SET category='$update_cat' WHERE cat_id=$update_id ";
              echo $query;
              $run=mysqli_query($con, $query);
              echo $run;

              if ($run > 0) {
                  ?>
                    <script>
                      sweetAlert(
                          {
                              title: "One Record Updated ..!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                  <?php
              }
              else{
                ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Plaese check Your Connection..!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                  <?php
              }
              }

              
            }
        }


        //
        //delete category
        //
        if (isset($_POST['delete_category'])) {
            $delete_id=mysqli_real_escape_string($con , $_POST['delete_id']);
            if (empty($delete_id)) {
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
            else{
              $query="DELETE FROM category WHERE cat_id=$delete_id";
              $run=mysqli_query($con , $query);
              if ($run > 0) {
                  ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Deleted Successfully..!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'add_category.php';
                          });
                  </script>
                <?php
              }
            }
        }

        



    ?>

  <!-- The Modal -->
  

          <!-- Page Footer-->
  <?php include 'pages/footer.php';?>