
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>About Us</title>
	<meta charset="UTF-8">


<!--===============================================================================================-->
	<link rel="stylesheet"  href="css/about_us.css">
<!--===============================================================================================-->
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



<div class="about_us">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="text1 display-4">Making people happy through food.</h1>
        <p class="lead text-muted mb-0">Good Honest Grandy Since 2019.</p>

      </div>
      <div class=" col-lg-6 d-none d-lg-block"><img src="https://images.pexels.com/photos/1600727/pexels-photo-1600727.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="rounded-circle img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-cutlery fa-2x mb-3 text-dark"></i>

				<h2 class="font-weight-light">Dine-In</h2>
        <p class="font-italic text-muted mb-4">We provide a fine dining experience created with great food, a brilliant ambience and impeccable customer service. Keep calm and we will serve you the most incredible experience on the platter!</p>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://amp.thenational.ae/image/policy:1.156142:1499293422/image/jpeg.jpg?f=16x9&w=1200&$p$f$w=dfa40e8" alt="" class="rounded img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="http://buzz.waspbarcode.com/wp-content/uploads/2016/08/rsz_gettyimages-174912309.jpg" alt="" class="rounded img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-motorcycle fa-2x mb-3 text-dark"></i>
        <h2 class="font-weight-light">Delivery</h2>

        <p class="font-italic text-muted mb-4">Our online order process is very transparent and easy, so our customers get the best online food ordering experience. Now order the most delectable, hygienic and healthy food online from RMOS.</p>
      </div>
    </div>
  </div>
</div>

<div class="team py-5">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="text2 display-4 font-weight-bold">MEET</h2>
        <p class="font-italic text-muted font-weight-bold">Our Team</p>
      </div>
    </div>

    <div class="row text-center">
      <!-- Team item-->
      <div class="col-xl-4 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/IMG-7251.jpg" alt="" width="130" class="img-fluid  mb-3  shadow-sm">
          <h5 class="mb-0">Sunidhi Sharma</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      <div class="col-xl-4 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/IMG-7253.jpg" alt="" width="130" class="img-fluid  mb-3  shadow-sm">
          <h5 class="mb-0">Ritika Nainwal</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      <div class="col-xl-4 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/IMG-7252.jpg" alt="" width="130" class="img-fluid  mb-3  shadow-sm">
          <h5 class="mb-0">Shubhangi Ghosh</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->



    </div>
  </div>
</div>


<div class="footer bg-light">
<a style="color:white" class="mr-5" href="contact_us.php">CONTACT US</a>
<a style="color:white" class="ml-5" href="feedback.php">FEEDBACK</a>
<p class="copy">© Copyright 2019 RMOS</p>


</div>
</body>
