<?php
include('pages/config.php');
if(!empty($_POST["catid"])) 
{
 	$id=intval($_POST['catid']);
	$query=mysqli_query($con ,"SELECT * FROM subcategory WHERE cat_id='$id'");
	?>
		<option value="">Select Subcategory</option>
	<?php

 	while($row=mysqli_fetch_array($query))
 	{
  		?>
  			<option value="<?php echo htmlentities($row['s_id']); ?>">
  				<?php echo htmlentities($row['sub_category']); ?></option>
  		<?php
 	}
}
?>