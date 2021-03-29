<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $userid = $_POST["userid"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select uname,upsw from user where uid='$userid'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row = $result->fetch_assoc()){
            if (password_verify($password, $row['upsw'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['uid'] =$userid;
                $_SESSION['uname'] =$row["uname"];
                header("location: bill.php");
            }
            else{
                $showError = "Invalid Credentials";
            }
        }
    }
    else
    {
        $showError = "Invalid Credentials";
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/tms/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/16e6adb165.js" crossorigin="anonymous"></script>
    <link href="/tms/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet">
    <script defer src="/tms/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
    <style>
        body 
        {
            /* background-color :#DDDDDD; */
            background: -webkit-linear-gradient(110deg, #DDDDDD 60%, #AAAAAA 60%);
            background: -o-linear-gradient(110deg, #DDDDDD 60%, #AAAAAA 60%);
            background: -moz-linear-gradient(110deg, #DDDDDD 60%, #AAAAAA 60%);
            background: linear-gradient(110deg, #DDDDDD 60%, #AAAAAA 60%);
        }
    </style>
    <title>Login</title>
  </head>
  <body>
    <?php
    $a=3;
    require 'nav.php' 
    ?>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container">
    <div class="card bg-secondary text-white my-3">
        <div class="card-header text-center">
            <h5 class="card-title">For any queries related Echallan contact 999-999-9999</h5>
            <p class="card-text">mutimedia.cell.traffic@karnataka.gov.in</p>
        </div>
    </div>
    <div class="text-center">
        <h2>Bengaluru City Police</h2>
        <i class="fas fa-user mt-3" style="font-size:150px; color:#AAAAAA;"></i>
    </div>
     <h2 class="text-center mt-4">Passenger Login</h2>
     <hr style="border-top: 1px dashed #8c8b8b;">
     <form action="/tms/loginuser.php" method="post">
        <div class="row mt-5 justify-content-md-center">
            <div class="col col-lg-5">
                <label for="userid">Userid</label>
                <input type="text" class="form-control" placeholder="" pattern="[0-9]{3,9}" id="userid" name="userid" required autocomplete="off">   
                <small class="form-text text-muted">(3-9) Numbers</small> 
            </div>
        </div>
        <div class="row mt-3 justify-content-md-center">
            <div class="col col-lg-5">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="" pattern="[0-9]{3,9}" id="password" name="password" required>
            </div>
        </div>
        <!-- <div class="row mt-3 justify-content-md-center">
            <div class="col col-lg-5">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div> -->
        <div class="row mt-3 justify-content-md-center">
            <div class="col col-lg-3">
            <button type="submit" class="btn btn-dark">Login</button>
            </div>
            <div class="col col-lg-2 my-2">
            <a href="/tms/login.php" class="text-dark">Not User?Login here</a>
            </div>
        </div>
     </form>
     <div class="card bg-secondary text-white my-5">
            <div class="card-footer text-center">
                <h5 class="card-title">This site is owned and managed by Bengaluru City Police</h5>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
