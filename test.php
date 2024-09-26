<?php

session_start();

// set timeout period in seconds
$inactive = 20;

// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
$session_life = time() - $_SESSION['timeout'];
if($session_life > $inactive)
{ session_destroy(); 
header("Location: logout.php"); }
}
$_SESSION['timeout'] = time();
print_r($_SESSION['timeout']);
print "session start";
?>