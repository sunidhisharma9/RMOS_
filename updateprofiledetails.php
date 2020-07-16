
<?php
    session_start();

    $conn = mysqli_connect("localhost","root","","rmos");
    // Make sure we connected successfully
    if(! $conn)
    {
        die('Connection Failed'.mysqli_connect_error());
    }

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $id = $_SESSION["id"];

    $sql = "UPDATE customer SET username = '$name', email = '$email', phone_number = '$phone_number', addr = '$address',
    password = '$password', cpassword = '$password' where id = '$id' ";

    if(mysqli_query($conn, $sql)){
        echo "details successfully updated";
        header("Location: logout.php");
    }
    else{
        echo "unable to update detials";
    }

?>
