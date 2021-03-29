<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: login.php");
  }
  include '_dbconnect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/tms/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <title>Welcome -
        <?php echo $_SESSION['uid']?>
    </title>
    <style>
        h1 {
            border: 2px solid #000;
            border-radius: 25px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>

</head>

<body>
    <?php 
    $a=2;
    require 'nav.php';
    $n= $_SESSION['id'];
    $v=$_POST["v"];
    $s=$_POST["search"];
    if($v==0)
    {
        $sql="SELECT chno,psgid,vehiid,status FROM `log` WHERE `staffid` = $n AND `chno`=$s";
    }
    if($v==1)
    {
        $sql="SELECT chno,psgid,vehiid,status FROM `log` WHERE `staffid` = $n AND `psgid`=$s";
    }
    if($v==2)
    {
        $sql="SELECT chno,psgid,vehiid,status FROM `log` WHERE `staffid` = $n AND `vehiid`=$s";
    }
    if($v==3)
    {
        $sql="SELECT chno,psgid,vehiid,status FROM `log` WHERE `staffid` = $n AND `status` LIKE '%".$s."%'";
    }
    //$sql="SELECT chno,psgid,vehiid,status FROM `log` WHERE `staffid` = $n";
    //$sql="CALL `log`($n)";
    $result = mysqli_query($conn,$sql);
    $chno=array();
    $psgid=array();
    $vehiid=array();
    $status=array();
    $k=0;
    $flag=false;
    while($result!=false&&$row = $result->fetch_assoc()) {
      $flag=true;
      $chno[$k]= $row["chno"];
      $psgid[$k]= $row["psgid"];
      $vehiid[$k]=$row["vehiid"];
      $status[$k]=$row["status"];
      $k++;
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
            <h3>Bengaluru City Police</h3>
            <i class="fas fa-user-shield mt-3" style="font-size:150px; color:#AAAAAA;"></i>
        </div>
        <h2 class="text mt-4 text-center">Log</h2>
        <hr style="border-top: 1px dashed #8c8b8b;">
        <form method="post" action="/tms/search.php">
            <div class="row mx-1">
                <div class="input-group-text ">Filter</div>
                <select class="form-control col-2" id="v" name="v">
                    <option value="0" selected>Challan no.</option>
                    <option value="1">Passenger Id</option>
                    <option value="2">Vehicle Id</option>
                    <option value="3">Payment status</option>
                </select>
                <input class="form-control col-2 mx-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
                <button class="btn btn-dark mx-2" type="submit">Search</button>
                <a class="btn btn-secondary" href="/tms/log.php" role="button">Reset</a>
            </div>
        </form>
        <?php
        if($flag)
        {
        echo '<table class="table table-secondary table-bordered my-5">
        <thead>
          <tr>
            <th scope="col">S.no</th>
            <th scope="col">Challan.no</th>
            <th scope="col">Passenger Id</th>
            <th scope="col">Vehicle Id</th>
            <th scope="col">Payment Status</th>
          </tr>
        </thead>
        <tbody>';
        for($i=0;$i<count($psgid);$i++)
        {
          echo
          '<tr>
          <th scope="row">';
          echo $i+1;
          echo '</th>
          <td>';
          echo $chno[$i];
          echo '</td>
          <td>';
          echo $psgid[$i];
          echo '</td>
          <td>';
          echo $vehiid[$i]; 
          echo
          '</td>
          <td>';
          echo $status[$i]; 
          echo
          '</td>
          </tr>';
        }
      echo '</tbody>
    </table>';
    }
    else{
        
      echo '<div class="my-5"><h1 class=text-center>No Results Found</h1></div>';
    }
    ?>
        <a class="btn btn-dark" href="/tms/main.php" role="button">Back to Home</a>
        <div class="card bg-secondary text-white my-5">
            <div class="card-footer text-center">
                <h5 class="card-title">This site is owned and managed by Bengaluru City Police</h5>
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