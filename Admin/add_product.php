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
      <li class="active">
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
          <div class="col-lg-12">
            <div class="recent-updates card">
              <div class="card-close">
                
              </div>
              <div class="card-header">
                <h3 class="h4">Add Product</h3>
              </div>
              <div class="card-body padding">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="p_name">Product-Name :</label>
                      <div class="form-group">
                        <input type="text" id="p_name" name="product_name" class="form-control" placeholder="Enter Product name...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="product_category">Product-Category :</label>
                      <div class="form-group">
                        <select name="product_category" onChange="getSubCat(this.value);" class="form-control text-dark">
                          <option value="">Select product category</option>
                          <?php

                              $Query="SELECT * FROM category";
                              $run=mysqli_query($con , $Query);
                              while ($row=mysqli_fetch_array($run)) {
                                  $row['cat_id'];
                                  $item = $row['category'];
echo' <option class="text-dark" value="'.$row['cat_id'].'">'.$row['category'].'</option>';
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <label for="p_type">Product-SubCategory:</label>
                      <div class="form-group">
                        <select name="sub_type" id="sub_type" class="form-control">
                          <option value="">Select subcategory</option>
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                     
                      <label for="price">Product-Price</label>
                      <div class="form-group">
                        <input type="text" id="price" name="price" class="form-control text-dark" placeholder="Enter product price Rs...">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                       <label for="desc">Product-Description:</label>
                      <div class="form-group">
                        <input type="text" id="desc" name="desc" class="form-control" placeholder="Enter product description...">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <label for="size">Product-Size</label>
                      <select name="size" class="form-control text-dark" id="size">
                        <option  value="">Select product size....</option>
                        <option class="text-dark" id="Regular" value="Regular">Regular</option>
                        <option class="text-dark" id="Large" value="Large">Large</option>
                        <option class="text-dark" id="Extra Large" value="Extra Large">Extra Large</option>
                      </select>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-sm-6">
                      <label for="file">Product-Image</label>
                      <div class="form-group">
                        <input type="file" id="file" name="file" class="form-control" placeholder="Choose Product Image...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group text-right" style="position: relative;top: 31px;">
                        <button type="submit" name="add_product" class="btn btn-block btn-primary font-weight-bold">
                        Add Product</button>
                      </div>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php

      if(isset($_POST['add_product']))
        {
            //// escape variables for security
          $category_id=mysqli_real_escape_string($con , $_POST['product_category']);
          $Product_name=mysqli_real_escape_string($con , $_POST['product_name']);
          $sub_type=mysqli_real_escape_string($con , $_POST['sub_type']);
          $Product_price=mysqli_real_escape_string($con , $_POST['price']);
          $Product_desc=mysqli_real_escape_string($con , $_POST['desc']);
          $Product_size=mysqli_real_escape_string($con , $_POST['size']);
          $Product_image=mysqli_real_escape_string($con , $_FILES["file"]["name"]);

          $dir="img/";
          if(!is_dir($dir))
          {
            mkdir("img/");
          }

          move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

$Query="INSERT INTO product (cat_id,p_name,p_type,p_price,p_desc,p_size,p_image) VALUES 
('$category_id','$Product_name','$sub_type','$Product_price','$Product_desc','$Product_size','$Product_image')";

$run=mysqli_query($con , $Query);

              if ($run > 0) {
                  ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Wow One Product Added...!",
                              text: "Just wait for a Second",
                              type: "success"
                          },
                          function () {
                              window.location.href = 'add_product.php';
                          });
                  </script>
                  <?php
              }
              else{
                ?>
                    <script>
                      sweetAlert(
                          {
                              title: "Somthing Went Wrong .Please Try Again Latter...!",
                              text: "Just wait for a Second",
                              type: "error"
                          },
                          function () {
                              window.location.href = 'add_product.php';
                          });
                  </script>
                <?php
              }
            }
    ?>





    <!-- Page Footer-->
    <?php include 'pages/footer.php';?>
    