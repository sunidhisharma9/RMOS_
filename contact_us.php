<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
	<meta charset="UTF-8">

	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet"  href="css/contact.css">
<!--===============================================================================================-->


  <!-- <script src="https://kit.fontawesome.com/94094e8e6a.js"></script> -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
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


    <div class="container-contact100">
      <div class="contact100-map" style="background-image: url(https://images.pexels.com/photos/3095041/pexels-photo-3095041.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);"></div>

      <div class="wrap-contact100">
        <div class="contact100-form-title" style="background-image: url(https://cdn.pixabay.com/photo/2017/11/17/09/37/businessman-2956974_1280.jpg);">
          <span class="contact100-form-title-1">
            Contact Us
          </span>

          <span class="contact100-form-title-2">
            Feel free to drop us a line below!
          </span>
        </div>

        <form class="contact100-form validate-form">
          <div class="wrap-input100 validate-input" data-validate="Name is required">
            <span class="label-input100">Full Name:</span>
            <input class="input100" type="text" name="name" placeholder="Enter full name">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <span class="label-input100">Email:</span>
            <input class="input100" type="text" name="email" placeholder="Enter email addess">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Phone is required">
            <span class="label-input100">Phone:</span>
            <input class="input100" type="text" name="phone" placeholder="Enter phone number">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Message is required">
            <span class="label-input100">Message:</span>
            <textarea class="input100" name="message" placeholder="Your Comment..."></textarea>
            <span class="focus-input100"></span>
          </div>

          <div class="container-contact100-form-btn">
            <button class="contact100-form-btn">
              <span>
                Submit
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>


    <div class="footer bg-light">
  <!-- <a style="color:white" class="mr-5" href="#">CONTACT US</a>
  <a style="color:white" class="ml-5" href="#">FEEDBACK</a> -->
  <p class="copy">© Copyright 2019 RMOS</p>


  </div>








  </body>
