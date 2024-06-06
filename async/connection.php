<?php
$connection = mysqli_connect("localhost","root","","thread-master");
if ($connection == false){
    die("Db connection failed".mysqli_connect_error($connection));
}
ob_start(); 
if(session_status() !== PHP_SESSION_ACTIVE){
     session_start();
}

// error_reporting(0);