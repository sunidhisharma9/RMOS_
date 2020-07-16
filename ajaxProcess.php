<?php
  session_start();
  $conn = mysqli_connect("localhost","root","","rmos");

  if(!$conn){
    die('Could not connect: '.mysqli_connect_error());
  }

  if(isset($_REQUEST['status']) && isset($_REQUEST['bid']) )
  {
    $bid=$_REQUEST['bid'];
    $status=$_REQUEST['status'];
    $sql = "Update customer_booking Set status='$status' where booking_id='$bid'";
    $run=mysqli_query($conn,$sql);
    if($run) echo "updated";
  }

  
