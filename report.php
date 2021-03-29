<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    }
    include '_dbconnect.php';
    $sq="SELECT MAX(chno) FROM viodetails";
    $result1 = mysqli_query($conn,$sq);
    $chno=0;
    while($row = mysqli_fetch_array($result1)) {
         $chno= $row['0']; 
    }
    $sql="SELECT psgid,chno,violations,date FROM `viodetails` WHERE `chno` = $chno";
    $result = mysqli_query($conn,$sql);
    $psgid=0;$vio="";$date="";
    while($row = $result->fetch_assoc()) {
        $psgid= $row["psgid"];
        $vio=$row["violations"];
        $date=$row["date"];
   }
   $date1="";$time="";
   for($i=0;$i<10;$i+=1)
   {
       $date1=$date1.$date[$i];
   }
   for($i=10;$i <strlen($date);$i+=1)
   {
       $time=$time.$date[$i];
   }
   $wheels=0;
   $sql="SELECT vehitype FROM `vehidetails` WHERE `psgid` = $psgid";
   $result = mysqli_query($conn,$sql);
   while($row = $result->fetch_assoc()) {
    $wheels= $row["vehitype"];
    }
   $name="";
   $age="";
   $gender="";
   $sql="SELECT psgname,psggender,psgage FROM `psgdetails` WHERE `psgid` = $psgid";
   $result = mysqli_query($conn,$sql);
   while($row = $result->fetch_assoc()) {
    $name= $row["psgname"]; 
    $age= $row["psgage"];
    $gender= $row["psggender"];
    }
    $vehiid=0;
    $sql="SELECT vehiid FROM `vehidetails` WHERE `psgid` = $psgid";
    $result = mysqli_query($conn,$sql);
   while($row = $result->fetch_assoc()) {
    $vehiid= $row["vehiid"]; 
    }
   $v=array();
   $k=0;
   $temp="";
   for($i=0;$i < strlen($vio);$i+=1)
   {
        if($vio[$i]!="\n")
        {
            //echo $temp;
            $temp=$temp."".$vio[$i];
        }
        else
        {
            //echo $temp;
            $v[$k++]=$temp;
            $temp="";
        }
   }
    $amount =array("No Helemet"=>"100", "No Seatbelt"=>"125", "Over-speeding"=>"125","Drunk&Drive"=>"125",
                   "No parking"=>"150","Rules of road violation"=>"150","Using phone"=>"150","Signal jumping"=>"150",
                   "No License"=>"150","Triple seat"=>"200","Racing"=>"200","Reckless Driving"=>"200");
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
        <i class="fas fa-file-invoice mt-3" style="font-size:150px; color:#AAAAAA;"></i>
        </div>
        <div class="text-center mt-4">
        <h2>Challan Details</h2>
        </div>
        <hr style="border-top: 1px dashed #8c8b8b;">
        <table class="table table-secondary table-bordered">
        <tbody>
            <tr>
            <th scope="row">Challan No:</th>
            <td><?php echo $chno; ?></td>
            </tr>
            <tr>
            <th scope="row">Offender Id:</th>
            <td><?php echo $psgid; ?></td>
            </tr>
            <th scope="row">Offender Name:</th>
            <td><?php echo $name; ?></td>
            </tr>
            <tr>
            <th scope="row">Offender Age:</th>
            <td><?php echo $age; ?></td>
            </tr>
            <tr>
            <th scope="row">Offender Gender:</th>
            <td><?php echo $gender; ?></td>
            </tr>
            <tr>
            <th scope="row">Offense Date:</th>
            <td><?php echo $date1; ?></td>
            </tr>
            <tr>
            <th scope="row">Offense Time:</th>
            <td><?php echo $time; ?></td>
            </tr>
            <tr>
            <tr>
            <th scope="row">Vehicle No:</th>
            <td><?php echo $vehiid; ?></td>
            </tr>
            <tr>
            <th scope="row">Vehicle Type:</th>
            <td><?php echo $wheels." "; ?>Wheeler</td>
            </tr>
            <tr>
            <th scope="row">Offenses:</th>
            <td>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Offences</th>
                    <th scope="col">Fine amount</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total=0;
                for($i=0;$i<count($v);$i++)
                {
                    echo
                    '<tr>
                    <th scope="row">';
                    echo $i+1;
                    echo '</th>
                    <td>';
                    echo $v[$i];
                    echo '</td>
                    <td>';
                    echo $amount[$v[$i]]*($wheels-1); 
                    echo
                    '.00 Rs</td>
                    </tr>
                    <tr>';
                    $total+=$amount[$v[$i]]*($wheels-1);
                }
                ?>
                </tbody>
            </table>
            </td>
            </tr>
            <tr>
            <th scope="row">Total fine:</th>
            <td><?php echo $total; ?>.00 Rs</td>
            </tr>
            <tr>
            <th scope="row">Billed By:</th>
            <td><?php echo $_SESSION['uid']; ?></td>
            </tr>
        </tbody>
        </table>
        <a class="btn btn-light" onclick="window.print()" role="button">Print</a>
        <a class="btn btn-secondary" href="/tms/log.php" role="button">Billing History</a>
        <a class="btn btn-dark" href="/tms/psgdetails.php" role="button">New Challan</a> 
        <div class="card bg-secondary text-white my-3">
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