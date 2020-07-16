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

    $sql1 = "SELECT * FROM menu order by item_id asc limit $start, $num_per_page";
    $res1=mysqli_query($conn, $sql1);

    $query = "SELECT * from menu";
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
  <title>Menu</title>
  <script src="https://kit.fontawesome.com/94094e8e6a.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/menu.css">
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
        <button class="dropdown-item" type="button"><a href="logout.php">LOG OUT</a></button>
        <!-- <button class="dropdown-item" type="button">Something else here</button> -->
      </div>
    </div>
    </div>
  </div>
</nav>

<section class="menu">
  <h5 class="section-heading">MENU</h5>
</section>

<section class="menu-table">
  <div class="col-lg-12 col-md-6 col-sm-12 col-12">
    <div class="card">
      <div class="card-body p=0">
        <table class="table table-striped">
          <thead class="bg-dark">
              <tr class="border-0">
                  <th class="border-0">Item Id</th>
                  <th class="border-0">Item Name</th>
                  <th class="border-0">Item Price</th>
              </tr>
          </thead>
          <tbody>
            <?php
          while($row = mysqli_fetch_assoc($res1))
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


                <div class="row pages">
                  <div class="page col-md-10">
                      <ul class="pagination table">
                        <!-- Link of the previous page -->
                        <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
                          <a class='page-link' href='menu.php?page=<?php ($page>1 ? print($page-1) : print 1)?>'>Previous</a>
                        </li>
                        <!-- Links of the pages with page number -->
                        <?php for($i=1; $i<=$total_pages; $i++) { ?>
                        <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
                          <a class='page-link' href='menu.php?page=<?php echo $i;?>'><?php echo $i;?></a>
                        </li>
                        <?php } ?>
                        <!-- Link of the next page -->
                        <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
                          <a class='page-link' href='menu.php?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>Next</a>
                        </li>
                      </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
</section>



  </div>
  <div class="footer">
    <a style="color:white" class="mr-5" href="contact_us.php">CONTACT US</a>
    <a style="color:white" class="ml-5" href="feedback.php">FEEDBACK</a>
    <p class="copy">© Copyright 2019 RMOS</p>
  </div>
</body>
