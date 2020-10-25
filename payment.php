<?php
    require 'dbconfig/config.php';
    $api_key='rzp_test_20pfcv37A1h5m5';
    $api_secret='CMbsjagFgNpbo9W5yTPWuGm3';
    session_start();
    if(!isset($_SESSION['username'])){
    echo '<script type="text/javascript"> alert("Error!You need to Login First!") </script>';
    echo '<script>window.location.href = "./login.php";</script>';
    }
    
    require_once('config.php');
    include('Razorpay.php');

    use Razorpay\Api\Api;
    $api = new Api($api_key, $api_secret);
    $totalAmount=$_POST["totalAmount"];
    $userid=$_SESSION['username'];

    $sql="UPDATE userinfo SET balance=(balance+'$totalAmount') WHERE userid LIKE '$userid' ";
    echo '<script type="text/javascript"> alert("Query Initialized!") </script>';
    $query_run = mysqli_query($con, $sql);
    if ($query_run) {
        echo '<script type="text/javascript"> alert("Amount Added Successfully!") </script>';
        echo '<script>window.location.href = "./profile.php";</script>';
    }
    else{
        echo '<script type="text/javascript"> alert("Error!") </script>';
        echo '<script>window.location.href = "./addmoney.php";</script>';
    }

?>