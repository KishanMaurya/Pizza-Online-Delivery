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

            <li>
              <a href="view_customer.php">
                <i class="icon-user">
                </i>View Customer
              </a>
            </li>

            <li >
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
              <li class="active">
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
                    <div class="card-header">
                      <h3 class="h4">All Product</h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                            <table class="table table-bordered table-responsive" width="100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Product<br>Name</th>
                                  <th>Category</th>
                                  <th>Subtegory</th>
                                  <th>Price</th>
                                  <th>Description</th>
                                  <th>Product<br>Size</th>
                                  <th>Product<br>Image</th>
                                  <th>Date</th>
                                  <th>View</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                          <?php

$query="SELECT product.p_id,product.p_name,product.p_price,product.p_desc,product.p_size,product.create_at,product.p_image,category.category, subcategory.sub_category
FROM ((product
INNER JOIN category ON product.cat_id = category.cat_id)
INNER JOIN subcategory ON product.p_type = subcategory.s_id)";

                              $run=mysqli_query($con,$query);
                              while ($row=mysqli_fetch_array($run)) {
                                $img=$row['p_image'];
                                ?>
                                <tr style="height: 120px !important; overflow-y: scroll;">
                                    <td><?php echo $row['p_id'];?></td>
                                    <td><?php echo $row['p_name'];?></td>
                                    <td><?php echo $row['category'];?></td>
                                    <td><?php echo $row['sub_category'];?></td>
                                    <td><?php echo $row['p_price'];?></td>
                                    <td><?php echo $row['p_desc'];?></td>
                                    <td><?php echo $row['p_size'];?></td>
                                    <td>
                                      <img class="" src="img/<?php echo htmlentities($img);?>" style="width: 100px; height: 100px;">

                                    </td>
                                    <td><?php echo $row['create_at'];?></td>
                                    <td>
                                      <button class="btn btn-info btn-sm editProduct">Edit</button>
                                    </td>
                                    <td><button class="btn btn-danger btn-sm deletproduct">Delete</button></td>
                                  </tr>
                                <?php
                              }

                             ?>
                              </tbody>

                            </table>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



<!---------Update product----------->

<div class="modal fade" id="updateproduct">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-primary" >
          <h4 class="modal-title text-white">Update Product</h4>
          <button type="button" class="close text-warning" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
           <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="p_id">
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
                        <select name="product_category" required="required" id="p_cat" onChange="getSubCat(this.value);" class="form-control text-dark">
                          <option value="">Select product category</option>
                          <?php

                              $Query="SELECT * FROM category";
                              $run=mysqli_query($con , $Query);
                              while ($row=mysqli_fetch_array($run)) {
                                  $row['cat_id'];
                                  $item = $row['category'];

// echo' <option class="text-dark" value="'.$row['cat_id'].'">'.$row['category'].'</option>';

echo'<option class="text-dark" value="'.$row['cat_id'].'" selected= "selected"  >'.$row['category'].'</option>';
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
                        <input type="text" id="p_price" name="p_price" class="form-control text-dark" placeholder="Enter product price Rs...">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                       <label for="desc">Product-Description:</label>
                      <div class="form-group">
                        <input type="text" id="p_desc" name="desc" class="form-control" placeholder="Enter product description...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="size">Product-Size</label>
                      <select name="size" class="form-control text-dark" id="p_size">
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
                        <input type="file" id="p_image" name="file" class="form-control" placeholder="Choose Product Image...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group text-right" style="position: relative;top: 31px;">
                        <button type="submit" name="update_product" class="btn btn-block btn-primary font-weight-bold">
                        UpdateProduct</button>
                      </div>
                    </div>

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


  <!--------Delete product-->

  <div class="modal fade" id="delproduct">
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

          <input type="hidden" name="id" id="id">
          <h4>

            You want to delete -><span id="product_name"></span>


           </h4>

        </div>
        <div class="modal-footer">
  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
  <button type="submit" name="delete_product"
                class="btn btn-primary font-weight-bold btn-sm">Delete</button>
        </div>

        </form>


      </div>
    </div>
  </div>


<?php
  if (isset($_POST['update_product'])) {
     $id=mysqli_escape_string($con,$_POST['id']);
     $p_cat=mysqli_escape_string($con,$_POST['product_category']);
     $p_name=mysqli_escape_string($con,$_POST['product_name']);
     $p_stype=mysqli_escape_string($con,$_POST['sub_type']);
     $p_price=mysqli_escape_string($con,$_POST['p_price']);
     $p_desc=mysqli_escape_string($con,$_POST['desc']);
     $p_size=mysqli_escape_string($con,$_POST['size']);
     $file=mysqli_real_escape_string($con , $_FILES["file"]["name"]);

      $dir="img/";
      if(!is_dir($dir))
        {
          mkdir("img/");
        }
      move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

      $query="UPDATE product SET cat_id=$p_cat , p_name='$p_name' ,p_type=$p_stype, p_price='$p_price' , p_desc='$p_desc' , p_size='$p_size',p_image='$file' WHERE p_id=$id";
      $run=mysqli_query($con,$query);
      if ($run > 0) {
          ?>
            <script>
              sweetAlert(
                  {
                    title: "One Product Updated...!!",
                    text: "Just wait for a Second",
                    type: "success"
                  },
                  function () {
                  window.location.href = 'view_product.php';
              });
          </script>
        <?php
      }
  }



  // Delete Product

  if (isset($_POST['delete_product'])) {
      $id=mysqli_real_escape_string($con,$_POST['id']);
      $query="DELETE FROM product WHERE p_id=$id";
      $run=mysqli_query($con,$query);
      if ($run > 0) {
        ?>
          <script>
            sweetAlert(
              {
                title: "One Product Deleted..!",
                text: "Just wait for a Second",
                type: "success"
              },
            function () {
              window.location.href = 'view_product.php';
            });
          </script>
        <?php
      }
  }




?>
          <!-- Page Footer-->
          <?php include 'pages/footer.php';?>
