<?php
    session_start();

    $conn = mysqli_connect("localhost","root","","rmos");

    if(!$conn){
      die('Could not connect: '.mysqli_connect_error());
    }

    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }
    else{
      $page = 1;
    }

    $num_per_page = 5;
    $start = ($page - 1) *5;

    $sql1 = "SELECT * FROM reservation order by booking_id desc limit $start, $num_per_page";
    $res1=mysqli_query($conn, $sql1);

    $query = "SELECT * from reservation";
    $result = mysqli_query($conn, $query);
    $total_record = mysqli_num_rows($result);
    $total_pages = ceil($total_record/$num_per_page);

    $Previous = $page - 1;
    $Next = $page + 1;
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Bookings</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat&display=swap" rel="stylesheet"><link rel="stylesheet" href="css/booking.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand abs" href="#">RMOS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <a class="nav-item nav-link " href="admin-menu.php">MENU <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="reservation.php">RESERVATION</a>
        <a class="nav-item nav-link" href="about_us.php" >ABOUT US</a>
        <div class="dropdown d pull-right">
    			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    			<?php echo $_SESSION['username'];?>
    			</button>
    			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    				<button class="dropdown-item" type="button"><a href="profilesettings.php">UPDATE DETAILS</a></button>
    				<button class="dropdown-item" type="button"><a href="logout.php">LOG OUT</a></button>
    				<!-- <button class="dropdown-item" type="button">Something else here</button> -->
    			</div>
  		   </div>
    </div>
  </nav>

  <section class="booking">
    <h2 class="section-heading">My Bookings</h2>
  </section>

  <section class="booking-table">
    <div class="col-lg-12 col-md-6 col-sm-12 col-12">
      <div class="card">
        <div class="card-body p=0">
          <table class="table table-striped">
            <thead class="bg-dark">
                <tr class="border-0">
                    <th class="border-0">Booking Id</th>
                    <th class="border-0">First Name</th>
                    <th class="border-0">Last Name</th>
                    <th class="border-0">Phone Number</th>
                    <th class="border-0">Email Id</th>
                    <th class="border-0">Seats</th>
                    <th class="border-0">Date</th>
                    <th class="border-0">Time</th>
                    <th class="border-0">Status</th>
                </tr>
            </thead>
            <tbody>
              <?php

                   while($row = mysqli_fetch_assoc($res1))
                   {
                     echo "<tr>";
                     echo "<td>"; echo $row["booking_id"] ; echo "</td>";
                     echo "<td>"; echo $row["first_name"] ; echo "</td>";
                     echo "<td>"; echo $row["last_name"] ; echo "</td>";
                     echo "<td>"; echo $row["phone"] ; echo "</td>";
                     echo "<td>"; echo $row["email"] ; echo "</td>";
                     echo "<td>"; echo $row["seats"] ; echo "</td>";
                     echo "<td>"; echo $row["date"] ; echo "</td>";
                     echo "<td>"; echo $row["time"] ; echo "</td>";

                     $status="select * from customer_booking WHERE booking_id='$row[booking_id]'";
                     $run_status=mysqli_query($conn,$status);
                     $row_status=mysqli_fetch_assoc($run_status);
                     echo"
                     <td>
                        <div class='status1'>
                        ";
                          if($row_status["status"]==1)
                          {
                            //echo $row_status["status"];
                            echo"
                             <button type='button' class='btn btn-warning inline ' >In process</button>";

                          }
                           else if($row_status["status"]==2)
                           {


                             echo"<button type='button' class='btn btn-success inline status-accept' >Accepted</button>";


                           }

                          else if($row_status["status"]==3)
                           echo"
                           <button type='button' class='btn btn-danger inline status-reject' id='reject'  >Rejected</button>
                          </div>
                       </td>
                     ";
                     echo "</tr>";

                   }

                  ?>
            </tbody>

          </table>

          <div class="row pages">
            <div class="page col-md-10">
                <ul class="pagination table">
                  <!-- Link of the previous page -->
                  <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
                    <a class='page-link' href='booking.php?page=<?php ($page>1 ? print($page-1) : print 1)?>'>Previous</a>
                  </li>
                  <!-- Links of the pages with page number -->
                  <?php for($i=1; $i<=$total_pages; $i++) { ?>
                  <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
                    <a class='page-link' href='booking.php?page=<?php echo $i;?>'><?php echo $i;?></a>
                  </li>
                  <?php } ?>
                  <!-- Link of the next page -->
                  <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
                    <a class='page-link' href='booking.php?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>Next</a>
                  </li>
                </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="footer">
    <a style="color:white" class="mr-5" href="contact_us.php">CONTACT US</a>
    <a style="color:white" class="ml-5" href="feedback.php">FEEDBACK</a>
    <p class="copy">© Copyright 2019 RMOS</p>
  </div>

</body>
