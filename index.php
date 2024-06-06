<?php
if(isset($_GET['page'])){
   $source = $_GET['page'];

}else{
    $source = '';
}


switch($source){
case 'home';
include('pages/home.php');
break;
case 'login';
include('pages/login.php');
break;
case 'logout';
include('pages/logout.php');
break;
default:
include('pages/login.php');
}