<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $name=$fname." ".$lname;
        $psgid = $_POST["psgid"];
        $gender= $_POST["gender"];
        $psgage= $_POST["psgage"];
        $_SESSION['psgid'] = $psgid;
        $_SESSION['pname'] = $name;
        $sql = "INSERT INTO `psgdetails` (`psgid`, `psgname`, `psggender`, `psgage`) VALUES ('$psgid', '$name', '$gender', '$psgage')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("location: vehidetails.php ");
        }
        else
        {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Id already exists
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
    <form action="/tms/psgdetails.php" method="post">
            <div class=container>
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
                    <h2 class="text mt-4 text-center">Enter Offender details</h2>
                    <hr style="border-top: 1px dashed #8c8b8b;">
                    <div class="row mt-5">
                    <label for="Name" class="col-sm-2 col-form-label"><h4>Name</h4></label>
                    <div class="col-3">
                    <input type="text" class="form-control" placeholder="First name" pattern="[A-Za-z]{0,20}" id="fname" name="fname" required autocomplete="off">
                    <small class="form-text text-muted">Only characters</small>
                    </div>
                    <div class="col-3">
                    <input type="text" class="form-control" placeholder="Last name" pattern="[A-Za-z]{0,20}" id="lname" name="lname" required autocomplete="off">
                    <small class="form-text text-muted">Only characters</small>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><h4>Offender id</h4></label>
                    <div class="col-3">
                    <input type="text" class="form-control" placeholder="Aadhar no" pattern="[0-9]{3,9}" id="psgid" name="psgid" required autocomplete="off">
                    <small class="form-text text-muted">Minimum 3 Numbers</small>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><h4>Gender</h4></label>
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><h4>Age</h4></label>
                    <div class="col-3">
                    <input type="text" class="form-control" placeholder="Age" pattern="[0-1]{0,1}[0-9]{0,2}" id="psgage" name="psgage" required autocomplete="off">
                    <small class="form-text text-muted">Between 0-100</small>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-3">
                    <a class="btn btn-secondary" href="/tms/main.php" role="button">Reset</a>    
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
    <script>
        $(document).ready(function() {
        $('#tms input[type="text"]').blur(function() {
        if(!$(this).val())  {
            $(this).focus();
        }
        });
        });
    </script>
    <script>
        $(document).ready(function() {
        $('#tms input[type="password"]').blur(function() {
        if(!$(this).val())  {
            $(this).focus();
        }
        });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>