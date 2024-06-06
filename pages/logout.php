<?php
//neccessary to start session before logging out
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$_SESSION['profile'] = null;
$_SESSION['username'] = null;



header("location: ?page=login");


?>