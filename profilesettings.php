<?php session_start();
$conn = mysqli_connect("localhost","root","","rmos");
// Make sure we connected successfully
if(! $conn)
{
    die('Connection Failed'.mysqli_connect_error());
}
    $s=$_SESSION['username'];
    $sql = "SELECT * FROM customer where username='$s'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row["username"];
    $email = $row["email"];
    $address = $row["addr"];
    $phone_number = $row["phone_number"];
    $password = $row["password"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profilesetting.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
    <title>profile Settings</title>
</head>
<body>



    <main>
        <div class="container">
            <div class="card">

                    <div class="card-header">
                        <div class="card-header-content">
                            <h3>Profile details</h3>
                            <button class="edit">Edit</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="profile_form" action="updateprofiledetails.php" method="post">
                            <div class="row">
                                <div class="form-group-container">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="firstname" value="<?= $name ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="form-group-container">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?= $email ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group-container">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <input type="text" name="phone_number" value="<?= $phone_number ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group-container">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" value="<?= $password ?>" disabled>
                                    </div>
                                </div>
                                <!-- <div class="form-group-container">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="confirm_password"  disabled>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="form-group-container">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" value="<?= $address ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="align-items-center; margin-top: 10px">
                                <button type="submit" class="update">Update</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </main>

    <footer></footer>

    <script>
        var edit = document.getElementsByClassName("edit")[0];
        var update = document.getElementsByClassName("update")[0];
        var inputs = document.getElementById("profile_form").getElementsByTagName("input");
        edit.addEventListener("click", makeInputsEditable);

        function makeInputsEditable(){
            for(var i = 0; i < inputs.length; i++){
                inputs[i].removeAttribute("disabled");
            }
        }
    </script>
</body>
</html>
