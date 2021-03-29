<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: login.php");
      exit;
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
  <link rel="stylesheet" href="/tms/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="/tms/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet">
    <script defer src="/tms/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>

  <title>Welcome -
    <?php echo $_SESSION['uid']?>
  </title>
  <style>
    h1 {
      border: 2px solid #000;
      border-radius: 25px;
      padding-top:50px;
      padding-bottom:50px;
    }
  </style>
  <script src="https://kit.fontawesome.com/16e6adb165.js" crossorigin="anonymous"></script>
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
</head>

<body>
  <?php 
    $a=5;
    require 'nav.php' ?>
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
    <h2 class="text-center mt-4">Status</h2>
    <hr style="border-top: 1px dashed #8c8b8b;">
    <div class="mt-5">
    <?php 
    if(isset($_SESSION['pay'])&&$_SESSION['pay']!=false)
    {
       echo '<h1 class="text-center bg-secondary">Payment Succesful</h1>';
       $_SESSION['pay']=false;
    }
    else
    {
      echo '<h1 class=text-center>No pending bills</h1>';
    }
    ?>
    </div>
    <div class="card bg-secondary text-white my-5">
        <div class="card-header text-center">
            <h5 class="card-title">For any queries related Echallan contact 999-999-9999</h5>
            <p class="card-text">mutimedia.cell.traffic@karnataka.gov.in</p>
        </div>
    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
</body>

</html>