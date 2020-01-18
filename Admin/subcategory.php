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

            <li class="">
              <a href="add_category.php"> 
                <i class="icon-bill"></i>
                Add Category 
              </a>
              </li>

              <li class="active">
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
                      <h3>Sub Category</h3>
                    </div>
                    
                      <div class="card-body">

                        <form action="" method="post">
                          <label for="category">Choose Category:</label>
                          <div class="form-group">
                            <select name="category" id="" class="form-control">
                            <?php

                              $Query="SELECT * FROM category";
                              $run=mysqli_query($con , $Query);
                              while ($row=mysqli_fetch_array($run)) {
                                  $row['cat_id'];
                                  $row['category'];
                                  echo' <option class="text-dark" value="'.$row['cat_id'].'">'.$row['category'].'</option>';
                              }
                            ?>
                            </select>
                          </div>
                          <label for="subcategory">Add Subcategory</label>
                          <div class="input-group">
                            <input type="text" name="sub_cat" class="form-control"    placeholder="Add SubCategory" >
                            <span class="input-group-btn">
                              <button type="submit" name="sub_category" class="btn btn-primary font-weight-normal">Sub Category</button>
                            </span>
                          </div>
                         </form>
                         <table id="table" class="table table-bordered table-hover text-black text-center mt-4">
                            <thead class="text-black">
                            <tr class="text-black">
                              <th>#</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>                 
                              <?php
$query="SELECT category.cat_id, category.category,subcategory.s_id, subcategory.sub_category
FROM category
INNER JOIN subcategory
ON category.cat_id=subcategory.cat_id";
$cnt=0;
                              $run=mysqli_query($con,$query);
                              while ($row=mysqli_fetch_array($run)) {
                                ?>

                                  <tr>
                                    <td><?php echo $row['s_id'];?></td>
                                    <td><?php echo $row['category'];?></td>
                                  <td><?php echo $row['sub_category'];?></td>
                                    <td>
                                      <button class="btn btn-info btn-sm editsubcat">Edit</button>
                                    </td>
                                    <td><button class="btn btn-danger btn-sm deletsubcat">Delete</button></td>
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

<div class="modal fade" id="updatesubcategory">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Update Subcategory</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <form action="" method="post">
            <input type="hidden" name="id" id="id" >
            <label for="">Chose Category : </label>
            <div class="form-group">
              <select name="category" required="requied" onChange="getSubCat(this.value);" class="form-control text-dark" id="cat">
                          <option value="">Select product category</option>
                          <?php

                              $Query="SELECT * FROM category";
                              $run=mysqli_query($con , $Query);
                              while ($row=mysqli_fetch_array($run)) {
                                  $row['cat_id'];
                                  $item = $row['category'];
echo' <option class="text-dark"  value="'.$row['cat_id'].'">'.$row['category'].'</option>';
                              }
                          ?>
                </select>
            </div>
            <label for="">Sub Category : </label>
              <div class="input-group">

                <input type="text"  name="subcategory" id="subcat"
                class="form-control" autocomplete="autocomplete" autofocus="autofocus"  placeholder="Add Category">
                <span class="input-group-btn">
                <button type="submit" name="update_subcategory" 
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

<div class="modal fade deletesubcat">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Delete SubCategory</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>

        <form action="" method="post">
        <!-- Modal body -->
        <div class="modal-body">
          
          <input type="hidden" name="id" id="id" >
          <h4>

            You want to delete -><span id="delete_item"></span>
              

           </h4>
         
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" name="delete_subcategory" 
                class="btn btn-primary font-weight-bold btn-sm">Delete</button>
        </div>
      
        </form>

        
      </div>
    </div>
  </div>



      <?php

        //
        //update category
        //


        

        


//Add subcategory 
        
        if (isset($_POST['sub_category'])) {
            $id=mysqli_real_escape_string($con , $_POST['category']);
            $sub_cat=mysqli_real_escape_string($con , $_POST['sub_cat']);
            if (empty($sub_cat)) {
                ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Plaese fill the SubCategory field...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'subcategory.php';
                          });
                  </script>
                <?php
            }
            else{

          $query="INSERT INTO subcategory (sub_category, cat_id) VALUES('$sub_cat','$id')";
          $run=mysqli_query($con,$query);
              if ($run > 0) {
                  ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Successfully Added SubCategory!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'subcategory.php';
                          });
                  </script>
                  <?php
            }
          }
        }




//update category

if (isset($_POST['update_subcategory'])) {

           echo $id=mysqli_real_escape_string($con , $_POST['id']);
           echo $category=mysqli_real_escape_string($con , $_POST['category']);
           echo $subcategory=mysqli_real_escape_string($con , $_POST['subcategory']);

            echo '<script>alert($id ,$category, $subcategory)</script>';

            if (empty($id) && empty($category) && empty($subcategory)) {
                ?>
                  <script>
                      sweetAlert(
                          {
                              title: "Somthing went wrong...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'subcategory.php';
                          });
                  </script>
                <?php
            }
            else{

          $query="UPDATE subcategory SET sub_category='$subcategory' , cat_id=$category  WHERE s_id=$id ";

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
                              window.location.href = 'subcategory.php';
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
                              window.location.href = 'subcategory.php';
                          });
                  </script>
                  <?php
              }
            }
          }







//
        //delete Subcategory
        //



        if (isset($_POST['delete_subcategory'])) {
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
                              window.location.href = 'subcategory.php';
                          });
                  </script>
                <?php
            }
            else{
              $query="DELETE FROM subcategory WHERE s_id=$id";
              $run=mysqli_query($con , $query);
              if ($run > 0) {
                  ?>
                  <script>
                      sweetAlert(
                          {
                              title: "One Item Deleted..!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'subcategory.php';
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