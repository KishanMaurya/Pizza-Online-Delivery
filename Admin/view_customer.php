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

            <li class="active">
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
                <div class="col-lg-11">
                  <div class="recent-updates card">
                    <div class="card-close">
                    </div>
                    <div class="card-header">
                      <h3 class="h4">View Customer Details</h3>
                    </div>
                    <div class="card-body npadding">
                            <table id="myTable" class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Customer<br>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>City</th>
                                  <th>PinCode</th>
                                  <th>Password</th>
                                  <th>Date</th>
                                  <th>Image</th>
                                  <th>View</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>#</th>
                                  <th>Customer<br>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>City</th>
                                  <th>PinCode</th>
                                  <th>Password</th>
                                  <th>Date</th>
                                  <th>Image</th>
                                  <th>View</th>
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
          <!-- Page Footer-->
          <?php include 'pages/footer.php';?>