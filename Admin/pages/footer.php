<footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="#" class="external">Dreams Digital</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>


<script>
  $(document).ready(function() {


// edit category modal popup 

    $('.editbtn').on('click' , function() {

      $('#myModal').modal('show');

      $tr=$(this).closest('tr');
      var data=$tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      
      var a1=$('#update_id').val(data['0']);
      var a2=$('#update_cat').val(data['1']);
      //alert(a1)
    });


//delete category modal popup 

    $('.deletbtn').on('click',  function() {
      $('.deletemodal').modal('show');

      $tr=$(this).closest('tr');
      var data=$tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data['0']);
      $('#delete_item').text(data['1']);
      //$('#delete_item1').text(data['1']);
    });



//update subcategory


$('.editsubcat').on('click', function() {
    $('#updatesubcategory').modal('show');

      $tr=$(this).closest('tr');
      var data=$tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#id').val(data['0']);
      $('#cat').val(data['1']);
      $('#subcat').val(data['2']);
     //$('').text(data['1']);

});


//delete subcategory
$('.deletsubcat').on('click', function(event) {
  $('.deletesubcat').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();
    console.log(data);

    $('#id').val(data['0']);
    $('#delete_item').text(data['1']);
});
//
//change slider pick
//



  $('.editimage').on('click' , function() {

    $('#slider1').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();

    console.log(data);


    $('#image_id').val(data['0']);
    $('#update_image').prop(data['1']);

  });


//
//Delete slider pick
//

  $('.deletimage').on('click', function(event) {

    $('#slider2').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();

    console.log(data);
    $('#delete_id').val(data['0']);
    $('#delete_id1').text(data['0']);
    $('#delete_image').text(data['1']);

  });

//update product

  $('.editProduct').on('click', function(event) {
    $('#updateproduct').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();

    console.log(data);
    $('#p_id').val(data['0']);
    $('#p_name').val(data['1']);
    $('#p_cat').val(data['2']);
    $('#p_sub').val(data['3']);
    $('#p_price').val(data['4']);
    $('#p_desc').val(data['5']);
    $('#p_size').val(data['6']);
    $('#p_image').val(data['7']);

  });

  $('.deletproduct').on('click', function(event) {
    $('#delproduct').modal('show');

    $tr=$(this).closest('tr');
    var data=$tr.children('td').map(function() {
      return $(this).text();
    }).get();
    console.log(data);
    $('#id').val(data['0']);
    $('#product_name').text(data[1]);
  });









$('#myTable').DataTable();








  });



</script>


        <!-- <script>
            function getSubCat(val) {
              $.ajax({
              type: "POST",
              url: "get_subcategory.php",
              data:'catid='+val,
                success: function(data)
                {
                    $("#subcategory").html(data);
                }
              });
          }
        </script> -->

<!-- <script>
// Add active class to the current button (highlight it)
var header = document.getElementsByClassName("list-unstyled");
var btns = header.getElementsByClassName("active");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script> -->
    <!-- JavaScript files-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

  </body>
</html>