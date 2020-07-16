<?php
session_start();
$conn = mysqli_connect("localhost","root","","rmos");

if(!$conn){
  die('Could not connect: '.mysqli_connect_error());
}

//INSERT\

if(isset($_POST['submit']))
{
  $insert_query = "INSERT INTO `reservation`( `first_name`, `last_name`, `phone`, `email`, `seats`, `date`, `time`) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[phone]','$_POST[email]','$_POST[seats]','$_POST[date]','$_POST[time]')";
  if(mysqli_query($conn, $insert_query))
  {
    // if(mysqli_affected_rows($conn)>0)
    echo '<script type="text/javascript">';
		echo ' alert("Booking Done !!")';  //not showing an alert box.
		echo '</script>';
    ?>
    <script>
      window.location='firstpage.php';
    </script>
  <?php
  }
    else
        echo 'DATA NOT INSERTED';

        $sql = "SELECT * FROM reservation WHERE email = '$_POST[email]'";
        //run
        $result=mysqli_query($conn, $sql);
        //array
        $row = mysqli_fetch_assoc($result);

        $_SESSION['booking_id']=$row['booking_id'];

      $query = "INSERT INTO `customer_booking`(`customer_id`, `booking_id`, `status`) VALUES ('$_SESSION[id]' ,'$_SESSION[booking_id]','1')";
      if(mysqli_query($conn, $query)){
        echo 'done';
      }

  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">



	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/reservation.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light upper">
  <a class="navbar-brand" href="firstpage.php">RMOS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="menu.php">MENU <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="order.php">ONLINE ORDER</a>
      <a class="nav-item nav-link" href="reservation.php">RESERVATION</a>
      <a class="nav-item nav-link" href="about_us.php" >ABOUT US</a>
      <!-- <a class="nav-item nav-link" href="#" ><?php echo $_SESSION['username'];?></a> -->
      <div class="dropdown d">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $_SESSION['username'];?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button"><a href="profilesettings.php">UPDATE DETAILS</a></button>
        <button class="dropdown-item" type="button"><a href="booking.php">BOOKING HISTORY</a></button>
        <button class="dropdown-item" type="button"><a href="order_history.php">ORDER HISTORY</a></button>
        <button class="dropdown-item" type="button"><a href="logout.php">LOG OUT</a></button>
        <!-- <button class="dropdown-item" type="button">Something else here</button> -->
      </div>
    </div>
    </div>
  </div>
</nav>

	<form method="post" action="reservation.php">
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1><i>Book a table</i></h1>
						</div>
						<form>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">First Name</span>
										<input class="form-control" name="fname" type="text" placeholder="Enter your First name">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Last Name</span>
										<input class="form-control" name="lname" type="text" placeholder="Enter your Last name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Phone</span>
								<input class="form-control" name="phone" type="number" placeholder="Enter your phone number">
							</div>
							<div class="form-group">
								<span class="form-label">Email</span>
								<input class="form-control" name="email" type="text" placeholder="Enter your email">
							</div>
							<div class="form-group">
								<span class="form-label">Seats</span>
								<input class="form-control" name="seats"  type="number" placeholder="Enter number of seats">
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Date</span>
										<input class="form-control" name="date"  type="text" placeholder="Enter date dd-mm-yy">
									</div>
								</div>
                <div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Time</span>
										<input class="form-control" name="time"  type="text" placeholder="Enter time Hour:Min AM/PM">
									</div>
								</div>
							</div>
							<div class="form-btn">
								<button name="submit" type="submit"  class="submit-btn">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


	<div class="footer">
	<a style="color:white" class="mr-5" href="contact_us.php">CONTACT US</a>
	<a style="color:white" class="ml-5" href="feedback.php">FEEDBACK</a>
	<p class="copy">© Copyright 2019 RMOS</p>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
