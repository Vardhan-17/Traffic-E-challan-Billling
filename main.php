<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: login.php");
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
    <title>Welcome - <?php echo $_SESSION['uid']?></title>
  </head>
  <body>
    <?php 
    $a=2;
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
        <i class="fas fa-user-shield mt-3" style="font-size:150px; color:#AAAAAA;"></i>
    </div>
    <?php echo '<h2 class="text-center mt-4">Welcome'; echo " ".$_SESSION['uid']; echo '</h2>';?>
    <hr style="border-top: 1px dashed #000;" class="mb-5">
    <div class="row mt-5 justify-content-around">
      <label for="1"><h2>History</h2></label>
      <a href="/tms/log.php" class="col-4" role="button" id="1"><i class="fas fa-history" style="font-size:150px; color:#8c8b8b;"></i></a>
      <label for="2"><h2>Bill Challan</h2></label>
      <a href="/tms/psgdetails.php" class="col-4" id="2" role="button"><i class="fas fa-file-invoice" style="font-size:150px; color:#DDDDDD;"></i></a>
    </div>
    <div class="card bg-secondary text-white my-5">
        <div class="card-footer text-center">
          <h5 class="card-title">This site is owned and managed by Bengaluru City Police</h5>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
