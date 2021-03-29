<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: loginuser.php");
        exit;
    }
    include '_dbconnect.php';
    $psgid=$_SESSION['uid'];
    $payment=false;
    $bills=true;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "DELETE FROM `psgdetails` WHERE `psgdetails`.`psgid` =$psgid";
        $result = mysqli_query($conn, $sql);
        $payment=true;
        $_SESSION['pay']=true;
    }
    else
    {
    $sq="SELECT chno FROM `viodetails` WHERE `psgid` = $psgid ";
    $result1 = mysqli_query($conn,$sq);
    $chno=0;
    $num = mysqli_num_rows($result1);
    if($num!=0)
    {
        $bills=false;
    while($row = $result1->fetch_assoc()) {
         $chno= $row["chno"]; 
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
   for($i=0;$i <10;$i+=1)
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
        <?php echo $_SESSION['uname']?>
    </title>
</head>

<body>
    <?php 
    $a=5;
    require 'nav.php';
    if($bills||$payment)
    {
        header("location: status.php");
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
                    <td>
                        <?php echo $chno; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Offender Id:</th>
                    <td>
                        <?php echo $psgid; ?>
                    </td>
                </tr>
                <th scope="row">Offender Name:</th>
                <td>
                    <?php echo $name; ?>
                </td>
                </tr>
                <tr>
                    <th scope="row">Offender Age:</th>
                    <td>
                        <?php echo $age; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Offender Gender:</th>
                    <td>
                        <?php echo $gender; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Offense Date:</th>
                    <td>
                        <?php echo $date1; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Offense Time:</th>
                    <td>
                        <?php echo $time; ?>
                    </td>
                </tr>
                <tr>
                <tr>
                    <th scope="row">Vehicle No:</th>
                    <td>
                        <?php echo $vehiid; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Vehicle Type:</th>
                    <td>
                        <?php echo $wheels." "; ?>Wheeler
                    </td>
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
                    <td>
                        <?php echo $total; ?>.00 Rs
                    </td>
                </tr>
                <tr>
            </tbody>
        </table>
        <!-- <form action="/tms/bill.php" method="POST">
            <button type="submit" class="btn btn-primary">Pay</button>
        </form> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Procceed to Payment
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Enter Banking Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/tms/bill.php" method="POST">
                            <h4 class="mb-3">Payment</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                        checked required>
                                    <label class="form-check-label" for="credit">Credit card</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="debit">Debit card</label>
                                </div>
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="paypal">PayPal</label>
                                </div>
                            </div>

                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Name on card</label>
                                    <input type="text" class="form-control" pattern="[A-Za-z]{0,20}"  id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Credit card number</label>
                                    <input type="text" class="form-control" pattern="[0-9]{6,9}" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="cc-expiration" class="form-label">Expiration</label>
                                    <input type="text" class="form-control" pattern="[0-9]{4}" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" pattern="[0-9]{3}" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="cc-cvv" class="form-label">Total amount</label>
                                    <input type="text" class="form-control" id="amount" placeholder="<?php echo $total; ?>.00 Rs" disabled readonly>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="card bg-secondary text-white my-3">
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