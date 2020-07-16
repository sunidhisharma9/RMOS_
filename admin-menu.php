<?php
session_start();
$conn = mysqli_connect("localhost","root","","rmos");

if(!$conn){
  die('Could not connect: '.mysqli_connect_error());
}

//INSERT
if(isset($_POST['insert']))
{
  $insert_query = "INSERT INTO `menu`(`item_name`, `item_price`) VALUES ('$_POST[item_name]' , '$_POST[item_price]')";
  if(mysqli_query($conn, $insert_query))
  {
    if(mysqli_affected_rows($conn)>0)
    echo 'DATA INSERTED';

    else
        echo 'DATA NOT INSERTED';
  }

}

//DELETE
if(isset($_POST['delete']))
{
  $delete_query = "DELETE FROM `menu` WHERE `item_name` = '$_POST[item_name]' ";
  if (mysqli_query($conn, $delete_query))
    echo "Record deleted successfully";
 else
    echo "Error deleting record: " . mysqli_error($conn);

}

//UPDATE
if(isset($_POST['update']))
{
  $update_query = "UPDATE `menu` SET `item_price` = '$_POST[item_price]' WHERE `item_name` = '$_POST[item_name]' ";
  if (mysqli_query($conn, $update_query))
    echo "Record updated successfully";
 else
    echo "Error uploading record: " . mysqli_error($conn);

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RMOS</title>
    <script src="https://kit.fontawesome.com/94094e8e6a.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
  </head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light upper">
  <a class="navbar-brand" href="firstpage.php">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="admin-menu.php">MANAGE MENU <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="admin_management.php">MANAGE BOOKING</a>
      <a class="nav-item nav-link" href="admin-feedback.php" >CUSTOMERS FEEDBACK</a>
      <!-- <a class="nav-item nav-link" href="#" ><?php echo $_SESSION['username'];?></a> -->
      <div class="dropdown d">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      ADMIN
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

        <button class="dropdown-item" type="button"><a href="logout.php">LOG OUT</a></button>
        <!-- <button class="dropdown-item" type="button">Something else here</button> -->
      </div>
    </div>
    </div>
  </div>
</nav>

<div class="adminbckground">
<form method="post" action="admin-menu.php">


  <label for="item_name"><b>ITEM NAME</b></label><br >
  <input type="text" placeholder="Enter item name" name="item_name" required id="item_name" ><br /><br />

  <label for="item_price"><b>ITEM PRICE</b></label><br />
  <input type="number" placeholder="Enter item price" name="item_price"  id="item_price" ><br /><br /><br />
  <!-- <hr> -->

  <button type="submit" name="insert" >INSERT</button>
  <button type="submit" name="delete" >DELETE</button>
  <button type="submit" name="update" >UPDATE</button>
  <button type="submit" name="display" >DISPLAY</button>

</form>

<div class="col-lg-12">
  <table class= "table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>ITEM NAME</th>
        <th>ITEM PRICE</th>
      </tr>
    </thead>
    <tbody>

  <?php
  $sql = "SELECT * FROM menu ";
  $res=mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($res))
   {
     echo "<tr>";
     echo "<td>"; echo $row["item_id"] ; echo "</td>";
     echo "<td>"; echo $row["item_name"] ; echo "</td>";
     echo "<td>"; echo $row["item_price"] ; echo "</td>";
     echo "</tr>";

   }

  ?>
</tbody>
  </table>
</div>
  </div>


  <div class="footer">
  <a style="color:white" class="mr-5" href="contact_us.php">CONTACT US</a>
  <a style="color:white" class="ml-5" href="feedback.php">FEEDBACK</a>
  <p class="copy">© Copyright 2019 RMOS</p>


  </div>
</body>
</html>
