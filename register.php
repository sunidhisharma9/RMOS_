<?php
session_start();
$conn = mysqli_connect("localhost","root","","rmos");
if(!$conn)
{
  die('Could not connect: '.mysqli_connect_error());
}
 isset($_POST['submit']);if (isset($_POST['submit']))
{
$username=$_POST['username'];
$mob=$_POST['mob'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
$sql = "INSERT INTO `customer` (`username`, `phone_number`, `addr`, `email`, `password`, `cpassword`) VALUES ('$username',$mob, '$addr', '$email', '$pw', '$cpw')";
if(mysqli_query($conn, $sql))
{
	$message = "You have been successfully registered";
  echo "<script type='text/javascript'>alert('$message');</script>";
  ?>
<script>
  window.location='login.php';
</script>
<?php
}
else
  $message = "Could not insert record";
	echo "<script type='text/javascript'>alert('$message');</script>";
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
<link rel="stylesheet" href="css/register.css">

<SCRIPT type="text/javascript">
function validate()
{
	var username=document.getElementById("username");
	var mob=document.getElementById("mob");
	var addr=document.getElementById("addr");
  var EmailId=document.getElementById("email");
	var pw=document.getElementById("pw");
	var cpw=document.getElementById("cpw");
	var alphaExp = /^[a-zA-Z]+$/;
	var atpos = EmailId.value.indexOf("@");
    var dotpos = EmailId.value.lastIndexOf(".");
 	if(pw.value.length< 8 || cpw.value.length< 8)
	{
		alert("Please enter a password of atleast 8 characters");
		pw.focus();
		return false;
	}
	else if (pw.value.length != cpw.value.length)
	{
		alert("Passwords do not match.");
		pw.focus();
        return false;
    }
	else if (pw.value != cpw.value)
	{
		alert("Passwords do not match.");
		pw.focus();
        return false;
    }
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length)
	{
        alert("Enter valid email-ID");
		EmailId.focus();
        return false;
   	}
	if(username.value==null || username.value=="")
	{
		username.focus();
		alert("Enter valid User name");
		return false;
	}
	if(username.value.match(alphaExp)){}
	else{
		alert("First name can have only letters");
		username.focus();
		return false;
	}

	if(mob.value==null || mob.value==" ")
	{
		alert("Please Enter Mobile Number");
		mob.focus();
		return false;
	}
	if (isNaN(mob.value))
	{
		alert(" Your Mobile Number must be Integers");
		mob.focus();
		return false;
	}
	if((mob.value.length!= 10))
	{
		alert("Enter the valid Mobile Number(Like : 9669666999)");
		mob.focus();
		return false;
	}

	if(addr.value==" " || addr.value=="")
	{
		alert("Please Enter Your Address");
		addr.focus();
		return false;
	}
	if (confirm("Do you want to submit your details?") == true) {}
	else
	{
       return false;
    }
    alert();
return true;
}
</SCRIPT>

  </head>
  <body>

<form onsubmit="return validate()" method="post" action="register.php">
  <div class="container">
    <h1>SIGN UP</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required id="username">
    <label for="mob"><b>Phone Number</b></label>
    <input type="number" placeholder="Enter Phone Number" name="mob" required id="mob">
    <label for="addr"><b>Address</b></label>
    <input type="text" placeholder="Enter address" name="addr" required id="addr">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required id="email">
    <label for="pw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pw" required id="pw">
    <label for="cpw"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpw" required id="cpw">
    <!-- <hr> -->
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" name="submit" id='submit' class="registerbtn">Register</button>
    </div>
    <div class="container signin">
    <p>Already have an account? <a href="login.php">Log in</a>.</p>
    </div>
</form>

</body>
</html>
