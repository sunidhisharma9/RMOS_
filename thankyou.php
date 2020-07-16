<?php

session_start();
include 'connection.php';

$id=$_GET['id'];
$items=$_GET['items'];
$bill=$_GET['bill'];
$mode=$_GET['mode'];


$insert="INSERT INTO `order1`(`customer_id`, `food_items`, `total_bill`, `payment_option`) VALUES ('$id','$items','$bill','$mode')";
if(mysqli_query($conn, $insert))
{
  if(mysqli_affected_rows($conn)>0)
  echo '<script> alert("THANKYOU FOR PLACING YOUR ORDER");</script>';

  else
      echo'<script>
		  	alert("FAILURE");
		  </script>';
}
?>

<script>
  window.location='firstpage.php';
</script>

<?php  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  </body>
</html>
