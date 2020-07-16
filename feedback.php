<?php
session_start();
$conn = mysqli_connect("localhost","root","","rmos");

if(!$conn){
  die('Could not connect: '.mysqli_connect_error());
}

//INSERT
if(isset($_POST['submit']))
{
  $insert_query = "INSERT INTO `feedback`(`customer_name`, `service`, `quality`, `clean`, `value`, `message`) VALUES ('$_SESSION[username]','$_POST[service]','$_POST[quality]','$_POST[clean]','$_POST[value]','$_POST[message]')";
  if(mysqli_query($conn, $insert_query))
  {
    if(mysqli_affected_rows($conn)>0)
  {  echo '<script>
      alert("FEED BACK HAS BEEN SUBMITTED");
    </script>';
?>

<script>
  window.location='firstpage.php';
</script>
<?php  
  }

    else
    echo '<script>
      alert("FAILURE");
    </script>';

  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback | RMS</title>
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <div class="d-flex vh-100 align-items-center">
        <div class="feedback-content container">
            <h2 class="text-center py-3 text-white">
                Feedback
            </h2>
            <form action="" method="post">
                <div class="feedback-form container">
                    <div class="row my-4">
                        <div class="col-md-6">
                            <p class="text-monospace font-weight-normal text-white mb-0">1. Service</p>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="service" id="exampleRadios1" value="Poor" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Poor
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="service" id="exampleRadios1" value="Average" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Average
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="service" id="exampleRadios1" value="Good" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Good
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="service" id="exampleRadios1" value="Excellent" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Excellent
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <p class="text-monospace font-weight-normal text-white mb-0">2. Quality Of Food</p>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="quality" id="exampleRadios1" value="Poor" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Poor
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="quality" id="exampleRadios1" value="Average" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Average
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="quality" id="exampleRadios1" value="Good" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Good
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="quality" id="exampleRadios1" value="Excellent" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Excellent
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <p class="text-monospace font-weight-normal text-white mb-0">3. Cleanliness</p>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="clean" id="exampleRadios1" value="Poor" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Poor
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="clean" id="exampleRadios1" value="Average" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Average
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="clean" id="exampleRadios1" value="Good" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Good
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="clean" id="exampleRadios1" value="Excellent" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">

                                    Excellent
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6">
                            <p class="text-monospace font-weight-normal text-white mb-0">4. Value Of Money</p>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="value" id="exampleRadios1" value="Poor" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Poor
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="value" id="exampleRadios1" value="Average" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Average
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="value" id="exampleRadios1" value="Good" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Good
                                </label>
                            </div>
                            <div class="form-check mx-3 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="value" id="exampleRadios1" value="Excellent" checked>
                                <label class="form-check-label text-white" for="exampleRadios1">
                                    Excellent
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group purple-border w-100 mx-2">

                            <textarea class="form-control" id="exampleFormControlTextarea4" rows="6" name="message"></textarea>
                        </div>
                    </div>
                    <div class="row my-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
