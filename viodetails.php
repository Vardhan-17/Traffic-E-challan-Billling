<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
    include '_dbconnect.php';
    $sq="SELECT MAX(chno) FROM log";
    $chno=0;
    $result1 = mysqli_query($conn,$sq);
    while($row = mysqli_fetch_array($result1)) {
      $chno=$row['0']+1; 
      }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $psgid = $_SESSION['psgid'];
        $vehiid=$_SESSION['vehiid'];
        $staffid=$_SESSION['id'];
        $vio="";
        if(!empty($_POST['a'])) {    
          foreach($_POST['a'] as $value){
              $vio= $vio."".$value."\n";
          }
        }
        $sql = "INSERT INTO `viodetails` (`staffid`,`psgid`,`vehiid`, `chno`,`violations`) VALUES ('$staffid','$psgid','$vehiid',NULL,'$vio');";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("location: report.php ");
        }
        else
        {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Error occured please try again
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div> ';
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
    <title>Welcome - <?php echo $_SESSION['uid']?></title>
  </head>
  <body>
    <?php $a=2; require 'nav.php' ?>
    <form action="/tms/viodetails.php" method="post">
      <div class=container>
        <div class="card bg-secondary text-white my-3">
                <div class="card-header text-center">
                        <h5 class="card-title">For any queries related Echallan contact 999-999-9999</h5>
                        <p class="card-text">mutimedia.cell.traffic@karnataka.gov.in</p>
                </div>
        </div>
        <div class="text-center">
                    <h2>Bengaluru City Police</h2>
                    <i class="fas fa-clipboard-list mt-3" style="font-size:150px; color:#AAAAAA;"></i>
        </div>
        <h2 class="text mt-4 text-center">Enter violation details</h2>
        
        
        <div class="row mt-5">
          <label for="inputPassword" class="col-sm-2 col-form-label"><h4>Challan.no:</h4></label>
            <div class="col-3">
            <span class="input-group-text"><?php
            echo $chno;
            ?></span>
            </div>
        </div>
        <div class="row mt-5">
          <label for="inputPassword" class="col-sm-2 col-form-label"><h4>Violations:</h4></label>
          <div class="col">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox1" value="No Helemet">
              <label class="form-check-label" for="inlineCheckbox1">No Helemet</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox2" value="Drunk&Drive">
              <label class="form-check-label" for="inlineCheckbox2">Drunk&Drive</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox3" value="Over-speeding">
              <label class="form-check-label" for="inlineCheckbox2">Over-speeding</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox4" value="No Seatbelt">
              <label class="form-check-label" for="inlineCheckbox2">No Seatbelt</label>
            </div>
          </div>
      </div>
      <div class="row mt-3">
          <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox5" value="No parking">
              <label class="form-check-label" for="inlineCheckbox1">No parking</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox6" value="Rules of road violation">
              <label class="form-check-label" for="inlineCheckbox2">Rules of road violation</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox7" value="Using phone">
              <label class="form-check-label" for="inlineCheckbox2">Using phone</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox8" value="Signal jumping">
              <label class="form-check-label" for="inlineCheckbox2">Signal jumping</label>
            </div>
          </div>
      </div>
      <div class="row mt-5">
          <div class="col">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox9" value="No License">
              <label class="form-check-label" for="inlineCheckbox1">No License</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox10" value="Triple seat">
              <label class="form-check-label" for="inlineCheckbox2">Triple seat</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox11" value="Racing">
              <label class="form-check-label" for="inlineCheckbox2">Racing</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="a[]" id="inlineCheckbox12" value="Reckless Driving">
              <label class="form-check-label" for="inlineCheckbox2">Reckless Driving</label>
            </div>
          </div>
      </div>
      <div class="row mt-5">
          <div class="col-3">
          <a class="btn btn-secondary" href="/tms/viodetails.php" role="button">Reset</a>    
          <button type="submit" class="btn btn-dark">Submit</button>
          </div>
      </div>
      <div class="card bg-secondary text-white my-3">
            <div class="card-footer text-center">
                <h5 class="card-title">This site is owned and managed by Bengaluru City Police</h5>
            </div>
      </div> 
    </div>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>