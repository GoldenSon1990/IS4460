<?php

require_once 'user.php';

session_start();

if(!isset($_SESSION['user'])){
	header("Location: authenticate.php");
	exit();
}





?>
