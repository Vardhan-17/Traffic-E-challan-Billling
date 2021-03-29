<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      $loggedin= true;
    }
    else{
      $loggedin = false;
    }
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="/tms/logo.png" alt="" width="35" height="35" class="d-inline-block align-top">
        Traffic Department
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">';
        if($a==0)
        {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/main.php">Home<span class="sr-only"></span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/login.php">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/tms/signin.php">Signup</a>
            </li>';
            }
            else
            {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/logout.php">Logout</a>
                </li>';
            }
        }
        else if($a==1)
        {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/main.php">Home<span class="sr-only"></span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item active">
                <a class="nav-link" href="/tms/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tms/signin.php">Signup</a>
            </li>';
            }
            else
            {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/logout.php">Logout</a>
                </li>';
            }
        }
        else if($a==3)
        {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/bill.php">PayBill<span class="sr-only"></span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item active">
                <a class="nav-link" href="/tms/loginuser.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tms/signinuser.php">Signup</a>
            </li>';
            }
            else
            {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/logoutuser.php">Logout</a>
                </li>';
            }
        }
        else if($a==4)
        {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/bill.php">PayBill<span class="sr-only"></span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/loginuser.php">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/tms/signinuser.php">Signup</a>
            </li>';
            }
            else
            {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/logoutuser.php">Logout</a>
                </li>';
            }
        }
        else if($a==5)
        {
            echo '<li class="nav-item active">
                <a class="nav-link" href="/tms/bill.php">PayBill<span class="sr-only"></span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/loginuser.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tms/signinuser.php">Signup</a>
            </li>';
            }
            else
            {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/logoutuser.php">Logout</a>
                </li>';
            }
        }
        else
        {
            echo '<li class="nav-item active">
                <a class="nav-link" href="/tms/main.php">Home<span class="sr-only"></span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tms/signin.php">Signup</a>
            </li>';
            }
            else
            {
            echo '<li class="nav-item">
                <a class="nav-link" href="/tms/logout.php">Logout</a>
                </li>';
            }
        }
        echo '</ul>
    </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>';
?>
