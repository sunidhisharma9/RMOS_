<script>
      function checkCredentials(){
          var username = document.getElementById("admin_username").value;
          var password =document.getElementById("admin_password").value;
          if(username == "admin" && password == "admin")
          {
              alert("SUCCESS");
              window.location='admin-firstpage.php';
          }
          else{
              alert("FAIL");
          }
      }
  </script>
  <?php
session_start();
// Connect to the database
$con = mysqli_connect("localhost","root","","rmos");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_connect_error());
}
// echo"hello";

isset($_POST['submit']);
if (isset($_POST['submit']))
{// Grab User submitted information
$email = $_POST["email"];
$pass = $_POST["pw"];


// echo $pass;

// // Select the database to use
// mysqli_select_db("my_dbname",$con);
//write query
$sql = "SELECT * FROM customer WHERE email = '$email'";
//run
$result=mysqli_query($con, $sql);
//array
$row = mysqli_fetch_assoc($result);

if($row["email"]==$email && $row["password"]==$pass)
{
  $_SESSION['username']=$row['username'];
  $_SESSION['id']=$row['id'];
  ?>
<script>
  window.location='firstpage.php';
</script>

  <?php
}
  else
  ?>
  <script> alert('Login Failed ! Try again'); </script>
  <?php
  }

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RMOS</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
</head>

   <body >
    <div class="container login-container "  >
    <div class="row">

     <div class="col-md-6 login-form-1">
       <form method="post">
         <h3>Login for User</h3>

             <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Email" name="email" required id="email">
             </div>
             <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter Password" name="pw" required id="pw">
             </div>
             <div class="form-group">
                 <input name="submit" type="submit" class="btnSubmit" value="Login" id="submit" />
             </div>


      </form>
         </div>
         <div class="col-md-6 login-form-2">
            <form method="post">
             <h3>Login for Admin</h3>

                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Your Username *" value="" id="admin_username" />
                 </div>
                 <div class="form-group">
                     <input type="password" class="form-control" placeholder="Your Password *" value="" id="admin_password" />
                 </div>
                 <div class="form-group">
                    <button class="btnSubmit"  onclick="checkCredentials()" onsubmit="return false" >login</button>
                 </div>
                 <div class="form-group">

                     <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                 </div>
         </div>
          </form>
     </div>
 </div>
   </body>
</html>
