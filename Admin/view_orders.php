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
            <li>
              <a href="view_product.php"> 
                <i class="icon-interface-windows"></i>
                View Product
              </a>
            </li>

            <li class="active">
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
                      <div class="dropdown">
                        <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Order Details</h3>
                    </div>

                      <div class="card-body">
                          <table id="table" class="table table-bordered table-hover text-black text-center mt-4">
                            <thead class="text-black">
                            <tr class="text-black">
                              <th>#</th>
                              <th>Cust_Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>City</th>
                              <th>Pincode</th>
                              <th>Order_Name</th>
                              <th>Order_Type</th>
                              <th>Qty</th>
                              <th>Total</th>
                              <th>Date</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>                 
                            <tr>
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
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <?php include 'pages/footer.php';?>