<?php
session_start();

if( isset($_SESSION["login"]) ){
    header("Location: table.php");
    exit;
}

$host="localhost";
$user="root";
$password="";
$db="demo";

$connect = mysqli_connect($host,$user,$password);
mysqli_select_db($connect,$db);

if(isset($_POST['uname'])){
    $uname=$_POST['uname'];
    $password=$_POST['password'];

    $sql="select * from loginform where Email='".$uname."'AND Pass='".$password."' limit 1";

    $result=mysqli_query($connect,$sql);
    
    if(mysqli_num_rows($result)==1){
        $_SESSION["login"] = true;

        setcookie('user','admin',time() + 60);

        header('location: table.php');
    }
    else{
        $message = "Password salah";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container konten">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="logo">
                    <img src="./img/logo3.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row justify-content-center formulir">
            <div class="col-lg-4">
                <form method="POST" action="#">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <!-- <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div> -->
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>